<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "db.php";

if(isset($_POST['reg_no']))
{
    $reg_no = $_POST['reg_no'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students
            WHERE reg_no='$reg_no'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['reg_no'] = $row['reg_no'];
        $_SESSION['student_name'] = $row['student_name'];

        header("Location: dasboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Register Number or Password');</script>";
    }
}
?>
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDTMS Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="left-section">
        <h1>SDTMS</h1>
        <h2>Student Document Tracking & Monitoring System</h2>
        <p>
            Track Bonafide Certificates and OD Forms
            in Real-Time with Transparency and Ease.
        </p>
    </div>

    <div class="login-card">

        <h2>Student Login</h2>

        <form  method="POST">

            <input type="text"
                   name="reg_no"
                   placeholder="Register Number"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <button type="submit">Login</button>

        </form>

    </div>

</div>

</body>
</html>