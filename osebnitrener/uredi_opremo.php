<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1 || !isset($_GET['id_o'])) {
    header('Location: prijava.php');
    exit;
}

$id_o = (int)$_GET['id_o'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $tip = $_POST['tip'];
    $opis = $_POST['opis'];
    $id_t = $_POST['id_t'] ?? 'NULL';

    if ($id_t === '') {
        $id_t = 'NULL';
    }

    $sql = "UPDATE opreme SET ime='$ime', tip='$tip', opis='$opis', id_t=$id_t WHERE id_o=$id_o";

    if (mysqli_query($link, $sql)) {
        header('Location: oprema.php');
        exit;
    } else {
        echo "Napaka: " . mysqli_error($link);
    }
}


$result = mysqli_query($link, "SELECT * FROM opreme WHERE id_o=$id_o");

if (mysqli_num_rows($result) !== 1) {
    echo "Oprema ne obstaja.";
    exit;
}

$oprema = mysqli_fetch_assoc($result);


$treningi = mysqli_query($link, "SELECT id_t, ime FROM treningi");
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8" />
    <title>Uredi opremo</title>
</head>
<body>
<?php include_once 'navigacija.php'; ?>

<h1>Uredi opremo</h1>

<form method="post" action="">
    Ime:<br>
    <input type="text" name="ime" value="<?php echo $oprema['ime']; ?>" required><br><br>

    Tip:<br>
    <input type="text" name="tip" value="<?php echo $oprema['tip']; ?>" required><br><br>

    Opis:<br>
    <textarea name="opis" rows="4" cols="40"><?php echo $oprema['opis']; ?></textarea><br><br>

    Trening:<br>
    <select name="id_t">
        <option value="">- izberi -</option>
        <?php while ($row = mysqli_fetch_assoc($treningi)): ?>
            <option value="<?php echo $row['id_t']; ?>" <?php if ($row['id_t'] == $oprema['id_t']) echo 'selected'; ?>>
                <?php echo $row['ime']; ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <input type="submit" value="Shrani spremembe">
</form>

<a href="oprema.php">Nazaj na seznam opreme</a>

</body>
</html>