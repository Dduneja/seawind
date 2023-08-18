<?php

$BL = $_GET["BL"];

$query = "SELECT jobs.BL as BL, jobs.shipperName as shipper, jobs.conName as consignee, purchase.invoiceItemsIGST as pur_igst, purchase.invoiceItemsCGST as pur_cgst, invoice.invoiceItemsCGST as inv_cgst, invoice.invoiceItemsIGST as inv_igst, invoice.invoiceDate as inv_date  FROM purchase JOIN invoice ON purchase.BL = invoice.BL JOIN jobs ON purchase.BL = jobs.BL WHERE jobs.BL = '$BL'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);


?>