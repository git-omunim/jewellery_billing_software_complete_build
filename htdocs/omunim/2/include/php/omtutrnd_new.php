<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtutrnd_new.php
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
//CHANGES IN FILE @AUTHOR: SANDY27JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
include 'ommpfndv.php';


require_once 'system/omssopin.php';

// GET FIRM ID
$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
} else if (isset($_POST['firmId'])) {
    $selFirmId = $_POST['firmId'];
}
//if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
//    //if not selected assign session firm @AUTHOR: SANDY10JUL13
//    $selFirmId = $_SESSION['setFirmSession'];
//}
////    echo '$selFirmId:' . $_SESSION['setFirmSession'];
//if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
//    parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
//    $selFirmId = $firm_id;
//}
$subPanelName = $_REQUEST['subPanelName'];
$firmIdSelected = $selFirmId;
$sessionOwnerId = $_SESSION[sessionOwnerId];
$transactionId = $_GET['transId'];
$preVch = $_GET['preVch'];
$firmVch = $_GET['firmVch'];
$postVch = $_GET['postVch'];

$transMainId = $_GET['transId']; //@AUTHOR: SANDY25JAN14
if ($transMainId == '' || $transMainId == NULL)
    $transMainId = $_POST['transId'];

// GET TRANS ACCOUNT ID 
$transDrMainAccountId = $_POST['transMainDrAccountId'];
$transCrMainAccountId = $_POST['transMainCrAccountId'];

//echo '$transMainId:' . $transMainId;
if ($transMainId == '' || $transMainId == NULL) { //ADD CONDITION @AUTHOR: SANDY25JAN14 
    $qSelVoucherNoDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_pre_vch_id='$preVch' and transaction_pre_vch_firm_id='$firmVch' and transaction_post_vch_id='$postVch'";
} else {
    $qSelVoucherNoDetails = "SELECT * FROM transaction where transaction_own_id='$sessionOwnerId' and transaction_id='$transMainId'";
}
$resVoucherNoDetails = mysqli_query($conn, $qSelVoucherNoDetails) or die(mysqli_error($conn));
$rowVoucherNoDetails = mysqli_fetch_array($resVoucherNoDetails);
$transId = $rowVoucherNoDetails['transaction_id'];
$transaction_user_id = $rowVoucherNoDetails['transaction_user_id'];
if ($subPanelName == '' && $transaction_user_id != '' & $transaction_user_id != NULL) {
    $subPanelName = 'updateWithUserId';
}

$panelName = 'updateTransaction';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//echo '$staffId'.$staffId;
?>

<table border="0" cellspacing="2" cellpadding="0" width="100%">
    <tr>
        <td align="center">
            <div id="addUpdateTransactionDiv">
                <table border="0" cellspacing="2" cellpadding="0" width="100%">
                    <tr>
                        <td colspan="6">
                            <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="Space Image" 
                                 onload="javascript:document.getElementById('transFirmId').focus();calcTotTransAmount();"/>
                            <input type="hidden" id="transId" name="transId" value="<?php echo $transId; ?>" />
                            <input type="hidden" id="subPanelName" name="subPanelName" value="<?php echo $subPanelName; ?>" />
                            <table border="0" cellspacing="2" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrownBold15" >
                                        FIRM
                                    </td>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrownBold15" >
                                        TO&nbsp;&nbsp;(DR+)
                                    </td>
                                    <td  align="center" valign="middle" class="textLabel12CalibriBrownBold15" >
                                        FROM&nbsp;&nbsp;(CR-)
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" >
                                        <div id="selectFirmDiv" class="selectStyledBorderLess backFFFFFF floatLeft">
                                            <?php
                                            $prevFieldId = 'DOBYear';
                                            $nextFieldId = 'transToMainAcc';
                                            $firmIdName = 'transFirmId';
                                            $firmDivClass = 'textLabel14CalibriReq';
                                            if (!$firmIdSelected) {
                                                $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
                                            }
                                            if (!$firmIdSelected) {
                                                $firmIdSelected = $_SESSION['setFirmSession'];
                                            }
                                            include 'omffrafr.php';
                                            ?>                                                                
                                        </div>
                                    </td>
                                    <td align="left" class="textBoxCurve1px backFFFFFF" >
                                        <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                            <?php
                                            $prevFieldId = 'transFirmId';
                                            $nextFieldId = 'transFromMainAcc';
                                            $allAccountDivId = 'transToMainAcc';
                                            if ($transDrMainAccountId != '') {
                                                $accIdSelected = $transDrMainAccountId;
                                            } else {
                                                $accIdSelected = $rowVoucherNoDetails['transaction_to_dr_acc_id'];
                                            }
                                            $accNameSelected = '';
                                            $allAccountDivClass = 'textLabel14CalibriReq';
                                            $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
