<?php
  include 'Connection.php';
  $conn     = new Connection();
  $sql      = "";
  $username = "";
  $password = "";
  
  session_start();
  
  if(!empty($_POST)){
      if(!empty($_POST['username']) && !empty($_POST['password'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $sql = "Select * From users Where username='$username' And password='$password'";
          $conn->query($sql);
          if($row = $conn->nextRow()){
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['catname']  = $row['cat_name'];
              $_SESSION['ip_addr']  = $row['ip_addr']; 
              $conn->finish();
              header("Location: ../main.html");
              die();
          }
      }
  }
  $conn->finish();
  header("Location: ../login.html?error");
  die();
  
?>