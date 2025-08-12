<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtatrndsb_new.php
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
//change in file @AUTHOR: SANDY08FEB14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION[sessionOwnerId];
/* * **Start to get Firm iD to get accounts according to it @AUTHOR: SANDY02JAN14*** */
/* * **Start to change code @AUTHOR: SANDY08FEB14***** */
//
$custId = $_REQUEST['custId'];
//
$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
    $todayDay = $_GET['day'];

    if ($todayDay != '' && $todayDay != 0 && $todayDay != null)
        $todayDay = $todayDay - 1;
    if ($_GET['month'] != '' && $_GET['month'] != 0 && $_GET['month'] != null)
        $todayMM = date("m", strtotime($_GET['month'])) - 1;

    if ($_GET['year'] != '' && $_GET['year'] != 0 && $_GET['year'] != null)
        $todayYear = $_GET['year'];
} else if (isset($_POST['firmId'])) {
    $selFirmId = $_POST['firmId'];
}
if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
    $selFirmId = $_SESSION['setFirmSession'];
}

if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
    parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
    $selFirmId = $firm_id;
}
/* * **End to change code @AUTHOR: SANDY08FEB14***** */
/* * **End to get Firm iD to get accounts according to it @AUTHOR: SANDY02JAN14*** */

// GET TRANS ACCOUNT ID 
$transDrMainAccountId = $_POST['transMainDrAccountId'];
$transCrMainAccountId = $_POST['transMainCrAccountId'];

// GET LAST TRANSACTION ENTRY DATE 
//$qSelTransDate = "SELECT transaction_DOB FROM transaction WHERE transaction_own_id='$_SESSION[sessionOwnerId]' and transaction_trans_id IS NULL order by transaction_id DESC LIMIT 0,1";
//$resSelTransDate = mysqli_query($conn, $qSelTransDate) or die(mysqli_error($conn));
//$rowSelTransDate = mysqli_fetch_array($resSelTransDate, MYSQLI_ASSOC);
//echo 'Date:'.$rowSelTransDate['transaction_DOB'].'Year:'.substr($rowSelTransDate['transaction_DOB'], -4);
//$selDOBDay = substr($rowSelTransDate['transaction_DOB'], 0, 2);
//$selDOBMnth = substr($rowSelTransDate['transaction_DOB'], 3, -5);
//$selDOBYear = substr($rowSelTransDate['transaction_DOB'], -4);
//echo '$selDOBDay:'.$selDOBDay.'-'.$selDOBMnth.'-'.$selDOBYear;
//
if ($selDOBMnth != '' && $selDOBYear != '') {
    $DOBMonth = date('m', strtotime($selDOBMnth)) - 1;
    $DOBYear = $selDOBYear;
} else {
    $DOBMonth = date(n) - 1;
    $DOBYear = date(Y);
}
//************************************************************************************
// START CODE TO GET VOUCHER NUMBER
//************************************************************************************

if ($DOBMonth > 2) {
    $currentEndFinYear = $DOBYear + 1;
} else {
    $currentEndFinYear = $DOBYear;
}

$currentStartFinYear = $currentEndFinYear - 1;
$currentEndFinYearDateTimestamp = strtotime($currentEndFinYear . '-03' . '-31');
$currentStartFinYearDateTimestamp = strtotime($currentStartFinYear . '-04' . '-01');
//    $DOBFinYearDateTimestamp = strtotime('01' . 'APR' . ($DOBEndFinYear));
//    echo strtotime($currentEndFinYear.'-04'.'-01');
//    echo '$currentStartFinYearDateTimestamp:'.$currentStartFinYearDateTimestamp.'<br/>';
//    echo '$currentEndFinYearDateTimestamp:'.$currentEndFinYearDateTimestamp;
// GET PRE VCH ID
$qSelPreVoucherNo = "SELECT transaction_pre_vch_id FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId' "
        . "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' "
        . "and transaction_trans_id IS NULL order by UNIX_TIMESTAMP(transaction_ent_dat) desc LIMIT 0,1";
$resPreVoucherNo = mysqli_query($conn, $qSelPreVoucherNo) or die(mysqli_error($conn));
$rowPreVoucherNo = mysqli_fetch_array($resPreVoucherNo);

