<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$searchRecipe = $_POST['searchRecipe'];

$sql = "SELECT * FROM recipes WHERE recipeName LIKE '%$searchRecipe%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $recipeId = $row['id'];
  $recipeName = $row['recipeName'];
  $ingredients = $row['ingredients'];
  $method = $row['method'];
} else {
  echo 'No recipe found.';
}

$conn->close();
?>
