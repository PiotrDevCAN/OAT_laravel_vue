<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Auth\GuardHelpers;

class BluepagesUserGuard implements StatefulGuard
{
    use GuardHelpers;

    /**
     * @var Request
     */
    protected $request;

    /**
     * OpenAPIGuard constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function viaRemember()
    {
        return $this->viaRemember;
    }

    public function login(Authenticatable $user, $remember = false)
    {}

    public function attempt(array $credentials = [], $remember = false)
    {}

    public function onceUsingId($id)
    {}

    public function loginUsingId($id, $remember = false)
    {}

    public function logout(): void
    {
        if ($this->user) {
            $this->setUser(null);
        }
    }

    public function once(array $credentials = [])
    {}

    public function user()
    {
//         if ($this->loggedOut) {
//             return;
//         }
        
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
//         if (! is_null($this->user)) {
//             return $this->user;
//         }
        
//         $id = $this->session->get($this->getName());
        
//         // First we will try to load the user using the identifier in the session if
//         // one exists. Otherwise we will check for a "remember me" cookie in this
//         // request, and if one exists, attempt to retrieve the user using that.
//         if (! is_null($id) && $this->user = $this->provider->retrieveById($id)) {
//             $this->fireAuthenticatedEvent($this->user);
//         }
        
//         // If the user is null, but we decrypt a "recaller" cookie we can attempt to
//         // pull the user data on that cookie which serves as a remember cookie on
//         // the application. Once we have a user we can return it to the caller.
//         if (is_null($this->user) && ! is_null($recaller = $this->recaller())) {
//             $this->user = $this->userFromRecaller($recaller);
            
//             if ($this->user) {
//                 $this->updateSession($this->user->getAuthIdentifier());
                
//                 $this->fireLoginEvent($this->user, true);
//             }
//         }
        
        return $this->user;
    }

    public function validate(array $credentials = []): bool
    {
        throw new \BadMethodCallException('Unexpected method call');
    }
}
