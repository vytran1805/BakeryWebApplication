<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Vy-Tran">
        <title>Products</title>
        <style><?php include 'style.css'; ?></style>
    </head>
    <body>
		<header>
            <?php include 'header.php' ?>
            <div id="nav-list-index" class="navbar nav-list">
				<a href="index.php" id="nav-home">HOME</a>
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
        </header>
        <main>
            <div>
            <?php 
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"]; 
                $phone = $_POST["phone"];
                $address = $_POST["address"];
                $email = $_POST["email"]; 
                $password = $_POST["password"];

                //check connection
                $conn = require __DIR__ . "/database.php";

                //check if the email address has been used
                $emailsql = "SELECT * FROM `demo`.`customer` WHERE email ='$email'";
                //run the query
                $result = mysqli_query($conn, $emailsql);
                //if rowCount > 1 => the email is already taken
                $rowCount = mysqli_num_rows($result);
                
                if ($rowCount > 0){
                //     array_push($errors, "Email is already taken");
                // } if (count($errors) > 0) {
                    $error = "Email is already taken!";
                } 
                else{
                // a query to insert new customer information
                $sql = "INSERT INTO `demo`.`customer`(firstName, lastName, phone, address, email, password)
                            VALUES (?,?,?,?,?,?)";
                
                //create a new prepared statement obj by calling the statement init method, assign to $stmt variable
                $stmt = mysqli_init();            
                
                //create a prepared sql statement for execution by calling prepare method on $stmt and passing $sql as an argument
                $stmt = mysqli_prepare($conn, $sql);	
                //Binding values to the parameter markers
                mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $phone, $address, $email, $password);
                //Executing the statement
                
                mysqli_stmt_execute($stmt);?>
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
            ?>  
        </main>
    </body>
</html>