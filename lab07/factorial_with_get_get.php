<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Creating Web Applications"/>
	<meta name="keywords" content = "HTML, CSS, JavaScript, PHP" />
	<meta name="author" content="quevo" />
	<title> PHP LAB 07 </title>
</head>
<body>

	<h1>My Study Program</h1>
     <hr />
     <h2>Personal Details</h2>
        <span>
        	<label><strong>Name:</strong></label>
        	Que Hong Vo 
        </span>
        <br>
        <span>
          <strong>Student ID:</strong> 
          102240620
        </span>
        
     <h2> Study</h2>
      <span>
        <strong>Course:</strong> 
        COS10011-Ceating Web Applications
      </span>
      <br>
      <strong>Units:</strong>
      <ul>
      	<li>Unit 1</li>
       	<li>Unit 2</li>
       	<li>Unit 3</li>
      </ul>

    <?php
            include ("mathfunctions.php");   

    ?> 

    <h1>Creating Web Application - lab 7</h1> 

	<?php

	  if (isset($_GET["number"])){
      $num = $_GET["number"];
    
	    if(isPositiveInteger($num)){
	      echo "<php>", $sum, "! is", factorial ($num), ".</p>";

	    }else {
	      echo "<p> PLease enter a positive integer .</p>";

	    }
	    echo "<p><a href = 'factorial.html'>Return to Entry Page</a></p>";
    }

	?>

</body>
</html>