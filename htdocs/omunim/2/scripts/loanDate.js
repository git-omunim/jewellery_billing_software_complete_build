/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/********Start code to add code for loan hindi date update @Author:PRIYA21APR15************************/
function addNewGirviHindi() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addGirviSubButDiv").style.visibility = "hidden";
    //Start to change in function @Author:SHRI07APR15
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
            'loanEngConvDay', 'loanEngConvMonth', 'loanEngConvYear');

    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
//End to change code to add condition for girvi date @Author:SHRI31MAR15
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        return false;
        exit();
    } else {
        var girviType = document.getElementById("girviType").value;
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addGirviSubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
        /***** START CODE TO ADD ItemEntered @AUTHOR:PRIYA26JAN13*******/
        if (girviType == 'Sec.Loan') {
            if (validateAddGirviInputs()) {
                document.getElementById("itemEntered").value = itemEntered;
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
            }
        } else {
            if (validateAddPacketInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        return false;
    }
    return false;
}
/********End code to add code for update loan hindi date update @Author:PRIYA21APR15************************/
/********Start code to add code for update loan hindi date update @Author:PRIYA21APR15************************/
function updateGirviDOBAmountHindi(documentRootPath, custId, girviId, DOBDay, DOBMonth, DOBYear, jrnlId, panelName, gTransId, girviDOB,
        girviFirmId, girviSerialNum, prinAmt) {
    upDatePanelName = panelName;
    document.getElementById("updateGirviDOBButton").style.visibility = "hidden";
    var girviDateDay = DOBDay.value;
    var girviDateMMM = DOBMonth.value;
    var girviDateYY = DOBYear.value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("updateDOBYear").value, document.getElementById("updateDOBMonth").value, document.getElementById("updateDOBDay").value,
            'updateDOBHDay', 'updateDOBHMonth', 'updateDOBHYear');
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("updateDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
        return false;
        exit();
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("updateDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateGirviDOBButton").style.visibility = "visible";
            return false;
            exit();
        }
        if (validateSelectField(girviDateDay, "Please select Girvi Date Day!") == false) {
            document.getElementById("updateDOBDay").focus();
            document.getElementById("updateGirviDOBButton").style.visibility = "visible";
            return false;
        } else if (validateSelectField(girviDateMMM, "Please select Girvi Date Month!") == false) {
            document.getElementById("updateDOBMonth").focus();
            document.getElementById("updateGirviDOBButton").style.visibility = "visible";
            return false;
        } else if (validateSelectField(girviDateYY, "Please select Girvi Date Year!") == false) {
            document.getElementById("updateDOBYear").focus();
            document.getElementById("updateGirviDOBButton").style.visibility = "visible";
            return false;
        } else {
            confirm_box = confirm("Do you really want to update Girvi Date?");
            if (confirm_box == true) {
                var str = "&updateDOBHDay=" + (document.getElementById("updateDOBHDay").value)
                        + "&updateDOBHMonth=" + (document.getElementById("updateDOBHMonth").value)
                        + "&updateDOBHYear=" + (document.getElementById("updateDOBHYear").value);
                var poststr = "custId=" + custId + "&girviId=" + girviId
                        + "&girviDOBDay=" + girviDateDay + "&girviDOBMonth=" + girviDateMMM +
                        "&girviDOBYear=" + girviDateYY + "&jrnlId=" + jrnlId + "&panelName=" + panelName
                        + "&girviTransId=" + gTransId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                        + "&girviSerialNum=" + girviSerialNum + "&prinAmt=" + prinAmt + str;
                update_girvi_DOB_amount(documentRootPath + '/include/php/olgugvdd.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
            }
        }
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
    }
    return false;
}
/********End code to add code for update loan hindi date update @Author:PRIYA21APR15************************/
/********Start code to add code for add Principal dob @Author:PRIYA21APR15************************/
function updateGirviAddPrincipalHindi(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "visible";
    if (validateUpdateGirviAddPrincipalInputs(obj)) {

        var girviDateDay = document.getElementById("addPrinDOBDay").value;
        var girviDateMMM = document.getElementById("addPrinDOBMonth").value;
        var girviDateYY = document.getElementById("addPrinDOBYear").value;
        var girviDateStr = UpdateIndianCivil(document.getElementById("addPrinDOBYear").value, document.getElementById("addPrinDOBMonth").value, document.getElementById("addPrinDOBDay").value,
                'DOBHDayForAddPrinc', 'DOBHMonthForAddPrinc', 'DOBHYearForAddPrinc');
        var girviNDate = new Date(girviDateStr);
        var todayNDate = new Date(); // Today Date
        var milliGirviDate = girviNDate.getTime();
        var milliTodayDate = todayNDate.getTime();
        var datesDiff = milliTodayDate - milliGirviDate; //End code to change condition for girvi date @Author:SHRI07APR15

        if (datesDiff < 0) {
            alert('Please Select the correct Date!');
            document.getElementById("addPrinDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
        }
        /*End to check date is valid or not @AUTHOR: SANDY19AUG13*/
        else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("addPrinDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
                document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
            } else {
                var str = "&DOBHDayForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHDayForAddPrinc").value)
                        + "&DOBHMonthForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHMonthForAddPrinc").value)
                        + "&DOBHYearForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHYearForAddPrinc").value);
                var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
                        + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                        + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                        + "&principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                        + "&principalAmountROI=" + encodeURIComponent(document.getElementById("principalAmountROI").value)
                        + "&addPrinDOBDay=" + encodeURIComponent(document.getElementById("addPrinDOBDay").value)
                        + "&addPrinDOBMonth=" + encodeURIComponent(document.getElementById("addPrinDOBMonth").value)
                        + "&girvPrinPreId=" + encodeURIComponent(document.getElementById("girvPrinPreId").value)
                        + "&girvPrinPostId=" + encodeURIComponent(document.getElementById("girvPrinPostId").value)
                        + "&addPrinDOBYear=" + encodeURIComponent(document.getElementById("addPrinDOBYear").value)
                        + "&otherInfoField=" + encodeURIComponent(document.getElementById("otherInfoField").value)
                        + "&girviSerialNum=" + encodeURIComponent(document.getElementById("girviSerialNum").value)
                        + "&addPrinDrAccId=" + encodeURIComponent(document.getElementById("addPrinDrAccId").value)
                        + "&addPrinCrAccId=" + encodeURIComponent(document.getElementById("addPrinCrAccId").value)
                        + str; //get value of other info field @AUTHOR: SANDY03JAN14

                update_girvi_add_principal('include/php/olguadpn.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
            }
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
    }
}
/********End code to add code for add Principal dob @Author:PRIYA21APR15************************/
/********Start code to add code for add Principal date check @Author:PRIYA22APR15******************/
function changeGirviAddPrinDateHindi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, princAmount, interestType, girviDate, girviId, custId, girviType, girviUpdSts,
        gMonthIntOption, gCurrentAddPrinDiv, omPanelDiv, girviHindiDOB, principalEngDOB, lastDayInt) {

    girviCurrentAddPrinDiv = gCurrentAddPrinDiv;
    var girviDateDay = document.getElementById("AddPrincDOBDay").value;
    var girviDateMMM = document.getElementById("AddPrincDOBMonth").value;
    var girviDateYY = document.getElementById("AddPrincDOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("AddPrincDOBYear").value, document.getElementById("AddPrincDOBMonth").value, document.getElementById("AddPrincDOBDay").value,
            'DOBHDayAddPrincGirviRel', 'DOBHMonthAddPrincGirviRel', 'DOBHYearAddPrincGirviRel');
    var todayDate = new Date(girviDateStr); // Today Date
    var milliTodayDate = todayDate.getTime();
    var girviDate1 = new Date(principalEngDOB); // Girvi Date
    var milliGirviDate = girviDate1.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

    if (datesDiff < 0) {
        alert('Please Select the correct Release Date!');
        document.getElementById("AddPrincDOBDay").focus();
        return false;
        exit();
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("AddPrincDOBDay").focus();
        } else {
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType
                    + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
                    + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&gMonthIntOption=" + gMonthIntOption + "&girviCurrentAddPrinDiv=" + girviCurrentAddPrinDiv
                    + "&grvRelPayDetails=False" + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange";

            change_girvi_add_prin_date(documentRootPath + '/include/php/olggttam.php', poststr); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
            return false;
        }
    }
}
/********End code to add code for add Principal date check @Author:PRIYA22APR15******************/
/********Start code to add code for add Principal release @Author:PRIYA21APR15************************/
function releasePrincipalAmountHindi(documentRootPath, custId, girviId, principalId, principalDD, principalMM, principalYY, pricipalTotalTime, releaseTotalPrincAmt,
        releaseTotalPrincInt, releaseTotalPrincPaidInt, releaseTotalPrincPaidAmt, releaseTotalPrincDis, relPrinLoanAccId, relPrinCashAccId, relPrinIntRecAccId, relPrinDiscAccId,
        transStatus, girviHindiDOB, principalEngDOB) {

    var girviDateDay = document.getElementById("AddPrincDOBDay").value;
    var girviDateMMM = document.getElementById("AddPrincDOBMonth").value;
    var girviDateYY = document.getElementById("AddPrincDOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("AddPrincDOBYear").value, document.getElementById("AddPrincDOBMonth").value, document.getElementById("AddPrincDOBDay").value,
            'DOBHDayAddPrincGirviRel', 'DOBHMonthAddPrincGirviRel', 'DOBHYearAddPrincGirviRel');
    var todayDate = new Date(girviDateStr); // Today Date
    var milliTodayDate = todayDate.getTime();
    var girviDate1 = new Date(principalEngDOB); // Girvi Date
    var milliGirviDate = girviDate1.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

    if (datesDiff < 0) {
        alert('Please Select the correct Release Date!');
        document.getElementById("AddPrincDOBDay").focus();
        document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
        //document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
    }
    /*End to check date is valid or not @AUTHOR: SANDY19AUG13*/
    else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("AddPrincDOBDay").focus();
            document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
        } else {
            document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "hidden";
            if (transStatus == 'Transferred') {
                confirm_box = confirm("This principal has been transferred !\nDo you really want to release this Principal Amount?");
            } else {
                confirm_box = confirm("Do you really want to release this Principal Amount?");
            }
            if (confirm_box == true)
            {
                var str = "&DOBHDayAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHDayAddPrincGirviRel').value)
                        + "&DOBHMonthAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHMonthAddPrincGirviRel').value)
                        + "&DOBHYearAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHYearAddPrincGirviRel').value);
                principalDOR = principalDD + ' ' + principalMM + ' ' + principalYY;
                var poststr = "custId=" + encodeURIComponent(custId)
                        + "&girviId=" + encodeURIComponent(girviId)
                        + "&principalId=" + encodeURIComponent(principalId)
                        + "&principalDOR=" + encodeURIComponent(principalDOR)
                        + "&pricipalTotalTime=" + encodeURIComponent(pricipalTotalTime)
                        + "&releaseTotalPrincAmt=" + encodeURIComponent(releaseTotalPrincAmt)
                        + "&releaseTotalPrincInt=" + encodeURIComponent(releaseTotalPrincInt)
                        + "&releaseTotalPrincPaidInt=" + encodeURIComponent(releaseTotalPrincPaidInt)
                        + "&releaseTotalPrincPaidAmt=" + encodeURIComponent(releaseTotalPrincPaidAmt)
                        + "&releaseTotalPrincDis=" + encodeURIComponent(releaseTotalPrincDis)
                        + "&relPrinLoanAccId=" + encodeURIComponent(relPrinLoanAccId)
                        + "&relPrinCashAccId=" + encodeURIComponent(relPrinCashAccId)
                        + "&relPrinIntRecAccId=" + encodeURIComponent(relPrinIntRecAccId)
                        + "&relPrinDiscAccId=" + encodeURIComponent(relPrinDiscAccId)
                        + str;
                release_principal_amount(documentRootPath + '/include/php/olgurepn.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
            }

            document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
            return false;
        }
    }
}
/********End code to add code for add Principal release @Author:PRIYA21APR15************************/
/********Start code to add code for release loan @Author:PRIYA21APR15************************/
/*********Start code to add validation for accounts @Author:SHRI10JUL15********************/
/**********Start code to add itotalAmount,itotalInterest,ototalAmount,ototalInterest  releaseGirviHindi fun @Author:BAJRANG5JAN1************/

