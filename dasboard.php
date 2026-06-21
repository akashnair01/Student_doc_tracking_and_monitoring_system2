<?php
session_start();
if(!isset($_SESSION['reg_no']))
{
    header("Location: index.php");
    exit();
}

include "db.php";

$reg_no = $_SESSION['reg_no'];

$request = mysqli_query($conn,"
SELECT *
FROM requests
WHERE reg_no='$reg_no'
ORDER BY id DESC
LIMIT 1
");

$data = mysqli_fetch_assoc($request);   
?>             

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>

<link rel="stylesheet" href="dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="sidebar">

    <h2>📄 SDTMS</h2>

    <ul>
        <li><i class="fa-solid fa-house"></i> Dashboard</li>
        

        <li>
            <a href="tracking.php?reg_no=<?php echo $_GET['reg_no'] ?? ''; ?>"
            style="color:white;text-decoration:none;">
                <i class="fa-solid fa-location-dot"></i> Track Status
            </a>
        </li>

       <li>
    <a href="student-logout.php" style="color:white;text-decoration:none;">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
</li>
    </ul>

</div>

<div class="main">

    <div class="topbar">
<h1>Welcome <?php echo $_SESSION['student_name']; ?> 👋</h1>

        <a href="tracking.php?reg_no=<?php echo $_GET['reg_no'] ?? ''; ?>"
        style="
        display:inline-block;
        margin-top:15px;
        padding:12px 20px;
        background:white;
        color:#4f46e5;
        text-decoration:none;
        border-radius:10px;
        font-weight:bold;">
        📍 Track Status
        </a>

    </div>

    <div class="cards">

    <div class="card">
        <i class="fa-solid fa-file-lines"></i>
        <h2><?php echo $data['document_type']; ?></h2>
        <p><?php echo $data['status']; ?></p>
    </div>

    <div class="card">
        <i class="fa-solid fa-location-dot"></i>
        <h2>Current Status</h2>
        <p><?php echo $data['status']; ?></p>
    </div>

</div>

   <div class="activity">

    <h2>Recent Activity</h2>

    <p>
        📄 Document :
        <?php echo $data['document_type']; ?>
    </p>

    <p>
        📍 Status :
        <?php echo $data['status']; ?>
    </p>

</div>
</div>

</body>
</html>