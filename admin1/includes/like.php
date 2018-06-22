<?php
require("includes/db.php");
//$computerId = $_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT'].$_SERVER['REMOTE_ADDR'];
$id=$_GET["id"];
$qry1=mysqli_query($connection,"select * from products where op_id='$id'");
$row=mysqli_fetch_array($qry1);
$increment=$row['op_likes_no']+1;
//echo $id;
//echo $row['op_likes_no'];
//echo $increment;
$query=mysqli_query($connection,"UPDATE `products` SET `op_likes_no` = '$increment' WHERE `products`.`op_id` = '$id'");
header('Location:index.php#flexiselDemo1');
?>