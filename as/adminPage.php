<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.php');
    exit;
}



include_once 'connection.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

  

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $mobile = mysqli_real_escape_string($conn, $mobile);

    // Update the Admin's details in the database

    $query = "UPDATE user SET User_Name='$name', Email='$email', Mobile_Number='$mobile', DOB='$dob' WHERE ID='$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) 
    {
        $user['User_Name'] = $name;
        $user['Email'] = $email;
        $user['Mobile'] = $mobile;
	    $user['DOB'] = $dob;
    }
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style/adminPage.css">
<title>Admin Page</title>
<style>
body{
	background-image:url("images/mm.jpg");
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;

}
.xx{
	width:12%;
	height:5%;
	background-color:red;
	color:black;
	font-size:15px;
	border-style:solid;
	border-radius:30px;
}
ul
{
	background-image:url("images/99.jpg");
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	opacity:80%;
}
li a 
{
	  display: block;
	  color:black;
	  padding: 10px 12px;
	  text-decoration: none;
	  text-align:center;
	  font-weight:bold;
	  font-family: "Lucida Console", "Courier New", monospace;
	  font-size:26px;
	}



}
.1 a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a{
	text-decoration-line:none;
	color:white;
}

.bor{
	background:#00000091;
	width:29%;
	padding:30px 40px;
	border-radius:20px;
	
}
.bor1{
	background:#00000091;
	width:35%;
	padding:30px 40px;
	border-radius:20px;

}
input{
	background-color:gray;
	color:black;
	font-size:14px;
	font-weight:bold;
	height:4%;
	border-radius:4px;
}
input:hover{
	background-color:black;
	color:white;
}
</style>
</head>
<body>
<div class="sidebar">
<ul>
  <li><a style="font-weight: bold;color:white" class="active" href="#home">ADMIN PANEL</a></li>
  <li><a href="allUsers.php">Users</a></li>
  <li><a href="allChefs.php">Chefs</a></li>
  <li><a href="Recipeadd.php">Recipes</a></li>
  <li><a href="allFeedback.php">Feedback</a></li>
  <li><a href="allContactus.php">Contact Us</a></li>
  <li><a href="homePage.html">Home Page</a></li>
</ul>
</div>
<div style="margin-left:45%">
<h1 style="color:white;text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black">BakingDaddy (PVT) Ltd,</h1>
</div>
<div style="margin-left:51%">

<h1 style="color:white;text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black">WELCOME !</h1>
<h2 style="color:white;text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black">Administrator</h2>
</div>
<div style="margin-right:2%">
<a href="logOut.php"><image style="float:right;width:10%;height:7%"  class="logout" src="images/logout (3).png" width="15%"></a>
</div>
<br>
<h3 style="font-size:27px;text-decoration: underline;margin-left:26%;text-weight:bold;text-shadow:1px 1px">Admin Details</h3>
 <div style="margin-left:25%">
<image src="images/profile.png" width="20%" height="29%">

        <h2 style="color:white;font-size:28px"><?php echo $user['User_Name']; ?></h2>
        <p style="color:white;text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black"><?php echo $user['Email']; ?></p>
		<div class="bor">
        <h3 style="color:white">Name : <?php echo $user['User_Name']; ?></h3>
        <h3 style="color:white">Email : <?php echo $user['Email']; ?></h3>
        <h3 style="color:white">Mobile : <?php echo $user['Mobile_Number']; ?></h3>
        <h3 style="color:white">Birthday : </strong> <?php echo $user['DOB']; ?></h3>
		<h3 style="color:white">Password : </strong> <?php echo $user['Password']; ?></h3>
		</div>	
		<br><br><br><br>
		<h2 style="color:white">Update Details</h2><br><br>
	    <div class="bor1">

        <form action="" method="POST">
         <h3 style="color:white">Name:<br><input type="text" name="name" placeholder="Name" value="<?php echo $user['User_Name']; ?>" required><br><br>
           Email:<br>
		   <input type="text" name="email" placeholder="Email" value="<?php echo $user['Email']; ?>" required><br><br>
           Mobile Number:<br><input type="text" name="mobile" placeholder="Mobile" value="<?php echo $user['Mobile_Number']; ?>" required><br><br>
	      DOB:<br><input type="date" name="dob" placeholder="Birthday" value="<?php echo $user['DOB']; ?>" required><br><br>
		  Password:<br><input type="password" name="Password" placeholder="Enter Password" value="<?php echo $user['Password']; ?>" required><br>
		  </h3>
		  <br>
            <input type="submit" value="Update">
        </form></div>

<br><br><br><br><br>
<div><center>
<h2 style="color:white;text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black"> All Admin Details </h2>
</center>
<br>
<button style="background-color:black;width:7%;height:4%;font-weight:bold;text-decoration-line:none;font-size:12px;border-radius:3px;"><a class="b" href="addNewAdmin.php">Add New</a></button><br><br>
<table border="2" width="100%">
	  <thead style="background-color:black;color:white;font-size:20px">
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">User Name</th>
		  <th scope="col">Mobile Number</th>
		  <th scope="col">Email</th>
		  <th scope="col">DOB</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$query="SELECT * FROM user WHERE user_type='admin'";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr style="background-color:white;font-size:20px;text-align:center">
					  <td><?php echo $row['ID'] ?></td>
					  <td><?php echo $row['User_Name'] ?></td>
					  <td><?php echo $row['Mobile_Number'] ?></td>
					  <td><?php echo $row['Email'] ?></td>
					  <td><?php echo $row['DOB'] ?></td>
				</tr>
				<?php
			}
		?>
  </tbody>
</table>
</div>
</body>
</html>
