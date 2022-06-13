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
    $title=$_POST['title'];
    $cat_id=$_POST['cat_id'];
    $tin=$_POST['tin'];
    $tiny=$_POST['tiny'];
    $filename = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];    
        $folder = "./product/images/".$filename;
        header("location:all_products.php");
  
        // Get all the submitted data from the form
        $sql = "insert into product(title,tiny,product_image,tin,cat_id) values ('$title','$tiny','$filename','$tin',$cat_id)";
  
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
        
            <select name="cat_id" class="form-select" aria-label="Default select example">
            
               
                <?php 
                               $sql="select * from category";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $cat_name=$row['cat_name'];
                                   $cat_id=$row['cat_id'];
                               ?>
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                <?php } ?>
            </select>
            
            
            <label><b>Product Name</b></label>
            <input type="text" name="title" /><br>
            <label><b>Short Description(Highlights)</b></label>
            <textarea id="tin" name="tin"></textarea>
            <label><b>Description</b></label>
            <textarea id="tiny" name="tiny"></textarea>
            <br>
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