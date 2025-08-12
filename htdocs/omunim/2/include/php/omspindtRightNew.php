<?php
/*
 * **************************************************************************************
 * @tutorial: ORDER INVOICE @PRIYANKA-15JUNE2021
 * **************************************************************************************
 * 
 * Created on 15 JUNE, 2021 04:30:18 PM
 *
 * @FileName: omspindtRightNew.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-15JUNE2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<style>
    .border-color-grey-rb{
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-r{
        border-right: 1px solid #000000;
    }
    .border-color-grey-rbu{
        border-right: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-top: 1px solid #000000;
    }
    .border-color-grey-left{
        border-left:1px solid #000000;
    }
    .border-color-grey-top{
        border-up:1px solid #000000;
    }
    .border-color-grey-ru{
        border-top: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .border-color-grey-u{
        border-top: 1px solid #000000;
    }
    .border-color-grey-bot-no{
        border-top: 0px solid #000000;
    }
    .border-color-grey-bot-yes{
        border-top: 1px solid #000000;
    }
</style>
<?php
parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'productBorder'"));
if ($slPrindicator == 'stockCrystal') {
    if ($omly_value == 'showBorder')
        $border_color_grey_bot = 'border-color-grey-bot-yes';
    else
        $border_color_grey_bot = 'border-color-grey-bot-no';
} else {
    if ($omly_value == 'showBorder' || $omly_value == 'prodBorder')
        $border_color_grey_bot = 'border-color-grey-bot-yes';
    else
        $border_color_grey_bot = 'border-color-grey-bot-no';
}
?> 
<?php
//echo '<br/>omly_value:' . $omly_value;
//echo '<br/>border_color_grey_bot:' . $border_color_grey_bot;
if ($counter == 1) {
    ?>
    <tr class="bc_color_darkblue" height="20px">
        <?php
        $fieldName = 'sNo';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            $fieldName = 'itemSNoLb';
            $srNoPresent = 'Y';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  border-color-grey-left font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        if ($sellEstimateDetails != 'NO') {
            $fieldName = 'itemId';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'itemIdLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="center" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu  <?php if ($srNoPresent != 'Y') echo 'border-color-grey-left'; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"  width="<?php echo $itemIdWidth; ?>">
                    <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        $fieldName = 'design';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $invoicePanel == 'sellInvLayA4' || $designpresent == 'yes') {
            $totalColumns++;
            $fieldName = 'designLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <?php //if ($rowSlPrItemDetails['slpr_snap_fname'] != '') {    ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>
            <?php // }  ?>
            <?php
        }

        $fieldName = 'itemDesc';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            $fieldName = 'itemDescLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu padLeft5 <?php if ($srNoPresent != 'Y' && $sltranstype == 'ESTIMATESELL') echo 'border-color-grey-left'; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        
        $fieldName = 'brandName';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            $fieldName = 'itemBrandNameLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu <?php if ($srNoPresent != 'Y' && $sltranstype == 'ESTIMATESELL') echo 'border-color-grey-left'; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        
        $fieldName = 'QTY';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            if ($labelType == 'APPROVAL') {
                $fieldName = 'itemQtyLb';
            } else {
                $fieldName = 'QTYLB';
            }

            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }



        $fieldName = 'unitPrice';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $totalColumns++;
            $fieldName = 'unitPriceLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }


        $fieldName = 'itemHSN';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $hsnpresent == 'yes') {
            $totalColumns++;
            $fieldName = 'itemHSNLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>


            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>

            <?php
        }

        if ($sizePresent == 'yes') {
            $totalColumns++;
            $fieldName = 'itemHSNLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo "SIZE"; ?></div>
            </td>

            <?php
        }

// ADD CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021

        $fieldName = 'OtherInfo';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $otherinfo == 'yes') {
            $totalColumns++;
            $fieldName = 'itemotherinfoLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>


            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $itemDescWidth; ?>">
                <div class="paddingLeft5"><?php echo $label_field_content; ?></div>
            </td>

            <?php
        }
        // END CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021
        
        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemSize';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'itemSizeLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $gsWtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        
        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemGsWt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'itemGsWtLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $gsWtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }

        $fieldName = 'itemPktWt'; //Start add code for pkt wt Author:SANT08APR17
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $pkwtpresent == 'yes') {
            $totalColumns++;
            $fieldName = 'itemPktWtLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
            // End add code for pkt wt Author:SANT08APR17
        }


        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemNtWt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'itemNtWtLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }


        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'itemProcessWt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //echo "SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";

            if (( $processwtpresent == 'yes' && $label_field_check == 'true' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch')) {
                $totalColumns++;
                $fieldName = 'itemProcessWtLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        ?>

        <?php
        // echo $invoicePanel;
        if ($paymentMode != 'NoRateCut') {
            $fieldName = 'slPrValueAddedOp';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $slPrValueAddedOp = $label_field_content;
            $fieldName = 'valAddedAmt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//        echo "SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
//        echo '$invoicePanel:'.$invoicePanel;
            if ($label_field_check == 'true') {
                $totalColumns++;
                if ($slPrValueAddedOp == 'byAmount') {
                    $fieldName = 'valAddedAmtLb';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    // echo "SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                    ?>

                    <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $valWidth; ?>">
                        <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                    </td>
                    <?php
                }
            }
        }
        ?>            

        <?php
        $fieldName = 'itemPurity';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
            $totalColumns++;
            $fieldName = 'itemPurityLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                <div class="paddingRight5"><?php
        if ($label_field_content != '')
            echo $label_field_content;
        else
            echo 'PURITY';
            ?>
                </div>
            </td>
            <!------Start code to add column for final fine wt @Author:ANUJA23APR15 ------->
            <?php
        }


        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemWSWt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                $totalColumns++;
                $fieldName = 'itemWsWtLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $gsWtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemFinalPurity';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                $totalColumns++;
                $fieldName = 'itemFinalPurityLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                    <div class="paddingRight5"><?php
            if ($label_field_content != '')
                echo $label_field_content;
            else
                echo 'FINAL PURITY';
                ?>
                    </div>
                </td>
                <?php
            }
            // START CODE TO ADD FINAL PURITY WITH CUSTOMER WASTAGE OPTION @AUTHOR:MADHUREE-20JUNE2020 //
            $fieldName = 'itemFinalPurityWtCsWs';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                $totalColumns++;
                $fieldName = 'itemFinalPurityWtCsWsLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                    <div class="paddingRight5"><?php
            if ($label_field_content != '')
                echo $label_field_content;
            else
                echo 'WS + CS WS%';
                ?>
                    </div>
                </td>
                <?php
            }
            // END CODE TO ADD FINAL PURITY WITH CUSTOMER WASTAGE OPTION @AUTHOR:MADHUREE-20JUNE2020 // 
        }



        $fieldName = 'slPrValueAddedOp';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $slPrValueAddedOp = $label_field_content;
        $fieldName = 'valAdded';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($slPrValueAddedOp == 'byAmount' && $label_field_check == 'true' && $custwasatagepresent == 'yes') {
            $totalColumns++;
            $fieldName = 'valAddedLb';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $rateWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }

        $fieldName = 'itemFfnWt';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
            $totalColumns++;
            $fieldName = 'itemFfnWtLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_content == '')
                $label_field_content = 'FN WT';
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $ntWtWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        ?>


        <!------End code to add column for final fine wt @Author:ANUJA23APR15 ------->
        <?php
        // THIS BLOCK IS COMMENTED FOR NO RATE CUT

        if ($paymentMode != 'NoRateCut') {
            // add condition for metal rate by purity Author:Diksha 14March2019
            $fieldName = 'metalRateByPurity';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $label_field_check1 = $label_field_check;
            $fieldName = 'metalRate';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' || $label_field_check1 == 'true') {
                $totalColumns++;
                $fieldName = 'metalRateLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $rateWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>                  
                </td>
                <?php
            }
        }

//       start DIM/STN (CT)
        if ($label_field_check == 'true' && $rowCrystalRate['sttr_item_category'] != '') {
            $fieldName = 'DIM/STN (CT)';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'DIM/STN';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $rateWidth; ?>">
                    <div class="paddingRight5"><?php echo "DIM/STN"; ?></div>
                </td>
                <?php
            }
        }
        //       End DIM/STN (CT)
        //       start DIM/STN (CT) VALUES
        $fieldName = 'DIM/STN (CT) VALUES';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $rowCrystalRate1['sttr_valuation'] != '') {
            $totalColumns++;
            $fieldName = 'DIM/STN VALUES ';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $rateWidth; ?>">
                <div class="paddingRight5"><?php echo "DIM/STN VALUES"; ?></div>
            </td>
            <?php
        }
        //       End DIM/STN (CT) VALUES
        $fieldName = 'labour';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
            $totalColumns++;
            $fieldName = 'labourLb';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

            $fieldName = 'val';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'valLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td id="tableHeadColorChng" align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?>
                    </div>
                </td>
                <?php
            }
        }
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

            $fieldName = 'totalmkgbfdisc';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                $totalColumns++;
                $fieldName = 'totalmkgbfdiscLB';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td id="tableHeadColorChng" align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?>
                    </div>
                </td>
                <?php
            }
        }
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

            $fieldName = 'discountchargePer';
            parse_str(getTableValues("SELECT label_field_check as label_field_check_per FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $fieldName = 'discountchargeAmt';
            parse_str(getTableValues("SELECT label_field_check as label_field_check_amt FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if (($label_field_check_per == 'true' || $label_field_check_amt == 'true') && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                $totalColumns++;
                $fieldName = 'discountchargeLB';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td id="tableHeadColorChng" align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?>
                    </div>
                </td>
                <?php
            }
        }

        $fieldName = 'labourVal';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//        echo '$label_field_check:'.$label_field_check;
        if ($label_field_check == 'true' && $labchargepresent == 'yes') {
            $totalColumns++;
            $fieldName = 'labourLbVal';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_font_size == 0) {
                $label_field_font_size = 14;
            }
            ?>
            <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                <div class="paddingRight5"><?php echo $label_field_content; ?></div>
            </td>
            <?php
        }
        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'metal_val';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//        echo '$label_field_check:'.$label_field_check;
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'metal_vallb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php
            if ($paymentMode == 'NoRateCut')
                echo 'AMOUNT';
            else
                echo $label_field_content;
                ?></div>
                </td>
                <?php
            }
        }


        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'mkg_chrg_val';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//        echo '$label_field_check:'.$label_field_check;
            if ($label_field_check == 'true' && $sttrtotalmkgpresent == 'yes') {
                $totalColumns++;
                $fieldName = 'mkg_lb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }

            // Start Code for Other Charges @Author:PRIYANKA-12OCT2018
//            if ($totalOtherCharges > 0) {
            if ($otherChargesPresent == 'yes') { // $otherChargesPresent added @AUTHOR:MADHUREE17DEC19 & CODE MERGED BY @AUTHOR:SHRI17DEC19
                $totalColumns++;
                $fieldName = 'mkg_lb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo "OTH CHRGS"; ?></div>
                </td>
                <?php
            }
            // End Code for Other Charges @Author:PRIYANKA-12OCT2018
        }
        ?>

        <?php
        // THIS BLOCK IS COMMENTED FOR Total VA
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'TotalVa';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'TotalVaLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>

                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        ?>


        <?php
        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'total_valwithmkg';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//        echo '$label_field_check:'.$label_field_check;
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'total_valwith_mkglb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>

                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        ?>

        <!--Start code to add Crystal label on invoice Author:DIKSHA 05APRIL2019-->
        <?php
        if ($noOfCry != 0) {
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                $fieldName = 'totalCrystal';
                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//          echo '$label_field_check:'.$label_field_check;
                if ($label_field_check == 'true') {
                    $totalColumns++;
                    $fieldName = 'totalCrystallb';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_font_size == 0) {
                        $label_field_font_size = 14;
                    }
                    ?>
                    <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>">
                        <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                    </td>
                    <?php
                }
            }
        }
        ?>
        <!--End code to add Crystal label on invoice Author:DIKSHA 05APRIL2019-->

        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            if (($custInvLay != 'InvLayWoGst')) {
                ?>
                <!--START CGST -->
                <?php
                $fieldName = 'cgstAmt';
                //if ((($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0)) || (($sttr_tot_price_cgst_per != '' && $sttr_tot_price_cgst_chrg != 0)) && $custInvLay != 'InvLayWoGst') {
                ?>
                <?php
                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_check == 'true' && $cgstpresent == 'yes') {
                    $totalColumns++;
                    $fieldName = 'cgstLb';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                            <tr> 
                                <td colspan="2" align="center">
                                    <div class="suppHomeMargin"><?php echo $label_field_content; ?> </div>
                                </td>
                            </tr>   
                            <tr> 
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    RATE
                                </td>
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    AMT
                                </td>
                            </tr>
                        </table>  
                    </td>
                    <?php
                }
//            }
            }
        }
        ?>


        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            $fieldName = 'totcgstAmt';
            //if ((($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0)) || (($sttr_tot_price_cgst_per != '' && $sttr_tot_price_cgst_chrg != 0)) && $custInvLay != 'InvLayWoGst') {
            ?>
            <?php
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                $totalColumns++;
                $fieldName = 'totcgstLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                        <tr> 
                            <td colspan="2" align="center">
                                <div class="suppHomeMargin"><?php echo $label_field_content; ?> </div>
                            </td>
                        </tr>   
                        <tr> 
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                RATE
                            </td>
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                AMT
                            </td>
                        </tr>
                    </table>  
                </td>
                <?php
            }
        }
//            }
        ?>
        <!--END CGST -->
        <!--START SGST -->
        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            // if ($slPrItemSGSTTotalTaxChrg != '' && $slPrItemSGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') {
            $fieldName = 'sgstAmt';
//            if ((($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) || (($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0)) && $custInvLay != 'InvLayWoGst') {
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $sgstpresent == 'yes') {
                $totalColumns++;
                $fieldName = 'sgstLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>

                <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                        <tr> 
                            <td colspan="2" align="center">
                                <div class="suppHomeMargin"><?php echo $label_field_content; ?></div>
                            </td>
                        </tr>

                        <tr> 
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                RATE
                            </td>
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                AMT
                            </td>
                        </tr>
                    </table>  
                </td>
                <?php
            }
//            }
        }
        ?>

        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            // if ($slPrItemSGSTTotalTaxChrg != '' && $slPrItemSGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') {
            $fieldName = 'totsgstAmt';
//            if ((($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) || (($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0)) && $custInvLay != 'InvLayWoGst') {
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                $totalColumns++;
                $fieldName = 'totsgstLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>

                <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                        <tr> 
                            <td colspan="2" align="center">
                                <div class="suppHomeMargin"><?php echo $label_field_content; ?></div>
                            </td>
                        </tr>

                        <tr> 
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                RATE
                            </td>
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                AMT
                            </td>
                        </tr>
                    </table>  
                </td>
                <?php
            }
//            }
        }
        ?>
        <!--END SGST -->
        <!--START IGST -->
        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            //if($slPrItemIGSTTotalTaxChrg != '' && $slPrItemIGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') { 
            $fieldName = 'igstAmt';
            if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0)) || (($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0)) && $custInvLay != 'InvLayWoGst') {
                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($igstpresent == 'yes' && $label_field_check == 'true' && $slPrItemLabChargsVal == 0 || $slPrItemLabChargsVal == '') {
                    $totalColumns++;
                    $fieldName = 'igstLb';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                            <tr> 
                                <td colspan="2" align="center">
                                    <div class="suppHomeMargin"><?php echo $label_field_content ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    RATE
                                </td>
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    AMT
                                </td>
                            </tr>
                        </table>  
                    </td>
                    <?php
                }
            }
        }
        ?>


        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            //if($slPrItemIGSTTotalTaxChrg != '' && $slPrItemIGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') { 
            $fieldName = 'totigstAmt';
            if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0)) || (($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0)) && $custInvLay != 'InvLayWoGst') {
                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_check == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                    $totalColumns++;
                    $fieldName = 'totigstLb';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                            <tr> 
                                <td colspan="2" align="center">
                                    <div class="suppHomeMargin"><?php echo $label_field_content ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    RATE
                                </td>
                                <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    AMT
                                </td>
                            </tr>
                        </table>  
                    </td>
                    <?php
                }
            }
        }
        ?>
        <!--END IGST -->

        <?php
        if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
            //if($slPrItemIGSTTotalTaxChrg != '' && $slPrItemIGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') { 
            $fieldName = 'totgstAmt';

            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'totgstLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                        <tr> 
                            <td colspan="2" align="center">
                                <div class="suppHomeMargin"><?php echo $label_field_content ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-ru font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                RATE
                            </td>
                            <td align="center" width = "50%" class="ff_calibri fs_11 border-color-grey-u font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                AMT
                            </td>
                        </tr>
                    </table>  
                </td>
                <?php
            }
            ?>
        <?php } ?>
        <?php
        //echo $paymentMode;

        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

            $fieldName = 'amt';
            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                $totalColumns++;
                $fieldName = 'amtLb';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_font_size == 0) {
                    $label_field_font_size = 14;
                }
                ?>
                <td align="right" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $amtWidth; ?>">
                    <div class="paddingRight5"><?php echo $label_field_content; ?></div>
                </td>
                <?php
            }
        }
        ?>  
    </tr>
    <?php
} $counter = 2;
{
    ?>
    <tr class="marginTop10" >
        <?php
        $fieldName = 'sNo';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $srNoPresent = 'Y';
            ?>
            <td align="center" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> border-color-grey-left" valign="top">
                <div class="paddingLeft5">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">

                        <tr>
                            <td align = "left" class = "ff_calibri font_color_<?php echo $label_field_font_color; ?>" style = "font-size:<?php echo $label_field_font_size; ?>px" title = "S.NO">
                                <?php
                                if ($slPrindicator != 'stockCrystal') {
                                    echo $SrNo;
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <!--1111-->
            <?php
        }
        if ($sellEstimateDetails != 'NO') {
            $fieldName = 'itemId';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="center" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> <?php if ($srNoPresent != 'Y') echo 'border-color-grey-left'; ?>" valign="top">
                    <div class="paddingLeft5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">

                            <tr>
                                <td align = "left" class = "ff_calibri font_color_<?php echo $label_field_font_color; ?>" style = "font-size:<?php echo $label_field_font_size; ?>px" title = "ITEM ID">
                                    <?php echo $slPrItemId;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" class="ff_calibri fs_13 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="METAL TYPE">
                                    <?php echo om_strtoupper($slPrMetalType); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <!--1111-->
                <?php
            }
        }$fieldName = 'design';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $invoicePanel == 'sellInvLayA4' || $designpresent == 'yes') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?>" valign="top">
                <?php if ($rowSlPrItemDetails['slpr_snap_fname'] != '') { ?>
                    <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$rowSlPrItemDetails[slpr_id]"; ?>&panelName=sellInvPanel&imgPanelName=snap',
                                    'popup', 'width=400,height=400,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                            return false" >
                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo $rowSlPrItemDetails['slpr_id']; ?>&panelName=sellInvPanel" 
                             width="64px" height="64px" border="0" style="border-color: #B8860B"/>
                    </a>
                    <?php
                }
//         parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_item_code='$slPrItmCode' and sttr_transaction_type!='sell'"));
//            parse_str(getTableValues("SELECT * FROM image WHERE image_id='$sttr_image_id'"));
                $imageFName = '';
                if ($invName == 'metalPurchase' || $invName == 'rawMetalSale') {
                    parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction WHERE sttr_id='$slPrId'"));
                } else {
                    parse_str(getTableValues("SELECT sttr_image_id FROM stock_transaction "
                                    . "WHERE sttr_item_code='$slPrItmCode' and sttr_transaction_type!='sell'"));
                }
                if ($sttr_image_id != NULL && $sttr_image_id != '') {
                    parse_str(getTableValues("SELECT image_snap_fname FROM image WHERE image_id='$sttr_image_id'"));
                    $imageFName = $image_snap_fname;
                }
                if ($imageFName == '')
                    parse_str(getTableValues("SELECT itm_nm_id,itm_nm_snap_fname FROM item_name WHERE itm_nm_name='$slPrItemName'"));

                if ($imageFName != '') {
                    ?>
                    <a style="cursor: pointer;" 
                       onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$sttr_image_id"; ?>',
                                       'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                               return false" >
                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ogspicim.php?itst_id=<?php echo "$sttr_image_id"; ?>" 
                             width="64px" height="64px" alt ="Item Design" border="0" style="border-color: #B8860B"/>
                    </a>
                    <?php
                } else {
                    echo '-';
                }
            }
            ?>
            <!--11111-->
            <?php
            $fieldName = 'itemDesc';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {

                //add Author:GAUR21JUL16
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
                //add Author:GAUR21JUL16
                ?>
            <td align="center" class="ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?> <?php if ($srNoPresent != 'Y' && $sltranstype == 'ESTIMATESELL') echo 'border-color-grey-left'; ?> paddingRight5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top" <?php if ($itemReturnedPresent > 0) { ?> bgcolor="#c9c7c1" <?php } ?> >
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left" >
                    <tr>
                        <td align="left" class="padLeft5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $slPrItemName; ?>" onClick="this.contentEditable = 'true';" >
                            <?php if ($reqItem == '' && $reqItem == NULL) { ?>
                                <?php echo $slPrItemName . '<br />'; ?>
                            <?php } ?>
                            <?php
                            if ($noOfCry > 0) {
                                $qSelCrystalName = "SELECT sttr_item_name,sttr_quantity FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId' "
                                        . "and sttr_sttr_id = '$slPrId' AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
                                $resCrystalName = mysqli_query($conn, $qSelCrystalName);
                                while ($rowCrystalName = mysqli_fetch_array($resCrystalName, MYSQLI_ASSOC)) {
                                    ?>
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0"  title="<?php echo $rowCrystalName['sttr_item_name']; ?>">        
                                        <tr>
                <!--                                        <td>
                                            <?php echo substr($rowCrystalName['sttr_item_name'], 0, $itemNameSubstr); ?>(<?php echo $rowCrystalName['sttr_quantity']; ?>)
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
                    if ($sellEstimateDetails != 'NO') {
                        $fieldName = 'itemBarcode';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_font_size == 0) {
                                $label_field_font_size = 14;
                            }
                            ?>
                            <tr>
                                <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $prodBarcode; ?>" onClick="this.contentEditable = 'true';" >
                                    <?php
                                    if ($prodBarcode != '')
                                        echo '[BCD: ' . $prodBarcode . ']';
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </td>
            <?php
        }
        $fieldName = 'brandName';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $slPrItemHSN; ?>">
                            <?php if($slPrBrandName != '' || $slPrBrandName != NULL){
                                echo $slPrBrandName;
                            }else{?> - <?php }?> 
                        </td>
                    </tr>
                </table>
            </td>
            <?php
        }
        $fieldName = 'QTY';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $slPrItemHSN; ?>">
                            <?php echo $slPrItemQty; ?> 
                        </td>
                    </tr>
                </table>
            </td>
            <?php
        }
        $fieldName = 'unitPrice';
        $label_field_check = '';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $slUnitPrice; ?>">
                            <?php
                            if ($slUnitPrice != '') {
                                echo formatInIndianStyle($slUnitPrice);
                            } else {
                                echo "-";
                            }
                            ?> 
                        </td>
                    </tr>
                </table>
            </td>
            <?php
        }

        $fieldName = 'itemHSN';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $hsnpresent == 'yes') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="<?php echo $slPrItemHSN; ?>">
                            <?php
                            if ($slPrItemHSN != '') {
                                echo $slPrItemHSN;
                            } else {
                                echo "-";
                            }
                            ?> 
                        </td>
                    </tr>
                </table>
            </td>

            <?php
        }

        // ADD CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021

        $fieldName = 'OtherInfo';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                        . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
                        . "and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $otherinfo == 'yes') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" 
                            style="font-size:<?php echo $label_field_font_size; ?>px" 
                            title="<?php echo $other_info; ?>">
                                <?php
                                if ($sttr_other_info != '') {
                                    echo $sttr_other_info;
                                } else {
                                    echo "-";
                                }
                                ?> 
                        </td>
                    </tr>
                </table>
            </td>
            <?php
        }

        // END CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021

        $fieldName = 'itemHSN';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                        . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
                        . "and label_type = '$labelType'"));
        if ($sizePresent == 'yes') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align="left" class="font_color_<?php echo $label_field_font_color; ?>" 
                            style="font-size:<?php echo $label_field_font_size; ?>px" 
                            title="<?php echo $productSize; ?>">
                                <?php
                                if ($productSize != '') {
                                    echo $productSize;
                                } else {
                                    echo "-";
                                }
                                ?> 
                        </td>
                    </tr>
                </table>
            </td>

            <?php
        }
        
        $fieldName = 'itemSize';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                        . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
                        . "and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            ?>
            <td align="center" class="ff_calibri fs_13 border-color-grey-r <?php echo $border_color_grey_bot; ?> padLeft5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td align="center" class="font_color_<?php echo $label_field_font_color; ?>" 
                            style="font-size:<?php echo $label_field_font_size; ?>px" 
                            title="<?php echo $productSize; ?>">
                                <?php
                                if ($productSize != '') {
                                    echo $productSize;
                                } else {
                                    echo "-";
                                }
                                ?> 
                        </td>
                    </tr>
                </table>
            </td>

            <?php
        }

        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemGsWt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top"  >
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right">
                                <?php
                                echo decimalVal($slPrItemGSW, 3) . " " . $rowSlPrItemDetails['sttr_gs_weight_type'];
                                //decimalVal($slPrItemGSW, 2)." ".$rowSlPrItemDetails['sttr_gs_weight_type'];;
                                if ($noOfCry > 0) {
                                    while ($rowCrystalDet = mysqli_fetch_array($resCrystalDet, MYSQLI_ASSOC)) {
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                            <tr>
                                                <td align="right">
                                                    <?php echo $rowCrystalDet['slprcry_gs_weight'] . ' ' . $rowCrystalDet['slprcry_gs_wt_type']; ?>
                                                </td>
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


        $fieldName = 'itemPktWt'; //Start add code for pkt wt Author:SANT08APR17
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $pkwtpresent == 'yes') {
            ?>
            <td align="right" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right">
                            <?php
                            if ($slPrItemPKTW != 0) {
                                echo $slPrItemPKTW;
                            } else {
                                echo"-";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            <?php
            //End add code for pkt wt Author:SANT08APR17
        }


        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemNtWt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">

                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                <?php echo $slPrItemNTW; ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
            }
        }


        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'itemProcessWt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' "
                            . "and label_type = '$labelType'"));

            if (($processwtpresent == 'yes' && $label_field_check == 'true' &&
                    $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch')) {
                ?>

                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">

                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" 
                                style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <?php
                                    echo $slPrItemProcessW;
                                    ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
            }
        }
        //
        //
        if ($paymentMode != 'NoRateCut') {
            $fieldName = 'slPrValueAddedOp';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $slPrValueAddedOp = $label_field_content;
            $fieldName = 'valAddedAmt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($slPrValueAddedOp == 'byAmount' && $label_field_check == 'true') {
                ?>  
                <?php if ($rowSlPrItemDetails['sttr_value_added'] != '') { ?>
                    <td align="right" class="paddingRight5 border-color-grey-r <?php echo $border_color_grey_bot; ?> ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                        <?php echo formatInIndianStyle($rowSlPrItemDetails['sttr_value_added']); ?>
                    </td>
                <?php } else {
                    ?>
                    <td align="right" class="paddingRight5 border-color-grey-r <?php echo $border_color_grey_bot; ?> ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                        <?php echo "-"; ?>
                    </td>
                    <?php
                }
            }
        }
        //
        //
        $fieldName = 'itemPurity';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {

            //add Author:GAUR22JUL16
            $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
            $resReqTunch = mysqli_query($conn, $selReqTunch);
            $rowReqTunch = mysqli_fetch_array($resReqTunch);
            $reqTunch = $rowReqTunch['itm_tunch_bctext'];
            //add Author:GAUR22JUL16 
            ?>
            <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                            <?php
                            //add Author:GAUR21JUL16 
                            if ($reqTunch == '' && $reqTunch == NULL) {
                                if ($slPrMetalPutity != '') {
                                    echo $slPrMetalPutity . ' %';
                                }
                            } else {
                                echo $reqTunch;
                            }
                            //add Author:GAUR21JUL16 
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            <?php
        }
        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemWSWt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">

                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                <?php
                                if ($slPrWastage != 0) {
                                    echo $slPrWastage . ' %';
                                } else {
                                    echo"-";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
            }
        }
        if ($_SESSION['sessionProdName'] != 'OMRETL') {
            $fieldName = 'itemFinalPurity';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {

                //add Author:GAUR22JUL16
                $selReqTunch = "SELECT itm_tunch_bctext FROM item_tunch WHERE itm_tunch_value = '$slPrMetalFinalPutity' and itm_tunch_metal_type = '$slPrMetalType'";
                $resReqTunch = mysqli_query($conn, $selReqTunch);
                $rowReqTunch = mysqli_fetch_array($resReqTunch);
                $reqTunch = $rowReqTunch['itm_tunch_bctext'];
                //add Author:GAUR22JUL16 
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                <?php
                                //add Author:GAUR21JUL16 
                                if ($reqTunch == '' && $reqTunch == NULL) {
                                    if ($slPrMetalFinalPutity != '') {
                                        echo $slPrMetalFinalPutity . ' %';
                                    }
                                } else {
                                    echo $reqTunch;
                                }
                                //add Author:GAUR21JUL16 
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
            }
            /* START CODE TO ADD OPTION FOR WASTAGE WITH CUSTOMER WASTAGE @AUTHOR:MADHUREE-20JUNE2020 */
            $fieldName = 'itemFinalPurityWtCsWs';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                <?php
                                if ($slPrWastage != '' || $rowSlPrItemDetails['sttr_cust_wastage'] != '') {
                                    echo $slPrWastage + $rowSlPrItemDetails['sttr_cust_wastage'] . ' %';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
            }
        }
        /* END CODE TO ADD OPTION FOR WASTAGE WITH CUSTOMER WASTAGE @AUTHOR:MADHUREE-20JUNE2020 */
        $fieldName = 'slPrValueAddedOp';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $slPrValueAddedOp = $label_field_content;
        $fieldName = 'valAdded';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($slPrValueAddedOp == 'byAmount' && $label_field_check == 'true' && $custwasatagepresent == 'yes') {
            ?>
            <td align="center" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                <?php
                if ($rowSlPrItemDetails['sttr_cust_wastage'] != 0)
                    echo $rowSlPrItemDetails['sttr_cust_wastage'] . '%';
                else
                    echo '-';
                ?>

                <?php
            }
            $fieldName = 'itemFfnWt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and"
                            . " label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLayA6' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                ?>
            <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                            <?php 
                            //
                            if ($rowSlPrItemDetails['sttr_final_fine_weight'] > 0) {
                                echo $slprFfnWt;                                       
                            } else {
                                echo '-';    
                            }
                            //
                            ?>
                        </td>
                    </tr>
                </table>
            </td><?php
        }


        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut') {
            // add condition for metal rate by purity Author:Diksha 14March2019
            $fieldName = 'metalRateByPurity';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $label_field_check1 = $label_field_check;
            //
            $fieldName = 'metalRate';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            //
            if ($label_field_check == 'true' || $label_field_check1 == 'true') {
                ?>
                <td align="right" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5 paddingLeft5" valign="top">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <?php if ($label_field_check == 'true') {
                            ?>
                            <tr>
                                <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <?php
                                    $cryReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'cryOpt'";
                                    $resReqLang = mysqli_query($conn, $cryReqLang);
                                    $rowReqLang = mysqli_fetch_array($resReqLang);
                                    $cryLang = $rowReqLang['omly_value'];
                                    //echo '$cryLang=='.$cryLang;
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
                                        <div class="paddingRight5"><?php echo $slPrMetalRate; ?></div>
                                        <?php
                                    } else {
                                        echo '-';
                                    }

                                    if ($noOfCry > 0) {
                                        $qSelCrystalRate = "SELECT sttr_sell_rate FROM stock_transaction WHERE "
                                                . "sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
                                                . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
                                        $resCrystalRate = mysqli_query($conn, $qSelCrystalRate);
                                        while ($rowCrystalRate = mysqli_fetch_array($resCrystalRate, MYSQLI_ASSOC)) {
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
                            <!--// Start to add for metal rate by purity Author:Diksha 14March2019-->
                            <?php
                        }
                        $fieldName = 'metalRateByPurity';
                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                        . "and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_check == 'true') {
                            ?>
                            <tr>
                                <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div class="paddingRight5">
                                        <?php
                                        /* START CODE TO ADD CRYSTAL RATE OPTION CONDITION FOR NOT CRYSTAL RATE ON INVOICE @AUTHOR:MADHUREE-15MARCH2020 */
//                                        echo '$slPrPurchaseRate : ' . $slPrPurchaseRate . '<br>';
                                        $cryReqLang = "SELECT omly_value FROM omlayout WHERE omly_option = 'cryOpt'";
                                        $resReqLang = mysqli_query($conn, $cryReqLang);
                                        $rowReqLang = mysqli_fetch_array($resReqLang);
                                        $cryLang = $rowReqLang['omly_value'];
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
                                            echo '-';
                                        }

                                        if ($noOfCry > 0) {
                                            $qSelCrystalRate = "SELECT sttr_sell_rate FROM stock_transaction WHERE "
                                                    . "sttr_owner_id='$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
                                                    . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
                                            $resCrystalRate = mysqli_query($conn, $qSelCrystalRate);
                                            while ($rowCrystalRate = mysqli_fetch_array($resCrystalRate, MYSQLI_ASSOC)) {
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
                                        /* END CODE TO ADD CRYSTAL RATE OPTION CONDITION FOR NOT CRYSTAL RATE ON INVOICE @AUTHOR:MADHUREE-15MARCH2020 */
                                        ?>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                        <!--// End to add for metal rate by purity Author:Diksha 14March2019-->
                    </table>
                </td>
                <?php
            }
        }
