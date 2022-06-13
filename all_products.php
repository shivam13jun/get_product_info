<?php include "header.php"; 
session_start();
if (!isset($_SESSION["Authenticated"]))
{
    echo  "<script>
       window.location='login.php';
       </script>";
}
if(isset($_GET['del'])){
  $del=$_GET['del']; 
  $delete="delete from product where product_id='$del' ";
  $result=mysqli_query($conn,$delete);
}
//  Start sidebar 
 include "sidebar.php";


?>
<div class="col py-3">
    <!--  Content area -->
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>id</th>
                <th>Product Name</th>

                <th>Product Image</th>
                <!-- <th>Short description</th> -->
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                               $sql="select * from product order by product_id DESC ";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $title=$row['title'];
                                   $tin=$row['tin'];
                                   $tiny=$row['tiny'];
                                   $product_image=$row['product_image'];
                                   $product_id=$row['product_id'];
                               ?>
            <tr>
                <td>
                    <p class="fw-normal mb-1"><?php echo $product_id; ?></p>

                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo $title; ?></p>

                        </div>
                    </div>
                </td>

                <td>
                    <img src="./product/images/<?php echo $product_image; ?>" alt="" style="width: 45px; height: 45px"
                        class="rounded-circle" />

                </td>
                <!-- <td>
                    <span class="badge badge-success rounded-pill d-inline"></span>
                </td> -->
                <td>
                    <a href="edit_product.php?productid=<?php echo $product_id; ?>" type="submit" class="btn btn-primary" >
                        Edit
                    </a>
                    <a href="all_products.php?del=<?php echo $product_id; ?>" type="submit" class="btn btn-primary" >
                        Delete
                    </a>
                </td>
            </tr>


            <?php }
            ?>
        </tbody>
    </table>
</div> <!-- Close Content area -->
</div>
</div>
<!-- End Sidebar -->

<?php include "footer.php"; ?>