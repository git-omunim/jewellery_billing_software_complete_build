<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 * file name : omspnewItemReturnTblRight.php
 */
?>
<?php
//$silverInvPur = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvPurSilver'";
//$resSlPur = mysqli_query($conn, $silverInvPur);
//$rowSlPur = mysqli_fetch_array($resSlPur);
$silverPurIndicator = $getLayoutDetails['InvPurSilver'];
if ($counter == '') {
    ?>
    <thead>
        <tr class="table-head">
            <?php
//        $fieldName = 'sNo';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($sNo_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemSNoLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemSNoLb_size; ?>px; "><?php echo $itemSNoLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemId';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($itemId_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemIdLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="left" style="padding-left: 5px; font-size: <?php echo $itemIdLb_size; ?>px;"><?php echo $itemIdLb_content; ?></th>
                <?php
            }
            //
//        $fieldName = 'design';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($design_check == 'true' && $designpresent == 'yes') {
                $totalColumns++;
//            $fieldName = 'designLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?> 
                <th align="center" style="font-size: <?php echo $designLb_size; ?>px;"><?php echo $designLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemDesc';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemDesc_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemDescLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="left" style="font-size: <?php echo $itemDescLb_size; ?>px;"><?php echo $itemDescLb_content; ?></th>
                <?php
            }
            if ($itemCategory_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemDescLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="left" style="font-size: <?php echo $itemcategoryLb_size; ?>px;"><?php echo $itemcategoryLb_content; ?></th>
                <?php
            }
//        $fieldName = 'brandName';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($brandName_check == 'true' && $brand == 'yes') {
                $totalColumns++;
//            $fieldName = 'itemBrandNameLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemBrandNameLb_size; ?>px;"><?php echo $itemBrandNameLb_content; ?></th>
                <?php
            }
            //<!--START TO ADDED ITEM CATEGORY @SIMRAN-31JAN2022-->  
        
            //<!--END TO ADDED ITEM CATEGORY @SIMRAN-31JAN2022--> 
//        $fieldName = 'hallMarkUid';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($hallMarkUid_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemHallMarkLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemHallMarkLb_size; ?>px;"><?php echo $itemHallMarkLb_content; ?></th>
                <?php
            }

//        $fieldName = 'QTY';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($QTY_check == 'true') {
                $totalColumns++;
                if ($labelType == 'APPROVAL') {
                    $fieldName = 'itemQtyLb';
                } else {
                    $fieldName = 'QTYLB';
                }
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                  $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                  $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                  $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                ?>
                <th align="center" style="font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></th>
                <?php
            }
//        $fieldName = 'unitPrice';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($unitPrice_check == 'true') {
                $totalColumns++;
//            $fieldName = 'unitPriceLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $unitPriceLb_size; ?>px;"><?php echo $unitPriceLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemHSN';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($itemHSN_check == 'true' && $hsnpresent == 'yes') {
                $totalColumns++;
//            $fieldName = 'itemHSNLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemHSNLb_size; ?>px;"><?php echo $itemHSNLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemSize';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemSize_check == 'true' && $sizePresent == 'yes') {
                $totalColumns++;
//            $fieldName = 'itemSizeLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemSizeLb_size; ?>px;"><?php echo $itemSizeLb_content; ?></th>
                <?php
            }
//        $fieldName = 'OtherInfo';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($OtherInfo_check == 'true' && $otherinfo == 'yes') {
                $totalColumns++;
//            $fieldName = 'itemotherinfoLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
            <th align="center" style="font-size: <?php echo $itemotherinfoLb_size; ?>px;"><?php echo $itemotherinfoLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemGsWt';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemGsWt_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemGsWtLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="right" style="font-size: <?php echo $itemGsWtLb_size; ?>px;"><?php echo $itemGsWtLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemPktWt'; //Start add code for pkt wt Author:SANT08APR17
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemPktWt_check == 'true' && $pkwtpresent == 'yes') {
                $totalColumns++;
//            $fieldName = 'itemPktWtLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="right" style="font-size: <?php echo $itemPktWtLb_size; ?>px;"><?php echo $itemPktWtLb_content; ?></th>
                <?php
            }
//        $fieldName = 'itemNtWt';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemNtWt_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemNtWtLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="right" style="font-size: <?php echo $itemNtWtLb_size; ?>px;"><?php echo $itemNtWtLb_content; ?></th>
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//            $fieldName = 'itemProcessWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($processwtpresent == 'yes' && $itemProcessWt_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'itemProcessWtLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="right" style="font-size: <?php echo $itemProcessWtLb_size; ?>px;"><?php echo $itemProcessWtLb_content; ?></th>
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut') {
//            $fieldName = 'valAddedAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($valAddedAmt_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'valAddedAmtLb';
//                $label_field_content = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $valAddedAmtLb_size; ?>px;"><?php echo $valAddedAmtLb_content; ?></th>          
                    <?php
                }
            }

//        $fieldName = 'itemPurity';
//        $label_field_content = '';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //
            if ($itemPurity_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemPurityLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemPurityLb_size; ?>px;"><?php echo $itemPurityLb_content; ?></th>  
                <?php
            }
            if ($itemCustWsWt_check == 'true') {
            $totalColumns++; ?>
                <th align="center" style="font-size: <?php echo $itemCustWsWtLb_size; ?>px;"><?php echo $itemCustWsWtLb_content; ?></th> 
         <?php }
//        $fieldName = 'itemWSWt';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemWSWt_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemWsWtLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo "SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                ?>
                <th align="center" style="font-size: <?php echo $itemWsWtLb_size; ?>px;"><?php echo $itemWsWtLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'itemFinalPurity';
//        $label_field_content = '';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFinalPurity_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemFinalPurityLb';
//            echo parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo "SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                ?>
                <th align="center" style="font-size: <?php echo $itemFinalPurityLb_size; ?>px;"><?php echo $itemFinalPurityLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'itemFinalPurityWtCsWs';
//        $label_field_content = '';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFinalPurityWtCsWs_check == 'true') {
//            $totalColumns++;
//            $fieldName = 'itemFinalPurityWtCsWsLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $itemFinalPurityWtCsWsLb_size; ?>px;"><?php echo $itemFinalPurityWtCsWsLb_content; ?></th>
                <?php
            }

            // <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
//        $fieldName = 'valAdded';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($valAdded_check == 'true' && $custwasatagepresent == 'yes') {
                $totalColumns++;

//            $fieldName = 'valAddedLb';
//            $label_field_content = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $valAddedLb_size; ?>px;"><?php echo $valAddedLb_content; ?></th>  
                <?php
            }
            // <!--END CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022--> 
  
//        $fieldName = 'itemFfnWt';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFfnWt_check == 'true') {
                $totalColumns++;
//            $fieldName = 'itemFfnWtLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
            <th align="center" style="font-size: <?php echo $itemFfnWtLb_size; ?>px;"><?php echo $itemFFNWtLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'metalRateByPurity';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $label_field_check1 = $metalRateByPurity_check;
            //
//        $fieldName = 'metalRate';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($metalRate_check == 'true' || $label_field_check1 == 'true') {
                $totalColumns++;
//            $fieldName = 'metalRateLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $metalRateLb_size; ?>px;"><?php echo $metalRateLb_content; ?></th> 
                <?php
            }
            //
            if ($rateByPurity_check == 'true') {
                $totalColumns++;
//            $fieldName = 'metalRateLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $rateByPurityLb_size; ?>px;"><?php echo $rateByPurityLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'labour';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($labour_check == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
                $totalColumns++;
//            $fieldName = 'labourLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $labourLb_size; ?>px;"><?php echo $labourLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'val';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($val_check == 'true') {
                $totalColumns++;
//            $fieldName = 'valLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo '$label_field_content=='.$label_field_content.'<br>';
                ?>
            <th align="center" style="font-size: <?php echo $valLb_size; ?>px;"><?php echo $valLb_content;?></th> 
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                $totalColumns++;
                $fieldName = 'discountchargePer';
                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_check as label_field_check_per FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $label_field_check_per = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
               
                $fieldName = 'discountchargeAmt';
//                parse_str(getTableValues("SELECT label_field_check as label_field_check_amt FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));          
                  $label_field_check_amt = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
               
                if (($label_field_check_per == 'true' || $label_field_check_amt == 'true') && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES')) && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                    $totalColumns++;
//                $fieldName = 'discountchargeLB';
////                echo 'discount';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $discountchargeLB_size; ?>px;"><?php echo $discountchargeLB_content; ?></th> 
                    <?php
                }
            }
//        $fieldName = 'mkgAfterDisPer';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check  FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($mkgAfterDisPer_check == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
//            echo 'j';
                $totalColumns++;
