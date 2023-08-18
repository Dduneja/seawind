function change(desp, hsn, sgst, cgst, igst){
    const changeWindow = document.querySelector("#changeWindow");
    const gstChange = document.querySelector("#gst-change");
    const changehsn = document.querySelector("#change-hsn");
    const changedesp = document.querySelector("#desp-change")
    const changesgst = document.querySelector("#change-sgst")
    const changecgst = document.querySelector("#change-cgst")
    const changeigst = document.querySelector("#change-igst")
    
    
    gstChange.value = desp;
    changehsn.value = hsn;
    changedesp.value = desp;
    changesgst.value = sgst;
    changecgst.value = cgst;
    changeigst.value = igst;

    changeWindow.style.display = "block";
    
}

function hideWindow() {
    document.querySelector("#changeWindow").style.display = "none";
}

