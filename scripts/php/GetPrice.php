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

$id = $_POST['id'];
$qty = $_POST['qty'];
$query = "SELECT prezzo_persona
		  FROM visite_guidate
          WHERE IdVisPk = $id";
          
$result = mysqli_query($conn,$query);
$tuple = mysqli_fetch_array($result);

echo "<b>Totale:</b> ".($tuple['prezzo_persona']*$qty)."€";

?>