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
<link rel="stylesheet" href="assets/css/create-user.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <div class="nav-link"><a href="admin-dashboard.php">Dashboard</a></div>

                <li class="nav-link active"><a href="#">Create User</a></li>
                <li class="nav-link"><a href="user-data.php">User Data</a></li>
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
        <form action="create-user-data.php" method="post">

            <div class="form-input">
                <label for="name">Employee Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-input">
                <label for="login">Login ID:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-input">
                <button type="submit">Create</button>
            </div>
            
        </form>
    </div>

</body>
</html>