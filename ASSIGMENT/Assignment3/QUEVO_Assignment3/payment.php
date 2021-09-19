<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href = "style.css" rel="stylesheet"/>
    <script src="enhancement.js" async></script>
    <script src="payment.js"></script>
    

</head>
<body>


<?php include 'menu.inc'; ?>
<?php

require_once ("settings.php");
$conn = @mysqli_connect ($host,$user,$pwd) or die ("Failed to connect to server");
@mysqli_select_db($conn, $sql_db) or die ("Database not available");
date_default_timezone_set('Australia/Melbourne');

function IsChecked($checkname, $value) {
	if (!empty($_POST[$checkname])) {
		foreach($_POST[$checkname] as $checkvalue) {
			if ($checkvalue == $value) {
				return true; 
			}
		}
	}
	return false;
}

function sanitise_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//case if the table doesn't exists
    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);
        
    if(empty($result)){
        $query = "CREATE TABLE orders (
            OrderID int(11) AUTO_INCREMENT,
            Firstname varchar(40),
            Lastname varchar(40),
            Phonenumber int(12),
            Email varchar(40),
             
            Street varchar(40),            
            Suburb varchar(40),           
            Postcode int(5), 
            OrderCost int(11),    
            PRIMARY KEY (OrderID)
            )";
            $result = mysqli_query($conn, $query);
    }

