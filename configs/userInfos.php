<?php session_start(); ?>

<?php 

    include '../database.php';

    $conn = OpenCon();

    // SQL query to find the table
    $sql = "SELECT name, token
            FROM admin
            WHERE token = '" . $_SESSION['token'] . "'";

    $result = $conn->query($sql);

    // Until the moment, here returns the name of user logged only
    while($row = $result->fetch_assoc()) {

        echo $row['name'];
    };
?>