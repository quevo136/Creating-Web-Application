<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Que Vo" />
	<title>SSH</title>
	<link href ="style.css" rel= "stylesheet"/>
</head>
<body class="bground">
<header>
	<?php include 'menu.inc'; ?>
</header>
<?php 
/*
	session_start();
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
		header("Location: phpenhancements.php");
	}
	*/
?>

<div class="outer">	
	<p><span class="Title tag">View All Data </span><br>
		<button onclick="location.href='number1.php'">GO</button>
	</p>
	<form action="number2.php" method="POST">
	<p><span class="Title tag">View Data for a Particular Student </span><br/>
		<input type="text" name="Find" id="Find" required="required"/>
		<input type="submit" name="num2" value="Search"/>
	</p>
	</form>
	<p><span class="Title tag"> Perfect Score at the First Attempt </span><br/>
		<button onclick="location.href='number3.php'">GO</button>
	</p>
	
	<p><span class="Title tag">Less than 50% in their Third Attempt </span><br/>
		<button onclick="location.href='number4.php'">GO</button>
	</p>
	<form action="number5.php" method="POST">
	<p><span class="Title tag">Delete Attempts for a Particular Student </span><br/>
		<input type="text" name="Delete" id="Delete" />
		<input type="submit"  name="num5"  value="Go" />
	</p>
	</form>
</div>

<div class="outer">
	<form action = "number6.php" method="POST">
	<p><span class="Title tag">Change the Score for a quiz attempt </span><br/>
		<input type="text" name="STUDENTID" id="STUDENTID" placeholder="STUDENTID"/>
		<input type="text" name="GRADE" id="GRADE" placeholder="GRADE" />
		<input type="text" name="ATTEMPT" id="ATTEMPT" placeholder="ATTEMPT" />
		<input type="submit" name="num6" value="Change"/>
	</p>
	</form>
</div>

<footer>
	<?php include 'footer.inc'; ?>
</footer>
</body>
</html>