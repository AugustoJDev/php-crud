<?php 
    include '../database/database.php';

    echo getenv("PASSWORD");

    // Return an error if user credencials $_POST are empty
    if (in_array(false, [
        $_POST['username'], 
        $_POST['password']
    ])) {
        header("Location: ../index.php?error=invalid_field");
        die();
    } 
    // Checks if the user exists in database and continue the login system ( Ref.: ../dashboard/user.php )
    else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        include '../configs/getUser.php';

        getUser($username, $password);
    }
?>