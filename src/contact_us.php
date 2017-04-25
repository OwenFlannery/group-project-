<?php

?>
<!DOCTYPE html>
<html>
<body>

<header>
    <!***************************************search bar and nav bar ******************************>
    <div class="search_nav">
        <form method="post" action="/./src/search.php?go" id="search_form">
            <input type="text" name="search_bar" placeholder="search book titles">
            <input type="submit" name="submit" value="search">
        </form>
        <nav>
            <ul class="nav_ul">
                <li class="nav_li"><a href="/./public/index.php" title=" Home ">Home</a></li>
                <li class="nav_li"><a class="current_page"  href="/./src/trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li class="nav_li"><a href="/./src/new.php" title=" Contact Us ">New Books</a></li>
                <li class="nav_li"><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li class="nav_li"><a href="/./src/submitBook.php" title=" Submit ">Submit Book</a></li>
                <li class="nav_li"><a href="/./src/login.php" title=" Login ">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

    <label>Please send us any feed back you have!</label>

    <form>
Email:<br>
  <input type="text" name="email" class="con_email" style="width:200px;">
  <br>
Message:<br>
  <input type="text" name="text" class="con_message"style="font-size:18pt;height:200px;width:400px;">
</form>


</body>
</html>



