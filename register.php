<?php 
    // In Maintenance // 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Register</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
    <main class="container">
        <img src="./assets/info-64.png" title="Mensagem aqui!"/>
        <h2>Register</h2>
        <form action="" method="post">
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

            <input type="submit" value="Maintenance">

            <div class="footer">
                <span>Or login to your account</span>
                <div class="social-fields">
                    <div class="social-field register">
                        <a href="/">
                            <i class="fab fa-register"></i>
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>

<?php 

    // Get page URL and parse url params
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
    $parts = parse_url($CurPageURL);

    if(count($parts) == 3) return;

    // Get erros code in query to return if register is invalid or incorrect

    parse_str($parts['query'], $query);

    if(!empty($query["error"]) && $query["error"] == '401') {
        echo "<script type='text/javascript'>alert('You forgot to provide one of the required login fields.');</script>";
    } else if (!empty($query["error"]) && $query["error"] == '409') {
        echo "<script type='text/javascript'>alert('User " . $query["field"] . " already exists in database.');</script>";
    }
?>