<html>
<body><p>hai</p>
<table>
<th>Image</th>
<th>Name</th>
<th>Code</th>
<th>quantity</th>
<th>price</th>

<?php
session_start();
require('../includes/db.php');
if(!$_SESSION['id']){
	header('Location:index.php');
}
 $jid=$_GET['id'];
$qqq=mysqli_query($connection,"SELECT * FROM `orders` WHERE `cust_id`='$jid'");
$fff=mysqli_fetch_assoc($qqq);
$array=explode(", ",$fff["item_codes"]);
$array2=explode(", ",$fff["code_quantity"]);
$count=count($array);
$i=0;
while($i<$count)
{
$var = $array[$i];
    $qq=mysqli_query($connection,"SELECT * FROM `products` WHERE `code`='$var'");
     $ff=mysqli_fetch_assoc($qq);

     ?><tr>
<td>
				   <img src="includes/<?php echo $ff['img_path'];?>" width="50">
				</td>

                <td><?php echo $ff['op_title'];?></td>
                <td><?php echo $array[$i];?></td>
                <td><?php echo $array2[$i];?></td>
                <td><?php echo $ff['price'];?></td>

                </tr>

<?php
     $i+=1;
}
<?php
if($fetch['order_status']=='delivered' || $fetch['order_status']=='cancelled')
{
?><td>&nbsp;&nbsp;
?>
<tr><td>
<a href="http://www.svreddy.com/admin/order_update.php?cid=<?php echo $fff['cust_id']; ?>&email=<?php echo $fff['email']; ?>"><input type="submit" value="Approve" name="submit"/></a></td>
</tr>
<tr><td>
<a href="http://www.svreddy.com/admin/order_update.php?cid=<?php echo $fff['cust_id']; ?>&email=<?php echo $fff['email']; ?>"><input type="submit" value="Cancel order" name="submit"/></a></td>


</tr>



</table>
  
</body>
</html>