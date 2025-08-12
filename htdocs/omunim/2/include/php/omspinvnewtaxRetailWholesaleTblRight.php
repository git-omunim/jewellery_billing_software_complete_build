
<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice Details
 * **************************************************************************************
 * 
 * Created on Dec 19, 2013 2:54:49 PM
 *
 * @FileName: omspinvnewtaxRetailWholesaleTblRight.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com*/
?>

                        <tr class="insec1">
                            <?php
        $fieldName = 'sNo';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $srNoPresent = 'Y';
            ?>
                            <td align = "left" class = "ff_calibri font_color_<?php echo $label_field_font_color; ?>" style = "font-size:<?php echo $label_field_font_size; ?>px" title = "S.NO">
                                <?php
                                if ($slPrindicator != 'stockCrystal') {
                                    echo $SrNo;
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                            <?php
                        }
                        
                        $fieldName = 'itemId';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>

                            <td align="center" style="text-align: left; font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $slPrItemId; ?></td>
                            <?php
                        }
                         if ($sellEstimateDetails != 'NO') {
                        $fieldName = 'itemDesc';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            $selReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'itemNameLangType'";
                            $resReqLang = mysqli_query($conn, $selReqLang);
                            $rowReqLang = mysqli_fetch_array($resReqLang);
                            $reqLang = $rowReqLang['omly_value'];

                            if ($reqLang == 'Marathi' || $reqLang == 'Hindi' || $reqLang == 'Gujarati' || $reqLang == 'Tamil' || $reqLang == 'Telugu') {
                                $selReqItem = "SELECT itm_nm_name_lang FROM item_name WHERE itm_nm_name = '$slPrItemName' and itm_nm_name_lang_typ = '$reqLang' and itm_nm_metal = '$slPrMetalType'";
                                $resReqItem = mysqli_query($conn, $selReqItem);
                                $rowReqItem = mysqli_fetch_array($resReqItem);
                                $reqItem = $rowReqItem['itm_nm_name_lang'];
                            }
                            ?>
                            <td style="text-align: left; padding-left: 1px; font-size: <?php echo $label_field_font_size; ?>px; ">
                                <?php
                                echo $slPrItemName;
                                //
                                ?>
                            </td>
                        <?php
                        }
                         }
                         $fieldName = 'QTY';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $QTY = $label_field_check;
                        if ($QTY == 'true') {
                            ?>
                            <td align="center" style="padding-right: 1; text-align: right; font-size: <?php echo $label_field_font_size; ?>px;">
                            <?php echo $slPrItemQty; ?> 
                            </td>    
                        <?php }                       
                            $fieldName = 'itemGsWt';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $itemGsWt = $label_field_check;
                        if ($itemGsWt == 'true') {
                            ?>
                            <td align="center" style="padding-right: 1; text-align: right; font-size: <?php echo $label_field_font_size; ?>px;">
                                <?php
                                $fieldName = 'itemWtType';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $itemWtType = $label_field_check;

                                if ($itemWtType == 'true') {
                                    $gsWtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                    $cryGsWtType = $rowCrystalDet['slprcry_gs_wt_type'];
                                }
                                echo decimalVal($slPrItemGSW, 3) . " " . $gsWtType;
                                ?>
                            </td>
                        <?php
                        }
                        $label_field_check = '';
                        $fieldName = 'itemPurity';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {

                            //add Author:GAUR22JUL16
                            $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
                            $resReqTunch = mysqli_query($conn, $selReqTunch);
                            $rowReqTunch = mysqli_fetch_array($resReqTunch);
                            $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                            ?>
                            <td align="center" style="font-size: <?php echo $label_field_font_size; ?>px;">
                                <?php
                                if ($reqTunch == '' && $reqTunch == NULL) {
                                    if ($slPrMetalPutity != '') {
                                        echo $slPrMetalPutity . ' %';
                                    }
                                } else {
                                    echo $reqTunch;
                                }
                                ?>
                            </td>
                        <?php } ?>
                            <?php
                        $fieldName = 'itemNtWt';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>
                            <td align="center" style="padding-right: 1; text-align: right; font-size: <?php echo $label_field_font_size; ?>px;">
                                <?php
                                $fieldName = 'itemWtType';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $itemWtType = $label_field_check;

                                if ($itemWtType == 'true') {
                                    $ntWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                                }
                                echo decimalVal($slPrItemNTW, 3) . " " . $ntWtType;
                                ?>
                            </td>
                        <?php } ?>
                            <?php
                             $fieldName = 'labour';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            ?>
            <td align="center" style="padding-right: 1; text-align: right; font-size: <?php echo $label_field_font_size; ?>px;">
               
                            
                                <?php
                                if ($slPrItemLabChargsval != '') {
                                    if ($slPrItemLabChrgsType == 'per')
                                        echo $slPrItemLabChargs . ' %';
                                    else
                                        echo $slPrItemLabChargs . ' ' . $slPrItemLabChrgsType;
                                } else if ($sttr_making_charges != '') {
                                    if ($sttr_making_charges_type == 'per')
                                        echo $sttr_making_charges . ' %';
                                    else
                                        echo $sttr_making_charges . ' ' . $sttr_making_charges_type;
                                } else {
                                    echo "-";
                                }
                                ?>
                          
            </td>
        <?php } ?>
            <?php 
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'mkg_chrg_val';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $sttrtotalmkgpresent == 'yes') {
                ?>
                <td align="center" style="padding-right: 1; text-align: right; font-size: <?php echo $label_field_font_size; ?>px;">
                    
                                    <?php
                                    if ($sttr_total_making_charges != 0) {
                                        echo ($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                    } else {
                                        echo"-";
                                    }
                                    ?>
                          
                </td>
                <?php
            }
            }
            ?>
                        <?php
                        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                            $fieldName = 'metal_val';
                            $label_field_check = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                ?>
                                <td align="center" style="font-size: <?php echo $label_field_font_size; ?>px;">
                                    <?php
                                    if ($sttr_valuation != 0) {
                                        if (($paymentMode == 'NoRateCut' && $sttrIndicator == 'stockCrystal') || $paymentMode != 'NoRateCut') {
                                            if ($sttrIndicator == 'stockCrystal') {
                                                echo formatInIndianStyle($sttr_valuation);
                                            } else {
                                                echo formatInIndianStyle($sttr_metal_amt);
                                            }
                                        } 
                                    }
                                    ?>
                                </td>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        $fieldName = 'vat';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>

                            <td align="left" style="text-align: center; font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $sttr_tax; ?></td>
                        <?php } ?>

                        <?php
                        $fieldName = 'vatAmt';
                        $label_field_check = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>

                            <td align="left" style="text-align: center; font-size: <?php echo $label_field_font_size; ?>px; "><?php echo $slTax; ?></td>
                        <?php } ?>
                        <?php
                        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                            $fieldName = 'amt';
                            $label_field_check = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true' && $paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                                ?>
                                <td align="right"  style=" font-size: <?php echo $label_field_font_size; ?>px;">
                                    <?php
                                    if ($paymentMode != 'NoRateCut' || $sttrIndicator == 'stockCrystal') {
                                            if ($panelName == 'DeliveredOrderInvoice' || $panelName == 'PendingOrderInvoice') { // 13DEC2018
                                            echo formatInIndianStyle($slPrItemFinVal);
                                        } else if ($noOfCry == 0 && $sttrIndicator != 'stockCrystal') {                                                 
                                            echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation);
                                        } else if ($noOfCry > 0 && $noOfRows > 0) {
                                            echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation); // for crystal amt valuation Author:DIKSHA 05April2019
                                        }
//                                                         
                                    } else {
                                        echo " ";
                                    }
                                    if ($noOfCry > 0) {
                                        $qSelCrystalVal = "SELECT sttr_valuation FROM stock_transaction WHERE "
                                                . "sttr_owner_id = '$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
                                                . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
                                        $resCrystalVal = mysqli_query($conn, $qSelCrystalVal);
                                        while ($rowCrystalVal = mysqli_fetch_array($resCrystalVal, MYSQLI_ASSOC)) {
                                            $sttr_other_info = $rowSlPrItemDetails['sttr_other_info']; // OTHER INFO
                                            ?>

                                            <?php
                                        }
                                    }
                                    ?>
                                </td>
                            <?php }
                        } ?>
                            
                        </tr>
                        

       
