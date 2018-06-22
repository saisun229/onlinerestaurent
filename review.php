<!DOCTYPE html>
<?php

require 'includes/db.php';

//$op_id=$_GET['op_id'];

//exit();
$pro_num=$op_id;
$query1 = mysqli_query($connection,"SELECT * FROM `products` WHERE `op_id`=7");
$a=mysqli_fetch_array($query1);
$likes=$a['op_likes_no'];
$likes=$likes+1;
if(!empty($_SESSION["status"]))
{
$query2 = mysqli_query($connection,"UPDATE `products` SET op_likes_no=$likes WHERE `op_id`=$pro_num");
}
else
{
	$_SESSION["status"]="y";
}

	
$query1 = mysqli_query($connection,"SELECT * FROM `products` WHERE `op_id`=$op_id");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>comments</title>
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
                    <li><a href="contact_us.php">Contact Us</a></li>
					<li class="navSelected"><a href="reviews.php">Reviews</a></li>
                </ul>
            </nav>
            <!-- Navigation Menu End -->
        </header>
        <!-- Header Section End -->
    </div>
    <section class="main_body">
        <!-- start of main_body-->
		
		<div class="container">
			<div class="col-md-offset-3">
			<form accept-charset="UTF-8" action="" method="post">
						<?php
					while($fetch = mysqli_fetch_array($query1)){
						?>
						<div class="box1">
							
							<div class="col-md-12">
							<div class="col-md-6">
							<p class="offer_heading"><?php echo $fetch['op_title'];?></p>
								<img src="admin/includes/<?php echo $fetch['img_path'];?>" alt="" width="100px">
							</div>
							<div class="col-md-6" style="padding-top:45px;">
							<?php $pro_num=$fetch['op_id']; ?>
                        <input id="ratings-hidden" name="rating" type="hidden" value="<?php echo $pro_num;?>">
                        <?php 
                        
                        if(empty($_SESSION['op_id']))
                        {
                        $_SESSION['op_id']= $pro_num; 
                    	}	?>
                        <textarea class="form-control animated" cols="30" id="new-review" name="comment" placeholder="Enter your comments here..." rows="5"></textarea>
        
                        <div class="text-right">
                           
                            <a  href="index.php" id="close-review-box" >
                            
                            <button class="btn btn-success btn-sm" type="submit">Submit</button></a>
                        </div>
                    
							</div>
						</div>
						<div class="row" style="margin-top:180px;">						
							<div class="buttons" style="padding-left:50px; margin-top:20px;">
								
								<a href="#" class="order_button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> </a>
								
								<a href="#" class="order_button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> </a>
							</div>
						</div>
						</div>
						<?php } ?>
						</form>
			</div>
        
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
	 <script src="js/review.js"></script>
</body>
</html>