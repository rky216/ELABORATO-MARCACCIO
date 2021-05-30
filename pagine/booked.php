<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="scripts/js/includeHTMLs.js"></script>
        <link rel="stylesheet" type="text/css" href="scripts/css/booked.css">
    </head>
    <body>
        <!-- side menu -->
        <div id = "sidemenu" class = "sidemenu"></div>            
        <!-- Top bar -->
        <div id = "main">
            <div id = "TopBarContainer" class = "TopBarContainer"></div>
        
        	<h1 style = "text-align: center;">Le tue prenotazioni</h1>
            <hr style = "margin-top: 1%;">
        	<div class="TableContainer">
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
              $query = "SELECT p.quantita_prenotazioni, v.data, v.ora_inizio, e.inizio, e.fine, p.IdPrePk
              			FROM percorsi as e, prenotazioni as p, visite_guidate as v
                        WHERE e.IdPerPK = v.IdPerFk and p.IdVisFk = v.IdVisPk and v.data >= '".date("Y-m-d")."' and p.IdUseFk = '{$_SESSION['IdUsr']}' order by v.data, v.ora_inizio";
              $result = mysqli_query($conn,$query);
              if(mysqli_num_rows($result)<1)
              {
              	echo "<p>&#128546; Ancora nessuna prenotazione!</p>";
                exit();
              }
              echo "<table><tr><th>Data</th><th>Ora</th><th>Inizio</th><th>Fine</th><th>Quantità</th><th>Elimina</tr>";
			  while($tuple = mysqli_fetch_array($result))
              {
              //inserisci una form nella colonna dell'eliminazione per ogni riga con un input hidden e come value l'id della prenotazione
              	echo "<tr>
                		<td>{$tuple['data']}</td>
                        <td>".substr($tuple['ora_inizio'], 0, strlen($tuple['ora_inizio'])-3)."</td>
                        <td>{$tuple['inizio']}</td><td>{$tuple['fine']}</td>
                        <td>{$tuple['quantita_prenotazioni']}</td>
                        <td>
                        	<form method = 'POST' action = 'scripts/php/RMbook.php'>
                            	<input type='hidden' name='ID' value='{$tuple['IdPrePk']}'>
                                <input type='submit' value = '&#10008;'>
							</form>
						</td>";
              }
              echo "</table>";
              ?>
        </div>
        <hr>
        </div>    
    </body>
</html>

