<?php
session_start();
require('../../includes/db.php');
if(!$_SESSION['id']){
	header('Location:../index.php');
        }
		if(isset($_POST['insert'])){		
			$title= $_POST['title'];
			$desc= $_POST['desc'];
            $price= $_POST['price'];
            $type= $_POST['type'];
            $code= $_POST['code'];
            if (!isset($_FILES['image']['tmp_name'])) {
                echo "";
                }
                else{
                $file=$_FILES['image']['tmp_name'];
                $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $image_name= addslashes($_FILES['image']['name']);
                        move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);        
                        $location="photos/" . $_FILES["image"]["name"];
                }            
        	
			$insert = "INSERT INTO 
          `products` (`op_id`, `op_title`, `op_desc`, `price`, `op_likes_no`, `op_dislikes_no`, `p_type`, `img_path`,`code`) 
          VALUES 
          (NULL, '$title', '$desc', '$price', '0', '0', '$type', '$location','$code')";
			$query = mysqli_query($connection,$insert) or die(mysqli_error());
			if($query){
                //echo "Data inserted Successfully";
                header('Location:../dashboard.php');
			} else {
				echo "mysqli_error";
		}
		
		}	
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

    <title>Sidebar Layout - Scoop Themes Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

    <!-- Main Styles CSS -->
    <link href="../../css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        
        <aside id="sideBar">
            <div class="well">
			<ul class="main-nav" style="list-style:none">
                <!-- Your Logo Or Site Name -->
                
                <!-- Search -->
                
                <li class="btn">
                    <a href="add_product.php">Add Product</a>
                </li>
                <li class="btn">
                    <a href="../dashboard.php">View Products</a>
                </li>
                <li class="btn">
                    <a href="../logout.php">Logout</a>
                </li>
				
            </ul>
			</div>
        </aside>


        <!-- Main Section -->
        <section class="main-section">
		<form action="add_product.php" method="post" enctype="multipart/form-data">
			<table id="example" class="table" border="0">
        <thead>
            <tr>
                <th>Enter Title:</th> <td><input type="text" name="title" class="form-control" /></td></tr>
                <tr><th>Enter Descreption:</th><td><textarea name="desc" class="form-control"> </textarea></td></tr>
                <tr><th>Enter Price</th><td><input type="text" name="price" class="form-control"/></td></tr>
                <tr><th>Enter Code</th><td><input type="text" name="code" class="form-control"/></td></tr>
                <tr><th>Add Image</th><td><input type="file" name="image"></td></tr>
                <tr><th>Select Type</th>
                    <td>
                        <select name="type" id="">
                            <option value="1">order of the day</option>
                            <option value="2">Popular Food item</option>
                            <option value="3">Catering</option>
                        </select>
                    </td>
                </tr>
				<tr><th><input type="submit" name="insert" value="Insert Data" class="btn"/></th>
            </tr>
        </thead>
        
 
    </table>
	</form>
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
    <script src="js/custom.js"></script>

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





