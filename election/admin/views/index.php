<?php

if (isset($_SESSION['login_user'])){
      echo "login successfully";
   }
   include_once '../../../cricket/database.php';

 ?>

<!DOCTYPE html>
  <html lang="en">
  <head> 
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Jusno | Talavadi | Cricket Live Scores Talavadi rournaments | Results and More</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="../../../boostrap/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../../boostrap/cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="../../../boostrap/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta http-equiv="refresh" content="60"/>
</head>
<body>

<div class="container">    
      <div class="row" style="padding-top: 30px;">
        <div class="col">
      <h4><a href="add_panchayath.php" class="btn btn-primary">Add panchayath</a></h4>
    </div>

    <div class="col">
      <h4><a href="add_candidate.php" class="btn btn-success">Add Candidate</a></h4>
    </div>

    <div class="col">
      <h4><a href="logout.php" class="btn btn-danger">Logout</a></h4>
    </div>
      </div>
  

<?php
   include_once '../../../cricket/database.php';

$Sql = "SELECT panchayath_name, id FROM panchayath";
;
   $Team = mysqli_query($conn, $Sql);

?>

   
      <?php
       if(mysqli_num_rows($Team) > 0) { while($row = mysqli_fetch_assoc($Team)){ ?>
       
          <div class="row" >
             <div class="col-12">
                <address>
                   <strong><a href="../views/votes.php?pid=<?php echo $row['id']; ?>"> <?php echo $row['panchayath_name'] ?></a></strong><br>
                </address>
             </div>
          </div>
          <hr>
      <?php }}
  ?>
      
      
     
  
  </div>
  <style>
	.rss_news_table {
		text-align: left;
		width:30em;
		border: 1px solid #000000;
		font-size:12pt;
		font-family: Arial;
	}
	.rss_news_table th {
		color: #000000;
		font-size: 12px;
		font-family: Arial;
		background-color: #EFEFEF;
		padding: 0 0 0 0;
	}
	.rss_news_table td {
		color: #000000;
		font-size: 12px;
		background-color: #FFFFFF;
		font-family: Arial;
		padding: 0 0 4 0;
	}
	.rss_news_table span {
		color: #666666;
		font-family: Arial;
		font-size: 9px;
	}
</style>
<div class="container">    
      <div class="row" style="padding-top: 30px;">
        <div class="col">
<?php
$url = 'https://vijaykarnataka.com';
$text = file_get_contents($url);
$text = iconv('UTF-8', 'UTF-8//IGNORE', $text);
$dom = new DOMDocument();
$dom->loadXML($text);
$items = $dom->getElementsByTagName('item');
$data = array();
foreach ($items as $item) {
	$data[] = array(
		'title' => $item->getElementsByTagName('title')->item(0)->textContent,
		'link' => $item->getElementsByTagName('link') ->item(0)->textContent,
		'description' => strip_tags($item->getElementsByTagName('description')->item(0)->textContent),
		'date' => (($date = $item->getElementsByTagName('pubDate')->item(0)) ? $date->textContent : '')
	);
}
?>
<table class="rss_news_table" align="center">
<?php foreach ($data as $item) { ?>
	<tr>
		<th align="left">
			<a href="<?=$item['link']?>"><?=$item['title']?></a><br />
			<span><?=$item['date']?></span>
		</th>
	</tr>
	<tr>
		<td align="left"><?=$item['description']?><br /><br /></td>
	</tr>
<?php } ?>
</table>

<style>
	.rss_news_table {
		text-align: left;
		width:30em;
		border: 1px solid #000000;
		font-size:12pt;
		font-family: Arial;
	}
	.rss_news_table th {
		color: #000000;
		font-size: 12px;
		font-family: Arial;
		background-color: #EFEFEF;
		padding: 0 0 0 0;
	}
	.rss_news_table td {
		color: #000000;
		font-size: 12px;
		background-color: #FFFFFF;
		font-family: Arial;
		padding: 0 0 4 0;
	}
	.rss_news_table span {
		color: #666666;
		font-family: Arial;
		font-size: 9px;
	}
