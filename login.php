<?php include "header.php"; 
 
$msg='';
if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $sql="select *from admin_users where username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    session_start();
    if($count>0){
        $_SESSION['admin_login']='yes';
        $_SESSION['admin_user']=$username;
        $_SESSION["Authenticated"] = true;
     echo  "<script>
       window.location='add_product.php';
       </script>";
      
      
    }else{
        $msg="plese enter correct login details";  
    }

}


?>
<div class="col py-3">
    <!--  Content area -->
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form action="" method="post">
                     <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="User Name" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
                    <div class="field_error"><?php echo $msg ?></div>
               </div>
            </div>
         </div>
      </div>
</div> <!-- Close Content area -->
</div>
</div>
<!-- End Sidebar -->

<?php include "footer.php"; ?>