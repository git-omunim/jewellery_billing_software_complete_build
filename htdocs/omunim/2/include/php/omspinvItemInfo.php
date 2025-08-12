<?php
/*
 * **************************************************************************************
 * @tutorial: XRF Invoice Details @PRIYANKA-01AUG18
 * **************************************************************************************
 * 
 * Created on 01 AUG, 2018 11:29:49 AM
 *
 * @FileName: omspinvItemInfo.php
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
<td colspan="<?php echo $colspan; ?>">
    <?php
//    $fieldName = 'itemDetTop';
//    $label_field_content = '';
//    parse_str(getTableValues("SELECT label_field_content,label_field_font_size "
//                           . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                           . "label_field_name = '$fieldName' and label_type = '$labelType'"));
    //
    $itemDetTopVal = $itemDetTop;
    ?>
    <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
        <?php
//        $fieldName = 'invTitle';
//        $label_field_font_size = '';
//        $label_field_font_color = '';
//        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check "
//                               . "FROM labels WHERE label_own_id = '$sessionOwnerId' and "
//                               . "label_field_name = '$fieldName' and label_type = '$labelType'"));
        //
        if ($invTitle_check == 'true') {
            ?>
            <tr> 
                <td valign="middle" align="center" colspan="<?php echo $colspan; ?>">
                    <div class="ff_calibri fw_n font_color_<?php echo $invTitle_color; ?>" style="font-size:16px;" onClick="this.contentEditable = 'true';">
                        <?php
                        //
                        $invTitle = 'XRF REPORT';
                        //
                        echo '<b>' . $invTitle . '</b>';
                        ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td align="center" colspan="<?php echo $colspan; ?>">
                &nbsp;
            </td>
        </tr>
        <?php
        //
        if ($invName == 'XRF_PAYMENT') {
           //
            $qSelSlPrItemDetails = "SELECT * FROM xrf_entries WHERE xrf_owner_id = '$sessionOwnerId' "
                . "and xrf_pre_invoice_no = '$slPrPreInvoiceNo' and xrf_invoice_no = '$slPrInvoiceNo' "              
                . "and xrf_user_id = '$userId' and xrf_status NOT IN('DELETED') order by xrf_id ASC";
            //
            $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
            $noOf = mysqli_num_rows($resSlPrItemDetails);
            //
        } 
        //
        $SrNo = 1;
        //
        while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) {
            //
            $xrf_id = $rowSlPrItemDetails['xrf_id'];
            $xrf_metal_type = $rowSlPrItemDetails['xrf_metal_type'];
            $xrf_prod_name = $rowSlPrItemDetails['xrf_prod_name'];
            $xrf_hsn_no = $rowSlPrItemDetails['xrf_hsn_no'];
            $xrf_prod_quantity = $rowSlPrItemDetails['xrf_prod_quantity'];
            $xrf_prod_gs_weight = $rowSlPrItemDetails['xrf_prod_gs_weight'] . ' ' . $rowSlPrItemDetails['xrf_prod_gs_weight_type'];
            $xrf_karat = $rowSlPrItemDetails['xrf_karat'];
            $xrf_Gold = $rowSlPrItemDetails['xrf_Gold'];
            $xrf_Silver = $rowSlPrItemDetails['xrf_Silver'];
            $xrf_prod_other_info = $rowSlPrItemDetails['xrf_prod_other_info'];
            //
            include 'omspindtRight.php';
            //
            $SrNo++; 
        }
?>