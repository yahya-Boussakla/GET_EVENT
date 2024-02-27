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
};
$quer = "SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY ID_VERSION HAVING VERSION.DATE > now()";

$login = "SELECT PASSWORD , USERNAME FROM UTILISATEUR";

// $signUp = "INSERT INTO UTILISATEURE (NOM,PRENOM,)";
?>