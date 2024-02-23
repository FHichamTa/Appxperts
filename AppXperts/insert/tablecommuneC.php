 <?php

function connexion(){
  $host = "localhost";
      $user = "root";
      $password = "Iroise29";
      $dbname = "AppXperts";
      $port ="18102";

      $mysqli = new mysqli($host, $user, $password, $dbname, $port);
      if ($mysqli->connect_errno) {
          echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          return($mysqli->connect_errno);
      }
      return $mysqli;

}
// Appelle Fonction pour ouvrir SQL
$cnx = connexion();
// Ouvre le fichier CSV en lecture
$fp = fopen('comune.csv', 'r');

while ($fg = fgets($fp)) {

// Commande cassant la chaine de caractère (une ligne) [$fg] à chaque [;]
  $partie = explode(";", $fg);
  $codeI = $partie[0];  
  $codeP = $partie[1];  
  $commune = $partie[2];
$sql= "INSERT INTO COMMUNE(VILID, VILCP, VILNOM) VALUES ( '$codeI', '$codeP', '$commune');";
$cnx->query($sql);
}
$cnx->close($sql);
// Ferme le fichier CSV
fclose($fp);

?> 