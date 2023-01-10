<?php
$servername = "localhost";
$username = "u855355043_houseof_xp";
$password = "|I2xyfaPic|";

try {
  $conn = new PDO("mysql:host=$servername;dbname=u855355043_houseof_xp", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>