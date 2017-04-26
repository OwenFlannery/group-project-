<?php
require('connect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['name']) && isset($_POST['author'])&& isset($_POST['price'])&& isset($_POST['fileToUpload'])){

    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = $_POST['fileToUpload'];

    $query = "INSERT INTO `BOOKS` ( NAME,AUTHOR,BPRICE,IMAGE)
VALUES ('$name', '$author','$price','$image')";
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
<head>
    <link rel="stylesheet" href="/./css/form.css" />
    <link rel="stylesheet" href="/./css/nav.css" />
    <link rel="stylesheet" href="/./css/payment.css" />
    <link rel="stylesheet" href="/./css/trade.css" />
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
                <li class="active" style="float:right"><a href="/./src/submitBook.php" title=" Submit ">Submit Book</a></li>
                <li><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li style="float:right"><a href="/./src/login.php" title=" Login ">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<form action="upload.php" method="post" enctype="multipart/form-data">

    <div class="formDiv">
    <label for="inputImage"><b>Select image to upload:</b></label>
    <input type="file" name="fileToUpload" id="fileToUpload" >
    </div>

    <div class="formDiv">
    <label for="inputUser"><b>Name</b></label>
    <input type="text" name="name" placeholder="Name" >
    </div>

    <div class="formDiv">
    <label for="inputAuthor"><b>Author</b></label>
    <input type="text" name="author" placeholder="Author">
    </div>

    <div class="formDiv">
    <label for="inputPrice"><b>Price</b></label>
    <input type="text" name="price" placeholder="Price" >
    </div>


    <div class="formDiv">
    <label for="inputDescription"><b>Description</b></label>
    <input type="text" name="description" style="font-size:18pt;height:200px;width:400px;">
    <br>
    </div>

    <div class="formDiv">
    <input type="submit" value="Upload Book" name="submit">
    </div>
</form>

</body>
</html>