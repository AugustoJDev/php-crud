<?php 
    include '../../database/database.php';

    $conn = OpenCon();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = array();

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        header("Content-Type: application/json");
        echo json_encode($users);
    } else {
        echo json_encode("An error has occurred");
    }
?>