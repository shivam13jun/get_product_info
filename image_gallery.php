<?php
include "header.php";

 if(isset($_POST['submit'])){
        
    $uploadsDir = "uploads/";
    $allowedFileType = array('jpg','png','jpeg');
    
    // Velidate if files exist
    if (!empty(array_filter($_FILES['fileUpload']['name']))) {
        
        // Loop through file items
        foreach($_FILES['fileUpload']['name'] as $id=>$val){
            // Get files upload path
            $fileName        = $_FILES['fileUpload']['name'][$id];
            $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;
            if(in_array($fileType, $allowedFileType)){
                    if(move_uploaded_file($tempLocation, $targetFilePath)){
                        $sqlVal = "('".$fileName."', '".$uploadDate."')";
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "File coud not be uploaded."
                        );
                    }
                
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
            // Add into MySQL database
            if(!empty($sqlVal)) {
                $insert = $conn->query("INSERT INTO image_gallery (images, date_time) VALUES $sqlVal");
                if($insert) {
                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Files coudn't be uploaded due to database error."
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }
} 
?>

<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="mb-3">
      <h3 class="text-center mb-5">Upload Multiple Images in PHP 8</h3>
      <div class="user-image mb-3 text-center">
        <div class="imgGallery"> 
          <!-- Image preview -->
        </div>
      </div>
      <div class="custom-file">
        <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
        <label class="custom-file-label" for="chooseFile">Select file</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
        Upload Files
      </button>
    </form>
    <!-- Display response messages -->
    <?php if(!empty($response)) {?>
        <div class="alert <?php echo $response["status"]; ?>">
           <?php echo $response["message"]; ?>
        </div>
    <?php }?>
  </div>
 

  <?php include "footer.php"; ?>