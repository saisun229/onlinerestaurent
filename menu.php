<html>
<?php
	session_start();
	require('includes/db.php');
	$query1 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=4");
	$query2 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=5");
	$query3 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=6");
	$query4 = mysqli_query($connection,"SELECT * FROM `products` WHERE `p_type`=7");
?>
<head>
    <title>Online Cusine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/reset.css" type="text/css"></link>
    <link rel="stylesheet" href="css/style.css" type="text/css"></link>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.inner').hide(); //to hide all the content div at beginning
            $('.inner-1').click(function() {
                $('.inner').not(($(this).next())).slideUp();
                $(this).next('.inner').slideToggle();
                //get the inner div which is next to h1 which is next to img(currnet clicked element)                                                      
            });
			
			//-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            }) 
        });
    </script>

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
                    <li class="navSelected"><a href="menu.html">Menu</a></li>
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
	<!-- <script type="text/javascript">
	  function f1()
	  {
		document.getElementById("abc").href="menu.php"; 
	  }
	</script> -->

    <div id="foodListContainer">
        <!-- start of main_body-->
        <!--leftpanel starts here-->
		
        <div class="leftpanel">
            <div class="inner-block">
                <h2 class="padd">Look Through <span>Our Menu</span></h2>
                <div class="height"></div>
				
                <div class="box-2" class="bg">
                    <div class="inner-1">
                    <a href="#">APPETIZERS<span>FRESH . FAST . TASTY</span></a><br>
                        <strong>Available for a limited time</strong></div>
                    <div class="inner" class="bg" id="bg-1">
                        <p>Get the party started with these top-rated, can't-eat-just-one, best appetizer recipes!</p>
                        <ul class="nav nav-tabs acc-item" id="myTab">
							<li>APPETIZERS Menu</li>
						<?php
						
							while($fetch=mysqli_fetch_array($query1))
							{
								?>	
									<li><a href="menu.php?code=<?php echo $fetch['code'];?>"><?php echo $fetch['op_title'];?></a></li>
								<?php	
							}
							?>
                            
                        </ul>
						
                    </div>
                </div>

                <div class="box-2">
                    <div class="inner-1">
                        <a href="#">BRUNCHFRESH<span>SOUPS & SALADS</span></a><br>
                        <strong>Available for a limited time</strong>
                    </div>
                    <div class="inner" id="bg-2">
                        <p>Salad is a popular, ready-to-eat dish made of heterogeneous ingredients in a wet or once-wet base, usually served chilled or at a moderate temperature. </p>
                        <ul class="nav nav-tabs acc-item" id="myTab">
                            <li>SOUPS & Salads Menu</li>
							<?php
						
							while($fetch=mysqli_fetch_array($query2))
							{
								?>	
									<li><a href="menu.php?code=<?php echo $fetch['code'];?>"><?php echo $fetch['op_title'];?></a></li>
								<?php	
							}
							?>
                            
                        </ul>
                    </div>
                </div>

                <div class="box-2">
                    <div class="inner-1">
                        <a href="#">VEGETARIAN<span>WITH FRESH VEGETABLES</span></a><br>
                        <strong>Start your meal with a bang</strong></div>
                    <div class="inner" id="bg-3">
                        <p>Vegetarian and vegan friendly meal options. Our chefs have carefully considered how we can please the customers. </p>
                        <ul class="nav nav-tabs acc-item" id="myTab">
                            <li>VEGETARIAN Menu</li>
                            <?php
						
							while($fetch=mysqli_fetch_array($query3))
							{
								?>	
									<li><a href="menu.php?code=<?php echo $fetch['code'];?>"><?php echo $fetch['op_title'];?></a></li>
								<?php	
							}
							?>
                        </ul>
                    </div>
                </div>

                <div class="box-2">
                    <div class="inner-1">
                        <a href="#">RICE & BREAD<span>COMBO</span></a><br>
                        <strong>Available for a limited time</strong>
                    </div>
                    <div class="inner" id="bg-4">
                        <p>The starchy seeds of an annual southeast Asian cereal grass (Oryza sativa) that are cooked and used to make the best food.</p>
                        <ul class="nav nav-tabs acc-item" id="myTab">
                            <li>Lunch Menu</li>
                            <?php
						
							while($fetch=mysqli_fetch_array($query4))
							{
								?>	
									<li><a href="menu.php?code=<?php echo $fetch['code'];?>"><?php echo $fetch['op_title'];?></a></li>
								<?php	
							}
							?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!--leftpanel end here-->
        <!--rightpanel starts here-->
        <div class="rightpanel">

            <div class="tab-content">
				
				
                <div class="tab-pane active" id="mytab1">
					
                    
					<?php
						if(!empty($_GET["code"]))
						{
							$code=$_GET["code"];
							$q1=mysqli_query($connection,"SELECT * FROM `products` where `code`='$code'");
							$f1=mysqli_fetch_array($q1);
							?>
								<form name="form1" method="post" action="pricelist.php?action=add&code=<?php echo $code; ?>">
							<h2 class="padd"><?php echo $f1['op_title']; ?></h2>
							<div class="height"></div>
							<p class="top bot-1"><?php echo $f1['op_desc'];?></p>
							<div class="tab-image">
							<img src="admin/includes/<?php echo $f1['img_path'];?>" alt="page-2-img" width="200" height="150"/>
							</div>
							<div class="section" style="padding-bottom:20px;">
								<h6 class="title-attr">Quantitity</h6>                    
								<div>
									<input type="number" name="quantity" placeholder="Quantity"  value="1" min="1" max="100" style="width: 150px"/>
								</div>
							</div>  
							<!--<div class="price_btns">
						<a href="pricelist.php" class="order_btn"><i class="fa fa-dollar" aria-hidden="true"></i> <?php echo $f1['price']?></a></div> -->
							<div class="buttons">
								
								
								<input type="submit" name="submit"value="Order"class="order_btn" style="width: 100px"/>
							</div>
							</form>
							<?php
							
							
							
						}
						else{
							?>
								<form name="form2" method="post" action="pricelist.php?action=add&code=a1">
							<h2 class="padd">Samosa Chat</h2>
							<div class="height"></div>
							<p class="top bot-1">Crispy samosas served with traditional chole, onion, tomatoes & spicy sauces.</p>
							<div class="tab-image">
							<img src="assets/page-2-img.jpg" alt="page-2-img" />
							</div>
							<div class="section" style="padding-bottom:20px;">
								<h6 class="title-attr">Quantitity</h6>                    
								<div>
									<input type="number" name="quantity" placeholder="Quantity"  value="1" min="1" max="100" style="width: 150px"/>
								</div>
							</div>  
							<div class="buttons">
								<input type="submit" name="submit"value="Order"class="order_btn" style="width: 100px"/>
							</div>
							</form>
							<?php
						}
				?>
                    
                    
                    
					                  
					
                </div>
                
                
                
                
            </div>
        </div>

        <div class="clear"></div>


    </div>
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

</body>

</html>