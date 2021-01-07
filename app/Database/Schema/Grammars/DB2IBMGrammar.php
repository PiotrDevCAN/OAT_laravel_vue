<?php

namespace App\Database\Schema\Grammars;

use Cooperl\DB2\Database\Schema\Grammars\DB2Grammar;

class DB2IBMGrammar extends DB2Grammar
{
    /**
     * Compile the query to determine the list of tables.
     *
     * @return string
     */
    public function compileTableExists()
    {
        return 'select * from syscat.tables where tabschema = upper(?) and tabname = upper(?)';
    }
    
    /**
     * Compile the query to determine the list of columns.
     *
     * @return string
     */
    public function compileColumnExists()
    {
        return 'select colname from syscat.columns where tabschema = upper(?) and tabname = upper(?)';        
    }
}
