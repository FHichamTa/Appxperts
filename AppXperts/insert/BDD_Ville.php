<?php

echo "test";

include 'mesFonctionsGenerales.php';

echo "test";

$fichier = fopen("comune (1).csv","r");
$cnxBDD = connexion();

echo "test";

$INSEE = "";
$postal = "";
$nom = "";

echo "test";

while (($donnees = fgetcsv($fichier,2400,";")) != False){
  if ($donnees[2] != "Commune"){
    $INSEE = $donnees[0];
    $postal = $donnees[1];
    $nom = $donnees[2];
    if (str_contains($nom, "'")) {
      echo "oui<br />";
      $nom = str_replace("'", "`", $nom);
    }
    
    $sql = "INSERT INTO COMMUNE(VILIDINSEE,VILIDPOSTAL,VILNOM) VALUES ('$INSEE','$postal','$nom');";
    echo "Sql : ".$sql."<br />";
    $result = $cnxBDD->query($sql);
  }
}

$cnxBDD->close();
?>