<!--
Name: Vy Tran
Date: December 4, 2022
Section: CST 8285
Brief description of Assignment 2: The purpose of this webpage is to let the user create an account for the bakery order.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=" author " content="Vy Tran">
        <meta name=" description " content="Assignment2">
        <meta name="keywords" content="Assignment2, Bakery">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--css-->
        <!-- Cache busting so that browsers can have long caches on files while having them reload files when they change -->
        <link rel="stylesheet" href="style.css">
        <!--js-->
        <title>Create</title>

    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
        </header>
        <main>
            <?php 
                //check connection
                $conn = require __DIR__ . "/database.php";

                if(isset($_GET['id'])){
                    $user_id = $_GET['id'];

                    $sql = "DELETE FROM `demo`.`customer` WHERE id = '$user_id'";
                    //run the query
                    $result = mysqli_query($conn, $sql);
                
            
                    if ($result == TRUE){
                        header('Location: view.php');
                        exit();
                    }
                    else{
                        echo "Error:" . $sql. "<br>" . $conn->error;
                    }
                }
            ?>
