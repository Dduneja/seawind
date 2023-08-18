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
$mblDate = $row["BLDate"];

$invoiceItemsIGST = unserialize($invoiceItemsIGST);

$idesp = "";
$ihsn = "";
$irate = "";
$iqty = "";
$icurrency=""; 
$itaxableValue = ""; 
$itotalAmount = "";
$icgst = ""; 
$isgst = "";
$iigst = "";
$iserial =1;
$iserialstr = "";

$itotaligst = 0;
$itotalTax = 0;
$itotalTotal = 0;


foreach($invoiceItemsIGST as $e){
    $iserialstr.=$iserial;
    $iserial += 1;
    $idesp.=$e[0]."<br>";
    $ihsn.=$e[1]."<br>";
    $irate.=$e[2]."<br>";
    $iqty.=$e[3]."<br>";
    $icurrency.=$e[4]."<br>";
    $itotalTax += $e[5];
    $itaxableValue.=number_format($e[5],2)."<br>";
    $itotalTotal += $e[6];
    $itotalAmount.=number_format($e[6],2)."<br>";
    $igstAmount = floatval($e[5]*$e[7]/100);
    $itotaligst += $igstAmount;
    $iigst.=$igstAmount."(".$e[7]."%)<br>";
}

$invoiceItemsCGST = unserialize($invoiceItemsCGST);


$cdesp = "";
$chsn = "";
$crate = "";
$cqty = "";
$ccurrency=""; 
$ctaxableValue = ""; 
$ctotalAmount = "";
$ccgst = ""; 
$csgst = "";
$cigst = "";
$cserial = 1 ;
$cserialstr = "";

$ctotalcgst = 0;
$ctotalsgst = 0;
$ctotalTax = 0;
$ctotalTotal = 0;




foreach($invoiceItemsCGST as $e){
    $cserialstr.=$cserial."<br>";
    $cserial += 1;
    $cdesp.=$e[0]."<br>";
    $chsn.=$e[1]."<br>";
    $crate.=number_format($e[2],2)."<br>";
    $cqty.=$e[3]."<br>";
    $ccurrency.=$e[4]."<br>";
    $temp = floatval($e[5]);
    $ctotalTax += $temp;
    $ctaxableValue.=number_format($e[5],2)."<br>";
    $ctotalTotal += $e[6];
    $ctotalAmount.=number_format($e[6],2)."<br>";
    $cgstAmount = floatval($temp*$e[7]/100);
    $ctotalcgst += $cgstAmount;
    $ccgst.=$cgstAmount."(".$e[7]."%)<br>";
}

$iadvance = $_POST["iadvance"];
$cadvance = $_POST["cadvance"];



$html = file_get_contents('../../invoice.html');

$html = str_replace(['{{title}}','{{ Customer }}', '{{ add-l-1 }}', '{{ add-l-2 }}', '{{ add-l-3 }}','{{ PAN }}', '{{ GSTNO }}', '{{ state }}', '{{ inv-no }}', '{{ inv-date }}','{{ due-date }}', '{{ pos }}', '{{ ship-no }}', '{{ ship-type }}', '{{ cartype }}','{{ mbl }}', '{{ bl }}', '{{ SB }}', '{{ pack }}', '{{ vol }}','{{ vessel }}','{{ ship-line }}', '{{ no-cont }}', '{{ mbl-Date}}', '{{ bl-date }}','{{ SB-date }}', '{{ gross-weight }}', '{{ net-weight }}', '{{ voyage }}','{{ ship-ref }}', '{{ incoTerms }}', '{{ shipper }}', '{{ consignee }}', '{{ place }}', '{{ POL }}', '{{ POD }}','{{csr}}', '{{cdesp}}', '{{chsn}}', '{{ccur}}', '{{crate}}', '{{cqty}}', '{{ctax}}', '{{ccgst}}', '{{csgst}}', '{{ctotal}}','{{ctaxtotal}}', '{{ccgsttotal}}', '{{csgsttotal}}', '{{ctotaltotal}}','{{ctotalwords}}', '{{cgsttotal}}', '{{payable}}', '{{advance}}', '{{round}}','{{isr}}', '{{idesp}}', '{{ihsn}}', '{{icur}}', '{{irate}}', '{{iqty}}', '{{itax}}', '{{icgst}}', '{{itotal}}','{{itaxtotal}}', '{{icgsttotal}}', '{{itotaltotal}}','{{itotalwords}}', '{{igsttotal}}', '{{ipayable}}', '{{iadvance}}', '{{iround}}'],
["invoice_".$BL, $shipperName, $shipAdd1, $shipAdd2, $shipAdd3, "", "", "", $invoiceNo, $invoiceDate, $dueDate, $pol, $shipmentNo, $shipmentType, "", $mbl,  $BL, $SB, $noOfPackage, "", $vessel,$shipLine, $noContainer, $mblDate, $dateOfIssue, $SBDate, $totalGrossWeight." KGS", $totalNetWeight." KGS", $voyage, "",  "", $shipperName, $consignee,$pol, $pol, $pod, $cserialstr, $cdesp, $chsn, $ccurrency, $crate,$cqty, $ctaxableValue, $ccgst, $ccgst, $ctotalAmount, number_format($ctotalTax,2), number_format($ctotalcgst,2), number_format($ctotalcgst,2), number_format($ctotalTotal,2),convertAmountToWords($ctotalTotal)." only", number_format($ctotalcgst+$ctotalcgst, 2), number_format($ctotalTotal - $cadvance,2), $cadvance, "0",  $iserialstr, $idesp, $ihsn, $icurrency, $irate,$iqty, $itaxableValue, $iigst, $itotalAmount, number_format($itotalTax,2), number_format($itotaligst,2), number_format($itotalTotal,2),convertAmountToWords($itotalTotal)." only", number_format($itotaligst,2), number_format($itotalTotal-$iadvance,2), $iadvance, "0"],$html);

echo $html;

?>