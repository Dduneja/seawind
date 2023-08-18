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

                <li class="nav-link"><a href="index.php">Create job</a></li>
                <li class="nav-link"><a href="add-HSN.php">Add HSN</a></li>
                <li class="nav-link active"><a href="job-data.php">Job Data</a></li>
            </ul>
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    </nav>

    <div class="container">
        <div class="title">Job History</div>
        <div class="job-table">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Consignee Name</th>
                    <th>BL no.</th>
                    <th>Job Slip</th>
                    <th>Purchase Invoice</th>
                    <th>Customer Invoice</th>
                    <th>Payment Status</th>
                </tr>
                <?php include("assets/functions/retrive-job-data.php"); ?>
            </table>
        </div>
    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    
</body>
</html>