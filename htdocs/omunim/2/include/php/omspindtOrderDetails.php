<?php
/*
 * **************************************************************************************
 * @tutorial: ORDER DETAILS @PRIYANKA-17JUNE2021
 * **************************************************************************************
 * 
 * Created on 17 JUNE, 2021 06:30:22 PM
 *
 * @FileName: omspindtOrderDetails.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-17JUNE2021
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
</style>
<?php if ($counterNew == 1) { ?>
    <tr class="bc_color_darkblue" height="20px">
        <!--*******************************************************************************-->
        <!--START CODE TO CUSTOMIZE ORDER DETAILS : AUTHOR @DARSHANA 26 AUG 2021-->
        <!--*************************************************************************************-->
        <?php
        $fieldName = 'orderItemSNo';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderItemSNoLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>


        <?php
        $fieldName = 'orderNo';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderNoLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderProdCode';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderProdCodeLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderProdDesign';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true' && $imageDisplay == 'Y') {
            $fieldName = 'orderProdDesignLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderProdDetails';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderProdDetailsLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderQty';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderQtyLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderGsWt';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderGsWtLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderNetWt';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderNetWtLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderPurity';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderPuritytLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderFinWt';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderFinWttLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderfpurity';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderfpurityLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>

        <?php
        $fieldName = 'orderffinwt';
        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                        . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        if ($label_field_check == 'true') {
            $fieldName = 'orderffnwtLb';
            $label_field_font_size = '';
            $label_field_font_color = '';
            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
                            . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                            . "label_field_name = '$fieldName' and label_type = '$labelType'"));
            ?>
            <td align="left" class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu" style="font-size:<?php
            if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                echo $label_field_font_size;
            } else {
                ?>14 <?php } ?>px; color:<?php echo $label_field_font_color; ?>"
                width="<?php echo $gsWtWidth; ?>">
                <div class="paddingRight5 paddingLeft5">
                    <?php echo $label_field_content; ?>
                </div>
            </td>
        <?php } ?>
    </tr>
<?php } $counterNew = 2; ?>
<tr class="marginTop10" >
    <?php
    $fieldName = 'orderItemSNo';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "SR NO.">
                            <?php
                            if ($SrNo != '') {
                                if ($rowSlPrItemDetails['sttr_indicator'] == 'stock') {
                                    echo $SrNo;
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>

    <?php
    $fieldName = 'orderNo';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "ORDER NO">
                            <?php
                            if ($orderNo != '') {
                                echo $orderNo;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderProdCode';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "PROD ID">
                            <?php
                            if ($sttr_item_code != '') {
                                echo $sttr_item_code . " (" . strtoupper($sttr_metal_type) . ") ";
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderProdDesign';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true' && $imageDisplay == 'Y') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "IMAGE">
                            <?php
                            if ($rowSlPrItemDetails['sttr_image_id'] != '') {
                                //
                                $sttr_image_id = $rowSlPrItemDetails['sttr_image_id'];
                                //
                                $imageFName = '';
                                //
                                //echo '$sttr_image_id == ' . $sttr_image_id . '<br />';
                                //
                                if ($sttr_image_id != NULL && $sttr_image_id != '') {
                                    parse_str(getTableValues("SELECT image_snap_fname FROM image "
                                                    . "WHERE image_id='$sttr_image_id'"));
                                    $imageFName = $image_snap_fname;
                                }
                                //
                                //echo '$imageFName == ' . $imageFName . '<br />';
                                //
                                if ($imageFName != '') {
                                    ?>
                                    <a style="cursor: pointer;" 
                                       onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogsprsim.php?itst_id=<?php echo "$sttr_image_id"; ?>',
                                                                                           'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                   return false" >
                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/ogspicim.php?itst_id=<?php echo "$sttr_image_id"; ?>" 
                                             width="64px" height="64px" alt ="Item Design" border="0" 
                                             style="border-color: #B8860B"/>
                                    </a>
                                    <?php
                                }
                            } else {
                                echo '';
                            }
                            ?> 
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>

    <?php
    $fieldName = 'orderProdDetails';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "DETAILS">
                            <?php
                            if ($sttr_item_name != '') {
                                echo $sttr_item_name;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderQty';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "GS WT">
                            <?php
                            if ($sttr_quantity != '') {
                                echo $sttr_quantity;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderGsWt';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "GS WT">
                            <?php
                            if ($sttr_gs_weight != '') {
                                echo $sttr_gs_weight;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderNetWt';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "NT WT">
                            <?php
                            if ($sttr_nt_weight != '') {
                                echo $sttr_nt_weight;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderPurity';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "PURITY">
                            <?php
                            if ($sttr_purity != '') {
                                echo $sttr_purity . "%";
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderFinWt';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "FN WT">
                            <?php
                            if ($sttr_fine_weight != '') {
                                if ($rowSlPrItemDetails['sttr_indicator'] != 'stockCrystal') {
                                    echo $sttr_fine_weight;
                                } else {
                                    echo $rowSlPrItemDetails['sttr_fine_weight'];
                                }
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderfpurity';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "F.PURITY">
                            <?php
                            if ($sttr_final_purity != '') {
                                echo $sttr_final_purity . "%";
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <?php
    $fieldName = 'orderffinwt';
    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                    . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    if ($label_field_check == 'true') {
        ?>
        <td align="center" class="border-color-grey-rb border-color-grey-left" valign="top">
            <div class="paddingLeft5">
                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td align = "left" class = "ff_calibri font_color_black" style = "font-size:14px" title = "FFN WT">
                            <?php
                            if ($sttr_final_fine_weight != '') {
                                if ($rowSlPrItemDetails['sttr_indicator'] != 'stockCrystal') {
                                    echo $sttr_final_fine_weight;
                                } else {
                                    echo $rowSlPrItemDetails['sttr_final_fine_weight'];
                                }
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    <?php } ?>
    <!--*******************************************************************************-->
    <!--END CODE TO CUSTOMIZE ORDER DETAILS : AUTHOR @DARSHANA 26 AUG 2021-->
    <!--*************************************************************************************-->
</tr>  