<?php

$query = "SELECT * FROM invoice ORDER BY `date` DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
        <td>".$row["date"]."</td>
        <td>".$row["commodity"]."</td>
        <td>".$row["Consignee_name"]."</td>
        <td>".$row["invoice_no"]."</td>
        <td>₹ ".$row["total_amount"]."</td>
        <td class='Completed'>Completed</td>
    </tr>";
}

?>