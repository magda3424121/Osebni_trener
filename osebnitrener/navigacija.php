<?php require_once 'seja.php'; ?>
<style>
nav {
  background-color: black;
  padding: 10px;
  text-align: center;
}

h1{
  color:White;
  
}
nav a {
  color: white;
  margin-right: 15px;
  font-weight: bold;
}

#bela{
    color:white;
}
nav a:hover {
  text-decoration: underline;
}
</style>
<nav>
  <h1 id="opis">Osebni trener ŠCV</h1>
  <a href="index.php">Domov</a> |
  <a href="programi.php">Programi</a> |
  <a href="oprema.php">Oprema</a> |
  <a href="treningi.php">Treningi</a> |
  <a href="clanki.php">Članki</a> |

  <?php if (isset($_SESSION['idu'])): ?>
  <span id="bela"> Pozdravljen/a, <?= htmlspecialchars($_SESSION['ime']) ?> </span> |
  <a href="odjava.php">Odjava</a>
<?php else: ?>
  <a href="prijava.php">Prijava</a> |
  <a href="register.php">Registracija</a>
<?php endif; ?>
</nav>
<hr>