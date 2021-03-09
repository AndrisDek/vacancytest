<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61f0f8c7e0.js" crossorigin="anonymous"></script>
    <script defer src="script.js" type="text/javascript"></script>
    <title>Document</title>
</head>
<body>
    <div class="blue-signup-login-container">
        <div class="blue-signup">
            <h2>Don't have an account?</h2><hr class="hr">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In debitis maiores quibusdam accusamus facere distinctio?</p>
            <button type="button" onClick="moveToSignUp()" id="signup-button">SIGN UP</button>
        </div>
        <div class="blue-login">
            <h2>Have an account?</h2><hr class="hr">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            <button type="button" onClick="moveToLogin()" id="login-button">LOGIN</button>
        </div>
        <div class="white-signup-login-container" id="whiteBlock">
            <div class="white-login-content" id="whiteLoginBlock">
                <header>
                    <h2>Login</h2>
                    <hr class="hr">
                </header>
                <form action="php/login.inc.php" method="post">
                    <div class="form-group">
                        <label for="login-email">Email<span>*</span><i class="far fa-envelope"></i></label>
                        <input type="email" class="form-control" id="login-email" name="login-email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password<span>*</span><i class="fas fa-lock"></i></label>
                        <input type="password" class="form-control" id="login-password" name="login-password" required>
                    </div>
                    <div class="form-group">
                        <button class="login-button" type="submit" id="login-submit-button" name="login-submit-button">LOGIN</button>
                        <a href="#">Forgot?</a>
                    </div>
                </form>
            </div>
            <div class="white-signup-content" id="whiteSignUpBlock">
                <header>
                    <h2>Sign Up</h2>
                    <hr class="hr">
                </header>
                <form action="php/signup.inc.php" method="post">
                    <div class="form-group">
                        <label for="signup-name">Name<span>*</span><i id="signup-name-icon" class="fas fa-user"></i></label>
                        <input type="text" class="form-control" id="signup-name" name="signup-name" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email<span>*</span><i id="signup-email-icon" class="fas fa-envelope"></i></label>
                        <input type="email" class="form-control" id="signup-email" name="signup-email" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password<span>*</span><i id="signup-password-icon" class="fas fa-lock"></i></label>
                        <input type="password" class="form-control" id="signup-password" name="signup-password" required>
                        <i class="far fa-eye" id="togglePassword"></i>
                    </div>
                    <button class="signup-button" type="submit" id="signup-submit-button" name="signup-submit-button">SIGN UP</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] === "emptysignup"){
                echo '<div class="signup-complete">
                    <h2>Please enter all fields!</h2>
                    <style>
                    .white-signup-login-container{
                        left: 26%;
                    }
                    .white-signup-content {
                        display:block;
                    }
                    .white-login-content {
                        display:none;
                    }
                    </style>
                </div>';
            }
            if ($_GET['error'] === "invalidname"){
                echo '<div class="signup-complete">
                    <h2>Invalid name! Try again!</h2>
                    <style>
                    .signup-complete {
                        display: flex;
                    }
                    .white-signup-login-container{
                        left: 26%;
                    }
                    .white-signup-content {
                        display:block;
                    }
                    .white-login-content {
                        display:none;
                    }
                    </style>
                </div>';
            }
            if ($_GET["error"] === "invalidemail"){
                echo '<div class="signup-complete">
                    <h2>Invalid email!</h2>
                    <style>
                    .white-signup-login-container{
                        left: 26%;
                    }
                    .white-signup-content {
                        display:block;
                    }
                    .white-login-content {
                        display:none;
                    }
                    </style>
                </div>';
            }
            if ($_GET["error"] === "userexists"){
                echo '<div class="signup-complete">
                    <h2>Name or email already taken!</h2>
                    <style>
                    .white-signup-login-container{
                        left: 26%;
                    }
                    .white-signup-content {
                        display:block;
                    }
                    .white-login-content {
                        display:none;
                    }
                    </style>
                </div>';
            }
            if ($_GET['error'] === "none"){
                echo '<div class="signup-complete">
                    <h2>Signup complete!</h2>
                    <style>
                    .white-signup-content {
                        display:none;
                    }
                    .white-login-content {
                        display:block;
                    }
                    </style>
                </div>';
                }
            if ($_GET['error'] === "wronglogin"){
                echo '<div class="signup-complete">
                    <h2>Wrong login information!</h2>
                    <style>
                    .signup-complete {
                        width: 300px;
                    }
                    .white-signup-content {
                        display:none;
                    }
                    .white-login-content {
                        display:block;
                    }
                    </style>
                </div>';
                }
        }
    ?>
</body>
</html>
