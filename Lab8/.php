<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href = "style.css" rel="stylesheet"/>
    <script src="enhancement.js" async></script>
    <script type="payment.js"></script>
    

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
    $query = "SELECT * FROM attempts";
        $result = mysqli_query($conn, $query);
        
    if(empty($result)){
        $query = "CREATE TABLE attempts (
            AttemptID int(11) AUTO_INCREMENT,
            Firstname varchar(40),
            Lastname varchar(40) ,
            )";
            $result = mysqli_query($conn, $query);
    }

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

    if (isset($_POST["email"]))
        $email =sanitise_input($_POST["email"]);

    else
        echo "<p> Unknown value</p>";
        
    
  $errMsg = "";
  $submit = true;
  $firstName= trim($_POST["First_name"]);
  $lastName = trim($_POST["Last_name"]);

$firstName= sanitise_input($firstName);
$lastName = sanitise_input($lastName);

$query= "SELECT * FROM attempts WHERE StudentID = '$studentid' ORDER BY AttemptID DESC";
$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result)== 0){
	$query = "INSERT INTO attempts (Firstname) Values ('$firstName', '$lastName')";
	$result = mysqli_query($conn, $query);
	
	} else {
	$data = mysqli_fetch_assoc($result);
	$attempt = $data['Attempt'];
	
	if ($attempt < 2){
	$attempt++;
	$query = "INSERT INTO attempts (Firstname, Lastname) Values ('$firstName', '$lastName')";
	mysqli_query($conn, $query);
		
	}
?>


<!-- Retrieve Personal Data -->
<fieldset class='outer'>
<h2 class='Introduction'> Personal Data </h2>
<p> First Name :<span id='firstN'>
<?php
$query = "SELECT * FROM attempts WHERE Firstname='$firstName' AND Lastname='$lastName' ";
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
</fieldset>



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
             

        
        
         <p>Total Cost: $<span  id="confirm_cost"></span></p>
         <input type="hidden" name="cost" id="cost"/>
                
                </section>
           
            
   
                <input type="submit" value="Continue to checkout" class="buton">
                <button type="reset" id="reset"><a href = " index.html">CANCEL</a></button>
            </form>
        </div>
    </div>

   
            

    
</div>

