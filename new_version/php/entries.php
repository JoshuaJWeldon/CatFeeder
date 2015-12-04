<?php
    
  include 'Connection.php';
  $conn      = new Connection();
  $sql       = "";
  $username  = "";
  $jsonArray = array();
  
  session_start();
  
  if(empty($_SESSION['username'])){
        $conn->finish();
        echo "error";
        die();
  }
  
  $username = $_SESSION['username'];
  $sql      = "Select * From entries Where username='$username'";
  $conn->query($sql);
  
  while($row = $conn->nextRow()){
      $jsonArray[] = $row;
  }
  echo json_encode($jsonArray);
  $conn->finish();

?>
  
 