<?php
	include"connection.php";
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$UserName=$_POST['firstname'];
		$Mobile=$_POST['mobile'];
		$Email=$_POST['email'];
		$DOB=$_POST['day'];
		$UserType=$_POST['type'];
		$Password=$_POST['Password'];
		
		$query="INSERT INTO user(User_Name,Mobile_Number,Email,DOB,User_Type,Password)VALUES('$UserName','$Mobile','$Email','$DOB','$UserType','$Password')";
		$result=mysqli_query($conn,$query);

		if($result){
			header("location:adminPage.php");
	    }
	}
?>
<html>

<head>
<title>Recipe System</title>

<link rel="stylesheet" type="text/css" href="style/style.css">

<style>
div {
  background-color: lightgrey;
  width: 500px;
  height:550px;
  border: 10px  double black;
  border-radius:40px;
  padding: 50px;
  margin: 20px auto 0;
}
</style>
</head>

<body>

<image  class="logo" src="images/logo.png" width="8%">
<h1 class="text1">BakingDaddy<p class='text2'>.Recipe Provider.</p></h1>


<div>
<center>
    <h1>Add New Chef</h1>
</center>
<form  method="POST">
	<?php
        if(isset($error)){
	         foreach($error as $error){
		        echo'<span class="error-msg">'.$error.'</span>'; 
	         };
        } ;
    ?>
    User Name:<br/>
    <input type="text" name="firstname" placeholder="User Name" required><br/><br/>
        

    Mobile Number:<br/>
    <input type="phone" name="mobile" placeholder="0777777777" pattern="[0-9]{10}" required><br/><br/>
        
    e-mail:<br/>
    <input type="email" name="email" placeholder="abc@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required><br/><br/>
        
    Birthday:<br/>
    <input type="date" name="day" required><br/><br/>
     
	User Type: <select name="type" required>
	<option>Chef</option>
	</select>
	<br><br>
    Password:<br/>
    <input type="password" name="Password" placeholder="Enter your Password"  required><br/><br/>
        
  
    <br>
    <input type="checkbox" class="inputStyle" id="checkBox" onclick="enableButton()">Accept Privacy Policy and Terms<br/><br/>
	<center><br><br>
    <input type="submit" value="Add">
	</center>	
	</form>	
   </div>

</body>
</html>