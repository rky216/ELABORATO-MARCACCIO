<?php
if (isset($_FILES['myfile'])) {
    if (filesize($_FILES['myfile']['tmp_name'])) {
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
        $query = "UPDATE users SET Foto = 'imgs/usrs/{$_FILES['myfile']['name']}' WHERE IdUsePK = '{$_SESSION['IdUsr']}'";
        $result = mysqli_query($conn,$query);
        
        move_uploaded_file($_FILES['myfile']['tmp_name'], __DIR__.'/../../imgs/usrs/'.$_FILES["myfile"]['name']);
        $_SESSION['Foto'] = "imgs/usrs/".$_FILES["myfile"]['name'];
        header("location: ../../user.php");
    } else {
        header("location: ../../user.php");
    	exit();
    }
}
?>