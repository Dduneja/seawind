

const invoiceItemsIGST = [];
const invoiceItemsCGST = [];

function cgstaddData() {
  const desp = document.querySelector("#cgst-desp").value;
  const currency = document.querySelector("#cgst-currency").value;
  const qty = parseInt(document.querySelector("#cgst-qty").value);
  const rate = parseFloat(document.querySelector("#cgst-rate").value);
  const exrate = parseFloat(document.querySelector("#cgst-exrate").value);
  const hsn = chsnDict[desp][0];
  const cgst = parseFloat(chsnDict[desp][1]);
  const gst = 2 * cgst;
  const taxableValue = parseFloat(rate * qty) * exrate;
  const totalAmount = parseFloat((taxableValue * gst / 100) + taxableValue);
  // const exchange = parseFloat(document.querySelector("#cgst-exrate").value);

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
  const c9 = row.insertCell(9);


  const itemsArray = [desp, hsn, rate, qty, currency, taxableValue, totalAmount, cgst,exrate];

  invoiceItemsCGST.push(itemsArray);
  const invoiceInput = document.querySelector("#invoice-items-cgst");
  invoiceInput.value = JSON.stringify(invoiceItemsCGST);

  c0.innerText = desp;
  c1.innerText = hsn;
  c2.innerText = parseFloat(rate);
  c3.innerText = qty;
  c4.innerText = currency;
  c5.innerText = parseFloat(taxableValue * cgst / 100).toFixed(2) + " (" + cgst.toFixed(2) + "%)";
  c6.innerText = parseFloat(taxableValue * cgst / 100).toFixed(2) + " (" + cgst.toFixed(2) + "%)";
  c7.innerText = "₹ " + totalAmount.toFixed(2);
  c8.innerHTML = "<button button='button' onclick='cgstremove(\"" + desp + "\")'>remove</button>"
  c9.innerText = exrate;
  document.querySelector("#cgst-desp").value = "";
  document.querySelector("#cgst-currency").value = "INR";
  document.querySelector("#cgst-qty").value = "";
  document.querySelector("#cgst-rate").value = "";
  document.querySelector("#cgst-exrate").value = "1.00";
}

function igstaddData() {
  const desp = document.querySelector("#igst-desp").value;
  const currency = document.querySelector("#igst-currency").value;
  const qty = parseInt(document.querySelector("#igst-qty").value);
  const rate = parseInt(document.querySelector("#igst-rate").value);
  const exrate = parseFloat(document.querySelector("#igst-exrate").value);
  const hsn = ihsnDict[desp][0];
  const igst = parseFloat(ihsnDict[desp][3]);
  const gst = igst;
  const taxableValue = parseFloat(rate * qty) * exrate;
  const totalAmount = parseFloat((taxableValue * gst / 100) + taxableValue);

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

  const itemsArray = [desp, hsn, rate, qty, currency, taxableValue, totalAmount, igst];

  invoiceItemsIGST.push(itemsArray);
  const invoiceInput = document.querySelector("#invoice-items-igst");
  invoiceInput.value = JSON.stringify(invoiceItemsIGST);

  c0.innerText = desp;
  c1.innerText = hsn;
  c2.innerText = rate;
  c3.innerText = qty;
  c4.innerText = currency;
  c5.innerText = parseFloat(taxableValue * igst / 100).toFixed(2) + " (" + igst.toFixed(2) + "%)";
  c6.innerText = "₹ " + totalAmount.toFixed(2);
  c7.innerHTML = "<button button='button' onclick='igstremove(\"" + desp + "\")'>remove</button>";

  document.querySelector("#igst-desp").value = "";
  document.querySelector("#igst-currency").value = "INR";
  document.querySelector("#igst-qty").value = "";
  document.querySelector("#igst-rate").value = "";
  document.querySelector("#igst-exrate").value = "1.00";
}

function cgstremove(desp) {
  const table = document.querySelector("#cgst-item-table");

  // Find the row to remove
  const rows = table.getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const cells = row.getElementsByTagName("td");
    const cell = Array.from(cells).find(c => c.textContent === desp);
    if (cell) {
      table.deleteRow(i);
      break;
    }
  }

  // Find the index of the item to remove in invoiceItems
  const removeIndex = invoiceItemsCGST.findIndex(item => item[0] === desp);

  // Remove the item from invoiceItems
  if (removeIndex !== -1) {
    invoiceItemsCGST.splice(removeIndex, 1);
  }

  // Update the invoice input value
  const invoiceInput = document.querySelector("#invoice-items-cgst");
  invoiceInput.value = JSON.stringify(invoiceItemsCGST);
}

