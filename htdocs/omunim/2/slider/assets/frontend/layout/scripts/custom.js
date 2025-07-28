/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//function hideDiv(){ alert('hi there');
//   
//   document.getElementById('headBannerDiv').style.display = "none";
//}

var product;
function showDownloadFormDemo(productname, versionType)
{

    product = productname;
//    if (versionType == 'SOFTWARE') {
//        showProductKeyForm(productname);
//    } else {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("showNewWindows").innerHTML = xmlhttp.responseText;
        } else {

        }
    };
    xmlhttp.open("POST", "php/downloadformdemo.php?versionType=" + versionType, true);
    xmlhttp.send();
//    }
}

var product;
function showDownloadForm(productname, versionType)
{

    product = productname;
//    if (versionType == 'SOFTWARE') {
//        showProductKeyForm(productname);
//    } else {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("showNewWindows").innerHTML = xmlhttp.responseText;
        } else {

        }
    };
    xmlhttp.open("POST", "php/downloadform.php?versionType=" + versionType, true);
    xmlhttp.send();
//    }
}
/******END TO CHANGE FUNCTION ********/
/* Start to validate input fields of form */
function validateDownloadForm()
{
    if (validate_Name(document.getElementById('nameField').value, "Please enter correct name!") == false) {
        document.getElementById('nameField').focus();
        return false;
    }
    else if (validate_City(document.getElementById('cityField').value, "Please enter city name!") == false) {
        document.getElementById('cityField').focus();
        return false;
    }
    else if (validate_PhoneNo(document.getElementById('phoneNoField').value, "Please enter mobile number! \nYou will receive code on same number!") == false) {
        document.getElementById('phoneNoField').focus();
        return false;
    }
    else if (validate_Email(document.getElementById('emailField').value, "Please enter correct e-mail address!") == false) {
        document.getElementById('emailField').focus();
        return false;
    }
    return true;
}
/* End to validate input fields of form */

