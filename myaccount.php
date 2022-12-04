<!-- The php script below demonstrates methods to pull out users information when they log onto their accounts -->
<?php
    //
    $is_invalid = false;
        
    //Once the submit button is clicked
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        //check connection
        $conn = require __DIR__ . "/database.php";

        //escape special characters of the input string, if any
        //$login = mysqli_real_escape_string($conn,$_POST["login"]);
        $login = $_POST["login"];
        // a query to select customer information
        $sql ="SELECT * FROM `demo`.`customer` WHERE email = '$login'";
        //execute the above sql by calling the query method on the $conn object, this is just a pointer, not a value
        $result = mysqli_query($conn,$sql); //the method on the right returns an obj 
                                            //=> we assign that obj to a variable $result
        //method to get data from the $result object pointer
        $user = mysqli_fetch_assoc($result);   //this method fetches a result row as an associative arry
        //method below checks  information of the variable =>this returns type (and size) and value of the variable
        //var_dump($user);

        //if record was found then check the password
        if ($user){
            //the line of code below checks if user input the correct password => return boolean
            if ($_POST["password"] === $user["password"]){
                session_start();    //if user in put correctly..
                session_regenerate_id();
                $_SESSION["user_id"] = $user["id"]; // store user id in the $_SESSION super global variable
                
                //redirect user to the index page and exit the script
                header("Location: index.php");
                exit;
            }
        }
        //At this point, the form has been sumitted but either email or password is invalid
        $is_invalid = true;       
            
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name=" author " content="Vy Tran">
        <meta name=" description " content="Assignment2">
        <meta name="keywords" content="Assignment2, Bakery">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--css-->
        <style><?php include 'style.css'; ?></style>
        <!--js-->
        <title>Login Form</title>
    </head>
    <body>
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
        <div class="login-title-container">
            <h1>Login</h1>
        </div>
            

            <div class="login-container">
                <form id="loginform" name="form" action="myaccount.php" method="POST" onsubmit="return validate()">
                    <!--This the login for the bakery webpage-->
                    <!--username/email-->
                    <div id="form-text">
                        <label for="login">Email address</label>
                        <!-- 
                            If the email input is found in the database but wrong password => display email
                            This field will be emply when the browser first loaded. 
                         -->
                        <input type="text" name="login" id="login" value="<?php if (isset($user)){echo htmlspecialchars($_POST["login"]);} ?>">
                        <p id="loginError"></p>
                    </div>
                
                    <!--password-->
                    <div id="form-text">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" >
                        <p id="passError"></p>
                    </div>
    
                    <!-- display message if the login is invalid -->
                    <?php if ($is_invalid): ?>
                        <p><em>Invalid login</em></p>
                    <?php endif; ?>
                    <div class="button">
                        <button type="submit" >Login</button>
                        <button type="reset" id="reset">Reset</button>
                    </div>
                </form>
    
                <!--
                    Do not move this into the form. It will not work. 
                    The register button will submit the form instead of linking it to the register form page.
                    The button will lead to the registration form when clicking on it.
                -->
                <br>
                <div>Don't have an account? <a href="registerform.php">Create an account!</a></div>        
               
            </div>
        <script src="myaccount.js" ></script>
    </body>
</html>