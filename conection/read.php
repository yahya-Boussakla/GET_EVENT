<?php
 $quer = "SELECT ID_VERSION, TITRE , DATE , CATEGORIE , IMAGE , CAPACITE - COUNT(NUM_BILLET) AS 'DISPONIBLE' FROM BILLET INNER JOIN FACTURE USING(NUM_FACTURE) RIGHT JOIN VERSION USING(ID_VERSION) INNER JOIN EVENEMENT USING(ID_EVENT) INNER JOIN SALLE USING (NUM_SALLE) GROUP BY ID_VERSION HAVING VERSION.DATE > now()";
 $sql = $conn->prepare($quer);
 $sql->execute();
 $allEvents = $sql->fetchALL(PDO::FETCH_ASSOC);

 $login = "SELECT PASSWORD , USERNAME FROM utilisateur";
 $sql = $conn->prepare($login);
 $sql->execute();
 $authentificationInfo = $sql->fetchALL(PDO::FETCH_ASSOC);

?>