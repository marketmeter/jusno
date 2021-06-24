<?php
   include_once '../../database.php';

$Sql = "SELECT name, id FROM team";
;
	$Team = mysqli_query($conn, $Sql);
	$Team1 = mysqli_query($conn, $Sql);

?>
<form action="../controller/add_fixtures_controller.php" method="POST">

	<select name="team1">
   	<?php while($row = mysqli_fetch_assoc($Team)){ ?>
   		Striker<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
   	<?php } ?> 
   		
   </select><p>Vs</p>
   <select name="team2">
   	<?php while($row = mysqli_fetch_assoc($Team1)){ ?>
   		Striker<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
   	<?php } ?> 
   		
   </select>
	<input type="datetime-local" name="date_time">
	<input type="submit" name="" value="Submit">
</form>
