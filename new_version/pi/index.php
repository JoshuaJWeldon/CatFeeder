<?php
	$output = shell_exec('./test.bash');
?>

<html>
	<body>
		<h1> Feed!!!</h1>
		<p> <?php echo $output; ?>
	</body>
</html>