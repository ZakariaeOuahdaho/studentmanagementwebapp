<?php
$etudiant[0] = 'Karim';
$etudiant[1] = 'Maroua';
$etudiant[2] = 'aya';
$etudiant[3] = 'mohammed';
$etudiant[4] = 'fatima';
$etudiant[5]="salim";

print_r($etudiant);
echo "<br>"

?>

<?php
$etudiant_push($etudiant, "salim");
print_r($etud);
echo "<br>";

unset($etud[array_search("karim", $etud)]);
print_r($etud);
echo "<br>";

if (array_search("mohammed", $etud)) {
  echo "  mohamed a été trouver trouvé \n";
}
else {echo "mohamed introuvable \n";}
echo "<br>";

$rep =array_search("salim", $etud);
$etud [$rep]="daniel";
print_r($etud);
echo "<br>";


?>








