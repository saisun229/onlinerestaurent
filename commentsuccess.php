<html>
<?php
session_start();
	require 'includes/db.php';
include('comment.php');	
	$pro_num="";
	if(!empty($_SESSION['op_id']))
   	 {
    $pro_num=$_SESSION['op_id'];
	}
	if(!empty($_SESSION["email"]))
	{
		$email=$_SESSION["email"];
	}
	else
	{
		$email="sandeep.thoomula@gmail.com";
	}

include("Smsandemailalerts.php");
		
		$obj=new Smsandemailalerts();
		$to=$email;
		$subject="Your order details";
		$message="Your order has been placed successfully. You can review order by clicking here";
		$message.="<a href='http://svreddy.com/comment.php?op_id=$pro_num'>click here to give comment</a>";
		
		$obj->sendemail($to,$subject,$message);
	        

header("Location: http://svreddy.com/index.php");
 ?>