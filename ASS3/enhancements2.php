<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<title>Enhancement SSH</title>
	<link href="style/style.css" rel= "stylesheet"/>
	<script src="script/enhancements.js"></script>
	
</head>

<body>
<?php include 'menu.inc'; ?>

<header class="bgimg2">

<fieldset class="outer">
<h2 class="Introduction"> Automatic Slideshow </h2>
<p>
This is a image slideshow that will move automatically if the person go to this page. This is to make the website more creative and interesting. This slideshow uses javascript and styling modification using seperate css where the source i get from W3Schools.com
</p>

<div class="slide-container">

<div class="mySlides fade">
  <img src="images/a.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/b.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/c.jpg" style="width:100%">
</div>

</div>

<div style="text-align:center">
  <span class="bullets"></span> 
  <span class="bullets"></span> 
  <span class="bullets"></span> 
</div>	
</fieldset>



<fieldset class="outer">
<h2 class="Introduction"> Countdown Timer </h2>
<p>
Countdown timer is use in website to display countdown to any page that needs. For example I am using it to calculate the remaining time for the quiz. Displaying this timer on the page will let the user know how long the time is remaining before the quiz ends
</p>
<div id="timediv" class="clockbox"> 
  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
  </div> 
  <div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">Hours</div> 
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Seconds</div> 
  </div>
  <p id="timeup"></p>
</div> 


</fieldset>
</header>
<footer>
		<?php include 'footer.inc'; ?>
</footer>
</body>
</html>