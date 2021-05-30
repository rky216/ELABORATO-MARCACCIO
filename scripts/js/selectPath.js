document.getElementById('Percorso').onchange = function()
{
    var id = $("#Percorso").val();
    var data = {id:id};
    console.log(id);
    $('#framecontainer').load('scripts/php/selectpath.php', data);
}