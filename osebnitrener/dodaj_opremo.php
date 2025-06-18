<?php
include 'baza.php';
require_once 'seja.php';


if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1) {
    header('Location: prijava.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $tip = $_POST['tip'];
    $opis = $_POST['opis'];
    $id_t = $_POST['id_t'] !== '' ? (int)$_POST['id_t'] : 'NULL';

    $sql = "INSERT INTO opreme (ime, tip, opis, id_t) VALUES ('$ime', '$tip', '$opis', $id_t)";
    if (mysqli_query($link, $sql)) {
        header('Location: oprema.php');
        exit;
    } else {
        echo "Napaka: " . mysqli_error($link);
    }
}


$treningi = mysqli_query($link, "SELECT id_t, ime FROM treningi");
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8" />
    <title>Dodaj opremo</title>
</head>
<body>
<?php include 'navigacija.php'; ?>

<h1>Dodaj novo opremo</h1>

<form method="post">
    Ime:<br>
    <input type="text" name="ime" required><br><br>

    Tip:<br>
    <input type="text" name="tip" required><br><br>

    Opis:<br>
    <textarea name="opis" rows="4" cols="40"></textarea><br><br>

    Trening:<br>
    <select name="id_t">
        <option value="">- izberi -</option>
        <?php while ($row = mysqli_fetch_assoc($treningi)): ?>
            <option value="<?= (int)$row['id_t'] ?>"><?= htmlspecialchars($row['ime']) ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <input type="submit" value="Dodaj">
</form>

<a href="oprema.php">Nazaj na seznam opreme</a>
<?php include 'viri.php'; ?>
</body>
</html>
