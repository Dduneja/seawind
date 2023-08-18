<?php

if(!isset($_COOKIE["user"] )){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}

include('../includes/db.php');

// if($_COOKIE["type"] == "admin"){

// }

$login = $_GET["id"];

$query = "DELETE FROM user WHERE login = '$login'";
$result = mysqli_query($conn, $query);

$user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "deleted user: $login";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);


header("Location: ../../user-data.php");
?>