//            $fieldName = 'mkgAfterDisPerLb';
//            $label_field_content = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            echo ''
                ?>
                <th align="center" style="font-size: <?php echo $mkgAfterDisPerLb_size; ?>px;"><?php echo $mkgAfterDisPerLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'mkgAfterDisGm';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check  FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($mkgAfterDisGm_check == 'true' && $mkgAfterDiscInGmPresent == 'YES') {
                $totalColumns++;
//            $fieldName = 'mkgAfterDisGmLb';
//            $label_field_content = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
            <th align="center" style="font-size: <?php echo $mkgAfterDisGmLb_size; ?>px;"><?php echo $mkgAfterDisGmLb_content; ?></th> 
                <?php
            }
//        $fieldName = 'labourVal';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($labourVal_check == 'true' && $labchargepresent == 'yes') {
                $totalColumns++;
//            $fieldName = 'labourLbVal';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $labourLbVal_size; ?>px;"><?php echo $labourLbVal_content; ?></th> 
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

//            $fieldName = 'metal_val';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($metal_val_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'metal_vallb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $metal_vallb_size; ?>px;"><?php echo $metal_vallb_content; ?></th> 
                    <?php
                }
            }
            //
//            $fieldName = 'mkg_chrg_val';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($mkg_chrg_val_check == 'true') {
                                    if ($sttr_total_making_charges == '0.00' || $sttr_total_making_charges != '0.00' || $sttr_total_making_charges == NULL || $sttr_total_making_charges == ''){

                    $totalColumns++;
//                $fieldName = 'mkg_lb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $mkg_lb_size; ?>px;"><?php echo $mkg_lb_content; ?></th>
                    <?php
                }
            }
            //START CODE TO ADDED HALLMARK CHARGES @SIMRAN24APR2023
            if ($hallmarkingCharges_check == 'true') {
                //if ($sttr_hallmark_charges != 0) {    
                $totalColumns++;
                ?>
                <th align="center" style="font-size: <?php echo $hallmarkingChargesLb_size; ?>px;"><?php
                    if ($hallmarkingCharges_check = 'true')
                        echo $hallmarkingChargesLb_content;
                    else
                        echo '-';
                    //echo $hallmarkingChargesLb_content; ?></th>
                <?php
                //}
            }
            //END CODE TO ADDED HALLMARK CHARGES @SIMRAN24APR2023
            //
            //START CODE TO ADDED TAX PERCENTAGE @SIMRAN24APR2023
            //
        if ($taxPercentage_check == 'true') { ?>              
                <th align="center" style="font-size: <?php echo $taxPercentageLb_size; ?>px;" ><?php echo $taxPercentageLb_content; ?></th>
                <?php
                
            }
            //
            //END CODE TO ADDED TAX PERCENTAGE @SIMRAN24APR2023
            //
//            $fieldName = 'othChrg';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($othChrg_check == 'true') {
                if ($otherChargesPresent == 'yes') {
                    $totalColumns++;
//                    $fieldName = 'othChrgLb';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $othChrgLb_size; ?>px;"><?php echo $othChrgLb_content; ?></th>
                    <?php
                }
            }
            //START CODE FOR ST COLOR AND CLARITY @AUTHOR SIMRAN-20SEPT2022
//            $fieldName = 'stColor';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($stColor_check == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
                $totalColumns++;
//            $fieldName = 'stColorLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="left" style="padding-left: 5px; font-size: <?php echo $stColorLb_size; ?>px;"><?php echo $stColorLb_content; ?></th>
                <?php
            }
//        $fieldName = 'stClarity';
//        $label_field_check = '';
//        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($stClarity_check == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
                $totalColumns++;
//            $fieldName = 'stClarityLb';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size, label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="left" style="padding-left: 5px; font-size: <?php echo $stClarityLb_size; ?>px;"><?php echo $stClarityLb_content; ?></th>
                <?php
            }
            //END CODE FOR ST COLOR AND CLARITY @AUTHOR SIMRAN-20SEPT2022
        
//            $fieldName = 'TotalVa';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($TotalVa_check == 'true') {
                $totalColumns++;
//                $fieldName = 'TotalVaLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $TotalVaLb_size; ?>px;"><?php echo $TotalVaLb_content; ?></th>
                <?php
            }
//            $fieldName = 'total_valwithmkg';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($total_valwithmkg_check == 'true') {
                $totalColumns++;
//                $fieldName = 'total_valwith_mkglb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <th align="center" style="font-size: <?php echo $total_valwith_mkglb_size; ?>px;"><?php echo $total_valwith_mkglb_content; ?></th> 
                <?php
            }

            if ($paymentMode != 'NoRateCut') {
//            $fieldName = 'totalCrystal';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totalCrystal_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'totalCrystallb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $totalCrystallb_size; ?>px;"><?php echo $totalCrystallb_content; ?></th> 
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
//            $fieldName = 'itemCombineGstPer';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($itemCombineGstPer_check == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                    $totalColumns++;
//                $fieldName = 'itemCombineGstPerLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $itemCombineGstPerLb_size; ?>px;"><?php echo $itemCombineGstPerLb_content; ?></th> 
                    <?php
                }
//            $fieldName = 'itemCombineGstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($itemCombineGstAmt_check == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                    $totalColumns++;
//                $fieldName = 'itemCombineGstAmountLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $itemCombineGstAmountLb_size; ?>px;"><?php echo $itemCombineGstAmountLb_content; ?></th> 
                    <?php
                }

//            $fieldName = 'cgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($cgstAmt_check == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                    $totalColumns++;
//                $fieldName = 'cgstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $cgstLb_size; ?>px;"><?php echo $cgstLb_content; ?></th> 
                    <?php
                }
                //
//            $fieldName = 'totcgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totcgstAmt_check == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                    $totalColumns++;
//                $fieldName = 'totcgstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="right" style="font-size: <?php echo $totcgstLb_size; ?>px;"><?php echo $totcgstLb_content; ?></th> 
                    <?php
                }
                //
//            $fieldName = 'sgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($sgstAmt_check == 'true' && $sgstpresent == 'yes') {
                    $totalColumns++;
//                $fieldName = 'sgstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $sgstLb_size; ?>px;"><?php echo $sgstLb_content; ?></th> 
                    <?php
                }
//            $fieldName = 'totsgstAmt';
//            $label_field_check = '';
////            if ((($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) || (($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0)) && $custInvLay != 'InvLayWoGst') {
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totsgstAmt_check == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                    $totalColumns++;
//                $fieldName = 'totsgstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="right" style="font-size: <?php echo $totsgstLb_size; ?>px;"><?php echo $totsgstLb_content; ?></th>    
                    <?php
                }
//            $fieldName = 'igstAmt';
//            $label_field_check = '';
                //  if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0)) || (($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0)) && $custInvLay != 'InvLayWoGst') {
//                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($igstpresent == 'yes' && $igstAmt_check == 'true') {
                    $totalColumns++;
//                    $fieldName = 'igstLb';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $igstLb_size; ?>px;"><?php echo $igstLb_content; ?></th> 
                    <?php
                }
                //  }
//            $fieldName = 'totigstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totigstAmt_check == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                    $totalColumns++;
//                echo 'hiii';
//                $fieldName = 'totigstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="right" style="font-size: <?php echo $totigstLb_size; ?>px;"><?php echo $totigstLb_content; ?></th> 
                    <?php
                }
//            $fieldName = 'totgstAmt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totgstAmt_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'totgstLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <th align="center" style="font-size: <?php echo $totgstLb_size; ?>px;"><?php echo $totgstLb_content; ?></th>
                    <?php
                }
//            $fieldName = 'itemFixedMrpPrice';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($itemFixedMrpPrice_check == 'true') {
                    $totalColumns++;
//                $fieldName = 'itemFixedMrpPriceLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($itemFixedMrpPriceLb_size == 0) {
                        $itemFixedMrpPriceLb_size = 14;
                    }
                    ?>
                    <th align="right" style="font-size: <?php echo $itemFixedMrpPriceLb_size; ?>px;"><?php echo $itemFixedMrpPriceLb_content; ?></th> 
                    <?php
                }
                $fieldName = 'diamondValuetion';
                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_check as diamondValuechk FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $diamondValuechk = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                  
                if ($diamondValuechk == 'true' && $crystalPresent == 'yes') {
                    $totalColumns++;
                    $fieldName = 'diamondValuetionLb';
//                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                      $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                      $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                      $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                    ?>
                    <th align="right" style="font-size: <?php echo $amtLb_size; ?>px;"><?php echo $label_field_content; ?></th>  
                    <?php
                }
//            $fieldName = 'amt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($amt_check == 'true' && $paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                    $totalColumns++;
//                $fieldName = 'amtLb';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                <th align="right" style="font-size: <?php echo $amtLb_size; ?>px;"><?php echo $amtLb_content;  ?></th>  
                    <?php
                }
            }
            ?>      
        </tr>
    <?php }
    ?>
</thead>
<tbody class="table-innerSec">

    <?php
    $counter = 2; {
        ?>
        <tr>
            <?php
//            $fieldName = 'sNo';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if ($sNo_check == 'true') {
                $srNoPresent = 'Y';
                ?>
                <td align="center" style= "font-size: <?php echo $sNo_size; ?>px; "><?php
        if ($slPrindicator != 'stockCrystal') {
            echo $SrNo;
        } else {
            echo '';
        }
                ?></td>
                    <?php
            }

