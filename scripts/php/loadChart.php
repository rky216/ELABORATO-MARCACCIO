<?php

$db_host = "127.0.0.1";
$db_login = "";
$db_pass = "";
$database = "my_marcaccioriccardo";

$conn = mysqli_connect("$db_host","$db_login","$db_pass");
if(!$conn)
{
    echo "<p>Errore di connessione con il DB</p>";
    session_destroy();
    exit();
}

if(!mysqli_select_db($conn,$database))
{
	echo "<p>Errore di selezione DB</p>";
	session_destroy();
    exit();
}
$string = "";
$query = $_POST['query'];
$result = mysqli_query($conn,$query);
while($tuple = mysqli_fetch_array($result))
	$string.= "{ label: '{$tuple['label']}', y: {$tuple['data']}},";
$string = substr($string, -strlen($string), strlen($string)-1);
echo '<script src="../res/canvasjs.min.js"></script><script>
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "dark1", // "light1", "light2", "dark1", "dark2"
        axisX:{
            labelAngle: -60,
            interval: 1,
            labelFontSize: 14
        },axisY:{
            labelFontSize: 14,
            interval: 1
        },
        data: [{
            type: "column",
            dataPoints: ['.$string.']}]
    });

    chart.render();
    </script>
    ';


?>