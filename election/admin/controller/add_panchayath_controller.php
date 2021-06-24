<?php
include_once '../../../cricket/database.php';

$panchayath_name = $_POST['panchayath'];



	$sql = "INSERT into panchayath (panchayath_name) VALUES ('$panchayath_name')";
	$result = mysqli_query($conn, $sql);

if ($result) {
echo "success";
	# code...
}

header('location:../views/add_panchayath.php');
?>