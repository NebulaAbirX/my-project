<?php
// filepath: d:\xampp\htdocs\pwa\ChatApp - CodingNepal\ChatApp - CodingNepal\login.php

session_start();
require_once "../../session-bridge.php";

// Check if user is already logged in to main app
if (is_logged_in_to_main_app()) {
    // Create ChatApp session from main app session
    create_chatapp_session();
    header("location: users.php");
    exit();
}

// If not logged in, redirect to main login
header("location: ../../login/index.php");
exit();
?>