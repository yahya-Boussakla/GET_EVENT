<?php
include "login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>GETEVENT</title>
</head>

<body>
    <nav>
        <img src="../imgs/logo.png" alt="">
        <h1><span>GET</span>EVENT</h1>
    </nav>
    <section>
        <form action="" method="post">
            <h1>LOGIN</h1>
            <input type="text" placeholder="username" name="username"><br>
            <input type="text" placeholder="password" name="password"><br>
            <input type="submit" value="LOGIN" name="login">
            <span>you dont have an acount go <a href="../sign up/index.php">sign up</a></span>
        </form>
    </section>
</body>

</html>