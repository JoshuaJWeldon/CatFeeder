<?
  include 'Connection.php';
  $conn      = new Connection();
  $sql       = "";
  $username  = "";
  $ip_addr   = "";
  $jsonArray = array();
  
  session_start();
  
  if(empty($_SESSION['username']) || empty($_SESSION['ip_addr'])){
        $conn->finish();
        echo "error";
        die();
  }
  
  $ip_addr = $_SESSION['ip_addr'];
  
  $curl = curl_init();
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://' . $ip_addr . ":8080",
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
  ));
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
  // Close request to clear up some resources
  curl_close($curl);
  
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