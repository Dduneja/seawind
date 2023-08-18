<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}
include("assets/includes/db.php");
include("assets/functions/pnlreport.php");

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
        <form method="post">
        <div class="form-line">
            <div class="form-input">
                <label for="from" class="lbl">FROM:</label>
                <input type="date" name="from" id="from" class="input" autocomplete="off" required>
                <label for="to" class="lbl">TO:</label>
                <input type="date" name="to" id="to" class="input" autocomplete="off" required> 
                <button type="submit" class="">Submit</button>
            </div>
        </div>
        </form>

        <table> 
            <tr>
                <th>Date</th>
                <th>BL</th>
                <th>Shipper</th>
                <th>Consignee</th>
                <th>Profit/Loss</th>
                <th>View Report</th>
            </tr>
            <?php include("assets/functions/report-table.php");  ?>
        </table>
        <?php
        if(isset($startDate) && isset($endDate)){
        ?>
        <form action="assets/functions/report-excel.php" method="post">
            <input type="hidden" name="startDate" value="<?php echo $startDate; ?>">
            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
            <button type="submit">Download Excel</button>
        </form>
        <?php
        }

        ?>
    </div>

    
</body>
</html>