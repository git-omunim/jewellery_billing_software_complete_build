<?php /*
 * Created on FEB 1, 2018 06:30:06 PM
 *
 * @FileName: omtraninvdv.php
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
?>
<?php
$panelName = $_POST['panelName'];
$utinId = $_POST['utinId'];


$selectAllEntries = "SELECT * FROM user_transaction_invoice "
        . "WHERE utin_transaction_type IN ('Transaction') "
        . "and utin_type IN ('TransEntry') "
        . "and utin_status NOT IN ('Deleted','PaymentDone') "
        . "order by utin_id desc";

$allResult = mysqli_query($conn, $selectAllEntries) or die("selectAllEntries :" . $selectAllEntries . mysqli_error($conn));
$entryCount = mysqli_num_rows($allResult); // All ENTRY COUNT
?>
<?php
if ($mainPanel == '') {
    $mainPanel = $_GET['mainPanel'];
}

if ($entryCount > 0) {
    ?>
    <div id="voucherId_div" style="margin-bottom: 10px;">
        <h1>
            INVOICE <?php echo $utin_pre_invoice_no . '-' . $utin_invoice_no; ?>
        </h1>
    </div>
    <table border="0" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="Voucher NO." width="90px">
                <div class="spaceLeft5">
                    V.NO.
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="100px">
                <div class="spaceLeft5">
                    DATE
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="DATE" width="100px">
                <div class="spaceLeft5">
                    PARTY NAME
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="DESCRIPTION" width="300px">
                <div class="spaceRight5">
                    DESCRIPTION
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="TRANSACTION TYPE" width="120px">
                <div class="spaceLeft5">
                    TRANSACTION TYPE
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="TYPE" width="90px">
                <div class="spaceRight5">
                    TYPE
                </div>
            </td>
            <td align="center" class="brwnCalibri12Font border-color-grey-rb" title="AMOUNT"  width="150px">
                <div class="spaceRight5">
                    AMOUNT
                </div>
            </td>
            <!--<td align="center" class="brwnCalibri12Font border-color-grey-rb" title="TRANSACTION STATUS" width="90px">
                <div class="spaceRight5">
                    STATUS
                </div>
            </td>-->
            <td align="center" class="brwnCalibri12Font border-color-grey-b" title="DELETE" width="90px">
                <div class="spaceRight5">
                    DELETE
                </div>
            </td>
        </tr>

        <?php
        while ($entryRow = mysqli_fetch_array($allResult)) {

            $utin_id = $entryRow['utin_id'];
            $utin_firm_id = $entryRow['utin_firm_id'];
            $utin_transaction_type = $entryRow['utin_transaction_type'];
            $utin_history = $entryRow['utin_history'];
            $utin_total_amt = $entryRow['utin_total_amt'];
            $utin_CRDR = $entryRow['utin_CRDR'];
            $utin_other_info = $entryRow['utin_other_info'];
            $utin_pre_invoice_no = $entryRow['utin_pre_invoice_no'];
            $utin_invoice_no = $entryRow['utin_invoice_no'];
            $utin_dr_acc_id = $entryRow['utin_dr_acc_id'];
            $utin_cr_acc_id = $entryRow['utin_cr_acc_id'];
            $payAddDate = $entryRow['utin_date'];
            $partyName = $entryRow['utin_user_name'];
            //$utin_status = $entryRow['utin_status'];
            $totalFinalAmount += $entryRow['utin_total_amt'];
            ?>

            <tr>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($utin_invoice_no != '') {
                            echo $utin_pre_invoice_no . '-' . $utin_invoice_no;
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($payAddDate != '') {
                            echo $payAddDate;
                        } else {
                            echo '-/-/-';
                        }
                        ?>
                    </div>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($partyName != '') {
                            echo $partyName;
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <a style="cursor: pointer;" title="Single click to view Item Details!" class="spaceLeft5"
                       onclick="showPaymentTransactionDetailsDiv('<?php echo $utin_id; ?>', 'TransactionPaymentUpdate');">
                           <?php
                           if ($utin_other_info != '') {
                               echo $utin_other_info;
                           } else {
                               echo '-';
                           }
                           ?>
                    </a>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($utin_transaction_type != '') {
                            echo $utin_transaction_type;
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($utin_history != '') {
                            echo $utin_history;
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                </td>
                <td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        if ($utin_total_amt != '') {
                            echo $utin_total_amt;
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                </td>
                <!--<td align="center" class="blackCalibri12Font border-color-grey-rb">
                    <div class="spaceLeft5">
                        <?php
                        /*if ($utin_status != '') {
                            echo $utin_status;
                        } else {
                            echo '-';
                        }*/
                        ?>
                    </div>
                </td>-->
                <td align="center" class="blackCalibri12Font border-color-grey-b">
                    <input type="hidden" id="upPanel" name="upPanel"/>
                    <a style="cursor: pointer;"
                       onclick="deleteTransactionItem('<?php echo $utin_id ?>', 'TransactionPaymentDel')">
                        <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="" class="marginTop5" />
                    </a>
                </td>
            </tr>  
        <?php } ?>
    </table>

    <table border="0" cellspacing="0" cellpadding="5" align="left" width="100%">
        <tr>
            <td width="100"></td>
            <td width="100"></td>
            <td width="100"></td>
            <td width="100"></td>
            <td width="100"></td>
            <td width="100"></td>
            <td align="right" class="blackCalibri13FontBold" colspan="3">
                <div class="spaceRight5">
                    TOTAL AMOUNT :
                </div>
            </td>
            <td align="right" class="blackCalibri13FontBold">
                <div class="spaceRight5">
                    <?php echo formatInIndianStyle($totalFinalAmount); ?>
                </div>
            </td>
            <td width="100"></td>
            <td width="140"></td>
        </tr>
    </table>
    <hr style="margin-top: 10px; margin-bottom: 10px;" color="#FD9A00" size="0.1px" />
    <div>
        <?php
        $mainPanel = 'TransactionPayment';
        $payPanelName = 'TransactionPayment';
        $totalValuation = $totalFinalAmount;
        $totalFinalBalance = $totalFinalAmount;
        $utin_total_amt = $totalValuation;
        $payPreInvoiceNo = $utin_pre_invoice_no;
        $payInvoiceNo = $utin_invoice_no;

        $utin_pay_cgst_tot_amt = $totalFinalAmount;
        $utin_pay_sgst_tot_amt = $totalFinalAmount;
        $firmId = $utin_firm_id;
        $utin_pay_cgst_chk = 'checked';
        $utin_pay_sgst_chk = 'checked';
        $utin_pay_cgst_chrg = 1.5;
        $utin_pay_sgst_chrg = 1.5;
        $utin_pay_cgst_amt = $totalFinalAmount * $utin_pay_cgst_chrg / 100;
        $utin_pay_sgst_amt = $totalFinalAmount * $utin_pay_sgst_chrg / 100;
        include 'ompyamt.php';
    }
    ?>
</div>
