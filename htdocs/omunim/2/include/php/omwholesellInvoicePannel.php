<?php
parse_str(getTableValues("SELECT * FROM stock_transaction "
                    . "WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));
parse_str(getTableValues("SELECT * FROM user_transaction_invoice "
                    . "WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'"));

parse_str(getTableValues("SELECT  user_fname,user_lname,user_phone,user_mobile FROM user where user_id='$utin_user_id'"));

//echo "SELECT * FROM user_transaction_invoice "
//                    . "WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' <br>";
//echo "SELECT  user_fname,user_phone,user_mobile FROM user where user_id='$utin_user_id' <br>";
//echo "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
//                                               . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
//                                               . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
//                                               . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
//                                               . "and sttr_user_id ='$userId' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
?>
<div style="display: flex;justify-content:center;align-items:center;margin-top:13px;">
    <h1>Estimate Bill</h1>
</div>
<div style="padding:13px;margin-left: 3px;">
    <table class="sell_Inv_table" style="width: 100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td colspan="9" class="invoiceWholesaleBoder">
                    <table>
                        <tbody><tr>
                                <td style="font-size: 14px;text-transform: capitalize;"><?php
                                echo ucfirst($user_fname.'  '.$user_lname);
                                ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px;">Ph # <?php
                                if($user_mobile !=''){
                                    echo $user_mobile;
                                }else{
                                     echo $user_phone;
                                }
                                ?></td>
                            </tr>
                        </tbody></table>
                </td>
                <td colspan="2" class="invoiceWholesaleBoder">
                    <table>
                        <tbody>
                            <tr>
                                <td class="invoiceWholesaleStyletitle">Bill No.</td>
                                <td class="invoiceWholesaleStyletitle">:</td>
                                <td style="font-size: 14px;"><?php
                                echo $sttr_pre_invoice_no.$sttr_invoice_no;
                                ?></td>
                            </tr>
                            <tr>
                                <td class="invoiceWholesaleStyletitle">Date</td>
                                <td class="invoiceWholesaleStyletitle">:</td>
                                <td style="font-size: 14px;"><?php
                                echo $utin_date;
                                ?></td>
                            </tr>
                        </tbody></table>
                </td>

            </tr>
            <tr>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle" >Metal Name</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Item Name</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">G.Wt</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Less Wt</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Net Wt</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Tunch</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Wstg</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Pcs</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Labour</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Fine Wt</td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyletitle"  align="right" style="padding-right: 10px; ">Labour Amount</td>
            </tr>
            <?php
             $stockQueryType = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                                               . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' "
                                               . "and sttr_indicator IN ('stock','stockCrystal','PURCHASE','rawMetal','APPROVAL','APPROVALREC','crystal','imitation','strsilver','RetailStock','ESTIMATE', 'PurchaseReturn') "
                                               . "and sttr_transaction_type IN('STOCK', 'sell','ESTIMATESELL','PURCHASE','APPROVAL','APPROVALREC','ESTIMATE', 'PurchaseReturn') $sttr_date_str "
                                               . "and sttr_user_id ='$utin_user_id' and sttr_status NOT IN('DELETED') AND sttr_firm_id='$utin_firm_id' order by sttr_id ASC";
            $resstockType = mysqli_query($conn, $stockQueryType);
            while($rowstocktype = mysqli_fetch_array($resstockType)){
            ?>
            <tr>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php echo $rowstocktype['sttr_metal_type']; ?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle">
                      <?php echo $rowstocktype['sttr_item_name']; ?>
                    <table>
                        <?php 
                        if($rowstocktype['sttr_pkt_desc1'] !=''){
                        ?>
                        <tr>
                                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" style="border: none;"><?php echo $rowstocktype['sttr_pkt_desc1']; ?>(<?php echo $rowstocktype['sttr_pkt_qty1']; ?>X<?php echo $rowstocktype['sttr_pkt_weight1']; ?>=<?php echo $multiple = $rowstocktype['sttr_pkt_qty1'] * $rowstocktype['sttr_pkt_weight1']; ?>)</td>
                        </tr>
                        <?php } ?>
                        <?php 
                        if($rowstocktype['sttr_pkt_desc2'] !=''){
                        ?>
                        <tr>
                                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" style="border: none;"><?php echo $rowstocktype['sttr_pkt_desc2']; ?>(<?php echo $rowstocktype['sttr_pkt_qty2']; ?>X<?php echo $rowstocktype['sttr_pkt_weight2']; ?>=<?php echo $multiple = $rowstocktype['sttr_pkt_qty2'] * $rowstocktype['sttr_pkt_weight2']; ?>)</td>
                        </tr>
                        <?php } ?>
                         <?php 
                        if($rowstocktype['sttr_pkt_desc3'] !=''){
                        ?>
                        <tr>
                                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" style="border: none;"><?php echo $rowstocktype['sttr_pkt_desc3']; ?>(<?php echo $rowstocktype['sttr_pkt_qty3']; ?>X<?php echo $rowstocktype['sttr_pkt_weight3']; ?>=<?php echo $multiple = $rowstocktype['sttr_pkt_qty3'] * $rowstocktype['sttr_pkt_weight3']; ?>)</td>
                        </tr>
                        <?php 
                        }
                        ?>
                        <?php 
                        if($rowstocktype['sttr_pkt_desc4'] !=''){
                        ?>
                        <tr>
                                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" style="border: none;"><?php echo $rowstocktype['sttr_pkt_desc4']; ?>(<?php echo $rowstocktype['sttr_pkt_qty4']; ?>X<?php echo $rowstocktype['sttr_pkt_weight4']; ?>=<?php echo $multiple = $rowstocktype['sttr_pkt_qty4'] * $rowstocktype['sttr_pkt_weight4']; ?>)</td>
                        </tr>
                        <?php } ?>
                        <?php 
                        if($rowstocktype['sttr_pkt_desc5'] !=''){
                        ?>
                        <tr>
                                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" style="border: none;"><?php echo $rowstocktype['sttr_pkt_desc5']; ?>(<?php echo $rowstocktype['sttr_pkt_qty5']; ?>X<?php echo $rowstocktype['sttr_pkt_weight5']; ?>=<?php echo $multiple = $rowstocktype['sttr_pkt_qty5'] * $rowstocktype['sttr_pkt_weight5']; ?>)</td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php echo $rowstocktype['sttr_gs_weight'].'  '.$rowstocktype['sttr_gs_weight_type']; ?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php
                if( $rowstocktype['sttr_pkt_weight'] !='' &&  $rowstocktype['sttr_pkt_weight'] != null &&  $rowstocktype['sttr_pkt_weight'] > 0){
                    echo $rowstocktype['sttr_pkt_weight'].'  '.$rowstocktype['sttr_pkt_weight_type']; 
                } else{
                    echo '-'; 
                }
                ?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php
                if( $rowstocktype['sttr_nt_weight'] !='' &&  $rowstocktype['sttr_nt_weight'] != null &&  $rowstocktype['sttr_nt_weight'] >0){
                echo $rowstocktype['sttr_nt_weight'].'  '.$rowstocktype['sttr_nt_weight_type'];
                }else{
                    echo '-';
                }
                ?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php
                if( $rowstocktype['sttr_purity'] !='' &&  $rowstocktype['sttr_purity'] != null &&  $rowstocktype['sttr_purity'] >0){
                echo $rowstocktype['sttr_purity']; 
                }else{
                    echo '-';
                }?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php 
                if( $rowstocktype['sttr_wastage'] !='' &&  $rowstocktype['sttr_wastage'] != null &&  $rowstocktype['sttr_wastage'] >0){
                echo $rowstocktype['sttr_wastage'];
                }else{
                    echo '-';
                }?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php 
                  if( $rowstocktype['sttr_quantity'] !='' &&  $rowstocktype['sttr_quantity'] != null &&  $rowstocktype['sttr_quantity'] >0){
                echo $rowstocktype['sttr_quantity'];
                  }else{
                      echo '-';
                  } ?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php
                if( $rowstocktype['sttr_making_charges'] !='' &&  $rowstocktype['sttr_making_charges'] != null &&  $rowstocktype['sttr_making_charges'] >0){
                echo $rowstocktype['sttr_making_charges'].'  '.$rowstocktype['sttr_making_charges_type']; 
                }else{
                    echo '-';
                }?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top"><?php  
                 if( $rowstocktype['sttr_final_fine_weight'] !='' &&  $rowstocktype['sttr_final_fine_weight'] != null &&  $rowstocktype['sttr_final_fine_weight'] >0){
                echo $rowstocktype['sttr_final_fine_weight'].'  '.$rowstocktype['sttr_gs_weight_type'];
                 }else{
                     echo '-';
                 }?></td>
                <td class="invoiceWholesaleBoder invoiceWholesaleStyle" valign="top" align="right" style="padding-right: 10px; "><?php
                if( $rowstocktype['sttr_total_making_amt'] !='' &&  $rowstocktype['sttr_total_making_amt'] != null &&  $rowstocktype['sttr_total_making_amt'] >0){
                echo $rowstocktype['sttr_total_making_amt']; 
                }else{
                     echo '-';
                }?></td>
            </tr>
            <?php 
            $fineWtTotal += $rowstocktype['sttr_final_fine_weight'];
            $makingTotalAnt += $rowstocktype['sttr_total_making_amt'];
            
                } ?>
            <tr>
                <td colspan="9" class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Total S</td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle"><?php echo $fineWtTotal.'  KG'; ?></td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle" align="right" style="padding-right: 10px; "><?php echo $makingTotalAnt; ?></td>
            </tr>
            <tr>
                <td colspan="9" class="invoiceWholesaleBoder invoiceWholesaleStyletitle">LB Bal.</td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle"><?php 
                if($utin_sl_prev_wt_typ == 'GM'){
                    $convertedprevWet = $utin_sl_prev_wt/1000;
                    echo $convertedprevWet.'  KG';
                }else{
                    $convertedprevWet = $utin_sl_prev_wt;
                echo $utin_sl_prev_wt.$utin_sl_prev_wt_typ; 
                } ?></td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle" align="right" style="padding-right: 10px; "><?php echo $utin_prev_cash_bal; ?></td>
            </tr>
            <tr>
                <td colspan="9" class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Net Total</td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle"><?php
                 $totalfinenetweight = $fineWtTotal + $convertedprevWet;
                 echo $totalfinenetweight.'  KG';
                ?></td>
                <td  class="invoiceWholesaleBoder invoiceWholesaleStyle" align="right" style="padding-right: 10px; "><?php
                $totalMakingNetWeight = $makingTotalAnt + $utin_prev_cash_bal;
                 echo $totalMakingNetWeight;
                ?></td>
            </tr>
            <tr>
                <td colspan="9" class="invoiceWholesaleBoder invoiceWholesaleStyletitle">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-size: 14px;">S. SILVER BHAV @<?php echo $utin_sl_cash_metal_rate; ?></td>
                            </tr>
                        <td>RECEPIT CASH</td>
            </tr>
        </tbody>
    </table>
</td>
<td class="invoiceWholesaleBoder" valign="top">
    <table>
        <tbody><tr>
                <td style="font-size: 14px;" valign="top"><?php 
                $convertSilverWeightToKg = $utin_sl_cash_metal_rec_paid_wt/1000;
                echo $convertSilverWeightToKg.'  KG'; ?></td>
            </tr>
            <tr>
                <td style="font-size: 14px;" valign="top"></td>
            </tr>
        </tbody></table>
</td>
<td class="invoiceWholesaleBoder" valign="top" align="right" style="padding-right: 10px; ">
    <table>
        <tbody>
            <tr valign="top">
                <td style="font-size: 14px;" valign="top" align="right"><?php echo $utin_sl_cash_metal_rec_paid; ?></td>
            </tr>
            <tr valign="top">
                <td style="font-size: 14px;" valign="top" align="right"><?php 
                $recepitAmt = $utin_cash_amt_rec + $utin_pay_cheque_amt + $utin_pay_card_amt + $utin_online_pay_amt;
                echo $recepitAmt; ?></td>
            </tr>
        </tbody></table>
</td>
</tr>
<tr>
    <td colspan="9" class="invoiceWholesaleBoder invoiceWholesaleStyletitle">Closing balance</td>
    <td  class="invoiceWholesaleBoder invoiceWholesaleStyle"><?php
    if($utin_sl_due_wt >0){
        $DRCRVaravle = 'DR';
    } else {
        $DRCRVaravle = 'CR';
    }
     if($utin_sl_due_wt_typ == 'GM'){
         $convertedKgDataClosingBal = $utin_sl_due_wt/1000;
         echo $convertedKgDataClosingBal. '  '.'KG'.' <br>' .$DRCRVaravle;
     }else{
    echo $utin_sl_due_wt.$utin_sl_due_wt_typ. ' <br>' .$DRCRVaravle ;
     }
    ?></td>
    <td  class="invoiceWholesaleBoder invoiceWholesaleStyle" align="right" style="padding-right: 10px; "><?php 
     if($utin_cash_balance >0){
        $DRCRVaravle = 'DR';
    } else {
        $DRCRVaravle = 'CR';
    }
    echo $utin_cash_balance. '<br>' .$DRCRVaravle ;
   
    ?></td>
</tr>
</tbody>
</table>
    <div style="margin-top: 14px;">
        <span style="font-size: 15px;text-decoration: underline;font-weight: 700;">Terms & Conditions : </span> <br>
   <span  style="font-size: 15px;">Please check your last balance.<br>
   Please check your deposite money and metal.<br>
   Check your total weight.<br>
   Credit balance only allowed for 15 days<br>
   Zero balance Compalsary 2 times in a year.<br>
   If your credit score is negative then your balance facility will be closed.<br></span>
    </div>
</div>
<div class="noPrint" style="display:flex;justify-content:center;align-items: center;">
                   <a style="cursor: pointer;" 
                       onClick="window.print();">
                        <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'  class="noPrint"
                             width="32px" height="32px" /> 
                    </a>
                </div>