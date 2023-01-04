<?php
include('include/db.php');
$id = $_GET['id'];
$link = $_GET['link'];

$deletePost = $conn->prepare('UPDATE post SET status=? WHERE id=?');
$deletePost->execute(['Trash', $id]);
header('location:' . $link);