/* Start to validate input fields of form @AUTHOR: SANDY29AUG13*/
function validate_Name(field, alerttxt) {
    if (field == null || field == "" || field == ' NAME') {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validate_City(field, alerttxt) {
    if (field == null || field == "" || field == ' CITY') {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validate_Email(field, alerttxt) {
    if (field == null || field == "" || field == ' E-MAIL ID') {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validate_PhoneNo(field, alerttxt) {
    if (field == null || field == "" || field == ' MOBILE NO. e.g.: 8550958585') {
        alert(alerttxt);
        return false;
    } else { //condition to check 10 digit number or not
        if (field.length < 10)
        {
            alert("Please enter correct mobile number!");
            return false;
        } else {
            return true;
        }
    }
}
/* End to validate input fields of form @AUTHOR: SANDY29AUG13*/
function loadXMLDoc() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp = new XMLHttpRequest();
        if (xmlhttp.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
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

function closeForm()
{
    document.getElementById("showNewWindows").innerHTML = '';
}

/** Start code to open code Verification form **/
var code;
function getVerificationForm(versionType) {
    document.getElementById("submitDownloadButt").style.visibility = "hidden";
    if (validateDownloadForm()) {
        code = Math.floor(Math.pow(10, 8) + Math.random() * 8 * Math.pow(10, 8)); //create 8 digit random number
        //alert(code);
        var name = document.getElementById('nameField').value;
        var city = document.getElementById('cityField').value;
        var phno = document.getElementById('phoneNoField').value;
        var email = document.getElementById('emailField').value;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showNewWindows").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("submitDownloadButtDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("GET", "php/omAddDownloadLog.php?versionType=" + versionType + "&name=" + name + "&city=" + city + "&phno=" + phno + "&email=" + email + "&code=" + code + "&product=" + product,
                true);
        xmlhttp.send();
    }
    document.getElementById("submitDownloadButt").style.visibility = "visible";
}
/** End code to open code Verification form */

/** Start code to open code Verification form **/
var code;
function getVerificationDemoForm(versionType) {
    document.getElementById("submitDownloadButt").style.visibility = "hidden";
    if (validateDownloadForm()) {
        code = Math.floor(Math.pow(10, 8) + Math.random() * 8 * Math.pow(10, 8)); //create 8 digit random number
        //alert(code);
        var name = document.getElementById('nameField').value;
        var city = document.getElementById('cityField').value;
        var phno = document.getElementById('phoneNoField').value;
        var email = document.getElementById('emailField').value;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showNewWindows").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("submitDownloadButtDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("GET", "php/omAddDownloadLogDemo.php?versionType=" + versionType + "&name=" + name + "&city=" + city + "&phno=" + phno + "&email=" + email + "&code=" + code + "&product=" + product,
                true);
        xmlhttp.send();
    }
    document.getElementById("submitDownloadButt").style.visibility = "visible";
}
/** End code to open code Verification form */




/** Start code to open code downloads if verification code is correct @AUTHOR: SANDY29AUG13 **/
function verifyCode(id)
{
    document.getElementById("submitVerifyCode").style.visibility = "hidden";
    loadXMLDoc();
    var userCode = document.getElementById('codeField').value;

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("showNewWindows").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("codeVrfyFrmSubButtDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    if (userCode == code) { // condition to check code matches or not depending on that start download
        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
        window.setTimeout(closeMessageView, 10000);
        if (product == 'OMFULL1.6') {
            window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 Complete Software.rar';
        }
        else if (product == 'OMEXIT1.6') {
            window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 For Existing Customers.rar';
        }
        else if (product == 'OMDEMO1.6') {
            window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 Complete Software.rar';
        }
        xmlhttp.open("GET", "php/omUpdateDownloadStatus.php?id=" + id, true);
        xmlhttp.send();
    }
    else
    {
        alert("Verification code is invalid! \nPlease enter correct code !");
        document.getElementById("codeField").value = '';
        document.getElementById('codeField').focus();
        document.getElementById("submitVerifyCode").style.visibility = "visible";
    }
}
/**End code to open code downloads if verification code is correct**/

function checkForValidity(prodKey, userId) {
    if (validateProdKeyField()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == 'Start Download') {
                    if (product == 'OMEXIT2.6.58') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM_2.6.58_Complete_Software.rar';
                    } else if (product == 'OMSOURCE2.6.58') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim_2.6.58_only_source.rar';
                    } else if (product == 'OMEXIT2.5.3') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.5.3 Complete Software.rar';
                    } else if (product == 'OMSOURCE2.5.3') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.5.3 only Source.rar';
                    } else if (product == 'OMEXIT2.4.24') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.24 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.24') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.24 only Source.rar';
                    } else if (product == 'OMEXIT2.4.20') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.20 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.20') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.20 only Source.rar';
                    } else if (product == 'OMDGFREE2.4.20') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.20 Complete Software.rar';
                    } else if (product == 'OMEXIT2.4.15') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.15 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.15') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.15 only Source.rar';
                    } else if (product == 'OMDGFREE2.4.15') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.15 Complete Software.rar';
                    } else if (product == 'OMEXIT2.4.13') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.13 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.13') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.13 only Source.rar';
                    } else if (product == 'OMEXIT2.4.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.11 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.11 only Source.rar';
                    } else if (product == 'OMEXIT2.4.10') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.10 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.10') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.10 only Source.rar';
                    } else if (product == 'OMEXIT2.4.9') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.9 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.9') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.9 only Source.rar';
                    } else if (product == 'OMEXIT2.4.8') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.8 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.8') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.8 only Source.rar';
                    } else if (product == 'OMEXIT2.4.7') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.7 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.7') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.7 only Source.rar';
                    } else if (product == 'OMEXIT2.4.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.6 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.6 only Source.rar';
                    } else if (product == 'OMEXIT2.4.4') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.4 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.4') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.4 only Source.rar';
                    } else if (product == 'OMEXIT2.4.1') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.1 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.4.1') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.1 only Source.rar';
                    } else if (product == 'OMEXIT2.3.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.11 For Existing Software.rar';
                    } else if (product == 'OMSOURCE2.3.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.3.11 only Source.rar';
                    } else if (product == 'OMEXIT2.3.10') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.10 For Existing Software.rar';
                    }
                    else if (product == 'OMSOURCE2.3.10') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.3.10 only Source.rar';
                    }
                    else if (product == 'OMEXIT2.3.7') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.7 For Existing Software.rar';
                    }
                    else if (product == 'OMSOURCE2.3.7') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.3.7 only Source.rar';
                    }
                    else if (product == 'OMEXIT2.3.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.6 For Existing Software.rar';
                    }
                    else if (product == 'OMSOURCE2.3.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.3.6 only Source.rar';
                    }
                    else if (product == 'OMEXIT2.3.5') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.5 For Existing Software.rar';
                    }
                    else if (product == 'OMEXIT2.3.4') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.4 For Existing Software.rar';
                    }
                    else if (product == 'OMEXIT2.3.2') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.2 For Existing Software.rar';
                    }
                    else if (product == 'OMEXIT2.3.1') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.1 For Existing Software.rar';
                    }
                    else if (product == 'OMEXIT1.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 For Existing Customers.rar';
                    }

                    else if (product == 'OMEXIT2.4.25') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.25 For Existing Software.rar';
                    }
                    else if (product == 'OMSOURCE2.4.25') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.25 only Source.rar';
                    }
                    else if (product == 'OMEXIT2.4.20') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.20 For Existing Software.rar';
                    }
                    else if (product == 'OMSOURCE2.4.20') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.20 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.15') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.15 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.15') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.15 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.13') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.13 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.13') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.13 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.11 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.11 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.9') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.9 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.9') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.9 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.8') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.8 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.8') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.8 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.6 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.6 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.4.2') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.4.2 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.4.2') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.4.2 only Source.rar';
                    }

                    else if (product == 'OMEXIT2.3.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 2.3.11 For Existing Software.rar';
                    }

                    else if (product == 'OMSOURCE2.3.11') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/omunim 2.3.11 only Source.rar';
                    }
                    else {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 For Existing Customers.rar';
                    }


                } else if (xmlhttp.responseText == 'Registered') {
                    if (product == 'OMEXIT1.6') {
                        document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;THANK YOU FOR DOWNLOADING OMUNIM!&nbsp;&nbsp;";
                        window.location = 'http://www.omunim.com/downloads/OMUNIM 1.6 For Existing Customers.rar';
                    } else {
                        showErrorAndUpdate();
                    }
                } else if (xmlhttp.responseText == 'SoftwareExpired') {
                    document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;Your Software has been expired, please renew your software pack!&nbsp;&nbsp;";
                } else {
                    document.getElementById("showNewWindows").innerHTML = "&nbsp;&nbsp;YOU ARE NOT REGISTERED USER!&nbsp;&nbsp;";
                }
            } else {
                document.getElementById("submitProdKeyButtDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("POST", "php/omCheckValidity.php?prodKey=" + prodKey + "&userId=" + userId, true);
        xmlhttp.send();
    }
}

function validateProdKeyField() {
    if (document.getElementById('prodKey').value == '' || document.getElementById('prodKey').value == null) {
        alert("Please enter product key!");
        document.getElementById('prodKey').focus();
        return false;
    } else if (document.getElementById('userId').value == '' || document.getElementById('userId').value == null) {
        alert("Please enter user Id!");
        document.getElementById('userId').focus();
        return false;
    }
    return true;
}