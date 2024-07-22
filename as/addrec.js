document.getElementById("editRecipeButton").addEventListener("click", function() {
    // Redirect to the edit recipe page, passing the recipe ID as a query parameter
    window.location.href = "updaterecipe.php?id=" + <?php echo $recipeId; ?>;
  });
  
  document.getElementById("deleteRecipeButton").addEventListener("click", function() {
    // Redirect to the delete recipe page, passing the recipe ID as a query parameter
    window.location.href = "delete_recipe.php?id=" + <?php echo $recipeId; ?>;
  });
  