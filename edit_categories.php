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
    $cat_id=$_POST['cat_id'];
    $title=$_POST['cat_name'];
    $product_image = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];    
        $folder = "./product/cat/".$product_image;
        header("location:all_categories.php");
  
        // Get all the submitted data from the form
        $sql = "update category set cat_name='$title', product_image='$product_image' where cat_id= '$cat_id' ";
  
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
<div class="col py-3">  <!--  Content area -->
    <div class="description">
    <?php 
                               $edit_id=$_GET['cat_id'];
                               $sql="select * from category where cat_id='$edit_id' ";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $cat_name=$row['cat_name'];
                                   $product_image=$row['product_image'];
                                   $cat_id=$row['cat_id'];
                               ?>
        <form method="post" enctype="multipart/form-data">


            <label><b>Product id</b></label>
            <input type="text" name="cat_id" value="<?php echo $cat_id ;?>" /><br>
            <label><b>Product Name</b></label>
            <input type="text" name="cat_name" value="<?php echo $cat_name ;?>" /><br>
            <br>
            <label><b>Upload Featured image</b></label><br>

            <input type="file" name="fileupload"  value="<?php echo $product_image ;?>" />
            <input type="submit" name="save" value="Submit" />
        </form>
<?php
                               }
                               ?>
    </div>
</div>  <!-- Close Content area -->
</div>
</div>
<!-- End Sidebar -->

<?php include "footer.php"; ?>