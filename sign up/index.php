<?php
include "sign-up.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>GETEVENT</title>
</head>
<body>
<form method="post" action="">
        <div class="title">
            <h1>Sign Up</h1>
            <span>Already Have an Account? <a href="../login/index.php"> login</a></span>
        </div>
        <hr>
        <div class="row">
            <div class="column1 test">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Name">
                <label for="">Last Name</label>
                <input type="text" name="lastName" placeholder="Last Name">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Email">
                <label for="">Birthday</label>
                <input type="date" name="birthday">
            </div>
            <div class="column1">
                <label for="">User Name</label>
                <input type="text" name="userName" placeholder="User Name">
                <label for="">Password</label>
                <input type="text" name="password" placeholder="Password">
                <label for="">Password Confirmation</label>
                <input type="text" name="passwordConfirmation" placeholder="Password Confirmation">
            </div>
        </div>
        <input type="submit" value="sign up" name="sign_up">
        <p class="error"></p>
    </form>
</html>