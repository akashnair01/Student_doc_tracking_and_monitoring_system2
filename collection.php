<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include "db.php";

if(isset($_POST['reg_no']))
{
    $request_id = $_POST['request_id'];
    $collection_date = $_POST['collection_date'];
    $collection_time = $_POST['collection_time'];
    $location = $_POST['location'];

    $sql = "INSERT INTO collection_details
    (request_id, collection_date, collection_time, location)
    VALUES
    ('$request_id','$collection_date','$collection_time','$location')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Collection Details Saved Successfully');</script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Collection Details</title>

<link rel="stylesheet" href="collection.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container">

    <div class="collection-card">

        <h1>📅 Collection Details</h1>

        <form method="POST">

     <input type="text"
     name="reg_no"
    placeholder="Register Number"
    required>

    <input type="text"
    name="request_id"
    placeholder="Request ID"
    required>

    <input type="date"
    name="collection_date"
    required>

    <input type="time"
    name="collection_time"
    required>

    <input type="text"
    name="location"
    placeholder="Collection Location"
    required>

    <button type="submit">
        <i class="fa-solid fa-floppy-disk"></i>
        Save Details
    </button>



        </form>

    </div>

</div>

</body>
</html>