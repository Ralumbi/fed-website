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
            var_dump($_POST);
            $username = secureInput($_POST['username']);
            $email = secureInput($_POST['email']);
            $password = secureInput($_POST['password']);
            $passwordCheck = secureInput($_POST['passwordCheck']);
            $checkbox = secureInput($_POST['checkbox']);

            if (empty($username) || empty($email) || empty($password) || empty($passwordCheck) || empty($checkbox)) {
                echo "You need to fill in all fields!";
            } else {
                if ($password === $passwordCheck) {
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $user_register_ip = getUserIP();
                } else {
                    return false;
                }

                $sql = "INSERT INTO $this->table(user_name, user_email, user_password, user_register_ip) VALUES ('$username', '$email', '$encryptedPassword', '$user_register_ip')";

                $query = $this->db->query($sql);

                if ($query) {
                    return true;
                } else {
                    return false;
                }
            }

            // TODO: more filters to be created


        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $username = secureInput($_POST['username']);
            $password = secureInput($_POST['password']);
            
            // TODO: more filters to be created

            if (empty($username) || empty($password)) {
                $message = 'You must fill in all fields';
                return $message;
            } else {
                $decryptPassword = password_verify($password, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM user WHERE user_name = $username and user_password = $decryptPassword";
                $result = mysqli_query($this->db->conn, $sql);
                $row = mysqli_fetch_array($result);

                if (is_array($row)) {
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['email'] = $row['user_email'];

                }
            }

        } else {
            return false;
        }
    }

    public function checkLogin()
    {
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM user WHERE user_id = $id AND user_username = $username AND user_email = $email";
        $result = mysqli_query($this->db->conn, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            if ($row['user_id'] === $_SESSION['id'] && $row['user_name'] === $_SESSION['username'] && $row['user_email'] === $_SESSION['email']) {
                header('location: /dashboard');
            }
        }
    }
}

