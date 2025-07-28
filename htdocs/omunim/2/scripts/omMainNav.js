//var xmlhttp = new Array();
//var xmlhttpCounter = 0;
function loadXMLDoc() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp = new XMLHttpRequest();
        if (xmlhttp.overrideMimeType) {
            // set type accordingly to anticipated content type
            xmlhttp.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttp) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function loadXMLDoc2() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp2 = new XMLHttpRequest();
        if (xmlhttp2.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp2.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
            }
        }
    }
    if (!xmlhttp2) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function loadXMLDoc3() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp3 = new XMLHttpRequest();
        if (xmlhttp3.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp3.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp3 = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
            }
        }
    }
    if (!xmlhttp3) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}

function loadXMLDoc4() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp4 = new XMLHttpRequest();
        if (xmlhttp4.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp4.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp4 = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
            }
        }
    }
    if (!xmlhttp4) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function loadXMLMetalRates() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttpMetalRates = new XMLHttpRequest();
        if (xmlhttpMetalRates.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttpMetalRates.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttpMetalRates = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttpMetalRates = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
            }
        }
    }
    if (!xmlhttpMetalRates) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}

// Start Code for Place Holder Attribute
var _debug = false;
var _placeholderSupport = function() {
    var t = document.createElement("input");
    t.type = "text";
    return (typeof t.placeholder !== "undefined");
}();

function checkPlaceHolder() {
    var arrInputs = document.getElementsByTagName("input");

    for (var i = 0; i < arrInputs.length; i++) {
        var curInput = arrInputs[i];

        if (!curInput.type || curInput.type == "" || curInput.type == "text")
            HandlePlaceholder(curInput);
    }
}

function HandlePlaceholder(oTextbox) {
    if (!_placeholderSupport) {
        var curPlaceholder = oTextbox.getAttribute("placeholder");
        if (curPlaceholder && curPlaceholder.length > 0) {
            Debug("Placeholder found for input box '" + oTextbox.name + "': " + curPlaceholder);
            oTextbox.value = curPlaceholder;
            oTextbox.setAttribute("old_color", oTextbox.style.color);
            oTextbox.style.color = "#c0c0c0";
            oTextbox.onfocus = function() {
                Debug("input box '" + this.name + "' focus");
                this.style.color = this.getAttribute("old_color");
                if (this.value === curPlaceholder)
                    this.value = "";
            };
            oTextbox.onblur = function() {
                Debug("input box '" + this.name + "' blur");
                if (this.value === "") {
                    this.style.color = "#c0c0c0";
                    this.value = curPlaceholder;
                }
            };
        }
        else {
            Debug("input box '" + oTextbox.name + "' does not have placeholder attribute");
        }
    }
    else {
        Debug("browser has native support for placeholder");
    }
}

function Debug(msg) {
    if (typeof _debug !== "undefined" && _debug) {
        var oConsole = document.getElementById("Console");
        if (!oConsole) {
            oConsole = document.createElement("div");
            oConsole.id = "Console";
            document.body.appendChild(oConsole);
        }
        oConsole.innerHTML += msg + "<br />";
    }
}
// Start Code to send sms data
function sendautosms()
{
    const nameEQ = "sendautosms=";
    const cookies = document.cookie.split(';');
    var sendautosmsval='N';
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(nameEQ) === 0) {
            sendautosmsval = cookie.substring(nameEQ.length, cookie.length);
        }
    }
    if(sendautosmsval != 'Y')
    {
     loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            const date = new Date();
           date.setTime(date.getTime() + (24 * 60 * 60 * 1000)); // Convert hours to milliseconds
          const expires = "expires=" + date.toUTCString();
           document.cookie = 'sendautosms' + "=" + 'Y' + ";" + expires + ";path=/";
//            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else{
            //alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("POST",
            "include/php/omautosmssend" + default_theme + ".php?storeData="+sendautosmsval, true);
    xmlhttp.send();  
    }
}
// End Code to send sms data
// End Code for Place Holder Attribute
function fullScreen() {
    //alert(window.fullScreen.value);  
    //window.document.fullScreen = true;

//    if ((document.fullScreenElement && document.fullScreenElement !== null) ||    // alternative standard method
//        (!document.mozFullScreen && !document.webkitIsFullScreen)) {               // current working methods
//        
//        if (document.documentElement.requestFullScreen) {
//            document.documentElement.requestFullScreen();
//        } else if (document.documentElement.mozRequestFullScreen) {
//            document.documentElement.mozRequestFullScreen();
//        } else if (document.documentElement.webkitRequestFullScreen) {
//            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
//        }
//    } else {
//        if (document.cancelFullScreen) {
//            document.cancelFullScreen();
//        } else if (document.mozCancelFullScreen) {
//            document.mozCancelFullScreen();
//        } else if (document.webkitCancelFullScreen) {
//            document.webkitCancelFullScreen();
//        }
//    }
}
function isDocumentInFullScreenMode() {
    // Note that the browser fullscreen (triggered by short keys) might
    // be considered different from content fullscreen when expecting a boolean
    alert((document.fullScreenElement && document.fullScreenElement !== null) || // alternative standard methods
            (!document.mozFullScreen && !document.webkitIsFullScreen));                   // current working methods
}
//////------START REMINDER MODAL FUNCTION @AUTHOR VISHAL 22JAN2021------//////
function reminderModal() {
    document.getElementById("reminder-modal").style.display = "block";
    //document.getElementByClassName("modal-backdrop").remove();
    getDefUnvisitCustDiv();
}
function reminderModalClose() {
    document.getElementById("reminder-modal").style.display = "none";
}
window.onclick = function(event) {
  if (event.target === document.getElementById("reminder-modal")) {
    document.getElementById("reminder-modal").style.display = "none";
  }
}
//////------END REMINDER MODAL FUNCTION @AUTHOR VISHAL 22JAN2021------//////
