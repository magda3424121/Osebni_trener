<?php
include 'baza.php';
require_once 'seja.php';

if (isset($_SESSION['id_vu'])) {
    $id_vu = $_SESSION['id_vu'];
} else {
    $id_vu = 0;
}

if (isset($_SESSION['idu'])) {
    $id_u = $_SESSION['idu'];
} else {
    $id_u = 0;
}

$sql = "SELECT clanki.*, uporabniki.ime, uporabniki.priimek 
        FROM clanki 
        JOIN uporabniki ON clanki.id_u = uporabniki.id_u
        ORDER BY clanki.id_c DESC";
$result = mysqli_query($link, $sql);

include 'navigacija.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8" />
    <title>Članki</title>
    <link rel="stylesheet" href="css/clanki.css">
</head>
<body>

<h2>Članki</h2>

<?php if ($id_vu == 1): ?>
    <p><a href="dodaj_clanek.php">Dodaj nov članek</a></p>
<?php endif; ?>

<?php while ($clanek = mysqli_fetch_assoc($result)): ?>
    <article>
        <h2><?= htmlspecialchars($clanek['naslov']) ?></h2>
        <p><?= nl2br(htmlspecialchars($clanek['opis'])) ?></p>
        <p><em>Avtor: <?= htmlspecialchars($clanek['ime']) . ' ' . htmlspecialchars($clanek['priimek']) ?></em></p>

        <?php if ($id_vu == 1): ?>
            <p>
                <a href="uredi_clanek.php?id_c=<?php echo $clanek['id_c']; ?>">Uredi</a> |
                <a href="izbrisi_clanek.php?id_c=<?php echo $clanek['id_c']; ?>" onclick="return confirm('Res želite izbrisati ta članek?')">Izbriši</a>

            </p>
        <?php endif; ?>

        <h3>Komentarji:</h3>
        <?php
        $id_c = $clanek['id_c'];
        $kom_sql = "SELECT komentarji.*, uporabniki.ime, uporabniki.priimek 
                    FROM komentarji
                    JOIN uporabniki ON komentarji.id_u = uporabniki.id_u
                    WHERE komentarji.id_c = $id_c
                    ORDER BY komentarji.id_k DESC";
        $kom_result = mysqli_query($link, $kom_sql);
        ?>

        <?php
            if (mysqli_num_rows($kom_result) > 0) {
            while ($kom = mysqli_fetch_assoc($kom_result)) {
                echo '<div class="komentar">';
                echo '<strong>' . htmlspecialchars($kom['ime'] . ' ' . $kom['priimek']) . ':</strong><br>';
                echo nl2br(htmlspecialchars($kom['opis']));
                echo '</div>';
            }
        }   else {
                echo '<p>Ni komentarjev.</p>';
                }
?>

        <?php if ($id_u): ?>
            <form action="dodaj_komentar.php" method="post" class="komentar-form">
                <input type="hidden" name="id_c" value="<?= $id_c ?>">
                <textarea name="opis" rows="3" cols="50" placeholder="Vaš komentar..." required></textarea><br>
                <input type="submit" value="Dodaj komentar">
            </form>
        <?php else: ?>
            <p>Za dodajanje komentarjev se <a href="prijava.php">prijavite</a>.</p>
        <?php endif; ?>
    </article>
    <hr>
<?php endwhile; ?>
</body>
<footer>
<?php include 'viri.php'; ?>
</footer>
</html>