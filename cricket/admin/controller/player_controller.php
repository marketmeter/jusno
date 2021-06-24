<?php 
include_once '../../database.php';

$player1 = $_POST["player1"];
$player2 = $_POST["player2"];
$bowler = $_POST["bowler"];
$match_id = $_POST["match_id"];


 // $sql = "INSERT into current_players (player1_id,player2_id,match_id,bowler_id) VALUES ('$player1','$player2','$match_id','$bowler')";


	// mysqli_query($conn, $sql);


$sql = "UPDATE current_players set player1_id='$player1',player2_id = '$player2', match_id = $match_id, bowler_id='$bowler' where id='1'";
	mysqli_query($conn, $sql);

		header('location:../views/update_score.php?mid='.$match_id.'');