<?php

session_start();
$sum = $_SESSION["number"];
$num++;
$_SESSION["number"] = $num;
header("location:number.php");

?>