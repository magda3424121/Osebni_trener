<?php
include 'baza.php';
require_once 'seja.php';

$id_u = $_SESSION['idu'] ?? 0;

$sql = "SELECT * FROM programi ORDER BY id_p DESC";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8" />
    <title>Programi</title>
    <link rel="stylesheet" href="css/programi.css">
</head>
<body>
<?php include 'navigacija.php'; ?>
<h2>Programi</h2>
<?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
    <p><a href="dodaj_p.php">Dodaj program</a></p>
<?php endif; ?>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="program">
        <h3><?= $row['ime'] ?></h3>
        <p>Opis: <?= $row['opis'] ?></p>
        <p>Cena: <?= $row['cena'] ?> €</p>
        <p>Trajanje: <?= $row['trajanje'] ?></p>
            
        <?php if ($id_u): ?>
            <?php
            $sql2 = "SELECT * FROM uporabniki_programi WHERE id_u = $id_u AND id_p = " . $row['id_p'];
            $res2 = mysqli_query($link, $sql2);
            ?>
            
            <?php if (mysqli_num_rows($res2) > 0): ?>
                <form method="POST" action="odjava_program.php">
                    <input type="hidden" name="id_p" value="<?= $row['id_p'] ?>">
                    <input type="submit" value="Odjavi se od programa">
                </form>
            <?php else: ?>
                <form method="POST" action="prijava_program.php">
                    <input type="hidden" name="id_p" value="<?= $row['id_p'] ?>">
                    <input type="submit" value="Prijavi se na program">
                </form>
            <?php endif; ?>

        <?php else: ?>
            <p><a href="prijava.php">Prijavi se, da se lahko prijaviš na program</a></p>
        <?php endif; ?>
            <?php if (isset($_SESSION['id_vu']) && $_SESSION['id_vu'] == 1): ?>
            <td><a href="uredi_program.php?id_p=<?= $row['id_p'] ?>">Uredi</a></td>
            <td><a href="izbrisi_program.php?id_p=<?= $row['id_p'] ?>" onclick="return confirm('Ste prepričani?')">Izbriši</a></td>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
<?php include 'viri.php'; ?>
</body>
</html>