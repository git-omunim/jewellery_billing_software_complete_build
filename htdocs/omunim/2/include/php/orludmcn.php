<?php
/*
 * **************************************************************************************
 * @tutorial: Loan Deposit Calculate Now
 * **************************************************************************************
 *
 * Created on 16 Aug, 2012 10:36:08 PM
 *
 * @FileName: olgudmcn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
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

//Get all the data
$loanOwnerId = $_SESSION['sessionOwnerId'];
$lenderId = trim($_POST['lenderId']);
$loanId = trim($_POST['loanId']);
$loanDepositPrinAmount = trim($_POST['loanDepositPrinAmount']);
$loanDepositIntAmount = trim($_POST['loanDepositIntAmount']);
$ROIValue = trim($_POST['ROIValue']);
$totalPrincipalAmount = trim($_POST['totalPrincipalAmount']);
$totalInterestAmount = trim($_POST['totalInterestAmount']);
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
$loanIntAdjustmentCheck = trim($_POST['loanIntAdjustmentCheck']);
$loanNewDateForUpdate = trim($_POST['loanNewDateForUpdate']);
$loanTimePeriodVar = trim($_POST['loanTimePeriodVar']);
$loanDepositMonOpt = trim($_POST['loanDepositMonOpt']);

// Start To protect MySQL injection
$loanDepositPrinAmount = stripslashes($loanDepositPrinAmount);
$loanDepositIntAmount = stripslashes($loanDepositIntAmount);
$ROIValue = stripslashes($ROIValue);
$totalPrincipalAmount = stripslashes($totalPrincipalAmount);
$totalInterestAmount = stripslashes($totalInterestAmount);
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);

$loanDepositPrinAmount = mysqli_real_escape_string($conn,$loanDepositPrinAmount);
$loanDepositIntAmount = mysqli_real_escape_string($conn,$loanDepositIntAmount);
$ROIValue = mysqli_real_escape_string($conn,$ROIValue);
$totalPrincipalAmount = mysqli_real_escape_string($conn,$totalPrincipalAmount);
$totalInterestAmount = mysqli_real_escape_string($conn,$totalInterestAmount);
$DOBDay = mysqli_real_escape_string($conn,$DOBDay);
$DOBMonth = mysqli_real_escape_string($conn,$DOBMonth);
$DOBYear = mysqli_real_escape_string($conn,$DOBYear);
// End To protect MySQL injection

if ($loanDepositPrinAmount == '' || $loanDepositPrinAmount == NULL) {
    $loanDepositPrinAmount = 0;
}

if ($loanIntAdjustmentCheck == 'True') {
    $totalInterestAmount = $loanDepositIntAmount;
}
/* * *****Start Code To Add 0 if Interest is '' @Author:PRIYA29AUG13****** */
if ($totalInterestAmount == '' || $totalInterestAmount == NULL) {
    $totalInterestAmount = 0;
}if ($loanDepositIntAmount == '' || $loanDepositIntAmount == NULL) {
    $loanDepositIntAmount = 0;
}
//echo '$totalPrincipalAmount:' . $totalPrincipalAmount;
/* * *****End Code To Add 0 if Interest is '' @Author:PRIYA29AUG13****** */
$totalAmtCalculated = $totalPrincipalAmount + $totalInterestAmount;
$totalAmtCalculated = number_format($totalAmtCalculated, 2, '.', '');
$loanDepositDate = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
$totalAmountDep = $loanDepositPrinAmount + $loanDepositIntAmount;
$totalAmountLeft = $totalAmountDep - $totalInterestAmount;
$totalAmountLeft = number_format($totalAmountLeft, 2, '.', '');
$newPrincipalAmount = $totalPrincipalAmount - $totalAmountLeft;
$totalAmountDep = number_format($totalAmountDep, 2, '.', '');
$loanRealIntAmount = $totalInterestAmount;
$totalInterestAmount = number_format($totalInterestAmount, 2);
$newPrincipalAmount = number_format($newPrincipalAmount, 2, '.', '');

/* * **Start to add code to change girvi date depending on last day int option @AUTHOR: SANDY04FEB14*** */
$selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'lastDayInt'";
$resFormsLayoutDet = mysqli_query($conn,$selFormsLayoutDet);
$rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
$lastDayInt = $rowFormsLayoutDet['omly_value'];
if ($lastDayInt == 'YES') {
    $newGirviDate = date("d M Y", strtotime($loanDepositDate) + 86400);
} else {
    $newGirviDate = date("d M Y", strtotime($loanDepositDate));
}
/* * **End to add code to change girvi date depending on last day int option @AUTHOR: SANDY04FEB14*** */

$loanDepositDate = om_strtoupper(date("d M Y", strtotime($loanDepositDate)));
$loanNewDateForUpdate = om_strtoupper(date("d M Y", strtotime($loanNewDateForUpdate)));