//    Start dim /srn ct 
        $fieldName = 'dim /srn ct';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $rowCrystalRate['sttr_item_category'] != '') {
            ?>
            <td align="right" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right">
                            <?php
//                        echo $slPrMetalRate;
                            if ($noOfCry > 0) {
                                $qSelCrystalRate = "SELECT sttr_gs_weight,sttr_item_category FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id='$slPrId' and sttr_indicator='stockCrystal' order by sttr_id asc";
                                $resCrystalRate = mysqli_query($conn, $qSelCrystalRate);
                                while ($rowCrystalRate = mysqli_fetch_array($resCrystalRate, MYSQLI_ASSOC)) {
                                    ?>
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                        <tr>
                                            <td align="right">
                                                <?php echo $rowCrystalRate['sttr_item_category'] . '     (' . $rowCrystalRate['sttr_gs_weight'] . ' ' . $rowCrystalRate['sttr_gs_weight_type'] . ')';
                                                ?>
                                            </td>
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
//    end dim /srn ct 
//    Start dim /srn ct valuation
        $fieldName = 'dim /srn ct valuation';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//    echo '<br/>value:' . $rowCrystalRate1['sttr_valuation'];
//    echo '<br/>check:' . $label_field_check;
        //
        if ($label_field_check == 'true' && $rowCrystalRate1['sttr_valuation'] != '') {
            ?>
            <td align="right" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?> paddingRight5 font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td align="right">
                            <?php
//                        echo $slPrMetalRate;
//                        echo '$slPrId'.$slPrId;die;
                            if ($noOfCry > 0) {
                                $qSelCrystalRate1 = "SELECT sttr_valuation FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_sttr_id='$slPrId' order by sttr_id asc";
//                            echo '$qSelCrystalRate1='.$qSelCrystalRate1;die;
                                $resCrystalRate1 = mysqli_query($conn, $qSelCrystalRate1);
                                while ($rowCrystalRate1 = mysqli_fetch_array($resCrystalRate1, MYSQLI_ASSOC)) {
                                    ?>
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0">        
                                        <tr>
                                            <td align="right" style="border-bottom: thick 1 black">
                                                <?php echo $rowCrystalRate1['sttr_valuation'];
                                                ?>

                                            </td>
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

//    end dim /srn valuation 
        $fieldName = 'labour';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && ($mkgresent == 'yes' || $labpresent == 'yes')) {
            ?>
            <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                <div class="paddingRight5 paddingLeft5">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" title="LABOUR CHARGES">
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
                        </tr>
                    </table>
                </div>
            </td>
            <?php
        }
        // THIS BLOCK IS COMMENTED FOR NO RATE CUT




        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'totalmkgbfdisc';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                //$slPrItemVal = $slPrItemFinVal - $slPrItemCGSTTotalTaxChrg - $slPrItemSGSTTotalTaxChrg - $slPrItemIGSTTotalTaxChrg;
                ?>
                <td align="right" class="ff_calibri fs_13  border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">

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
                            echo "-";
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
                        <?php ?> </table></td><?php
            }
            ?>





            <?php
        }





        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {

//            $fieldName = 'discountcharge';
//            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $fieldName = 'discountchargePer';
            parse_str(getTableValues("SELECT label_field_check as label_field_check_per FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $fieldName = 'discountchargeAmt';
            parse_str(getTableValues("SELECT label_field_check as label_field_check_amt FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

            if (($label_field_check_per == 'true' || $label_field_check_amt == 'true') && $invoicePanel != 'sellInvLay4Inch' && $invoicePanel != 'sellInvLay3Inch') {
                //$slPrItemVal = $slPrItemFinVal - $slPrItemCGSTTotalTaxChrg - $slPrItemSGSTTotalTaxChrg - $slPrItemIGSTTotalTaxChrg;
                ?>
                <td align="right" class="ff_calibri fs_13  border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">

                    <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">  
                        <?php if ($slPrindicator == 'stockCrystal') { ?> 
                            <?php if ($sttr_stone_discount_amt != 0 || $sttr_stone_discount_amt != '') { ?>
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
                                            ?></div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else if ($slPrindicator != 'stockCrystal') {
                            ?>   

                            <?php if ($sttr_metal_discount_amt != 0 || $sttr_metal_discount_amt != '') { ?>

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
                                <?php
                            }
                        } else {
                            echo "-";
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

//                                        echo formatInIndianStyle($sttr_mkg_discount_per) . "%" . " " . "(" . formatInIndianStyle($sttr_mkg_discount_amt) . ")";
                                        ?></div>


                                </td>

                            </tr>
                        <?php } ?>
                    </table></td><?php
            }
            ?>
            <?php
        }


        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'val';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                //$slPrItemVal = $slPrItemFinVal - $slPrItemCGSTTotalTaxChrg - $slPrItemSGSTTotalTaxChrg - $slPrItemIGSTTotalTaxChrg;
                ?>
                <td align="right" class="ff_calibri fs_13  border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">

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
                            echo "-";
                        }
                        ?>
                        <?php
                        if ($invoicePanel != 'sellInvLayA4' && $slPrItemTotalTaxChrg != 0) {
                            ?>
                <!--                    <tr>
                <td align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" title="TAX">
                            <?php echo formatInIndianStyle($slPrItemTotalTaxChrg); ?>
                </td>
                </tr>-->
                        <?php } ?>

                    </table>  

                </td>
                <?php
            }
        }


        $fieldName = 'labourVal';
        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $labchargepresent == 'yes') {
            ?>
            <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                <div class="paddingRight5">
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right" title="LABOUR CHARGES">
                                <?php
                                if ($slPrItemLabChargsVal != 0) {
                                    echo $slPrItemLabChargsVal;
                                } else {
                                    echo"-";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>

            <?php
        }

        // THIS BLOCK IS COMMENTED FOR NO RATE CUT
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'metal_val';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                    <div class="paddingRight5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right" title="METAL VAL">
                                    <?php
                                    if ($sttr_valuation != 0) {
                                        if (($paymentMode == 'NoRateCut' && $sttrIndicator == 'stockCrystal') || $paymentMode != 'NoRateCut') {
                                            if ($sttrIndicator == 'stockCrystal') {
                                                echo formatInIndianStyle($sttr_valuation);
                                            } else {
                                                echo formatInIndianStyle($sttr_metal_amt);
                                            }
                                        } else {
                                            echo '-';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <?php
            }
        }


        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'mkg_chrg_val';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true' && $sttrtotalmkgpresent == 'yes') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                    <div class="paddingRight5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right" title="MAKING CHARGE">
                                    <?php
                                    if ($sttr_total_making_charges != 0) {
                                        echo ($sttr_total_making_charges - $totalOtherCharges); // Code for Other Charges @Author:PRIYANKA-12OCT2018
                                    } else {
                                        echo"-";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <?php
            }

            // Start Code for Other Charges @Author:PRIYANKA-12OCT2018
//            if ($totalOtherCharges > 0) {
            if ($otherChargesPresent == 'yes') {
                $fieldName = 'mkg_chrg_val';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                    <div class="paddingRight5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right" title="OTHER CHARGES">
                                    <?php
                                    if ($totalOtherCharges > 0) {
                                        echo $totalOtherCharges;
                                    } else {
                                        echo"-";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td> 
                <?php
            }
            // End Code for Other Charges @Author:PRIYANKA-12OCT2018
        }
        ?>
        <!-- START CODE TO ADD OPTION FOR TOTAL V/A @AUTHOR:SIMRAN-29APR2021 -->
        <?php
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'TotalVa';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                    <div class="paddingRight5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right" title="TOTAL VA">
                                    <?php
                                    echo formatInIndianStyle($slpr_value_added + $sttr_total_making_charges + $slPrCryValuation);
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <?php
            }
        }
        ?>
        <!-- END CODE TO ADD OPTION FOR TOTAL V/A @AUTHOR:SIMRAN-29APR2021 -->

        <?php
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'total_valwithmkg';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                    <div class="paddingRight5">
                        <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right" title="TOTAL VAL">
                                    <?php
                                    echo formatInIndianStyle($sttr_valuation + $sttr_total_making_charges);
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <?php
            }
        }
        ?>

        <!--Start code to add Crystal label on invoice Author:DIKSHA 05APRIL2019-->
        <?php
        if ($noOfCry != 0) {
            if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
                $fieldName = 'totalCrystal';
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                if ($label_field_check == 'true') {
                    ?>
                    <td align="right" class="border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="<?php echo $labourWidth; ?>" valign="top">
                        <div class="paddingRight5">
                            <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right" title="TOTAL VAL">
                                        <?php
                                        echo formatInIndianStyle($slPrCryValuation);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <?php
                }
            }
        }
//    <!- End code to add Crystal label on invoice Author:DIKSHA 05APRIL2019-->
        ?>

        <?php if (($custInvLay != 'InvLayWoGst')) { ?>
            <!--START CGST FETCHING DATA-->
            <?php
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ($custInvLay != 'InvLayWoGst') {
                    $fieldName = 'cgstAmt';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $cgstpresent == 'yes') {
                        $cgstColPresent = 'YES';
                        ?>
                        <?php //if (($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') || ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0)) {                             ?>
                        <td align="center" class="ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%"> 

                                <?php //if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {                                                     ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 <?php
                                if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                    echo"border-color-grey-b";
                                }
                                ?>">
                                             <?php
                                                 if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {
                                                     echo ($sttr_tot_price_cgst_per) . '%';
                                                 } else {
                                                     echo"-";
                                                 }
                                                 ?></div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5  <?php
                             if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                 echo"border-color-grey-b";
                             }
                                                 ?>">

                                            <?php
                                            if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                            } else {
                                                echo"-";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                     ?>
                                <?php //if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {                                ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 ">
                                            <?php
                                            if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {
                                                echo ($sttr_mkg_cgst_per) . '%';
                                            }
                                            ?></div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5 ff_calibri">
                                            <?php
                                            if ($sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php // }                                                 ?>
                            </table>  
                        </td>
                        <?php
//            }
                    }
                }
            }
            ?>


            <?php
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ($custInvLay != 'InvLayWoGst') {
                    $fieldName = 'totcgstAmt';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $sttr_tot_price_cgst_per > 0 && $sttr_tot_price_cgst_chrg > 0) {
                        ?>
                        <?php //if (($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') || ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0)) {                             ?>
                        <td align="center" class="ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%"> 

                                <?php //if ($sttr_tot_price_cgst_per != 0 && $sttr_tot_price_cgst_per != '') {                                                   ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 <?php
                                if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                    echo"border-color-grey-b";
                                }
                                ?>">
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
                                                     echo"-";
                                                 }
                                                 ?></div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5  <?php
                             if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                 echo"border-color-grey-b";
                             }
                                                 ?>">
                                             <?php
                                                 if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' && $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                     echo decimalVal($sttr_tot_price_cgst_chrg, 2) + decimalVal($sttr_mkg_cgst_chrg, 2);
                                                 } else if ($sttr_tot_price_cgst_chrg != 0 && $sttr_tot_price_cgst_chrg != '' || $sttr_mkg_cgst_chrg == 0 && $sttr_mkg_cgst_chrg == '') {
                                                     echo decimalVal($sttr_tot_price_cgst_chrg, 2);
                                                 } else if ($sttr_tot_price_cgst_chrg == 0 && $sttr_tot_price_cgst_chrg == '' || $sttr_mkg_cgst_chrg != 0 && $sttr_mkg_cgst_chrg != '') {
                                                     echo decimalVal($sttr_mkg_cgst_chrg, 2);
                                                 } else {
                                                     echo"-";
                                                 }
                                                 ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                   ?>
                                <?php //if ($sttr_mkg_cgst_per != '' && $sttr_mkg_cgst_per != 0) {                               ?>


                                <?php // }                                               ?>
                            </table>  
                        </td>
                        <?php
