<?php
include 'baza.php';
require_once 'seja.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
<meta charset="UTF-8" />
<title>Osebni trener - Domov</title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>



<nav>
  <?php include 'navigacija.php'; ?>
</nav>
<p class="opiss">Na naši spletni strani najdeš kakovostne programe treningov, prilagojene tvojim potrebam, <br>
  koristne članke o zdravem načinu življenja in osebnem razvoju ter širok izbor opreme za trening. <br>
  Prijavi se na izbran program, preberi nasvete strokovnjakov ali pa nas kontaktiraj – tu smo, da ti pomagamo doseči tvoje cilje!</P>
<div id="glavni">
  <div id="levi">
    <h2>Najnovejši programi</h2>
    <?php
    
        echo "<p>Ni programov.</p>";
    
    ?>
  </div>

  <div id="srednji">
    <h2>Članki</h2>
    <?php
    
        echo "<p>Ni člankov.</p>";
    
    ?>
  </div>

  <div id="desni">
    <h2>Pišite nam</h2>
    <form action="process/poslji_sporocilo.php" method="POST">
      Ime:<br>
      <input type="text" name="ime"><br><br>

      Priimek:<br>
      <input type="text" name="priimek"><br><br>

      Email:<br>
      <input type="text" name="email"><br><br>

      Sporočilo:<br>
      <textarea name="sporocilo" rows="5"></textarea><br><br>

      <input type="submit" value="Pošlji">
    </form>
  </div>
</div>

</body>
</html>
