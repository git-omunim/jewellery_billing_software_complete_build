<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtutrnd.php
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
//
//
//CHANGES IN FILE @AUTHOR: SANDY27JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
include 'ommpfndv.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
// print_r($array);
require_once 'system/omssopin.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$transactionId = $_GET['transId'];
$preVch = $_GET['preVch'];
$firmVch = $_GET['firmVch'];
$postVch = $_GET['postVch'];
$subPanelName = $_REQUEST['subPanelName'];

$transMainId = $_GET['transId']; //@AUTHOR: SANDY25JAN14
if ($transMainId == '' || $transMainId == NULL) { //ADD CONDITION @AUTHOR: SANDY25JAN14 
    $qSelVoucherNoDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_pre_vch_id='$preVch' and transaction_pre_vch_firm_id='$firmVch' and transaction_post_vch_id='$postVch'";
} else {
    $qSelVoucherNoDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_id='$transMainId'";
}
//echo '$qSelVoucherNoDetails=='.$qSelVoucherNoDetails.'<br>';
$resVoucherNoDetails = mysqli_query($conn, $qSelVoucherNoDetails) or die(mysqli_error($conn));
$rowVoucherNoDetails = mysqli_fetch_array($resVoucherNoDetails);
$transId = $rowVoucherNoDetails['transaction_id'];
$transaction_user_id = $rowVoucherNoDetails['transaction_user_id'];
if ($subPanelName == '' && $transaction_user_id != '' & $transaction_user_id != NULL) {
    $subPanelName = 'updateWithUserId';
}
?>
<!--<div id="mainMiddle">
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
        <tr>
            <td align="left" colspan="2">
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td valign="middle" align="left" width="34px">
                            <div class="analysis_div_rows">
<?php if ($selFirmId != NULL) { ?> 
                                                                                                        <img src = "images/transactions32.png" onload = "document.getElementById('transAmt').focus();"
                                                                                                             alt = "Daily Transactions" />
<?php } else {
    ?>
                                                                                                        <img src="<?php echo $documentRoot; ?>/images/transactions32.png" onload="document.getElementById('DOBDay').focus();"
                                                                                                             alt="Daily Transactions" />
<?php } ?>
                            </div>
                        </td>
                        <td valign="middle" align="left" width="250px">
                            <div class="analysis_div_rows textLabelHeading">
                                TRANSACTION PANEL
                            </div>
                        </td>
                        <td align="center">
<?php
$showTransactionAddedDiv = $_GET['divMainMiddlePanel'];
if ($showTransactionAddedDiv == "TransactionAdded") {
    include 'omzaaamg.php';
} else if ($showTransactionAddedDiv == "TransactionUpdated") {
    include 'omzaaumg.php';
} else if ($showTransactionAddedDiv == "TransactionDeleted") {
    include 'omzaadmg.php';
}
?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="right" colspan="2">
                <hr color="#B8860B" />
            </td>
        </tr>
    </table>
    <div id="addUpdateTransactionDiv">-->
