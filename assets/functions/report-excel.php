<?php
include('../includes/db.php');
include('../../vendor/autoload.php');

$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];

$query = "SELECT jobs.BL as BL, jobs.shipperName as shipper, jobs.conName as consignee, purchase.invoiceItemsIGST as pur_igst, purchase.invoiceItemsCGST as pur_cgst, invoice.invoiceItemsCGST as inv_cgst, invoice.invoiceItemsIGST as inv_igst, invoice.invoiceDate as inv_date  FROM purchase JOIN invoice ON purchase.BL = invoice.BL JOIN jobs ON purchase.BL = jobs.BL WHERE invoice.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY invoice.invoiceDate";
$result = mysqli_query($conn, $query);

$total_profit_loss = 0;

$reportArr = [];

$reportArr[] = ['DATE', 'BL', 'SHIPPER', 'CONSIGNEE', 'PROFIT/LOSS'];

while($row = mysqli_fetch_assoc($result)){
    $pur_igst = unserialize($row["pur_igst"]);
    $pur_cgst = unserialize($row["pur_cgst"]);

    $pur_total = 0;

    foreach($pur_igst as $e){
        $pur_total += $e[6];
    }
    foreach($pur_cgst as $e){
        $pur_total += $e[6];
    }

    $inv_igst = unserialize($row["inv_igst"]);
    $inv_cgst = unserialize($row["inv_cgst"]);
    
    $inv_total = 0;
    foreach($inv_igst as $e){
        $inv_total += $e[6];
    }
    foreach($inv_cgst as $e){
        $inv_total += $e[6];
    }
    $profit_loss = $inv_total - $pur_total;
    $total_profit_loss += $profit_loss;
    
    $reportArr[] = [$row["inv_date"], $row["BL"], $row["shipper"], $row["consignee"], $profit_loss];

}

$reportArr[] = ['', '', '', 'TOTAL PROFIT/LOSS', $total_profit_loss];



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$sheet->fromArray($reportArr, null, 'A1');
// $sheet->setCellValue('A1', 'hello World!!');


$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

// Set appropriate headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="report.xlsx"');

// Use php://output to send the generated Excel file directly to the browser
$writer->save('php://output');




?>