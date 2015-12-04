<?
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
  $sql      = "Insert Into feedings (username) Values ('$username')";
  
  if(!$conn->query($sql)){
    echo('error');
    die();
  }
  $conn->finish();
  header("Location: ../main.html?feed");
  die();

?>