function igstremove(desp) {
  const table = document.querySelector("#igst-item-table");

  // Find the row to remove
  const rows = table.getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const cells = row.getElementsByTagName("td");
    const cell = Array.from(cells).find(c => c.textContent === desp);
    if (cell) {
      table.deleteRow(i);
      break;
    }
  }

  // Find the index of the item to remove in invoiceItems
  const removeIndex = invoiceItemsIGST.findIndex(item => item[0] === desp);

  // Remove the item from invoiceItems
  if (removeIndex !== -1) {
    invoiceItemsIGST.splice(removeIndex, 1);
  }

  // Update the invoice input value
  const invoiceInput = document.querySelector("#invoice-items-igst");
  invoiceInput.value = JSON.stringify(invoiceItemsIGST);
}

function cgstsearchOptions() {

  // Clear the options menu
  const optionsMenu = document.getElementById("cgst-desp-options");
  optionsMenu.innerHTML = "";

  // Get the search input value
  const searchInput = document.getElementById("cgst-desp").value.toLowerCase();

  // Filter the options array based on the search input
  const matchedOptions = chsnCode.filter((option) =>
    option.toLowerCase().includes(searchInput)
  );

  // Create and display the matched options in the menu
  matchedOptions.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option;
    li.addEventListener("click", () => cgstselectOption(option));
    optionsMenu.appendChild(li);
  });


}

function igstsearchOptions() {

  // Clear the options menu
  const optionsMenu = document.getElementById("igst-desp-options");
  optionsMenu.innerHTML = "";

  // Get the search input value
  const searchInput = document.getElementById("igst-desp").value.toLowerCase();

  // Filter the options array based on the search input
  const matchedOptions = ihsnCode.filter((option) =>
    option.toLowerCase().includes(searchInput)
  );

  // Create and display the matched options in the menu
  matchedOptions.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option;
    li.addEventListener("click", () => igstselectOption(option));
    optionsMenu.appendChild(li);
  });


}

function cgstselectOption(option) {
  // Set the selected option as the input value
  document.getElementById("cgst-desp").value = option;

  // Clear the options menu
  const optionsMenu = document.getElementById("cgst-desp-options");
  optionsMenu.innerHTML = "";
}

function igstselectOption(option) {
  // Set the selected option as the input value
  document.getElementById("igst-desp").value = option;

  // Clear the options menu
  const optionsMenu = document.getElementById("igst-desp-options");
  optionsMenu.innerHTML = "";
}
 
function addContainers() {
  var containerCount = parseInt(document.getElementById('containerCount').value);
  var containerForm = document.getElementById('containerForm');

  // Clear previous form inputs
  containerForm.innerHTML = '';

  for (var i = 0; i < containerCount; i++) {
    // Create form line div
    var formLineDiv = document.createElement('div');
    formLineDiv.className = 'form-line';

    for (var j = 0; j < 6; j++) {
      // Create form input div
      var formInputDiv = document.createElement('div');
      formInputDiv.className = 'form-input';

      // Create label
      var label = document.createElement('label');
      var labelText = '';
      var inputType = 'text';

      switch (j) {
        case 0:
          labelText = 'Container-no:';
          break;
        case 1:
          labelText = 'Container-Size:';
          break;
        case 2:
          labelText = 'Line Seal Number:';
          break;
        case 3:
          labelText = 'Stuffed Packages:';
          break;
        case 4:
          labelText = 'Gross Weight/Volume:';
          inputType = 'number';
          break;
        case 5:
          labelText = 'Net Weight/Volume:';
          inputType = 'number';
          break;
      }

      label.className = 'lbl';
      label.innerHTML = labelText;
      formInputDiv.appendChild(label);

      // Create input
      var input = document.createElement('input');
      input.classList.add('input', 'check');
      input.type = inputType;
      if (inputType == "number") {
        input.step = "0.01";
      }
      else{
        input.classList.add('cap');
      }
      input.name = labelText.replace(/\s/g, '-').toLowerCase() + '[]';
      input.autocomplete = 'off';
      input.required = true;
      formInputDiv.appendChild(input);

      // Append form input div to form line div
      formLineDiv.appendChild(formInputDiv);
    }

    // Append form line div to container form
    containerForm.appendChild(formLineDiv);
  }
}

function checkFormFields() {
  var inputs = document.querySelectorAll('.check');
  var isFilled = true;

  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value.trim() === '') {
      isFilled = false;
      break;
    }
  }

  return isFilled;
}


function confirmSubmission(e) {
  if (checkFormFields()) {
    var confirmation = confirm("Are you sure you want to submit the form?");
    if (confirmation) {
      // If the user confirms, submit the form
      var textarea = document.getElementById("other-desp");
      if (textarea) {
        var text = textarea.value;
        var convertedText = text.replace(/\n/g, "<br>");
        textarea.value = convertedText;
      }


      const attribute = e.getAttribute('formaction');
      const target = e.getAttribute('formtarget');
      document.getElementById("form").setAttribute('action', attribute);
      document.getElementById("form").setAttribute('target', target);
      document.getElementById("form").submit();

    } else {
      // If the user cancels, do nothing
      return false;
    }
  }
  else {
    alert("please fill all data");
  }

}

