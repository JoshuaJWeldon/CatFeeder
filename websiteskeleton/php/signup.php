<?php

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$cat_name = filter_var($_POST['catname'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$confirm = filter_var($_POST['confirm'], FILTER_SANITIZE_STRING);
if($password == $confirm){
    // Connect to the MySQL server
    $db = new mysqli("173.194.245.69", "joshuajweldon", "SolozenZud!1", "catfeeder_db");

    $check = $db->prepare("SELECT username FROM users WHERE username = ?");
    $check->bind_param('s', $username);
    // Execute the query
    $check->execute();

    // Store the result so we can determine how many rows have been returned
    $check->store_result();

    if($check->num_rows == 0){
        $stmt = $db->prepare("INSERT INTO users (username, cat_name, password) VALUES (?, ?, md5(?))");
        $stmt->bind_param('sss', $username, $cat_name, $password);
        $stmt->execute();
        $stmt->store_result();

        session_start();

        $_SESSION['username'] = $username;

        // Redirect the user to the home page
        header('Location: ../index.php');
    } else{
        echo "test1";
    }

} else{
    echo "test2";
    echo $password;
    echo $confirm;

}
