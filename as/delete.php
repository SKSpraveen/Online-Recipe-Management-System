<?php
	include"connection.php";
	$id=$_GET['id'];
	$query="DELETE FROM user WHERE id=$id";
	$result= mysqli_query($conn,$query);
	if($result){
		header("location:allChefs.php");
	}
?>