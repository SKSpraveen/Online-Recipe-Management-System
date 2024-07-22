<?php
session_start();

include("connection.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: logidn.html'); // Redirect to the login page or any other page
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve user data from the database
$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserName = $_POST['firstname'];
    $Mobile = $_POST['mobile'];
    $Email = $_POST['email'];
    $DOB = $_POST['day'];
    $UserType = $_POST['type'];
    $Password = $_POST['Password'];

    $updateQuery = "UPDATE user SET User_Name='$UserName', Mobile_Number='$Mobile', Email='$Email', DOB='$DOB', User_Type='$UserType', Password='$Password' WHERE id='$user_id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Update successful
        echo "<script type='text/javascript'>alert('Successfully updated profile')</script>";
        // Refresh the page to display updated data
        echo "<script type='text/javascript'>window.location.href='userprofile.php';</script>";
        exit;
    } else {
        echo "<script type='text/javascript'>alert('Failed to update profile')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        /* Add your own styles here */
    </style>
</head>
<body>
    <h1>User Profile</h1>
    <form method="POST" action="">
        <label for="firstname">Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $user['User_Name']; ?>" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $user['Mobile_Number']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" required><br>

        <label for="day">Date of Birth:</label>
        <input type="date" id="day" name="day" value="<?php echo $user['DOB']; ?>" required><br>

        <label for="type">User Type:</label>
        <input type="text" id="type" name="type" value="<?php echo $user['User_Type']; ?>" required><br>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" value="<?php echo $user['Password']; ?>" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
