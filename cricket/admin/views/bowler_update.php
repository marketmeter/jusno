<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>
    
<!-- <?php
// include '..\..\..\header\header.php';
?> -->

   


<?php       
   include_once '../../database.php';
   $match_id=$_GET["mid"];

   $FixturesSql = "SELECT *,fixtures.id as mid,team1.name as team1name,team1.id as team1_id,team2.id as team2_id,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id where fixtures.id=$match_id";
   $FixtureResult = mysqli_query($conn, $FixturesSql);
   $FixtureData = mysqli_fetch_assoc($FixtureResult);

//Team player members getting
      $TeamPlayerSql = "SELECT * FROM players where team_id='".$FixtureData['current_bating']."' and match_id='".$FixtureData['mid']."'";
   $TeamPlayerResult = mysqli_query($conn, $TeamPlayerSql);
   $TeamPlayerResult1 = mysqli_query($conn, $TeamPlayerSql);

//Bowling Members getting
   if($FixtureData['team2_id']==$FixtureData['current_bating']){
        $innings=$FixtureData['team1_id'];

      $TeamBowlingSql = "SELECT * FROM players where team_id='".$FixtureData['team1_id']."' and match_id='".$FixtureData['mid']."'";
      $TeamBowlingPlayers = mysqli_query($conn, $TeamBowlingSql);
   }else{
        $innings=$FixtureData['team2_id'];

      $TeamBowlingSql = "SELECT * FROM players where team_id='".$FixtureData['team2_id']."' and match_id='".$FixtureData['mid']."'";
      $TeamBowlingPlayers = mysqli_query($conn, $TeamBowlingSql);
   }

?>

<div class="container">
<div class="dropdown">
<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
<span class="caret"></span>
</button>


<h4>Select bowler</h4>

<form action="../controller/bowler_controller.php" method="POST">
    
 
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">



      <div class="form-group">   
      <label for="bowler"><h5>Bowler :</h5></label>

      <select class="form-control" id="bowler" name="bowler" style="padding-top: 15px;">
      <?php while($rowbowl = mysqli_fetch_assoc($TeamBowlingPlayers)){ ?>
         <option  value="<?php echo $rowbowl['id'] ?>"><?php echo $rowbowl['name'] ?> </option>
      <?php } ?>
         
   </select>
   
            <div class="col-md-12" align="center" style="padding-bottom: 30px; padding-top: 20px;">
               <input type="Submit" class="btn btn-primary" value="submit">
            </div>

</form>
<form action="../controller/innings_controller1.php" method="POST">
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
      <input type="hidden" name="team" value="<?php echo $innings ?>">

<input type="submit" name="innings" onclick="return confirm('Are you sure innings completed?')" value="Innings_Completed">
<input type="submit" name="result" onclick="return confirm('Are you sure? Match completed')" value="Match_Completed">
<br>
<br>
<input type="submit" name="home"  value="Score_Update_Page">
</form>
</div>
</div>


</div>
</body>
</html>