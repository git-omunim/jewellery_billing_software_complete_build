/*************Start Code To Change Div @AUTHOR:PRIYA21MAY13******************/
function searchItemByItemId(searchItemId, autoEntryValue, custId, firm_Id) {
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = tempLen;
    //var alphaExp = /^[a-zA-Z]+$/;
    var alphaExp = /#/; //CODE ADDED TO SEARCH PRODUCT BY # PREID,@AUTHOR:HEMA-13JUL2020
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(tempLen - 1);
        searchItemIdTemp = searchItemIdTemp.substr(0, tempLen - 1);
        if (isNaN(field) == false) {
            charLen = charLen - 1;
        } else if (field.match(alphaExp)) {
            charLen = charLen;
            break;
        } else {
            break;
        }
//        if (field.match(alphaExp)) {
//            charLen = charLen + 1;//IF MATCH FIELD IS # THEN INCREMENT LENGTH BY 1,@AUTHOR:HEMA-17JULY2020
//            break;
//        }else{
//          charLen = charLen + 1;//IF MATCH FIELD IS NOT # THEN INCREMENT LENGTH BY 1,@AUTHOR:HEMA-17JULY2020
//        }
        tempLen = tempLen - 1;
    }
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen, searchItemId.length);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
//    alert('searchItemIdCharPart == ' + searchItemIdCharPart);
//    alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    if (document.getElementById("srchDelItemId")) {
        // ADDED CONDITION FOR RETURN ITEM CODE @RATNAKAR 09FEB2018
        if (document.getElementById('srchDelItemId').value != '') {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF WINDOW ITEM RETURN @RATNAKAR 09FEB2018
            document.getElementById('srchdelItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchdelItemPostId').value = searchItemIdNumPart;
        } else {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE @RATNAKAR 09FEB2018
            document.getElementById('srchItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchItemPostId').value = searchItemIdNumPart;
        }
    } else {

        // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE @RATNAKAR 09FEB2018
        document.getElementById('srchItemPreId').value = searchItemIdCharPart;
        document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    }

    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        if (document.getElementById("srchDelItemId")) {

            xmlhttp.open("GET", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);

        } else {
            xmlhttp.open("GET", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        }
        xmlhttp.send();

    } else {
        return false;
    }
}
/*************Start Code To Change Div Name @Author:PRIYA28SEP13******************/
function showSuppHomeNwOrItemDetailsDiv(documentRootPath, nwOrItemId, newItemPreId, newItemId, suppId, newOrSuppStatus, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppHomeNwOrItemDetailsDiv" + nwOrItemId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("suppHomeNwOrItemDetailsDiv" + nwOrItemId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogwhiadv" + default_theme + ".php?nwOrItemId=" + nwOrItemId + "&suppId=" + suppId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*************Start Code To Change Div Name @Author:PRIYA28SEP13******************/
/************End Code To Change Div @AUTHOR:PRIYA21MAY13************/
function selectstockdiv(divPanel, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",
            "include/php/omppsbdv" + default_theme + ".php?divPanel=ECommAdminPanel&stockType=" + stockType, true);
    xmlhttp.send();
}
function changeEcomDiv(ecommDiv, urlFile) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(ecommDiv).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",
            urlFile + default_theme + ".php", true);
    xmlhttp.send();
}
function removeHashTag(hashTagId) {
    var element = document.getElementById(hashTagId);
    if (element) {
        element.remove();
    }
}
function updatecollecHashTag() {
    var elements = document.querySelectorAll('.addhashTag');
    var tagCount = elements.length;
    var hashTagStr = '';
    for (hashcnt = 0; hashcnt < tagCount; hashcnt++)
    {
        if (document.getElementById('hashTag' + hashcnt))
        {
            var hashTag = document.getElementById('hashTag' + hashcnt).innerText;
            hashTagStr = hashTagStr + hashTag + '#';
        }
    }
    document.getElementById('sttr_occasion_hashtags').value = hashTagStr;
    var elementss = document.querySelectorAll('.ecomcollection');
    var tagCountCollect = elementss.length;
    var collecTagStr = '';
    for (collecnt = 0; collecnt < tagCountCollect; collecnt++)
    {
        if (document.getElementById('colleTag' + collecnt))
        {
            var collecTag = document.getElementById('colleTag' + collecnt).innerText;
            collecTagStr = collecTagStr + collecTag + '#';
        }
    }
    document.getElementById('sttr_product_hashtags').value = collecTagStr;
}
function addEcomHashtag(inputValue) {
    let elements = document.querySelectorAll('.addhashTag');

    // Count the number of elements found
    let tagCount = elements.length;

    // Split the value by commas
    const valuesArray = inputValue.split(',');
    var htmlTags = "";
    // Loop through the array and print each value
    valuesArray.forEach((value, index) => {
        if (value != null && value != '')
        {
            htmlTags += `<p id='hashTag${tagCount}' class='ecomgobtn1 addhashTag'>${value.trim()} <i class='fa fa-close' onclick="removeHashTag('hashTag${tagCount}');updatecollecHashTag();"></i></p>`;
            tagCount++;
        }
    });
    document.getElementById('addEcomHashtag').innerHTML += htmlTags;
    document.getElementById('addhashTag').value = '';
}
function addEcomCollectionTag(inputValue) {
    let elements = document.querySelectorAll('.ecomcollection');

    // Count the number of elements found
    let tagCount = elements.length;

    // Split the value by commas
    const valuesArray = inputValue.split(',');
    var htmlTags = "";
    // Loop through the array and print each value
    valuesArray.forEach((value, index) => {
        if (value != null && value != '')
        {
            htmlTags += `<p id='colleTag${tagCount}' class='ecomgobtn1 ecomcollection'>${value.trim()} <i class='fa fa-close' onclick="removeCollectionTag('colleTag${tagCount}');updatecollecHashTag();"></i></p>`;
            tagCount++;
        }
    });
    document.getElementById('addEcomColletag').innerHTML += htmlTags;
    document.getElementById('addCollTag').value = '';
}
function removeCollectionTag(hashTagId) {
    var element = document.getElementById(hashTagId);
    if (element) {
        element.remove();
    }
}
function showstockdetails(divPanelName, metalType, category, productName, productCode) {
    let preId = '';
    let postId = '';
    if (productCode != 'No')
    {
        for (let i = 0; i < productCode.length; i++) {
            if (isNaN(productCode[i]) || productCode[i] === ' ') {
                preId += productCode[i];
            } else {
                postId += productCode[i];
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(divPanelName).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST",
                "omecomiteminfo" + default_theme + ".php?panel=showProductDet&metalType=" + metalType + "&category=" + category + "&productName=" + productName + "&prodPostId=" + postId + "&prodPreId=" + preId, true);
        xmlhttp.send();
    } else {
        if (document.getElementById('previousId').value == 'No')
        {
            document.getElementById("previousId").disabled = true;
        }
        if (document.getElementById('nextId').value == 'No')
        {
            document.getElementById("nextId").disabled = true;
        }
        alert('Product Not Available');
    }
}
//
function updatecollecHashTag() {
    var elements = document.querySelectorAll('.addhashTag');
    var tagCount = elements.length;
    var hashTagStr = '';
    for (hashcnt = 0; hashcnt <= tagCount; hashcnt++)
    {
        if (document.getElementById('hashTag' + hashcnt))
        {
            var hashTag = document.getElementById('hashTag' + hashcnt).innerText;
            hashTagStr = hashTagStr + '#' + hashTag;
        }
    }
    document.getElementById('product_occasion_hashtags').value = hashTagStr;
    //
    var elementss = document.querySelectorAll('.ecomcollection');
    var tagCountCollect = elementss.length;
    var collecTagStr = '';
    for (collecnt = 0; collecnt <= tagCountCollect; collecnt++)
    {
        if (document.getElementById('colleTag' + collecnt))
        {
            var collecTag = document.getElementById('colleTag' + collecnt).innerText;
            collecTagStr = collecTagStr + '#' + collecTag;
        }
    }
    document.getElementById('product_hash_tags').value = collecTagStr;
}

//
function selectOption(inputId, inputValue, dropdownId)
{
    document.getElementById(inputId).value = inputValue;
    document.getElementById(dropdownId).innerHTML = '';
}
function closeEcomDropDown(dropdownId)
{
    document.getElementById(dropdownId).innerHTML = '';
}
function showDropDown(inputId, responseDiv, metalType, category, productName, productId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(responseDiv).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",
            "omecomoptions" + default_theme + ".php?inputId=" + inputId + "&responseDiv=" + responseDiv + "&metalType=" + metalType + "&category=" + category + "&productName=" + productName + "&productId=" + productId, true);
    xmlhttp.send();
}
/*******START CODE TO Change Update File name @AUTHOR:PRIYA23MAR13***********/
/*******Start code to add div @Author:PRIYA09JUL14********************/
function showUpdateNewActionItemDiv(actionItemID) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("addActionItemDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("acitTitleDiv").innerHTML = "UPDATE TASK DETAILS";
            document.getElementById("taskDescrpn").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaimndv" + default_theme + ".php?actionItemID=" + actionItemID + "&panelName=" + 'UpdateAcit', true);
    xmlhttp.send();
}
//************Start code to add function for reminder panel:Author:SANT07FEB17 
function showUpdateReminderItemDiv(actionItemID) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddNewActionItem").style.visibility = "visible";
            document.getElementById("addActionItemDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("acitTitleDiv").innerHTML = "UPDATE TASK DETAILS";
            document.getElementById("taskDescrpn").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommpntfcn" + default_theme + ".php?actionItemID=" + actionItemID + "&panelName=" + 'UpdateAcit', true);
    xmlhttp.send();
}
//************End code to add function for reminder panel:Author:SANT07FEB17 
/*******End code to add div @Author:PRIYA09JUL14********************/
/*******END CODE TO Change Update File name @AUTHOR:PRIYA23MAR13***********/
function chngItemImgLoadOpt(chngItemImgLoadOpt, panelName, itemDivCount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemImageLoadOption" + itemDivCount).value = chngItemImgLoadOpt; //alt to value changed @Author:PRIYA11NOV14
            if (chngItemImgLoadOpt == 'COM') {
                document.getElementById("file_input_div").innerHTML = xmlhttp.responseText;
            } else if (chngItemImgLoadOpt == 'WEB') {
                document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngItemImgLoadOpt == 'COM') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngItemImgLoadOpt == 'WEB') {
            }
        }
    };
    if (chngItemImgLoadOpt == 'COM') {
        xmlhttp.open("POST", "include/php/omcgicim" + default_theme + ".php?itemDivCount=" + itemDivCount, true);
    } else if (chngItemImgLoadOpt == 'WEB') {
        xmlhttp.open("POST", "include/php/omcgadif" + default_theme + ".php?panelName=" + panelName + "&itemDivCount=" + itemDivCount, true);
    }
    xmlhttp.send();
}
/************************************************************************/
/*** Start code to sort girvi panel modified by @AUTHOR: LINA4JUN2013 ***/
/************************************************************************/
function sortGirviPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, gTransList) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgpglpd" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&gTransList=" + gTransList, true);
    xmlhttp.send();
}

/**********************************************************************/
/*** End code to sort girvi panel modified by @AUTHOR: LINA4JUN2013 ***/
/**********************************************************************/
/*************Start code to add panel @Author:PRIYA03NOV14**************************/
function sortGirviExpiredPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, expMonths, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'TPExpiredLoanList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgptpexgl" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpexgl" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    }
    xmlhttp.send();
}
/*************End code to add panel @Author:PRIYA03NOV14**************************/
function sortGirviReleasePanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgpregl" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
function sortGirviLossPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgplglp" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
/*************Start code to Add conditions for FIANNACE list @Author: GAUR20JUNE16****************/
function sortLoansListPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'financeList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnllpn" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panelName, true);
    } else if (panelName == 'collectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfncml" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panelName, true);
    } else if (panelName == 'nonCollectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnncml" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpllpn" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    }
    xmlhttp.send();
}
/*************Start code to Add conditions for FIANNACE list @Author: GAUR20JUNE16****************/
/*********************Start Code To Add Udhaar Panel @Author:PRIYA18AUG13********************/
/***************Start to change function @AUTHOR: SANDY03FEB14****************/
/***************Start code to change filename @Author:PRIYA16FEB15**************/
/***************Start code to add panel for stockAdd @Author:PRIYA16FEB15***********/
/***************Start to change function @AUTHOR: SANDY03FEB14****************/
/***************Start code to add jrnlTransType for Imitation @Author:ANUJA20MAR15**********/
/***************End code to add jrnlTransType for CrystalAdd @Author:SHE23MAR15*********/
/***************Start code to add jrnlTransType for Auction @Author:ANUJA31MAR15**********/
/***************Start code to add condition for transLoan @Author:PRIYA13APR15************/
/***************Start update code @Author:GAUR24OCT16************/
function showJournalEntryListDiv(documentRootPath, jrnlId, jrnlDrDesc, jrnlUserId, jrnlUserType, jrnlTransId, jrnlTransType, accMainId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //alert('jrnlUserType == ' + jrnlUserType);
    //alert('jrnlTransType == ' + jrnlTransType);
    // CHANGE CODE TO ADD CONDITION FOR SELL PANEL, PAYMENT/RECEIPT PANEL @PRIYANKA-17MAY18
    if (jrnlUserType == 'cust' && jrnlTransType == 'Girvi') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&jrnlDrDesc=" + jrnlDrDesc + "&girviId=" + jrnlTransId + "&accMainId=" + accMainId + "&panelDivName=girviInfo", true);
    } else if (jrnlUserType == 'MoneyLender' && jrnlTransType == 'LOAN') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ommlmndv" + default_theme + ".php?mlId=" + jrnlUserId + "&jrnlDrDesc=" + jrnlDrDesc + "&mlLoanId=" + jrnlTransId + "&panelOption=LoanDetailPanel", true);
    } else if (jrnlUserType == 'Trans') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omtutrnd" + default_theme + ".php?transId=" + jrnlTransId, true);
    } else if (jrnlUserType == 'cust' && jrnlTransType == 'Udhaar') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&custPanelOption=CustUdhaar", true);
    } else if (jrnlTransType == 'stockAdd') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + jrnlTransId + "&panelName=StockPayUp", true); // id changed from isin_id to stprId @Author:SHRI02MAR17
    } else if (jrnlTransType == 'AddRawMetal') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamsdv" + default_theme + ".php?rmin_id=" + jrnlTransId + "&rawPanelName=RawDetUpPanel", true);
    } else if (jrnlTransType == 'RepairItemAdd') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrpaddt" + default_theme + ".php?isin_id=" + jrnlTransId + "&panelName=RepairItemPayUp", true); //code to change file name and parameters @Author:SHRI25FEB15. 
    } else if (jrnlTransType == 'RepItemRawMetal') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&jrnlDrDesc=" + jrnlDrDesc + "&accMainId=" + accMainId + "&panelDivName=ItemRepair", true);
    } else if (jrnlTransType == 'custSell') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?panelDivName=" + 'SellPanel' + "&panelName=" + 'CustSellUpPanel' + "&itslin_id=" + jrnlTransId, true);
    } else if (jrnlTransType == 'ImitationStockAdd') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utrans_id=" + jrnlTransId + "&panelName=ImitationStockPayUp&updatePanelName=UpdateImitationStock", true);
    } else if (jrnlTransType == 'crystalAdd') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcraddv" + default_theme + ".php?isin_id=" + jrnlTransId + "&panelName=CrystalPanel&updatePanelName=CrystalPayUp", true);
    } else if (jrnlUserType == 'cust' && jrnlTransType == 'Auction') {
        xmlhttp.open("POST", documentRootPath + "/include/php/olgraudt" + default_theme + ".php?custId=" + jrnlUserId + "&jrnlDrDesc=" + jrnlDrDesc + "&girviId=" + jrnlTransId + "&accMainId=" + accMainId + "&panelDivName=girviAuctioned", true);
    } else if (jrnlTransType == 'transLoan') {
        xmlhttp.open("POST", documentRootPath + "/include/php/olgtnavi" + default_theme + ".php?gTransId=" + jrnlTransId + "&panelDivName=journalBookNav", true);
    } else if (jrnlUserType == 'CUSTOMER' && jrnlTransType == 'sell') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&custPanelOption=" + 'CustHome', true);
    } else if (jrnlUserType == 'CUSTOMER' && (jrnlTransType == 'PAYMENT' || jrnlTransType == 'RECEIPT')) {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&custPanelOption=" + 'CustHome' + "&panelName=" + 'custAllTrans', true);
    }
    xmlhttp.send();
}
/***************End update code @Author:GAUR24OCT16************/
/***************End code to add condition for transLoan @Author:PRIYA13APR15************/
/***************End code to add jrnlTransType for Auction @Author:ANUJA31MAR15**********/
/***************End code to add jrnlTransType for CrystalAdd @Author:SHE23MAR15*********/
/***************End code to add jrnlTransType for Imitation @Author:ANUJA20MAR15**********/
/***************End code to add panel for stockAdd @Author:PRIYA16FEB15***********/
/***************End code to change filename @Author:PRIYA16FEB15**************/
/***************End to change function @AUTHOR: SANDY03FEB14****************/
/*********************End Code To Add Udhaar Panel @Author:PRIYA18AUG13********************/
function showJournalEntryReleaseListDiv(documentRootPath, jrnlId, jrnlDrDesc, jrnlUserId, jrnlUserType, jrnlTransId, jrnlTransType, accMainId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (jrnlUserType == 'cust' && jrnlTransType == 'Girvi') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + jrnlUserId + "&jrnlDrDesc=" + jrnlDrDesc + "&girviId=" + jrnlTransId + "&accMainId=" + accMainId + "&panelDivName=girviReleased", true);
    }
    xmlhttp.send();
}

/*******START CODE TO Move Item Bar Code Print Panel  @AUTHOR:PRIYA13FEB13***********/
var setBarCodeSlip65Div = '';
var setBarCodeSlip65Container = '';
var setBarCodeSlip65Container2 = '';
var setClose65Div = '';
var setClose65Container = '';
var setClose65Container2 = '';
function moveBarCodeSlip65L(barCodeSlipDiv, closeDivId) {
    if (setBarCodeSlip65Div == '') {

        setBarCodeSlip65Div = barCodeSlipDiv;
        setClose65Div = closeDivId;
        setBarCodeSlip65Container = document.getElementById(setBarCodeSlip65Div).innerHTML;
        setClose65Container = document.getElementById(setClose65Div).innerHTML;
        document.getElementById(closeDivId).innerHTML = "<img src='images/loading16.gif' />";
    } else if (barCodeSlipDiv != setBarCodeSlip65Div) {
        setBarCodeSlip65Container2 = document.getElementById(barCodeSlipDiv).innerHTML;
        setClose65Container2 = document.getElementById(closeDivId).innerHTML;
        document.getElementById(barCodeSlipDiv).innerHTML = setBarCodeSlip65Container;
        document.getElementById(setBarCodeSlip65Div).innerHTML = setBarCodeSlip65Container2;
        document.getElementById(closeDivId).innerHTML = setClose65Container;
        document.getElementById(setClose65Div).innerHTML = setClose65Container2;
        setBarCodeSlip65Div = '';
        setBarCodeSlip65Container = '';
        setBarCodeSlip65Container2 = '';
        setClose65Div = '';
        setClose65Container = '';
        setClose65Container2 = '';
    }
}
/*******END CODE TO Move Item Bar Code Print Panel  @AUTHOR:PRIYA13FEB13***********/
/*******START CODE TO Move Item Bar Code Print Panel  @AUTHOR:PRIYA15FEB13***********/
var setBarCodeSlip48Div = '';
var setBarCodeSlip48Container = '';
var setBarCodeSlip48Container2 = '';
var setClose48Div = '';
var setClose48Container = '';
var setClose48Container2 = '';
function moveBarCodeSlip84L(barCodeSlipDiv, closeDivId) {
    if (setBarCodeSlip48Div == '') {

        setBarCodeSlip48Div = barCodeSlipDiv;
        setClose48Div = closeDivId;
        setBarCodeSlip48Container = document.getElementById(setBarCodeSlip48Div).innerHTML;
        setClose48Container = document.getElementById(setClose48Div).innerHTML;
        document.getElementById(closeDivId).innerHTML = "<img src='images/loading16.gif' />";
    } else if (barCodeSlipDiv != setBarCodeSlip48Div) {
        setBarCodeSlip48Container2 = document.getElementById(barCodeSlipDiv).innerHTML;
        setClose48Container2 = document.getElementById(closeDivId).innerHTML;
        document.getElementById(barCodeSlipDiv).innerHTML = setBarCodeSlip48Container;
        document.getElementById(setBarCodeSlip48Div).innerHTML = setBarCodeSlip48Container2;
        document.getElementById(closeDivId).innerHTML = setClose48Container;
        document.getElementById(setClose48Div).innerHTML = setClose48Container2;
        setBarCodeSlip48Div = '';
        setBarCodeSlip48Container = '';
        setBarCodeSlip48Container2 = '';
        setClose48Div = '';
        setClose48Container = '';
        setClose48Container2 = '';
    }
}
/*******END CODE TO Move Item Bar Code Print Panel  @AUTHOR:PRIYA15FEB13***********/
/**********START CODE TO Add Slpr Inv @AUTHOR:PRIYA16FEB13***************/
/**********START CODE TO Change Inv Div @AUTHOR:PRIYA28FEB13***************/
/*****************Start of changes to search product depending on pre id @AUTHOR: SANDY16OCT13*********************/
/*****************Start code to change div @Author:PRIYA21JAN14*****************/
/***************Start Add new condition for checking Char for Imitation @Author:ANUJA25Feb15************************/
/***************Start Add new condition for checking Char and add else for A & J for  Imitation @Author:ANUJA28Feb15************************/
function showSlPrInvDiv(srchItemPreId, srchItemPostId, custId, panelName) {
//    alert(panelName);
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (res == 'G' || res == 'S' || res == 'O') {
                searchItemNames(itemName, metalType, divNum, keyCodeInput);
            }
            if (firstChar == 'R') {
                document.getElementById('slRwDOBDay').focus();
            } else {
                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (firstChar == 'R' || firstChar == 'r') {
        xmlhttp.open("POST", "include/php/ogrwspdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    } else if (firstChar == 'A' || firstChar == 'a') {
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    } else if (firstChar == 'J' || firstChar == 'j') {
//****************START code to sell :DISH14NOV16******************************//
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        //xmlhttp.open("POST", "include/php/ogcrspdv" + default_theme +".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        //****************END code to sell :DISH14NOV16******************************//
    } else {
        if (panelName == 'ItemPurchaseByLot') {
            xmlhttp.open("POST", "include/php/ogspildv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        } //  To Check For Crystal Code Added Code to add values in Barcode @Author:SHE18FEB15
        else if (panelName == 'CrystalPurchasePanel') {
//****************START code to sell :DISH14NOV16******************************//
            xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
//            xmlhttp.open("POST", "include/php/ogcrspdv" + default_theme +".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
//****************END code to sell :DISH14NOV16******************************//
        } else if (panelName == 'ImitationPurchasePanel') {
            xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        } else if (panelName == 'StockPurchasePanel') {
            xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName, true);
        } else {
            xmlhttp.open("POST", "include/php/ogspmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        }
    }
    xmlhttp.send();
}
/***************End Add new condition for checking Char and add else for A & J for  Imitation @Author:ANUJA28Feb15************************/
/***************End Add new condition for checking Char for Imitation @Author:ANUJA25Feb15************************/
/*****************End code to change div @Author:PRIYA21JAN14*****************/
/*****************End of changes to search product depending on pre id @AUTHOR: SANDY16OCT13*********************/
/**********END CODE TO Change Inv Div @AUTHOR:PRIYA28FEB13***************/
/**********END CODE TO Add Slpr Inv @AUTHOR:PRIYA16FEB13***************/
/**********START CODE TO Add Acc Details @AUTHOR:PRIYA26FEB13***************/
function getAccDetailsDiv(accId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'trialBalance') {
        xmlhttp.open("POST", "include/php/omalacdtdv" + default_theme + ".php?accId=" + accId + "&panel=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/omacacud" + default_theme + ".php?accId=" + accId, true);
    }
    xmlhttp.send();
}
/**********END CODE TO Add Acc Details @AUTHOR:PRIYA18FEB13***************/
/**********START CODE For WEBCAM In ADDSTOCK @AUTHOR:PRIYA26FEB13***************/
/**********Start code to add panel @Author:PRIYA14AUG14*****************/
/**********Start code to add panel @Author:PRIYA13SEP14**********************/
/**********Start code to add panel for add stock @Author:PRIYA27SEP14********************/
function chngStockImgLoadOpt(chngStockImgLoadOption, panelName, itemCount, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'SuppPanel')
                document.getElementById("stockImageLoadOption" + itemCount).value = chngStockImgLoadOption;
            else if (panelName == 'stockImageWithCntLoadPanel')
                document.getElementById("imageLoadOption" + itemCount).value = chngStockImgLoadOption;
            else if (panelName == 'AddStock')
                document.getElementById("stockImageLoadOption").value = chngStockImgLoadOption;
            else
                document.getElementById("imageLoadOption").value = chngStockImgLoadOption;
            if (chngStockImgLoadOption == 'COM') {
                document.getElementById("file_input_div").innerHTML = xmlhttp.responseText;
            } else if (chngStockImgLoadOption == 'WEB') {
                if (panelName == 'stockImageWithCntLoadPanel') {
                    document.getElementById("webcam_input_div" + itemCount).innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
                }
            }

        } else {
            if (chngStockImgLoadOption == 'COM') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngStockImgLoadOption == 'WEB') {

            }
        }
    };
    if (chngStockImgLoadOption == 'COM') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcsicim" + default_theme + ".php?panelName=" + panelName + "&itemCount=" + itemCount, true);
    } else if (chngStockImgLoadOption == 'WEB') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcsadif" + default_theme + ".php?panelName=" + panelName + "&itemDivCount=" + itemCount, true);
    }
    xmlhttp.send();
}
/**********End code to add panel for add stock @Author:PRIYA27SEP14********************/
/**********End code to add panel @Author:PRIYA13SEP14**********************/
/**********End code to add panel @Author:PRIYA14AUG14*****************/
/**********END CODE For WEBCAM In ADDSTOCK @AUTHOR:PRIYA22FEB13***************/


function chngLoanImgLoadOpt(chngLoanImgLoadOption, panelName, itemDivCount, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'girviItem')
                document.getElementById("imageLoadOption" + itemDivCount).value = chngLoanImgLoadOption;
//            else if (panelName == 'AddStock')
//                document.getElementById("LoanImgLoadOption").value = chngLoanImgLoadOption;
            else
                document.getElementById("imageLoadOption" + itemDivCount).value = chngLoanImgLoadOption;
            if (chngLoanImgLoadOption == 'COM') {
                document.getElementById("file_input_div" + itemDivCount).innerHTML = xmlhttp.responseText;
            } else if (chngLoanImgLoadOption == 'WEB') {
                document.getElementById("webcam_input_div" + itemDivCount).innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngLoanImgLoadOption == 'COM') {
                document.getElementById("webcam_input_div" + itemDivCount).innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngLoanImgLoadOption == 'WEB') {

            }
        }
    };
    if (chngLoanImgLoadOption == 'COM') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcsicim" + default_theme + ".php?panelName=" + panelName + "&itemDivCount=" + itemDivCount, true);
    } else if (chngLoanImgLoadOption == 'WEB') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcsadif" + default_theme + ".php?panelName=" + panelName + "&itemDivCount=" + itemDivCount, true);

    }
    xmlhttp.send();
}

