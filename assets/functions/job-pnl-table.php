<?php 

$pur_igst = unserialize($row["pur_igst"]);
$inv_igst = unserialize($row["inv_igst"]);

$total_pnl = 0;

$i = 0;
while(isset($pur_igst[$i])){
    $desp = $pur_igst[$i][0];
    $j = 0;
    $pur_amount = $pur_igst[$i][6]; 
    $inv_amount = 0;
    while(isset($inv_igst[$j])){
        if($desp == $inv_igst[$j][0]){
            $inv_amount = $inv_igst[$j][6];
            unset($inv_igst[$j]);
            $inv_igst = array_values($inv_igst);
            break;
        }
        $j++;
    }

    $pnl = $inv_amount - $pur_amount;
    $total_pnl += $pnl;

    if($pnl < 0){
        $classname = "loss";
    }
    else{
        $classname = "profit";
    }

    echo "<tr>
        <td>".$desp."</td>
        <td>".number_format($pur_amount,2)."</td>
        <td>".number_format($inv_amount,2)."</td>
        <td class='".$classname."'>".number_format($pnl,2)."</td>
    </tr>";

    $i++;
}
$i = 0;
while(isset($inv_igst[$i])){
    $desp = $inv_igst[$i][0];
    $pur_amount = 0;
    $inv_amount = $inv_igst[$i][6];
    $pnl = $inv_amount - $pur_amount;
    $total_pnl += $pnl;
    if($pnl < 0){
        $classname = "loss";
    }
    else{
        $classname = "profit";
    }


    echo "<tr>
        <td>".$desp."</td>
        <td>".number_format($pur_amount,2)."</td>
        <td>".number_format($inv_amount,2)."</td>
        <td class='".$classname."'>".number_format($pnl,2)."</td>
    </tr>";
    $i++;
}


$pur_cgst = unserialize($row["pur_cgst"]);
$inv_cgst = unserialize($row["inv_cgst"]);

$i = 0;
while(isset($pur_cgst[$i])){
    $desp = $pur_cgst[$i][0];
    $j = 0;
    $pur_amount = $pur_cgst[$i][6]; 
    $inv_amount = 0;
    while(isset($inv_cgst[$j])){
        if($desp == $inv_cgst[$j][0]){
            $inv_amount = $inv_cgst[$j][6];
            unset($inv_cgst[$j]);
            $inv_cgst = array_values($inv_cgst);

            break;
        }
        $j++;
    }
    $pnl = $inv_amount - $pur_amount;
    $total_pnl += $pnl;
    if($pnl < 0){
        $classname = "loss";
    }
    else{
        $classname = "profit";
    }


    echo "<tr>
        <td>".$desp."</td>
        <td>".number_format($pur_amount,2)."</td>
        <td>".number_format($inv_amount,2)."</td>
        <td class='".$classname."'>".number_format($pnl,2)."</td>
    </tr>";

    $i++;
}

$i = 0;
while(isset($inv_cgst[$i])){
    $desp = $inv_cgst[$i][0];
    $pur_amount = 0;
    $inv_amount = $inv_cgst[$i][6];
    $pnl = $inv_amount - $pur_amount;
    $total_pnl += $pnl;
    if($pnl < 0){
        $classname = "loss";
    }
    else{
        $classname = "profit";
    }


    echo "<tr>
        <td>".$desp."</td>
        <td>".number_format($pur_amount,2)."</td>
        <td>".number_format($inv_amount,2)."</td>
        <td class='".$classname."'>".number_format($pnl,2)."</td>
    </tr>";
    $i++;
}
if($total_pnl < 0){
    $classname = "loss";
}
else{
    $classname = "profit";
}


echo "<tr>
    <td colspan=3><b>Total Profit/Loss</b></td>
    <td class='".$classname."'>".$total_pnl."</td>
</tr>";

?>

