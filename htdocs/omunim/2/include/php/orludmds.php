<?php
/*
 * **************************************************************************************
 * @tutorial: Loan Deposit Deposit Int with Discount
 * **************************************************************************************
 *
 * Created on Jun 15, 2013 5:51:13 PM
 *
 * @FileName: orgudmds.php
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

$depPrinInterest = 0;
//Get all the data
$loanOwnerId = $_SESSION['sessionOwnerId'];
$lenderId = trim($_POST['lenderId']);
$loanId = trim($_POST['loanId']);
$loanDepositPrinAmount = trim($_POST['loanDepositPrinAmount']);
$loanDepositIntAmount = trim($_POST['loanDepositIntAmount']);
$ROIValue = trim($_POST['ROIValue']);
$intType = trim($_POST['intType']);
$mainPrincipalAmount = trim($_POST['totalPrincipalAmount']);
$mainInterestAmount = trim($_POST['totalInterestAmount']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
$loanIntAdjustmentCheck = trim($_POST['loanIntAdjustmentCheck']);
$loanNewDateForUpdate = trim($_POST['loanNewDateForUpdate']);
$loanTimePeriodVar = trim($_POST['loanTimePeriodVar']);
$loanDepositMonOpt = trim($_POST['loanDepositMonOpt']);
/* Start Code to get ROI Value
  $qSelROI = "SELECT roi_value,iroi_value FROM roi where roi_id='$ROIValue'";
  $resROI = mysqli_query($conn,$qSelROI);
  $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
  if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
  $ROIValue = $rowROI['iroi_value'];
  } else {
  $ROIValue = $rowROI['roi_value'];
  }COMMENT BY @AUTHOR: SANDY21JAN14 */
// Start To protect MySQL injection
$loanDepositPrinAmount = stripslashes($loanDepositPrinAmount);
$loanDepositIntAmount = stripslashes($loanDepositIntAmount);
$ROIValue = stripslashes($ROIValue);
$intType = stripslashes($intType);
$mainPrincipalAmount = stripslashes($mainPrincipalAmount);
$mainInterestAmount = stripslashes($mainInterestAmount);
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);

$loanDepositPrinAmount = mysqli_real_escape_string($conn,$loanDepositPrinAmount);
$loanDepositIntAmount = mysqli_real_escape_string($conn,$loanDepositIntAmount);
$ROIValue = mysqli_real_escape_string($conn,$ROIValue);
$intType = mysqli_real_escape_string($conn,$intType);
$mainPrincipalAmount = mysqli_real_escape_string($conn,$mainPrincipalAmount);
$mainInterestAmount = mysqli_real_escape_string($conn,$mainInterestAmount);
$DOBDay = mysqli_real_escape_string($conn,$DOBDay);
$DOBMonth = mysqli_real_escape_string($conn,$DOBMonth);
$DOBYear = mysqli_real_escape_string($conn,$DOBYear);
// End To protect MySQL injection

if ($loanDepositPrinAmount == '' || $loanDepositPrinAmount == NULL) {
    $loanDepositPrinAmount = 0;
}

if ($loanIntAdjustmentCheck == 'True') {
    $mainInterestAmount = $loanDepositIntAmount;
}
/* * *****Start Code To Add 0 if Interest is '' @Author:PRIYA29AUG13****** */
if ($mainInterestAmount == '' || $mainInterestAmount == NULL) {
    $mainInterestAmount = 0;
}if ($loanDepositIntAmount == '' || $loanDepositIntAmount == NULL) {
    $loanDepositIntAmount = 0;
}
/* * *****End Code To Add 0 if Interest is '' @Author:PRIYA29AUG13****** */
$loanDepositDate = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;

// Start Code to Calculate interest for deposit amount
$ROI = $ROIValue;
$princAmount = $loanDepositPrinAmount;
$ROIType = $intType;
$girviNewDOB = $loanNewDateForUpdate;
$girviDOR = $loanDepositDate;
include 'ommpgvip.php';
//Output - $totalFinalInterest
$depPrinInterest = $totalFinalInterest;
// End Code to Calculate interest for deposit amount

