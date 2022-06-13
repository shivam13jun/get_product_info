<?php include "header.php"; 
 session_start();
if (!isset($_SESSION["Authenticated"]))
{
   echo  "<script>
       window.location='login.php';
       </script>";
}
// If upload button is clicked ...
if (isset($_POST['save'])) {
    $title=$_POST['cat_name'];
    $filename = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];    
        $folder = "./product/cat/".$filename;
        header("location:all_products.php");
  
        // Get all the submitted data from the form
        $sql = "insert into category(cat_name,product_image) values ('$title','$filename')";
  
        // Execute query
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
//  Start sidebar 
 include "sidebar.php"; 

?>
<div class="col py-3">
    <!--  Content area -->
    <div class="description">
        <form method="post" enctype="multipart/form-data">
        
            
            
            
            <label><b>Category Name</b></label>
            <input type="text" name="cat_name" /><br>
           
            <label><b>Upload Featured image</b></label><br>
            <input type="file" name="fileupload" />
            <input type="submit" name="save" value="Submit" />
        </form>

    </div>
</div> <!-- Close Content area -->
</div>
</div>
<!-- End Sidebar -->

<?php include "footer.php"; ?>