//checking
    if (isset ($_POST["First_name"])){
        $firstname = $_POST["First_name"];
    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    if (isset ($_POST["Last_name"])){
        $lastname = $_POST["Last_name"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    if (isset ($_POST["email"])){
        $email = $_POST["email"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    if (isset ($_POST["phone_num"])){
        $phoneNumber = $_POST["phone_num"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    /*if (isset ($_POST["cart-total-price"])){
        $price = $_POST["cart-total-price"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }
    if (isset ($_POST["state"])){
        $state = $_POST["state"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }*/

    if (isset ($_POST["Street"])){
        $street = $_POST["Street"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    if (isset ($_POST["Suburb"])){
        $suburb = $_POST["Suburb"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    
    if (isset ($_POST["postcode"])){
        $postCode = $_POST["postcode"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    

// Variables         
  $errMsg = "";
  $submit = true;
  $firstName= trim($_POST["First_name"]);
  $lastName = trim($_POST["Last_name"]);
  $email = trim($_POST["email"]);
  $phoneNumber = trim($_POST["phone_num"]);  
  //$total = 0;
  $street = trim($_POST["Street"]);
  $suburb = trim($_POST["Suburb"]);
  $state = trim($_POST["state"]);
  $postCode = trim($_POST["postcode"]);
  $attempt = 1;
  $total = 0;
  $sql_table = 'orders';

// Sanitising
$firstName= sanitise_input($firstName);
$lastName = sanitise_input($lastName);
//$studentid = sanitise_input($studentid);

// Validating
  
//$iflength = strlen((string)$orderid);

if (!preg_match("/^[A-Za-z]+$/", $firstName)) {
      $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
      $error = 1;	
}

if (!preg_match("/^[A-Za-z]+$/", $lastName)) {
      $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
      $error = 1;	
}


//Item 1
/* 
if ($index == 0) {
	$quest = $_POST["Number"];
	$answer = strcasecmp($Item1, $quest);
		if ($quest += 1) {
			$total += 110;
		};
	}*/
$Item1 = "Design";

if($_POST['Number'] += '1') {
    $total += 110;
}

//Item 2
$Item4 = "ComputerScience";
/*if(IsChecked('cart-item-title','ComputerScience'){
    if($_POST['Number'] += '1') {
        $total += 100;
    }
}*/ 

if ($_POST['Number'] += '1') {
    $total += 100;
} 

//Item 3
$Item3 = 'Marketing';
if ($_POST['Number'] += '1') {
    $total += 110;
}

//Item 4
//$Item4 = "Business_and_Finance";

if($_POST['Number'] += '1') {
    $total += 99;
}

/*if(IsChecked("Design","+=1")) {
    $score += 110;
}
if(IsChecked("ComputerScience","+=1")) {
$score += 100;
}
if(IsChecked("Marketung ","+=1")) {
$score += 110;
}
if(IsChecked("Business_and_Finance","+=1")) {
$score += 99;
}*/
//Attempts Query

/*$query= "SELECT * FROM orders WHERE OrderID = '$orderid' ORDER BY OrderID DESC";
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO orders (OrderCost, OrderTime, OrderStatus) Values ('$total',)";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	$attempt = $data['Attempt'];
	
    }if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO orders (OrderCost, OrderTime, OrderStatus) Values ('$total', '$lastName', '$phoneNumber', '$email', '$cart_item', '$cart_quantity_input', '$cart_total_price')";
	mysqli_query($conn, $query);
    }	else {
    $attempterr = "Your Atttempt exceded";
    $query= "SELECT * FROM orders WHERE OrderId = '$orderid'";
    mysqli_query($conn, $query);
    }*/
  
$query= "SELECT * FROM orders WHERE PhoneNumber = '$phoneNumber' ORDER BY OrderID DESC";
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO orders (Firstname, Lastname, Email, Phonenumber, Street , Suburb, Postcode, OrderCost ) Values ('$firstName', '$lastName', '$email', '$phoneNumber', '$street ', '$suburb', '$postCode', '$total')";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	#$attempt = $data['Attempt'];
	
	if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO orders (Firstname, Lastname, Email, Phonenumber,  Street , Suburb, Postcode, OrderCost) Values ('$firstName', '$lastName', '$email', '$phoneNumber', '$street ', '$suburb','$postCode', '$total')";
	mysqli_query($conn, $query);

    } else {
    $attempterr = "Your Atttempt exceded";
    $query= "SELECT * FROM orders WHERE Phonenumber = '$phoneNumber'";
    mysqli_query($conn, $query);
    }
	}
?>	



<!-- Retrieve Personal Data -->

<fieldset class='outer'>

<h2 class='Introduction'> Personal Data </h2>

<p> First Name :<span id='firstN'>
<?php
$query = "SELECT * FROM orders WHERE Firstname='$firstName' AND Lastname='$lastName' AND Email = '$email' AND Phonenumber = '$phoneNumber' AND Street = '$street' AND Suburb = '$suburb' AND OrderCost = '$total' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
echo $row["Firstname"];
?>
</span></p>
<p> Last Name :<span id="lastN">
<?php
echo $row["Lastname"];
?>
</span></p>

<p> Email :<span id="email">
<?php
echo $row["Email"];
?>
</span></p>

<p> Phone Number :<span id="phoneNo">
<?php
echo $row["Phonenumber"];
?>
</span></p>

<p> Street :<span id="street">
<?php
echo $row["Street"];
?>
</span></p>

<p> Suburb :<span id="suburb">
<?php
echo $row["Suburb"];
?>
</span></p>

<p> Postcode :<span id="postcode">
<?php
echo $row["Postcode"];
?>
</span></p>

<p> Order Cost :<span id="total">
<?php
echo $row["OrderCost"];
?>
</span></p>

<input type="hidden" name="First_name" id="First_name" />
<input type="hidden" name="Last_name" id="Last_name"/>
<input type="hidden" name="email" id="email"/>
<input type="hidden" name="phone_num" id="phone_num"/>
<input type="hidden" name="street" id="street"/>
<input type="hidden" name="Suburb" id="Suburb"/>
<input type="hidden" name="postcode" id="postcode"/>
<input type="hidden" name="total" id="total"/>


</fieldset>


<br>
<div class="row">
    <div class="col-75">
        <div class="container_total">
            <form id="validation" method = "post" action="process_order.php" nonvalidate = "nonvalidate" >
                <div class="row">
                

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <select name="fname" tabindex="21" id="fname" style="margin-left: 10px;" required="required">
                            <option value="">Please Select</option>
                            <option value="fname">AmericanExpress</option>
                            <option value="fname">Visa</option>
                            <option value="fname">MasterCard</option>

                        </select>
                
                        <label for="ccnum">Credit card number</label>
                        <input type="text_payment" id="ccnum" name="ccnum"  placeholder="Card Number" required/>
                       
                        

                        <label for="cname">Name on Card</label>
                        <input type="text_payment" id="cardname" name="cardname" maxlength="40" placeholder="Name" pattern="^[a-zA-Z ]+$" required/>
                        
                        <label for="expmonth">Exp Month</label>
                        <input type="text_payment" id="expmonth" name="expmonth" maxlength="2" placeholder="December" required/>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text_payment" id="expyear" name="expyear" placeholder="2021" required/>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text_payment" id="cvv" name="cvv" placeholder="352"required/>
                            </div>
                        </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
             

        
        
        <p>Total Cost: $<span  id="confirm_cost"></span></p>
        <?php 
            echo $row["OrderCost"];
        ?>
         <input type="hidden" name="cost" id="cost"/>
                
                </section>
           
            
   
                <input type="submit" value="Continue to checkout" class="buton">
                <button type="reset" id="reset"><a href = " index.html">CANCEL</a></button>
            </form>
        </div>
    </div>
           

    
</div>

