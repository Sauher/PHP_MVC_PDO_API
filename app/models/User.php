<?php

require_once (__DIR__ . '/BaseModel.php');

class User extends BaseModel
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }
}

?>