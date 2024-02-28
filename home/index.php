<?php
include "../conection/database.php";
include "../conection/read.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETEVENT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "../nav/nav.php";
    ?>
    <article>
        <select name="" id="" onchange="available()">
            <option value="1">ALL</option>
            <option value="2">ONLY AVAILABLE</option>
        </select>
        <h1>select event date from</h1>
        <input type="date" id="firstFilter">
        <span>to</span>
        <input type="date" name="" id="secondFilter">

    </article>
    <main>
        <?php
            foreach($allEvents  as $info):
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
    </main>
    <script src="script.js"></script>
</body>

</html>