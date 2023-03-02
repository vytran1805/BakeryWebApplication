<!--
Name: Vy Tran & Teresa Vu
Date: December 4, 2022
Section: CST 8285
Brief description of Assignment 2: The purpose of this webpage is to let the user create an account for the bakery order.
-->
<?php 
    session_start();
    if (isset($_SESSION["user_id"])){
        $conn = require __DIR__ . "/database.php";
        $sql = "SELECT * FROM CUSTOMER WHERE id = {$_SESSION["user_id"]}";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_assoc($result); 
    }
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=" author " content="Vy Tran">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Vy-Tran">
        <title>Homepage</title>
        <style><?php include 'style.css'; ?></style>
    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
            <div id="nav-list-index" class="navbar nav-list">
                    <a href="index.php" id="nav-home"><b>HOME</b></a>
                    <a href="products.php">SHOP</a>
                    <a href="contactUs.php">CONTACT US</a>             
                    <a href="myaccount.php">MY ACCOUNT</a>
                    <a href="cart.php" >
                        <span id="cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </header>
        <main>
            <?php
                //check if user_id is set in the session
                if (isset($user)): 
            ?>
            <p>Hello <strong><?php echo $user["firstName"] . " " . $user["lastName"] ?></strong>, how are you today?</p>
            <a id ="view-button" href="view.php">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a id ="view-button" href="logout.php">Log out</a>
            <?php endif;?>
        </main>
    </body>
</html>
