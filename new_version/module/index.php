<?php

$valid       = false;
$ipstream    = "";
$refreshrate = 0;
$upperrange  = 0;
$lowerrange  = 0;
$num         = 0;

$error = "";

if($_GET){
	
	if(!$_GET['ipstream'] || !$_GET['refreshrate'] || !$_GET['upperrange'] || !$_GET['lowerrange']){
		$error = "You must fill out every field.";
	}
	else{
		$ipstream    = $_GET['ipstream'] ;
		$refreshrate = (int)$_GET['refreshrate'];
		$upperrange  = (int)$_GET['upperrange'];
		$lowerrange  = (int)$_GET['lowerrange'];
		
		if(!filter_var($ipstream, FILTER_VALIDATE_IP)){
			$error = "IP Stream is not a valid ip";
		}
		elseif($refreshrate < 1){
			$error = "Refresh Rate must be a positive integer";
		}
		elseif($upperrange <= $lowerrange){
			$error = "Upper Range must be larger than Lower Range";
		}
		else{
			$valid = true;
			
			$cat_imgs = ['HeartEyesCat.png','KissingCat.png', 'HappyTearsCat.png', 'GrinningCat.png', 
			             'SmilingCat.png', 'SmirkingCat.png', 'WearyCat.png', 'PoutingCat.png', 'CryingCat.png'];
      $cat_path = '../websiteskeleton/CatEmoji/';
			
			$catrange    = 9;
			$streamrange = $upperrange - $lowerrange;
			$delta       = $streamrange / $catrange;
	
			// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $ipstream,
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
			$num = ((int)$resp) - $lowerrange;
		
      $num = (int)($num / $delta);
      
      if($num == 9){
	      $num = 8;
      }
			
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="<?php echo $refreshrate; ?>; url=http://joshuajweldon.com/CatFeeder/Module/index.php?ipstream=<?php echo $ipstream; ?>&refreshrate=<?php echo $refreshrate; ?>&upperrange=<?php echo $upperrange; ?>&lowerrange=<?php echo $lowerrange?>">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1.0)">
    <meta http-equiv="Page-Exit" content="blendTrans(Duration=1.0)">
    <title>Cat Feeder Module</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			
</head>
<body>
    <div class="container">
	    <div class="col-sm-4 col-sm-offset-4 text-center">
        <img width=100% src="<?php echo $cat_path . $cat_imgs[$num]; ?>"
        <br><br>
	    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php		
		}
	}
}	
if(!$valid){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cat Feeder Module</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>
    <div class="container">
	    <br><br>
	    <div class="col-sm-4 col-sm-offset-4">
        <form class="form" method="get" action="index.php">
            <h1>Cat Module</h1>
            <p> * <?php echo $error; ?> </p>
            <label for="ipstream">IP Stream</label>
            <input type="text" id="ipstream" name="ipstream" class="form-control" placeholder="168.12.42.21">
            <br>
            <label for="refreshrate">Refresh Rate <small> seconds </small></label>
            <input type="text" id="refreshrate" name="refreshrate" class="form-control" placeholder="5">
            <br>
            <label for="upperrange">Upper Range <small> positive integer </small></label>
            <input type="text" id="upperrange" name="upperrange" class="form-control" placeholder="100">
            <br>
            <label for="lowerrange">Lower Range <small> positive integer </small></label>
            <input type="text" id="lowerrange" name="lowerrange" class="form-control" placeholder="-100">
            <br>
            <input  class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">

        </form>
        <br><br>
	    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
		
		
<?php
	}
?>