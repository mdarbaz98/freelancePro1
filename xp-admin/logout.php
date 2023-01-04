<?php
session_start();
session_destroy();
echo "<script>
    window.location = 'index.php';
</script>";

//echo "<script>window.location.href('index.php')</script>";
//echo 'You have been logged out. <a href="/">Go back</a>';
?>