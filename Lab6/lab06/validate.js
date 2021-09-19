"use strict";

function init(){
	var regForm = document.getElementById("regform");// get ref to the HTML element
    regForm.onsubmit = validate;
    regForm.onsubmit = prefill_form; 
}

function validate(){
	var errMsg = "";
	var result = true;

	var firstname = document.getElementById("firstname").value;

	if (!firstname.match(/^[a-zA-Z]+$/)){
		errMsg = errMsg + "Your first name must only contain alpha characters\n";
		result = false;
	}
	var lastname = document.getElementById("lastname").value;

	if (!lastname.match(/^[a-zA-Z]+$/)){
		errMsg = errMsg + "Your last name must only contain alpha characters\n";
		result = false;
	}

	var age = document.getElementById("age").value;

	if (isNaN(age)){
		errMsg = errMsg + "Your age must be a number\n";
		result = false;
	}
	else if ( age< 18){
		errMsg = errMsg + "Your age must be 18 or older\n";
		result = false;
	} 
	else if (age > 10000){
		errMsg = errMsg + "Am i a fool?";
		result = false;
	}

	else{
		var tempMsg = checkSpeciesAge(age);
		if (tempMsg != ""){
			errMsg = errMsg +tempMsg;
			result = false; 
		};
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


	if(document.getElementById("food").value == "none"){
		errMsg = errMsg + "You must select a food preference\n";
		result = false;
	}

    var is1day = document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if (!(is1day || is4day || is10day)){
    	errMsg += "Please select at least one trip \n";
    	result = false;

    }

    var beard = document.getElementById("beard").value;
    var message = checkBeardLength(age,beard);
    if (message != "") {
        errMsg += message;
        result = false;
    }  
	
	var human  = document.getElementById("human").checked;
    var dwarft = document.getElementById("drawft").checked;
    var elf    = document.getElementById("elf").checked;
    var hobbit = document.getElementById("hobbit").checked;


    if (!( document.getElementById("human").checked || document.getElementById("elf").checked || document.getElementById("dwarf").checked || document.getElementById("hobbit").checked)){
    	errMsg += "Please select at least one species \n";
    	result = false;

    }

    if (errMsg != ""){
		alert(errMsg);
		//toreBooking(firstname, lastname, age, species, is1day, is4day, is10day)
	}

//TASK2 
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
    
	var speciesArray = document.getElementById("species").getElementByTagName("input");

	for (var i =0; i<speciesArray.length; i++){
	   	if (speciesArray[i].checked)
	   		speciesName = speciesArray[i].value;
	   	}
	

	return speciesName;    

} 

function checkSpeciesAge(age){
	var errMsg ="";
	var species = getSpecies();
	switch(species){
		case "Human":
            if (age > 120) {
             	errMsg = "You cannot be a Human and over 120.\n";

            }
            break;
        case "Dwarf":
        case "Hobbit":
            if (age >150) {
            	errMsg = "You cannot be a " + species + " and over 150.\n";

            }

            break;
        case "Elf":
            
            break;
        default:
            errMsg = "We dont allow your kind in our tours.\n";


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


function storeBooking(firstname, lastname, age, species, is1day, is4day, is10day){
	var trip = "";
	if(is1day) trip = "1day";
	if(is4day) trip = "4day";
	if(is1day && is4day) trip += ", 4day";
    if((is1day &&is10day) || (is4day && is10day)) trip += ", 10day";
    if (!is1day && !is4day && is10day) trip = "10day";
	sessionStorage.trip = trip;
	sessionStorage.firstname = firstname;
	sessionStorage.lastname = lastname;
	sessionStorage.age = age;
	sessionStorage.species = species;
	var food = document.getElementById("food").value;
	sessionStorage.food;
	var beard = document.getElementById("beard").value;
    sessionStorage.beard = beard;
    var partySize = document.getElementById("partySize").value;
    sessionStorage.partySize = partySize;


}





/**/
function prefill_form(){
	if (sessionStorage.firstname != undefined){
		document.getElementById("firstname").value = sessionStorage.firstname;
		document.getElementById("lastname").value = sessionStorage.lastname;
		document.getElementById("food").value = sessionStorage.food;
		document.getElementById("partySize").value = sessionStorage.partySize;
		document.getElementById("age").value = sessionStorage.age;

		switch(localSorage.species){
			case "Human":
			    document.getElementById("human").checked =true;
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


/*function checkSpeciesBeard(beard){
	var errMsg ="";
	var species = getSpecies();
	switch(species){
		case "Human":
            
            break;
        case "Dwarf":
            if (age > 30 && beard<12){
            	errMsg = "Dwarfs over 30 years old always have a beard longer than 12 inches\n";
            }
        case "Hobbit" && "Elf":
            if (beard > 0) {
            	errMsg = "Elves and Hobbits never have beards.";

            }

            break;
        default:
            errMsg = "We dont allow your kind in our tours.\n";
    }

	if (errMsg != ""){
		alert(errMsg);
	
	}

	return errMsg;
}
window.onload = init;*/