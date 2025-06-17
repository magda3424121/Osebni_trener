<?php
include 'baza.php';
require_once 'seja.php';


if (!isset($_SESSION['id_vu']) || $_SESSION['id_vu'] != 1) {
    echo "Dostop prepovedan.";
    exit;
}

$id_t = isset($_GET['id_t']) ? (int)$_GET['id_t'] : 0;
if ($id_t <= 0) {
    echo "Neveljaven ID treninga.";
    exit;
}

$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];

    if ($ime === '') {
        $error = "Ime treninga je obvezno.";
    } else {
        $sql = "UPDATE treningi SET ime='$ime', opis='$opis' WHERE id_t=$id_t";
        if (mysqli_query($link, $sql)) {
            header('Location: treningi.php');
            exit;
        } else {
            $error = "Napaka pri posodabljanju: " . mysqli_error($link);
        }
    }
}


$result = mysqli_query($link, "SELECT * FROM treningi WHERE id_t=$id_t");
if (mysqli_num_rows($result) !== 1) {
    echo "Trening ne obstaja.";
    exit;
}
$trening = mysqli_fetch_assoc($result);
?>

<?php include 'navigacija.php'; ?>

<h1>Uredi trening</h1>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="">
    Ime treninga:<br>
    <input type="text" name="ime" value="<?php echo htmlspecialchars($trening['ime']); ?>" required><br><br>

    Opis treninga:<br>
    <textarea name="opis" rows="5" cols="40"><?php echo htmlspecialchars($trening['opis']); ?></textarea><br><br>

    <input type="submit" value="Shrani spremembe">
</form>

<p><a href="treningi.php">Nazaj na seznam treningov</a></p>
