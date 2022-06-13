<?php include "header.php"; 
// If upload button is clicked ...
if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $cust_name=$_POST['cust_name'];
    $email=$_POST['email'];
    $cust_num=$_POST['cust_num'];
    $qty=$_POST['qty'];
    $size=$_POST['size'];
    $flavour=$_POST['flavour'];
    $filename = $_FILES["product_image"]["name"];
    $tempname = $_FILES["product_image"]["tmp_name"];    
        $folder = "./product/images/".$filename;
  
        // Get all the submitted data from the form
        $sql = "insert into customer_info(title,cust_name,cust_num,product_image,qty,size,flavour,email) values ('$title','$cust_name','$cust_num','$filename','$qty','$size','$flavour','$email')";
  
        // Execute query
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
    //   mail
    $to = "shivamshukla13jun@gmail.com";
$subject = "Product Information from .$cust_name. ";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Product Info</p>
<table border='2' width='100%'>
<tr>
<th>Product Name</th>
<th>Customer Name</th>
<th>Customer number</th>
<th>Customer Number</th>
<th>Quantity</th>
<th>Size</th>
<th>Flavour</th>
</tr>
<tr>
<td> $title</td>
<td> $cust_name</td>
<td> $cust_num</td>
<td>$cust_name</td>
<td> $qty</td>
<td> $size</td>
<td> $flavour</td>

</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: $email ";

mail($to,$subject,$message,$headers);
  }
?>




<div class="container-fluid bootdey mt-5">
    <div class="col-md-12">
        <section class="panel">
            <div class="row">
                <?php
                if (isset($_GET['productid'])) {
                    # code...
                
            $id=$_GET['productid'];
               $select="select product.product_id, product.title,product.tin,product.tiny,product.product_image,category.cat_name,category.cat_id
                FROM product
                INNER JOIN category ON product.cat_id = category.cat_id where product_id='$id' ";
                $result=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($result)) {
                
                
                ?>
                <div class="col-md-6">
                    <div class="pro-img-details">
                        <div class="magnify">
                            <div class="large">

                            </div>
                            <!-- This is the magnifying glass which will contain the original/large version -->

                            <div class="imgbox"><img src="./product/images/<?php echo $row['product_image']; ?>"
                                    class="thumb img-fluid" /></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <h3><?php echo $row['title']; ?></h3>
                    <h3>Highlights</h3>
                    <p class="highlights w-100">
                        <?php echo $row['tin']; ?>
                    </p>
</div>
<div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           
                            
                            <h4 class="pro-d-title">
                                <a href="cat_products.php?catid=<?php echo $row['cat_id']; ?>" class="mt-10">
                                    <?php echo $row['cat_name']; ?>
                                </a>
                            </h4>
                            <b class="text-danger">Please Fill in Your Dtails</b><hr>
                            <div class="row">
                                 <div class="col-md-6">
                            <label>Quantity:</label>
                            <input type="num" name="qty" value="1" class="form-control quantity">
                            <label>Size:</label>
                            <input type="text" name="size" class="form-control quantity">
                            
                            <label>Flavour:</label>
                            
                            <input type="text" name="flavour" class="form-control quantity">
                            <input type="hidden" name="title" value="<?php echo $row['title']; ?>"
                                class="form-control quantity">
                               </div>
                               
                            <div class="col-md-6">
                            <label>Enter Your Name:</label>
                            <input type="text" name="cust_name" class="form-control quantity">
                            <label>Enter Your Email:</label>
                            <input type="email" name="email" class="form-control quantity" required>
                            <label>Enter Your Contact No:</label>
                            <input type="text" name="cust_num" class="form-control quantity" required>
                          
                             <br> <p>
                            <button class="btn btn-round btn-danger" name="submit" type="submit"><i
                                    class="fa fa-shopping-cart"></i>
                                Submit</button>
                        </p>
                            </div>
    <div class="text-center"><button type="button" class="btn btn-primary btn-lg text-center"><a href="index.php" class="text-white">Go Back</a></button></div>
                        </div>  
                            </div>
                         
                        </div>
                      
                    </form>
                </div>
                <div class="col-md-12">
                    <h2>Description</h2>
                    <p class="w-100">
                        <?php echo $row['tiny']; ?>
                    </p>
                </div>
                <?php } } ?>
            </div>
        </section>
    </div>
</div>

<?php include "footer.php"; ?>