$depDiscountAmt = 0;
$loanDepositPrinAmount = number_format($loanDepositPrinAmount, 2, '.', '');
$loanDepositIntAmount = number_format($loanDepositIntAmount, 2, '.', '');
$loanComm = "Total calculated amount&nbsp;(Principal:<font color='blue'>$totalPrincipalAmount</font> &AMP; Int: <font color='blue'>$totalInterestAmount</font>) till date&nbsp;(<font color='blue'>$loanDepositDate</font>):&nbsp;<font color='blue'>$totalAmtCalculated</font><br />";
$loanComm .= "<b>Total deposit amount&nbsp;(Principal:<font color='blue'>$loanDepositPrinAmount</font> &AMP; Int: <font color='blue'>$loanDepositIntAmount</font>) deposit on date&nbsp;(<font color='blue'>$loanDepositDate</font>):&nbsp;<font color='blue'>$totalAmountDep</font></b><br />";
$loanComm .= "Total interest from date&nbsp;<font color='blue'>$loanNewDateForUpdate</font> to <font color='blue'>$loanDepositDate</font>&nbsp;(<font color='blue'>$loanTimePeriodVar</font>):&nbsp;<font color='blue'>$totalInterestAmount</font><br />";
$loanComm .= "Amount left after pay interest&nbsp;(<font color='blue'>$totalAmountDep</font> - <font color='blue'>$totalInterestAmount</font>):&nbsp;<font color='blue'>$totalAmountLeft</font><br />";
$loanComm .= "<b>New Principal Amount&nbsp;(<font color='blue'>$totalPrincipalAmount</font> - <font color='blue'>$totalAmountLeft</font>):&nbsp;<font color='blue'>$newPrincipalAmount</font></b><br />";
$loanComm .= "New Girvi Date:&nbsp;<font color='blue'>$newGirviDate</font><br />";
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
                <span class="text_black_Arial_12">Total calculated amount&nbsp;(Principal:<font color='blue'><?php echo $totalPrincipalAmount; ?></font> & Int: <font color='blue'><?php echo $totalInterestAmount; ?></font>) till date&nbsp;(<font color='blue'><?php echo $loanDepositDate; ?></font>):</span>
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
                <span class="text_blue_Arial_12">&nbsp;&nbsp;<?php echo $totalInterestAmount; ?></span>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <span class="text_black_Arial_12">Amount left after pay interest&nbsp;(<font color='blue'><?php echo $totalAmountDep; ?></font> - <font color='blue'><?php echo $totalInterestAmount; ?></font>):</span>
            </td>
            <td align="right" valign="middle">
                <?php
                if ($totalAmountLeft >= 0) {
                    ?>
                    <span class="text_green_Arial_12_bold">&nbsp;&nbsp;
                        <?php echo $totalAmountLeft; ?>
                    </span>
                <?php } else { ?>
                    <span class="text_red_Arial_12_bold">&nbsp;&nbsp;
                        <?php echo $totalAmountLeft; ?>
                    </span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <?php
                if ($totalAmountLeft >= 0) {
                    ?>
                    <span class="text_black_Arial_12_bold">New Principal Amount&nbsp;(<font color='blue'><?php echo $totalPrincipalAmount; ?></font> - <font color='blue'><?php echo $totalAmountLeft; ?></font>):</span>
                <?php } else { ?>
                    <span class="text_black_Arial_12_bold">New Principal Amount&nbsp;(<font color='blue'><?php echo $totalPrincipalAmount; ?></font> + <font color='blue'><?php echo abs($totalAmountLeft); ?></font>):</span>
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
            <td align="right" valign="middle">
                <span class="text_black_Arial_12_bold">New Girvi Date:</span>
            </td>
            <td align="right" valign="middle">
                <span class="text_blue_Arial_12_bold">&nbsp;&nbsp;
                    <?php echo $newGirviDate; ?>
                </span>
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
                           maxlength="30" size="15" onclick="loanDepositMoneySubmit('<?php echo $documentRoot; ?>','<?php echo $lenderId; ?>','<?php echo $loanId; ?>','<?php echo $newPrincipalAmount; ?>','<?php echo $loanDepositPrinAmount; ?>','<?php echo $loanDepositIntAmount; ?>','<?php echo $loanRealIntAmount; ?>','<?php echo $totalAmountDep; ?>','<?php echo $depDiscountAmt; ?>','<?php echo $loanDepositDate; ?>','<?php echo $newGirviDate; ?>','<?php echo $loanComm; ?>',document.getElementById('simpleOrCompIntOption').value,document.getElementById('girviCompoundedOption').value,document.getElementById('interestType').value,'<?php echo $loanDepositMonOpt; ?>');" />
                </div>
            </td>
        </tr>
    </table>
</div>
