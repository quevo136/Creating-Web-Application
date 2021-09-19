<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<title> SSH </title>
	<link href ="style/style.css" rel= "stylesheet"/>
	<script src="script/enhancements.js"></script>
</head>


<body class="bground">

<?php include 'menu.inc'; ?>

<div class="mySlides fade">
  
  <img src="images/a.jpg" style="width:100%">
  <div class="TitleSSH">SSH</div>
</div>

<div class="mySlides fade">
  
  <img src="images/b.jpg" style="width:100%">
  <div class="TitleSSH">SSH</div>
</div>

<div class="mySlides fade">
 
  <img src="images/c.jpg" style="width:100%">
  <div class="TitleSSH">SSH</div>
</div>

<br/>

<div style="text-align:center">
  <span class="bullets"></span> 
  <span class="bullets"></span> 
  <span class="bullets"></span> 
</div>	





<div class="outer">
	<h2 class="Introduction"> Introduction </h2>
	<p>
	SSH is a Network Protocol that allows one computer to securely connect to another computer over an unsecured network like the internet without the increption, data travel over the internet in plain text, which makes it easy for anyone to intercept username or password and then use it. However, SSH encrypts your data through a tunnel securely log in to a remote machine, securely transmite files, safely issue remote commands. 
	</p>
	<p>
	Encryption is a way to hide a piece of data so that it is unreadable unless you know how to decode or decrypt the data. SSH was created as a secure way of communication which encrypts data through a tunnel, so that bad actors cannot retrieve the data during transfer. With SSH, you can still see that data is being transferred and how much data is being transferred, but you cannot see what the data is.
	</p> 
	<a href="topic.html" class="readmorebutton fontsize readmorecolor">read more...</a>
</div>
<div class="outer">	
	<iframe width="420" height="325" src="https://www.youtube.com/embed/zlv9dI-9g1U"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

	<footer>
		<?php include 'footer.inc'; ?>
	</footer>
</body>
</html>