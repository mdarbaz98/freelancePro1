<?php include('admin/include/config.php');
date_default_timezone_set('Asia/Kolkata');
session_start();

if($_POST['btn']=='contact_details'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $business_email = $_POST['business_email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];
    $stmt = $conn->prepare("INSERT INTO contact_details(fname, lname, mobile, email, message) VALUES(?,?,?,?,?)");
    if($stmt->execute([$fname, $lname, $mobile, $business_email, $message])){
      echo "done";
    }
  }
  ?>