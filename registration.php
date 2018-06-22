<html>
<?php
require("includes/db.php");
$uname=$_POST["uname"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$password=$_POST["password"];
$repass=$_POST["repass"];
$found=0;
$q=mysqli_query($connection,"SELECT * FROM `user_details`");
while($f=mysqli_fetch_array($q))
{
	if($f["uname"]==$uname)
	{
		$found=1;
		break;
	}
}
if($found==0)
{
		if($repass==$password)
		{
			$query=mysqli_query($connection,"INSERT INTO `user_details`(`uname`,`email`,`password`) VALUES('$uname','$email','$password')");
			if($query)
			{
				?>
				<script>
					alert("Registered Successfully");
				</script>
				<?php
			}
			else
			{
				?>
				<script>
					alert("Ooops!! Something went wrong. Please Try Again!");
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script>
				alert("Password Does not match.");
			</script>
			<?php
		}

	}
else{
	?>
		<script>
			alert("Username Already exist");
		</script>
	<?php
}
include("user_register.php");
?>

</html>