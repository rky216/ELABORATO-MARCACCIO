<?php
$db_host = "127.0.0.1";
$db_login = "";
$db_pass = "";
$database = "my_marcaccioriccardo";

$conn = mysqli_connect("$db_host","$db_login","$db_pass");
if(!$conn)
{
    echo "<p>Errore di connessione con il DB</p>";
    exit();
}

if(!mysqli_select_db($conn,$database))
{
    echo "<p>Errore di selezione DB</p>";
    exit();
}

$dat = $_POST['id'];
$query = "SELECT Embed
          FROM percorsi
          WHERE IdPerPK = '$dat'";

$result = mysqli_query($conn,$query);
$tuple = mysqli_fetch_array($result);


echo $tuple['Embed'];
if(array_key_exists("stats", $_POST))
{
	$query = "SELECT Distanza, Dislivello
          FROM percorsi
          WHERE IdPerPK = '$dat'";
   	$result = mysqli_query($conn,$query);
	$tuple = mysqli_fetch_array($result);
    echo "<table><tr><td>Distanza: {$tuple['Distanza']}km</td><td>Dislivello: {$tuple['Dislivello']}m</td></tr></table> ";
}

?>