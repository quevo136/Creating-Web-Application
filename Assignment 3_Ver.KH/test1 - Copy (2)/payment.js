"use strict";
// form  info checking here
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
   if(!fname.match(cardno)){
   errMsg = errMsg + "Not a valid Visa credit card number!\n";
   result = false;
 }

 

  if (errMsg != "") { //only display message box if there is something to show
    alert(errMsg);
  }
  return result;

}


function getBooking(){
  var total = 0;
  if(sessionStorage.priceElement != undefined){    //if sessionStorage for username is not empty
    //confirmation text
    //document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
    //document.getElementById("container content-section").textContent = sessionStorage.cartItems;
    //document.getElementById("cart-item").textContent = sessionStorage.cartItemNames;
    //document.getElementById("cart-price").textContent = sessionStorage.priceElement;
    document.getElementById("cart-quantity-input").textContent = sessionStorage.quantityElement;
    //cost = calcCost(sessionStorage.trip, sessionStorage.partySize);
    total = Math.round(total * 100) / 100
    document.getElementById("cart-total-price").textContent = total;
    //fill hidden fields

    //document.getElementById("container content-section").value = sessionStorage.cartItems;
    //document.getElementById("cart-item cart-header cart-column").value = sessionStorage.cartItemNames;
    //document.getElementById("cart-price cart-header cart-column").value = sessionStorage.priceElement;
    document.getElementById("cart-quantity-input").value = sessionStorage.quantityElement;
    /*
    Write lastname, age, species, age, food, and partySize from seesionStorage to the hidden inputs 
    */
    document.getElementById("cart-total-price").value = total;
  }

}


function init() {

 // get ref to the HTML element
  var validation = document.getElementById("validation");
  //var regForm = document.getElementById("regform");
  validation.onsubmit = checkCardNo;
  //regForm.onsubmit = checkCardNo;
  getBooking();

  var cancel = document.getElementById("cancelButton");
  cancel.onclick = cancelBooking;


  
}

function cancelBooking() {
  window.location = "index.html";
}


window.onload = init;