// Get the form element
var formElement = document.getElementById('form');

// Add event listener to the form inputs
formElement.addEventListener('input', function () {
  // Get the buttons
  var saveBtn = document.getElementById('saveBtn');
  var downloadBtn = document.getElementById('downloadBtn');
  var nextBtn = document.getElementById('nextBtn');

  // Enable the Save button and disable the Download button
  saveBtn.disabled = false;
  downloadBtn.disabled = true;
  nextBtn.disabled = true;
});

var numericInputs = document.querySelectorAll('.numericInput');

numericInputs.forEach(function (input) {
  input.addEventListener('input', function (event) {
    var inputValue = event.target.value;
    var numericValue = inputValue.replace(/\D/g, '');

    if (numericValue !== inputValue) {
      event.target.value = numericValue;
    }
  });
});

const inputElements = document.querySelectorAll('.cap');

// Attach the event listener to each input element
inputElements.forEach(inputElement => {
  inputElement.addEventListener('input', function () {
    // Get the current input value
    let inputValue = this.value;

    // Capitalize each letter
    let capitalizedValue = inputValue.toUpperCase();

    // Update the input value with the capitalized text
    this.value = capitalizedValue;
  });
});


function shippersearchOptions() {

  // Clear the options menu
  const optionsMenu = document.getElementById("shipper-options");
  optionsMenu.innerHTML = "";

  // Get the search input value
  const searchInput = document.getElementById("shipper").value.toLowerCase();

  // Filter the options array based on the search input
  const matchedOptions = cusNameArr.filter((option) =>
    option.toLowerCase().includes(searchInput)
  );

  // Create and display the matched options in the menu
  matchedOptions.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option;
    li.addEventListener("click", () => shipperselectOption(option));
    optionsMenu.appendChild(li);
  });
}


function shipperselectOption(option) {
  // Set the selected option as the input value
  document.getElementById("shipper").value = option;
  document.getElementById("ship-add-l-1").value = cusArr[option][0];
  document.getElementById("ship-add-l-2").value = cusArr[option][1];
  document.getElementById("ship-add-l-3").value = cusArr[option][2];
  document.getElementById("ship-email").value = cusArr[option][3];
  document.getElementById("ship-mobile").value = cusArr[option][4];

  // Clear the options menu
  const optionsMenu = document.getElementById("shipper-options");
  optionsMenu.innerHTML = "";
}


function consigneesearchOptions() {

  // Clear the options menu
  const optionsMenu = document.getElementById("consignee-options");
  optionsMenu.innerHTML = "";

  // Get the search input value
  const searchInput = document.getElementById("consignee").value.toLowerCase();

  // Filter the options array based on the search input
  const matchedOptions = cusNameArr.filter((option) =>
    option.toLowerCase().includes(searchInput)
  );

  // Create and display the matched options in the menu
  matchedOptions.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option;
    li.addEventListener("click", () => consigneeselectOption(option));
    optionsMenu.appendChild(li);
  });
}


function consigneeselectOption(option) {
  // Set the selected option as the input value
  document.getElementById("consignee").value = option;
  document.getElementById("con-add-l-1").value = cusArr[option][0];
  document.getElementById("con-add-l-2").value = cusArr[option][1];
  document.getElementById("con-add-l-3").value = cusArr[option][2];
  document.getElementById("con-email").value = cusArr[option][3];
  document.getElementById("con-mobile").value = cusArr[option][4];

  // Clear the options menu
  const optionsMenu = document.getElementById("consignee-options");
  optionsMenu.innerHTML = "";
}



function notifysearchOptions() {

  // Clear the options menu
  const optionsMenu = document.getElementById("notify-options");
  optionsMenu.innerHTML = "";

  // Get the search input value
  const searchInput = document.getElementById("notify").value.toLowerCase();

  // Filter the options array based on the search input
  const matchedOptions = cusNameArr.filter((option) =>
    option.toLowerCase().includes(searchInput)
  );

  // Create and display the matched options in the menu
  matchedOptions.forEach((option) => {
    const li = document.createElement("li");
    li.textContent = option;
    li.addEventListener("click", () => notifyselectOption(option));
    optionsMenu.appendChild(li);
  });
}


function notifyselectOption(option) {
  // Set the selected option as the input value
  document.getElementById("notify").value = option;
  document.getElementById("notify-add-l-1").value = cusArr[option][0];
  document.getElementById("notify-add-l-2").value = cusArr[option][1];
  document.getElementById("notify-add-l-3").value = cusArr[option][2];
  document.getElementById("notify-email").value = cusArr[option][3];
  document.getElementById("notify-mobile").value = cusArr[option][4];

  // Clear the options menu
  const optionsMenu = document.getElementById("notify-options");
  optionsMenu.innerHTML = "";
}