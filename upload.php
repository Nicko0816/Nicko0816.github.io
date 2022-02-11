<?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $upload = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "assets/img/".$upload;
          
    $db = mysqli_connect("localhost", "root", "", "dashboard");
       $subject = $_POST['subject'];
               $date = $_POST['date'];  
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO announcement (upload,subject,date) VALUES ('assets/img/$upload','$subject','$date')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded announcement into the folder: announcement
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "announcement uploaded successfully";
        }else{
            $msg = "Failed to upload announcement";
      }
  }
  $result = mysqli_query($db, "SELECT * FROM announcement");
while($data = mysqli_fetch_array($result))
{
  
      ?>
  
<?php
}
?>
  
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>
<div id="content">
  <br><br><br>
  <form method="POST" action="" enctype="multipart/form-data">
      <input type="file" name="uploadfile" value="" required="" />
      <input type="text" name="subject" value="" required="" />
      <input type="date" name="date" value=""  required="" />
        
      <div>
          <button type="submit" name="upload">UPLOAD</button>
        </div>
  </form>
</div>
</body>
</html>