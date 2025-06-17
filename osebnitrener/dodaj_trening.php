<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1) {
    header('Location: prijava.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];

    $sql = "INSERT INTO treningi (ime, opis) VALUES ('$ime', '$opis')";
    if (mysqli_query($link, $sql)) {
        header('Location: treningi.php');
        exit;
    } else {
        echo "Napaka: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8" />
    <title>Dodaj trening</title>
</head>
<body>
<?php include_once 'navigacija.php'; ?>

<h1>Dodaj nov trening</h1>

<form method="post" action="">
    Ime treninga:<br>
    <input type="text" name="ime" required><br><br>

    Opis treninga:<br>
    <textarea name="opis" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="Dodaj">
</form>

<a href="treningi.php">Nazaj na seznam treningov</a>

</body>
</html>
