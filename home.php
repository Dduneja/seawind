<?php

if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/home.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div> 
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    
    </nav>
    <div class="msg">Welcome, <?php echo $_COOKIE["user"]; ?>!</div>
    <div class="container">
        
        <div class="links"><a href="index.php">Create Job</a></div>
        <div class="links"><a href="add-HSN.php">add HSN</a></div>
        <div class="links"><a href="job-data.php">Job Data</a></div>


        <div class="links"><a href="admin-dashboard.php">Switch to Admin</a></div>

    </div>
    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    
</body>
</html>