//            $fieldName = 'itemId';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemId_check == 'true') {
                ?>
                <td align="left" style="text-align: left; font-size: <?php echo $itemId_size; ?>px; "><?php echo $slPrItemId ."<br>".$slPrMetalType; ?></td>
                <?php
            }
//            $fieldName = 'design';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($design_check == 'true' && $designpresent == 'yes') {
                ?>
                <td align="center" style="padding-bottom: unset; padding-top: 1px;">
                    <?php if ($rowSlPrItemDetails['slpr_snap_fname'] != '') { ?>
                        <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$rowSlPrItemDetails[slpr_id]"; ?>&panelName=sellInvPanel&imgPanelName=snap',
                                                    'popup', 'width=400,height=400,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                            return false" >
                            <img src="<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo $rowSlPrItemDetails['slpr_id']; ?>&panelName=sellInvPanel" 
                                 width="64px" height="64px" border="0" style="border-color: #B8860B"/>
                        </a>
                        <?php
                    }
                    //
                    //parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_item_code='$slPrItmCode' and sttr_transaction_type!='sell'"));
                    //parse_str(getTableValues("SELECT * FROM image WHERE image_id='$sttr_image_id'"));
                    //
                    $imageFName = '';
                if ($invName == 'metalPurchase' || $invName == 'rawMetalSale') {
//                    parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction_sell_2022_2023 WHERE sttr_id='$slPrId'"));
                      foreach ($getStockTransDetails as $row) {
                          if($row['sttr_id'] == $slPrId){
                              $sttr_image_id = $getStockTransDetails[0]['sttr_image_id'];
                          }
                      }
                } else {
                    //
                    // add condition for show image : author @darshana 6 dec 2021
                    if ($slPrId != '' && $slPrId != NULL) {
                        // 
                        // CONDITION AND QUERY CHANGE FOR DISPLAY IMG PROPERLY WHEN MORE THAN ONE PRODUCT IS PRESENT : AUTHOR @DARSHANA 13 JAN 2022
//                        $selectImgId = "SELECT * FROM stock_transaction_sell_2022_2023 WHERE sttr_id='$slPrId'";
                        //
                        //echo '$selectImgId=='.$selectImgId.'<br>';
                        //
//                        $querySelectImgId = mysqli_query($conn, $selectImgId);
                        //
//                        while ($resSelctImgId = mysqli_fetch_array($querySelectImgId, MYSQLI_ASSOC)) {
                             foreach ($getStockTransDetails as $resSelctImgId) {
                             if($resSelctImgId['sttr_id']==$slPrId){
                            //
                            $sttr_sttr_id = $resSelctImgId['sttr_sttr_id'];
                            $sttr_image_id = $resSelctImgId['sttr_image_id'];
                            //
                            if ($sttr_image_id == '' || $sttr_image_id == NULL) {
                                //
                                $sttr_image_id = '';
                                //
//                                parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction_sell_2022_2023 "
//                                                       . "WHERE sttr_id='$sttr_sttr_id' "
//                                                       . "and sttr_indicator != 'stockCrystal' "
//                                                       . "and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
                                foreach ($getStockTransDetails as $item) {
                                if($item['sttr_id'] == $sttr_sttr_id && $item['sttr_indicator'] != 'stockCrystal' && $item['sttr_transaction_type'] != 'sell' && $item['sttr_transaction_type'] != 'ESTIMATESELL')  
                                {
                                   $sttr_image_id= $item['sttr_image_id'];
                                }
                                }
                                //
                            }
                            //
                        }
                    }
                        //
                    } else {
                        //
                        $sttr_image_id = '';
                        //
//                        parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction_sell_2022_2023 "
//                                               . "WHERE sttr_id='$rowSlPrItemDetails[sttr_sttr_id]' "
//                                               . "and sttr_indicator != 'stockCrystal' "
//                                               . "and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')"));
                       foreach ($getStockTransDetails as $item) {
                       if($item['sttr_id'] == $sttr_sttr_id && $item['sttr_indicator'] != 'stockCrystal' && $item['sttr_transaction_type'] != 'sell' && $item['sttr_transaction_type'] != 'ESTIMATESELL')  
                        {
                          $sttr_image_id= $item['sttr_image_id'];
                        }
                      }
                        //
                    }
                    //
                    //echo '$sttr_image_id 2== ' . $sttr_image_id . '<br />';
                    //
                    if ($sttrIndicator == 'stockCrystal') {
                        //
                        $sttr_image_id = '';
                        //
//                        parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction_sell_2022_2023 "
//                                               . "WHERE sttr_id = '$slPrId' and sttr_indicator = 'stockCrystal' "
//                                               . "and sttr_transaction_type IN ('sell')"));
//                        //
                         foreach ($getStockTransDetails as $item) {
                       if($item['sttr_id'] == $sttr_sttr_id && $item['sttr_indicator'] == 'stockCrystal' && $item['sttr_transaction_type'] == 'sell')  
                        {
                          $sttr_image_id= $item['sttr_image_id'];
                        }
                      }
                        //
                    }
                }
                    //
                    //
                    if ($sttr_image_id != NULL && $sttr_image_id != '') {
//                        parse_str(getTableValues("SELECT image_snap_fname FROM image WHERE image_id='$sttr_image_id'"));
                        $imageFName = $image_snap_fname;
                        $imageId = $sttr_image_id;
                    $noEcho = 'Y';
                    include('ogsprsim.php');
                    $noEcho = '';
                    }
                    //
                    if ($imageFName == '')
//                        parse_str(getTableValues("SELECT itm_nm_id,itm_nm_snap_fname FROM item_name WHERE itm_nm_name='$slPrItemName'"));
                    //
                    if ($sttr_image_id != '') {
                        ?>
                        <a style="cursor: pointer;" 
                           onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$sttr_image_id"; ?>',
                                                       'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                               return false" >
                                               <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($imageContent); ?>" 
                                 width="64px" height="64px" alt ="Item Design" border="0" style="border-color: #B8860B"/>
                        </a>
                        <?php
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
                <?php
            }
//            $fieldName = 'itemDesc';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemDesc_check == 'true') {
//                $selReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'itemNameLangType'";
//                $resReqLang = mysqli_query($conn, $selReqLang);
//                $rowReqLang = mysqli_fetch_array($resReqLang);
                $reqLang = $getLayoutDetails['itemNameLangType'];

//                if ($reqLang == 'Marathi' || $reqLang == 'Hindi' || $reqLang == 'Gujarati' || $reqLang == 'Tamil' || $reqLang == 'Telugu') {
//                    $selReqItem = "SELECT itm_nm_name_lang FROM item_name WHERE itm_nm_name = '$slPrItemName' and itm_nm_name_lang_typ = '$reqLang' and itm_nm_metal = '$slPrMetalType'";
//                    $resReqItem = mysqli_query($conn, $selReqItem);
//                    $rowReqItem = mysqli_fetch_array($resReqItem);
//                    $reqItem = $rowReqItem['itm_nm_name_lang'];
//                }
                ?>
                <td align="left">
                    <table>
                        <tr>
                            <td style="text-align: left; padding-left: 1px; font-size: <?php echo $itemDesc_size; ?>px; ">
                                <?php
                                echo $slPrItemName;
                                //
                                ?>
                            </td>
                        </tr>
                        <?php
//                        $fieldName = 'itemBarcode';
//                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($itemBarcode_check == 'true') {
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($itemBarcode_size == 0) {
                                $itemBarcode_size = 11;
                            }
                            ?>
                            <tr >
                                <td align="left" style="margin: 0; padding: 0; text-align: left; font-size: <?php echo $itemBarcode_size; ?>px; ">
                                    <?php
                                    if ($prodBarcode != '')
                                        echo '[BCD: ' . $prodBarcode . ']';
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <?php
                        $fieldName = 'itemHid';
