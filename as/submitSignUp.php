<?php
	session_start();

    include("connection.php");

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$UserName=$_POST['firstname'];
		$Mobile=$_POST['mobile'];
		$Email=$_POST['email'];
		$DOB=$_POST['day'];
		$UserType=$_POST['type'];
		$Password=$_POST['Password'];
		
		if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
			
			$query ="INSERT INTO user(User_Name,Mobile_Number,Email,DOB,User_Type,Password)VALUES('$UserName','$Mobile','$Email','$DOB','$UserType','$Password')";
			
			mysqli_query($conn,$query);
			echo "<script type='text/javascript'>alert('Successfully Register')</script>";
			header("location:logIn.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Please Enter some Valid Deatails')</script>";
			
		}
	}
?>
<html>

<head>
<title>Recipe System</title>

<link rel="stylesheet" type="text/css" href="style/style.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<style>
div {
  background-image:url('images/00.jpg');
  background-size:cover;
  background-repeat:no-repeat;
  background-attachment:fixed;
  width: 500px;
  height:590px;
  border: 10px  double black;
  border-radius:40px;
  padding: 50px;
  margin: 20px auto 0;
  opacity: 70%;
}
input{
	border-radius:5px;
	border:2px solid;
	height:5%;
}
select{
	width:11%;
	height:4%;
	border-radius:5px;
	border:2px solid;
}
.check{
	width:3%;
	height:3%;
}

</style>
</head>

<body>

<image  class="logo" src="images/logo.png" width="8%">
<h1 class="text1">BakingDaddy<p class='text2'>.Recipe Provider.</p></h1>


<div>
<center>
    <h1 style="font-weight:bold;font-size:40px;text-shadow: 1px 1px 2px white, 0 0 25px white, 0 0 5px red">Registration Form</h1>
</center>
<form method="POST">
	
    <h3 style="font-weight:bold">User Name:<br>
    <input type="text" name="firstname" placeholder="User Name" required><br/></br>
        
	
    Mobile Number:<br/>
    <input type="phone" name="mobile" placeholder="0777777777" pattern="[0-9]{10}" required><br/><br/>
        
    E-mail:<br/>
    <input type="email" name="email" placeholder="abc@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required><br/><br/>
        
    Birthday:<br/>
    <input type="date" name="day" required><br/><br/>
     
	User Type: <select name="type" required>
	<option>User</option>
	<option>Chef</option>
	</select>
	<br><br>
    Password:<br/>
    <input type="password" name="Password" placeholder="Enter your Password"  required><br/>
       
	</h3>
	<h4>
    <input class="check" type="checkbox"  id="checkBox" onclick="enableButton()">Accept Privacy Policy and Terms<br/>
	<center><br>
    <input style="background-color:black;color:white;font-weight:bold;text-decoration-line:none;font-size:15px;border-radius:12px;margin-left:15px" type="submit" value="Submit">
	</h4>
	<h4 style="font-weight:bold">already have an account? <a style="color:red;font-size:20px;text-decoration-line:underline;font-weight:bold" href="logIn.php">login now</a></h4>
	</center>	
	</form>	
   </div>
   
    


<br><br><br><br>

<footer>
<image style="float:left" src="images/logo.png" width="7%">
<h5 style="color:white">BakingDaddy <br>16/9 Meta Road,Colombo06</h5>


<ul class="footerIcons">
	<li><a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></li></a>
	<li><a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></li></a>
	<li><a href="https://twitter.com/"><ion-icon name="logo-twitter"></ion-icon></li></a>
</ul>

<ul class="footerMenu">
	<li class="footerNav"><a href="contactus.html">Contact us</a></li>
	<li class="footerNav"><a href="terms & conditions">Terms & conditions</a></li>
	<li class="footerNav"><a href="feedback.html">Feedback</a></li>
</ul>
</footer>
</body>
</html>