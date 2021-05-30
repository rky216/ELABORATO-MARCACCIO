<?php
//connessione con il db
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

//ottengo i valori dai campi della form
$name = $_POST['RegName'];
$surname = $_POST['RegSurname'];
$username = $_POST['RegUser'];
$psw1 = $_POST['RegPsw'];

//primo controllo su presenza di un altro utente con username uguale

$query = "  SELECT count(Username) as _count
        FROM  users
        WHERE Username = '$username'";
$result = mysqli_query($conn,$query);
$tuple = mysqli_fetch_array($result);

if($tuple['_count'] > 0)
{
    //errore utente gia` esistente
    echo "Utente gia' esistente!";
    exit();
}

//controllo password < 8 caratteri
if(strlen($psw1) < 8)
{
    //errore password troppo corta
    echo "Password troppo corta, immetine una di almeno 8 caratteri";
    exit();
}

//condizioni accettabili
//inserimento dati nel db 
$psw1 = md5($psw1);
$query = "INSERT INTO users (Username, Password, Nome, Cognome)
          values ('$username', '$psw1', '$name', '$surname')";

$result = mysqli_query($conn,$query);

if($result == null)
{
    //unexpected error
    header("location: ../../register.html");
    echo "<script type='text/javascript'>alert('Errore inaspettato, riprova.');</script>";
    exit();
}

header("location: ../../login.html");

?>