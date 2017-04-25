<?php  //Start the Session

session_start();
require('connect.php');

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){

//3.1.1 Assigning posted values to variables.
    $username = $_POST['username'];
    $password = $_POST['password'];

//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connecT));
    $count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
        $_SESSION['username'] = $username;
    }else{
//3.1.3 If the login credentials doesnt match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
    }
}

//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "Hai " . $username . "
";
    echo "This is the Members Area
";
    echo "<a href='logout.php'>Logout</a>";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
    ?>

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
                <li style="float:right"><a href="contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li class="active" style="float:right"><a href="login.php" title=" Log In ">Log In </a></li>
            </ul>
        </nav>
    </div>

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