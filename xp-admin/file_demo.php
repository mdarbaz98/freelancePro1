<?php

     
    //  echo $_FILES['files']['name'][0];
    //  echo $_FILES["files"]["tmp_name"][0];

    $uploadImage = uploadImage($_FILES['files']['name'][0], $_FILES['files']['tmp_name'][0]);
    
    function uploadImage($fileName, $fileTempName) {
            //  echo $fileName;
            //  echo "</br>";
            //     echo $fileTempName;
    
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
         echo "Connected to $ftp_server, for user $ftp_user_name";
    }

    echo $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

    // if (!$upload) { 
    //      echo "done";
    // } else {
    //      echo "Uploaded $source_file to $ftp_server as $destination_file";
    //     return 'done';
    // }

//     ftp_close($conn_id);
 }


?>