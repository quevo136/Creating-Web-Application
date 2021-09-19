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
<?php include 'menu.inc'; ?>

<header class="bgimg2">

<?php
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($username =="admin" && $password =='123456'){
		session_start();
		
		$_SESSION['username'] = $username;
		
		header("location: enhancements3.php");
	}else{ 
		echo 'wrong USER OR PASSWORD';
	}
}
		
?>	

<div class="outer">
	<form method= "post">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password">
		
		<input type="submit" value="LOGIN">
	</form>
</div>	



</header>
<footer>
		<?php include 'footer.inc'; ?>
</footer>
</body>
</html>