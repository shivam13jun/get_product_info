<?php include "header.php"; 
// If upload button is clicked ...
if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $cust_name=$_POST['cust_name'];
    $cust_num=$_POST['cust_num'];
    $qty=$_POST['qty'];
    $size=$_POST['size'];
    $flavour=$_POST['flavour'];
    $filename = $_FILES["product_image"]["name"];
    $tempname = $_FILES["product_image"]["tmp_name"];    
        $folder = "./product/images/".$filename;
        header("location:admin.php");
  
        // Get all the submitted data from the form
        $sql = "insert into customer_info(title,cust_name,cust_num,product_image,qty,size,flavour) values ('$title','$cust_name','$cust_num','$filename','$qty','$size','$flavour')";
  
        // Execute query
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
?>




<div class="container bootdey">
    <div class="col-md-12">
        <section class="panel">
            <div class="row">
                <?php
                if (isset($_GET['catid'])) {
                    # code...
                
            $id=$_GET['catid'];
               $select="select product.product_id, product.title,product.tin,product.tiny,product.product_image,category.cat_name,category.cat_id
                FROM product
                INNER JOIN category ON product.cat_id = category.cat_id  where category.cat_id= '$id' ";
                $result=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($result)) {
                
                
                ?>
                <div class="col-md-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="pro-img-details">
                                <img id="example" name="product_image" src="./product/images/<?php echo $row['product_image']; ?>"
                                    class="img-responsive" alt="">
                            </div>
                            <h4 class="pro-d-title">
                                <a href="#" class="mt-10">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h4>


                        </div>
                        <p>
                        <a href="product.php?productid=<?php echo $row['product_id']; ?>" class="btn btn-primary">For Price  Qoutes</a>
                        </p>
                    </form>


                </div>
            
                <?php } } ?>
            </div>
        </section>
    </div>
</div>

<?php include "footer.php"; ?>