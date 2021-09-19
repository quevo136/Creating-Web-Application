<!DOCTYPE html>
<html>
<head>
	<title>Booking Confirmaion</title>
</head>
<body>
	<h1>Rohirrim Tour Booking Confirmation</h1>

<?php

	if (isset ($_POST["firstname"])){
		$firstname = $_POST["firstname"];
		echo "<p>This is a test: Your first name is $firstname</p>";

	}
	else {
		echo "<p> Error :Enter data in the <a href = \"register.html\">form </a></p>";
	}

?>

</body>
</html>