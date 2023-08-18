<?php
include("../includes/db.php");
$desp = $_POST["desp"];
$cgst = $_POST["cgst"];
$sgst = $_POST["sgst"];
$igst = $_POST["igst"];
$hsn = $_POST["hsn"];
$changeDesp = $_POST["desp-change"];

$query = "UPDATE product_hsn SET desp = '$changeDesp', HSN = '$hsn', cgst = ".$cgst.", sgst = ".$sgst.", igst = ".$igst." WHERE desp = '".$desp."'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$idesp = "Changed tax information for $desp";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$idesp')";
$result = mysqli_query($conn, $query);

header("Location: ../../add-HSN.php");
?>