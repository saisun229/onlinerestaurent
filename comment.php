<!DOCTYPE html>
<?php
session_start();
require 'includes/db.php';

$cid=$_GET['custid'];
$_SESSION['id']=$cid;
//exit();
$pro_num=$op_id;
$query1 = mysqli_query($connection,"SELECT * FROM `orders` WHERE `cust_id`='$cid'");
$a=mysqli_fetch_array($query1);
//echo $a['cust_id'];
$codes=explode(", ",$a['item_codes']);
$quan=explode(", ",$a['code_quantity']);
$count=count($codes);
$qs = mysqli_query($connection,"SELECT * FROM `reviews` WHERE `c_id`='$cid'");
$c=0;
while($fs=mysqli_fetch_array($qs))
{
  $c=$c+1;
}

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>comments</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
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
<?php
if(!empty($_GET['custid']) && $c==0)
{$cust=$_GET['custid'];
?>
<section class="main_body">
        <!-- start of main_body-->
		
		<div class="container">
			<div class="col-md-offset-3">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>title</th>
        
                <th>Price</th>
<th> Qty Ordered </th>
                
                
                <th>images</th>
                <th>Icons</th>
               
                
            </tr>
        </thead>
        
        <tbody>
<?php
$i=0;

while($i<$count)
{
$var = $codes[$i];
$var2 = $quan[$i];
    $qq=mysqli_query($connection,"SELECT * FROM `products` WHERE `code`='$var'");
     $ff=mysqli_fetch_assoc($qq);
 ?><tr><td><?php echo $ff['op_title']; ?></td>
       <td><?php echo $ff['price']; ?></td>
       <td><?php echo $var2; ?></td>
                <td><img src="admin/includes/<?php echo $ff['img_path'];?>" alt='food' height='42' width='42'></td>
<td><button class="btn btn-primary">
<!-- <input type="submit" name="like" Value="like"/>
<input type="submit" name="unlike" Value="unlike"/> -->
					<a href="http://svreddy.com/admin/likeunlike.php?id=<?php  echo $ff['op_id']; ?>&do=like&cust_id=<?php  echo $cust; ?>" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </a> 
				<a href="http://svreddy.com/admin/likeunlike.php?id=<?php  echo $ff['op_id']; ?>&do=unlike&cust_id=<?php  echo $cust; ?>" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-thumbs-down"></span> Unlike
        </a>  </td>
</form>
            </tr>
<?php
$i+=1;
}

 ?>
		
            
                
                
                
                
			
        </tbody>
    </table>
<form action="enter_comment.php" method="post">
<textarea rows="4" cols="50" name="comment">

</textarea>
<input type="submit" name="submit"/>
</form>
<?php
}
?>

  


&nbsp;&nbsp;<canter><table border="1">
<thead>
            <tr>
                
                
            
                <th>Comments</th>
                
            </tr><br>
        </thead>
        
        <tbody>
<?php
$qry=mysqli_query($connection,"SELECT * FROM `reviews`");
$n=mysqli_num_rows($qry);
//$fet=mysqli_fetch_array($qry);


while($fet=mysqli_fetch_array($qry))
{       
        $code=$fet['item_code'];
        //$qry=mysqli_query($connection,"SELECT `op_title` FROM `products` WHERE `code`='$code'");
        //$iq=mysqli_fetch_array($qry);

        ?>
<tr><td><?php echo $fet['review']; ?></td></tr>
<?php
}
?>
</tbody>	
</table></canter>	
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