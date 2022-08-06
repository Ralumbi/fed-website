<?php

class User extends Database
{
    protected $table = "user";
    protected $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function register()
    {
        $message = [];

        if (isset($_POST['register'])) {
            
        }

        
    }

}

