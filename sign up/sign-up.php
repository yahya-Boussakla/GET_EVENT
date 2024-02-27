<?php
include "../conection/database.php";
include "../conection/create.php";
if (isset($_POST['sign_up'])) {
    $signUpPrepare->bindParam(':NAME', $_POST['name']);  
    $signUpPrepare->bindParam(':LASTNAME', $_POST['lastName']);    
    $signUpPrepare->bindParam(':EMAIL', $_POST['email']); 
    $signUpPrepare->bindParam(':USERNAME', $_POST['userName']); 
    $signUpPrepare->bindParam(':PASSWORD', $_POST['password']);    
    $signUpPrepare->execute();
    header("Location: ../home/index.php");
}
?>