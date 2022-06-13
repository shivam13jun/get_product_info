<?php include "header.php"; ?>

<div class="container mt-5">
    <div class="row ">
        <?php
                $select="select* from product";
                $result=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($result)) {
                
                
                ?>
        <div class="col-lg-4">

            <div class="card">

                <img id="example" class="card-img-top" src="./product/images/<?php echo $row['product_image']; ?>"
                    alt="Card image cap">
                <div class="card-body">
                    <?php echo $row['title']; ?>
                    <a href="product.php?productid=<?php echo $row['product_id']; ?>" class="btn btn-primary">For Price
                        Qoutes</a>

                </div>

            </div>
        </div>
        <?php }
                ?>
    </div>
</div>


<?php include "footer.php"; ?>