<?php
include 'baza.php';
require_once 'seja.php';


if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    echo "Dostop prepovedan.";
    exit;
}


$id_c = isset($_GET['id_c']) ? (int)$_GET['id_c'] : 0;
if ($id_c <= 0) {
    echo "Neveljaven ID članka.";
    exit;
}

$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['naslov'];
    $opis = $_POST['opis'];

    if ($naslov === '' || $opis === '') {
        $error = "Vsa polja so obvezna.";
    } else {
        $sql = "UPDATE clanki SET naslov='$naslov', opis='$opis' WHERE id_c=$id_c";
        if (mysqli_query($link, $sql)) {
            header('Location: clanki.php');
            exit;
        } else {
            $error = "Napaka pri posodabljanju: " . mysqli_error($link);
        }
    }
}

// Pridobi obstoječe podatke članka
$result = mysqli_query($link, "SELECT naslov, opis FROM clanki WHERE id_c=$id_c");
if (mysqli_num_rows($result) !== 1) {
    echo "Članek ni bil najden.";
    exit;
}
$clanek = mysqli_fetch_assoc($result);
?>

<?php include 'navigacija.php'; ?>

<h2>Uredi članek</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="">
    <label>Naslov:<br>
        <input type="text" name="naslov" value="<?php echo htmlspecialchars($clanek['naslov']); ?>" required>
    </label><br><br>

    <label>Opis:<br>
        <textarea name="opis" rows="8" cols="60" required><?php echo htmlspecialchars($clanek['opis']); ?></textarea>
    </label><br><br>

    <input type="submit" value="Shrani">
</form>

<p><a href="clanki.php">Nazaj</a></p>
