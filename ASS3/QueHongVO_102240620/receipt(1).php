<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href = "style.css" rel="stylesheet"/>
    <script src="enhancement.js" async></script>
    <script src="payment.js"></script>
    

</head>
<body>

<h2>Receipt Form</h2>

<!-- Retrieve Personal Data -->
<fieldset class='outer'>
<h2 class='Introduction'> Personal Data </h2>

<p> First Name :<span id='firstN'>
<input type="hidden" name="First_name" id="First_name" />    
<?php
$query = "SELECT * FROM orders WHERE Firstname='$firstName' AND Lastname='$lastName' AND Email = '$email' AND Phonenumber = '$phoneNumber' AND OrderCost = '$total' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
echo $row["Firstname"];
?>
</span></p>
<p> Last Name :<span id="lastN">
<input type="hidden" name="Last_name" id="Last_name"/>
<?php
echo $row["Lastname"];
?>
</span></p>

<p> Email :<span id="email">
<input type="hidden" name="email" id="email"/>
<?php
echo $row["Email"];
?>
</span></p>

<p> Phone Number :<span id="phoneNo">
<input type="hidden" name="phone_num" id="phone_num"/>
<?php
echo $row["Phonenumber"];
?>
</span></p>

<p> Street :<span id="street">
<!--<input type="hidden" name="street" id="street"/>-->
<?php
echo $row["Street"];
?>
</span></p>

<p> Suburb :<span id="suburb">
<!--<input type="hidden" name="Suburb" id="Suburb"/>-->
<?php
echo $row["Suburb"];
?>
</span></p>

<p> Postcode :<span id="postcode">
<!--<input type="hidden" name="postcode" id="postcode"/>-->
<?php
echo $row["Postcode"];
?>
</span></p>

<p> Order Cost :<span id="total">
<!--<input type="hidden" name="total" id="total"/>-->
<?php
echo $row["OrderCost"];
?>
</span></p>



</fieldset>