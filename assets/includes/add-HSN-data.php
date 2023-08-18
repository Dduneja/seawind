<?php


if(isset($_POST["submit"])){
    $desp = $_POST["desp"];
    $hsn = $_POST["hsn"];
    $cgst = $_POST["cgst"];
    $sgst = $_POST["sgst"];
    $igst = $_POST["igst"];

    $query = "SELECT * FROM product_hsn WHERE desp = '$desp'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        echo "<script>alert('HSN code already exist!!')</script>";
    }
    else{
        $query = "INSERT INTO product_hsn(desp, HSN, cgst, sgst, igst) VALUES('$desp', '$hsn', $cgst, $sgst, $igst)";
        $result = mysqli_query($conn, $query);
        echo "<script>alert('ADDED');</script>";
    }

    $user = $_COOKIE["user"];
$time = date('d-m-y h:i:s');
$desp = "Added HSN data: $desp";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);

}


?>