//            }
                    }
                }
            }
            ?>
            <!--END CGST FETCHING DATA-->
            <!--START SGST FETCHING DATA-->
            <?php
            //if ($slPrItemSGSTTotalTaxChrg != '' && $slPrItemSGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') { 
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ($custInvLay != 'InvLayWoGst') {
                    $fieldName = 'sgstAmt';
                    //echo $sttr_tot_price_sgst_per;
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $sgstpresent == 'yes') {
                        $sgstColPresent = 'YES';
                        ?>
                        <?php //if (($sttr_tot_price_sgst_per != 0 && $sttr_tot_price_sgst_per != '') || ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) {                               ?>
                        <td align="center" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">

                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                      ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 <?php
                                if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                    echo"border-color-grey-b";
                                }
                                ?>">
                                             <?php
                                                 if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {
                                                     echo ($sttr_tot_price_sgst_per) . '%';
                                                 } else {
                                                     echo"-";
                                                 }
                                                 ?>
                                        </div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5  <?php
                             if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                 echo"border-color-grey-b";
                             }
                                                 ?> ">


                                            <?php
                                            if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '') {
                                                echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                     ?>
                                <?php //if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {                                 ?>

                                <tr> 
                                    <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 ">
                                            <?php
                                            if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {
                                                echo ($sttr_mkg_sgst_per) . '%';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5">
                                            <?php
                                            if ($sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                                   ?>

                            </table>  
                        </td>
                        <?php
//                    }
                    }
                }
            }
            ?>
            <?php
            //if ($slPrItemSGSTTotalTaxChrg != '' && $slPrItemSGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') {
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ($custInvLay != 'InvLayWoGst') {
                    $fieldName = 'totsgstAmt';
                    //echo $sttr_tot_price_sgst_per;
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $sttr_tot_price_sgst_per > 0 && $sttr_tot_price_sgst_chrg > 0) {
                        ?>
                        <?php //if (($sttr_tot_price_sgst_per != 0 && $sttr_tot_price_sgst_per != '') || ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) {                             ?>
                        <td align="center" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">

                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                    ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 <?php
                                if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                    echo"border-color-grey-b";
                                }
                                ?>">

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
                                                echo"-";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5  <?php
                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                            echo"border-color-grey-b";
                        }
                                            ?> ">
                                             <?php
                                                 if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' && $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                     echo decimalVal($sttr_tot_price_sgst_chrg, 2) + decimalVal($sttr_mkg_sgst_chrg, 2);
                                                 } else if ($sttr_tot_price_sgst_chrg != 0 && $sttr_tot_price_sgst_chrg != '' || $sttr_mkg_sgst_chrg == 0 && $sttr_mkg_sgst_chrg == '') {
                                                     echo decimalVal($sttr_tot_price_sgst_chrg, 2);
                                                 } else if ($sttr_tot_price_sgst_chrg == 0 && $sttr_tot_price_sgst_chrg == '' || $sttr_mkg_sgst_chrg != 0 && $sttr_mkg_sgst_chrg != '') {
                                                     echo decimalVal($sttr_mkg_sgst_chrg, 2);
                                                 } else {
                                                     echo"-";
                                                 }
                                                 ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                   ?>
                                <?php //if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {                               ?>


                                <?php //}                                                 ?>

                            </table>  
                        </td>
                        <?php
