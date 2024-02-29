<?php
session_start();
include "../conection/database.php";
include "../conection/read.php";
if (isset($_POST['login'])) {
    
    foreach($authentificationInfo as $authentification){
        
        if ($_POST['username'] === $authentification['USERNAME'] && $_POST['password'] === $authentification['PASSWORD']) {
            $_SESSION['id'] = $authentification['ID_UTILISATEUR'];
            header("Location: ../home/index.php");
        }
    }
}
?>