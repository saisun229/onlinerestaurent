<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Contact us</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
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
                    <li><a href="pricelist.php">PriceList</a></li>
                    <li class="navSelected"><a href="#">Contact Us</a></li>
                    <li><a href="comment.php">Reviews</a></li>
                </ul>
            </nav>
			<div class="menu">
				<ul class="social-network social-circle navbar-right">
					<li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://plus.google.com/about" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="https://www.linkedin.com/uas/login" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
            <!-- Navigation Menu End -->
        </header>
        <!-- Header Section End -->
    </div>
    <section class="main_body">
        <!-- start of main_body-->
        <div class="container contact">
			<div class="row">
            <!-- start of main content-->
            <h1 class="contact_page_heading">How To <span class="contact_red">Find Us</span></h1>
          <iframe id="map_canvas" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d99317.7905681765!2d-94.46032258150925!3d38.931269173761066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x87c11fdf7d01d085%3A0xac08079201a476bb!2sUCM+Lee&#39;s+Summit+Campus%2C+1101+NW+Innovation+Parkway%2C+Lee&#39;s+Summit%2C+MO+64086!3m2!1d38.9312901!2d-94.39028259999999!5e0!3m2!1sen!2sin!4v1512815863975" width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
			</iframe>

            <div class="contact_details">
                <p>If you have questions or comments, please get a hold of us in whichever way is most convenient. Ask away. There is no reasonable question that our team can not answer.</p>
                <address>1101 NW Innovation Parkway, Lee's Summit, MO 64086.</address>
                <p><span>Freephone:</span>+1 800 559 6580</p>
                <p><span>Telephone:</span>+1 800 603 6035</p>
                <p><span>FAX: </span>+1 800 889 9898</p>
                <p><span>Email:</span><span class="contact_red">onlinecuisine@site.com<span></p>
			</div>
			<h1 class="contact_page_heading">Feedback</h1>
			<form class="form1" action="feedback.php" method="post">
				<div class="col-md-6">
					<input type="text" name="uname" placeholder="Name:" required/>
					<input type="email" name="email" placeholder="Email:" required/>
					<input type="number" name="contact" placeholder="Phone:" min="10" required/>
				</div>
			<div class="col-md-6">
			<textarea name="message" placeholder="Message" required></textarea>
			<p><button class="order_button">Submit</button></p>
			</div>
			</form>
		</div><!-- end of main_Content-->
		</div>
</section><!-- end of main_body-->

	<div class="outerContainer">
		<!-- Footer Section Start -->
		<footer>
			<div id="footerContainer">
				<p> Copyright @ 2017 	Privacy Policy
				</p>
			</div>
		</footer>
		<!-- Footer Section End -->
	</div>
	 <script src="js/jquery-2.1.4.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>