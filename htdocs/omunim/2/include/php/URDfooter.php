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
                                                  style="text-align:left;width:<?php echo $textAreaWidth; ?>;height:<?php echo $height; ?>;font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></textarea>                                   
                                    </div>
                                </td>
                            <?php } ?>  
                        </tr>
                    </table>
                </td>
            </tr>
            <table width="100%">
                <tr>
                    <?php
                    $fieldName = 'authCustSignLb';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        ?>
                        <td align="left" width="150px" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
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

 <!-- <div class="block84LText9 element" id="tailbcBarcode" style="font-size: <?php echo $fontSize8; ?>;border:0px solid; cursor:pointer;width:auto;left:<?php echo $omx_pos . px; ?>;top:<?php echo $omy_pos . px; ?>;position:absolute;">
         <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=TAIL&bar_id=<?php echo $slPrPreInvoiceNo . $slPrInvoiceNo; ?>" alt="Barcode" height="<?php echo $barcodeSize; ?>px" /><br>
     </div>-->
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
        </table>
    </div> 
    <?php include 'ominvoicetagline.php'; ?>
    <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:<?php echo $divIdClass; ?>">
        <tr>
            <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                <a style="cursor: pointer;" 
                   onClick="window.print();">
                    <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                         width="32px" height="32px" /> 
                </a>
            </td>
        </tr>
    </table>
