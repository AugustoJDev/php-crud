Change the method of getting data from the "$name" table to the method of getting the values ​​from the "admin" table and check which one has the name and password corresponding to the searched value.

The code:

<?php 
    function getUser($name, $pass) {

    $conn = OpenCon();
    
    $sql = "SELECT * FROM " . $name;
    $result = $conn->query($sql);
    
    // Check if the user exists or the password is incorrect
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
    
          // Invalid password redirect
          if ($pass != $row['password']) {
            header("Location: ../index.php?error=invalid_password");
            die();
          }
    
          // Sets the session "token" to stay the user logged while he not logout
          setToken($conn, $name);
    
          header("Location: ../dashboard/user.php");
        }
      } else {
    
        header("Location: ../index.php?error=invalid_user");
      };
    };
?>