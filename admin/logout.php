<?php
    include('include/config.php');
    date_default_timezone_set('Asia/Kolkata');
    session_start(); //to ensure you are using same session
    session_destroy(); //destroy the session
    header("location:/augs/admin/index.php"); //to redirect back to "index.php" after logging out
    exit();
?>