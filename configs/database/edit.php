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

    $sql = "UPDATE users
            SET contact = '" . $contact . "', delivery = '" . $delivery . "', value = '" . $value . "'
            WHERE name = '" . $name . "';";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode("Successfully edited in database.");
    } else {
        echo json_encode("Error: " . $conn->error);
    }
} else {
    echo json_encode("Invalid data received.");
}

?>