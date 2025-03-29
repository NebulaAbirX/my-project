<?php
// filepath: d:\xampp\htdocs\pwa\session-bridge.php

// This file connects your main app session with ChatApp
session_start();

// Function to check if user is logged in to main app
function is_logged_in_to_main_app() {
    return isset($_SESSION['id']) && isset($_SESSION['role']);
}

// Function to create ChatApp session from main app session
function create_chatapp_session() {
    if (is_logged_in_to_main_app()) {
        // Set ChatApp session variables based on your main app's session
        $_SESSION['unique_id'] = $_SESSION['id'];
        $_SESSION['fname'] = $_SESSION['Username'] ?? '';
        $_SESSION['lname'] = '';
        $_SESSION['status'] = 'Active now';
        return true;
    }
    return false;
}
?>