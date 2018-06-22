<?php
session_start();
require('../includes/db.php');
if(!$_SESSION['id']){
	header('Location:index.php');
}
$query="SELECT * FROM `products`";
$e_query=mysqli_query($connection,$query);

?>
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

    <!-- Main Styles CSS -->
    <link href="../css/main.css" rel="stylesheet">

   
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
                    <a href="orders.php">View cancelled orders</a>
                </li>
                <li class="btn">
                    <a href="logout.php">Logout</a>
                </li>
				
            </ul>
			</div>
        </aside>

        <!-- Main Section -->
        <section class="main-section">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>title</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Type</th>
                <th> Total Qty </th>
                <th> Remaining Qty </th>
                <th>images</th>
                <th>Icons</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th>title</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Type</th>
                <th> Total Qty </th>
                <th> Remaining Qty </th>
                <th>images</th>
                <th>Icons</th>
            </tr>
        </tfoot>
        <tbody>
		<?php
			while ($p_fetch=mysqli_fetch_array($e_query)){
		?>
            <tr>
                <td><?php echo $p_fetch['op_title'];?></td>
                <td><?php echo $p_fetch['op_desc'];?></td>
                <td><?php echo $p_fetch['price'];?></td>
                <td>
				    <?php echo $p_fetch['p_type'];?>
                </td>
                <td>300</td>
                <td> 
                
                
                
                  <?php
                
                $sqlQry = "SELECT item_codes,code_quantity FROM orders WHERE DATE(date) = CURDATE() AND item_codes LIKE "."'%".$p_fetch["code"]."%'";  
             
				   	$resultsqlQry = mysqli_query($connection,$sqlQry);
				   	$qty = 0;
				   	$ccode=$p_fetch['code'];
					while($rows=mysqli_fetch_assoc($resultsqlQry)) {
						$itemCodes = explode(',',$rows['item_codes']);
						$itemQty = explode(',',$rows['code_quantity']);
                                                $count=count($itemCodes); 

                                                $i=0;
                                                $index=0;
                                                while($i<$count)
                                                {
                                                  if($ccode==$itemCodes[$i])
                                                    {
                                                      $index=$i;
                                                      break;
                                                    }
                                                  $i=$i+1;
                                                }
						//$codeKey = array_search($item["code"], $itemCodes ); 
						$qty = $qty+$itemQty[$index]; 
					} 
                                        $tot=300; 
					echo $tot-$qty;
                
                 ?>
                
                
                </td>
                <td>
				   <img src="includes/<?php echo $p_fetch['img_path'];?>" width="50">
				</td>
                <td><button class="btn btn-primary">
					<a style="color:white" href="product_edit.php?p_id=<?php echo $p_fetch['op_id'];?>">Edit</a>
				</button>
				<button class="btn btn-danger"><a style="color:white" href="product_delete.php?p_id=<?php echo $p_fetch['op_id'];?>" onclick="return confirm('Are you sure?')">Delete</a></button> </td>
            </tr>
			<?php
			}
			?>
        </tbody>
    </table>
	
        </section>
        <!-- /.main-section -->


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="../js/custom.js"></script>

    <!-- Call functions on document ready -->
    <script>
        $(document).ready(function() {
            // Call Menu Toggler
            appMaster.menuToggler();
            // Example Call anotherFunction
            appMaster.anotherFunction();
			$('#example').DataTable();
        });
    </script>

</body>

</html>
