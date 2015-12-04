<?php

// Sanitize incoming username and password
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

// Connect to the MySQL server
$db = new mysqli("173.194.245.69", "joshuajweldon", "SolozenZud!1", "catfeeder_db");

// Determine whether an account exists matching this username and password
$stmt = $db->prepare("SELECT username FROM users WHERE username = ? and password = md5(?)");

// Bind the input parameters to the prepared statement
$stmt->bind_param('ss', $username, $password);

// Execute the query
$stmt->execute();

// Store the result so we can determine how many rows have been returned
$stmt->store_result();

if ($stmt->num_rows == 1) {

    session_start();

    $_SESSION['username'] = $username;

    // Redirect the user to the home page
    header('Location: ../index.php');
}
