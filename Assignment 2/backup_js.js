function validate() {
  var errMsg = ""; /* stores the error message */
  var result = true; /* assumes no errors */

  var other = document.getElementById("other").checked;
  //get varibles from form and check rules here
  // if something is wrong set result = false, and concatenate error message

 
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

  if (errMsg != "") { //only display message box if there is something to show
    alert(errMsg);
  }
  return result; //if false the information will not be sent to the server

}

function init() {

  var regForm = document.getElementById("regform"); // get ref to the HTML element

  regForm.onsubmit = validate; //register the event listener 
}





if (document.readyState == 'loading') {
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
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[1]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()

}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
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
}


























"use strict";

const form = document.getElementById('form');
const firstname = document.getElementById('First_name');
const lastname = document.getElementById('Last_name');
const email = document.getElementById('email');
const phonenum = document.getElementById('email');
const address = document.getElementById('Street_Address');
const postcode = document.getElementById('postcode');


form.addEventListener('submit', e => {
    e.preventDefault();
    
    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const emailValue = email.value.trim();
    const addressValue = address.value.trim();
    const phonenumValue = phonenum.value.trim();
    const postcodeValue = postcode.value.trim();

 
    
const form = document.getElementById('form');
const firstname = document.getElementById('First_name');
const lastname = document.getElementById('Last_name');
const phonenum = document.getElementById('phone_num');
const address = document.getElementById('Street_Address');
const email = document.getElementById('email');
const postcode = document.getElementById('postcode');


form.addEventListener('submit', e => {
    e.preventDefault();
    
    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const emailValue = email.value.trim();
    const addressValue = address.value.trim();
    const phonenumValue = phonenum.value.trim();
    const postcodeValue = postcode.value.trim();
    
    
    if(firstnameValue === '') {
        setErrorFor(firstname, 'First name cannot be blank');
    } else {
        setSuccessFor(firstname);
    }

    if(lastnameValue === '') {
        setErrorFor(lastname, 'Last name cannot be blank');
    } else {
        setSuccessFor(lastname);
    }

    if(addressValue === '') {
        setErrorFor(address, 'Address cannot be blank');
    } else {
        setSuccessFor(address);
    }

    if(phonenumValue === '') {
        setErrorFor(phonenum, 'Last name cannot be blank');
    } else {
        setSuccessFor(phonenum);
    }
    
    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    } else {
        setSuccessFor(email);
    }
    
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'success';
}
    
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}








// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
    social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
    social_panel_container.classList.remove('visible')
});
    
    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    } else {
        setSuccessFor(email);
    }
    
}


function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = ' error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'success';
}
    
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}




// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
    social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
    social_panel_container.classList.remove('visible')
});









/*get variables from form and check rules*/
function validate() {
  var errMsg = ""; /* stores the error message */
  var result = true; /* assumes no errors */

  var other = document.getElementById("other").checked;
  //get varibles from form and check rules here
  // if something is wrong set result = false, and concatenate error message



 var postcode = document.getElementById("postcode").value;
 var state = document.getElementById("state").options[document.getElementById("state").selectedIndex].text;

 var regex = postcode.charAt(0);
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
        regex = new RegExp(/0\d+/) ;
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

  if (other && document.getElementById("otherText").value.trim().length===0) {
    errMsg = errMsg + "You have selected other skills, you must enter one other skill in the text box\n";
    result = false;
  }

  if (errMsg != "") { //only display message box if there is something to show
    alert(errMsg);
  }
  return result; //if false the information will not be sent to the server
}

function init() {

  var regForm = document.getElementById("regform"); // get ref to the HTML element

  regForm.onsubmit = validate; //register the event listener 
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
