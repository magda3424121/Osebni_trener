<?php
require 'baza.php';

$i = $_POST['ime'] ?? '';
$p = $_POST['priimek'] ?? '';
$e = $_POST['email'] ?? '';
$g = $_POST['geslo'] ?? '';
$rd = $_POST['rojstni_datum'] ?? '';
$spol = $_POST['spol'] ?? '';
$visina = intval($_POST['visina'] ?? 0);
$teza = intval($_POST['teza'] ?? 0);
$id_vu = intval($_POST['id_vu'] ?? 2);

$salt = "blabla";
$gkod = sha1($g . $salt);

$query = "INSERT INTO uporabniki (ime, priimek, email, geslo, rojstni_datum, spol, visina, teza, id_vu)
          VALUES ('$i', '$p', '$e', '$gkod', '$rd', '$spol', $visina, $teza, $id_vu)";

if (mysqli_query($link, $query)) {
    echo 'Registracija uspešna.';
    header('Refresh: 2; url=prijava.php');
    exit;
} else {
    echo 'Registracija neuspešna: ' . mysqli_error($link);
    header('Refresh: 2; url=register.php');
    exit;
}
?>
