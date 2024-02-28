<?php
$ID = $_GET['id'];
include "../conection/database.php";
include "../conection/read.php";
$anotherEvents->bindParam(':ID',$ID);
$anotherEvents->execute();
$Events = $anotherEvents->fetchALL(PDO::FETCH_ASSOC);


$details->bindParam(':ID',$ID);
$details->execute();
$infoDetails = $details->fetchALL(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($infoDetails);
// echo "</pre>";
foreach ($infoDetails as $key => $value) {
   $TITLE = $value['TITRE'];
   $desc = $value['DESCRIPTION'];
   $normal = $value['TARIF_NORMAL'];
   $reduite = $value['TARIF_REDUIT'];
   $date = $value['DATE'];
}
echo $date;
echo json_encode($date);
?>