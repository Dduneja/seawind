<?php

include('assets/functions/user-login.php');
if(isset($_COOKIE["user"])){
    header("Location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="assets/css/login.css">
<body>
    <div class="container">
        <div class="logo"><img src="assets/resources/logo.jpg" alt="Seawind Shippin and Logistics"></div>
        <form method="post">
            <input class="input" type="text" name="username" placeholder="Username" autocomplete="off" required><br>
            <input class="input" type="password" name="password" placeholder="Password" autocomplete="off" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    
</body>
</html>