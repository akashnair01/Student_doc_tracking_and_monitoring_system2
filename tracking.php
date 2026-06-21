<?php
include "db.php";

$status = "";
$document_type = "";
$reg_no = "";
$collection_date = "";
$collection_time = "";
$location = "";
$remarks="";

if(isset($_POST['reg_no']))
{
    $reg_no = $_POST['reg_no'];

    $sql = "SELECT * FROM requests
            WHERE reg_no='$reg_no'
            ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($conn,$sql);

    if($result && mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        $document_type = $row['document_type'];
        $status = $row['status'];
        $remarks= $row['remarks'];

$request_id = $row['id'];

$collection_sql = "SELECT * FROM collection_details
                   WHERE request_id='$request_id'
                   LIMIT 1";

$collection_result = mysqli_query($conn,$collection_sql);

if($collection_result && mysqli_num_rows($collection_result) > 0)
{
    $collection = mysqli_fetch_assoc($collection_result);

    $collection_date = $collection['collection_date'];
    $collection_time = $collection['collection_time'];
    $location = $collection['location'];
}
    }
    else
    {
        $document_type = "-";
        $status = "Request Not Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Tracking</title>

<link rel="stylesheet" href="tracking.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📍 Document Tracking</h1>
        <p>Track Bonafide & OD Form Status</p>
    </div>

    <form method="POST">
        <input type="text" name="reg_no" placeholder="Enter Register Number" required>
        <button type="submit">Search Status</button>
    </form>

    <div class="status-card">

        <h2><?php echo $document_type; ?></h2>

        <p><strong>Register No:</strong> <?php echo $reg_no; ?></p>

        <p><strong>Current Status:</strong> <?php echo $status; ?></p>

        <?php if($status == "Rejected") { ?>

<p style="color:red;">
    <strong>❌ Remarks:</strong>
    <?php echo $remarks; ?>
</p>

<?php } ?>
<?php if($status == "Ready For Collection") { ?>

<p><strong>📅 Collection Date:</strong>
<?php echo $collection_date; ?></p>

<p><strong>⏰ Collection Time:</strong>
<?php echo $collection_time; ?></p>

<p><strong>📍 Location:</strong>
<?php echo $location; ?></p>

<?php } ?>
    </div>

   <?php


 $steps = [      
    "Submitted" => "📝",
    "Office Received" => "🏢",
    "HOD Review" => "👨‍🏫",
    "HOD Approved" => "✅",
    "Principal Review" => "🏛️",
    "Principal Approved" => "📌",
    "Ready For Collection" => "📄"
     ];

$statusIndex = array_search($status, array_keys($steps));

?>

<div class="timeline">

<?php
$i = 0;

foreach($steps as $step => $icon)
{
    $active = ($statusIndex !== false && $i <= $statusIndex);
?>

    <div class="step <?php echo $active ? 'active' : ''; ?>">

        <?php echo $active ? '✔️' : '⬜'; ?>

        <span class="icon"><?php echo $icon; ?></span>

        <span class="text"><?php echo $step; ?></span>

    </div>

<?php
    $i++;
}
?>

</div>

</body>
</html>