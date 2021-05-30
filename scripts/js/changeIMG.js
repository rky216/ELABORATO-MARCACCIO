var overlay = document.getElementById("overlay");
var button = document.getElementById("changeIMG");
var close = document.getElementById("close");

button.addEventListener("click", SwitchOv);
close.addEventListener("click", SwitchOv);

function SwitchOv(){
	if(overlay.style.visibility == "visible"){
        overlay.style.visibility = "hidden";
	}else{
    	overlay.style.visibility = "visible";
    	
    }
}