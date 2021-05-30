
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="scripts/css/main.css">
        <link rel="stylesheet" type="text/css" href="scripts/css/sidemenu.css">
        <script src = "scripts/js/SideMenu.js"></script>
    </head>
    <body>
    	
        <nav>
            <div class = "center">
                <div style = "float: left; text-align: left;display: inline" class = "menu_item"><img id = "changeImage" onclick="ChangeState()" class = "img_topBar"src="imgs/sys/menu.png"></div>
                <div style = "float: right; text-align: right;display: inline" class = "menu_item">
                    <?php
                    session_start();
                    $var = array_key_exists('Login',$_SESSION);
                    if(array_key_exists('Login',$_SESSION)){
                        echo '<div class = "overlayContainer" style = "margin-right: 9%; height: auto;"><p style = "margin: 0;font-weight: normal;" >Benvenuto/a '.$_SESSION['Username'].'! <a href = "scripts/php/logout.php">Logout</a></p></div><a href="user.php"><img class = "img_topBar"src="imgs/sys/user.png"></a>';
                    }else{
                        echo '<div class = "overlayContainer"><a href="login.html">Login '.$var.'</a> - <a href="register.html">Registrati</a></div>';
                    }
                    console.log(array_key_exists('Login',$_SESSION));
                    ?>
                </div>
                <div style = "height: 190%"class = "center"><div style = "margin: auto;" class = "menu_item"><img style = "top: initial; margin-top: 5px; width:5%; height: 90%;  min-width: initial;position: relative " href = "index.php" class = "img_topBar"src="imgs/sys/logo.png"><a href="index.html"> Parco Nazionale del Circeo</a></div></div>
            </div>    
        </nav>
    </body>
</html>
