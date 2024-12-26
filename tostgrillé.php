<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecoleph";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function afficherEtudiants($conn) {
  $sql = "SELECT * FROM etudiants";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Prénom</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td></tr>";
    }
    echo "</table>";
  }
}

function afficherEtablissements($conn) {
  $sql = "SELECT * FROM etablissements";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Adresse</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["adresse"] . "</td></tr>";
    }
    echo "</table>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
<form method="post">
  <input type="submit" name="addetudiant" value="Ajouter un etudiant">
  <br><br>
  <input type="submit" name="addetabli" value="Ajouter un etablissement">
  <br><br>
  <input type="submit" name="printetudiant" value="Afficher liste etudiant">
  <br><br>
  <input type="submit" name="printetabli" value="Afficher l'etablissement">
</form>

<?php
if(isset($_POST['printetudiant'])) {
  afficherEtudiants($conn);
}
if(isset($_POST['printetabli'])) {
  afficherEtablissements($conn);
}
$conn->close();
?>
</body>
</html>
