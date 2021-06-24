	<?php
include_once '../../../cricket/database.php';
$candidate=$_POST['name'];
$ward=$_POST['ward'];
$votes=$_POST['votes'];
$pid=$_POST['pid'];


$Sql = "SELECT * FROM candidates Where id='$candidate'";
   $team1 = mysqli_query($conn, $Sql);
   	$team = mysqli_fetch_assoc($team1);





	echo 	$sql1 = "INSERT into votes (candidate_name,candidate_id,symbol,type,panchayath_id,ward,votes) VALUES ('".$team['name']."','".$team['id']."','".$team['symbol']."','".$team['type']."','".$team['panchayath_id']."','$ward','$votes')";
			mysqli_query($conn, $sql1);

header('location:../views/votes.php?pid='.$pid.'');
