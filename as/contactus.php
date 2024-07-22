<?php 
include_once"connection.php";
echo"hi";

	if(isset($_POST["sub"])){
	$Name=$_POST["name"];
	$Email=$_POST["email"];
	$Phone=$_POST["number"];
	$Msg=$_POST["msg"];

$sql= "INSERT INTO contactus(`Name`, `Email`, `Phone_nO`, `Message`)VALUES('$Name','$Email','$Phone','$Msg')";
    if($conn->query($sql)){
        echo "Inserted successfully";
        header("location:contactus.html");
    }
    else{
        echo "Error:". $conn->error;
    }
	}
$conn->close();
?>
