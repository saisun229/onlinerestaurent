<html>

<head>
    <title> Price List</title>
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
                    <li class="navSelected"><a href="#">PriceList</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="comment.php">Reviews</a></li>
                </ul>
            </nav>
            <!-- Navigation Menu End -->
			<div class="menu">
				<ul class="social-network social-circle navbar-right">
					<li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://plus.google.com/about" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="https://www.linkedin.com/uas/login" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
        </header>
        <!-- Header Section End -->
    </div>
    <!-- Main Content Start -->
    <!-- Order Procedure Start -->
    <div id="orderProcedure">
        <h2> Procedure to <span>Order ?</span> </h2>
        
    </div>
    <!-- order procedure End -->
    <div id="priceListContainer">
        <div class="priceList">
            <h2>Orders</h2>
            <?php
			$connection = mysqli_connect("localhost","sandeept","sslabs","vishnu_commerce");
			session_start();
			if(!empty($_GET["action"])) {
			switch($_GET["action"]) {
				case "add":
					if(!empty($_POST["quantity"])) {	
					$code=$_GET['code'];
$query="SELECT * FROM `products` WHERE code='$code'";
					$result = mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($result)) {
						$resultset[] = $row;
					}
					if(!empty($resultset)){
					$productByCode =  $resultset;	
					}
	
					//print_r($resultset);


					//	echo $productByCode;
						$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["op_title"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
if(empty($_SESSION["op_id"]))
						{
							$_SESSION["op_id"]=$productByCode[0]["op_id"];
						}
						
						if(!empty($_SESSION["cart_item"])) {
							if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
								foreach($_SESSION["cart_item"] as $k => $v) {
										if($productByCode[0]["code"] == $k) {
											if(empty($_SESSION["cart_item"][$k]["quantity"])) {
												$_SESSION["cart_item"][$k]["quantity"] = 0;
											}
											$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
										}
								}
							} else {
								$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
							}
						} else {
							$_SESSION["cart_item"] = $itemArray;
						}
					}
				break;
				case "remove":
					if(!empty($_SESSION["cart_item"])) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($_GET["code"] == $k)
									unset($_SESSION["cart_item"][$k]);				
								if(empty($_SESSION["cart_item"]))
									unset($_SESSION["cart_item"]);
						}
					}
				break;
				case "empty":
					unset($_SESSION["cart_item"]);
				break;	
			}
			}
			
			//print_r($_SESSION["cart_item"]);
			?>
			<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="pricelist.php?action=empty" style="font-family:arial;font-weight:bold;font-size:20px">Empty Cart</a></div>
			<?php
			if(isset($_SESSION["cart_item"])){
				$item_total = 0;
			}
			?>
			<table cellpadding="10" cellspacing="1" class="table">
				<tbody>
				<tr>
				<th>Name</th>
				<th>Code</th>
				<th >Quantity</th>
				<th >Price</th>
				<th >Action</th>
				</tr>

			<?php		
				foreach ($_SESSION["cart_item"] as $item){
				$resultsets = array();
				$sqlQry = "SELECT item_codes,code_quantity FROM orders WHERE DATE(date) = CURDATE() AND item_codes LIKE "."'%".$item["code"]."%'";    
				   	$resultsqlQry = mysqli_query($connection,$sqlQry);
				   	$qty = '';
				   	$itemCodes = '';
				   	$itemQty= ''; 
					while($rows=mysqli_fetch_assoc($resultsqlQry)) {
						$itemCodes = explode(',',$rows['item_codes']);
						$itemQty = explode(',',$rows['code_quantity']);
						$codeKey = array_search($item["code"], $itemCodes ); 
						$qty = $qty+$itemQty[$codeKey]; 
					}  
					 
					?>
							
							<tr>
							<td ><strong><?php echo $item["name"]; ?></strong>
							 <br/>
							  <?php if($qty >= 300) { ?>
							   <span style="color:red;"> This product is out of stock </span>
							  <?php } ?>
							</td>
							<td ><?php echo $item["code"]; ?></td>
							<td ><?php echo $item["quantity"]; ?></td>
							<td ><?php echo "$".$item["price"]; ?></td>
							<td ><a href="pricelist.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
							</tr>
							
							<?php
					$item_total += ($item["price"]*$item["quantity"]);
					}
					?>

				<tr>
				<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
				</tr>	
				</body>
			</table>
			<div class="button">
				<a href="index.php" class="order_button">Continue Order</a>
			</div>
            <ul class="nav nav-tabs price-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Pickup</a></li>
                <li><a data-toggle="tab" href="#menu1">Delivery</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="orderDetails">
                        <h2>Delivery <span>Details</span></h2>
 <form action="onlinebooking.php"  method="post">
                            <input type="text" placeholder="Name:" name="uname" required/>
							<input name="email"type="email" placeholder="Email:" required/>
                           
                            <input type="number" placeholder="Phone:" name="contact" required />
                            <input type="submit" value="Confirm Order" />
                        </form>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="orderDetails">
                        <h2>Delivery <span>Details</span></h2>
                        <form action="onlinebooking.php"  method="post">
                            <input type="text" placeholder="Name:" name="uname" required/>
							<input name="email"type="email" placeholder="Email:" required/>
                            <input type="text" placeholder="Address:" name="address" required/>
                            <input type="text" placeholder="City:" name="city" required/>
                            <input type="text" placeholder="State:" name="state" required/>
                            <input type="text" placeholder="Zip:" name="zipcode" required/>
                            <input type="number" placeholder="Phone:" name="contact" required />
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
                <p> Copyright @ 2017 Privacy Policy
                </p>
            </div>
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Outer Container End -->
</body>

</html>