$newTransPreVoucherNo = $rowPreVoucherNo['transaction_pre_vch_id'];

// GET POST VCH NUMBER
$qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' AND transaction_firm_id='$selFirmId' "
        . "AND UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' "
        . "AND transaction_trans_id IS NULL";
$resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
$rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);

/* Start code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */
$qselfname = "SELECT firm_name FROM firm where firm_id=' $selFirmId'";
$rselfname = mysqli_query($conn, $qselfname);
$rowselfname = mysqli_fetch_array($rselfname);
$firm = $rowselfname['firm_name'];
$firm = om_ucfirst($firm);
$frm = substr($firm, 0, 1);
/* End code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */

if (($newTransPreVoucherNo == NULL || $newTransPreVoucherNo == '') || ($rowVoucherNo['transVoucherId'] < 1)) {
    if ($selFirmId) {
        $newTransPreVoucherNo = 'V' . $frm;  //to append first letter of firm name @AUTHOR: SANDY19JUL13 
    } else {
        $newTransPreVoucherNo = 'V';   //When all firm selected append * @AUTHOR: SANDY19JUL13
    }
} else {
    $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' "
            . "and UNIX_TIMESTAMP(STR_TO_DATE(transaction_DOB,'%d %M %Y')) BETWEEN '$currentStartFinYearDateTimestamp' AND '$currentEndFinYearDateTimestamp' "
            . "and transaction_firm_id='$selFirmId' AND transaction_trans_id IS NULL";
    $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
    $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);
}
$newTransPostVoucherNo = $rowVoucherNo['transVoucherId'] + 1;
//************************************************************************************
// END CODE TO GET VOUCHER NUMBER
//************************************************************************************
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<div id="changeTransactionPanel"> <!-----Use this id to check panel id Name modified :-Harshad// ------->
    <table border="0" cellspacing="0" cellpadding="0" width="100%" class="brdrgry-dashed">
        <tr>
            <td align="center">
                <div id="addUpdateTransactionDiv">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="background: #fffeda;">
                        <tr>
                            <td colspan="6">
                                <table border="0" cellspacing="2" cellpadding="0" width="100%">
                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrownBold15" >
                                            FIRM
                                        </td>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrownBold15" >
                                            TO&nbsp;&nbsp;(DR+)
                                        </td>
                                        <td  align="left" valign="middle" class="textLabel12CalibriBrownBold15" >
                                            FROM&nbsp;&nbsp;(CR-)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" >
                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $custId; ?>" />
                                            <div id="selectFirmDiv" class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                <?php
                                                $prevFieldId = 'DOBYear';
                                                $nextFieldId = 'transToMainAcc';
                                                $firmIdName = 'transFirmId';
                                                $firmDivClass = 'textLabel14CalibriReq';
                                                $panelName = 'AddNewTransWithMultipleOpt';
                                                $firmIdSelected = $selFirmId;
                                                if (!$firmIdSelected) {
                                                    $firmIdSelected = $_SESSION['setFirmSession'];
                                                }
                                                include 'omffrafr.php';
                                                ?>                                                                
                                            </div>
                                        </td>
                                        <td align="left" class="textBoxCurve1px backFFFFFF" style="border:0">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                <?php
                                                $prevFieldId = 'transFirmId';
                                                $nextFieldId = 'transFromMainAcc';
                                                $allAccountDivId = 'transToMainAcc';
                                                if ($transDrMainAccountId != '') {
                                                    $accIdSelected = $transDrMainAccountId;
                                                } else {
                                                    $accIdSelected = '';
                                                }
                                                $accNameSelected = '';
                                                $allAccountDivClass = 'textLabel14CalibriReq';
                                                $firmIdSelected = $selFirmId;
                                                $panelName = 'AddNewTrans';
                                                include 'omacpalt.php';
                                                ?>
                                            </div>
                                        </td>
                                        <td align="left" class="textBoxCurve1px backFFFFFF" style="border:0">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                <?php
                                                $prevFieldId = 'transToMainAcc';
                                                $nextFieldId = 'transToAcc1';
                                                $allAccountDivId = 'transFromMainAcc';
                                                if ($transCrMainAccountId != '') {
                                                    $accIdSelected = $transCrMainAccountId;
                                                } else {
                                                    $accIdSelected = '';
                                                }
                                                $accNameSelected = '';
                                                $allAccountDivClass = 'textLabel14CalibriReq';
                                                $firmIdSelected = $selFirmId;
                                                $panelName = 'AddNewTrans';
                                                include 'omacpalt.php';
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr> 
                                        <td width="23%" align="left" valign="middle" class="textLabel12CalibriBrownBold15 green-text">
                                            TO&nbsp;&nbsp;(DR+)
                                        </td>
                                        <td width="25%" align="left" valign="middle" class="textLabel12CalibriBrownBold15">
                                            AMOUNT
                                        </td>
                                        <td width="23%" align="left" valign="middle" class="textLabel12CalibriBrownBold15 red-text">
                                            FROM&nbsp;&nbsp;(CR-)
                                        </td>
                                        <td width="25%" align="left" valign="middle" class="textLabel12CalibriBrownBold15">
                                            AMOUNT
                                        </td>
                                        <td width="2%" class="padLeft3">
                                        </td>
                                        <td width="2%" class="padLeft3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" width="100%">
                                            <?php include 'omTransSubDiv.php'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="textBoxCurve1px backFFFFFF" colspan="4" width="80%">
                                            <input id="transSub" style="text-align: left;padding-left:10px;width:100%;height:30px;"
                                                   name="transSub" spellcheck="false" type="text" placeholder="TRANSACTION SUBJECT"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('DOBDay').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('transAmtCr<?php echo $transactionEntryCount; ?>').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="107" maxlength="110" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <table border="0" width="100%">
                                                <tr>
                                                    <td align="left" width="100%" rowspan="8">
                                                        <iframe width="97%" height="200px;" 
                                                                id="editorIframeToDoList" name="editorIframeToDoList" frameborder="0" scrolling="Yes"></iframe>
                                                        <form id="txtEditorContentForm" name="txtEditorContentForm" target="editorIframeToDoList" action="<?php echo $documentMainRoot; ?>/2/editor/editor.php" method="post">
                                                            <input id="txtEditorContent" name="txtEditorContent" type="hidden" value="<?php echo urlencode($acit_desc); ?>" />
                                                            <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" onload="document.forms['txtEditorContentForm'].submit();" />
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td align="left" valign="top" width="20%" style="background:#e7f3ff;">
                                <table align="center" border="0" cellspacing="1" cellpadding="1" width="98%">
                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrownBold15" width="190px">
                                            DATE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="textBoxCurve1px backFFFFFF margin2pxAll" width="190px">
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
                                            if ($nepaliDateIndicator == 'YES') {
                                                $tableAlignStyle = 'center';
                                                $nepaliDatePanel = 'expensePanel';
                                                $selDayId = $selDayName = 'DOBDay';
                                                $selDayStyle = 'width:35px;height:26px;';
                                                $selMonthId = $selMonthName = 'DOBMonth';
                                                $selMonthStyle = 'width:55px;height:26px;';
                                                $selYearId = $selYearName = 'DOBYear';
                                                $selYearStyle = 'width:55px;height:26px;';
                                                $date_nepali = $transaction_other_lang_DOB;
                                                include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                            } else {
                                                ?>
                                                <table  border="0" cellspacing="0" cellpadding="0"  align="center">
                                                    <tr>
                                                        <td width="30%" align="center">
                                                                <?php
                                                                $todayDay = date('d', strtotime($selDOBDay));
                                                                if ($todayDay != '')
                                                                    $todayDay = date(j) - 1;

                                                                if ($todayDay == '') {
                                                                    $todayDay = date(j) - 1;
                                                                }
                                                                $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                $optDay[$todayDay] = "selected";
                                                                ?> 
                                                                <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                                    <select <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                    disabled
                                                               <?php } ?>id="DOBDay" name="DOBDay" style="width:100%;height:30px;"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('DOBMonth').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('transSub').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="getFirmVoucherNoByFinancialYear(document.getElementById('transFirmId').value, 'AddNewTransDateChange', 'DOBDay', document.getElementById('DOBMonth').value, document.getElementById('DOBYear').value);"
                                                                            class="textLabel14CalibriGrey"
                                                                            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                disabled
                                                                            <?php } ?>>
                                                                        <option value="NotSelected">DAY</option>
                                                                        <?php
                                                                        for ($dd = 0; $dd <= 30; $dd++) {
                                                                            echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                        }
                                                                        ?>
                                                                    </select> 
                                                                    <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                        <input id="DOBDay" name="DOBDay" type="hidden" value="<?php echo $selDOBDay; ?>"/>
                                                                    <?php } ?> 
                                                                </div>
                                                            </td>
                                                            <td width="40%" align="center">
                                                                <!-- *************** Start Code for Month *************** -->
                                                                <?php
                                                                $todayMM = date('m', strtotime($selDOBMnth)) - 1;
                                                                if ($todayMM == '') {
                                                                    $todayMM = date(n) - 1;
                                                                }
                                                                $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                $optMonth[$todayMM] = "selected";
                                                                ?>
                                                                <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                                <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                                    <select <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                    disabled <?php } ?>
                                                                        id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey" style="width:100%;height:30px;"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('DOBYear').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('DOBDay').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="getFirmVoucherNoByFinancialYear(document.getElementById('transFirmId').value, 'AddNewTransDateChange', 'DOBMonth', this.value, document.getElementById('DOBYear').value);"
                                                                            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                disabled
                                                                            <?php } ?>
                                                                            >
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
                                        $billMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
                                    } else {
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                    }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                             }
                                                                        ?>
                                                                    </select> 
                                                                    <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                        <input id="DOBMonth" name="DOBMonth" type="hidden" value="<?php echo $selDOBMnth; ?>"/>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                         
                                                       
                                                            <td width="40%">
                                                                <!-- *************** Start Code for Year *************** -->
                                                                <?php
                                                                $todayYear = $selDOBYear;
                                                                if ($todayYear == '') {
                                                                    $todayYear = date(Y);
                                                                }
                                                                $optYear[$todayYear] = "selected";
                                                                $currentYear = date(Y);
