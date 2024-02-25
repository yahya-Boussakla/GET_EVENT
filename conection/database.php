<?php
function getData($query){
  try {
      $conn = new PDO("mysql:host=localhost;dbname=bp14", "root", "");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $sql = $conn->prepare($query);
    $sql->execute();
    $result = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}
$quer = "SELECT ID_VERSION , DATE , TITRE , CATEGORIE , DESCRIPTION , IMAGE FROM version INNER JOIN evenement USING(ID_EVENT) WHERE DATE > now()";
//   echo "<pre>";
//   print_r($result);
//   echo "</pre>";
// $sql = $conn->prepare("SELECT COUNT(*) FROM version INNER JOIN FACTURE USING(ID_VERSION) INNER JOIN billet USING(NUM_FACTURE) WHERE ID_VERSION = 1;");
// $sql->execute();
// $billet = $sql->fetchALL(PDO::FETCH_ASSOC); 
$finishedEvent = "SELECT COUNT(NUM_BILLET), CAPACITE , ID_VERSION FROM billet INNER JOIN facture USING(NUM_FACTURE) INNER JOIN version USING(ID_VERSION) INNER JOIN salle USING (NUM_SALLE) GROUP BY ID_VERSION HAVING COUNT(NUM_BILLET) = CAPACITE";

?>