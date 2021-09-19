<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href = "style.css" rel="stylesheet"/>
    <script src="enhancement.js" async></script>
    <script src ="payment.js"></script>
    

</head>
<body>

<h2>Responsive Checkout Form</h2>

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
    $query = "SELECT * FROM attempts";
    $result = mysqli_query($conn, $query);
        
    if(empty($result)){
        $query = "CREATE TABLE attempts (
            OrderId int(11) AUTO_INCREMENT,
            OrderCost int(11),
            OrderTime datetime,
                
           
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

    if (isset ($_POST["phone_num"])){
        $phonenumber = $_POST["phone_num"];

    }
    else {
        echo "<p> Error :Enter data </p>";
    }

    if (isset($_POST["email"])){
        $email =$_POST["email"];

    }else{
        echo "<p> Unknown value</p>";
    }    
    
    if (isset($_POST["cart-items"])){
        $cart_item =$_POST["cart-items"];

    }else{
        echo "<p> Unknown value</p>";
    }  

    if (isset($_POST["quantity"])){
        $cart_quantity_input =$_POST["cart-quantity-input"];

    }else{
        echo "<p> Unknown value</p>";
    }  

    if (isset($_POST["cart-total-price"])){
        $cart_total_price =$_POST["cart-total-price"];

    }else{
        echo "<p> Unknown value</p>";
    } 

// Variables         
  $errMsg = "";
  $submit = true;
  
  $firstName= trim($_POST["First_name"]);
  $lastName = trim($_POST["Last_name"]);
  $phoneNumber = trim($_POST['phone_num']);
  $email = trim($_POST['email']);
 
  $sql_table = 'orders';


// Sanitising
$firstName= sanitise_input($firstName);
$lastName = sanitise_input($lastName);
$phoneNumber = sanitise_input($phoneNumber);
$email = sanitise_input($email);


// Validating
  
$pnumlength = strlen((string)$phoneNumber);

if (!preg_match("/^[A-Za-z]+$/", $firstName)) {
      $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
      $error = 1;	
}

if (!preg_match("/^[A-Za-z]+$/", $lastName)) {
      $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
      $error = 1;	
}

$phoneNumber = $_POST['phone_num'];
if(strlen($phoneNumber) !=12){
    $lnerr =  "phone number is Wrong";
   
}

if (!preg_match("/^[A-Za-z]+$/", $email)) {
    $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
    $error = 1;
}

//CALC TOTAL PRICE

if (isset($_POST[""]))



//Attempts Query

$query= "SELECT * FROM orders WHERE PhoneNumber = '$phoneNumber' ORDER BY AttemptID DESC";
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO orders (Firstname, Lastname, PhoneNumber, Email, ) Values ('$firstName', '$lastName', '$phoneNumber', '$email',)";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	#$attempt = $data['Attempt'];
	
	if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO orders (Firstname, Lastname, PhoneNumber, Email, Item, Quantity, Total Price) Values ('$firstName', '$lastName', '$phoneNumber', '$email', '$cart_item', '$cart_quantity_input', '$cart_total_price')";
	mysqli_query($conn, $query);
    }	else {
    $attempterr = "Your Atttempt exceded";
    $query= "SELECT * FROM orders WHERE PhoneNumber = '$phoneNumber'";
    mysqli_query($conn, $query);
    }
	}
?>


<!-- Retrieve Personal Data -->
<fieldset class='outer'>
<h2 class='Introduction'> Personal Data </h2>
<p> First Name :<span id='firstN'>
<?php
$query = "SELECT * FROM orders WHERE Firstname='$firstName' AND Lastname='$lastName' AND Email = '$email'";
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
<p> Phone Number :<span id="phoneNo">
<?php
echo $row["PhoneNumber"];
?>
</span></p>
<p> Email :<span id="email">
<?php
echo $row["Email"];
?>
</span></p>
<p> Item :<span id="item">
<?php
echo $row["Item"];
?>
</span></p>
<p> Quantity :<span id="quanity">
<?php
echo $row["Quantity"];
?>
</span></p>
<p> Total Price :<span id="total_price">
<?php
echo $row["Total Price"];
?>
</span></p>
</fieldset>


<br>
<div class="row">
    <div class="col-75">
        <div class="container_total">
            <form id="validation" method = "post" action="https://mercury.swin.edu.au/it000000/formtest.php">
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
                        <input type="text_payment" id="cname" name="cardname" maxlength="40" placeholder="Name" pattern="^[a-zA-Z ]+$" required/>
                        
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
                     
        
        <p>Total Cost: $<span id="confirm_cost"></span></p>
        <input type="hidden" name="cost" id="cost"/>
                
                </section>
           
            
   
                <input type="submit" value="Continue to checkout" class="buton">
                <button type="reset" id="reset"><a href = " index.html">CANCEL</a></button>
            </form>
        </div>
    </div>
           

    
</div>
