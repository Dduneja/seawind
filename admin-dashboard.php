<?php

if(!isset($_COOKIE["user"] )){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
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
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/admin-dashboard.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        
        <form action="logout.php">
            <button class="logout" type="submit">Logout</button>    
        </form>
    
    </nav>
    <div class="container">
        <div class="title">Welcome Admin!!</div>
        <div class="dashboard-links">
            <div class="dashboard-link"><a href="create-user.php">Create User</a></div>
            <div class="dashboard-link"><a href="user-data.php">Users</a></div>
            <div class="dashboard-link"><a href="admin-job-data.php">Job Data</a></div>
            <div class="dashboard-link"><a href="report.php">Report</a></div>
            <div class="dashboard-link"><a href="user-activity.php">User Activity</a></div>
            <div class="dashboard-link"><a href="home.php">Switch to User</a></div>
        </div>
    </div>
</body>
</html>