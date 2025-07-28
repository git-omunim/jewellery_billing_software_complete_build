//
// File Name - ajaxCallStock.js

//
function showInvoiceDetailsAutoSell(requestData) {
    // Access the data
    console.log('Received request data:', requestData);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogijspindv.php?sttrId=" + sttrId + "&panelName=" + panelName + "&custId=" + custId, true);
    xmlhttp.send();

}