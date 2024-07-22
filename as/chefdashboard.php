<?php
session_start();

if (isset($_GET['msg'])) {
  echo '<script> alert ("Successfully Updated") </script>';
} else if (isset($_GET['msg1'])) {
  echo '<script>  alert("Your Username is Already Exist.Please refill the form with unique User Name.");</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/chefdashboard.css">
  <title>Chef Page</title>
  <style>

</style>
</head>

<body>


  <div>
    <center>
      <h1 style="margin-left: 10px">WELCOME 
      </h1>
      <h2 style="margin-left: 10px">Chef Dashboard </h2>
    </center>
  </div>
  <br>
  <div>
  <button style="float:right;margin-left:80%; width:8%" type="submit"><a href="logOut.php">Log out</button>
  </div>
  <br><br>
  <div>
    <center>
      <img src="images/chefpfp.png">
    </center>
  </div>
  <br><br>
  <div class="topb">
    <center>
      <button style="background-color:blue"><a style="color:white; text-decoration:none;" href="recipe.php">Recipes</a></button>
      <button style="background-color:blue"><a style="color:white; text-decoration:none" href="Recipeadd.php">Add Recipes</a></button>
    </center>
  </div>
  <br><br>
</body>
<?php include"connection.php"; 

$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE ID = '$userID'";
$result = $conn->query($sql);
echo ("<table cellpadding='1' class='admintable' border='1'>");
echo ("<tr>");
echo ("<th>" . "ID" . "</th>");
echo ("<th>" . "User Name" . "</th>");
echo ("<th>" . "DOB" . "</th>");
echo ("<th>" . "Email" . "</th>");
echo ("<th>" . "Mobile Number" . "</th>");
echo ("<th>" . "Activity" . "</th>");
echo ("</tr>");

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo ("<tr>");
    echo ("<td>" . $row["ID"] . "</td>");
    echo ("<td>" . $row["User_Name"] . "</td>");
    echo ("<td>" . $row["DOB"] . "</td>");
    echo ("<td>" . $row["Email"] . "</td>");
    echo ("<td>" . $row["Mobile_Number"] . "</td>");
    echo ("<td>" . "<a id='deletelink' href=deleteachefaccount.php?id=" . $row['ID'] . ">" . "Delete" . "</a>" . "<a id='editlink' href=editchefprofile.php?id=" . $row['ID'] . ">" . "Update" . "</a>" . "</td>");
    echo ("</tr>");
  }
  echo ("</table>");
}
$conn->close();

?>

</html>