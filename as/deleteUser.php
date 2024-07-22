<?php
if (isset($_POST['deleteUser'])) {
  $recipeId = $_POST['ID'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "recipe";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM user WHERE id = '$ID'";

  if ($conn->query($sql) === TRUE) {
    echo "User account deleted successfully.";
  } else {
    echo "Error deleting user: " . $conn->error;
  }

  $conn->close();
}
?>