<?php 

include '../../database/database.php';

$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

if ($data !== null) {
    $name = $data['name'];
    $contact = $data['contact'];
    $delivery = $data['delivery'];
    $value = $data['value'];

    $conn = OpenCon();

    $sql = "INSERT INTO users (name, contact, delivery, value) 
            VALUES ('$name', '$contact', '$delivery', '$value')";

    $result = $conn->query($sql);

    if ($result) {
        echo "Successfully added to the database.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid data received.";
}

?>