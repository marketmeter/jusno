

<?php

if (isset($_SESSION['login_user'])){
      echo "login successfully";
   }
   include_once '../cricket/database.php';

 ?>

<!DOCTYPE html>
  <html lang="en">
  <head> 
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Jusno | Talavadi | Cricket Live Scores Talavadi rournaments | Results and More</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="../boostrap/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../boostrap/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta http-equiv="refresh" content="60"/>
</head>
<body>
<header class="header-basic-light">
        <div class="header-limiter">
            <h1><a href="../../../home/index.php">Jusno<span>Talavadi</span></a></h1>
            <nav>
                <a href="../../../home/index.php"><h6><strong>Home</strong></h6></a>
                <a href="../../../newsfeed/newsfeed.php"><h6><strong>News Feed</strong></h6></a>
                <a href="../../../gallary/gallary.php"><h6><strong>Gallary</strong></h6></a>
                <a href="../../../newsfeed/contact-us.php"><h6><strong>ContactUs</strong></h6></a>
                <!-- C:\xampp\htdocs\restart\gallary -->
                <!-- <a href="#">login/Signup</a> -->
            </nav>
        </div>
    </header>
  
<style type="text/css">
    .header-basic-light{
    padding: 20px 40px;
    box-sizing:border-box;
    box-shadow: 0 0 7px 0 rgba(0, 0, 0, 0.15);
    height: 80px;
    background-color: #ff2b06;
}

.header-basic-light .header-limiter {
    max-width: 1200px;
    text-align: center;
    margin: 0 auto;
}

/* Logo */

.header-basic-light .header-limiter h1{
    float: left;    
    font:28px Cookie, sans-serif;
    line-height: 40px;
    margin: 0;

}

.header-basic-light .header-limiter h1 span {
    color: #c6c6c6;
}
 
/* The header links */

.header-basic-light .header-limiter a {
    color: #fff;
    text-decoration: none;
}

.header-basic-light .header-limiter nav{
    font:18px Arial, Helvetica, sans-serif;
    line-height: 40px;
    float: right;
}

.header-basic-light .header-limiter nav a{
    display: inline-block;
    padding: 0 5px;
    opacity: 0.9;
    text-decoration:none;
    color: #ffffff;
    line-height:1;
  }

  /* unvisited link */
.header-basic-light .header-limiter nav a:link{
  color: #FFFFFF;
}

/* visited link */
.header-basic-light .header-limiter nav a:visited{
  color: #fff;
}

/* mouse over link */
.header-basic-light .header-limiter nav a:hover{
  color: #000000;
}

/* selected link */
.header-basic-light .header-limiter nav a:active{
  color: white;
} 

.header-basic-light .header-limiter nav a.selected {
    background-color: #ff2b06;
    color: #FFFFFF;
    border-radius: 3px;
    border-style: double;
    padding:6px 10px;
 
}

@media only screen and (min-width: 670px) {
  .footer { 
   position: fixed;  
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #ff2b06;
   color: white;
   text-align: center;
   line-height: 20px;   
   overflow: auto;
}
}
 

/* Making the header responsive. */

@media all and (max-width: 670px) {

    .header-basic-light {
        padding: 20px 0;
        height: 80px;
    }

    .header-basic-light .header-limiter h1 {
        float: none;
        margin: -8px 0 10px;
        text-align: center;
        font-size: 24px;
        line-height: 1;
    }

    .header-basic-light .header-limiter nav {
        line-height: 1;
        float:none;
    }

    .header-basic-light .header-limiter nav a {
        font-size: 13px;
    }
/* footer */
  /*.footer {   
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #ff2b06;
   color: white;
   text-align: center;
   line-height: 2px;   
   overflow: auto;
}*/
}

/* For the headers to look good, be sure to reset the margin and padding of the body */

body {
    margin:0;
    padding:0;
    /*line-height: 0px;*/
}
 
/* container */
/*.container { 
  align-content: center;
  grid-template-columns: auto auto auto;
  grid-gap: 25px; 
  padding: 25px;
  background-color: #fff;

}*/



</style>
<div class="container">    
    <!--   <div class="row" style="padding-top: 30px;">
        <div class="col">
      <h4><a href="add_panchayath.php" class="btn btn-primary">Add panchayath</a></h4>
    </div>

    <div class="col">
      <h4><a href="add_candidate.php" class="btn btn-success">Add Candidate</a></h4>
    </div>

    <div class="col">
      <h4><a href="logout.php" class="btn btn-danger">Logout</a></h4>
    </div>
      </div> -->
  

<?php
   include_once '../cricket/database.php';

$Sql = "SELECT panchayath_name, id FROM panchayath";
;
   $Team = mysqli_query($conn, $Sql);

?>

   
      <?php
       if(mysqli_num_rows($Team) > 0) { while($row = mysqli_fetch_assoc($Team)){ ?>
       
          <div class="row" >
             <div class="col-12">
                <address>
                   <strong><a href="index1.php?pid=<?php echo $row['id']; ?>&&nid=<?php echo $row['panchayath_name']; ?>"> <?php echo $row['panchayath_name'] ?></a></strong><br>
                </address>
             </div>
          </div>
          <hr>
      <?php }}
  ?>
      
      
     
  
  </div>
  </body>  
</body>
</html>