<?php
include 'baza.php';
include 'seja.php';

if (isset($_SESSION['idu'])) {
    $id_u = $_SESSION['idu'];
} else {
    $id_u = 0;
}

if (isset($_POST['id_p'])) {
    $id_p = $_POST['id_p'];
} else {
    $id_p = 0;
}

if ($id_u && $id_p) {
    $sql = "DELETE FROM uporabniki_programi WHERE id_u = $id_u AND id_p = $id_p";
    if (mysqli_query($link, $sql)) {
        echo "Uspešno odjavljen.";
    } else {
        echo "Napaka pri odjavi.";
    }
} else {
    echo "Manjkajo podatki.";
}

header("Refresh: 2; url=programi.php");
exit;
?>
