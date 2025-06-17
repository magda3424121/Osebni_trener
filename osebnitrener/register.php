<!DOCTYPE html>
<html>
<head>
  <title>Registracija</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 10px;
      background: #f2f2f2;
    }
    form {
      max-width: 300px;
      background: #fff;
      padding: 15px;
      border: 1px solid #ccc;
    }
    input, select {
      width: 100%;
      padding: 6px;
      margin: 6px 0;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    a {
      display: block;
      margin-top: 10px;
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <h2>Registracija</h2>
  <form action="reg_vnos_sha1.php" method="post">
    <input type="text" name="ime" placeholder="Vnesi ime" required>
    <input type="text" name="priimek" placeholder="Vnesi priimek" required>
    <input type="email" name="email" placeholder="Vnesi email" required>
    <input type="password" name="geslo" placeholder="Vnesi geslo" required>
    <input type="date" name="rojstni_datum" required>
    
    Spol:
    <select name="spol" required>
      <option value="moški">Moški</option>
      <option value="ženski">Ženski</option>
    </select>
    
    <input type="number" name="visina" placeholder="Višina (cm)" required>
    <input type="number" name="teza" placeholder="Teža (kg)" required>
    
    <input type="hidden" name="id_vu" value="2">
    <input type="submit" value="Registriraj se">
  </form>

  <a href="prijava.php">Prijava</a>

</body>
</html>
