<?php

class Database 
{
    protected $conn;

    protected function __construct()
    {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function query($sql)
    {
        $this->conn->query($sql);
        if (!$this->conn->query($sql)) {
            echo "Error executing query: " . $this->conn->query($sql)->error;
        }
    }

}