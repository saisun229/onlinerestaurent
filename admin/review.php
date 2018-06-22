<html>
<head>
<?php
session_start();
require('../includes/db.php');
if(!$_SESSION['id']){
	header('Location:index.php');
}
$query="SELECT * FROM `products`";
$e_query=mysqli_query($connection,$query);

?>
<script>
function fun(x)
{
  var a=document.cookie;
  document.cookie="id=" + x;
 alert(x);
}
</script>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
	.main-section{
		padding:0.5%;
		width : 95%;
		float : right;
	}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- For Google -->
    <link rel="author" href="https://plus.google.com/+Scoopthemes">
    <link rel="publisher" href="https://plus.google.com/+Scoopthemes">
    <!-- for Twitter -->          
    <meta name="twitter:card" content="photo">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:url" content="">
    <!-- for Facebook OpenGraph -->          
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />
    
    <!-- Canonical -->
    <link rel="canonical" href="">

    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Main Styles CSS -->
    <link href="../css/main.css" rel="stylesheet">

   
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

</head>
<body>
<div id="wrapper">

        <aside id="sideBar">
            <div class="well">
			<ul class="main-nav" style="list-style:none">
                <!-- Your Logo Or Site Name -->
                
                <!-- Search -->
                
                <li class="btn">
                    <a href="includes/add_product.php">Add Product</a>
                </li>
                <li class="btn">
                    <a href="dashboard.php">View Products</a>
                </li>
                <li class="btn">
                    <a href="orders.php">View Orders</a>
                </li>
                <li class="btn">
                    <a href="reviews.php">View cancelled orders</a>
                </li>
                <li class="btn">
                    <a href="logout.php">Logout</a>
                </li>
				
            </ul>
			</div>
        </aside>

    

<!-- Trigger/Open The Modal -->
<!-- <script>
function model()
{
alert("you entered into popup");
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}
</script> -->
<?php
require("includes/db.php");
$status="cancelled";
$query=mysqli_query($connection,"SELECT * FROM `orders` where order_status='cancelled' ORDER BY `date` DESC");
?>	
	<table cellpadding="10" cellspacing="1">
	<tbody>
	<tr>
	<th style="text-align:left;"><strong>Cust_Id</strong></th>
	<th style="text-align:left;"><strong>Cust_Name</strong></th>
        <th style="text-align:right;"><strong>Email</strong></th>
	<th style="text-align:right;"><strong>Order Status</strong></th>
	<th style="text-align:center;"><strong>Action</strong></th>
	</tr>	
	<?php	
while($fetch=mysqli_fetch_array($query))
{
	?>
		<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $fetch["cust_id"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $fetch["name"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $fetch["email"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $fetch["order_status"]; ?></td>
<?php
if($fetch['order_status']=='cancelled')
{
?><td>&nbsp;&nbsp;



<a href=""> <button type="button" class="btn btn-info btn-lg" disabled>Approve</button></a>
<a href="http://www.svreddy.com/admin/admin_cancelorder.php?custid=<?php echo $fetch['cust_id']; ?>"><button type="button" class="btn btn-info btn-lg"  disabled>Cancel Order</button></a>
<?php
}
else
{
?><td>&nbsp;&nbsp;

<a href="http://svreddy.com/admin/order_show.php?id=<?php echo $fetch['cust_id']; ?>"> <button type="button" class="btn btn-info btn-lg" >Approve</button></a>
<a href="http://www.svreddy.com/admin/admin_cancelorder.php?custid=<?php echo $fetch['cust_id']; ?>"><button type="button" class="btn btn-info btn-lg" >Cancel Order</button></a>
<?php
}

 ?>
                                

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div> 
        <div class="modal-body">


</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


				</td></tr>

        
  



	<?php
}

?>
</tbody>
</table> -->
<?php

?>

</body>
</html>
