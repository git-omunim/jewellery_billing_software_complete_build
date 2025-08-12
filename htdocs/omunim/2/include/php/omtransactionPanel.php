<?php /*
 * Created on JAN 29, 2018 03:30:06 PM
 *
 * @FileName: omtransactionPanel.php
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
 */ ?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$sessionOwnerId = $_SESSION[sessionOwnerId];
$panelName = $_GET['panelName'];
$utinId = $_GET['utinId'];
/* Start to get Firm ID to get accounts according to it */
$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
    $todayDay = $_GET['day'];
    $todayDay = $todayDay - 1;
    $todayMM = date("m", strtotime($_GET['month'])) - 1;
    $todayYear = $_GET['year'];
} else {
    $selFirmId = $_SESSION['setFirmSession'];
}
//echo $selFirmId."---";
?>
<?php
if ($panelName == 'TransactionPaymentUpdate') {

    $selectEntry = "SELECT * FROM user_transaction_invoice "
            . "WHERE utin_transaction_type IN ('Transaction') "
            . "and utin_type IN ('TransEntry') "
            . "and utin_id = '$utinId'";

    $allResult = mysqli_query($conn, $selectEntry) or die("selectEntry :" . $selectEntry . mysqli_error($conn));
    $entryCount = mysqli_num_rows($allResult); // All ENTRY COUNT
    $entryRow = mysqli_fetch_array($allResult);

    $utinId = $entryRow['utin_id'];
    $selFirmId = $entryRow['utin_firm_id'];
    $utin_transaction_type = $entryRow['utin_transaction_type'];
    $transactionType = $entryRow['utin_history'];
    $amount = $entryRow['utin_total_amt'];
    $transactionCRDR = $entryRow['utin_CRDR'];
    $partyName = $entryRow['utin_user_name'];
    $description = $entryRow['utin_other_info'];
    $preVchNo = $entryRow['utin_pre_invoice_no'];
    $postVchNo = $entryRow['utin_invoice_no'];
    $acc_dr_id = $entryRow['utin_dr_acc_id'];
    $utin_cr_acc_id = $entryRow['utin_cr_acc_id'];
    $payAddDate = $entryRow['utin_date'];
    //Date
    $selDOBDay = substr($payAddDate, 0, 2);
    $selDOBMnth = substr($payAddDate, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($payAddDate, -4);
} else {
    $panelName = 'transactionPayment';

    $selDOBDay = date(j);
    $todayMM = date(n) - 1;
    $selDOBYear = date(Y);
    //Auto Increment Firm Id
    $qSelVoucherNo = "SELECT max(utin_invoice_no) as transVoucherId "
            . "FROM user_transaction_invoice "
            . "where utin_owner_id='$sessionOwnerId' "
            . "and utin_firm_id IN ('$selFirmId')"
            . "AND utin_type IN ('Transaction') "
            . "AND utin_transaction_type IN ('TransactionPayment')";
//    echo $qSelVoucherNo;
    $resVoucherNo = mysqli_query($conn, $qSelVoucherNo);
    $rowVoucherNo = mysqli_fetch_array($resVoucherNo, MYSQLI_ASSOC);

    $postVchNo = $rowVoucherNo['transVoucherId'] + 1;
    //echo $postVchNo."---";     
}
?>
<!----------------------------------------------------------------------------------------------------------------------->
<div id="changeTransactionPanel">
    <form name="sell_purchase" id="sell_purchase" enctype="multipart/form-data" method="post" action="include/php/omadtranspnl.php">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <input type="hidden" id="utinId" name="utinId" value="<?php echo $utinId; ?>" />
                    <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>" />
                    <div id="addUpdateTransactionDiv">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td align="left">
                                    <table align="left" border="0" cellspacing="2" cellpadding="2" class="spaceLeftRight10">
                                        <tr>
                                            <td colspan="6">
                                                <table  border="0" cellspacing="2" cellpadding="2">
                                                    <tr>
                                                        <td></td>
                                                        <td align="center" valign="middle" class="textLabel12CalibriBrown" width="190px">
                                                            DATE
                                                        </td>
                                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                            FIRM
                                                        </td>
                                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                            VOUCHER NO
                                                        </td>
                                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                            PARTY NAME
                                                        </td>
                                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                            TYPE
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="32px;"></td>
                                                        <td class="textBoxCurve1px backFFFFFF margin2pxAll" width="190px">
                                                            <table  border="0" cellspacing="0" cellpadding="0" >
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        $todayDay = $selDOBDay - 1;

                                                                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                        $optDay[$todayDay] = "selected";
                                                                        ?>
                                                                        <div style="margin-left: 25px;" class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                            <select class="textLabel14CalibriGrey" autofocus id="DOBDay" name="DOBDay" 
                                                                                    onkeydown="javascript: if (event.keyCode === 13) {
                                                                                                document.getElementById('DOBMonth').focus();
                                                                                                return false;
                                                                                            }">
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
                                                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                                        $optMonth[$todayMM] = "selected";
                                                                        ?>
                                                                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />
                                                                        <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                            <select id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey" 
                                                                                    onkeydown="javascript: if (event.keyCode === 13) {
                                                                                                document.getElementById('DOBYear').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode === 8) {
                                                                                                document.getElementById('DOBDay').focus();
                                                                                                return false;
                                                                                            }
                                                                                            //START CODE TO GET MONTH FROM KEYS
                                                                                            var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                                                            gbMonth = document.getElementById('gbMonthId').value;
                                                                                            if (gbMonth === 1) {
                                                                                                if (event.keyCode) {
                                                                                                    var sel = String.fromCharCode(event.keyCode);
                                                                                                    if (sel === 0) {
                                                                                                        this.value = arrMonths[9];
                                                                                                    } else if (sel === 1) {
                                                                                                        this.value = arrMonths[10];
                                                                                                    } else if (sel === 2) {
                                                                                                        this.value = arrMonths[11];
                                                                                                    }
                                                                                                    document.getElementById('gbMonthId').value = 0;
                                                                                                }
                                                                                            } else if (event.keyCode) {
                                                                                                var sel = String.fromCharCode(event.keyCode) - 1;
                                                                                                this.value = arrMonths[sel];
                                                                                                if (event.keyCode === 49) {
                                                                                                    document.getElementById('gbMonthId').value = 1;
                                                                                                }
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
                                                                        $todayYear = date(Y);
                                                                        $optYear[$selDOBYear] = "selected";
                                                                        ?>
                                                                        <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                            <select class="textLabel14CalibriGrey" id="DOBYear" name="DOBYear" 
                                                                                    onkeydown="javascript: if (event.keyCode === 13) {
                                                                                                document.getElementById('transFirmId').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode === 8) {
                                                                                                document.getElementById('DOBMonth').focus();
                                                                                                return false;
                                                                                            }">
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
                                                        <!--<td width="120px"></td>-->
                                                        <!--------------------Select Firm--------------------->
                                                        <td align="center"  width="183px" class="textBoxCurve1px backFFFFFF margin1pxAll">
                                                            <div style="margin-left: 45px;" id="selectFirmDiv" class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                <?php
                                                                $prevFieldId = 'DOBYear';
                                                                $nextFieldId = 'transPreVoucherNo';
                                                                $nextReqFieldId = 'transAmt';
                                                                $firmIdName = 'utin_firm_id';
                                                                $firmDivClass = 'textLabel14CalibriReq';
                                                                $panelName = $panelName;
                                                                $firmIdSelected = $selFirmId;
                                                                //to assign default firm id
                                                                if (!$firmIdSelected) {
                                                                    $firmIdSelected = $_SESSION['setFirmSession'];
                                                                }
                                                                include 'omffrafr.php';
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <!--<td width="120px"></td>-->
                                                        <!--------------------------Select Voucher---------------------------->
                                                        <td align="left" class="textBoxCurve1px backFFFFFF margin1pxAll" width="120px">
                                                            <div id="transVoucherNoDiv">
                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td>
                                                                            <input id="transPreVoucherNo" name="transPreVoucherNo" type="text" placeholder="VCH" value="<?php echo $preVchNo; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode === 13) {
                                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                                               return false;
                                                                                           } else if (event.keyCode === 8 && this.value === '') {
                                                                                               document.getElementById('transFirmId').focus();
                                                                                               return false;
                                                                                           }" spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" />

                                                                            <input id="transFirmVoucherNo" name="transFirmVoucherNo" type="hidden" readonly="true" value="<?php echo $firmId; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                               document.getElementById('transPostVoucherNo').focus();
                                                                                               return false;
                                                                                           }
                                                                                           else if (event.keyCode == 8 && this.value == '') {
                                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                                               return false;
                                                                                           }" spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="4" maxlength="3" />
                                                                        </td>
                                                                        <td align="left"  class="textLabel14CalibriReq">
                                                                            &minus;
                                                                        </td>
                                                                        <td>
                                                                            <input id="transPostVoucherNo" name="transPostVoucherNo" type="text" placeholder="Voucher No" value="<?php echo $postVchNo; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode === 13) {
                                                                                               document.getElementById('transactionCategory').focus();
                                                                                               return false;
                                                                                           } else if (event.keyCode === 8 && this.value === '') {
                                                                                               document.getElementById('transPreVoucherNo').focus();
                                                                                               return false;
                                                                                           }" spellcheck="false" class="border-no inputBox14CalibriReqCenter  backFFFFFF" size="5" maxlength="16" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                        <td align="left"  width="230px" class="textBoxCurve1px backFFFFFF">
                                                            <input id="partyName" name="utin_user_name" type="text" placeholder="Party Name" value="<?php echo $partyName; ?>" required style="width: 100%; text-align: center; border: none;"
                                                                onkeydown="javascript: if (event.keyCode === 13) {
                                                                    document.getElementById('description').focus();
                                                                    return false;
                                                                } else if (event.keyCode === 8 && this.value === '') {
                                                                    document.getElementById('transToAcc').focus();
                                                                    return false;
                                                                }"/>
                                                        </td>
                                                        <!-----------------------------Select Transaction Type----------------------------->
                                                        <td align="left"  width="240px" class="textBoxCurve1px backFFFFFF">
                                                            <div style="text-align: center; width: 100%;" class="selectStyledBorderLess backFFFFFF floatLeft">
                                                                <SELECT class="textLabel14CalibriReq" id="transactionCategory" name="utin_history" 
                                                                        onkeydown="javascript: if (event.keyCode === 13) {
                                                                                    document.getElementById('utin_CRDR').focus();
                                                                                    return false;
                                                                                } else if (event.keyCode === 8) {
                                                                                    document.getElementById('transPostVoucherNo').focus();
                                                                                    return false;
                                                                                }" spellcheck="false">
                                                                            <?php
                                                                            if ($panelName == 'TransactionPaymentUpdate') {
                                                                                $transType = array(Business, Personal, Other);
                                                                                for ($i = 0; $i <= 2; $i++)
                                                                                    if ($transType[$i] == $transactionType)
                                                                                        $transTypeOption[$i] = 'selected';
                                                                            } else {
                                                                                $transTypeOption[0] = 'selected';
                                                                            }
                                                                            ?>
                                                                    <OPTION value="Business" <?php echo $transTypeOption[0]; ?> > Business Transaction</OPTION>
                                                                    <OPTION value="Personal" <?php echo $transTypeOption[1]; ?> >Personal Transaction</OPTION>
                                                                    <OPTION value="Other" <?php echo $transTypeOption[2]; ?> >Other Transaction</OPTION>
                                                                </SELECT>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
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
        <table style="margin-top: 15px;" border="0" align="center" cellpadding="2" cellspacing="2" width="100%">
            <tr>
                <td></td>
                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                    DR/CR
                </td>
                <!--<td></td>-->
                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                    ACCOUNT NAME
                </td>
                <!--<td></td>-->
                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                    DESCRIPTION
                </td>
                <!--<td></td>-->
                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                    AMOUNT
                </td>
            </tr>
            <tr>
                <td width="18px"></td>
                <td align="left"  width="80px" class="textBoxCurve1px backFFFFFF">
                    <div style="text-align: center; width: 100%;" class="selectStyledBorderLess backFFFFFF floatLeft">
                        <SELECT disabled="true" id="utin_CRDR" class="textLabel14CalibriReq" name="utin_CRDR" spellcheck="false"
                                onkeydown="javascript: if (event.keyCode === 13) {
                                            document.getElementById('transToAcc').focus();
                                            return false;
                                        } else if (event.keyCode === 8) {
                                            document.getElementById('transactionCategory').focus();
                                            return false;
                                        }">
                                    <?php
                                    if ($panelName == 'TransactionPaymentUpdate') {
                                        $transCRDR = array(DR, CR);
                                        for ($i = 0; $i < 2; $i++)
                                            if ($transCRDR[$i] == $transactionCRDR)
                                                $transCRDROption[$i] = 'selected';
                                    } else {
                                        $transCRDROption[0] = 'selected';
                                    }
                                    ?>
                            <OPTION value="DR" <?php echo $transCRDROption[0]; ?> >DR</OPTION>
                            <OPTION value="CR" <?php echo $transCRDROption[1]; ?> >CR</OPTION>
                        </SELECT>
                    </div>
                </td>
                <!--<td width="10px"></td>-->
                <td align="center"  width="75px" class="textBoxCurve1px backFFFFFF">
                    <div style="margin-left: 30px;" class="selectStyledBorderLess backFFFFFF floatLeft">
                        <?php
                        $prevFieldId = 'utin_CRDR';
                        $nextFieldId = 'partyName';
                        $allAccountDivId = 'transToAcc';
                        $accIdSelected = $acc_dr_id;
                        $accNameSelected = '';
                        $allAccountDivClass = 'textLabel14CalibriReq';
                        $firmIdSelected = $selFirmId;
                        include 'omacpalt.php';
                        ?>
                    </div>
                </td>
                <!--<td width="10px"></td>-->
                <!---<td align="left"  width="100px" class="textBoxCurve1px backFFFFFF">
                    <input id="partyName" name="utin_user_name" type="text" placeholder="Party Name" value="<?php echo $partyName; ?>" required style="width: 100%; text-align: center; border: none;"
                        onkeydown="javascript: if (event.keyCode === 13) {
                            document.getElementById('description').focus();
                            return false;
                        } else if (event.keyCode === 8 && this.value === '') {
                            document.getElementById('transToAcc').focus();
                            return false;
                        }"/>
                </td>
                <!--<td width="10px"></td>-->
                <td align="left"  width="150px" class="textBoxCurve1px backFFFFFF">
                    <input id="description" name="utin_other_info" type="text" placeholder="Description" value="<?php echo $description; ?>" required style="width: 100%; text-align: center; border: none;"
                           onkeydown="javascript: if (event.keyCode === 13) {
                                       document.getElementById('amount').focus();
                                       return false;
                                   } else if (event.keyCode === 8 && this.value === '') {
                                       document.getElementById('partyName').focus();
                                       return false;
                                   }"/>
                </td>
                <!--<td width="10px"></td>-->
                <td align="left"  width="100px" class="textBoxCurve1px backFFFFFF">
                    <input id="amount" name="utin_total_amt" type="text" placeholder="Amount" value="<?php echo $amount; ?>" required style="width: 100%; text-align: center; border: none;"
                           onkeydown="javascript: if (event.keyCode === 13) {
                                       document.getElementById('transSubButt').focus();
                                       return false;
                                   } else if (event.keyCode === 8 && this.value === '') {
                                       document.getElementById('description').focus();
                                       return false;
                                   }"/>
                </td>
                <td width="20px"></td>
            </tr>
        </table>
        <?php if ($panelName == 'TransactionPaymentUpdate') { ?>
            <div style="margin-top: 30px;">
                <button style="background-color: #59B525; color: #ffffff; font-weight: 500; border-radius: 2px !important; padding: 5px;" class="btn">
                    UPDATE
                </button>
            </div>
        <?php } else { ?>
            <div style="margin-top: 30px; margin-right: 30px; text-align: right;">
                <button style="background-color: #59B525; color: #ffffff; width: 100px; font-weight: 500; border-radius: 2px !important; padding: 5px;"id="transSubButt" type="submit" value="SUBMIT" class="btn"
                        onkeydown="if (event.keyCode === 8) {
                                        document.getElementById('transSub').focus();
                                        return false;
                                    }">Submit
                </button>
            </div>
        <?php } ?>
        <hr style="margin-top: 30px;" color="#FD9A00" size="0.1px" />
    </form>
    <div id="ajaxLoadNavigateTransactionList" style="visibility: hidden">
        <?php include 'omzaajld.php'; ?>
    </div>
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="center" colspan="16">
                <div id="showInvoice_div">
                    <?php include 'omtraninvdv.php'; ?>
                </div>
            </td>
        </tr>
    </table>
</div>