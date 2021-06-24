<?php     
   include_once '../../database.php';
   $match_id=$_GET["mid"];
   $sql = "SELECT *,fixtures.id as mid,team1.name as team1name,team1.id as team1_id,team2.id as team2_id,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id where fixtures.id=$match_id";
    $result = mysqli_query($conn, $sql);
   $MatchData = mysqli_fetch_assoc($result);
?>


<?php echo $MatchData["team1name"].' Vs '.$MatchData["team2name"]; ?>
<form action="../controller/toss_controller.php" method="POST">
   <input type="hidden" name="match_id" value="<?php echo  $match_id;?>">  <!-- Match Id -->
   <p>Who won the toss:</p>
   <input type="radio" name="toss" value="<?php echo $MatchData["team1_id"];?>" checked> <?php echo  $MatchData["team1name"];?><br>
   <input type="radio" name="toss" value="<?php echo $MatchData["team2_id"];?>"> <?php echo  $MatchData["team2name"];?><br>
   <p>Choosen:</p>
   <input type="radio" name="choosen" value="1" checked> Batting<br>
   <input type="radio" name="choosen" value="0"> Bowling<br>
   <input type="submit" value="Submit">
</form>