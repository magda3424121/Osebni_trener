<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'osebnitrener';

$link = mysqli_connect($host, $user, $password, $db_name)
    or die("Povezava na bazo ni uspela: " . mysqli_connect_error());

mysqli_set_charset($link, "utf8");
?>