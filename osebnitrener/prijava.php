<!DOCTYPE html>
<html>
<head>
  <title>Prijava</title>
<style>
    body {
      font-family: Arial, sans-serif;
      padding: 10px;
      background: #fafafa;
    }
    form {
      max-width: 300px;
      background: #fff;
      padding: 10px;
      border: 1px solid #ccc;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      margin: 6px 0;
      padding: 6px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background: #28a745;
      color: white;
      border: none;
      padding: 8px;
      width: 100%;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background: #218838;
    }
    a {
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
    <?php include 'navigacija.php'; ?>
    <h2>Prijava</h2>
     <form action="prijava_preveri_sha1.php" method="post">
        vnesi email: <input type="email" name="email" /><br>
        vnesi geslo: <input type="password" name="geslo" /><br>
        <input type="submit" value="Prijava" />
      </form>
      <p>Ustvari račun <a href="register.php">Registracija</a></p>

    
    <hr>
  
  </div>
  <?php include 'viri.php'; ?>
</body>
</html>