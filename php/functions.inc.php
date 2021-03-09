<?php

function emptySignup($signup_name, $signup_email, $signup_password) {
    $result = false;
    if (empty($signup_name) || empty($signup_email) || empty($signup_password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($signup_name){
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $signup_name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($signup_email) {
    $result = false;
    if(!filter_var($signup_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $signup_name, $signup_email) {
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $signup_name, $signup_email);
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

function createUser($conn, $signup_name, $signup_email, $signup_password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPassword) 
            VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
    }

    $hashedPwd = password_hash($signup_password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $signup_name, $signup_email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyLogin($login_email, $login_password) {
    global $result;
    if (empty($login_email) || empty($login_password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $login_email, $login_password) {
    $uidExists = uidExists($conn, $login_email, $login_email);

    if ($uidExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPassword"];
    $checkPassword = password_verify($login_password, $pwdHashed);

    if ($checkPassword === false) {
        header("location: ../index.php?error=wronglogin");
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["usersName"] = $uidExists["usersName"];
        $_SESSION["usersEmail"] = $uidExists["usersEmail"];
        header("location: loggedin.php");
        exit();
    }
}