function releaseGirviHindi(custId, girviId, pageNo, totalPrincipalAmount, amountPaid, interestPaid, itotalAmount, itotalInterest, ototalAmount, ototalInterest, discountPaid, relDD, relMM, relYY,
        simpleOrCompIntOption, girviCompoundedOption, monthlyInterestType, interestType, girviFirmId, girviJrnlId, girviAccId,
        girviLoanAccId, girviCashRecAccId, girviIntRecAccId, girviDiscAccId, smsTemplateId, girviDOB, latestDate) {
    document.getElementById("girviReleaseButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSelectField(relDD.value, "Please select Release Date Day!") == false) {
        relDD.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relMM.value, "Please select Release Date Month!") == false) {
        relMM.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relYY.value, "Please select Release Date Year!") == false) {
        relYY.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviLoanAccId').value, "Please select Release Loan Account!") == false) {
        document.getElementById('girviLoanAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviCashRecAccId').value, "Please select Release Cash Rec. Account!") == false) {
        document.getElementById('girviCashRecAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviDiscAccId').value, "Please select Release girvi Discount Account!") == false) {
        document.getElementById('girviDiscAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviIntRecAccId').value, "Please select Release Interest Rec. Account!") == false) {
        document.getElementById('girviIntRecAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else {
        var girviDateDay = relDD.value;
        var girviDateMMM = relMM.value;
        var girviDateYY = relYY.value;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(latestDate); // Girvi Date
        var milliGirviDate = girviDate.getTime();

        var datesDiff = milliTodayDate - milliGirviDate;
        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                exit();
            } else {
                confirm_box = confirm("Do you really want to release this Girvi?");
                if (confirm_box == true)
                {
                    UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                            'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
                    var str = "&DOBHDayForRelease=" + document.getElementById('DOBHDayForRelease').value + "&DOBHMonthForRelease=" + document.getElementById('DOBHMonthForRelease').value +
                            "&DOBHYearForRelease=" + document.getElementById('DOBHYearForRelease').value;
                    var poststr = "custId=" + custId + "&girviId=" + girviId + "&pageNo=" + pageNo
                            + "&totalPrincipalAmount=" + totalPrincipalAmount + "&amountPaid=" + amountPaid.value + "&interestPaid=" + interestPaid.value + "&discountPaid=" + discountPaid.value
                            + "&relDD=" + relDD.value + "&relMM=" + relMM.value + "&relYY=" + relYY.value + "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                            "&girviCompoundedOption=" + girviCompoundedOption + "&gMonthIntOption=" + monthlyInterestType + "&interestType=" + interestType + "&girviFirmId=" + girviFirmId +
                            "&girviJrnlId=" + girviJrnlId + "&girviAccId=" + girviAccId + "&girviLoanAccId=" + girviLoanAccId
                            + "&girviCashRecAccId=" + girviCashRecAccId + "&girviIntRecAccId=" + girviIntRecAccId
                            + "&girviDiscAccId=" + girviDiscAccId + "&smsTemplateId=" + smsTemplateId + str;
                    release_girvi('include/php/olgrgvrl.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                } else {
                    document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                }
            }
        }
    }
}
/**********End code to add itotalAmount,itotalInterest,ototalAmount,ototalInterest  releaseGirviHindi fun @Author:BAJRANG5JAN1************/

/*********End code to add validation for accounts @Author:SHRI10JUL15********************/
/********End code to add code for release loan @Author:PRIYA21APR15************************/

/********Start code to add code for release loan @Author:PRIYA22APR15************************/
/******Start  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
var setReleaseDatePanel;
function changeGirviReleaseDateHindi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption, girviCompoundedOption,
        princAmount, interestType, girviDOB, girviId, custId, girviType, panel, girviStatus, girviHindiDOB, dateCompare, auctionPanel) {

    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    if (validateSelectField(relDateDDValue, "Please Select Release Date Day!") == false) {
        document.getElementById("DOBDay").focus();
        exit();
    } else if (validateSelectField(relDateMMValue, "Please select Release Date Month!") == false) {
        document.getElementById("DOBMonth").focus();
        exit();
    } else if (validateSelectField(relDateYYValue, "Please select Release Date Year!") == false) {
        document.getElementById("DOBYear").focus();
        exit();
    } else {
        var girviDateDay = relDateDDValue;
        var girviDateMMM = relDateMMValue;
        var girviDateYY = relDateYYValue;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(dateCompare); // Girvi Date
        var milliGirviDate = girviDate.getTime();

        var datesDiff = milliTodayDate - milliGirviDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                exit();
            }
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
                    + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
                    + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                    + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                    + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE"
                    + "&omPanelDiv=" + panel + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange" + "&auctionPanel=" + auctionPanel;
            if (girviStatus == 'Transferred') {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olgggtfr.php', poststr);
            } else {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
            }
            return false;
        }
    }
}
/******End  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
/********End code to add code for release loan @Author:PRIYA22APR15************************/
/********Start code to add function gor money deposit @Author:PRIYA23APR15************************/
function changeGirviUpdateDateHindi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviDepositPrinAmount, girviDepositIntAmount, girviROI, princAmount,
        interestType, girviDOB, girviDateStr, girviId, custId, girviType, girviUpdSts, simpleOrCompIntOption, girviCompoundedOption, girviHindiDOB, dateCompare) {

    girviCurrentStatus = 'girviUpdateGirviResultDiv';
    if (validateSelectField(document.getElementById("DMDOBDay").value, "Please Select Deposit Amount Day!") == false) {
        document.getElementById("DMDOBDay").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBMonth").value, "Please select Deposit Amount Month!") == false) {
        document.getElementById("DMDOBMonth").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBYear").value, "Please select Deposit Amount Year!") == false) {
        document.getElementById("DMDOBYear").focus();
        exit();
    } else {
        var girviDateDay = document.getElementById("DMDOBDay").value;
        var girviDateMMM = document.getElementById("DMDOBMonth").value;
        var girviDateYY = document.getElementById("DMDOBYear").value;
        var girviDepDateStr = UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');
//        var DOBArr = girviHindiDOB.split(" ");
//        var girviHDateStr = UpdateIndianCivil(DOBArr[2], DOBArr[1], DOBArr[0], '', '', '');
        var girviDepDate = new Date(girviDepDateStr); // Girvi Deposit Date
        var milliGirviDepDate = girviDepDate.getTime();
        var girviMainDateStr = new Date(dateCompare); //Girvi Main Date
        var milliGirviDate = girviMainDateStr.getTime();
        var datesDiff = milliGirviDepDate - milliGirviDate;
        if (datesDiff < 0) {
            alert('Please Select the correct Date ! The latest entry present on ' + girviHindiDOB + ' !');
            document.getElementById("DMDOBDay").focus();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DMDOBDay").focus();
            } else {
                var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                        + "&girviDepositPrinAmount=" + girviDepositPrinAmount + "&girviDepositIntAmount=" + girviDepositIntAmount
                        + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                        + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                        + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&grvRelPayDetails=False" + "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                        "&girviCompoundedOption=" + girviCompoundedOption + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange";
                if (girviCurrentStatus == 'girviUpdateGirviResultDiv') {
                    change_Girvi_Release_Date(documentRootPath + '/include/php/olgugdtdrs.php', poststr);
                } else {
                    change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
                }
            }
            return false;
        }
    }
}
/********End code to add function gor money deposit @Author:PRIYA23APR15************************/

