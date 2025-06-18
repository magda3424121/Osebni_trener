<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['idu']) || $_SESSION['id_vu'] != 1 || !isset($_GET['id_o'])) {
    header('Location: prijava.php');
    exit;
}

$id_o = (int)$_GET['id_o'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = mysqli_real_escape_string($link, $_POST['ime']);
    $tip = mysqli_real_escape_string($link, $_POST['tip']);
    $opis = mysqli_real_escape_string($link, $_POST['opis']);
    $id_t = $_POST['id_t'] == '' ? 'NULL' : (int)$_POST['id_t'];

    $sql = "UPDATE opreme SET ime='$ime', tip='$tip', opis='$opis', id_t=$id_t WHERE id_o=$id_o";

    if (mysqli_query($link, $sql)) {
        header('Location: oprema.php');
        exit;
    } else {
        echo "Napaka: " . mysqli_error($link);
    }
}

$result = mysqli_query($link, "SELECT * FROM opreme WHERE id_o=$id_o");
if (mysqli_num_rows($result) != 1) {
    exit('Oprema ne obstaja.');
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
<?php include 'navigacija.php'; ?>

<h1>Uredi opremo</h1>

<form method="post">
    Ime:<br>
    <input type="text" name="ime" value="<?php echo htmlspecialchars($oprema['ime']); ?>" required><br><br>
    Tip:<br>
    <input type="text" name="tip" value="<?php echo htmlspecialchars($oprema['tip']); ?>" required><br><br>
    Opis:<br>
    <textarea name="opis" rows="4" cols="40"><?php echo htmlspecialchars($oprema['opis']); ?></textarea><br><br>
    Trening:<br>
    <select name="id_t">
        <option value="">- izberi -</option>
        <?php while ($row = mysqli_fetch_assoc($treningi)) { ?>
            <option value="<?php echo $row['id_t']; ?>" <?php if ($row['id_t'] == $oprema['id_t']) { echo 'selected'; } ?>>
                <?php echo htmlspecialchars($row['ime']); ?>
            </option>
        <?php } ?>
    </select><br><br>
    <input type="submit" value="Shrani spremembe">
</form>

<a href="oprema.php">Nazaj na seznam opreme</a>
<?php include 'viri.php'; ?>
</body>
</html>
