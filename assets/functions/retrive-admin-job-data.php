<?php

include('assets/includes/db.php');

$query = "SELECT * FROM jobs ORDER BY dateOfIssue DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
        <td>".$row["dateOfIssue"]."</td>
        <td>".$row["conName"]."</td>
        <td><a href='edit-job.php?BL=".$row["BL"]."'>job_".$row["BL"]."</a></td>
        <td><a href='edit-purchase.php?BL=".$row["BL"]."'>purchase_".$row["BL"]."</a></td>
        <td><a href='edit-invoice.php?BL=".$row["BL"]."'>invoice_".$row["BL"]."</a></td>
        <td>".$row["paymentStatus"]."</td>
        <td>".$row["user"]."</td>
        <td><a href='job-pnl-report.php?BL=".$row["BL"]."'>Veiw PnL report</a></td>
    </tr>"; 
}

?>