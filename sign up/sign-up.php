<?php
include "../conection/database.php";
include "../conection/create.php";
include "../conection/read.php";
session_start();

if (isset($_POST['sign_up'])) {
    if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['userName']) && !empty($_POST['password'])) {
        if ($_POST['passwordConfirmation'] == $_POST['password']) {
            $date = date("Y-m-d h:i:s");
            $rowCount->bindParam(':email', $_POST['email']);
            $rowCount->execute();
            $userExistance = $rowCount->fetchAll(PDO::FETCH_ASSOC);

            if ($userExistance[0]['COUNT(*)'] == 0) {
                $signUpPrepare->bindParam(':SIGNUPDATE', $date);
                $signUpPrepare->bindParam(':NAME', $_POST['name']);
                $signUpPrepare->bindParam(':LASTNAME', $_POST['lastName']);
                $signUpPrepare->bindParam(':EMAIL', $_POST['email']);
                $signUpPrepare->bindParam(':USERNAME', $_POST['userName']);
                $signUpPrepare->bindParam(':PASSWORD', $_POST['password']);  
                $signUpPrepare->execute();

                $getUserId->bindParam(':email', $_POST['email']);
                $getUserId->execute();
                $userId = $getUserId->fetchAll(PDO::FETCH_ASSOC)[0]['ID_UTILISATEUR'];
                $_SESSION['id'] = $userId;
                header("Location: ../home/index.php");
            }
            else{
                echo "email exist";
            }
        }
        else {
            echo "comfirme ton password";
        }
    }
    else {
        echo "remplissez les champs";
    }
}
?>