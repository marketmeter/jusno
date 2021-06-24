<?php
include_once '../../database.php';
	
	$match_id = $_POST["match_id"];
	$score=$_POST["run"];

	// print_r($_POST);

	$current_batting = "SELECT * FROM fixtures where id='".$match_id."'";
	$batting = mysqli_query($conn, $current_batting);
	$batting_team = mysqli_fetch_assoc($batting);
// ball count
  $ball_data = "SELECT *,sum(ball) as total_ball FROM score where match_id='".$match_id."' and team_id = '".$batting_team['current_bating']."'";
  $ball_datas = mysqli_query($conn, $ball_data);
  $over = mysqli_fetch_assoc($ball_datas);
 	$total_over=$over['total_ball'];

	$over_data=($over['total_ball']+1)%6;
// print_r($over_data);



	 $sql = "SELECT * FROM current_players where id='1' and match_id='".$match_id."'";
	$current_players = mysqli_query($conn, $sql);
	$MatchPlayersResult = mysqli_fetch_assoc($current_players);

	$array=array('2', '0', '4', '6', null);
	$array1=array('1','3');
if (in_array($_POST['run'],$array))
{
if ($over_data==0) {
	$sql = "UPDATE current_players set player1_id='".$MatchPlayersResult['player2_id']."',player2_id = '".$MatchPlayersResult['player1_id']."' where id='1'";
	mysqli_query($conn, $sql);
}
  
}
else if(in_array($_POST['run'],$array1)){
	if ($over_data!==0){
	$player1=$MatchPlayersResult['player1_id'];
	$player2=$MatchPlayersResult['player2_id'];


	$sql = "UPDATE current_players set player1_id='".$MatchPlayersResult['player2_id']."',player2_id = '".$MatchPlayersResult['player1_id']."' where id='1'";
	mysqli_query($conn, $sql);
}
	# code...
}

	
// to check match is currently going on
	$MatchSelect = "SELECT * FROM fixtures WHERE id = '$match_id'";
	$MatchSelectQuery = mysqli_query($conn,$MatchSelect);

	$MatchSelectResult = mysqli_fetch_assoc($MatchSelectQuery);
	// print_r($MatchSelectResult);
	// echo $score;

	if(isset($_POST['score'])){
		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,ball) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score','1')";
			mysqli_query($conn, $sql);
	}else if(isset($_POST['wicket'])){
		if ($_POST['wicket_extra1']==null) {
			# code...

		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,ball,wicket) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score','1',1)";
			mysqli_query($conn, $sql);
		}

		else{
		$ext=$_POST['wicket_extra1'];
		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,ball,wicket,extra_type) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score','',1,'$ext')";
			mysqli_query($conn, $sql);
		}
	}else if(isset($_POST['wide'])){
	$wide=$_POST["wide"];
		
		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,extra_type) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score','$wide')";
			mysqli_query($conn, $sql);

	}else if(isset($_POST['noball'])){
		$noball=$_POST['noball'];
		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,extra_type) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score','$noball')";
			mysqli_query($conn, $sql);
	}else if(isset($_POST['bies'])){
		$bies=$_POST['bies'];
		$sql = "INSERT into score (match_id,team_id,player_id,bowler_id,run,extra_type,ball) VALUES ('$match_id','".$batting_team['current_bating']."','".$MatchPlayersResult['player1_id']."','".$MatchPlayersResult['bowler_id']."','$score-1','$bies',1)";
			mysqli_query($conn, $sql);
	}
	if (isset($_POST['wicket'])) {
		header('location:../views/batsman_update.php?mid='.$match_id.'&&over='.$over['total_ball'].'');
		
	}
else if (($over_data==0)&& (!isset($_POST['wide']))&&(!isset($_POST['noball'])))  {
	

	
	
	header('location:../views/bowler_update.php?mid='.$match_id.'');
}else{
header('location:../views/update_score.php?mid='.$match_id.'');}
?>