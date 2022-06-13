<?php
include "config.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>get_product_info</title>
  
    <link href="style.css" rel="stylesheet">
    <link href="bootsrap.css" rel="stylesheet">
   <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.lang.en.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Products</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <?php 
                               $sql="select * from category";
                               $result=mysqli_query($conn,$sql);
                               while ($row=mysqli_fetch_assoc($result)) {
                                   $cat_name=$row['cat_name'];
                                   $cat_id=$row['cat_id'];
                               ?>
          <a class="dropdown-item" href="cat_products.php?catid=<?php echo $row['cat_id']; ?>"> <?php echo $cat_name; ?></a>
                               <?php } ?>
        
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>


   
    