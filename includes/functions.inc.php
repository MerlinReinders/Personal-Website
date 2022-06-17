<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result; 
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result; 
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($pwd, $pwdRepeat) {
    $result; 
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/*echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";*/

function weakPassword($pwd) {
    $result;
    $uppercase = preg_match('/[A-Z]/', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || !strlen($password) > 8) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($userId, $pwd) {
    $result; 
    if (empty($userId) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $userId, $pwd) {
    $usernameExists = usernameExists($conn, $userId, $userId);
    if ($usernameExists == false) {
        header("location: ../login.php?error=userdoesnotexist");
        exit();
    }
    $pwdHashed = $usernameExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd == true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["username"] = $usernameExists["usersUid"];
        $_SESSION["name"] = $usernameExists["usersName"];
        $_SESSION["email"] = $usernameExists["usersEmail"];
        header("location: ../index.php");
        exit();
    }
}

function emptyInputContact($name, $mailFrom) {
    $result;
    if(empty($name) || empty($mailFrom)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


