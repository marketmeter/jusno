<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="mmk">
    <meta name="description" content="Jusno is an Explore Talavadi Get everything about talavadi.It includes thalavady photos,thalavadi resorts,thalavadi weather etc,.">
 
   <title>Jusno | Procedure for everything, Aadhar, Pan, etc</title> 
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="http://jusno.in" />
     <meta charset="UTF-8"> 
    <meta name="theme-color" content="#ffa500"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="css/boostrap/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="css/boostrap/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="css/boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <link rel="icon" href="icons/jus.png"> 

</head>




<body>

<!-- ############### HEADER  #################### -->

<div class="topnav">
  <div class="container" style="padding-bottom: -10px;">
    <!-- <a href="#about"><b data-toggle="modal" data-target="#myModal"> Eng </b></a> -->
    <!-- <a href="#about"><b> Swalpa </b></a> -->
    <!-- <a href="graph.php"><b> Pending </b></a> -->
     <a  href="setting.php"><b><b style="color: orange;">S</b>ettings </b></a> 
      <a  href="total.php"><b> <b style="color: orange;">T</b>otal </b></a>
     <a  href="index.php"><b><b style="color: orange;">V</b>ehicle </b></a> 
     
   <!-- <h4 href="#" style="align-items: left; font-size: 20px; padding-top: 5px;"><img src="../MarketMeter/public/marketmeter/image/favicon.png" width="40" height="40;"> Marketmeter</h4> -->
  </div>  
</div>
<hr>


<div class="container">


      <div style="overflow-x:auto;">

      <h1 style="font-size: 20px; text-align: center; ">Veerappan Travels</h1>
 
    <a href="addvehicle.php" class="btn btn-success">Add Vehicle</a>

      <table  class="fixed_headers"  style="font-weight: 600;">  
    <thead>
      <tr>
        <th style="color: orange;">Vehicle</th>
        <th style="color: black;">Edit</th>
        <th style="color: black;">Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <th><a href="addvehicle.php"  style="color: green;"> Edit </a></th>
        <td><a href="setting.php"  style="color: red;" onclick="myFunction()">Delete</a></td>
        <!-- <td><a href="addvehicle.php">Edit</a></td> -->
      </tr>
      <tr>
        <td>John</td>
        <th style="color: green;">Edit</th>
        <td><a href=""  style="color: red;">Delete</a></td>
        <!-- <td><a href="list.php">Edit</a></td> -->
      </tr>

      <tr>
        <td>John</td>
        <th style="color: green;">Edit</th>
        <td><a href=""  style="color: red;">Delete</a></td>
        <!-- <td><a href="list.php">Edit</a></td> -->
      </tr>

      <tr>
        <td>John</td>
        <th style="color: green;">Edit</th>
        <td><a href=""  style="color: red;">Delete</a></td>
        <!-- <td><a href="list.php">Edit</a></td> -->
      </tr>
    </tbody>
  </table>
  </div>

</div>

<script>
function myFunction() {
  var txt;
  if (confirm("Press a button!")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>


</body>
</html>