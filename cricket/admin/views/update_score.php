<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../css/js/bootstrap.min.js"></script>
   <title>Jusno | Update Score</title>

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


<?php       
   include_once '../../database.php';
   $match_id=$_GET["mid"];

   $FixturesSql = "SELECT *,fixtures.id as mid,team1.name as team1name,team1.id as team1_id,team2.id as team2_id,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id where fixtures.id=$match_id";
   $FixtureResult = mysqli_query($conn, $FixturesSql);
   $FixtureData = mysqli_fetch_assoc($FixtureResult);
  
// score
    $FixturesSql = "SELECT *,fixtures.id as mid,team1.name as team1name,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id WHERE fixtures.id = $match_id";
    $FixturesResult = mysqli_query($conn, $FixturesSql);
    $FixturesData = mysqli_fetch_assoc($FixturesResult);


    
  $FirstInningsBat = '';
$FirstInningsBowl = '';
    if($FixturesData['comments'] == 'Bat'){
        if($FixturesData['toss_team']  == $FixturesData['team_1'] ){
            $FirstInningsBat =  $FixturesData['team1name'];
            $FirstInningsBowl =  $FixturesData['team2name'];
            $FirstInningsBatId =  $FixturesData['team_1'];
            $FirstInningsBowlId =  $FixturesData['team_2'];
        }else if($FixturesData['toss_team']  == $FixturesData['team_2']){
            $FirstInningsBat =  $FixturesData['team2name'];
            $FirstInningsBowl =  $FixturesData['team1name'];
             $FirstInningsBatId =  $FixturesData['team_2'];
            $FirstInningsBowlId =  $FixturesData['team_1'];
        }
    }else if($FixturesData['comments']  == 'Bowl'){
        if($FixturesData['toss_team']  == $FixturesData['team_1'] ){
            $FirstInningsBat =  $FixturesData['team2name'];
            $FirstInningsBowl =  $FixturesData['team1name'];
             $FirstInningsBatId =  $FixturesData['team_2'];
            $FirstInningsBowlId =  $FixturesData['team_1'];
        }else if($FixturesData['toss_team']  == $FixturesData['team_2']){
            $FirstInningsBat =  $FixturesData['team1name'];
            $FirstInningsBowl =  $FixturesData['team2name'];
             $FirstInningsBatId =  $FixturesData['team_1'];
            $FirstInningsBowlId =  $FixturesData['team_2'];
        }
    }




   $FirstBatScoreSql1 = "SELECT sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,sum(case when score.wicket= 1 then 1 else null end) as wicket,sum(case when score.extra_type is not null then 1 else 0 end) as extra_runs, count(case when score.run= 4 then 1 else null end) as four_count,count(case when score.run= 6 then 1 else null end) as six_count FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = $FirstInningsBatId";
    $FirstBatScoreResult1 = mysqli_query($conn, $FirstBatScoreSql1);
    $FirstBatScoreData1  = mysqli_fetch_assoc($FirstBatScoreResult1);

    $SecondBatScoreSql1 = "SELECT sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,sum(case when score.wicket= 1 then 1 else null end) as wicket,sum(case when score.extra_type is not null then 1 else 0 end) as extra_runs, count(case when score.run= 4 then 1 else null end) as four_count,count(case when score.run= 6 then 1 else null end) as six_count FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = $FirstInningsBowlId";
    $SecondBatScoreResult1 = mysqli_query($conn, $SecondBatScoreSql1);
    $SecondBatScoreData1  = mysqli_fetch_assoc($SecondBatScoreResult1);

   $FirstBatScoreSql2 = "SELECT sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,sum(case when score.wicket= 1 then 1 else null end) as wicket,sum(case when score.extra_type is not null then 1 else 0 end) as extra_runs, count(case when score.run= 4 then 1 else null end) as four_count,count(case when score.run= 6 then 1 else null end) as six_count FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = ".$FixturesData['current_bating']."";
    $FirstBatScoreResult2 = mysqli_query($conn, $FirstBatScoreSql2);
    $FirstBatScoreData2  = mysqli_fetch_assoc($FirstBatScoreResult2);


     $FirstBatScoreSql = "SELECT players.name,sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,count(case when score.run= 4 then 1 else null end) as four_count,count(case when score.run= 6 then 1 else null end) as six_count FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = $FirstInningsBatId GROUP BY score.player_id";
    $FirstBatScoreResult = mysqli_query($conn, $FirstBatScoreSql);


   $currentBatScoreSql = "SELECT players.name,sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,count(case when score.run= 4 then 1 else null end) as four_count,count(case when score.run= 6 then 1 else null end) as six_count FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = ".$FixturesData['current_bating']." GROUP BY score.player_id";
    $current= mysqli_query($conn, $currentBatScoreSql);

    $current_Bowl_score_sql = "SELECT players.id, players.name,sum(case when score.ball= 1 then 1 else null end) as ball_count,sum(score.run) as total_run,sum(case when score.wicket= 1 then 1 else null end) as wicket FROM score LEFT JOIN players on players.id=score.bowler_id WHERE score.match_id = $match_id and score.team_id = ".$FixturesData['current_bating']." GROUP BY score.bowler_id";
    $CurrentBowlScoreResult = mysqli_query($conn, $current_Bowl_score_sql);

    $current_bat=$FixturesData['current_bating'];
 $recent_sql = "SELECT * FROM score where team_id='".$current_bat."' and match_id='".$match_id."' ORDER BY id DESC limit 18 ";
  $recents_runs = mysqli_query($conn, $recent_sql);



 $sql = "SELECT * FROM current_players where id='7' and match_id='".$match_id."'";
  $current_players = mysqli_query($conn, $sql);
  $MatchPlayersResult = mysqli_fetch_assoc($current_players);    
  $striker=$MatchPlayersResult['player1_id'];
  $non_striker=$MatchPlayersResult['player2_id'];
  $current_bowler=$MatchPlayersResult['bowler_id'];
