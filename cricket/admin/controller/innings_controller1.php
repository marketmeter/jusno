<?php 
include_once '../../database.php';


$match_id = $_POST["match_id"];


if(isset($_POST['innings'])){
$current_batting = $_POST["team"];
 $sql = "UPDATE fixtures set current_bating='$current_batting' where id='$match_id'";
	mysqli_query($conn, $sql);
	header('location:../views/player.php?mid='.$match_id.'');}

elseif (isset($_POST['home'])) {
header('location:../views/update_score.php?mid='.$match_id.'');}

	else{
	$sql = "UPDATE fixtures set result='2' where id='$match_id'";
	mysqli_query($conn, $sql);
	header('location:../views/index.php?mid='.$match_id.'');}

?>