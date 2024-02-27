<?php

 $signUp = "INSERT INTO UTILISATEUR (NOM, PRENOM, EMAIL, USERNAME, PASSWORD) VALUES(:NAME, :LASTNAME, :EMAIL, :USERNAME, :PASSWORD)";
 $signUpPrepare = $conn->prepare($signUp);


 
?>