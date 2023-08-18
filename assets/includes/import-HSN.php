<?php
$query = "SELECT * FROM product_hsn";
$result = mysqli_query($conn, $query);

$carr = [];
$iarr = [];
$cdict =[];
$idict =[];

while($row = mysqli_fetch_assoc($result)){
    if($row["cgst"] != 0){
        array_push($carr, $row['desp']);
        $cdict[$row["desp"]] = [$row["HSN"], $row["cgst"], $row["sgst"], $row["igst"]];
    }
    else{
        array_push($iarr, $row['desp']);
        $idict[$row["desp"]] = [$row["HSN"], $row["cgst"], $row["sgst"], $row["igst"]];
    }
    
}
echo "<script> const chsnCode = ".json_encode($carr).";
        const chsnDict = ".json_encode($cdict).";
        const ihsnCode = ".json_encode($iarr).";
        const ihsnDict = ".json_encode($idict).";
    </script>";
?>