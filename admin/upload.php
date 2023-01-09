<?php
    include('include/config.php');
    if(isset($_POST['btn'])){
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif','webp');      
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $filename = array_filter($_FILES['files']['name']); 
    if(!empty($filename)){ 
      $i=0;
      foreach($_FILES['files']['name'] as $key=>$val){
       // File upload path 
        $filename = basename($_FILES['files']['name'][$key]);
        $size = basename($_FILES['files']['size'][$key]); 
        $targetFilePath = $targetDir . $filename; 
        $date = date("Y-m-d H:i");
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
     // if(in_array($fileType, $allowTypes)){ 
        // Upload file to server 
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                // Image conn insert sql 
                $stmt = $conn->prepare("INSERT INTO images(name, path, size, date, status) VALUE(?,?,?,?,?)");
                if($stmt->execute([$filename, $targetFilePath, $size, $date, 1]))
                {
                  //echo $i;
                }else{
             //    echo  $statusMsg = "Upload failed! ".$errorMsg;
                }

            }else{ 
                $errorUpload .= $_FILES['files']['name'][$key].' | '; 
            }     
      // }else{ 
      //     $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
      // }
      $i++; 
    }
        if($i>0){
          echo "File Uploaded Successfully";
        }
        // Error message 
        echo $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        echo $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        echo $errorMsg = !empty($errorUpload)?' '.$errorUpload.' '.$errorUploadType:' '.$errorUploadType; 


        }else{ 
        echo $statusMsg = 'Please select a file to upload.'; 
    } 

  }
  if(isset($_POST['image_id'])){
    $images=$conn->prepare("SELECT * FROM images WHERE id=?");
    $images->execute([$_POST['image_id']]);
    $total_images = $images->rowCount();
    if ($total_images > 0) {
        while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="card mt-3" id="for_dynamicImage"> 
    <h3 class="text-center py-2">IMAGE DETAILS</h3> 
      <img class="card-img-top custome_card_image" src="<?php echo $row['path'] ?>" alt="<?php echo $row['alt'] ?>">
    <div class="card-body">
      <form id="imageUpdate">
        <h4 class="card-title"><?php echo $row['name'] ?></h4>
        <p class="card-text"><?php echo $date = date('d F Y', strtotime($row['date'])); ?></p>
        <p class="card-text">size <?php echo $size = formatSizeUnits($row['size']) ?></p>
        <div class="form-group">
          <label>Image Alt</label>
          <input type="text" class="form-control" value="<?php echo $row['alt'] ?>" name="alt"/>
        </div>
        <div class="form-group">
          <label>Image Title</label>        
          <input type="text" class="form-control" value="<?php echo $row['title'] ?>" name="title"/>
        </div>
        <input type="hidden" name="img_id" value="<?php echo $row['id'] ?>"/>
        <input type="hidden" name="btn" value="image_update"/>
        <div class=" d-flex justify-content-between m-2">
          <input type="submit" class="btn btn-primary" value="Update"/>
          <button type="button" class="btn btn-danger float-center my-3" onclick="deleteFeatureimage(<?php echo $row['id'] ?>)">Permanent Delete</button> 
        </div>     
      </form>
    </div>
  </div>
<?php
        }
      }
  }

  function formatSizeUnits($bytes)
  {
      if ($bytes >= 1073741824)
      {
          $bytes = number_format($bytes / 1073741824, 2) . ' GB';
      }
      elseif ($bytes >= 1048576)
      {
          $bytes = number_format($bytes / 1048576, 2) . ' MB';
      }
      elseif ($bytes >= 1024)
      {
          $bytes = number_format($bytes / 1024, 2) . ' KB';
      }
      elseif ($bytes > 1)
      {
          $bytes = $bytes . ' bytes';
      }
      elseif ($bytes == 1)
      {
          $bytes = $bytes . ' byte';
      }
      else
      {
          $bytes = '0 bytes';
      }

      return $bytes;
}
?>