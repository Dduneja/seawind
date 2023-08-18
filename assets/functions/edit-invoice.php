<?php
include("../includes/db.php");
include('numberToAmount.php');
function sumFloatArray($array) {
    $sum = 0.0;
    foreach ($array as $element) {
        $sum += floatval($element);
    }
    return $sum;
}

$BL = $_POST["BL"];
$invoiceItemsCGST = serialize(json_decode($_POST["invoice-items-cgst"]));
$invoiceItemsIGST = serialize(json_decode($_POST["invoice-items-igst"]));
$invoiceNo = $_POST["invoice-no"];
$invoiceDate = $_POST["invoice-date"];
$dueDate = $_POST["due-date"];
$shipmentNo = $_POST["shipment-no"];
$shipmentType = $_POST["shipment-type"];

$query = "SELECT * FROM jobs WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$shipperName = $row["shipperName"];
$shipAdd1 = $row["shipperAdd1"];
$shipAdd2 = $row["shipperAdd2"];
$shipAdd3 = $row["shipperAdd3"];
$shipEmail = $row["shipperEmail"];
$shipMobile = $row["shipMobile"];

$consignee = $row["conName"];
$pol = $row["POL"];
$pod = $row["POD"];
$vessel = $row["vessel"];
$voyage = $row["voyage"];
$shipLine = $row["shipLine"];
$SB = $row["SB"];
$SBDate = $row["date"];
$noContainer = $row["noContainer"];
$stuffedPackage = unserialize($row["stuffedPackage"]);
$grossWeight = unserialize($row["grossWeight"]);
$netWeight = unserialize($row["netWeight"]);

$noOfPackage = sumFloatArray($stuffedPackage);
$totalGrossWeight = sumFloatArray($grossWeight);
$totalNetWeight = sumFloatArray($netWeight);

$dateOfIssue = $row["dateOfIssue"];
$user = $_COOKIE["user"];

$query = "SELECT * FROM purchase WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

$mbl = $row["mbl"];

$iadvance = $_POST["iadvance"];
$cadvance = $_POST["cadvance"];


$query = "UPDATE invoice SET iadvance = '$iadvance', cadvance = '$cadvance', invoiceItemsCGST = '$invoiceItemsCGST', invoiceItemsIGST = '$invoiceItemsIGST', invoiceNo = '$invoiceNo', invoiceDate = '$invoiceDate', dueDate = '$dueDate', shipmentNo = '$shipmentNo', shipmentType = '$shipmentType', shipperName = '$shipperName', shipAdd1 = '$shipAdd1', shipAdd2 = '$shipAdd2', shipAdd3 = '$shipAdd3', shipEmail = '$shipEmail', shipMobile = '$shipMobile', consignee = '$consignee', pol = '$pol', pod = '$pod', vessel = '$vessel', voyage = '$voyage', shipLine = '$shipLine', SB = '$SB', noContainer = $noContainer, noOfPackage = $noOfPackage, totalGrossWeight = $totalGrossWeight, totalNetWeight = $totalNetWeight, dateOfIssue = '$dateOfIssue', user = '$user', SBDate = '$SBDate', mbl = '$mbl' WHERE BL = '$BL'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Edited customer invoice BL: $BL";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);



header('Location: ../../edit-invoice.php?BL='.$BL);


?>