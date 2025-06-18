<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1 || !isset($_GET['id_t'])) {
    header('Location: prijava.php');
    exit;
}

$id_t = (int)$_GET['id_t'];

mysqli_query($link, "DELETE FROM treningi WHERE id_t=$id_t");

header('Location: treningi.php');
exit;
