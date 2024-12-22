<?php

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php';

class Imagefiles {

    public static function uploadImage($photoName, $photoType, $photoSize, $photoData, $uploaded_at) {
        $conn = Database::getConnection();
        $sql = "INSERT INTO pdf_files (photoName, photoType, photoSize, photoData, uploaded_at) 
                VALUES ('$photoName', '$photoType', '$photoSize', '$photoData', '$uploaded_at')";

        $error = false;

        if ($conn->query($sql) === true) {
            $error = false;
            echo "New image add successfully!";
            return true;
        } else {
            $error = $conn->error;
            echo "Error: " . $error;
            return false;
        }
    }

    public static function getImages() {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM pdf_files";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

}