<?php
	include"connection.php";

$ID = $_GET['id'];

if (isset($ID)) {

    $sql = "DELETE FROM `user` WHERE $ID=`ID`";


    if ($conn->query($sql)) {
        echo 'Deleted Sucsessful';
    } else {
        echo "Error :" . $conn->error;
    }

    header("Location:homepage.html");
    exit();
}
