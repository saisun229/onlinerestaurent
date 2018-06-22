<?php
include('includes/db.php');
$do=$_GET['do'];
$id=$_GET['id'];
$cust_id=$_GET['cust_id'];
$like="like";
$unlike="unlike";
$like_no=0;
   $unlike_no=0;
if($do=='like')
{ 
   $found=0;
   $query=mysqli_query($connection, "SELECT `cust_id` FROM `like_unlike` WHERE `item_code`='$id'");
   while($fetch=mysqli_fetch_array($query))
   { 
      $in_id=$fetch['cust_id'];
      if($in_id==$cust_id)
      { 
          $found=1;
          break;
       }
    }
    if($found==0)
    { 
       $qur=mysqli_query($connection, "INSERT INTO `like_unlike`(`id`, `cust_id`, `item_code`, `likes`, `dislikes`) VALUES ('','$cust_id','$id',1,0)");
}
    else if($found==1)
    {
       $inq=mysqli_query($connection, "SELECT `likes`,`dislikes` FROM `like_unlike` WHERE `cust_id`='$cust_id'");
       $ifet=mysqli_fetch_array($inq);
       if($ifet['likes']==0 && $ifet['dislikes']==1)
       {
         $oq=mysqli_query($connection, "UPDATE `like_unlike` SET `likes`=1,`dislikes`=0 WHERE `item_code`='$id' AND `cust_id`='$cust_id'");
        }
        
       
    }
   
   
  
}
else if($do=='unlike')
{
 
  $found=0;
   $query=mysqli_query($connection, "SELECT `cust_id` FROM `like_unlike` WHERE `item_code`='$id'");
   while($fetch=mysqli_fetch_array($query))
   { 
      $in_id=$fetch['cust_id'];
      if($in_id==$cust_id)
      { 
          $found=1;
          break;
       }
    }
    if($found==0)
    { 
       $qur=mysqli_query($connection, "INSERT INTO `like_unlike`(`id`, `cust_id`, `item_code`, `likes`, `dislikes`) VALUES ('','$cust_id','$id',0,1)");
}
    else if($found==1)
    {
       $inq=mysqli_query($connection, "SELECT `likes`,`dislikes` FROM `like_unlike` WHERE `cust_id`='$cust_id'");
       $ifet=mysqli_fetch_array($inq);
        if($ifet['likes']==1 && $ifet['dislikes']==0)
        { 
          $oq=mysqli_query($connection, "UPDATE `like_unlike` SET `likes`=0,`dislikes`=1 WHERE `item_code`='$id' AND `cust_id`='$cust_id'");
        }
       
    }
  
}
$qu=mysqli_query($connection, "SELECT SUM(`likes`) AS  `like_no` , SUM(`dislikes`) AS  `dlike_no` 
FROM  `like_unlike` WHERE  `item_code` ='$id'");
$ffff=mysqli_fetch_array($qu);
 
      
        $likes_no=$ffff['like_no'];
      
        $unlike_no=$ffff['dlike_no'];
     

   
   
   
   $up=mysqli_query($connection, "UPDATE `products` SET `op_likes_no`='$likes_no',`op_dislikes_no`='$unlike_no' WHERE `op_id`='$id'");
?>  <script> window.history.back();</script> <?php
?>