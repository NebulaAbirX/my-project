<?php
// filepath: d:\xampp\htdocs\pwa\ChatApp - CodingNepal\php\config.php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "tutorial"; // Should be your main app's database
  
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>