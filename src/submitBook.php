<?php
require('connect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['name']) && isset($_POST['author'])&& isset($_POST['price'])&& isset($_POST['fileToUpload'])&& isset($_POST['condition'])){
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = $_POST['fileToUpload'];
    $condition = $_POST['condition'];

    $query = "INSERT INTO `BOOKS` ( NAME,AUTHOR,BPRICE,IMAGE,CONDIT) VALUES ('$name', '$author','$price','$image','$condition')";
    $result = mysqli_query($connect, $query);
    if($result){
        $smsg = "User Created Successfully.";
    }else{
        $fmsg ="User Registration Failed";
    }
}
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

<form action="upload.php" method="post" enctype="multipart/form-data">

    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="text" name="name" placeholder="Name" >
    <br>
    <input type="text" name="author" placeholder="Author" >
    <br>
    <input type="text" name="price" placeholder="Price">
    <br>
    <input type="text" name="condition" placeholder="Condition" >
    <br>
    <br>
    <input type="text" name="submit_des" placeholder="Description" style="font-size:18pt;height:200px;width:400px;">
<br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>