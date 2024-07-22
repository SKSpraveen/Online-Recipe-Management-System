<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    //header('Location: logidn.html'); // Redirect to the login page or any other page
    exit;
}

// Retrieve user data from the database

require_once 'connect.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    // Sanitize inputs (You can use additional validation if needed)

    $name = mysqli_real_escape_string($connection, $name);
    $mobile = mysqli_real_escape_string($connection, $mobile);

    // Update the user's details in the database

    $query = "UPDATE user SET User_Name='$name', Mobile_Number='$mobile' WHERE id='$user_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $user['User_Name'] = $name;
        $user['Mobile'] = $mobile;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style/userprofilestyle.css">
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
                <li><a href="recipe.php">Recipes</a></li>
                <li><a href="buynow.html">Buy Now</a></li>
            </ul>
        </div>
    </header>


    <div class="container">
        <h2>Welcome, <?php echo $user['User_Name']; ?>!</h2>
        <p>Email: <?php echo $user['Email']; ?></p>
        <hr>
        <h3>User Details</h3>
        <p><strong>Name:</strong> <?php echo $user['User_Name']; ?></p>
        <p><strong>Mobile:</strong> <?php echo $user['Mobile_Number']; ?></p>
        <hr>
        <h3>Update User Details</h3>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Name" value="<?php echo $user['User_Name']; ?>" required><br>
            <input type="text" name="mobile" placeholder="Mobile" value="<?php echo $user['Mobile_Number']; ?>" required><br>
            <input type="submit" value="Submit">
        </form>
        <hr>
        <a href="logout.php">Logout</a>
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
            <li class="footerNav"><a href="feedback.html">FAQs</a></li>
        </ul>
        </footer> 

</body>
</html>
