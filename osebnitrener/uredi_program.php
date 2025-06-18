<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    echo "Dostop prepovedan.";
    exit;
}
if (isset($_GET['id_p'])) {
    $id_p = (int)$_GET['id_p'];
} else {
    $id_p = 0;
}
if ($id_p <= 0) {
    echo "Neveljaven ID programa.";
    exit;
}
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $trajanje = $_POST['trajanje'];

    if ($ime == '' || $cena == '' || $trajanje == '') {
        $error = "Ime, cena in trajanje so obvezna polja.";
    } else {
        $sql = "UPDATE programi SET ime='$ime', opis='$opis', cena=$cena, trajanje='$trajanje' WHERE id_p=$id_p";
        if (mysqli_query($link, $sql)) {
            header('Location: programi.php');
            exit;
        } else {
            $error = "Napaka pri posodabljanju programa: " . mysqli_error($link);
        }
    }
}
$result = mysqli_query($link, "SELECT * FROM programi WHERE id_p=$id_p");
if (mysqli_num_rows($result) != 1) {
    echo "Program ni bil najden.";
    exit;
}
$program = mysqli_fetch_assoc($result);
?>
<?php include 'navigacija.php'; ?>

<h1>Uredi program</h1>

<?php if ($error != '') { echo "<p style='color:red;'>$error</p>"; } ?>

<form method="post" action="">
    Ime:<br>
    <input type="text" name="ime" value="<?php echo htmlspecialchars($program['ime']); ?>" required><br><br>
    Opis:<br>
    <input type="text" name="opis" value="<?php echo htmlspecialchars($program['opis']); ?>"><br><br>
    Cena:<br>
    <input type="number" step="0.01" name="cena" value="<?php echo $program['cena']; ?>" required><br><br>
    Trajanje (YYYY-MM-DD HH:MM:SS):<br>
    <input type="text" name="trajanje" value="<?php echo $program['trajanje']; ?>" required><br><br>
    <input type="submit" value="Shrani spremembe">
</form>

<p><a href="programi.php">Nazaj na programe</a></p>
<?php include 'viri.php'; ?>
