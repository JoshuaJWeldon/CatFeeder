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
  $sql      = "Select * From feedings Where username='$username' ORDER BY date DESC";
  $conn->query($sql);
  
  while($row = $conn->nextRow()){
      $emparray[] = $row;
  }
  echo json_encode($emparray);
  $conn->finish();

?>
  
 