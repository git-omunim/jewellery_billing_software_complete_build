<?php
/*
 * **************************************************************************************
 * @tutorial: INVOICE FOOTER @PRIYANKA-17JUNE2021
 * **************************************************************************************
 * 
 * Created on 17 JUNE, 2021 05:50:40 PM
 *
 * @FileName: omspinvFooter.php
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
<tr>
    <td colspan="<?php echo $colspan; ?>">
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
            <tr>
                <td colspan="<?php echo $colspan; ?>">
                    <table border="0" cellpadding="0" width="100%" cellspacing="0">    
                        <tr>
                            <td align="center" colspan="<?php echo $colspan; ?>">
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td colspan="<?php echo $colspan; ?>">
                                <?php
                                $fieldName = 'termsTop';
                                $label_field_content = '';
                                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                $termsDetTopVal = $label_field_content;
                                ?>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:<?php echo $termsDetTopVal; ?>mm">
                                    <?php
                                    $fieldName = 'tnc';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_check == 'true') {
                                        ?>
                                        <tr>
                                            <?php
                                            $fieldName = 'tncLb';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?>
                                            <td align="left" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                <?php echo $label_field_content; ?> : &nbsp;</td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <?php if ($label_field_check == 'true') { ?>
                                            <?php
                                            $fieldName = 'tnc';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            //$noOfRows = substr_count($label_field_content, "\n") + 2;
                                            //$height = $noOfRows * ($label_field_font_size * 3);
                                            $noOfRows = substr_count($label_field_content, "\n") + 2;
                                            $height = $noOfRows * ($label_field_font_size * 3);
                                            ?>
                                            <td align="left"  class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="">
                                                <div onClick="this.contentEditable = 'true';">
                                                    <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri" rows="<?php echo $noOfRows; ?>"
                                                              style="text-align:left;width:90%;height:<?php echo $height; ?>;font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></textarea>                                   
                                                </div>
                                            </td>
                                        <?php } ?>  
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="paddingRight5" valign="middle">
                                <table border="0" cellpadding="0" cellspacing="0" align="right" valign="bottom">
                                    <tr>
                                        <?php
                                        $fieldName = 'forName';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            $fieldName = 'forNameLb';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($label_field_font_size == 0) {
                                                $label_field_font_size = 14;
                                            }
                                            ?>
                                            <td align="left" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>&nbsp;:&nbsp;&nbsp;</td>
                                        <?php } ?>
                                        <?php
                                        $fieldName = 'forName';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="right" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_long_name; ?></td>
                                        <?php } ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <?php
                                        $fieldName = 'authCustSignLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="left" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo 'Manufacturer Signatory'; ?></td>
                                        <?php } ?>  
                                        <?php
                                        $fieldName = 'authSignLb';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="right" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
                                        <?php } ?>  
                                    </tr>

                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $fieldName = 'footer';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_check == 'true') {
                                            ?>
                                            <td align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                                                <?php echo $label_field_content; ?>
                                            </td>
                                        <?php } ?>  
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>  
        <?php 
        //
        // ****************************************************************************************************************
        // START CODE FOR PRINT ORDER IMAGES (BIG SIZE) ON NEW PAGE ON INVOICE, WHILE INVOICE PRINTING @PRIYANKA-17JUNE2021 
        // ****************************************************************************************************************
        //
        if ($assignPanelName == '' || $assignPanelName == NULL) {
            $assignPanelName = $_REQUEST['assignPanelName'];
        }
        //
        //echo '$assignPanelName == ' . $assignPanelName . '<br />';
        //
        if ($assignPanelName == 'NewOrderAssign') {
        //
        //
        $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                             . "and sttr_assign_pre_invoice_no = '$slPrPreInvoiceNo' "
                             . "and sttr_assign_invoice_no = '$slPrInvoiceNo' "
                             . "and sttr_indicator IN ('stock', 'stockCrystal') "
                             . "and sttr_transaction_type IN ('newOrder') "
                             . "and sttr_image_id != '' "
                             . "and sttr_status = 'PaymentDone' "
                             . "and sttr_assign_status = 'ASSIGNED' "
                             . "and sttr_assign_user_id = '$userId' order by sttr_id ASC";
        //
        //echo '$qSelSlPrItemDetails == ' . $qSelSlPrItemDetails . '<br />';
        //
        $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
        //
        while ($rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails)) { ?>
            <table border="0" cellpadding="0" cellspacing="0" align="left" 
                   style="page-break-before: always; width: 100%; height: 100%; margin-top: 10px;">
            <?php
            //
            $slPrId = $rowSlPrItemDetails['sttr_id'];
            $sttr_image_id = $rowSlPrItemDetails['sttr_image_id'];
            //
            //echo '$invoicePanel == ' . $invoicePanel . '<br />';
            //
            if ($rowSlPrItemDetails['sttr_image_id'] != '') { 
                //
                $imageFName = '';
                //
                //echo '$sttr_image_id == ' . $sttr_image_id . '<br />';
                //
                if ($sttr_image_id != NULL && $sttr_image_id != '') {
                    parse_str(getTableValues("SELECT image_snap_fname FROM image WHERE image_id='$sttr_image_id'"));
                    $imageFName = $image_snap_fname;
                }
                //
                //echo '$imageFName == ' . $imageFName . '<br />';
                //
                if ($imageFName != '') { ?>                
                    <tr>
                        <td align="center" class="ff_calibri fs_13 <?php echo $border_color_grey_bot; ?>" valign="top">                                               
                            <img src="<?php echo $documentRootBSlash; ?>/include/php/ogspicim.php?itst_id=<?php echo "$sttr_image_id"; ?>" 
                                width="75%" height="75%" alt ="Product Design" border="0" style="border-color: #B8860B"/>
                        </td>
                    </tr>
                <?php } } ?>
            <tr></tr>
            <tr>
            <?php
                //
                $fieldName = 'authCustSignLb';
                //
                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,"
                                       . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and "
                                       . "label_field_name = '$fieldName' and label_type = '$labelType'"));
                //
                if ($label_field_check == 'true') { ?>
                    <td align="left" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" 
                        style="font-size:<?php echo $label_field_font_size; ?>px">
                            <?php echo $label_field_content; ?>
                    </td>
                <?php } ?>   
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
        <?php } } 
        // ****************************************************************************************************************
        // END CODE FOR PRINT ORDER IMAGES (BIG SIZE) ON NEW PAGE ON INVOICE, WHILE INVOICE PRINTING @PRIYANKA-17JUNE2021 
        // ****************************************************************************************************************
        ?>
        <?php
        //
        //
        $invoiceDirectURL = "http://127.0.0.1:8080/omunim/2/include/php/omspinvo.php?userId=10001&slPrPreInvoiceNo=IS&slPrInvoiceNo=1&slprinSubPanel=&invoiceDate=22%20OCT%202019&invoicePanel=sellInvLayA4&labelType=SellPurchase";
        //
        //
        $readWritefile = fopen("invoice/om_current_invoice.html", "w");
        fwrite($readWritefile, ob_get_contents());
        fclose($readWritefile);
        $emailStaus = $_REQUEST['emailStaus'];
        if($emailStaus == 'Yes'){
            include 'ogspsmail.php';
        }
        ?>
        <table border="0" cellpadding="0" cellspacing="0" align="center" 
            <?php if ($panelName == 'PendingOrderInvoice') { ?>style="margin-top: 10px;"<?php } ?> >
            <tr>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                    <a style="cursor: pointer;" 
                       onClick="window.print();">
                        <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a>
                </td>
                <td align="center" class="noPrint">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <a style="cursor: pointer;" 
                       href='localexplorer:C:\COM\bat\omprint.bat' >
                        <img src="<?php echo $documentRootBSlash; ?>/images/printer_wifi_32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</td>
</tr>
</table>
</div>
