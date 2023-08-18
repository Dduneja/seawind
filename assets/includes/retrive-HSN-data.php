<?php

$query = "SELECT * FROM product_hsn ORDER BY HSN";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
            <td>'.$row['HSN'].'</td>
            <td>'.$row['desp'].'</td>
            <td>'.$row['cgst'].'%</td>
            <td>'.$row['sgst'].'%</td>
            <td>'.$row['igst'].'%</td>
            <td><button class="change" onclick="change(\''.$row["desp"].'\',\''.$row["HSN"].'\','.$row["cgst"].','.$row["sgst"].','.$row["igst"].')")>Change</button></td>
        </tr>';
}


?>