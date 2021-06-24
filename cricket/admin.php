<!-- login check -->



<!DOCTYPE html>
<html lang="en">

<body>

<?php 

  


    echo "helllo";
    $servername = "localhost";
    $username = "jusno";
    $password = "Jusno@123";
    $dbname = "cricket";
    // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // session_start();

    if (isset($GET['username'])) {
    	echo "hellojj";
      $username = $_GET["username"];
      $password = $_GET["password"];

	    echo "$username";
	    echo "$password";

      $sql = "SELECT from accounts WHERE username = '$username' and password = '$password' ";
      $result = $conn->query($sql)
      // $row mysqli_fetch_array($result,MYSQLI_ASSOC);
      $row = $result->fetch_assoc();
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      if ($count == 1) {
        session_register("username");
        $_SESSION['login_user'] = $username;

        header("location: updateteam.php");
      }
      else {
        $error = "Your Login Name or Password is Invalid";
      }

      
    }



?>


</body>
</html>