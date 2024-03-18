<?php
include "reserve.php";
include "../conection/create.php";
include "../conection/read.php";

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
                    <h4 id="day"></h4>
                    <span>D</span>
                </div>
                <div>
                    <h4 id="hour"></h4>
                    <span>H</span>
                </div>
                <div>
                    <h4 id="minute"></h4>
                    <span>M</span>
                </div>
                <div>
                    <h4 id="second"></h4>
                    <span>S</span>
                </div>
            </div>
            <form action="" method="post" id="form"> 
                <div>Tarif Normale <?php echo $normal;?> MAD</div>
                <input type="number" min="0" placeholder="Nombre de Ticket Normale" name="nbNormale">
                <div>Tarif Reduite <?php echo $reduite;?> MAD</div>
                <input type="number" min="0" placeholder="Nombre de Ticket Reduite" name="nbReduite">
                <input type="submit" value="BUY" name="buy">
                <input id="date" hidden value="<?php echo $date;?>">
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
                    if ($info["DISPONIBLE"]<=0) {
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