<table border="0" cellspacing="2" cellpadding="2" width="100%" style="background: #e9f7f5;border: 1px dashed #0079c2;padding-bottom: 8px;">
    <tr>
        <td colspan="6">
            <table  border="0" cellspacing="2" cellpadding="2" >
                <tr>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown" width="190px">
                        <input type="hidden" id="transId" name="transId" value="<?php echo $transactionId; ?>" />
                        <input type="hidden" id="subPanelName" name="subPanelName" value="<?php echo $subPanelName; ?>" />
                        <b> DATE</b>
                    </td>
                        <td class="textBoxCurve1px backFFFFFF margin1pxAll" width="190px">
                        <?php
                        //
                        // **********************************************************************************
                        // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                        // **********************************************************************************
                        //
                        $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                        $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                        $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                        $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                        //
                        // ********************************************************************************
                        // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                        // ********************************************************************************
                        //
                        if ($nepaliDateIndicator == 'YES') {
                            $tableAlignStyle = 'center';
                            $nepaliDatePanel = 'expensePanel';
                            $selDayId = $selDayName = 'DOBDay';
                            $selDayStyle = 'width:35px;height:26px;';
                            $selMonthId = $selMonthName = 'DOBMonth';
                            $selMonthStyle = 'width:55px;height:26px;';
                            $selYearId = $selYearName = 'DOBYear';
                            $selYearStyle = 'width:55px;height:26px;';
                            $date_nepali = $rowVoucherNoDetails['transaction_other_lang_DOB'];
                            include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                            ?>
                            <input type="hidden" id="jrnlId" name="jrnlId" value="<?php echo $rowVoucherNoDetails['transaction_jrnl_id']; ?>" /><!---To pass jrnl id @AUTHOR: SANDY15JAN14 ----> 
                            <?php
                        } else {
                            $selDOBDay = substr($rowVoucherNoDetails['transaction_DOB'], 0, 2);
                            $selDOBMnth = substr($rowVoucherNoDetails['transaction_DOB'], 3, -5);
                            $selDOBYear = substr($rowVoucherNoDetails['transaction_DOB'], -4);
                            ?>
                            <!-- *************** Start Code for dayDD *************** -->
                            <?php
                            $todayDay = $selDOBDay - 1;
                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                            $optDay[$todayDay] = "selected";
                            ?> 
                            <div  class="selectStyledBorderLess backFFFFFF floatLeft" width="30%">
                                <select id="DOBDay" name="DOBDay" 
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                        document.getElementById('DOBMonth').focus();
                                                        return false;
                                                    } else if (event.keyCode == 8) {
                                                        return false;
                                                    }"
                                        class="textLabel14CalibriGrey" style="width:100%;height:30px">
                                    <option value="NotSelected">DAY</option>
                                    <?php
                                    for ($dd = 0; $dd <= 30; $dd++) {
                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                    }
                                    ?>
                                </select> 
                            </div>

                            <!-- *************** Start Code for Month *************** -->
                            <?php
                            $todayMM = date('m', strtotime($selDOBMnth)) - 1;
                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <input type="hidden" id="jrnlId" name="jrnlId" value="<?php echo $rowVoucherNoDetails['transaction_jrnl_id']; ?>" /><!---To pass jrnl id @AUTHOR: SANDY15JAN14 ----> 
                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                            <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="width:30%">
                                <select id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                        document.getElementById('DOBYear').focus();
                                                        return false;
                                                    } else if (event.keyCode == 8) {
                                                        document.getElementById('reportEntryDayDD').focus();
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
                                                        }//END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                                    }" style="width:100%;height:30px">

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

                            <!-- *************** Start Code for Year *************** -->
                            <?php
                            $todayYear = date(Y); //changed @Author:PRIYA30APR14
                            $optYear[$selDOBYear] = "selected";
                            ?> 
                            <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="width:40%">
                                <select id="DOBYear" name="DOBYear" 
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                        document.getElementById('transFirmId').focus();
                                                        return false;
                                                    } else if (event.keyCode == 8) {
                                                        document.getElementById('DOBMonth').focus();
                                                        return false;
                                                    }"
                                        class="textLabel14CalibriGrey" style="width:100%;height:30px">
                                    <option value="NotSelected">YEAR</option>
                                    <?php
                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" align="center" cellspacing="0" cellpadding="1" style="border:1px solid #c1c1c1;background:#fff;">
                <tr  style="background: #FFE34F;">     
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> FIRM</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b>VOUCHER NO</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> AMOUNT</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> TO&nbsp;&nbsp;(DR+)</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> FROM&nbsp;&nbsp;(CR-)</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> TYPE</b>
                    </td>
                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                        <b> SUBJECT</b>
                    </td>
                </tr>

                <tr>
                    <td align="left"  width="90px">
                        <div id="selectFirmDiv" class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;">
                            <?php
                            $prevFieldId = 'transPreVoucherNo'; //
                            $nextFieldId = 'transAmt';
                            $nextReqFieldId = 'transAmt';
                            $firmIdName = 'transFirmId';
                            $firmDivClass = 'textLabel14CalibriReq';
                            $panelName = 'AddNewTrans';
                            $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                            if (!$firmIdSelected) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                            }
                            include 'omffrafr.php';
                            ?>                                                                
                        </div>
                    </td>
                    <td align="left"  width="50px">
                        <div id="transVoucherNoDiv">
                            <table border="0" cellpadding="0" cellspacing="0" >
                                <tr>
                                    <td>
                                        <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $rowVoucherNoDetails['transaction_pre_vch_id']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('transPostVoucherNo').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('DOBYear').focus();
                                               return false;
                                           }"
                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" readonly="true" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;"/> 

                                        <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" placeholder="-" value="<?php echo $rowVoucherNoDetails['transaction_pre_vch_firm_id']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('transPostVoucherNo').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('transPreVoucherNo').focus();
                                               return false;
                                           }"
                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;"/>
                                    </td>
                                    <td align="left"  class="inputBox14CalibriReqCenter">
                                        &minus;
                                    </td>
                                    <td>
                                        <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="Voucher No" value="<?php echo $rowVoucherNoDetails['transaction_post_vch_id']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('transFirmId').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('transPreVoucherNo').focus();
                                               return false;
                                           }"
                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="5" maxlength="16" readonly="true" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td align="left"  style="width:50px;">
                        <input id="transAmt"
                               name="transAmt" spellcheck="false" type="text" value="<?php echo number_format($rowVoucherNoDetails['transaction_amt'], 2, '.', ''); ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transFromAcc').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transFirmId').focus();
                               return false;
                           }"
                               spellcheck="false" class="border-no inputBox14CalibriReqCenter text_right" size="15" maxlength="20" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;"/>
                    </td>
                    <td align="left"  width="170px" >
                        <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;">
                            <?php
                            $prevFieldId = 'transAmt';
                            $nextFieldId = 'transFromAcc';
                            $allAccountDivId = 'transToAcc';
                            $accIdSelected = $rowVoucherNoDetails['transaction_to_dr_acc_id'];
                            $accNameSelected = '';
                            $allAccountDivClass = 'textLabel14CalibriReq';
                            $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id']; //@ADD CLASS NAME @AUTHOR:PRIYA31
                            include 'omacpalt.php';
                            ?>
                        </div>
                    </td>
                    <td align="left"  width="170px" >
                        <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;">
                            <?php
                            $prevFieldId = 'transToAcc';
                            $nextFieldId = 'transactionCategory';
                            $allAccountDivId = 'transFromAcc';
                            $accIdSelected = $rowVoucherNoDetails['transaction_from_cr_acc_id'];
                            $accNameSelected = '';
                            $allAccountDivClass = 'textLabel14CalibriReq';
                            $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id']; //@ADD CLASS NAME @AUTHOR:PRIYA31
                            include 'omacpalt.php';
                            ?>
                        </div>
                    </td>
                    <td align="left"  width="40px" >
                        <?php
                        $selType = $rowVoucherNoDetails['transaction_cat'];
                        $transactionCat = $selType;
                        switch ($selType) {
                            case "Business":
                                $option1 = "selected";
                                break;
                            case "Personal":
                                $option2 = "selected";
                                break;
                            case "Other":
                                $option3 = "selected";
                                break;
                        }
                        ?>
                        <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;">
                            <SELECT class="textLabel14CalibriReq" id="transactionCategory" name="transactionCategory"
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('transactionDesc').focus();
                                    return false;
                                } else if (event.keyCode == 8 && this.value == '') {
                                    document.getElementById('transSub').focus();
                                    return false;
                                }"
                                    spellcheck="false">
                                <OPTION value="NotSelected">Category</OPTION>
                                <OPTION value="Business" <?php echo $option1; ?>>BT</OPTION>
                                <OPTION value="Personal" <?php echo $option2; ?>>PT</OPTION>
                                <OPTION value="Other" <?php echo $option3; ?>>OT</OPTION>
                            </SELECT>
                        </div>
                    </td>
                    <td style="width:120px;">
                        <input id="transSub"
                               name="transSub" spellcheck="false" type="text" value="<?php echo $rowVoucherNoDetails['transaction_sub']; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('transSubButt').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('transactionCategory').focus();
                               return false;
                           }"
                               spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" style="width:100%;height:30px;border:1px solid #c1c1c1;border-radius:3px;"/>
                    </td>
                </tr>
    </tr>   
