<?php

namespace App\Database;

use Cooperl\DB2\Database\DB2Connection;
use App\Database\Schema\Grammars\DB2IBMGrammar;

class DB2IBMConnection extends DB2Connection
{
	/**
     * Default grammar for specified Schema
     *
     * @return App\Database\Schema\Grammars\DB2IBMGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        $defaultGrammar = $this->withTablePrefix(new DB2IBMGrammar);

        return $defaultGrammar;
    }
}
