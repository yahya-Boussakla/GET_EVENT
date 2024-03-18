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
                        <a href="../home/index.php">Home</a>
                        <a href="../profile/index.php">Profile</a>
                        <a href="../mes achats/achats.php">Mes Achats</a>
                        <input type="submit" name="logout" class="logout" value="Log Out">
                    </form>
                </div>';
            }
            else {
                echo '<a class="authent" href="../sign up/index.php" id="sign">Sign up</a>
                <a class="authent" href="../login/index.php">Log in</a>';
            }
            ?>
        </div>
    </nav>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: ../home/index.php");
    }
?>