<?php 
	
	session_start();

	include"connection.php";
	
?>
<html>
<head>
<style>
body{
	background-image:url("images/backgrd3.jpg");
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
}
a{
	text-decoration:none;
	color:white;
}
.1{
	color:red;
}

</style>
</head>
<body>
<center>
<image  class="logo" src="images/logo.png" width="8%">
<h1 style="font-size:45px;text-shadow:1px 2px red">BakingDaddy</h1>
</center>
<br>
<h1 style="margin-left:10%;font-style:italic;text-decoration:underline">Chef Details</h1>
<button style="background-color:#0000CD;width:%;height:4%;float:right;font-weight:bold;text-decoration-line:none;font-size:15px;color:black;border-radius:5px;margin-right:145px"><a href="adminPage.php">>>Back</a></button><br><br>
<center>
<table border="2" width="80%">
	  <thead style="background-color:black;color:white;font-size:20px">
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">User Name</th>
		  <th scope="col">Mobile Number</th>
		  <th scope="col">Email</th>
		  <th scope="col">DOB</th>
		  <th scope="col">Action</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$query="SELECT * FROM user WHERE user_type='Chef'";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr style="background-color:white;font-size:20px;text-align:center">
					  <td><?php echo $row['ID'] ?></td>
					  <td><?php echo $row['User_Name'] ?></td>
					  <td><?php echo $row['Mobile_Number'] ?></td>
					  <td><?php echo $row['Email'] ?></td>
					  <td><?php echo $row['DOB'] ?></td>
					  <td><button style="background-color:red;width:70%;height:30%;font-size:15px;font-weight:bold"><a href="delete.php?id=<?php echo $row['ID'] ?>">Delete</a></button></td>
				</tr>
				
				<?php
			}
		?>
  </tbody>
</table>
<br><br>
<button style="background-color:#0000CD;width:5%;height:4%;font-weight:bold;text-decoration-line:none;font-size:12px;color:black;border-radius:3px;"><a class="1" href="addNewChef.php">Add New</a></button><br><br>
</center>

</body>
</html>