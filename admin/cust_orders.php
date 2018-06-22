<!DOCTYPE html>
<html lang="en">
  <head>
	  <div id="scores">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Employee Ttracking System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,900,300,600,700|Open+Sans' rel='stylesheet' type='text/css'>
    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		
		<script>	
				function change() {
									//var task = prompt("Task name: ", "");
									/*if(task==""||task=='null')
									{
										alert("Enter taskname");
										continue;
									}*/
									//var desc = prompt("Task Description: ", "");
									//var duration = prompt("Duration : (Ex: 12 )", "");
									//var priority = prompt("Priority :( High/ Medium/ Low) ", "");
									//var n = prompt("Enter 1 for editing, Enter 2 for Assign/Re-assign ", "");
									$.ajax({
												type: "POST",
												//url: "app.php?id="+id,
												//data: {number: no}, //{tname : task, description: desc ,dur: duration, pr: priority, no: n }
												//success: function(response) {
													
												}
											});
									
									//$("#scores").load("t_form.php");
									}
			
		</script>
		<script>
		function openNav() {				
			document.getElementById("myNav").style.width = "100%";
			
			
		}

		function closeNav() {
			document.getElementById("myNav").style.width = "0%";
			
		}
		</script>
		
  </head>
  <style>
body {
    margin: 0;
    font-family: 'Lato', sans-serif;
}

.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: orange;
    background-color: orange;
    overflow-x: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px !important;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .closebtn {
    font-size: 40px !important;
    top: 15px;
    right: 35px;
  }
}
</style>
  <body>
    <!--header bar-->
    <header class="main-header">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <img src="images/SVAS.png">
          </div>
           
      </nav>
    </header>
			
	<center>
<input type='button' class='btn btn-danger' value='EDIT' onclick='change();openNav();'>
			     
	<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="overlay-content">
	  <h1> Employee Task Form </h1><br><br>
    <form method="POST" action="ajax.php">
		<center>
	
	<p >Task_name: &nbsp;&nbsp;<input type="text" name="tname" value=""></p><br>
    <p >Description: <textarea name="descript" placeholder="enter task Description" rows='5' cols='50'></textarea></p>
    <br>
    <p >Duration: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dur" value=""></p><br>
    <p >Priority: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="pr" value="">
    <option></option>
    <option> High</option>
    <option> Medium</option>
    <option> Low</option>
    </select><br>
    <br><br><p><input class="btn btn-success" type="submit" name="submit" value="submit"></p>
    </center>
    </form>
  </div>
</div>
	
		
	<table class="table table-hover">
			<thead>
			<tr>
			
			<th style="color:blue;">Emp_ID</th>
			<th style="color:blue;">Task_Name</th>
			<th style="color:blue;">Description</th>
			
			<th style="color:blue;">Pending</th>
			</tr>
			</thead>
			
			<?php
				
				include("includes/db.php");
				$query1="select * from `products`";
				$row1=mysql_query($query1);
				while($tuple1=mysql_fetch_array($row1))
				{
					
					echo "<td>".$tuple1['op_id']."</td>";
					echo "<td>".$tuple1['op_title']."</td>";
					echo "<td>".$tuple1['op_desc']."</td>";
					echo "<td>".$tuple1['delivery_status']."</td>";
					
						echo "<td><input type='button' class='btn btn-danger' value='EDIT' onclick='change(".$tuple1['id'].",".$n.");openNav();'></td></tr>";
						
					
				}
			?>
		</table>
	
	</div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>



