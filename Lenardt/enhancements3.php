<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<title>TOPIC SSH</title>
	<link href ="style/style.css" rel= "stylesheet"/>
	
</head>
<body>
<!--<?php include 'menu.inc'; ?>-->

<?php
session_start();
if(!isset($session['username'])){
echo 'You are not logged in to see the content';
}else{	
	
if(isset($_POST['logout'])){
	
	session_destroy();
	
	header("location: phpenhancements.php");
}

echo "Welcome ".$_SESSION['username']."</br>";

echo 'Welcome to my PHP PAGE. This Assignment is very hard';

}

?>

<form method="post">

<input type="submit" name="logout" value="Logout">
</form>


<footer>
		<?php include 'footer.inc'; ?>
</footer>
</body>
</html>