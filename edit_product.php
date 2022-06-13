<?php

include "header.php"; 
session_start();
if (!isset($_SESSION["Authenticated"]))
{
  echo  "<script>
       window.location='login.php';
       </script>";
}
 
// If upload button is clicked ...
if (isset($_POST['save'])) {
    $product_id=$_GET['productid'];
    $title=$_POST['title'];
    $tin=$_POST['tin'];
    $tiny=$_POST['tiny'];
    $product_image = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];    
        $folder = "./product/images/".$product_image;
        header("location:all_products.php");
  
        // Get all the submitted data from the form
        $sql = "update product set title='$title', tin='$tin',tiny='$tiny', product_image='$product_image' where product_id= '$product_id' ";
  
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
                               $edit_id=$_GET['productid'];
                               $sql="select * from product where product_id='$edit_id' ";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $title=$row['title'];
                                   $tin=$row['tin'];
                                   $tiny=$row['tiny'];
                                   $product_image=$row['product_image'];
                                   $product_id=$row['product_id'];
                               ?>
        <form method="post" enctype="multipart/form-data">


            <label><b>Product Name</b></label>
            <input type="text" name="title" value="<?php echo $title ;?>" /><br>
            <label><b>Short Description(Highlights)</b></label>
            <textarea id="tin" name="tin" value="<?php echo $tin ;?>"></textarea>
            <label><b>Description</b></label>
            <textarea id="tiny" name="tiny" value="<?php echo $tiny ;?>"></textarea>
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