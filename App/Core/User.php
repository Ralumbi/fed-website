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
        $message = '';

        if (!empty($_POST['register']) && $_POST['email'] !== '') {
            $username = htmlentities($_POST['username']);

            if (!empty($username)) {
                $message = 'test';
            }
        }

        return $message;
    }

}

