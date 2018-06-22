<html>
<?php
session_start();
require('../includes/db.php');
if(!$_SESSION['id']){
	header('Location:index.php');
}
$id=$_GET['cid'];
$email=$_GET['email'];
$query=mysqli_query($connection,"UPDATE `orders` set `order_status`='delivered' WHERE `cust_id`='$id'");
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
		$query1="select item_codes, code_quantity from orders where cust_id='$id'";
		//echo $query1;
		$res=mysqli_query($connection,$query1);
		$fetch1=mysqli_fetch_array($res);
			$codes =  explode(', ',$fetch1['item_codes']);
                        $quan =  explode(', ',$fetch1['code_quantity']);
			$items =   $r2['item_codes'];
			$count=count($codes);
			$i=0;
			 $itemsHtml = '<table style="border:1px solid black;border-collapse:collapse"> <tr> <th> Item Image </th> <th> &nbsp; </th><th> Item Name </th> <th> &nbsp; </th> <th> Price/item </th> <th> &nbsp; </th><th> Qty </th></tr>';
			while($i<$count)
			{ 
		$res2=mysqli_query($connection,"select * from products where code='$codes[$i]'");
		$fetch2=mysqli_fetch_array($res2);
                          $itemsHtml .= "<tr> <td><img src='http://svreddy.com/admin/includes/".$fetch2['img_path']."' alt=''  width='60'></td>";
			  
			  $itemsHtml .= "<td> &nbsp; </td>";
			  $itemsHtml .= " <td>".$fetch2['op_title']."</td>";
			  
			  $itemsHtml .= "<td> &nbsp; </td>";
                          $itemsHtml .= " <td>".$fetch2['price']."</td>";
			  
			  $itemsHtml .= "<td> &nbsp; </td>";
			  $itemsHtml .= "<td>".$quan[$i]."</td></tr>";
                           $i=$i+1;
			}
			$itemsHtml .= '</table>';
			echo $itemsHtml;
			//$itemsQty =  explode(',',$r['code_quantity']);
               $to=$email;
		$subject="Your order details";
		$message = "<br/><br/>".$itemsHtml."<br/><br/>";
		$message .="Thanks for choosing Online Cuisine.Your order has been placed successfully. You can review the products.";
		$message .="<a href='http://svreddy.com/comment.php?custid=$id'>click here to review</a>";
		$obj->sendemail($to,$subject,$message);
header('Location:orders.php');
?>
</html>