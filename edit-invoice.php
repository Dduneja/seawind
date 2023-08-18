<?php
if(!isset($_COOKIE["user"])){
    header("Location: login.php");
}
include("assets/includes/db.php");
include("assets/includes/import-HSN.php");
include("assets/functions/invoice-info.php");

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
<link rel="stylesheet" href="assets/css/create-invoice.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <li class="nav-link"><a href="home.php">Dashboard</a></li>

                <li class="nav-link active"><a href="index.php">Create Invoice</a></li>
                <li class="nav-link"><a href="add-HSN.php">Add HSN</a></li>
                <li class="nav-link"><a href="job-data.php">Job Data</a></li>
                
                
            </ul>
            
            
        </div>
        <form action="logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    
    </nav>

    <div class="container">
        <div class="title">Customer Invoice</div>
        
        <form method="post" id="form" action="invoice-download.php" class="form">
            
        <input type="hidden" name="BL" value="<?php echo $_GET["BL"]; ?>">    
        <div class="form-line">
                <div class="form-input">
                    <label for="invoice-no" class="lbl">Invoice No.:</label>
                    <input class="input check" type="text" name="invoice-no" id="invoice-no" value="<?php echo $row["invoiceNo"] ?>" required>
                </div>
                <div class="form-input">
                    <label for="invoice-date" class="lbl">Invoice Date:</label>
                    <input class="input" type="date" name="invoice-date" id="invoice-date" value="<?php echo $row["invoiceDate"] ?>" required>
                </div>
                <div class="form-input">
                    <label for="due-date" class="lbl">Due Date:</label>
                    <input class="input check" type="date" name="due-date" id="due-date" value="<?php echo $row["dueDate"] ?>" required>
                </div>
                <div class="form-input">
                    <label for="shipment-no" class="lbl">Shipment No:</label>
                    <input class="input check" type="text" name="shipment-no" id="shipment-no" value="<?php echo $row["shipmentNo"] ?>" required>
                </div>
                <div class="form-input">
                    <label for="shipment-type" class="lbl">Shipment Type:</label>
                    <input class="input check" type="text" name="shipment-type" id="shipment-type" value="<?php echo $row["shipmentType"] ?>" required>
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
            <input type="hidden" id="invoice-items-igst" name="invoice-items-igst">
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
            <div class="form-line">
                <div class="form-input">
                    <label for="iadvannce" class="lbl">Advanced Recieved(IGST):</label>
                    <input type="text" id="iadvance" class="input numericInput" name="iadvance" value="<?php echo $row["iadvance"] ?>">
                </div>
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
                    <label for="cadvannce" class="lbl">Advanced Recieved(CGST):</label>
                    <input type="text" id="cadvance" class="input numericInput" name="cadvance" value="<?php echo $row["cadvance"] ?>">
                </div>
            </div>

            <div class="submit-btn">
            <button class="generate-btn" name="job-submit" type="button" id="saveBtn" formaction="assets/functions/edit-invoice.php" formtarget="" onclick="confirmSubmission(this)" disabled>Save</button>
                
                <button class="generate-btn" name="job-submit" type="reset" id="resetBtn">Reset</button>
                <button class="generate-btn" name="job-submit" type="button" id="downloadBtn" formaction="assets/functions/download-invoice.php" formtarget="_blank" onclick="confirmSubmission(this)">Download</button>
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
                    const c7 = row.insertCell(7);;

                    

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
                    // const c9 = row.insertCell(9);
                    
                    

                    c0.innerText = element[0];
                    c1.innerText = element[1];
                    c2.innerText = parseFloat(element[2]);
                    c3.innerText = element[3];
                    c4.innerText = element[4];
                    c5.innerText =  parseFloat(element[5] * element[7] / 100).toFixed(2) + " (" + element[7].toFixed(2) + "%)";
                    c6.innerText =  parseFloat(element[5] * element[7] / 100).toFixed(2) + " (" + element[7].toFixed(2) + "%)";
                    
                    c7.innerText = "₹ " + element[6].toFixed(2);
                    c8.innerHTML = "<button button='button' onclick='cgstremove(\""+element[6]+"\")'>remove</button>";
                    // c9.innerText = element[8];
                });
            </script>
</body>
</html>