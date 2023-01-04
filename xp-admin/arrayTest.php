<?php
header("Content-type:application/json");
header("Acess-Control-Allow-Ogrigin: https://Global Pharma.com");
include('include/db.php');
    $blogs = array();
    $item = array();

    $selectBlog = $conn->prepare("SELECT title, slug FROM post");
    $selectBlog->execute();
 //   while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
    while($row=$selectBlog->fetch(PDO::FETCH_ASSOC)) {
        $item['name'] = $row['title'];
        $item['slug'] = $row['slug'];
        array_push($item);
    }


    echo "<pre>";
    print_r($item);
    echo "</pre>";

    // $jsonData = json_encode($blogs, JSON_PRETTY_PRINT);
    // echo $jsonData;
    // $myfile = fopen("data.json", "w") or die("Unable to open file!");
    // fwrite($myfile, $jsonData);
    // fclose($myfile);
?>