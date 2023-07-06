<?php

    // Connect or close the local database using xampp
    function OpenCon() {

        $envPath = 'env.ini';
        $env = parse_ini_file($envPath);

        $conn = new mysqli($env["dbhost"], $env["dbuser"], $env["dbpass"], $env["db"]);

        return $conn;
    };

    function CloseCon($conn) {
        $conn -> close();
    };
   
?>