<?php 
    
class Connection{
    
    var $conn;
    var $result;
    
    function Connection(){
        
        $servername = "173.194.245.69";
        $user       = "joshuajweldon";
        $dbname     = "catfeeder_db";
        $pass       = "SolozenZud!1";
        
        if (!$this->conn = new mysqli($servername, $user, $pass, $dbname)){
            echo "MySQL Connection failed";
            die;
        }
     
    }  
    
    function query($sql){
        
        if(!$this->result = $this->conn->query($sql)){
            return false;
        }
        
        return true;
    }
    
    function nextRow(){
        
        return  $this->result->fetch_assoc();
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    
    function escape_string($data){
        return $this->conn->real_escape_string($data);
    }
    
    
    function finish(){
        
        $this->conn->close();
    } 
     
}

?>