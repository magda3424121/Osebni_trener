<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu'])) {
    header('Location: prijava.php');
    exit;
}

$sql = "SELECT * FROM treningi ORDER BY ime";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <link rel="stylesheet" href="css/treningi.css">
    <meta charset="UTF-8" />
    <title>Seznam treningov</title>
</head>
<body>
<?php include 'navigacija.php'; ?>

<h2>Seznam treningov</h2>

<?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
    <a class="aa" href="dodaj_trening.php">Dodaj nov trening</a><br><br>
<?php endif; ?>

<table>
    <tr>
        <th>Ime treninga</th>
        <th>Opis</th>
        <?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
            <th>Uredi</th>
            <th>Izbriši</th>
        <?php endif; ?>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= htmlspecialchars($row['ime']) ?></td>
        <td><?= htmlspecialchars($row['opis']) ?></td>
        <?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
            <td><a href="uredi_trening.php?id_t=<?= $row['id_t'] ?>">Uredi</a></td>
            <td><a href="izbrisi_trening.php?id_t=<?= $row['id_t'] ?>" onclick="return confirm('Ste prepričani?')">Izbriši</a></td>
        <?php endif; ?>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
