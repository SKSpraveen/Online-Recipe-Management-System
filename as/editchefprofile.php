<?php
session_start();
include_once 'connection.php';

$ID = $_SESSION['user_id'];
$query = "SELECT * FROM `user` WHERE id=$ID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$UName = $row['User_Name'];
$MNumber = $row['Mobile_Number'];
$Email = $row['Email'];
$DOB = $row['DOB'];
$Password = $row['Password'];

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/chefdashboard1.css">
    <title>Update Page</title>
</head>

<body>
    <center>
        <div>
            <form action="submitupdatechefs.php" method="GET" name="form">
                <div id="formdiv">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" value="<?php echo $UName; ?>" name="name"></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="text" value="<?php echo $MNumber; ?>" name="phone_number"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" value="<?php echo $Email; ?>" name="email"></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><input type="date" value="<?php echo $DOB; ?>" name="birthday"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" value="<?php echo $Password; ?>" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="submit"></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                </div>
            </form>
        </div>
    </center>
</body>

</html>