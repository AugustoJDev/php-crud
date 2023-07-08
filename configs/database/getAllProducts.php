<?php 
    include '../../database/database.php';
    
    $conn = OpenCon();
    $sql = "SELECT * FROM products";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = array();

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        header("Content-Type: application/json");
        echo json_encode($products);
    } else {
        echo json_encode("An error has occurred");
    }
?>