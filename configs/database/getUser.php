<?php 
    include '../../database/database.php';
    
    $requestPayload = file_get_contents('php://input');
    $data = json_decode($requestPayload, true);

    $name = $data["name"];

    $conn = OpenCon();
    $sql = "SELECT products
            FROM users
            WHERE name = \"$name\"";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo json_encode($row);
        };
    } else {
        echo json_encode("An error has occurred");
    }
?>