<?php
session_start();

$_SESSION['id'][$_POST['id']] = $_POST['id'];
$_SESSION['name'][$_POST['id']] = $_POST['product'];
$_SESSION['price'][$_POST['id']] = $_POST['price'];
$_SESSION['imgPath'][$_POST['id']] = $_POST['imgPath'];


if(isset($_SESSION['id'])) {
    foreach($_SESSION['id'] as $id) {
        echo '<img src="' . $_SESSION['imgPath'][$id] . '" width=50>';?><br>
        Articul: <?php echo $_SESSION['id'][$id];?> <br>
        <?php echo $_SESSION['name'][$id];?><br>
        <?php echo $_SESSION['price'][$id];
        
    }
}

$deleteProduct = $_POST['delete'];
if($deleteProduct) {
    session_unset();
}

?>

<html>
    <head>
        <body>
            <span>HTML-page</span>
            <form action="showCartItems" method="post">
                <button type="submit" name="delete">Delete Product</button>
            </form>
        </body>
    </head>
</html>
