<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Recipe</title>
  <link rel="stylesheet" type="text/css" href="style/addrecipe.css">
  <script src="addrec.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>

  <!-- top navigation bar -->

<header>
        <div class="navbar">
            <div class="logo">
                <img src="images/ck.jpg" alt="Logo">
            </div>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
                <li><a href="recipe.php">Recipes</a></li>
                <li><a href="buynow.html">Buy Now</a></li>
            </ul>
        </div>
    </header>

    <!-- add recipe form -->

  <div class="rtit">
    <h1>Add Recipes</h1>
  </div>

  <div class="addrec">
    <form action="addrecipe.php" method="post" enctype="multipart/form-data">
      <label for="recipeName">Recipe Name:</label>
      <br>
      <input type="text" id="recipeName" name="recipeName" required>
      <br><br>

      <label for="ingredients">Ingredients:</label>
      <br>
      <textarea id="ingredients" name="ingredients" rows="4" required></textarea>
      <br><br>

      <label for="method">Method:</label>
      <br>
      <textarea id="method" name="method" rows="4" required></textarea>
      <br><br>

      <label for="recipeImage">Image:</label>
      <br>
      <input type="file" id="recipeImage" name="recipeImage">
      <br><br>

      <input type="submit" value="Add Recipe">
    </form>
  </div>

<!-- edit/delete recipe section -->

<div class="editrec">
  <div class="etit">
    <h1>Edit Recipes/Delete Recipes</h1>
  </div>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "sasindu";
  $dbname = "recipe";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM recipes";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $recipeId = $row['id'];
      $recipeName = $row['recipeName'];
      $ingredients = $row['ingredients'];
      $method = $row['method'];

      echo '<div class="recipe-details">';
      echo '<h2>Recipe Details</h2>';
      echo '<form action="updaterecipe.php" method="post">';
      echo '<input type="hidden" name="recipeId" value="' . $recipeId . '">';

      echo '<div class="form-group">';
      echo '<label for="recipeName">Recipe Name:</label>';
      echo '<input type="text" id="recipeName" name="recipeName" value="' . $recipeName . '" required>';
      echo '</div>';

      echo '<div class="form-group">';
      echo '<label for="ingredients">Ingredients:</label>';
      echo '<textarea id="ingredients" name="ingredients" rows="4" required>' . $ingredients . '</textarea>';
      echo '</div>';

      echo '<div class="form-group">';
      echo '<label for="method">Method:</label>';
      echo '<textarea id="method" name="method" rows="4" required>' . $method . '</textarea>';
      echo '</div>';

      echo'<form action="Recipeadd.php" method="post">';
	  echo '<input type="submit" name="editRecipe" value="Update">';
      echo '</form>';

      echo '<form action="deleterecipe.php" method="post">';
      echo '<input type="hidden" name="recipeId" value="' . $recipeId . '">';
      echo '<input type="submit" name="deleteRecipe" value="Delete">';
      echo '</form>';

      echo '</div>';
    }
  } else {
    echo '<div class="recipe-details">';
    echo '<p>No recipes found.</p>';
    echo '</div>';
  }

  $conn->close();
  ?>
</div>

  <footer>
<h5 style="color:white; margin-left: 40px;" >BakingDaddy <br>16/9 Meta Road,Colombo06</h5>


<ul class="footerIcons">
	<li><a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></li></a>
	<li><a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></li></a>
	<li><a href="https://twitter.com/"><ion-icon name="logo-twitter"></ion-icon></li></a>
</ul>

<ul class="footerMenu">
	<li class="footerNav"><a href="contactus.html">Contact us</a></li>
	<li class="footerNav"><a href="terms & conditions">Terms & conditions</a></li>
	<li class="footerNav"><a href="feedback.html">Feedback</a></li>
</ul>
</footer> 
</body>
</html>
