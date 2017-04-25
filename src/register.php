<?php
require('connect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO userdb (UNAME,PASS,EMAIL)VALUES ('$username','$password','$email');";
    $result = mysqli_query($connect, $query);
    if($result){
        $smsg = "User Created Successfully.";
    }else{
        $fmsg ="User Registration Failed";
    }
}
?>
<html>

<head>
    <title>User Registeration Using PHP & MySQL</title>
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
        <form method="post" action="/src/search.php?go" id="search_form">
            <input type="text" name="search_bar" placeholder="search book titles">
            <input type="submit" name="submit" value="search">
        </form>

        <nav>
            <ul class="nav_ul">
                <li class="nav_li"><a href="/./public/index.php" title=" Home ">Home</a></li>
                <li class="nav_li"><a class="current_page"  href="/./src/trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li class="nav_li"><a href="/./src/new.php" title=" Contact Us ">New Books</a></li>
                <li class="nav_li"><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li class="nav_li"><a href="/./src/login.php" title=" Login ">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <form class="form-signin" method="POST">

        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">@</span>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
    </form>
</div>

</body>

</html>