</table>
</td>

    <tr>
        <?php
        ?>
        <td colspan="7" align="center">
            <?php
//            echo '$staffId : ' . $staffId . '<br>';
//            echo '$array[updateTransactionAccess] : ' . $array['updateTransactionAccess'] . '<br>';
            if ($staffId == '' || (($staffId && $array['updateTransactionAccess'] == 'true') && ($staffId != '' && $array['updateTransactionForAllPanel'] == 'true'))) {
                ?>
                <input id="transSubButt" type="submit" value="Update" class="frm-btn"
                       onclick="javascript:updateTransaction(document.getElementById('update_transaction'));"
                       maxlength="30" size="15" style="text-transform:uppercase;"/>
                   <?php } ?>
            <!------------Start code to add param @Author:PRIYA01JUL14------------>

            <?php
//            echo '$staffId : ' . $staffId . '<br>';
//            echo '$array[deleteTransactionAccess] : ' . $array['deleteTransactionAccess'] . '<br>';
            if ($staffId == '' || (($staffId && $array['deleteTransactionAccess'] == 'true') && ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true'))) {
                ?>

                <input id = "deleteTransactionButt" type = "submit" value = "Delete" class = "frm-btn"
                       onclick = "javascript:deleteTransaction('<?php echo $transactionCat; ?>',<?php echo $transId; ?>,
                                           '<?php echo $rowVoucherNoDetails['transaction_jrnl_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_pre_vch_id'] . $rowVoucherNoDetails['transaction_post_vch_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_amt']; ?>',
                                           '<?php echo $rowVoucherNoDetails['transaction_DOB']; ?>', '<?php echo $rowVoucherNoDetails['transaction_firm_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_sub']; ?>');"
                       maxlength = "30" size = "15" style="text-transform:uppercase;background: #fdd;color: #df0707;border: 1px solid #ffadad;"/>
                   <?php } ?>
            <!------------End code to add param @Author:PRIYA01JUL14------------>
        </td>

    </tr>
</table>
<!--    </div>
    <hr color="#FD9A00" size="0.1px" />
    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="2" align="center">
                <div id="ajaxLoadNavigateTransactionList" style="visibility: hidden">
<?php include 'omzaajld.php'; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="transactionListDiv">
<?php //include 'omttlisd.php';        ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><br />
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2" class="noPrint">
                <a style="cursor: pointer;" 
                   onclick="printPageDiv('transactionListDiv', '')">Start code to pass param @Author:PRIYA06FEB14
                    <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                         width="32px" height="32px" /> 
                </a> 
            </td>
        </tr>
    </table>
</div>-->
