var sw;
var swDiv;
var change = true;
var text1 = "&#128472; <u>Attivita` guide del parco</u>";
var text2 = "&#128472; <u>Percorsi piu' frequentemente visitati</u>";

window.onload = function(){
	sw = document.getElementById('switch');
    sw.addEventListener('click', chart);
    chart();
}

function chart()
{
	if(change == true){
    	var data = 	{query:"SELECT count(p.inizio) as data, p.inizio as label FROM percorsi as p, visite_guidate as v WHERE p.IdPerPK = v.IdPerFk group by (p.inizio)"}; 
    	var text = {text:text1};
        var textR = {text:text2.substring(13, text2.length-4)};
    }else{
        var data = 	{query:"SELECT count(g.IdGuiPk) as data, concat(g.nome, ' ',g.cognome) as label FROM guide_turistiche as g, prenotazioni as r, visite_guidate as v WHERE r.IdVisFk = v.IdVisPk and g.IdGuiPK = v.IdGuiFk and v.data< '"+new Date().toISOString().slice(0, 10)+"' group by (g.IdGuiPk)"}; 
    	var text = {text:text2};
        var textR = {text:text1.substring(13, text2.length-4)};
    }
    change = !change;
    $("#chartContainer").load("../scripts/php/loadChart.php", data);
    $("#switch").load("../scripts/php/changeText.php", text);
    $("#title").load("../scripts/php/changeText.php", textR);
    //sw = document.getElementById('switch');
    //sw.addEventListener('click', chart);
}