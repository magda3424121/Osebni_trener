<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu'])) {
    header('Location: prijava.php');
    exit;
}

$sql = "SELECT o.id_o, o.ime, o.tip, o.opis, t.ime AS trening_ime
        FROM opreme o
        INNER JOIN treningi t ON o.id_t = t.id_t
        ORDER BY o.ime";
$result = mysqli_query($link, $sql);

include 'navigacija.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <link rel="stylesheet" href="css/oprema.css">
    <meta charset="UTF-8">
    <title>Seznam opreme</title>
    
</head>
<body>

<h2>Seznam opreme</h2>

<?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
    <p><a href="dodaj_opremo.php">Dodaj opremo</a></p>
<?php endif; ?>

<table>
    <tr>
        <th>Ime</th>
        <th>Tip</th>
        <th>Opis</th>
        <th>Trening</th>
        <?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
            <th>Uredi</th>
            <th>Izbriši</th>
        <?php endif; ?>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['ime'] ?></td>
        <td><?= $row['tip'] ?></td>
        <td><?= $row['opis'] ?></td>
        <td><?= $row['trening_ime'] ?></td>
        <?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
            <td><a href="uredi_opremo.php?id_o=<?= $row['id_o'] ?>">Uredi</a></td>
            <td><a href="izbrisi_opremo.php?id_o=<?= $row['id_o'] ?>" onclick="return confirm('Ste prepričani?')">Izbriši</a></td>
        <?php endif; ?>
    </tr>
    <?php endwhile; ?>
</table>
<?php include 'viri.php'; ?>
</body>
</html>
