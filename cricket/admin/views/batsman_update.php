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
    
 

<?php       
   include_once '../../database.php';
   $match_id=$_GET["mid"];
   $balls=$_GET["over"];


   $FixturesSql = "SELECT *,fixtures.id as mid,team1.name as team1name,team1.id as team1_id,team2.id as team2_id,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id where fixtures.id=$match_id";
   $FixtureResult = mysqli_query($conn, $FixturesSql);
   $FixtureData = mysqli_fetch_assoc($FixtureResult);


      $TeamPlayerSql = "SELECT * FROM players where team_id='".$FixtureData['current_bating']."' and match_id='".$FixtureData['mid']."'";
   $TeamPlayerResult = mysqli_query($conn, $TeamPlayerSql);
   $TeamPlayerResult1 = mysqli_query($conn, $TeamPlayerSql);


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


<h4><?php echo $FixtureData["team1name"].' Vs '.$FixtureData["team2name"]; ?></h4>




<form action="../controller/batsman_update_controller.php" method="POST">
    
    <div class="form-group">
    <label for="player1"><h5>Stricker:</h5></label>
   
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
      <input type="hidden" name="balls" value="<?php echo $balls ?>">

      <label>Striker</label>
        <select class="form-control" id="player1" name="striker" style="padding-top: 15px;">

         <?php while($row = mysqli_fetch_assoc($TeamPlayerResult)){ ?>

          <option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
         <?php } ?>
         
      </select>
      <br>
      <label>Non Striker</label>
      <select class="form-control" id="player1" name="non_striker" style="padding-top: 15px;">

         <?php while($row = mysqli_fetch_assoc($TeamPlayerResult1)){ ?>

          Striker<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
         <?php } ?>
         
      </select>
   </div>


  

      
<input type="submit" name="" value="Submit"><br>
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