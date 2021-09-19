<?php
	$host = "s102240620.swin.edu.au";
	$user = "s102240620"; // your user name
	$pwd = "130600"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s102204620_db"; // your database
?>

$conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db);