//                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                          $label_field_check = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                        
                        if ($label_field_check == 'true') {
//                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $label_field_font_size = $getLabelDetails[strtolower($fieldName)]['label_field_font_size'];
                        $label_field_font_color = $getLabelDetails[strtolower($fieldName)]['label_field_font_color'];
                        $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                            if ($label_field_font_size == 0) {
                                $label_field_font_size = 11;
                            }
                            $fieldName = 'itemHidLb';
//                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $label_field_content = $getLabelDetails[strtolower($fieldName)]['label_field_content'];
                            ?>
                            <tr>
                                <td align="left" style="margin: 0; padding: 0; text-align: left; font-size: <?php echo $itemHidLb_size; ?>px; ">
                                    <?php
                                    if ($prodHallmarkUid != '' && $slPrindicator != 'stockCrystal') {
                                        if ($litemHidLb_content != '') {
                                            echo '[' . $itemHidLb_content . ' : ' . $prodHallmarkUid . ']';
                                        } else {
                                            echo '[' . $prodHallmarkUid . ']';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </td>
                <?php
            }
            if ($itemCategory_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $brandName_size; ?>px; "><?php
       
        echo $slPrItemCategory;
        
                ?>  <?php } ?> 
            </td>
            <?php
                   
//            $fieldName = 'brandName';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($brandName_check == 'true' && $brand == 'yes') {
                ?>
                <td align="left" style="font-size: <?php echo $brandName_size; ?>px; text-align: left; "><?php
        if ($slPrBrandName != '' || $slPrBrandName != NULL) {
            echo $slPrBrandName;
        } else {
                    ?>  <?php } ?> </td>
                    <?php
            }
            //
//            $fieldName = 'hallMarkUid';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//            
            if ($hallMarkUid_check == 'true') {
                ?>                 
                <?php
                if ($prodHallmarkUid != '' || $prodHallmarkUid != NULL) {
                    ?>
                    <td align="center">
                    <?php    echo $prodHallmarkUid; ?>                   
                    </td>  
                    <?php
                    }
                    else { ?>
                    <td> </td>
                    <?php }
                
                }
            //
            $fieldName = 'QTY';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($QTY_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $QTY_size; ?>px; "> <?php echo $slPrItemQty; ?> </td>
                <?php
            }
//            $fieldName = 'unitPrice';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($unitPrice_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $unitPrice_size; ?>px;">
                    <?php
                    if ($slUnitPrice != '') {
                        echo formatInIndianStyle($slUnitPrice);
                    } else {
                        echo " ";
                    }
                    ?> 
                </td>
                <?php
            }
//            $fieldName = 'itemHSN';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemHSN_check == 'true' && $hsnpresent == 'yes') {
                ?>
                <td align="center" style="font-size: <?php echo $itemHSN_size; ?>px; ">
                    <?php
                    if ($slPrItemHSN != '') {
                        echo $slPrItemHSN;
                    } else {
                        echo " ";
                    }
                    ?> 
                </td>
                <?php
            }
//            $fieldName = 'OtherInfo';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
//                            . "and label_type = '$labelType'"));
            if ($OtherInfo_check == 'true' && $otherinfo == 'yes') {
                ?>
                <td align="left" style="text-align: left; font-size: <?php echo $OtherInfo_size; ?>px;">
                    <?php
                    if ($sttr_other_info != '') {
                        echo $sttr_other_info;
                    } else {
                        echo " ";
                    }
                    ?> 
                </td>
                <?php
            }
//            $fieldName = 'itemSize';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
//                            . "and label_type = '$labelType'"));
            if ($sizePresent == 'yes' && $itemSize_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $itemSize_size; ?>px;">
                    <?php
                    if ($productSize != '') {
                        echo $productSize;
                    } else {
                        echo " ";
                    }
                    ?> 
                </td>
                <?php
            }
//            $fieldName = 'itemGsWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $itemGsWt = $itemGsWt_check;
            if ($itemGsWt == 'true') {
                ?>
                <td align="right" style="padding-right: 1; text-align: right; font-size: <?php echo $itemGsWt_size; ?>px;">
                    <?php
//                    $fieldName = 'itemWtType';
//                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $itemWtType = $itemWtType_check;

                    if ($itemWtType == 'true') {
                        $gsWtType = $rowSlPrItemDetails['sttr_gs_weight_type'];
                        $cryGsWtType = $rowCrystalDet['slprcry_gs_wt_type'];
                    }
                    echo decimalVal($slPrItemGSW, 3) . " " . $gsWtType;
                    ?>
                </td>
                <?php
            }
//            $fieldName = 'itemPktWt'; //Start add code for pkt wt Author:SANT08APR17
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemPktWt_check == 'true' && $pkwtpresent == 'yes') {
                ?>
                <td align="right" style="padding-right: 1; text-align: right; font-size: <?php echo $itemPktWt_size; ?>px;">
                    <?php
                    if ($slPrItemPKTW != 0) {
                        echo $slPrItemPKTW;
                    } else {
                        echo" ";
                    }
                    ?>
                </td>
                <?php
            }
//            $fieldName = 'itemNtWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemNtWt_check == 'true') {
                ?>
                <td align="right" style="padding-right: 1; text-align: right; font-size: <?php echo $itemNtWt_size; ?>px;">
                    <?php
//                    $fieldName = 'itemWtType';
//                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $itemWtType = $itemWtType_check;

                    if ($itemWtType == 'true') {
                        $ntWtType = $rowSlPrItemDetails['sttr_nt_weight_type'];
                    }
                    echo decimalVal($slPrItemNTW, 3) . " " . $ntWtType;
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//                $fieldName = 'itemProcessWt';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                                . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
//                                . "and label_type = '$labelType'"));

                if ($processwtpresent == 'yes' && $itemProcessWt_check == 'true') {
                    ?>
                    <td align="right" style="padding-right: 1; text-align: right; font-size: <?php echo $itemProcessWt_size; ?>px;">
                        <?php echo $slPrItemProcessW; ?>
                    </td>
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut') {
//                $fieldName = 'valAddedAmt';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($slPrValueAddedOp == 'byAmount' || $valAddedAmt_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $valAddedAmt_size; ?>px;">
                        <?php
                        if ($rowSlPrItemDetails['sttr_value_added'] != '') {
                            echo formatInIndianStyle($rowSlPrItemDetails['sttr_value_added']);
                            ?>
                            <?php
                        } else {
                            ?>
                            <?php echo " "; ?>
                            <?php
                        }
                        ?>
                    </td>
                    <?php
                }
            }
//            $fieldName = 'itemPurity';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //Adding Indicator Condition @Author:Vinod:06-05-2023
//               $silverInvPur = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvPurSilver'";
//                $resSlPur = mysqli_query($conn, $silverInvPur);
//                $rowSlPur = mysqli_fetch_array($resSlPur);
//                $silverPurIndicator = $rowSlPur['omly_value'];
            if ($itemPurity_check == 'true') {
                //add Author:GAUR22JUL16
//                $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
//                $resReqTunch = mysqli_query($conn, $selReqTunch);
//                $rowReqTunch = mysqli_fetch_array($resReqTunch);
//                $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                foreach ($getItemTunchDetails as $rowItemTunch) {
                        if ($rowItemTunch['itm_tunch_value'] == $slPrMetalPutity && $rowItemTunch['itm_tunch_metal_type'] == $slPrMetalType) {
                            $reqTunch = $rowItemTunch['itm_tunch_bctext'];
                        }
                    }
                ?>
                <td align="center" style="font-size: <?php echo $itemPurity_size; ?>px;">
                    <?php
                       if($slPrMetalType != 'Silver'){
                        if ($reqTunch != '' && $reqTunch != NULL) {
                            echo $reqTunch;
                        }
                        else if ($slPrMetalPutity != '') {
                            echo $slPrMetalPutity . ' %';
                        }
                       
                       }
                       else if($silverPurIndicator == 'true') {
                        if ($slPrMetalPutity != '') {
                            echo $slPrMetalPutity . ' %';
                        }
                    }
                       else{
                            '-' ;
                        }
                    //Adding Indicator Condition @Author:Vinod:06-05-2023
                    ?>
                </td>
                <?php
            }
            if ($_SESSION['sessionProdName'] != 'OMRETL') {
//                $fieldName = 'itemWSWt';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($itemCustWsWt_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $itemCustWsWt_size; ?>px;">
                        <?php
                        if ($slcustPrWastage != 0) {
                            echo $slcustPrWastage . ' %';
                        } else {
                            echo" ";
                        }
                        ?>
                    </td>
                    <?php
                }
            }
            if ($_SESSION['sessionProdName'] != 'OMRETL') {
//                $fieldName = 'itemWSWt';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($itemWSWt_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $itemWSWt_size; ?>px;">
                        <?php
                        if ($slPrWastage != 0) {
                            echo $slPrWastage . ' %';
                        } else {
                            echo" ";
                        }
                        ?>
                    </td>
                    <?php
                }
            }
            if ($_SESSION['sessionProdName'] != 'OMRETL') {

//                $fieldName = 'itemFinalPurity';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                echo "SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                if ($itemFinalPurity_check == 'true') {
//                    $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalFinalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
//                    $resReqTunch = mysqli_query($conn, $selReqTunch);
//                    $rowReqTunch = mysqli_fetch_array($resReqTunch);
//                    $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                     foreach ($getItemTunchDetails as $rowItemTunch) {
                        if ($rowItemTunch['itm_tunch_value'] == $slPrMetalPutity && $rowItemTunch['itm_tunch_metal_type'] == $slPrMetalType) {
                            $reqTunch = $rowItemTunch['itm_tunch_bctext'];
                        }
                    }
                    //Adding Indicator Condition @Author:Vinod:06-05-2023
                    ?>
                    <td align="center" style="font-size: <?php echo $itemFinalPurity_size; ?>px;">
                        <?php
                        if($silverPurIndicator=='true')
                        {
                            if ($reqTunch == '' && $reqTunch == NULL) {
                            if ($slPrMetalFinalPutity != '' ) {
                                    echo $slPrMetalFinalPutity . ' %';
                                }
                        } else {
                                echo $reqTunch;
                            }
                        }else if($slPrMetalType != 'Silver'){
                            if ($reqTunch == '' && $reqTunch == NULL) {
                            if ($slPrMetalFinalPutity != '' ) {
                                    echo $slPrMetalFinalPutity . ' %';
                                }
                            } else {
                                echo $reqTunch;
                            }
                        }else{
                            echo '-';
                        }
                        ?>
                    </td>
                    <?php
                    //Adding Indicator Condition @Author:Vinod:06-05-2023
                }
            }
