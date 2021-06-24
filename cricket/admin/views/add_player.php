<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>
    
<?php
// include '..\..\..\header\header.php';
?>

	
	<?php
	include_once '../../database.php';
	$match_id=$_GET["mid"];
	$sql = "SELECT *,fixtures.id as mid,fixtures.toss_team as toss_team,team1.name as team1name,team1.id as team1_id,team2.id as team2_id,team2.name as team2name FROM fixtures RIGHT JOIN team as team1 ON fixtures.team_1 = team1.id  RIGHT JOIN team as team2 ON fixtures.team_2 = team2.id where fixtures.id=$match_id";
 	$result = mysqli_query($conn, $sql);
	$MatchData = mysqli_fetch_assoc($result);
		
		if(!empty($MatchData["toss_team"])){
			header('location:../views/update_score.php?mid='.$match_id.'');

		}
		
		
		 ?>


			 	<?php
	    	// echo $MatchData["team1name"].' Vs ';
    	 //    echo $MatchData["team2name"];
    	    // echo $MatchData["team1_id"];
    	    // echo $MatchData["team2_id"];
    	    
		?>


		<div class="container">
		<div class="col-md-8">

  		<h4 style="text-align: center;"><?php echo  $MatchData["team1name"];?> Team members</h4>
		</div>
		
		


		<form class="form-horizontal" action="../controller/add_player_controller.php" method="POST">
			<input type="hidden" name="match_id" value="<?php echo  $match_id;?>">
   <p>About Match:</p>
   <input type="radio" name="comment" value="1" checked> Canceled/Abandoned/No result<br>
   <input type="radio" name="comment" value="0">One Team Not Present</br>
		<br>	<p>Who won the Match:</p>
   <input type="radio" name="winning" value="<?php echo $MatchData["team1name"];?>" checked> <?php echo  $MatchData["team1name"];?><br>
   <input type="radio" name="winning" value="<?php echo $MatchData["team2name"];?>"> <?php echo  $MatchData["team2name"];?><br>
   <input type="radio" name="winning" value=""> No result
   <br><input type="submit" value="submit" name="">

			</form>
			<br>
			<br>
		<form class="form-horizontal" action="../controller/add_player_controller.php" method="POST">

			  <!-- Match Id -->
			<input type="hidden" name="match_id" value="<?php echo  $match_id;?>">  <!-- Match Id -->

			<input type="hidden" name="team1_id"  value="<?php echo  $MatchData["team1_id"];?>"> <!-- Team Id -->

			<div class="form-group">      
      		<div class="col-sm-10">
			<input type="name" class="form-control" name="team1_player_name[]" value="player1">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player2">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player3">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player4">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player5">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player6">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player7">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player8">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player9">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player10">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player11">
			</div>
			</div>
			 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player12">
			</div>
			</div>

 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player13">
			</div>
			</div>
 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player14">
			</div>
			</div>
 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team1_player_name[]" value="player15">
			</div>
			</div>


		<div class="col-md-8">
  		<h4 style="text-align: center;"><?php echo  $MatchData["team2name"];?> Team members</h4>
		</div>

			<input type="hidden" name="team2_id"  value="<?php echo  $MatchData["team2_id"];?>">

			<div class="form-group">      
      		<div class="col-sm-10">
			<input type="name" class="form-control" name="team2_player_name[]" value="player1">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player2">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player3">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player4">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player5">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player6">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player7">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player8">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player9">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player10">
			</div>
	    	</div>	
		  	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player11">
			</div>
			</div>
						 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player12">
			</div>
			</div>

 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player13">
			</div>
			</div>
 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player14">
			</div>
			</div>
 	<div class="form-group">      
	      	<div class="col-sm-10">          
			<input type="name" class="form-control" name="team2_player_name[]" value="player15">
			</div>
			</div>




			<div class="col-md-12" align="center" style="padding-bottom: 30px;">
      			<input type="Submit" class="btn btn-primary">
   			</div>

		</form>




</body>
</html>