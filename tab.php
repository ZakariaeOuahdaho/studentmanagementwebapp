<!DOCTYPE html>
<html lang="en">
<a href="http://localhost/pr/tite.php">link de la base php</a>
<link rel="stylesheet" href="styletab.css">
<head>
  <meta charset="UTF-8">
  <title>tableau</title>
</head>
<body>

  <?php
  echo "zakariae ouahdaho fait le 17/12/24";
  echo "<br>";

  ?>
<div class="exo">
  <h1>ajout d'un nouvel element </h1>
  <div class="ajout">

    <?php
    $etud = array("karim", "maroua", "aya", "mohammed");
    print_r($etud);
    echo "<br>";

    array_push($etud, "salim");
    print_r($etud);
    echo "<br>";
    ?>
  </div>


  <h1>suprimer un élément </h1>
  <div class="suppr">

    <?php
    unset($etud[array_search("karim", $etud)]);
    print_r($etud);
    echo "<br>";

    ?>
  </div>
  <h1>recherche element</h1>
  <div class="recherche">

    <?php
    if (array_search("mohammed", $etud)) {
      echo "  mohamed a été trouver trouvé \n";
    }
    else {echo "mohamed introuvable \n";}
    echo "<br>";
    ?>
  </div>
  <h1>modifier un element </h1>
  <div class="modif">

    <?php
    $rep =array_search("salim", $etud);
    $etud [$rep]="daniel";
    print_r($etud);
    echo "<br>";

    ?>
  </div>

  <h1>parcourire le tableau</h1>
  <div class="parcour">

    <?php
    foreach ($etud as $value) {
      echo($value."\n");
    }
    echo "<br>";
    ?>
  </div>

  <h1>trier le tableau</h1>
  <div class="trier">

    <?php
    sort($etud);
    print_r($etud);
    echo "<br>";
    ?>
  </div>

  <h1>invercer le trie</h1>

  <div class="tireinv">

    <?php
    rsort($etud);
    print_r($etud);
    echo "<br>";
    ?>
  </div>

  <h1>compter le nombre d éléemnt </h1>
  <div class="compter">

    <?php
    $nbr=count($etud);
    echo "nombre d element est $nbr";
    echo "<br>";
    ?>
  </div>

  <h1>tableau multidimention </h1>
  <div class="tableaumulti">

    <?php
    $etud=[
      "karim"=> 22,
      "maroua"=> 33,
      "aya"=> 44,
      "mohammed"=> 55,
    ];
    print_r($etud);
    ?>
  </div>
  </div>


</body>

</html>

