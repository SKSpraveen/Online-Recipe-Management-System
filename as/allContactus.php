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

</style>
</head>
<body>
<center>
<image  class="logo" src="images/logo.png" width="8%">
<h1 style="font-size:45px;text-shadow:1px 2px red">BakingDaddy</h1>
</center>
<br>
<h1 style="margin-left:10%;font-style:italic;text-decoration:underline">User Messages</h1>
<button style="background-color:#0000CD;width:6%;height:4%;float:right;font-weight:bold;text-decoration-line:none;font-size:15px;color:black;border-radius:5px;margin-right:145px"><a href="adminPage.php">>>Back</a></button><br><br>
<center>
<table border="2" width="80%">
	  <thead style="background-color:black;color:white;font-size:20px">
		<tr>
		  <th scope="col">Contact_ID</th>
		  <th scope="col">Name</th>
		  <th scope="col">Email</th>
		  <th scope="col">Mobile Number</th>
		  <th scope="col">Customer Message</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$query="SELECT * FROM contactus ";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr style="background-color:white;font-size:20px;text-align:center">
					  <td><?php echo $row['Contact_ID'] ?></td>
					  <td><?php echo $row['Name'] ?></td>
					  <td><?php echo $row['Email'] ?></td>
					  <td><?php echo $row['Phone_nO'] ?></td>
					  <td><?php echo $row['Message'] ?></td>
				</tr>
				
				<?php
			}
		?>
  </tbody>
</table>
</center>
</body>
</html>