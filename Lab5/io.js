function promptName() {
    var sName = prompt("Enter your Name.\n This prompt should show up when the \nClick Me button is clicked ", "Your Name");
    alert("Hi there " + sName + ".Alert boxes are a quick way to check the state\n of your variables when you are developing code.");
	
	rewriteParagraph(sName)
	}

function rewriteParagraph(userName){
	var message = document.getElementById("message");
	message.innerHTML = "Hi "+ userName +" if you see this mess. you have success. Congrat "
}
function init(){
	var clickMe = document.getElementById("clickme");
	clickMe.onclick = promptName;

}
window.onload = init;