function validateUpdateGirviDepositMoneyInputsHindi(obj) {

    // Start Code to add validate principal amount LOVE@01AUG2015
    if ((girviDepositMonOpt == 'DepositFullInt' ||
            girviDepositMonOpt == 'DepositIntWithDis' ||
            girviDepositMonOpt == 'DepositIntAmtLeft' ||
            girviDepositMonOpt == 'DepositIntAdjInPrin' ||
            girviDepositMonOpt == 'DepositPrinIntLeft') &&
            (document.getElementById("girviDepositPrinAmount").value == '' ||
                    document.getElementById("girviDepositPrinAmount").value == null ||
                    document.getElementById("girviDepositPrinAmount").value == 0)) {
        alert("Please Enter Girvi Principal Amount!");
        document.getElementById("girviDepositPrinAmount").focus();
        return false;
    }
    // End Code to add validate principal amount LOVE@01AUG2015

    if (document.getElementById("girviDepositPrinAmount").value != '' || document.getElementById("girviDepositIntAmount").value != '') {
        if (document.getElementById("girviDepositPrinAmount").value != '') {
            if (validateNumWithDot(document.getElementById("girviDepositPrinAmount").value, "Accept only numeric characters without space character!") == false) {
                document.getElementById("girviDepositPrinAmount").focus();
                return false;
            }
        }
        if (document.getElementById("girviDepositIntAmount").value != '') {
            if (validateNumWithDot(document.getElementById("girviDepositIntAmount").value, "Accept only numeric characters without space character!") == false) {
                document.getElementById("girviDepositIntAmount").focus();
                return false;
            }
        }
    } else {
        if (document.getElementById("girviDepositPrinAmount").value == '' || document.getElementById("girviDepositIntAmount").value == '') {
            alert("Please enter Principal Deposit or Interest Deposit Amount!");
            document.getElementById("girviDepositPrinAmount").focus();
            return false;
        }
    }
    if (validateSelectField(document.getElementById("DMDOBDay").value, "Please select Deposit Amount Day!") == false) {
        document.getElementById("DMDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DMDOBMonth").value, "Please select Deposit Amount Month!") == false) {
        document.getElementById("DMDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DMDOBYear").value, "Please select Deposit Amount Year!") == false) {
        document.getElementById("DMDOBYear").focus();
        return false;
    }
    return true;
}
/********Start code to add code gor mpney deposit @Author:PRIYA24APR15******************/
function updateGirviDepositMoneyHindi(obj, selROIValue, girviSerialNo, dateComapre) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
    var girviIntAdjustmentCheck = 'False';
    if (document.getElementById("girviIntAdjustment").checked == true) {
        girviIntAdjustmentCheck = 'True';
    }
    if (girviDepositMonOpt == 'Help') {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
        update_girvi_deposit_money('include/php/orgggmdh.php', '');
    } else {
        var girviDateDay = document.getElementById("DMDOBDay").value;
        var girviDateMMM = document.getElementById("DMDOBMonth").value;
        var girviDateYY = document.getElementById("DMDOBYear").value;
        var girviDepDateStr = UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');
        var girviDepDate = new Date(girviDepDateStr); // Girvi Deposit Date
        var milliGirviDepDate = girviDepDate.getTime();
//        var girviDateStr1 = document.getElementById("girviNewDateForUpdate").value;
//        var DOBArr = girviDateStr1.split(" ");
//        var girviHDateStr = UpdateIndianCivil(DOBArr[2], DOBArr[1], DOBArr[0], '', '', '');
        var girviHDateStr = dateComapre;
        var girviMainDateStr = new Date(girviHDateStr); //Girvi Main Date
        var milliGirviDate = girviMainDateStr.getTime();
        var todayDateStr = new Date(); //Today's date
        var milliTodayDate = todayDateStr.getTime();
        var datesDiff = milliGirviDepDate - milliGirviDate;
        var currentDatesDiff = milliTodayDate - milliGirviDepDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Deposit Date!');
            document.getElementById("DMDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
        } else if (currentDatesDiff < 0 && girviDepositMonOpt == 'CalculateNow') {
            alert('Please Select the correct Girvi Deposit Date!');
            document.getElementById("DMDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
        }
//        else if (datesDiff < 0 && girviDepositMonOpt == 'CalculateNow') {
//            alert('Please Select the correct Girvi Deposit Date!');
//            document.getElementById("DMDOBDay").focus();
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
//            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
//        } 
        else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DMDOBDay").focus();
                document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
                document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            } else {
                if (validateUpdateGirviDepositMoneyInputsHindi(obj)) {

                    var str = "";
                    UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                            'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');
                    str = "&DOBHDayForMoneyDep=" + document.getElementById('DOBHDayForMoneyDep').value + "&DOBHMonthForMoneyDep=" + document.getElementById('DOBHMonthForMoneyDep').value +
                            "&DOBHYearForMoneyDep=" + document.getElementById('DOBHYearForMoneyDep').value;
                    var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
                            + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                            + "&girviNewDateForUpdate=" + encodeURIComponent(document.getElementById("girviNewDateForUpdate").value)
                            + "&girviTimePeriodVar=" + encodeURIComponent(document.getElementById("girviTimePeriodVar").value)
                            + "&girviDepositPrinAmount=" + encodeURIComponent(document.getElementById("girviDepositPrinAmount").value)
                            + "&girviDepositIntAmount=" + encodeURIComponent(document.getElementById("girviDepositIntAmount").value)
                            + "&ROIValue=" + encodeURIComponent(document.getElementById("selROI").value) //selROI Id Added @Author:PRIYA23OCT13
                            + "&intType=" + encodeURIComponent(document.getElementById("interestType").value)
                            + "&totalPrincipalAmount=" + encodeURIComponent(document.getElementById("totalPrincipalAmount").value)
                            + "&totalInterestAmount=" + encodeURIComponent(document.getElementById("totalInterestAmount").value)
                            + "&DOBDay=" + encodeURIComponent(document.getElementById("DMDOBDay").value)
                            + "&DOBMonth=" + encodeURIComponent(document.getElementById("DMDOBMonth").value)
                            + "&DOBYear=" + encodeURIComponent(document.getElementById("DMDOBYear").value)
                            + "&simpleOrCompIntOption=" + encodeURIComponent(document.getElementById("simpleOrCompIntOption").value)
                            + "&girviCompoundedOption=" + encodeURIComponent(document.getElementById("girviCompoundedOption").value)
                            + "&gMonthIntOption=" + encodeURIComponent(document.getElementById("monthlyInterestType").value)
                            + "&otherInfoField=" + encodeURIComponent(document.getElementById("otherInfoField").value)//TO GET OTH INFO VALUE @AUTHOR: SANDY03JAN14
                            + "&girviIntAdjustmentCheck=" + encodeURIComponent(girviIntAdjustmentCheck)
                            + "&girviSerialNo=" + encodeURIComponent(girviSerialNo)
                            + "&girviDepositMonOpt=" + girviDepositMonOpt//added @Author:PRIYA05MAY14
                            + "&girviDepLoanAccId=" + encodeURIComponent(document.getElementById("girviDepLoanAccId").value)
                            + "&girviDepIntRecAccId=" + encodeURIComponent(document.getElementById("girviDepIntRecAccId").value)
                            + "&girviDepCashAccId=" + encodeURIComponent(document.getElementById("girviDepCashAccId").value)
                            + "&girviNewDOBStr=" + encodeURIComponent(document.getElementById("girviNewDOBStr").value)
                            + str;
                    if (girviDepositMonOpt == 'SimplyDeposit') {
                        update_girvi_deposit_money('include/php/olgudmsm.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'CalculateNow') {
                        update_girvi_deposit_money('include/php/olgudmcn.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'DepositFullInt') {
                        update_girvi_deposit_money('include/php/olgudmfi.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'DepositIntWithDis') {
                        update_girvi_deposit_money('include/php/olgudmds.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'DepositIntAmtLeft') {
                        update_girvi_deposit_money('include/php/olgudmds.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'DepositIntAdjInPrin') {
                        update_girvi_deposit_money('include/php/olgudmap.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    } else if (girviDepositMonOpt == 'DepositPrinIntLeft') {
                        update_girvi_deposit_money('include/php/olgudpil.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
                    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
                }
            }
        }
    }
}
/********End code to add code gor mpney deposit @Author:PRIYA24APR15******************/
/*****************Start code to add loanDateOpt @Author:PRIYA24APR15*******************/
function girviDepositMoneySubmitHindi(documentRootPath, custId, girviId, newPrincipalAmount, girviDepositPrinAmount,
        girviDepositIntAmount, girviRealIntAmount, totalAmountDep, depDiscountAmt, girviDepositDate, newGirviDate, girviComm,
        simpleOrCompIntOption, girviCompoundedOption, interestType, monthlyInterestType, amountLeft, moneyDepOption, girviSerialNo,
        girviDepositMonOpt, girviDepLoanAccId, girviDepIntRecAccId, girviDepCashAccId, girviHDepositDate, newHGirviDate, intAmtLeftBefore) {

    document.getElementById("girviUpdateDepMoneySubmitDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
    confirm_box = confirm("Do you really want to update this Girvi?");
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId +
                "&girviId=" + girviId +
                "&newPrincipalAmount=" + newPrincipalAmount +
                "&girviDepositPrinAmount=" + girviDepositPrinAmount +
                "&girviDepositIntAmount=" + girviDepositIntAmount +
                "&girviRealIntAmount=" + girviRealIntAmount +
                "&totalAmountDep=" + totalAmountDep +
                "&depDiscountAmt=" + depDiscountAmt +
                "&girviDepositDate=" + girviDepositDate +
                "&newGirviDate=" + newGirviDate +
                "&girviComm=" + encodeURIComponent(girviComm) +
                "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                "&girviCompoundedOption=" + girviCompoundedOption +
                "&interestType=" + interestType +
                "&monthlyInterestType=" + monthlyInterestType +
                "&amountLeft=" + amountLeft +
                "&moneyDepOption=" + moneyDepOption +
                "&girviSerialNo=" + girviSerialNo +
                "&girviDepositMonOpt=" + girviDepositMonOpt +
                "&girviDepLoanAccId=" + girviDepLoanAccId +
                "&girviDepIntRecAccId=" + girviDepIntRecAccId +
                "&girviDepCashAccId=" + girviDepCashAccId +
                "&girviHindiDepositDate=" + girviHDepositDate +
                "&newHindiGirviDate=" + newHGirviDate +
                "&intAmtLeftBefore=" + intAmtLeftBefore;
        //alert(poststr);
        girvi_deposit_money_submit(documentRootPath + '/include/php/olgugdmd.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }

    document.getElementById("girviUpdateDepMoneySubmitDiv").style.visibility = "visible";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
    return false;
}
/*****************End code to add loanDateOpt @Author:PRIYA24APR15*******************/
/*****************End code to add loanDateOpt @Author:PRIYA25APR15*******************/
function transferGirviHindi(documentRootPath, obj) {
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
    document.getElementById("transferGirviButton").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
            'transDOBHDay', 'transDOBHMonth', 'transDOBHYear');
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        document.getElementById("transferGirviButton").style.visibility = "visible";
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("transferGirviButton").style.visibility = "visible";
            document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        } else {
            var str = "&transDOBHDay=" + encodeURIComponent(document.getElementById("transDOBHDay").value)
                    + "&transDOBHMonth=" + encodeURIComponent(document.getElementById("transDOBHMonth").value)
                    + "&transDOBHYear=" + encodeURIComponent(document.getElementById("transDOBHYear").value);
            if (validateTransferGirviInputs(obj)) {
                var poststr = "principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                        + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                        + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                        + "&interestType=" + encodeURIComponent(document.getElementById("interestTGType").value)
                        + "&selTROI=" + encodeURIComponent(document.getElementById("selTROI").value)
                        + "&DOBDay=" + encodeURIComponent(document.transfer_girvi.DOBDay.value)
                        + "&DOBMonth=" + encodeURIComponent(document.transfer_girvi.DOBMonth.value)
                        + "&DOBYear=" + encodeURIComponent(document.transfer_girvi.DOBYear.value)
                        + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                        + "&girviExistFirmId=" + encodeURIComponent(document.getElementById("girviExistFirmId").value)
                        + "&girviTransPreSerialNo=" + encodeURIComponent(document.getElementById("girviTransPreSerialNo").value)
                        + "&girviTransSerialNo=" + encodeURIComponent(document.getElementById("girviTransSerialNo").value)
                        + "&loanLenderId=" + encodeURIComponent(document.getElementById("mlId").value)//change in line @AUTHOR: SANDY13JAN14
                        + "&mlMainId=" + encodeURIComponent(document.getElementById("mlMainId").value)//add line @AUTHOR: SANDY14JAN14
                        + "&girviTransTokenNo=" + encodeURIComponent(document.getElementById("girviTransTokenNo").value)
                        + "&girviTransMlLoanNo=" + encodeURIComponent(document.getElementById('mlLoanNo').value)//to pass ml loan number field value @AUTHOR: SANDY29NOV13
                        + "&trGirviPaySelAccountId=" + encodeURIComponent(document.getElementById('trGirviPaySelAccountId').value)
                        + "&trGirviPaymentOtherInfo=" + encodeURIComponent(document.getElementById('trGirviPaymentOtherInfo').value)
                        + "&girviTransOtherInfo=" + encodeURIComponent(document.getElementById("girviTransOtherInfo").value)
                        + "&prinType=" + encodeURIComponent(document.getElementById("prinType").value)
                        + "&girviTransCrAccId=" + encodeURIComponent(document.getElementById("girviTransCrAccId").value)
                        + str;
                transfer_girvi(documentRootPath + '/include/php/olgggvts.php', poststr);
            }
        }
    }
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
    document.getElementById("transferGirviButton").style.visibility = "visible";
}
/*****************End code to add loanDateOpt @Author:PRIYA25APR15*******************/

function changeTransGirviReleaseDateHindi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption, girviCompoundedOption,
        princAmount, interestType, girviDOB, girviId, custId, girviType, panel, girviStatus, girviHindiDOB, auctionPanel) {
    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    if (validateSelectField(document.getElementById("DOBTransDay").value, "Please Select Day!") == false) {
        document.getElementById("DOBTransDay").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DOBTransMonth").value, "Please Select Month!") == false) {
        document.getElementById("DOBTransMonth").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DOBTransYear").value, "Please Select Year!") == false) {
        document.getElementById("DOBTransYear").focus();
        exit();
    } else {
        var girviDateDay = relDateDDValue;
        var girviDateMMM = relDateMMValue;
        var girviDateYY = relDateYYValue;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBTransYear").value, document.getElementById("DOBTransMonth").value, document.getElementById("DOBTransDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');

        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(girviDOB); // Girvi Date
        var milliGirviDate = girviDate.getTime();
        var datesDiff = milliTodayDate - milliGirviDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBTransDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBTransDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                exit();
            }
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
                    + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
                    + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                    + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                    + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE"
                    + "&omPanelDiv=" + panel + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange" + "&auctionPanel=" + auctionPanel;
            if (girviStatus == 'Transferred') {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olgggtfr.php', poststr);
            } else {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
            }
            return false;
        }
    }
}
/******Start code to add function for transfer release *********************/
function releaseTransferredGirviHindi(documentRootPath, panel, addPrinId, girviDOB) {
    // globAddPrinId = addPrinId;
    upDatePanelName = panel;
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
    document.getElementById("releaseTransferredGirviButton").style.visibility = "hidden";

    var custId = encodeURIComponent(document.getElementById("custId").value);
    var girviId = encodeURIComponent(document.getElementById("girviId").value);

    var totAmount = document.getElementById('girviPrinPaid');//id changed @Author:PRIYA27SEP14
    var amountPaid = document.getElementById('amountPaid');
    var interestPaid = document.getElementById('interestPaid');
    var discountPaid = document.getElementById('discountPaid');
    var gtransId = document.getElementById('gtransId');//to access transfer id @AUTHOR: SANDY14JAN14
    var relDD = document.girviReleaseDateForm.DOBTransDay;
    var relMM = document.girviReleaseDateForm.DOBTransMonth;
    var relYY = document.girviReleaseDateForm.DOBTransYear;
    var timePeriod = document.getElementById('timePeriodVar').value;//to add variable @AUTHOR: SANDY15DEC13

    if (validateSelectField(relDD.value, "Please select Release Date Day!") == false) {
        relDD.focus();
        document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relMM.value, "Please select Release Date Month!") == false) {
        relMM.focus();
        document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relYY.value, "Please select Release Date Year!") == false) {
        relYY.focus();
        document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        exit();
    } else {

        var girviDateDay = relDD.value;
        var girviDateMMM = relMM.value;
        var girviDateYY = relYY.value;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBTransYear").value, document.getElementById("DOBTransMonth").value, document.getElementById("DOBTransDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');

        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(girviDOB); // Girvi Date
        var milliGirviDate = girviDate.getTime();
        var datesDiff = milliTodayDate - milliGirviDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBTransDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
            document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBTransDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
                document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
                exit();
            }

            confirm_box = confirm("Do you really want to release this Transferred Girvi?");

            if (confirm_box == true)
            {
                var str = "&DOBHDayForRelease=" + encodeURIComponent(document.getElementById("DOBHDayForRelease").value)
                        + "&DOBHMonthForRelease=" + encodeURIComponent(document.getElementById("DOBHMonthForRelease").value)
                        + "&DOBHYearForRelease=" + encodeURIComponent(document.getElementById("DOBHYearForRelease").value);

                var poststr = "custId=" + custId + "&girviId=" + girviId
                        + "&totAmount=" + totAmount.value + "&amountPaid=" + amountPaid.value + "&interestPaid=" + interestPaid.value + "&discountPaid=" + discountPaid.value
                        + "&relDD=" + relDD.value + "&relMM=" + relMM.value + "&relYY=" + relYY.value + "&timePeriod=" + timePeriod + "&gtransId=" + gtransId.value
                        + "&girviLoanAccId=" + document.getElementById('girviLoanAccId').value + "&girviIntAccId=" + document.getElementById('girviIntRecAccId').value
                        + "&girviDiscAccId=" + document.getElementById('girviDiscAccId').value + "&girviCashAccId=" + document.getElementById('girviCashRecAccId').value
                        + "&panel=" + panel + "&addPrinId=" + addPrinId + str;//CHANGE IN parameter @AUTHOR: SANDY14JAN14

                release_transferred_girvi(documentRootPath + '/include/php/olggrlgt.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
            }
        }
    }
    document.getElementById("releaseTransferredGirviButton").style.visibility = "visible";
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
}
/******End code to add function for transfer release *********************/

