<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Login</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
    <main class="container">
        <img src="./assets/info-64.png" title="Mensagem aqui!"/>
        <h2>Login</h2>
        <form action="./configs/login.php" method="post">
            <div class="input-field">
                <input type="text" name="username" id="username"
                    placeholder="Enter Your Username">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password"
                    placeholder="Enter Your Password">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Continue">

            <div class="footer">
                <span>Or create a new account</span>
                <div class="social-fields">
                    <div class="social-field register">
                        <a href="/register.php">
                            <i class="fab fa-register"></i>
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>

<?php

    include './database/findOnDb.php';

    // Redirects to dashboard if the admin has logged
    if(!empty($_SESSION['token'])) {
        findOnDb($_SESSION['token']);
    }

    // Get page URL and parse url params
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
    $parts = parse_url($CurPageURL);

    if(count($parts) == 3) return;

    // Get erros code in query to return if login is invalid or incorrect

    parse_str($parts['query'], $query);

    if(!empty($query['error'])) {

        $errorMessage = $query['error'];
        $jsonData = file_get_contents('codes.json');
        $constants = json_decode($jsonData);

        // Return to main page if the error code is invalid
        if(empty($constants->$errorMessage)) {
            header("Location: /");
        }

        echo "<script type='text/javascript'>alert(\"" . $constants->$errorMessage . "\");</script>";
    }
?>