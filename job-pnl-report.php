<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}
include("assets/includes/db.php");
include("assets/functions/job-pnl-report.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="assets/css/report.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <li class="nav-link"><a href="home.php">Dashboard</a></li>

            <div class="nav-link"><a href="admin-dashboard.php">Dashboard</a></div>

                <li class="nav-link "><a href="create-user.php">Create User</a></li>
                <li class="nav-link "><a href="#">User Data</a></li>
                <li class="nav-link"><a href="admin-job-data.php">Job Data</a></li>

                <li class="nav-link active"><a href="report.php">Report</a></li>
                <li class="nav-link"><a href="user-activity.php">User Activity</a></li>

            </ul>
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    </nav>


    <div class="container">

        <div class="details">Bl No.: <?php echo $row["BL"] ?></div>
        <div class="details">Shipper Name: <?php echo $row["shipper"]; ?></div>
        <div class="details">Consignee Name: <?php echo $row["consignee"]; ?></div>

        <div class="table">
            <table>
                <tr>
                    <th>Description</th>
                    <th>Purchase</th>
                    <th>Selling</th>
                    <th>Profit/Loss</th>
                </tr>
                <?php include("assets/functions/job-pnl-table.php") ?>
            </table>
        </div>
    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    <script src="assets/js/index.js"></script>
</body>
</html>