function transferAdditionalPrinHindi(documentRootPath, obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transferGirviButton").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;

    var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
            'transDOBHDay', 'transDOBHMonth', 'transDOBHYear');

//alert(girviDateStr);
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        document.getElementById("transferGirviButton").style.visibility = "visible";
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("transferGirviButton").style.visibility = "visible";
            document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        } else {
            var str = "&transDOBHDay=" + encodeURIComponent(document.getElementById("transDOBHDay").value)
                    + "&transDOBHMonth=" + encodeURIComponent(document.getElementById("transDOBHMonth").value)
                    + "&transDOBHYear=" + encodeURIComponent(document.getElementById("transDOBHYear").value);
            if (validateTransferGirviInputs(obj)) {
                var poststr = "principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                        + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                        + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                        + "&interestType=" + encodeURIComponent(document.getElementById("interestTGType").value)
                        + "&selTROI=" + encodeURIComponent(document.getElementById("selTROI").value)
                        + "&DOBDay=" + encodeURIComponent(document.transfer_add_prin.DOBDay.value)
                        + "&DOBMonth=" + encodeURIComponent(document.transfer_add_prin.DOBMonth.value)
                        + "&DOBYear=" + encodeURIComponent(document.transfer_add_prin.DOBYear.value)
                        + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                        + "&girviExistFirmId=" + encodeURIComponent(document.getElementById("girviExistFirmId").value)
                        + "&girviTransPreSerialNo=" + encodeURIComponent(document.getElementById("girviTransPreSerialNo").value)
                        + "&girviTransSerialNo=" + encodeURIComponent(document.getElementById("girviTransSerialNo").value)
                        + "&loanLenderId=" + encodeURIComponent(document.getElementById("mlId").value)
                        + "&mlMainId=" + encodeURIComponent(document.getElementById("mlMainId").value)
                        + "&girviTransTokenNo=" + encodeURIComponent(document.getElementById("girviTransTokenNo").value)
                        + "&girviTransMlLoanNo=" + encodeURIComponent(document.getElementById('mlLoanNo').value)
                        + "&trGirviPaySelAccountId=" + encodeURIComponent(document.getElementById('trGirviPaySelAccountId').value)
                        + "&trGirviPaymentOtherInfo=" + encodeURIComponent(document.getElementById('trGirviPaymentOtherInfo').value)
                        + "&girviTransOtherInfo=" + encodeURIComponent(document.getElementById("girviTransOtherInfo").value)
                        + "&prinType=" + encodeURIComponent(document.getElementById("prinType").value)
                        + "&girviTransCrAccId=" + encodeURIComponent(document.getElementById("girviTransCrAccId").value)
                        + "&addPrinId=" + encodeURIComponent(document.getElementById("addPrinId").value)
                        + str;
                transfer_additional_prin(documentRootPath + '/include/php/olaptrad.php', poststr);

            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("transferGirviButton").style.visibility = "visible";
    return false;
}

function updateAddPrinTransDOBHindi(documentRootPath, custId, girviId, DOBDay, DOBMonth, DOBYear, jrnlId, panelName, gTransId, girviDOB, girviFirmId, girviSerialNum, prinAmt) {
    upDatePanelName = panelName;
    document.getElementById("updateTransGirviDOBButton").style.visibility = "hidden";

    var girviDateStr = UpdateIndianCivil(DOBYear.value, DOBMonth.value, DOBDay.value,
            'updateDOBHDay', 'updateDOBHMonth', 'updateDOBHYear');

    var girviDateDay = DOBDay.value;
    var girviDateMMM = DOBMonth.value;
    var girviDateYY = DOBYear.value;

    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("updateDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
        return false;
        exit();
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("transferGirviButton").style.visibility = "visible";
            document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        } else {
            if (validateSelectField(girviDateDay, "Please select Girvi Date Day!") == false) {
                document.getElementById("updateDOBDay").focus();
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
            } else if (validateSelectField(girviDateMMM, "Please select Girvi Date Month!") == false) {
                document.getElementById("updateDOBMonth").focus();
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
            } else if (validateSelectField(girviDateYY, "Please select Girvi Date Year!") == false) {
                document.getElementById("updateDOBYear").focus();
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
            } else {
                confirm_box = confirm("Do you really want to update Girvi Date?");
                if (confirm_box == true)
                {
                    var str = "&updateDOBHDay=" + encodeURIComponent(document.getElementById("updateDOBHDay").value)
                            + "&updateDOBHMonth=" + encodeURIComponent(document.getElementById("updateDOBHMonth").value)
                            + "&updateDOBHYear=" + encodeURIComponent(document.getElementById("updateDOBHYear").value);
                    var poststr = "custId=" + custId + "&girviId=" + girviId
                            + "&girviDOBDay=" + girviDateDay + "&girviDOBMonth=" + girviDateMMM +
                            "&girviDOBYear=" + girviDateYY + "&jrnlId=" + jrnlId + "&panelName=" + panelName
                            + "&girviTransId=" + gTransId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                            + "&girviSerialNum=" + girviSerialNum + "&prinAmt=" + prinAmt + str;

                    update_girvi_DOB_amount(documentRootPath + '/include/php/olgugvdd.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
                }
            }
            document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
        }
    }
    return false;
}

function changeAddPrinReleaseDateHindi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption,
        girviCompoundedOption, princAmount, interestType, girviDate, addPrinId, custId, girviType, panel, girviStatus, girviHindiDOB) {

    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;

    var girviDateDay = relDateDDValue;
    var girviDateMMM = relDateMMValue;
    var girviDateYY = relDateYYValue;
    var girviDateStr = UpdateIndianCivil(document.getElementById("DOBTransYear").value, document.getElementById("DOBTransMonth").value, document.getElementById("DOBTransDay").value,
            'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');

    var todayDate = new Date(girviDateStr); // Today Date
    var milliTodayDate = todayDate.getTime();
    var girviDate = new Date(girviDate); // Girvi Date
    var milliGirviDate = girviDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Release Date!');
        document.getElementById("DOBTransDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBTransDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            exit();
        }
        if (validateSelectField(document.getElementById("DOBTransDay").value, "Please Select Day!") == false) {
            document.getElementById("DOBTransDay").focus();
            exit();
        } else if (validateSelectField(document.getElementById("DOBTransMonth").value, "Please Select Month!") == false) {
            document.getElementById("DOBTransMonth").focus();
            exit();
        } else if (validateSelectField(document.getElementById("DOBTransYear").value, "Please Select Year!") == false) {
            document.getElementById("DOBTransYear").focus();
            exit();
        } else {
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
                    + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
                    + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                    + "&girviDate=" + girviDate + "&addPrinId=" + addPrinId + "&custId=" + custId
                    + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE" + "&omPanelDiv=" + panel
                    + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange";

            change_add_prin_release_date(documentRootPath + '/include/php/olapttam.php', poststr);
            return false;
        }
    }
}

/******************************************/
/******START HINNDI PAKSHA*****************/
/******************************************/
var opt = false;
function addNewGirviHindiVikSam() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addGirviSubButDiv").style.visibility = "hidden";
    //Start to change in function @Author:SHRI07APR15
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
            'loanEngConvDay', 'loanEngConvMonth', 'loanEngConvYear');

    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
