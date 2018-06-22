<?php
require('../includes/db.php');
//echo $_GET['p_id'];
$id = $_GET['p_id'];
$query = mysqli_query($connection,"DELETE FROM `products` WHERE `products`.`op_id` ='$id' ");
header('Location:index.php');
?>