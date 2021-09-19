<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href = "style.css" rel="stylesheet"/>
    <script src="enhancement.js" async></script>
    <script src="enquire.php"></script>
    <script src="payment.js"></script>
    <script src="payment.php"></script>
    

</head>
<body>

    
    <?php include 'menu.inc'; ?>


    <?php
    require_once ("settings.php");
    $conn = @mysqli_connect ($host,$user,$pwd) or die ("Failed to connect to server");
    @mysqli_select_db($conn, $sql_db) or die ("Database not available");
    date_default_timezone_set('Australia/Melbourne');

    if(empty($result)){
        $query = "CREATE TABLE orders (
            OrderID int(11) AUTO_INCREMENT,
            /*Firstname varchar(40),
            Lastname varchar(40),
            Phonenumber int(12),
            Email varchar(40),             
            Street varchar(40),            
            Suburb varchar(40),*/
            Cardnumber int(16),
            Nameoncard varchar(40),
            Expmonth int(2),
            Expyear int(4),
            CVV int(3),                   
            OrderCost int(11),    
            PRIMARY KEY (OrderID)
            )";
            $result = mysqli_query($conn, $query);
    }

    
    // Variables 
    session_start();
        /*$errMsg = "";
        $submit = true;
        $firstName= $_SESSION["First_name"];        
        $lastName = $_SESSION["Last_name"];
        $email = $_SESSION["email"];
        $phoneNumber = $_SESSION["phone_num"];  
        $street = $_SESSION["Street"];
        $suburb = $_SESSION["Suburb"];
        $state = $_SESSION["state"];
        $postCode = $_SESSION["postcode"];
        echo $_SESSION["First_name"];
        echo $_SESSION["Last_name"];
        echo $_SESSION["email"];
        echo $_SESSION["phone_num"];
        echo $_SESSION["Street"];
        echo $_SESSION["Suburb"];
        echo $_SESSION["postcode"];*/


        

        $cardNumber = trim($_POST["ccnum"]);
        $Nameoncard = trim($_POST["cardname"]);
        $Expmonth = trim($_POST["expmonth"]);
        $Expyear = trim($_POST["expyear"]);
        $CVV = trim($_POST["cvv"]);
        $attempt = 1;
        $total = 0;
        $sql_table = 'orders';

        


        
    //Attempts Query
    $query= "SELECT * FROM orders WHERE CardNumber = '$cardNumber' ORDER BY OrderID DESC";
    $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)== 0){
        $query = "INSERT INTO orders (Cardnumber, Nameoncard, Expmonth, Expyear, CVV, OrderCost) Values ('$cardNumber', '$Nameoncard', '$Expmonth', '$Expyear','$CVV', '$total')";
        $result = mysqli_query($conn, $query);
        
        } else {
        $data = mysqli_fetch_assoc($result);
        #$attempt = $data['Attempt'];
        
        if ($attempt < 2){
        $attempt++;
        $query = "INSERT INTO orders (Cardnumber, Nameoncard, Expmonth, Expyear, CVV, OrderCost) Values ('$cardNumber', '$Nameoncard', '$Expmonth', '$Expyear','$CVV', '$total')";
        mysqli_query($conn, $query);

        } else {
        $attempterr = "Your Atttempt exceded";
        $query= "SELECT * FROM orders WHERE Phonenumber = '$phoneNumber'";
        mysqli_query($conn, $query);
        }
    }
       

    ?>


    <h2>Receipt Form</h2>

    <!-- Retrieve Personal Data -->
    <fieldset class='outer'>
    <h2 class='Introduction'> Personal Data </h2>

    <p> First Name :<span id='firstN'>
    <input type="hidden" name="First_name" id="First_name" />    
    <?php
    $query = "SELECT * FROM orders WHERE Cardnumber='$cardNumber' AND Nameoncard='$Nameoncard' AND Expmonth = '$Expmonth' AND Expyear = '$Expyear' AND CVV = '$CVV' ";
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



    </fieldset>

<fieldset>
    <h2 class='Introduction'> Personal Card Data </h2>
    <p> Card Number :<span id='cardnumber'>    
    <?php
    $query = "SELECT * FROM orders WHERE Cardnumber='$cardNumber' AND Nameoncard='$Nameoncard' AND Expmonth = '$Expmonth' AND Expyear = '$Expyear' AND CVV = '$CVV' ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    echo $row["Cardnumber"];
    ?>
    </span></p>

    <p> Name on Card:<span id="cardname">
    <?php
    echo $row['Nameoncard']
    ?>
    </span></p>

    <p> EXP MONTH  :<span id="expmonth">
    <?php
    echo $row["Expmonth"];
    ?>
    </span></p>

    <p> EXP YEAR :<span id="expyear">
    <?php
    echo $row["Expyear"];
    ?>
    </span></p>

    <p> CVV :<span id="CVV">
    <?php
    echo $row["CVV"];
    ?>
    </span></p>


</fieldset>


</body>