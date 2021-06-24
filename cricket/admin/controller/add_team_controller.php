<?php
include_once '../../database.php';

$team_name = $_POST['team_name'];



	$sql = "INSERT into team (name) VALUES ('$team_name')";
	$result = mysqli_query($conn, $sql);

if ($result) {
echo "success";
	# code...
}

header('location:../views/add_team.php');
?>