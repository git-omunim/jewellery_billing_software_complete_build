<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtatrndsb.php
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

$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
/* * **Start to get Firm iD to get accounts according to it @AUTHOR: SANDY02JAN14*** */
/* * **Start to change code @AUTHOR: SANDY08FEB14***** */
//
$custId = $_REQUEST['custId'];
//
$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
    $todayDay = $_GET['day'];
    if ($_GET['month'] != '') {
        $todayMM = date("j", strtotime($_GET['month']));
    } else {
        $todayMM = date(m) - 1;
    }
    $todayYear = $_GET['year'];
} else if (isset($_POST['firmId'])) {
    $selFirmId = $_POST['firmId'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'undefined') {
    parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
    $selFirmId = $firm_id;
}
/* * **End to change code @AUTHOR: SANDY08FEB14***** */
/* * **End to get Firm iD to get accounts according to it @AUTHOR: SANDY02JAN14*** */

// GET TRANS VCH ID
$qSelPreVoucherNo = "SELECT transaction_pre_vch_id FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId' order by UNIX_TIMESTAMP(transaction_ent_dat) desc LIMIT 0,1";
$resPreVoucherNo = mysqli_query($conn, $qSelPreVoucherNo) or die(mysqli_error($conn));
$rowPreVoucherNo = mysqli_fetch_array($resPreVoucherNo);

$newTransPreVoucherNo = $rowPreVoucherNo['transaction_pre_vch_id'];

/* Start code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */
$qselfname = "SELECT firm_name FROM firm where firm_id=' $selFirmId'";
$rselfname = mysqli_query($conn, $qselfname);
$rowselfname = mysqli_fetch_array($rselfname);
$firm = $rowselfname['firm_name'];
$firm = om_ucfirst($firm);
$frm = substr($firm, 0, 1);

/* End code to display prevoucherId containing first letter of firm @AUTHOR:SANDY19JUL13 */
if ($newTransPreVoucherNo == NULL || $newTransPreVoucherNo == '') {
    if ($selFirmId) {
        $newTransPreVoucherNo = 'V' . $frm;  //to append first letter of firm name @AUTHOR: SANDY19JUL13 
    } else {
        $newTransPreVoucherNo = 'V';   //When all firm selected append * @AUTHOR: SANDY19JUL13
    }
    $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId'";
    $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
    $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);
} else {
    $qSelVoucherNo = "SELECT max(transaction_post_vch_id) as transVoucherId FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_firm_id='$selFirmId'";
    $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
    $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);
}
$newTransPostVoucherNo = $rowVoucherNo['transVoucherId'] + 1;
?>
<div id="changeTransactionPanel"> <!-----Use this id to check panel id Name modified :-Harshad// ------->
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="center">
                <div id="addUpdateTransactionDiv">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border: 1px dashed #0079c2;background: #e9f7f5;padding-bottom:8px;">
                        <tr>
                            <td align="left" >
                                <table align="left" border="0" cellspacing="2" cellpadding="2" class="spaceLeftRight10">
