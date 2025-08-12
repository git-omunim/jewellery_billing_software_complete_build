<?php /**
 * 
 * Created on Jul 4, 2011 12:34:51 PM
 *
 * @FileName: ormlupln.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */ ?>
<?php
//changes in file @AUTHOR: SANDY28JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY31JAN14
require_once 'system/omssopin.php';

//Start to get access values for subfields in form @AUTHOR: SANDY15AUG13
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//End to get access values for subfields in form @AUTHOR: SANDY15AUG13
?>
<?php
$mlId = $_GET['mlId'];
$loanId = $_GET['loanId'];
$girviId = $loanId;
$custId = $mlId;

$qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId'";
$resAllGirvi = mysqli_query($conn, $qSelAllGirvi);
$rowAllGirvi = mysqli_fetch_array($resAllGirvi);

$mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
$princAmount = $rowAllGirvi['ml_prin_amt'];
$firmLoanNo = $rowAllGirvi['ml_firm_mli_no'];
$firm = $rowAllGirvi['ml_firm_id'];
$loanJrnlId = $rowAllGirvi['ml_jrnlid'];
$mlTrType = $rowAllGirvi['ml_ln_cr_dr'];
$mlId = $rowAllGirvi['ml_lender_id'];
$loanType = $rowAllGirvi['ml_loan_type'];

$selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$firm' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resSelFirmName = mysqli_query($conn, $selFirmName);
$rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
$firmName = $rowSelFirmName['firm_name'];

$ROIId = $rowAllGirvi['ml_ROI_Id'];

//Start Code to check ROI Id is null or not
if ($ROIId == NULL || $ROIId == '' || $ROIId == 0) {
    $ROI = $rowAllGirvi['ml_ROI'];

    $qSelROI = "SELECT roi_id FROM roi where roi_value='$ROI'";
    $resROI = mysqli_query($conn, $qSelROI);
    $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
    $ROIId = $rowROI['roi_id'];

    $qUpdGirvi = "UPDATE ml_loan SET ml_ROI_Id='$ROIId'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn, $qUpdGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//End Code to check ROI Id is null or not

if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $ROI = $rowAllGirvi['ml_IROI'];
} else {
    $ROI = $rowAllGirvi['ml_ROI'];
}
$ROIType = $rowAllGirvi['ml_ROI_typ'];
$girviDOB = $rowAllGirvi['ml_DOB'];
$girviDOB = om_strtoupper(date("d M Y", strtotime($girviDOB)));
$girviNewDOB = $rowAllGirvi['ml_new_DOB'];
$girviNewDOB = om_strtoupper(date("d M Y", strtotime($girviNewDOB)));
$girviIntOpt = $rowAllGirvi['ml_int_opt'];
$girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];
$girviType = $rowAllGirvi['ml_type'];
$mlLnNo = $rowAllGirvi['ml_cust_mli_num'];
$preSerialNum = $rowAllGirvi['ml_pre_serial_num'];
$serialNum = $rowAllGirvi['ml_serial_num'];
$loanSerialNum = $preSerialNum . $serialNum;
$girviOtherInfo = $rowAllGirvi['ml_comm'];
$girviUpdSts = $rowAllGirvi['ml_upd_sts'];
$selInerestType = $rowAllGirvi['ml_ROI_typ'];
$gMonthIntOption = $rowAllGirvi['ml_monthly_intopt']; //@AUTHOR: SANDY21JAN14
//Start code to add new Girvi DOB
if ($girviNewDOB == '' || $girviNewDOB == NULL) {
    $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$girviDOB'
                                         WHERE ml_id='$loanId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn, $qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    $girviNewDOB = $girviDOB;
}
//End code to add new Girvi DOB
$omPanelDiv = 'mlLoanUpdate'; //set panel for roi files @AUTHOR: SANDY21NOV13

$girviFirmId = $rowAllGirvi['ml_firm_id'];
$qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resFirm = mysqli_query($conn, $qSelFirm);
$rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);

$selInerestType = $ROIType;

