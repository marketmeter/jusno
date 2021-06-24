<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jusno | Gallary | Explore | Thalavadi </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 </head>
<body>
    
<?php
include '../header/header.php';
?>

<div class="container" style="line-height: 1.5;">

<h4> Uninstall old and Download New Jusno App to Upload Photos</h4>
<a href="https://github.com/Jusnocode/Jusno_Downloads/raw/master/Jusno.apk"><h3>Click here to download app</h3></a>


      <form action="gallary.php" method="post" enctype="multipart/form-data">
      <!-- <div class="row"> -->
      <!-- <div class="col-md-4"> -->
      <!-- </div> -->
            <div class="col-md-4">
      <div class="form-group" style="padding-top: 20px;">      
      <textarea class="form-control" rows="3" name="comment" placeholder="Write something about the picture" required></textarea>
      <!-- </div> -->
      </div>
      </div>
      

      <div class="row">
      <div class="col-md-2"> 
      <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="loadFile(event)">
      <label for="fileToUpload" class="btn btn-primary btn-block" style="cursor: pointer;">Select</label>
      </div>

        <div class="col-md-auto">
             <img id="output" width="200"/ alt=" " style="padding-bottom: 15px;">
        </div>
      <!-- </div> -->


      <div class="col-md-4">
      <input type="submit" value="Upload" name="submit"  class="btn btn-outline-success" align="center">
      </div>
      </div>

          <script>
          var loadFile = function(event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
          if (image.src > 0) {
           alert("image selecetd");
          }
          };
          </script>    
      </form>


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


$sql = "SELECT * FROM photos where publish='1' order by id desc";
// ORDER BY photos DESC;
if ($result = $conn->query($sql)) { 

  while ($row = $result->fetch_assoc()) {
    $content = $row["content"];
    $filepath = $row["file_path"];
    $id = $row["id"];
    // echo "$content";
    // echo "$filepath";
    // echo "$id";
?>


    <!-- <div class="row"> -->
    <div class="col-md-6">
      <div class="thumbnail">
        <!-- <a href="/images/a.jpg" target="_blank"> -->
          <img src="<?php echo($filepath) ?>" alt="Lights" style="width:100%; padding-top: 30px;">
          <div class="caption">
            <strong><h6 style="color: brown;"><?php echo "$content"; ?></h6></strong>
          </div>
        <!-- </a> -->
      </div>
    </div>



<?php
  
 }

// $result = mysqli_query($conn, $sql);

// echo "id: " . $row["db_filepath"]. " - Name: " . $row["db_content"]."<br>";


// $row = $result->fetch_assoc();





// $sql = "SELECT content, file_path FROM photos";


// $result = mysqli_query($conn, $sql);
// $row = $result->fetch_assoc();
//         // echo "id: " . $row["teamname_1"]. " - Name: " . $row["teamname_2"]. " " . $row["uniq_id"]. "<br>";

// $db_filepath = $row["file_path"];
// $db_content = $row["content"];

// echo "$db_filepath";
// echo "$db_content";

// Search from DB New



 ?>
            <div class="load-more" class="col-md-6" align="center" style="padding-bottom: 50px;" >
              <button class="load-more-button material-button" type="button">
                <i class="material-icons">&#xE5D5;</i>
                <span>Load More</span>
              </button>
            </div>
  <?php

   ?>
</div>
            
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
              // echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              // echo "File is not an image.";
              $uploadOk = 0;
          }
      }

        // Check if file already exists
        // if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            // $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            // echo "Sorry, your file is too large.";
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
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
          
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                $details = $_POST['comment'];
                $sql = "INSERT INTO photos (content, file_path)
                VALUES ('$details', '$target_file')";
                if ($conn->query($sql) == TRUE) {
                  // $last_id = $conn->insert_id;
                  echo "New record created successfully";

                      
                        
                        }   

                    } 
                  }
                  echo "<script>window.location.href='gallary.php'</script>";

                    // header('location: gallary.php');
                    // exit();
          }

        }

    // location.reload(forceGet);

?>

</body>
</html>