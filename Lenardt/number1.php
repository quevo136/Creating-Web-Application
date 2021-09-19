<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<link href ="style/style.css" rel= "stylesheet"/>
	<title>TOPIC SSH</title>
</head>
Manage - Web Accessibility
</title>
</head>
<body class="bground">
<header>
	<?php include 'menu.inc'; ?>
</header>

<div class="outer">	
<?php 
require_once ("settings.php");

$conn = @ mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
	echo "<p>Database connection failure</p>";
} else {
		$query = "select * FROM attempts";
		$result = mysqli_query($conn, $query);
	if (!$result) {   
		echo "<p> Something is wrong with ", $query, "</p>";
	} else {		
		echo "<table border='1' id='enchancetable'>";
		echo "<tr>";
		echo "<th scope='col'>Attempt ID</th>";
        echo "<th scope='col'>First Name</th>";
        echo "<th scope='col'>Last Name</th>";
        echo "<th scope='col'>Student ID</th>";
        echo "<th scope='col'>Attempts</th>";
        echo "<th scope='col'>Score</th>";
		echo "</tr>";

		while ($row = mysqli_fetch_assoc($result)) {
			echo 
			"<tr>"
			."<td>", $row["AttemptID"], "</td>"
            ."<td>", $row["Firstname"], "</td>"
            ."<td>", $row["Lastname"], "</td>"
			."<td>", $row["StudentID"], "</td>"
			."<td>", $row["Attempt"], "</td>"
			."<td>", $row["Score"], "</td>";
		}
		echo "</table>";

    }

		mysqli_free_result($result);
		
		mysqli_close ($conn);
	}


?>
</div>


<footer>
	<?php include 'footer.inc'; ?>
</body>
</html>