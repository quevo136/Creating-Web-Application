<?php

session_start();
if (!isset($_SESSION["number"])){
	$_SESSION["number"] = 0;

}
$sum = $_SESSION["number"];

?>

<<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP Sessions Lab</title>
<meta charset="utf-8" />
<meta name="description" content="Playing wih PHP Sessions" />

</head>



<body>
	<h1>Creating Web Applications _ PHP Sessions Lab</h1>
	<?php
		echo "<p>The number is ", $num, "</p>";
	?>
		<p><a href = "numberup.php">UP </a></p>
		<p><a href = "numberdown.php">DOWN </a></p>
		<p><a href = "numberreset.php">RESET </a></p>
	
</body>
</html>