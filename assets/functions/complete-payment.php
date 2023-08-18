<?php

include('../includes/db.php');

$BL = $_POST["complete"];

$query = "UPDATE jobs SET paymentStatus = 'complete' WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Marked payment for $BL as completed";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);


header("Location: ../../job-data.php");
?>