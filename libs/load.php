<?php 

include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/includes/Database.class.php';
include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/includes/User.class.php';
include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/includes/Usersession.class.php';


function load_template($name) {
    include_once $_SERVER['DOCUMENT_ROOT']."/photogram/templates/$name.php";
}

?>