/**********START CODE To Add WEBCAM DIV In Staff Panel @AUTHOR:PRIYA20FEB13***************/
/**********Start code To Pass Staff Id @AUTHOR:PRIYA18MAY13***************/
function chngStaffImgLoadOptTemp(chngStaffImgLoadOption, panelName, staffId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("staffImageLoadOption").value = chngStaffImgLoadOption;
            if (chngStaffImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = '';
                document.getElementById("file_input_div").innerHTML = xmlhttp.responseText;
            } else if (chngStaffImgLoadOption == 'Webcam') {
                document.getElementById("file_input_div").innerHTML = '';
                document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngStaffImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngStaffImgLoadOption == 'Webcam') {
                document.getElementById("file_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        }
    };
    if (chngStaffImgLoadOption == 'Computer') {
        xmlhttp.open("POST", "include/php/omccpcim" + default_theme + ".php?panelName=" + panelName + "&staffId=" + staffId, true);
    } else if (chngStaffImgLoadOption == 'Webcam') {
        xmlhttp.open("POST", "include/php/omccwcif" + default_theme + ".php", true);
    }

    xmlhttp.send();
}
function chngStaffImgLoadOpt(chngCustImgLoadOption, staffId, count, panelName, selectPhotoId, custImageLoadOptionId, fileNameId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(custImageLoadOptionId).value = chngCustImgLoadOption;
            if (chngCustImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = '';
                document.getElementById("file_input_div" + count).innerHTML = xmlhttp.responseText;
            } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
                document.getElementById("file_input_div").innerHTML = '';
                document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngCustImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
                document.getElementById("file_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        }
    };
    if (chngCustImgLoadOption == 'Computer') {
        xmlhttp.open("POST", "include/php/omccpcim" + default_theme + ".php?staffId=" + staffId + "&count=" + count + "&panelName=" + panelName + "&selectPhotoId=" + selectPhotoId + "&fileNameId=" + fileNameId, true);
    } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
        xmlhttp.open("POST", "include/php/omccwcif" + default_theme + ".php?staffId=" + staffId + "&itemDivCount=" + count + "&panelName=" + panelName + "&imageOption=" + chngCustImgLoadOption, true);
    }
    xmlhttp.send();
}
/**********End code To Pass Staff Id @AUTHOR:PRIYA18MAY13***************/
/**********END CODE To Add WEBCAM DIV In Staff Panel @AUTHOR:PRIYA20FEB13***************/
/******************START Code To Add Cust Id In Payment Div @AUTHOR:PRIYA26FEB13*******************/
/*********Start CODE TO Add FirmId @AUTHOR:PRIYA08APR13 ************/
/***************Start to make changes to use same function for raw stock sell @AUTHOR: SANDY12OCT13***************/
/***************Start of change to set focus on metal type field on load @AUTHOR: SANDY19OCT13****************************/
/***************Start code to change param @Author:PRIYA19JAN14****************/
/***************Start code to Add slprinPanel @Author:ANUJA03APR15****************/
/***************Start code to Add condition for raw metal OMMODTAG_SHE24DEC15****************/
/***************Start code to Add condition for raw metal OMMODTAG_SHE07JAN16****************/
function getPaymentDiv(documentRootPath, preInvoiceNo, postInvoiceNo, panelName, navPanel, slprinPanel, userId, suppId, mainPanel, transPanelName) {
    alert(mainPanel);
    alert(transPanelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'SellPurchase') {
                document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'NewOrder') {
                document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'RawStock' || panelName == 'RawPayment') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (navPanel == 'RawStock' || panelName == 'RawPayment') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmiddv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&suppId=" + suppId, true);
    } else
    {
        xmlhttp.open("POST", documentRootPath + "/include/php/ompyamt" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&userId=" + userId + "&mainPanelName=" + mainPanel + "&transPanelName=" + transPanelName, true);
    }
    xmlhttp.send();
}
/***************End code to Add condition for raw metal OMMODTAG_SHE07JAN16****************/
/***************End code to Add condition for raw metal OMMODTAG_SHE24DEC15****************/
/***************End code to Add slprinPanel @Author:ANUJA03APR15****************/
/***************End code to change param @Author:PRIYA19JAN14****************/
/***************End of change to set focus on metal type field on load @AUTHOR: SANDY19OCT13********************/
/***************End to make changes to use same function for raw stock sell @AUTHOR: SANDY12OCT13***************/
/*********End CODE TO Add FirmId @AUTHOR:PRIYA08APR13 ************/