switch ($selInerestType) {
    case "Monthly":
        $optIntType1 = "selected";
        break;
    case "Annually":
        $optIntType2 = "selected";
        break;
}
?>
<div id="loanDetailsUpdateDiv" class="ShadowFrm">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="center" width="3%">
                            <div>
                                <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px"/>
                            </div>
                        </td>
                        <td align="left">
                            <div>
                                <div class="main_link_orange_normal16" style="color: #DF264A;">
                                    <b>UPDATE LOAN DETAILS</b>
                                </div>
                                <?php // echo $updateLoanPanel; ?>
                                <!--USE MSG VARIABLE @AUTHOR: SANDY31JAN14--->
                            </div>
                            <div id="display_girvi_barcode_slip" class="display-girvi-barcode-slip"></div>
                        </td>
                        <td align="right">
                            <input type="submit" id="sameLoanDet" name="sameLoanDet" class="frm-btn" 
                                   value="LOAN DETAILS" onclick="getLoanDetails('<?php echo $mlId; ?>', '<?php echo $loanId; ?>', 'LoanDetailPanel');"
                                   style="font-size:14px;"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td align="left" width="100%" colspan="2">
                <div>
                    <table border="0" cellpadding="2" cellspacing="2" width="100%">
                        <tr align="left">
                            <td width="100%" colspan="2">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: #fff6ea;border: 1px dashed #f7750a;padding: 5px;">
                                    <tr>
                                        <td align="center" valign="top" width="20%"> 
                                            <table border="0" cellpadding="1" cellspacing="1" width="100%" align="left">
                                                <tr>  
                                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b>PRINCIPAL AMOUNT</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" colspan="2" valign="middle" width="235px" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF"
                                                        style="height: 40px;width: 100%;border-radius: 4px;position:relative">
                                                        <div class="spaceLeft5" style="cursor: pointer;" title="Click Here to Update Principal Amount!" 
                                                             <?php if ($staffId && $array['updateGirviAccessPrin'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php } //To disable access for staff @AUTHOR: SANDY15AUG13  ?> 
                                                             onclick="document.getElementById('principalUpadateDiv').style.visibility = 'visible';
                                                                     document.getElementById('updatePrincipalAmount').focus();
                                                                     document.getElementById('updatePrincipalButton').style.visibility = 'visible';">
                                                                 <?php echo $globalCurrency . ' ' . $mainPrincAmount ?>
                                                        </div>
                                                        <div id="principalUpadateDiv" class="principal-Upadate-Div" style="visibility: hidden;height:auto;width:100%;">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td align="left" valign="top" >
                                                                        <input id="updatePrincipalAmount" name="updatePrincipalAmount" type="text" title="Enter New Principal Amount"
                                                                               spellcheck="false" class="lgn-txtfield16-MiddleText" size="20" maxlength="30" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    <td align="left" valign="middle" >
                                                                        <div id="updatePrincipalButton">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateLoanPrincipalAmount('<?php echo $documentRoot; ?>', '<?php echo $mlId; ?>', '<?php echo $loanId; ?>', document.getElementById('updatePrincipalAmount'), '<?php echo $loanJrnlId; ?>',
                                                                                            '<?php echo $girviDOB; ?>', '<?php echo $loanSerialNum; ?>', '<?php echo $girviFirmId; ?>');">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/right-arwimg.png" height="26px" alt="Update Principal" title="Click Here to Update Principal" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td align="left"  valign="top" >
                                                                        <div id="updatePrincipalCloseButton" >
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('principalUpadateDiv').style.visibility = 'hidden';
                                                                                    document.getElementById('updatePrincipalButton').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" height="15px;" class="margin-5" alt="Update Principal" title="Click Here to Close Update Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php if ($princAmount != $mainPrincAmount) { ?>
                                                    <tr>  
                                                        <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                            <b>UPDATED PRINCIPAL AMOUNT</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" colspan="2" valign="middle" width="235px" class="textBoxCurve2px margin2pxAll textLabel24CalibriBlue backFFFFFF"
                                                            style="height: 40px;width: 100%;border-radius: 4px;position:relative">
                                                            <div class="spaceLeft5" onclick="getPrincipalUpadateDiv();">
                                                                <?php echo $globalCurrency . ' ' . $princAmount ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <tr align="left">
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b>RATE OF INTEREST</b>
                                                    </td>
                                                    <td align="left">
                                                        <div id="selTROIChangeDiv" style="visibility: hidden" class="girvi_head_blue_right">
                                                            <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" colspan="2" valign="top"> 
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr> 
                                                                <td align="center" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF"
                                                                    style="padding:0">
                                                                    <div id="ROIOption">
                                                                        <?php
                                                                        if ($staffId && $array['updateGirviAccessRoi'] != 'true') {
                                                                            $access = 'No';
                                                                        }
                                                                        /* if ($selInerestType == 'Annually') {
                                                                          $girviId = $loanId;
                                                                          include 'olggroia.php';
                                                                          } else if ($selInerestType == 'Monthly') {
                                                                          $girviId = $loanId;
                                                                          include 'olggroim.php';
                                                                          } comment @AUTHOR: SANDY02JAN14 */
                                                                        $girviId = $loanId;
                                                                        include 'olggroaa.php'; //@AUTHOR: SANDY02JAN14
                                                                        ?>
                                                                    </div>
                                                                </td>
<!--                                                                <td align="left">
                                                                    <div id="selTROIChangeDiv" style="visibility: visible" class="girvi_head_blue_right">
                                                                        <img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr> 
                                                <tr align="left">
                                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b> FIRM NAME</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF"
                                                        style="height:40px">
                                                            <?php echo $firmName; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="20%"> 
                                            <table border="0" cellpadding="1" cellspacing="1" width="100%">
                                                <tr align="left">
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b>LOAN DATE</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF" style="height:40px;">
                                                        <div class="spaceLeft5" style="cursor: pointer;" title="Click Here to Update Girvi Date!"
                                                             <?php if ($staffId && $array['updateGirviAccessDt'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php } //To disable access for staff @AUTHOR: SANDY15AUG13   ?> 
                                                             onclick="document.getElementById('girviDOBUpadateDiv').style.visibility = 'visible';
                                                                     document.getElementById('updateDOBDay').focus();
                                                                     document.getElementById('updateGirviDOBButton').style.visibility = 'visible';">
                                                                 <?php echo $girviNewDOB ?>
                                                        </div>
                                                        <div id="girviDOBUpadateDiv" class="girviDOB-Upadate-Div inputPopupbxs" style="visibility: hidden;position:absolute;width:100%;z-index: 1;">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td class="backFFFFFF textBoxCurve1px margin2pxAll" align="left" valign="top" title="Select New Girvi Date" width="80%">
                                                                        <?php
                                                                        $todayDay = date(j) - 1;
                                                                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                        $optDay[$todayDay] = "selected";
                                                                        ?> 
                                                                        <select id="updateDOBDay" name="updateDOBDay" onkeydown="javascript: if (event.keyCode == 13) {
                                                                                    document.getElementById('updateDOBMonth').focus();
                                                                                    return false;
                                                                                }" class="textBoxCurve1px textLabel14Calibri backFFFFFF" style="width:30%;height:30px;border:0;">
                                                                            <option value="NotSelected">DAY</option>
                                                                            <?php
                                                                            for ($dd = 0; $dd <= 30; $dd++) {
                                                                                echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                            }
                                                                            ?>
                                                                        </select> 

                                                                        <!-- *************** Start Code for Month *************** -->
                                                                        <?php
                                                                        $todayMM = date(n) - 1;
                                                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                        $optMonth[$todayMM] = "selected";
                                                                        ?> 
                                                                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                                        <select id="updateDOBMonth" name="updateDOBMonth" onkeydown="javascript: if (event.keyCode == 13) {
                                                                                    document.getElementById('updateDOBYear').focus();
                                                                                    return false;
                                                                                }
                                                                                //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                                                                var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                                                gbMonth = document.getElementById('gbMonthId').value;
                                                                                if (gbMonth == 1) {
                                                                                    if (event.keyCode) {
                                                                                        var sel = String.fromCharCode(event.keyCode);
                                                                                        if (sel == 0)
                                                                                        {
                                                                                            this.value = arrMonths[9];
                                                                                        } else if (sel == 1)
                                                                                        {
                                                                                            this.value = arrMonths[10];
                                                                                        } else if (sel == 2)
                                                                                        {
                                                                                            this.value = arrMonths[11];
                                                                                        }
                                                                                        // this.value = arrMonths[10];
                                                                                        document.getElementById('gbMonthId').value = 0;
                                                                                    }
                                                                                } else if (event.keyCode) {
                                                                                    var sel = String.fromCharCode(event.keyCode) - 1;
                                                                                    this.value = arrMonths[sel];
                                                                                    if (event.keyCode == 49) {
                                                                                        document.getElementById('gbMonthId').value = 1;
                                                                                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                                                                }" class="textBoxCurve1px textLabel14Calibri backFFFFFF" style="width:30%;height:30px;border:0;">
                                                                            <option value="NotSelected">MONTH</option>
                                                                            <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                                                            $queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
                                                                            $engmonformat = mysqli_query($conn, $queryengmonformat);
                                                                            $rowengmonformat = mysqli_fetch_array($engmonformat);
                                                                            $englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                                                            for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                                                                if ($englishMonthFormat == 'displayinnumber') {
                                                                                    $engMonth = date('m', strtotime($arrMonths[$mm]));
                                                                                    echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                                                                                } else {
                                                                                    echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                                                                }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                                                                            }
                                                                            ?>
                                                                        </select> 

                                                                        <!-- *************** Start Code for Year *************** -->
                                                                        <?php
                                                                        $todayYear = date(Y);
                                                                        $optYear[$todayYear] = "selected";
                                                                        ?> 
                                                                        <select id="updateDOBYear" name="updateDOBYear" onkeydown="javascript: if (event.keyCode == 13) {
                                                                                    document.getElementById('girviFirmId').focus();
                                                                                    return false;
                                                                                }" class="textBoxCurve1px textLabel14Calibri backFFFFFF" style="width:30%;height:30px;border:0;">
                                                                            <option value="NotSelected">YEAR</option>
                                                                            <?php
                                                                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                                                echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td align="left" valign="top" >
                                                                        <div id="updateGirviDOBButton">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateLoanDOBAmount('<?php echo $documentRoot; ?>', '<?php echo $mlId; ?>',
                                                                                            '<?php echo $loanId; ?>', document.getElementById('updateDOBDay'), document.getElementById('updateDOBMonth'), document.getElementById('updateDOBYear'), '<?php echo $loanJrnlId; ?>',
                                                                                            '<?php echo $girviDOB; ?>', '<?php echo $loanSerialNum; ?>', '<?php echo $girviFirmId; ?>');"><!-- pass grnlid parameteter @AUTHOR: SANDY5AUG13-->
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Update Girvi Date" title="Click Here to Update Girvi Date" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td align="left" valign="top" >
                                                                        <div id="updateGirviDOBCloseButton" >
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('girviDOBUpadateDiv').style.visibility = 'hidden';
                                                                                    document.getElementById('updateGirviDOBButton').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" class="margin-5" alt="Update Girvi Date" title="Click Here to Close Update Girvi Date Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php if ($girviUpdSts == 'Released') { ?>
                                                    <tr>
                                                        <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                            <b>LOAN RELEASED DATE</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalred backFFFFFF" style="height:40px;">
                                                            <?php echo $rowAllGirvi['girv_DOR']; ?>
                                                        </td>
                                                    </tr>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                            <b>&nbsp;</b>
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalred backFFFFFF">
                                                            <div style="visibility: visible">
                                                                <?php include 'olgrstrd.php'; //changes in  filename @AUTHOR: SANDY20NOV13     ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="10%"> 
                                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <?php if ($girviUpdSts == 'Released') { ?> 
                                                            <div class="girvi_head_red">
                                                                <img src="<?php echo $documentRootBSlash; ?>/images/red48.png" 
                                                                     alt="Released Loan" title="Released Loan" />
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="girvi_head_blue_12">
                                                                <img src="<?php echo $documentRootBSlash; ?>/images/orange48.png" 
                                                                     alt="Update Loan" title="Update Loan" />
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <div id="ajaxLoadCustGirviDetailsDiv" style="visibility: hidden">
                                                            <?php include 'omzaajld.php'; ?>
                                                        </div>
                                                    </td> 
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="20%" rowspan="2"> 
                                            <table border="0" cellpadding="1" cellspacing="1" width="100%">
<!--                                                <tr align="left">
                                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b> FIRM NAME</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF"
                                                        style="height:40px">
                                                <?php echo $firmName; ?>
                                                    </td>
                                                </tr>-->
                                                <tr align="left">
                                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3" >
                                                        <b>FIRM LOAN NO.</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF"
                                                        style="height:40px">
                                                            <?php echo $rowAllGirvi['ml_firm_mli_no']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b>LOAN NO.</b>
                                                    </td>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b> CR/DR</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF"
                                                        style="height:40px">
                                                            <?php echo $mlLnNo; ?>
                                                    </td>
                                                    <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF"
                                                        style="height:40px">
                                                            <?php echo $mlTrType; ?>
                                                    </td>
                                                </tr>
                                                <tr align="left">
                                                    <td align="left" colspan="2" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b> LOAN SERIAL NO.</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="middle" width="100%" colspan="2" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF"
                                                        style="position:relative">
                                                        <div class="spaceLeft5" style="cursor: pointer;width:100%;height:35px;" title="~ Click Here to Update Serial Number ~"
                                                             onclick="document.getElementById('girviSerailNoUpadateDiv').style.visibility = 'visible';
                                                                     document.getElementById('girviPreSerialNo').focus();
                                                                     document.getElementById('updateGirviSerialNoButton').style.visibility = 'visible';">
                                                                 <?php echo $preSerialNum . $serialNum; ?>
                                                        </div>
                                                        <div id="updateGirviSerialNumAlreadyExistMessage" class="serialnoalready-mess-Div" style="visibility: hidden">
                                                            <span class="main_link_red">Serial number already present, Please enter different serial number.</span>
                                                        </div>
                                                        <div id="girviSerailNoUpadateDiv" class="trans_serialno_upadate_div" style="visibility: hidden;width:100%;height:auto;padding:3px;">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td align="left" valign="top" width="30%">
                                                                        <input id="girviPreSerialNo" name="girviPreSerialNo" type="text" title="Enter New Pre Serial Number"
                                                                               spellcheck="false" class="lgn-txtfield16" size="3" maxlength="10" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    <td align="left" valign="top" width="50%">
                                                                        <input id="girviSerialNo" name="girviSerialNo" type="text" title="Enter New Serial Number"
                                                                               spellcheck="false" class="lgn-txtfield16" size="8" maxlength="10" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    <!-------Start code to add parameter @Author:PRIYA15JAN15--------------->
                                                                    <td align="left" valign="middle" width="20%">
                                                                        <div id="updateGirviSerialNoButton">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateLoanSerialNum('<?php echo $documentRoot; ?>', '<?php echo $mlId; ?>',
                                                                                            '<?php echo $loanId; ?>', document.getElementById('girviPreSerialNo'), document.getElementById('girviSerialNo'),
                                                                                            '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $princAmount; ?>', '<?php echo $loanType; ?>');">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Update Girvi Serial No" title="Click Here to Update Girvi Serial No" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <!-------End code to add parameter @Author:PRIYA15JAN15--------------->
                                                                    <!--End Code To Add Field Pre Serial No @AUTHOR:PRIYA10APR13-->
                                                                    <td align="left" valign="top" >
                                                                        <div id="updateGirviSerialNoCloseButton" >
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('girviSerailNoUpadateDiv').style.visibility = 'hidden';
                                                                                    document.getElementById('updateGirviSerialNoButton').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" height="16px;" class="margin-5" alt="Update Girvi Serial No" title="Click Here to Close Update Girvi Serial No Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="20%" height="100%" rowspan="2"> 
                                            <table border="0" cellpadding="1" cellspacing="1" height="100%">
<!--                                                <tr align="left">
                                                    <td align="left" colspan="2" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b> LOAN SERIAL NO.</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="middle" width="100%" colspan="2" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF"
                                                        style="position:relative">
                                                        <div class="spaceLeft5" style="cursor: pointer;width:100%;height:35px;" title="~ Click Here to Update Serial Number ~"
                                                             onclick="document.getElementById('girviSerailNoUpadateDiv').style.visibility = 'visible';
                                                                     document.getElementById('girviPreSerialNo').focus();
                                                                     document.getElementById('updateGirviSerialNoButton').style.visibility = 'visible';">
                                                <?php echo $preSerialNum . $serialNum; ?>
                                                        </div>
                                                        <div id="updateGirviSerialNumAlreadyExistMessage" class="serialnoalready-mess-Div" style="visibility: hidden">
                                                            <span class="main_link_red">Serial number already present, Please enter different serial number.</span>
                                                        </div>
                                                        <div id="girviSerailNoUpadateDiv" class="trans_serialno_upadate_div" style="visibility: hidden;width:100%;height:auto;padding:3px;">
                                                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td align="left" valign="top" width="30%">
                                                                        <input id="girviPreSerialNo" name="girviPreSerialNo" type="text" title="Enter New Pre Serial Number"
                                                                               spellcheck="false" class="lgn-txtfield16" size="3" maxlength="10" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    <td align="left" valign="top" width="50%">
                                                                        <input id="girviSerialNo" name="girviSerialNo" type="text" title="Enter New Serial Number"
                                                                               spellcheck="false" class="lgn-txtfield16" size="8" maxlength="10" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    -----Start code to add parameter @Author:PRIYA15JAN15-------------
                                                                    <td align="left" valign="middle" width="20%">
                                                                        <div id="updateGirviSerialNoButton">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateLoanSerialNum('<?php echo $documentRoot; ?>', '<?php echo $mlId; ?>',
                                                                                            '<?php echo $loanId; ?>', document.getElementById('girviPreSerialNo'), document.getElementById('girviSerialNo'),
                                                                                            '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $princAmount; ?>', '<?php echo $loanType; ?>');">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Update Girvi Serial No" title="Click Here to Update Girvi Serial No" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    -----End code to add parameter @Author:PRIYA15JAN15-------------
                                                                    End Code To Add Field Pre Serial No @AUTHOR:PRIYA10APR13
                                                                    <td align="left" valign="top" >
                                                                        <div id="updateGirviSerialNoCloseButton" >
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('girviSerailNoUpadateDiv').style.visibility = 'hidden';
                                                                                    document.getElementById('updateGirviSerialNoButton').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" height="16px;" class="margin-5" alt="Update Girvi Serial No" title="Click Here to Close Update Girvi Serial No Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>-->
                                                <tr align="left">
                                                    <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3">
                                                        <b>INTEREST OPTION</b>
                                                    </td>
                                                    <td align="right" valign="middle">
                                                        <div id="troiIntTypeChangeDiv" style="visibility: hidden">
                                                            <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td align="right" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                        <div class="selectStyledBorderLess background_transparent">
                                                            <select id="interestType" name="interestType"
                                                                    class="textLabel14CalibriGrey"
                                                                    onchange="changeTROIOpt('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', document.getElementById('selTROI').value, '<?php echo $girviNewDOB; ?>', document.getElementById('ROIOption'), '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviUpdSts; ?>', '<?php echo $omPanelDiv; ?>', 'UpdateTroiVal', '');
                                                                            return false;" style="height:35px;width:100%;">
                                                                <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                                <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" colspan="2" height="100%">
                                                        <?php include 'ormlmnin.php'; //change in filename @AUTHOR: SANDY20NOV13     ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" height="100%" colspan="3">
                                            <table border="0" cellpadding="1" width="100%" cellspacing="0" align="left" valign="middle" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                <tr>
                                                    <td align="right" valign="middle" class="textLabel12CalibriBrown">
                                                        <b>  OTHER INFORMATION:&nbsp;</b>
                                                    </td>
                                                    <td align="left" class="frm-r1"><textarea id="girviOtherInfo"  <?php if ($staffId && $array['updateGirviAccessOtherInfo'] != 'true') { ?>readOnly ="true" <?php } ?> 
                                                                                              spellcheck="false" name="girviOtherInfo" 
                                                                                              class="textarea-girvi-otherInfo-update backFFFFFF"><?php echo $girviOtherInfo; ?></textarea></td>
                                                    <td align="center" title="अन�?य जानकारी को जोड़ने या बदल ने के लि�? यहा�? क�?लिक करे! &#10;Click here to change or update other information!" valign="middle">
                                                        <a style="cursor: pointer;" onclick="updateLoanOtherInfo('<?php echo $documentRoot; ?>', '<?php echo $mlId; ?>', '<?php echo $loanId; ?>',
                                                                        document.getElementById('girviOtherInfo').value, '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $loanSerialNum; ?>');">
                                                            <div id="ajaxUpdateGirviOtherInfoButt">
                                                                <img src="<?php echo $documentRoot; ?>/images/go24.png" />
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" width="100%">
                                <table border="0" cellpadding="1" cellspacing="0" align="left" width="100%" >
                                    <?php
                                    $cnt = 1;
                                    if ($girviType == 'secured') {
                                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Transferred' and gtrans_trans_loan_id='$girviId'";
                                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                                        $totActLoans = mysqli_num_rows($resSelGirviDet);
                                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
                                            $pId = $rowSelGirviDet['gtrans_prin_id'];
                                            $gtransId = $rowSelGirviDet['gtrans_id'];
                                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                                            $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $loanNo = $rowSelGirviDet['gtrans_trans_loan_id'];
//                                    $girviTranseId = $rowSelGirviDet['gtrans_id']; //add transfer ID @Author:ANUJA31JUL15
//                                    $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $otherInfo = $rowSelGirviDet['gtrans_pay_oth_info'];
                                            if ($prinTypeVal == 'MainPrin' || $prinTypeVal == '') {
                                                $prinType = 'PRN';
                                                $displayPrinType = "Main Principle";
                                            } else {
                                                $prinType = 'APRN';
                                                $displayPrinType = "Additional Principle";
                                            }
                                            $preSerialNo = $rowSelGirviDet['gtrans_pre_serial_num'];
                                            $postSerialNo = $rowSelGirviDet['gtrans_serial_num'];
//                                    $girviSerialNo= $preSerialNo.' '.$postSerialNo;
                                            $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$trFirmId' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                                            $trFirmName = $rowSelFirmName['firm_name'];
                                            //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                           
                                            $selFirmName = "SELECT user_fname FROM user WHERE user_id='$custId' AND user_owner_id='$_SESSION[sessionOwnerId]'";
                                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                                            $custFname = $rowSelFirmName['user_fname'];
                                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                                            if ($transType == 'Linked') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn, $selMlCode);
                                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                            }
                                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                                            ?>
                                            <?php
                                            if ($totActLoans > 0) {
                                                if ($cnt == 1) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="9">
                                                            <div class="main_link_green14">
                                                                <b>ACTIVE LOANS</b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr align="left" class="height28" style="background: #F2f2f2;">
                                                        <td align="left" title="Loan No" width="100px" class="brdrgry-dashed" style="border-right: 0;border-radius:5px 0 0  0">
                                                            <div class="tnr_nr_11_red spaceLeftRight10">
                                                                <b>LOAN NO</b>
                                                            </div>
                                                        </td>
                                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PRINCIPLE </b></div>
                                                        </td>
                                                        <td align="center" title="ROI"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> ROI </b></div>
                                                        </td>
                                                        <td align="center" title="Customer name"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> CUSTOMER </b></div>
                                                        </td>
                                                        <?php if ($transType == 'Linked') { ?>
                                                            <td align="right" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                                <div class="spaceLeftRight10 tnr_nr_11_red"><b> ML CODE </b></div>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td align="right" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                                <div class="spaceLeftRight10 tnr_nr_11_red"><b> FIRM </b></div>
                                                            </td>
                                                        <?php } ?>
                                                        <td align="left" title="Packet No."  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PACKET NO.</b> </div>
                                                        </td>
                                                        <td align="left" title="Loan Other Info"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> OTHER INFO</b> </div>
                                                        </td>
                                                        <td align="left" title="principle"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PRIN TYPE</b> </div>
                                                        </td>
                                                        <td align="right" title="Trasfer Date"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> TR DATE</b> </div>
                                                        </td>
                                                        <td align="center" title="Delete"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> DEL</b> </div>
                                                        </td>
                                                        <td align="center" title="Release"  width="50px" class="brdrgry-dashed" style="border-left:0;border-radius:0 5px 0 0 ">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> REL</b> </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $cnt++;
                                                }
                                                ?>
                                                <tr class="height28">
                                                    <td align="left" title="Loan No" class="brdrgry-dashed" style="border-right: 0;border-top:0;border-radius:0 0 5px  0">
                                                        <div class="spaceLeftRight10">
                                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;font-weight:600" 
                                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"
                                                                   />
                                                        </div>
                                                        <div id="release_trGirvi_panel<?php echo $gtransId; ?>" class="display-girvi-info-popup"></div>
                                                    </td>
                                                    <td align="center" title="principle" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?></b> 
                                                        </div>
                                                    </td>
                                                    <td align="center" title="ROI" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </b>
                                                        </div>
                                                    </td>
                                                    <td align="center" title="Customer name" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo $custFname; ?> </b>
                                                        </div>
                                                    </td>
                                                    <?php if ($transType == 'Linked') { ?>
                                                        <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                            <div class="spaceLeftRight10">
                                                                <b><?php echo $rowMlCode['user_unique_code']; ?></b>
                                                            </div>
                                                            <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                    
                                                        </td>
                                                    <?php } else { ?>
                                                        <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                            <div class="spaceLeftRight10">
                                                                <b><?php echo $trFirmName; ?></b>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                    <!-------Start code to add Packet NO  @Author:ANUJA30JUL15---------------------->
            <!--                                                    <td align="left" title="principleType">
                                                   <div class="spaceLeftRight10"><?php echo $packetNo; ?> </div>
                                               </td>-->

                                                    <td width="120px" align="center" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0;position:relative">
                                                        <div class="spaceLeft5" style="cursor: pointer;" title="~ Click Here to Update Packet Number ~"
                                                             onclick="document.getElementById('girviPacketNoUpadateDiv<?php echo $gtransId; ?>').style.visibility = 'visible';
                                                                                 document.getElementById('girviTransPacketNo<?php echo $gtransId; ?>').focus();
                                                                                 document.getElementById('updateTransGirviPacketNoButton<?php echo $gtransId; ?>').style.visibility = 'visible';">
                                                                 <?php echo $packetNo; ?>
                                                        </div>
                                                        <div id="updateGirviPacketNumAlreadyExistMessage<?php echo $gtransId; ?>" class="serialnoalready-mess-Div" style="visibility: hidden">
                                                            <span class="main_link_red">Packet number already present, Please enter different packet number.</span>
                                                        </div>
                                                        <div id="girviPacketNoUpadateDiv<?php echo $gtransId; ?>" class="trans_serialno_upadate_div" style="visibility: hidden;width:100%;height:auto;">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td align="center" valign="middle" width="70%">
                                                                        <input id="girviTransPacketNo<?php echo $gtransId; ?>" name="girviTransPacketNo" type="text" title="Enter New Packet Number"
                                                                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                                                                       document.getElementById('updateTransGirviPacketNoButton<?php echo $gtransId; ?>').focus();
                                                                                                       return false;
                                                                                                   }"
                                                                               spellcheck="false" class="lgn-txtfield16" size="8" maxlength="10" style="width:100%;height:35px;"/>
                                                                    </td>
                                                                    <td align="left" valign="middle" width="30%">
                                                                        <div id="updateTransGirviPacketNoButton<?php echo $gtransId; ?>">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateGirviTransPacketMlNum('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $gId; ?>', '<?php echo $gtransId; ?>',
                                                                                                        document.getElementById('girviTransPacketNo<?php echo $gtransId; ?>'), '<?php echo $rowTransGirvi['gtrans_trans_type']; ?>', '<?php echo $trFirmId; ?>',
                                                                                                        '<?php echo $girviDOB; ?>', '<?php echo $princAmount; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', '<?php echo $mlId; ?>', '<?php echo $loanId; ?>', '');">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Update Trans Girvi Serial No" title="Click Here to Update Packet No" />
                                                                            </a>
                                                                        </div>
                                                                        <div id="updateGirviPacketNoCloseButton">
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('girviPacketNoUpadateDiv<?php echo $gtransId; ?>').style.visibility = 'hidden';
                                                                                                document.getElementById('updateTransGirviPacketNoButton<?php echo $gtransId; ?>').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" class="posAbsolute"
                                                                                     style="margin-top: -41px;margin-left: 15px;height:16px;" alt="Update Girvi Packet No" title="Click Here to Close Update Girvi Packet No Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <!-------End code to add Packet NO  @Author:ANUJA30JUL15---------------------->
                                                    <td align="left" title="principleType" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo $otherInfo; ?> </b>
                                                        </div>
                                                    </td>
                                                    <td align="left" title="principleType" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo $displayPrinType; ?> </b>
                                                        </div>
                                                    </td>
                                                    <td align="right" title="Date" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10">
                                                            <b><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </b>
                                                        </div>
                                                    </td>
                                                    <td align="center" title="Delete"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <a style="cursor: pointer;" onclick ="<?php if ($prinType == 'PRN') { ?> delTransGirviOrPrin('<?php echo $documentRoot; ?>', '<?php echo $gtransId; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $gId; ?>', '<?php echo $prinType; ?>');
                                                        <?php } else { ?>
                                                                                                    delTransGirviOrPrin('<?php echo $documentRoot; ?>', '<?php echo $gtransId; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $pId; ?>', '<?php echo $prinType; ?>');
                                                           <?php } ?>">
                                                            <img src="<?php echo $documentRoot; ?>/images/img/cancel.png"  height="16px" alt="Delete Transferred Girvi"  title="Delete Transferred Girvi" class="marginTop5"/>
                                                        </a>
                                                    </td>
                                                    <td align="center" title="Release"  width="50px" class="brdrgry-dashed" style="border-left:0;border-top:0;border-radius:0 0 0  5px">
                                                        <a style="cursor: pointer;" onclick ="showTrGvReleasePanel('<?php echo $gtransId; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>');">
                                                            <img src="<?php echo $documentRootBSlash; ?>/images/submit16.png" class="marginTop5" alt="Release Transferred Girvi" title="Release Transferred Girvi" />
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Released' and gtrans_trans_loan_id='$girviId'";
                                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                                        $totRelLoans = mysqli_num_rows($resSelGirviDet);
                                        $rlCnt = 1;
                                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                                            $gtransId = $rowSelGirviDet['gtrans_id'];
                                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
                                            $pId = $rowSelGirviDet['gtrans_prin_id'];
                                            $preSerialNo = $rowSelGirviDet['gtrans_pre_serial_num'];
                                            $postSerialNo = $rowSelGirviDet['gtrans_serial_num'];
                                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                                            $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $loanNo = $rowSelGirviDet['gtrans_trans_loan_id'];
                                            $girviTranseId = $rowSelGirviDet['gtrans_id']; //add transfer ID @Author:ANUJA31JUL15
