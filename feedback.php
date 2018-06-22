<?php
require("includes/db.php");
$name=$_POST["uname"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$mesg=$_POST["message"];
$query="insert into feedback(name, email, contact,message) values('$name','$email','$contact','$mesg')";
$con=mysqli_query($connection,$query);
if($con)
{
	?>
	<script>
	alert("Thank You.");
</script>
<?php
	}
else{
	?>
	<script>
	alert("Ooops. Please Try Again!");
</script>
<?php
}
header('Location:contact_us.php');

?>