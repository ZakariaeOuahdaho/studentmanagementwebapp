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
