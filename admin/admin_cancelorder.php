<?php
session_start();
require("includes/db.php");
if(!$_SESSION['id']){
	header('Location:index.php');
}
$cust_id=$_GET['custid'];
$qq=mysqli_query($connection,"SELECT order_status FROM orders WHERE cust_id=$cust_id");
$ff=mysqli_fetch_array($qq);
if($ff['order_status']=='delivered')
{
  ?>
	<script>
	alert("Sorry !! Order already approved!!"); 
	
</script><?php header('Location:orders.php');
}
else if($ff['order_status']=='pending')
{
$query="update orders set order_status='cancelled' where cust_id=$cust_id";
 $con=mysqli_query($connection,$query);

?>
	<script>
	alert("Order cancelled"); 
	
</script> 
<?php header('Location:orders.php');
}
else
{
    ?>
	<script>
	alert("You Already cancelled the order!!"); 
	
</script> 
<?php header('Location:orders.php');

}
?>