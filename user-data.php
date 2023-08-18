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
<link rel="stylesheet" href="assets/css/user-data.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <div class="nav-link"><a href="admin-dashboard.php">Dashboard</a></div>

                <li class="nav-link "><a href="create-user.php">Create User</a></li>
                <li class="nav-link active"><a href="#">User Data</a></li>
                <li class="nav-link"><a href="admin-job-data.php">Job Data</a></li>
                <li class="nav-link"><a href="report.php">Report</a></li>
                <li class="nav-link"><a href="user-activity.php">User Activity</a></li>


            </ul>
        </div>
        <form action="logout.php">
            <button class="logout" type="submit">Logout</button>    
        </form>
    
    </nav>
    <div class="container">
        <div class="title">Employee Details</div>
        <div class="conatainer">
            <table>
                <tr>
                    <th>Admin Name</th>
                    <th>Login ID</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>
                <?php include('assets/functions/retrive-admin-data.php'); ?>
            </table>
            <table>
                <tr>
                    <th>Employee Name</th>
                    <th>Login ID</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>
                <?php include('assets/functions/retrive-user-data.php'); ?>
            </table>
        </div>
    </div>
</body>
</html>

