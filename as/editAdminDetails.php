<?php
	include'connection.php';
	$id=$_GET['id'];
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$UserName=$_POST['firstname'];
		$Mobile=$_POST['mobile'];
		$Email=$_POST['email'];
		$DOB=$_POST['day'];
		$UserType=$_POST['type'];
		$Password=$_POST['Password'];
		
		$query="UPDATE user SET `User_Name`='$UserName',`Mobile_Number`='$Mobile',`Email`='$Email',`DOB`='$DOB' WHERE id=$id";
		$result=mysqli_query($conn,$query);

		if($result){
			header("location:adminPage.php?msg=Data update successfully");
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
    <h1>Edit Admin Details</h1>
</center>

<?php 
	$query="SELECT * FROM user WHERE id=$id LIMIT 1";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);
?>

<form  method="POST">
	
    User Name:<br/>
    <input type="text" name="firstname" value="<?php echo $row['User_Name'] ?>"  required><br/><br/>
        

    Mobile Number:<br/>
    <input type="phone" name="mobile" value="<?php echo $row['Mobile_Number'] ?>"  pattern="[0-9]{10}" required><br/><br/>
        
    e-mail:<br/>
    <input type="email" name="email" value="<?php echo $row['Email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required><br/><br/>
        
    Birthday:<br/>
    <input type="date" name="day" value="<?php echo $row['DOB'] ?>" required><br/><br/>
     
	User Type: <select name="type" required>
	<option>admin</option>
	</select>
	<br><br>
    Password:<br/>
    <input type="password" name="Password" value="<?php echo $row['Password'] ?>"  required><br/><br/>
        
  
    <br>
    <input type="checkbox" class="inputStyle" id="checkBox" onclick="enableButton()">Accept Privacy Policy and Terms<br/><br/>
	<center><br><br>
    <input type="submit" value="Update">
	</center>	
	</form>	
   </div>

</body>
</html>