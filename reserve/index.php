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
                        echo " class='finish'";
                    }
                ?>
                >J'ACHÉTE</a>
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
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php?id=".$ID);
}
if (isset($_POST['buy'])) {
    if (isset($_SESSION['id'])) {
        $reservePrepare->bindParam(':ID_USER', $_SESSION['id']);
        $reservePrepare->bindParam(':ID_VERSION', $ID);
        $reservePrepare->bindParam(':DATE_ACHAT', date("Y-m-d h:i:s"));
        $reservePrepare->execute();

        for ($i=0; $i < (int)$_POST['nbNormale']; $i++) { 

            $billetPrepare->bindParam(':NUM_FACTURE', $idFacture[0]['numFactur']);
            $billetPrepare->bindParam(':TYPE', 'NORMALE');
            $billetPrepare->bindParam(':PLACE', $place[0]['place']);
            $billetPrepare->execute();
        }

        for ($i=0; $i < (int)$_POST['nbReduite']; $i++) { 

            $billetPrepare->bindParam(':NUM_FACTURE', $idFacture[0]['numFactur']);
            $billetPrepare->bindParam(':TYPE', 'REDUITE');
            $billetPrepare->bindParam(':PLACE', $place[0]['place']);
            $billetPrepare->execute();
        }

    }
    else {
        echo "go sign up";
    }
}
?>