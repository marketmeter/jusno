<?php 
include_once '../../database.php';

$player1 = $_POST["striker"];
$player2 = $_POST["non_striker"];
$match_id = $_POST["match_id"];
$balls=$_POST["balls"];
$balls=$balls+1;

$sql = "UPDATE current_players set player1_id='$player1',player2_id = '$player2', match_id = '$match_id' where id='1'";
	mysqli_query($conn, $sql);

if ($balls%6==0) {
		header('location:../views/bowler_update.php?mid='.$match_id);
}else{
		header('location:../views/update_score.php?mid='.$match_id);
}
	
	?>