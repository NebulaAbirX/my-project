<?php
// filepath: d:\xampp\htdocs\pwa\ChatApp - CodingNepal\index.php
session_start();
require_once "../session-bridge.php";

if (is_logged_in_to_main_app()) {
    create_chatapp_session();
    header("location: users.php");
    exit();
} else {
    header("location: ../login/index.php");
    exit();
}
?>