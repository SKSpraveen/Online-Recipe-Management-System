<?php
	include"connection.php";
	$fid=$_GET['fid'];
	$query="DELETE FROM feedback WHERE FID=$fid";
	$result= mysqli_query($conn,$query);
	if($result){
		header("location:allFeedback.php");
	}
?>