// score


   $TeamPlayerSql = "SELECT * FROM players where team_id='".$FixtureData['current_bating']."' and match_id='".$FixtureData['mid']."'";
   $TeamPlayerResult = mysqli_query($conn, $TeamPlayerSql);


    if($FixtureData['team2_id']==$FixtureData['current_bating']){
    $innings=$FixtureData['team1_id'];
    $innings2=$FixtureData['team2_id'];
      $TeamBowlingSql = "SELECT * FROM players where team_id='".$FixtureData['team1_id']."' and match_id='".$FixtureData['mid']."'";
      $TeamBowlingPlayers = mysqli_query($conn, $TeamBowlingSql);
   }else{
    $innings=$FixtureData['team2_id'];
    $innings2=$FixtureData['team1_id'];

      $TeamBowlingSql = "SELECT * FROM players where team_id='".$FixtureData['team2_id']."' and match_id='".$FixtureData['mid']."'";
      $TeamBowlingPlayers = mysqli_query($conn, $TeamBowlingSql);
   }
?>

<?php echo $FixtureData["team1name"].' Vs '.$FixtureData["team2name"]; ?>
<div class="container">

<form action="../controller/score_controller.php" method="POST">
   
   <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
    <div class="form-group">
      <label for="sel1">run</label>
     
    </div>
   <input type="number" name="run">
   <input type="submit" name="score" value="score">
   <input type="submit" name="wicket" onclick="return confirm('Are you sure Wicket')" value="wicket">
   <input type="submit" name="wide" value="wide">
   <input type="submit" name="noball" value="noball">
   <input type="submit" name="bies" value="bies">

   <br>
<p>below button use only while run out, stump out in noball or wide</p>


   <select name="wicket_extra1" >
      <option value=""></option>
      <option value="wide">wide</option>
      <option value="noball">noball</option>
      <option value="bies">noball</option>


   </select>
 <!--   <button type="button" name="
 gs" value="2" class="btn btn-primary">First 
 gs Completed</button>
   <button type="button" name="results" value="2" class="btn btn-primary">match completed</button> -->