//                    }
                    }
                }
            }
            ?>
            <!--END SGST FETCHING DATA-->
            <!--START IGST FETCHING DATA-->
            <?php
            //if ($slPrItemIGSTTotalTaxChrg != '' && $slPrItemIGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') {
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) || $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) && $custInvLay != 'InvLayWoGst') {

                    $fieldName = 'igstAmt';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $igstpresent == 'yes' && $slPrItemLabChargsVal == 0 || $slPrItemLabChargsVal == '') {
                        ?>

                        <td align="center" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">
                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%">

                                <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <div class="paddingRight5 <?php
                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                        echo"border-color-grey-b";
                                    }
                                    ?>">
                                                 <?php
                                                     echo ($sttr_tot_price_igst_per) . '%';
                                                     ?></div>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <div class="paddingRight5 <?php
                             if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                 echo"border-color-grey-b";
                             }
                                                     ?>">
                                                 <?php
                                                     echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                     ?></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) { ?>

                                    <tr> 
                                        <td align="right" width = "50%" valign="top" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <div class="paddingRight5 ">
                                                <?php
                                                echo ($sttr_mkg_igst_per) . '%';
                                                ?>
                                            </div>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <div class="paddingRight5 ">
                                                <?php
                                                echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </td>
                        <?php
                    }
                }
            }
            ?>


            <?php
            //if ($slPrItemIGSTTotalTaxChrg != '' && $slPrItemIGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') {
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                if ((($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) || $sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) && $custInvLay != 'InvLayWoGst') {

                    $fieldName = 'totigstAmt';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        ?>

                        <td align="center" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">
                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%">

                                <?php if ($sttr_tot_price_igst_per != '' && $sttr_tot_price_igst_per != 0) { ?>

                                    <tr> 
                                        <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                            <div class="paddingRight5 <?php
                                    if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                        echo"border-color-grey-b";
                                    }
                                    ?>">

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
                                                    echo"-";
                                                }
                                                ?></div>
                                        </td>
                                        <td align="right" valign="top" width = "50%">
                                            <div class="paddingRight5 <?php
                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                            echo"border-color-grey-b";
                        }
                                                ?>">
                                                 <?php
                                                     if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' && $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                         echo decimalVal($sttr_tot_price_igst_chrg, 2) + decimalVal($sttr_mkg_igst_chrg, 2);
                                                     } else if ($sttr_tot_price_igst_chrg != 0 && $sttr_tot_price_igst_chrg != '' || $sttr_mkg_igst_chrg == 0 && $sttr_mkg_igst_chrg == '') {
                                                         echo decimalVal($sttr_tot_price_igst_chrg, 2);
                                                     } else if ($sttr_tot_price_igst_chrg == 0 && $sttr_tot_price_igst_chrg == '' || $sttr_mkg_igst_chrg != 0 && $sttr_mkg_igst_chrg != '') {
                                                         echo decimalVal($sttr_mkg_igst_chrg, 2);
                                                     } else {
                                                         echo"-";
                                                     }
                                                     ?></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sttr_mkg_igst_per != '' && $sttr_mkg_igst_per != 0) { ?>


                                <?php } ?>

                            </table>
                        </td>
                        <?php
                    }
                }
            }
            ?>
            <!--END IGST FETCHING DATA-->


            <?php
            if ($paymentMode != 'NoRateCut' || $paymentMode != 'RateCut') {
                //if ($slPrItemSGSTTotalTaxChrg != '' && $slPrItemSGSTTotalTaxChrg != 0 && $custInvLay != 'InvLayWoGst') { 
                if ($custInvLay != 'InvLayWoGst') {
                    $fieldName = 'totgstAmt';
                    //echo $sttr_tot_price_sgst_per;
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true' && $sttr_tot_price_igst_per > 0 && $sttr_tot_price_igst_chrg > 0) {
                        ?>
                        <?php //if (($sttr_tot_price_sgst_per != 0 && $sttr_tot_price_sgst_per != '') || ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0)) {                            ?>
                        <td align="center" class="fw_n ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?>" colspan="2" height="100%">

                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" height="100%"> 
                                <?php //if ($sttr_tot_price_sgst_per != '' && $sttr_tot_price_sgst_per != 0) {                                                   ?>

                                <tr> 
                                    <td align="right" valign="top" width = "50%" class="ff_calibri border-color-grey-r <?php echo $border_color_grey_bot; ?>">
                                        <div class="paddingRight5 <?php
                                if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                                    echo"border-color-grey-b";
                                }
                                ?>">

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
                                                echo"-";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" valign="top" width = "50%">
                                        <div class="paddingRight5  <?php
                        if ($sttr_total_cust_price != '' && $sttr_total_cust_price != 0) {
                            echo"border-color-grey-b";
                        }
                                            ?> ">
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
                                                     echo"-";
                                                 }
                                                 ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php //}                                   ?>
                                <?php //if ($sttr_mkg_sgst_per != '' && $sttr_mkg_sgst_per != 0) {                                ?>


                                <?php //}                                                ?>

                            </table>  
                        </td>
                        <?php
