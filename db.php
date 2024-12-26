<!DOCTYPE html>
<html lang="en">
<a href="http://localhost/pr/tite.php">testtest</a>
<head>
  <meta charset="UTF-8">
  <title>tableau</title>
</head>
<body>

    <form method="post" action="db.php">
      <input type="text" name="prenom" >
      <input type="submit" name="prenom" value="prenom " >
      <?php
      echo $_GET["prenom"];
      echo $_POST["prenom"];

      ?>


    </form>
    <?php
    $mysqlClient = new PDO(
      'mysql:host=localhost;dbname=tpphp;charset=utf8',
      'root',
      '1234'
    );
    ?>

</body>
</html>
