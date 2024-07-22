<?php
if (isset($_POST['editRecipe'])) {
  $recipeId = $_POST['recipeId'];
  $recipeName = $_POST['recipeName'];
  $ingredients = $_POST['ingredients'];
  $method = $_POST['method'];

  $servername = "localhost";
  $username = "root";
  $password = "sasindu";
  $dbname = "recipe";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE recipes SET recipeName='$recipeName', ingredients='$ingredients', method='$method' WHERE id=$recipeId";

  if ($conn->query($sql) === TRUE) {
    echo "Recipe updated successfully";
	header("location:Recipeadd.php");
  } else {
    echo "Error updating recipe: " . $conn->error;
  }

  $conn->close();
}
?>
