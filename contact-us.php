<?php include "header.php"; 
// If upload button is clicked ...
if (isset($_POST['email'])) {
    $cust_name=$_POST['name'];
    $email=$_POST['email'];
    $cust_num=$_POST['phone'];
    $message=$_POST['message'];
    $subject=$_POST['subject'];
   
  
        // Get all the submitted data from the form
        $sql = "insert into contact_us(cust_name,cust_num,email,message,subject) values ('$cust_name','$cust_num','$email','$message','$subject')";
  
        // Execute query
        mysqli_query($conn, $sql);
        
    //   mail
    $to = "shivamshukla13jun@gmail.com";
$subject = "Product Information from .$cust_name. ";

$message = "
<html>
<head>
<title>email</title>
</head>
<body>
<p>Product Info</p>
<table border='2' width='100%'>
<tr>
<th>Customer Name</th>
<th>Customer number</th>
<th>Customer Email</th>
<th>message</th>
<th>subject</th>
</tr>
<tr>
<td> $cust_name</td>
<td> $cust_num</td>
<td>$email</td>
<td> $message</td>
<td> $subject</td>

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