//                                    $girviSerialNo= $preSerialNo.' '.$postSerialNo;
//                                    $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $otherInfo = $rowSelGirviDet['gtrans_pay_oth_info'];
                                            if ($prinTypeVal == 'MainPrin' || $prinTypeVal == '') {
                                                $prinType = 'PRN';
                                                $displayPrinType = "Main Principle";
                                            } else {
                                                $prinType = 'APRN';
                                                $displayPrinType = "Additionl Principle";
                                            }
                                            $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$trFirmId' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                                            $trFirmName = $rowSelFirmName['firm_name'];
                                            //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                           
                                            $selFirmName = "SELECT user_fname FROM user WHERE user_id='$custId' AND user_owner_id='$_SESSION[sessionOwnerId]'";
                                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                                            $custFname = $rowSelFirmName['user_fname'];
                                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                                            if ($transType == 'Linked') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn, $selMlCode);
                                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                            }
                                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                                            ?>
                                            <?php
                                            if ($totRelLoans > 0) {
                                                if ($rlCnt == 1) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="9">
                                                            <div class="main_link_red_12" style="font-size:14px;color:#FF0000">
                                                                <b>RELEASED LOANS</b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $rlCnt++;
                                                }
                                                if ($cnt == 1) {
                                                    ?>
                                                    <tr align="left" class="height28" style="background: #F2f2f2">
                                                        <td align="left" title="Loan No" width="100px" class="brdrgry-dashed" style="border-right: 0;border-radius:5px 0 0  0">
                                                            <div class="tnr_nr_11_red spaceLeftRight10"><b> LOAN NO </b> </div>
                                                        </td>
                                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PRINCIPLE </b> </div>
                                                        </td>
                                                        <td align="center" title="ROI"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> ROI </b> </div>
                                                        </td>
                                                        <td align="center" title="Customer name"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> CUSTOMER </b> </div>
                                                        </td>
                                                        <?php if ($transType == 'Linked') { ?>
                                                            <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                                <div class="spaceLeftRight10 tnr_nr_11_red"><b> ML CODE </b> </div>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                                <div class="spaceLeftRight10 tnr_nr_11_red"><b> FIRM </b> </div>
                                                            </td>
                                                        <?php } ?>
                                                        <td align="left" title="PACKET NO"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PACKET NO.</b> </div>
                                                        </td>
                                                        <td align="left" title="OTHER INFO"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> OTHER INFO</b> </div>
                                                        </td>
                                                        <td align="left" title="principle"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> PRIN TYPE</b> </div>
                                                        </td>
                                                        <td align="right" title="Trasfer Date"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> TR DATE</b> </div>
                                                        </td>
                                                        <td align="center" title="Delete"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;">
                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b> DEL</b> </div>
                                                        </td>
                                                        <td class="brdrgry-dashed" style="border-left:0;border-radius:0 5px 0  0"></td>
                                                    </tr>
                                                    <?php
                                                    $cnt++;
                                                }
                                                ?>
                                                <tr class="height28">
                                                    <td align="left" title="Loan No"  class="brdrgry-dashed" style="border-right: 0;border-top:0;border-radius:0 0 0 5px">
                                                        <div class="spaceLeftRight10">
                                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;font-weight:600;" 
                                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/>
                                                        </div>
                                                    </td>
                                                    <td align="center" title="principle"  class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?></b> </div>
                                                    </td>
                                                    <td align="center" title="ROI" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </b></div>
                                                    </td>
                                                    <td align="center" title="Customer name" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b> <?php echo $custFname; ?> </b> </div>
                                                    </td>
                                                    <?php if ($transType == 'Linked') { ?>
                                                        <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                            <div class="spaceLeftRight10"><b> <?php echo $rowMlCode['user_unique_code']; ?></b> </div>
                                                            <!--------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                   
                                                        </td>
                                                    <?php } else { ?>
                                                        <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                            <div class="spaceLeftRight10"><b> <?php echo $trFirmName; ?></b> </div>
                                                        </td>
                                                    <?php } ?>
                                                    <td width="120px" align="center" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0;position:relative">
                                                        <div class="spaceLeft5" style="cursor: pointer;" title="~ Click Here to Update Packet Number ~"
                                                             onclick="document.getElementById('girviPacketNoUpadateDiv<?php echo $gtransId; ?>').style.visibility = 'visible';
                                                                                 document.getElementById('girviTransPacketNo').focus();
                                                                                 document.getElementById('updateTransGirviPacketNoButton').style.visibility = 'visible';">
                                                                 <?php echo $packetNo; ?>
                                                        </div>
                                                        <div id="updateGirviPacketNumAlreadyExistMessage" class="serialnoalready-mess-Div" style="visibility: hidden;width:100%;height:auto;">
                                                            <span class="main_link_red">Packet number already present, Please enter different packet number.</span>
                                                        </div>
                                                        <div id="girviPacketNoUpadateDiv<?php echo $gtransId; ?>" class="trans_serialno_upadate_div" style="visibility: hidden">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>  
                                                                    <td align="center" valign="middle" >
                                                                        <input id="girviTransPacketNo" name="girviTransPacketNo" type="text" title="Enter New Packet Number"
                                                                               onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                                                                       document.getElementById('updateTransGirviPacketNoButton').focus();
                                                                                                       return false;
                                                                                                   }"
                                                                               spellcheck="false" class="lgn-txtfield16" size="8" maxlength="10" />
                                                                    </td>
                                                                    <td align="left" valign="middle" >
                                                                        <div id="updateTransGirviPacketNoButton">
                                                                            <a style="cursor: pointer;" onclick="javascript:updateGirviTransPacketMlNum('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $gId; ?>', '<?php echo $gtransId; ?>',
                                                                                                        document.getElementById('girviTransPacketNo'), '<?php echo $rowTransGirvi['gtrans_trans_type']; ?>', '<?php echo $trFirmId; ?>',
                                                                                                        '<?php echo $girviDOB; ?>', '<?php echo $princAmount; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', '<?php echo $mlId; ?>', '<?php echo $loanId; ?>', '');">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Update Trans Girvi Serial No" title="Click Here to Update Packet No" />
                                                                            </a>
                                                                        </div>
                                                                        <div id="updateGirviPacketNoCloseButton">
                                                                            <a style="cursor: pointer;" onclick="document.getElementById('girviPacketNoUpadateDiv<?php echo $gtransId; ?>').style.visibility = 'hidden';
                                                                                                document.getElementById('updateTransGirviPacketNoButton').style.visibility = 'hidden';">
                                                                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" class="posAbsolute"
                                                                                     style="margin-top: -41px;margin-left: 15px;" alt="Update Girvi Packet No" title="Click Here to Close Update Girvi Packet No Box" />
                                                                            </a>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td align="left" title="Other Info" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b><?php echo $otherInfo; ?> </b></div>
                                                    </td>
                                                    <td align="left" title="principleType" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b><?php echo $displayPrinType; ?> </b></div>
                                                    </td>
                                                    <td align="right" title="Date" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </b></div>
                                                    </td>
                                                    <td align="center" title="Delete"  width="50px" class="brdrgry-dashed" style="border-right: 0;border-left:0;border-top:0">
                                                        <a style="cursor: pointer;" onclick ="<?php if ($prinType == 'PRN') { ?>
                                                                                                    delTransGirviOrPrin('<?php echo $documentRoot; ?>', '<?php echo $gtransId; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $gId; ?>', '<?php echo $prinType; ?>');
                                                        <?php } else { ?>
                                                                                                    delTransGirviOrPrin('<?php echo $documentRoot; ?>', '<?php echo $gtransId; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $pId; ?>', '<?php echo $prinType; ?>');
                                                           <?php } ?>"  >
                                                            <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" height="16px" alt="Delete Transferred Girvi"  title="Delete Transferred Girvi" class="marginTop5"/>
                                                        </a>
                                                    </td>
                                                    <td align="center" title="Release"  width="50px" class="brdrgry-dashed" style="border-left:0;border-top:0;border-radius:0 0 5px 0">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <tr align="center">
                                            <td align="center" colspan="7" class="textLabel18CalibriNormal">
                                                <span style="color:#FF0000;font-weight:600">UNSECURED LOAN</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <?php if ($loanType != 'Linked') { ?>
                            <tr>
                                <td width="100%" colspan="2">
                                    <div class="blackMess11">
                                        <a style="cursor: pointer;font-size: 14px;border: 1px solid #e5bb16;padding: 4px 10px;background: #fff3b4;border-radius: 20px;color: #810100;" <?php if ($staffId && $array['updateGirviAccessAddItem'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php } //To disable access for staff @AUTHOR: SANDY15AUG13                                                                                                                                           ?> 
                                           onclick="showAddMoreLoanDiv('<?php echo $mlId; ?>', '<?php echo $loanSerialNum; ?>', '<?php echo $girviId; ?>');">
                                            <b>CLICK HERE TO ADD MORE LOANS <i class="fa fa-hand-o-up"></i></b>
                                        </a>
                                    </div>
                                    <div id="ajaxLoadAddMoreLoan" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                    <div id="ajaxLoadGetLoanListDiv" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                    <div id="ajaxCloseAddMoreLoan" style="visibility: hidden" class="ajaxClose">
                                        <a style="cursor: pointer;" onclick="closeAddMoreLoanDiv()">
                                            <?php include 'omzaajcl.php'; ?>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr align="left" >
                                <td align="left" valign="middle" colspan="2">
                                    <div id="addMoreLoanDiv"></div>
                                </td>
                            </tr>
                            <!----lINK TO ADD MORE ADDITIONAL PRINCIPAL @AUTHOR: SANDY20DEC13---->
                            <tr>
                                <td width="100%" colspan="2">
                                    <div class="blackMess11">
                                        <a style="cursor: pointer;font-size: 14px;border: 1px solid #e5bb16;padding: 4px 10px;background: #fff3b4;border-radius: 20px;color: #810100;" <?php if ($staffId && $array['updateGirviAccessAddItem'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php } //To disable access for staff @AUTHOR: SANDY15AUG13                                                                                                                                           ?> 
                                           onclick="showAddMorePrinDiv('<?php echo $mlId; ?>', '<?php echo $loanSerialNum; ?>', '<?php echo $girviId; ?>')">
                                            <b> CLICK HERE TO ADD MORE ADDITIONAL PRINCIPAL <i class="fa fa-hand-o-up"></i></b>
                                        </a>
                                    </div>
                                    <div id="ajaxLoadAddMorePrin" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                    <div id="ajaxLoadGetPrinListDiv" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                    <div id="ajaxCloseAddMorePrin" style="visibility: hidden" class="ajaxClose">
                                        <a style="cursor: pointer;" onclick="closeAddMorePrinDiv()">
                                            <?php include 'omzaajcl.php'; ?>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr align="left" >
                                <td align="left" valign="middle" colspan="2">
                                    <div id="addMorePrinDiv"></div>
                                </td>
                            </tr>
                        <?php } ?>
                        <!----lINK TO ADD MORE ADDITIONAL PRINCIPAL @AUTHOR: SANDY20DEC13---->
<!--                        <tr>
                            <td align="center" colspan="2">
                                <div class="hrGold"></div>
                            </td>
                        </tr>-->
                        <tr>
                            <td align="left" width="100%" colspan="2">
                                <div id="girviDepositGirviResultDiv" >
                                    <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%">
                                        <tr>
                                            <td align="left" width="100%" colspan="2">
                                                <div id="loanTotAmtDiv">
                                                    <?php
                                                    include 'ormlttam.php';
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
<!--                                        <tr>
                                            <td align="center" colspan="2" width="100%">
                                                <div class="hrGold"></div>
                                            </td>
                                        </tr>-->
                                        <tr>
                                            <td width="100%" colspan="2">
                                                <div class="blackMess11">
                                                    <a style="cursor: pointer;font-size: 14px;border: 1px solid #e5bb16;padding: 4px 10px;background: #fff3b4;border-radius: 20px;color: #810100;"" 
                                                       <?php if ($staffId && $array['updateGirviAccessDepMny'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php } //To disable access for staff @AUTHOR: SANDY15AUG13                 ?> 
                                                       onclick="showLoanDepositMoneyDiv(<?php echo $mlId; ?>,<?php echo $loanId; ?>,<?php echo $totalPrincipalAmount; ?>,<?php echo $totalFinalInterest; ?>, '<?php echo $princAmount ?>', '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>')">
                                                        <b>CLICK HERE TO DEPOSIT MONEY <i class="fa fa-hand-o-up"></i></b>
                                                    </a>
                                                </div>
                                                <div id="ajaxLoadDepositMoneyDiv" style="visibility: hidden" class="blackMess11">
                                                    <?php include 'omzaajld.php'; ?>
                                                </div>
                                                <div id="ajaxCloseDepositMoneyDiv" style="visibility: hidden" class="ajaxClose">
                                                    <a style="cursor: pointer;" onclick="closeDepositMoneyDiv()">
                                                        <?php include 'omzaajcl.php'; ?>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr align="left">
                                            <td align="left" valign="middle" colspan="2">
                                                <div id="depositMoneyDiv"></div>
                                            </td>
                                        </tr>
<!--                                        <tr>
                                            <td align="center" colspan="2">
                                                <div class="hrGold"></div>
                                            </td>
                                        </tr>-->
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php include 'ormlncmt.php'; ?>
                    </table>
                </div>
            </td>
        </tr>
<!--        <tr>
            <td width="100%" colspan="2">
                <hr color="#B8860B" />
            </td>
        </tr>-->
        <tr>
    </table>
</div>


