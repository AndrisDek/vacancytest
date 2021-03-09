<?php

if(isset($_POST["login-submit-button"])) {

            $login_email = $_POST["login-email"];
            $login_password = $_POST["login-password"];

            require_once 'database.connect.php';
            require_once 'functions.inc.php';

            if (emptyLogin($login_email, $login_password) !== false) {
                header("location: ../index?emptylogin");
                exit();
            } else {
                loginUser($conn, $login_email, $login_password);
            }
        }