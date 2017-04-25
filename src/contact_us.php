


<html>
    <head>
        <title>Login</title>

        <!-- Latest compiled and minified CSS --
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >-->

        <!-- Optional theme --
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >-->

        <!--<link rel="stylesheet" href="styles.css" >-->
        <link rel="stylesheet" href="/css/nav.css">
        <link rel="stylesheet" href="/css/form.css">

        <!-- Latest compiled and minified JavaScript --
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    </head>
    <body>
    <!***************************************search bar and nav bar ******************************>
    <div>
        <form method="post" action="/src/search.php?go" id="search_form">
            <input type="text" name="search_bar" placeholder="search book titles">
            <input type="submit" name="submit" value="search">
        </form>

        <nav>
            <ul class="nav_ul">
                <li><a href="/public/index.php" title=" Home ">Home</a></li>
                <li><a class="current_page"  href="trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li><a href="new.php" title=" New Books ">New Books</a></li>
                <li class="active" style="float:right"><a href="contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li style="float:right"><a href="login.php" title=" Log In ">Log In </a></li>
            </ul>
        </nav>
    </div>

</body>

</html>