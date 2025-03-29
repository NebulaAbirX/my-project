<?php
// filepath: d:\xampp\htdocs\pwa\ChatApp - CodingNepal\php\data.php
require_once "../../session-bridge.php";
session_start();

if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE Id != {$outgoing_id}";
    $query = mysqli_query($conn, $sql);
    // Rest of your data loading code remains
}
?>