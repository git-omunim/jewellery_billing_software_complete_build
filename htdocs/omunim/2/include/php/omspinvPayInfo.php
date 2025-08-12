<?php
/*
 * **************************************************************************************
 * @tutorial: XRF Invoice Payment Details File @PRIYANKA-02AUG18
 * **************************************************************************************
 * 
 * Created on 02 AUG, 2018 11:29:49 AM
 *
 * @FileName: omspinvPayInfo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.82
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
parse_str(getTableValues("SELECT * FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId' and "
                . "utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' and "
                . "utin_type IN ('XRF') and utin_transaction_type IN ('sell') and "
                . "utin_user_id = '$userId' and utin_firm_id IN ($strFrmId)"));
//       
?>
</table>
</td>
</tr>
<?php
//
$qSelRawMetSettleDet = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$sessionOwnerId' and utin_amt_settled_inv_id = '$utin_id' and utin_amt_pay_chk = 'checked' and utin_user_id = '$userId' and utin_firm_id IN ($strFrmId) ";
//
$resRawMetSettleDet = mysqli_query($conn, $qSelRawMetSettleDet);
$noOfRawMet = mysqli_num_rows($resRawMetSettleDet);
//
while ($rowRawMetSettleDet = mysqli_fetch_array($resRawMetSettleDet)) {
    $rawMetPreInvNo = $rowRawMetSettleDet['utin_pre_invoice_no'];
    $rawMetInvNo = $rowRawMetSettleDet['utin_invoice_no'];
    $rawMetInvNo = $rowRawMetSettleDet['utin_invoice_no'];
    $rawMetCashBal = $rowRawMetSettleDet['utin_cash_balance'];
    $utin_pay_tax_on_total_amt_chk = $rowRawMetSettleDet['utin_pay_tax_on_total_amt_chk'];
    $utin_discount_amt_discup = $rowRawMetSettleDet['utin_discount_amt_discup'];
    ?>
    <tr>
        <td colspan="<?php echo $colspan; ?>" class="spaceRight5">
            <table align="left" border="0" cellpadding="0" width="100%" cellspacing="0">
                <?php
//                $fieldName = 'settleAmt';
//                parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($settleAmt_check == 'true') {
//                    $fieldName = 'settleAmtLb';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($settleAmtLb_size == 0) {
                        $settleAmtLb_size = 12;
                    }
                    ?>
                    <tr>
                        <td align = "left">
                            <div class = "ff_calibri font_color_<?php echo $settleAmtLb_color; ?>" style = "font-size:<?php echo $settleAmtLb_size; ?>px"
                                 onClick = "this.contentEditable = 'true';">
                                     <?php
                                     echo 'INV NO : ' . $rawMetPreInvNo . '' . $rawMetInvNo . '   ' . 'URD AMT' . ':' . $rawMetCashBal;
                                     ?>

                            </div>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <?php
}
?>  
<tr>
    <td align="center" colspan="<?php echo $colspan; ?>">
        &nbsp;
    </td>

</tr>
<tr>
    <td>
        <?php
        $querysetteledinvoice = "SELECT * FROM user_transaction_invoice where utin_owner_id = '$sessionOwnerId' and "
                              . "utin_type NOT IN ('OnPurchase') and utin_user_id = '$userId' and utin_firm_id IN ($strFrmId) and "
                              . "(utin_amt_settled_inv_id = '$utin_id' OR utin_gd_settled_inv_id = '$utin_id' OR utin_sl_settled_inv_id = '$utin_id') ";
        $resSetteledInvDetails = mysqli_query($conn, $querysetteledinvoice);
        $noOfsetteledInv = mysqli_num_rows($resSetteledInvDetails);
        ?>
        <?php if ($noOfsetteledInv > 0) { ?>
            <table border="1" style="border-collapse: collapse;border:1px solid black;">
                <tr>
                    <th style="padding: 10px;">INVOICE NO</th>
                    <th style="padding: 10px;">GOLD WT</th>
                    <th style="padding: 10px;">SILVER WT</th>
                    <th style="padding: 10px;"> CASH BALANCE</th>

                </tr>

                <?php
                while ($rowSetteledInvDetails = mysqli_fetch_array($resSetteledInvDetails)) {
                    ?> <tr>  <td align="center"><?php echo $rowSetteledInvDetails['utin_pre_invoice_no'] . $rowSetteledInvDetails['utin_invoice_no']; ?></td>
                        <td align="right"><?php if ($rowSetteledInvDetails['utin_gd_settled_inv_id'] != null || $rowSetteledInvDetails['utin_gd_settled_inv_id'] != '') {
                        ?>  <span style="color:<?php
                                if ($rowSetteledInvDetails['utin_gd_CRDR'] == 'CR') {
                                    echo "green";
                                } else {
                                    echo "red";
                                }
                                ?>"> <?php echo abs($rowSetteledInvDetails['utin_gd_due_wt']) . " " . $rowSetteledInvDetails['utin_gd_due_wt_typ'] . " " . $rowSetteledInvDetails['utin_gd_crdr']; ?> </span>
                                      <?php
                                  } else {
                                      echo "-";
                                  }
                                  ?>
                        </td>
                        <td align="right"><?php if ($rowSetteledInvDetails['utin_sl_settled_inv_id'] != null || $rowSetteledInvDetails['utin_sl_settled_inv_id'] != '') {
                                      ?> <span style="color:<?php
                                if ($rowSetteledInvDetails['utin_sl_CRDR'] == 'CR') {
                                    echo "green";
                                } else {
                                    echo "red";
                                }
                                ?>">  <?php echo abs($rowSetteledInvDetails['utin_sl_due_wt']) . " " . $rowSetteledInvDetails['utin_sl_due_wt_typ'] . " " . $rowSetteledInvDetails['utin_sl_crdr']; ?> </span>
                                      <?php
                                  } else {
                                      echo "-";
                                  }
                                  ?>
                        </td>
                        <td align="right">
                            <?php if ($rowSetteledInvDetails['utin_amt_settled_inv_id'] != null || $rowSetteledInvDetails['utin_amt_settled_inv_id'] != '') {
                                ?> <span style="color:<?php
                                if ($rowSetteledInvDetails['utin_cash_CRDR'] == 'CR') {
                                    echo "green";
                                } else {
                                    echo "red";
                                }
                                ?>"> <?php echo abs($rowSetteledInvDetails['utin_cash_balance']) . " " . $rowSetteledInvDetails['utin_cash_CRDR']; ?> </span>
                                      <?php
                                  } else {
                                      echo "-";
                                  }
                                  ?>
                        </td> 
                    </tr><?php
                }
                ?>

                <tr >
                    <th> TOTAL</th>
                    <th align="right" style="color:<?php
                    if ($utin_prev_gd_CRDR == 'CR') {
                        echo "green";
                    } else {
                        echo "red";
                    }
                    ?>">  <?php
                            if ($utin_gs_prev_wt > 0) {
                                echo abs($utin_gs_prev_wt) . " " . $utin_gd_prev_wt_typ; //. " " . $utin_prev_gd_CRDR;
                            } else {
                                echo "-";
                            }
                            ?></th>
                    <th  align="right"style="color:<?php
                    if ($utin_prev_sl_CRDR == 'CR') {
                        echo "green";
                    } else {
                        echo "red";
                    }
                    ?>"> <?php
                             if ($utin_sl_prev_wt > 0) {
                                 echo abs($utin_sl_prev_wt) . " " . $utin_sl_prev_wt_typ; //." " . $utin_prev_sl_CRDR;
                             } else {
                                 echo "-";
                             }
                             ?> </th>
                    <th  align="right" style="color:<?php
                    if ($utin_prev_amt_CRDR == 'CR') {
                        echo "green";
                    } else {
                        echo "red";
                    }
                    ?>"><?php
                             if ($utin_prev_cash_bal > 0) {
                                 echo abs($utin_prev_cash_bal); //. " " . $utin_prev_amt_CRDR;
                             } else {
                                 echo "-";
                             }
                             ?></th>
                </tr>
            </table>

        <?php } ?>
    </td>
    <td colspan="2" width="100%" align="center">
        <table border="0" cellspacing="0">
            <?php
            if ($slprin_stoc_type != 'oldStock' && $utin_payment_mode != 'ByCash') {
                if ($utin_transaction_type == 'PURBYSUPP' || $utin_transaction_type == 'PURCHASE')
                    $inv_trans_type = 'PURCHASE';
                else
                    $inv_trans_type = 'SELL';
                ?>
                <tr>

                    <?php if ($totFinGdWt != '' && $totFinGdWt != 0) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">GD <?php echo $inv_trans_type; ?> :</div>
                        </td>
                        <td align="right" width="15%">
                            <div class="blackCalibri13Font"><?php echo decimalVal($totFinGdWt, 3) . ' ' . $goldTotFFineWtType; ?>
                            </div>
                        </td>
                    <?php } if ($totFinSlWt != '' && $totFinSlWt != 0) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">SL <?php echo $inv_trans_type; ?> :</div>
                        </td>
                        <td align="right" width="10%">
                            <div class="blackCalibri13Font paddingRight2"><?php echo decimalVal($totFinSlWt, 3) . ' ' . $silverTotFFineWtType; ?></div>
                        </td>
                    <?php } ?>
                </tr>
                <tr>

                    <?php if ($utin_gd_paid_wt != '' && $utin_gd_paid_wt != 0.000) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">GD RECEIVED :</div>
                        </td>
                        <td align="right" width="15%">
                            <div class="blackCalibri13Font"><?php echo decimalVal($utin_gd_paid_wt, 3) . ' ' . $utin_gd_paid_wt_typ; ?>
                            </div>
                        </td>
                    <?php } if ($utin_sl_paid_wt != '' && $utin_sl_paid_wt != 0.000) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">SL RECEIVED :</div>
                        </td>
                        <td align="right" width="10%">
                            <div class="blackCalibri13Font paddingRight2"><?php echo decimalVal($utin_sl_paid_wt, 3) . ' ' . $utin_sl_paid_wt_typ; ?></div>
                        </td>
                    <?php } ?>
                </tr>
                <tr> 
  
                    <?php if ($utin_gs_prev_wt != '' && $utin_gs_prev_wt != 0) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">GOLD PAID :</div>
                        </td>
                        <td align="right" width="15%">
                            <div class="blackCalibri13Font"><?php echo decimalVal($totalGdPaid, 3) . ' ' . $goldTotFFineWtType; ?>
                            </div>
                        </td>
                    <?php } if ($totalSlPaid != '' && $totalSlPaid != 0) { ?>
                        <td align="right" width="20%">
                            <div class="blackCalibri13FontBold">SILVER PAID :</div>
                        </td>
                        <td align="right" width="10%">
                            <div class="blackCalibri13Font paddingRight2"><?php echo decimalVal($totalSlPaid, 3) . ' ' . $silverTotFFineWtType; ?></div>
                        </td>
                    <?php } ?>
                </tr>
                <tr> 
     
                    <?php if ($utin_gs_prev_wt != '' && $utin_gs_prev_wt != 0) { ?>
                        <td align="right" width="20%">
                            <?php if ($utin_prev_gd_CRDR == 'CR') { ?>
                                <div class="blackCalibri13FontBold"> PREV GOLD BAL :</div>
                            <?php } else { ?>
                                <div class="blackCalibri13FontBold"> PREV GOLD ADVANCE :</div>
                            <?php } ?>
                        </td>
                        <td align="right" width="15%">
                            <div  style="color: <?php
                            if ($utin_prev_gd_CRDR == 'CR') {
                                echo "green";
                            } else {
                                echo "red";
                            }
                            ?>;" class="blackCalibri13Font"><?php echo decimalVal($utin_gs_prev_wt, 3) . ' ' . $utin_gd_prev_wt_typ . " " . $utin_prev_gd_CRDR; ?>
                            </div>
                        </td>
                    <?php } if ($utin_sl_prev_wt != '' && $utin_sl_prev_wt != 0) { ?>
                        <td align="right" width="20%">
                            <?php if ($utin_prev_sl_CRDR == 'CR') { ?>
                                <div class="blackCalibri13FontBold"> PREV SILVER BAL :</div>
                            <?php } else { ?>
                                <div class="blackCalibri13FontBold"> PREV SILVER ADVANCE :</div>
                            <?php } ?>
                        </td>
                        <td align="right" width="10%">
                            <div style="color: <?php
                            if ($utin_prev_sl_CRDR == 'CR') {
                                echo "green";
                            } else {
                                echo "red";
                            }
                            ?>;" class="blackCalibri13Font paddingRight2"><?php echo decimalVal($utin_sl_prev_wt, 3) . ' ' . $utin_sl_prev_wt_typ . " " . $utin_prev_sl_CRDR; ?></div>
                        </td>
                    <?php } ?>
                </tr>
                <?php if ($utin_payment_mode == 'RateCut') { ?>
                    <tr>
   
                        <?php if ($totalGdRtCt != '' && $totalGdRtCt != 0) { ?>
                            <td align="right" width="20%">
                                <div class="blackCalibri13FontBold">GOLD RT CUT :</div>
                            </td>
                            <td align="right" width="15%">
                                <div class="blackCalibri13Font">
                                    <?php echo (decimalVal($totalGdRtCt, 3) . ' ' . $goldTotFFineWtType); ?>
                                </div>
                            </td>
                        <?php } if ($totalSlRtCt != '' && $totalSlRtCt != 0) { ?>
                            <td align="right" width="20%">
                                <div class="blackCalibri13FontBold ">SILVER RT CUT :</div>
                            </td>
                            <td align="right" width="10%">
                                <div class="blackCalibri13Font paddingRight2">
                                    <?php echo (decimalVal($totalSlRtCt, 3) . ' ' . $silverTotFFineWtType); ?>
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>


                <tr>
                    <td align="right" class="paddingTop5">                      
                    </td>
                    <td colspan="3" class="paddingTop5">
                    </td>
                </tr>

                <tr>
                    <?php
                    if (($totFinGdWt != '' && $totFinGdWt != 0) ||
                            ($totalGdRtCt != '' && $totalGdRtCt != 0) ||
                            ($totalGdPaid != '' && $totalGdPaid != 0) ||
                            ($utin_gd_ffn_wt != '' && $utin_gd_ffn_wt != 0)) {
                        ?>
                        <td align="right" width="20%">
                            <?php if ($utin_gd_due_wt < 0) { ?>
                                <div class="blackCalibri13FontBold">GD DEPOSIT :</div> <?php
                } else {
                                ?>
                                <div class="blackCalibri13FontBold">GD BALANCE :</div> <?php
                }
                ?>
                        </td>
                        <td align="right" width="15%">
                            <div class="blackCalibri13Font"><?php echo (decimalVal(abs($utin_gd_due_wt), 3) . ' ' . $utin_gd_due_wt_typ); ?>
                            </div>
                        </td>
                        <?php } if (($totFinSlWt != '' && $totFinSlWt != 0) || ($totalSlRtCt != '' && $totalSlRtCt != 0) || ($totalSlPaid != '' && $totalSlPaid != 0) || ($utin_sl_ffn_wt != '' && $utin_sl_ffn_wt != 0)) { ?>
                        <td align="right" width="20%">
                            <?php if ($utin_sl_due_wt < 0) { ?> 
                                <div class="blackCalibri13FontBold">SL DEPOSIT :</div>
                            <?php } else { ?>
                                <div class="blackCalibri13FontBold">SL BALANCE :</div> <?php }
                ?>
                        </td>
                        <td align="right" width="10%">
                            <div class="blackCalibri13Font paddingRight2"><?php echo (decimalVal($utin_sl_due_wt, 3) . ' ' . $utin_sl_due_wt_typ); ?></div>
                        </td>
    <?php } ?>
                </tr>
                <tr>
                    <td align="right" class="paddingTop5">
                        <div style="width:116px"></div>
                    </td>
                    <td colspan="3" class="paddingTop5">
                        <div></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="paddingTop5">
                        &nbsp;
                    </td>
                </tr>
<?php } ?>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5 ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'TAXABLE AMOUNT'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial">
                    <div class="paddingRight2">
                        <?php echo formatInIndianStyle(($utin_pay_tax_tot_amt)); ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5 ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'CGST'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial">
                    <div class="paddingRight2">
                        <?php echo $utin_pay_cgst_amt; ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'SGST'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial">
                    <div class="paddingRight2">
                        <?php echo $utin_pay_sgst_amt; ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<?php if($utin_pay_igst_amt > 0) { ?>
<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5 ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'IGST'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial ">
                    <div class="paddingRight2">
                        <?php echo formatInIndianStyle(($utin_pay_igst_amt)); ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<?php } ?>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5  border-color-grey-top border-color-grey-bottom  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'FINAL AMOUNT'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial border-color-grey-top border-color-grey-bottom">
                    <div class="paddingRight2">
                        <?php echo formatInIndianStyle(om_round($utin_tot_payable_amt)); ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial"> 
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5 border-color-grey-bottom  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'CASH PAID'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial border-color-grey-bottom ">
                    <div class="greenFont paddingRight2">
                        <?php echo formatInIndianStyle(om_round($utin_cash_amt_rec)); ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
            <tr>
                <td align="right" width="670px" class="itemAddPnLabels12Arial">
                    <div  class="paddingRight5  ff_calibri fw_b font_color_black border-color-grey-bottom" style="width:120px;font-size:12px" onClick="this.contentEditable = 'true';">
                        <?php echo 'TOTAL REC. AMOUNT'; ?> : 
                    </div>
                </td>
                <td align="right" class="itemAddPnLabels12Arial border-color-grey-bottom">
                    <div class="greenFont paddingRight2">
                        <?php echo formatInIndianStyle(om_round($utin_cash_amt_rec)); ?>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
        <td colspan="<?php echo $colspan; ?>">
            <table border="0" cellpadding="0" width="100%" cellspacing="0" class="margin2pxAll">
                    <tr >
                        <td align="left" class="">
                            &nbsp;
                        </td>

                        <td align="right" class="itemAddPnLabels12Arial font_color_black" style="font-size:14px">
                            <table border="0" cellpadding="0" width="<?php echo $finalamtwidth; ?>" cellspacing="0" >
                                <tr>
                                    <td width="50%" align="right" class="border-color-grey-top  " >
                                        <?php
                                        if ($utin_cash_balance >= 0) {
                                            $class = 'redFont';
                                            $label = 'AMT BALANCE :';
                                        } else {
                                            $class = 'greenFont';
                                            $label = 'AMT DEPOSIT :';
                                        }
                                        ?>
                                        <div class="<?php echo $class; ?>  ff_calibri fw_b font_color_black" onClick="this.contentEditable = 'true';" style="font-size:18px;">
                                            <span class="spaceRight5  ff_calibri font_color_black" onClick="this.contentEditable = 'true';"><?php echo $label; ?>
                                                <span class="ff_calibri fw_b font_color_black" onClick="this.contentEditable = 'true';">
                                                    <?php
                                                        echo om_round(abs($utin_cash_balance), 2);
                                                    ?>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    <tr>
                        <td align="left"  class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial font_color_black" style="font-size:14px">
                            <?php echo "PAYABLE AMOUNT"; ?> :
                        </td>
                        <td align="left" class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial">
                            <?php
                                echo "$globalCurrency" . ' ' . ucwords(numToWords((abs($utin_tot_payable_amt)))) . ' Only/-';
                            ?>

                        </td>
                    </tr>
                    <br>               
            </table>
        </td>
    </tr>
