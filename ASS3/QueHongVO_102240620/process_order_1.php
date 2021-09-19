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
        $query = "CREATE TABLE attempts (
            OrderID int(11) AUTO_INCREMENT,
            Firstname varchar(40),
            Lastname varchar(40) ,
            PhoneNumber int (12),
            Email int(40),
            Item varchar(40),
            Quantity int (12),
            Total Price int (12),
           
            PRIMARY KEY  (AttemptID)
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
  $cart_item = trim($_POST['cart-items']);
  $cart_quantity_input = trim($_POST['cart-quantity-input']);
  $cart_total_price = trim($_POST['cart-total-price']);

  $sql_table = 'attempts';

$firstName= sanitise_input($firstName);
$lastName = sanitise_input($lastName);
$phoneNumber = sanitise_input($phoneNumber);
$email = sanitise_input($email);
$cart_item = sanitise_input($cart_item);
$cart_quantity_input = sanitise_input($cart_quantity_input);
$cart_total_price = sanitise_input($cart_total_price);

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


//Attempts Query

$query= "SELECT * FROM attempts WHERE PhoneNumber = '$phoneNumber' ORDER BY AttemptID DESC";
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO attempts (Firstname, Lastname, PhoneNumber, Email, Item, Quantity, Total Price) Values ('$firstName', '$lastName', '$phoneNumber', '$email', '$cart_item', '$cart_quantity_input', '$cart_total_price')";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	$attempt = $data['Attempt'];
	
	if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO attempts (Firstname, Lastname, PhoneNumber, Email, Item, Quantity, Total Price) Values ('$firstName', '$lastName', '$phoneNumber', '$email', '$cart_item', '$cart_quantity_input', '$cart_total_price')";
	mysqli_query($conn, $query);
    }	else {
    $attempterr = "Your Atttempt exceded";
    $query= "SELECT * FROM attempts WHERE PhoneNumber = '$phoneNumber'";
    mysqli_query($conn, $query);
    }
	}
?>
