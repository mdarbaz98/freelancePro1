<?php
include('include/db.php');
if($_POST['btn'] == 'removeimage_id'){
    $id = $_POST['removeimage_id'];
    $stmt = $conn->prepare("SELECT * FROM images WHERE id=?");
    $stmt->execute([$id]);
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $path =$row['path'];
        echo $msg = deleteImage($path);
        $stmt1 = $conn->prepare("DELETE FROM `images` WHERE id=?");
        $stmt1->execute([$id]);
    
   }
}

$uploadImage = uploadImage($_FILES['files']['name'][0], $_FILES['files']['tmp_name'][0]);
if($uploadImage == 'done') {
    $stmt = $conn->prepare("INSERT INTO images (name, path) VALUES (:firstname, :lastname)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    // insert a row
    $firstname = $_FILES['files']['name'][0];
    $lastname = 'post/'.$_FILES['files']['name'][0];
    $email = "john@example.com";
    $stmt->execute();
    echo "done";
    }

function uploadImage($fileName, $fileTempName) {
    $ftp_server = "uk.storage.bunnycdn.com";
    $ftp_user_name = "druggistzone";
    $ftp_user_pass = 'f2644827-61d8-480e-a7c34508bb60-7bc2-490b';
    $ftp_port = "21";
    $destination_file = '/druggistzone/post/'.$fileName;
    $source_file = $fileTempName;

    $conn_id = ftp_connect($ftp_server,$ftp_port);

    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
    ftp_pasv($conn_id, true);

    if ((!$conn_id) || (!$login_result)) { 
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
        exit; 
    } else {
        // echo "Connected to $ftp_server, for user $ftp_user_name";
    }

    $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

    if (!$upload) { 
        // echo3 "done";
    } else {
        // echo "Uploaded $source_file to $ftp_server as $destination_file";
        return 'done';
    }

    ftp_close($conn_id);
}



function deleteImage($imageName) {
    $ftp_server = "uk.storage.bunnycdn.com";
    $ftp_username = "druggistzone";
    $ftp_userpass = 'f2644827-61d8-480e-a7c34508bb60-7bc2-490b';
    $ftp_port = "21";

    // set up basic connection
    $conn_id = ftp_connect($ftp_server,$ftp_port) or die("Could not connect to $ftp_server");

    // login with username and password
    ftp_login($conn_id, $ftp_username, $ftp_userpass);

    ftp_pasv($conn_id, true);

    //change dir
    ftp_chdir($conn_id, "/druggistzone/post/");

    // try to delete $file
    $file = "/druggistzone/".$imageName;
    if (ftp_delete($conn_id, $file)) {
        return 'done';
    } else {

    }
    // close the connection
    ftp_close($conn_id);
}

