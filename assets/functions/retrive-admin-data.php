<?php

if(!isset($_COOKIE["user"] )){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}

include('assets/includes/db.php');

$query="SELECT * FROM user";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
if($row["type"] == "admin"){
    echo "<tr>
    <td>".$row["name"]."</td>
    <td>".$row["login"]."</td>
    <td>".$row["password"]."</td>
    <td><a href='assets/functions/delete-user.php?id=".$row["login"]."'>DELETE</a> | <a href='assets/functions/reset-user.php?id=".$row["login"]."'>RESET</a></td>
</tr>";
}


?>