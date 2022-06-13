<?php
session_start();
unset($_SESSION['admin_login']);
unset($_SESSION['admin_user']);
unset($_SESSION['Authenticated']);
header("location:login.php");


?>