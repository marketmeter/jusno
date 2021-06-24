<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="../boostrap/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../boostrap/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

  <?php
include_once '../cricket/database.php';

$pid=$_GET['pid'];
 $resultSql="SELECT candidate_name,candidate_id, symbol, type,sum(votes) as total_votes, ward, votes from votes WHERE panchayath_id=$pid group by candidate_id order by total_votes DESC";
    $result = mysqli_query($conn, $resultSql);
    $resultSql1="SELECT candidate_name, symbol, type, ward, votes from votes WHERE panchayath_id = 1";
    $result1 = mysqli_query($conn, $resultSql1);
 


?>



<div class="container">
  <h2>President Result</h2>
  <h4 style="text-align: center; color: brown;"><?php echo $_GET['nid'];?> Panchayat</h4>            
  <table class="table">
    <thead>
      <tr>
        <th>name</th>
    
        <th>symbol</th>

        <th>Votes</th>

      
    
      </tr>
    </thead>
    <tbody>
           <?php while($row = mysqli_fetch_assoc($result)){?>

      <tr>
        <td><?php echo $row['candidate_name'];?></td>
        <td><?php echo $row['symbol'];?></td>
        <td><a href="details.php?cid=<?php echo $row['candidate_id']; ?>&&nid=<?php echo $row['candidate_name']; ?>&&vid=<?php echo $row['total_votes']; ?>"><?php echo $row['total_votes'];?></a></td>

        
      </tr>

    <?php }?>
      
      



    </tbody>
  </table>

  <style type="text/css">
  	td{
  		font-size: 12px;
  	}
  	tr {
  		font-size: 12px;
  	}
  </style>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_table_basic&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 08:16:53 GMT -->
</html>