<!--                                    <tr>
                                        <td>
                                            <img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt="image" onload="document.getElementById('DOBDay').focus();"/>
                                            <table  border="0" cellspacing="2" cellpadding="2">
                                                <tr>
                                                    <td align="center" valign="middle" class="textLabel12CalibriBrown" width="190px">
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
                                                            $date_nepali = $transaction_other_lang_DOB;
                                                            include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                                        } else {
                                                            ?>
                                                            <table  border="0" cellspacing="0" cellpadding="0" >
                                                                <tr>
                                                                    <?php if ($staffId == '' || ($staffId && $array['currentTransactionAccess'] != 'true')) { ?>
                                                                        <td>
                                                                            <?php
                                                                            if ($todayDay == '') {
                                                                                $todayDay = date(j) - 1;
                                                                            }
                                                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                            $optDay[$todayDay] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBDay" name="DOBDay"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
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
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <td>
                                                                            <?php
                                                                            if ($todayDay == '') {
                                                                                $todayDay = date(j) - 1;
                                                                            }
                                                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                            $optDay[$todayDay] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBDay" name="DOBDay" disabled="true"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
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
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                    <?php if ($staffId == '' || ($staffId && $array['currentTransactionAccess'] != 'true')) { ?>
                                                                        <td>
                                                                             *************** Start Code for Month *************** 
                                                                            <?php
                                                                            if ($todayMM == '') {
                                                                                $todayMM = date(n) - 1;
                                                                            }
                                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                            $optMonth[$todayMM] = "selected";
                                                                            ?>
                                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />  ADD INPUT FIELD @AUTHOR: SANDY21AUG13 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBYear').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBDay').focus();
                                                                                                    return false;
                                                                                                }"
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
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <td>
                                                                             *************** Start Code for Month *************** 
                                                                            <?php
                                                                            if ($todayMM == '') {
                                                                                $todayMM = date(n) - 1;
                                                                            }
                                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                            $optMonth[$todayMM] = "selected";
                                                                            ?>
                                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />  ADD INPUT FIELD @AUTHOR: SANDY21AUG13 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey" disabled="true"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBYear').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBDay').focus();
                                                                                                    return false;
                                                                                                }"
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
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <?php if ($staffId == '' || ($staffId && $array['currentTransactionAccess'] != 'true')) { ?>
                                                                        <td>
                                                                             *************** Start Code for Year *************** 
                                                                            <?php
                                                                            if ($todayYear == '') {
                                                                                $todayYear = date(Y);
                                                                            }
                                                                            $optYear[$todayYear] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBYear" name="DOBYear"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('transFirmId').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
                                                                                    <option value="NotSelected">YEAR</option>
                                                                                    <?php
                                                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                    <input id="DOBYear" name="DOBYear" type="hidden" value="<?php echo $selDOBYear; ?>"/>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <td>
                                                                             *************** Start Code for Year *************** 
                                                                            <?php
                                                                            if ($todayYear == '') {
                                                                                $todayYear = date(Y);
                                                                            }
                                                                            $optYear[$todayYear] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select id="DOBYear" name="DOBYear" disabled="true"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('transFirmId').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
                                                                                    <option value="NotSelected">YEAR</option>
                                                                                    <?php
                                                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                    <input id="DOBYear" name="DOBYear" type="hidden" value="<?php echo $selDOBYear; ?>"/>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </table>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>-->
                                    <tr>
                                          <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                              <b>DATE</b>
                                         
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>FIRM</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>VOUCHER NO</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>AMOUNT</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>TO&nbsp;&nbsp;(DR+)</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>FROM&nbsp;&nbsp;(CR-)</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>TYPE</b>
                                        </td>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            <b>SUBJECT</b>
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                                    <td class="textBoxCurve1px backFFFFFF margin2pxAll" width="240px">
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
                                                            $date_nepali = $transaction_other_lang_DOB;
                                                            include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                                        } else {
                                                            ?>
                                                            <table  border="0" cellspacing="0" cellpadding="0" >
                                                                <tr>
                                                                        <td>
                                                                            <?php
                                                                            if ($todayDay == '') {
                                                                                $todayDay = date(j) - 1;
                                                                            }
                                                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                            $optDay[$todayDay] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select  <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?> 
                                                                                disabled <?php } ?>
                                                                                    id="DOBDay" name="DOBDay"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
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
                                                                        <td>
                                                                            <!-- *************** Start Code for Month *************** -->
                                                                            <?php
                                                                            if ($todayMM == '') {
                                                                                $todayMM = date(n) - 1;
                                                                            }
                                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                            $optMonth[$todayMM] = "selected";
                                                                            ?>
                                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                disabled <?php } ?> id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('DOBYear').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBDay').focus();
                                                                                                    return false;
                                                                                                }"
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
                                                                        <td>
                                                                            <!-- *************** Start Code for Year *************** -->
                                                                            <?php
                                                                            if ($todayYear == '') {
                                                                                $todayYear = date(Y);
                                                                            }
                                                                            $optYear[$todayYear] = "selected";
                                                                            ?> 
                                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                                <select <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                disabled <?php } ?> id="DOBYear" name="DOBYear"
                                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                    document.getElementById('transFirmId').focus();
                                                                                                    return false;
                                                                                                } else if (event.keyCode == 8) {
                                                                                                    document.getElementById('DOBMonth').focus();
                                                                                                    return false;
                                                                                                }"
                                                                                        class="textLabel14CalibriGrey"
                                                                                        <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                            disabled
                                                                                        <?php } ?>
                                                                                        >
                                                                                    <option value="NotSelected">YEAR</option>
                                                                                    <?php
                                                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
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
                                           
                                        <td align="left"  width="140px;" class="textBoxCurve1px backFFFFFF margin1pxAll">
                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $custId; ?>" />
                                            <div id="selectFirmDiv" class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <?php
                                                $prevFieldId = 'DOBYear'; //
                                                $nextFieldId = 'transPreVoucherNo';
                                                $nextReqFieldId = 'transAmt';
                                                $firmIdName = 'transFirmId';
                                                $firmDivClass = 'textLabel14CalibriReq';
                                                $panelName = 'AddNewTrans';
                                                $firmIdSelected = $selFirmId;
                                                //to assign default firm id @AUTHOR: SANDY10JUL13
                                                if (!$firmIdSelected) {
                                                    $firmIdSelected = $_SESSION['setFirmSession'];
                                                }
                                                //echo '$firmIdSelected'.$firmIdSelected;
                                                include 'omffrafr.php';
                                                ?>                                                                
                                            </div>
                                        </td>
                                        <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" width="50px">
                                            <div id="transVoucherNoDiv">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <!---Start to change @AUTHOR: SANDY27JAN14-------------->
                                                        <td>
                                                            <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $newTransPreVoucherNo; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('transFirmId').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" /> 
                                                            <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" value="<?php echo $firmId; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" />
                                                        </td>
                                                        <td align="left"  class="textLabel14CalibriReq">
                                                            &minus;
                                                        </td>
                                                        <td>
                                                            <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="Voucher No" value="<?php echo $newTransPostVoucherNo; ?>"
                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('transAmt').focus();
                                                                               return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                               return false;
                                                                           }"
                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="5" maxlength="16" />
                                                        </td>
                                                        <!--End to change @AUTHOR: SANDY27JAN14-------------->
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                        <td align="right" class="textBoxCurve1px  backFFFFFF margin1pxAll">
                                            <input id="transAmt"
                                                   name="transAmt" spellcheck="false" type="text" placeholder="Amount"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('transToAcc').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('transPostVoucherNo').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter backFFFFFF" size="15" maxlength="20" />
                                        </td>
                                        <td align="left"  width="170px" class="textBoxCurve1px backFFFFFF">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <?php
                                                $prevFieldId = 'transAmt';
                                                $nextFieldId = 'transFromAcc';
                                                $allAccountDivId = 'transToAcc';
                                                $accIdSelected = '';
                                                $accNameSelected = '';
                                                $allAccountDivClass = 'textLabel14CalibriReq';
                                                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                                                include 'omacpalt.php';
                                                ?>
                                            </div>
                                        </td>
                                        <td align="left"  width="170px" class="textBoxCurve1px backFFFFFF">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <?php
                                                $prevFieldId = 'transToAcc';
                                                $nextFieldId = 'transactionCategory';
                                                $allAccountDivId = 'transFromAcc';
                                                $accIdSelected = '';
                                                $accNameSelected = '';
                                                $allAccountDivClass = 'textLabel14CalibriReq';
                                                $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
                                                include 'omacpalt.php';
                                                ?>
                                            </div>
                                        </td>
                                        <td align="left"  width="40px" class="textBoxCurve1px backFFFFFF">
                                            <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <SELECT class="textLabel14CalibriReq" id="transactionCategory" name="transactionCategory"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('transSub').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('transFromAcc').focus();
                                                                    return false;
                                                                }"
                                                        spellcheck="false">
                                                    <OPTION value="Business" >BT</OPTION>
                                                    <OPTION value="Personal" >PT</OPTION>
                                                    <OPTION value="Other" >OT</OPTION>
                                                </SELECT>
                                            </div>
                                        </td>
                                        <td class="textBoxCurve1px backFFFFFF">
                                            <input id="transSub"
                                                   name="transSub" spellcheck="false" type="text" placeholder="Subject"
                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                               document.getElementById('transSubButt').focus();
                                                               return false;
                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                               document.getElementById('transactionCategory').focus();
                                                               return false;
                                                           }"
                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" />
                                        </td>
                                        <td align="center">
                                            <input id="transSubButt" type="submit" value="SUBMIT" class="frm-btn"
                                                   onkeydown="if (event.keyCode == 8) {
                                                               document.getElementById('transSub').focus();
                                                               return false;
                                                           }"
                                                   onclick="javascript:addTransaction(document.getElementById('add_transaction'));"
                                                   maxlength="30" size="15" style="background:#2D67BF;color: #fff;border: 1px solid #7ab0fe;border-radius: 3px !important;height: 32px;width: 90px;font-size: 14px;"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                       <!---<tr align="left" valign="middle">
                            <td align="left" colspan="2">
                                <div id="transPanelSubDiv">
                        <?php include 'omtatrsd.php'; ?>
                                </div>
                            </td>
                        </tr> Comment by @AUTHOR: SANDY02JAN14---->
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
        <tr>
            <td colspan="2">
                <div id="transactionListDiv">
                    <?php include 'omttlisd.php'; ?>
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
                   onclick="printGirviListPanel('transactionListDiv')">
                    <img src="<?php echo $documentRoot; ?>/images/img/printer.png" alt='Print' title='Print'
                         width="24px" height="24px" /> 
                </a> 
            </td>
        </tr>
    </table>
</div>
