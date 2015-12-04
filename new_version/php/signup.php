<?php
  include 'Connection.php';
  $conn     = new Connection();
  $sql      = "";
  $username = "";
  $password = "";
  $catname  = "";
  $ip_addr  = "";
  
  if(!empty($_POST)){
      if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['catname']) && !empty($_POST['ip_addr'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $catname  = $_POST['catname'];
          $ip_addr  = $_POST['ip_addr'];
          $sql = "Insert Into users (username, password, cat_name, ip_addr) Values ('$username', '$password', '$catname', '$ip_addr')";
          if($conn->query($sql)){
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['catname']  = $catname; 
              $_SESSION['ip_addr']  = $ip_addr;
              $conn->finish();
              header("Location: ../main.html");
              die();
          }
      }
  }
  $conn->finish();
  header("Location: ../signup.html?error");
  die();
  
?>