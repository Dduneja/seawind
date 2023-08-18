<?php

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


$itotaligst = 0;
$itotalTax = 0;
$itotalTotal = 0;


foreach($invoiceItemsIGST as $e){
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


$ctotalcgst = 0;
$ctotalsgst = 0;
$ctotalTax = 0;
$ctotalTotal = 0;


foreach($invoiceItemsCGST as $e){
    $cdesp.=$e[0]."<br>";
    $chsn.=$e[1]."<br>";
    $crate.=$e[2]."<br>";
    $cqty.=$e[3]."<br>";
    $ccurrency.=$e[4]."<br>";
    
    $ctotalTax += $e[5];
    $ctaxableValue.=number_format($e[5],2)."<br>";
    $ctotalTotal += $e[6];
    $ctotalAmount.=number_format($e[6],2)."<br>";
    $cgstAmount = floatval($e[5]*$e[7]/100);
    $ctotalcgst += floatval($cgstAmount);
    $ccgst.=$cgstAmount."(".$e[7]."%)<br>";
    
}
$accName = $_POST["acc-name"];
$accNo = $_POST["acc-no"];
$bankName = $_POST["bank-name"];
$branchName = $_POST["branch-name"];
$bankAdd = $_POST["bank-add"];
$ifsc = $_POST["ifsc"];

$file_path = 'purchase_'.$BL;

$html = file_get_contents('../../purchase.html');
$html = str_replace(['{{BL}}', '{{BL-Date}}', '{{Cont}}', '{{Vessel}}', '{{Voyage}}', '{{Cargo}}', '{{arrival}}', '{{Sailing}}', '{{Remark}}', '{{PLR}}', '{{POL}}', '{{POD}}', "{{FPD}}", '{{ cgstSer }}', '{{ cgstsac }}', '{{ cgstqty }}','{{ cgstrate }}', '{{ cgst curr }}', '{{ cgst taxable Amount }}', '{{ cgstcgst }}', '{{ cgstsgst }}', '{{ cgstigst }}', '{{ cgsttotal }}', '{{ ctAmount }}', '{{ ctigst }}', '{{ cttotal }}', '{{cinr}}', '{{ igstSer }}', '{{ igstsac }}', '{{ igstqty }}', '{{ igstrate }}', '{{ igst curr }}', '{{ igst taxable Amount }}', '{{ igstcgst }}', '{{ igstsgst }}', '{{ igsttotal }}', '{{ itAmount }}', '{{ itcgst }}', '{{ itsgst }}', '{{ ittotal }}', '{{pan}}', '{{gst}}', '{{cin}}', '{{acc}}', '{{acn}}', '{{bank}}', "{{bname}}", '{{badd}}', "{{swift}}", "{{ifsc}}", '{{iinr}}', '{{title}}'],
[$BL, $BLDate, $noContainer, $vessel, $voyage, "", $arrivalDate, $sailingDate, "", $plr, $POL, $POD, $POD, $idesp, $ihsn, $iqty, $irate, $icurrency, $itaxableValue, $icgst, $isgst, $iigst, $itotalAmount, number_format($itotalTax,2), number_format($itotaligst,2), number_format($itotalTotal,2), convertAmountToWords($itotalTotal), $cdesp, $chsn, $cqty, $crate,$ccurrency, $ctaxableValue, $ccgst, $ccgst, $ctotalAmount, number_format($ctotalTax,2), number_format($ctotalcgst,2), number_format($ctotalcgst,2), number_format($ctotalTotal,2), "", "", "", $accName, $accNo, $bankName, $branchName, $bankAdd, "", $ifsc, convertAmountToWords($ctotalTotal), $file_path],$html);

echo $html;
?>