</style>
<?php
$url = 'http://free.supremerssnews.com/ap_sptbaseball.xml';
$text = file_get_contents($url);
$text = iconv('UTF-8', 'UTF-8//IGNORE', $text);
$dom = new DOMDocument();
$dom->loadXML($text);
$items = $dom->getElementsByTagName('item');
$data = array();
foreach ($items as $item) {
	$data[] = array(
		'title' => $item->getElementsByTagName('title')->item(0)->textContent,
		'link' => $item->getElementsByTagName('link') ->item(0)->textContent,
		'description' => strip_tags($item->getElementsByTagName('description')->item(0)->textContent),
		'date' => (($date = $item->getElementsByTagName('pubDate')->item(0)) ? $date->textContent : '')
	);
}
?>
<table class="rss_news_table" align="center">
<?php foreach ($data as $item) { ?>
	<tr>
		<th align="left">
			<a href="<?=$item['link']?>"><?=$item['title']?></a><br />
			<span><?=$item['date']?></span>
		</th>
	</tr>
	<tr>
		<td align="left"><?=$item['description']?><br /><br /></td>
	</tr>
<?php } ?>
</table>
</div>
</div>
</div>
  <style>
	.rss_news_table {
		text-align: left;
		width:30em;
		border: 1px solid #000000;
		font-size:12pt;
		font-family: Arial;
	}
	.rss_news_table th {
		color: #FF5315;
		font-size: 10px;
		font-family: Arial;
		background-color: #EFB4DA;
		padding: 0 0 0 0;
	}
	.rss_news_table td {
		color: #000000;
		font-size: 12px;
		background-color: #F455FF;
		font-family: Arial;
		padding: 0 0 4 0;
	}
	.rss_news_table span {
		color: #666666;
		font-family: Arial;
		font-size: 11px;
	}
</style>
<?php
$url = '';
$text = file_get_contents($url);
$text = iconv('UTF-8', 'UTF-8//IGNORE', $text);
$dom = new DOMDocument();
$dom->loadXML($text);
$items = $dom->getElementsByTagName('item');
$data = array();
foreach ($items as $item) {
	$data[] = array(
		'title' => $item->getElementsByTagName('title')->item(0)->textContent,
		'link' => $item->getElementsByTagName('link') ->item(0)->textContent,
		'description' => strip_tags($item->getElementsByTagName('description')->item(0)->textContent),
		'date' => (($date = $item->getElementsByTagName('pubDate')->item(0)) ? $date->textContent : '')
	);
}
?>
<table class="rss_news_table" align="center">
<?php foreach ($data as $item) { ?>
	<tr>
		<th align="left">
			<a href="<?=$item['link']?>"><?=$item['title']?></a><br />
			<span><?=$item['date']?></span>
		</th>
	</tr>
	<tr>
		<td align="left"><?=$item['description']?><br /><br /></td>
	</tr>
<?php } ?>
</table>
<style>
	.rss_news_table {
		text-align: left;
		width:30em;
		border: 1px solid #000000;
		font-size:12pt;
		font-family: Arial;
	}
	.rss_news_table th {
		color: #FF5315;
		font-size: 10px;
		font-family: Arial;
		background-color: #EFB4DA;
		padding: 0 0 0 0;
	}
	.rss_news_table td {
		color: #000000;
		font-size: 12px;
		background-color: #F455FF;
		font-family: Arial;
		padding: 0 0 4 0;
	}
	.rss_news_table span {
		color: #666666;
		font-family: Arial;
		font-size: 11px;
	}
</style>
<?php
$url = 'http://free.supremerssnews.com/yahoo_world.xml';
$text = file_get_contents($url);
$text = iconv('UTF-8', 'UTF-8//IGNORE', $text);
$dom = new DOMDocument();
$dom->loadXML($text);
$items = $dom->getElementsByTagName('item');
$data = array();
foreach ($items as $item) {
	$data[] = array(
		'title' => $item->getElementsByTagName('title')->item(0)->textContent,
		'link' => $item->getElementsByTagName('link') ->item(0)->textContent,
		'description' => strip_tags($item->getElementsByTagName('description')->item(0)->textContent),
		'date' => (($date = $item->getElementsByTagName('pubDate')->item(0)) ? $date->textContent : '')
	);
}
?>
<table class="rss_news_table" align="center">
<?php foreach ($data as $item) { ?>
	<tr>
		<th align="left">
			<a href="<?=$item['link']?>"><?=$item['title']?></a><br />
			<span><?=$item['date']?></span>
		</th>
	</tr>
	<tr>
		<td align="left"><?=$item['description']?><br /><br /></td>
	</tr>
<?php } ?>
</table>

</body>
</html>