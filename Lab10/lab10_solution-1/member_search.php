<!DOCTYPE html>
<html lang="en">
<head>
<title>VIP Member - Search Members</title>

<meta charset="utf-8" />
<meta name="description" content="Lab 11 - Step 5" />
<meta name="keywords" content="PHP, File, input, output" />
<link rel="stylesheet" href="lab11.css" type="text/css" />
<!-- Description: Form Input for VIP Member -->
<!-- Author: <your name> -->
<!-- Date: <last date updated> -->
<!-- Validated: OK <date checked> || <what still needs to be fixed> -->

</head>
<body>
	<h1>VIP Member Search</h1>
	<h1>Search Data Form</h1>
	<form method="post" action="member_search.php">
	<fieldset><legend>Member Search</legend>
		<p>	<label for="lastname">Last Name: </label>
			<input type="text" name="lastname" id="lastname" /></p>
		<p>	<input type="submit" value="Search for Member" /></p>
	</fieldset>
	</form>
	<hr />
<?php
    if (isset($_POST["lastname"])){
	$lname	= trim($_POST["lastname"]);
	if (!$lname==""){
	// you need to edit this file to include your mysql info
         require_once('settings.php');
    
	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p class=\"wrong\">Database connection failure</p>"; // Might not show in a production script 
	} else {
		// Upon successful connection
		
	$sql_table="vipmembers";
	
		// Set up the SQL command to add the data into the table
		$query = "select member_id, fname, lname, email from $sql_table where lname like '$lname%' order by lname, fname";
			
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execuion was successful
		if(!$result) {
			echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";
		} else {
		if(mysqli_num_rows($result)>0) {
			// Display the retrieved records
			echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">ID</th>\n"
			     ."<th scope=\"col\">First Name</th>\n"
				 ."<th scope=\"col\">Last Name</th>\n"
				 ."<th scope=\"col\">Email</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>",$row["member_id"],"</td>";
				echo "<td>",$row["fname"],"</td>";  
				echo "<td>",$row["lname"],"</td>";
				echo "<td>",$row["email"],"</td>";
				echo "</tr>";
			}
			echo "</table>";
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		} // if successful query operation
		} // end if no rows
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
	} // if null string
	} // if data posted
?>
</body>
</html>