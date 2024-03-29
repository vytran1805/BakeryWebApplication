<!--
Name: Vy Tran & Teresa Vu
Date: December 4, 2022
Section: CST 8285
Brief description of Assignment 2: The purpose of this webpage is to let the user create an account for the bakery order.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=" author " content="Vy Tran, Teresa Vu">
        <meta name=" description " content="Assignment2">
        <meta name="keywords" content="Assignment2, Bakery">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--css-->
        <!-- Cache busting so that browsers can have long caches on files while having them reload files when they change -->
        <style><?php include 'style.css'; ?></style>
        <!--js-->
        <title>Register Form</title>

    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
            <div id="nav-list-index" class="navbar nav-list">
                    <a href="index.php" id="nav-home">HOME</a>
                    <a href="products.php">SHOP</a>
                    <a href="contactUs.php">CONTACT US</a>             
                    <a href="myaccount.php"><b>MY ACCOUNT</b></a>
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
            <div>
                <?php 
                $conn = require __DIR__ . "/database.php";

                if ($_SERVER["REQUEST_METHOD"] === "POST"){
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"]; 
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $email = $_POST["email"]; 
                    $password = $_POST["password"];
                    
                    //check connection
                    
                    //check if the email address has been used
                    $emailsql = "SELECT * FROM `demo`.`customer` WHERE email ='$email'";
                    //run the query
                    $result = mysqli_query($conn, $emailsql);
                    //if rowCount > 0 => the email is already taken
                    $rowCount = mysqli_num_rows($result);
                
                if ($rowCount > 0){
                    $error = "Email is already taken!";
                } else {
                    // a query to insert new customer information
                    $sql = "INSERT INTO `demo`.`customer`(firstName, lastName, phone, address, email, password)
                                VALUES (?,?,?,?,?,?)";

                    //create a new prepared statement obj by calling the statement init method, assign to $stmt variable
                    //$stmt = mysqli_init();            
                    
                    //create a prepared sql statement for execution by calling prepare method on $stmt and passing $sql as an argument
                    $stmt = mysqli_prepare($conn, $sql);	
                    //Binding values to the parameter markers
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $phone, $address, $email, $password);
                    //Executing the statement
                    
                    mysqli_stmt_execute($stmt);
                ?>
                <div><h1>Thank you for registering!</h1></div>
                <div><p>You can now <a href="myaccount.php">log in!</a></p></div>  
            </div>  
                    

            
            <!-- Print message -->
              
            
            <?php 
                //closing the statement
                mysqli_stmt_close($stmt);
                //Closing the connection
                mysqli_close($conn);
                // mysqli_stmt_get_result($stmt)
                // mysqli_stmt_fetch($stmt)
                }
                }
            ?>
            </div>
            <!--
                label for name id="customer"
                label for phone id="phone"
                label for email id="email"
                label for address id="address"
            -->
            <div class="register-title-container">
                <h1>Register</h1>
            </div>
            <div class="register-container">
                <!--
                ***********************
                display php email error if the email is already taken
                ***********************
                -->
                <?php if (isset($error)){ ?>
                    <p><em>Email is already taken. Please enter a different email!</em></p>
                <?php } ?>     
                <!--Register for an account -->
                <form id="registerform" name="register" method="POST" action="registerform.php" onsubmit="return validate()" >
                    
                    <!--
                    ***********************
                    id for Firstname 
                    id="firstname"
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter first name" >
                        <p id="firstNameError"></p>
                    </div>
        
                    <!--
                    ***********************
                    Lastname 
                    id="lastname"
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter last name" >
                        <p id="lastNameError"></p>
                    </div>
        
                    <!--
                    ***********************
                    Phone
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter phone number">
                    </div>
        
                    <!--
                    ***********************
                    Address
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Enter home address">
                    </div>
        
                    <!--
                    ***********************
                    Email address
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="email">Email Address</label><br>
                        <input type="text" name="email" id="email" placeholder="Email" >
                        <p id="emailError"></p>
                    </div>
                        
                    <!--
                    ***********************
                    Password
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="pass">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Password" >
                        <p id="passError"></p>
                    </div>
                        
                        <!--
                    ***********************
                    Re-type Password
                    ***********************
                    -->
                    <div class="form-text">
                        <label for="newPass">Re-type Password</label><br>
                        <input type="password" name="newPass" id="newPass" placeholder="Password">
                        <p id="newPassError"></p>
                    </div>
                                       
                    <div class="button  ">
                        <button type="submit" id ="submit">Register</button>
                        <button type="reset" id="reset">Reset</button>
                    </div>
                </form>
            </div>
        </main>
            
        <script src="registerVal.js"></script>
    </body>
</html>
