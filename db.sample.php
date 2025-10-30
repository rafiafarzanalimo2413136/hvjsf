<?php
// db.sample.php – sample database connection (edit locally)
$mysqli = new mysqli("localhost", "your_username_here", "your_password_here", "your_database_name_here");
if ($mysqli->connect_errno) {
    echo "Connection failed (" . $mysqli->connect_errno . "): " . $mysqli->connect_error;
    exit();
}
?>
