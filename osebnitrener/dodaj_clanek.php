<?php
include 'baza.php';
require_once 'seja.php';
if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    die("Dostop prepovedan.");
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = trim($_POST['naslov']);
    $opis = trim($_POST['opis']);
    $id_u = $_SESSION['idu'];

    if ($naslov === '' || $opis === '') {
        $error = "Vsa polja so obvezna.";
    } else {
        $sql = "INSERT INTO clanki (naslov, opis, id_u) VALUES ('$naslov', '$opis', $id_u)";
        if (mysqli_query($link, $sql)) {
            header("Location: clanki.php");
            exit;
        } else {
            $error = "Napaka pri dodajanju članka.";
        }
    }
}
?>

<?php include 'navigacija.php'; ?>

<h2>Dodaj članek</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form action="" method="post">
    <label>Naslov:<br><input type="text" name="naslov" required></label><br><br>
    <label>Opis:<br><textarea name="opis" rows="8" cols="60" required></textarea></label><br><br>
    <input type="submit" value="Dodaj">
</form>

<p><a href="clanki.php">Nazaj na članke</a></p>
