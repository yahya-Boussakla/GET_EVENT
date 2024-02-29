<?php
include "../conection/database.php";
include "../conection/read.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETEVENT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav>
        <div class="position">
            <img src="../imgs/logo.png" alt="">
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="search..." onkeyup="search()">
            </div>
        </div>
        <h1><span>GET</span>EVENT</h1>
        <div class="buttons">
            <?php
            if (isset($_SESSION['id'])) {
                echo '<i class="fa-solid fa-user"></i>
                <div class="dropdown">
                    <button class="dropbtn">Account</button>
                    <form class="dropdown-content" method="post">
                        <a href="#">Profile</a>
                        <a href="#">Mes Achats</a>
                        <input type="submit" name="logout" class="logout" value="Log out">
                    </form>
                </div>';
            }
            else {
                echo '<a class="athent" href="../sign up/index.php" id="sign">sign up</a>
                <a class="athent" href="../login/index.php">login</a>';
            }
            ?>
        </div>
    </nav>
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
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>