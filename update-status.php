<?php

include "db.php";

if(isset($_POST['reg_no']) && isset($_POST['status']))
{
    $reg_no = $_POST['reg_no'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE requests 
            SET status='$status',
                remarks='$remarks'
            WHERE reg_no='$reg_no'";

    if(mysqli_query($conn,$sql))
    {
        echo "Status Updated Successfully ✅";
    }
    else
    {
        echo "Error : " . mysqli_error($conn);
    }
}
else
{
    echo "Form Data Not Received";
}

?>