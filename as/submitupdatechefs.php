<?php
session_start();
include_once 'connection.php';

if (isset($_GET['submit'])) {
    $ID = $_SESSION['user_id'];
    $UName = $_GET['name'];
    $MNumber = $_GET['phone_number'];
    $Email = $_GET['email'];
    $DOB = $_GET['birthday'];
    $Password = $_GET['password'];

    $query = "UPDATE `user` SET 
    `User_Name`='$UName',
    `Mobile_Number`='$MNumber',
    `Email`='$Email',
    `DOB`='$DOB',
    `Password`='$Password' WHERE id=$ID";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated!!')</script>";
header("Location: chefdashboard.php");
    } else {
        echo "<script>alert('Error in Update')</script>";
    }
}

mysqli_close($conn);
?>