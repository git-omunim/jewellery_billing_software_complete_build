<?php
/*
 * **************************************************************************************
 * @tutorial: Money lenders Add Loan Panel
 * **************************************************************************************
 *
 * Created on 13 NOV, 2013 11:04:23 AM
 *
 * @FileName: omladnwln.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
//change in file @AUTHOR: SANDY20JAN14
$mlId = $_GET['mlId'];
//echo "$mlId @==".$mlId;
$sessionOwnerId = $_SESSION['sessionOwnerId'];

//get default firm
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$qsel = "SELECT user_firm_id FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' AND user_id='$mlId'";
$res = mysqli_query($conn, $qsel);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$firmId = $row['user_firm_id'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
//query to get firm loan no
$qSelMlLoanNo = "SELECT count(ml_id) as mlFirmLoanNo FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_firm_id='$firmId'";
$resMlLoanNo = mysqli_query($conn, $qSelMlLoanNo);
$rowMlLoanNo = mysqli_fetch_array($resMlLoanNo, MYSQLI_ASSOC);
$currentFirmLoanNo = $rowMlLoanNo['mlFirmLoanNo'] + 1;

//query to get serial number
$qSelLoanPreSerialNo = "SELECT ml_pre_serial_num FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_lender_id='$mlId' order by UNIX_TIMESTAMP(ml_ent_dat) desc LIMIT 0,1";
$resLoanPreSerialNo = mysqli_query($conn, $qSelLoanPreSerialNo) or die(mysqli_error($conn));
$rowLoanPreSerialNo = mysqli_fetch_array($resLoanPreSerialNo);

$newLoanPreSerialNo = $rowLoanPreSerialNo['ml_pre_serial_num'];

if ($newLoanPreSerialNo == NULL || $newLoanPreSerialNo == '') {
    $newLoanPreSerialNo = NULL;
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as mliSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num IS NULL and  ml_lender_id='$mlId'";
    $resLoanSerialNo = mysqli_query($conn, $qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);
} else {
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as mliSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num='$newLoanPreSerialNo' and  ml_lender_id='$mlId' ";
    $resLoanSerialNo = mysqli_query($conn, $qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);
}
$newLoanSerialNo = $rowLoanSerialNo['mliSerialNo'] + 1;

//Start Code to Check Serial Number
$qSelSerialNo = "SELECT ml_serial_num FROM ml_loan where ml_serial_num='$newLoanSerialNo' and ml_pre_serial_num='$newLoanPreSerialNo' and ml_own_id='$sessionOwnerId' ";
$resSerialNo = mysqli_query($conn, $qSelSerialNo);
$rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);

$lSerialNo = $rowSerialNo['ml_serial_num'];

if ($lSerialNo != '' || $lSerialNo != NULL) {
    $qSelLoanSerialNo = "SELECT max(ml_serial_num) as loanSerialNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_pre_serial_num='$newLoanPreSerialNo'";
    $resLoanSerialNo = mysqli_query($conn, $qSelLoanSerialNo);
    $rowLoanSerialNo = mysqli_fetch_array($resLoanSerialNo, MYSQLI_ASSOC);
    $newLoanSerialNo = $rowLoanSerialNo['loanSerialNo'] + 1;
}

//query to get money lender loan no
$qSelMlLoanNo = "SELECT count(ml_id) as mlLoanNo FROM ml_loan where ml_own_id='$sessionOwnerId' and ml_lender_id='$mlId'";
$resMlLoanNo = mysqli_query($conn, $qSelMlLoanNo);
$rowMlLoanNo = mysqli_fetch_array($resMlLoanNo, MYSQLI_ASSOC);
$currentLoanNo = $rowMlLoanNo['mlLoanNo'];
$currentLoanNo = $currentLoanNo + 1;
$omPanelDiv = 'MoneyLenderLoan';
?>
<div id="mlAddNewLoanDiv" class="ShadowFrm"><!---Change in line @AUTHOR: SANDY07FEB14--->
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" width="30px">
                <div class="spaceLeft10">
                    <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px">
                </div>
            </td>
            <td align="left" valign="top"> 
                <div>
                    <div class="main_link_orange_normal16" style="color: #DF264A;">
                        <b>ADD NEW MONEY LENDER LOAN</b>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div id="mlAddNewLoanDetailDiv" class="100%">
        <form id="addNewLoanForm" name="addNewLoanForm" enctype="multipart/form-data" method="post"onsubmit="return validateAddNewLoan();" 
              action="include/php/ormladln.php" >
            <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
           
                <tr>
                    <td align="left" width="100%" colspan="2">
                        <div>
                            <table border="0" cellpadding="2" cellspacing="2" width="100%">
                                <tr align="left">
                                    <td width="100%">
                                        <table border="0" cellpadding="1" cellspacing="1" width="100%" style="background:#fff6ea;border: 1px dashed #f7750a;padding:5px;">
                                            <tr>
                                                <td align="center" valign="top" width="20%"> 
                                                    <table border="0" cellpadding="1" cellspacing="1" width="100%">
                                                        <tr>  
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                                                <b> PRINCIPAL AMOUNT</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" style="height:35px;width:100%;border-radius:4px;" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF">
                                                                <input id="mlPrincipalAmount" name="mlPrincipalAmount" type="text"  class="textFieldWOB20"  placeholder="PRINCIPAL AMOUNT"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                   document.getElementById('mlAddLnDOBDay').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                   return false;
                                                                               }"
                                                                       spellcheck="false" size="20" maxlength="30" style="width:100%;height:35px;font-weight:600;"/>
                                                                <input type="hidden" name="mlId" id="mlId" value="<?php echo $mlId; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>  
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b> LOAN DATE</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table width="100%" border="0"  align="center" class="textBoxCurve1px textLabel16CalibriNormal backFFFFFF">
                                                                    <tr>
                                                                        <td width="33.33%" align="center">
                                                                            <!-- *************** Start Code for dayDD *************** -->
                                                                            <?php
                                                                            $todayDay = date(j) - 1;
                                                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                            $optDay[$todayDay] = "selected";
                                                                            ?> 
                                                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;">
                                                                                <select id="mlAddLnDOBDay" name="mlAddLnDOBDay" 
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('mlAddLnDOBMonth').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('mlPrincipalAmount').focus();
                                                                                                    return false;
                                                                                                }"
                                                                                        class ="textLabel14CalibriGrey" style="width:100%;height:35px;">
                                                                                    <option value="NotSelected">DAY</option>
                                                                                    <?php
                                                                                    for ($dd = 0; $dd <= 30; $dd++) {
                                                                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select> 
                                                                            </div>
                                                                        </td>
                                                                        <td width="33.33%" align="center">
                                                                            <!-- *************** Start Code for Month *************** -->
                                                                            <?php
                                                                            $todayMM = date("n") - 1;
                                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                            $optMonth[$todayMM] = "selected";
                                                                            ?> 
                                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;">
                                                                                <select id="mlAddLnDOBMonth" name="mlAddLnDOBMonth" 
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('mlAddLnDOBYear').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('mlAddLnDOBDay').focus();
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
                                                                                                    }
                                                                                                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13"
                                                                                        class = "textLabel14CalibriGrey" style="width:100%;height:35px">
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
                                                                            </div>
                                                                        </td>
                                                                        <td width="33.33%" align="center">
                                                                            <!-- *************** Start Code for Year *************** -->
                                                                            <?php
                                                                            $todayYear = date("Y");
                                                                            $optYear[$todayYear] = "selected";
                                                                            ?> 
                                                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;">
                                                                                <select id="mlAddLnDOBYear" name="mlAddLnDOBYear" 
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('interestType').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('mlAddLnDOBMonth').focus();
                                                                                                    return false;
                                                                                                }"
                                                                                        class = "textLabel14CalibriGrey" style="width:100%;height:35px">
                                                                                    <option value="NotSelected">YEAR</option>
                                                                                    <?php
                                                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center" valign="top" width="20%"> 
                                                    <table border="0" cellpadding="1" cellspacing="1" width="100%">
                                                        <tr align="center">
                                                            <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b> INTEREST OPTION</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                                <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                                                    <select id="interestType" name="interestType" class="textLabel14CalibriGrey" style="width:100%;height:35px;"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('selTROI').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('mlAddLnDOBYear').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="return changeMlROIOptAdd(this, document.getElementById('ROIOption'), 'MoneyLenderLoan');">
                                                                        <option value="Monthly" >MONTHLY</option>
                                                                        <option value="Annually">ANNUALLY</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr align="center" >
                                                            <td align="left" valign="top" class="textLabel12CalibriBrown pdntp3">
                                                               <b>RATE OF INTEREST</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" > 
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF" align="center" style="position:relative;">
                                                                            <div id="ROIOption" >
                                                                                <?php
                                                                                $omPanelDiv = 'MoneyLenderLoan';
                                                                                $prevFieldId = 'interestType';
                                                                                $nextFieldId = 'mlAddLnFirm';
                                                                                include 'olggroaa.php';
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>   

                                                    </table>
                                                </td>
                                                <td align="center" valign="top" width="5%"> 
                                                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="middle">
                                                                <div class="girvi_head_green">
                                                                    <img src="<?php echo $documentRootBSlash; ?>/images/orange48.png" 
                                                                         alt="Present Girvi" title="Present Girvi" />
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
                                                <td align="left" valign="top" width="20%" height="100%"> 
                                                    <table border="0" cellpadding="1" cellspacing="1" width="100%">
                                                        <tr align="center">
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b> FIRM NAME</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle"  width="100%"  class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                                                <div id="selectFirmDiv"  class="selectStyledBorderLess background_transparent">
                                                                    <?php
                                                                    $prevFieldId = 'selTROI';
                                                                    $class = 'textLabel14CalibriGrey';
                                                                    $panel = 'MoneyLenderAddLoan';
                                                                    $nextFieldId = 'mlAddLnFirmLnNumber';
                                                                    $firmIdName = 'mlAddLnFirm';
                                                                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                        $firmIdSelected = $_SESSION['setFirmSession'];
                                                                    } else {
                                                                        $firmIdSelected = $firmId;
                                                                    }
                                                                    include 'omffrafs.php';
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr align="center" >
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b>FIRM LOAN NO.</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle"  width="140px"  class = "textBoxCurve1px margin2pxAll  grey16_font backFFFFFF">
                                                                <input id="mlAddLnFirmLnNumber" name="mlAddLnFirmLnNumber" type="text" class="border-no textLabel14CalibriGreyMiddle  backFFFFFF"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                   document.getElementById('mlAddLnLenderLnNumber').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8) {
                                                                                   document.getElementById('mlAddLnFirm').focus();
                                                                                   return false;
                                                                               }"
                                                                       spellcheck="false" size="10" maxlength="30" style="height:35px;width:100%"                                                       
                                                                       value="<?php echo $currentFirmLoanNo; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b>LOAN NO.</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle"  width="100%"  class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                                                <input id="mlAddLnLenderLnNumber" name="mlAddLnLenderLnNumber" type="text" readonly="true" 
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                   document.getElementById('mlPreSerialNumber').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8) {
                                                                                   document.getElementById('mlAddLnFirmLnNumber').focus();
                                                                                   return false;
                                                                               }"
                                                                       spellcheck="false" class="border-no textLabel14CalibriGreyMiddle background_transparent" style="height:35px;width:100%"  size="10" maxlength="30"                                                         
                                                                       value="<?php
                                                                    if ($currentLoanNo == '') {
                                                                        echo '&nbsp';
                                                                    } else {
                                                                        echo $currentLoanNo;
                                                                    }
                                                                    ?>" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center" valign="top" width="20%" height="100%" > 
                                                    <table border="0" cellpadding="1" cellspacing="1" valign="top" width="100%">
                                                        <tr align="center" valign="top">
                                                            <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                                                <b> LOAN SERIAL NO.</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF" width="100%" align="center"  valign="bottom">
                                                                <div id='loanSerialNoDiv'>
                                                                    <table border="0"  cellpadding="0"  width="100%" cellspacing="0" align="center">
                                                                        <tr>
                                                                            <td align="center" width="50%">
                                                                                <input id="mlPreSerialNumber" name="mlPreSerialNumber" type="text" <?php if ($staffId && $array['addNewGirviAccessSerialNo'] != 'true') { ?>readonly="true"<?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                 ?>
                                                                                       value="<?php echo $newLoanPreSerialNo; ?>" placeholder="PRE ID"
                                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                   document.getElementById('mlSerialNumber').focus();
                                                                                                   return false;
                                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                                   document.getElementById('mlAddLnLenderLnNumber').focus();
                                                                                                   return false;
                                                                                               }"
                                                                                       spellcheck="false"  size="3" maxlength="3" style="width:100%;height:35px;" class="border-no textLabel14CalibriGreyMiddle backFFFFFF"/>

                                                                            </td>
                                                                            <td align="center" width="50%">
                                                                                <input id="mlSerialNumber" name="mlSerialNumber" type="text" value="<?php echo $newLoanSerialNo; ?>" <?php if ($staffId && $array['addNewGirviAccessSerialNo'] != 'true') { ?>readonly="true" <?php }//give access depending on staff @AUTHOR: SANDY15AUG13                                                                                                                                 ?>
                                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                   document.getElementById('crDrType').focus();
                                                                                                   return false;
                                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                                   document.getElementById('mlPreSerialNumber').focus();
                                                                                                   return false;
                                                                                               }"
                                                                                       spellcheck="false" size="10" maxlength="10" style="width:100%;height:35px;" class="border-no textLabel14CalibriGreyMiddle backFFFFFF" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown  pdnbtm3 pdntp3">
                                                                <b>CR/DR</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" width="100%"  class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                                                <div id="crDrTypeDiv" class="selectStyledBorderLess backFFFFFF">
                                                                    <select id="crDrType" name="crDrType"  class="textLabel14CalibriGrey" style="width:100%;height:35px;" title="You have taken loan!/आपने ऋण लिया है!"
                                                                            onchange="if (this.value == 'CR') {
                                                                                        this.title = 'You have taken loan!/आपने ऋण लिया है!'
                                                                                    } else {
                                                                                        this.title = 'You have given loan!/आपने ऋण दिया है!'
                                                                                    }
                                                                                    getMLFirmLoanNo(document.getElementById('mlAddLnFirm').value, 'AddNewMlLoan', this.value);" 
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('loanType').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('mlSerialNumber').focus();
                                                                                        return false;
                                                                                    }" 
                                                                            >
                                                                        <option value="CR" title="You have taken loan!/आपने ऋण लिया है!">CREDIT</option>
                                                                        <option value="DR" title="You have given loan!/आपने ऋण दिया है!">DEBIT</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown  pdnbtm3 pdntp3">
                                                                <b> LOAN TYPE</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="middle" colspan="2" width="100%" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF">
                                                                <div id="mlLoanTypeDiv" class="selectStyledBorderLess backFFFFFF">
                                                                    <select id="loanType" name="loanType" class="textLabel14CalibriGrey" style="width:100%;height:35px;"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('mlLoanNo1').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('crDrType').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="if (this.value == 'secured') {
                                                                                        javascript:showTransferedLoanDetails();
                                                                                    } else {
                                                                                        document.getElementById('transferLoanDetail').innerHTML = '<span class=textLabel18CalibriNormal>Unsecured Loan</span>';
                                                                                        document.getElementById('loanPaySelAccountId').focus();
                                                                                    }"
                                                                            >
                                                                        <option value="unsecured">UNSECURED LOAN</option>
                                                                        <option value="secured" selected>SECURED LOAN</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td valign="top" align="left" class="border-top">
                                </tr>-->
                                <tr>
                                    <td align="left" width="100%" >
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div id="transferLoanDetail">
                                                        <?php include 'ormltrln.php'; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td valign="top" align="left" class="border-top">
                                </tr>-->
                                <tr>
                                    <td align="left" width="100%">
                                        <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" width="100%" style="background:#fff4f5;border: 1px dashed #ff6d6d;">
                                            <tr>
                                                <td align="left" valign="top" width="33.33%">
                                                    <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" width="100%">
                                                        <tr>
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                                <b> PAYMENT TYPE</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <div id="selAccountDiv">
                                                                    <table border="0" cellpadding="1" cellspacing="0" align="left" valign="top" width="100%">
                                                                        <tr>
                                                                            <td align="left" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                                                                                    <tr>
                                                                                        <td align="right" class="ff_calibri fs_14 brown"><b>DR</b></td>
                                                                                        <td align="left" class="padLeft5">
                                                                                            <div id="selAccountDiv" class="selectStyled textLabel14CalibriGrey" style="border:0"><!---Change in class @AUTHOR: SANDY09JAN14--->
                                                                                                <?php
                                                                                                if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                                                    $selFirmId = $_SESSION['setFirmSession'];
                                                                                                } else {
                                                                                                    $selFirmId = $firmId;
                                                                                                }
                                                                                                $nextFieldId = 'girviPaymentOtherInfo';
                                                                                                $prevFieldId = 'girviDrAccId';
                                                                                                $selAccountId = 'loanPaySelAccountId';
                                                                                                $selAccountName = "'Current Assets'";
                                                                                                $accNameSelected = 'Cash in Hand';
                                                                                                $selAccountClass = 'textLabel14CalibriGrey';
                                                                                                include 'omacsalt.php';
                                                                                                ?>
                                                                                            </div>  
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                                                                                    <tr>
                                                                                        <td align="right" class="ff_calibri fs_14 brown"><b>CR</b></td>
                                                                                        <td align="left" class="padLeft5">
                                                                                            <div id="selAccountDiv" class="selectStyled textLabel14CalibriGrey" style="border:0"><!---Change in class @AUTHOR: SANDY09JAN14--->
                                                                                                <?php
                                                                                                if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                                                    $selFirmId = $_SESSION['setFirmSession'];
                                                                                                } else {
                                                                                                    $selFirmId = $firmId;
                                                                                                }
                                                                                                $nextFieldId = 'principalId1';
                                                                                                $prevFieldId = 'girviType';
                                                                                                $selAccountId = 'mlLoanCrAccId';
                                                                                                $selAccountName = "'Loans'";
                                                                                                $accNameSelected = 'Secured Loans';
                                                                                                $selAccountClass = 'textLabel14CalibriGrey';
                                                                                                include 'omacsalt.php';
                                                                                                ?>
                                                                                            </div>  
                                                                                        </td> 
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
    <!--                                                <td align="left" valign="top">
                                                        <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                                            <tr>
                                                                <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                                    <div class="spaceLeft5">PAYMENT INFO</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <div id="selAccountDiv" class="selectStyled">
                                                <?php
                                                if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                    $selFirmId = $_SESSION['setFirmSession'];
                                                } else {
                                                    $selFirmId = $firmId;
                                                }
                                                $prevFieldId = 'principalId1'; //@AUTHOR: SANDY09JAN14
                                                $nextFieldId = 'loanChequeNo';
                                                $selAccountId = 'loanPaySelAccountId';
                                                $selAccountName = "'Current Assets'";
                                                $accNameSelected = 'Cash in Hand';
                                                $selAccountClass = 'textLabel14CalibriGrey';
                                                include 'omacsalt.php';
                                                ?>
                                                                    </div>  
                                                                </td> 
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    <input id="loanChequeNo" name="loanChequeNo" type="text" placeholder="Cheque No"
                                                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                                                       document.getElementById('loanPaymentOtherInfo').focus();
                                                                                       return false;
                                                                                   }
                                                                                   else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('loanPaySelAccountId').focus();
                                                                                       return false;
                                                                                   }"
                                                                           spellcheck="false" class="inputBox14CalibriGrey textBoxCurve1px6rad" size="30" maxlength="16" />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>-->
                                                <td align="left" valign="top" width="33.33%">
                                                    <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" width="100%">
                                                        <tr>
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                                <b> PAYMENT AND OTHER INFO &nbsp;</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"><textarea id="loanPaymentOtherInfo"  cols="30"
                                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                                   document.getElementById('loanOtherInfo').focus();
                                                                                                   return false;
                                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                                   document.getElementById('loanChequeNo').focus();
                                                                                                   return false;
                                                                                               }"
                                                                                       spellcheck="false" name="loanPaymentOtherInfo" 
                                                                                       class="textarea-girvi-otherInfo" style="width:100%;height:80px;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="left" valign="top" width="33.33%">
                                                    <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" width="100%">
                                                        <tr>
                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                                <b>OTHER INFO</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"><textarea id="loanOtherInfo" 
                                                                                       spellcheck="false" name="loanOtherInfo" cols="30"
                                                                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                                                                   document.getElementById('submit').focus();
                                                                                                   return false;
                                                                                               } else if (event.keyCode == 8 && this.value == '') {
                                                                                                   document.getElementById('loanPaymentOtherInfo').focus();
                                                                                                   return false;
                                                                                               }"
                                                                                       class="textarea-girvi-otherInfo" style="width:100%;height:80px;"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="center">
                                        <div style="text-align:center;">
                                            <?php
                                            $inputId = "submit";
                                            $inputType = 'submit';
                                            $inputFieldValue = 'Submit';
                                            $inputIdButton = "submit";
                                            $inputNameButton = 'submit';
                                            $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                            // This is the main class for input flied
                                            $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                            $inputStyle = "border-radius: 5px !important;border:1px solid #a2d8a2;margin: 10px auto;width: 122px;height: 30px;font-weight: bold;font-size: 15px;text-align: center;color:#1a971a;background:#dfd";
                                            $inputLabel = 'Submit'; // Display Label below the text box
//
                                            // This class is for Pencil Icon                                                           
                                            $inputIconClass = '';
                                            $inputPlaceHolder = '';
                                            $spanPlaceHolderClass = '';
                                            $spanPlaceHolder = '';
                                            $inputOnChange = "";
                                            $inputOnClickFun = 'setMlId(this);';
                                            $inputKeyUpFun = '';
                                            $inputDropDownCls = '';               // This is the main division class for drop down 
                                            $inputselDropDownCls = '';            // This is class for selection in drop down
                                            $inputMainClassButton = '';           // This is the main division for Button
                                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                            ?>
                                        </div>
<!--                                        <input type="submit" value="Submit" class="frm-btn" id="submit" name="submit"
                                               maxlength="30" size="15" />-->
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td valign="top" align="left" class="border-top">
                                </tr>-->
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>   

