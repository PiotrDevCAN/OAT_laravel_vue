<?php 

namespace App\Helpers\BlueGroups;

use Adldap\AdldapInterface;
use Adldap\Adldap;

class BlueGroupsService {

    /**
     * @var Adldap
     */
    protected $ldap;
    
    protected static $IIP_LDAP_ERRNO;
    protected static $IIP_AUTH_ERRNO;
    
    protected static $ldap_attr = array(
        'uid',
        'mail',
        'ismanager',
        'dept',
        'div',
        'employeetype',
        'ibmserialnumber',
        'manager',
        'cn',
        'workloc'
    );
    
    function __construct(AdldapInterface $ldap)
    {
        // setup ldaps resource
        $this->ldap = $ldap;
        
        //clear any error values
        self::$IIP_LDAP_ERRNO = 0;
        self::$IIP_AUTH_ERRNO = 0;
    }
    
    // array result = user_auth(userid, password)
    // Verify the userid and password given are valid in Bluepages
    // returns an array of user information on success or FALSE on
    // failure.
    function user_auth($user, $pass)
    {
        $user = trim($user);
        $pass = trim($pass);
        
        //         $filter = "(&(mail=" . $user . ")(objectclass=ibmPerson))";
        
        // empty user id
        if ($user == "") {
            self::$IIP_LDAP_ERRNO = 0;
            self::$IIP_AUTH_ERRNO = 4;
            return FALSE;
        }
        
        // empty password
        if ($pass == "") {
            self::$IIP_LDAP_ERRNO = 0;
            self::$IIP_AUTH_ERRNO = 6;
            return FALSE;
        }
        
        // new search
        $search = $this->ldap->search();
        
        // new query
//         $query = $this->ldap->search()->newQuery();
        
        // setup ldaps resource
        // connect, bind, and search for $user
        // moved do ldap object
        
//         $results = $search->select(self::$ldap_attr)
        $results = $search->select()
            ->where('mail', '=', $user)
            ->where('objectclass', '=', 'person')
            ->where('objectclass', '=', 'ibmPerson')
            ->first();
        
        // retrive the first entry (if any)
        if (! $entry = @ldap_first_entry($ds, $sr)) {
            self::$IIP_LDAP_ERRNO = 0;
            self::$IIP_AUTH_ERRNO = 4;
            return FALSE;
        }
        
        // authenticated bind using $user_dn and $pass
        $user_dn = @ldap_get_dn($ds, $entry);
        if (! @ldap_bind($ds, $user_dn, $pass)) {
            self::$IIP_LDAP_ERRNO = ldap_errno($ds);
            self::$IIP_AUTH_ERRNO = 6;
            return FALSE;
        }
        
        // while we have it, return an array of info
        $user = array(
            'dn' => $user_dn
        );
        foreach (self::$ldap_attr as $a) {
            $val = @ldap_get_values($ds, $entry, $a);
            $user[$a] = ($val) ? $val[0] : null;
        }
        
        // close and return
        return $user;
    }
    
    // bool result = group_auth (string user_dn, mixed group, [string depth])
    // given a DN, check all $groups and return TRUE or FALSE
    // $group can be either an array of groups names or string of the group to check
    // set $depth to 0 to check only the top level group
    function group_auth($user_dn, $group, $depth = 2)
    {
        // setup ldap connection resource
        if (! is_array($group)) {
            $group = array(
                $group
            );
        }
        $basedn = "ou=memberlist,ou=ibmgroups,o=ibm.com";
        
        // check this $group and all subgroups for $dn
        $result = FALSE;
        while ($depth >= 0) {
            // filter to look for $dn in $group list
            $filter = $this->_make_filter($group, 'cn');
            $filter = "(&(objectclass=groupofuniquenames)(uniquemember=$user_dn)$filter)";
            
            // connect, bind and search for $dn in $group
            if (! $sr = @ldap_search($ds, $basedn, $filter, array(
                'cn'
            ))) {
//                 define("IIP_LDAP_ERRNO", ldap_errno($ds));
//                 define("IIP_AUTH_ERRNO", 3);
                break;
            }
            // bail out if $dn is found in this $group list
            if (@ldap_count_entries($ds, $sr) > 0) {
                $result = TRUE;
                break;
            }
            // bail out if there are no sub-groups
            if (! $group = $this->_get_subgroups($group)) {
                break;
            }
            $depth --;
        }
        if ($result == FALSE && defined('IIP_LDAP_ERRNO') == FALSE) {
//             define("IIP_LDAP_ERRNO", 0);
//             define("IIP_AUTH_ERRNO", 8);
        }
        return $result;
    }
    
