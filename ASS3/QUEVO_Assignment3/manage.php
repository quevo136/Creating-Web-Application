<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author"  content="Que Hong Vo" />
	<link href ="style.css" rel= "stylesheet"/>
</head>
<body >

<header>
	<?php include 'menu.inc'; ?>
</header>
<?php 

?>

<div class="outer">	
	<p><span class="Title tag">View All Order </span><br>
		<button onclick="location.href='number1.php'">GO</button>
	</p>
	<form action="number2.php" method="POST">
	<p><span class="Title tag">View Order by Name: </span><br/>
		<input type="text" name="Find" id="Find" required="required"/>
		<input type="submit" name="num2" value="Search"/>
	</p>
	</form>
	<form action="number3.php" method="POST">
	<p><span class="Title tag"> View Order by Suburb</span><br/>
	    <input type="text" name="Find" id="Find" required="required"/>
		<input type="submit" name="num3" value="Search"/>
	</p>
	</form>
	<p><span class="Title tag"> Pending Order </span><br/>
		<button onclick="location.href='number4.php'">GO</button>
	</p>
	<form action="number5.php" method="POST">
	<p><span class="Title tag">Order sorted by Total Cost </span><br/>
		<input type="text" name="Find" id="Find" required="required"/>
		<input type="submit"  name="num5"  value="Go" />
	</p>
	</form>
	
</div>

<div class="outer">
	<form action = "number6.php" method="POST">
	<p><span class="Title tag">Change the Status for the order </span><br/>
		<input type="text" name="Firstname" id="Firstname" placeholder="First name"/>
	    <input type="text" name="Phonenumber" id="Phonenumber" placeholder="Phone Number" />
		<input type="text" name="OrderStatus" id="OrderStatus" placeholder="Order Status" />
		<input type="submit" name="num6" value="Change"/>
	</p>
	</form>
</div>

<footer>
	<?php include 'footer.inc'; ?>
</footer>
</body>
</html>