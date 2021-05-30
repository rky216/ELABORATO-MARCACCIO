<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="scripts/js/includeHTMLs.js"></script>
        <link rel="stylesheet" type="text/css" href="scripts/css/user.css">
    </head>
    <body>
		<?php
        session_start();
        if(!array_key_exists('Login',$_SESSION))
        {
			header("location: ../../login.html");
		    exit();
        }
        ?>
        <div id="overlay" class = "DarkMode" style = "visibility: hidden" >
            <div  id="UploadImage" class = "Info">
              <form action="scripts/php/changeIMG.php" method="POST" enctype='multipart/form-data'>
	            <label for="myfile">Seleziona un'immagine:</label>
                <input type="file" id="myfile" name="myfile" accept="image/*">
                <div class="control">
					<input type="submit" value="Conferma">
                    <button type="button" id="close">Chiudi</button>
    			</div>
        	  </form>
    		</div>
        </div>
        
        <!-- side menu -->
        <div id = "sidemenu" class = "sidemenu"></div>            
        <!-- Top bar -->
        <div id = "main" style="text-align: center">
            <div id = "TopBarContainer" class = "TopBarContainer"></div>
            <h1>Il tuo profilo</h1>
            <hr style="margin-top: 1%">
        	<div class="InfoContainer">
            	<div class="ImageContainer">
                	<?php
                    	echo "<img src = '{$_SESSION['Foto']}'>";
                    ?>
                </div>
                <div class="UserInfo" >
                	<?php
                	echo "<p><b>Nome: </b>{$_SESSION['Nome']}</p>";
                    echo "<p><b>Cognome: </b>{$_SESSION['Cognome']}</p>";
                    echo "<p><b>Username: </b>{$_SESSION['Username']}</p>";
                    echo "<p style='font-size: 13; cursor: pointer' id='changeIMG'><u>Cambia immagine</u></p>";
                    ?>
                </div>
                <hr style = "width: 99%;margin-bottom: 2%">
                <h1>Storico prenotazioni</h1>
                <hr style = "width: 99%;margin-bottom: 2%; margin-top: 2%">
                <div class="BookOld">
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
                    $query = "SELECT p.quantita_prenotazioni, v.data, v.ora_inizio, e.inizio, e.fine, p.IdPrePk
                              FROM percorsi as e, prenotazioni as p, visite_guidate as v
                              WHERE e.IdPerPK = v.IdPerFk and p.IdVisFk = v.IdVisPk and v.data < '".date("Y-m-d")."' and p.IdUseFk = '{$_SESSION['IdUsr']}' order by v.data, v.ora_inizio";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)<1)
                    {
                      echo "<p>&#128546; Nessuna vecchia prenotazione!</p>";
                    }else{
                      echo "<table><tr><th>Data</th><th>Ora</th><th>Inizio</th><th>Fine</th><th>Quantità</th></tr>";
                      while($tuple = mysqli_fetch_array($result))
                      {
                      //inserisci una form nella colonna dell'eliminazione per ogni riga con un input hidden e come value l'id della prenotazione
                        echo "<tr>
                                <td>{$tuple['data']}</td>
                                <td>".substr($tuple['ora_inizio'], 0, strlen($tuple['ora_inizio'])-3)."</td>
                                <td>{$tuple['inizio']}</td><td>{$tuple['fine']}</td>
                                <td>{$tuple['quantita_prenotazioni']}</td>";
                      }
                      echo "</table>";
                    }
                    ?>
                </div>
            </div>
		</div>
        <script src="scripts/js/changeIMG.js"></script>
    </body>
</html>