<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<title>SSH</title>
	<link href="style/style.css" rel= "stylesheet"/>
	<!-- <script src="script/results.js"></script>-->
	
</head>
<body>

<header class="bgimg2">

<?php include 'menu.inc'; ?>

<h1> Results from quiz </h1>

<?php

require_once ("settings.php");
$conn = @mysqli_connect ($host,$user,$pwd) or die ("Failed to connect to server");
@mysqli_select_db($conn, $sql_db) or die ("Database not available");
date_default_timezone_set('Australia/Melbourne');

function IsChecked($checkname, $value) {
	if (!empty($_POST[$checkname])) {
		foreach($_POST[$checkname] as $checkvalue) {
			if ($checkvalue == $value) {
				return true; 
			}
		}
	}
	return false;
}

function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


	
//case if the table doesn't exists
	$query = "SELECT * FROM attempts";
	$result = mysqli_query($conn, $query);
	
	if(empty($result)){
		$query = "CREATE TABLE attempts (
			AttemptID int(11) AUTO_INCREMENT,
			Firstname varchar(40),
			Lastname varchar(40) ,
			StudentID int (10),
			Attempt int (5),
			Score int (5),
			PRIMARY KEY  (AttemptID)
			)";
			$result = mysqli_query($conn, $query);
	}

//checking
  if (isset ($_POST["FN"])) {
		$studid = $_POST["FN"];
	}
	else {
		header ("location: quiz.php");
	}

	if (isset ($_POST["LN"])) {
		$fname = $_POST["LN"];
	}
	else {
		header ("location: quiz.php");
	}
	
	if (isset ($_POST["SN"])) {
		$lname = $_POST["SN"];
	}
	else {
		header ("location: quiz.php");
  }





// Variables

  $errMsg = "";
  $submit = true;
  $firstName= trim($_POST["FN"]);
  $lastName = trim($_POST["LN"]);
  $studentid = trim($_POST["SN"]);
  $attempt = 1;
  $score = 0;
  $sql_table = 'attempts';

// Sanitising
$firstName= sanitise_input($firstName);
$lastName = sanitise_input($lastName);
$studentid = sanitise_input($studentid);




// Validating
  
  $idlength = strlen((string)$studentid);

  if (!preg_match("/^[A-Za-z]+$/", $firstName)) {
		$errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
    $error = 1;	
  }

  if (!preg_match("/^[A-Za-z]+$/", $lastName)) {
		$errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
    $error = 1;	
  }


	$studentid = $_POST['SN'];
	if(strlen($studentid) !=7 || strlen($studentid) !=10){
		$lnerr =  "Student ID Wrong";
		$error = 1;
	}

//scoring
//Question 1
$Question1 = "Secure Shell";
if (isset ($_POST["STAND"])) {
	$quest = $_POST["STAND"];
	$answer = strcasecmp($Question1, $quest);
		if ($answer == 0) {
			$score += 20;
		};
	}

//Question 2
if ($_POST['SSH'] == '5') {
    $score += 10;
  } 
  
//Question 3
if ($_POST['Question3'] == 'Public') {
	$score += 20;
}

//Question 4
if(IsChecked("Question4","Publickey")) {
    $score += 10;
  }

if(IsChecked("Question4","Host")) {
    $score += 10;
  }

if(IsChecked("Question4","Password")) {
    $score += 10;
  }

//Question 5
 if ($_POST['Number'] == '22') {
    $score += 20;
  }

//Attempts Query
$query= "SELECT * FROM attempts WHERE StudentID = '$studentid' ORDER BY AttemptID DESC";
$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO attempts (Firstname, Lastname, StudentID, Attempt, Score) Values ('$firstName', '$lastName', '$studentid', '1', '$score')";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	$attempt = $data['Attempt'];
	
	if ($attempt < 3){
	$attempt++;
	$query = "INSERT INTO attempts (Firstname, Lastname, StudentID, Attempt, Score) Values ('$firstName', '$lastName', '$studentid', '$attempt', '$score')";
	mysqli_query($conn, $query);
	
	}	else {
	$attempterr = "Your Atttempt exceded";
	$query= "SELECT * FROM attempts WHERE StudentID = '$studentid'";
	mysqli_query($conn, $query);
	}
	
	}
	



?>
<!-- Retrieve Personal Data -->
<fieldset class='outer'>
<h2 class='Introduction'> Personal Data </h2>
<p> First Name :<span id='firstN'>
<?php
$query = "SELECT * FROM attempts WHERE Firstname='$firstName' AND Lastname='$lastName' AND StudentID='$studentid' AND Attempt='$attempt' AND Score='$score'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
echo $row["Firstname"];
?>
</span></p>
<p> Last Name :<span id="lastN">
<?php
echo $row["Lastname"];
?>
</span></p>
<p> Student Number :<span id="studNumber">
<?php
echo $row["StudentID"];
?>
</span></p>
</fieldset>



<fieldset class="outer">
<h2 class="Introduction"> Result</h2><p>Score:<span id="grades">
<?php 
echo $row["Score"];
?>
</span></p>
<p>Attempts:<span id="attempt">
<?php
echo $row["Attempt"];
?></span></p>
<?php
if ($row["Attempt"] =! 3) {
	echo "<a href='quiz.php' class='readmorebutton fontsize readmorecolor' id='retry'>Wanna Try Again?</a>";
}
?>
</fieldset>

</header>

<footer>
		<?php include 'footer.inc'; ?>
</footer>
	

</body>