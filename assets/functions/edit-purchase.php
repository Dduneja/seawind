<?php

include('../includes/db.php');

include('numberToAmount.php');

$BL = $_POST["BL"];
$mbl = $_POST["mbl"];
$BLDate = $_POST["BL-date"];
$vessel = $_POST["vessel"];
$voyage = $_POST["voyage"];
$noContainer = (int)$_POST["noContainer"];
$POL = $_POST["pol"];
$POD = $_POST["pod"];
$arrivalDate = $_POST["arrival-date"];
$sailingDate = $_POST["sailing-date"];
$plr = $_POST["plr"];
$invoiceItemsIGST = serialize(json_decode($_POST["invoice-items-igst"]));
$invoiceItemsCGST = serialize(json_decode($_POST["invoice-items-cgst"]));
$accName = $_POST["acc-name"];
$accNo = $_POST["acc-no"];
$bankName = $_POST["bank-name"];
$branchName = $_POST["branch-name"];
$bankAdd = $_POST["bank-add"];
$ifsc = $_POST["ifsc"];

$query = "UPDATE purchase SET accName = '$accName', accNo = '$accNo', bankName = '$bankName', branchName = '$branchName', bankAdd = '$bankAdd', ifsc = '$ifsc', mbl = '$mbl', BLDate = '$BLDate', vessel = '$vessel', voyage = '$voyage', noContainer = $noContainer, pol = '$POL', pod = '$POD', arrivalDate = '$arrivalDate', sailingDate = '$sailingDate', plr = '$plr', invoiceItemsIGST = '$invoiceItemsIGST', invoiceItemsCGST = '$invoiceItemsCGST' WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Edited purchase invoice BL: $BL";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);


header('Location: ../../edit-purchase.php?BL='.$BL);

?>