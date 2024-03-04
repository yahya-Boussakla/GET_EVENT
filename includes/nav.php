<?php
include "../conection/database.php";
include "../conection/read.php";
?>

<nav>
        <div class="position">
            <img src="../imgs/logo.png" alt="">
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="search..." onkeyup="search()">
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
                        <a href="../mes achats/achats.php">Mes Achats</a>
                        <input type="submit" name="logout" class="logout" value="Log Out">
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
    <?php

?>