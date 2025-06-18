<?php
include 'baza.php';
require_once 'seja.php';

if (!isset($_SESSION['id_vu']) or $_SESSION['id_vu'] != 1) {
    exit('Dostop prepovedan.');
}

$id_c = 0;
if (isset($_GET['id_c'])) $id_c = (int)$_GET['id_c'];
if ($id_c <= 0) exit('Neveljaven ID članka.');

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naslov = trim($_POST['naslov']);
    $opis = trim($_POST['opis']);

    if ($naslov == '' or $opis == '') {
        $error = 'Vsa polja so obvezna.';
    } else {
        $naslov = mysqli_real_escape_string($link, $naslov);
        $opis = mysqli_real_escape_string($link, $opis);

        $sql = "UPDATE clanki SET naslov='$naslov', opis='$opis' WHERE id_c=$id_c";
        if (mysqli_query($link, $sql)) {
            header('Location: clanki.php');
            exit;
        }
        $error = 'Napaka pri posodabljanju: ' . mysqli_error($link);
    }
}

$result = mysqli_query($link, "SELECT naslov, opis FROM clanki WHERE id_c=$id_c");
if (mysqli_num_rows($result) != 1) exit('Članek ni bil najden.');

$clanek = mysqli_fetch_assoc($result);
?>

<?php include 'navigacija.php'; ?>

<h2>Uredi članek</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <label>Naslov:<br>
        <input type="text" name="naslov" value="<?php echo htmlspecialchars($clanek['naslov']); ?>" required>
    </label><br><br>

    <label>Opis:<br>
        <textarea name="opis" rows="8" cols="60" required><?php echo htmlspecialchars($clanek['opis']); ?></textarea>
    </label><br><br>

    <input type="submit" value="Shrani">
</form>

<p><a href="clanki.php">Nazaj</a></p>
<?php include 'viri.php'; ?>
