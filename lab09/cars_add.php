<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Car Form</title>

<meta charset="utf-8" />
<meta name="description" content="Lab 10"  />
<meta name="keywords" content="PHP, File, input, output" />
<link rel="stylesheet" href="addcar.css" type="text/css" />
<!-- Description: Form Input for Car -->
<!-- Author: <your name> -->
<!-- Date: <last date updated> -->
<!-- Validated: OK <date checked> || <what still needs to be fixed> -->

</head>
<body>
	<h1>Creating Web Applications - Lab10</h1>

<?php
    require_once("setting.php");

	$make = trim($_POST["make"]);
	$model = trim($_POST["model"]);
	$price = trim($_POST["price"]);
	$yom = trim($_POST["yom"]);
	
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $sql_table="cars";
        $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
            $result = mysqli_query($conn, $query);
	

	#$result = mysqli_query($conn, $query);

	
	if(!result){
	echo "<p class = \"wrong\">Something is wrong with ", $query, "<p>";

    } else{
        	
        echo "<p class = \"ok\">Successfully add New Car reocrd</p>";
    }

    mysqli_close($conn);
    }   

	     
?>


</body>
</html>	    


