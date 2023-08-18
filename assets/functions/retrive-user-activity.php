<?php
$query = "SELECT * FROM useractivity ORDER BY time DESC";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
        <td>".$row["time"]."</td>
        <td>".$row["user"]."</td>
        <td>".$row["desp"]."</td>
    </tr>";
}
?>