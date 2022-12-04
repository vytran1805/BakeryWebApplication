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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Vy-Tran">
        <style><?php include 'style.css'; ?></style>
        <title>Contact Us</title>
        
    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
            <div id="nav-list-index" class="navbar nav-list">
                    <a href="index.php" id="nav-home">HOME</a>
                    <a href="products.php">SHOP</a>
                    <a href="contactUs.php"><b>CONTACT US</b></a>             
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
            <!-- display user name if they already logged in -->
            <?php
                //check if user_id is set in the session
                if (isset($user)): 
            ?>
            	<p>Hello <strong><?php echo $user["firstName"] . " " . $user["lastName"] ?></strong>, how are you today?</p>
            	<a href="logout.php">Log out</a>
            <?php endif;?>
            <div class="main-container">
                <!-- About us div -->
                <div class="about-us-container">
                    <h1>About Us</h1>
                </div>
                <!-- paragraph div -->
                <div class="about-us-para-container">
                    <p>
                        The Sidney Bakery has been in the family for over 70 years.  Owned by Mike and Colleen Hay this special spot has made its mark with its famous donuts, sausage rolls breads and pastries. <br>
                        First established in 1903, the bakery carries an Old World commitment to quality.  A landmark spot on Beacon Ave in the heart of Sidney, with a fondness from both the patrons who have visited for decades and those who are only just discovering it.
                    </p>
                </div>
                <!-- Contact us form div -->
                <div class="form-container">
                    <div class="contact-form">
                        <p>Contact Form</p>
                        <form action="#" name="contact_form">
                            <div class="form-text">
                                <label for="login">Name</label><br>
                                <input type="text" name="login" id="login" placeholder="User name" required >
                                <p id="nameError"></p>
                            </div>
                            <div class="form-text">
                                <label for="email">Email Address</label><br>
                                <input type="text" name="email" id="email" placeholder="Email" required >
                                <p id="emailError"></p>
                            </div>
                            <div class="form-text">
                                <label for="message">Message</label><br>
                                <textarea name="message" cols="30" rows="10" placeholder="Enter your message here ..." required></textarea>
                            </div>
                            
                            <div class="button">
                                <button type="submit" id ="submit">Submit</button>
                                <button type="reset" id="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="location-hours">
                        <div class="location">
                            <p><strong>Location</strong></p>
                            <p>
                                1980 Baseline Road <br>
                                Ottawa, ON, K2C 0C6
                            </p>
                            <p>
                                Email: songbakery@gmail.com <br>
                                Phone: (613)-123-4567
                            </p>
                        </div>
                        <div class="hours">
                            <p><strong>Operation Hours</strong></p>
                            <p>
                                Monday - Closed <br>
                                Tuesday 8:00 am -  4:30 pm <br>
                                Wednesday 8:00 am - 4:30 pm <br>
                                Thursday 8:00 am -  4:30 pm <br>
                                Friday 8:00 am - 4:30 pm <br>
                                Saturday 8:00 am - 5:00 pm <br>
                                Sunday 9:30 am - 4:30 pm <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="registerVal.js"></script>
    </body>
</html>