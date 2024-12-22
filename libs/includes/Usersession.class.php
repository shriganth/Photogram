<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

class Usersession {
    public $data;
    public $id;
    public $conn;
    public $token;
    public $uid;

    public static function authenticate($email, $password) {
        $username = User::signinData($email, $password);

        if ($username) {
            $user = new User($username);

            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $uid = $user;
            $token = md5(random_int(0, 99999999) . $ip . $agent . time());

            $sql = "INSERT INTO `session_token` (`uid`, `token`, `login_time`, `ip`, `useragent`)
            VALUES ('$uid', '$token', now(), '$ip', '$agent')";

        }
    }
}

?>