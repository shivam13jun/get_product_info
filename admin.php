<?php include "header.php"; 
session_start();
if (!isset($_SESSION["Authenticated"]))
{
    echo  "<script>
       window.location='login.php';
       </script>";
}

//  Start sidebar 
//  include "sidebar.php"; 

?>
<div class="col py-3">  <!--  Content area -->
<h1>Admin Panel</h1>

    
</div>  <!-- Close Content area -->
</div>
</div>
<!-- End Sidebar -->

<?php include "footer.php"; ?>
