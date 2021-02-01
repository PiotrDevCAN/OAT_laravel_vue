<?php namespace App\Traits;

trait GetTableName
{
    public static function tableName()
    {
        return with(new static)->getTable();
    }
}