var today = new Date().toISOString().split('T')[0];
var Calendar = document.getElementById("Calendar");
var PathSelect = document.getElementById("Path");
var HourSelect = document.getElementById("Hour");
var Quantity = document.getElementById("Quantity");
var infoDiv = document.getElementById("pathInfo");
var button = document.getElementById("submitReservation");
var priceP = document.getElementById("price");

Calendar.setAttribute('min', today);
console.log(today);
//Eventi
Calendar.addEventListener("change", showForms);
PathSelect.addEventListener("change", showInfos);
HourSelect.addEventListener("change", showQuantitySubmit);
Quantity.addEventListener("change", LoadNewPrice);

function showForms()
{
	PathSelect.disabled = false;
    
	//valuta se passare direttamente la query o parzialmente
    console.log(Calendar.value);
    var query = "SELECT p.inizio as I, p.fine as F, p.IdPerPK as ID FROM visite_guidate as v, percorsi as p WHERE v.IdPerFk = p.IdPerPK and v.data = '"+Calendar.value+"' group by p.IdPerPk";
    var data = {query:query, option:'true'};
    $("#Path").load("scripts/php/addOption.php", data);
    $("#Hour").load("scripts/php/addOption.php", {option:'clear'});
}

function showInfos()
{
	if(PathSelect.value > 0)
    {
    	Quantity.disabled = false;
		infoDiv.style.display = "initial";
        HourSelect.disabled = false;
        var query = "SELECT IdVisPk, ora_inizio FROM visite_guidate WHERE IdPerFk = "+PathSelect.value+" and data = '"+Calendar.value+"' group by ora_inizio";
  		var data = {query:query, option:'false'};
    	$("#Hour").load("scripts/php/addOption.php", data);
    }else{
    	infoDiv.style.display = "none";
        HourSelect.disabled = true;
   	 	Quantity.disabled = true;
     	button.disabled = true;
    } 
    priceP.style.display = "none";
}

function showQuantitySubmit()
{
	if(HourSelect.value>0){
    	Quantity.value = 1;
        priceP.style.display = "inline";
        $("#price").load("scripts/php/GetPrice.php", {id:HourSelect.value, qty:Quantity.value});
     	button.disabled = false;
    }else{
	    button.disabled = true;    
    	priceP.style.display = "none";
    } 
}

function LoadNewPrice()
{
	if(HourSelect.value>0)
    {
    	priceP.style.display = "inline";
        $("#price").load("scripts/php/GetPrice.php", {id:HourSelect.value, qty:Quantity.value});
    }
}