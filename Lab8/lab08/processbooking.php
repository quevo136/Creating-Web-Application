<!DOCTYPE html>
<html>
<head>
	<title>Booking Confirmaion</title>
</head>
<body>
	<h1>Rohirrim Tour Booking Confirmation</h1>

	<?php
	   function sanitise_input($data){
	   	$data = trim($data);
	   	$data = stripcslashes($data);
	   	$data = htmlspecialchars($data);
	   	return $data;
	}
	?>

	<?php
	
	if (isset ($_POST["firstname"])){
		$firstname = $_POST["firstname"];
		
		echo "<p>Your first name is: $firstname </p>";
	}
	else {
		echo "<p> Error :Enter data in the <a href = \"register.html\">form </a></p>";
	}


	if (isset ($_POST["lastname"])){
		$lastname = $_POST["lastname"];
		
		echo "<p>Your last name is: $lastname </p>";
	}
	else {
		echo "<p> Error :Enter data in the <a href = \"register.html\">form </a></p>";
	}

	if (isset($_POST["species"]))
		$species =sanitise_input($_POST["species"]);

	else
		$species =" Unknown spieces";
		

	if (isset($_POST["food"]))
		$food =sanitise_input($_POST["food"]);
	
	if (isset($_POST["age"]))
		$age =sanitise_input($_POST["age"]);

	if (isset($_POST["partySize"]))
		$partySize =sanitise_input($_POST["partySize"]);
	

	$tour = "";
	if (isset($_POST["1day"])) $tour = $tour. "One-day tour ";
	if(isset($_POST["4day"])) $tour = $tour . "Four-day tour";
	if(isset($_POST["10day"])) $tour = $tour . "Ten-day tour";	
	echo "<p>You are now booked on $tour</p>";

	

	$errMsg= "";
	if($firstname == ""){
	    $errMsg = $errMsg . "<p> You must enter your first name </p>";
	}
	elseif (!preg_match("/^[a-zA-Z]+$/", $firstname)){
	    	$errMsg = $errMsg . "<p>only alpha letters </p>";
	} 

	if($lastname == ""){
	    $errMsg = $errMsg . "<p> You must enter your last name </p>";
	}
	elseif (!preg_match("/^[a-zA-Z]+$/", $lastname)){
	    	$errMsg = $errMsg . "<p>only alpha letters </p>";
	} 

	if(!is_numeric($age)){
	    $errMsg = $errMsg . "<p> You must enter your numeric age </p>";
	}
	elseif ($age<10 or $age>200){
	    	$errMsg = $errMsg . "<p>Your age should between 10 and 200</p>";
	}  

	if(!is_numeric($partySize)){
	    $errMsg = $errMsg . "<p> You must enter your numeric party size </p>";
	}
	elseif ($partySize<1 or $partySize>20){
	    	$errMsg = $errMsg . "<p>Your party size should between 1 and 20</p>";
	}    

	if($errMsg!="")
	echo $errMsg;
	else {
		echo "<p>Welcome $firstname $lastname!<br/>";
		echo "You are now booked on $tour!<br/>";
		echo "Species:$species!<br/>";
		echo "Age: $age!<br/>";
		echo "Meal Preference:$food <br/>";
		echo "Number of travellers:$partySize!<br/></p>";
	}

	if($_POST["firstname"] == "")
	header ("Location:register.html");    


?>
</body>
</html>