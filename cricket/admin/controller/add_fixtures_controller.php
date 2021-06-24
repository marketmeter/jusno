<?php
include_once '../../database.php';

$team1_name = $_POST['team1'];
$team2_name = $_POST['team2'];
$date=$_POST['date_time'];


if($team1_name!==$team2_name){

	 $sql = "INSERT into fixtures (team_1,team_2,date_time,result) VALUES ('$team1_name','$team2_name','$date',0)";
	$result = mysqli_query($conn, $sql);

if ($result) {
echo "success";
	# code...
}

header('location:../views/add_fixtures.php');
}else{echo "team name should not be same";}

?>