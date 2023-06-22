<?php session_start(); ?>

<?php 

    include '../database/database.php';

    $conn = OpenCon();
    $userToken = $_SESSION['token'];

    if(empty($userToken)) header("Location: /");

    // SQL query to find the table
    $sql = "SELECT name, token
            FROM admin
            WHERE token = '" . $userToken . "'";

    $result = $conn->query($sql);

    // Until the moment, here returns the name of user logged only
    while($row = $result->fetch_assoc()) {

        echo $row['name'];
    };
?>