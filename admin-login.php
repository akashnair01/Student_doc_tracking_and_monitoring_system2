<?php

include "db.php";

if(isset($_POST['admin_id']) && isset($_POST['password']))
{
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins
            WHERE admin_id='$admin_id'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: admin-dashboard.php");
        exit();
    }
    else
    {
        echo "<h3 style='color:red;text-align:center;margin-top:50px;'>Invalid Login ❌</h3>";
    }
}

?>