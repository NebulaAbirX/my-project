<?php
// filepath: d:\xampp\htdocs\pwa\ChatApp - CodingNepal\users.php
session_start();
include_once "php/config.php";
require_once "../session-bridge.php";

// Ensure user is logged in
if(!isset($_SESSION['unique_id'])) {
    if (is_logged_in_to_main_app()) {
        create_chatapp_session();
    } else {
        header("location: ../login/index.php");
        exit();
    }
}
include_once "header.php";
?>
<!-- Rest of the users.php file remains unchanged -->

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            // Get current user data from your main users table
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE Id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="../../assets/img/default-avatar.png" alt="">
          <div class="details">
            <span><?php echo $row['Username']; ?></span>
            <p>Active now</p>
          </div>
        </div>
        <a href="../../login/php/logout.php" class="logout">Logout</a>
      </header>

      <div class="search">
        <span class="text">Select a user to chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>

      <div class="users-list">
        <!-- User list will be displayed here through AJAX -->
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
</body>
</html>