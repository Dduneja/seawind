<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
include("assets/includes/db.php");
include("assets/includes/import-HSN.php");
include("assets/functions/info.php");
include("assets/functions/job-info.php");
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
                    <input class="input check" type="text" name="BL" value="<?php echo $_GET["BL"]; ?>" disabled>
                    <input class="" type="hidden" name="BL" value="<?php echo $_GET["BL"]; ?>" >
                </div>
            </div>
            <div class="form-title">Shipper Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="shipper" class="lbl">Name:</label>
                    <input id="shipper" class="input check" type="text" name="shipper-name" autocomplete="off" value="<?php echo $row["shipperName"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="ship-add-l-1" class="input check" type="text" name="ship-add-l-1" autocomplete="off" value="<?php echo $row["shipperAdd1"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="ship-add-l-2" class="input check" type="text" name="ship-add-l-2" autocomplete="off" value="<?php echo $row["shipperAdd2"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="ship-add-l-3" class="input check" type="text" name="ship-add-l-3" autocomplete="off" value="<?php echo $row["shipperAdd3"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-email" class="lbl">Email:</label>
                    <input id="ship-email" class="input" type="text" name="ship-email" autocomplete="off" value="<?php echo $row["shipperEmail"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-mobile" class="lbl">Mobile:</label>
                    <input id="ship-mobile" class="input numericInput" type="text" name="ship-mobile" autocomplete="off" value="<?php echo $row["shipMobile"]; ?>" required>
                </div>
            </div>
            <div class="form-title">Consignee Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="consignee" class="lbl">Name:</label>
                    <input id="consignee" class="input check" type="text" name="con-name" value="<?php echo $row["conName"]; ?>" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="con-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="con-add-l-1" class="input check" type="text" name="con-add-l-1" value="<?php echo $row["conAdd1"]; ?>" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="con-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="con-add-l-2" class="input check" type="text" name="con-add-l-2" autocomplete="off" value="<?php echo $row["conAdd2"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="con-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="con-add-l-3" class="input check" type="text" name="con-add-l-3" autocomplete="off" value="<?php echo $row["conAdd3"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="con-email" class="lbl">Email:</label>
                    <input id="con-email" class="input" type="text" name="con-email" autocomplete="off" value="<?php echo $row["conEmail"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="con-mobile" class="lbl">Mobile:</label>
                    <input id="con-mobile" class="input numericInput" type="text" name="con-mobile" autocomplete="off" value="<?php echo $row["conMobile"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="mobile" class="lbl">Alternate Mobile:</label>
                    <input id="mobile" class="input numericInput " type="text" name="con-alt-mobile" value="<?php echo $row["conAltMobile"]; ?>" autocomplete="off">
                </div>
            </div>

            <div class="form-title">Notify Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="notify-name" class="lbl">Name:</label>
                    <input id="notify-name" class="input check" type="text" name="notify-name" autocomplete="off" value="<?php echo $row["notifyName"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="notify-add-l-1" class="input check" type="text" name="notify-add-l-1" autocomplete="off" value="<?php echo $row["notifyAdd1"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="notify-add-l-2" class="input check" type="text" name="notify-add-l-2" autocomplete="off" value="<?php echo $row["notifyAdd2"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="notify-add-l-3" class="input check" type="text" name="notify-add-l-3" autocomplete="off" value="<?php echo $row["notifyAdd3"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-email" class="lbl">Email:</label>
                    <input id="notify-email" class="input" type="text" name="notify-email" autocomplete="off" value="<?php echo $row["notifyEmail"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-mobile" class="lbl">Mobile:</label>
                    <input id="notify-mobile" class="input numericInput" type="text" name="notify-mobile" autocomplete="off" value="<?php echo $row["notifyMobile"] ?>" required>
                </div>

                <div class="form-input">
                    <label for="notify-alt-mobile" class="lbl">Alternate Mobile:</label>
                    <input id="notify-alt-mobile" class="input numericInput" type="text" name="notify-alt-mobile" value="<?php echo $row["notifyAltMobile"] ?>" autocomplete="off">
                </div>
            </div>
            
            <div class="form-line">
                
                <div class="form-input">
                    <label for="pol" class="lbl">Port of Loading(POL):</label>
                    <input id="pol" class="input check" type="text" name="pol" autocomplete="off" value="<?php echo $row["POL"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="pod" class="lbl">Port of Delivery(POD):</label>
                    <input id="pod" class="input check" type="text" name="pod" autocomplete="off" value="<?php echo $row["POD"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="vessel" class="lbl">Vessel Name</label>
                    <input id="vessel" class="input check" type="text" name="vessel" autocomplete="off" value="<?php echo $row["vessel"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="voyage" class="lbl">Voyage No.</label>
                    <input id="voyage" class="input check" type="text" name="voyage" autocomplete="off" value="<?php echo $row["voyage"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="ship-line" class="lbl">Shipping Line:</label>
                    <input id="ship-line" class="input check" type="text" name="ship-line" autocomplete="off" value="<?php echo $row["shipLine"]; ?>" required>
                </div>

            </div>

            <div class="form-input">
                    <label for="desp-good" class="lbl">Decription of Good:</label>
                    <textarea id="desp-good" class="input check" type="text" name="desp-good" autocomplete="off" required ><?php echo $row["despGood"]; ?></textarea>
                </div>

            <div class="form-line">
                
                

                

                <div class="form-input">
                    <label for="kind-pack" class="lbl">Kind of Package:</label>
                    <input id="kind-pack" class="input check" type="text" name="kind-pack" autocomplete="off" value="<?php echo $row["kindPack"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="HS-code" class="lbl">HS Code:</label>
                    <input id="HS-code" class="input check" type="text" name="HS-code" autocomplete="off" value="<?php echo $row["HS"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="SB-code" class="lbl">SB No:</label>
                    <input id="SB-code" class="input check" type="text" name="SB-code" autocomplete="off" value="<?php echo $row["SB"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="SB-date" class="lbl">Date:</label>
                    <input id="SB-date" class="input check" type="date" name="SB-date" autocomplete="off" value="<?php echo $row["date"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="containerCount" class="lbl">No of Containers:</label>
                    <input id="containerCount" class="input check" type="number" name="no-of-cont"  value="<?php echo $row["noContainer"]; ?>" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <button type="button" onclick="addContainers()">ADD</button>
                </div>
            </div>

            <div class="container-details" id="containerForm">

                <?php
                    $containerArr = unserialize($row["container"]);
                    $containerSizeArr = unserialize($row["containerSize"]);
                    $lineArr = unserialize($row["lineSealNumber"]);
                    $packageArr = unserialize($row["stuffedPackage"]);
                    $grossArr = unserialize($row["grossWeight"]);
                    $netArr = unserialize($row["netWeight"]);
                    for($i = 0; $i < $row["noContainer"]; $i++){
                        ?>
                            <div class="form-line">
                                <div class="form-input">
                                    <label class="lbl">Container-no:</label>
                                    <input class="input check" type="text" name="container-no:[]" autocomplete="off" value="<?php echo $containerArr[$i]; ?>" required="">
                                </div>
                                <div class="form-input">
                                    <label class="lbl">Container-Size:</label>
                                    <input class="input check" type="text" name="container-size:[]" autocomplete="off" value="<?php echo $containerSizeArr[$i]; ?>" required="">
                                </div>
                                <div class="form-input">
                                    <label class="lbl">Line Seal Number:</label>
                                    <input class="input check" type="text" name="line-seal-number:[]" autocomplete="off" value="<?php echo $lineArr[$i]; ?>" required="">
                                </div>
                                <div class="form-input">
                                    <label class="lbl">Stuffed Packages:</label>
                                    <input class="input check" type="text" name="stuffed-packages:[]" autocomplete="off" value="<?php echo $packageArr[$i]; ?>" required="">
                                </div>
                                <div class="form-input">
                                    <label class="lbl">Gross Weight/Volume:</label>
                                    <input class="input check" type="number" step="0.01" name="gross-weight:[]" autocomplete="off" value="<?php echo $grossArr[$i]; ?>" required="">
                                </div>
                                <div class="form-input">
                                    <label class="lbl">Net Weight/Volume:</label>
                                    <input class="input check" type="number" step="0.01" name="net-weight:[]" autocomplete="off" value="<?php echo $netArr[$i]; ?>" required="">
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                
            </div>
            <div class="form-line">

            <div class="form-input">
                    <label for="other-desp" class="lbl">Other Description:</label>
                    <textarea id="other-desp" class="input"  name="other-desp" autocomplete="off"><?php echo str_replace("<br>", "\n", $row["otherdesp"]); ?></textarea>
                </div>
            </div>
            
            <div class="form-line">
                
                <div class="form-input">
                    <label for="freight" class="lbl">Freight:</label>
                    <select name="freight" id="freight">
                        <option value="PREPAID" <?php if($row["freightPayable"] == "PREPAID"){ echo "selected";}?>>PREPAID</option>
                        <option value="COLLECT" <?php if($row["freightPayable"] == "COLLECT"){ echo "selected";}?>>COLLECT</option>
                    </select>
                </div>

                <div class="form-input">
                    <label for="fright-payable" class="lbl">Freight Payable at:</label>
                    <input id="fright-payable" class="input check" type="text" name="fright-payable" value="<?php echo $row["freightPayable"]; ?>" autocomplete="off" required>
                </div>

                <div class="form-input">
                    <label for="place-of-issue" class="lbl">Place of Issue:</label>
                    <input id="place-of-issue" class="input check" type="text" name="place-of-issue" autocomplete="off" value="<?php echo $row["placeOfIssue"]; ?>" required>
                </div>

                <div class="form-input">
                    <label for="date-of-issue" class="lbl">Date of Issue:</label>
                    <input id="date-of-issue" class="input check" type="date" name="date-of-issue" autocomplete="off" value="<?php echo $row["dateOfIssue"]; ?>" required>
                </div>
            </div>

            <div class="submit-btn">
                <button class="generate-btn" name="job-submit" type="button" id="saveBtn" formaction="assets/functions/edit-job.php" formtarget="_self" onclick="confirmSubmission(this)" disabled>Save</button>
                <button class="generate-btn" name="job-submit" type="button" id="nextBtn" formaction="edit-purchase.php?BL=<?php echo $BL; ?>" formtarget="_self" onclick="confirmSubmission(this)">Next</button>
                <button class="generate-btn" name="job-submit" type="reset" id="resetBtn">Reset</button>
                <button class="generate-btn" name="job-submit" type="button" id="downloadBtn" formaction="assets/functions/download-job.php" formtarget="_blank" onclick="confirmSubmission(this)">Download</button>
            </div>

        </form>


    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    <script src="assets/js/index.js"></script>
    
    

</body>
</html>