</form>
</div>
<!-- score -->

     <div class="col-12">
                                    <address>
                                       <h4><strong class="list-group-item list-group-item-success"><?php print_r($FixturesData['team1name']); ?> Vs <?php print_r($FixturesData['team2name']); ?></a></strong> <br></h4>
                                        Scheduled at <?php print_r(date("d-m-Y", strtotime($FixturesData['date_time']))); ?> at <?php print_r(date("h:i A", strtotime($FixturesData['date_time']))); ?>


                            <?php if(!empty($FixturesData['toss_team'])){ 

                                        $first_ball_over=($FirstBatScoreData1['total_ball']/6)%6;
                                        $first_ball_ball=$FirstBatScoreData1['total_ball']%6;
                                        $second_ball_over=($SecondBatScoreData1['total_ball']/6)%6;
                                        
                                        $second_ball_ball=$SecondBatScoreData1['total_ball']%6;

                                        if ($FirstBatScoreData1['total_ball']>=36) {
                                          $first_ball_over=$first_ball_over+6;
                                         
                                        }
                                         if ($SecondBatScoreData1['total_ball']>=36) {
                                          $second_ball_over=$second_ball_over+6;
                                            
                                        }
                                        if ($FirstBatScoreData1['total_run'] + $FirstBatScoreData1['extra_runs']>$SecondBatScoreData1['total_run'] + $SecondBatScoreData1['extra_runs']) {
                                          $runs=($FirstBatScoreData1['total_run'] + $FirstBatScoreData1['extra_runs'])-($SecondBatScoreData1['total_run'] + $SecondBatScoreData1['extra_runs']);
                                          $conclude= $FirstInningsBat;
                                          $conclude.=' won by ';

                                          $conclude.=$runs.=' runs';
                                        }else{

                                         $wicket1=10-$SecondBatScoreData1['wicket'];

                                          $conclude= $FirstInningsBowl;
                                          $conclude.=' won by ';

                                          $conclude.=$wicket1.=' wickets';

                                        }

                                        ?>


                                        <h4><?php echo $FirstInningsBat; ?> <?php echo $FirstBatScoreData1['total_run'] + $FirstBatScoreData1['extra_runs'] ?>/<?php echo $FirstBatScoreData1['wicket']; ?> (<?php echo $first_ball_over; ?>.<?php echo $first_ball_ball; ?>)</h4>
                                        <h4><?php echo $FirstInningsBowl; ?> <?php echo $SecondBatScoreData1['total_run'] + $SecondBatScoreData1['extra_runs'] ?> / <?php echo $SecondBatScoreData1['wicket']; ?> (<?php echo $second_ball_over; ?>.<?php echo $second_ball_ball; ?>)</h4>

                          
                                        <h4 style="color:green";><?php if ($FixturesData['result']==2) {  echo $conclude;} ?></h4>
                              <?php } ?>
                              <?php 
                              if ($FixturesData['result']==1) {
                                # code...
                              
                              if ($FirstInningsBatId!==$FixturesData['current_bating']) {
                                $need=$FirstBatScoreData1['total_run'] + $FirstBatScoreData1['extra_runs'];
                                $need1=$SecondBatScoreData1['total_run'] + $SecondBatScoreData1['extra_runs'];
                                $need=$need-$need1;
                                $from=48-$SecondBatScoreData1['total_ball'];
                                $required_rate=($need/$from)*6;
                                $required_rate=round($required_rate,2);
                                ?>

                                <h4 style="color:blue";><?php echo $FirstInningsBowl; ?> needs <?php echo $need;?> from <?php echo $from; ?> balls</h4>
                                 <?php
                              }}
                              ?>

                                    </address>

                                 </div>
                              

