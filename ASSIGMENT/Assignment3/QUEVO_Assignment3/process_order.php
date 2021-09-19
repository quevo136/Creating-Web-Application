<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:enquire.php");
}
?>

<?php
function sanitise_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<?php

    /*$errMsg = "";
    $submit = true;
    $firstName= trim($_POST["First_name"]);
    $lastName = trim($_POST["Last_name"]);
    $email = trim($_POST["email"]);
    $phoneNumber = trim($_POST["phone_num"]);  
    $street = trim($_POST["Street"]);
    $suburb = trim($_POST["Suburb"]);
    $state = trim($_POST["state"]);
    $postCode = trim($_POST["postcode"]);
    $attempt = 1;
    $total = 0;
    $sql_table = 'orders';*/

if ($errMsg = ""){
$query= "SELECT * FROM orders WHERE PhoneNumber = '$phoneNumber' ORDER BY OrderID DESC";
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)== 0){
    $conn = @mysqli_connect ($host,$user,$pwd) or die ("Failed to connect to server");
	$query = "INSERT INTO orders (Firstname, Lastname, Email, Phonenumber, Street , Suburb, Postcode,Cardnumber, Nameoncard, Expmonth, Expyear, CVV, OrderCost) Values ('$firstName', '$lastName', '$email', '$phoneNumber', '$street ', '$suburb', '$postCode','$cardNumber', '$Nameoncard', '$Expmonth', '$Expyear','$CVV', '$total')";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	#$attempt = $data['Attempt'];
    }
	if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO orders (Firstname, Lastname, Email, Phonenumber,  Street , Suburb, Postcode,Cardnumber, Nameoncard, Expmonth, Expyear, CVV, OrderCost) Values ('$firstName', '$lastName', '$email', '$phoneNumber', '$street ', '$suburb','$postCode', '$cardNumber', '$Nameoncard', '$Expmonth', '$Expyear','$CVV','$total')";
	mysqli_query($conn, $query);

    } else {
    $attempterr = "Your Atttempt exceded";
    $query= "SELECT * FROM orders WHERE Phonenumber = '$phoneNumber'";
    mysqli_query($conn, $query);
    }
    header ("location: receipt.php");

}else{
    header ("location: fix_order.php");
} 

//////////////  checking   ////////////////
if (isset ($_POST["First_name"])){
    $firstname = $_POST["First_name"];
}
else {
    echo "<p> INVALID FIRST NAME INPUT </p>";
}

if (isset ($_POST["Last_name"])){
    $lastname = $_POST["Last_name"];

}
else {
    echo "<p> Error :Invalid last name <a href = \"fix_order.php\">form </a></p>";
}

if (isset ($_POST["email"])){
    $email = $_POST["email"];

}
else {
    echo "<p> Error :Invaid email <a href = \"fix_order.php\">form </a></p>";
}

if (isset ($_POST["phone_num"])){
    $phoneNumber = $_POST["phone_num"];

}
else {
    
    //echo "<p> Error :Invalid phone number <a href = \"fix_order.php\">form </a></p>";
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
    echo "<p> Error :Invalid street name </p>";
    //header ("location :fix_order.php");
}

if (isset ($_POST["Suburb"])){
    $suburb = $_POST["Suburb"];

}
else {
    echo "<p> Error :Invalid suburb <a href = \"fix_order.php\">form </a></p>";
    //header ("location :fix_order.php");
}


if (isset ($_POST["postcode"])){
    $postCode = $_POST["postcode"];

}
else {
    echo "<p> Error :Invalid postcode </p>";
    //header ("location :fix_order.php");
}


//////////////////////  Validating   /////////////////
    if (!preg_match("/^[A-Za-z]+$/", $firstName)) {
        
        $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
        $error = 1;	
    }

    if (!preg_match("/^[A-Za-z]+$/", $lastName)) {
        $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
        $error = 1;	
    }

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
        $errMsg .= "Your email must only contain alpha characters, number, space, or hyphens!";
        $error = 1;	
    }

    if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $phoneNumber)) {
        $errMsg .= "Your phone number must only contain numbers!";
        $error = 1;	
    }

    if (!preg_match("/^[A-Za-z]+$/", $street)) {
        $errMsg .= "Your street address must only contain alpha characters, space, or hyphens!";
        $error = 1;	
    }

    if (!preg_match("/^[A-Za-z]+$/", $suburb)) {
        $errMsg .= "Your name must only contain alpha characters, space, or hyphens!";
        $error = 1;	
    }

    if (!preg_match("/^[2-7]{1}[0-9]{3}$/", $postCode)) {
        $errMsg .= "Your postcode must only contain numbers!";
        $error = 1;	
    }

    /*switch (fname) {
        case "Please Select":
            return false;
        case "AmericanExpress":
            cardno = new RegExp(/^(?:3[47][0-9]{13})$/);
            break;
         case "Visa":
            cardno = new RegExp(/^(?:4[0-9]{12}(?:[0-9]{3})?)$/);
            break;
         case "MasterCard":
            cardno = new RegExp(/^(?:5[1-5][0-9]{14})$/);
            break;
         
    }
       if(!fname.match(cardno)){
       errMsg = errMsg + "Not a valid Visa credit card number!\n";
       header ("location :fix_order.php");
       result = false;
    }*/

    


    // Sanitising
    $firstName= sanitise_input($firstName);
    $lastName = sanitise_input($lastName);
    $email = sanitise_input($email);
    $phoneNumber = sanitise_input($phoneNumber);
    $street = sanitise_input($street);
    $suburb = sanitise_input($suburb);
    $postCode = sanitise_input($postCode);
    //$studentid = sanitise_input($studentid);



    
?>