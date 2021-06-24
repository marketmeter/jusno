<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jusno | Upload News | News Feed</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<!-- Tooltip plugin (zebra) css file -->
	<!-- <link rel="stylesheet" type="text/css" href="plugins\zebra-tooltip\zebra_tooltips.min.css"> -->

	<!-- Owl Carousel plugin css file. only used pages -->
	<!-- <link rel="stylesheet" type="text/css" href="plugins\owl-carousel\assets\owl.carousel.min.css"> -->

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css\main-style.css">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css\responsive-style.css">
	
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
 
<body>

<?php
 include '../header/header.php';
  ?>
  


	<!--Main container start -->
	<main class="main-container">


		<section class="main-content">
			
	  <h4> Uninstall old and Download New Jusno App to Upload Photos</h4>
<a href="https://github.com/Jusnocode/Jusno_Downloads/raw/master/Jusno.apk"><h3>Click here to download app</h3></a>

			<div class="main-content-wrapper">
				<div class="content-body">
					<div class="content-timeline">
					
					
						<!--Timeline header area start -->
						<a href="upload_news.php"><h4 style="color: red;">Click Here to Upload News</h4></a>
						<div class="post-list-header">							
							<span class="post-list-title">Latest stories</span>
							<!-- <select class="frm-input">
								<option value="1">Technology</option>
								<option value="1">Book</option>
								<option value="1">Cinema</option>
							</select> -->
						</div>
						<!--Timeline header area end -->


    <?php

// RETUEN IMAGES AND DETAILS

$servername = "localhost";
$username = "jusexp7_cricket";
$password = "2a8h6ogAYR";
$dbname = "jusexp7_cricket";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM news where publish='1'and id between (1) and (100) order by id desc ";
// $query = "SELECT * FROM news";
// ORDER BY photos DESC;
if ($result = $conn->query($query)) { 

  while ($row = $result->fetch_assoc()) {
  	$db_id = $row["id"];
    $db_time = $row["time"];
    $db_author = $row["author"];
    $db_headline = $row["headline"];
    $db_place = $row["place"];
    $db_category = $row["category"];
    $db_filepath = $row["filepath"];
    $db_content = $row["content"];
    // echo "$content";
    // echo "$filepath";
    // echo "$db_id";
?>

<!--Timeline items start -->
							<div class="timeline-items">
							<div class="timeline-item" style="padding-top: 30px;">
								<div class="timeline-left">
										<div class="timeline-left-wrapper">
										<h4 class="timeline-category"><i class="material-icons">&#xE894;</i></h4>
										<span class="timeline-date"><?php echo "$db_time"; ?></span>
									</div>
								</div>
								<div class="timeline-right">
									<div class="timeline-post-image">
										<!-- <a href="#"> -->
											<img src="<?php echo($db_filepath) ?>" width="260" data-toggle="collapse" data-target="#demo<?php echo($db_id) ?>" >
										<!-- </a> -->
									</div>
									<div class="timeline-post-content">
										<h4 class="timeline-category-name"><?php echo "$db_category"; ?></h4>
										<!-- <a href="detail-full-width.html"> -->
											<h3 style="color: brown;" class="timeline-post-title" data-toggle="collapse" data-target="#demo<?php echo($db_id) ?>" ><?php echo "$db_headline"; ?></h3>
										<!-- </a> -->
										<!-- <div class="timeline-post-info"> -->
											<!-- <a href="#" class="author">Tevrat Gündoğdu</a> -->

											<!-- <button data-toggle="collapse" data-target="#demo<?php echo($db_id) ?>" type="button" class="btn btn-primary">Read more</button> -->
											<div id="demo<?php echo $db_id ?>" class="collapse">											
											<h5> <?php echo "$db_content"; ?>
											</h5>
			  								</div>

											<!-- <span class="dot"></span> -->
											<!-- <span class="comment">32 comments</span> -->
										</div>
									</div>
								</div>

							</div>
<?php
  }

 }
?>
								<!--Timeline items start -->
						<!-- <div class="timeline-items"> -->
						<!--Timeline items start -->
						<!-- <div class="timeline-items"> -->

						<!--Timeline items end -->
						<!-- <div class="load-more">
							<button class="load-more-button material-button" type="button" name="loadmore">
								<i class="material-icons">&#xE5D5;</i>
								<span>Load More</span>
							</button>
						</div> -->
				</div>				
			</div>
		</div>
	</section>
</main>


	<div class="overlay"></div>

<?php

$servername = "localhost";
$username = "jusexp7_cricket";
$password = "2a8h6ogAYR";
$dbname = "jusexp7_cricket";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])){

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
          
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                $author = $_POST['author'];
                $headline = $_POST['headline'];
              	$place = $_POST['place'];
              	$category = $_POST['category'];
              	$content = $_POST['content'];


                $sql = "INSERT INTO news (author, headline, place, category, filepath, content)
                VALUES ('$author', '$headline', '$place', '$category','$target_file', '$content')";
                if ($conn->query($sql) == TRUE) {
                  // $last_id = $conn->insert_id;
                    echo "New record created successfully";
                      }   
                    } 
                  }
                  echo "<script>window.location.href='newsfeed.php'</script>";
     			}

?>

	</body>

</html>