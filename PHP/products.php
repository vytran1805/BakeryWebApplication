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
        <title>Products</title>
		<style>
			.card{
				transition: all 0.5s ease-in-out;
				cursor: pointer;
				box-shadow: 0px 0px 6px -4px rgba(0,0,0,0.75);
				border-radius: 10px;
			}
			.card:hover{
				box-shadow: 0px 0px 51px -36px rgba(0,0,0,1);
			}
		</style>
		<!-- include search button -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style><?php include 'style.css'; ?></style>
	</head>
    <body>
		<header>
            <?php include 'header.php' ?>
            <div id="nav-list-index" class="navbar nav-list">
				<a href="index.php" id="nav-home">HOME</a>
				<a href="products.php"><b>SHOP</b></a>
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
			<!-- display user name if they already logged in -->
			<?php
                //check if user_id is set in the session
                if (isset($user)): 
            ?>
            <p>Hello <strong><?php echo $user["firstName"] . " " . $user["lastName"] ?></strong>, how are you today?</p>
            <a id ="view-button" href="view.php">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a id ="view-button" href="logout.php">Log out</a>
            <?php endif;?>
            <!-- Menu title -->
			<br>
            <div class="menu-container">
                <h1><strong>MENU</strong></h1>
				<br>
            </div>
			
            <!-- Search bar -->
            <div class="search-container">
				<form class="search-form">
					<input id="myinput" name="product_search" type="text" class="form-control" style="width:80%;"> 
                    <button type="submit" id="search-submit"class="search-btn"><i class="fa fa-search"></i></button>
				</form>
            </div>
			<!-- This div below display search results -->
			<div class="results-container">
				<!-- style the inner text: warning style, red, center -->
				<h5 class="text-danger mt-5 text-center" id="para" style="display:none;">Not Found</h5 >
				<div class="row mt-3" id="card"></div>
				<!-- if there is no input, all of the products will be display -->
			</div>
        </main>
		<script src="search.js"></script>
    </body>
</html>