$totalAmtCalculated = $mainPrincipalAmount + $mainInterestAmount;
$totalAmtCalculated = number_format($totalAmtCalculated, 2, '.', '');
$totalAmountDep = $loanDepositPrinAmount + $loanDepositIntAmount;
$totalAmountLeft = $totalAmountDep - $depPrinInterest;
$totalAmountLeft = number_format($totalAmountLeft, 2, '.', '');
$newPrincipalAmount = $mainPrincipalAmount - $loanDepositPrinAmount;
$totalAmountDep = number_format($totalAmountDep, 2, '.', '');
$mainInterestAmount = number_format($mainInterestAmount, 2, '.', '');
$newPrincipalAmount = number_format($newPrincipalAmount, 2, '.', '');
$newGirviDate = date("d M Y", strtotime($loanDepositDate) + 86400);
$loanDepositDate = om_strtoupper(date("d M Y", strtotime($loanDepositDate)));
$loanNewDateForUpdate = om_strtoupper(date("d M Y", strtotime($loanNewDateForUpdate)));
$depDiscountAmt = $depPrinInterest - $loanDepositIntAmount;
if ($depDiscountAmt < 0) {
    $depDiscountAmt = 0;
}
$depPrinInterest = number_format($depPrinInterest, 2, '.', '');
$loanDepositPrinAmount = number_format($loanDepositPrinAmount, 2, '.', '');
$loanDepositIntAmount = number_format($loanDepositIntAmount, 2, '.', '');
$depDiscountAmt = number_format($depDiscountAmt, 2, '.', '');

$loanComm = "Total calculated amount&nbsp;(Principal:<font color='blue'>$mainPrincipalAmount</font> &AMP; Int: <font color='blue'>$mainInterestAmount</font>) till date&nbsp;(<font color='blue'>$loanDepositDate</font>):&nbsp;<font color='blue'>$totalAmtCalculated</font><br />";
$loanComm .= "<b>Total deposit amount&nbsp;(Principal:<font color='blue'>$loanDepositPrinAmount</font> &AMP; Int: <font color='blue'>$loanDepositIntAmount</font>) deposit on date&nbsp;(<font color='blue'>$loanDepositDate</font>):&nbsp;<font color='blue'>$totalAmountDep</font></b><br />";
$loanComm .= "Total interest from date&nbsp;<font color='blue'>$loanNewDateForUpdate</font> to <font color='blue'>$loanDepositDate</font>&nbsp;(<font color='blue'>$loanTimePeriodVar</font>):&nbsp;<font color='blue'>$loanDepositPrinAmount</font><br />";
$loanComm .= "Amount left after pay interest&nbsp;(<font color='blue'>$totalAmountDep</font> - <font color='blue'>$loanDepositIntAmount</font>):&nbsp;<font color='blue'>$totalAmountLeft</font><br />";
$loanComm .= "<b>New Principal Amount&nbsp;(<font color='blue'>$mainPrincipalAmount</font> - <font color='blue'>$totalAmountLeft</font>):&nbsp;<font color='blue'>$newPrincipalAmount</font></b><br />";
$loanComm .= "Principal Paid: <font color='blue'>$loanDepositPrinAmount</font> &nbsp;&nbsp;&nbsp;Interest Paid: <font color='blue'>$loanDepositIntAmount</font> &nbsp;&nbsp;&nbsp;Discount: <font color='red'>$depDiscountAmt</font><br />";
$loanComm .= '========================================================================================================================<br />';


