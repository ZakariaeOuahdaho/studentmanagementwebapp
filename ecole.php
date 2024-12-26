<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ecoleph";
  $conn = new mysqli($servername, $username, $password, $dbname, 3306);
  if ($conn->connect_error) {
    echo "AY AY AY CHWWWYYA 3AL 9 " . $conn->connect_error;
  }

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>login page</title>
  <link href="foretudiant.css" rel="stylesheet">
  <style>

  </style>
</head>
<body>
  <div id="logincontainer">
    <form name="logininfo" method="POST">
      <label> email :</label>
      <input type="email" id="useremail" name="useremail">
      <br><br>

      <label>password:</label>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" id="button" value="log in" name="submit">
      <?php
        if (isset($_POST['submit'])){
          $email = $_POST['useremail'];
          $password = $_POST['password'];
          $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
          $result = mysqli_query($conn, $sql);
          if (!$result || mysqli_num_rows($result) <= 0) {
            echo 'AYAYYAYAY CHWIIIIYA 3AL JOUJE  ';
            return false;
          } else{
            header('location: http://localhost/pr/homex.php');
          }
        }

      ?>
    </form>

  </div>
</body>
</html>

