<?php
  session_start();
  include_once '../../../cricket/database.php';
  if (isset($_POST['submit'])) {

      echo $username = mysqli_real_escape_string($conn,$_POST["username"]);
      echo $password = mysqli_real_escape_string($conn,$_POST["password"]);

      if ($username == 'thalavadi' && $password == 'thalavadi') {
          $_SESSION['user'] = $username;
          header("location:../views/index.php");
      }else {          
          header("location:../login/login.php");          
      }
  } else{
     header("location:../login/login.php");  
  }