<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.php'); // Redirect to the login page or any other page
    exit;
}

// Retrieve user data from the database

require_once 'connection.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];

    // Sanitize inputs (You can use additional validation if needed)

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $mobile = mysqli_real_escape_string($conn, $mobile);

    // Update the user's details in the database

    $query = "UPDATE user SET User_Name='$name', Email='$email', Mobile_Number='$mobile', DOB='$dob' WHERE ID='$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) 
    {
        $user['User_Name'] = $name;
        $user['Email'] = $email;
        $user['Mobile'] = $mobile;
	$user['DOB'] = $dob;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/userDashstyle.css">
<style>
body{
  background-image:url("images/aboutusimg.jpeg");
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	opacity:190%;
}
</style>
    
</head>
<body>
    <div id="background">
    <div class="container">
        
        <h2>Welcome, <?php echo $user['User_Name']; ?>!</h2>
        <p>Email: <?php echo $user['Email']; ?></p>
        <hr>
        <h3>User Details</h3>
        <p><strong>Name:</strong> <?php echo $user['User_Name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
        <p><strong>Mobile:</strong> <?php echo $user['Mobile_Number']; ?></p>
        <p><strong>Birthday:</strong> <?php echo $user['DOB']; ?></p>
		<button style="background-color:blue;border-radius:4px"><a style="text-decoration:none; color:white "href="homepage.html">To Homepage</a></button> 
        <hr>
        <h3>Update User Details</h3>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Name" value="<?php echo $user['User_Name']; ?>" required><br>
            <input type="text" name="email" placeholder="Email" value="<?php echo $user['Email']; ?>" required><br>
            <input type="text" name="mobile" placeholder="Mobile" value="<?php echo $user['Mobile_Number']; ?>" required><br>
	    Birthday : <input type="date" name="dob" placeholder="Birthday" value="<?php echo $user['DOB']; ?>" required><br>
<br>
            <input type="submit" value="Submit">
        </form>
        <hr>
        <a href="logout.php">Logout</a>
        <br><br>
        <a href="deleteUser.php">Delete Account</a>
    </div>
    </div>
</body>
</html>
