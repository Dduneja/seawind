<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
include("assets/includes/db.php");
include("assets/includes/add-HSN-data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/add-HSN.css">
<style>
    #changeWindow{
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    padding: 20px;
    border: 1px solid black;
    background-color: #eee;
}
</style>
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">

                <li class="nav-link"><a href="home.php">Dashboard</a></li>
                <li class="nav-link"><a href="index.php">Create Job</a></li>
                <li class="nav-link active"><a href="add-HSN.php">Add HSN</a></li>
                <li class="nav-link"><a href="job-data.php">Job Data</a></li>
                
                <li class="nav-link"><a href="report.php">Report</a></li>
            </ul>
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    </nav>
    <div class="container">

        <div class="title">Add Product/Services with HSN</div>


        <div class="form">
            <form method="post">
                <div class="form-input"><label class="lbl" for="desp">Description:</label>
                <input class="input" id="desp" type="text" name="desp"></div>
                <div class="form-input"><label class="lbl" for="hsn">HSN Code:</label>
                <input class="input" id="hsn" type="text" name="hsn" maxlength=6></div>
                <div class="form-input"><label class="lbl" for="cgst">CGST Rate:</label>
                <input class="input" id="cgst" type="number" name="cgst"><span class="percentage">%</span></div>
                <div class="form-input"><label class="lbl" for="sgst">SGST Rate:</label>
                <input class="input" id="sgst" type="number" name="sgst"><span class="percentage">%</span></div>
                <div class="form-input"><label class="lbl" for="igst">IGST Rate:</label>
                <input class="input" id="igst" type="number" name="igst"><span class="percentage">%</span></div>
                <div class="form-input"><button class="submit-btn" name="submit" type="submit">Submit</button></div>
            </form>
        </div>


        <div class="data">
            <table style="width: 100%;">
                <tr>
                    <th style="width: 20%">HSN Code</th>
                    <th style="width: 40%">Description</th>
                    <th style="width: 10%">CGST Rate</th>
                    <th style="width: 10%">SGST Rate</th>
                    <th style="width: 10%">IGST Rate</th>
                    <th style="width: 10%">Edit</th>
                </tr>
                <?php
                    include("assets/includes/retrive-HSN-data.php");
                ?>

            </table>
        </div>

        <div id="changeWindow">
            <form action="assets/functions/change-HSN.php" method="post">
                <input id="gst-change" type="hidden" name="desp">
                
                <div>HSN Code: <input  id="change-hsn" class="input" type="text" name="hsn" required></div>
                <div>Despcription: <input id="desp-change"  class="input" type="text" name="desp-change" required></div>
                <div>Enter SGST Value: <input id="change-sgst" class="input" type="number" name="sgst" required></div>
                <div>Enter CGST Value: <input id="change-cgst" class="input" type="number" name="cgst" required></div>
                <div>Enter IGST Value: <input id="change-igst" class="input" type="number" name="igst" required></div>
                <button type="submit" class="change-submit">Change</button>
                <button type="button" class="change-submit" onclick="hideWindow()">Close</button>
            </form> 
        </div>



    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>


    <script src="assets/js/add-HSN.js"></script>

</body>
</html>