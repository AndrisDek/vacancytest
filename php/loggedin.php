<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
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
    <?php
        if (isset($_SESSION["usersName"])) {
            echo '<a class="loggedin-logout-button" href="logout.inc.php">LOGOUT</a>';
            $usersName = $_SESSION["usersName"];
            $usersEmail = $_SESSION["usersEmail"];
        } else {
            header("location:../index.php");
        }
    ?>
    <div class="loggedin-container">
        <div class="profile-information">
            <div class="profile-usersname">
                <h2> Username: 
                <?php
                echo $usersName;
                ?>
                </h2>
            </div>
            <div class="profile-email">
                <h2> Email: 
                <?php
                echo $usersEmail;
                ?>
                </h2>
            </div>
        </div>
    </div>
</body>
</html>