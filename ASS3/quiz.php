<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="SSH" />
  <meta name="keywords" content="HTML, CSS, JavaScript" />
  <meta name="author" content="Lenardt Fubex"  />
  <title> SSH </title>
  <link href ="style/style.css" rel= "stylesheet"/>
  <script src ="script/quiz.js"></script>
  <script src ="script/timer.js"></script>
  
</head>

<body>
<header class="bgimg1">

<?php include 'menu.inc'; ?>

<br/><br/>

<form id="regform" method="post" action="markquiz.php" onsubmit ="return validate()">


<br/>
<fieldset class="body" >
<div> Quiz closes <span id="time"> 05:00</span> minutes !</div>
</fieldset>


<h2 class="Title1"><span class="tag1">
Student Information<br/><br/>

		<label for="FN">First Name</label> 
		<input type="text" name= "FN" id="FN" required="required" maxlength="25">
<br/>
		<label for="LN">Last Name</label> 
		<input type="text" name= "LN" id="LN" required="required" maxlength="25">
<br/>
		<label for="SN">Student Number</label> 
		<input type="text" name= "SN" id="SN" required="required" pattern="^(\d{7}|\d{10})*$">
</span></h2>

<fieldset class="outer">
<audio style="margin-top: 30px" src="musicplayer.mp3" controls></audio>
</fieldset>

<div >
<fieldset class="outer">
		<p class="outersub"><span class="tag2">SSH SHORT QUIZ</span></p>

<fieldset class="Title2 tag2">
		<p >Question 1</p>
<p>		<label for="STAND">What does SSH stands for? </label><br/>
			<textarea id="STAND" name="STAND" rows="10" cols="60" required></textarea>
</p>
</fieldset>

<fieldset class="Title2 tag2">
<p>Question 2</p>
<p> 	<label for="SSH"> Secure shell (SSH) network protocol is used for___</label> <br/>
			<select name="SSH" id="SSH">
				<option value="1">Please Select One</option>
				<option value="2">Secure Data Communication</option>			
				<option value="3">Remote Command-line Login</option>
				<option value="4">Remote Command Execution</option>
				<option value="5">All of the above</option>
			</select>
</p>
</fieldset>

<fieldset class="Title2 tag2">
<p>Question 3</p>
<p>SSH uses _____ to authenticate the remote computer.</p>
<p>		
		<input type="radio" id="Public" name="Question3" value="Public" required />
		<label for="Public">Public-Key Cryptography</label> 
</p>
<p>
		<input type="radio" id="Private" name="Question3" value="Private"/>
		<label for="Private">Private-Key Cryptography</label> 
</p>
<p>
		<input type="radio" id="Any" name="Question3" value="Any"/>
		<label for="Any">Any Public-Key or Private-Key</label> 	
</p>
<p>		
		<input type="radio" id="Both" name="Question3" value="Both"/>	<label for="Both">Both Public-Key or Private-Key</label> 
				
</p>
</fieldset>

<fieldset class="Title2 tag2">
<p>Question 4</p>
<p>Which of the following authentication method is used by SSH?</p>
<p>		
		<input type="checkbox" id="PublicKey" name="Question4[]" value="Publickey" />
		<label for="Public">Public-Key</label> 
</p>
<p>
		<input type="checkbox" id="Host" name="Question4[]" value="Host"/>
		<label for="Private">Host Based</label> 
</p>
<p>
		<input type="checkbox" id="Password" name="Question4[]" value="Password"/>
		<label for="Any">Password</label> 	
</p>
<p>		
		<input type="checkbox" id="Fingerprint" name="Question4[]" value="Fingerprint"/>
		<label for="Both">Fingerprint</label> 
</p>
</fieldset>

<fieldset class="Title2 tag2">
<p>Question 5</p>
<p>Which is the port number for SSH 
		<label for="Number">Number (between 20 to 25):</label>
		<input type="number" id="Number" name="Number" min="20" max="25">
</p>
</fieldset>

<div class="divbutton">
		<input class="Title2 tag2" type= "submit" name="submit" value="Submit"/>
		<input class="Title2 tag2" type= "reset" name="reset" value="Reset"/>
		</div>
</fieldset>
</div>
</form>

</header>
<footer>
		<?php include 'footer.inc'; ?>
</footer>

</body>
</html>