//                                                        $optYear[$selDOBYear] = "selected";
                                                                ?> 
                                                                <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%">
                                                                    <select  <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                    disabled <?php } ?>
                                                                        id="DOBYear" name="DOBYear" style="width:100%;height:30px"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('transPreVoucherNo').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('DOBMonth').focus();
                                                                                        return false;
                                                                                    }"
                                                                            onchange="getFirmVoucherNoByFinancialYear(document.getElementById('transFirmId').value, 'AddNewTransDateChange', 'DOBYear', document.getElementById('DOBMonth').value, this.value);"
                                                                            class="textLabel14CalibriGrey"
                                                                            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                disabled
                                                                            <?php } ?>
                                                                            >
                                                                        <option value="NotSelected">YEAR</option>
                                                                        <?php
                                                                        for ($yy = $currentYear; $yy >= 1900; $yy--) {
                                                                            echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                        <input id="DOBYear" name="DOBYear" type="hidden" value="<?php echo $selDOBYear; ?>"/>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                    </tr>
                                                </table>
                                            <?php } ?>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrownBold15">
                                            VOUCHER NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="textBoxCurve1px backFFFFFF" width="50px" height="30px">
                                            <div id="transVoucherNoDiv">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <!---Start to change @AUTHOR: SANDY27JAN14-------------->
                                                        <td align="center" width="45%">
                                                            <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $newTransPreVoucherNo; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('DOBYear').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" style="width:100%;height:30px;"/> 
                                                            <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" value="<?php echo $firmId; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" style="width:100%;height:30px;"/>
                                                        </td>
                                                        <td align="left"  class="textLabel14CalibriReq" width="10%">
                                                            &minus;
                                                        </td>
                                                        <td align="center" width="45%">
                                                            <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="VOUCHER NO" value="<?php echo $newTransPostVoucherNo; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transactionCategory').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="5" maxlength="16" style="width:100%;height:30px;"/>
                                                        </td>
                                                        <!--End to change @AUTHOR: SANDY27JAN14-------------->
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- START CODE TO ADD OPTION FOR SUPPLIER VOUCHER NO IF USER ID IS PRESENT @AUTHOR:MADHUREE-08JULY2021 -->
                                    <?php
                                    if ($custId != '') {
                                        $user_type = '';
                                        parse_str(getTableValues("SELECT user_type FROM user WHERE user_id='$custId'"));
                                    }
                                    ?>
                                    <?php if (($custId != '' && $custId != NULL) && ($user_type == 'SUPPLIER')) { ?>
                                        <tr>
                                            <td align="center" valign="middle" class="textLabel12CalibriBrownBold15">
                                                SUPPLIER VOUCHER NO
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" width="50px">
                                                <div id="transVoucherNoDiv" style="text-align: center;">
                                                    <input id="supplierVoucherNo" name="supplierVoucherNo" type="text" placeholder="SUPPLIER VOUCHER NO" 
                                                           value="<?php echo $supplierVoucherNo; ?>" style="text-align: center;"
                                                           spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="20" maxlength="15" /> 
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <input id="supplierVoucherNo" name="supplierVoucherNo" type="hidden" placeholder="SUPPLIER VOUCHER NO" 
                                               value="<?php echo $supplierVoucherNo; ?>" style="text-align: center;"
                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="20" maxlength="15" /> 
                                           <?php } ?>
                                    <!-- END CODE TO ADD OPTION FOR SUPPLIER VOUCHER NO IF USER ID IS PRESENT @AUTHOR:MADHUREE-08JULY2021 -->
                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrownBold15">
                                            TYPE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left"  width="40px" height="30px" class="textBoxCurve1px backFFFFFF">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100%;height:30px;">
                                                <SELECT class="textLabel14CalibriReq" id="transactionCategory" name="transactionCategory"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('transSubButt').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('transPostVoucherNo').focus();
                                                                    return false;
                                                                }"
                                                        spellcheck="false" style="width:100%;height:30px;">
                                                    <OPTION value="Business" >BUSINESS TRANSACTION</OPTION>
                                                    <OPTION value="Personal" >PERSONAL TRANSACTION</OPTION>
                                                    <OPTION value="Other" >OTHER TRANSACTION</OPTION>
                                                </SELECT>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <button class="btn-submit" id="transSubButt" type="submit"  
                                                    onkeydown="if (event.keyCode == 8) {
                                                                document.getElementById('transSub').focus();
                                                                return false;
                                                            }"
                                                    onclick="javascript:addTransactionNew(document.getElementById('add_transaction'));"
                                                    maxlength="30" size="15" style="padding:5px;background: #dfd;color: #1a971a;border: 1px solid #a2d8a2;font-weight:600" >
                                                <span>SUBMIT</span>
                                            </button>
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
    <!--<hr color="#FD9A00" size="0.1px" />-->
    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="2" align="center">
                <div id="ajaxLoadNavigateTransactionList" style="visibility: hidden">
                    <?php include 'omzaajld.php'; ?>
                </div>
            </td>
        </tr>
    </table>
     <div id="transactionListDiv">
                    <?php include 'omttlisd.php'; ?>
                </div>
<!--        <tr>
            <td colspan="2">
               
            </td>
        </tr>
        <tr>
            <td colspan="2"><br />
            </td>
        </tr>-->
     <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" colspan="2" class="noPrint">
                <a style="cursor: pointer;" 
                   onclick="printGirviListPanel('transactionListDiv')">
                    <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                         width="32px" height="32px" /> 
                </a> 
            </td>
        </tr>
    </table>
</td>
</tr>
</table>
</td>
<!--<table>
    <tr>
        <td>
            <input type="submit" value="PERSONAL TRANSACTIONS" onclick="navigateTransactionList('Personal')"
                   class="frm-btn" />
        </td>
        <td>
            <input type="submit" value="OTHER TRANSACTIONS" onclick="navigateTransactionList('Other')"
                   class="frm-btn" />
        </td>
    </tr>
</table>-->
</td>
</tr>
<tr>
    <td colspan="2"><br />
    </td>
</tr><!--
COMMENT BY @AUTHOR: SANDY06JAN14---->
</div>
