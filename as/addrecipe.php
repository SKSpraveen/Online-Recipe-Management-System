<?php
$servername = "localhost";
$username = "root";
$password = "sasindu";
$dbname = "recipe";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$recipeName = $_POST['recipeName'];
$ingredients = $_POST['ingredients'];
$method = $_POST['method'];

// Upload image
$targetDir = "uploads";  // Image save path
$imageName = basename($_FILES["recipeImage"]["name"]);
$targetFile = $targetDir . $imageName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$query = "INSERT INTO recipes (recipeName, ingredients, method, recipeImage) VALUES ('$recipeName', '$ingredients', '$method', '$imageName')";

if (mysqli_query($conn, $query)) {
    echo "Recipe added successfully.";
	header("location:Recipeadd.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



