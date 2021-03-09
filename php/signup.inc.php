<?php 
        if (isset($_POST["signup-submit-button"])){
            $signup_name = $_POST["signup-name"];
            $signup_email = $_POST["signup-email"];
            $signup_password = $_POST["signup-password"];

            require_once 'database.connect.php';
            require_once 'functions.inc.php';

            if (emptySignup($signup_name, $signup_email, $signup_password) !== false) {
                header("location: ../index.php?error=emptysignup");
                exit();
            }

            if (invalidUid($signup_name) !== false) {
                header("location: ../index.php?error=invalidname");
                exit();
            }

            if (invalidEmail($signup_email) !== false) {
                header("location: ../index.php?error=invalidemail");
                exit();
            }

            if (uidExists($conn, $signup_name, $signup_email) !== false) {
                header("location: ../index.php?error=userexists");
                exit();
            }

            createUser($conn, $signup_name, $signup_email, $signup_password);
                header("location: ../index.php?error=none");
                exit();
        }
    ?>