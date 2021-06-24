<?php 
include_once '../../database.php';


$bowler = $_POST["bowler"];
$match_id = $_POST["match_id"];




$sql = "UPDATE current_players set match_id = $match_id, bowler_id='$bowler' where id='1'";
	mysqli_query($conn, $sql);

		header('location:../views/update_score.php?mid='.$match_id.'');