<?php
$user = $_COOKIE["user"];
$query = "SELECT * FROM jobs WHERE user = '$user' ORDER BY BL DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    $e = $row["BL"];
    echo "<tr>
    <td>".$row["dateOfIssue"]."</td>
    <td>".$row["conName"]."</td>
        
        <td>".$e."</td> 
        <td><a href='edit-job.php?BL=".$e."'>job_".$e."</a></td>
        <td><a href='edit-purchase.php?BL=".$e."'>purchase_".$e."</a></td>
        <td><a href='edit-invoice.php?BL=".$e."'>invoice_".$e."</a></td>";
    if($row["paymentStatus"] == "pending"){
        echo "<td>".$row["paymentStatus"]."<form action='assets/functions/complete-payment.php' method='post'>
        <input type='hidden' name='complete' value='".$e."'> <button type='submit' name='submit'>Complete</button>
    </form></td>";
    }
    else{
        echo "<td>".$row["paymentStatus"]."</td>";
    }
        
    "</tr>";
}


?>

