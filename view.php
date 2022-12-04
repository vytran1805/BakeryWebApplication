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
<?php 
    //check connection
    $conn = require __DIR__ . "/database.php";

    // a query to select customer information
    $sql ="SELECT * FROM `demo`.`customer`";
    $result = mysqli_query($conn, $sql);
    //check if the email address has been used
    // $emailsql = "SELECT * FROM `demo`.`customer` WHERE email ='$email'";
    // //run the query
    // $result = mysqli_query($conn, $emailsql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=" author " content="Vy Tran">
        <meta name=" description " content="Assignment2">
        <meta name="keywords" content="Assignment2, Bakery">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        <title>View Page</title>
        <!-- link to boostrap css style for the view table -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!--css-->
        <link rel="stylesheet" href="style.css">
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
            <h1>User's Information</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // if records found...
                        if(mysqli_num_rows ( $result )>0){
                            while($user = mysqli_fetch_assoc($result)){ //fetches a result row as an associative array 
                    ?>
                    <tr>
                        <!-- then display user's information here -->
                        <td><?php echo $user['id'];?></td>
                        <td><?php echo $user['firstName'];?></td>
                        <td><?php echo $user['lastName'];?></td>
                        <td><?php echo $user['phone'];?></td>
                        <td><?php echo $user['address'];?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php echo $user['date'];?></td>
                        <!-- Two lines of code below create 2 buttons to update and delete user  -->
                        <td>
                            <a id ="view-button" href="update.php?id=<?php echo $user['id']; ?>">Edit</a>&nbsp;
                            <a id ="view-button" href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

            


                