    // do bluegroups check, if needed
    function checkBluegroup($group=null){
        if ($group) {
//             define('IIP_AUTH_GROUP', trim($group));
            //  check for group cached response
//             if (! in_array($group, $GLOBALS['ltcuser']['groups'])) {
            //  search bluegroups
            $result = $this->group_auth($GLOBALS['ltcuser']['dn'], $group);
            if (defined('IIP_AUTH_ERRNO') && IIP_AUTH_ERRNO == 3) {
                $this->_do_ldap_error();
            }
            
            // check for an auth failure and bail
            if (! $result) {
                $this->_do_auth_error();
            }
            
            // cache the results in session
            $GLOBALS['ltcuser']['groups'][] = $group;
            $_SESSION['ltcuser'] = $GLOBALS['ltcuser'];
        }
    }
    
    # return an array of groups $employee is in.  $employee can be a DN or
    # an email address.
    
    function employee_bluegroups($employee) {
        if (strpos($employee, "@") == TRUE) {
            # lookup the DN from an email address
            if (! $record = $this->bluepages_search("(mail=$employee)") ) { return FALSE; }
            $user_dn = key($record);
        } elseif (strpos($employee, "=") == TRUE) {
            # use the DN given
            $user_dn = $employee;
        } else {
            # passed something we don't know how to handle
            return FALSE;
        }
        
        # setup ldap connection
        $filter = "(uniquemember=" . $user_dn . ")";
        $basedn = "ou=ibmgroups,o=ibm.com";
        
        # connect, bind, and search
        if (!$sr = @ldap_search($ds, $basedn, $filter, array('cn'))) {
            return FALSE;
        }
        
        # bail out if there aren't any groups (unlikely)
        if (@ldap_count_entries($ds, $sr) == 0) return FALSE;
        
        # build an array of groups found
        $groups = array();
        for ($entry = ldap_first_entry($ds, $sr); $entry != FALSE;
        $entry = ldap_next_entry($ds, $entry)) {
            
            $val = ldap_get_values($ds, $entry, 'cn');
            array_push($groups, $val[0]);
        }
        return $groups;
    }
    
    # search bluepages using an ldap filter
    # array bluepages_search ( mixed filter, array attr)
    # $filter can be a string or an array of strings to search on
    # $attr is an array of ldap attributes to return for each record
    # returns FALSE or an array of results keyed by DN
    # WARNING: only the first value of an attribute is returned
    
    function bluepages_search($filter, $attr = null, $key_attr = 'dn') {
        # setup filter array, attr list, and base dn
        if ( ! is_array($filter) ) $filter = array($filter);
        $basedn = $w3php['ldap_basedn'];
        $attr = ($attr) ? $attr : array('cn', 'mail', 'uid');
        //fb($attr);
        # make sure $key is in attr array or we cannot use it
        if ( $key_attr != 'dn' && ! in_array($key_attr, $attr) ) $attr[] = $key_attr;
        
        # setup ldap connection
        //fb('after connect');
        # connect, bind and do a parallel search
        $conn = array_fill(0, sizeof($filter), $ds);
        $search_result = ldap_search($conn, $basedn, $filter, $attr);
        
        # process each of the search results
        $result = array();
        foreach ($search_result as $sr) {
            
            # check to see if we have hits for this result
            if (@ldap_count_entries($ds, $sr) == 0) continue;
            
            # get the values of each entry found
            for ($entry = @ldap_first_entry($ds, $sr); $entry != FALSE;
            $entry = @ldap_next_entry($ds, $entry)) {
                
                # get the dn of this entry, always
                $dn = @ldap_get_dn($ds, $entry);
                
                # get the hash key
                if ($key_attr && $key_attr != 'dn') {
                    $key_val = @ldap_get_values($ds, $entry, $key_attr);
                    $key_val = ($key_val) ? $key_val[0] : $dn;
                } else {
                    $key_val = $dn;
                    
                }
                
                # put the dn into the result hash
                $result[$key_val]['dn'] = $dn;
                
                # get each attr, missing attrs are stored as null values
                foreach ($attr as $a) {
                    $val = @ldap_get_values($ds, $entry, $a);
                    $result[$key_val][$a] = ($val) ? $val[0] : null;
                }
            }
        }
        return $result;
    }
}