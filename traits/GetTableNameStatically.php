<?php namespace App\Traits;

trait GetTableNameStatically
{
    public static function tableName()
    {
        return with(new static)->getTable();
    }
}