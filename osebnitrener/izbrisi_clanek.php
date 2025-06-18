<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    die("Dostop prepovedan.");
}

if (isset($_GET['id_c'])) {
    $id_c = (int)$_GET['id_c'];
} else {
    die("Neveljaven ID.");
}
if ($id_c <= 0) die("Neveljaven ID.");

mysqli_query($link, "DELETE FROM komentarji WHERE id_c = $id_c");
if (mysqli_query($link, "DELETE FROM clanki WHERE id_c = $id_c")) {
    header("Location: clanki.php");
    exit;
}