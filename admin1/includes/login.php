<html>
<?php
session_start();
require("includes/db.php");
$uname=$_POST["uname"];
$password=$_POST["password"];
$query=mysqli_query($connection,"SELECT * FROM `user_details` WHERE `uname`='$uname' AND `password`='$password'");
$fetch=mysqli_fetch_array($query);
include("user_register.php");
if($fetch["uname"]==$uname)
{
	if($fetch["password"]==$password)
	{
		$_SESSION["username"]=$uname;
		header('Location:userpage.php');
		
	}
	else
	{
		?>
		<script>
			alert("Wrong Password.");
			header('Location:user_register.php');
		</script>
		<?php
	}
}
else
	{
		?>
		<script>
			alert("No User Found");
		</script>
		<?php
		header('Location:user_register.php');
		
	}
?>

</html>