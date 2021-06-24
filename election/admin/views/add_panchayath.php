<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Scorecard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="../../../boostrap/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../../boostrap/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="../../../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

         <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-4W8G1DY6JJ"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4W8G1DY6JJ');
      </script>

 
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
 	<h4>Add Panchayath</h4>
 	
<form action="../controller/add_panchayath_controller.php" method="POST">

<div class="row">
	<div class="col-8">
	<input type="name" name="panchayath" class="form-control">
</div>
<div class="col">
	<input type="submit" name="" value="Submit" class="btn btn-primary">
</div>
</div>
</form>
<div class=""  style="padding-top: 40px;"></div>
<a href="add_candidate.php" class="btn btn-info">Add Candidate</a>


<div class=""  style="padding-top: 40px;"></div>
<a href="index.php" class="btn btn-success">Home</a>


</div>



</body>
</html>