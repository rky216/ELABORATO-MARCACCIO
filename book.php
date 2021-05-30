<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="scripts/js/includeHTMLs.js"></script>
        <link rel="stylesheet" type="text/css" href="scripts/css/book.css">
    </head>
    <body>
    	
        <!-- side menu -->
        <div id = "sidemenu" class = "sidemenu"></div>            
        <!-- Top bar -->
        <div id="overlay" class = "DarkMode" style = "visibility: hidden" >
            <div  id="PathHelpDiv"class = "Info">
            	<div id = "iframecontainer" style = "margin: auto;  width: 96%; height: 70%;">
                </div>
            </div>
        </div>
        <div id = "main">
            <div id = "TopBarContainer" class = "TopBarContainer"></div>
        
        <!-- DarkOverlay -->
       	
        
        <!-- Booking -->
        <div class = "bookingcontainer">
        	<h1>Prenota la tua visita</h1>
        </div>
        <hr style = "margin-top: 1%;">
        <div class = "bookingcontainer">
        	<form method="POST" action="scripts/php/BookVisit.php">
            	<div class = "formitem">&#10112;
            		<label for="Calendar">Seleziona il giorno: </label>
                    <input id = "Calendar" type="date" min="2013-12-25">
                </div>
                <hr class = "menuIhr">
                <div class = "formitem">
                	<div class = "formitem_child" >&#10113; 
                    <label for="Path">Seleziona il percorso: </label>
                    <select style="width: 30%" id = "Path" disabled>
                    	<option value="0"></option>
                        <option value="4">Passerella dell'Onestà ➤ Lungomare di Rio Martino</option>
                    </select>
                    </div>
                	<div id = "pathInfo" class = "formitem_child" style = "display: none;width: 40%;">&#8520; <a id = "PathHelp">Info percorso</a></div>
                </div>
                <hr class = "menuIhr">
                <div class = "formitem">&#10114; 
                    <label for="Hour">Seleziona l'orario: </label>
                    <select name = "Hour" id = "Hour" style="width: 20%" disabled>
                    </select>
                </div>
                <hr class = "menuIhr">
                <div class = "formitem">&#10115; 
                    <label for="Quantity">Quantità biglietti: </label>
                    <input name = "Quantity" id = "Quantity" type="number" value = "1" min = "1" disabled>
                </div>
                <hr class = "menuIhr">
                <div class = "formitem" >&#10116;
                	<input id="submitReservation" type="submit" value = "Prenota ora!" disabled>
                    <p id="price" style = "display: inline;text-align: right; right: 0; float: right; margin: 0; font-size: 20"></p>
                </div>
             </form>
        </div> 
        <hr style = "margin-top: 1%">
        <script src="scripts/js/book.js"></script>
        <script src="scripts/js/overlay.js"></script>
        </div>
    </body>
</html>