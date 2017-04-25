<?php  //Start the Session

session_start();
require('connect.php');


if (isset($_POST['username']) and isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `userdb` WHERE UNAME='$username' and PASS='$password'";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));//check db if user exists
    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['username'] = $username;
    }else{
        $fmsg = "Invalid Login Credentials.";
    }
}

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "Hi " . $username . "
";
    echo "This is the Members Area
";
    echo "<a href='logout.php'>Logout</a>";
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
    ?>

    <html>
    <head>
        <title>User Login Using PHP & MySQL</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

        <link rel="stylesheet" href="styles.css" >

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

    <div class="container">
        <form class="form-signin" method="POST">
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
            <h2 class="form-signin-heading">Please Login</h2>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
        </form>
    </div>

    </body>

    </html>
<?php } ?>