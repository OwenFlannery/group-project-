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

        <link rel="stylesheet" href="/./css/form.css" />
        <link rel="stylesheet" href="/./css/nav.css" />
        <link rel="stylesheet" href="/./css/payment.css" />
        <link rel="stylesheet" href="/./css/trade.css" />
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
                    <li><a href="/./public/index.php" title=" Home ">Home</a></li>
                    <li><a class="current_page"  href="/./src/trade.php" title=" Tradable Books ">Tradable Books</a></li>
                    <li><a href="/./src/new.php" title=" Contact Us ">New Books</a></li>
                    <li style="float:right"><a href="/./src/submitBook.php" title=" Submit ">Submit Book</a></li>
                    <li ><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                    <li class="active" style="float:right"><a href="/./src/login.php" title=" Login ">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <form class="log" method="POST">
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
            <h2 class="formHeading">Please Login</h2>

            <div class="formDiv">
                <label for="inputUser"><b>Username</b></label>
                <input class="detailForm" type="text" name="username" placeholder="Enter Username" required>
            </div>

            <div class="formDiv">
                <label for="inputPassword"><b>Password</b></label>
                <input class="detailForm" type="password" name="password" id="inputPassword" placeholder="Enter Password" required>
            </div>

            <div class="formDiv">
                <button type="submit">Login</button>
                <a href="register.php" class="btn">Register</a>
            </div>
        </form>
    </div>

    </body>

    </html>
<?php } ?>