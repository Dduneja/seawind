<?php

if(isset($startDate) && isset($endDate)){
    $query = "SELECT jobs.BL as BL, jobs.shipperName as shipper, jobs.conName as consignee, purchase.invoiceItemsIGST as pur_igst, purchase.invoiceItemsCGST as pur_cgst, invoice.invoiceItemsCGST as inv_cgst, invoice.invoiceItemsIGST as inv_igst, invoice.invoiceDate as inv_date  FROM purchase JOIN invoice ON purchase.BL = invoice.BL JOIN jobs ON purchase.BL = jobs.BL WHERE invoice.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY invoice.invoiceDate";
    $result = mysqli_query($conn, $query);

   // $total_profit_loss = 0;
 
    while($row = mysqli_fetch_assoc($result)){

        
        echo "<tr>
            <td>".$row["inv_date"]."</td>
            <td>".$row["BL"]."</td>
            <td>".$row["shipper"]."</td>
            <td>".$row["consignee"]."</td>
          
        <td><a href='job-pnl-report.php?BL=".$row["BL"]."'>Veiw PnL report</a></td>

        </tr>";


        // $pur_igst = unserialize($row["pur_igst"]);
        // $pur_cgst = unserialize($row["pur_cgst"]);

        // $pur_total = 0;
 
        // foreach($pur_igst as $e){
        //     $pur_total += $e[6];
        // }
        // foreach($pur_cgst as $e){
        //     $pur_total += $e[6];
        // }

        // $inv_igst = unserialize($row["inv_igst"]);
        // $inv_cgst = unserialize($row["inv_cgst"]);
        
        // $inv_total = 0;
        // foreach($inv_igst as $e){
        //     $inv_total += $e[6];
        // }
        // foreach($inv_cgst as $e){
        //     $inv_total += $e[6];
        // }
        // $profit_loss = $inv_total - $pur_total;
        // $total_profit_loss += $profit_loss;
        // if($profit_loss < 0){
        //     $classname = "loss";
        // }
        // else{
        //     $classname = "profit";
        // }


    }

    if($total_profit_loss < 0){
        $classname = "loss";
    }
    else{
        $classname = "profit";
    }
    echo "<tr>
        <td colspan='4' style='text-align: right;'>Total Profit/Loss</td>
        <td class='".$classname."'>".$total_profit_loss."</td>
        
    </tr>";
}


$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "GEnerated PnL report";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);


?>