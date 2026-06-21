<?php

include "db.php";

if(isset($_POST['reg_no']))
{
    $reg_no = $_POST['reg_no'];
    $student_name = $_POST['student_name'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password)
    {
        $check = mysqli_query($conn,
        "SELECT * FROM students WHERE reg_no='$reg_no'");

        if(mysqli_num_rows($check) == 0)
        {
            mysqli_query($conn,
            "INSERT INTO students
            (reg_no, student_name, department, password)
            VALUES
            ('$reg_no','$student_name','$department','$password')");

            echo "<script>alert('Registration Successful');</script>";
        }
        else
        {
            echo "<script>alert('Register Number Already Exists');</script>";
        }
    }
    else
    {
        echo "<script>alert('Passwords Do Not Match');</script>";
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4);
}

.register-box{
    width:400px;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.register-box h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

.input-box{
    margin-bottom:15px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
}

.input-box input:focus{
    border-color:#4f46e5;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#4f46e5;
    color:white;
    font-size:16px;
    cursor:pointer;
}

.btn:hover{
    background:#3730a3;
}

.login-link{
    text-align:center;
    margin-top:15px;
}

.login-link a{
    text-decoration:none;
    color:#4f46e5;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="register-box">

    <h2>🎓 Student Registration</h2>

    <form method="POST">

        <div class="input-box">
            <input type="text" name="reg_no" placeholder="Register Number" required>
        </div>

        <div class="input-box">
            <input type="text" name="student_name" placeholder="Student Name" required>
        </div>

        <div class="input-box">
            <input type="text" name="department" placeholder="Department" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input-box">
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn">
            <i class="fa-solid fa-user-plus"></i>
            Register
        </button>

    </form>

    <div class="login-link">
        Already have an account?
        <a href="index.html">Login</a>
    </div>

</div>

</body>
</html>