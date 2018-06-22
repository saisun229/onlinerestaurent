<?php
	session_start();
$connection = mysqli_connect("localhost","root","","vishnu_commerce");
if(isset($_POST['signIn'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
$select = mysqli_query($connection,"SELECT * FROM `users` WHERE `user_name`='$username' AND `password`='$username'");
	$fetch=mysqli_fetch_array($select);
	//echo $fetch['user_name'];
	//echo mysqli_num_rows($select);
	 	if(mysqli_num_rows($select)>0){
		$_SESSION['id']=$fetch['user_id'];
		$_SESSION['name']=$fetch['user_name'];
		$_SESSION['role']=$fetch['role'];
		header('Location:dashboard.php');
	}
	//print_r($fetch);
	//echo $fetch['user_id'];
}
if($_SESSION['id']){
	header('Location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body datasqstyle="{&quot;paddingTop&quot;:null}" datasquuid="f6fc5bc7-080e-498b-bb61-87709a90ea4c" style="padding-top: 80px;" cz-shortcut-listen="true">

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="username">
        <label for="inputPassword" class="sr-only" name="password">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signIn">Sign in</button>
      </form>

    </div> <!-- /container -->
  </body></html>
  
  <?php
  mysqli_close($connection);
  ?>