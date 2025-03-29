<?php
include("php/config.php");

if(!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h2>Database connection successful!</h2>";

echo "<h3>Available Tables:</h3>";
$tables = mysqli_query($con, "SHOW TABLES");

echo "<ul>";
while($table = mysqli_fetch_array($tables)) {
    echo "<li>" . $table[0] . " - Structure: ";
    
    $columns = mysqli_query($con, "SHOW COLUMNS FROM " . $table[0]);
    while($column = mysqli_fetch_array($columns)) {
        echo $column[0] . ", ";
    }
    
    echo "</li>";
}
echo "</ul>";

echo "<p>Visit this file at: http://localhost/pwa/login/db_check.php</p>";
?>