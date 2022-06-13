
<?php


// If upload button is clicked ...
if (isset($_POST['submit'])) {
  $title=$_POST['title'];
  $cust_name=$_POST['cust_name'];
  $cust_num=$_POST['cust_num'];
  $filename = $_FILES["fileupload"]["name"];
  $tempname = $_FILES["fileupload"]["tmp_name"];    
      $folder = "./images/".$filename;
      header("location:admin.php");

      // Get all the submitted data from the form
      $sql = "insert into customer_info(title,cust_name,cust_num,produc_image,qty) values ('$title','$cust_name','$cust_num','$filename','$qty')";

      // Execute query
      mysqli_query($conn, $sql);
        
      // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($tempname, $folder))  {
          $msg = "Image uploaded successfully";
      }else{
          $msg = "Failed to upload image";
    }
}
$result = mysqli_query($conn, "select * from image");

?>
