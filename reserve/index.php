<?php
include "reserve.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETEVENT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="reserve.css">
</head>
<body>
<?php
    include "../nav/nav.php";
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
            <form action="" methode="post">
                <div>Tarif Normale <?php echo $normal;?> MAD</div>
                <input type="text" placeholder="Nombre de Ticket Normale">
                <div>Tarif Reduite <?php echo $reduite;?> MAD</div>
                <input type="text" placeholder="Nombre de Ticket Reduite">
                <input type="submit" value="BUY">
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
<script src="reserve.js">
    var date = <?php echo "test"; ?> 
</script>
</body>
</html>