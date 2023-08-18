<?php
if(!isset($_COOKIE["user"] )){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}
include('assets/includes/db.php');
$employeeName = $_POST["name"];
$login = $_POST["login"];
$pass = $_POST["password"];

$query = "SELECT * FROM user WHERE login = '$login'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    echo "<script> alert('Login ID already exists!!');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'create-user.php'; }, 10);</script>";
}
else{
    $query = "INSERT INTO user(login, name, password, type) VALUES('$login','$employeeName','$pass', 'user')";
    $result = mysqli_query($conn, $query);

    $user = $_COOKIE["user"];
$time = date('Y-m-d h:i:s');
$desp = "Created user: $employeeName";
$query = "INSERT INTO useractivity(user, time, desp) VALUES('$user', '$time', '$desp')";
$result = mysqli_query($conn, $query);

    echo "<script> alert('User Created');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'user-data.php'; },10);</script>";
}


?>