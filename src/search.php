<?php
/**
 * Created by PhpStorm.
 * User: owen
 * Date: 06/12/2016
 * Time: 10:20
 */
if(isset($_POST['submit']))
{
    if (isset($_GET['go']))
    {
        if(preg_match("^/[A-Za-z]+/^",$_POST['NAME']))
        {
            $title=$_POST['NAME'];
            $connect = mysqli_connect("localhost", "root", "root", "db")or die ('unable to connect to database: '.mysqli_error());

            $my_db=my_sqli_select_db("db");

            $sql="SELECT NAME FROM BOOKS WHERE title LIKE'%".$title."%'";
            $result = mysqli_query($sql);

            while($row=mysqli_fetch_array($result))
            {
                $title  =$row['title'];
            }
            echo "<ul>\n";
            echo "<li>" ."<a href=\"search.php?title=$title\">".$title."</a>\n;
            echo \"</ul>";
        }
    }
    else
    {
        echo "<p> Please enter A search Query</p>";
    }
}
?>