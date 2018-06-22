<?php
session_start();
require("includes/db.php");
if(!empty($_SESSION['cart_item']))
{
	$Total=0;
	foreach($_SESSION["cart_item"] as $key)
	{
		$codeArray[]=$key["code"];
		$quanArray[]=$key["quantity"];
		$Total+=$key["price"]*$key["quantity"];
	}
	$codes=implode(", ",$codeArray);
	$quantities=implode(", ",$quanArray);
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$contact=$_POST["contact"];
	$address=$_POST["address"];
	$city=$_POST["city"];
	$state=$_POST["state"];
	$zip=$_POST["zipcode"];
	$contact=$_POST["contact"];
	$status="pending";
	$date=date("Y-m-d H:i:s");
	$query="insert into orders(`name` ,  `email` ,  `contact` ,  `address` ,  `city` ,  `state` ,  `zipcode` ,  `item_codes` ,  `code_quantity` ,  `price` , `date` ,  `order_status`) values('$uname','$email','$contact','$address','$city','$state','$zipcode','$codes','$quantities','$Total','$date','$status')";
	 $inq=mysqli_query($connection,"SELECT max(`cust_id`) as `max_id` FROM `orders`");
         $ifet=mysqli_fetch_array($inq);
         $cid=$ifet['max_id']+1;
	$con=mysqli_query($connection,$query);
	if($con)
	{
		?>
		<script>
		alert("Thank you!! Order under process!!");
	</script>
       

	<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
		$to=$email;
       $subject="Thank you for choosing Online Cuisine.";
		$message = "Your order is under process. You can cancel your order by clicking below link.";
                $message .="<a href='http://svreddy.com/cancelorder.php?custid=$cid'>click here to cancel order</a>";
		
		$obj->sendemail($to,$subject,$message);
		$Total=0;
		}
	else{
		?>
		<script>
		alert("Order not placed. Please Try Again!");
	</script>
	<?php
	}
}
else{?>
	<script>
	alert("Cart List Is Empty! Please Select items");
</script><?php
}
//echo $computerId;
include("pricelist.php");
#header('Location:pricelist.php');

?>