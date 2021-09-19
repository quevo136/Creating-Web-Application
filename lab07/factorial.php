<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Creating Web Applications"/>
	<meta name="keywords" content = "HTML, CSS, JavaScript, PHP" />
	<meta name="author" content="quevo" />
	<title> PHP LAB 07 </title>
</head>
<body>

    <?php
        include ("mathfunctions.php");   

    ?> 

    <h1>Creating Web Application - lab 7</h1> 

	<?php

	    $num = 5;
	    if(isset($_GET["number"])){
	    	$num = $_GET["number"];
	    	if(isPositiveInteger($num)){
	    		echo "<php>", $sum, "! is", factorial ($num), ".</p>";
	    	
	        }
	        else {
	            echo "<p> PLease enter a positive integer .</p>";

	    }
	    echo "<p><a href = 'factorial.html'>Return to Entry Page</a></p>";


	?>

</body>
</html>