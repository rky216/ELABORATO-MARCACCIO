<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="scripts/js/includeHTMLs.js"></script>
        <link rel="stylesheet" type="text/css" href="scripts/css/main.css">
        <link rel="stylesheet" type="text/css" href="scripts/css/maps.css">
    </head>
    <body>
        <!-- side menu -->
        <div id = "sidemenu" class = "sidemenu"></div>            
        <!-- Top bar -->
        <div id = "main">
            <div id = "TopBarContainer" class = "TopBarContainer"></div>
        	
            <div class = "selectcontainer"><h1>Esplora i percorsi</h1></div>
            <hr style = "margin-top: 1%;">
        	<div id = "framecontainer" class = "framecontainer">
            	<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d7632.863938253488!2d13.040753655530468!3d41.24311752196341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e2!4m5!1s0x13251c6633bd2269%3A0xaedb145996124413!2sPicco%20di%20Circe!3m2!1d41.237924899999996!2d13.0462355!4m5!1s0x13251d36d9eb97db%3A0xae71be510655ab51!2sMonte%20Circeo%20cima%202a!3m2!1d41.241238599999996!2d13.039845099999999!4m5!1s0x13251c8808daaaab%3A0x49009188d2e0d184!2sTorre%20Paola!3m2!1d41.2462385!2d13.034942599999999!5e1!3m2!1sen!2sit!4v1621254378697!5m2!1sen!2sit" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <hr style = "margin-bottom: 1%;">
            <div class = "selectcontainer">
            	<p>Seleziona il percorso:</p>
                <select id = "Percorso">
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

                    $query = "SELECT Inizio, Fine, IdPerPK
                            FROM percorsi";

                    $result = mysqli_query($conn,$query);
                    while($tuple = mysqli_fetch_array($result))
                    {
                    	$a = $tuple['IdPerPK'];
                        echo "<option value = '$a'>".$tuple['Inizio']." &#10148; ".$tuple['Fine']."</option>"; 
                	}
                ?>
                </select>
                <script src="scripts/js/selectPath.js"></script>
            </div>
            
        </div>     
		
    </body>
</html>
