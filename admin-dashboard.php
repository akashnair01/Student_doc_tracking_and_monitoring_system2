<?php

include "db.php";

// TOTAL REQUESTS
$total = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests"
))['c'];

// SUBMITTED
$submitted = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='Submitted'"
))['c'];

// OFFICE RECEIVED
$office = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='Office Received'"
))['c'];

// HOD REVIEW
$hod_review = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='HOD Review'"
))['c'];

// HOD APPROVED
$hod_approved = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='HOD Approved'"
))['c'];

// PRINCIPAL REVIEW
$principal_review = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='Principal Review'"
))['c'];

// PRINCIPAL APPROVED
$principal_approved = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='Principal Approved'"
))['c'];

// READY
$ready = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as c FROM requests WHERE status='Ready For Collection'"
))['c'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link rel="stylesheet" href="admin-dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="sidebar">

    <h2>📄 SDTMS</h2>

    <ul>

    <li>
        <a href="admin-dashboard.html" style="text-decoration:none;color:white;">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>
    </li>

    <li>
        <a href="add-request.html" style="text-decoration:none;color:white;">
            <i class="fa-solid fa-plus"></i> Add Request
        </a>
    </li>

    <li>
        <a href="update-status.html" style="text-decoration:none;color:white;">
            <i class="fa-solid fa-rotate"></i> Update Status
        </a>
    </li>

    <li>
        <a href="collection.php" style="text-decoration:none;color:white;">
            <i class="fa-solid fa-calendar"></i> Collection Details
        </a>
    </li>

    <li>
    <a href="admin-logout.php" style="color:white;text-decoration:none;">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
</li>

</ul>
<div class="main"></div>
</div>



    <div class="header">
        <h1>👨‍💼 Admin Dashboard</h1>
    </div>

    <div class="cards"></div>

   <div class="box">
   <h3>Submitted</h3>
   <p><?php echo $submitted; ?></p>
</div>

<div class="box">
   <h3>Office Received</h3>
   <p><?php echo $office; ?></p>
</div>

<div class="box">
   <h3>HOD Review</h3>
   <p><?php echo $hod_review; ?></p>
</div>

<div class="box">
   <h3>HOD Approved</h3>
   <p><?php echo $hod_approved; ?></p>
</div>

<div class="box">
   <h3>Principal Review</h3>
   <p><?php echo $principal_review; ?></p>
</div>

<div class="box">
   <h3>Principal Approved</h3>
   <p><?php echo $principal_approved; ?></p>
</div>

<div class="box">
   <h3>Ready For Collection</h3>
   <p><?php echo $ready; ?></p>
</div>

</div>

   


</body>
</html>