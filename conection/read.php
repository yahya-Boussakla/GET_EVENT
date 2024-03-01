<?php
 $quer = "SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY ID_VERSION HAVING VERSION.DATE > now()";
 $sql = $conn->prepare($quer);
 $sql->execute();
 $allEvents = $sql->fetchALL(PDO::FETCH_ASSOC);

 $another = "SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY ID_VERSION HAVING VERSION.DATE > now() AND ID_VERSION != :ID";
 $anotherEvents = $conn->prepare($another);
 


 $login = "SELECT ID_UTILISATEUR, PASSWORD , USERNAME FROM UTILISATEUR";
 $sql = $conn->prepare($login);
 $sql->execute();
 $authentificationInfo = $sql->fetchALL(PDO::FETCH_ASSOC);

 $reserve = "SELECT * FROM EVENEMENT INNER JOIN VERSION USING(ID_EVENT) WHERE ID_VERSION = :ID";
 $details = $conn->prepare($reserve);

 $lastFacture = "SELECT MAX(NUM_FACTURE) as numFactur FROM FACTURE";
 $sql = $conn->prepare($lastFacture);
 $sql->execute();
 $idFacture = $sql->fetchALL(PDO::FETCH_ASSOC);

 $numOfPlace = "SELECT MAX(PLACE)+1 as place FROM BILLET";
 $sql = $conn->prepare($numOfPlace);
 $sql->execute();
 $place = $sql->fetchALL(PDO::FETCH_ASSOC);

?>