<div class="first_innings_bat">
    <h2 class="Result_header">Batting : <?php if ($FixturesData['current_bating']==$FirstInningsBatId) {
      # code...
     echo $FirstInningsBat;}else {
       echo $FirstInningsBowl;
     } ?></h2>
    <table id="batsman_score_table">
      <tr>
        <th>Batsman</th>
        <th>Run</th>
        <th>Ball</th>
        <th>4s</th>
        <th>6s</th>
        <th>S/R</th>
      </tr>
      <?php while($cuurent_play = mysqli_fetch_assoc($current)){ ?>
        <?php if ($cuurent_play['player_id']==$striker) {?>
         <tr>
            <th><?php echo $cuurent_play['name'] ?>*</th>
            <th><?php echo $cuurent_play['total_run'] ?></th>
            <th><?php echo $cuurent_play['total_ball'] ?></th>
            <th><?php echo $cuurent_play['four_count'] ?></th>
            <th><?php echo $cuurent_play['six_count'] ?></th>
            <th><?php if ($cuurent_play['total_ball']!==null) {
              # code...
             echo round(($cuurent_play['total_run'] / $cuurent_play['total_ball'])*100,2); }?></th>
      </tr>
       <?php } ?>
        <?php if ($cuurent_play['player_id']==$non_striker) {?>
         <tr>
            <th><?php echo $cuurent_play['name'] ?></th>
            <th><?php echo $cuurent_play['total_run'] ?></th>
            <th><?php echo $cuurent_play['total_ball'] ?></th>
            <th><?php echo $cuurent_play['four_count'] ?></th>
            <th><?php echo $cuurent_play['six_count'] ?></th>
             <th><?php if ($cuurent_play['total_ball']!==null) {
              # code...
             echo round(($cuurent_play['total_run'] / $cuurent_play['total_ball'])*100,2); }?></th> 
      </tr>
       <?php } ?>

    <?php } ?>
      
    </table>

    <table id="batsman_score_table">
      <tr class="score_total">
        <?php 
         $second_ball_over=($FirstBatScoreData2['total_ball']/6)%6;
                                        
                                        $second_ball_ball=$FirstBatScoreData2['total_ball']%6;
                                        if ($FirstBatScoreData2['total_ball']>=36) {
                                          $second_ball_over=$second_ball_over+6;
                                         
                                        }?>
        <td><b>Total:<?php echo $FirstBatScoreData2['total_run'] + $FirstBatScoreData2['extra_runs'];?></b>____Extras:<?php echo $FirstBatScoreData2['extra_runs'] ?></td>
        <td>( wickets; <?php echo $FirstBatScoreData2['wicket']; ?>) (<?php echo $second_ball_over; ?>.<?php echo $second_ball_ball; ?> overs)</td>
        <td><?php while($last_runs = mysqli_fetch_assoc($recents_runs)){ 

  if ($last_runs['extra_type']==null) {
if ($last_runs['wicket']==null) {
  if ($last_runs['run']==0) {
    # code...echo
    $runs='. ';
    // echo'. ';
  }
  else{
  // echo $last_runs['run'];
  $runs=$last_runs['run'];
}

  }else{


// $last_runs=$last_runs['run'];
$last_runs='W';
$runs='W';

// $last_runs.=$last_runs['extra_type'];

// echo $last_runs;
}

 }else{
  // $last_runs=$last_runs['run'];
  // $last_runs.=$last_runs['extra_type'];
  // $last_runs.=$last_runs['wicket'];
if ($last_runs['extra_type']=='noball') {
  # code...
  // echo 'nb';
  if ($last_runs['extra_type']!==null) {
    # code...
    $runs=$last_runs['run'];
    $runs.='nb';
  }else{
  $runs='nb';
}
}elseif ($last_runs['extra_type']=='wide') {
  # code...
  // echo 'Wb';
  $runs='Wb';
}else{
  // echo'bi';
  $runs='bi';
}
 }
echo $runs.=' ';
}
 ?></td>
      </tr>
    </table>
</div>
<div class="col-12">
  <address>
    <?php if ($FirstBatScoreData2['total_ball']!==null) {
        
    $run_rate=(($FirstBatScoreData2['total_run'] + $FirstBatScoreData2['extra_runs'])/$FirstBatScoreData2['total_ball'])*6;}
    ?>
     <h4 style="color:black";>Run Rate:<?php if ($FirstBatScoreData2['total_ball']!==null) { echo round($run_rate,2); }?>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    <?php if ($FixturesData['result']==1) {
                                # code...
                              
                              if ($FirstInningsBatId!==$FixturesData['current_bating']) {?>Required rate:<?php echo $required_rate;}}?></h4> 

  </address>
</div>
<div class="first_innings_bowl">
    <h2 class="Result_header"></h2>
    <table id="batsman_score_table">
       <tr>  
        <th>Bowler Name</th>
        <th>Over</th>
        <th>Run</th>
        <th>Wicket</th>
        <th>Ball</th> 
        <th>Econ</th>
      </tr>
      <?php
         while($cuurent_play = mysqli_fetch_assoc($CurrentBowlScoreResult)){ ?>
        <?php if ($cuurent_play['id']==$current_bowler) {        
         $over=($cuurent_play['ball_count']/6)%6;
         $ball=$cuurent_play['ball_count']%6;
                                     
        ?>
         <tr>
            <th><?php echo $cuurent_play['name'] ?></th>
            <th> (<?php echo $over; ?>.<?php echo $ball; ?>)</th>
            <th><?php echo $cuurent_play['total_run'] ?></th>
            <th><?php echo $cuurent_play['wicket'] ?></th>
            <th><?php echo $cuurent_play['ball_count'] ?></th>
            <th><?php if ($cuurent_play['ball_count']!==null) {
              # code...
            echo round(($cuurent_play['total_run']/$cuurent_play['ball_count'])*6,1) ;}?></th>

      </tr>
             <?php } ?>


    <?php } ?>

          </table>
          <br>
