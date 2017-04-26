<?php

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/./css/form.css" />
    <link rel="stylesheet" href="/./css/nav.css" />
    <link rel="stylesheet" href="/./css/payment.css" />
    <link rel="stylesheet" href="/./css/trade.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
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
                <li><a href="/./public/index.php" title=" Home ">Home</a></li>
                <li><a class="current_page"  href="/./src/trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li><a href="/./src/new.php" title=" Contact Us ">New Books</a></li>
                <li style="float:right"><a href="/./src/submitBook.php" title=" Submit ">Submit Book</a></li>
                <li class="active"><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li style="float:right"><a href="/./src/login.php" title=" Login ">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<form>
        <div class="formDiv">
        <label>Please send us any feed back you have!</label>
        <br>
        <br>
        <label for="inputUser"><b>Email</b></label>
        <input type="text" name="email" class="con_email" style="width:200px;">
        <br>
        </div>
        <div class="formDiv">
        <label for="inputMessage"><b>Message</b></label>
        <input type="text" name="text" class="con_message"style="font-size:18pt;height:200px;width:400px;">
        <br>
        <button type="submit">Submit</button>
        </div>
</form>


</body>
</html>



