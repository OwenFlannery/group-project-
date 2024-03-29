<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "db");
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'=> $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price'=> $_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'=>$_GET["id"],
            'item_title'=>$_POST["hidden_name"],
            'item_price'=>$_POST["hidden_price"],
            'item_quantity'=>$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" href="/./css/nav.css" />
    <link rel="stylesheet" href="/./css/form.css" />
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
                <li class="active"><a href="/./public/index.php" title=" Home ">Home</a></li>
                <li><a class="current_page"  href="/./src/trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li><a href="/./src/new.php" title=" Contact Us ">New Books</a></li>
                <li><a href="/./src/contact_us.php" title=" Contact Us ">Contact Us</a></li>
                <li style="float:right"><a href="/./src/submitBook.php" title=" Submit ">Submit Book</a></li>
                <li style="float:right"><a href="/./src/login.php" title=" Login ">Login</a></li>
            </ul>
        </nav>
    </div>
</header>


<div class="product">
    <center>
        <img src="/./images/ambay.jpg"/>
    </center>

    <br>
    <?php
    $query = "SELECT *FROM BOOKS ORDER BY NAME ASC;";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-4">
                <form method="post" action="index.php?action=add&id=<?php echo $row["PRODUCTID"]; ?>">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                        <img src="<?php echo $row["IMAGE"]; ?>" class="img-responsive" /><br />
                        <h4 class="text-info"><?php echo $row["NAME"]; ?></h4>
                        <h4 class="text-danger">€ <?php echo $row["BPRICE"]; ?></h4>
                        <input type="number" type="text" name="quantity" class="form-control" value="1" />
                        <input type="hidden" name="hidden_name" value="<?php echo $row["NAME"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["BPRICE"]; ?>" />
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
    <div style="clear:both"></div>
    <br />
    <!------------------------------------------SHOPPING CART------------------------------------------->
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>€ <?php echo $values["item_price"]; ?></td>
                        <td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                        <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
                        <a href="/./src/payment.html"><span class="text-danger">Checkout</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">€ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>


</div>
<br />
</body>
<footer>

</footer>
</html>