//End to change code to add condition for girvi date @Author:SHRI31MAR15
//    if (datesDiff < 0) {
//        alert('Please Select the correct Girvi Date!');
//        document.getElementById("DOBDay").focus();
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
//        return false;
//        exit();
//    }
//    else {
    var girviType = document.getElementById("girviType").value;
    if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
            girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
        alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        return false;
        exit();
    }
    /***** START CODE TO ADD ItemEntered @AUTHOR:PRIYA26JAN13*******/
    if (girviType == 'Sec.Loan') {
        if (validateAddGirviInputs()) {
            searchHindiDate("add_new_girvi_frm", "display_girvi_eng_date");//function called @ANUJA18JUN15
            document.getElementById("itemEntered").value = itemEntered;
//            return true;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addGirviSubButDiv").style.visibility = "visible";
            return false;
        }
    } else {
        if (validateAddPacketInputs()) {
            searchHindiDate("add_new_girvi_frm", "display_girvi_eng_date");//function called @ANUJA18JUN15
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addGirviSubButDiv").style.visibility = "visible";
    return false;
    //}
    return false;
}

/******Start code to add hindi paksha @OMMODTAG PRIYA_07MAY15**************/
/******Start  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
function changeLoanRelDateTithi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption, girviCompoundedOption,
        princAmount, interestType, girviDOB, girviId, custId, girviType, panel, girviStatus, girviHindiDOB, dateCompare, girviDOBTithi, girviDOBPaksha, girviHindiTithi, girviHindiPaksha, auctionPanel) {
    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    if (validateSelectField(relDateDDValue, "Please Select Release Date Day!") == false) {
        document.getElementById("DOBDay").focus();
        exit();
    } else if (validateSelectField(relDateMMValue, "Please select Release Date Month!") == false) {
        document.getElementById("DOBMonth").focus();
        exit();
    } else if (validateSelectField(relDateYYValue, "Please select Release Date Year!") == false) {
        document.getElementById("DOBYear").focus();
        exit();
    } else {
        var girviDateDay = relDateDDValue;
        var girviDateMMM = relDateMMValue;
        var girviDateYY = relDateYYValue;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(dateCompare); // Girvi Date
        var milliGirviDate = girviDate.getTime();

        var datesDiff = milliTodayDate - milliGirviDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                exit();
            }
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
                    + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
                    + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                    + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                    + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE"
                    + "&omPanelDiv=" + panel + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
                    + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
                    + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha + "&auctionPanel=" + auctionPanel;

            if (girviStatus == 'Transferred') {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olgggtfr.php', poststr);
            } else {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
            }
            return false;
        }
    }
}
/******End  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
/******End code to add hindi paksha @OMMODTAG PRIYA_07MAY15**************/
/********Start code to add code for release loan @Author:PRIYA21APR15************************/
/**************Start code to add validations for accounts @Author:SHRI10JUL15***************/
/******Start code to add New function searchHindiDate & functionToSubmitReleseDate @Author:ANUJA25JUN15**************/
/******Start code to add itotalAmount,itotalInterest,ototalAmount,ototalInterest  releaseGirviVikSamHindi fun @Author:BAJRANG5JAN18*********/

var poststr2 = '';
function releaseGirviVikSamHindi(custId, girviId, pageNo, totalPrincipalAmount, amountPaid, interestPaid, itotalAmount, itotalInterest, ototalAmount, ototalInterest, discountPaid, relDD, relMM, relYY,
        simpleOrCompIntOption, girviCompoundedOption, monthlyInterestType, interestType, girviFirmId, girviJrnlId, girviAccId,
        girviLoanAccId, girviCashRecAccId, girviIntRecAccId, girviDiscAccId, smsTemplateId, girviDOB, latestDate, girviRelTithi, girviRelPaksh) {
    document.getElementById("girviReleaseButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSelectField(relDD.value, "Please select Release Date Day!") == false) {
        relDD.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relMM.value, "Please select Release Date Month!") == false) {
        relMM.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relYY.value, "Please select Release Date Year!") == false) {
        relYY.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviLoanAccId').value, "Please select Release Loan Account!") == false) {
        document.getElementById('girviLoanAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviCashRecAccId').value, "Please select Release Cash Rec. Account!") == false) {
        document.getElementById('girviCashRecAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviDiscAccId').value, "Please select Release girvi Discount Account!") == false) {
        document.getElementById('girviDiscAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('girviIntRecAccId').value, "Please select Release Interest Rec. Account!") == false) {
        document.getElementById('girviIntRecAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else {
        var girviDateDay = relDD.value;
        var girviDateMMM = relMM.value;
        var girviDateYY = relYY.value;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(latestDate); // Girvi Date
        var milliGirviDate = girviDate.getTime();

        var girviRelOnlineAccId = document.getElementById('girviRelOnlineAccId').value;
        var girvRelCashNarration = document.getElementById('girvRelCashNarration').value;
        var girvRelBankNarration = document.getElementById('girvRelBankNarration').value;
        var girvRelCardNarration = document.getElementById('girvRelCardNarration').value;
        var girvRelOnlineNarration = document.getElementById('girvRelOnlineNarration').value;
        var girvRelCashAmtRec = document.getElementById('girvRelCashAmtRec').value;
        var girvRelBankAmtRec = document.getElementById('girvRelBankAmtRec').value;
        var girvRelCardAmtRec = document.getElementById('girvRelCardAmtRec').value;
        var girvRelOnlineAmtRec = document.getElementById('girvRelOnlineAmtRec').value;

        var datesDiff = milliTodayDate - milliGirviDate;
        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                exit();
            } else {
                confirm_box = confirm("Do you really want to release this Girvi?");
                if (confirm_box == true)
                {
                    var str = "&DOBHDayForRelease=" + document.getElementById('DOBHDayForRelease').value + "&DOBHMonthForRelease=" + document.getElementById('DOBHMonthForRelease').value +
                            "&DOBHYearForRelease=" + document.getElementById('DOBHYearForRelease').value;
                    var poststr = "custId=" + custId + "&girviId=" + girviId + "&pageNo=" + pageNo
                            + "&totalPrincipalAmount=" + totalPrincipalAmount + "&amountPaid=" + amountPaid.value
                            + "&interestPaid=" + interestPaid.value + "&itotalAmount=" + itotalAmount + "&itotalInterest=" + itotalInterest
                            + "&ototalAmount=" + ototalAmount + "&ototalInterest=" + ototalInterest + "&discountPaid=" + discountPaid.value
                            + "&relDD=" + relDD.value + "&relMM=" + relMM.value + "&relYY=" + relYY.value + "&simpleOrCompIntOption=" + simpleOrCompIntOption
                            + "&girviCompoundedOption=" + girviCompoundedOption + "&gMonthIntOption=" + monthlyInterestType
                            + "&interestType=" + interestType + "&girviFirmId=" + girviFirmId
                            + "&girviJrnlId=" + girviJrnlId + "&girviAccId=" + girviAccId + "&girviLoanAccId=" + girviLoanAccId
                            + "&girviCashRecAccId=" + girviCashRecAccId + "&girviIntRecAccId=" + girviIntRecAccId
                            + "&girviDiscAccId=" + girviDiscAccId + "&smsTemplateId=" + smsTemplateId
                            + "&girviRelTithi=" + girviRelTithi + "&girviRelPaksh=" + girviRelPaksh
                            + "&girvRelCashNarration=" + girvRelCashNarration + "&girvRelBankNarration=" + girvRelBankNarration
                            + "&girvRelCardNarration=" + girvRelCardNarration + "&girvRelOnlineNarration=" + girvRelOnlineNarration
                            + "&girvRelCashAmtRec=" + girvRelCashAmtRec + "&girvRelBankAmtRec=" + girvRelBankAmtRec
                            + "&girvRelCardAmtRec=" + girvRelCardAmtRec + "&girvRelOnlineAmtRec=" + girvRelOnlineAmtRec
                            + str;
                    poststr2 = poststr;
                    searchHindiDate("", "display_girvi_reles_eng_date");
                    //change in filename @AUTHOR: SANDY20NOV13
                } else {
                    document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                }
            }
        }
    }
}
/**********End code to add itotalAmount,itotalInterest,ototalAmount,ototalInterest  releaseGirviVikSamHindi fun @Author:BAJRANG5JAN1************/

