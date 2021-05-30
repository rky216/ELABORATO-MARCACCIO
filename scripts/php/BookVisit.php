<?php
session_start();
if(!array_key_exists('Login',$_SESSION))
{
	header("location: ../../login.html");
    exit();
}
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

$quantita = $_POST['Quantity'];
$IdVisita = $_POST['Hour'];

$query = "INSERT INTO prenotazioni (quantita_prenotazioni, IdUseFk, IdVisFk) VALUES ('$quantita', '{$_SESSION['IdUsr']}', '$IdVisita')";
$result = mysqli_query($conn,$query);
header('Location: //haruno.altervista.org/Projects/Elaborato/res/scripts/PHP/registraTimbro.php?usrName='.$_SESSION['Username'].'&parId=1');
//header("location: ../../booked.php");
?>