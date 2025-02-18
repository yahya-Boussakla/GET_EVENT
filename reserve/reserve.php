<?php
$ID = $_GET['id'];
include "../conection/database.php";
include "../conection/read.php";
include "../conection/create.php";
$anotherEvents->bindParam(':ID',$ID);
$anotherEvents->execute();
$Events = $anotherEvents->fetchALL(PDO::FETCH_ASSOC);

session_start();

$details->bindParam(':ID',$ID);
$details->execute();
$infoDetails = $details->fetchALL(PDO::FETCH_ASSOC);


foreach ($infoDetails as $key => $value) {
   $TITLE = $value['TITRE'];
   $desc = $value['DESCRIPTION'];
   $normal = $value['TARIF_NORMAL'];
   $reduite = $value['TARIF_REDUIT'];
   $date = $value['DATE'];
   $dispo = $value['DISPONIBLE'];
}
$finish = false;
if (isset($_POST['logout'])){
    session_destroy();
    header("Location: index.php?id=".$ID);
}
if (isset($_POST['buy'])) {
        if (isset($_SESSION['id'])) {

         if ($dispo <= 0) {
            $_GET['type'] = '';
            $_GET['message'] = "event plein";
         }

         else {

            if ($dispo >= ifnul($_POST['nbNormale']) + ifnul($_POST['nbReduite'])) {  

               $normale = "normale";
               $reduite = "reduite";
               $date = date("Y-m-d h:i:s");
               
               $reservePrepare->bindParam(':ID_USER', $_SESSION['id']);
               $reservePrepare->bindParam(':ID_VERSION', $ID);
               $reservePrepare->bindParam(':DATE_ACHAT', $date);
               $reservePrepare->execute();
               
               $lastFacture = "SELECT MAX(NUM_FACTURE) as numFactur FROM FACTURE";
               $sql = $conn->prepare($lastFacture);
               $sql->execute();
               $idFacture = $sql->fetchALL(PDO::FETCH_ASSOC);
               $fac = $idFacture[0]['numFactur'];
       
       
               $numOfPlace = "SELECT count(PLACE)+1 as place FROM BILLET";
               $sql = $conn->prepare($numOfPlace);
              
               
               for ($i=0; $i < (int)$_POST['nbNormale']; $i++) { 
                   $sql->execute();
                   $place = $sql->fetchALL(PDO::FETCH_ASSOC)[0]['place'];
                   $billetPrepare->bindValue(':FAC', $fac);
                   $billetPrepare->bindValue(':typ', $normale);
                   $billetPrepare->bindValue(':place', $place);
                   $billetPrepare->execute();
               }
       
               for ($i=0; $i < (int)$_POST['nbReduite']; $i++) { 
                   $sql->execute();
                   $place = $sql->fetchALL(PDO::FETCH_ASSOC)[0]['place'];
                   $billetPrepare->bindValue(':FAC', $fac);
                   $billetPrepare->bindValue(':typ', $reduite);
                   $billetPrepare->bindValue(':place', $place);
                   $billetPrepare->execute();
               }
               $_GET['type'] = "sucsess";
               $_GET['message'] = "sucsess";
            }
            else{
                $_GET['message'] =  "only ". $dispo. " places are available";
            }
         }
   
        }
        else {
            $_GET['message'] =  "go sign up";
        }
    }             


function ifnul($parame){
    if (empty($parame)) {
        return $parame = 0;
    }
    else {
        return $parame;
    }
}
?>