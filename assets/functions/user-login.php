<?php

include('assets/includes/db.php');
if(isset($_POST["submit"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    
    $query = "SELECT * FROM user WHERE login = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $type = $row["type"];
        setcookie("user", $user, time() + 86400);
        setcookie("type", $type, time() + 86400);
        echo $_COOKIE["type"];
        header("Location: home.php");
    }
    else{
        echo "<script> alert('Invalid Credentials!!!');</script>";
    }
}


?>
