<?php

 $signUp = "INSERT INTO UTILISATEUR (NOM, PRENOM, EMAIL, USERNAME, PASSWORD) VALUES(:NAME, :LASTNAME, :EMAIL, :USERNAME, :PASSWORD)";
 $signUpPrepare = $conn->prepare($signUp);

$reserve = "INSERT INTO FACTURE (ID_UTILISATEUR, ID_VERSION, DATE_ACHAT) VALUES(:ID_USER, :ID_VERSION, :DATE_ACHAT)";
$reservePrepare =$conn->prepare($reserve); 

$billet = "INSERT INTO BILLET (NUM_FACTURE, TYPE, PLACE) VALUES(:NUM_FACTURE, :TYPE, :PLACE)";
$billetPrepare = $conn->prepare($billet);

 
?>