//                    }
                    }
                }
                ?>



                <?php
            }
        }
        ?>

        <?php
        if ($paymentMode != 'NoRateCut' || $crystalPresent == 'yes') {
            $fieldName = 'amt';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            if ($label_field_check == 'true') {
                ?>
                <td align="right" class="ff_calibri  border-color-grey-r <?php echo $border_color_grey_bot; ?> font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;
                    <?php if ($noOfCry > 0 && $noOfRows > 0) { ?> <?php } ?>" valign="top"  
                    >
                    <table border="0" valign="top" cellspacing="0" cellpadding="0" align="right">
                        <?php //if ($invoicePanel != 'sellInvLayA5') {                                              ?>
                        <tr>
                            <td align="right" class="paddingRight5">
                                <?php
                                if ($paymentMode != 'NoRateCut' || $sttrIndicator == 'stockCrystal') {
                                    if ($panelName == 'DeliveredOrderInvoice' || $panelName == 'PendingOrderInvoice') { // 13DEC2018
                                        echo formatInIndianStyle($slPrItemFinVal);
                                    } else if ($noOfCry == 0 && $sttrIndicator != 'stockCrystal') {
//                                  echo formatInIndianStyle($slPrItemFinVal - $stone_valuation); 
                                        echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation);
                                    } else if ($noOfCry > 0 && $noOfRows > 0) {
                                        echo formatInIndianStyle($slPrItemFinVal - $stone_valuation + $slPrCryValuation); // for crystal amt valuation Author:DIKSHA 05April2019
                                    }
//                                else {
//                                    echo formatInIndianStyle($slPrItemFinVal - $stone_valuation);
//                                }                               
                                } else {
                                    echo"-";
                                }
                                if ($noOfCry > 0) {
                                    $qSelCrystalVal = "SELECT sttr_valuation FROM stock_transaction WHERE "
                                            . "sttr_owner_id = '$sessionOwnerId' and sttr_sttr_id = '$slPrId' "
                                            . "AND sttr_indicator = 'stockCrystal' order by sttr_id asc";
                                    $resCrystalVal = mysqli_query($conn, $qSelCrystalVal);
                                    while ($rowCrystalVal = mysqli_fetch_array($resCrystalVal, MYSQLI_ASSOC)) {
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
<?php } ?>