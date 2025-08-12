<?php /**
 * 
 * Created on Jul 10, 2011 7:50:03 PM
 *
 * @FileName: ormlntda.php
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
//changes in file @AUTHOR: SANDY27NOV13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$totalDepositPrincipalAmount = 0;
$totalDepositIntAmount = 0;
$totalDepositAmount = 0;

$qSelDepAmount = "SELECT ml_trans_id, ml_trans_mondep_prin_amt, ml_trans_mondep_int_amt, ml_trans_mondep_amt, ml_trans_mondep_date, ml_trans_mondep_DOR, ml_trans_upd_sts, ml_trans_mondep_jrnlid FROM ml_transaction where ml_trans_mondep_loan_id='$loanId' and ml_trans_mondep_lender_id='$mlId' and ml_trans_mondep_own_id='$_SESSION[sessionOwnerId]' and ml_trans_upd_sts!='Deleted' order by STR_TO_DATE(ml_trans_mondep_date,'%d %b %Y') asc";
$resDepAmount = mysqli_query($conn,$qSelDepAmount);
$totalDepositCount = mysqli_num_rows($resDepAmount);

while ($rowDeposit = mysqli_fetch_array($resDepAmount, MYSQLI_ASSOC)) {
    if ($rowDeposit['ml_trans_mondep_amt'] != 0 && $rowDeposit['ml_trans_mondep_amt'] != NULL) {

        $depositMoneyId = $rowDeposit['ml_trans_id'];
        $depositPrincipalAmount = $rowDeposit['ml_trans_mondep_prin_amt'];
        $depositIntAmount = $rowDeposit['ml_trans_mondep_int_amt'];
        $depositAmount = $rowDeposit['ml_trans_mondep_amt'];
        $depositDOR = $rowDeposit['ml_trans_mondep_DOR'];
        $depositUpdStatus = $rowDeposit['ml_trans_upd_sts'];
        $depositjrnlId = $rowDeposit['ml_trans_mondep_jrnlid'];

        if ($depositUpdStatus != 'Adjust' && $depositUpdStatus != 'Released' && $depositUpdStatus != 'AmtAdjust') {
            $totalDepositPrincipalAmount += $depositPrincipalAmount;
            if ($depositPrincipalAmount == 0 || $depositPrincipalAmount == NULL)
                $totalDepositIntAmount += $depositAmount; //commented @Author:PRIYA11JUL15
            else
                $totalDepositIntAmount += $depositIntAmount; //$depositAmount changed to $depositIntAmount @Author:PRIYA11JUL15
            $totalDepositAmount += $depositAmount;
        }

        $depositPrincipalAmount = number_format($depositPrincipalAmount, 2, '.', '');
        $depositIntAmount = number_format($depositIntAmount, 2, '.', '');
        $depositAmount = number_format($depositAmount, 2, '.', '');


        if ($depositUpdStatus != 'Adjust' && $depositUpdStatus != 'Released' && $depositUpdStatus != 'AmtAdjust') {
            ?>
            <tr>
                <td align="right" valign="middle" class="girvi_head_green_12"><?php echo $depositPrincipalAmount; ?></td>
                <td align="right" valign="middle" class="girvi_head_green_12">&nbsp;</td>
                <td align="right" valign="middle" class="girvi_head_green_12"><?php echo $depositIntAmount; ?></td>
                <td align="center" valign="middle" class="girvi_head_green_12" colspan="4">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="right" valign="middle" class="girvi_head_green_12"><?php echo "Total:"; ?>&nbsp;</td>
                            <td align="left" valign="middle" class="girvi_head_green_12"><?php echo $depositAmount; ?></td>
                            <td align="right" valign="middle" class="girvi_head_green_12"><?php echo 'Deposit On:'; ?>&nbsp;</td>
                            <td align="left" valign="middle" class="girvi_head_green_12"><?php echo $rowDeposit['ml_trans_mondep_date']; ?></td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="middle" colspan="4">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="right" valign="middle" class="girvi_head_green_12">
                                <?php echo $rowDeposit['ml_trans_upd_sts']; ?>
                            </td>
                            <?php if ($omPanelDiv == 'mlLoanUpdate' && $depositUpdStatus != 'Adjust') { ?>
                                <td align="right" >
                                    <a style="cursor: pointer;" <?php if ($staffId && $array['updateGirviAccessDelGrvDep'] != 'true') { ?>onclick="event.cancelBubble = true;"<?php }
                                ?> 
                                       onclick="deleteDepositLoanAmt('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $girviId; ?>', '<?php echo $depositMoneyId; ?>', '<?php echo $depositjrnlId; ?>')">
                                        <div id="ajaxDeleteDepositLoanAmtButt<?php echo $depositMoneyId; ?>">
                                            <?php include 'omzaajcl.php'; ?>
                                        </div>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } else { ?>   
            <tr>
                <td align="right" valign="middle" class="girvi_head_red12"><?php echo $depositPrincipalAmount; ?></td>
                <td align="right" valign="middle" class="girvi_head_red12">&nbsp;</td>
                <td align="right" valign="middle" class="girvi_head_red12"><?php echo $depositIntAmount; ?></td>
                <td align="center" valign="middle" class="girvi_head_red12" colspan="4">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="right" valign="middle" class="girvi_head_red12"><?php echo "Total:"; ?>&nbsp;</td>
                            <td align="left" valign="middle" class="girvi_head_red12"><?php echo $depositAmount; ?></td>
                            <td align="right" valign="middle" class="girvi_head_red12"><?php echo 'Deposit On:'; ?>&nbsp;</td>
                            <td align="left" valign="middle" class="girvi_head_red12"><?php echo $rowDeposit['ml_trans_mondep_date']; ?></td>
                            <td align="right" valign="middle" class="girvi_head_red12"><?php echo 'Adjust On:'; ?>&nbsp;</td>
                            <td align="left" valign="middle" class="girvi_head_red12"><?php echo $rowDeposit['ml_trans_mondep_DOR']; ?></td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="middle" class="girvi_head_red12" colspan="4">
                    <?php echo $rowDeposit['ml_trans_upd_sts']; ?>
                </td>
            </tr>
            <?php
        }
    }
}
?>
    

