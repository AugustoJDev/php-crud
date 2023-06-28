<?php session_start(); ?>

<?php
    function getUser($name, $pass) {

        $conn = OpenCon();

        $sql = "SELECT * FROM " . $name;
        $result = $conn->query($sql);

        // Check if the user exists or the password is incorrect
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

              // Invalid password redirect
              if ($pass!= $row['password']) {
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

    // Sets the user token in database, using their name as param to filter the profile
    function setToken($conn, $name) {

      $_SESSION["token"] = generateToken();

      $sql = "UPDATE admin SET token='" . $_SESSION["token"] . "' WHERE name='" . $name . "'";
      $conn->query($sql);
    }

    // Function to generate a random token for the user
    function generateToken($length = 16) {
      $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $pieces = [];
      $max = mb_strlen($stringSpace, '8bit') - 1;
      for ($i = 0; $i < $length; ++ $i) {
           $pieces[] = $stringSpace[random_int(0, $max)];
      }
      return implode('', $pieces);
    };
?>