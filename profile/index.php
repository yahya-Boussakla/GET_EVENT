<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../includes/nav.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    session_start();
    include "../includes/nav.php";
    include "../conection/read.php";
    include "../conection/database.php";

    $profilePrepare->bindParam(':user', $_SESSION['id']);
    $profilePrepare->execute();
    $profileInfo = $profilePrepare->fetchALL(PDO::FETCH_ASSOC);
    
    ?>
    <h1 id="title">welcome to your space <br><span id="name"><?= $profileInfo[0]['NOM'] . " ". $profileInfo[0]['PRENOM']?></span></h1>
    <section>
    <div class="box" id="info">
        <p><b>your user name : </b><span><?= $profileInfo[0]['USERNAME']?></span></p>
            <p><b>your email : </b><span><?= $profileInfo[0]['EMAIL']?></span></p>
            <p><b>your birthday : </b><span><?= $profileInfo[0]['BIRTHDAY']?></span></p>
            <p><b>your password : </b><span><?= $profileInfo[0]['PASSWORD']?></span></p>
            <p><b>your signup date : </b><span><?= $profileInfo[0]['SIGNUPDATE']?></span></p>
            <p><b>nombre des factures : </b><span><?= $profileInfo[0]['COUNT(NUM_FACTURE)']?></span></p>
            <p><b># recent facture : </b><span><?= $profileInfo[0]['RECENT']?></span></p>
            <div id="editBtn">Edit <i class="fa-solid fa-pen"></i></div>
        </div>
        <div class="box" id="editBox">
                <form action="" method="post">
            <i class="fa-solid fa-x" id="quite"></i>
                <p><b>your name : </b><input value="<?= $profileInfo[0]['NOM']?>" class="editInput" name="name"></p>
                <p><b>your last name : </b><input value="<?= $profileInfo[0]['PRENOM']?>" class="editInput" name="lastName"></p>
                <p><b>your username : </b><input value="<?= $profileInfo[0]['USERNAME']?>" class="editInput" name="username"></p>
                <p><b>your password : </b><input value="<?= $profileInfo[0]['PASSWORD']?>" class="editInput" name="password"></p>
                <input value="Done" type="submit" id="done" name="done">
            </form>
            </div>
        <img src="../imgs/dessin.png" alt="">
    </section>
    
    <script src="profile.js"></script>
</body>
</html>
<?php
if (isset($_POST['done'])) {
    $sql = "UPDATE `UTILISATEUR` SET ";
    $j = 0;
    $checkData = [[$profileInfo[0]['NOM'],$_POST['name'],'NOM'],[$profileInfo[0]['PRENOM'],$_POST['lastName'],'PRENOM'],[$profileInfo[0]['USERNAME'],$_POST['username'],'USERNAME'],[$profileInfo[0]['PASSWORD'],$_POST['password'],'PASSWORD']];
    for ($i=0; $i < count($checkData); $i++) {
        if ($checkData[$i][0] != $checkData[$i][1] && $j == 0) {
            $sql .= $checkData[$i][2] ." = ".  "'".$checkData[$i][1]."'";
            $j++;
        }
        elseif ($checkData[$i][0] != $checkData[$i][1] && $j > 0) {
            $sql .= " , " . $checkData[$i][2] ." = ". "'".$checkData[$i][1]."'";
            $j++;
        }
    }
    if ($j > 0) {
        $sql .= " WHERE ID_UTILISATEUR = " . $_SESSION['id'];
        echo $sql;
        $edit = $conn->prepare($sql);
        $edit->execute();
        header("Location: index.php");
    }
    else {
        echo "no edit";
    }
}
?>