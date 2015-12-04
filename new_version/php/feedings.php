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
  $sql      = "Select * From feedings Where username='$username'";
  $conn->query($sql);
  
  while($row = $conn->nextRow()){
      $emparray[] = $row;
  }
  echo json_encode($emparray);
  $conn->finish();

?>
  
 