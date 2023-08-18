<?php

include('../includes/db.php');

$BL = $_POST["BL"];
$shipperName = $_POST["shipper-name"];
$shipAdd1 = $_POST["ship-add-l-1"];
$shipAdd2 = $_POST["ship-add-l-2"];
$shipAdd3 = $_POST["ship-add-l-3"];
$shipEmail = $_POST["ship-email"];
$shipMobile = $_POST["ship-mobile"];

$conName = $_POST["con-name"];
$conAdd1 = $_POST["con-add-l-1"];
$conAdd2 = $_POST["con-add-l-2"];
$conAdd3 = $_POST["con-add-l-3"];
$conEmail = $_POST["con-email"];
$conMobile = $_POST["con-mobile"];
if(isset($_POST["con-alt-mobile"])){
    $conAltMobile = $_POST["con-alt-mobile"];
}
else{
    $conAltMobile = "";
}

$notifyName = $_POST["notify-name"];
$notifyAdd1 = $_POST["notify-add-l-1"];
$notifyAdd2 = $_POST["notify-add-l-2"];
$notifyAdd3 = $_POST["notify-add-l-3"];
$notifyEmail = $_POST["notify-email"];
$notifyMobile = $_POST["notify-mobile"];
if(isset($_POST["notify-alt-mobile"])){
    $notifyAltMobile = $_POST["notify-alt-mobile"];
}
else{
    $notifyAltMobile = "";
}


$POL = $_POST["pol"];
$POD = $_POST["pod"];
$vessel = $_POST["vessel"];
$voyage = $_POST["voyage"];
$shipLine = $_POST["ship-line"];

$despGood = $_POST["desp-good"];
$kindPack = $_POST["kind-pack"];
$HScode = $_POST["HS-code"];
$SB = $_POST["SB-code"];
$date = $_POST["SB-date"];
$noContainer = $_POST["no-of-cont"];

$containerArr = serialize($_POST["container-no:"]);
$containerSizeArr = serialize($_POST["container-size:"]);
$LineSealNumberArr = serialize($_POST["line-seal-number:"]);
$stuffedPackagesArr = serialize($_POST["stuffed-packages:"]);
$grossWeightArr = serialize($_POST["gross-weight:"]);
$netWeightArr = serialize($_POST["net-weight:"]);

$freightPayment = $_POST["freight"];
$freightPayable = $_POST["fright-payable"];
$placeOfIssue = $_POST["place-of-issue"];
$dateOfIssue = $_POST["date-of-issue"];

$query = "UPDATE `jobs` SET `notifyName` = '$notifyName', `notifyAdd1` = '$notifyAdd1', `notifyAdd2` = '$notifyAdd2', `notifyAdd3` = '$notifyAdd3', `notifyEmail` = '$notifyEmail', `notifyMobile` = '$notifyMobile', `notifyAltMobile` = '$notifyAltMobile', `shipperName`='$shipperName',`shipperAdd1`='$shipAdd1',`shipperAdd2`='$shipAdd2',`shipperAdd3`='$shipAdd3',`shipperEmail`='$shipEmail',`shipMobile`='$shipMobile',`conName`='$conName',`conAdd1`='$conAdd1',`conAdd2`='$conAdd2',`conAdd3`='$conAdd3',`conEmail`='$conEmail',`conMobile`='$conMobile',`conAltMobile`='$conAltMobile',`POL`='$POL',`POD`='$POD',`vessel`='$vessel',`shipLine`='$shipLine',`despGood`='$despGood',`kindPack`='$kindPack',`HS`='$HScode',`SB`='$SB',`date`='$date',`noContainer`='$noContainer',`container`='$containerArr',`containerSize`='$containerSizeArr',`lineSealNumber`='$LineSealNumberArr',`stuffedPackage`='$stuffedPackagesArr',`grossWeight`='$grossWeightArr',`netWeight`='$netWeightArr',`voyage`='$voyage',`freightPayment`='$freightPayment',`freightPayable`='$freightPayable',`placeOfIssue`='$placeOfIssue',`dateOfIssue`='$dateOfIssue' WHERE BL ='$BL'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Edited job data BL: $BL";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);


header("Location: ../../edit-job.php?BL=".$BL);

?>