//                                            $panelName = 'updateTransaction';
                                            include 'omacpalt.php';
                                            ?>
                                        </div>
                                    </td>
                                    <td align="left" class="textBoxCurve1px backFFFFFF" >
                                        <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                            <?php
                                            $prevFieldId = 'transToMainAcc';
                                            $nextFieldId = 'transToAcc1';
                                            $allAccountDivId = 'transFromMainAcc';
                                            if ($transCrMainAccountId != '') {
                                                $accIdSelected = $transCrMainAccountId;
                                            } else {
                                                $accIdSelected = $rowVoucherNoDetails['transaction_from_cr_acc_id'];
                                            }
                                            $accNameSelected = '';
                                            $allAccountDivClass = 'textLabel14CalibriReq';
                                            $firmIdSelected = $rowVoucherNoDetails['transaction_firm_id'];
//                                            $panelName = 'updateTransaction';
                                            include 'omacpalt.php';
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr> 
                                    <td width="23%" align="center" valign="middle" class="textLabel12CalibriBrownBold15 green-text">
                                        TO&nbsp;&nbsp;(DR+)
                                    </td>
                                    <td width="25%" align="center" valign="middle" class="textLabel12CalibriBrownBold15">
                                        AMOUNT
                                    </td>
                                    <td width="23%" align="center" valign="middle" class="textLabel12CalibriBrownBold15 red-text">
                                        FROM&nbsp;&nbsp;(CR-)
                                    </td>
                                    <td width="25%" align="center" valign="middle" class="textLabel12CalibriBrownBold15">
                                        AMOUNT
                                    </td>
                                    <td width="2%" class="padLeft3">
                                    </td>
                                    <td width="2%" class="padLeft3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="6" width="100%">
                                        <?php include 'omTransUpdSubDiv.php'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="textBoxCurve1px backFFFFFF" colspan="4" width="80%" style="padding-left: 4px">
                                        <input id="transSub"
                                               name="transSub" spellcheck="false" type="text" placeholder="TRANSACTION SUBJECT" value="<?php echo $rowVoucherNoDetails['transaction_sub']; ?>"
                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           document.getElementById('DOBDay').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                               <?php if ($noOfTransactionsAftSecondTrans > 0) { ?>
                                                               document.getElementById('transAmtCr<?php echo $transactionEntryCount; ?>').focus();
                                               <?php } else { ?>
                                                               document.getElementById('transAmtCr2').focus();
                                               <?php } ?>
                                                           return false;
                                                       }"
                                               spellcheck="false" class="border-no inputBox14CalibriReq" style="text-align: left;padding-left: 10px;" size="107" maxlength="110" />
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
                                                        <input id="txtEditorContent" name="txtEditorContent" type="hidden" value="<?php echo urlencode($rowVoucherNoDetails['transaction_desc']); ?>" />
                                                        <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" onload="document.forms['txtEditorContentForm'].submit();" />
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                        <td align="left" valign="top" width="20%">
                            <table align="left" border="0" cellspacing="2" cellpadding="2" class="spaceLeftRight10">
                                <?php if ($staffId == '' || ($staffId && $array['currentTransactionAccess'] == 'true')) {
                                    ?>
                                    <tr>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrownBold15" width="190px">
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
                                                $date_nepali = $rowVoucherNoDetails['transaction_other_lang_DOB'];
                                                include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                            } else {
                                                ?>
                                                <table  border="0" cellspacing="0" cellpadding="0" >
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $selDOBDay = substr($rowVoucherNoDetails['transaction_DOB'], 0, 2);
                                                            $selDOBMnth = substr($rowVoucherNoDetails['transaction_DOB'], 3, -5);
                                                            $selDOBYear = substr($rowVoucherNoDetails['transaction_DOB'], -4);

                                                            $todayDay = $selDOBDay - 1;
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
                                                                                        document.getElementById('transSub').focus();
                                                                                        return false;
                                                                                    }"
                                                                        class="textLabel14CalibriGrey">
                                                                    <option value="NotSelected">DAY</option>
                                                                    <?php
                                                                    for ($dd = 0; $dd <= 30; $dd++) {
                                                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                    }
                                                                    ?>
                                                                </select> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <!-- *************** Start Code for Month *************** -->
                                                            <?php
                                                            $todayMM = date('m', strtotime($selDOBMnth)) - 1;
                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                            $optMonth[$todayMM] = "selected";
                                                            ?>
                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                <select id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('DOBYear').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('DOBDay').focus();
                                                                                        return false;
                                                                                    }">                                                
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
                                                        <td>
                                                            <!-- *************** Start Code for Year *************** -->
                                                            <?php
                                                            if ($todayYear == '') {
                                                                $todayYear = date(Y);
                                                            }
                                                            $optYear[$selDOBYear] = "selected";
                                                            ?> 
                                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                <select id="DOBYear" name="DOBYear" 
                                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('transPreVoucherNo').focus();
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('DOBMonth').focus();
                                                                                        return false;
                                                                                    }"
                                                                        class="textLabel14CalibriGrey">
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
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?> 

                                <tr>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrownBold15">
                                        VOUCHER NO
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" width="50px">
                                        <div id="transVoucherNoDiv">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <!---Start to change @AUTHOR: SANDY27JAN14-------------->
                                                    <td>
                                                        <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $rowVoucherNoDetails['transaction_pre_vch_id']; ?>"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('transPostVoucherNo').focus();
                                                                           return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('DOBYear').focus();
                                                                           return false;
                                                                       }"
                                                               spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" /> 
                                                        <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" value="<?php echo $rowVoucherNoDetails['transaction_pre_vch_firm_id']; ?>"
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
                                                        <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="VOUCHER NO" value="<?php echo $rowVoucherNoDetails['transaction_post_vch_id']; ?>"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('transactionCategory').focus();
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
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrownBold15">
                                        TYPE
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left"  width="40px" class="textBoxCurve1px backFFFFFF">
                                        <div class="selectStyledBorderLess backFFFFFF floatLeft">
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
                                            <SELECT class="textLabel14CalibriReq" id="transactionCategory" name="transactionCategory"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('transSubButt').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('transPostVoucherNo').focus();
                                                                return false;
                                                            }"
                                                    spellcheck="false">
                                                <OPTION value="Business" <?php echo $option1; ?>>BUSINESS TRANSACTION</OPTION>
                                                <OPTION value="Personal" <?php echo $option2; ?>>PERSONAL TRANSACTION</OPTION>
                                                <OPTION value="Other" <?php echo $option3; ?>>OTHER TRANSACTION</OPTION>
                                            </SELECT>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 15px">
                                        <?php // print_r($array); ?>
                                        <?php
                                        if ($staffId == '' || (($staffId && $array['updateTransactionAccess'] == 'true') && ($staffId != '' && $array['updateTransactionForAllPanel'] == 'true'))) {
                                            ?>
                                            <button class="btn-submit" id="transSubButt" type="submit"  
                                                    onkeydown="if (event.keyCode == 13) {
                                                                    document.getElementById('deleteTransactionButt').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('transactionCategory').focus();
                                                                    return false;
                                                                }"
                                                    onclick="javascript:updateTransactionNew(document.getElementById('update_transaction'));"
                                                    maxlength="30" size="15" >
                                                <span>UPDATE</span>
                                            </button>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 15px">
                                        <?php if ($staffId == '' || (($staffId && $array['deleteTransactionAccess'] == 'true') && ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true'))) {
                                            ?>
                                            <button class="btn-submit" id="deleteTransactionButt" type="submit"  style="background-color:#EDD8D5;color: #b20f0f;"
                                                    onkeydown="if (event.keyCode == 8) {
                                                                    document.getElementById('transSubButt').focus();
                                                                    return false;
                                                                }"
                                                    onclick="javascript:deleteTransaction('<?php echo $transactionCat; ?>',<?php echo $transId; ?>,
                                                                        '<?php echo $rowVoucherNoDetails['transaction_jrnl_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_pre_vch_id'] . $rowVoucherNoDetails['transaction_post_vch_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_amt']; ?>',
                                                                        '<?php echo $rowVoucherNoDetails['transaction_DOB']; ?>', '<?php echo $rowVoucherNoDetails['transaction_firm_id']; ?>', '<?php echo $rowVoucherNoDetails['transaction_sub']; ?>', 'NEW_TRANS_PANEL');"
                                                    maxlength="30" size="15" >
                                                <span>DELETE</span>
                                            </button>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <div id="ajaxLoadNavigateTransactionList" style="visibility: hidden">
                <?php include 'omzaajld.php'; ?>
            </div>
        </td>
    </tr>
</table>

