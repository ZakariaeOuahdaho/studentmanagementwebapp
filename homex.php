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

<?php
function afficherEtudiants($conn)
{
  $sql = "SELECT * FROM etudiant";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>id etablissemnt</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id_etud"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["id_etabli"] . "</td></tr>";
    }
    echo "</table>";
  }
  else{
    echo "0 results";
  }
}




function afficherEtablissements($conn) {
  $sql = "SELECT * FROM etablissement";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nom";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id_etabli"] . "</td><td>" . $row["nom_etabli"]  ;
    }
    echo "</table>";
  }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>home </title>
</head>


<body>
  <form action="addetudiant.php">
    <div id="addetudiant">
      <input type="submit" id="addetudiant " name="addetudiant" value="ajouter un etudiant" >
    </div>
    <br>
  </form>

  <form action="addetablissement.php">
    <div id="addetabli">
      <input type="submit" id="addeetabli" name="addetabli" value="ajouter un etablissement">
    </div>
  </form>

  <form method="POST">
    <br>
    <div id="printetudiant">
      <input type="submit" id="printetudiant" name="printetudiant" value="afficher liste etudiant">
    </div>
    <br>
    <div id="printetabli">
      <input type="submit" id="printetabli" name="printetabli" value="afficher l etablissement ">
    </div>


  </form>







</body>
<style>
  /* Reset et styles de base */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    min-height: 100vh;
    padding: 2rem;
    background: linear-gradient(135deg,
    rgba(255, 255, 255, 1) 0%,
    rgba(200, 230, 255, 0.8) 35%,
    rgba(200, 255, 220, 0.8) 65%,
    rgba(255, 255, 255, 1) 100%
    );
  }
  input[type="text"]{
    width: 100%;
    max-width: 400px;
    padding: 1rem;
    border: none;
    border-radius: 4px;
    background-color: #abc6e4;
    color: white;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 1rem;

  }

  input[type="number"]{
    width: 100%;
    max-width: 400px;
    padding: 1rem;
    border: none;
    border-radius: 4px;
    background-color: #abc6e4;
    color: white;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 1rem;


  }
  /* Style des boutons */
  input[type="submit"] {
    width: 100%;
    max-width: 400px;
    padding: 1rem;
    border: none;
    border-radius: 8px;

    background-color: #4a90e2;
    color: white;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
  }

  input[type="submit"]:hover {
    background-color: rgba(25, 168, 79, 0.8);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);
  }

  input[type="submit"]:active {
    transform: translateY(0);
  }

  /* Style des divs conteneurs */
  #addetudiant, #addetabli, #printetudiant, #printetabli {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
  }


  /* Style des tableaux */
  table {
    width: 100%;
    max-width: 900px;
    margin: 2rem auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  }

  th {
    background-color: #4a90e2;
    color: white;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
  }

  td {
    padding: 1rem;
    border-bottom: 1px solid #eee;
    color: #333;
  }

  tr:last-child td {
    border-bottom: none;
  }

  tr:hover {
    background-color: #f8f9fa;
  }

  /* Message d'erreur ou de succès */
  form + p {
    text-align: center;
    margin-top: 1rem;
    font-weight: 500;
    color: #333;
  }

  /* Responsive design */
  @media (max-width: 768px) {
    body {
      padding: 1rem;
    }

    table {
      font-size: 0.9rem;
    }

    th, td {
      padding: 0.75rem;
    }

    input[type="submit"] {
      padding: 0.8rem;
      font-size: 0.9rem;
    }
  }

  /* Animation d'apparition pour les tableaux */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  table {
    animation: fadeIn 0.5s ease;
  }
</style>
</html>

<?php
echo 'rak wa3erre';
if(isset($_POST['printetudiant'])) {
  afficherEtudiants($conn);
}
if(isset($_POST['printetabli'])) {
  afficherEtablissements($conn);
}
if(isset($_POST['addetudiant'])) {

  header('location:addetudiant.php');
}
if (isset($_POST['addetabli'])) {
  ajouterEtablissements($conn);
}
$conn->close();

?>
