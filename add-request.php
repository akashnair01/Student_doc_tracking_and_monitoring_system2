<?php

include "db.php";


$reg_no = $_POST['reg_no'];
$document_type = $_POST['document_type'];
$submission_date = $_POST['submission_date'];

$sql = "INSERT INTO requests
(reg_no, document_type, status, submission_date)
VALUES
('$reg_no', '$document_type', 'Submitted', '$submission_date')";

if(mysqli_query($conn, $sql)){
    echo "Request Saved Successfully ✅";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>