//            $fieldName = 'itemFinalPurityWtCsWs';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFinalPurityWtCsWs_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $itemFinalPurityWtCsWs_size; ?>px;">
                    <?php
                    if ($slPrWastage != '' || $rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                        echo $slPrWastage + $rowSlPrItemDetails['sttr_cust_wastage'] . ' %';
                    } else {
                        echo ' ';
                    }
                    ?>
                </td>
                <?php
            }
            //  <!--START CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
//            $fieldName = 'valAdded';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($valAdded_check == 'true' && $custwasatagepresent == 'yes') {
                ?>
                <td align="center" style="font-size: <?php echo $valAdded_size; ?>px;">
                    <?php
                    if ($rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                        echo $rowSlPrItemDetails['sttr_cust_wastage'] . ' %';
                    } else {
                        echo ' ';
                    }
                    ?>
                </td>
                <?php
            }

            // <!--END CODE FOR VA WT @AUTHOR SIMRAN:1NOV2022-->
//            $fieldName = 'itemFfnWt';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and"
//                            . " label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFfnWt_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $itemFfnWt_size; ?>px;">
                    <?php
                    //
                    if ($rowSlPrItemDetails['sttr_final_fine_weight'] > 0) {
                        echo $slprFfnWt;
                    } else {
                        echo ' ';
                    }
                    //
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut') {
//                $fieldName = 'metalRateByPurity';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $label_field_check1 = $metalRateByPurity_check;
                //
