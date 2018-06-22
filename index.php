<html>
<?php
	require 'includes/db.php';
	$query1 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=1");
	$query2 = mysqli_query($connection,"SELECT * FROM  `products` ORDER BY  `products`.`op_likes_no` -  `products`.`op_dislikes_no` DESC LIMIT 4");
	$query3 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=3");
?>
<head>
    <title>Online Cusine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/reset.css" type="text/css"></link>
    <link rel="stylesheet" href="css/style.css" type="text/css"></link>
    
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
                    <li class="navSelected"><a href="#">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="pricelist.php">PriceList</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
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
    <!-- Main Content Start -->
    <section class="slider">
        <!-- start of slider-->
        <section class="slider_content"><img src="assets/food7.jpg" id="banner" alt="banner" class="banner"></section>
    </section>
    <!-- end of slider -->

    <div class="clear"></div>
    <section class="main_body">
		<div class="container">
			<div class="row">
 <h2 style="color:#D63332">Deal of the day</h2>
			<div class="col-md-12">
			<div class="review-slider">
				<ul id="flexiselDemo1">
					<?php
					while($fetch = mysqli_fetch_array($query1)){
						?>
						
					<li >
						<div class="box1" style="min-height:400px">
							<p class="offer_heading"><?php echo $fetch['op_title'];?></p>
							<img src="admin/includes/<?php echo $fetch['img_path']; ?>" width="150" height="100" alt="">
							<span class="offer_text">
							<?php echo $fetch['op_desc'];?>	
							</span>
							<div class="buttons">
								<form name="form1" action="pricelist.php?action=add&code=<?php echo $fetch['code']?>" method="post">
								<a href="#" class="order_button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp;<?php echo $fetch['op_likes_no'];?>	</a>
								<a href="#" class="order_button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp;<?php echo $fetch['op_dislikes_no'];?></a>
                                                                <a href="#" class="order_button"><i class="fa fa-dollar" aria-hidden="true"></i><?php echo $fetch['price'];?>	 </a>
                                                                 <input type="number" name="quantity" value="1" min="1" max="100" placeholder="Quantity" style="width: 60px"/><br><br>
								
                                                                 <input type="submit" name="submit"value="Order now"class="order_btn" style="width: 100px"/>
</form>
<!--
<form name="form1" action="pricelist.php?action=add&code=<?php echo $fetch['code']?>" method="post">
				<div class="col-md-3" >
				<div class="popular_food_section" style="min-height:300px">
                                        <p class="offer_heading"><?php echo $fetch['op_title'];?></p>
					<img src="admin/includes/<?php echo $fetch['img_path']?>" width="100" height="150"/>
					<p><?php echo $fetch['op_desc']?></p>
					<div class="price_btns">
						<a href="pricelist.php" class="order_btn"><i class="fa fa-dollar" aria-hidden="true"></i> <?php echo $fetch['price']?></a>
						<input type="number" name="quantity" value="1" min="1" max="100" placeholder="Quantity" style="width: 60px"/>
						<input type="submit" name="submit"value="Order now"class="order_btn" style="width: 100px"/>
					</div>
				</div>
			</div>
			</form>
-->


							</div>
						</div>
					</li>
					<?php
					}
					?>
				</ul>
					<script>
                            var pe = document.getElementsByTagName("span");
                            var length = 100;
                            //console.log(pe.length);
                            for (i = 0; i < pe.length; i++) {
                                string = pe[i].innerHTML;
                                var trimmedString = string.substring(0, length);
                                //console.log(trimmedString);
                                pe[i].innerHTML = trimmedString;
                            }
                        </script>
                        <script src="js/jquery-2.1.4.js"></script>
                       <script type="text/javascript">
                            $(window).load(function() {

                                $("#flexiselDemo1").flexisel({
                                    visibleItems: 4,
                                    animationSpeed: 1500,
                                    autoPlay: true,
                                    autoPlaySpeed: 4000,
                                    pauseOnHover: false,
                                    enableResponsiveBreakpoints: true,
                                    responsiveBreakpoints: {
                                        portrait: {
                                            changePoint: 480,
                                            visibleItems: 2
                                        },
                                        landscape: {
                                            changePoint: 640,
                                            visibleItems: 3
                                        },
                                        tablet: {
                                            changePoint: 800,
                                            visibleItems: 4
                                        }
                                    }
                                });
                            });
                        </script>
                        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                    </div>
				</div>
            </div>
			</div>
	</section>
            <!-- start of popular food-->
	<section class="popular_food_content">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<h1 class="popular_food">Our Popular Food Items</h1>
		<!-- start of list of popular food -->
		<?php
			//session_start();
			while($fetch = mysqli_fetch_array($query2)){
				
			?>
				<form name="form1" action="pricelist.php?action=add&code=<?php echo $fetch['code']?>" method="post">
				<div class="col-md-3" >
				<div class="popular_food_section" style="min-height:300px">
                                        <p class="offer_heading"><?php echo $fetch['op_title'];?></p>
					<img src="admin/includes/<?php echo $fetch['img_path']?>" width="100" height="150"/>
					<p><?php echo $fetch['op_desc']?></p>
                                        <div class="buttons">
								
					
                                          </div>
					<div class="price_btns">
<button type="button" class="order_button" disabled><i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp;<?php echo $fetch['op_likes_no'];?></button>
				        <button type="button" class="order_button" disabled><i class="fa fa-thumbs-down" aria-hidden="true"></i> &nbsp;<?php echo $fetch['op_dislikes_no'];?></button>

						<a href="pricelist.php" class="order_btn"><i class="fa fa-dollar" aria-hidden="true"></i> <?php echo $fetch['price']?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="quantity" value="1" min="1" max="100" placeholder="Quantity" style="width: 60px"/>
						<input type="submit" name="submit"value="Order now"class="order_btn" style="width: 100px"/>
					</div>
				</div>
			</div>
			</form>
			
			<?php
			}
			?>
			
			<script>
					var pe = document.getElementsByTagName("p");
					var length = 100;
					//console.log(pe.length);
					for (i = 0; i < pe.length; i++) {
						string = pe[i].innerHTML;
						var trimmedString = string.substring(0, length);
						//console.log(trimmedString);
						pe[i].innerHTML = trimmedString;
					}
            </script>
		</div>
	</div>
