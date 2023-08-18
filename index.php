<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
include("assets/includes/db.php");
include("assets/includes/import-HSN.php");
include("assets/functions/info.php");
include("assets/functions/customer-info.php");
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
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <li class="nav-link"><a href="home.php">Dashboard</a></li>

                <li class="nav-link active"><a href="index.php">Create Job</a></li>
                <li class="nav-link"><a href="add-HSN.php">Add HSN</a></li>
                <li class="nav-link"><a href="job-data.php">Job Data</a></li>
               
            </ul>
            
            
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    
    </nav>

    <div class="container">
        <form method="post" id="form" action="" class="form">

            

            <div class="form-line">
                <div class="form-input">
                    <label class="lbl" for="BL">BL number:</label>
                    <input class="input check" type="text" value="<?php echo $BL_no; ?>" disabled>
                    <input class="input check" type="hidden" name="BL" value="<?php echo $BL_no; ?>" >
                </div>
            </div>
            <div class="form-title">Shipper Details</div>
            <div class="form-line">
                <div class="form-input">
                    <label for="shipper" class="lbl">Name:</label>
                    <input id="shipper" oninput="shippersearchOptions()" class="input cap" type="text" name="shipper-name" autocomplete="off" required>
                    <ul id="shipper-options"></ul>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="ship-add-l-1" class="input cap check" type="text" name="ship-add-l-1" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="ship-add-l-2" class="input cap check" type="text" name="ship-add-l-2" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="ship-add-l-3" class="input cap check" type="text" name="ship-add-l-3" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="ship-email" class="lbl">Email:</label>
                    <input id="ship-email" class="input cap" type="text" name="ship-email" autocomplete="off"     >
                </div>

                <div class="form-input">
                    <label for="ship-mobile" class="lbl">Mobile:</label>
                    <input id="ship-mobile" class="input numericInput" type="text" name="ship-mobile" autocomplete="off"  >
                </div>
            </div>
            <div class="form-title">Consignee Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="consignee" class="lbl">Name:</label>
                    <input id="consignee" oninput="consigneesearchOptions()" class="input cap check" type="text" name="con-name" autocomplete="off" required>
                    <ul id="consignee-options"></ul>
                </div>

                <div class="form-input">
                    <label for="con-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="con-add-l-1" class="input cap check" type="text" name="con-add-l-1" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="con-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="con-add-l-2" class="input cap check" type="text" name="con-add-l-2" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="con-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="con-add-l-3" class="input cap check" type="text" name="con-add-l-3" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="con-email" class="lbl">Email:</label>
                    <input id="con-email" class="input cap" type="text" name="con-email" autocomplete="off"   >
                </div>

                <div class="form-input">
                    <label for="con-mobile" class="lbl">Mobile:</label>
                    <input id="con-mobile" class="input numericInput" type="text" name="con-mobile" autocomplete="off"    >
                </div>

                <div class="form-input">
                    <label for="mobile" class="lbl">Alternate Mobile:</label>
                    <input id="mobile" class="input numericInput" type="text" name="con-alt-mobile" autocomplete="off">
                </div>
            </div>

            <div class="form-title">Notify Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="notify" class="lbl">Name:</label>
                    <input id="notify" oninput="notifysearchOptions()" class="input cap check" type="text" name="notify-name" autocomplete="off" required>
                    <ul id="notify-options"></ul>

                </div>

                <div class="form-input">
                    <label for="notify-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="notify-add-l-1" class="input cap check" type="text" name="notify-add-l-1" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="notify-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="notify-add-l-2" class="input cap check" type="text" name="notify-add-l-2" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="notify-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="notify-add-l-3" class="input cap check" type="text" name="notify-add-l-3" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="notify-email" class="lbl">Email:</label>
                    <input id="notify-email" class="input cap" type="text" name="notify-email" autocomplete="off"     >
                </div>

                <div class="form-input">
                    <label for="notify-mobile" class="lbl">Mobile:</label>
                    <input id="notify-mobile" class="input numericInput" type="text" name="notify-mobile" autocomplete="off"  >
                </div>

                <div class="form-input">
                    <label for="notify-alt-mobile" class="lbl">Alternate Mobile:</label>
                    <input id="notify-alt-mobile" class="input numericInput" type="text" name="notify-alt-mobile" autocomplete="off">
                </div>
            </div>
            
            <div class="form-line">
                
                <div class="form-input">
                    <label for="pol" class="lbl">Port of Loading(POL):</label>
                    <input id="pol" class="input cap check" type="text" name="pol" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="pod" class="lbl">Port of Delivery(POD):</label>
                    <input id="pod" class="input cap check" type="text" name="pod" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="vessel" class="lbl">Vessel Name</label>
                    <input id="vessel" class="input cap check" type="text" name="vessel" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="voyage" class="lbl">Voyage No.</label>
                    <input id="voyage" class="input cap check" type="text" name="voyage" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="ship-line" class="lbl">Shipping Line:</label>
                    <input id="ship-line" class="input cap check" type="text" name="ship-line" autocomplete="off" required>
                </div>

            </div>

            <div class="form-input">
                    <label for="desp-good" class="lbl">Decription of Good:</label>
                    <textarea id="desp-good" class="input cap check" type="text" name="desp-good" autocomplete="off" required></textarea>
                </div>

            <div class="form-line">
                
                

                

                <div class="form-input">
                    <label for="kind-pack" class="lbl">Kind of Package:</label>
                    <input id="kind-pack" class="input cap check" type="text" name="kind-pack" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="HS-code" class="lbl">HS Code:</label>
                    <input id="HS-code" class="input check" type="text" name="HS-code" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="SB-code" class="lbl">SB No:</label>
                    <input id="SB-code" class="input check" type="text" name="SB-code" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="SB-date" class="lbl">Date:</label>
                    <input id="SB-date" class="input check" type="date" name="SB-date" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="containerCount" class="lbl">No of Containers:</label>
                    <input id="containerCount" class="input check" type="number" name="no-of-cont" value="0" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <button type="button" onclick="addContainers()">ADD</button>
                </div>
            </div>

            <div class="container-details" id="containerForm">

            </div>

            <div class="form-line">

            <div class="form-input">
                    <label for="other-desp" class="lbl">Other Description:</label>
                    <textarea id="other-desp" class="input cap"  name="other-desp" autocomplete="off"></textarea>
                </div>
            </div>
            
            <div class="form-line">
                
                <div class="form-input">
                    <label for="freight" class="lbl">Freight:</label>
                    <select name="freight" id="freight">
                        <option value="PREPAID">PREPAID</option>
                        <option value="COLLECT">COLLECT</option>
                    </select>
                </div>

                <div class="form-input">
                    <label for="fright-payable" class="lbl">Freight Payable at:</label>
                    <input id="fright-payable" class="input cap check" type="text" name="fright-payable" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="place-of-issue" class="lbl">Place of Issue:</label>
                    <input id="place-of-issue" class="input cap check" type="text" name="place-of-issue" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="date-of-issue" class="lbl">Date of Issue:</label>
                    <input id="date-of-issue " class="input cap check" type="date" name="date-of-issue" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" required>
                </div>
            </div>

            <div class="submit-btn">
            <button class="generate-btn" name="job-submit" type="button" id="saveBtn" formtarget="_self" formaction="assets/functions/save-job.php" onclick="confirmSubmission(this)" disabled>Save</button>
<button class="generate-btn" name="job-submit" type="button" formaction="edit-purchase.php?BL=<?php echo $BL; ?>" formtarget="_self" onclick="confirmSubmission(this)" disabled>Next</button>
<button class="generate-btn" name="job-submit" type="reset" id="resetBtn">Reset</button>
<button class="generate-btn" name="job-submit" type="button" id="downloadBtn" formaction="assets/functions/download-job.php" formtarget="_BLANK" onclick="confirmSubmission(this)" disabled>Download</button>

            </div>

        </form>


    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    <script src="assets/js/index.js"></script>
    
    

</body>
</html>