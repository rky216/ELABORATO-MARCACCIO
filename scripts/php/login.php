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

session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$_SESSION['Username'] = $user;
$_SESSION['Password'] = $pass;
$_SESSION['Login'] = true;

$query = "  SELECT Username, Password, IdUsePk, Nome, Cognome, Foto, IdUtiFk
        FROM  users
        WHERE Username = '$user'";
$result = mysqli_query($conn,$query);
$tuple = mysqli_fetch_array($result);

if($tuple['Username'] )
{
    if($tuple['Password'] == md5($pass))
    {
    	$_SESSION['Foto'] = $tuple['Foto'];
    	$_SESSION['Nome'] = $tuple['Nome'];
        $_SESSION['Cognome'] = $tuple['Cognome'];
        $_SESSION['IdUsr'] = $tuple['IdUsePk'];
        $_SESSION['role'] = $tuple['IdUtiFk'];
        if($tuple['IdUtiFk'] == '2')
        	header("location: ../../guardiaparco/index.html");
        else
	        header("location: ../../index.html");
        exit();
    }
}
    header("location: ../../login.html");
    session_destroy();
    exit();
?>