<?php
/*
 * *************************************************************************************************
 * @Description: SET DISCOUNT TO PRODUCT CODE @AUTHOR-PRIYANKA-07NOV2020
 * *************************************************************************************************
 *
 * Created on NOV 07, 2020 05:18:00 PM 
 * *************************************************************************************************
 * @FileName: omSetDiscountToProductCode.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.29
 * @version: OMUNIM 2.7.29
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-07NOV2020
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//print_r($_REQUEST);
//
//
// PANEL NAME @AUTHOR-PRIYANKA-07NOV2020
$panelName = $_REQUEST['panelName'];
//
//
// MAIN STOCK ID @AUTHOR-PRIYANKA-07NOV2020
if ($stMainId == '' || $stMainId == NULL)
    $stMainId = $_REQUEST['stMainId'];
//
//
// MAIN STOCK METAL TYPE @AUTHOR-PRIYANKA-23NOV2020
if ($stMainMetalType == '' || $stMainMetalType == NULL)
    $stMainMetalType = $_REQUEST['stMainMetalType'];
//
//
// MAIN STOCK CATEGORY @AUTHOR-PRIYANKA-07NOV2020
if ($stMainCategory == '' || $stMainCategory == NULL)
    $stMainCategory = $_REQUEST['stMainCategory'];
//
//
// MAIN STOCK NAME @AUTHOR-PRIYANKA-07NOV2020
if ($stMainName == '' || $stMainName == NULL)
    $stMainName = $_REQUEST['stMainName'];
//
//
// MAIN STOCK PURITY @AUTHOR-PRIYANKA-07NOV2020
if ($stMainPurity == '' || $stMainPurity == NULL)
    $stMainPurity = $_REQUEST['stMainPurity'];
//
//
// FIRM @AUTHOR-PRIYANKA-10NOV2020
if ($firmName == '' || $firmName == NULL) {
    $firmName = $_REQUEST['firmName'];
}
//
//
// DISCOUNT ID @AUTHOR-PRIYANKA-07NOV2020
$discId = $_REQUEST['discId'];
//
//
parse_str(getTableValues("SELECT * FROM discount WHERE disc_id = '$discId' and "
                       . "disc_owner_id = '$sessionOwnerId'"));
//
//
parse_str(getTableValues("SELECT * FROM stock WHERE st_id = '$disc_st_id' and "
                       . "st_owner_id = '$sessionOwnerId'"));
//
//
?>
<div id="mainDiscountDiv">
    <table width="140%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" class="portlet yellow-gold box">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 40px !important;">
                    <tr>
                        <td width="26px" style="text-align:center;vertical-align: middle;padding-top: 2px;">
                            <img src="<?php echo $documentRootBSlash; ?>/images/ring32.png" alt="RING IMG" />
                        </td>
                        <td class="portlet-title caption" style="font-weight: bold !important; text-transform: uppercase;">
                            <div class="spaceLeft5">
                                SET DISCOUNT <?php echo  ' FOR ' . $st_item_name . ' [METAL : ' . $st_metal_type . ']' . ' [PURITY : ' . $st_purity . '%]'; ?>
                            </div>
                        </td>
                        <td align="center" valign="middle">
                            <div id="messDisplayDiv"></div>
                            <div class="analysis_div_rows main_link_red_12">
                                <?php if ($showDiv == 'DiscountAlreadyExists') { ?>
                                    <div id="ajax_upated_div" style="visibility: visible; background:none;"> 
                                        ~ Discount Already Present, Please Update Discount ~ 
                                    </div>
                                <?php } ?>  
                            </div>
                        </td>
                        <td align="right">
                            <div id="main_ajax_loading_div" style="visibility: hidden; background:none;">
                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
                            </div>
                        </td>
                        <td align="right">
                            <div align="left" id="discBackButton">
                                <?php
                                //
                                $inputId = "discBackBtn";
                                $inputType = 'button';
                                $inputFieldValue = "BACK";
                                $inputIdButton = "discBackBtn";
                                $inputNameButton = "discBackBtn";
                                $inputTitle = '';
                                // This is the main class for input flied
                                $inputFieldClass = 'btn ' . $om_btn_style;
                                $inputStyle = "background-color: rgb(179, 175, 175); width: 95%; height: 100%;";
                                $inputLabel = "BACK"; // Display Label below the text box
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                $inputPlaceHolder = '';
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                $inputOnChange = "";
                                $inputOnClickFun = 'backToDiscountProductDiv("'.$stMainId.'", "'.$stMainCategory.'", "'.$stMainPurity.'", "'.$stMainMetalType.'", "'.$documentRoot.'", "'.$panelName.'", "'.$firmName.'");';
                                $inputKeyUpFun = '';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                //
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                                ?>    
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
    </table> 
    <?php
    //
    //
    // PANEL NAME @AUTHOR-PRIYANKA-07NOV2020
    $panelName = $_REQUEST['panelName'];
    //
    //
    // UPDATE PANEL NAME @AUTHOR-PRIYANKA-07NOV2020
    if($UpdatePanelName == '' || $UpdatePanelName ==  NULL) {
       $UpdatePanelName = $_REQUEST['UpdatePanelName'];
    }
    // 
    //
    $selItemDetails = "SELECT * FROM stock_transaction WHERE sttr_item_category = '$st_item_category' "
                    . "and sttr_item_name = '$st_item_name' and sttr_purity = '$st_purity' "
                    . "and sttr_metal_type = '$st_metal_type' and  sttr_firm_id = '$st_firm_id' "
                    . "and sttr_transaction_type IN ('PURONCASH', 'EXISTING', 'TAG') "
                    . "and sttr_status NOT IN ('SOLDOUT','DELETED','NotDelFromStock') "
                    . "and sttr_owner_id = '$sessionOwnerId' ORDER BY sttr_item_category, sttr_item_name ASC";
    //
    //echo '$selItemDetails == ' . $selItemDetails;
    //
    $resItemDetails = mysqli_query($conn, $selItemDetails);
    $noOfDiscount = mysqli_num_rows($resItemDetails);
    //
    if ($discountCount == '' || $discountCount == NULL) {
        $discountCount = $noOfDiscount;
    }
    //
    $counter = 1;
    $count = 1;
    //
    ?>
    <div id="subDiscountDiv">
        <form name="add_item" id="add_item"
              enctype="multipart/form-data" method="post"
              action="<?php echo $documentRootBSlash; ?>/include/php/omSetDiscountToProdCodeAd.php">
            <div id="prodDiscountFormDiv"> 
            <table align="left" border="0" cellspacing="2" cellpadding="2" width="140%">                          
                <?php
                while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
                    //
                    //
                    if ($counter == 1) {
                        ?>                
                        <tr class="portlet yellow box">
                            <td style="background-color: white;">
                                <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="Discount"  
                                     onload="document.getElementById('disc_product_amount1').focus();" />
                            </td>
                            <td style="background-color: white;"></td>
                            
                            <td align="left" title="FIRM" class="textLabel12CalibriBrown font-size-13px">
                                FIRM
                            </td>

                            <td align="left" title="PRODUCT ID" class="textLabel12CalibriBrown font-size-13px">
                                PRODUCT ID
                            </td>
                            
                            <td align="left" title="CATEGORY" class="textLabel12CalibriBrown font-size-13px">
                                CATEGORY
                            </td>

                            <td align="center" title="PRODUCT NAME" class="textLabel12CalibriBrown font-size-13px">
                                PRODUCT NAME
                            </td>

                            <td align="left" title="MIN PROD AMOUNT" class="textLabel12CalibriBrown font-size-13px" >
                                MIN PROD AMOUNT
                            </td>

                            <td align="left" title="MAKING DISCOUNT" class="textLabel12CalibriBrown font-size-13px">
                                MAKING DISCOUNT
                            </td>

                            <td align="left" title="STONE VALUE" class="textLabel12CalibriBrown font-size-13px">
                                STONE DISCOUNT
                            </td>

                            <td align="left" title="TOTAL PROD AMOUNT" class="textLabel12CalibriBrown font-size-13px">
                                PRODUCT DISCOUNT
                            </td>
                        </tr>
                    <?php
                    } 
                    //
                    $counter = 2;
                    //
                    //
                    //echo 'disc_start_date == ' . $disc_start_date . '<br />';
                    //echo 'disc_end_date == ' . $disc_end_date . '<br />';
                    //echo 'disc_end_date == ' . $disc_product_amount . '<br />';
                    //echo 'disc_making_discount == ' . $disc_making_discount . '<br />';
                    //echo 'disc_stone_discount == ' . $disc_stone_discount . '<br />';
                    //echo 'disc_product_discount == ' . $disc_product_discount . '<br />';
                    //
                    //
                    parse_str(getTableValues("SELECT * FROM firm WHERE firm_id = '$rowItemDetails[sttr_firm_id]' and "
                                           . "firm_own_id = '$sessionOwnerId'"));
                    //
                    //
                    if ($rowItemDetails['sttr_disc_start_date'] != '' && 
                        $rowItemDetails['sttr_disc_start_date'] != NULL) {
                        $disc_start_date = $rowItemDetails['sttr_disc_start_date'];
                    }
                    //
                    //echo '$disc_start_date == ' . $disc_start_date . '<br />';
                    //
                    if ($disc_start_date != '' && $disc_start_date != NULL) {
                        //
                        // START DATE CODE @AUTHOR-PRIYANKA-09NOV2020
                        $selDOBDay = substr($disc_start_date, 0, 2);
                        $selDOBMnth = substr($disc_start_date, 3, -5);
                        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                        $selDOBYear = substr($disc_start_date, -4);
                    } 
                    //
                    //
                    if ($rowItemDetails['sttr_disc_end_date'] != '' && 
                        $rowItemDetails['sttr_disc_end_date'] != NULL) {
                        $disc_end_date = $rowItemDetails['sttr_disc_end_date'];
                    }
                    //
                    //echo '$disc_end_date == ' . $disc_end_date . '<br />';
                    //
                    if ($disc_end_date != '' && $disc_end_date != NULL) {
                        //
                        // END DATE CODE @AUTHOR-PRIYANKA-09NOV2020
                        $selEDOBDay = substr($disc_end_date, 0, 2);
                        $selEDOBMnth = substr($disc_end_date, 3, -5);
                        $todayEMM = date("m", strtotime($selEDOBMnth)) - 1;
                        $selEDOBYear = substr($disc_end_date, -4);
                    }
                    //
                    //
                    // PRODUCT AMOUNT @AUTHOR-PRIYANKA-09NOV2020
                    if ($rowItemDetails['sttr_disc_product_amount'] != '' && 
                        $rowItemDetails['sttr_disc_product_amount'] != NULL) {
                        $disc_product_amount = $rowItemDetails['sttr_disc_product_amount'];
                    }
                    //
                    //
                    // MAKING DISCOUNT @AUTHOR-PRIYANKA-09NOV2020
                    if ($rowItemDetails['sttr_disc_making_discount'] != '' && 
                        $rowItemDetails['sttr_disc_making_discount'] != NULL) {
                        $disc_making_discount = $rowItemDetails['sttr_disc_making_discount'];
                    }
                    //
                    //
                    // STONE DISCOUNT @AUTHOR-PRIYANKA-09NOV2020
                    if ($rowItemDetails['sttr_disc_stone_discount'] != '' && 
                        $rowItemDetails['sttr_disc_stone_discount'] != NULL) {
                        $disc_stone_discount = $rowItemDetails['sttr_disc_stone_discount'];
                    }
                    //
                    //
                    // PRODUCT DISCOUNT @AUTHOR-PRIYANKA-09NOV2020
                    if ($rowItemDetails['sttr_disc_product_discount'] != '' && 
                        $rowItemDetails['sttr_disc_product_discount'] != NULL) {
                        $disc_product_discount = $rowItemDetails['sttr_disc_product_discount'];
                    }
                    //
                    //
                    // DISCOUNT ACTIVE STATUS @AUTHOR-PRIYANKA-09NOV2020
                    if ($rowItemDetails['sttr_disc_active'] != '' && 
                        $rowItemDetails['sttr_disc_active'] != NULL) {
                        $disc_active = $rowItemDetails['sttr_disc_active'];
                    }
                    //    
                    //echo 'sttr_disc_active == ' . $rowItemDetails['sttr_disc_active'] . '<br />';
                    //echo 'sttr_disc_product_discount == ' . $rowItemDetails['sttr_disc_product_discount'] . '<br />';
                    //echo 'sttr_disc_stone_discount == ' . $rowItemDetails['sttr_disc_stone_discount'] . '<br />';
                    //echo 'sttr_disc_making_discount == ' . $rowItemDetails['sttr_disc_making_discount'] . '<br />';
                    //echo 'sttr_disc_product_amount == ' . $rowItemDetails['sttr_disc_product_amount'] . '<br />';
                    //
                    ?>
                    <tr>   
                        <td>
                            <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
                            <input type="hidden" id="firmName" name="firmName" value="<?php echo $firmName; ?>"/>
                            
                            <input type="hidden" id="sttr_id<?php echo $count; ?>" name="sttr_id<?php echo $count; ?>" 
                                   value="<?php echo $rowItemDetails['sttr_id']; ?>"/>  
                            <input type="hidden" id="main_st_id" name="main_st_id" value="<?php echo $st_id; ?>"/>  
                            <input type="hidden" id="disc_st_id<?php echo $count; ?>" name="disc_st_id<?php echo $count; ?>" 
                                   value="<?php echo $disc_st_id; ?>"/>
                            <input type="hidden" id="main_st_metal_type" name="main_st_metal_type" 
                                   value="<?php echo $rowItemDetails['sttr_metal_type']; ?>"/>
                            <input type="hidden" id="main_st_item_category" name="main_st_item_category" 
                                   value="<?php echo $rowItemDetails['sttr_item_category']; ?>"/>
                            <input type="hidden" id="main_st_purity" name="main_st_purity" 
                                   value="<?php echo $rowItemDetails['sttr_purity']; ?>"/>
                            <input type="hidden" id="disc_firm_id<?php echo $count; ?>" name="disc_firm_id<?php echo $count; ?>" 
                                   value="<?php echo $rowItemDetails['sttr_firm_id']; ?>"/>
                                                                                                                
                            <input type="hidden" id="disc_panel_name<?php echo $count; ?>" name="disc_panel_name<?php echo $count; ?>" 
                                   value="<?php echo "ProductCodeDiscountPanel"; ?>"/>
                            
                            <input type="hidden" id="noOfDiscount" name="noOfDiscount" value="<?php echo $noOfDiscount; ?>"/>
                            <input type="hidden" id="discountCount" name="discountCount" value="<?php echo $discountCount; ?>"/>                            
                            <input type="hidden" id="disc_status<?php echo $count; ?>" name="disc_status<?php echo $count; ?>"/>
                        
                            <input type="hidden" id="discountDOBDay<?php echo $count; ?>" name="discountDOBDay<?php echo $count; ?>" 
                                   value="<?php echo $selDOBDay; ?>"/>
                            <input type="hidden" id="discountDOBMonth<?php echo $count; ?>" name="discountDOBMonth<?php echo $count; ?>" 
                                   value="<?php echo $selDOBMnth; ?>"/>
                            <input type="hidden" id="discountDOBYear<?php echo $count; ?>" name="discountDOBYear<?php echo $count; ?>" 
                                   value="<?php echo $selDOBYear; ?>"/>
                            <input type="hidden" id="discountEDOBDay<?php echo $count; ?>" name="discountEDOBDay<?php echo $count; ?>" 
                                   value="<?php echo $selEDOBDay; ?>"/>
                            <input type="hidden" id="discountEDOBMonth<?php echo $count; ?>" name="discountEDOBMonth<?php echo $count; ?>" 
                                   value="<?php echo $selEDOBMnth; ?>"/>
                            <input type="hidden" id="discountEDOBYear<?php echo $count; ?>" name="discountEDOBYear<?php echo $count; ?>" 
                                   value="<?php echo $selEDOBYear; ?>"/>
                        </td>

                        <td align="left" title="CHECKBOX" class="textLabel12CalibriBrown">
                            <input type="checkbox" class="checkbox" 
                                   id="disc_discount_checked<?php echo $count; ?>" 
                                   name="disc_discount_checked<?php echo $count; ?>" 
                                   onclick="if (!this.checked) {
                                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'unchecked';
                                           } else {
                                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'checked';
                                           }"
                                   onchange="" 
                                   title="DISCOUNT CHECK" 
                                   <?php
                                   echo $disc_active;
                                   echo " " . $disc_active . " ";
                                   ?> >
                        </td>
        
        <td align="left" title="FIRM" class="textLabel12CalibriBrown">
            <input id="disc_firm_id<?php echo $count; ?>" 
                   name="disc_firm_id<?php echo $count; ?>" 
                   type="text" placeholder="FIRM" 
                   value="<?php echo $firm_name; ?>" style="width: 101%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $firm_name; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_st_item_code<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_firm_id<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="5" maxlength="10" />
        </td>

        <td align="left" title="PRODUCT ID" class="textLabel12CalibriBrown">
           <input id="disc_st_item_code<?php echo $count; ?>" 
                   name="disc_st_item_code<?php echo $count; ?>" 
                   type="text" placeholder="PRODUCT NAME" 
                   value="<?php echo $rowItemDetails['sttr_item_code']; ?>" 
                   style="margin-left: 0px; width: 102%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $rowItemDetails[sttr_item_code]; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_st_item_category<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_firm_id<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="10" maxlength="10" />
        </td>
                        
        <td align="left" title="CATEGORY" class="textLabel12CalibriBrown">
            <input id="disc_st_item_category<?php echo $count; ?>" 
                   name="disc_st_item_category<?php echo $count; ?>" 
                   type="text" placeholder="CATEGORY" 
                   value="<?php echo $rowItemDetails['sttr_item_category']; ?>" 
                   style="width: 104%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $rowItemDetails[sttr_item_category]; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_st_item_name<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_st_item_code<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="5" maxlength="10" />
        </td>

        <td align="left" title="PRODUCT NAME" class="textLabel12CalibriBrown">
           <input id="disc_st_item_name<?php echo $count; ?>" 
                   name="disc_st_item_name<?php echo $count; ?>" 
                   type="text" placeholder="PRODUCT NAME" 
                   value="<?php echo $rowItemDetails['sttr_item_name']; ?>" 
                   style="margin-left: 0px; width: 101%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $rowItemDetails[sttr_item_name]; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_product_amount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_st_item_category<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="10" maxlength="10" />
        </td>

        <td align="left" title="MIN PROD AMOUNT" class="textLabel12CalibriBrown">
            <input id="disc_product_amount<?php echo $count; ?>" 
                   name="disc_product_amount<?php echo $count; ?>" 
                   type="text" placeholder="MIN PROD AMOUNT" 
                   value="<?php echo $disc_product_amount; ?>" 
                   style="margin-left: 0px; width: 101%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $disc_product_amount; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('disc_st_item_name<?php echo $count; ?>').focus();
                               return false;
                           }"
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="11" maxlength="10" />
        </td>

        <td align="left" title="MAKING DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_making_discount<?php echo $count; ?>" 
                   name="disc_making_discount<?php echo $count; ?>" 
                   type="text" placeholder="MAKING DISCOUNT" 
                   value="<?php echo $disc_making_discount; ?>" 
                   style="margin-left: -1px; width: 103%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $disc_making_discount; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('disc_product_amount<?php echo $count; ?>').focus();
                               return false;
                           }"  
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="11" maxlength="10" />
        </td>

        <td align="left" title="STONE DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_stone_discount<?php echo $count; ?>" 
                   name="disc_stone_discount<?php echo $count; ?>" 
                   type="text" placeholder="STONE DISCOUNT" 
                   value="<?php echo $disc_stone_discount; ?>" 
                   style="margin-left: 0px; width: 101%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $disc_stone_discount; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_product_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           }" 
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="9" maxlength="10" />
        </td>

        <td align="left" title="PRODUCT DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_product_discount<?php echo $count; ?>" 
                   name="disc_product_discount<?php echo $count; ?>" 
                   type="text" placeholder="PRODUCT DISCOUNT" 
                   value="<?php echo $disc_product_discount; ?>" 
                   style="margin-left: -1px; width: 100%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $disc_product_discount; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                               return false;
                           }"  
                   ondblclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="11" maxlength="10" />
        </td>       
    </tr>
    <?php
    $count++;
    }
    ?>                   
    </table> 
    </div>                        
            <table align="left" border="0" cellspacing="2" cellpadding="2" width="120%">   
                <tr>
                    <td colspan="16" align="center">
                        <div>
                            <?php
                            $inputId = "discountSubmitBtn";
                            $inputType = 'submit';
                            $inputFieldValue = 'Submit';
                            $inputIdButton = "discountSubmitBtn";
                            $inputNameButton = 'discountSubmitBtn';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style;
                            $inputStyle = "";
                            $inputLabel = 'Submit'; // Display Label below the text box
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            $inputPlaceHolder = '';
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            $inputOnChange = "";
                            $inputOnClickFun = '';
                            $inputKeyUpFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            ?>    
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="16">
                        <div id="ProductDiscountHelpDiv"></div>                       
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>