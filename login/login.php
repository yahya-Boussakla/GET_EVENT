<?php
include "../conection/database.php";
include "../conection/read.php";
if (isset($_POST['login'])) {
    
    foreach($uauthentificationInfosers as $authentification){
        if ($_POST['username'] === $authentification['USERNAME'] && $_POST['password'] === $authentification['PASSWORD']) {
            header("Location: ../home/index.php");
        }
        else{
            echo "wrong password";
        }
    }
}
?>