var x = document.getElementById("close");
var overlay = document.getElementById("overlay");
var path = document.getElementById("PathHelp");

overlay.addEventListener("click", SwitchOv); 
path.addEventListener("click", LoadPath);

function SwitchOv(){
	if(overlay.style.visibility == "visible"){
        overlay.style.visibility = "hidden";
	}else{
    	overlay.style.visibility = "visible";
    	
    }
}

function LoadPath(){
	var id = document.getElementById("Path").value;
    console.log(id);
	var data = {id:id, stats:1};
    SwitchOv();
    $('#iframecontainer').load('scripts/php/selectpath.php', data);
}
