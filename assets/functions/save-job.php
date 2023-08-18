<?php

include('../includes/db.php');


$query = "SELECT * FROM jobs ORDER BY BL DESC";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $BL_no = mysqli_fetch_assoc($result)["BL"];
    $year = substr($BL_no, 6, 2);
    if( $year == substr(date('Y'), 2, 2)){
        $no = (int)substr($BL_no, 8, 4) + 1;
        if($no < 10){
            $no = "000".$no;
        }
        elseif($no<100){
            $no = "00".$no;
        }
        elseif($n0<1000){
            $no = "0".$no;
        }
    }
    else{
        $year = substr(date('Y'), 2, 2);
        $no = "0001";
    }

    $BL = "SGLLLP".$year.$no;
}
else{
    $BL = "SGLLLP".substr(date('Y'), 2, 2)."0001";
}
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
$grossWeightArr = serialize($_POST["gross-weight/volume:"]);
$netWeightArr = serialize($_POST["net-weight/volume:"]);

$otherDesp = $_POST["other-desp"];

$freightPayment = $_POST["freight"];
$freightPayable = $_POST["fright-payable"];
$placeOfIssue = $_POST["place-of-issue"];
$dateOfIssue = $_POST["date-of-issue"];
$user = $_COOKIE["user"];
$payment = "pending";

$query = "INSERT INTO jobs (notifyName, notifyAdd1, notifyAdd2, notifyAdd3, notifyMobile, notifyEmail, notifyAltMobile, otherdesp, paymentStatus, user, shipperName, shipperAdd1, shipperAdd2, shipperAdd3, shipperEmail, shipMobile, conName, conAdd1, conAdd2, conAdd3, conEmail, conMobile, conAltMobile, POL, POD, vessel, shipLine, despGood, kindPack, HS, SB, `date`, noContainer, container, containerSize, lineSealNumber, stuffedPackage, grossWeight, netWeight, voyage, BL, freightPayment, freightPayable,PlaceOfIssue, dateOfIssue)
                     VALUES('$notifyName', '$notifyAdd1', '$notifyAdd2', '$notifyAdd3', '$notifyMobile', '$notifyEmail', '$notifyAltMobile', '$otherDesp', '$payment', '$user', '$shipperName', '$shipAdd1', '$shipAdd2', '$shipAdd3', '$shipEmail', '$shipMobile', '$conName', '$conAdd1', '$conAdd2', '$conAdd3', '$conEmail', '$conMobile', '$conAltMobile', '$POL', '$POD', '$vessel', '$shipLine', '$despGood', '$kindPack', '$HScode', '$SB', '$date', $noContainer, '$containerArr', '$containerSizeArr', '$LineSealNumberArr', '$stuffedPackagesArr', '$grossWeightArr', '$netWeightArr', '$voyage', '$BL', '$freightPayment', '$freightPayable', '$placeOfIssue', '$dateOfIssue')";
$result = mysqli_query($conn, $query);

$query = "INSERT INTO purchase(BL) VALUES('$BL')";
$result = mysqli_query($conn, $query);

$query = "INSERT INTO invoice(BL) VALUES('$BL')";
$result = mysqli_query($conn, $query);

$query = "SELECT * FROM customer WHERE customerName = '$shipperName'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    $query = "INSERT INTO customer(customerName, cusAdd1, cusAdd2, cusAdd3, cusEmail, cusMobile) VALUES ('$shipperName', '$shipAdd1', '$shipAdd2', '$shipAdd3', '$shipEmail', '$shipMobile')";
    $result = mysqli_query($conn, $query);
}

$query = "SELECT * FROM customer WHERE customerName = '$conName'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    $query = "INSERT INTO customer(customerName, cusAdd1, cusAdd2, cusAdd3, cusEmail, cusMobile) VALUES ('$conName', '$conAdd1', '$conAdd2', '$conAdd3', '$conEmail', '$conMobile')";
    $result = mysqli_query($conn, $query);
}

$query = "SELECT * FROM customer WHERE customerName = '$notifyName'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    $query = "INSERT INTO customer(customerName, cusAdd1, cusAdd2, cusAdd3, cusEmail, cusMobile) VALUES ('$notifyName', '$notifyAdd1', '$notifyAdd2', '$notifyAdd3', '$notifyEmail', '$notifyMobile')";
    $result = mysqli_query($conn, $query);
}

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Created job BL: $BL";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);





header('Location: ../../edit-job.php?BL='.$BL);
?>