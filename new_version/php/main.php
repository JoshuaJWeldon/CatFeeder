<?php
include 'Connection.php';
$conn     = new Connection();
$sql      = "";
$username = "";
$cat_radio = 0;
$date = null;
$journal = "";
$sql2 = "";
$sql3 = "";
$row = null;
$row2 = null;
$entry_moods = array();

$sql2 = "SELECT MAX(date) FROM entries";
session_start();
if($conn->query($sql2)){
    $row = $conn->nextRow();
    $_SESSION['mood'] = $row['mood'];
}

$username = $_SESSION['username'];
$sql3 = "SELECT date FROM entries WHERE username = $username ORDER BY date";
if($conn->query($sql3)){
    $row2 = $conn->nextRow();
    $row_mood = 0;
    $row_date = null;
    while($row2){
        $row_mood = $row2['mood'];
        $row_date = $row2['date'];
        $entry_moods.push(array($row_mood, $row_date));
        $_SESSION['entry_moods'] = $entry_moods;
    }


}

if(!empty($_POST)){
    if(!empty($_POST['journalText'])){
        $cat_radio = $_POST['cat_radio'];
        $journal = $_POST['journalText'];
        $sql = "Insert Into entries (username, entry, mood) Values ('$username', '$journal', '$cat_radio')";
        if($conn->query($sql)){
            $conn->finish();
            header("Location: ../main.html");
            die();
        }
    }
}
$conn->finish();
header("Location: ../main.html?error");
die();

?>