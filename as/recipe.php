<!--recipe page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" type="text/css" href="style/recipes.css">
    <script src="recipe.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/ck.jpg" alt="Logo">
            </div>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
                <li><a href="#recipes">Recipes</a></li>
                <li><a href="buynow.html">Buy Now</a></li>
            </ul>
        </div>
    </header>

    <section class="all-content">

         <!--side bar-->

    <div class="side-cat">
        <ul class="cat-list">
            <li class="list-item">
                <a onclick="scrollToSection('popular-recipes')">
                    <div class="it-cont">
                        <div class="it-title">
                        <span>POPULAR RECIPES</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list-item">
                <a onclick="scrollToSection('quick-recipes')">
                    <div class="it-cont">
                        <div class="it-title">
                        <span>QUICK RECIPES</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list-item">
                <a onclick="scrollToSection('seasonal-recipes')">
                    <div class="it-cont">
                        <div class="it-title">
                        <span>SEASONAL RECIPES</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list-item">
                <a onclick="scrollToSection('non-veg-recipes')">
                    <div class="it-cont">
                        <div class="it-title">
                        <span>NON-VEGETARIAN RECIPES</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list-item">
                <a onclick="scrollToSection('veg-recipes')">
                    <div class="it-cont">
                        <div class="it-title">
                        <span>VEGETARIAN RECIPES</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>

  <!--Searh box-->

    <div class="search-container">
      <form action="" method="post">
        <input type="text" name="recipeName" placeholder="Search Recipe">
        <input type="submit" value="Search">
      </form>
    </div>
    
    <div class="recipe-container">
    <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeName = $_POST['recipeName'];

    $servername = "localhost";
    $username = "root";
    $password = "sasindu";
    $dbname = "recipe";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM recipes WHERE recipeName LIKE '%" . $recipeName . "%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='recipe'>";
        echo "<img src='images/recipe.jpg' alt='Default Image'>";
        echo "<h3>" . $row['recipeName'] . "</h3>";
        echo "<p class='ing'>Ingredients: " . $row['ingredients'] . "</p>";
        echo "<p class='ing'>Method: " . $row['method'] . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p>No recipes found.</p>";
    }

    mysqli_close($conn);
  }
?>
    </div>

 <!-- Image slider -->

<div class="slideshow-container">
    <!-- Slide counter -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/slider1.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/slider2.png" style="width:100%; height:100%;">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="images/slider3.jpg" style="width:100%">
    </div>

    <!-- Next and previous buttons -->
    <a id="prev" onclick="plusSlides(-1)" class="prev">&#10094;</a>
    <a id="next" onclick="plusSlides(1)" class="next">&#10095;</a>

    <!-- The dots/circles -->
    <div class="beacons" style="text-align:center">
        <span id="d-one" class="dot" onclick="currentSlide(1)"></span>
        <span id="d-two" class="dot" onclick="currentSlide(2)"></span>
        <span id="d-three" class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

  <!--image slider end-->



    <div class="content">

        <div class="section" id="popular-recipes">
            <h2 class="cat">Popular Recipes</h2>
            <div class="image-row">
                <div class="image-container">
                  <img src="images/recipe.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details :</h4>
                    <div class="recipe-content">
                      <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                      <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                    </div>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe2.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe3.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe 3 Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
            </div>
            
        </div>
          
        <div class="section" id="quick-recipes">
            <h2 class="cat">Quick Recipes</h2>
            <div class="image-row">
                <div class="image-container">
                  <img src="images/recipe4.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details :</h4>
                    <div class="recipe-content">
                      <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                      <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                    </div>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe5.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe6.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe 3 Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
            </div>
        </div>

        <div class="section" id="seasonal-recipes">
            <h2 class="cat">Seasonal Recipes</h2>
            <div class="image-row">
                <div class="image-container">
                  <img src="images/recipe7.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details :</h4>
                    <div class="recipe-content">
                      <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                      <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                    </div>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe8.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe9.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe 3 Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
            </div>
        </div>

        <div class="section" id="non-veg-recipes">
            <h2 class="cat">Non-vegetarian Recipes</h2>
            <div class="image-row">
                <div class="image-container">
                  <img src="images/recipe10.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details :</h4>
                    <div class="recipe-content">
                      <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                      <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                    </div>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe11.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe12.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe 3 Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
            </div>
        </div>

        <div class="section" id="veg-recipes">
            <h2 class="cat">Vegetarian Recipes</h2>
            <div class="image-row">
                <div class="image-container">
                  <img src="images/recipe13.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details :</h4>
                    <div class="recipe-content">
                      <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                      <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                    </div>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe14.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
                
                <div class="image-container">
                  <img src="images/recipe15.jpg" alt="Image 1">
                  <div class="image-text">Recipe X</div>
                  <button class="quick-view-btn">View</button>
                  <div class="product-preview-popup">
                    <h4>Recipe 3 Details</h4>
                    <p>Ingredients: xxxxxx, xxxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx, xxxxxxxxxx.</p>
                    <p>Method: yyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyyyyyyyyyyy. yyyyyyyyyyyy.yyyyyyyyyyyyyyyyyyy.</p>
                  </div>
                </div>
            </div>
    </div>
    </section>

    <footer>
<image style="float:left;margin-left:3%" src="images/logo.png" width="7%">
<h5 style="color:white">BakingDaddy <br>16/9 Meta Road,Colombo06</h5>


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


