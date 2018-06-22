<html>

<head>
    <title> Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/reset.css" type="text/css"></link>
    <link rel="stylesheet" href="css/style.css" type="text/css"></link>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Outer Container Start -->
    <div class="outerContainer">
        <!-- header Section Start-->
        <header>
            <div class="logo">
                <h1>Online Cuisine</h1>
            </div>
            <!-- Navigation Menu Start-->
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li ><a href="pricelist.php">PriceList</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
					<li class="navSelected"><a href="user_register">Join Us</a></li>
                </ul>
            </nav>
            <!-- Navigation Menu End -->
			<div class="menu">
				<ul class="social-network social-circle navbar-right">
					<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
        </header>
        <!-- Header Section End -->
    </div>
    <!-- Main Content Start -->
    <!-- Order Procedure Start -->
    <div id="orderProcedure">
        
        
    </div>
    <!-- order procedure End -->
            <ul class="nav nav-tabs price-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
                <li><a data-toggle="tab" href="#menu1">Register Here</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="orderDetails">
                        <h2>Login<span>Details</span></h2>
                        <form method="post" action="login.php">
							<input name="uname"type="text" placeholder="Username" />
                            <input name="password" type="password" placeholder="password" />
							<input class="button" type="submit" name="Order" value="submit"/>
							
						</form>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="orderDetails">
                        <h2>Enter <span>Details</span></h2>
                        <form action="registration.php"  method="post">
                            <input type="text" placeholder="Username:" name="uname" />
							<input name="email"type="email" placeholder="Email:" />
							<input type="password" placeholder="Password" name="password"/>
							<input type="password" placeholder="Re-Enter password" name="repass"/>
                            <input type="submit" value="Confirm Order" />
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Main Content End -->
    <!-- Footer Section Start -->
    <div class="outerContainer">
        <footer>
            <div id="footerContainer">
                <p> Copyright @ 2013 Privacy Policy
                </p>
            </div>
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Outer Container End -->
</body>

</html>