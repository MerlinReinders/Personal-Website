<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) != false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) != false) {
        header("location: ../register.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) != false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (passwordMatch($pwd, $pwdRepeat) != false) {
        header("location: ../register.php?error=passwordmatch");
        exit();
    }

    if (usernameExists($conn, $username, $email) != false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    if (weakPassword($pwd) != false) {
        header("location: ../register.php?error=weakPassword");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

} else {
    header("location: ../register.php");
    exit();
}

