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
  $delete="delete from category where product_id='$del' ";
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
                <th>Cat_id</th>
                <th>Category Name</th>

                <th>Category Image</th>
                <!-- <th>Short description</th> -->
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                               $sql="select * from category";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $cat_name=$row['cat_name'];
                                   $product_image=$row['product_image'];
                                   $cat_id=$row['cat_id'];
                               ?>
            <tr>
                <td>
                    <p class="fw-normal mb-1"><?php echo $cat_id; ?></p>

                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo $cat_name; ?></p>

                        </div>
                    </div>
                </td>

                <td>
                    <img src="./product/cat/<?php echo $product_image; ?>" alt="" style="width: 45px; height: 45px"
                        class="rounded-circle" />

                </td>
                <!-- <td>
                    <span class="badge badge-success rounded-pill d-inline"></span>
                </td> -->
                <td>
                    <a href="edit_categories.php?cat_id=<?php echo $cat_id; ?>" type="submit" class="btn btn-primary" >
                        Edit
                    </a>
                    <a href="all_categories.php?del=<?php echo $product_id; ?>" type="submit" class="btn btn-primary" >
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