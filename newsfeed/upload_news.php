<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jusno | Explore | Upload News</title>
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
<div class="container">
  	  <h4> Uninstall old and Download New Jusno App to Upload Photos</h4>
<a href="https://github.com/Jusnocode/Jusno_Downloads/raw/master/Jusno.apk"><h3>Click here to download app</h3></a>

<form action="newsfeed.php" enctype="multipart/form-data" method="post">

    <div class="form-group">
       <label for="news_headline"><h2>News Headline <strong><h6>Please Upload news with confirmation and DO NOT miss use this site to promote unwanted things</h6></strong></h1></label><br>
       <input class="form-control" type="text" name="author" placeholder="Author Name (Your Name)" style="width: 250px;" required>
      <div style="padding-top: 10px;">
      <textarea class="form-control" id="news_headline" placeholder="Type Headline of the news" name="headline"   style="height:75px;" required></textarea>
    </div>
    </div>
 

 <div class="row">
    <div class="col-sm-3">
    <div  class="form-inline">
      <input type="text" class="form-control" name="place" id="pwd" placeholder="Place" required>
    </div>
    </div>

   <div class="col-sm-3">
      <select class="form-control" name="category"> 
      <option value="general">Select category</option>
      <option value="Social">Social News</option>
      <option value="Sports">Sports News</option>
      <option value="Technology">Technology News</option>
      <option value="Political">Political News</option>
      <option value="Crime">Crime News</option>
      <option value="Lifestyle">Lifestyle News</option>
      <option value="art">Art News</option>
      <option value="Entertainment">Entertainment News</option>      
      <option value="Business">Business News</option>
      </select>
    </div>
</div>

    <div class="form-group">
     <label for="content"><h3>Content of the news</h3></label>
      <textarea class="form-control" id="content" placeholder="Content of the News" name="content"   style="height:500px;" required></textarea>
        </div>

<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" ></p>

    <div class="row">    
    <div class="col-sm-3">
       <div class="box_align">
         <div class="img_upload">
            <div class="upload-btn-wrapper">
               <input id="fileToUpload"  name="fileToUpload" type="file" multiple="multiple" style="line-height: 1.5;"> 
               </div><div id="dvPreview">
            </div>
         </div>
       </div>
    </div>
      <div class="col-sm-3" style=" padding-bottom: 50px;">
            <button type="submit" name="submit" class="btn btn-primary" style="width: 150px;">Submit</button>
      </div>
</div>

<!-- <script language="javascript" type="text/javascript">
  window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
      fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
          var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
              var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.mp4)$/;
                for (var i = 0; i < fileUpload.files.length; i++) {
                 var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "600";
                        img.width = "700";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};
</script>
 -->
    
    </form>
  </div>

  </body>
</html>