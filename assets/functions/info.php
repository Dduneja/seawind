<?php

include("assets/includes/db.php");

$query = "SELECT * FROM jobs ORDER BY BL DESC";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $BL = mysqli_fetch_assoc($result)["BL"];
    $year = substr($BL, 6, 2);
    if( $year == substr(date('Y'), 2, 2)){
        $no = (int)substr($BL, 8, 4) + 1;
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
    $year2 =substr(date('Y', strtotime('+1 year')),2,3);
    $BL_no = "TI"."/".$year."-".$year2."/".$no;
}
else{
    $BL_no = "TI"."/".substr(date('Y'), 2, 2)."/"."0001";
}


 

?>