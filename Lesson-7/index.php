<?php

session_start();

?>

<html>
<head></head>
    <body>
        <form action="showCartItems.php" method="post">
            <a href="images/1.jpg"><img src="images/1.jpg" alt="someImage" name="img"></a><br>
            <input type="hidden" name="imgPath" value="images/1.jpg">
            <input type="hidden" name="id" value="1">
            <input type="hidden" name="product" value="bag">
            <input type="hidden" name="price" value="1500">
            <button type="submit" name="submit">Add To Cart</button>
        </form>
    </body>
</html>