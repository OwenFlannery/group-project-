<?php
require('connect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
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
            <li style="float:right"><a href="login.php" title=" Log In ">Log In </a></li>
        </ul>
    </nav>
</div>

<div class="container">
    <form method="POST" class="log">

        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

        <h2 class="formHeading">Please Register</h2>

        <div class="formDiv">
            <label for="inputUser"><b>Username</b></label>
            <input class="detailForm" type="text" name="username" placeholder="Username" required>
        </div>

        <div class="formDiv">
            <label for="inputEmail"><b>Email address</b></label>
            <input class="detailForm" type="email" name="email" id="inputEmail" placeholder="Email Address" required autofocus>
        </div>

        <div class="formDiv">
            <label for="inputPassword"><b>Password</b></label>
            <input class="detailForm" type="password" name="password" id="inputPassword" placeholder="Password" required>
        </div>

        <div class="formDiv">
            <button type="submit">Register</button>
            <a class="btn" href="login.php">Login</a>
        </div>

    </form>
</div>

</body>

</html>