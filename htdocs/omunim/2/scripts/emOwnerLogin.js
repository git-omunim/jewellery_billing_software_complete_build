function validateLogin_UserId(field, alerttxt) {
    if (field == null || field == "" || field == 'Enter User Name') {
        //alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLogin_Password(field, alerttxt) {
    if (field == null || field == "" || field == 'Enter Password') {
        //alert(alerttxt);
        return false;
    } else {
        return true;
    }
}

function validateLogin(obj) {

    if (validateLogin_UserId(document.getElementById("lgnUserId").value, "Please enter User Id!") == false ||
            document.getElementById("lgnUserId").value == 'Enter Login Id') {
        alert('Please enter User Id!');
        document.getElementById("lgnUserId").focus();
        return false;
    }
    else if (validateLogin_Password(document.getElementById("lgnPassword").value, "Please enter Password!") == false ||
            document.getElementById("lgnUserId").value == 'Enter Password') {
        alert('Please enter Password!');
        document.getElementById("lgnPassword").focus();
        return false;
    }

    return true;
}

function user_logout(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUserLogout;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertUserLogout() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("logoutMessageDiv").innerHTML = '';
        //alert(xmlhttp.responseText);
        window.location.href = xmlhttp.responseText;
        //confirm_box = confirm("Do you want to shutdown Online Munim? \n"+closeOnlineMunimAlertMess);//change in line @AUTHOR: SANDY28JAN14
//        if (confirm_box == true)
//        {
//            window.open('', '_self');
//            window.close();
//        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function logout_ajax(obj) {
    var poststr = "";
    user_logout('include/php/owner/omollout.php', poststr);

}

function login_ajax(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    if (validateLogin(obj)) {
        return true;
    }
    else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}


//************************ Administrator Login ************************
function administrator_login(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertAdministratorLogin;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertAdministratorLogin() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";

    }

}
function administratorLogin(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateLogin(obj)) {
        var poststr = "ownerId=" + encodeURI(document.getElementById("lgnUserId").value)
                + "&ownerSKey=" + encodeURI(document.getElementById("lgnPassword").value);

        administrator_login('include/php/owner/omoogack.php', poststr);
    }
    else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
//************************ Function Under Development ************************
function featureUnderDevelopment() {
    alert("This Feature is in Under Development!");
}
//************************ Function Owner Product Activation Online ************************
function validateOwnProdActInputs(productKey) {

    if (validateEmptyField(productKey, "Please enter Product Key!") == false ||
            validateLengthExact8(productKey, "Product Key should be 8 characters length!") == false ||
            validateAlphaNum(productKey, "Accept only alpha or numeric characters without space character!") == false) {
        document.getElementById("productKey").focus();
        return false;
    }
    return true;
}
function owner_prod_act_online(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertOwnerProdActOnline;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertOwnerProdActOnline() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";

    }

}
function ownerProdActOnline(productKey) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateOwnProdActInputs(productKey)) {
        var poststr = "productKey=" + encodeURIComponent(document.getElementById("productKey").value);

        owner_prod_act_online('include/php/onoaodon.php', poststr);
    }
    else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
//************************ Function Owner Product Activation Offline ************************
function validateOwnProdActOfflineInputs(productKey) {

    if (validateEmptyField(productKey, "Please enter Product Key!") == false ||
            validateLengthExact8(productKey, "Product Key should be 8 characters length!") == false ||
            validateAlphaNum(productKey, "Accept only alpha or numeric characters without space character!") == false) {
        document.getElementById("productKey").focus();
        return false;
    }
    return true;
}
function owner_prod_act_offline(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertOwnerProdActOffline;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertOwnerProdActOffline() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";

    }

}
function ownerProdActOffline(productKey) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateOwnProdActOfflineInputs(productKey)) {
        var poststr = "productKey=" + encodeURIComponent(document.getElementById("productKey").value);

        owner_prod_act_offline('include/php/owner/omoaodof.php', poststr);
    }
    else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}