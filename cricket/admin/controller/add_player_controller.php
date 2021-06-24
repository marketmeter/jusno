<?php
include_once '../../database.php';


$match_id = $_POST['match_id'];

if (isset($_POST['comment'])) {
	if ($_POST['comment']=='1') {
		 $sql = "UPDATE fixtures set result='2',comments='1' where id='$match_id'";
	mysqli_query($conn, $sql);
		
	}
	else{
		$winning=$_POST['winning'];
		 $sql = "UPDATE fixtures set result='2',winning_team_id='$winning',comments='0' where id='$match_id'";
	mysqli_query($conn, $sql);
	}
header('location:../views/index.php?mid='.$match_id.'');
	
}
else{
$team1_players = $_POST['team1_player_name'];
$team2_players = $_POST['team2_player_name'];
$team1_id = $_POST['team1_id'];
$team2_id = $_POST['team2_id'];
foreach ($team1_players as $key => $team1_player) {
	// echo $team1_player;
	$sql1 = "INSERT into players (name,team_id,match_id) VALUES ('$team1_player','$team1_id','$match_id')";
	$result1 = mysqli_query($conn, $sql1);
}
foreach ($team2_players as $key => $team2_player) {
	$sql = "INSERT into players (name,team_id,match_id) VALUES ('$team2_player','$team2_id','$match_id')";
	$result = mysqli_query($conn, $sql);
}
echo "success";
header('location:../views/toss.php?mid='.$match_id.'');
}

?>