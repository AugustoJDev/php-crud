<?php 

include '../../database/database.php';

$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

if ($data !== null) {
    $name = $data['name'];

    $conn = OpenCon();

    $sql = "DELETE FROM users WHERE name='" . $name . "';";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode("Successfully deleted from the database.");
    } else {
        echo json_encode("Error: " . $conn->error);
    }
} else {
    echo json_encode("Invalid data received.");
}

?>