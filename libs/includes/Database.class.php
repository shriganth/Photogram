<?php

    class Database {
        private static $conn = null;

        public static function getConnection() {
            if (self::$conn === null) {
                $servername = 'mysql.selfmade.ninja';
                $user = 'shriganth';
                $pass = '08-august-2002';
                $dbname = 'shriganth_photogram_signup';

                $conn = new mysqli($servername, $user, $pass, $dbname);

                if ($conn -> connect_error) {
                    die("Connection failed!". $conn -> connect_error);
                }
                else {
                    self::$conn = $conn;
                }
            }
            return self::$conn;
        }

        public static function closeConnection() {
            if (self::$conn != null) {
                self::$conn->close();
                self::$conn = null;
            }
        }
    }

    

?>