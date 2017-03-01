<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "db");
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/page_layout.css">
    <link rel="stylesheet" type="text/css" href="css/slideshow.css">

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
</head>
<body>
<header>
    <!***************************************search bar and nav bar ******************************>
    <form method="post" action="search.php?go" id="search_form">
        <input type="text" name="search_bar" placeholder="search book titles">
        <input type="submit" name="submit" value="search">
    </form>
    <nav>
        <ul class="nav_ul">
            <li class="nav_li"><a href="index.php" data-toggle="dropdown" title="Home">Home</a></li>

            <li class="nav_li"><a href="rec.php" data-toggle="dropdown" title="Recreational Books">Recreational Books</a></li>
            <li class="nav_li"><a href="trade.php" data-toggle="dropdown" title="Tradable Books">Tradable Books</a></li>
            <li class="nav_li"><a href="login.php" data-toggle="dropdown" title="login/new user">login/new user</a></li>
            <li class="nav_li"><a href="contact_us.php" data-toggle="dropdown" title="Contact Us">Contact Us</a></li>
        </ul>
    </nav>
</header>
    <!--***********************************SLIDE SHOW of BOOKS*********************-->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="images/lotr_fellowship.jpg" style="width:50%" height="50%">
            <div class="text">lotr fellowship of the ring</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="images/lotr_twin.jpg" style="width:50%" height="50%">
            <div class="text">lotr the twin towers</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="images/lotr_return.jpg" style="width:50%" height="50%">
            <div class="text">lotr the return of the king</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <br>
</body>
<footer>

</footer>
</html>