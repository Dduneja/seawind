<?php

$query = "SELECT * FROM customer";
$result = mysqli_query($conn, $query);

$cusarr = [];
$cusarrname = [];

while($row = mysqli_fetch_assoc($result)){
    $cusarr[$row["customerName"]] = [$row["cusAdd1"], $row["cusAdd2"], $row["cusAdd3"], $row["cusEmail"], $row["cusMobile"]];
    $cusarrname[] = $row["customerName"];
}


$cusarrjson = json_encode($cusarr);
$cusNameJson = json_encode($cusarrname);

echo "<script>const cusArr = JSON.parse('".$cusarrjson."');
    const cusNameArr = JSON.parse('".$cusNameJson."');
</script>";


?>