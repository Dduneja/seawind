<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
include("assets/includes/db.php");
include("assets/includes/import-HSN.php");
include("assets/functions/purchase-info.php");

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
        <form method="post" id="form" action="create-invoice.php" class="form">
            <input type="hidden" name="BL-date" value="<?php echo $job["dateOfIssue"]; ?>">
            <input type="hidden" name="vessel" value="<?php echo $job["vessel"]; ?>">
            <input type="hidden" name="voyage" value="<?php echo $job["voyage"]; ?>">
            <input type="hidden" name="noContainer" value="<?php echo $job["noContainer"]; ?>">
            <input type="hidden" name="pol" value="<?php echo $job["POL"]; ?>">
            <input type="hidden" name="pod" value="<?php echo $job["POD"]; ?>">



            <div class="form-input">
                <div class="form-input">
                    <label for="BL" class="lbl">Name:</label>
                    <input id="BL" class="input check" type="text" name="BL" autocomplete="off" value="<?php echo $BL; ?>" disabled>
                    <input  class="input" type="hidden" name="BL" autocomplete="off" value="<?php echo $BL; ?>">
                </div>
            </div>

            <div class="form-title">Shipper Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="shipper" class="lbl">Name:</label>
                    <input id="shipper" class="input check" type="text" name="shipper-name" autocomplete="off" value="<?php echo $job["shipperName"]; ?>" disabled>
                    <input  class="input" type="hidden" name="shipper-name" autocomplete="off" value="<?php echo $job["shipperName"]; ?>">
                </div>

                <div class="form-input">
                    <label for="ship-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="ship-add-l-1" class="input check" type="text" name="ship-add-l-1" autocomplete="off" value="<?php echo $job["shipperAdd1"]; ?>" disabled>
                    <input  class="input" type="hidden" name="ship-add-l-1" autocomplete="off" value="<?php echo $job["shipperAdd2"]; ?>">
                </div>

                <div class="form-input">
                    <label for="ship-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="ship-add-l-2" class="input check" type="text" name="ship-add-l-2" autocomplete="off" value="<?php echo $job["shipperAdd2"]; ?>" disabled>
                    <input  class="input" type="hidden" name="ship-add-l-2" autocomplete="off" value="<?php echo $job["shipperAdd2"]; ?>">
                </div>

                <div class="form-input">
                    <label for="ship-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="ship-add-l-3" class="input check" type="text" name="ship-add-l-3" autocomplete="off" value="<?php echo $job["shipperAdd3"]; ?>" disabled>
                    <input  class="input" type="hidden" name="ship-add-l-3" autocomplete="off" value="<?php echo $job["shipperAdd3"]; ?>">
                </div>

                <div class="form-input">
                    <label for="ship-email" class="lbl">Email:</label>
                    <input id="ship-email" class="input" type="text" name="ship-email" autocomplete="off" value="<?php echo $job["shipperEmail"]; ?>" disabled>
                    <input id="ship-email" class="input" type="hidden" name="ship-email" autocomplete="off" value="<?php echo $job["shipperEmail"]; ?>" >
                </div>

                <div class="form-input">
                    <label for="ship-mobile" class="lbl">Mobile:</label>
                    <input id="ship-mobile" class="input" type="text" name="ship-mobile" autocomplete="off" value="<?php echo $job["shipMobile"]; ?>" disabled>
                    <input  class="input" type="hidden" name="ship-mobile" autocomplete="off" value="<?php echo $job["shipMobile"]; ?>">
                </div>
            </div>
            <div class="form-title">Consignee Details</div>
            <div class="form-line">
                
                <div class="form-input">
                    <label for="consignee" class="lbl">Name:</label>
                    <input id="consignee" class="input check" type="text" name="con-name" autocomplete="off" value="<?php echo $job["conName"]; ?>" disabled>
                    <input class="input" type="hidden" name="con-name" autocomplete="off" value="<?php echo $job["conName"]; ?>">
                </div>

                <div class="form-input">
                    <label for="con-add-l-1" class="lbl">Address Line 1:</label>
                    <input id="con-add-l-1" class="input check" type="text" name="con-add-l-1" autocomplete="off" value="<?php echo $job["conAdd1"]; ?>" disabled>
                    <input  class="input" type="hidden" name="con-add-l-1" autocomplete="off" value="<?php echo $job["conAdd1"]; ?>" >
                </div>

                <div class="form-input">
                    <label for="con-add-l-2" class="lbl">Address Line 2:</label>
                    <input id="con-add-l-2" class="input check" type="text" name="con-add-l-2" autocomplete="off" value="<?php echo $job["conAdd2"]; ?>" disabled>
                    <inputclass="input" type="hidden" name="con-add-l-2" autocomplete="off" value="<?php echo $job["conAdd2"]; ?>" >
                </div>

                <div class="form-input">
                    <label for="con-add-l-3" class="lbl">Address Line 3:</label>
                    <input id="con-add-l-3" class="input check" type="text" name="con-add-l-3" autocomplete="off" value="<?php echo $job["conAdd3"]; ?>" disabled>
                    <input class="input" type="hidden" name="con-add-l-3" autocomplete="off" value="<?php echo $job["conAdd3"]; ?>" >
                </div>

                <div class="form-input">
                    <label for="con-email" class="lbl">Email:</label>
                    <input id="con-email" class="input " type="text" name="con-email" autocomplete="off" value="<?php echo $job["conEmail"]; ?>" disabled>
                    <inputclass="input" type="hidden" name="con-email" autocomplete="off" value="<?php echo $job["conEmail"]; ?>">
                </div>

                <div class="form-input">
                    <label for="con-mobile" class="lbl">Mobile:</label>
                    <input id="con-mobile" class="input " type="text" name="con-mobile" autocomplete="off" value="<?php echo $job["conMobile"]; ?>" disabled>
                    <input  class="input" type="hidden" name="con-mobile" autocomplete="off" value="<?php echo $job["conMobile"]; ?>">
                </div>

                <div class="form-input">
                    <label for="mobile" class="lbl">Alternate Mobile:</label>
                    <input id="mobile" class="input" type="text" name="con-alt-mobile" autocomplete="off" value="<?php echo $job["conAltMobile"]; ?>" disabled>
                    <input class="input" type="hidden" name="con-alt-mobile" autocomplete="off" value="<?php echo $job["conAltMobile"]; ?>" >
                </div>
            </div>

            <div class="form-line">
                <div class="form-input">
                    <label for="mbl" class="lbl">MBL no.</label>
                    <input type="text" name="mbl" id="mbl" class="input check" autocomplete="off" value="<?php echo $row["mbl"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="arrival-date" class="lbl">Arrival Date:</label>
                    <input type="date" name="arrival-date" id="arrival-date" class="input check" autocomplete="off" value="<?php echo $row["arrivalDate"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="sailing-date" class="lbl">Sailing Date:</label>
                    <input type="date" name="sailing-date" id="sailing-date" class="input check" autocomplete="off" value="<?php echo $row["sailingDate"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="plr" class="lbl">PLR:</label>
                    <input type="text" name="plr" id="plr" class="input check" autocomplete="off" value="<?php echo $row["plr"]; ?>" required>
                </div>
            </div>

            <div class="form-title">Services(IGST)</div>
            <div class="item">
                <div class="item-detail-desp">
                    <label for="igst-desp" class="lbl">Description</label>
                    <input id="igst-desp" class="input" type="text" name="igst-desp" oninput="igstsearchOptions()" autocomplete="off" >
                    <ul id="igst-desp-options"></ul>
                </div>
                <div class="item-detail-rate">
                    <label for="igst-rate" class="lbl">Rate</label>
                    <input id="igst-rate" class="input" type="text" name="igst-rate" autocomplete="off" >
                </div>
                <div class="item-detail-rate">
                    <label for="igst-qty" class="lbl">Quantity</label>
                    <input id="igst-qty" class="input" type="text" name="igst-qty" autocomplete="off" >
                </div>
                <div class="item-detail-curr">
                    <label for="igst-currency" class="lbl">Currency</label>
                    <select name="igst-currency" id="igst-currency" class="input">
                        <option value="INR">INR</option>
                        <option value="USD">USD</option>
                        <option value="EURO">EURO</option>
                    </select>
                </div>
                <div class="item-detail-exrate">
                    <label for="igst-exrate" class="lbl">Exchange Rate</label>
                    <input id="igst-exrate" class="input" type="text" name="igst-exrate" value="1.00" >
                </div>
                <div>
                    <button class="add-btn" onclick="igstaddData()" type="button">ADD</button>
                </div>
            </div>
            
            <input type="hidden" id="invoice-items-igst" name="invoice-items-igst" value="">
            <div class="table" >
                <table id="igst-item-table" class="table-element">
                    <tr>
                        <th class="table-desp">Description</th>
                        <th class="table-HSN">HSN</th>
                        <th class="table-rate">Rate</th>
                        <th class="table-qty">Qty</th>
                        <th class="table-curr">Currency</th>
                        
                        <th class="table-igst">IGST</th>
                        <th class="table-total">Total</th>
                        <th class="table-remove">Remove</th>
                    </tr>
                </table>   
            </div>

            <div class="form-title">Services(CGST and SGST)</div>
            <div class="item">
                <div class="item-detail-desp">
                    <label for="cgst-desp" class="lbl">Description</label>
                    <input id="cgst-desp" class="input" type="text" name="cgst-desp" oninput="cgstsearchOptions()" autocomplete="off" >
                    <ul id="cgst-desp-options"></ul>
                </div>
                <div class="item-detail-rate">
                    <label for="cgst-rate" class="lbl">Rate</label>
                    <input id="cgst-rate" class="input" type="text" name="cgst-rate" autocomplete="off" >
                </div>
                <div class="item-detail-rate">
                    <label for="cgst-qty" class="lbl">Quantity</label>
                    <input id="cgst-qty" class="input" type="text" name="cgst-qty" autocomplete="off" >
                </div>
                <div class="item-detail-curr">
                    <label for="cgst-currency" class="lbl">Currency</label>
                    <select name="cgst-currency" id="cgst-currency" class="input">
                        <option value="INR">INR</option>
                        <option value="USD">USD</option>
                        <option value="EURO">EURO</option>
                    </select>
                </div>
                <div class="item-detail-exrate">
                    <label for="cgst-exrate" class="lbl">Exchange Rate</label>
                    <input id="cgst-exrate" class="input" type="text" name="cgst-exrate" value="1.00" >
                </div>
                <div>
                    <button class="add-btn" onclick="cgstaddData()" type="button">ADD</button>
                </div>
            </div>
            <input type="hidden" id="invoice-items-cgst" name="invoice-items-cgst">
            <div class="table" >
                <table id="cgst-item-table" class="table-element">
                    <tr>
                        <th class="table-desp">Description</th>
                        <th class="table-HSN">HSN</th>
                        <th class="table-rate">Rate</th>
                        <th class="table-qty">Qty</th>
                        <th class="table-curr">Currency</th>
                        <th class="table-cgst">CGST</th>
                        <th class="table-sgst">SGST</th>
                        
                        <th class="table-total">Total</th>
                        <th class="table-remove">Remove</th>
                    </tr>
                </table>   
            </div>
             
            <div class="form-line">
                <div class="form-input">
                    <label for="acc-name" class="lbl">Account Name:</label>
                    <input type="text" name="acc-name" id="acc-name" class="input cap" autocomplete="off" value="<?php echo $row["accName"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="acc-no" class="lbl">Account no.</label>
                    <input type="text" name="acc-no" id="acc-no" class="input cap" autocomplete="off" value="<?php echo $row["accNo"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="bank-name" class="lbl">Bank Name:</label>
                    <input type="text" name="bank-name" id="bank-name" class="input cap" autocomplete="off" value="<?php echo $row["bankName"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="branch-name" class="lbl">Branch Name:</label>
                    <input type="text" name="branch-name" id="branch-name" class="input cap" autocomplete="off" value="<?php echo $row["branchName"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="bank-add" class="lbl">Bank Address:</label>
                    <input type="text" name="bank-add" id="bank-add" class="input cap" autocomplete="off" value="<?php echo $row["bankAdd"]; ?>" required>
                </div>
                <div class="form-input">
                    <label for="ifsc" class="lbl">IFSC:</label>
                    <input type="text" name="ifsc" id="ifsc" class="input cap" autocomplete="off" value="<?php echo $row["ifsc"]; ?>" required>
                </div>
            </div>


            <div class="submit-btn">
            <button class="generate-btn" name="job-submit" type="button" id="saveBtn" formaction="assets/functions/edit-purchase.php" formtarget="" onclick="confirmSubmission(this)" disabled>Save</button>
                <button class="generate-btn" name="job-submit" type="button" id="nextBtn" formaction="edit-invoice.php?BL=<?php echo $BL; ?>" formtarget="" onclick="confirmSubmission(this)">Next</button>
                <button class="generate-btn" name="job-submit" type="reset" id="resetBtn">Reset</button>
                <button class="generate-btn" name="job-submit" type="button" id="downloadBtn" formaction="assets/functions/download-purchase.php" formtarget="_blank" onclick="confirmSubmission(this)">Download</button>
            </div>

        </form>


    </div>

    <footer style="margin-top: 60px; margin-bottom: 20px; width:100%; text-align: center;">Powered by Bzee Bee Technologies</footer>
    <script src="assets/js/index.js"></script>
            <?php
            $iarr = unserialize($row["invoiceItemsIGST"]);
            $igstJSON = json_encode($iarr);
            
            ?>
            <script>
                var igstArr = JSON.parse('<?php echo $igstJSON; ?>');
                igstArr.forEach(function(element) {
                    invoiceItemsIGST.push(element);
                    const invoiceInput = document.querySelector("#invoice-items-igst");
                    invoiceInput.value = JSON.stringify(invoiceItemsIGST);

                    const table = document.querySelector("#igst-item-table");
    
                    const row = table.insertRow(-1);

                    const c0 = row.insertCell(0);
                    const c1 = row.insertCell(1);
                    const c2 = row.insertCell(2);
                    const c3 = row.insertCell(3);
                    const c4 = row.insertCell(4);
                    const c5 = row.insertCell(5);
                    const c6 = row.insertCell(6);
                    const c7 = row.insertCell(7);
                   

                    

                    c0.innerText = element[0];
                    c1.innerText = element[1];
                    c2.innerText = element[2];
                    c3.innerText = element[3];
                    c4.innerText = element[4];
                    c5.innerText =  parseFloat(element[5] * element[7] / 100).toFixed(2) + " (" + element[7].toFixed(2) + "%)";
                    c6.innerText = "₹ " + element[6].toFixed(2);
                    c7.innerHTML = "<button button='button' onclick='igstremove(\""+element[6]+"\")'>remove</button>";
                });
            </script>
            <?php
            $carr = unserialize($row["invoiceItemsCGST"]);
            $cgstJSON = json_encode($carr);
            
            ?>
            <script>
                var cgstArr = JSON.parse('<?php echo $cgstJSON; ?>');
                cgstArr.forEach(function(element) {
                    invoiceItemsCGST.push(element);
                    const invoiceInput = document.querySelector("#invoice-items-cgst");
                    invoiceInput.value = JSON.stringify(invoiceItemsCGST);

                    const table = document.querySelector("#cgst-item-table");
    
                    const row = table.insertRow(-1);

                    const c0 = row.insertCell(0);
                    const c1 = row.insertCell(1);
                    const c2 = row.insertCell(2);
                    const c3 = row.insertCell(3);
                    const c4 = row.insertCell(4);
                    const c5 = row.insertCell(5);
                    const c6 = row.insertCell(6);
                    const c7 = row.insertCell(7);
                    const c8 = row.insertCell(8);
                    

                    

                    c0.innerText = element[0];
                    c1.innerText = element[1];
                    c2.innerText = element[2];
                    c3.innerText = element[3];
                    c4.innerText = element[4];
                    c5.innerText =  parseFloat(element[5] * element[7] / 100).toFixed(2) + " (" + element[7].toFixed(2) + "%)";
                    c6.innerText =  parseFloat(element[5] * element[7] / 100).toFixed(2) + " (" + element[7].toFixed(2) + "%)";
                    c7.innerText = "₹ " + element[6].toFixed(2);
                    c8.innerHTML = "<button button='button' onclick='cgstremove(\""+element[6]+"\")'>remove</button>";
                });
            </script>

</body>
</html>