<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Creating Web Applications Lab 10" />
<meta name="keywords" content = "PHP, MySql" />
<title>Add Car</title>
</head>
<body>
<h1>Creating Web Applications - Lab 10</h1>
<?php

require_once ("settings.php");
$conn = @mysqli_connect ($host,
$user,
$pwd,
$sql_db
);
$make = trim($_POST["make"]);
$model = trim($_POST["model"]);
$price = trim($_POST["price"]);
$yom = trim($_POST["yom"]);
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $sql_table="cars";
        $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";
            $result = mysqli_query($conn, $query);
            if (!$result){
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
            } else {
                echo "<p class=\"ok\">Successfully added New Car record</p>";
            }
            mysqli_close($conn);
    }
    ?>