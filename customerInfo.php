<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Customer Information</title>    
    <link rel="" href="" />
</head>
<body>
    <?php include 'header.php' ?>  
<main>
    <h1>Thank you for registering!</h1>
    <?php if (isset($_POST['submit'])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"]; 
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $email = $_POST["email"]; 
        $password = $_POST["password"];
        
    ?>
    <div class="results">
    <p><span class="results__label">First name: </span> <span><?php echo $firstname; ?></span></p>
    <p><span class="results__label">Last name: </span> <span><?php echo $lastname; ?></span></p>
    <p><span class="results__label">Phone number: </span><span> <?php echo $phone; ?></span></p>
    <p><span class="results__label">Address: </span><span><?php echo $address; ?></span></p>
    <p><span class="results__label">Email: </span><span><?php echo $email; ?></span></p>
    
</div>
<?php } ?>
