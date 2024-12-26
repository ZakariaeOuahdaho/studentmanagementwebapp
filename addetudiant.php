<?php
include "serv.php";


if(isset($_POST['submit'])) {

  $prenom = $_POST['inprenom'];
  $nom = $_POST['innom'];
  $id_etabli = $_POST['inid_etabli'];

  $check_etabli = $conn->prepare("SELECT id_etabli FROM etablissement WHERE id_etabli = ?");
  $check_etabli->bind_param("i", $id_etabli);
  $check_etabli->execute();
  $result = $check_etabli->get_result();

  if($result->num_rows > 0) {
    $stmt = $conn->prepare("INSERT INTO etudiant (prenom, nom, id_etabli) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi",$prenom, $nom, $id_etabli);

    if ($stmt->execute()) {
      echo "<p style='color: green; text-align: center;'>sire rak naje7.</p>";
    } else {
      echo "<p style='color: red; text-align: center;'>AYAYAYA CHWIIIYA 3AL 9 : " . $conn->error . "</p>";
    }
    $stmt->close();
  } else {
    echo "<p style='color: red; text-align: center;'>id etablissement  " . $id_etabli . " makayenche .</p>";
  }
  $check_etabli->close();
}

$sql = "SELECT * FROM etablissement";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ajouter un etudiant </title>
</head>
<body>
<form method="post">
  <div id="inputetudmain">
    <div id="inboxeetud2">
      <input name="inprenom" type="text" placeholder="Entrer le prénom" id="inprenom" required>
    </div>
    <div id="inboxeetud3">
      <input name="innom" type="text" placeholder="Entrer le nom de l'étudiant" id="innom" required>
    </div>
    <div id="inboxeetud4">
      <select name="inid_etabli" id="inetabli" required>
        <option value="">Choisir l'établissement</option>
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id_etabli"] . "'>" . $row["nom_etabli"] . "</option>";
          }
        }
        ?>
      </select>
    </div>
    <input type="submit" value="Ajouter l'étudiant" name="submit">
  </div>
</form>

</body>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg,
    rgba(255, 255, 255, 1) 0%,
    rgba(200, 230, 255, 0.8) 35%,
    rgba(200, 255, 220, 0.8) 65%,
    rgba(255, 255, 255, 1) 100%
    );
  }

  #inboxetud,
  #inboxeetud2,
  #inboxeetud3,
  #inboxeetud4 {
    display: inline-block;
    margin-bottom: 1.5rem;
  }

  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e1e1e1;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.3s ease;
    outline: none;
  }

  input[type="text"]:focus,
  input[type="number"]:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
  }

  input[type="text"]:hover,
  input[type="number"]:hover {
    border-color: #999;
  }

  input[type="submit"] {
    width: 100%;
    background-color: #4a90e2;
    color: white;
    padding: 0.8rem;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
  }

  input[type="submit"]:hover {
    background-color: #357abd;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);
  }

  select {
    width: 100%;
    padding: 0.8rem;
    border: 2px solid #e1e1e1;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 300;
    transition: all 0.3s ease;
    outline: none;
    background-color: #ffffff;
  }

  select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
  }

  select:hover {
    border-color: #999;
  }

  input[type="submit"]:active {
    transform: translateY(0);
  }

  @media (max-width: 768px) {
    #inputetudmain {
      margin: 1rem;
      padding: 1.5rem;
    }

    input[type="text"],
    input[type="number"] {
      padding: 0.7rem;
      font-size: 0.9rem;
    }
  }
</style>
</html>