</div>
	</section>
            <!-- End of popular food-->


		<!-- start of Catering food-->
		<section class="popular_food_content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="popular_food">We do undertake Catering</h1>
						<?php
							while($fetch = mysqli_fetch_array($query3)){
							?>
								<form name="form2" action="pricelist.php?action=add&code=<?php echo $fetch['code']?>" method="post">
								<div class="col-md-3">
								<div class="popular_food_section">
									<img src="admin/includes/<?php echo $fetch['img_path']?>" width="100" height="150" />
									<p style="margin-bottom:23px">more info</p>
									<div class="price_btns">

										<a href="contact_us.php" class="order_btn" style="margin:50px;padding:15px"> Contact Us</a>
										
										
										
									</div>
								</div>
							</div>
							</form>
								
						<?php
						}
						?>
			
							
				
			
				
			<div>
			</div>
			</div>
		</section>
            <!-- End of Catering food-->
        <!-- end of main_content-->
   
    <!-- end of main body-->



    <div class="outerContainer">
        <!-- Footer Section Start -->
        <footer>
            <div id="footerContainer">
                <p> Copyright @ 2017 Privacy Policy
                </p>
            </div>
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Outer Container End -->
	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var img_array = ["assets/food1.jpg", "assets/food3.jpg", "assets/food4.jpg", "assets/food5.jpg", "assets/food6.jpg", "assets/food7.jpg"];
            var i = -1;

            var interval = setInterval(function() {
                slide()
            }, 5000);

            function slide() {
                i++;
                $('#banner').fadeOut(500, function() {
                    $('#banner').attr('src', img_array[i]);
                    if (i == 5) {
                        i = -1;
                    }
                    $('#banner').fadeIn(1000);
                })
                $('#banner').attr('src', 'assets/buffer_img.jpg');
            }
        });
    </script>
</body>

</html>