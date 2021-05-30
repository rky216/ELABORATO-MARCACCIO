<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="scripts/js/includeHTMLs.js"></script>
        <link rel="stylesheet" type="text/css" href="scripts/css/slideshow.css">
        
    </head>
    <body>
        <!-- side menu -->
        <div id = "sidemenu" class = "sidemenu"></div>            
        <!-- Top bar -->
        <div id = "main" style="text-align:center">
            <div id = "TopBarContainer" class = "TopBarContainer"></div>
           
		    <h1>Galleria</h1>
            <hr style = "margin-top: 0; margin-bottom: 0">
            <div class = "slideshow-container">
                <div class="mySlides fade">
                    <img class = "slideshowImgs"src="imgs/common/mountain.jpeg">
                    <div class="numbertext">1 / 5</div>
                </div>
                <div class="mySlides fade">
                    <img class = "slideshowImgs" src="imgs/common/porcupine.jpg">
                    <div class="numbertext">2 / 5</div>
                </div>
                <div class="mySlides fade">
                    <img class = "slideshowImgs" src="imgs/common/sunset.jpg">
                    <div class="numbertext">3 / 5</div>
                </div>
                <div class="mySlides fade">
                    <img class = "slideshowImgs" src="imgs/common/tower.jpg">
                    <div class="numbertext">4 / 5</div>
                </div>
                <div class="mySlides fade">    
                    <img class = "slideshowImgs" src="imgs/common/water.jpg">
                    <div class="numbertext">5 / 5</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)" style="left: 0">&#10094;</a>
                <a class="next" onclick="plusSlides(1)" style="right: 0">&#10095;</a>
            </div>

            <!-- Slideshow dots -->
            <div class = "dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>
            <script src = "scripts/js/SlideShow.js"></script>
        </div>  
    </body>
</html>
