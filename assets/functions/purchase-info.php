<?php
include('assets/includes/db.php');
$BL = $_GET["BL"];

$query = "SELECT * FROM purchase WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$query = "SELECT * FROM jobs WHERE BL ='$BL'";
$result = mysqli_query($conn, $query);

$job = mysqli_fetch_assoc($result);


?>
