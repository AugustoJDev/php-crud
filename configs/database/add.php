<?php 

include '../../database/database.php';

$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

if (!empty($data)) {

    $name = $data['name'];
    $contact = $data['contact'];
    $delivery = $data['delivery'];
    $value = $data['value'];
    $products = $data['products'];

    $conn = OpenCon();

    $sql = "INSERT INTO users (name, contact, delivery, value, products) 
            VALUES ('$name', '$contact', '$delivery', '$value', '$products')";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode("Successfully added to the database.");
    } else {
        echo json_encode("Error: " . $conn->error);
    }
} else {
    echo json_encode("Invalid data received.");
}

?>