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
//$values = array();
$query = $_POST['query'];
$option = $_POST['option'];
if($option == 'clear'){
	$option = 'false';
    exit();
}
echo ($option == 'true') ? "<option value = '0'>Seleziona percorso</option>" : "<option value = '0'>Seleziona orario</option>";

$result = mysqli_query($conn,$query);
while($tuple = mysqli_fetch_array($result))
{
	if($option == 'true'){
    	echo "<option value = '".$tuple['ID']."'>".$tuple['I']." &#10148; ".$tuple['F']."</option>";
    }else{
    	echo "<option value = '".$tuple['IdVisPk']."'>".$tuple['ora_inizio']."</option>";
    }
}
/*
foreach($values as $value)
{
	explode("%", $value);
    echo "<option value = '$value[0]'>$value[1] &#10148; $value[2]</option>";	
}*/
?>