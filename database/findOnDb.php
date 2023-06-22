<?php 

    function findOnDb($token) {
      
        include './database/database.php';

        $conn = OpenCon();

        $sql = "SELECT * FROM admin WHERE token = '$token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return header("Location: /dashboard/member.php");
        } else {
            return session_unset();
        }
    
        // Fecha a conexão com o banco de dados
        $conn->close();
    };

?>