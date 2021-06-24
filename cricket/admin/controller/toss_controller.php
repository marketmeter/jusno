<?php 
include_once '../../database.php';
$toss_team = $_POST["toss"];
$choosen = $_POST["choosen"];
$match_id = $_POST["match_id"];




$MatchSelect = "SELECT * FROM fixtures WHERE id = '$match_id'";
$MatchSelectQuery = mysqli_query($conn,$MatchSelect);

$MatchSelectResult = mysqli_fetch_assoc($MatchSelectQuery);
if(empty($MatchSelectResult['toss_team'])){
	if($choosen ==1){
		$CurrentBattingId = $toss_team;
		$comment="Bat";
	}else{
		if($MatchSelectResult['team_1'] != $toss_team){
			$CurrentBattingId = $MatchSelectResult['team_1'];
		}else{
			$CurrentBattingId = $MatchSelectResult['team_2'];
		}
		$comment="Bowl";
	}
	$result=1;

	$FixtureUpdateSql = "UPDATE fixtures set toss_team='$toss_team',current_bating = '$CurrentBattingId', result = $result, comments='$comment' where id='$match_id'";
	mysqli_query($conn, $FixtureUpdateSql);


}
	header('location:../views/player.php?mid='.$match_id.'');
// echo $toss_team;
?>