<input type="button" class="btn btn-dark" value="Refresh Score" onClick="document.location.reload(true)">
</div>


<!-- score -->


<br>
<form action="../controller/innings_controller1.php" method="POST">
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
      <input type="hidden" name="team" value="<?php echo $innings ?>">

<input type="submit" name="innings" onclick="return confirm('Are you sure innings completed?')" value="Innings_Completed">
<input type="submit" name="result" onclick="return confirm('Are you sure? Match completed')" value="Match_Completed">

</form>
<?php

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
   }?>
   <form action="../controller/bowler_controller.php" method="POST">
    
 
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">



      <div class="form-group">   
      <label for="bowler"><h5>Change Bowler :</h5></label>

      <select class="form-control" id="bowler" name="bowler" style="padding-top: 15px;">
      <?php while($rowbowl = mysqli_fetch_assoc($TeamBowlingPlayers)){ ?>
         <option  value="<?php echo $rowbowl['id'] ?>"><?php echo $rowbowl['name'] ?> </option>
      <?php } ?>
         
   </select>
   
            <div class="col-md-12" align="center" style="padding-bottom: 30px; padding-top: 20px;">
               <input type="Submit" class="btn btn-primary" value="Change Bowler">
            </div>

</form>
<form action="../controller/batsman_update_controller.php" method="POST">
    
    <div class="form-group">
    <label for="player1"><h5>Change Batsman:</h5></label>
   
      <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
      <input type="hidden" name="balls" value="<?php echo $balls ?>">
<br>
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


  

      
<input type="submit" name="" value="Change Batsman">
</form>
<?php

 $FirstBatScoreSql = "SELECT sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,sum(case when score.wicket= 1 then 1 else null end) as wicket,sum(case when score.extra_type is not null then 1 else 0 end) as extra_runs FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = $innings";
    $FirstBatScoreResult = mysqli_query($conn, $FirstBatScoreSql);
    $FirstBatScoreData  = mysqli_fetch_assoc($FirstBatScoreResult);

    $SecondBatScoreSql = "SELECT sum(score.run) as total_run,player_id,sum(score.ball) as total_ball,sum(case when score.wicket= 1 then 1 else null end) as wicket,sum(case when score.extra_type is not null then 1 else 0 end) as extra_runs FROM score LEFT JOIN players on players.id=score.player_id WHERE score.match_id = $match_id and score.team_id = $innings2";
    $SecondBatScoreResult = mysqli_query($conn, $SecondBatScoreSql);
    $SecondBatScoreData  = mysqli_fetch_assoc($SecondBatScoreResult);

                                    $first_ball_over=($FirstBatScoreData['total_ball']/6)%6;
                                        $first_ball_ball=$FirstBatScoreData['total_ball']%6;
                                        $second_ball_over=($SecondBatScoreData['total_ball']/6)%6;
                                        
                                        $second_ball_ball=$SecondBatScoreData['total_ball']%6;

                                        if ($FirstBatScoreData['total_ball']>=36) {
                                          $first_ball_over=$first_ball_over+6;
                                         
                                        }
                                         if ($SecondBatScoreData['total_ball']>=36) {
                                          $second_ball_over=$second_ball_over+6;
                                            
                                        }
    ?>
     <h4><?php echo 'team1'; ?> <?php echo $FirstBatScoreData['total_run'] + $FirstBatScoreData['extra_runs'] ?>/<?php echo $FirstBatScoreData['wicket']; ?> (<?php echo $first_ball_over; ?>.<?php echo $first_ball_ball; ?>)</h4>
                                        <h4><?php echo 'team2'; ?> <?php echo $SecondBatScoreData['total_run'] + $SecondBatScoreData['extra_runs'] ?> / <?php echo $SecondBatScoreData['wicket']; ?> (<?php echo $second_ball_over; ?>.<?php echo $second_ball_ball; ?>)</h4>


    
</body>
</html>