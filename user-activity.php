<?php
include("assets/includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/job-data.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <li class="nav-link"><a href="home.php">Dashboard</a></li>

                <li class="nav-link"><a href="index.php">Create Job</a></li>
                <li class="nav-link"><a href="add-HSN.php">Add HSN</a></li>
                <li class="nav-link"><a href="job-data.php">Job Data</a></li>
                <li class="nav-link"><a href="report.php">Report</a></li>
                <li class="nav-link"><a href="user-activity.php">User Activity</a></li>

            </ul>
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    </nav>

    <div class="container">
        <div class="title">Transaction History</div>
        <div class="transaction-table">
            <table>
                <tr>
                    <th style="width:20%;">Time</th>
                    <th style="width:20%;">User</th>
                    <th style="width:60%;">Activity</th>
                </tr>


                <?php include("assets/functions/retrive-user-activity.php"); ?>
            </table>
        </div>
    </div>


    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>

</body>
</html>