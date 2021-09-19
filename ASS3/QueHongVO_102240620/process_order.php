<?php
function sanitise_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<?php

//////////////  checking   ////////////////
if (isset ($_POST["First_name"])){
    $firstname = $_POST["First_name"];
}
else {
    echo "<p> Error :Invalid first name <a href = \"fix_order.php\">form </a></p>";
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
    echo "<p> Error :Invalid phone number <a href = \"fix_order.php\">form </a></p>";
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
    echo "<p> Error :Invalid street name <a href = \"fix_order.php\">form </a></p>";
}

if (isset ($_POST["Suburb"])){
    $suburb = $_POST["Suburb"];

}
else {
    echo "<p> Error :Invalid suburb <a href = \"fix_order.php\">form </a></p>";
}


if (isset ($_POST["postcode"])){
    $postCode = $_POST["postcode"];

}
else {
    echo "<p> Error :Invalid postcode <a href = \"fix_order.php\">form </a></p>";
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






// Variables         
    $errMsg = "";
    $submit = true;
    $firstName= trim($_POST["First_name"]);
    $lastName = trim($_POST["Last_name"]);
    $email = trim($_POST["email"]);
    $phoneNumber = trim($_POST["phone_num"]);  
    $street = trim($_POST["Street"]);
    $suburb = trim($_POST["Suburb"]);
    $state = trim($_POST["state"]);
    $postCode = trim($_POST["postcode"]);
    $cardNumber = trim($_POST["ccum"]);
    $Nameoncard = trim($_POST["cardname"]);
    $Expmonth = trim($_POST["expmonth"]);
    $Expyear = trim($_POST["expyear"]);
    $CVV = trim($_POST["ccum"]);
    $attempt = 1;
    $total = 0;
    $sql_table = 'orders';

    // Sanitising
    $firstName= sanitise_input($firstName);
    $lastName = sanitise_input($lastName);
    $email = sanitise_input($email);
    $phoneNumber = sanitise_input($phoneNumber);
    $street = sanitise_input($street);
    $suburb = sanitise_input($suburb);
    $postCode = sanitise_input($postCode);
    $cardNumber = sanitise_input($cardNumber);
    $Nameoncard = sanitise_input($Nameoncard);
    $Expmonth = sanitise_input($Expmonth);
    $Expyear = sanitise_input($Expyear);
    $CVV = sanitise_input($CVV);


    //$studentid = sanitise_input($studentid);

    


    
?>