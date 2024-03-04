<?php
include "reserve.php";
include "../conection/create.php";
include "../conection/read.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETEVENT</title>
    <link rel="stylesheet" href="reserve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/nav.css">
</head>
<body>
<?php
    include "../includes/nav.php";
?>
<main>
    <h1 class="title">
    <?php
    echo $TITLE;
    ?></h1>
    <div class="row">
        <img src="../imgs/green-mask.png" alt="">
        <div class="buy">
            <div class="count">
                <div>
                    <h4>5</h4>
                    <span>Days</span>
                </div>
                <div>
                    <h4>5</h4>
                    <span>Hours</span>
                </div>
                <div>
                    <h4>5</h4>
                    <span>Minutes</span>
                </div>
                <div>
                    <h4>5</h4>
                    <span>Seconds</span>
                </div>
            </div>
            <form action="" method="post" id="form"> 
                <div>Tarif Normale <?php echo $normal;?> MAD</div>
                <input type="text" placeholder="Nombre de Ticket Normale" name="nbNormale">
                <div>Tarif Reduite <?php echo $reduite;?> MAD</div>
                <input type="text" placeholder="Nombre de Ticket Reduite" name="nbReduite">
                <input type="submit" value="BUY" name="buy">
            </form>
        </div>
    </div>
    <h2>Description</h2>
    <p><?php
    echo $desc;
    ?></p>
</main>
<h2 id="desc">Another Events</h2>
<article>
    <?php
            foreach($Events  as $info):
        ?>
        <div class="card">
            <img src="../imgs/green-mask.png" alt="">
            <div class="cardInformation">
                <h2>
                    <?= $info['TITRE'] ?>
                </h2>
                <div class="time">
                    <img src="../imgs/time.webp" alt="" class="icone">
                    <span>
                        <?= $info['DATE'] ?>
                    </span>
                </div>
                <a 
                <?php
                    echo "href=../reserve/index.php?id=".$info["ID_VERSION"];
                    if ($info["DISPONIBLE"]==0) {
                        echo " class='finish' >Fermée</a>";
                    }
                    else {
                        echo ">J'ACHÉTE</a>";
                    }
                    
                    ?>
            </div>
            <div class="category">
                <?= $info['CATEGORIE'] ?>
            </div>
        </div>
        <?php endforeach; ?>
</article>
<script src="reserve.js"></script>
</body>
</html>
<?php
$finish = false;
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php?id=".$ID);
}
if (isset($_POST['buy'])) {
    foreach($allEvents as $event){
       
        if ($event['ID_VERSION'] == $ID && $event['DISPONIBLE'] == 0) {
                $finish = true;
        }
    }

    if ($finish == true) {
        echo "event plein";
    }
    else {
        if (isset($_SESSION['id'])) {
            $normale = "normale";
            $reduite = "reduite";
            $date = date("Y-m-d h:i:s");
            // $place = $place[0]['place'];
            
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
    
        }
        else {
            echo "go sign up";
        }
    }         
    echo "<pre>";
    var_dump($allEvents);
    echo "</pre>";       
}
?>