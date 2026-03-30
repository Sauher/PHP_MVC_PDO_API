<?php
require_once (__DIR__ . '/../../core/database.php');

class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function all()
    {
   
    }
    public function find()
    {

    }
    public function create()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
    public function destroy(){
        
    }
}


?>