<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu'])) {
    die("Za dodajanje komentarja se morate prijaviti.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_c = (int)$_POST['id_c'];
    $opis = trim($_POST['opis']);
    $id_u = $_SESSION['idu'];

    if ($opis === '') {
        die("Komentar ne sme biti prazen.");
    }


    $sql = "INSERT INTO komentarji (opis, id_c, id_u) VALUES ('$opis', $id_c, $id_u)";
    if (mysqli_query($link, $sql)) {
        header("Location: clanki.php");
        exit;
    } else {
        die("Napaka pri dodajanju komentarja.");
    }
}
?>
