<?php

// Connect or close the local database using xampp
function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "registereds";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
 
    return $conn;
}

function CloseCon($conn) {
    $conn -> close();
}
   
?>