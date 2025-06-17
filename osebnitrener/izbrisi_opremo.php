<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1 || !isset($_GET['id_o'])) {
    header('Location: prijava.php');
    exit;
}

$id_o = (int)$_GET['id_o'];

mysqli_query($link, "DELETE FROM opreme WHERE id_o=$id_o");

header('Location: oprema.php');
exit;
