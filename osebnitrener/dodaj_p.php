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
    $cena = (float)$_POST['cena'];
    $trajanje = $_POST['trajanje']; 

    $sql = "INSERT INTO programi (ime, opis, cena, trajanje) VALUES ('$ime', '$opis', $cena, '$trajanje')";
    if (mysqli_query($link, $sql)) {
        header('Location: programi.php');
        exit;
    } else {
        echo "Napaka: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj program</title>
</head>
<body>
<?php include 'navigacija.php'; ?>

<h2>Dodaj program</h2>
<form method="post">
  <label>Ime:</label><br>
  <input type="text" name="ime" required><br><br>

  <label>Opis:</label><br>
  <textarea name="opis" rows="4" cols="40"></textarea><br><br>

  <label>Cena (€):</label><br>
  <input type="number" step="0.01" name="cena" required><br><br>

  <label>Trajanje (YYYY-MM-DD HH:MM:SS):</label><br>
  <input type="text" name="trajanje" required placeholder="2025-06-16 10:00:00"><br><br>

  <input type="submit" value="Dodaj">
</form>

</body>
</html>
