<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Guessing Game</h1>
	<p><label>Enter a number between 1 and 100, then press the Guess button</label> </p>
	<br/>
	
		<textarea id="GUESS" name="GUESS" rows="10" cols="60" required></textarea>
	<?php	
		$randNum = rand(1, 100)

		if(("GUESS" == $randNum))
			$errMsg .= "Congratulations! You guessed the hidden number"

		<input class="GUESS" type= "GUESS" name="GUESS" value="GUESS"/>
    ?>
		<a href="giveup.php" class="navi">Give Up</a>
		<a href="startover" class="navi">Start Over</a>
	

</body>
</html>

