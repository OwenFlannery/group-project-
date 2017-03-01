<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "db");
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "PRODUCTID");
        if(!in_array($_GET["PRODUCTID"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' =>  $_GET["PRODUCTID"],
                'item_title' =>  $_POST["hidden_title"],
                'item_price'  => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
           // echo '<script>alert("Item Already Added")</script>';
           // echo '<script>window.location="trade.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'  => $_GET["PRODUCTID"],
            'item_title' => $_POST["hidden_title"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
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
                //echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="trade.php"</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8">

    <link rel="stylesheet" type="text/css" href="/./css/page_layout.css">

    <title>used books</title>
</head>
<body>
<header>
    <!***************************************search bar and nav bar ******************************>
    <div class="search_nav">
        <form method="post" action="search.php?go" id="search_form">
            <input type="text" name="search_bar" placeholder="search book titles">
            <input type="submit" name="submit" value="search">
        </form>

        <nav>
            <ul class="nav_ul">
                <li class="nav_li"><a href="/./public/index1.php" title=" Home ">Home</a></li>
                <li class="nav_li"><a href="trade.php" title=" Tradable Books ">Tradable Books</a></li>
                <li class="nav_li"><a class="current_page" href="new.php" title=" NEW Books ">New Books</a></li>
                <li class="nav_li"><a href="contact_us.php" title=" Contact Us ">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="mySidebar">
    awfa
</div>


<div class="product">
    <!--***************************************products go here *******************************-->

    <?php
    $query = "SELECT *FROM BOOKS WHERE CONDIT = \"NEW\"ORDER BY PRODUCTID ASC;";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-4">
                <form method="post" action="trade.php?action=add&id=<?php echo $row["PRODUCTID"]; ?>">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                        <img src="<?php echo $row["IMAGE"]; ?>" class="img-responsive" /><br />
                        <h4 class="text-info"><?php echo $row["NAME"]; ?></h4>
                        <h4 class="text-danger">$ <?php echo $row["BPRICE"]; ?></h4>
                        <input type="text" name="quantity" class="form-control" value="1" />
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

</div>
<div class="cart">
    <table class="table table-bordered">
        <tr>
            <th width="40%">Item Title</th>
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
                    <td><?php echo $values["item_title"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td>$ <?php echo $values["item_price"]; ?></td>
                    <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="trade.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>



<footer>

</footer>

</body>
</html>