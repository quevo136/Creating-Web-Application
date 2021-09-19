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
/**
</head>
<body>
	<h1>Creating Web Applications - Lab10</h1>*

	<?php
		$make = trim($_POST["carmake"]);
		$model = trim($_POST["carmodel"]);
		$price = trim($_POST["price"]);
		$yom = trim($_POST["yom"]);
	?>

	$query = "insert into $sql_table (make, model, price, yom) values ('$make','$model','$price','$yom')";
	        $result = mysqli_query($conn, $query);



	
	<?php
	require_one ("settings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if (!$conn) {
		echo "<p>Database connection failure</p>";
	}else {
		$sql_table = "cars" ; 
		$query = "select make ,model, price FROM cars ORDER BY make,model";

		$result = mysqli_query($conn, $query);

		if (!$result) {
			echo "<p class = \"wrong\">Something is wrong with ", $query, "</p>";
		}else {
		    echo "<p class = \"ok\">Successfully added New Car record</p>";
			echo "<table border=\"1\">n";
			echo "<tr>\n "

			    ."<th scope = \"col\">Make</th>\n"
			    ."<th scope = \"col\">Model</th>\n";
			    ."<th scope = \"col\">Price</th>\n";

			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>\n";
				echo "<td>",$row["make"], "</td>\n";
				echo "<td>",$row["model"], "</td>\n";
				echo "<td>",$row["price"], "</td>\n";
				echo "</tr>\n ";
				
			}
			echo "</table>\n"; 
			mysqli_free_result($result);   

		}
		mysqli_close($conn);

	}

?>	

</body>
</html>	    




	
</body>
</html>