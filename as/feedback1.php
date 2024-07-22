<?php
    include_once'Connection.php';
?>
<?php

    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Phone_number=$_POST['Phone_number'];
    $Text=$_POST['Text'];
    

    $conn = new mysqli('localhost','root','sasindu','recipe');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(Name,Email,Phone_number,Text) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $Name, $Email, $Phone_number, $Text);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		header("location:feedback.html");
		$stmt->close();
		$conn->close();
	}



?>