//                $fieldName = 'metalRate';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                //
                if ($metalRate_check == 'true' || $label_field_check1 == 'true') {
                    ?>
                    <td align="center" style="text-align: center; font-size: <?php echo $metalRate_size; ?>px;">
                        <table align="center">
                            <?php if ($metalRate_check == 'true') { ?>
                                <tr>
                                    <td align="center" style="text-align: center; font-size: <?php echo $metalRate_size; ?>px;">
                                        <?php
//                                        $cryReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'cryOpt'";
//                                        $resReqLang = mysqli_query($conn, $cryReqLang);
//                                        $rowReqLang = mysqli_fetch_array($resReqLang);
                                        $cryLang = $getLayoutDetails['cryOpt'];
                                        //echo '$cryLang=='.$cryLang;
                                        
                                        if ($sttrIndicator == 'stockCrystal' && $cryLang != 'NO') {

                                            echo $slPrPurchaseRate;
                                        } else if ($sttrIndicator == 'stockCrystal' && $cryLang == 'NO') {
                                            echo ' ';
                                            /* START CODE TO ADD CONDITION FOR SHOWING SELL RATE WHEN PURCHASE RATE IS NOT PRESENT @AUTHOR:MADHUREE-11MARCH2020 */
                                        } else if ($paymentMode != 'NoRateCut' && ($sttrIndicator != 'stockCrystal') && ($slPrMetalRate == '' || $slPrMetalRate == NULL)) {
                                            ?>  
                                            <div class="paddingRight5"><?php echo $slPrPurchaseRate; ?></div>
                                            <?php
                                            /* END CODE TO ADD CONDITION FOR SHOWING SELL RATE WHEN PURCHASE RATE IS NOT PRESENT @AUTHOR:MADHUREE-11MARCH2020 */
                                        } else if ($paymentMode != 'NoRateCut') {
                                            ?>  
                                            <?php
                                            echo $slPrMetalRate; //START CODE FOR METAL RATE @AUTHOR:SIMRAN19JUNE2021O
                                            ?>  

                                            <?php
                                        } else {
                                            echo ' ';
                                        }
                                        if ($noOfCry > 0) {
//                                            $qSelCrystalRate = "SELECT sttr_sell_rate FROM stock_transaction_sell_2022_2023 WHERE "
//                                                    . "sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
//                                                    . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
//                                            $resCrystalRate = mysqli_query($conn, $qSelCrystalRate);
//                                            while ($rowCrystalRate = mysqli_fetch_array($resCrystalRate, MYSQLI_ASSOC)) {
                                            foreach ($getStockTransDetails as $rowCrystalRate) {
                                                 if($rowCrystalRate['sttr_indicator'] == 'stockCrystal' && $rowCrystalRate['sttr_sttr_id'] == $slPrId){
                                                ?>
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                                    <tr>
                            <!--                                            <td align="right">
                                                        <?php echo $rowCrystalRate['sttr_sell_rate']; ?>
                                                        </td>-->
                                                    </tr>
                                                </table>
                                                <?php
                                            }
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
//                            $fieldName = 'metalRateByPurity';
//                            $label_field_check = '';
//                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
//                                            . "and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($metalRateByPurity_check == 'true') {
                                ?>
                                <tr>
                                    <td align="center" style="text-align: center; font-size: <?php echo $metalRateByPurity_size; ?>px;">
                                        <?php
//                                        $cryReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'cryOpt'";
//                                        $resReqLang = mysqli_query($conn, $cryReqLang);
//                                        $rowReqLang = mysqli_fetch_array($resReqLang);
                                        $cryLang = $getLayoutDetails['cryOpt'];
//                                        echo '$sttrIndicator=='.$sttrIndicator;
                                        if ($sttrIndicator == 'stockCrystal' && $cryLang != 'NO') {
                                            echo $slPrPurchaseRate;
                                        } else if ($sttrIndicator == 'stockCrystal' && $cryLang == 'NO') {
                                            echo '-';
                                            /* START CODE TO ADD CONDITION FOR SHOWING SELL RATE WHEN PURCHASE RATE IS NOT PRESENT @AUTHOR:MADHUREE-11MARCH2020 */
                                        } else if ($paymentMode != 'NoRateCut' && ($sttrIndicator != 'stockCrystal') && ($slPrMetalRate == '' || $slPrMetalRate == NULL)) {
                                            ?>  
                                            <div class="paddingRight5"><?php echo $slPrPurchaseRate; ?></div>

                                            <?php
                                            /* END CODE TO ADD CONDITION FOR SHOWING SELL RATE WHEN PURCHASE RATE IS NOT PRESENT @AUTHOR:MADHUREE-11MARCH2020 */
                                        } else if ($paymentMode != 'NoRateCut') {
                                            ?>  
                                            <div class="paddingRight5"><?php echo $slPrMetalRate * $slPrMetalFinalPutity / 100; ?></div>
                                            <?php
                                        } else {
                                            echo ' ';
                                        }


                                        if ($noOfCry > 0) {
//                                            $qSelCrystalRate = "SELECT sttr_sell_rate FROM stock_transaction_sell_2022_2023 WHERE "
//                                                    . "sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
//                                                    . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
//                                            $resCrystalRate = mysqli_query($conn, $qSelCrystalRate);
//                                            while ($rowCrystalRate = mysqli_fetch_array($resCrystalRate, MYSQLI_ASSOC)) {
                                             foreach ($getStockTransDetails as $rowCrystalRate) {
                                                ?>
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                                    <tr>
                            <!--                                            <td align="right">
                                                        <?php echo $rowCrystalRate['sttr_sell_rate']; ?>
                                                        </td>-->
                                                    </tr>
                                                </table>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </td>
                    <?php
                }
            }
            //<!-- START CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->
            if ($rateByPurity_check == 'true') {
                ?>
                <td align="center" style="font-size: <?php echo $rateByPurity_size; ?>px;">
                    <?php
                    if ($slPrMetalRate != '' || $rowSlPrItemDetails['sttr_metal_rate'] != '') {
                        echo ($slPrMetalRate * $slPrMetalPutity) / 100;
                    } else {
                        echo ' ';
                    }
                    ?>
                </td>
                <?php
            }
            //<!-- END CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->
//            $fieldName = 'labour';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($labour_check == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
                ?>
                <td align="center" style="font-size: <?php echo $labour_size; ?>px;">
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
                        echo " ";
                    }
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//                $fieldName = 'totalmkgbfdisc';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totalmkgbfdisc_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $totalmkgbfdisc_size; ?>px;">
                        <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">  
                            <?php if ($slPrindicator == 'stockCrystal') { ?> 
                                <?php if ($sttr_stone_amt != 0 || $sttr_stone_amt != '') { ?>
                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <div class="paddingRight5 ">
                                                (V)
                                            </div>
                                        </td>
                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                            <div class="paddingRight5">
                                                <?php
                                                echo "(" . formatInIndianStyle($sttr_stone_amt) . ")";
                                                ?></div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else if ($slPrindicator != 'stockCrystal') {
                                ?>   

                                <?php if ($sttr_metal_amt != 0 || $sttr_metal_amt != '') { ?>

                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <div class="paddingRight5 ">
                                                (V)
                                            </div>
                                        </td>
                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                            <div class="paddingRight5">
                                                <?php
                                                echo "(" . formatInIndianStyle($sttr_metal_amt) . ")";
                                                ?></div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo " ";
                            }
                            ?>
                            <?php
                            if ($sttr_total_making_amt != '' && $sttr_total_making_amt != 0) {
                                ?>

                                <tr> 
                                    <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                        <div class="paddingRight5">
                                            (M)
                                        </div>
                                    </td>
                                    <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                        <div class="paddingRight5 ">

                                            <?php
                                            echo "(" . formatInIndianStyle($sttr_total_making_amt - $totalOtherCharges) . ")"; // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                            ?></div>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                $fieldName = 'discountchargePer';
                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_check as label_field_check_per FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                  $label_field_check_per = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                $fieldName = 'discountchargeAmt';
                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_check as label_field_check_amt FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $label_field_check_amt = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
                       
                if (($label_field_check_per == 'true' || $label_field_check_amt == 'true') && (($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') || ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') || ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) || ($mkgDiscountPresent == 'YES') || ($metalDiscountPresent == 'YES') || ($stoneDiscountPresent == 'YES')) && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                    //
                    ?>
                    <td align="center" style="font-size: <?php echo $label_field_font_size; ?>px;">
                        <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">  
                            <?php if ($slPrindicator == 'stockCrystal') { ?> 
                                <?php if ($sttr_stone_discount_amt != 0 && $sttr_stone_discount_amt != '') { ?>
                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <div class="paddingRight5 ">
                                                (V)
                                            </div>
                                        </td>
                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                            <div class="paddingRight5">
                                                <?php
                                                if ($label_field_check_per == 'true')
                                                    echo formatInIndianStyle($sttr_stone_discount_per) . "%" . " ";
                                                if ($label_field_check_amt == 'true')
                                                    echo formatInIndianStyle($sttr_stone_discount_amt);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                } else if ($stoneDiscountPresent == 'YES') {
                                    ?>
                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <?php echo ' '; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else if ($slPrindicator != 'stockCrystal') {
                                if ($sttr_metal_discount_amt != 0 && $sttr_metal_discount_amt != '') {
                                    ?>
                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <div class="paddingRight5 ">
                                                (V)
                                            </div>
                                        </td>
                                        <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                            <div class="paddingRight5">
                                                <?php
                                                if ($label_field_check_per == 'true')
                                                    echo formatInIndianStyle($sttr_metal_discount_per) . "%" . " ";
                                                if ($label_field_check_amt == 'true')
                                                    echo formatInIndianStyle($sttr_metal_discount_amt);
                                                ?></div>
                                        </td>
                                    </tr>
                                <?php } else if ($metalDiscountPresent == 'YES') {
                                    ?>
                                    <tr> 
                                        <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                            <?php echo ' '; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ($sttr_mkg_discount_amt != '' && $sttr_mkg_discount_amt != 0) {
                                ?>
                                <tr> 
                                    <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                        <div class="paddingRight5">
                                            (M)
                                        </div>
                                    </td>
                                    <td align="center" valign="top" width = "80%" class="ff_calibri ">
                                        <div class="paddingRight5 ">
                                            <?php
                                            if ($label_field_check_per == 'true')
                                                echo formatInIndianStyle($sttr_mkg_discount_per) . "%" . " ";
                                            if ($label_field_check_amt == 'true')
                                                echo formatInIndianStyle($sttr_mkg_discount_amt);
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } else if ($mkgDiscountPresent == 'YES') {
                                ?>
                                <tr> 
                                    <td align="center" valign="top" width = "20%" class="ff_calibri ">
                                        <?php echo ' '; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </td>
                    <?php
                }
            }
//            $fieldName = 'mkgAfterDisPer';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //
            if ($mkgAfterDisPer_check == 'true' && $mkgAfterDiscInPerPresent == 'YES') {
                ?>
                <td align="center" style="font-size: <?php echo $mkgAfterDisPer_size; ?>px;">
                    <?php
                    if ($totMkgAfterDiscInPer > 0 && $sttrIndicator != 'stockCrystal') {
                        echo $totMkgAfterDiscInPer . ' %';
                    } else {
                        echo ' ';
                    }
                    ?>
                </td>
                <?php
            }
//            $fieldName = 'mkgAfterDisGm';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //
            if ($mkgAfterDisGm_check == 'true' && $mkgAfterDiscInGmPresent == 'YES') {
                ?>
                <td align="center" style="font-size: <?php echo $mkgAfterDisGm_size; ?>px;">
                    <?php
                    if ($totMkgAfterDisInGm > 0 && $sttrIndicator != 'stockCrystal') {
                        echo $totMkgAfterDisInGm . ' GM';
                    } else {
                        echo ' ';
                    }
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut') {
//                $fieldName = 'val';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($val_check == 'true') {
                    ?>
                <td align="center" style="font-size: <?php echo $val_size;  ?>px;">
                        <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">  

                            <?php if ($sttr_valuation != 0 && $sttr_valuation != '') { ?>

                                <tr> 
                                    <td align="center" valign="top" width = "50%" class="ff_calibri ">
                                        <div class="paddingRight5 ">
                                            (V)
                                        </div>
                                    </td>
                                    <td align="center" valign="top" width = "50%" class="ff_calibri ">
                                        <div class="paddingRight5">
                                            <?php
                                            //if ($slPrindicator=='stockCrystal') {
                                            //echo formatInIndianStyle($sttr_valuation+$sttr_metal_discount_amt);
                                            // }

                                            echo formatInIndianStyle($sttr_valuation);
                                            ?></div>
                                    </td>
                                </tr>
                                <?php
                                if ($sttr_making_charges != '' && $sttr_making_charges != 0) {
                                    ?>

                                    <tr> 
                                        <td align="center" valign="top" width = "50%" class="ff_calibri ">
                                            <div class="paddingRight5">
                                                (M)
                                            </div>
                                        </td>
                                        <td align="center" valign="top" width = "50%" class="ff_calibri ">
                                            <div class="paddingRight5 ">

                                                <?php
                                                echo formatInIndianStyle($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                                ?></div>


                                        </td>

                                    </tr>
                                <?php } ?>
                                <?php
                            } else {
                                echo " ";
                            }
                            ?>
                            <?php
                            if ($invoicePanel != 'sellInvLayA4' && $slPrItemTotalTaxChrg != 0) {
                                ?>
                <!--                    <tr>
                <td align="right" class="ff_calibri font_color_<?php echo $val_color; ?>" style="font-size:<?php echo $val_size; ?>px" title="TAX">
                                <?php echo formatInIndianStyle($slPrItemTotalTaxChrg); ?>
                </td>
                </tr>-->
                            <?php } ?>

                        </table>  
                    </td>
                    <?php
                }
            }
//            $fieldName = 'labourVal';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($labourVal_check == 'true' && $labchargepresent == 'yes') {
                ?>
                <td align="center" style="font-size: <?php echo $labourVal_size; ?>px;">
                    <?php
                    if ($slPrItemLabChargsVal != 0) {
                        echo $slPrItemLabChargsVal;
                    } else {
                        echo" ";
                    }
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//                $fieldName = 'metal_val';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($metal_val_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $metal_val_size; ?>px;">
                        <?php
                        if ($sttr_valuation != 0) {
                            if (($paymentMode == 'NoRateCut' && $sttrIndicator == 'stockCrystal') || $paymentMode != 'NoRateCut') {
                                if ($sttrIndicator == 'stockCrystal') {
                                    echo formatInIndianStyle($sttr_valuation);
                                } else {
                                    echo formatInIndianStyle($sttr_metal_amt);
                                }
                            } else {
                                echo ' ';
                            }
                        } else {
                            echo ' ';
                        }
                        ?>
                    </td>
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//                $fieldName = 'mkg_chrg_val';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($mkg_chrg_val_check == 'true') {
                    //                    
                    if ($sttr_total_making_charges != 0 || $sttr_total_making_charges == NULL || $sttr_total_making_charges == ''){                       
                        ?>
                        <td align="center" style="font-size: <?php echo $mkg_chrg_val_size; ?>px;">
                        <?php
                            echo ($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018 ?>
                        </td>
                        <?php
                    } 
                    else { ?>
                        <td align="center" style="font-size: <?php echo $mkg_chrg_val_size; ?>px;">
                        <?php 
                             echo "-"; ?>
                        </td>    
                        <?php
                    }
                    ?>                   
                    <?php
                }
                //START CODE TO ADDED HALLAMRK CHARGES @SIMRAN:24APR2023
                //Adding Indicator Condition @Author:Vinod:01-05-2023
//                $silverInvHal = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvHalSilver'";
//                $resSlHal = mysqli_query($conn, $silverInvHal);
//                $rowSlHal = mysqli_fetch_array($resSlHal);
                $silverHalIndicator = $getLayoutDetails['InvHalSilver'];
                if ($hallmarkingCharges_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $hallmarkingCharges_size; ?>px;">
                        <?php
                        if($silverHalIndicator=='true')
                        {
                            if ($hallmarkingCharges_check == 'true')
                            //echo $sttr_hallmark_charges;
                                echo $sttr_total_hallmark_charges;
                            else
                                echo ' - ';
                        }else if($slPrMetalType != 'Silver'){
                            if ($hallmarkingCharges_check == 'true')
                            // echo $sttr_hallmark_charges;
                                echo $sttr_total_hallmark_charges;
                            else
                                echo ' - ';
                        }else{
                            echo ' - ';
                        }
                        //Adding Indicator Condition @Author:Vinod:01-05-2023
                        ?>
                    </td>
                    <?php
                }
                //END CODE TO ADDED HALLAMRK CHARGES @SIMRAN:24APR2023
                //START CODE TO ADDED TAX PERCENTAGE  @SIMRAN@24APR2023
                       if ($taxPercentage_check == 'true') { ?>              
                    <td align="center" style="font-size: <?php echo $taxPercentage_size; ?>px;">
                        <?php
                        echo $totalGstPer .'%';
                        ?>
                    </td> 
                    <?php
                }
                //END CODE TO ADDED TAX PERCENTAGE @SIMRAN@24APR2023
//                $fieldName = 'othChrg';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($othChrg_check == 'true') {
                    if ($otherChargesPresent == 'yes') {
                        ?>
                        <td align="center" style="font-size: <?php echo $othChrg_size; ?>px;">
                            <?php
                            if ($totalOtherCharges > 0) {
                                echo $totalOtherCharges;
                            } else {
                                echo" ";
                            }
                            ?>
                        </td>
                        <?php
                    }
                }
                //START CODE FOR ST COLOR AND CLARITY @AUTHOR SIMRAN-20SEPT2022
//                 $fieldName = 'stColor';
//                $label_field_check = '';
//                //echo '$noOfCry'.$noOfCry;
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($stColor_check == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                    echo 'hh  11';
                    ?>
                    <td align="center" style="font-size: <?php echo $stColor_size; ?>px;">
                        <?php
                         if ($sttrIndicator == 'stockCrystal'){
                            echo $rowSlPrItemDetails['sttr_color'];
                         }else{
                            echo '-';
                        }
                        ?>
                    </td>
                    <?php
                }
//                   $fieldName = 'stClarity';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($stClarity_check == 'true' && ($noOfCry > 0 || $crystalPresent == 'yes')) {
//                    echo 'hh  11';
                    ?>
                    <td align="center" style="font-size: <?php echo $stClarity_size; ?>px;">
                        <?php
                        if ($sttrIndicator == 'stockCrystal'){
                            echo $rowSlPrItemDetails['sttr_clarity'];
                        }else{
                            echo '-';
                        }
                        ?>
                    </td>
                    <?php
                }
                //END CODE FOR ST COLOR AND CLARITY @AUTHOR SIMRAN-20SEPT2022
//                $fieldName = 'TotalVa';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($TotalVa_check == 'true') {
//                    echo 'hh  11';
                    ?>
                    <td align="center" style="font-size: <?php echo $TotalVa_size; ?>px;">
                        <?php
                        echo formatInIndianStyle($slpr_value_added + $sttr_total_making_charges + $slPrCryValuation);
                        ?>
                    </td>
                    <?php
                }
//                $fieldName = 'total_valwithmkg';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($total_valwithmkg_check == 'true') {
//                    echo 'hh  12';
                    ?>
                    <td align="center" style="font-size: <?php echo $total_valwithmkg_size; ?>px;">
                        <?php
                        echo formatInIndianStyle($sttr_valuation + $sttr_total_making_charges);
                        ?>
                    </td>
                    <?php
                }
            }
            if ($paymentMode != 'NoRateCut') {
//                $fieldName = 'totalCrystal';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($totalCrystal_check == 'true') {
                    ?>
                    <td align="center" style="font-size: <?php echo $totalCrystal_size; ?>px;">
                        <?php
                        echo formatInIndianStyle($slPrCryValuation);
                        ?>
                    </td>
                    <?php
                }
            }
            //
            //
            if (($custInvLay != 'InvLayWoGst')) {
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'itemCombineGstPer';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($itemCombineGstPer_check == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                            ?>
                            <td align="center" style="font-size: <?php echo $itemCombineGstPer_size; ?>px;">
                                <?php echo $totalGstPer . ' % '; ?>
                            </td>
                            <?php
                        }
                        //
//                        $fieldName = 'itemCombineGstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($itemCombineGstAmt_check == 'true' && ($cgstpresent == 'yes' || $sgstpresent == 'yes' || $igstpresent == 'yes')) {
                            ?>
                            <td align="center" style="font-size: <?php echo $itemCombineGstAmt_size; ?>px;">
                                <?php echo $totalGstAmt; ?>
                            </td>
                            <?php
                        }
                    }
                }
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'cgstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($cgstAmt_check == 'true' && $cgstpresent == 'yes') {
                            $cgstColPresent = 'YES';
                            ?>
                            <td align="center" style="font-size: <?php echo $cgstAmt_size; ?>px;">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%"> 

                                    <?php //if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {                                                                                                                                                    ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">

                                            <?php
                                            if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {
                                                echo ($sttr_tot_price_cgst_per) . '%';
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                            } else {
                                                echo" ";
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <tr> 
                                        <td align="right" valign="top" width = "50%">

                                            <?php
                                            if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {
                                                echo ($sttr_mkg_cgst_per) . '%';
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">

                                            <?php
                                            if ($sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php // }                                                                                                                                                ?>
                                </table>
                            </td>
                            <?php
                        }
                    }
                }
                //
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'totcgstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($totcgstAmt_check == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                            ?>
                            <td align="right" style="font-size: <?php echo $totcgstAmt_size; ?>px;">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">                                                                                                  ?>
                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <?php
                                            if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg != 0 || $sttr_mkg_cgst_chrg != '') {
                                                $totcgstamt = decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                $totcgstper = ($totcgstamt * 100 ) / $totalamount;
                                                echo decimalVal($totcgstper, 1) . "%";
                                            } else if ($sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' && $sttr_mkg_cgst_chrg != 0 || $sttr_mkg_cgst_chrg != '') {
                                                echo $sttr_mkg_cgst_per . "%";
                                            } else if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg == 0 || $sttr_mkg_cgst_chrg == '') {
                                                echo $sttr_tot_price_cgst_chrg . "%";
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                            } else if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' || $sttr_mkg_cgst_chrg == 0 && $sttr_mkg_cgst_chrg == '') {
                                                echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                            } else if ($sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' || $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                    </tr>                                                                                               ?>
                                </table> 
                            </td>
                            <?php
                        }
                    }
                }
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'sgstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($sgstAmt_check == 'true' && $sgstpresent == 'yes') {
                            $sgstColPresent = 'YES';
                            ?>
                            <td align="center" style="font-size: <?php echo $sgstAmt_size; ?>px;">
                                <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                    <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                                                                                                         ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <?php
                                            if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {
                                                echo ($sttr_tot_price_sgst_per) . '%';
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr> 
                                        <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <?php
                                            if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {
                                                echo ($sttr_mkg_sgst_per) . '%';
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table> 
                            </td>
                            <?php
                        }
                    }
                }
                //
                //
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'totsgstAmt';
//                        $label_field_check = '';
//                        //echo $sttr_tot_price_sgst_per;
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($totsgstAmt_check == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                            ?>
                            <td align="right" style="font-size: <?php echo $totsgstAmt_size; ?>px;">
                                <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                    <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                                                                                                   ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg != 0 || $sttr_mkg_sgst_chrg != '') {

                                                $totsgstamt = decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                $totsgstper = ($totsgstamt * 100 ) / $totalamount;
                                                echo decimalVal($totsgstper, 1) . "%";
                                            } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' && $sttr_mkg_sgst_chrg != 0 || $sttr_mkg_sgst_chrg != '') {
                                                echo $sttr_mkg_sgst_per . "%";
                                            } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg == 0 || $sttr_mkg_sgst_chrg == '') {
                                                echo $sttr_tot_price_sgst_chrg . "%";
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                            } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' || $sttr_mkg_sgst_chrg == 0 && $sttr_mkg_sgst_chrg == '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                            } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' || $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                            } else {
                                                echo" ";
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                </table> 
                            </td>
                            <?php
                        }
                    }
                }
                //
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    // if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) || $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) && $custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'igstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($igstAmt_check == 'true' && $igstpresent == 'yes') {
                        ?>
                        <td align="center" style="font-size: <?php echo $igstAmt_size; ?>px;">
                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%">

                                <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" >
                                            <?php
                                            echo ($sttr_tot_price_igst_per) . '%';
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) { ?>

                                    <tr> 
                                        <td align="right" width = "50%" valign="top">
                                            <?php
                                            echo ($sttr_mkg_igst_per) . '%';
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            echo decimalVal($sttr_mkg_igst_chrg, 2);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </td>
                        <?php
                    }
                    // }
                }
                //
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) || $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) && $custInvLay != 'InvLayWoGst') {

//                        $fieldName = 'totigstAmt';
//                        $label_field_check = '';
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($totigstAmt_check == 'true') {
                            ?>
                            <td align="right" style="font-size: <?php echo $totigstAmt_size; ?>px;">
                                <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%">

                                    <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                        <tr> 
                                            <td align="right" valign="top" width = "50%">

                                                <?php
                                                if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 || $sttr_mkg_igst_chrg != '') {

                                                    $totigstamt = decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                    $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                    //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                    $totigstper = ($totigstamt * 100 ) / $totalamount;
                                                    echo $totigstper . "%";
                                                } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' && $sttr_mkg_igst_chrg != 0 || $sttr_mkg_igst_chrg != '') {
                                                    echo $sttr_mkg_igst_per . "%";
                                                } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg == 0 || $sttr_mkg_igst_chrg == '') {
                                                    echo $sttr_tot_price_igst_chrg . "%";
                                                } else {
                                                    echo " ";
                                                }
                                                ?>
                                            </td>
                                            <td align="right" valign="top" width = "50%">
                                                <?php
                                                if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                    echo decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' || $sttr_mkg_igst_chrg == 0 && $sttr_mkg_igst_chrg == '') {
                                                    echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' || $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                    echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                } else {
                                                    echo " ";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            <?php
                        }
                    }
                }
                if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                    if ($custInvLay != 'InvLayWoGst') {
//                        $fieldName = 'totgstAmt';
//                        $label_field_check = '';
//                        //echo $sttr_tot_price_sgst_per;
//                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($totgstAmt_check == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                            ?>
                            <td align="center" style="font-size: <?php echo $totgstAmt_size; ?>px;">
                                <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                    <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                                                                                         ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">   
                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != 0 && $sttr_tot_price_cgst_chrg != 0 &&
                                                    $sttr_mkg_cgst_chrg != 0
                                            ) {

                                                $totsgstamt = decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;

                                                $totsgstper = ($totsgstamt * 100 ) / $totalamount;
                                                $totcgstamt = decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;

                                                $totcgstper = ($totcgstamt * 100 ) / $totalamount;
                                                echo decimalVal($totsgstper + $totcgstper, 2) . "%";
                                            } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_cgst_chrg == 0 && $sttr_mkg_sgst_chrg != 0 &&
                                                    $sttr_mkg_cgst_chrg != 0) {
                                                echo decimalVal($sttr_mkg_sgst_per + $sttr_mkg_cgst_per) . "%";
                                            } else if ($sttr_tot_price_sgst_chrg != 0 &&
                                                    $sttr_tot_price_cgst_chrg != 0 &&
                                                    $sttr_mkg_sgst_chrg == 0 &&
                                                    $sttr_mkg_cgst_chrg == 0) {
                                                echo decimalVal($sttr_tot_price_sgst_per + $sttr_tot_price_cgst_per) . "%";
                                            } else if ($sttr_tot_price_igst_chrg != 0 &&
                                                    $sttr_mkg_igst_chrg != 0) {
                                                $totigstamt = decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                $totalamount = $sttr_valuation + $sttr_total_making_charges;
                                                //$totcgstper=($sttr_tot_price_cgst_per+$sttr_mkg_cgst_per)/2;
                                                $totigstper = ($totigstamt * 100 ) / $totalamount;
                                                echo $totigstper . "%";
                                            } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_mkg_igst_chrg != 0) {
                                                echo $sttr_mkg_igst_per . "%";
                                            } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_mkg_igst_chrg == 0) {
                                                echo $sttr_tot_price_igst_per . "%";
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' &&
                                                    $sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' &&
                                                    $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '' &&
                                                    $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2) + decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                            } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' || $sttr_mkg_sgst_chrg == 0 && $sttr_mkg_sgst_chrg == '' && $sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' || $sttr_mkg_cgst_chrg == 0 && $sttr_mkg_cgst_chrg == '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_tot_price_cgst_chrg, 2);
                                            } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' || $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '' &&
                                                    $sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' || $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_sgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                            } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                            } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' || $sttr_mkg_igst_chrg == 0 && $sttr_mkg_igst_chrg == '') {
                                                echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                            } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' || $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                echo decimalVal($sttr_mkg_igst_chrg, 2);
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>  
                            </td>
                            <?php
                        }
                    }
                }
            }
