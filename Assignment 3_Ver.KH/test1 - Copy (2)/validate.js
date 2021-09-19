/**
* Author: Vu Thien Tri Phan
* Target: register.html
* Purpose: Checking data the users entered into a form
* Last modified: 13/04/2021
*/

"use strict";
function validate() {
    var errMsg ="";
    var result = true;
    var firstName = document.getElementById("firstname").value;
    if (!firstName.match(/^[a-zA-Z]+$/)) {
        errMsg = errMsg + "Your first name must only contain alpha characters\n";
        result = false;
    }
    var lastName = document.getElementById("lastname").value;
    if (!lastName.match(/^[a-zA-z-]+$/)) {
        errMsg = errMsg + "Your last name must only contain alpha characters or a hyphen\n";
        result = false;
    }
    var age = document.getElementById("age").value;
    if (isNaN(age)) {
        errMsg = errMsg + "Your age must be a number\n";
        result = false;    
    }
    else if( age < 18) {
        errMsg = errMsg + "Your age must be 18 or older\n";
        result = false;
    }
    else if( age > 10000) {
        errMsg = errMsg + "Your age must be less than 10,000\n";
        result = false;
    }
    else {
        var tempMsg = checkSpeciesAge(age);
        if (tempMsg !="") {
            errMsg += tempMsg;
            result = false;
        }
    }
    var partySize = document.getElementById("partySize").value;
    if (isNaN(partySize)) {
        errMsg = errMsg + "The number of travellers must be an integer\n";
        result = false; 
    }
    else if ((partySize < 1) ||(partySize > 100)) {
        errMsg = errMsg + "The number of travellers must be between 1 and 100";
        result = false;
    }

    if(document.getElementById("food").value =="none") {
        errMsg = errMsg + "You must select a food preferences.\n";
        result = false;
    }

    var is1day = document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if (!(is1day || is4day || is10day)) {
        errMsg += "Please select at least one trip.\n"
        result = false;
    }
    var isHuman = document.getElementById("human").checked;
    var isDwarf = document.getElementById("dwarf").checked;
    var isElf = document.getElementById("elf").checked;
    var isHobbit= document.getElementById("hobbit").checked;
    if (!(isHuman || isDwarf || isElf || isHobbit )) {
        errMsg += "Please select at least 1 species.\n";
        result = false;
    }

    var beard = document.getElementById("beard").value;
    var message = checkBeardLength(age,beard);
    if (message != "") {
        errMsg += message;
        result = false;
    }

    if (errMsg !="") {
        alert(errMsg);
    }
    // Task 2
    var species = "";
    if (isHuman) species = "Human";
    if (isDwarf) species = "Dwarf";
    if (isHobbit) species = "Hobbit";
    if (isElf) species = "Elf";
    if (result) {
        storeBooking(firstName, lastName, age, species, is1day, is4day, is10day);
    }
    return result;
}

function getSpecies(){
    var speciesName = "Unknown";
    var speciesArray = document.getElementById("species").getElementsByTagName("input");
    for (var i=0; i<speciesArray.length; i++) {
        if (speciesArray[i].checked) {
            speciesName = speciesArray[i].value;
        }
    }
    return speciesName;
}

function checkSpeciesAge(age) {
    var errMsg = "";
    var species = getSpecies();
    switch(species) {
        case "Human": 
            if (age>120) {
                errMsg = "You can not be a human and over 120.\n";
            }
            break;
        case "Dwarf":
        case "Hobbit":
            if (age > 150) {
                errMsg = "You can not be a " +species+ " and over 150.\n";
            }
            break;
        case "Elf":
            break;
        default:
            errMsg = "We don't allow your kind of our tours.\n";
    }
    return errMsg;
}

function checkBeardLength(age,beard) {
    var errMsg = "";
    var species = getSpecies();
    switch(species) {
        case "Human":
            break;
        case "Dwarf":
            if (age > 30) {
                if (beard <= 12) {
                    errMsg = "Dwarfs over 30 years old always have a beard longer than 12 inches.\n";
                }
            }
            break;
        case "Hobbit":
        case "Elf": 
            if (beard != 0) {
                errMsg = species+ " never have beards.\n";
            }
            break;
        default: 
            errMsg = "We don't allow your kind of our tours.\n";
    }
    return errMsg;
}

function init() {
    var regForm = document.getElementById("regform");
    regForm.onsubmit = validate;
    prefill_form();
}

window.onload = init;

function storeBooking(cartItem, cartPrice, cartQuantity) {
    var trip ="";
    /*if(is1day) trip = "1day";
    if (!is1day && is4day) trip = "4day";
    if(is1day && is4day) trip += ", 4day";
    if((is1day &&is10day) || (is4day && is10day)) trip += ", 10day";
    if (!is1day && !is4day && is10day) trip = "10day";
    sessionStorage.trip = trip;
    sessionStorage.firstname = firstName; //key = value
    sessionStorage.lastname = lastName;
    sessionStorage.age = age;
    sessionStorage.species = species;
    var food = document.getElementById("food").value;
    sessionStorage.food = food;
    var beard = document.getElementById("beard").value;
    sessionStorage.beard = beard;
    var partySize = document.getElementById("partySize").value;
    sessionStorage.partySize = partySize;*/


    sessionStorage.cartItemName = cartItemName;
    sessionStorage.priceElement = cartPrice;
    sessionStorage.cartQuantity = cartQuantity;




}



function prefill_form() {
    if (sessionStorage.firstname != undefined) {
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("food").value = sessionStorage.food;
        document.getElementById("partySize").value = sessionStorage.partySize;
        document.getElementById("age").value = sessionStorage.age;
        switch(sessionStorage.species) {
            case "Human":
                document.getElementById("human").checked = true;
                break;
            case "Dwarf":
                document.getElementById("dwarf").checked = true;
                break;
            case "Hobbit":
                document.getElementById("hobbit").checked = true;
                break;
            case "Elf":
                document.getElementById("elf").checked = true;
                break;
        }
        if (sessionStorage.trip.search("1day") != -1) document.getElementById("1day").checked = true;
        if (sessionStorage.trip.search("4day") != -1) document.getElementById("4day").checked = true;       
        if (sessionStorage.trip.search("10day") != -1) document.getElementById("10day").checked = true; 
        
    }
}