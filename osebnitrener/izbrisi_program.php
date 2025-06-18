<?php
include 'baza.php';
require_once 'seja.php';


if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    exit('Dostop prepovedan.');
}

$id_p = intval($_GET['id_p']);
if ($id_p > 0) {
    mysqli_query($link, "DELETE FROM uporabniki_programi WHERE id_p = $id_p");
    mysqli_query($link, "DELETE FROM programi WHERE id_p = $id_p");
}

header("Location: programi.php");
exit;