// Start To protect MySQL injection
$loanComm = stripslashes($loanComm);
$loanComm = mysqli_real_escape_string($conn,$loanComm);
// End To protect MySQL injection
?>
<div id="depositAmtCalDiv" class="spaceLeft30">
    <table border="0" cellpadding="1" cellspacing="1">
        <tr>
            <td align="right" valign="middle">
                <span class="text_black_Arial_12">Total calculated amount&nbsp;(Principal:<font color='blue'><?php echo $mainPrincipalAmount; ?></font> & Int: <font color='blue'><?php echo $mainInterestAmount; ?></font>) till date&nbsp;(<font color='blue'><?php echo $loanDepositDate; ?></font>):</span>
            </td>
            <td align="right" valign="middle">
                <span class="text_blue_Arial_12">&nbsp;&nbsp;<?php echo $totalAmtCalculated; ?></span>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <span class="text_black_Arial_12">Total deposit amount&nbsp;(Principal:<font color='blue'><?php echo $loanDepositPrinAmount; ?></font> & Int: <font color='blue'><?php echo $loanDepositIntAmount; ?></font>) deposit on date&nbsp;(<font color='blue'><?php echo $loanDepositDate; ?></font>):</span>
            </td>
            <td align="right" valign="middle">
                <span class="text_blue_Arial_12">&nbsp;&nbsp;<?php echo $totalAmountDep; ?></span>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <span class="text_black_Arial_12">Total interest from date&nbsp;<font color='blue'><?php echo $loanNewDateForUpdate; ?></font> to <font color='blue'><?php echo $loanDepositDate; ?></font>&nbsp;(<font color='blue'><?php echo $loanTimePeriodVar; ?></font>):</span>
            </td>
            <td align="right" valign="middle">
                <span class="text_blue_Arial_12">&nbsp;&nbsp;<?php echo $depPrinInterest; ?></span>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <span class="text_black_Arial_12">Amount left after pay interest&nbsp;(<font color='blue'><?php echo $totalAmountDep; ?></font> - <font color='blue'><?php echo $loanDepositIntAmount; ?></font>):</span>
            </td>
            <td align="right" valign="middle">
                <?php
                if ($totalAmountLeft >= 0) {
                    ?>
                    <span class="text_green_Arial_12_bold">&nbsp;&nbsp;
                        <?php echo $loanDepositPrinAmount; ?>
                    </span>
                <?php } else { ?>
                    <span class="text_red_Arial_12_bold">&nbsp;&nbsp;
                        <?php echo $loanDepositPrinAmount; ?>
                    </span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <?php
                if ($totalAmountLeft >= 0) {
                    ?>
                    <span class="text_black_Arial_12_bold">New Principal Amount&nbsp;(<font color='blue'><?php echo $mainPrincipalAmount; ?></font> - <font color='blue'><?php echo $loanDepositPrinAmount; ?></font>):</span>
                <?php } else { ?>
                    <span class="text_black_Arial_12_bold">New Principal Amount&nbsp;(<font color='blue'><?php echo $mainPrincipalAmount; ?></font> + <font color='blue'><?php echo abs($loanDepositPrinAmount); ?></font>):</span>
                <?php } ?>
            </td>
            <td align="right" valign="middle">
                <span class="text_blue_Arial_12_bold">&nbsp;&nbsp;
                    <?php
                    echo $newPrincipalAmount;
                    ?>
                </span>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle" colspan="2">
                <span class="text_black_Arial_12">Principal Paid: <font color='blue'><?php echo $loanDepositPrinAmount; ?></font> &nbsp;&nbsp;&nbsp;Interest Paid: <font color='blue'><?php echo $loanDepositIntAmount; ?></font> &nbsp;&nbsp;&nbsp;Discount: <font color='red'><?php echo $depDiscountAmt; ?></font></span>
            </td>
        </tr>
        <tr>
            <td align="center" valign="middle" colspan="2">
                <br />
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle" colspan="2">
                <div id="loanUpdateDepMoneySubmitDiv">
                    <input type="hidden" value="BACK" class="frm-btn-without-border"
                           maxlength="30" size="15" onclick="" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="SUBMIT" class="frm-btn-without-border"
                           maxlength="30" size="15" onclick="loanDepositMoneySubmit('<?php echo $documentRoot; ?>','<?php echo $lenderId; ?>','<?php echo $loanId; ?>','<?php echo $newPrincipalAmount; ?>','<?php echo $loanDepositPrinAmount; ?>','<?php echo $loanDepositIntAmount; ?>','<?php echo $loanDepositIntAmount; ?>','<?php echo $totalAmountDep; ?>','<?php echo $depDiscountAmt; ?>','<?php echo $loanDepositDate; ?>','<?php echo $loanNewDateForUpdate; ?>','<?php echo $loanComm; ?>',document.getElementById('simpleOrCompIntOption').value,document.getElementById('girviCompoundedOption').value,document.getElementById('interestType').value,'<?php echo $loanDepositMonOpt; ?>');" />
                </div>
            </td>
        </tr>
    </table>
</div>
