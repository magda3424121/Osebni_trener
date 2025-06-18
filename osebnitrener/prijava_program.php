<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu'])) {
    header('Location: prijava.php');
    exit;
}

$id_u = (int)$_SESSION['idu'];
$id_p = (int)($_POST['id_p'] ?? 0);

if ($id_p <= 0) {
    header('Location: programi.php');
    exit;
}


$sql_check = "SELECT * FROM uporabniki_programi WHERE id_u = $id_u AND id_p = $id_p";
$result_check = mysqli_query($link, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    $_SESSION['message'] = "Že ste prijavljeni na ta program.";
    header('Location: programi.php');
    exit;
}


$sql_insert = "INSERT INTO uporabniki_programi (id_u, id_p) VALUES ($id_u, $id_p)";
if (mysqli_query($link, $sql_insert)) {
    $_SESSION['message'] = "Uspešno ste prijavljeni na program.";
} else {
    $_SESSION['message'] = "Prišlo je do napake pri prijavi.";
}

header('Location: programi.php');
exit;
?>
