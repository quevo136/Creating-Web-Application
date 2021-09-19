<!DOCTYPE html>
<html lang="en">
<head>
<title>VIP Member - Add Member Processing</title>

<meta charset="utf-8" />
<meta name="description" content="Lab 11 - Step 2" />
<meta name="keywords" content="PHP, File, input, output" />
<link rel="stylesheet" href="lab11.css" type="text/css" />
<!-- Description: Form Input for VIP Member -->
<!-- Author: <your name> -->
<!-- Date: <last date updated> -->
<!-- Validated: OK <date checked> || <what still needs to be fixed> -->

</head>
<body>
	<h1>VIP Add Member Processing</h1>
<?php
	// you need to edit this file to include your mysql info 
       require_once('settings.php');
   
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
 
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		// of the PHP script
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {
		// Upon successful connection
		
		// Get data from the form
		$fname	= trim($_POST["firstname"]);
		$lname	= trim($_POST["lastname"]);
		$gender	= trim($_POST["sex"]);
		$email	= trim($_POST["email"]);
		$phone	= trim($_POST["phone"]);
		
		//Check the data - do more tests - not trust the user!
		
		$sql_table="vipmembers";
        $fieldDefinition="member_id INT AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(40), lname VARCHAR(40), gender VARCHAR(1), email VARCHAR(40), phone VARCHAR(20)";
		
		// check: if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
		$result = @mysqli_query($conn, $sqlString);
		// checks if any tables of this name
		if(mysqli_num_rows($result)==0) {
			echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
			$sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";; 
			$result2 = @mysqli_query($conn, $sqlString);
		    // checks if the table was created
		    if($result2===false) {
				echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script 
			} else {
			// display an operation successful message
			echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
			} // if successful query operation

		} else {
			// display an operation successful message
			echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
		} // if successful query operation
		
		// Set up the SQL command to add the data into the table
		$query = "insert into $sql_table"
			."(fname, lname, gender, email, phone)"
			. " values "
			."('$fname', '$lname', '$gender', '$email', '$phone')";
		// execute the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script 
		} else {
			// display an operation successful message
			echo "<p class=\"ok\">Successfully added New member</p>";
		} // if successful query operation
				
		// close the database connection
		mysqli_close($conn);
	}  // if successful database connection
?>
</body>
</html>




