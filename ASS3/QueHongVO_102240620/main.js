 "use strict";
// form  info checking here



function validate(){
    var errMsg = ""; 
    var result = true; 
    var postcode = document.getElementById("postcode").value;
    var state = document.getElementById("state").options[document.getElementById("state").selectedIndex].text;

 var regex;
 //VIC = 3 OR 8, NSW = 1 OR 2 ,QLD = 4 OR 9 ,NT = 0 ,WA = 6 ,SA=5 ,TAS=7 ,ACT= 0.
 switch (state) {
    case "Please Select":
        return false;
    case "VIC":
        regex = new RegExp(/(3|8)\d+/);
        break;
     case "NSW":
        regex = new RegExp(/(1|2)\d+/);
        break;
     case "QLD":
        regex = new RegExp(/(4|9)\d+/);
        break;
     case "NT":
        regex = new RegExp(/0\d+/);
        break;
     case "WA":
        regex = new RegExp(/6\d+/);
        break;
     case "SA":
        regex = new RegExp(/5\d+/);
        break;
     case "TAS":
        regex = new RegExp(/7\d+/);
        break;
     case "ACT":
        regex = new RegExp(/0\d+/);
        break;
 }
 
  
  return result; //if false the information will not be sent to the server
}


window.onload = init;


function checkCardNo() {
    var errMsg = ""; 
    var result = true;
    var ccnum = document.getElementById("ccnum").value;
    var fname = document.getElementById("fname").options[document.getElementById("fname").selectedIndex].text;


    var cardno;
 
switch (fname) {
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
   

}



function init() {
updateCartTotal()

  //var validation = regForm
var regForm = document.getElementById("regform"); // get ref to the HTML element
var validation = document.getElementById("validation");
//getBooking();
//regForm.onsubmit = updateCart
regForm.onsubmit = validate; 
validation.onsubmit = checkCardNo;
//validation.onsubmit = updateCartTotal;
}

window.onload = init;