/**************End code to add validations for accounts @Author:SHRI10JUL15***************/
function functionToSubmitReleseDate()
{
    UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
            'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');

    release_girvi('include/php/olgrgvrl.php', poststr2); //change in filename @AUTHOR: SANDY20NOV13

}
/******End code to add New function searchHindiDate & functionToSubmitReleseDate @Author:ANUJA25JUN15**************/
/******Start  code to add AuctionalPanel paksha @Author:ANUJA30MAY15**************/
function changeMonthlyIntOptVikSam(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, girviId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB, girviHindiTithi, girviHindiPaksha, auctionPanel) {
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;

    //exit();
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
        var relDateEndTithi = document.getElementById('DOBDayTithi').value;
        var relDateEndPaksh = document.getElementById('DOBDayPaksh').value;
    }

    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB + "&girviDOBTithi=" + girviHindiTithi
            + "&girviDOBPaksha=" + girviHindiPaksha + "&relGirviHindiTithi=" + relDateEndTithi + "&relGirviHindiPaksha=" + relDateEndPaksh + "&auctionPanel=" + auctionPanel;//pass transfer id @AUTHOR: SANDY06JAN14

    if (girviStatus == 'Transferred') { //CHANGE IN VARIABLE @AUTHOR: SANDY14JAN14
        change_Monthly_Int_Opt(documentRootPath + '/include/php/olgggtta.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_Monthly_Int_Opt(documentRootPath + '/include/php/olggttam.php', poststr);//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
    change_monthly_int_option_db(documentRootPath + '/include/php/olgumidb.php', poststr);//change in filename @AUTHOR: SANDY22NOV13
    return false;
}
/******End  code to add AuctionalPanel  @Author:ANUJA30MAY15**************/
/******Start  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
function changeIntTypeOptVikSam(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, girviId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB, girviHindiTithi, girviHindiPaksha, auctionPanel) {
    changeIntOptPanel = omPanelDiv;
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
        var relDateEndTithi = document.getElementById('DOBDayTithi').value;
        var relDateEndPaksh = document.getElementById('DOBDayPaksh').value;
    }


    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB + "&girviDOBTithi=" + girviHindiTithi
            + "&girviDOBPaksha=" + girviHindiPaksha + "&relGirviHindiTithi=" + relDateEndTithi + "&relGirviHindiPaksha=" + relDateEndPaksh + "&auctionPanel=" + auctionPanel;

    if (girviStatus == 'Transferred') { //CHANGE IN VARIABLE @AUTHOR: SANDY14JAN14
        change_int_type_opt(documentRootPath + '/include/php/olgggtta.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_int_type_opt(documentRootPath + '/include/php/olggttam.php', poststr);//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
    change_int_type_option_db(documentRootPath + '/include/php/olguindb.php', poststr);//change in filename @AUTHOR: SANDY21NOV13
    return false;
}
/******End  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
/******Start  code to add AuctionalPanel paksha @Author:ANUJA30MAY15**************/
function changeIntCompoundedOptVikSam(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, girviId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB, girviHindiTithi, girviHindiPaksha, auctionPanel) {
    changeIntCompoundedOptPanel = omPanelDiv;
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;

    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
        var relDateEndTithi = document.getElementById('DOBDayTithi').value;
        var relDateEndPaksh = document.getElementById('DOBDayPaksh').value;
    }


    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB + "&girviDOBTithi=" + girviHindiTithi
            + "&girviDOBPaksha=" + girviHindiPaksha + "&relGirviHindiTithi=" + relDateEndTithi + "&relGirviHindiPaksha=" + relDateEndPaksh + "&auctionPanel=" + auctionPanel;//change in parameters @AUTHOR: SANDY14JAN14

    if (girviStatus == 'Transferred') { //CHANGE IN VARIABLE @AUTHOR: SANDY14JAN14
        change_int_type_opt(documentRootPath + '/include/php/olgggtta.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_int_type_opt(documentRootPath + '/include/php/olggttam.php', poststr);//changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
    change_compounded_option_db(documentRootPath + '/include/php/olgucmdb.php', poststr);//change in filename @AUTHOR: SANDY21NOV13
    return false;
}
/******Start  code to add AuctionalPanel paksha @Author:ANUJA30MAY15**************/
/******Start  code to add searchHindiDate ,functionToSubmitUpdtDtForm @Author:ANUJA26JUN15**************/
var poststr4 = '';
var docRtPath = '';
function updateGirviDOBAmountHindiVikSam(documentRootPath, custId, girviId, DOBDay, DOBMonth, DOBYear, jrnlId, panelName, gTransId, girviDOB,
        girviFirmId, girviSerialNum, prinAmt, girviHindiTithi, girviHindiPaksha) {
    upDatePanelName = panelName;
    document.getElementById("updateGirviDOBButton").style.visibility = "hidden";
    var girviDateDay = DOBDay.value;
    var girviDateMMM = DOBMonth.value;
    var girviDateYY = DOBYear.value;
    docRtPath = documentRootPath;
    var girviDateStr = UpdateIndianCivil(document.getElementById("updateDOBYear").value, document.getElementById("updateDOBMonth").value, document.getElementById("updateDOBDay").value,
            'updateDOBHDay', 'updateDOBHMonth', 'updateDOBHYear');

    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
//    if (datesDiff < 0) {
//        alert('Please Select the correct Girvi Date!');
//        document.getElementById("updateDOBDay").focus();
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
//        return false;
//        exit();
//    }
//    else { 
    if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
            girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
        alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
        document.getElementById("updateDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
        return false;
        exit();
    }
    if (validateSelectField(girviDateDay, "Please select Girvi Date Day!") == false) {
        document.getElementById("updateDOBDay").focus();
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
        return false;
    } else if (validateSelectField(girviDateMMM, "Please select Girvi Date Month!") == false) {
        document.getElementById("updateDOBMonth").focus();
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
        return false;
    } else if (validateSelectField(girviDateYY, "Please select Girvi Date Year!") == false) {
        document.getElementById("updateDOBYear").focus();
        document.getElementById("updateGirviDOBButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Girvi Date?");
        if (confirm_box == true) {
            var str = "&updateDOBHDay=" + (document.getElementById("updateDOBHDay").value)
                    + "&updateDOBHMonth=" + (document.getElementById("updateDOBHMonth").value)
                    + "&updateDOBHYear=" + (document.getElementById("updateDOBHYear").value);
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&girviDOBDay=" + girviDateDay + "&girviDOBMonth=" + girviDateMMM +
                    "&girviDOBYear=" + girviDateYY + "&jrnlId=" + jrnlId + "&panelName=" + panelName
                    + "&girviTransId=" + gTransId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                    + "&girviSerialNum=" + girviSerialNum + "&prinAmt=" + prinAmt + "&girviDOBTithi=" + girviHindiTithi
                    + "&girviDOBPaksha=" + girviHindiPaksha + str;
            poststr4 = poststr;
            searchHindiDate("", "display_girvi_updt_eng_date");

        }
    }
    document.getElementById("updateGirviDOBButton").style.visibility = "visible";
    //}
    return false;
}
function functionToSubmitUpdtDtForm() {
    update_girvi_DOB_amount(docRtPath + '/include/php/olgugvdd.php', poststr4);
}
/******End  code to add searchHindiDate ,functionToSubmitUpdtDtForm @Author:ANUJA26JUN15**************/

/******Start  code to add AuctionalPanel  @Author:ANUJA29MAY15**************/
function changeMonthLoanRelDateTithi(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption, girviCompoundedOption,
        princAmount, interestType, girviDOB, girviId, custId, girviType, panel, girviStatus, girviHindiDOB, dateCompare, girviDOBTithi, girviDOBPaksha, girviHindiTithi, girviHindiPaksha, auctionPanel) {

    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    if (validateSelectField(relDateDDValue, "Please Select Release Date Day!") == false) {
        document.getElementById("DOBDay").focus();
        exit();
    } else if (validateSelectField(relDateMMValue, "Please select Release Date Month!") == false) {
        document.getElementById("DOBMonth").focus();
        exit();
    } else if (validateSelectField(relDateYYValue, "Please select Release Date Year!") == false) {
        document.getElementById("DOBYear").focus();
        exit();
    } else {
        var girviDateDay = relDateDDValue;
        var girviDateMMM = relDateMMValue;
        var girviDateYY = relDateYYValue;
        var girviDateStr = UpdateIndianCivil(document.getElementById("DOBYear").value, document.getElementById("DOBMonth").value, document.getElementById("DOBDay").value,
                'DOBHDayForRelease', 'DOBHMonthForRelease', 'DOBHYearForRelease');
        var todayDate = new Date(girviDateStr); // Today Date
        var milliTodayDate = todayDate.getTime();
        var girviDate = new Date(dateCompare); // Girvi Date
        var milliGirviDate = girviDate.getTime();

        var datesDiff = milliTodayDate - milliGirviDate;

        if (datesDiff < 0) {
            alert('Please Select the correct Girvi Release Date!');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            exit();
        } else {
            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                exit();
            }
            var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                    + "&ROIValue=" + girviROI + "&gMonthIntOption=" + monthlyInterestType
                    + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
                    + "&princAmount=" + princAmount + "&interestType=" + interestType
                    + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                    + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE"
                    + "&omPanelDiv=" + panel + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
                    + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
                    + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha + "&auctionPanel=" + auctionPanel;

            if (girviStatus == 'Transferred') {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olgggtfr.php', poststr);
            } else {
                change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
            }
            return false;
        }
    }
}
/******Start  code to add AuctionalPanel paksha @Author:ANUJA29MAY15**************/
var formId = '';
function updateGirviAddPrincipalHindiVikSam(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "visible";
    if (validateUpdateGirviAddPrincipalInputs(obj)) {
//        alert("validated");

        var girviDateDay = document.getElementById("addPrinDOBDay").value;
        var girviDateMMM = document.getElementById("addPrinDOBMonth").value;
        var girviDateYY = document.getElementById("addPrinDOBYear").value;
        var girviDateStr = UpdateIndianCivil(document.getElementById("addPrinDOBYear").value, document.getElementById("addPrinDOBMonth").value, document.getElementById("addPrinDOBDay").value,
                'DOBHDayForAddPrinc', 'DOBHMonthForAddPrinc', 'DOBHYearForAddPrinc');
        var girviNDate = new Date(girviDateStr);
        var todayNDate = new Date(); // Today Date
        var milliGirviDate = girviNDate.getTime();
        var milliTodayDate = todayNDate.getTime();
        var datesDiff = milliTodayDate - milliGirviDate; //End code to change condition for girvi date @Author:SHRI07APR15

//        if (datesDiff < 0) {
//            alert('Please Select the correct Date!');
//            document.getElementById("addPrinDOBDay").focus();
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
//            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
//        }
//        /*End to check date is valid or not @AUTHOR: SANDY19AUG13*/
//        else {
        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("addPrinDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";

        } else {
            searchHindiDate("update_girvi_add_principal", "display_girvi_add_prin_eng_date");


        }
    }
    //}
    else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
    }
}
function functionToSubmitAddPrinForm()
{
    var str = "&DOBHDayForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHDayForAddPrinc").value)
            + "&DOBHMonthForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHMonthForAddPrinc").value)
            + "&DOBHYearForAddPrinc=" + encodeURIComponent(document.getElementById("DOBHYearForAddPrinc").value);
    var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
            + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
            + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
            + "&principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
            + "&principalAmountROI=" + encodeURIComponent(document.getElementById("principalAmountROI").value)
            + "&addPrinDOBDay=" + encodeURIComponent(document.getElementById("addPrinDOBDay").value)
            + "&addPrinDOBMonth=" + encodeURIComponent(document.getElementById("addPrinDOBMonth").value)
            + "&girvPrinPreId=" + encodeURIComponent(document.getElementById("girvPrinPreId").value)
            + "&girvPrinPostId=" + encodeURIComponent(document.getElementById("girvPrinPostId").value)
            + "&addPrinDOBYear=" + encodeURIComponent(document.getElementById("addPrinDOBYear").value)
            + "&otherInfoField=" + encodeURIComponent(document.getElementById("otherInfoField").value)
            + "&girviSerialNum=" + encodeURIComponent(document.getElementById("girviSerialNum").value)
            + "&addPrinDrAccId=" + encodeURIComponent(document.getElementById("addPrinDrAccId").value)
            + "&addPrinCrAccId=" + encodeURIComponent(document.getElementById("addPrinCrAccId").value)
            + "&addPrinDOBDayTithi=" + encodeURIComponent(document.getElementById("addPrinDOBDayTithi").value)
            + "&addPrinDOBDayPaksh=" + encodeURIComponent(document.getElementById("addPrinDOBDayPaksh").value)
            + str; //get value of other info field @AUTHOR: SANDY03JAN14

    update_girvi_add_principal('include/php/olguadpn.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
}

function changeGirviAddPrinDateHindiVikSam(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, princAmount, interestType, girviDate, girviId, custId, girviType, girviUpdSts,
        gMonthIntOption, gCurrentAddPrinDiv, omPanelDiv, girviHindiDOB, principalEngDOB, lastDayInt, girviDOBTithi, girviDOBPaksha, girviHindiTithi, girviHindiPaksha) {

    girviCurrentAddPrinDiv = gCurrentAddPrinDiv;
    var girviDateDay = document.getElementById("AddPrincDOBDay").value;
    var girviDateMMM = document.getElementById("AddPrincDOBMonth").value;
    var girviDateYY = document.getElementById("AddPrincDOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("AddPrincDOBYear").value, document.getElementById("AddPrincDOBMonth").value, document.getElementById("AddPrincDOBDay").value,
            'DOBHDayAddPrincGirviRel', 'DOBHMonthAddPrincGirviRel', 'DOBHYearAddPrincGirviRel');
    var todayDate = new Date(girviDateStr); // Today Date
    var milliTodayDate = todayDate.getTime();
    var girviDate1 = new Date(principalEngDOB); // Girvi Date
    var milliGirviDate = girviDate1.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;

//    if (datesDiff < 0) {
//        alert('Please Select the correct Release Date!');
//        document.getElementById("AddPrincDOBDay").focus();
//        return false;
//        exit();
//    } else {
    if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
            girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
        alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
        document.getElementById("AddPrincDOBDay").focus();
    } else {
        var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType
                + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
                + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&gMonthIntOption=" + gMonthIntOption + "&girviCurrentAddPrinDiv=" + girviCurrentAddPrinDiv
                + "&grvRelPayDetails=False" + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
                + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
                + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha;

        change_girvi_add_prin_date(documentRootPath + '/include/php/olggttam.php', poststr); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
        return false;
    }
    // }
}

