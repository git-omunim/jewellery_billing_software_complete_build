<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormllndl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
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
 */
?>
<?php
//CHANGE IN FILE @AUTHOR: SANDY31JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY31JAN14
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$loanId = $_GET['loanId'];
$mlId = $_GET['mlId'];
if ($loanId == '') {
    $loanId = $_POST['loanId'];
    $mlId = $_POST['mlId'];
}
?>
<div>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left" width="30px">
                            <div class="spaceLeft10 paddingTop2">
                                <img src="<?php echo $documentRoot; ?>/images/orange16.png" width="16px" height="16px">
                            </div>
                        </td>
                        <td align="left">
                            <div class="spaceLeft5">
                                <div class="main_link_orange_normal16">DELETE LOAN DETAILS <?php echo $deleteLoanPanel; ?></div><!--USE MSG VARIABLE @AUTHOR: SANDY31JAN14--->
                            </div>
                            <div id="display_girvi_barcode_slip" class="display-girvi-barcode-slip"></div>
                        </td>
                        <td align="right">
                            <input type="submit" id="loanDetailButt" name="loanDetailButt" value="LOAN DETAILS" 
                                   onclick="getLoanDetails('<?php echo $mlId; ?>','<?php echo $loanId; ?>','LoanDetailPanel');" class="frm-btn" /> 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" align="left"  class="border-top">
        </tr>
    </table>
    <?php
    $qSelAllGirvi = "SELECT * FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id='$loanId'";
    $resAllGirvi = mysqli_query($conn,$qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
    $rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC);
    $firmLoanNo = $rowAllGirvi['ml_firm_mli_no'];
    $firm = $rowAllGirvi['ml_firm_id'];
    $mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
    $princAmount = $rowAllGirvi['ml_prin_amt'];
    $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$firm' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    $resSelFirmName = mysqli_query($conn,$selFirmName);
    $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
    $firmName = $rowSelFirmName['firm_name'];
    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $ROI = $rowAllGirvi['ml_IROI'];
    } else {
        $ROI = $rowAllGirvi['ml_ROI'];
    }
    $mlTrType = $rowAllGirvi['ml_ln_cr_dr'];
    $selInerestType = $rowAllGirvi['ml_ROI_typ'];
    $girviDOB = $rowAllGirvi['ml_DOB'];
    $girviNewDOB = $rowAllGirvi['ml_new_DOB'];
    $girviNewDOB = date("d M Y", strtotime($girviNewDOB));
    $girviDOR = $rowAllGirvi['ml_DOR'];
    $mlId = $rowAllGirvi['ml_lender_id'];
    $girviType = $rowAllGirvi['ml_type'];
    $mlLnNo = $rowAllGirvi['ml_cust_mli_num'];
    $preSerialNum = $rowAllGirvi['ml_pre_serial_num'];
    $serialNum = $rowAllGirvi['ml_serial_num'];
    $girviIntOpt = $rowAllGirvi['ml_int_opt'];
    $girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];
    $loanOtherInfo = $rowAllGirvi['ml_comm'];
    $girviUpdSts = $rowAllGirvi['ml_upd_sts'];
    $girviId = $loanId;
    $omPanelDiv = 'mlLoanInfo';
    $gMonthIntOption = $rowAllGirvi['ml_monthly_intopt']; //@AUTHOR: SANDY21JAN14
    include 'ormllndd.php';
    ?>
</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
    <tr>
        <td align="left"><hr color="#B8860B" size="0.1px" /></td>
    </tr>
    <tr>
        <td align="center">
            <div id="girviDeleteImageDiv">
                <a style="cursor: pointer;" onclick="javascript:deleteLoan('<?php echo $loanId; ?>','<?php echo $mlId; ?>','<?php echo $preSerialNum . $serialNum; ?>',
                            '<?php echo om_strtoupper(date("d M Y", strtotime($girviNewDOB))); ?>','<?php echo $firm; ?>','<?php echo $princAmount; ?>');">
                    <img src="<?php echo $documentRoot; ?>/images/deleteButt32.png" alt='Permanent Delete Girvi' title='Permanent Delete Girvi'
                         width="30px" height="32px" /> 
                </a> 
            </div>
        </td>
    </tr>
</table>
