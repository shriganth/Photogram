<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

class User {
    
    public $conn;
    public $username;
    public $id;
    public $table;

    public static function signupData($firstname, $lastname, $username, $email, $password) {

        $options = [
            'cost' => 8,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        $conn = Database::getConnection();
        $sql = "INSERT INTO signup (firstname, lastname, username, email, password) 
                VALUES ('$firstname', '$lastname', '$username', '$email', '$password')"; 

        $error = false;

        if ($conn->query($sql) === true) {
            $error = false;
            echo "New user add successfully!";
            return true;
        } else {
            $error = $conn->error;
            echo "Error: " . $error;
            return false;
        }

        // Database::closeConnection();
    }

    public static function signinData($email, $password) {
        $conn = Database::getConnection();

        $sql = "SELECT * FROM `signup` WHERE `email` = '$email' LIMIT 50";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                return $row['email'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function __construct($username) {
        $this->conn = Database::getConnection();
        $this->username = $username;
        $this->id = null;
        $this->table = '';

        $sql = "SELECT `id` FROM `authentication` WHERE `email`= '$username' OR `id` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            return $this->id;
        } else {
            throw new Exception("Invalid, Username doesn't exists!");
        }

    }

}

?>