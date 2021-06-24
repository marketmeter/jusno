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
    <a  href="total.php"><b> <b style="color: orange;">T</b>otal </b></a>
     <a  href="index.php"><b><b style="color: orange;">V</b>ehicle </b></a> 
   <!-- <h4 href="#" style="align-items: left; font-size: 20px; padding-top: 5px;"><img src="../MarketMeter/public/marketmeter/image/favicon.png" width="40" height="40;"> Marketmeter</h4> -->
  </div>  
</div>
<hr>


<div class="container">


<form action="list.php">
  <h5 style="color: orange;">Veerappan Travels</h5>

  <a href="list.php" class="btn btn-outline-secondary" class=>Vehicle 1</a>
<table>
  <tr>
    <td>Vehicle Name</td>
    <td>Vehicle 1</td>
  </tr>

  <tr>
    <td>Date</td>
    <td>12-12-2020</td>
  </tr>

  <tr>
    <td>Driver Name</td>
    <td>Manja</td>
  </tr>

  <tr>
    <td>Total Hour</td>
    <td> 1</td>
  </tr>

    <tr>
    <td>Per Hour</td>
    <td>800</td>
  </tr>

    <tr>
    <td>Total</td>
    <td>800</td>
  </tr>

</table>

<b style="padding-left: 20px; color: red; font-size: 20px;">Pending</b> : <b style="font-size: 20px; color: gray;">1200</b>
<hr>
<h5 style="padding-left: 20px; color: green; font-size: 20px;">Payment Details</h5>

<table>
  <tr>
    <td>12-12-2020</td>
    <td>12000</td>
    <td><a href="#">edit</a></td>
  </tr>

  <tr>
    <td>22-12-2020</td>
    <td>1000</td>
    <td><a href="#">edit</a></td>
  </tr>
</table>

    
    <!-- <button data-toggle="collapse" data-target="#demo">Collapsible</button> -->
    
    <!-- <div id="demo" class="collapse"> -->
      <hr>
  <h4 style="color: gray;">Add Payment</h4>
  <!-- <div class=".col" style="padding-top: 20px;"> -->
      <form action="addamount.php">
        <div class="form-group">
            <label for="pwd">Select Date:</label>
            <input type="date" class="form-control" id="pwd" name="date">
          </div>

          <div class="form-group">
            <!-- <label for="email">Amount</label> -->
            <input type="number" class="form-control" id="email" name="price" placeholder="enter amount">
          </div>


         <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <div style="padding-bottom: 30px;"></div>


</div>
</body>
</html>
