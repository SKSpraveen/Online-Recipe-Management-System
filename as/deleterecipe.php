<?php
if (isset($_POST['deleteRecipe'])) {
  $recipeId = $_POST['recipeId'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "recipe";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM recipes WHERE id = '$recipeId'";

  if ($conn->query($sql) === TRUE) {
    echo "Recipe deleted successfully.";
	header("location:Recipeadd.php");
  } else {
    echo "Error deleting recipe: " . $conn->error;
  }

  $conn->close();
}
?>