function releasePrincipalAmountHindiVikSam(documentRootPath, custId, girviId, principalId, principalDD, principalMM, principalYY, pricipalTotalTime, releaseTotalPrincAmt,
        releaseTotalPrincInt, releaseTotalPrincPaidInt, releaseTotalPrincPaidAmt, releaseTotalPrincDis, relPrinLoanAccId, relPrinCashAccId, relPrinIntRecAccId, relPrinDiscAccId,
        transStatus, girviHindiDOB, principalEngDOB, addPrincDOBTithi, addPrincDOBPaksh) {

    var girviDateDay = document.getElementById("AddPrincDOBDay").value;
    var girviDateMMM = document.getElementById("AddPrincDOBMonth").value;
    var girviDateYY = document.getElementById("AddPrincDOBYear").value;
    var girviDateStr = UpdateIndianCivil(document.getElementById("AddPrincDOBYear").value, document.getElementById("AddPrincDOBMonth").value, document.getElementById("AddPrincDOBDay").value,
            'DOBHDayAddPrincGirviRel', 'DOBHMonthAddPrincGirviRel', 'DOBHYearAddPrincGirviRel');
    var todayDate = new Date(girviDateStr); // Today Date
    var milliTodayDate = todayDate.getTime();
    var girviDate1 = new Date(principalEngDOB); // Girvi Date
    var milliGirviDate = girviDate1.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
//
//    if (datesDiff < 0) {
//        alert('Please Select the correct Release Date!');
//        document.getElementById("AddPrincDOBDay").focus();
//        document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
//        //document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
//    }
//    /*End to check date is valid or not @AUTHOR: SANDY19AUG13*/
//    else {
    if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
            girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
        alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
        document.getElementById("AddPrincDOBDay").focus();
        document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
    } else {
        document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "hidden";
        if (transStatus == 'Transferred') {
            confirm_box = confirm("This principal has been transferred !\nDo you really want to release this Principal Amount?");
        } else {
            confirm_box = confirm("Do you really want to release this Principal Amount?");
        }
        if (confirm_box == true)
        {
            var str = "&DOBHDayAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHDayAddPrincGirviRel').value)
                    + "&DOBHMonthAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHMonthAddPrincGirviRel').value)
                    + "&DOBHYearAddPrincGirviRel=" + encodeURIComponent(document.getElementById('DOBHYearAddPrincGirviRel').value);
            principalDOR = principalDD + ' ' + principalMM + ' ' + principalYY;
            var poststr = "custId=" + encodeURIComponent(custId)
                    + "&girviId=" + encodeURIComponent(girviId)
                    + "&principalId=" + encodeURIComponent(principalId)
                    + "&principalDOR=" + encodeURIComponent(principalDOR)
                    + "&pricipalTotalTime=" + encodeURIComponent(pricipalTotalTime)
                    + "&releaseTotalPrincAmt=" + encodeURIComponent(releaseTotalPrincAmt)
                    + "&releaseTotalPrincInt=" + encodeURIComponent(releaseTotalPrincInt)
                    + "&releaseTotalPrincPaidInt=" + encodeURIComponent(releaseTotalPrincPaidInt)
                    + "&releaseTotalPrincPaidAmt=" + encodeURIComponent(releaseTotalPrincPaidAmt)
                    + "&releaseTotalPrincDis=" + encodeURIComponent(releaseTotalPrincDis)
                    + "&relPrinLoanAccId=" + encodeURIComponent(relPrinLoanAccId)
                    + "&relPrinCashAccId=" + encodeURIComponent(relPrinCashAccId)
                    + "&relPrinIntRecAccId=" + encodeURIComponent(relPrinIntRecAccId)
                    + "&relPrinDiscAccId=" + encodeURIComponent(relPrinDiscAccId)
                    + "&addPrincDOBTithi=" + encodeURIComponent(addPrincDOBTithi)
                    + "&addPrincDOBPaksh=" + encodeURIComponent(addPrincDOBPaksh)
                    + str;

            release_principal_amount(documentRootPath + '/include/php/olgurepn.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
        }

        document.getElementById("releaseGirviPrincAmtButton" + principalId).style.visibility = "visible";
        return false;
    }
    //}
}
var poststr1 = '';
function updateGirviDepositMoneyHindiVikDate(obj, selROIValue, girviSerialNo, dateComapre, girviDOBTithi, girviDOBPaksha) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";

    var girviIntAdjustmentCheck = 'False';

    if (document.getElementById("girviIntAdjustment").checked == true) {
        girviIntAdjustmentCheck = 'True';
    }

    if (girviDepositMonOpt == 'Help') {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
        update_girvi_deposit_money('include/php/orgggmdh.php', '');
    } else {
        var girviDateDay = document.getElementById("DMDOBDay").value;
        var girviDateMMM = document.getElementById("DMDOBMonth").value;
        var girviDateYY = document.getElementById("DMDOBYear").value;
        var girviDepDateStr = UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');
        var girviDepDate = new Date(girviDepDateStr); // Girvi Deposit Date
        var milliGirviDepDate = girviDepDate.getTime();
//        var girviDateStr1 = document.getElementById("girviNewDateForUpdate").value;
//        var DOBArr = girviDateStr1.split(" ");
//        var girviHDateStr = UpdateIndianCivil(DOBArr[2], DOBArr[1], DOBArr[0], '', '', '');
        var girviHDateStr = dateComapre;
        var girviMainDateStr = new Date(girviHDateStr); //Girvi Main Date
        var milliGirviDate = girviMainDateStr.getTime();
        var todayDateStr = new Date(); //Today's date
        var milliTodayDate = todayDateStr.getTime();
        var datesDiff = milliGirviDepDate - milliGirviDate;
        var currentDatesDiff = milliTodayDate - milliGirviDepDate;

//        if (datesDiff < 0) {
//            alert('Please Select the correct Girvi Deposit Date!');
//            document.getElementById("DMDOBDay").focus();
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
//            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
//        }
//        else if (currentDatesDiff < 0 && girviDepositMonOpt == 'CalculateNow') {
//            alert('Please Select the correct Girvi Deposit Date!');
//            document.getElementById("DMDOBDay").focus();
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
//            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
//        }
////        else if (datesDiff < 0 && girviDepositMonOpt == 'CalculateNow') {
////            alert('Please Select the correct Girvi Deposit Date!');
////            document.getElementById("DMDOBDay").focus();
////            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
////            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
////            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
////        } 
//        else {
//        if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
//                girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
//            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
//            document.getElementById("DMDOBDay").focus();
//            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
//            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        } else {
        if (validateUpdateGirviDepositMoneyInputsHindi(obj)) {
            poststr1 = "&girviIntAdjustmentCheck=" + encodeURIComponent(girviIntAdjustmentCheck)
                    + "&girviSerialNo=" + encodeURIComponent(girviSerialNo)
                    + "&girviDOBTithi=" + encodeURIComponent(girviDOBTithi)
                    + "&girviDOBPaksha=" + encodeURIComponent(girviDOBPaksha)
                    + "&girviDepositMonOpt=" + girviDepositMonOpt//added @Author:PRIYA05MAY14

            searchHindiDate("update_girvi_deposit_money", "display_girvi_money_dep_eng_date");
//            functionToSubmitMoneyDepForm();

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
        }
        // }
        //}
    }
}
function functionToSubmitMoneyDepForm()
{
    var str = "";
    UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
            'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');
    str = "&DOBHDayForMoneyDep=" + document.getElementById('DOBHDayForMoneyDep').value + "&DOBHMonthForMoneyDep=" + document.getElementById('DOBHMonthForMoneyDep').value +
            "&DOBHYearForMoneyDep=" + document.getElementById('DOBHYearForMoneyDep').value;
    var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
            + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
            + "&girviNewDateForUpdate=" + encodeURIComponent(document.getElementById("girviNewDateForUpdate").value)
            + "&girviTimePeriodVar=" + encodeURIComponent(document.getElementById("girviTimePeriodVar").value)
            + "&girviDepositPrinAmount=" + encodeURIComponent(document.getElementById("girviDepositPrinAmount").value)
            + "&girviDepositIntAmount=" + encodeURIComponent(document.getElementById("girviDepositIntAmount").value)
            + "&ROIValue=" + encodeURIComponent(document.getElementById("selROI").value) //selROI Id Added @Author:PRIYA23OCT13
            + "&intType=" + encodeURIComponent(document.getElementById("interestType").value)
            + "&totalPrincipalAmount=" + encodeURIComponent(document.getElementById("totalPrincipalAmount").value)
            + "&totalInterestAmount=" + encodeURIComponent(document.getElementById("totalInterestAmount").value)
            + "&DOBDay=" + encodeURIComponent(document.getElementById("DMDOBDay").value)
            + "&DOBMonth=" + encodeURIComponent(document.getElementById("DMDOBMonth").value)
            + "&DOBYear=" + encodeURIComponent(document.getElementById("DMDOBYear").value)
            + "&simpleOrCompIntOption=" + encodeURIComponent(document.getElementById("simpleOrCompIntOption").value)
            + "&girviCompoundedOption=" + encodeURIComponent(document.getElementById("girviCompoundedOption").value)
            + "&gMonthIntOption=" + encodeURIComponent(document.getElementById("monthlyInterestType").value)
            + "&otherInfoField=" + encodeURIComponent(document.getElementById("otherInfoField").value)//TO GET OTH INFO VALUE @AUTHOR: SANDY03JAN14
            + "&girviDepLoanAccId=" + encodeURIComponent(document.getElementById("girviDepLoanAccId").value)
            + "&girviDepIntRecAccId=" + encodeURIComponent(document.getElementById("girviDepIntRecAccId").value)
            + "&girviDepCashAccId=" + encodeURIComponent(document.getElementById("girviDepCashAccId").value)
            + "&girviNewDOBStr=" + encodeURIComponent(document.getElementById("girviNewDOBStr").value)
            + "&girviDMDOBTithi=" + encodeURIComponent(document.getElementById("DMDOBTithi").value)
            + "&girviDMDOBPaksh=" + encodeURIComponent(document.getElementById("DMDOBPaksh").value)
            + "&girviTithiDOBStr=" + encodeURIComponent(document.getElementById("girviTithiDOBStr").value)

            + "&totalOInterestAmount=" + encodeURIComponent(document.getElementById("totalOInterestAmount").value)  // START CODE TO GET ALL PAYMENT DETAILS FOR LOAN MONEY DEPOSIT @AUTHOR:GANGADHAR-26MAY2023
            + "&girviSerialNo=" + encodeURIComponent(girviSerialNo)
            + "&girviDepositMonOpt=" + encodeURIComponent(girviDepositMonOpt)
            + "&girviDepExtraAmt=" + encodeURIComponent(document.getElementById("girviDepExtraAmt").value)
            + "&girviDepExtraAmtAccId=" + encodeURIComponent(document.getElementById("girviDepExtraAmtAccId").value)
            + "&girviDepChequeAccId=" + encodeURIComponent(document.getElementById("girviDepChequeAccId").value)
            + "&girviDepCardAccId=" + encodeURIComponent(document.getElementById("girviDepCardAccId").value)
            + "&girviDepOnlineAccId=" + encodeURIComponent(document.getElementById("girviDepOnlineAccId").value)
            + "&girvDepCashAmtRec=" + encodeURIComponent(document.getElementById("girvDepCashAmtRec").value)
            + "&girvDepBankAmtRec=" + encodeURIComponent(document.getElementById("girvDepBankAmtRec").value)
            + "&girvDepCardAmtRec=" + encodeURIComponent(document.getElementById("girvDepCardAmtRec").value)
            + "&girvDepOnlineAmtRec=" + encodeURIComponent(document.getElementById("girvDepOnlineAmtRec").value)
            + "&girvDepCashNarration=" + encodeURIComponent(document.getElementById("girvDepCashNarration").value)
            + "&girvDepBankNarration=" + encodeURIComponent(document.getElementById("girvDepBankNarration").value)
            + "&girvDepCardNarration=" + encodeURIComponent(document.getElementById("girvDepCardNarration").value)
            + "&girvDepOnlineNarration=" + encodeURIComponent(document.getElementById("girvDepOnlineNarration").value)
            + "&operdayint=" + encodeURIComponent(document.getElementById("operdayint").value)
            + "&iperdayint=" + encodeURIComponent(document.getElementById("iperdayint").value)   // END  CODE TO GET ALL PAYMENT DETAILS FOR LOAN MONEY DEPOSIT @AUTHOR:GANGADHAR-26MAY2023
            + str
            + poststr1;
    
    if (girviDepositMonOpt == 'SimplyDeposit') {
        update_girvi_deposit_money('include/php/olgudmsm.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'CalculateNow') {
        update_girvi_deposit_money('include/php/olgudmcn.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'DepositFullInt') {
        update_girvi_deposit_money('include/php/olgudmfi.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'DepositIntWithDis') {
        update_girvi_deposit_money('include/php/olgudmds.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'DepositIntAmtLeft') {
        update_girvi_deposit_money('include/php/olgudmds.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'DepositIntAdjInPrin') {
        update_girvi_deposit_money('include/php/olgudmap.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else if (girviDepositMonOpt == 'DepositPrinIntLeft') {
        update_girvi_deposit_money('include/php/olgudpil.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }
}
function changeGirviUpdateDateHindiVikSam(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviDepositPrinAmount, girviDepositIntAmount, girviROI, princAmount,
        interestType, girviDOB, girviDateStr, girviId, custId, girviType, girviUpdSts, simpleOrCompIntOption, girviCompoundedOption, girviHindiDOB, dateCompare, girviDOBTithi,
        girviDOBPaksha, girviHindiTithi, girviHindiPaksha) {

    girviCurrentStatus = 'girviUpdateGirviResultDiv';
    if (validateSelectField(document.getElementById("DMDOBDay").value, "Please Select Deposit Amount Day!") == false) {
        document.getElementById("DMDOBDay").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBMonth").value, "Please select Deposit Amount Month!") == false) {
        document.getElementById("DMDOBMonth").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBYear").value, "Please select Deposit Amount Year!") == false) {
        document.getElementById("DMDOBYear").focus();
        exit();
    } else {
        var girviDateDay = document.getElementById("DMDOBDay").value;
        var girviDateMMM = document.getElementById("DMDOBMonth").value;
        var girviDateYY = document.getElementById("DMDOBYear").value;
        var girviDepDateStr = UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');

        var girviDepDate = new Date(girviDepDateStr); // Girvi Deposit Date
        var milliGirviDepDate = girviDepDate.getTime();
        var girviMainDateStr = new Date(dateCompare); //Girvi Main Date
        var milliGirviDate = girviMainDateStr.getTime();
//        var datesDiff = milliGirviDepDate - milliGirviDate;
//        if (datesDiff < 0) {
//            alert('Please Select the correct Date ! The latest entry present on ' + girviHindiDOB + ' !');
//            document.getElementById("DMDOBDay").focus();
//        }
//        else {
//            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
//                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
//                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
//                document.getElementById("DMDOBDay").focus();
//            } else {
        var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                + "&girviDepositPrinAmount=" + girviDepositPrinAmount + "&girviDepositIntAmount=" + girviDepositIntAmount
                + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType.value
                + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&grvRelPayDetails=False" + "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                "&girviCompoundedOption=" + girviCompoundedOption + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
                + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
                + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha;
        // alert(poststr);
        if (girviCurrentStatus == 'girviUpdateGirviResultDiv') {
            change_Girvi_Release_Date(documentRootPath + '/include/php/olgugdtdrs.php', poststr);
        } else {
            change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
        }
        //}
        return false;
    }
    //}
}

function changeMonthGirviUpdateDateHindiVikSam(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviDepositPrinAmount, girviDepositIntAmount, girviROI, princAmount,
        interestType, girviDOB, girviDateStr, girviId, custId, girviType, girviUpdSts, simpleOrCompIntOption, girviCompoundedOption, girviHindiDOB, dateCompare, girviDOBTithi,
        girviDOBPaksha, girviHindiTithi, girviHindiPaksha) {

    girviCurrentStatus = 'girviUpdateGirviResultDiv';
    if (validateSelectField(document.getElementById("DMDOBDay").value, "Please Select Deposit Amount Day!") == false) {
        document.getElementById("DMDOBDay").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBMonth").value, "Please select Deposit Amount Month!") == false) {
        document.getElementById("DMDOBMonth").focus();
        exit();
    } else if (validateSelectField(document.getElementById("DMDOBYear").value, "Please select Deposit Amount Year!") == false) {
        document.getElementById("DMDOBYear").focus();
        exit();
    } else {
        var girviDateDay = document.getElementById("DMDOBDay").value;
        var girviDateMMM = document.getElementById("DMDOBMonth").value;
        var girviDateYY = document.getElementById("DMDOBYear").value;
        var girviDepDateStr = UpdateIndianCivil(document.getElementById("DMDOBYear").value, document.getElementById("DMDOBMonth").value, document.getElementById("DMDOBDay").value,
                'DOBHDayForMoneyDep', 'DOBHMonthForMoneyDep', 'DOBHYearForMoneyDep');

        var girviDepDate = new Date(girviDepDateStr); // Girvi Deposit Date
        var milliGirviDepDate = girviDepDate.getTime();
        var girviMainDateStr = new Date(dateCompare); //Girvi Main Date
        var milliGirviDate = girviMainDateStr.getTime();
//        var datesDiff = milliGirviDepDate - milliGirviDate;
//        if (datesDiff < 0) {
//            alert('Please Select the correct Date ! The latest entry present on ' + girviHindiDOB + ' !');
//            document.getElementById("DMDOBDay").focus();
//        }
//        else {
//            if ((girviDateMMM == 'CHA' || girviDateMMM == 'ASW' || girviDateMMM == 'KAR' || girviDateMMM == 'MAN' || girviDateMMM == 'POU' ||
//                    girviDateMMM == 'MAG' || girviDateMMM == 'FAL') && girviDateDay > 30) {
//                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
//                document.getElementById("DMDOBDay").focus();
//            } else {
        var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
                + "&girviDepositPrinAmount=" + girviDepositPrinAmount + "&girviDepositIntAmount=" + girviDepositIntAmount
                + "&ROIValue=" + girviROI + "&princAmount=" + princAmount + "&interestType=" + interestType
                + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
                + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&grvRelPayDetails=False" + "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                "&girviCompoundedOption=" + girviCompoundedOption + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
                + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
                + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha;

        if (girviCurrentStatus == 'girviUpdateGirviResultDiv') {
            change_Girvi_Release_Date(documentRootPath + '/include/php/olgugdtdrs.php', poststr);
        } else {
            change_Girvi_Release_Date(documentRootPath + '/include/php/olggttam.php', poststr);
        }
        //}
        return false;
    }
    //}
}
function girviDepositMoneySubmitHindiVikSam(documentRootPath, custId, girviId, newPrincipalAmount, girviDepositPrinAmount,
        girviDepositIntAmount, girviRealIntAmount, totalAmountDep, depDiscountAmt, girviDepositDate, newGirviDate, girviComm,
        simpleOrCompIntOption, girviCompoundedOption, interestType, monthlyInterestType, amountLeft, moneyDepOption, girviSerialNo,
        girviDepositMonOpt, girviDepLoanAccId, girviDepIntRecAccId, girviDepCashAccId, girviHDepositDate, newHGirviDate, newTithi, newPaksha, girviTithi, girviPaksh, intAmtLeftBefore) {

    document.getElementById("girviUpdateDepMoneySubmitDiv").style.visibility = "hidden";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
    confirm_box = confirm("Do you really want to update this Girvi?");
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId +
                "&girviId=" + girviId +
                "&newPrincipalAmount=" + newPrincipalAmount +
                "&girviDepositPrinAmount=" + girviDepositPrinAmount +
                "&girviDepositIntAmount=" + girviDepositIntAmount +
                "&girviRealIntAmount=" + girviRealIntAmount +
                "&totalAmountDep=" + totalAmountDep +
                "&depDiscountAmt=" + depDiscountAmt +
                "&girviDepositDate=" + girviDepositDate +
                "&newGirviDate=" + newGirviDate +
                "&girviComm=" + encodeURIComponent(girviComm) +
                "&simpleOrCompIntOption=" + simpleOrCompIntOption +
                "&girviCompoundedOption=" + girviCompoundedOption +
                "&interestType=" + interestType +
                "&monthlyInterestType=" + monthlyInterestType +
                "&amountLeft=" + amountLeft +
                "&moneyDepOption=" + moneyDepOption +
                "&girviSerialNo=" + girviSerialNo +
                "&girviDepositMonOpt=" + girviDepositMonOpt +
                "&girviDepLoanAccId=" + girviDepLoanAccId +
                "&girviDepIntRecAccId=" + girviDepIntRecAccId +
                "&girviDepCashAccId=" + girviDepCashAccId +
                "&girviHindiDepositDate=" + girviHDepositDate +
                "&newHindiGirviDate=" + newHGirviDate +
                "&newTithi=" + newTithi +
                "&newPaksha=" + newPaksha +
                "&girviTithi=" + girviTithi +
                "&girviPaksh=" + girviPaksh +
                "&intAmtLeftBefore=" + intAmtLeftBefore;
        //alert(poststr);
        girvi_deposit_money_submit(documentRootPath + '/include/php/olgugdmd.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }

    document.getElementById("girviUpdateDepMoneySubmitDiv").style.visibility = "visible";
    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
    return false;
}
function releaseAuctionVikSam(custId, girviId, pageNo, relDD, relMM, relYY, girviFirmId, aucPrinAmt, aucIntrAmount, auctionAmount, auctotalAmount, aucLoanPrinAmtAccId,
        aucLoanAucAmtAccId, aucLoanFinalAmtAccId, aucLoanIntAmtAccId, relTithi, relPaksh) {

//
//START CODE FOR AUCTION CHARGES AND EXTRA CHARGES : AUTHOR @DARSHANA 
    var aucChargeAmount = document.getElementById('aucChargeAmount').value;
    var aucExChrgAmount = document.getElementById('aucExChrgAmount').value;
    var accChargesAcc = document.getElementById('girv_auction_chrg_acc').value;
    var accExtraChrgAcc = document.getElementById('girv_auction_extra_chrg_acc').value;
    //

    document.getElementById("girviReleaseButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//alert('relDD='+relDD + 'relMM='+ relMM + 'relYY=' + relYY + 'relTithi='+relTithi + 'relPaksh='+relPaksh )

    if (validateSelectField(document.getElementById('DOBDay').value, "Please select Auction Date Tithi!") == false) {
        document.getElementById('DOBDay').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('DOBMonth').value, "Please select Auction Date Month!") == false) {
        document.getElementById('DOBMonth').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('DOBYear').value, "Please select Auction Date Year!") == false) {
        document.getElementById('DOBYear').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('DOBDayPaksh').value, "Please select Auction Date paksh!") == false) {
        document.getElementById('DOBDayPaksh').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('aucLoanPrinAmtAccId').value, "Please select Auction Loan Account!") == false) {
        document.getElementById('aucLoanPrinAmtAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('aucLoanIntAmtAccId').value, "Please select Auction Interest Rec. Account!") == false) {
        document.getElementById('aucLoanIntAmtAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('aucLoanAucAmtAccId').value, "Please select Auction Cash Rec. Account!") == false) {
        document.getElementById('aucLoanAucAmtAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(document.getElementById('aucLoanFinalAmtAccId').value, "Please select Auction Discount Account!") == false) {
        document.getElementById('aucLoanFinalAmtAccId').focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else {
        if (validateEmptyField(document.getElementById("auctionAmount").value, "Please enter Auction Amount!") == false ||
                validateNum(document.getElementById("auctionAmount").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("auctionAmount").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            return false;
            exit();
        }

        confirm_box = confirm("Do you really want to release this Auction?");

        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId + "&pageNo=" + pageNo
                    + "&relDD=" + relDD + "&relMM=" + relMM + "&relYY=" + relYY + "&girviFirmId=" + girviFirmId +
                    "&aucPrinAmt=" + aucPrinAmt + "&aucIntrAmount=" + aucIntrAmount + "&auctionPanel=AuctionPanel" + "&auctionAmount=" + auctionAmount + "&auctotalAmount=" + auctotalAmount
                    + "&aucLoanPrinAmtAccId=" + aucLoanPrinAmtAccId + "&aucLoanAucAmtAccId=" + aucLoanAucAmtAccId + "&aucLoanFinalAmtAccId=" + aucLoanFinalAmtAccId +
                    "&aucLoanIntAmtAccId=" + aucLoanIntAmtAccId + "&relTithi=" + relTithi + "&relPaksh=" + relPaksh + "&aucChargeAmount=" + aucChargeAmount + "&aucExChrgAmount=" + aucExChrgAmount + "&accChargesAcc=" + accChargesAcc + "&accExtraChrgAcc=" + accExtraChrgAcc;

            release_girvi('include/php/olaucgrl.php', poststr);//change in filename @AUTHOR:ANUJA28FEB15
        } else {
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
//        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
//document.getElementById("girviReleaseButDiv").style.visibility = "visible";
//document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
}
/******************************************/
/******END HINNDI PAKSHA*****************/
/******************************************/

