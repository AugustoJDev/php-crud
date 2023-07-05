<?php

    function OpenCon() {

        $envPath = 'env.ini';
        $env = parse_ini_file($envPath);

        $conn = mysqli_init();
        $conn->real_connect($env["dbhost"], $env["dbuser"], $env["dbpass"], $env["db"], $env["port"]);

        return $conn;
    }

    function CloseCon($conn) {
        $conn -> close();
    }
   
?>