//            $fieldName = 'itemFixedMrpPrice';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($itemFixedMrpPrice_check == 'true') {
                ?>
                <td align="right" style="font-size: <?php echo $itemFixedMrpPrice_size; ?>px;"> 
                    <?php
                    if ($sttr_cust_price != '' && $sttr_cust_price != 0 && $sttr_cust_price != NULL) {
                        echo $sttr_cust_price;
                    } else {
                        echo '  ';
                    }
                    ?>
                </td>
                <?php
            }
            $diafieldName = 'diamondValuetion';
//            $label_field_check = '';
//            parse_str(getTableValues("SELECT label_field_check as diamondValuechk FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$diafieldName' and label_type = '$labelType'"));
            $diamondValuechk = $getLabelDetails[strtolower($fieldName)]['label_field_check'];
            if ($diamondValuechk == 'true' && $crystalPresent == 'yes') {
                ?>
                <td align="right"  style=" font-size: <?php echo $amt_size; ?>px;">
                    <?php
                    if ($sttrIndicator == 'stockCrystal') {
                        if ($noOfCry > 0 && $noOfRows > 0) {
                                            echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation); // for crystal amt valuation Author:DIKSHA 05April2019
                        }
                                    } else {
                        echo " ";
                    }
                    if ($noOfCry > 0) {
//                        $qSelCrystalVal = "SELECT sttr_valuation FROM stock_transaction_sell_2022_2023 WHERE "
//                                . "sttr_owner_id = '$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
//                                . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
//                        $resCrystalVal = mysqli_query($conn, $qSelCrystalVal);
//                        while ($rowCrystalVal = mysqli_fetch_array($resCrystalVal, MYSQLI_ASSOC)) {
                            foreach ($getStockTransDetails as $rowSlPrItemDetails) {
                            if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' || $rowSlPrItemDetails['sttr_sttr_id'] == $slPrId)
                            $sttr_other_info = $rowSlPrItemDetails['sttr_other_info']; // OTHER INFO
                            ?>
                            <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                <tr>

                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </td>
                <?php
            }
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
//                $fieldName = 'amt';
//                $label_field_check = '';
//                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($amt_check == 'true' && $paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                    ?>
                    <td align="right" style="padding-right: unset; font-size: <?php echo $amt_size; ?>px;">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <?php                                                                                                               ?>
                            <tr> 
                                <td align="right"  style=" font-size: <?php echo $amt_size; ?>px;">
                                    <?php
                                    if ($paymentMode != 'NoRateCut' || $sttrIndicator != 'stockCrystal') {
                                        if ($panelName == 'DeliveredOrderInvoice' || $panelName == 'PendingOrderInvoice') { // 13DEC2018
                                            echo formatInIndianStyle($slPrItemFinVal);
                                        } else if ($noOfCry == 0 && $sttrIndicator != 'stockCrystal') {
                                            echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation);
                                        } else if ($noOfRows > 0 && $sttrIndicator != 'stockCrystal') {
                                            echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation); // for crystal amt valuation Author:DIKSHA 05April2019
                                        }
                                    } else {
                                        echo " ";
                                    }
                                    if ($noOfCry > 0) {
//                                        $qSelCrystalVal = "SELECT sttr_valuation FROM stock_transaction_sell_2022_2023 WHERE "
//                                                . "sttr_owner_id = '$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
//                                                . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
//                                        $resCrystalVal = mysqli_query($conn, $qSelCrystalVal);
//                                        while ($rowCrystalVal = mysqli_fetch_array($resCrystalVal, MYSQLI_ASSOC)) {
                                            foreach ($getStockTransDetails as $rowSlPrItemDetails) {
                                            if($rowSlPrItemDetails['sttr_indicator'] == 'stockCrystal' || $rowSlPrItemDetails['sttr_sttr_id'] == $slPrId)
                                            $sttr_other_info = $rowSlPrItemDetails['sttr_other_info']; // OTHER INFO
                                            ?>
                                            <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                                <tr>

                                                </tr>
                                            </table>
                                            <?php
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <?php
                }
                                        }
                                            ?>
                                                </tr>
                                            <?php
                                        }
                                    ?>


