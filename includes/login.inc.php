<?php

if (isset($_POST["submit"])) {

    $userId = $_POST["usernameoremail"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($userId, $pwd) != false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $userId, $pwd);

} else {
    header("location: ../login.php");
    exit();
}

