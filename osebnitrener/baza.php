<?php
$host = 'sql306.infinityfree.com'; // Pravi MySQL hostname
$user = 'if0_39050571';            // Pravo MySQL uporabniško ime
$password = 'ZkS4a0Ox24rUt'; // Geslo, ki ga uporabljaš za vPanel / bazo
$db_name = 'if0_39050571_osebnitrener'; // Ime baze

$link = mysqli_connect($host, $user, $password, $db_name);

if (!$link) {
    die("Povezava na bazo ni uspela: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
?>