/**********Start Changes in function for  WEBCAM In Item Repair @AUTHOR:SANDY17SEP13***************/
/**********START CODE For WEBCAM In NewOrder @AUTHOR:PRIYA25FEB13***************/
/**********Start Code To Add Div For Supp New Order Item Image @AUTHOR:PRIYA25MAY13***********/
/**********Start code to add panel for item_name  @Author:PRIYA25DEC13 **************/
function chngNewOrderImgLoadOpt(chngNewOrderLoadOption, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'SuppNewOrder') {
                document.getElementById("suppNwOrImageLoadOption").value = chngNewOrderLoadOption;
            } else if (panelName == 'NewOrder') {
                document.getElementById("nwOrImageLoadOption").value = chngNewOrderLoadOption;
            } else if (panelName == 'ItemName') {
                document.getElementById("itemNmImageLoadOption").value = chngNewOrderLoadOption;
            } else if (panelName == 'CustSell') {
                document.getElementById("slItemImageLoadOption").value = chngNewOrderLoadOption;
            }
            //Start to add lines for Item Repair Panel @AUTHOR:SANDY17SEP13
            else if (panelName == 'ItemRepair') {
                document.getElementById("repairImageLoadOption").value = chngNewOrderLoadOption;
            }
            //End to add lines for Item Repair Panel @AUTHOR:SANDY17SEP13
            if (chngNewOrderLoadOption == 'COM') {
                document.getElementById("file_input_div").innerHTML = xmlhttp.responseText;
            } else if (chngNewOrderLoadOption == 'WEB') {
                document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngNewOrderLoadOption == 'COM') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngNewOrderLoadOption == 'WEB') {

            }
        }
    };
    if (chngNewOrderLoadOption == 'COM') {
        xmlhttp.open("POST", "include/php/ognoicim" + default_theme + ".php?panelName=" + panelName, true);
    } else if (chngNewOrderLoadOption == 'WEB') {
        xmlhttp.open("POST", "include/php/omcsadif" + default_theme + ".php?panelName=" + panelName, true);
    }
    xmlhttp.send();
}
/**********End code to add panel for item_name  @Author:PRIYA25DEC13 **************/
/**********End Code To Add Div For Supp New Order Item Image @AUTHOR:PRIYA25MAY13***********/
/**********END CODE For WEBCAM In NewOrder @AUTHOR:PRIYA25FEB13***************/
/**********END Changes in function for WEBCAM In Item Repair @AUTHOR:SANDY17SEP13***************/
/**********Start Code To Validate Journal Entry Date @Author:PRIYA14AUG13**************/
function valJournalEntryDate() {
    /*if (validateSelectField(document.getElementById("journalEntryDayDD").value,"Please select Day!") == false) {
     document.getElementById("journalEntryDayDD").focus();
     return true; to remove validation for day AND show whole month entries @AUTHOR: SANDY20AUG13
     }else */if (validateSelectField(document.getElementById("journalEntryMonth").value, "Please select Month!") == false) {
        document.getElementById("journalEntryMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("journalEntryYYYY").value, "Please select Year!") == false) {
        document.getElementById("journalEntryYYYY").focus();
        return false;
    }
    return true;
}
/***********End Code To Validate Journal Entry Date @Author:PRIYA14AUG13**************/

/***************START Code To Search Journal Entry By Date @AUTHOR:PRIYA13MARCH13**************/
/***************Start Code To Add Validation Function @Author:PRIYA14AUG13**************/
/**Start change in one line of this function  to pass more variables @AUTHOR: SANDY20AUG13 **/
function searchJournalEntryByDate(firmId, dd, mm, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (valJournalEntryDate()) {
                document.getElementById("journalEntryDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var journalEntryDate = dd.value + '-' + mm.value + '-' + yyyy.value;
    xmlhttp.open("POST", "include/php/omacjnendv" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    xmlhttp.send();
}
//
//
//********************START CODE FOR NEPALI DATE @RENUKA SHARMA-NOV2022*********************//
function searchJournalEntryByNepaliDate(firmId, dd, mm, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

            document.getElementById("journalEntryDiv").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var journalEntryDate = dd.value + '-' + mm.value + '-' + yyyy.value;
    xmlhttp.open("POST", "include/php/omacjnendv" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    xmlhttp.send();
}
//********************END CODE FOR NEPALI DATE @RENUKA SHARMA-NOV2022*********************//
//
//
/***************End Code To Add Validation Function @Author:PRIYA14AUG13**************/
/***************END Code To Search Journal Entry By Date @AUTHOR:PRIYA13MARCH13**************/
/**********Start Code To Validate Girvi Analysis Date @Author:PRIYA14AUG13**************/
function valReportDate() {
    if (validateSelectField(document.getElementById("reportEntryDayDD").value, "Please select Day!") == false) {
        document.getElementById("reportEntryDayDD").focus();
        return false;
    } else if (validateSelectField(document.getElementById("reportEntryMonth").value, "Please select Month!") == false) {
        document.getElementById("reportEntryMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("reportEntryYYYY").value, "Please select Year!") == false) {
        document.getElementById("reportEntryYYYY").focus();
        return false;
    }
    return true;
}
/**********End Code To Validate Girvi Analysis Date @Author:PRIYA14AUG13**************/
/**********Start Code To Add Validation Func for date @Author:PRIYA14AUG13**************/
/********* START CODE TO SEARCH ANALYSIS REPORT @AUTHOR: SANDY28JUN13 ***/
function searchReportByDate(firmId, dd, mm, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (valReportDate()) {
                document.getElementById("girviAnalysisDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var Date = dd.value;
    var month = mm.value;
    var year = yyyy.value;
    //alert(month);
    xmlhttp.open("POST", "include/php/orgnsfdv" + default_theme + ".php?firmId=" + firmId + "&dateDD=" + Date + "&dateMMM=" + month + "&dateYYYY=" + year, true);
    xmlhttp.send();
}
/**********End Code To Add Validation Func for date @Author:PRIYA14AUG13**************/
/********* END CODE TO SEARCH ANALYSIS REPORT @AUTHOR: SANDY26JUN13 ***/

/**********START CODE TO Add Item BarCode Div @AUTHOR:PRIYA05MARCH13***************/
/**********START CODE TO Change CustId @AUTHOR:PRIYA08MARCH13***************/
/*****************Start of changes to search product depending on pre id @AUTHOR: SANDY4OCT13*********************/
/*****************Start of changes to search product depending on pre id @AUTHOR: SANDY15OCT13*********************/
/*****************Start code to change div @Author:PRIYA04DEC13*********************/
function itemBarCodeSearch(itemBarCodeId, custId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainSlPrSubDiv").innerHTML = xmlhttp.responseText;
            if (barCodeFirstTwoLetters == 'it' || barCodeFirstTwoLetters == 'IT') {
                document.getElementById('slRwDOBDay').focus();
            } else {
                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var barCodeFirstTwoLetters = itemBarCodeId.substr(0, 2);
    var barCodeId = itemBarCodeId.substr(2);
    if (barCodeFirstTwoLetters == 'it' || barCodeFirstTwoLetters == 'IT') {
        xmlhttp.open("POST", "include/php/ogspmndv" + default_theme + ".php?itemBarCodeId=" + barCodeId + "&custId=" + custId + "&panelName=" + panelName, true);
    } else if (barCodeFirstTwoLetters == 'rt' || barCodeFirstTwoLetters == 'RT') {
        xmlhttp.open("POST", "include/php/ogrwspdv" + default_theme + ".php?itemBarCodeId=" + barCodeId + "&custId=" + custId + "&panelName=" + panelName, true);
    }
    xmlhttp.send();
}
/*****************End code to change div @Author:PRIYA04DEC13*********************/
/****************End of changes to search product depending on pre id @AUTHOR: SANDY4OCT13*********************/
/**********END CODE TO Change CustId @AUTHOR:PRIYA08MARCH13***************/
/**********END CODE TO Add Item BarCode Div @AUTHOR:PRIYA05MARCH13***************/

/**************Start Code To show SellPurchase Item Details Div @AUTHOR:PRIYA06MARCH13*****************************************/
/**************Start code to change div @Author:PRIYA18DEC13*****************************************/
/**************Start code to change div @Author:PRIYA06JAN14*****************************************/
function showSellPurchaseItemDetails(documentRootPath, custId, preInvoiceNo, postInvoiceNo, mainPanel, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panelDivName=" + 'SellPurchase' + "&mainPanel=" + mainPanel + "&panelName=" + panelName +
            "&divMainMiddlePanel=" + panelName + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + postInvoiceNo, true);
    xmlhttp.send();
}
/**************End code to change div @Author:PRIYA06JAN14*****************************************/
/**************End code to change div @Author:PRIYA18DEC13*****************************************/
/*****************End Code To show SellPurchase Item Details Div @AUTHOR:PRIYA06MARCH13*****************************************/
/*********Start Code To Add Navigation For Next Items In Stock List @AUTHOR:PRIYA18MARCH13********/
/*********Start Code To Add Search Variables In Jewellery Panel @AUTHOR:PRIYA31MAY13**************/
/*********Start code to add div @author:PRIYA15OCT14******************/
//START chnage file name ogilimdv" + default_theme +".php to ogilistsd" + default_theme +".php and div change addStockItemDetails to jewellerySubPanel Author:GAUR26JUL16
//add metal weight Author:GAUR29JUL16
function navigationItemListPanel(pageNo, startRange, endRange, itemName, itemCat, stockItemMetal, noOfPagesAsLink, weight, panelName, catName = '') {
    // console.log("navigationItemListPanel called with:", { pageNo, startRange, itemName, panelName, default_theme });

    var metalType = ''; // Initialize
    var stockItemMetalElement = document.getElementById("stockItemMetal");
    if (stockItemMetalElement) {
        metalType = stockItemMetalElement.value;
    } else {
        // console.warn("Element with ID 'stockItemMetal' not found. Using passed stockItemMetal parameter for metalType.");
        metalType = stockItemMetal; // Fallback to parameter if element not found
    }

    if (pageNo == 0) {
        var enterPageNoEl = document.getElementById('enterPageNo');
        if (enterPageNoEl)
            enterPageNoEl.value = '';
        alert("Please select correct page Number!!");
        return; // Exit early
    }

    loadXMLDoc(); // Ensure this initializes 'xmlhttp' correctly
    if (!xmlhttp) {
        console.error("xmlhttp object is not initialized after loadXMLDoc() in navigationItemListPanel.");
        var loadingDivErr = document.getElementById("main_ajax_loading_div");
        if (loadingDivErr)
            loadingDivErr.style.visibility = "hidden";
        return;
    }

    xmlhttp.onreadystatechange = function () {
        // console.log("ItemListPanel AJAX readyState:", xmlhttp.readyState, "status:", xmlhttp.status);

        if (xmlhttp.readyState == 4) { // Request finished and response is ready
            var loadingDiv = document.getElementById("main_ajax_loading_div");
            if (loadingDiv)
                loadingDiv.style.visibility = "hidden"; // Hide loader regardless of status

            if (xmlhttp.status == 200) { // Successful HTTP request
                if (document.barcode_search && document.barcode_search.barcode_text) { // Defensive check
                    document.barcode_search.barcode_text.focus();
                }

                // console.log("ItemListPanel AJAX Success. Response (first 200 chars):", xmlhttp.responseText.substring(0, 200));

                var targetPanelElement = document.getElementById("jewellerySubPanel"); // Target for this function
                if (targetPanelElement) {
                    // The if/else for panelName was redundant as both branches did the same
                    targetPanelElement.innerHTML = xmlhttp.responseText;
                    // console.log("HTML injected into #jewellerySubPanel.");

                    // ---- LAZY LOAD INITIALIZATION FOR NEW CONTENT ----
                    if (typeof initializeLazyLoadForNewContent === 'function') {
                        // console.log("Calling initializeLazyLoadForNewContent for #jewellerySubPanel");
                        initializeLazyLoadForNewContent(targetPanelElement, 0); // 0 ms delay, load immediately
                    } else {
                        console.error("initializeLazyLoadForNewContent function is not defined. Ensure your-main-script.js is loaded.");
                    }
                    // ---- END LAZY LOAD INITIALIZATION ----

                } else {
                    console.error("Target panel #jewellerySubPanel not found in DOM.");
                }

                // Page number UI update logic
                if (pageNo >= 10) {
                    if (typeof setPageValue === 'function')
                        setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    var pageNoTextField = document.getElementById('pageNoTextField' + pageNo);
                    if (pageNoTextField)
                        pageNoTextField.setAttribute("class", "currentPageNoButton");
                    // You might also want to remove 'currentPageNoButton' from other page number elements here
                }

            } else { // HTTP status is not 200
                console.error("ItemListPanel AJAX Error: Status " + xmlhttp.status, "Response:", xmlhttp.responseText);
                var errorTargetPanel = document.getElementById("jewellerySubPanel");
                if (errorTargetPanel)
                    errorTargetPanel.innerHTML = "<p style='color:red;'>Error loading content. Server responded with status: " + xmlhttp.status + "</p>";
            }
        } else { // readyState is not 4 (still loading)
            var loadingDivProgress = document.getElementById("main_ajax_loading_div");
            if (loadingDivProgress)
                loadingDivProgress.style.visibility = "visible";
        }
    };

    // --- URL Construction Logic ---
    var url;
    // Ensure default_theme is defined and accessible
    if (typeof default_theme === 'undefined') {
        console.error("default_theme is not defined! AJAX URLs will be incorrect for ItemListPanel.");
        var loadingDivUrlErr = document.getElementById("main_ajax_loading_div");
        if (loadingDivUrlErr)
            loadingDivUrlErr.style.visibility = "hidden";
        return; // Prevent AJAX call with bad URL
    }

    var requestParams = "?page=" + encodeURIComponent(pageNo) +
            "&startRange=" + encodeURIComponent(startRange) +
            "&endRange=" + encodeURIComponent(endRange) +
            "&itemName=" + encodeURIComponent(itemName) +
            "&itemCat=" + encodeURIComponent(itemCat) +
            "&stockItemMetal=" + encodeURIComponent(metalType) + // Use the determined metalType
            "&metalWt=" + encodeURIComponent(weight) +
            "&panelName=" + encodeURIComponent(panelName) + // panelName is used in some URLs
            "&catName=" + encodeURIComponent(catName);


    if (panelName == 'jwelleryPanel' || panelName == 'sterlingPanel' || panelName == 'imitationPanel') {
        url = "include/php/ogijlimsd" + default_theme + ".php" + requestParams;
    } else if (panelName == 'WholsaleJwelleryPanel' || panelName == 'WholsaleImitationJwelleryPanel') {
        url = "include/php/ogijlimsd_1" + default_theme + ".php" + requestParams;
    } else if (panelName == 'WindowShoppingList') {
        // Original code passed panelName as &divPanel=panelName
        url = "include/php/ogilstws" + default_theme + ".php" + requestParams.replace("&panelName=" + encodeURIComponent(panelName), "") + "&divPanel=" + encodeURIComponent(panelName);
    } else if (panelName == 'sellStock') {
        // Original code for sellStock didn't include panelName in URL params, only other params
        var sellStockParams = "?page=" + encodeURIComponent(pageNo) +
                "&startRange=" + encodeURIComponent(startRange) +
                "&endRange=" + encodeURIComponent(endRange) +
                "&itemName=" + encodeURIComponent(itemName) +
                "&itemCat=" + encodeURIComponent(itemCat) +
                "&stockItemMetal=" + encodeURIComponent(metalType) +
                "&metalWt=" + encodeURIComponent(weight);
        url = "include/php/ogilistsold" + default_theme + ".php" + sellStockParams;
    } else { // Default case, presumably your "ogilistsd.php"
        // Original code for default didn't include panelName in URL params, only other params
        var defaultParams = "?page=" + encodeURIComponent(pageNo) +
                "&startRange=" + encodeURIComponent(startRange) +
                "&endRange=" + encodeURIComponent(endRange) +
                "&itemName=" + encodeURIComponent(itemName) +
                "&itemCat=" + encodeURIComponent(itemCat) +
                "&stockItemMetal=" + encodeURIComponent(metalType) +
                "&metalWt=" + encodeURIComponent(weight);
        url = "include/php/ogilistsd" + default_theme + ".php" + defaultParams;
    }

    if (!url) {
        console.error("URL could not be determined for ItemListPanel. panelName:", panelName);
        var loadingDivUrlErr2 = document.getElementById("main_ajax_loading_div");
        if (loadingDivUrlErr2)
            loadingDivUrlErr2.style.visibility = "hidden";
        return;
    }

    // console.log("ItemListPanel AJAX Opening POST to:", url);
    xmlhttp.open("POST", url, true);
    // See notes in previous function about POST vs GET and where params are sent.
    // Assuming PHP scripts handle params from URL even on POST for now.
    xmlhttp.send();
}
//add metal weight Author:GAUR29JUL16
//END chnage file name ogilimdv" + default_theme +".php to ogilistsd" + default_theme +".php and div change addStockItemDetails to jewellerySubPanel Author:GAUR26JUL16
//
//
//*********Start Code To Add Pagination for Finance  Panel @AUTHOR:GANGADHAR17DEC21**************
//MODIFY FUNCTION FOR DISPLAY PROPER PAGE ACCORDING TO PAID EMI : AUTHOR @DARSHANA 30 DEC 2021
function showFinanceEMIPageInPanel(documentRootPath, pageNo, rowsPerPage, girviId, sortKeyword, searchColumn, searchValue, noOfPagesAsLink, panel, indicator) {

    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("girviDetailsDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            }
        };

        xmlhttp.open("POST", documentRootPath + "/include/php/omfnpydtl" + default_theme + ".php?page=" + pageNo + "&searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&girviId=" + girviId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel + "&indicator=" + indicator, true);

        xmlhttp.send();
    }
}
//*********End Code To Add Pagination for Finance  Panel @AUTHOR:GANGADHAR17DEC21**************
//***************************************************************************************//
// Start code to add function for pagination on Form H Book Author:DIKSHA 09 MAY 2019 ***//
//***************************************************************************************//
function ItemListPanel(pageNo, sdd, smm, syy, edd, emm, eyy, loanType, noOfPagesAsLink) {
    if (parseInt(pageNo) == 0 || parseInt(pageNo) > parseInt(noOfPagesAsLink)) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("ledgerDetDiv").innerHTML = xmlhttp.responseText;
                if (parseInt(pageNo) >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var startDate = sdd + ' ' + smm + ' ' + syy;
        var endDate = edd + ' ' + emm + ' ' + eyy;
        xmlhttp.open("POST", "include/php/ommlgfrmdet" + default_theme + ".php?page=" + pageNo + "&smm=" + smm + "&syy=" + syy + "&edd=" + edd + "&emm=" + emm +
                "&eyy=" + eyy + "&girviLedgerDetStartDate=" + startDate + "&girviLedgerDetEndDate=" + endDate + "&loanType=" + loanType, true);
        xmlhttp.send();
    }
}
//***************************************************************************************//
// End code to add function for pagination on Form H Book Author:DIKSHA 09 MAY 2019 *****//
//***************************************************************************************//
//
/**Start change in one line of this function  to pass more variables @AUTHOR: SANDY20AUG13 **/
function getJournalBookByFrmId(firmId, dd, mm, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("journalEntryDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var journalEntryDate = dd.value + '-' + mm.value + '-' + yyyy.value;
    xmlhttp.open("POST", "include/php/omacjnendv" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value, true); //change in this line to pass more variables @AUTHOR: SANDY20AUG13
    xmlhttp.send();
}
/**End change in one line of this function  to pass more variables @AUTHOR: SANDY20AUG13 **/
/********End Code To Select FirmId In All Accounts Panel @AUTHOR:PRIYA13MAR13**********/
//**************************** Navigate Search Customer By Mobile No ************************************************************
/******************Start Code to add panel @Author:PRIYA23OCT13***************/
/*******************Start code to comment function @Author:PRIYA18NOV13********/
/*function getDailyDiaryByFirmName(ddDetVal, firmId, dd, mm, yyyy) {
 loadXMLDoc();
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 }
 };
 var dailyDiaryDate = yyyy.value + '-' + mm.value + '-' + dd.value;
 xmlhttp.open("POST", "include/php/omddddan" + default_theme +".php?firmId=" + firmId + "&dailyDiaryDate=" + dailyDiaryDate + "&ddDetVal=" + ddDetVal, true);
 xmlhttp.send();
 }*/
/*******************End code to comment function @Author:PRIYA18NOV13********/
/******************End Code to add panel @Author:PRIYA23OCT13***************/
/***********Start Code To Select FirmId In Girvi Ledger Panel @AUTHOR:PRIYA13MAR13********/
/***********Start Code To Add PanelName @AUTHOR:PRIYA09JUNE13*********************/
/***********Start Code To Add PanelName @AUTHOR:PRIYA20JUNE13***********/
/***********Start Code To Add PanelName @AUTHOR:PRIYA21JUNE13***********/
/**************Start code to add Int panel @Author:PRIYA18FEB14**********************/
/**************Start code to add panel @Author:PRIYA31MAR14*****************/
function getGirviLedgerByFirmName(panelName, firmId, yyyy, mm) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'OMREVO') {
                document.getElementById("girviLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'GOLD') {
                document.getElementById("goldLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'RawMetalGold') {
                document.getElementById("goldLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'SILVER') {
                document.getElementById("silverLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'RawMetalSilver') {
                document.getElementById("silverLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'UdhaarLedger') {
                document.getElementById("udhaarLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'TransGirvi') {
                document.getElementById("girviTransLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'LoanInt') {
                document.getElementById("loanIntLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'commomLedger') {
                document.getElementById("comLedgerDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'USEROMREVO') {
                document.getElementById("girviReleasedLoansListPanelNewDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'OMREVO') {
        xmlhttp.open("POST", "include/php/orbbblsh" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'GOLD') {
        xmlhttp.open("POST", "include/php/ogbbgdbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'RawMetalGold') {
        xmlhttp.open("POST", "include/php/ogbbrwbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'SILVER') {
        xmlhttp.open("POST", "include/php/ogbbslbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'RawMetalSilver') {
        xmlhttp.open("POST", "include/php/ogbbrwslbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'UdhaarLedger') {
        xmlhttp.open("POST", "include/php/ombbuubs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'TransGirvi') {
        xmlhttp.open("POST", "include/php/orbbtrgl" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'LoanInt') {
        xmlhttp.open("POST", "include/php/orbbinbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'commomLedger') {
        xmlhttp.open("POST", "include/php/ombbcmbs" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    } else if (panelName == 'USEROMREVO') {
        xmlhttp.open("POST", "include/php/ombbglrploandv" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value + "&balanceSheetMonth=" + mm.value, true);
    }
    xmlhttp.send();
}
/**************End code to add panel @Author:PRIYA31MAR14*****************/
/***********End code to add Int panel @Author:PRIYA18FEB14**********************/
/***********End Code To Add PanelName @AUTHOR:PRIYA21JUNE13***********/
/***********End Code To Add PanelName @AUTHOR:PRIYA20JUNE13***********/
/***********End Code To Change FileName @AUTHOR:PRIYA09JUNE13*********************/
/***********End Code To Select FirmId In Girvi Ledger Panel @AUTHOR:PRIYA13MAR13********/

/***********Start Code To Select FirmId In Girvi Ledger Details Panel @AUTHOR:PRIYA14MAR13********/
/************Start Code To Change Div Name @Author:PRIYA24JUL13**************/
/************Start Code To Add Condition For LOAN DETAILS @Author:RUTUJA04MAR21**************/
function getGirviLedgerDetailsByFirmName(firmId, FrmDay, FrmMonth, FrmYear, ToDay, ToMonth, ToYear, indicator) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerDetDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var girviLedgerDetStartDate = FrmDay.value + " " + FrmMonth.value + " " + FrmYear.value;
    var girviLedgerDetEndDate = ToDay.value + " " + ToMonth.value + " " + ToYear.value;
//    alert(indicator);
    if (indicator == 'OMREVODETAILS') {
        xmlhttp.open("POST", "include/php/ombbglrpdv" + default_theme + ".php?firmId=" + firmId + "&girviLedgerDetStartDate=" + girviLedgerDetStartDate + "&girviLedgerDetEndDate=" + girviLedgerDetEndDate + "&indicator=" + indicator, true);
    } else {
        xmlhttp.open("POST", "include/php/ombbgldv" + default_theme + ".php?firmId=" + firmId + "&girviLedgerDetStartDate=" + girviLedgerDetStartDate + "&girviLedgerDetEndDate=" + girviLedgerDetEndDate, true);
    }
    xmlhttp.send();
}
/************End Code To Add Condition For LOAN DETAILS @Author:RUTUJA04MAR21**************/
/************End Code To Change Div Name @Author:PRIYA24JUL13**************/
/***********End Code To Select FirmId In Girvi Ledger Details Panel @AUTHOR:PRIYA14MAR13********/
/************Start Code To Select Financial year In Trial Balance Panel @AUTHOR:PRIYA15MAR13*************/
function getTrialBalance(firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("trialBalanceDiv").innerHTML = xmlhttp.responseText; //CHANGE IN DIV @AUTHOR: SANDY17JAN14
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omactrbl" + default_theme + ".php?firmId=" + firmId + "&trialBalanceFromDD=" + fromDD + "&trialBalanceFromMM=" + fromMM + "&trialBalanceFromYY=" + fromYY
            + "&trialBalanceToDD=" + toDD + "&trialBalanceToMM=" + toMM + "&trialBalanceToYY=" + toYY, true); //CHANGE IN FILE @AUTHOR: SANDY17JAN14
    xmlhttp.send();
}
/************End Code To Select Financial year In Trial Balance Panel @AUTHOR:PRIYA15MAR13*************/
/***********Start Code To Select FirmId In Trial Balance Panel @AUTHOR:PRIYA14MAR13********/


/************Start Code To Select Date In Stock Ledger Panel @AUTHOR:BAJRANG25FEB18*************/
function getStockLedgerByDate(DOBDay, DOBMonth, DOBYear) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("purchaseDetails").innerHTML = xmlhttp.responseText; //CHANGE IN DIV @AUTHOR: SANDY17JAN14
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogbbstdt" + default_theme + ".php?DOBDay=" + DOBDay + "&DOBMonth=" + DOBMonth + "&DOBYear=" + DOBYear, true); //CHANGE IN FILE @AUTHOR: SANDY17JAN14
    xmlhttp.send();
}
/************End Code To Select Stock Ledger Panel @AUTHOR:BAJRANG25FEB18*************/


function getTrialBalanceByFirmName(firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("trialBalanceDiv").innerHTML = xmlhttp.responseText; //CHANGE IN DIV @AUTHOR: SANDY17JAN14
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omactrbl" + default_theme + ".php?firmId=" + firmId + "&trialBalanceFromDD=" + fromDD + "&trialBalanceFromMM=" + fromMM + "&trialBalanceFromYY=" + fromYY
            + "&trialBalanceToDD=" + toDD + "&trialBalanceToMM=" + toMM + "&trialBalanceToYY=" + toYY, true); //CHANGE IN FILE @AUTHOR: SANDY17JAN14
    xmlhttp.send();
}
/***********End Code To Select FirmId In Trial Balance Panel @AUTHOR:PRIYA14MAR13********/
/************Start Code To Select Financial year In Balance Sheet Panel @AUTHOR:PRIYA15MAR13*************/
function getBalanceSheetByDate(firmId, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("balanceSheetSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacbsdv" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy, true);
    xmlhttp.send();
}
/************End Code To Select Financial year In Balance Sheet Panel @AUTHOR:PRIYA15MAR13*************/
function getReleaseLoanByDate(yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("relaseloanwithfincialyear").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omreleaseloanfincyear" + default_theme + ".php?releaseloanYear=" + yyyy, true);
    xmlhttp.send();
}
/************End Code To Select Financial year In Balance Sheet Panel @AUTHOR:PRIYA15MAR13*************/

/***********Start Code To Select FirmId In Balance Sheet Panel @AUTHOR:PRIYA15MAR13********/
function getBalanceSheetByFirmName(firmId, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("balanceSheetSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacbsdv" + default_theme + ".php?firmId=" + firmId + "&balanceSheetYear=" + yyyy.value, true);
    xmlhttp.send();
}
/***********End Code To Select FirmId In Balance Sheet Panel @AUTHOR:PRIYA15MAR13********/
/*******Start Code To For Existing Item @AUTHOR:PRIYA15FEB13********/
/*******Start code to add var @Author:PRIYA24DEC13***************************/
function addStockExistingItemDiv(newPreInvoiceNo, newInvoiceNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogiaexad" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*******End code to add var @Author:PRIYA24DEC13***************************/
/*******End Code To For Existing Item @AUTHOR:PRIYA15FEB13********/

/******************Start Code To show Stock Item Details Div @AUTHOR:PRIYA18MAR13*************/
/******************Start Code To Change Stock Item Details Div @AUTHOR:PRIYA23APR13*************/
/******************Start Code To Add Panel Name @AUTHOR:PRIYA04MAY13*************/
function showItemDetailsDiv(documentRootPath, sttrId, panelName, page, prodVersion, addDate) {
    //alert(panelName);
    var panelNameItemDetails = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelNameItemDetails == 'stockList') {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'jewelleryPanel') {
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'VirtualStockPanel') {
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'jewelleryPanelSoldoutList') {  //Adding SoldOut List @author:vinod09-March2023
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (prodVersion == 'OMUNIM3.0.0') {
        xmlhttp.open("POST", "include/php/stock/omStockJwelleryPanel" + default_theme + ".php?sttrId=" + sttrId + "&page=" + page, true);
    } else {
        if (panelNameItemDetails == 'jewelleryPanelSoldoutList') //Adding SoldOut List @author:vinod09-March2023
        {
            xmlhttp.open("POST", "include/php/ogidsbdv" + default_theme + ".php?sttrId=" + sttrId + "&page=" + page + "&panelName=" + panelName + "&soldStockList=sellStock" + "&addDate=" + addDate, true);
        } else
        {
            xmlhttp.open("POST", "include/php/ogidsbdv" + default_theme + ".php?sttrId=" + sttrId + "&page=" + page + "&panelName=" + panelName, true);
        }
    }
    xmlhttp.send();
}
/******************End Code To Add Panel Name @AUTHOR:PRIYA04MAY13*************/
/***********************Start Code To Delete Stock Item Details Div @AUTHOR:PRIYA18MAR13************/
function deleteItemDetails(sttrId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("stockItemDetailsDiv" + itstId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("stockItemDetailsDiv" + itstId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/***********************End Code To Delete Stock Item Details Div @AUTHOR:PRIYA18MAR13************/

/********Start Code To Select FirmId In All Accounts Panel @AUTHOR:PRIYA18MAR13**********/
/*************Start code to select firm id @AUTHOR: SANDY26JUN13 ********/
/*************Start to change function @AUTHOR: SANDY29JAN14********/
function getAccByFrmId(firmId, acntType) {
    acntType = encodeURIComponent(acntType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacaclt" + default_theme + ".php?firmId=" + firmId + "&accountType=" + acntType, true); // omalacdt" + default_theme +".php is replaced by omacaclt" + default_theme +".php @AUTHOR:SHRI21SEP20
    xmlhttp.send();
}
/*************End to change function @AUTHOR: SANDY29JAN14********/
/*************End code to select firm id @AUTHOR: SANDY26JUN13 ********/
/********End Code To Select FirmId In All Accounts Panel @AUTHOR:PRIYA18MAR13**********/

/********Start Code To Select FirmId In  Accounts Panel @AUTHOR:PRIYA19MAR13**********/
function getAddAccByFrmId(firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacacdv" + default_theme + ".php?firmId=" + firmId, true);
    xmlhttp.send();
}
/********End Code To Select FirmId In  Accounts Panel @AUTHOR:PRIYA19MAR13**********/
/********Start Code To Select FirmId In Transaction Panel @AUTHOR:PRIYA19MAR13**********/
/* * **Start to change code @AUTHOR: SANDY08FEB14***** */
function getTransactionAccountsByFrmId(firmId, day, month, year, panel, mainTransId) {
    //
//    alert('panel == ' + panel + " mainTransId == " + mainTransId);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'updateTransaction') { // CONDITION ADDED FOR UPDATE TRANSACTION @AUTHOR:SHRI17AUG20
                document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainTransactionDiv").innerHTML = xmlhttp.responseText;
            }
            getFirmVoucherNo(firmId, panel, month, year); //CALL FUNCTION TO SET VCH ID
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    /***********************************Check flag to set firm id on Transaction Payment Panel //modified by Harhsad//*****************************/
    if (panel == 'transactionPayment') {
        xmlhttp.open("POST", "include/php/omtransactionPanel" + default_theme + ".php?firmId=" + firmId + "&day=" + day + "&month=" + month + "&year=" + year, true); //change in file @AUTHOR: SANDY02JAN14
    } else if (panel == 'AddNewTransPayment') {
        xmlhttp.open("POST", "include/php/omDailyTransPayment" + default_theme + ".php?firmId=" + firmId + "&day=" + day + "&month=" + month + "&year=" + year, true); //change in file @AUTHOR: SANDY02JAN14
    } else if (panel == 'AddNewTransWithMultipleOpt') { // CONDITION ADDED FOR NEW TRANS PANEL @AUTHOR:SHRI13AUG20
        xmlhttp.open("POST", "include/php/omtatrndsb_new" + default_theme + ".php?firmId=" + firmId + "&day=" + day + "&month=" + month + "&year=" + year, true); //change in file @AUTHOR: SANDY02JAN14
    } else if (panel == 'updateTransaction') { // CONDITION ADDED FOR NEW TRANS PANEL UPDATE @AUTHOR:SHRI17AUG20
        xmlhttp.open("POST", "include/php/omtutrnd_new" + default_theme + ".php?firmId=" + firmId + "&day=" + day + "&month=" + month + "&year=" + year + "&transId=" + mainTransId, true); //change in file @AUTHOR: SANDY02JAN14
    } else {
        xmlhttp.open("POST", "include/php/omtatrndsb" + default_theme + ".php?firmId=" + firmId + "&day=" + day + "&month=" + month + "&year=" + year, true); //change in file @AUTHOR: SANDY02JAN14 
    }

    xmlhttp.send();
}
/* * **End to change code @AUTHOR: SANDY08FEB14***** */
/********End Code To Select FirmId In Transaction Panel @AUTHOR:PRIYA19MAR13**********/
/***********************Start Code To Delete Sell Purchase Item Details Div @AUTHOR:PRIYA22MAR13************/
function deleteSlPrItemDetails(slPrPreItemId, slPrItemId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("slPrItemDetailsDiv" + slPrPreItemId + slPrItemId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("slPrItemDetailsDiv" + slPrPreItemId + slPrItemId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/***********************Start Code To Delete Sell Purchase Item Details Div @AUTHOR:PRIYA22MAR13************/
/********Start Code To Add Function For Repair Table @AUthor:PRIYA10APR13******************/
function getRepairTableDiv() {
    confirm_box = confirm("Do you really want Repair Data Base?\n" + takeBackupAlertMsg); //add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == 'Success') {
                    document.getElementById("dataRepairButt").innerHTML = "<span class='textLabel20CalibriNormalGreen'>Database has been Repaired Successfully. &nbsp; डेटाबेस की सफलतापूर्वक मरम्मत की गई है!</span>";
                } else {
                    document.getElementById("dataRepairButt").innerHTML = "<span class='textLabel20CalibriNormalRed'>" + xmlhttp.responseText + "</span>";
                }
            } else {
                document.getElementById("dataRepairButt").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/ommptbrp" + default_theme + ".php", true);
        xmlhttp.send();
    }
}
/********end Code To Add Function For Repair Table @AUthor:PRIYA10APR13******************/
/*******Start Code To Search Stock By Amount Range @AUTHOR:PRIYA18APR13*********/
function valSearchStockByAmountRangeInputs(obj) {
    if (validateEmptyField(document.srch_stock_AmtRange.stockAmtStartRange.value, "Please enter start range!") == false) {
        document.srch_stock_AmtRange.stockAmtStartRange.focus();
        return false;
    } else if (validateEmptyField(document.srch_stock_AmtRange.stockAmtEndRange.value, "Please enter end range!") == false)
    {
        document.srch_stock_AmtRange.stockAmtEndRange.focus();
        return false;
    }
    return true;
}

function search_stock_by_amt_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchStockByAmtRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/**********Start code to change div @Author:PRIYA06FEB14*************/
function alertSearchStockByAmtRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "visible";
        document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "hidden";
    }
}
/**********End code to change div @Author:PRIYA06FEB14*************/
/*********Start Code To Add Metal Type In Jwellery Search Panel @AUTHOR:PRIYA28APR13*********/
//********************************************************************************************
// Start code to add for search by category @Author:PRIYANKA-10JULY18
//********************************************************************************************
function searchStockByAmountRange(obj, divPanel = '') {
    if (valSearchStockByAmountRangeInputs(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtEndRange.value)
                + "&itemName=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemName.value)
                + "&itemCat=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemCat.value)
                + "&stockItemMetal=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemMetal.value)
                + "&metalWt=" + encodeURIComponent(document.srch_stock_AmtRange.selectMetalWeight.value); //TO PASS METAL WEIGHT TYPE @AUTHOR: SANDY7AUG13
        if (divPanel == 'SellStock')
        {
            search_stock_by_amt_range('include/php/ogilistsold' + default_theme + '.php', poststr);
        } else {
            search_stock_by_amt_range('include/php/ogilistsd' + default_theme + '.php', poststr);
        }
}
}
/*********End Code To Add Metal Type In Jwellery Search Panel @AUTHOR:PRIYA28APR13*********/
//*******************************************************************************************
// End code to add for search by category @Author:PRIYANKA-10JULY18
//********************************************************************************************
function navigationStockListPanelByAmtRange(pageNo, startRange, endRange) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "visible";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/ogilimsd" + default_theme + ".php?page=" + pageNo + "&startRange=" + startRange + "&endRange=" + endRange, true);
    xmlhttp.send();
}
/*******End Code To Search Stock By Amount Range @AUTHOR:PRIYA18APR13*********/
/*********Start Code To Hide Function To Search Stock List By Amount Range @AUTHOR:PRIYA04MAY13*********/
/*******Start Code To Search Stock List By Amount Range @AUTHOR:PRIYA20APR13*********/
/*function valSearchStockListByAmountRangeInputs(obj) {
 if (document.srch_stock_list_AmtRange.stockListAmtStartRange.value != "" && validateEmptyField(document.srch_stock_list_AmtRange.stockListAmtStartRange.value,"Please enter start range!") == false) {
 document.srch_stock_list_AmtRange.stockListAmtStartRange.focus();
 return false;
 }
 else if (document.srch_stock_list_AmtRange.stockListAmtEndRange.value != "" && validateEmptyField(document.srch_stock_list_AmtRange.stockListAmtEndRange.value,"Please enter end range!") == false ||
 validateNum(document.srch_stock_list_AmtRange.stockListAmtEndRange.value,"Accept only Numbers without space character!") == false) {
 document.srch_stock_list_AmtRange.stockListAmtEndRange.focus();
 return false;
 }
 else if (document.srch_stock_list_AmtRange.stockListAmtEndRange.value != "" && validateEmptyField(document.srch_stock_list_AmtRange.stockListAmtEndRange.value,"Please enter end range!") == false
 ) {
 document.srch_stock_list_AmtRange.stockListAmtEndRange.focus();
 return false;
 }
 return true;
 }
 function search_stock_list_by_amt_range(url, parameters) {
 loadXMLDoc();
 
 xmlhttp.onreadystatechange = alertSearchStockListByAmtRange;
 
 xmlhttp.open('POST', url, true);
 xmlhttp.setRequestHeader('Content-Type',
 'application/x-www-form-urlencoded');
 xmlhttp.setRequestHeader("Content-length", parameters.length);
 xmlhttp.setRequestHeader("Connection", "close");
 xmlhttp.send(parameters);
 }
 
 function alertSearchStockListByAmtRange() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
 document.getElementById("stockListByAmtRangeGoButt").style.visibility = "visible";
 document.getElementById("stockList").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
 document.getElementById("stockListByAmtRangeGoButt").style.visibility = "hidden";
 }
 }	
 function searchStockListByAmountRange(obj) {
 if(valSearchStockListByAmountRangeInputs(obj)){
 var poststr = "startRange=" + encodeURIComponent(document.srch_stock_list_AmtRange.stockListAmtStartRange.value)
 + "&endRange=" + encodeURIComponent(document.srch_stock_list_AmtRange.stockListAmtEndRange.value)
 + "&stockListSearchAdjust=" + encodeURIComponent(document.srch_stock_list_AmtRange.stockListSearchAdjustment.value)
 + "&itemName=" + encodeURIComponent(document.srch_stock_list_AmtRange.stockListItemName.value);
 
 search_stock_list_by_amt_range('include/php/ogialtsi' + default_theme +'.php', poststr);
 }
 }*/
/*********End Code To Hide Function To Search Stock List By Amount Range @AUTHOR:PRIYA04MAY13*********/
function navigationStockListPanelByAmtRange(pageNo, startRange, endRange) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "visible";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/ogilimsd" + default_theme + ".php?page=" + pageNo + "&startRange=" + startRange + "&endRange=" + endRange, true);
    xmlhttp.send();
}
/*******End Code To Search Stock List By Amount Range @AUTHOR:PRIYA20APR13*********/

/*function searchStockListByGrossWeight(obj) {
 loadXMLDoc();
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
 document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "visible";
 document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
 document.getElementById("ajaxLoadNextItemsListButt").style.visibility = "hidden";
 }
 };
 
 xmlhttp.open("POST", "include/php/ogilimsd" + default_theme +".php?page=" + pageNo + "&startRange=" + startRange + "&endRange=" + endRange, true);
 xmlhttp.send();
 }*/
/***********Start Code To Add Navigation Function For Prev And Next Button In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start Code To Add CustInterest @AUTHOR:PRIYA02MAY13*****************/
function navigationCustDetails(pageNo, sNo, selFirmId, sortKeyword, selCustInterest) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccdtlt" + default_theme + ".php?page=" + pageNo + "&sNo=" + sNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&selCustInterest=" + selCustInterest, true);
    xmlhttp.send();
}
/***********End Code To Add CustInterest @AUTHOR:PRIYA02MAY13*****************/
/***********End Code To Add Navigation Function For Prev And Next Button In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start Code For Sorting In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start code to add param @Author:PRIYA20JUN14**********************/
/***********Start code to add parameters @OMMODTAG PRIYA_22MAY15**********/
function sortCustomerDetailsPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, staffId, custInterest) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omccdtlt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&searchStaffId=" + staffId + "&custInterest=" + custInterest, true);
    xmlhttp.send();
}
/***********End code to add parameters @OMMODTAG PRIYA_22MAY15**********/
/***********End code to add param @Author:PRIYA20JUN14**********************/
/***********End Code For Sorting In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start Code For Sorting By Firm Name In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start code to add parameters @OMMODTAG PRIYA_22MAY15**********/
function getCustDetailsByFrmId(staffId, selFirmId, sortKeyword, searchColumnName, searchColumnValue, rowsPerPage, panel, custInterest) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccdtlt" + default_theme + ".php?searchStaffId=" + staffId + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword
            + "&searchColumn=" + searchColumnName + "&searchValue=" + searchColumnValue + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel + "&custInterest=" + custInterest, true);
    xmlhttp.send();
}
/***********End Code For Sorting By Firm Name In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
/***********Start Code To Add Comment In Cust Details Panel @AUTHOR:PRIYA25APR13*************/
/***********Start Code To Add pageNo and firmId @AUTHOR:PRIYA02MAY13*************/
function addCustomerComments(documentRootPath, custCommentSubject, custCommentDesc, custId, panelName, pageNo, firmId, sortKeyword, searchColumn, searchValue, sNo, panel) {

    if (custCommentSubject == '') {
        alert("Please Enter Comment Subject!");
        document.getElementById("custCommentSubject" + custId).focus(); //added @OMMODTAG PRIYA_22MAY15
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omcacomm" + default_theme + ".php?custCommentSubject= " + custCommentSubject + "&custCommentDesc=" + custCommentDesc + "&customerId=" + custId +
                "&panelName=" + panelName + "&page=" + pageNo + "&firmId=" + firmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn +
                "&searchValue=" + searchValue + "&sNo=" + sNo + "&panel=" + panel, true);
        xmlhttp.send();
    }
    /***********End Code To Add pageNo and firmId @AUTHOR:PRIYA02MAY13*************/
}/***********End Code To Add Comment In Cust Details Panel @AUTHOR:PRIYA25APR13*************/

/******************Start Code To Navigate to Cust Info In Cust Details Panel @AUTHOR:PRIYA24APR13*************/
/************Start code to add panel @Author:PRIYA24JUN14*************/
function showCustInfoDiv(documentRootPath, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panel=UpdateCust", true);
    xmlhttp.send();
}
/************End code to add panel @Author:PRIYA24JUN14*************/
/******************End Code To Navigate to Cust Info In Cust Details Panel @AUTHOR:PRIYA24APR13*************/

/******************Start Code To Navigate to Cust Details Panel @AUTHOR:PRIYA24APR13*************/
function showCustomerDetails() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccdtlt" + default_theme + ".php", true);
    xmlhttp.send();
}
/******************End Code To Navigate to Cust Details Panel @AUTHOR:PRIYA24APR13*************/

/***********Start Code To Get Customer Comments Div In Cust Details Panel @AUTHOR:PRIYA25APR13************/
/***********Start Code To Add PageNo and firmId @AUTHOR:PRIYA02MAY13************/
/***********Start code to change div @Author:PRIYA23JUN14********************/
function getCustomerCommentsDiv(custId, selFirmId, pageNo, sortKeyword, searchColumn, searchValue, sNo, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("custComments" + custId).innerHTML = xmlhttp.responseText;
            document.getElementById("custCommentSubject" + custId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcccdcm" + default_theme + ".php?custId=" + custId + "&pageNo=" + pageNo + "&selFirmId=" + selFirmId +
            "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&sNo=" + sNo + "&panel=" + panel, true);
    xmlhttp.send();
}
/***********End code to change div @Author:PRIYA23JUN14********************/
/***********End Code To Add PageNo and firmId @AUTHOR:PRIYA02MAY13************/
/***********End Code To Get Customer Comments Div In Cust Details Panel @AUTHOR:PRIYA25APR13************/
/***********Start Code To Update Mobile No In Cust Details Panel @AUTHOR:PRIYA27APR13**********/
var custMobId;
var custMobNo;
var custOldMobNo;
function validateAddCustDetailsMobileNoInputs(custMobNo) {
    if (validateEmptyField(custMobNo, "Please Enter Mobile Number!") == false ||
            ((validateNum(custMobNo, "Accept only Numbers without space character!") == false ||
                    validateLength10(custMobNo, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById(custMobId).value = 'Not Updated';
        window.setTimeout(closeAddCustDetailsMobileNoMessNotUpd, 1000);
    } else {
        return true;
    }
    function closeAddCustDetailsMobileNoMessNotUpd()
    {
        document.getElementById(custMobId).value = custOldMobNo;
        document.getElementById(custMobId).focus();
        return false;
    }
}
function add_custDetails_mobile_no(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCustDetailsMobileNo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddCustDetailsMobileNo() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'Updated') {
            document.getElementById(custMobId).value = 'Updated';
            window.setTimeout(closeAddCustDetailsMobileNoMess, 1000);
        } else {
            document.getElementById(custMobId).value = 'Not Updated';
            window.setTimeout(closeAddCustDetailsMobileNoMess, 1000);
        }
    } else {
        document.getElementById(custMobId).value = 'Not Updated';
        window.setTimeout(closeAddCustDetailsMobileNoMess, 1000);
    }
    function closeAddCustDetailsMobileNoMess()
    {
        document.getElementById(custMobId).value = custMobNo;
    }
}
/************Start Code To Add Panel Name @Author:PRIYA19AUG13*********/
function addCustDetailsMobileNo(mobNo, oldMobNo, custId, panelName) {

    custMobId = 'custDetailsMobileNo' + custId;
    custMobNo = mobNo;
    custOldMobNo = oldMobNo;
    if (validateAddCustDetailsMobileNoInputs(custMobNo)) {
        var poststr = "mobNo=" + encodeURIComponent(mobNo)
                + "&custId=" + encodeURIComponent(custId)
                + "&mobUpPanel=" + encodeURIComponent(panelName);
        add_custDetails_mobile_no('include/php/omccdtmb' + default_theme + '.php', poststr);
    }
}
/************End Code To Add Panel Name @Author:PRIYA19AUG13*********/
/***********End Code To Update Mobile No In Cust Details Panel @AUTHOR:PRIYA27APR13**********/
/***********Start Code To Update City In Cust Details Panel @AUTHOR:PRIYA27APR13**********/
var custCityId;
var custCity;
var custOldCity;
function validateAddCustDetailsCityInputs(custCity) {

    if (validateEmptyField(custCity, "Please Enter City!") == false) {
        document.getElementById(custCityId).value = 'Not Updated';
        window.setTimeout(closeAddCustDetailsCityMessNotUpd, 1000);
    } else {
        return true;
    }
    function closeAddCustDetailsCityMessNotUpd()
    {
        document.getElementById(custCityId).value = custOldCity;
        document.getElementById(custCityId).focus();
        return false;
    }
}
function add_custDetails_city(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCustDetailsCity;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddCustDetailsCity() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'Updated') {
            document.getElementById(custCityId).value = 'Updated';
            window.setTimeout(closeAddCustDetailsCityMess, 1000);
        } else {
            document.getElementById(custCityId).value = 'Not Updated';
            window.setTimeout(closeAddCustDetailsCityMess, 1000);
        }
    } else {
        document.getElementById(custCityId).value = 'Not Updated';
        window.setTimeout(closeAddCustDetailsCityMess, 1000);
    }
    function closeAddCustDetailsCityMess()
    {
        document.getElementById(custCityId).value = custCity;
    }
}
function addCustDetailsCity(city, oldCity, custId) {
    custCityId = 'custDetailsCity' + custId;
    custCity = city;
    custOldCity = oldCity;
    if (validateAddCustDetailsCityInputs(custCity)) {
        var poststr = "city=" + encodeURIComponent(city)
                + "&custId=" + encodeURIComponent(custId);
        add_custDetails_city('include/php/omccdtct' + default_theme + '.php', poststr);
    }
}
/***********End Code To Update City In Cust Details Panel @AUTHOR:PRIYA27APR13**********/
/***********Start Code To Update Cust Interest In Cust Details Panel @AUTHOR:PRIYA27APR13*************/
var custInterestListDivid;
var custInterestDiv;
var custInt;
function add_custDetails_custInterest(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCustDetailsCustInterest;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddCustDetailsCustInterest() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById('custInterestListDivToAddInterest' + custInterestListDivid).innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('custInterestListDiv' + custInterestListDivid).focus();
            document.getElementById('custInterestListDiv' + custInterestListDivid).options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function addCustDetailsCustInterest(custInterest, custId, keyCodeInput) {

    keyCode = keyCodeInput;
    custInterestListDivid = custId;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "custInterest=" + encodeURIComponent(custInterest)
            + "&custId=" + encodeURIComponent(custInterestListDivid);
    add_custDetails_custInterest('include/php/omccdtin' + default_theme + '.php', poststr);
}

function clearSearchCustInterestPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('custInterestListDivToAddInterest' + custInterestListDivid).innerHTML = xmlhttp.responseText;
            //document.getElementById('custDetailsCustInterest' + ).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}

function update_custDetails_custInterest(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateCustDetailsCustInterest;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertUpdateCustDetailsCustInterest() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById(custInterestDiv).value = custInt;
        clearSearchCustInterestPanel();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*********Start code to change custId @Author:PRIYA26JUL14************/
function updateCustInterest(custInterest, custId, pageNo) {
    custInterestDiv = 'custDetailsCustInterest' + custId;
    custInterest = custInterest.substr(0, 5); //line added @Author:PRIYA23JUN14
    custInt = custInterest;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    custInterestListDivid = custId;
    var poststr = "custInterest=" + encodeURIComponent(custInterest)
            + "&custId=" + encodeURIComponent(custId)
            + "&pageNo=" + encodeURIComponent(pageNo);
    update_custDetails_custInterest('include/php/omccdtad' + default_theme + '.php', poststr);
}
/*********End code to change custId @Author:PRIYA26JUL14************/
/***********End Code To Update Cust Interest In Cust Details Panel @AUTHOR:PRIYA27APR13*************/
/*********Start Code To Close Cust Comment Div @AUTHOR:PRIYA27APR13*******/
function commentCloseButton(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("custComments" + custId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("custComments" + custId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*********End Code To Close Cust Comment Div @AUTHOR:PRIYA27APR13*******/
/**************Start Code To Show Supp Purchase Details @AUTHOR:PRIYA28APR13************/
/**************Start of changes in function to show purchase details of raw metal@AUTHOR: SANDY29SEP13*****************/
//function showSuppPurchaseDetails(newPreInvoiceNo, newInvoiceNo, panel) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    if (panel == 'RawMetal') {
//        xmlhttp.open("POST", "include/php/ogrwprdt" + default_theme +".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo, true);
//    } else {
//        xmlhttp.open("POST", "include/php/ogwhprdt" + default_theme +".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo, true);
//    }
//    xmlhttp.send();
//}
/**************End of changes in function to show purchase details of raw metal@AUTHOR: SANDY29SEP13*****************/
/**************End Code To Show Supp Purchase Details @AUTHOR:PRIYA28APR13************/
/*********Start Code To Navigate to Supp Home In Daily Diary Panel @AUTHOR:PRIYA01MAY13**********/
/***************Start code to add parameters @Author:PRIYA03JUN14*********/
//function search_supp_by_suppId(url, parameters) {
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = alertSearchSuppBySuppId;
//
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//
//function alertSearchSuppBySuppId() {
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
//        //refreshMainRightDiv();
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//}

//---------------------------------- End code for change data from Supplier table to user table Author@:SANT16MAY16---------------------------------------------------------------->                                                      
//---------------------------------- End code for change data from Supplier table to user table Author@:SANT23MAY16---------------------------------------------------------------->                                                      
function showSuppInfo(prSuppId, newPreInvoiceNo, newInvoiceNo, panel, isinOthrChgsBy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwhmndv" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&suppId=" + prSuppId + "&suppPanelOption=" + panel + "&isinOthrChgsBy=" + isinOthrChgsBy, true);
    xmlhttp.send();
}
//---------------------------------- End code for change data from Supplier table to user table Author@:SANT23MAY16---------------------------------------------------------------->                                                      
//---------------------------------- End code for change data from Supplier table to user table Author@:SANT16MAY16---------------------------------------------------------------->                                                      
/***************End code to add parameters @Author:PRIYA03JUN14*********/
/*********End Code To Navigate to Supp Home In Daily Diary Panel @AUTHOR:PRIYA01MAY13**********/
/*******Start Code To Show Purchase Details In Daily Diary Panel @AUTHOR:PRIYA01MAY13********/
/*******Start code to add panel @Author:PRIYA23OCT13****************/
/*******Start code to change function name @Author:PRIYA11DEC13****************/
/*******Start code to add panel @Author:PRIYA04JUN14****************/
function showDailyDiaryDetails(documentRootPath, tableId, divId, panelDDDetClick, firmId, fromDate, toDate, transFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divId + tableId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divId + tableId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    var poststr = "tableId=" + tableId +
            "&panelDDDetClick=" + panelDDDetClick + "&firmId=" + firmId +
            "&fromDate=" + fromDate + "&toDate=" + toDate + "&transFirmId=" + transFirmId;
    if (divId == 'purchaseDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddprdv" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'rawPurchaseDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddrwdv" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'sellDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddsldv" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'invoiceDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddprdv_1" + default_theme + ".php?" + poststr, true); //filename added for invoice details @Author:SANT01DEC16
    } else if (divId == 'newOrderDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddnodv" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'custOldItemSellDetailsDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogddcpdv" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'transLoanDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omddtgrl" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'loanDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omddrgld" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'loanPrinDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omddrapl" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'loanMDepDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omddgdld" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'transDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omddbtld" + default_theme + ".php?" + poststr, true);
    } else if (divId == 'mLLoanMDepDetDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/orddmldp" + default_theme + ".php?" + poststr, true); //change in filename @AUTHOR: SANDY13DEC13 //filename changed @Author:PRIYA27JAN14
    } else if (divId == 'mlLoanRelDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/orddmlrl" + default_theme + ".php?" + poststr, true); //change in filename @AUTHOR: SANDY13DEC13  //filename changed @Author:PRIYA27JAN14
    }
    xmlhttp.send();
}
/*******End code to add panel @Author:PRIYA04JUN14****************/
/*******End code to change function name @Author:PRIYA11DEC13****************/
/*******End code to add panel @Author:PRIYA23OCT13****************/
/*******End Code To Show Purchase Details In Daily Diary Panel @AUTHOR:PRIYA01MAY13********/
/*******Start Code To Delete Purchase Details @AUTHOR:PRIYA01MAY13***********/
/*******Start Code To add panel @Author:PRIYA24OCT13***********/
function closeDDDet(tableId, divId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divId + tableId).innerHTML = xmlhttp.responseText;
            //document.getElementById("delDDDet").style.visibility = "hidden";
        } else {
            document.getElementById(divId + tableId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*******End Code To add panel @Author:PRIYA24OCT13***********/
/*******End Code To Delete Purchase Details @AUTHOR:PRIYA01MAY13***********/

/*********Start Code To Navigate to Cust Home In Daily Diary Panel @AUTHOR:PRIYA01MAY13**********/
function search_cust_by_custId(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustByCustId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCustByCustId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function showCustInfo(slCustId) {

    poststr = "custId=" + encodeURIComponent(slCustId);
    search_cust_by_custId('include/php/omcdcshm' + default_theme + '.php', poststr);
}
function showCustPanel(custId, custPanelOption, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption + "&panelDivName=SellPurchase" + "&mainPanel=" + mainPanel,
            true); // parameters changed redirect to sold out list @Author:SHRI17NOV16
    xmlhttp.send();
}
/*********End Code To Navigate to Cust Home In Daily Diary Panel @AUTHOR:PRIYA01MAY13**********/

/*******Start Code To Show Sell Details In Daily Diary Panel @AUTHOR:PRIYA01MAY13********/
function showDailyDiarySellDetails(documentRootPath, invId) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('sellDetailsDiv' + invId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById('sellDetailsDiv' + invId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogddsldt" + default_theme + ".php?invId=" + invId, true);
    xmlhttp.send();
}
/*******End Code To Show Sell Details In Daily Diary Panel @AUTHOR:PRIYA01MAY13********/

/*******Start Code To Delete Purchase Details @AUTHOR:PRIYA01MAY13***********/
function closeSellDetails(invId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("sellDetailsDiv" + invId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("sellDetailsDiv" + invId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*******End Code To Delete Purchase Details @AUTHOR:PRIYA01MAY13***********/

/***********Start Code For Sorting By Firm Name In Cust Details Panel @AUTHOR:PRIYA23APR13*************/
function getCustDetailsByCustInterest(selCustInterest, selFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccdtlt" + default_theme + ".php?selCustInterest=" + selCustInterest + "&selFirmId=" + selFirmId, true);
    xmlhttp.send();
}
/***********End Code For Sorting By Firm Name In Cust Details Panel @AUTHOR:PRIYA23APR13*************/

/********************* Start Code To Show Transferred Girvi List @AUTHOR:PRIYA22MAY13****************************/
/***********Start code to add panel for un-release trans list @Author:PRIYA12DEC14*********************/
function showTransGirviListPanel(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    if (panel == 'UnRelTransLoanList')
        xmlhttp.open("POST", "include/php/orgptgrl" + default_theme + ".php", true);
    else
        xmlhttp.open("POST", "include/php/orgptrgl" + default_theme + ".php", true);
    xmlhttp.send();
}
/***********End code to add panel for un-release trans list @Author:PRIYA12DEC14*********************/
//
/***********Start code to add panel for un-release trans list Author:DIKSHA 09MAY2019*********************/
function showTransGirviListPanelInt(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    if (panel == 'UnRelTransLoanList')
        xmlhttp.open("POST", "include/php/orgptgrlint" + default_theme + ".php", true);
    else
        xmlhttp.open("POST", "include/php/orgptgrlint" + default_theme + ".php", true);
    xmlhttp.send();
}
/***********End code to add panel for un-release trans list Author:DIKSHA 09MAY2019*********************/
//
/*********************End Code To Show Transferred Girvi List @AUTHOR:PRIYA22MAY13****************************/
/*********************Start Code To Sort Girvi Transfer Panel By SortKeyword @AUTHOR:PRIYA22MAY13****************************/
/*********************Start Code To Add gTrans Firm Id @Author:PRIYA20JUL13********************/
/************Start code to add ml name @Author:PRIYA12FEB14***************/
function sortGirviTransferPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, selTFirmId, gTransStatus, selMlName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgptrgl" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
/************End code to add ml name @Author:PRIYA12FEB14***************/
/*********************End Code To Add gTrans Firm Id @Author:PRIYA20JUL13********************/
/*********************End Code To Sort Girvi Transfer Panel By SortKeyword @AUTHOR:PRIYA22MAY13****************************/
/*********************Start Code To Navigate To Next And Prev Button In Girvi Transfer Panel @AUTHOR:PRIYA22MAY13****************************/
/************Start Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
function navigationTransferredGirviListPanel(pageNo, selFirmId, sortKeyword, rowsPerPage, searchColumn, searchValue, selTFirmId, gTransStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/orgptrgl" + default_theme + ".php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&searchColumn=" + searchColumn +
            "&searchValue=" + searchValue + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus, true);
    xmlhttp.send();
}
/************End Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
/*********************End Code To Navigate To Next And Prev Button In Girvi Transfer Panel @AUTHOR:PRIYA22MAY13****************************/
/*************Start Code To Add Stock In Supplier Panel @AUTHOR:PRIYA24MAY13******************/
function showSuppHomeAddStockPanel(documentRootPath, suppId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppAddStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogwhiadv" + default_theme + ".php?suppId=" + suppId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*************End Code To Add Stock In Supplier Panel @AUTHOR:PRIYA24MAY13******************/

/*******************Start Code To Add Supp Update Stock Div @AUTHOR:PRIYA27OCT13******************/
/*******************Start code to add panel @Author:PRIYA18SEP14*********/
/*******************Start code to add panel @Author:SANT15JUL16*********/
/*******************Start code to add panel @Author:SANT03SEP16*********/
function showSuppStockUpdateDiv(documentRootPath, suppNwOrId, suppId, preInvNo, postInvNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'SuppOrderUp')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwhiadv" + default_theme + ".php?suppNwOrId=" + suppNwOrId + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo
                + "&panelName=" + panelName + "&payPanelName=" + panelName, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwhiadv" + default_theme + ".php?suppNwOrId=" + suppNwOrId + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo
                + "&panelName=" + panelName + "&payPanelName=" + panelName, true);
    xmlhttp.send();
}
/*******************End code to add panel @Author:SANT03SEP16*********/
/*******************End code to add panel @Author:SANT15JUL16*********/
/*******************End code to add panel @Author:PRIYA18SEP14*********/
/*******************End Code To Add Supp Update Stock Div @AUTHOR:PRIYA27OCT13******************/
/********************Start Code For omgold Ledger Book @AUTHOR:PRIYA09JUNE13**************/
/********************Start Code To change Div Name In omgold Ledger Book @AUTHOR:PRIYA10JUNE13**************/
/********************Start Code To Change File and Function Name @AUTHOR:PRIYA18JUNE13*********************/
function getGoldLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbgdbs" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Code To Change File and Function Name @AUTHOR:PRIYA18JUNE13*********************/
/********************End Code To change Div Name In omgold Ledger Book @AUTHOR:PRIYA10JUNE13**************/
/********************End Code For omgold Ledger Book @AUTHOR:PRIYA09JUNE13****************/
/********************Start Code For omrevo Ledger Book @AUTHOR:PRIYA09JUNE13**************/
/********************Start Code To change Div Name In omrevo Ledger Book @AUTHOR:PRIYA10JUNE13**************/
/********************Start code to add param @Author:PRIYA18FEB14*********************/
/********************Start code to add panel name @Author:PRIYA31MAR14*********************/
/********************Start code to add panel name @Author:SANT09NOV16*********************/
function getOmrevoLedgerBook(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'loan')
        xmlhttp.open("GET", "include/php/orbbblsh" + default_theme + ".php", true);
    else if (panelName == 'loanInt')
        xmlhttp.open("GET", "include/php/orbbinbs" + default_theme + ".php", true);
    else if (panelName == 'userTransaction')
        xmlhttp.open("GET", "include/php/ombbblsh_1" + default_theme + ".php", true);   // change file name prefix or=> om @ratnakar 01MAR2018
    else if (panelName == 'completeLedger')
        xmlhttp.open("GET", "include/php/ombbcmbs" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End code to add panel name @Author:SANT09NOV16*********************/
/********************End code to add panel name @Author:PRIYA31MAR14*********************/
/********************End Code To change Div Name In omrevo Ledger Book @AUTHOR:PRIYA10JUNE13**************/
/********************End Code For omrevo Ledger Book @AUTHOR:PRIYA09JUNE13****************/
/********************Start Code To Add function For Silver Stock @AUTHOR:PRIYA18JUNE13*********************/
function getSilverLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbslbs" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Code To Add function For Silver Stock @AUTHOR:PRIYA18JUNE13*********************/
//
//
//
// ADDED NEW FUNCTION FOR RAW METAL GOLD STOCK @Author:PRIYANKA-30AUG2021
function getRawMetalLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbrwbs" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
// ADDED NEW FUNCTIO FOR RAW METAL SILVER STOCK @Author:PRIYANKA-30AUG2021
function getRawMetalSilverLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbrwslbs" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
//
//
/********************Start Code To Get Udhaar Ledger Book @AUTHOR:PRIYA21JUNE13****************/
/********************Start Code To Change File Name @Author:PRIYA13AUG13****************/
function getUdhaarLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ombbuubs" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Code To Change File Name @Author:PRIYA13AUG13****************/
/********************End Code To Get Udhaar Ledger Book @AUTHOR:PRIYA21JUNE13****************/
/********************Start Code To Get Layout Panel @AUTHOR:PRIYA24JUNE13**************/
function navigateLayoutPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ompplypn" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Code To Get Layout Panel @AUTHOR:PRIYA24JUNE13**************/
/********************Start Code To Get Email Panel @AUTHOR:ASHWINI PATIL 28MAY2020**************/
function navigateEmailPanelfromSMS() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommpmail" + default_theme + ".php", true);
    xmlhttp.send();
}

function navigateEmailPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommpmail" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************Start Email Code To Get Email Panel @AUTHOR:ASHWINI PATIL 1june2020**************/
function navigateSendEmail() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommpsendmail" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Email Code To Get Email Panel @AUTHOR:ASHWINI PATIL 1june2020**************/
/********************Start Code To Refresh Image In Transfer Girvi @AUTHOR:PRIYA27JUNE13********/
/********************Start Code To Change Div In Transfer Girvi @Author:PRIYA29JUN13********/
function refresh_trans_girvi(url, parameters) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertRefreshTransGirvi;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.send(parameters);
}
function alertRefreshTransGirvi() {

    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transGirviDiv").innerHTML = xmlhttp2.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function refreshTransGirvi(girviId, girviTransId) {
    var poststr = "girviId=" + girviId
            + "&girviTransId=" + girviTransId;
    refresh_trans_girvi('include/php/olgggtrn' + default_theme + '.php', poststr); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
}
/********************End Code To Change Div In Transfer Girvi @Author:PRIYA29JUN13********/
/********************End Code To Refresh Image In Transfer Girvi @AUTHOR:PRIYA27JUNE13********/
/*********** Start code to find analysis report from month and year @AUTHOR: SANDY2JUL13 *****/
/*********** Start code to condition MaxSellAnalysisPanel @AUTHOR: GAUR2AUG16 *****/
function showAnalysisReportByDate(panelName, firmId, mmm, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == "InterestAnalysisPanel")
            {
                document.getElementById("girvAnaMonthIntGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "NewLoanAnalysis")
            {
                document.getElementById("girvAnaMonthLoansGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "PurchaseAnalysisPanel")
            {
                document.getElementById("girvAnaMonthpurchaseGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "GirviReleasedAnalysisPanel")
            {
                document.getElementById("girvAnaMonthReleasedGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "SellAnalysisPanel")
            {
                document.getElementById("girvAnaMonthSellGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "MaxSellAnalysisPanel")
            {
                document.getElementById("girvAnaMonthMaxSellGraphDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == "StockAnalysisPanel")
            {
                document.getElementById("girvAnaMonthStockGraphDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == "InterestAnalysisPanel") {
        xmlhttp.open("POST", "include/php/orgnsfid" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy, true);
    } else if (panelName == "NewLoanAnalysis") {
        xmlhttp.open("POST", "include/php/orgnsfnla" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy, true);
    } else if (panelName == "PurchaseAnalysisPanel") {
        var metal = document.getElementById('metalType').value;
        xmlhttp.open("POST", "include/php/omgnsfpad" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy + "&metal=" + metal, true);
    } else if (panelName == "GirviReleasedAnalysisPanel") {
        xmlhttp.open("POST", "include/php/orgnsfrla" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy, true);
    } else if (panelName == "SellAnalysisPanel")
    {
        var metal = document.getElementById('metalType').value;
        xmlhttp.open("POST", "include/php/omgnsfsad" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy + "&metal=" + metal, true);
    } else if (panelName == "MaxSellAnalysisPanel")
    {
        var metal = document.getElementById('metalType').value;
        xmlhttp.open("POST", "include/php/omgnsfmxd" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy + "&metal=" + metal, true);
    } else if (panelName == "StockAnalysisPanel")
    {
        var metal = document.getElementById('metalType').value;
        xmlhttp.open("POST", "include/php/omgnsfstd" + default_theme + ".php?firmId=" + firmId + "&month=" + mmm + "&year=" + yyyy + "&metal=" + metal, true);
    }
    xmlhttp.send();
}
/*********** END code to condition MaxSellAnalysisPanel @AUTHOR: GAUR2AUG16 *****/
/*********** End code to find analysis report from month and year @AUTHOR: SANDY2JUL13 *****/
/************Start Code To Add Sms Text on onchange of sms templates @Author:PRIYA03JUL13**********/
/************Start Code To Change Id @Author:PRIYA09JUL13**********/
/************Start Code To Add Func searchSmsTempForPanelBlank() @Author:PRIYA11JUL13**********/
function smsText(smsTempId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("smsTextDiv").innerHTML = xmlhttp.responseText;
            searchSmsTempForPanelBlank();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcsmstx" + default_theme + ".php?smsTempId=" + smsTempId, true);
    xmlhttp.send();
}
/************End Code To Add Func searchSmsTempForPanelBlank() @Author:PRIYA11JUL13**********/
/************End Code To Change Id @Author:PRIYA09JUL13**********/
/************Start Code To Add Sms Log Panel @Author:PRIYA08JUL13*********/
/************Start Code To Add Panel @Author:PRIYA19FEB14*********/
function smsLogPanel(panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'smsLog')
        xmlhttp.open("POST", "include/php/omcsmslg" + default_theme + ".php", true);
    else if (panelName == 'smsRejectList')
        xmlhttp.open("POST", "include/php/omcsmsrl" + default_theme + ".php", true);
    else if (panelName == 'smsTemplate')
        xmlhttp.open("POST", "include/php/omsmstmp" + default_theme + ".php", true);
    else if (panelName == 'smsPack')
        xmlhttp.open("POST", "include/php/omcssmpk" + default_theme + ".php", true);
    xmlhttp.send();
}
/************End Code To Add Sms Log Panel @Author:PRIYA19FEB14*********/
//
//************Start Code To Add function for show customer sms panel Author:DIKSHA 15FEB2019********/
function smsLogPanelCustomer(panelName, custId)
{
    //alert("hi");
    //alert(custId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcssmspu" + default_theme + ".php?panelName=" + panelName + "&custId=" + custId, true);
    xmlhttp.send();
}
//
//************End Code To Add function for show customer sms panel Author:DIKSHA 15FEB2019********/
//
/************Start Code To Add Prev and Next Butt For Sms Log Panel @Author:PRIYA08JUL13********/
/************Start Code To Add Panel Name In Sms Log Panel @Author:PRIYA10JUL13********/
function navigationSmsLogPanel(pageNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextSmsLogListButt").style.visibility = "visible";
            if (panelName == 'smsLog') {
                document.getElementById("smsLogDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("smsRejectListDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("ajaxLoadNextSmsLogListButt").style.visibility = "hidden";
        }
    };
    if (panelName == 'smsLog') {
        xmlhttp.open("POST", "include/php/omcsmslg" + default_theme + ".php?page=" + pageNo, true);
    } else {
        xmlhttp.open("POST", "include/php/omcsmsrl" + default_theme + ".php?page=" + pageNo, true);
    }
    xmlhttp.send();
}
/************End Code To Add Panel Name In Sms Log Panel @Author:PRIYA10JUL13********/
/************Start Code To Add Prev and Next Butt For Cust Sms Log Panel @Author:PRIYA09JUL13********/
/************Start Code To Change Func Name @Author:PRIYA10JUL13******************/
function navigationCustSmsLogPanel(pageNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadCustNextSmsLogList").style.visibility = "hidden";
            document.getElementById("ajaxLoadCustNextSmsLogListButt").style.visibility = "visible";
            document.getElementById("custSmsLogDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadCustNextSmsLogList").style.visibility = "visible";
            document.getElementById("ajaxLoadCustNextSmsLogListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omccsmlg" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true);
    xmlhttp.send();
}
/************End Code To Change Func Name @Author:PRIYA10JUL13*******************/
/************End Code To Add Prev and Next Butt For Cust Sms Log Panel @Author:PRIYA09JUL13********/
//**************************** Customer SMS Panel by @Author: LINA29MAY13 ******
/****************Start Code To Add Validations For Customer SMS Panel @AUTHOR:PRIYA07JUNE13*********************/
/*********Start Code To Change Validations @Author:PRIYA02JUL13**********/
/*********Start Code To Change Validations @Author:PRIYA08JUL13**********/
/*********Start Code To Change Validations @Author:PRIYA10JUL13*****************/
function validateMobNo() {
    if ((numericValidation(document.getElementById("mobileNo").value, "Accept only Numbers without space character!") == false ||
            validateLengthMobNo(document.getElementById("mobileNo").value, "Mobile number length should be minimum 10!") == false || validateComma(document.getElementById("mobileNo").value) == false)) {
        document.getElementById("mobileNo").focus();
        return false;
    }
    return true;
}
function numericValidation(field, alerttxt) {
    var numbers = /^[0-9,]+$/;
    if (!field.match(numbers)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
/*function validateComma(field){
 if(field.length != 0){
 document.getElementById("mobileNo").value = field + ',' ;
 return false; 
 }else{
 return true;
 }
 }*/
/***********Start Code To Add Validation For Template @Author:PRIYA19AUG13********/
function validateSms() {
    if (validateSelectField(document.getElementById("smsTemplates").value, "Please Select sms Template!") == false || validateLengthSms(document.getElementById("smsTemplates").value, "Template length should be maximum 1000!") == false) {
        document.getElementById("smsTemplates").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("smsText").value, "Please select sms Text!") == false || validateLengthSms(document.getElementById("smsText").value, "Mesaage length should be maximum 1000!") == false) {
        document.getElementById("smsText").focus();
        return false;
    }
    return true;
}
/***********End Code To Add Validation For Template @Author:PRIYA19AUG13********/
/*********Start Code To Hide Func because same Func exists in emValidate File @Author:PRIYA02JUL13**********/
/*function validateSmsInputs(){
 if(validateLengthSms(document.getElementById("smsText").value,"Mesaage length should be maximum 160!")==false) {
 document.getElementById("smsText").focus();
 return false;
 }
 return true;
 }*/
/*********End Code To Hide Func because same Func exists in emValidate File  @Author:PRIYA02JUL13**********/
function send_sms(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSendSms;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
smsSuccessCounter = 0;
smsFailCounter = 0;
function alertSendSms() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        //alert(xmlhttp.responseText);
        document.getElementById("smsMessDisplayDiv").innerHTML = xmlhttp.responseText; //change in div @AUTHOR: SANDY4DEC13
        //alert(xmlhttp.responseText.match(/NO_CREDIT/g));
        //
        if (xmlhttp.responseText.match(/NO_CREDIT/g) !== null)
            document.getElementById("smsMessDisplayDiv").innerHTML = "NO_CREDIT";
        else
            window.setTimeout(closeSmsSentDispDiv, 10);
    } else {
        //alert(xmlhttp.responseText);
        smsResult = xmlhttp.responseText;
        smsStatus = smsResult.substr(smsResult.length - 1);
        //smsCounter = smsResult.substring(1);

        /**********Start code to comment code @Author:PRIYA10FEB15**************************/
//        smsSuccessCounter = smsResult.match(/S/g).length;
//        smsFailCounter = smsResult.match(/F/g).length;
        /**********Start code to comment code @Author:PRIYA10FEB15**************************/

        /**********Start code to add code @Author:PRIYA10FEB15**************************/
        var smsSuccessCount = smsResult.match(/S/g);
        if (smsSuccessCount !== null) {
            smsSuccessCounter = smsSuccessCount.length;
        }
        var smsFailCount = smsResult.match(/F/g);
        if (smsFailCount !== null) {
            smsFailCounter = smsFailCount.length;
        }
        /**********End code to add code @Author:PRIYA10FEB15**************************/
        //if (smsStatus == 'S') {
        document.getElementById("smsSuccessCounterMainDiv").style.visibility = "visible";
        document.getElementById("smsCounterGreenDiv").innerHTML = smsSuccessCounter;
        //} else if (smsStatus == 'F') {
        document.getElementById("smsFailCounterMainDiv").style.visibility = "visible";
        document.getElementById("smsCounterRedDiv").innerHTML = smsFailCounter;
        //}
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
    function closeSmsSentDispDiv() {
        document.getElementById("smsMessDisplayDiv").innerHTML = "";
    }
}
/**********Start Code To Pass Ids From Sms Panel @Author:PRIYA29JUN13**************/
/*************Start Code To Change Ids @Author:PRIYA03JUL13****************/
/*************Start Code To Change Ids @Author:PRIYA04JUL13****************/
/*************Start Code To Add City @Author:PRIYA19AUG13******************/
/*************Start code to chnage fn to add multiple @Author:PRIYA17JUL14*************/
function sendSMS() {
    smsSuccessCounter = 0;
    smsFailCounter = 0;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("smsButt").style.visibility = "hidden";
    var smsOption = document.getElementsByName('smsOption');
    var smsOptionValue;
    var poststr;
    for (var i = 0; i < smsOption.length; i++) {
        if (smsOption[i].checked == true)
            smsOptionValue = smsOption[i].value;
    }
    var selectedArray = new Array();
    var selObj = document.getElementById('interestList');
    var count = 0;
    for (var i = 0; i < selObj.options.length; i++) {
        if (selObj.options[i].selected) {
            selectedArray[count] = selObj.options[i].value;
            count++;
        }
    }
    var intValue = selectedArray;
    //alert(smsOptionValue);
    if (validateSms()) {
        if (smsOptionValue == 'allUser') {
            poststr = "userType=" + encodeURIComponent(document.getElementById("userType").value)
                    + "&city=" + encodeURIComponent(document.getElementById("city").value)
                    + "&userGender=" + encodeURIComponent(document.getElementById("userGender").value)
                    + "&smsFirmId=" + encodeURIComponent(document.getElementById("smsFirmId").value)
                    + "&smsTemplates=" + encodeURIComponent(document.getElementById("smsTemplates").value)
                    + "&smsText=" + encodeURIComponent(document.getElementById("smsText").value)
                    + "&interestList=" + encodeURIComponent(intValue)
                    + "&allUsergroup=" + encodeURIComponent(document.getElementById("allUsergroup").value)  // @AUTHOR:Maruti 10Feb21 -->
                    + "&transactionType=" + encodeURIComponent(document.getElementById("transactionType").value)
                    + "&smsStaffId=" + encodeURIComponent(document.getElementById("smsStaffId").value); //staffId added @Author:PRIYA09FEB15
        } else if (smsOptionValue == 'mobileNo') {
            poststr = "mobileNo=" + encodeURIComponent(document.getElementById("mobileNo").value)
                    + "&smsTemplates=" + encodeURIComponent(document.getElementById("smsTemplates").value)
                    + "&smsText=" + encodeURIComponent(document.getElementById("smsText").value);
        } else if (smsOptionValue == 'SMSList') {
            poststr = "smsPerContList=" + encodeURIComponent(document.getElementById("smsPerContList").value)
                    + "&smsTemplates=" + encodeURIComponent(document.getElementById("smsTemplates").value)
                    + "&smsText=" + encodeURIComponent(document.getElementById("smsText").value);
        }
        //alert(poststr);
        send_sms('include/php/omcsmsad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("smsButt").style.visibility = "visible";
    }
}
/*************End code to chnage fn to add multiple @Author:PRIYA17JUL14*************/
/*************End Code To Add City @Author:PRIYA19AUG13******************/
/*********End Code To Change Validations @Author:PRIYA10JUL13*****************/
/*********End Code To Change Validations @Author:PRIYA08JUL13**********/
/*************Start Code To Change Ids @Author:PRIYA04JUL13****************/
/*********End Code To Change Ids @Author:PRIYA03JUL13****************/
/*********End Code To Change Validations @Author:PRIYA02JUL13**********/
/**********End Code To Pass Ids From Sms Panel @Author:PRIYA29JUN13**************/
/****************End Code To Add Validations For Customer SMS Panel @AUTHOR:PRIYA07JUNE13*********************/
/**********Start Code To Search Templates In sms Panel @Author:PRIYA10JUL13*********************/
var keyCode;
function search_template(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchTemplate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchTemplate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("tempListDiv").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('tempListSelectDiv').focus();
            document.getElementById('tempListSelectDiv').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchTemplate(tempSub, keyCodeInput) {
    keyCode = keyCodeInput;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "tempSub=" + encodeURIComponent(tempSub);
    search_template('include/php/omcsmstl' + default_theme + '.php', poststr);
}
//
function search_template(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSMSTemplate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchSMSTemplate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("tempListDiv").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('tempListSelectDiv').focus();
            document.getElementById('tempListSelectDiv').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchSMSTemplate(tempSub, keyCodeInput) {
    keyCode = keyCodeInput;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "tempSub=" + encodeURIComponent(tempSub);
    search_template('include/php/omsmsstp' + default_theme + '.php', poststr);
}
function search_otp_template(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSMSOTPTemplate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchSMSOTPTemplate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("otpTempListDiv").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('tempListSelectDiv').focus();
            document.getElementById('tempListSelectDiv').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchOTPSMSTemplate(tempSub, keyCodeInput) {
    keyCode = keyCodeInput;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "tempSub=" + encodeURIComponent(tempSub);
    search_otp_template('include/php/omsmsstpotp' + default_theme + '.php', poststr);
}
function search_Otp_Sms_Temp_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchOtpSmsTempForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchOtpSmsTempForPanelBlank() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("otpTempListDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchOTPSmsTempForPanelBlank() {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    search_Otp_Sms_Temp_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
/**********End Code To Search Templates In sms Panel @Author:PRIYA10JUL13*********************/
/**********Start Code To Search Temp For Panel Blank @Author:PRIYA10JUL13************/
function search_Sms_Temp_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSmsTempForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchSmsTempForPanelBlank() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("tempListDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchSmsTempForPanelBlank() {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    search_Sms_Temp_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
/**********End Code To Search Temp For Panel Blank @Author:PRIYA10JUL13************/
/************Start Code To Get Sms Reject List @Author:PRIYA10JUL13*********/
/************Start code to comment @Author:PRIYA19FEB14************/
//function smsRejectList()
//{
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
//        }
//        else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//
//    xmlhttp.open("POST", "include/php/omcsmsrl" + default_theme +".php", true);
//    xmlhttp.send();
//}
/************End code to comment @Author:PRIYA19FEB14************/
/************End Code To Get Sms Reject List @Author:PRIYA10JUL13*********/
/************Start Code To Get Selected No Of Rows @Author:PRIYA15JUL13********/
/************Start Code To Delete Function @Author:PRIYA16JUL13********/
/*function selectNoOfRows(rowsPerPage){
 loadXMLDoc();
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {alert(rowsPerPage);
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("girvNoOfRows").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 }
 };
 
 xmlhttp.open("POST", "include/php/orggnorw" + default_theme +".php?rowsPerPage=" + rowsPerPage, true);
 xmlhttp.send();
 }*/
/************End Code To Delete Function @Author:PRIYA16JUL13********/
/************Start Code To Resend sms @Author:PRIYA16JUL13********/
/************Start Code To Add Panel Name @Author:PRIYA18JUL13********/
function resendSms(smsId, mobNo, smsText, panelName) {
    confirm_box = confirm("Do you really want to Resend sms!");
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (panelName == 'resendSms') {
                    document.getElementById("smsRejectListDiv").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'custResendSms') {
                    document.getElementById("custSmsLogDiv").innerHTML = xmlhttp.responseText;
                }
                window.setTimeout(closeSmsDispMessDiv, 1500);
            } else {
                document.getElementById("smsRejectListDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/omcsmsad" + default_theme + ".php?smsId=" + smsId + "&mobNo=" + mobNo + "&smsText=" + smsText + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
    function closeSmsDispMessDiv() {
        document.getElementById("smsDelMessDisplayDiv").innerHTML = "";
    }
}
/************End Code To Add Panel Name @Author:PRIYA18JUL13********/
/************End Code To Resend sms @Author:PRIYA16JUL13********/
/***********************Start Code To Get Girvi Trans Status @Author:PRIYA20JUL13*****************/
function getGTransStatus(gTransStatus, sortKeyword, searchColumnName, searchColumnValue, selTFirmId, mlName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptrgl" + default_theme + ".php?gTransStatus=" + gTransStatus.value + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumnName +
            "&searchValue=" + searchColumnValue + "&selTFirmId=" + selTFirmId + "&selMlName=" + mlName, true);
    xmlhttp.send();
}
/***********************End Code To Get Girvi Trans Status @Author:PRIYA20JUL13*****************/
/*************Start Code To Get Ledger Details @Author:PRIYA23JUL13****************/
function getLedgerDetails() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviLedgerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbgldv" + default_theme + ".php", true);
    xmlhttp.send();
}
/*************End Code To Get Ledger Details @Author:PRIYA23JUL13****************/
/*************Start Code To Get Ledger Details @Author:PRIYA23JUL13****************/
function getLedgerDetailsReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviLedgerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbglrpdv" + default_theme + ".php", true);
    xmlhttp.send();
}
/*************End Code To Get Ledger Details @Author:PRIYA23JUL13****************/
/*************Start Code To Get Ledger Details @Author:PRIYA23JUL13****************/
function getLedgerReleasedDetailsReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviLedgerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbglrploandv" + default_theme + ".php", true);
    xmlhttp.send();
}
/*************End Code To Get Ledger Details @Author:PRIYA23JUL13****************/

/*************Start Code To Change Div @Author:PRIYA25JUL13************/
//- Start of Modified Code(Complete file modified) @AUTHOR: SANT19MAY16 -->
//
function getAllEmpAcess(staffId, panelName) {
    //
    var empAllAccess = document.getElementById('selectEmpAllAccess').checked;
    //
    //alert('empAllAccess == ' + empAllAccess);
    //alert('selectEmpAllAccess == ' + document.getElementById('selectEmpAllAccess').checked);
    //
    if (empAllAccess == false) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("staffAccess").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("staffAccess").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }

        };
        xmlhttp.open("POST", "include/php/omeuamndv" + default_theme + ".php?empId=" + staffId + "&empPanelName=" + panelName, true);
        xmlhttp.send();
    }
    //
    //alert('empAllAccess == ' + empAllAccess);
    //
    if (empAllAccess == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("staffAccess").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("staffAccess").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/omeamndv" + default_theme + ".php?empId=" + staffId + "&empPanelName=" + panelName, true);
        xmlhttp.send();
    } else {
        document.getElementById('selectEmpAllAccess').checked = false;
    }
}
//
//- End of Modified Code(Complete file modified) @AUTHOR: SANT19MAY16 -->
/*************End Code To Change Div @Author:PRIYA25JUL13************/
/*************Start Code To Get Prev And Next Button In Stock List @Author:PRIYA26JUL13******/
/*************Start code to add param @Author:PRIYA24DEC13*******************/
function getPagingNavigation(pageNo, rowsPerPage, panel, custId, panelName, startRange, endRange, metalWt, stockItemMetal, itemName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "visible";
            if (panel == 'NewOrder') {
                document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
            } else if (panel == 'PurchaseList') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "hidden";
        }
    };
    if (panel == 'NewOrder') {
        xmlhttp.open("POST", "include/php/ognostlt" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&custId=" + custId + "&panelName=" + panelName, true);
    } else if (panel == 'PurchaseList') {
        xmlhttp.open("POST", "include/php/ogiamsdv" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel + "&stockUpdateRows=" + 'StockUpdateRows', true);
    } else {
        xmlhttp.open("POST", "include/php/ogilmndv" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&startRange=" + startRange + "&endRange=" + endRange + "&itemName=" + itemName + "&stockItemMetal=" + stockItemMetal + "&metalWt=" + metalWt, true);
    }
    xmlhttp.send();
}
/*************End code to add param @Author:PRIYA24DEC13*******************/
/*************End Code To Get Prev And Next Button In Stock List  @Author:PRIYA26JUL13******/
/*************Start Code To Get No Of Rows In Stock List @Author:PRIYA26JUL13******/
/*************Start Code To Add Panel @Author:PRIYA20SEP13******/
/*************Start Code To Add Panel @Author:PRIYA05OCT13******/
/*************Start Code To change div @Author:PRIYA26OCT13******/
/************Start of changes in function @AUTHOR: SANDY30OCT13*****************/
/************Start code to add panel @Author:PRIYA23DEC13*****************/
/*************Start code to add param @Author:PRIYA24DEC13*******************/
/*************Start code to add panel @Author:PRIYA04JUN14******************/
/*************Start code to add acit panel @Author:PRIYA10JUL14******************/
/*************Start code to add acit panel @Author:PRIYA29OCT14******************/
/******* Start code to add condition for Crystal Paanel and crystalsub for stock panel @Author:SHE26FEB15*******/
/******* Start code to add condition for CrystalPurchaseList in Crystal Panel@Author:SHE20MAR15*******/
/******* Start code to add condition for Raw Metal @Author:SHE13JAN16*******/
/******* Start code to add condition for retail and wholesale panel list @Author:SHRI05APR16**************/
//START chnage file name ogilimsd" + default_theme +".php to ogilistsd" + default_theme +".php @Author:GAUR26JUL16
function showNoOfRows(documentRootPath, rowsPerPage, pageNum, upRowsPanel, nwOrPanel, custId, panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (upRowsPanel == 'NwOrUpdateRows') {
                document.getElementById("ajaxLoadNextItemList").style.visibility = "hidden";
                document.getElementById("ajaxLoadNextItemListButt").style.visibility = "visible";
            }
            if (upRowsPanel == 'NwOrUpdateRows') {
                document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'rawStockList') {
                document.getElementById("rawMetalStockListDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'JewelleryPanel') {
                document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'ImtJewelleryPanel' || upRowsPanel == 'ImtWholsaleJewelleryPanel') {
                document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'PurchaseList') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'UdhaarUpdateRows') {
                document.getElementById("udhaarDetPanel").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'AdvanceMoney') {
                document.getElementById("advMoneyList").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'AcitUpdateRows') {
                document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'AvailStockUpdateRows' || upRowsPanel == 'SoldStockUpdateRows' || upRowsPanel == 'MainStockUpdateRows') {
                document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
            }  // start code to shows no of rows in crystal purchase list @Author:SHE21FEB15
            else if (upRowsPanel == 'crystalStockList') {
                document.getElementById("crystalStockListDiv").innerHTML = xmlhttp.responseText;
                // End code to shows no of rows in crystal purchase list @Author:SHE21FEB15
            } else if (nwOrPanel == 'CrystalPurchaseList') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'RawMetalList') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'CrystalPanel') {
                document.getElementById("CrystalSubPanel").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'RetailStockPanel' || upRowsPanel == 'WholeSaleStockPanel') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "hidden";
        }
    };
    if (upRowsPanel == 'NwOrUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ognostlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&upRows=" + upRowsPanel + "&panelName=" + nwOrPanel + "&custId=" + custId, true);
    } else if (upRowsPanel == 'rawStockList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmlist" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&panel=" + upRowsPanel + "&listPanel=" + nwOrPanel, true);
    } else if (upRowsPanel == 'JewelleryPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilistsd" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else if (upRowsPanel == 'ImtJewelleryPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijlimsd" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else if (upRowsPanel == 'ImtWholsaleJewelleryPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijlimsd_1" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel + "&panelName=" + panelName, true);
    } else if (nwOrPanel == 'PurchaseList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiaprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel, true);
    } else if (upRowsPanel == 'UdhaarUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omuupnal" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (nwOrPanel == 'AdvanceMoney') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omadmnlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (upRowsPanel == 'AcitUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omaiatlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (upRowsPanel == 'AvailStockUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogisavlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&metalType=" + nwOrPanel + "&itemName=" + custId, true);
    } else if (upRowsPanel == 'SoldStockUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogissolt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&metalType=" + nwOrPanel + "&itemName=" + custId, true);
        //code to shows no of rows in crystal purchase list @Author:SHE21FEB15
    } else if (upRowsPanel == 'crystalStockList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrmnlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&panel=" + upRowsPanel + "&listPanel=" + nwOrPanel, true);
    } else if (nwOrPanel == 'CrystalPurchaseList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel, true);
    } else if (nwOrPanel == 'RawMetalList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmcslt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel, true);
    } else if (upRowsPanel == 'CrystalPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrlisd" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else if (upRowsPanel == 'RetailStockPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrtprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else if (upRowsPanel == 'WholeSaleStockPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwtprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilmndv" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&stockUpdateRows=" + upRowsPanel, true);
    }
    xmlhttp.send();
}
//end chnage file name ogilimdv" + default_theme +".php to ogilistsd" + default_theme +".php @Author:GAUR26JUL16
/******* Start code to add condition for retail and wholesale panel list @Author:SHRI05APR16**************/
/******* End code to add condition for Raw Metal @Author:SHE13JAN16*******/
/******* End code to add condition for CrystalPurchaseList in Crystal Panel@Author:SHE20MAR15*******/
/******* End code to add condition for Crystal Paanel and crystalsub for stock panel @Author:SHE26FEB15*******/
/*************End code to add acit panel @Author:PRIYA29OCT14******************/
/*************End code to add acit panel @Author:PRIYA10JUL14******************/
/*************End code to add panel @Author:PRIYA04JUN14******************/
/*************End code to add param @Author:PRIYA24DEC13*******************/
/************End code to add panel @Author:PRIYA23DEC13*****************/
/************End of changes in function @AUTHOR: SANDY30OCT13*****************/
/*************End Code To change div @Author:PRIYA26OCT13******/
/*************End Code To Add Panel @Author:PRIYA20SEP13******/
/*************End Code To Get No Of Rows In Stock List @Author:PRIYA26JUL13******/

/************Start Code To Select Financial year In profit N Loss Panel @Author:PRIYA02AUG13*************/
function getProfitNLoss(firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("profitNLossSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacplcp" + default_theme + ".php?firmId=" + firmId + "&profitNLossFromDD=" + fromDD + "&profitNLossFromMM=" + fromMM + "&profitNLossFromYY=" + fromYY
            + "&profitNLossToDD=" + toDD + "&profitNLossToMM=" + toMM + "&profitNLossToYY=" + toYY, true);
    xmlhttp.send();
}
/************End Code To Select Financial year In profit N Loss Panel @Author:PRIYA02AUG13*************/

/************Start Code To Get FirmId In profit N Loss Panel @Author:PRIYA02AUG13*************/
function getProfitNLossByFirmName(firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("profitNLossSubDiv").innerHTML = xmlhttp.responseText;
            getCapitalAccountByFirmName(firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacplcp" + default_theme + ".php?firmId=" + firmId + "&profitNLossFromDD=" + fromDD + "&profitNLossFromMM=" + fromMM + "&profitNLossFromYY=" + fromYY
            + "&profitNLossToDD=" + toDD + "&profitNLossToMM=" + toMM + "&profitNLossToYY=" + toYY, true);
    xmlhttp.send();
}
/************End Code To Get FirmId In profit N Loss Panel @Author:PRIYA02AUG13*************/
/************Start code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/************START CODE TO ADD OTP OPTION @Author:RENUKA AUG2022*********************************************/
function validMobileNo(user_mobile, custId, StaffOTPPrin = "") {
    let smsId = '';
    if (StaffOTPPrin == 'StaffOTPLoan') {
        smsId = document.getElementById('smsOtpTemplateId').value;
    }
    if (user_mobile.length < 10) {
        alert("Please Enter Valid Mobile No !");
        document.getElementById("user_mobile").focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("panel").style.display = "block";
                document.getElementById("panel1").style.display = "none";
                if (StaffOTPPrin == 'StaffOTPLoan') {
                    smsId = document.getElementById('smsOtpTemplateId').value;
                    document.getElementById("panel2").style.display = "none";
                    getTimerOTP();
                }
            }
        };
        xmlhttp.open("POST", "include/php/omloanotp.php?user_mobile=" + user_mobile + "&user_id=" + custId + "&smsId=" + smsId + "&StaffOTPPrin=" + StaffOTPPrin, true);
        xmlhttp.send();

}
}
/************END CODE TO ADD OTP OPTION @Author:RENUKA AUG2022*********************************************/
//****************************************************************************************************************************************
/************START CODE TO ADD OTP OPTION @Author:VINOD05/MAY/2023*********************************************/
//****************************************************************************************************************************************
function getTimerOTP() {
    let s = 60;
    myInterval = setInterval(function () {
        if (10 <= s && 0 < s)
        {
            document.getElementById('OTPTime').style.color = "green";
            document.getElementById('OTPTime').innerText = s;
            s--;
        } else if (s < 10 && 0 < s) {
            document.getElementById('OTPTime').style.color = "red";
            document.getElementById('OTPTime').innerText = s;
            s--;
        } else {
            clearInterval(myInterval);
            document.getElementById("panel1").style.display = "none";
            document.getElementById("panel").style.display = "none";
            document.getElementById("panel2").style.display = "block";
            document.getElementById("otpStatus").style.display = "block";
        }
    }, 1000);
}
/************start CODE TO ADD VERIFY OWNER MOBILE @Author:VINOD05/MAY/2023*********************************************/
//****************************************************************************************************************************************
function validationOwnerMobileNo(documentRootPath, own_mobile, ownId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            if (own_mobile != '' && own_mobile >= 10 & own_mobile != null)
            {
                document.getElementById("panel").style.display = "block";
                document.getElementById("panel1").style.display = "none";
                document.getElementById('otpsendstatus').style.display = 'block';
            } else {
                alert('Owner Mobile Number not found! Please update Owner Mobile Number!');
            }
        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", "include/php/omSmsSystemMessages.php?user_mobile=" + own_mobile + "&user_id=" + ownId + "&type=OwenerOTP", true);
    xmlhttp.send();
    //

}
// added new function for girvi release otp sent 
function validationUserMobileNo(documentRootPath, own_mobile, ownId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            if (own_mobile != '' && own_mobile >= 10 & own_mobile != null)
            {
                document.getElementById("panel").style.display = "block";
                document.getElementById("panel1").style.display = "none";
                document.getElementById('otpsendstatus').style.display = 'block';
            } else {
                alert('Owner Mobile Number not found! Please update Owner Mobile Number!');
            }
        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", "include/php/omSmsSystemMessages.php?user_mobile=" + own_mobile + "&user_id=" + ownId + "&type=UserOTP1", true);
    xmlhttp.send();
    //

}
// Sent otp for user 
/************END CODE TO ADD VERIFY OWNER MOBILE @Author:VINOD05/MAY/2023*********************************************/
//****************************************************************************************************************************************
////*****************************************************************************************************************************************
//START FIRM DELETE CODE: CODE TO VERIFY OTP VINOD10/MAY/2023
//*****************************************************************************************************************************************
function otpVerificationtion(documentRootPath, firmId) {
    loadXMLDoc();
    var OTP = document.getElementById("OTP").value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText != 'YYYY') {
                document.getElementById("otpstatus").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("otpstatus").innerHTML = 'YYYY';
                document.getElementById('myModal1').style.display = "none";
                document.body.style.background = "#F00";
                delFirmAlertMessStr = delFirmAlertMess + "\n\nThis option will delete all the records and entries of this firm.\nPlease take a backup of your database before execute this option.\n\nDo you really want to delete this firm?";
                //delFirmAlertMessStr = delFirmAlertMess.fontcolor("red");
                confirm_box = confirm(delFirmAlertMessStr);
                if (confirm_box == true)
                {
                    document.body.style.background = "#FFF";
                    loadXMLDoc();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //alert(xmlhttp.responseText);
                            if (xmlhttp.responseText == 'CustomerPresent') {
                                // alert(firmDelAlert1 + "\nPlease first delete all customers of this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else if (xmlhttp.responseText == 'GirviPresent') {
                                //alert(firmDelAlert2 + "\n\nPlease first delete all girvi those belongs to this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else if (xmlhttp.responseText == 'GirviPresent') {
                                // alert(firmDelAlert3 + "\n\nPlease first delete all girvi those belongs to this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else if (xmlhttp.responseText == 'UdhaarPresent') {
                                // alert(firmDelAlert4 + " \n\nPlease first delete all udhaar money those belongs to this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else if (xmlhttp.responseText == 'TransPresent') {
                                // alert(firmDelAlert5 + " \n\nPlease first delete all transactions those belongs to this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else if (xmlhttp.responseText == 'SupplierPresent') {
                                //alert(firmDelAlert6 + "\n\nPlease first delete all suppliers of this firm!");//change in line @AUTHOR: SANDY28JAN14
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/ajaxClose.png' />";
                            } else {
                                document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/delete16.png' />";
                                //window.setTimeout(getFirmListAfterDel, 10);
                                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                            }
                        } else {

                            document.getElementById("deleteFirmButt" + firmId).innerHTML = "<img src='images/loading16.gif' />";
                        }
                    };
                    xmlhttp.open("GET", "include/php/omffdlfr.php?firmId=" + firmId,
                            true);
                    xmlhttp.send();
                } else {
                    document.body.style.background = "#FFF";
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ommotpverification.php?&otp=" + OTP + "&firmId=" + firmId, true);
    xmlhttp.send();
    //
}
function otpVerificationOnLoanRelease(documentRootPath, custId, girviId, pageNo, totalTransLoan, dateCompare) {
    loadXMLDoc(); // Initializes `xmlhttp`
    var OTP = document.getElementById("OTP").value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

            if (xmlhttp.responseText === 'YYYY') {
                var poststr = "custId=" + custId +
                        "&girviId=" + girviId +
                        "&pageNo=" + pageNo +
                        "&grvRelPayDetails=TRUE" +
                        "&dateCompare=" + dateCompare;
                release_girvi_details('include/php/olgrgvdt.php', poststr);
            } else {
                document.getElementById("otpstatus").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/omverify_otp.php?otp=" + OTP + "&custId=" + custId + "&girviId=" + girviId + "&pageNo=" + pageNo + "&dateCompare=" + dateCompare, true);
    xmlhttp.send();
}
//*****************************************************************************************************************************************
//END FIRM DELETE CODE: CODE TO VERIFY OTP VINOD10/MAY/2023
//*****************************************************************************************************************************************
//
//START ICICI BANK API CODE: CODE TO GENERATE OTP @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function validOwnerMobileNo(documentRootPath, own_mobile) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("panel").style.display = "block";
            document.getElementById("panel1").style.display = "none";
            document.getElementById("mainDiv").style.display = "none";

        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omBankotp" + default_theme + ".php?own_mobile=" + own_mobile, true);

    xmlhttp.send();
    //

}
function validOwnerMobileNotoGetbankstmt(documentRootPath, own_mobile) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("panel").style.display = "block";
            document.getElementById("panel1").style.display = "none";
            document.getElementById("getbankstatement").style.display = "none";

        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omBankotp" + default_theme + ".php?own_mobile=" + own_mobile, true);

    xmlhttp.send();
    //

}
//*****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO GENERATE OTP @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//*****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO VERIFY OTP @RENUKA_SHARMA_2022
//*****************************************************************************************************************************************
function otpVerificationtogetbankdetails(documentRootPath, apiType, OTP) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainDiv").style.display = "block";
            document.getElementById("mainDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("mainPayment").style.display = "none";

        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omBankBalanceFetchDiv.php?apiType=" + apiType + "&otp=" + OTP, true);
    xmlhttp.send();
    //

}
//*****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO DISPLAY BANK STATEMENT ACCORDING TO DATE @RENUKA_SHARMA_2022bankrec
//*****************************************************************************************************************************************
//
function otpVerificationtogetbankstmtdetails(documentRootPath, apiType, OTP) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // document.getElementById("getbankstatement").style.display = "block";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            // document.getElementById("mainPayment").style.display = "none";

        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omBankrec.php?apiType=" + apiType + "&otp=" + OTP, true);
    xmlhttp.send();
    //

}
//*****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO DISPLAY BANK STATEMENT ACCORDING TO DATE @RENUKA_SHARMA_2022
//*****************************************************************************************************************************************
//*****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO VERIFY OTP @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function valKeyPressedForNumber(evt) {
    var ccharCode = (evt.which) ? evt.which : event.keyCode;
    if (ccharCode == 8) {
        return true;
    }
    if ((ccharCode < 48 || ccharCode > 57)) {
        return false;
    }
    return true;
}
//
function valKeyPressedForNumberWithDecimal(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
/************End code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/************End code To Validate No Of Rows @Author:PRIYA08AUG13**********/
/************Start code To Update sms Mob No @Author:PRIYA08AUG13*******/
var smsMobId;
var smsOldMobNo;
var smsUpMobNo;
function validateUpdateSmsMobileNoInputs(smsUpMobNo) {
    if (validateEmptyField(smsUpMobNo, "Please Enter Mobile Number!") == false || ((validateNum(smsUpMobNo, "Accept only Numbers without space character!") == false || validateLength10(smsUpMobNo, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById(smsMobId).value = 'Not Updated';
        window.setTimeout(closeUpdateSmsMobNoMessNotUpd, 1000);
    } else {
        return true;
    }
    function closeUpdateSmsMobNoMessNotUpd()
    {
        document.getElementById(smsMobId).value = smsOldMobNo;
        document.getElementById(smsMobId).focus();
        return false;
    }
}
function update_sms_mobile_no(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateSmsMobileNo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertUpdateSmsMobileNo() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'Updated') {
            document.getElementById(smsMobId).value = 'Updated';
            window.setTimeout(closeUpdateSmsMobNoMess, 1000);
        } else {
            document.getElementById(smsMobId).value = 'Not Updated';
            window.setTimeout(closeUpdateSmsMobNoMess, 1000);
        }
    } else {
        document.getElementById(smsMobId).value = 'Not Updated';
        window.setTimeout(closeUpdateSmsMobNoMess, 1000);
    }
    function closeUpdateSmsMobNoMess()
    {
        document.getElementById(smsMobId).value = smsUpMobNo;
    }
}
/************Start Code To Add Panel Name @Author:PRIYA19AUG13*********/
function updateSmsMobNo(mobNo, oldMobNo, smsId, userId, panelName) {
    smsMobId = 'smsMobUp' + smsId;
    smsUpMobNo = mobNo;
    smsOldMobNo = oldMobNo;
    if (validateUpdateSmsMobileNoInputs(smsUpMobNo)) {
        var poststr = "mobNo=" + encodeURIComponent(mobNo)
                + "&smsId=" + encodeURIComponent(smsId)
                + "&userId=" + encodeURIComponent(userId)
                + "&upPanelName=" + encodeURIComponent(panelName)
                + "&mobUpPanel=" + 'smsMobUpPanel';
        update_sms_mobile_no('include/php/omccdtmb' + default_theme + '.php', poststr);
    }
}
/************Start Code To Add Panel Name @Author:PRIYA19AUG13*********/
/************End code To Update sms Mob No @Author:PRIYA08AUG13*******/
/************Start Code To Add Func For ctrl+Enter Key @Author:PRIYA17AUG13*******/
function initFormName(formName, funName) {
//    alert(formName);
    gbCLTFormName = formName;
    gbCLTFormFun = funName;
}
/************End Code To Add Func For ctrl+Enter Key @Author:PRIYA17AUG13*******/
/************Start Code To Add Func For Char @Author:PRIYA17AUG13*******/
/************Start code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/************Start code To Change Condition @Author:PRIYA04SEP13**********/
function valKeyPressedForChar(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode == 8 || charCode == 13) || (charCode > 96 && charCode < 123)) {
        return true;
    } else if ((charCode < 65 || charCode > 90)) {
        return false;
    }
    return true;
}
/************End code To Change Condition @Author:PRIYA04SEP13**********/
/************End code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/************End Code To Add Func For Char @Author:PRIYA17AUG13*******/
/************Start Code To Add Func For NUM + Dot @Author:PRIYA17AUG13*******/
/************Start Code To Add Func For Char @Author:PRIYA17AUG13*******/
/************Start Code To Add Func For NumNDot @Author:PRIYA17AUG13*******/
/************Start code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
function valKeyPressedForNumNDot(evt) {

    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 46 || charCode == 8) {
        return true;
    } else if ((charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function valKeyPressedForNumNDotnegative(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 46 || charCode == 8 || charCode == 45) {
        return true;
    } else if ((charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
/************End code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/************Start code To Add  Validn for Single and Double Quotes @Author:PRIYA19AUG13**********/
function valKeyPressedForQuotes(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 34 || charCode == 39) {
        return false;
    }
    return true;
}
/************End code To Add  Validn for Single and Double Quotes @Author:PRIYA19AUG13**********/
/************Start code To Add  Validn Func For umNDotNDash @Author:PRIYA24AUG13**********/
function valKeyPressedForNumNDotNDash(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 45 || charCode == 8 || charCode == 46) {
        return true;
    } else if ((charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
/************End code To Add  Validn Func For umNDotNDash @Author:PRIYA24AUG13**********/
/************Start Code To Add Fun For Search Item In SP Panel @Author:PRIYA24AUG13*********/
/************Start Code To Add Fun For Search Item In SP Panel @Author:PRIYA21JAN14*********/
/**************Start code for pass txtType parameter for delete Author:SANT16DEC16***************************/
function searchApprovalItemByItemId(searchItemId, autoEntryValue, custId) {
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = tempLen;
    //var alphaExp = /^[a-zA-Z]+$/;
    var alphaExp = /#/; //CODE ADDED TO SEARCH PRODUCT BY # PREID,@AUTHOR:HEMA-13JUL2020
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(tempLen - 1);
        searchItemIdTemp = searchItemIdTemp.substr(0, tempLen - 1);
        if (isNaN(field) == false) {
            charLen = charLen - 1;
        } else if (field.match(alphaExp)) {
            charLen = charLen;
            break;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen, searchItemId.length);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    if (document.getElementById("srchDelItemId")) {
        // ADDED CONDITION FOR RETURN ITEM CODE @RATNAKAR 09FEB2018
        if (document.getElementById('srchDelItemId').value != '') {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF WINDOW ITEM RETURN @RATNAKAR 09FEB2018
            document.getElementById('srchdelItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchdelItemPostId').value = searchItemIdNumPart;
        } else {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE @RATNAKAR 09FEB2018
            document.getElementById('srchItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchItemPostId').value = searchItemIdNumPart;
        }
    } else {

        // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE @RATNAKAR 09FEB2018
        document.getElementById('srchItemPreId').value = searchItemIdCharPart;
        document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    }

    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        if (document.getElementById("srchDelItemId")) {

            xmlhttp.open("GET", "include/php/ogiaijdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);

        } else {
            xmlhttp.open("GET", "include/php/ogiaijdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        }
        xmlhttp.send();

    } else {
        return false;
    }
}
/**************End code for pass txtType parameter for delete Author:SANT16DEC16***************************/
/**************Start code for pass txtType parameter for delete Author:SANT16DEC16***************************/
function searchCrystalItemByItemId(searchItemId, autoEntryValue, custId) {
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    while (tempLen > 0) {

        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
//    document.getElementById('barcodeId').value = document.getElementById('srchItemPostId').value;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                var status = xmlhttp.responseText;
                if (status != 'SUCCESS' && status != '') {

                    // document.getElementById("autoEntryMessDisplayDiv").value = status; 
                    document.getElementById("srchItemId").value = '';
                }
                if (autoEntryValue == 'YES' && status == 'SUCCESS') {
//                    alert('hello');
                    document.getElementById("sell_purchase").submit();
                    return true;
                } else {
                    return false;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogcrslstat" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                "&custId=" + custId + "&panelName=" + 'autoEntry', true);
        xmlhttp.send();
    } else {
        return false;
    }
}
/**************End code for pass txtType parameter for delete Author:SANT16DEC16***************************/
/************End Code To Add Fun For Search Item In SP Panel @Author:PRIYA21JAN14*********/
/************End Code To Add Fun For Search Item In SP Panel @Author:PRIYA24AUG13*********/
/***********Start Code To Select FirmId In Account Balance Details Panel @AUTHOR: GAUR11JAN16********/
function getAccBalDetailsByFirmName(firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var postYear = encodeURIComponent(document.get_account_balance_sheet_form.balanceSheetYear.value);
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?firmId=" + firmId + "&postYear=" + postYear, true);
    xmlhttp.send();
}
/***********END Code To Select FirmId In Account Balance Details Panel @AUTHOR: GAUR11JAN16********/
/***********Start Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR29DEC15********/
function getAccBalDate(balanceSheetYear) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?firmId=" + balanceSheetYear, true);
    xmlhttp.send();
}
/***********END Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR29DEC15********/
/**********Start to add function showCountBal @AUTHOR: GAUR26DEC15****************/
function showCountBal() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End to add function showCountBal @AUTHOR: GAUR26DEC15****************/

/**********Start to add function getInvoice @AUTHOR: RATNAKAR01SEP17****************/
function getInvoice(changeInv, srchItemPreId, srchItemPostId, custId, panelName, txtType) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    var sellFormName = document.getElementById('sellFormName').value;
    loadXMLDoc();
//    alert(panelName);
    var preInvNo = "";
    var postInvNo = "";
    if (panelName == 'orderPickStock') {
        var str = txtType.split(';');
        preInvNo = str[0];
        postInvNo = str[1];
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'AddUdhaar' || panelName == 'UpdateUdhaar') {
                document.getElementById("udhaarSubDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'AddMoney' || panelName == 'UpdateAdvMoney') {
                document.getElementById("advMoneyDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
                if (res == 'G' || res == 'S' || res == 'O') {
                    searchItemNames(itemName, metalType, divNum, keyCodeInput);
                }
                document.getElementById('changeInInvoice').value = '1';

                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //alert('srchItemPreId=='+srchItemPreId);
    //alert('srchItemPostId=='+srchItemPostId);
//    alert('panelName=='+panelName);
//alert('txtType=='+txtType);
//         if (panelName == 'StockPurchasePanel') {
    if (panelName == 'AddUdhaar') {
        udhaarAmt = document.getElementById('udhaarMainAmount').value;
        firmId = document.getElementById('udhharFirmId').value;
        sday = document.getElementById('DOBDay').value;
        smonth = document.getElementById('DOBMonth').value;
        syear = document.getElementById('DOBYear').value;
        eday = document.getElementById('endDOBDay').value;
        emonth = document.getElementById('endDOBMonth').value;
        eyear = document.getElementById('endDOBYear').value;
        udhaarType = document.getElementById('udhaarType').value;
        otherInfo = document.getElementById('udhaarOtherInfo').value;
        accId = document.getElementById('udhaarPayAccId').value;
    } else if (panelName == 'AddMoney') {
        advAmt = document.getElementById('advMoneyAmt').value;
        firmId = document.getElementById('advMoneyFirmId').value;
        accId = document.getElementById('advMoneyCrAccId').value;
        OthInfo = document.getElementById('advMoneyOtherInfo').value;
        sday = document.getElementById('DOBDay').value;
        smonth = document.getElementById('DOBMonth').value;
        syear = document.getElementById('DOBYear').value;
    }

    if (panelName == 'orderPickStock') {
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&preOrdInvNo=" + preInvNo + "&postOrdInvNo=" + postInvNo + "&changeInv=" + changeInv, true);
    } else if (panelName == 'UpdateUdhaar') {
        xmlhttp.open("POST", "include/php/omuanwdt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&changeInv=" + changeInv + "&udhaarId=" + txtType, true);
    } else if (panelName == 'UpdateAdvMoney') {
        xmlhttp.open("POST", "include/php/omamaddv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&changeInv=" + changeInv + "&admnId=" + txtType, true);
    } else if (panelName == 'AddUdhaar') {
        xmlhttp.open("POST", "include/php/omuanwdt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&changeInv=" + changeInv
                + "&udhaarAmt=" + udhaarAmt + "&firmId=" + firmId + "&udhaarType=" + udhaarType + "&accId=" + accId
                + "&PayOtherInfo=" + otherInfo + "&eDOBDay=" + eday + "&eDOBMonth=" + emonth + "&eDOBYear=" + eyear
                + "&DOBDay=" + sday + "&DOBMonth=" + smonth + "&DOBYear=" + syear, true);
    } else if (panelName == 'AddMoney') {
        xmlhttp.open("POST", "include/php/omamaddv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&changeInv=" + changeInv
                + "&advAmt=" + advAmt + "&firmId=" + firmId + "&accId=" + accId + "&PayOtherInfo=" + OthInfo
                + "&DOBDay=" + sday + "&DOBMonth=" + smonth + "&DOBYear=" + syear, true);
    } else {
        if (sellFormName = 'sellFormNameB2') {
            xmlhttp.open("POST", "include/php/ogspjsdvb2" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&changeInv=" + changeInv, true);
        } else {
            xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&changeInv=" + changeInv, true);
        }
    }
//        } 
    xmlhttp.send();
}
/**********End to add function getInvoice @AUTHOR: RATNAKAR01SEP17****************/

function searchItemByProdCode(searchItemId, custId) {
//    var searchItemIdLen = searchItemId.length;
//    var searchItemIdTemp = searchItemId;
//    var tempLen = searchItemIdLen;
    //   var charLen = 0;
//    var alphaExp = /^[a-zA-Z]+$/;
//    while (tempLen > 0) {
//
//        var field = searchItemIdTemp.substr(0, 1);
//        searchItemIdTemp = searchItemIdTemp.substr(1);
//
//        if (field.match(alphaExp)) {
//            charLen = charLen + 1;
//        } else {
//            break;
//        }
//        tempLen = tempLen - 1;
//    }
    //start Code Search Stock @Author : Vinod :21-08-2023

    var barCodeArray = searchItemId.split("");
    var length = barCodeArray.length;
    var strPreId = '';
    var strPostId = '';
    var st = false;
    for (var i = length - 1; i >= 0; i--)
    {
        if (isNaN(barCodeArray[i]) || st)
        {
            st = true;
            strPreId += barCodeArray[i];
        } else {
            strPostId += barCodeArray[i];
        }
        //tempLen = tempLen - 1;
    }

    strPreId = strPreId.split("").reverse().join("");
    strPostId = strPostId.split("").reverse().join("");

    var searchItemIdCharPart = strPreId;
    var searchItemIdNumPart = strPostId;
    //
    // End Code Search Stock @Author : Vinod :21-08-2023

//    var searchItemIdCharPart = searchItemId.substr(0, charLen);
//    var searchItemIdNumPart = searchItemId.substr(charLen);

    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var status = xmlhttp.responseText;
            if (status != 'SUCCESS' && status != '') {
                document.getElementById("srchItemId").value = '';
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omspstat" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
            "&custId=" + custId + "&panelName=" + 'Estimate', true);
    xmlhttp.send();
}
// Start Code To Reset Invoice No @Author:Vinod=> 07-08-2023 
function resetEstimateInvNo()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omresetEstimateInv" + default_theme + ".php", true);
    xmlhttp.send();
}
// End Code To Reset Invoice No @Author:Vinod=> 07-08-2023 

function showEstimateInvDiv(srchItemPreId, srchItemPostId, custId, panelName, invNo, invPreNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'estimateUpPanel' || panelName == 'EstimateUpdate') {
        panelName = 'Estimate';
        xmlhttp.open("POST", "include/php/omestimate" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&einvNo=" + invNo + "&ePreInvNo=" + invPreNo, true);
    } else {
        xmlhttp.open("POST", "include/php/omestimate" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName, true);
    }
    xmlhttp.send();
}
//
function refreshXRFPaymentPanel(utin_prod_qty, utin_prod_unit_price, prod_total_amount, userId, payPreInvoiceNo, payInvoiceNo, panelName, prod_details) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("xrfPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ompaymentxrf" + default_theme + ".php?utin_prod_qty=" + utin_prod_qty
            + "&utin_prod_unit_price=" + utin_prod_unit_price + "&prod_total_amount=" + prod_total_amount + "&userId=" + userId
            + "&preInvNo=" + payPreInvoiceNo + "&postInvNo=" + payInvoiceNo + "&panelName=" + panelName + "&prod_details=" + prod_details, true);
    xmlhttp.send();
}
//
// NAVIGATE TO USER LIST FILE
function showUserInfo(panelName, userType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (userType == 'staff')
    {
        xmlhttp.open("POST", "include/php/omssinftbl" + default_theme + ".php?panelName=" + panelName + "&userType=" + userType, true);
    } else {
        xmlhttp.open("POST", "include/php/omccinftbl" + default_theme + ".php?panelName=" + panelName + "&userType=" + userType, true);
    }
    xmlhttp.send();
}
//
//
function calPurity(purityId, itemDivCount, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemPurity").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olcalpurity" + default_theme + ".php?purityId=" + purityId + "&itemDivCount=" + itemDivCount + "&metalType=" + metalType, true);
    xmlhttp.send();
}
//
//
function readyToMelt(sttr_id, meltCounter, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, listPanel) {
//    alert(listPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selectForMeltingButton" + meltCounter).innerHTML = xmlhttp.responseText;
            document.getElementById("selectForMeltingButton" + meltCounter).disabled = true;
            document.getElementById("selectForMeltingButton" + meltCounter).style.color = "green";
            showreMeltingList('MeltingTransList', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogmeltingapi" + default_theme + ".php?sttrId="
            + sttr_id + "&listPanel=" + listPanel + "&function=ReadyForMelting", true);
    xmlhttp.send();
}
//
//
function deleteRawMetal(sttr_id, meltCounter, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, listPanel, nepalidateindicator = '') {
//    alert(sttr_id);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selectForMeltingButton" + meltCounter).innerHTML = xmlhttp.responseText;
            document.getElementById("selectForMeltingButton" + meltCounter).disabled = true;
            document.getElementById("selectForMeltingButton" + meltCounter).style.color = "green";
            if (nepalidateindicator == 'YES') {
                showreMeltingList('MeltingTransList', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, nepalidateindicator);

            } else {
                if (listPanel == 'SelectItemForMelting') {
                    showreMeltingList('SelectItemForMelting', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear);
                } else {
                    showreMeltingList('MeltingTransList', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear);
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omrmwdelt" + default_theme + ".php?sttr_id=" + sttr_id, true);
    xmlhttp.send();
}
//
//function undoRawMetal(sttr_id, meltCounter,selFirmId,girviLedDelFrmDay,girviLedDelFrmMonth,girviLedDelFrmYear,girviLedDelToDay,girviLedDelToMonth,girviLedDelToYear) {
//    alertsttr_id);
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("selectForMeltingButton" + meltCounter).innerHTML = xmlhttp.responseText;
//            document.getElementById("selectForMeltingButton" + meltCounter).disabled = true;
//            document.getElementById("selectForMeltingButton" + meltCounter).style.color = "green";
////            showreMeltingList('MeltingTransList','',selFirmId,girviLedDelFrmDay,girviLedDelFrmMonth,girviLedDelFrmYear,girviLedDelToDay,girviLedDelToMonth,girviLedDelToYear);
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/ommeltundv" + default_theme +".php?sttr_id=" + sttr_id, true);
//    xmlhttp.send();
//}
//
//
function undoReadyToMelt(sttr_id, meltCounter, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, listPanel, nepalidateindicator = '') {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selectForMeltingButton" + meltCounter).innerHTML = xmlhttp.responseText;
            document.getElementById("selectForMeltingButton" + meltCounter).disabled = true;
            document.getElementById("selectForMeltingButton" + meltCounter).style.color = "green";
            if (nepalidateindicator == 'YES') {
                showreMeltingList('MeltingTransList', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, nepalidateindicator);
            } else {
                if (listPanel == 'SelectItemForMelting') {
                    showreMeltingList('SelectItemForMelting', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear);
                } else {
                    showreMeltingList('MeltingTransList', '', selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear);
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogmeltingapi" + default_theme + ".php?sttrId="
            + sttr_id + "&function=UndoReadyForMelting", true);
    xmlhttp.send();
}
//
function showreMeltingList(panel, metal, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, nepalidateindicator = '') {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (nepalidateindicator == 'YES') {
        var startDate = girviLedDelFrmDay + ' ' + girviLedDelFrmMonth + ' ' + girviLedDelFrmYear;
        var endDate = girviLedDelToDay + ' ' + girviLedDelToMonth + ' ' + girviLedDelToYear;
    } else {
        var startDate = girviLedDelFrmDay + girviLedDelFrmMonth + girviLedDelFrmYear;
        var endDate = girviLedDelToDay + girviLedDelToMonth + girviLedDelToYear;
    }

    xmlhttp.open("POST", "include/php/ogrmprlt" + default_theme + ".php?listPanel=" + panel + "&metal=" + metal + "&selFirmId=" + selFirmId + "&startDate=" + startDate + "&endDate=" + endDate, true);
    xmlhttp.send();
}
//
function showMeltingList(panel, metal, selFirmId) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogrmprlt" + default_theme + ".php?listPanel=" + panel + "&metal=" + metal + "&selFirmId=" + selFirmId, true);
    xmlhttp.send();
}
//
//
function showAssignedMetalList(panel) {
//    alert(selFirmId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmassignedmetallist" + default_theme + ".php?listPanel=" + panel, true);
    xmlhttp.send();
}
function showMeltedMetalList(panel) {
//     alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommetaledlist" + default_theme + ".php?listMetalPanel=" + panel, true);
    xmlhttp.send();
}
//
//
function assignMetalForMelting(panel, selFirmId) {
//    alert(selFirmId);
    if (document.getElementById("MeltingKarigarName").value == '') {
        alert('Please Enter Karigar Name !');
        document.getElementById("MeltingKarigarName").focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("assignMetalForMelting").innerHTML = xmlhttp.responseText;
                showAssignedMetalList('MeltingTransList', selFirmId);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var firmId = document.getElementById("firm").value;
        var poststr = "dateDay=" + encodeURIComponent(document.getElementById("meltingDOBDay").value)
                + "&dateMonth=" + encodeURIComponent(document.getElementById("meltingDOBMonth").value)
                + "&dateYear=" + encodeURIComponent(document.getElementById("meltingDOBYear").value)
                + "&meltFirmName=" + encodeURIComponent(document.getElementById("MeltingKarigarName").value)
                + "&meltMetal=" + encodeURIComponent(document.getElementById("meltingMetal").value)
                + "&meltWeight=" + encodeURIComponent(document.getElementById("meltingWeight").value)
                + "&selUserId=" + encodeURIComponent(document.getElementById("selUserId").value)
                + "&totalMetalRate=" + encodeURIComponent(document.getElementById("totalMetalRate").value)
                + "&meltingNetWeight=" + encodeURIComponent(document.getElementById("meltingNetWeight").value)
                + "&meltingFineWeight=" + encodeURIComponent(document.getElementById("meltingFineWeight").value)
                + "&sttr_purity_melt=" + encodeURIComponent(document.getElementById("sttr_purity_melt").value)
                + "&MeltingKarigarName=" + encodeURIComponent(document.getElementById("MeltingKarigarName").value)
                + "&meltPurValue=" + encodeURIComponent(document.getElementById("meltingPurchaseValue").value);
        //
        //alert(poststr);
        //
        xmlhttp.open("POST", "include/php/ogrmmeltassignformelting" + default_theme + ".php?" + poststr + "&listPanel=" + panel + "&firmId=" + firmId, true);
        xmlhttp.send();
    }
}
function stockMasterItemPriceUpdate(ms_sub_itm_ms_item_id, ms_sub_itm_id, panelName, custId) {
    //
    //alert(ms_sub_itm_id);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockMasterMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    var poststr = "ms_itm_id=" + ms_sub_itm_ms_item_id
            + "&ms_sub_itm_id=" + ms_sub_itm_id
            + "&panelName=" + panelName
            + "&custId=" + custId;
    //
    //
    xmlhttp.open("POST", "include/php/stock/master/omMasterStockMainDiv" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}

function searchProductByIdBarcodeRFID(searchItemId, autoEntryValue, userId, transType, indicator, status) {

    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;

    while (tempLen > 0) {

        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }

    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);

    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }

    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);

    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;

    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        xmlhttp.open("GET", "include/php/stock/omStockSearch" + default_theme + ".php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&status=" + status + "&indicator=" + indicator, true);

        xmlhttp.send();

    } else {
        return false;
    }
}

function showProductDiv(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, status) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();

    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockProductSearchDiv").innerHTML = xmlhttp.responseText;
            //document.getElementById('prodDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

//    alert('srchItemPreId == ' + srchItemPreId);
//    alert('srchItemPostId == ' + srchItemPostId);
//    alert('panelName == ' + panelName);
//    alert('txtType == ' + txtType);


    xmlhttp.open("POST", "include/php/stock/omStockSearch" + default_theme + ".php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status + "&indicator=" + indicator, true);
    xmlhttp.send();
}
//
//
//
//
// ADDED CODE FOR MELTING PANEL CHANGES @AUTHOR:PRIYANKA-09JUNE2023
function searchProductDetailsByIdBarcodeRFIDForMelting(searchItemId, panelName, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    return false;
}
//
//
// ADDED CODE FOR MELTING PANEL CHANGES @AUTHOR:PRIYANKA-09JUNE2023
function showProductDetailsDivForMelting(srchItemPreId, srchItemPostId, panelName, selFirmId, girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    var startDate = girviLedDelFrmDay + girviLedDelFrmMonth + girviLedDelFrmYear;
    var endDate = girviLedDelToDay + girviLedDelToMonth + girviLedDelToYear;

    xmlhttp.open("POST", "include/php/ogrmprlt" + default_theme + ".php?listPanel=" + panelName + "&panelNameNew=meltingProductSearchPanel" +
            "&searchProductPreId=" + srchItemPreId + "&searchProductPostId=" + srchItemPostId +
            "&selFirmId=" + selFirmId + "&startDate=" + startDate + "&endDate=" + endDate, true);

    xmlhttp.send();

}
//
//
//
//
function showfromcustomizationDiv(searchForm) {
//    alert(searchForm);
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//             document.getElementById("searchform").innerHTML = xmlhttp.responseText;
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;

            //document.getElementById('prodDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/setup/omformcustomization" + default_theme + ".php?searchForm=" + searchForm, true);
    xmlhttp.send();
}
//
function searchSchemeByBarcode(searchSchemeBarcode) {
    //
    // IT WILL SET SCHEME BARCODE 
    document.getElementById('searchSchemeBarcode').value = searchSchemeBarcode;
}
//
function showSchemeDiv(searchSchemeBarcode) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //alert('searchSchemeBarcode == ' + searchSchemeBarcode);
    //
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?searchSchemeBarcode=" + searchSchemeBarcode + "&schemeSearchByBarcode=Yes", true);
    //
    xmlhttp.send();
}
//
//
function searchApprovalProductByIdBarcodeRFID(searchItemId, autoEntryValue, userId, transType, status) {

    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;

    while (tempLen > 0) {

        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }

    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);

    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }

    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);

    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;

    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("approvalStockMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        xmlhttp.open("GET", "include/php/stock/omApprovalStockSearch" + default_theme + ".php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&status=" + status, true);

        xmlhttp.send();

    } else {
        return false;
    }
}
//
//
function showApprovalProductDiv(srchItemPreId, srchItemPostId, userId, panelName, transType, status) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();

    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("approvalStockProductSearchDiv").innerHTML = xmlhttp.responseText;
            //document.getElementById('prodDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

//    alert('srchItemPreId == ' + srchItemPreId);
//    alert('srchItemPostId == ' + srchItemPostId);
//    alert('panelName == ' + panelName);
//    alert('txtType == ' + txtType);


    xmlhttp.open("POST", "include/php/stock/omApprovalStockSearch" + default_theme + ".php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status, true);
    xmlhttp.send();
}
//
//
function searchApprovalProductByInvNo(searchInvNo, autoEntryValue, userId, transType, status) {

    var searchInvNoLen = searchInvNo.length;
    var searchInvNoTemp = searchInvNo;
    var tempLen = searchInvNoLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;

    while (tempLen > 0) {

        var field = searchInvNoTemp.substr(0, 1);
        searchInvNoTemp = searchInvNoTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }

    var searchInvNoCharPart = searchInvNo.substr(0, charLen);
    var searchInvNoNumPart = searchInvNo.substr(charLen);

    var lastIndexOfHash = searchInvNoNumPart.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        searchInvNoCharPart = searchInvNo.substr(0, lastIndexOfHash + 2);
        searchInvNoNumPart = searchInvNo.substr(lastIndexOfHash + 2);
    }

    searchInvNoCharPart = encodeURIComponent(searchInvNoCharPart);
    searchInvNoNumPart = encodeURIComponent(searchInvNoNumPart);

    //alert('searchInvNoCharPart == ' + searchInvNoCharPart);
    //alert('searchInvNoNumPart == ' + searchInvNoNumPart);

    // IT WILL SET PRE INVOICE NO & POST INVOICE NO @PRIYANKA-25SEP2019  
    document.getElementById('searchProductPreInvNo').value = searchInvNoCharPart;
    document.getElementById('searchProductPostInvNo').value = searchInvNoNumPart;

    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("approvalStockMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        xmlhttp.open("GET", "include/php/stock/omApprovalStockSearch" + default_theme + ".php?searchProductPreInvNo=" + searchInvNoCharPart +
                "&searchProductPostInvNo=" + searchInvNoNumPart + "&userId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&status=" + status, true);

        xmlhttp.send();

    } else {
        return false;
    }
}
//
//
function showApprovalProductByInvNoDiv(searchProductPreInvNo, searchProductPostInvNo, userId, panelName, transType, status) {

    var firstChar = searchProductPreInvNo.charAt(0);
    var res = firstChar.toUpperCase();

    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("approvalStockProductSearchDiv").innerHTML = xmlhttp.responseText;
            //document.getElementById('prodDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

//    alert('srchItemPreId == ' + srchItemPreId);
//    alert('srchItemPostId == ' + srchItemPostId);
//    alert('panelName == ' + panelName);
//    alert('txtType == ' + txtType);


    xmlhttp.open("POST", "include/php/stock/omApprovalStockSearch" + default_theme + ".php?searchProductPreInvNo=" + searchProductPreInvNo +
            "&searchProductPostInvNo=" + searchProductPostInvNo + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status, true);
    xmlhttp.send();
}
//
function getCurrentInvoiceDate(addItemDOBDay, addItemDOBMonth, addItemDOBYear, userId, panel, firmId, metalType = null, metalCategory = null) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("GetInvoiceDate").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgetinvnobydate" + default_theme + ".php?addItemDOBDay=" + addItemDOBDay + "&addItemDOBMonth=" + addItemDOBMonth + "&addItemDOBYear=" + addItemDOBYear + "&userId=" + userId + "&panel=" + panel + "&firmId=" + firmId + "&metalType=" + metalType + "&metalCategory=" + metalCategory, true);
    xmlhttp.send();
}
//
//
// ***************************************************************************************
// START CODE FOR PURCHASE RETURN PANEL @PRIYANKA-22FEB2021
// ***************************************************************************************
function searchProductByIdBarcodeRFIDFunc(searchItemId, autoEntryValue, userId, transType, indicator, status) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        //
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    //
    //
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockReturnMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "include/php/omPurStockReturn" + default_theme + ".php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&status=" + status + "&indicator=" + indicator, true);
        //
        xmlhttp.send();
        //
    } else {
        return false;
    }
}
//
//
function showSearchProductDiv(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, status) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockSearchDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omPurStockReturn" + default_theme + ".php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status + "&indicator=" + indicator, true);
    //
    xmlhttp.send();
    //
}
// ***************************************************************************************
// END CODE FOR PURCHASE RETURN PANEL @PRIYANKA-22FEB2021
// ***************************************************************************************
//
//START CODE FOR GET CHANGE INVOICE PRE ID ON PANEL SELL METAL B2 : AUTHOR @DARSHANA 11 MAY 2021
function getInvoiceMetalB2(changeInv, srchItemPreId, srchItemPostId, custId, panelName, txtType) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
//    alert(changeInv);
//    var preInvNo = "";
//    var postInvNo = "";
//    if (panelName == 'orderPickStock') {
//        var str = txtType.split(';');
//        preInvNo = str[0];
//        postInvNo = str[1];
//    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'SellStock') {
                document.getElementById("slPrPreInvoiceNo").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'SellStock') {

        xmlhttp.open("POST", "include/php/omspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&changeInv=" + changeInv, true);
    }
    xmlhttp.send();
}
////END CODE FOR GET CHANGE INVOICE PRE ID ON PANEL SELL METAL B2 : AUTHOR @DARSHANA 11 MAY 2021
//START CODE FOR STONE REPORT : AUTHOR @DARSHANA 4 AUG 2021 
function getStoneLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ombbstbs" + default_theme + ".php", true);
    xmlhttp.send();
}
//END CODE FOR STONE REPORT : AUTHOR @DARSHANA 4 AUG 2021 
function openStoneLedgerReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ombbsttrep" + default_theme + ".php", true);
    xmlhttp.send();
}
function openStoneConsLedgerReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ombbstbs" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
//C:\live_mvc_omunim.com\htdocs\omunim\2\include\php\omStockLedgerSummaryPopUp" + default_theme +".php
// START CODE FOR STOCK LEDGER SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
function getStockLedgerSummaryPanel(documentRoot) {
// CHANGE CODE FOR OPEN STOCK SUMMERY IN ANOTHER TAB : AUTHOR @DARSHANA 11 NOV 2021
//MODIFY FILE NAME : AUTHOR @DARSHANA 3 dec 2022
    var url = documentRoot + "/include/php/omStockLedgerSummaryPopUp" + default_theme + ".php";
    window.open(url, '_blank');
}
// END CODE FOR STOCK LEDGER SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
//
//
//
//
// START CODE FOR STOCK LEDGER SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
function searchStockLedgerSummaryReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.open("POST", "omStockLedgerSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
// END CODE FOR STOCK LEDGER SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
function searchStockLedgerDetails(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, custId) {
    if (valDailyDiaryInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (ddMainPanel == 'custAccLedgerDayBook' || ddMainPanel == 'custAccLedger') {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        xmlhttp.open("POST", "include/php/ogspsllt" + default_theme + ".php?&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//
//
//
//
//function getStockSummaryTransactionsReportPopUp(sttrId, startDateTime, endDateTime, startDate, endDate, transFirmId, transCategory, transName, transStockType, transPurity, transPanelDetailsDisplay, documentRoot) {
//    //
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    //
//    xmlhttp.open("GET", "include/php/omStockLedgerSummaryTransReport" + default_theme +".php?startDateTime=" + startDateTime + 
//                 "&endDateTime=" + endDateTime + "&startDate=" + startDate + "&endDate=" + endDate +
//                 "&transFirmId=" + transFirmId + "&transCategory=" + transCategory + 
//                 "&transName=" + transName + "&transStockType=" + transStockType + 
//                 "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
//                 "&documentRoot=" + documentRoot + "&sttrId=" + sttrId, true);
//    //
//    xmlhttp.send();
//    //
//}
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK SUMMARY ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
function getStockSummaryTransactionsReportPopUp(sttrId, startDateTime, endDateTime, startDate, endDate, transFirmId, transCategory, transName, transStockType, transPurity, transPanelDetailsDisplay, documentRoot) {
    // 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            //document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            //
            document.getElementById('myModal' + sttrId).style.display = "block";
            document.getElementById('myModal' + sttrId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "omStockLedgerSummaryTransReportPopUpIframe" + default_theme + ".php?startDateTime=" + startDateTime +
            "&endDateTime=" + endDateTime + "&startDate=" + startDate + "&endDate=" + endDate +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId, true);
    //
    //xmlhttp.open("GET", "include/php/omStockLedgerSummaryTransReportPopUpIframe" + default_theme +".php?startDateTime=" + startDateTime + 
    //             "&endDateTime=" + endDateTime + "&startDate=" + startDate + "&endDate=" + endDate +
    //             "&transFirmId=" + transFirmId + "&transCategory=" + transCategory + 
    //             "&transName=" + transName + "&transStockType=" + transStockType + 
    //             "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
    //             "&documentRoot=" + documentRoot + "&sttrId=" + sttrId, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK SUMMARY ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK SUMMARY ALL TRANSACTIONS REPORT POP UP CLOSE @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
function closeStockSummaryTransactionsReportPopUp(sttrId) {
    document.getElementById('myModal' + sttrId).style.display = "none";
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK SUMMARY ALL TRANSACTIONS REPORT POP UP CLOSE @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK SUMMARY - FIRM VALIDATION @AUTHOR:PRIYANKA-18OCT2021
// ********************************************************************************************************************
function importOptionFirmValidation(importSelFirmId) {
    if (importSelFirmId == '' || importSelFirmId == null) {
        alert("Issue has been detected with Firm. Please select Firm!");
        return false;
    } else {
        return true;
    }
}
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK SUMMARY - FIRM VALIDATION @AUTHOR:PRIYANKA-18OCT2021
// ********************************************************************************************************************
//
//
// ****************************************************************************************
// START CODE FOR SEARCH STOCK LEDGER SUMMARY PANEL DETAILS @AUTHOR:PRIYANKA-21OCT2021
// ****************************************************************************************
function searchStockLedgerSummaryReportDetailsByColumn(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear,
        searchColumnMetal, searchValueMetal, searchColumnCategory, searchValueCategory, searchColumnName, searchValueName, searchColumnTypee, searchValueTypee, searchColumnPurity, searchValuePurity) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;

        var requestUrl = "omStockLedgerSummary" + default_theme + ".php?" +
                "firmId=" + encodeURIComponent(firmId) +
                "&panelName=" + encodeURIComponent(panelName) +
                "&FromDate=" + encodeURIComponent(FromDate) +
                "&ToDate=" + encodeURIComponent(ToDate) +
                "&searchColumnMetal=" + encodeURIComponent(searchColumnMetal) +
                "&searchValueMetal=" + encodeURIComponent(searchValueMetal) +
                "&searchColumnCategory=" + encodeURIComponent(searchColumnCategory) +
                "&searchValueCategory=" + encodeURIComponent(searchValueCategory) +
                "&searchColumnName=" + encodeURIComponent(searchColumnName) +
                "&searchValueName=" + encodeURIComponent(searchValueName);

        // Append new params only if values are provided
        if (searchColumnTypee && searchValueTypee) {
            requestUrl += "&searchColumnTypee=" + encodeURIComponent(searchColumnTypee) +
                    "&searchValueTypee=" + encodeURIComponent(searchValueTypee);
        }

        if (searchColumnPurity && searchValuePurity) {
            requestUrl += "&searchColumnPurity=" + encodeURIComponent(searchColumnPurity) +
                    "&searchValuePurity=" + encodeURIComponent(searchValuePurity);
        }

        xmlhttp.open("POST", requestUrl, true);
        xmlhttp.send();
    }
}
// ****************************************************************************************
// END CODE FOR SEARCH STOCK LEDGER SUMMARY PANEL DETAILS @AUTHOR:PRIYANKA-21OCT2021
// ****************************************************************************************
//
//
//
//
// ****************************************************************************************
// START CODE FOR STOCK LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021 
// ****************************************************************************************
function searchStockLedgerDetails(custId, panelName, navPanelNameDateSearch, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRootBSlash) {
//    alert('hiii');
//    alert(panelName);
    var FromYearDate = fromYear.value;
    var FromYearDay = fromDay.value;
    var FromYearMonth = fromMonth.value;
    var ToYearDate = toYear.value;
    var ToYearDay = toDay.value;
    var ToYearMonth = toMonth.value;

    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (panelName == 'CrystalSellinvList' || panelName == 'RawSellinvList') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
                    if (xmlhttp.responseText != null) {
                        document.getElementById("soldoutDeletedList").innerHTML = xmlhttp.responseText;
                    }
                } else if (navPanelNameDateSearch == 'categorywiseProductslist') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
                    if (xmlhttp.responseText != null) {
                        document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    }
                } else if (navPanelNameDateSearch == 'lesssellingList') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;

                } else if (navPanelNameDateSearch == 'gstsellreport' || navPanelNameDateSearch == 'gstsellreportbyprod' || navPanelNameDateSearch == 'gstimireportbyprod' || navPanelNameDateSearch == 'staffsellreport' || navPanelNameDateSearch == 'sellreportbyproduct' || navPanelNameDateSearch == 'imireportbyproduct') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("sellReportSubDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;


        //
        //

        //
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerMainTransReport" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //             "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //

        if (navPanelNameDateSearch == 'SoldOutCrystalList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogcrspst" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&ToYearDate=" + ToYearDate + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay, true);
        }
        if (navPanelNameDateSearch == 'SoldOutRawList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogcrspst" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'fineJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspsllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'categorywiseProductslist') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omretailfastsellprodlist" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }

        if (navPanelNameDateSearch == 'lesssellingList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omretaillesssellprodlist" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&fromajax=YES", true);
        }
        //<!-- START CODE FOR ADDED DATE FILTER OPTION FOR ESTIMATE SELL AUTHOR @SIMRAN-13OCT2022-->
        if (navPanelNameDateSearch == 'estimateJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspessllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        //<!-- END CODE FOR ADDED DATE FILTER OPTION FOR STONE SELL  @AUTHOR:VINOD-11:JAN:2024-->
        if (navPanelNameDateSearch == 'SoldOutList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspsllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&ToYearDate=" + ToYearDate, true);
        }
        //<!-- END CODE FOR ADDED DATE FILTER OPTION FOR ESTIMATE SELL AUTHOR @SIMRAN-13OCT2022-->
        if (navPanelNameDateSearch == 'fineJewReturnList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogsprtilt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'imitationJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogijspllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=imitation" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'rawMetalSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogrwwscslt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=rawMetal" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'rawMetalIssueSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omrwmetislist" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=RawMetalIssueList" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'stoneSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspisdv" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=crystal" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'fineJewPurchaseList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogwsprdt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        // START THIS CODE FOR OMRETAIL @YUVRAJ 15112022
        if (navPanelNameDateSearch == 'retailStockSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogijspllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'gstsellreport') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omgstinvsell" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'gstsellreportbyprod') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omsellgstpr" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'gstimireportbyprod') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omimigstpr" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'staffsellreport') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omstslrpt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'sellreportbyproduct') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogbbsrbsp" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        if (navPanelNameDateSearch == 'imireportbyproduct') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogbbimibsp" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId + "&FromYearDate=" + FromYearDate + "&FromYearMonth=" + FromYearMonth + "&FromYearDay=" + FromYearDay + "&ToYearDate=" + ToYearDate, true);
        }
        // END THIS CODE FOR OMRETAIL @YUVRAJ 15112022
        xmlhttp.send();
    }
}
// ****************************************************************************************
// END CODE FOR STOCK LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021 
// ****************************************************************************************
function searchStockLedgerDetailsNepali(custId, panelName, navPanelNameDateSearch, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRootBSlash) {
    //
    if (valStockReportInputsNepali()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerMainTransReport" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //             "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        if (navPanelNameDateSearch == 'fineJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspsllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        //<!-- START CODE FOR ADDED DATE FILTER OPTION FOR ESTIMATE SELL AUTHOR @SIMRAN-13OCT2022-->
        if (navPanelNameDateSearch == 'estimateJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspessllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        //<!-- END CODE FOR ADDED DATE FILTER OPTION FOR ESTIMATE SELL AUTHOR @SIMRAN-13OCT2022-->
        if (navPanelNameDateSearch == 'fineJewReturnList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogsprtilt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'imitationJewSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogijspllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=imitation" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'rawMetalSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogrwwscslt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=rawMetal" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'rawMetalIssueSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/omrwmetislist" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=RawMetalIssueList" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'stoneSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogspisdv" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=crystal" + "&custId=" + custId, true);
        }
        if (navPanelNameDateSearch == 'fineJewPurchaseList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogwsprdt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        // START THIS CODE FOR OMRETAIL @YUVRAJ 15112022
        if (navPanelNameDateSearch == 'retailStockSellList') {
            xmlhttp.open("POST", documentRootBSlash + "/include/php/ogijspllt" + default_theme + ".php?panelName=" + panelName + "&navPanelNameDateSearch=" + navPanelNameDateSearch +
                    "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&type=stock" + "&custId=" + custId, true);
        }
        // END THIS CODE FOR OMRETAIL @YUVRAJ 15112022
        xmlhttp.send();
    }
}
// ****************************************************************************************
// START CODE FOR STOCK LEDGER PANEL NAVIGATION LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021
// ****************************************************************************************
function getStockLedgerDatatableReport(documentRoot) {
    //CHANGE FUNCTION FOR OPEN STOCK LEFGER IN ANOTHER TAB : AUTHOR @DARSHANA 11 NOV 2021
    //
    var url = documentRoot + "/include/php/omStockLedgerDatatableReport" + default_theme + ".php";
    window.open(url, '_blank');
}
function getEcomPanel(documentRoot) {
    //CHANGE FUNCTION FOR OPEN STOCK LEFGER IN ANOTHER TAB : AUTHOR @DARSHANA 11 NOV 2021
    //
    var url = documentRoot + "/include/php/omecom/omecomadminpanel" + default_theme + ".php";
    window.open(url, '_blank');
}
// ****************************************************************************************
// END CODE FOR STOCK LEDGER PANEL NAVIGATION LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021
// ****************************************************************************************
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK LEDGER ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-27OCT2021
// ********************************************************************************************************************
function getStockLedgerTransactionsReportPopUp(sttrId, transStockType, transFirmId, transPanelDetailsDisplay, transCategory, transName, transPurity, transMetal, transIndicator, startDate, endDate, documentRoot, stockLedgerPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('transStockType == ' + transStockType);
    //alert('transFirmId == ' + transFirmId);
    //alert('transPanelDetailsDisplay == ' + transPanelDetailsDisplay);
    //alert('transCategory == ' + transCategory);
    //alert('transName == ' + transName);
    //alert('transPurity == ' + transPurity);
    //alert('transMetal == ' + transMetal);
    //alert('transIndicator == ' + transIndicator);    
    //alert('startDate == ' + startDate);
    //alert('endDate == ' + endDate);
    //alert('documentRoot == ' + documentRoot);
    //alert('stockLedgerPanelName == ' + stockLedgerPanelName);    
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            //document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            //
            document.getElementById('myModal').style.display = "block";
            document.getElementById('myModal').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //xmlhttp.open("GET", "omStockLedgerSummaryTransReportPopUpIframe" + default_theme +".php?startDate=" + startDate + 
    //             "&endDate=" + endDate +
    //             "&transFirmId=" + transFirmId + "&transCategory=" + transCategory + 
    //             "&transName=" + transName + "&transStockType=" + transStockType + 
    //             "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
    //             "&documentRoot=" + documentRoot + "&sttrId=" + sttrId, true);
    //
    xmlhttp.open("GET", documentRoot + "/include/php/omStockLedgerSummaryTransReportPopUpIframe" + default_theme + ".php?startDate=" + startDate +
            "&endDate=" + endDate + "&transMetal=" + transMetal + "&transIndicator=" + transIndicator +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId + "&stockLedgerPanelName=" + stockLedgerPanelName, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK LEDGER ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-27OCT2021
// ********************************************************************************************************************
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK LEDGER ALL TRANSACTIONS REPORT POP UP CLOSE @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
function closeStockLedgerTransactionsReportPopUp() {
    document.getElementById('myModal').style.display = "none";
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK LEDGER ALL TRANSACTIONS REPORT POP UP CLOSE @AUTHOR:PRIYANKA-13OCT2021
// ********************************************************************************************************************
//
//
//function showFinanceEMIPageInPanel2(documentRootPath,girviId) {
////    alert(rowsPerPage);
//   
//        loadXMLDoc();
//        xmlhttp.onreadystatechange = function () {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("girviDetailsDiv").innerHTML = xmlhttp.responseText;
//            }
//        };
//        xmlhttp.open("POST", documentRootPath + "/include/php/olggcgdt" + default_theme +".php?girviId=" + girviId, true);
//        xmlhttp.send();
//}
//*******************************************************************************************************************
//START CODE FOR UNSELECT ALL EMP ACCESS : AUTHOR @DARSHANA 1 FEB 2022
//*******************************************************************************************************************
function unselallEmpAcc(staffId, panelName) {
    var empAllAccess = document.getElementById('selectEmpAllAccess').checked;
    var empUnSelectAllAccess = document.getElementById('unselectEmpAllAccess').checked;

    if (empAllAccess == true && empUnSelectAllAccess == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("staffAccess").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("staffAccess").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }

        };
        xmlhttp.open("POST", "include/php/omeuamndv" + default_theme + ".php?empId=" + staffId + "&empUnSelctPanelName=" + panelName, true);
        xmlhttp.send();
    }
}
//*******************************************************************************************************************
//END CODE FOR UNSELECT ALL EMP ACCESS : AUTHOR @DARSHANA 1 FEB 2022
//*******************************************************************************************************************
//
//*******************************************************************************************************************
//START CODE FOR MOVE TO STOCK ON METLING : AUTHOR @DARSHANA 10 FEB 2022
//*******************************************************************************************************************
//
function moveToStockDiv(sttrId, documentRoot, listPanel) {
    if (documentRoot == null || documentRoot == '') {
        var documentRoot = document.getElementById('documentRootPath').value;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalStock').style.display = "block";
            document.getElementById('myModalStock').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (listPanel == 'SelectItemForMelting') {
        xmlhttp.open("POST", documentRoot + "/include/php/ogfinepopIframe" + default_theme + ".php?stId=" + sttrId + "&documentRoot=" + documentRoot + "&listPanel=SelectItemForMelting", true);
    } else {
        xmlhttp.open("POST", documentRoot + "/include/php/ogfinepopIframe" + default_theme + ".php?stId=" + sttrId + "&documentRoot=" + documentRoot + "&panelName=RawMoveToStock", true);
    }
    xmlhttp.send();
}
//
//*******************************************************************************************************************
//END CODE FOR MOVE TO STOCK ON METLING : AUTHOR @DARSHANA 10 FEB 2022
//*******************************************************************************************************************
//*******************************************************************************************************************
//START CODE FOR MOVE TO STOCK ON METLING : AUTHOR @DARSHANA 10 FEB 2022
//*******************************************************************************************************************
//
function readyForMeltingStockDiv(sttrId, documentRoot) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalStock').style.display = "block";
            document.getElementById('myModalStock').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogfinepopIframe" + default_theme + ".php?stId=" + sttrId + "&documentRoot=" + documentRoot + "&panelName=ReadyForMeltingDiv", true);
    xmlhttp.send();
}
//
//*******************************************************************************************************************
//END CODE FOR MOVE TO STOCK ON METLING : AUTHOR @DARSHANA 10 FEB 2022
//*******************************************************************************************************************
//
function closeRawMetalAddStockPopUp() {
    document.getElementById('myModalStock').style.display = "none";
//    window.location.reload();
}
// default_theme parameter is updated in the .php file extension
//
//
//
//
function searchMasterProductCategoryNameFunc(searchMasterProductCategory, searchMasterProductName, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("Masterproductstockdetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/omallmastproupd" + default_theme + ".php?searchMasterProductCategory=" + searchMasterProductCategory +
            "&panelName=" + panelName + "&searchMasterProductName=" + searchMasterProductName, true);
    //
    xmlhttp.send();
    //
}
//
// * **************************************************************************************
// * @tutorial: START ALL MASTER STOCK CODE @AUTHOR:YUVRAJ-13JULLY2022
// * **************************************************************************************

function getAllMasterDetailsGrid(searchMasterProductCategory, searchMasterProductName, panelname) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("Masterproductstockdetails").innerHTML = xmlhttp.responseText;
            document.getElementById('ms_itm_sell_price_input0').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omallmastproupd" + default_theme + ".php?searchMasterProductCategory=" + searchMasterProductCategory +
            "&searchMasterProductName=" + searchMasterProductName + "&panelName=" + panelname, true);
    xmlhttp.send();
}
//
function updateAllMasterpriceOk(onPrice, onPercentage, panelname) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("Masterproductstockdetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//       xmlhttp.open("POST", "include/php/stock/master/ommasterstockincreasebyprinper" + default_theme + ".php?onPrice=" + onPrice +
//                        "&onPercentage=" + onPercentage + "&panelName=" + panelname, true);
    xmlhttp.open("POST", "include/php/stock/master/omallmastproupd" + default_theme + ".php?onPrice=" + onPrice +
            "&onPercentage=" + onPercentage + "&panelName=" + panelname, true);
    xmlhttp.send();
}
//
function backDivMasterStock(panalName, fileName, firmName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("Masterproductstockdetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//       xmlhttp.open("POST", "include/php/stock/master/ommasterstockincreasebyprinper" + default_theme + ".php?onPrice=" + onPrice +
//                        "&onPercentage=" + onPercentage + "&panelName=" + panelname, true);
    xmlhttp.open("POST", "include/php/" + fileName + default_theme + ".php?firmName=" + firmName +
            "&panalName=" + panalName, true);
    xmlhttp.send();
}
// * **************************************************************************************
// * @tutorial: END ALL MASTER STOCK CODE @AUTHOR:YUVRAJ-13JULLY2022
// * **************************************************************************************
// 
// START CODE FOR STOCK TALLY REPORT PANEL @AUTHOR:YUVRAJ-18OCT2022
function searchStockTallyReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        xmlhttp.open("POST", "omStockTallyReportSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
// END CODE FOR STOCK TALLY REPORT PANEL @AUTHOR:YUVRAJ18OCT2022
// 
// 
// 
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// START CODE FOR ADDED STOCK TALLY MULTI BARCODE REPORT @SIMRAN:07DEC2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function searchMultiBarcodeStockTallyReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        xmlhttp.open("POST", "omStockTallyMultibarcodeReportSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// END CODE FOR ADDED STOCK TALLY MULTI BARCODE REPORT @SIMRAN:07DEC2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//
//
// START CODE FOR STOCK TALLY SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
function searchStockLedgerSummaryReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.open("POST", "omStockLedgerSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
//code for nepali date:
function searchStockLedgerSummaryReportDetailsNepali(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputsNepali()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.open("POST", "omStockLedgerSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }

}
// END CODE FOR STOCK TALLY SUMMARY PANEL @AUTHOR:PRIYANKA-11OCT2021
// 
// 
//
//  
// ****************************************************************************************
// START CODE FOR STOCK LEDGER - DATATABLE PANEL @AUTHOR:PRIYANKA-29APR2023
// ****************************************************************************************
function searchStockLedgerSummaryDatatableReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRootBSlash) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockLedgerReportMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        xmlhttp.open("POST", documentRootBSlash + "/include/php/omStockLedgerMainTransReport" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
        //
    }
    //
}
// ****************************************************************************************
// END CODE FOR STOCK LEDGER - DATATABLE PANEL @AUTHOR:PRIYANKA-29APR2023
// **************************************************************************************** 
// 
// 
function searchStockTallyRFIDNewSummaryReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallyReportSummary.php
        //omStockTallySummary.php
        xmlhttp.open("POST", "omStockTallyReportSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
//
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//START CODE FOR TO ADD MULTI BARCODE STOCK TALLY REPORT @SIMRAN:21NOV2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function searchMultiBarcodeStockTallySummaryReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallyReportSummary.php
        //omStockTallySummary.php
        xmlhttp.open("POST", "omStockTallyMultibarcodeReportSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//END CODE FOR TO ADD MULTI BARCODE STOCK TALLY REPORT @SIMRAN:21NOV2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  
//   
// 
// START CODE FOR STOCK TALLY SUMMARY PANEL @AUTHOR:YUVRAJ - 02112022
function searchStockTallySummaryReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallyReportSummary.php
        //omStockTallySummary.php
        xmlhttp.open("POST", "omStockTallySummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
// END CODE FOR STOCK TALLY SUMMARY PANEL @AUTHOR:YUVRAJ - 02112022
// ****************************************************************************************
// START CODE FOR SEARCH STOCK RFID TALLY SUMMARY PANEL DETAILS @AUTHOR:YUVRAJ 19112022
// ****************************************************************************************
function searchStockTallySummaryReportDetailsByColumn(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear,
        searchColumnMetal, searchValueMetal, searchColumnCategory, searchValueCategory, searchColumnName, searchValueName) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockTallyReportPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary" + default_theme +".php?firmId=" + firmId + "&panelName=" + panelName +
        //        "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //omStockTallyReportSummary.php
        xmlhttp.open("POST", "omStockTallyReportSummary" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate +
                "&searchColumnMetal=" + searchColumnMetal + "&searchValueMetal=" + searchValueMetal +
                "&searchColumnCategory=" + searchColumnCategory + "&searchValueCategory=" + searchValueCategory +
                "&searchColumnName=" + searchColumnName + "&searchValueName=" + searchValueName, true);
        //
        xmlhttp.send();
    }
}
// ****************************************************************************************
// END CODE FOR SEARCH STOCK RFID TALLY SUMMARY PANEL DETAILS @AUTHOR:YUVRAJ 19112022
// ****************************************************************************************
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR TALLY RFID STOCK SUMMARY ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:YUVRAJ 25112022
// ********************************************************************************************************************
function getStockSummaryTransactionsReportPopUpRfidTally(sttrId, startDateTime, endDateTime, startDate, endDate, transFirmId, transCategory, transName, transStockType, transPurity, transPanelDetailsDisplay, documentRoot, panelNameStockTally, productCodeRfid) {
    // 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            //document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            //
            document.getElementById('myModal' + sttrId).style.display = "block";
            document.getElementById('myModal' + sttrId).innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "omStockLedgerSummaryTransReportPopUpIframe" + default_theme + ".php?startDateTime=" + startDateTime +
            "&endDateTime=" + endDateTime + "&startDate=" + startDate + "&endDate=" + endDate +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId + "&panelNameStockTally=" + panelNameStockTally + "&productCodeRfid=" + productCodeRfid, true);
    //
    //xmlhttp.open("GET", "include/php/omStockLedgerSummaryTransReportPopUpIframe" + default_theme +".php?startDateTime=" + startDateTime + 
    //             "&endDateTime=" + endDateTime + "&startDate=" + startDate + "&endDate=" + endDate +
    //             "&transFirmId=" + transFirmId + "&transCategory=" + transCategory + 
    //             "&transName=" + transName + "&transStockType=" + transStockType + 
    //             "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
    //             "&documentRoot=" + documentRoot + "&sttrId=" + sttrId, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR TALLY RFID STOCK SUMMARY ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:YUVRAJ 25112022
// ********************************************************************************************************************
//
function showFineMovedStockList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommovedstocklist.php", true);
    xmlhttp.send();
}
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR REFRESH METAL VALUATION PAYMENT PANEL @AUTHOR:PRIYANKA-07FEB2023
// ******************************************************************************************************************** 
function refreshMetalValuationPaymentPanel(utin_prod_qty, utin_prod_unit_price, prod_total_amount, userId, payPreInvoiceNo, payInvoiceNo, panelName, prod_details) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MetalValPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omPaymentMetalValuation1" + default_theme + ".php?utin_prod_qty=" + utin_prod_qty
            + "&utin_prod_unit_price=" + utin_prod_unit_price + "&prod_total_amount=" + prod_total_amount + "&userId=" + userId
            + "&preInvNo=" + payPreInvoiceNo + "&postInvNo=" + payInvoiceNo + "&panelName=" + panelName + "&prod_details=" + prod_details, true);
    xmlhttp.send();
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR REFRESH METAL VALUATION PAYMENT PANEL @AUTHOR:PRIYANKA-07FEB2023
// ********************************************************************************************************************
//
//
//
//START CODE TO CREATE GLOBLE GET INVOICE NO FUNCTION in JAVASCRIPT PRATHAMESH
function getInvoiceFormB2(slPrPreInvoiceNo, userId, stockType, transType, firmId, metalType, currentInvDate, panelName) {
//    console.log(slPrPreInvoiceNo+'-'+userId+'-'+stockType+'-'+transType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            console.log(xmlhttp.responseText);
            invNo = xmlhttp.responseText.split("*");
            if (transType == 'PURBYSUPP' || transType == 'PURCHASE_QUOTATION') {
                document.getElementById("sttr_pre_invoice_no").value = invNo[0];
                document.getElementById("sttr_invoice_no").value = invNo[1];
            } else {
                document.getElementById("slPrPreInvoiceNo").value = invNo[0];
                document.getElementById("slPrInvoiceNo").value = invNo[1];
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgetinvoicenoform" + default_theme + ".php?slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&userId=" + userId
            + "&stockType=" + stockType + "&transType=" + transType + "&firmId=" + firmId + "&metalType=" + metalType + "&currentInvDate=" + currentInvDate + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//END CODE TO CREATE GLOBLE GET INVOICE NO FUNCTION in JAVASCRIPT PRATHAMESH
//
//START CODE TO CREATE GLOBLE GET METAL RATE FUNCTION in JAVASCRIPT PRATHAMESH
function getMetalRateByPurity(purity) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText == '') {
                alert('Please Set Metal Rate !');
            } else {
                document.getElementById("advanceMetalRate").value = xmlhttp.responseText;
                //
                let metRate = parseInt(document.getElementById("advanceMetalRate").value);
                if (metRate.toString().length == 4 || metRate.toString().length == 3) {
                    gdWt = (document.getElementById("advMoneyAmt").value * 1) / document.getElementById("advanceMetalRate").value;
                    document.getElementById("advanceMetalWt").value = (gdWt).toFixed(3);
                } else if (metRate.toString().length == 5) {
                    gdWt = (document.getElementById("advMoneyAmt").value * 10) / document.getElementById("advanceMetalRate").value;
                    document.getElementById("advanceMetalWt").value = (gdWt).toFixed(3);
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgetmetratebypurity" + default_theme + ".php?purity=" + purity, true);
    xmlhttp.send();
}
//END CODE TO CREATE GLOBLE GET METAL RATE FUNCTION in JAVASCRIPT PRATHAMESH
//
//START CODE TO VALIDATE ONLY NUMBER WITH MINUS PRATHAMESH 03MAR2024
function valKeyPressedForNumberWithMinus(evt) {
    var ccharCode = (evt.which) ? evt.which : event.keyCode;
    if (ccharCode == 8 || ccharCode == 45) {
        return true;
    }
    if ((ccharCode < 48 || ccharCode > 57)) {
        return false;
    }
    return true;
}
//END CODE TO VALIDATE ONLY NUMBER WITH MINUS PRATHAMESH 03MAR2024
//
//START CODE TO MAKE PURCHASE QUOTATION PRATHAMESH
function makePurchaseQuotation(payPanelName, userId, preInvNo, invNo, firmId) {
    confirm_box = confirm("Do You Really Want To Make Quotation?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'Done') {
                    navigatationPanelByFileName('cust_middle_body', 'ompurestimatelist', '', 'PurchaseQuotationList', 'PurchaseQuotationList', '', '', '', userId, '', '', '', firmId);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ompurquotation" + default_theme + ".php?userId=" + userId
                + "&preInvNo=" + preInvNo + "&invNo=" + invNo + "&payPanelName=" + payPanelName, true);
        xmlhttp.send();
    }
    //
}
// END CODE TO MAKE PURCHASE QUOTATION PRATHAMESH
// START TO DELETE ITEM FROM QUOTAION
function deletePurQutationItms(payPanelName, sttrId, suppId, firmId) {
    //
    confirm_box = confirm("Do You Really Want To Delete This Item?");
    //
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //
                if (payPanelName == 'deletePurQutationList') {
                    navigatationPanelByFileName('cust_middle_body', 'ompurestimatelist', '', 'PurchaseQuotationList', 'PurchaseQuotationList', '', '', '', suppId, '', '', '', firmId);
                } else if (payPanelName == 'delPurQutationList') {
                    getMainSellPurchasePanel('estPurchaseQuotationList');
                } else
                    navigatationPanelByFileName('cust_middle_body', 'ogwadquo', 'PurchaseQuotation', 'rawMetal', 'PURBYSUPP', '', '', 'rawMetal', suppId, 'BUY', 'Customer', '', firmId);
                //
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ompurquotation" + default_theme + ".php?sttrId=" + sttrId + "&payPanelName=" + payPanelName + "&suppId=" + suppId, true);
    }
    xmlhttp.send();
}
//
//START CODE TO MAKE PURCHASE INVOICE PRATHAMESH
function makeEstimatePurchaseInvoiceFunc(payPanelName, sttrId, suppId, firmId, preInvNo, invNo) {
    //
    if (payPanelName == 'makeInvoiceOldPurchase' || payPanelName == 'ShowPaymentPanel') {
        confirm_box = confirm("Do You Really Want To Make this Items Invoice ?");
    } else if (payPanelName == 'deletePurMakeInvoiceItms') {
        confirm_box = confirm("Do You Really Want To Delete this Items ?");
    }

    //
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //
                document.getElementById("EstimateList").innerHTML = xmlhttp.responseText;
                //
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ompurquotation" + default_theme + ".php?sttrId=" + sttrId + "&payPanelName=" + payPanelName + "&suppId=" + suppId + "&firmId=" + firmId
                + "&preInvNo=" + preInvNo + "&invNo=" + invNo, true);
    }
    xmlhttp.send();
}
//END CODE TO PURCHASE QUOTATION PRATHAMESH
function searchtrancecrdr(sellPrCustId, fromDay, fromMonth, fromYear, toDateDay, toDateMonth, toDateYear) {
    // Prepare the data to be sent in the AJAX request
    var data = {
        CustId: sellPrCustId,
        fromDay: fromDay.value,
        fromMonth: fromMonth.value,
        fromYear: fromYear.value,
        toDateDay: toDateDay.value,
        toDateMonth: toDateMonth.value,
        toDateYear: toDateYear.value,
        searchedbydate: 'YES'
    };
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/om_crdr_trans_list.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const params = Object.keys(data)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(data[key]))
            .join('&');//added for get more data
    xmlhttp.send(params);
}

function calculateRemainingWeight(wastage_percent = null, wastage_weight = null, calculateById = 'percentage', wstbyweight) {
    let wastage = 0;
    let remaining_weight = 0;
    if (wstbyweight == 'wastageByFineWt') {
        gs_weight = document.getElementById("sttr_fine_weight").value;
    } else if (wstbyweight == 'wastageByNetWt') {
        gs_weight = document.getElementById("sttr_nt_weight").value;
    } else if (wstbyweight == 'wastageByGrossWt') {
        gs_weight = document.getElementById("sttr_gs_weight").value;
    } else {
        gs_weight = document.getElementById("sttr_nt_weight").value;
    }
    if (gs_weight == null || gs_weight == '') {
        gs_weight = 0;
    }
    if (calculateById === 'percentage' && wastage_percent !== null) {
        // Calculate wastage based on percentage
        wastage = (gs_weight * wastage_percent) / 100;
        wastage = parseFloat(wastage).toFixed(3);
//        remaining_weight = gs_weight - wastage;
        document.getElementById("sttr_wastage_wight").value = wastage;
    } else if (calculateById === 'weight' && wastage_weight !== null) {
        // Use the provided wastage weight
        calculated_wastage_percent = (wastage_weight / gs_weight) * 100;
        calculated_wastage_percent = parseFloat(calculated_wastage_percent).toFixed(2);
        document.getElementById("sttr_wastage").value = calculated_wastage_percent;

    }

    if (document.getElementById('sttr_purity').value != '') {
        document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_wastage').value) + parseFloat(document.getElementById('sttr_purity').value));
        if (document.getElementById('orderreturnpalne') == null) {
            calcFuncSupplierFineJewelleryPurchase();
        }
}


}
function calculatewastagewt(calculateById = 'percentage', weigthOrPrec) {
    let wastage = 0;
    let remaining_weight = 0;
    var wstbyweight = document.getElementById("sttr_wastage_by").value;

    if (wstbyweight == 'custWastgByFineWt') {
        gs_weight = document.getElementById("sttr_fine_weight").value;
    } else if (wstbyweight == 'custWastgByNetWt') {
        gs_weight = document.getElementById("sttr_nt_weight").value;
    } else if (wstbyweight == 'custWastgByGrossWt') {
        gs_weight = document.getElementById("sttr_gs_weight").value;
    } else {
        gs_weight = document.getElementById("sttr_nt_weight").value;
    }
    if (gs_weight == null || gs_weight == '') {
        gs_weight = 0;
    }
    if (calculateById === 'percentage' && weigthOrPrec !== null) {
        // Calculate wastage based on percentage
        wastage = (gs_weight * weigthOrPrec) / 100;
        wastage = parseFloat(wastage).toFixed(3);
//        remaining_weight = gs_weight - wastage;
        document.getElementById("sttr_wastage_wight").value = wastage;
    } else if (calculateById === 'weight' && weigthOrPrec !== null) {
        // Use the provided wastage weight
        calculated_wastage_percent = (weigthOrPrec / gs_weight) * 100;
        calculated_wastage_percent = parseFloat(calculated_wastage_percent).toFixed(2);
        document.getElementById("sttr_wastage").value = calculated_wastage_percent;

    }
    if (document.getElementById('sttr_purity').value != '') {
        document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById("sttr_wastage").value) + parseFloat(document.getElementById('sttr_purity').value));
}
}
//prathamesh start code for direct quotation panel
function setActiveLi(element) {
    const navItems = document.querySelectorAll('.nav_li');
    navItems.forEach(item => item.classList.remove('active'));
    const parentLi = element.parentElement;
    parentLi.classList.add('active');
}
//prathamesh end code for direct quotation panel
function searchItemByItemIdForQuotation(searchItemId, panelName, custId, firmId, preInvNo, InvNo, staffId, date) {
    let fineItemCount = document.getElementById('fineItemCount').value;
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = tempLen;
    var alphaExp = /#/;
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(tempLen - 1);
        searchItemIdTemp = searchItemIdTemp.substr(0, tempLen - 1);
        if (isNaN(field) == false) {
            charLen = charLen - 1;
        } else if (field.match(alphaExp)) {
            charLen = charLen;
            break;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen, searchItemId.length);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText == '0') {
                alert('Item Not Available!');
            } else {
                let data = xmlhttp.responseText.split("#");
                let crData = data[1].split("|");
                let trData = data[0].split("*");
                let salesTotalAmount = document.getElementById('salesAmount').value;
                const tbody = document.getElementById('quotationItemsRow');
                const newRow = document.createElement('tr');
                newRow.className = 'table_row';
                for (let i = 0; i <= trData.length; i++) {
                    const newCell = document.createElement('td');
                    newCell.textContent = trData[i];
                    newRow.appendChild(newCell);
                }
                document.getElementById('salesAmount').value = parseFloat(salesTotalAmount) + parseFloat(trData[9]);
                tbody.appendChild(newRow);
                //
                if (crData.length > 0) {
                    crData.forEach(rowData => {
                        const tbody1 = document.getElementById('quotationItemsCrystalRow');
                        const newRow = document.createElement('tr');
                        newRow.className = 'table_crystal_row';
                        const columns = rowData.split('*');
                        columns.forEach(cellData => {
                            const newCell = document.createElement('td');
                            newCell.textContent = cellData;
                            newRow.appendChild(newCell);
                        });
                        tbody1.appendChild(newRow);
                    });
                }
                document.getElementById('fineItemCount').value = ++fineItemCount;

            }
            document.getElementById('srchItemId').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omquotationitems" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
            "&custId=" + custId + "&firmId=" + firmId + "&panelName=" + panelName + "&charLen=" + charLen + "&date=" + date +
            "&staffId=" + staffId + "&InvNo=" + InvNo + "&preInvNo=" + preInvNo + "&fineItemCount=" + fineItemCount, true);
    xmlhttp.send();
}
//
function calcQuotationAmount() {
    let totalPrevInvoices = document.getElementById('totalPrevInvoices').value;
    let totalPrevAmount = 0;
    //    
    for (let i = 1; i <= totalPrevInvoices; i++) {
        let utin_cash_CRDR = document.getElementById('utin_cash_CRDR' + i).value;
        let utin_cash_balance = parseFloat(document.getElementById('utin_cash_balance' + i).value);
        let preInvoiceChk = document.getElementById('preInvoice' + i).checked;
        //
        if (preInvoiceChk == true) {
            if (utin_cash_CRDR == 'CR') {
                totalPrevAmount -= utin_cash_balance;
            } else if (utin_cash_CRDR == 'DR') {
                totalPrevAmount += utin_cash_balance;
            }
        }
    }
    if (totalPrevAmount) {
        document.getElementById('previousAmount').value = parseFloat(totalPrevAmount).toFixed(2);
    } else {
        document.getElementById('previousAmount').value = parseFloat(0).toFixed(2);
    }
    //
}
//
function openRawMetalRecPopup(custId, invoice_no) {
    let documentRoot = document.getElementById('documentRootPath').value;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("OldMetalRecDiv").style.display = 'block';
            document.getElementById("OldMetalRecDiv").innerHTML = xmlhttp.responseText;
        } else {

        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omdirectquotationraw" + default_theme + ".php?documentRoot=" + documentRoot + "&custId=" + custId + "&invoice_no=" + invoice_no, true);
    xmlhttp.send();
}
//
function calculateQuotationRawMetalVal() {
    let sttr_gs_weight = document.getElementById('sttr_gs_weight').value;
    let sttr_less_weight = document.getElementById('sttr_less_weight').value || 0;
    let sttr_nt_weight = parseFloat(sttr_gs_weight) - parseFloat(sttr_less_weight);
    document.getElementById('sttr_nt_weight').value = sttr_nt_weight;
    let sttr_purity_kt = document.getElementById('sttr_purity_kt').value;
    let sttr_purity = ((sttr_purity_kt / 24) * 100).toFixed();
    let sttr_final_valuation_by = document.getElementById('sttr_final_valuation_by').value;
    let sttr_metal_rate = document.getElementById('sttr_metal_rate').value || 0;
    let gmWtInGm = document.getElementById('gmWtInGm').value || 1;
    let sttr_fine_weight = ((sttr_nt_weight * sttr_purity) / 100).toFixed(2);
    document.getElementById('sttr_fine_weight').value = sttr_fine_weight;
    let sttr_final_fine_weight = sttr_fine_weight;
    let sttr_final_valuation = 0;
    let sttr_metal_wt = 0;
    document.getElementById('sttr_final_fine_weight').value = sttr_final_fine_weight;
    //
    if (sttr_final_valuation_by == 'byFFineWt') {
        sttr_metal_wt = sttr_final_fine_weight;
    } else if (sttr_final_valuation_by == 'byFineWt') {
        sttr_metal_wt = sttr_fine_weight;
    } else if (sttr_final_valuation_by == 'byNetWt') {
        sttr_metal_wt = sttr_nt_weight;
    } else if (sttr_final_valuation_by == 'byGrossWt') {
        sttr_metal_wt = sttr_gs_weight;
    } else {
        sttr_metal_wt = sttr_nt_weight;
    }
    //
    sttr_final_valuation = ((sttr_metal_wt * sttr_metal_rate) / gmWtInGm).toFixed(2);
    document.getElementById('sttr_final_valuation').value = sttr_final_valuation;
}
//
function searchlondaetailwithitem(fromDay, fromMonth, fromYear, toDateDay, toDateMonth, toDateYear, fromreport, custId = '') {
    // Prepare the data to be sent in the AJAX request
    var data = {
        fromDay: fromDay.value,
        fromMonth: fromMonth.value,
        fromYear: fromYear.value,
        toDateDay: toDateDay.value,
        toDateMonth: toDateMonth.value,
        toDateYear: toDateYear.value,
    };
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (fromreport == 'fromallloan') {
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
            } else if (fromreport == 'custalltransac') {

                document.getElementById("custalltransactiondiv").innerHTML = xmlhttp.responseText;//hrushali
            } else {
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (fromreport == 'fromallloan') {
        xmlhttp.open("POST", "include/php/omallnrpwitems.php", true);
    } else if (fromreport == 'fromallloandetails') {
        xmlhttp.open("POST", "include/php/omallnrp.php", true);
    } else if (fromreport == 'custalltransac') {
        xmlhttp.open("POST", "include/php/ompyutrdt2.php?custId=" + encodeURIComponent(custId), true);
    } else {
        xmlhttp.open("POST", "include/php/omitmdetbyprinc.php", true);
    }
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const params = Object.keys(data)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(data[key]))
            .join('&');//added for get more data
    xmlhttp.send(params);
}
function exportTableToExcel(tableID, filename = '') {

    var table = document.getElementById(tableID);

    var hiddenRows = table.querySelectorAll('tr[style*="display: none"]');
    hiddenRows.forEach(function (row) {
        row.style.display = 'table-row';
    });

    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.table_to_sheet(table);

    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    filename = filename ? filename + '.xlsx' : 'excel_data.xlsx';

    XLSX.writeFile(wb, filename);

    hiddenRows.forEach(function (row) {
        row.style.display = 'none';
    });
}
function easyupdateecom(presskey, sttr_id)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById(divPanelName).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",
            "omaddecomproduct" + default_theme + ".php?pressKey=" + presskey + "&sttr_id=" + sttr_id, true);
    xmlhttp.send();
}
function setPaymentGateway(form_status)
{
    var payType = document.getElementById('payType').value;
    var merchantId = document.getElementById('merchantId').value;
    var secreteKey = document.getElementById('secreteKey').value;
    var indexpay = document.getElementById('index').value;
    if (merchantId == null || merchantId == '' || secreteKey == null || secreteKey == '' || indexpay == null || indexpay == '')
    {
        document.getElementById('paymentDetailsDiv').innerHTML = '~~Enter Valid Field~~';
        return false
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('paymentDetailsDiv').innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",
            "omecompayment" + default_theme + ".php?payType=" + payType + "&merchantId=" + merchantId + "&secreteKey=" + secreteKey + "&indexpay=" + indexpay, true);
    xmlhttp.send();
}
function showproductaccordingtodata(divPanelName, metalType, category, productName, limit, offset, gonext, firm_id) {
//    alert('innnn'+gonext);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            checkAll = true;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('productlist').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST",
            "omecomitemlist" + default_theme + ".php?panel=showProductDet&metalType=" + metalType + "&category=" + category + "&productName=" + productName + "&limit=" + limit + "&offset=" + offset + "&gonext=" + gonext + "&firmId=" + firm_id, true);
    xmlhttp.send();
}
function sendCheckedAndUncheckedValues() {
    loadXMLDoc();

    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.checkboxclass');

    // Separate checked and unchecked values
    const checkedValues = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

    const uncheckedValues = Array.from(checkboxes)
            .filter(checkbox => !checkbox.checked)
            .map(checkbox => checkbox.value);

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            // Handle the response from the server
            // console.log('Response from server:', xmlhttp.responseText);
        }
    };

    xmlhttp.open("POST", "omaddmultecom" + default_theme + ".php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send both checked and unchecked values
    const data = 'checkedValues=' + encodeURIComponent(checkedValues.join(','))
            + '&uncheckedValues=' + encodeURIComponent(uncheckedValues.join(','));

    xmlhttp.send(data);

    checkAll = true;

    // Refresh or show updated data based on user selection
    showproductaccordingtodata('itemInformation',
            document.getElementById('metalType').value,
            document.getElementById('category').value,
            document.getElementById('itemName').value,
            document.getElementById('limitofstock').value
            );
}
function hidedropdown(divid) {
    setTimeout(function () {
        document.getElementById(divid).innerHTML = "";
    }, 2000);
}

let checkAll = true;
function toggleCheckboxes() {
    const checkboxes = document.querySelectorAll('.checkboxclass');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = checkAll;
    });
    checkAll = !checkAll;
}
function getmsstocklimit(limit, page = 1) {
    alert
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            document.getElementById("ECommTablesDiv").innerHTML = xmlhttp.responseText;
            //
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omecomcustmsproduct" + default_theme + ".php?limit=" + limit + "&page=" + page, true);
    xmlhttp.send();

}
function getmsterstocksugestion(searchvalue) {
    alert
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            document.getElementById("msitemdeatildiv").innerHTML = xmlhttp.responseText;
            //
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omecomgetprodbycat" + default_theme + ".php?searchvalue=" + searchvalue, true);
    xmlhttp.send();

}
function validateMinMax(count) {
    const minQty = document.getElementById(`minqyt${count}`).value;
    const maxQty = document.getElementById(`maxqyt${count}`).value;
    const minSize = document.getElementById(`minsize${count}`).value;
    const maxSize = document.getElementById(`maxsize${count}`).value;
    const minWeight = document.getElementById(`minweight${count}`).value;
    const maxWeight = document.getElementById(`maxweight${count}`).value;
    const numberPattern = /^-?\d+(\.\d+)?$/;  // Matches integers and decimal numbers
    function isNumeric(value) {
        return numberPattern.test(value);
    }
    if ((minQty && !maxQty) || (!minQty && maxQty)) {
        alert("Please enter both Min and Max Quantity.");
        return false;
    }

    if ((minSize && !maxSize) || (!minSize && maxSize)) {
        alert("Please enter both Min and Max Size.");
        return false;
    }

    if ((minWeight && !maxWeight) || (!minWeight && maxWeight)) {
        alert("Please enter both Min and Max Weight.");
        return false;
    }
    if ((minQty && !isNumeric(minQty)) || (maxQty && !isNumeric(maxQty))) {
        alert("Please enter only numeric values for Quantity.");
        return false;
    }

    if ((minSize && !isNumeric(minSize)) || (maxSize && !isNumeric(maxSize))) {
        alert("Please enter only numeric values for Size.");
        return false;
    }

    if ((minWeight && !isNumeric(minWeight)) || (maxWeight && !isNumeric(maxWeight))) {
        alert("Please enter only numeric values for Weight.");
        return false;
    }
    if (minQty && maxQty && parseFloat(minQty) > parseFloat(maxQty)) {
        alert("Min Quantity cannot be greater than Max Quantity.");
        return false;
    }
    if (minSize && maxSize && parseFloat(minSize) > parseFloat(maxSize)) {
        alert("Min Size cannot be greater than Max Size.");
        return false;
    }
    if (minWeight && maxWeight && parseFloat(minWeight) > parseFloat(maxWeight)) {
        alert("Min Weight cannot be greater than Max Weight.");
        return false;
    }
    return true;
}
function updatemsstock(count) {
    if (!validateMinMax(count)) {
        return;
    }
    const minQty = document.getElementById(`minqyt${count}`).value;
    const maxQty = document.getElementById(`maxqyt${count}`).value;
    const minSize = document.getElementById(`minsize${count}`).value;
    const maxSize = document.getElementById(`maxsize${count}`).value;
    const sizeType = document.getElementById(`sizetype${count}`).value;
    const minWeight = document.getElementById(`minweight${count}`).value;
    const maxWeight = document.getElementById(`maxweight${count}`).value;
    const point = document.getElementById(`ponitvalue${count}`).value;
    const ms_id = document.getElementById(`ms_id${count}`).value;
    const modelno = document.getElementById(`modelno${count}`).value;
    const data = {
        min_qty: minQty,
        max_qty: maxQty,
        min_size: minSize,
        max_size: maxSize,
        size_type: sizeType,
        min_weight: minWeight,
        max_weight: maxWeight,
        point: point,
        modelno: modelno,
        item_id: ms_id
    };
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText == 'sucess') {
                document.getElementById("msgdivid").style.display = 'block';
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omecomupdatestock.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const params = Object.keys(data)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(data[key]))
            .join('&');
    xmlhttp.send(params);
}
function addloanInBox(count) {
    const avilboxqyt = document.getElementById("maxqyt").value;
   var otherinfo = document.getElementById('otherinfo' + count).value;
    const pktwt = document.getElementById(`pktwt${count}`).value;
    const pouchno = document.getElementById(`pouchno${count}`).value;
    const selectBox = document.getElementById("boxName").value;
    const girvid = document.getElementById("girvid").value;
    let documentRoot = document.getElementById('documentRootPath').value;

    if (selectBox == '' || selectBox == null) {
        alert('Please select loan box name!');
        document.getElementById("boxName").focus();
        return false;
        exit();
    }
    if (pktwt == '' || pktwt == null) {
        alert('Please enter packet weight!');
        document.getElementById(`pktwt${count}`).focus();
        return false;
        exit();
    }

    if (pouchno == '' || pouchno == null) {
        alert('Please Enter Pouch Number!');
        document.getElementById(`pouchno${count}`).focus();
        return false;
        exit();
    }

    var cnt = 1;
    if (cnt <= avilboxqyt) {
        //
    } else {
        alert('Please change loan box!');
        document.getElementById("boxName").focus();
        return false;
        exit();
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('mainMiddle').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
   xmlhttp.open("POST", documentRoot + "/include/php/omloanboxreport" + default_theme + ".php?selectBox=" + selectBox + "&pktwt=" + pktwt + "&pouchno=" + pouchno + "&avilboxqyt=" + avilboxqyt + "&girvid=" + girvid + "&otherinfo=" + encodeURIComponent(otherinfo) + "&panelName=uploanbox", true);
    xmlhttp.send();
}


//end code for new ecom add mutlipe stock and master product update :Omkar
//
function ecomPanelReports(divName, fileName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", fileName + default_theme + ".php", true);
    xmlhttp.send();
    //
    return false;
}

function OpenEcomHelpModal() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModal').style.display = "block";
            document.getElementById('myModal').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omecomhelppopupdiv" + default_theme + ".php", true);
    xmlhttp.send();
}
function checkOrderTrack(orderId, invoice_no, utin_id) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModal').style.display = "block";
            document.getElementById('myModal').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omshiptrackorder" + default_theme + ".php?orderId=" + orderId + "&invoiceNo=" + invoice_no + "&utin_id=" + utin_id, true);
    xmlhttp.send();
}
function updateshipOrderId(orderId, utin_id) {
    if (orderId == null || orderId == '')
    {
        alert('Please Enter Valid Order Id....');
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('checkshiptrack').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omordertrack" + default_theme + ".php?operation=insert&orderId=" + orderId + "&utin_id=" + utin_id, true);
    xmlhttp.send();
}

function CloseEcomHelpModal() {
    document.getElementById('myModal').style.display = "none";
}

function validatePurityField(element) {
    const value = element.value;
    // Check if the value is numeric
    if (!/^\d+$/.test(value)) {
        element.value = ""; // Clear the input if it's invalid
    }
}
// START FUNCTION FOR ECOM PANEL CATEGORY IMAGE UPLOAD 6 JUN 2025 GANESH
function CategoryFilterEcom(divPanelName, metalType, category, limit, offset, gonext) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            checkAll = true;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('productlist').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omecomcategorylist" + default_theme + ".php?panel=showProductDet&metalType=" + metalType + "&category=" + category + "&limit=" + limit + "&offset=" + offset + "&gonext=" + gonext, true);
    xmlhttp.send();
}
//END FUNCTION FOR ECOM PANEL CATEGORY IMAGE UPLOAD 6 JUN 2025 GANESH