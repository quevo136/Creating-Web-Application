
    //var ccnum = document.getElementById("ccnum").value;
    //var fname = document.getElementById("fname").options[document.getElementById("fname").selectedIndex].text;

 /*if (ccnum = /^(?:5[1-5][0-9]{14})$/ && fname == "MasterCard") {
    result = true;
  } else if (ccnum =  /^(?:3[47][0-9]{13})$/ && fname == "AmericanExpress") {
    result = true;
  } else if (ccnum =/^(?:4[0-9]{12}(?:[0-9]{3})?)$/ && state == "Visa") {
    result = true;
  } else {
    errMsg = errMsg + "Not a validate number \n";
    result = false;
  }*/


/*var cardno;
 
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
 roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            cardname: {
                required: true,
            },
            cardnumber: {
                required: true,
            },
            expmonth: {
                required: true,
            },
            expyear: {
                required: true,
            },
            cvv: {
                required: true,
            },
           
        },
        messages: {
            fullname:"Please input full name*",
            email:"Please input email*",
            city:"Please input city*",
            address:"Please input address*",
            state:"Please input state*",
            zip:"Please input address*",
            cardname:"Please input card name*",
            cardnumber:"Please input card number*",
            expmonth:"Please input exp month*",
            expyear:"Please input exp year*",
            cvv:"Please input cvv*",
        },*/





       /*function cardnumber(){
            var cardno = /^(?:3[47][0-9]{13})$/;

            if(inputtxt.value.match(cardno)){
                return true;}
        
            else{ 
                alert("Not a valid Amercican Express credit card number!");
                return false; }

        },


         function cardnumber(inputtxt){
            var cardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
            if(inputtxt.value.match(cardno)) {
                return true;}
            else{
                alert("Not a valid Visa credit card number!");
                return false;}
        }        
         
     
   
        
var ccnum = document.getElementById("ccnum").value;
    //var fname = document.getElementById("fname").options[document.getElementById("fname").selectedIndex].text;

 }
     */


 
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
 if(!postcode.match(regex)){
   errMsg = errMsg + "State and postcode do not match\n";
   result = false;
 }
 //updateCartTotal()
 

  if (errMsg != "") { //only display message box if there is something to show
    alert(errMsg);
  }
  return result; //if false the information will not be sent to the server
}


window.onload = init;
//updateCartTotal()



/*function checkCardNo() {
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

}*/


//updateCartTotal()
//Cart info checking here


/*if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')   
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }
    

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }


    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

function purchaseClicked() {
    //alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[1]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }

    if (total==0){
        result = false;
        errMsg = errMsg + "You have not select any item\n";
    }
    updateCartTotal()

}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
   
}


function quantityChanged(event) {
    var errMsg = ""; 
    var result = true; 
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
        
        
    }
    updateCartTotal()

}


function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    addItemToCart(title, price)
    updateCartTotal()
}

function addItemToCart(title, price) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>

        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)

    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var result = true;
    var errMsg = ""; 
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
    
    if (total == 0){
        result = false;
        errMsg = errMsg + "You have not select any item\n";
    }
    

     if (errMsg != "") { //only display message box if there is something to show
    alert(errMsg);
      }
    return result; //if false the information will not be sent to the server
   
}*/

function init() {


  var regForm = document.getElementById("regform"); // get ref to the HTML element
  //var validation = document.getElementById("validation");


regForm.onsubmit = validate 
//regForm.onsubmit = updateCartTotal

  //validation.onsubmit = checkCardNo
}



window.onload = init;
