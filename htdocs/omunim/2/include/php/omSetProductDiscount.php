<?php
/*
 * *************************************************************************************************
 * @Description: SET PRODUCT DISCOUNT FORM FILE @AUTHOR-PRIYANKA-15OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 15, 2020 04:00:00 PM 
 * *************************************************************************************************
 * @FileName: omSetProductDiscount.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.21
 * @version: OMUNIM 2.7.21
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-15OCT2020
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
//
// SESSION FIRM ID @AUTHOR-PRIYANKA-23OCT2020
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
//print_r($_REQUEST);
//
//
// CATEGORY @AUTHOR-PRIYANKA-23OCT2020
$main_st_item_category = $_REQUEST['st_item_category'];
//
//
// MAIN PROD PURITY @AUTHOR-PRIYANKA-07NOV2020
$main_st_purity = $_REQUEST['st_purity'];
//
//
// MAIN STOCK ID @AUTHOR-PRIYANKA-23OCT2020
$main_st_id = $_REQUEST['st_id'];
//
//
// MAIN PROD METAL TYPE @AUTHOR-PRIYANKA-23NOV2020
$main_st_metal_type = $_REQUEST['st_metal_type'];
//
//
// FIRM @AUTHOR-PRIYANKA-10NOV2020
$firmName = $_REQUEST['firmName'];
//  
//  
// UPDATE MSG @PRIYANKA-10NOV2020
if ($updateMsg == '' || $updateMsg == NULL) {
    $updateMsg = $_REQUEST['updateMsg'];
}
//
//
// MSG DIV SHOW @PRIYANKA-10NOV2020
if ($showDiv == '' || $showDiv == NULL) {
    $showDiv = $_REQUEST['showDiv'];
}
//
?>
<div id="mainDiscountDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" class="portlet box">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="height: 40px !important;">
                    <tr>
                        <td width="26px" style="text-align:center;vertical-align: middle;padding-top: 2px;">
                            <img src="<?php echo $documentRootBSlash; ?>/images/img/stock.png" alt="RING IMG" height="26px"/>
                        </td>
                        <td class="portlet-title caption" style="font-weight: bold !important; text-transform: uppercase;">
                            <div class="spaceLeft5">
                                SET DISCOUNT <?php echo ' FOR ' . $main_st_item_category . ' [FIRM : ' . $firmName . ']' . ' [METAL : ' . $main_st_metal_type . ']' . ' [PURITY : ' . $main_st_purity . '%] '; ?>
                            </div>
                        </td>
                        <td align="center" valign="middle">
                            <div id="messDisplayDiv"></div>
                            <div class="analysis_div_rows main_link_red_12" id="msgShowDiv">
                                <?php if ($showDiv == 'ProdCatUpdateMsg') { ?>
                                    <div id="ajax_upated_div" 
                                         style="visibility: visible; background:none; color: rgb(68, 201, 28);"> 
                                        ~ Discount Added/Updated Successfully! ~ 
                                    </div>
                                    <?php } else if ($updateMsg == 'ProdUpdateMsg') {
                                    ?>  
                                    <div id="ajax_upated_div" 
                                         style="visibility: visible; background:none; color: rgb(68, 201, 28);"> 
                                        ~ Product Discount Updated Successfully! ~ 
                                    </div>
                                <?php } ?>
                            </div>
                        </td>
                        <td align="right">
                            <div id="main_ajax_loading_div" style="visibility: hidden; background:none;">
                                <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
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
    // PANEL NAME @AUTHOR-PRIYANKA-15OCT2020
    $panelName = $_REQUEST['panelName'];
    //
    //
    // UPDATE PANEL NAME @PRIYANKA-23-OCT-2020
    if ($UpdatePanelName == '' || $UpdatePanelName == NULL) {
        $UpdatePanelName = $_REQUEST['UpdatePanelName'];
    }
    //
    //  @PRIYANKA-27-OCT-2020
    if ($noOfDiscount == '' || $noOfDiscount == NULL) {
        $noOfDiscount = $_REQUEST['noOfDiscount'];
    }
    // 
    //
    $selItemDetails = "SELECT * FROM discount WHERE disc_st_item_category = '$main_st_item_category' "
            . "AND disc_st_purity = '$main_st_purity' "
            . "AND disc_st_metal_type = '$main_st_metal_type' "
            . "AND disc_owner_id = '$sessionOwnerId' AND disc_panel_name = 'ProductDiscountPanel' "
            . "ORDER BY disc_id ASC";
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
              action="<?php echo $documentRootBSlash; ?>/include/php/omProductDiscountAd.php">
            <div id="prodDiscountFormDiv"> 
                <table align="left" border="0" cellspacing="0" cellpadding="1" width="100%" class="brdrgry-dashed">                          
                    <?php
                    while ($rowItemDetails = mysqli_fetch_array($resItemDetails)) {
                        //
                        //
                        // START DATE CODE @AUTHOR-PRIYANKA-17OCT2020
                        $selDOBDay = date(j);
                        $selDOBMnth = strtoupper(date(M));
                        $todayMM = date(n) - 1;
                        $selDOBYear = date(Y);
                        //
                        // END DATE CODE @AUTHOR-PRIYANKA-17OCT2020
                        $selEDOBDay = date(j);
                        $selEDOBMnth = strtoupper(date(M));
                        $todayEMM = date(n) - 1;
                        $selEDOBYear = date(Y);
                        //
                        //
                        if ($counter == 1) {
                            ?>                
                            <tr class="portlet height28 goldBack box">
                                <td style="background-color: white;">
                                    <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="Discount"  
                                         onload="document.getElementById('disc_product_amount1').focus();" />
                                </td>
                                <td align="center">&nbsp;</td>

                                <td align="left" title="CATEGORY" class="textLabel12CalibriBrown font-size-13px">
                                    CATEGORY
                                </td>

                                <td align="left" title="PRODUCT NAME" class="textLabel12CalibriBrown font-size-13px">
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
                                <td align="left" title="TOTAL PROD AMOUNT" class="textLabel12CalibriBrown font-size-13px">
                                    ONLINE MRP DISCOUNT(+)
                                </td>
                                <td align="left" title="TOTAL PROD AMOUNT" class="textLabel12CalibriBrown font-size-13px">
                                    ONLINE MRP DISCOUNT(-)
                                </td>

                                <td align="center" title="START DATE" class="textLabel12CalibriBrown font-size-13px">
                                    START DATE
                                </td>

                                <td align="center" title="END DATE" class="textLabel12CalibriBrown font-size-13px">
                                    END DATE
                                </td>

                                <td align="center" title="ADD" class="textLabel12CalibriBrown font-size-13px">
                                    &nbsp;
                                </td>

                                <td align="center" title="DELETE" class="textLabel12CalibriBrown font-size-13px"> 
                                    &nbsp;
                                </td>
                            </tr>
                            <?php
                        }
                        //
                        $counter = 2;
                        //
                        //
                        parse_str(getTableValues("SELECT * FROM firm WHERE firm_id = '$rowItemDetails[disc_firm_id]' and "
                                        . "firm_own_id = '$sessionOwnerId'"));
                        //
                        //
                        parse_str(getTableValues("SELECT * FROM stock WHERE st_id = '$rowItemDetails[disc_st_id]' and "
                                        . "st_owner_id = '$sessionOwnerId'"));
                        //
                        //
                        $disc_start_date = $rowItemDetails['disc_start_date'];
                        //
                        //echo '$disc_start_date == ' . $disc_start_date . '<br />';
                        //
                        if ($disc_start_date != '' && $disc_start_date != NULL) {
                            //
                            // START DATE CODE @AUTHOR-PRIYANKA-21OCT2020
                            $selDOBDay = substr($disc_start_date, 0, 2);
                            $selDOBMnth = substr($disc_start_date, 3, -5);
                            $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                            $selDOBYear = substr($disc_start_date, -4);
                        }
                        //
                        //
                        $disc_end_date = $rowItemDetails['disc_end_date'];
                        //
                        //echo '$disc_end_date == ' . $disc_end_date . '<br />';
                        //
                        if ($disc_end_date != '' && $disc_end_date != NULL) {
                            //
                            // END DATE CODE @AUTHOR-PRIYANKA-21OCT2020
                            $selEDOBDay = substr($disc_end_date, 0, 2);
                            $selEDOBMnth = substr($disc_end_date, 3, -5);
                            $todayEMM = date("m", strtotime($selEDOBMnth)) - 1;
                            $selEDOBYear = substr($disc_end_date, -4);
                        }
                        //
                        $disc_product_amount = $rowItemDetails['disc_product_amount'];
                        //
                        $disc_making_discount = $rowItemDetails['disc_making_discount'];
                        //
                        $disc_stone_discount = $rowItemDetails['disc_stone_discount'];
                        //
                        $disc_product_discount = $rowItemDetails['disc_product_discount'];
                        //
                        $disc_online_product = $rowItemDetails['disc_online_product'];
                        //
                        $disc_online_product_price_bounce = $rowItemDetails['disc_online_product_price_bounce'];
                        //
                        $disc_active = $rowItemDetails['disc_active'];
                        //
                        //echo '$disc_discount_checked == ' . $disc_discount_checked . '<br />';
                        //                  
                        ?>
                        <tr id="discountRow<?php echo $count; ?>">   
                            <td>
                                <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
                                <input type="hidden" id="firmName" name="firmName" value="<?php echo $firmName; ?>"/>
                                <input type="hidden" id="main_st_id" name="main_st_id" value="<?php echo $st_id; ?>"/>
                                <input type="hidden" id="main_st_metal_type" name="main_st_metal_type" 
                                       value="<?php echo $main_st_metal_type; ?>"/>
                                <input type="hidden" id="main_st_item_category" name="main_st_item_category" 
                                       value="<?php echo $main_st_item_category; ?>"/>
                                <input type="hidden" id="main_st_purity" name="main_st_purity" 
                                       value="<?php echo $main_st_purity; ?>"/>
                                <input type="hidden" id="disc_id<?php echo $count; ?>" name="disc_id<?php echo $count; ?>" 
                                       value="<?php echo $rowItemDetails['disc_id']; ?>"/>
                                <input type="hidden" id="disc_st_id<?php echo $count; ?>" name="disc_st_id<?php echo $count; ?>" 
                                       value="<?php echo $rowItemDetails['disc_st_id']; ?>"/>
                                <input type="hidden" id="disc_firm_id<?php echo $count; ?>" name="disc_firm_id<?php echo $count; ?>" 
                                       value="<?php echo $rowItemDetails['disc_firm_id']; ?>"/>
                                <input type="hidden" id="disc_panel_name<?php echo $count; ?>" name="disc_panel_name<?php echo $count; ?>" 
                                       value="<?php echo "ProductDiscountPanel"; ?>"/>
                                <input type="hidden" id="noOfDiscount" name="noOfDiscount" value="<?php echo $noOfDiscount; ?>"/>
                                <input type="hidden" id="discountCount" name="discountCount" value="<?php echo $discountCount; ?>"/>                            
                                <input type="hidden" id="disc_status<?php echo $count; ?>" name="disc_status<?php echo $count; ?>"/>
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

                            <td align="left" title="CATEGORY" class="textLabel12CalibriBrown">
                                <input id="disc_st_item_category<?php echo $count; ?>" 
                                       name="disc_st_item_category<?php echo $count; ?>" 
                                       type="text" placeholder="CATEGORY" 
                                       value="<?php echo $st_item_category; ?>" style="width:100%;height:35px;"
                                       onblur="if (this.value == '' || this.value == null) {
                                                   this.value = '<?php echo $st_item_category; ?>'
                                               }"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('disc_st_item_name<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8) {
                                                   document.getElementById('discountEDOBYear<?php echo $count - 1; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="5" maxlength="10"/>
                            </td>

                            <td align="left" title="PRODUCT NAME" class="textLabel12CalibriBrown">
                                <div align="left" id="discName<?php echo $count; ?>">
                                    <?php
                                    //
                                    $inputId = "disc_st_item_name" . $count;
                                    $inputType = 'button';
                                    $inputFieldValue = $st_item_name;
                                    $inputIdButton = "disc_st_item_name" . $count;
                                    $inputNameButton = "disc_st_item_name" . $count;
                                    $inputTitle = '';
                                    //
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style;
                                    $inputStyle = "background-color: rgb(179, 175, 175); width:100%;height:35px;text-align: left;";
                                    $inputLabel = $st_item_name; // Display Label below the text box
                                    //
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'setDiscountToProductCode("' . $rowItemDetails[disc_id] . '", document.getElementById("noOfDiscount").value, "' . $documentRoot . '", "' . $panelName . '", "' . $st_id . '", "' . $main_st_item_category . '", "' . $st_item_name . '", "' . $main_st_purity . '", "' . $main_st_metal_type . '", "' . $firm_name . '");';
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

                            <td align="left" title="MIN PROD AMOUNT" class="textLabel12CalibriBrown">
                                <input id="disc_product_amount<?php echo $count; ?>" 
                                       name="disc_product_amount<?php echo $count; ?>" 
                                       type="text" placeholder="MIN PROD AMOUNT" 
                                       value="<?php echo $disc_product_amount; ?>" 
                                       style="width: 100%;height:35px"
                                       onblur=""
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
                                       style="width: 100%;height:35px"
                                       onblur=""
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
                                       style="height:35px;width: 100%;"
                                       onblur=""
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
                                       style="height:35px; width:100%;"
                                       onblur=""
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
                              <td align="left" title="ONLINE MRP DISCOUNT" class="textLabel12CalibriBrown">
                                <input id="disc_online_product_price_bounce<?php echo $count; ?>" 
                                       name="disc_online_product_price_bounce<?php echo $count; ?>" 
                                       type="text" placeholder="ONLINE MRP DISCOUNT" 
                                       value="<?php echo $disc_online_product_price_bounce; ?>" 
                                       style="width: 100%;height:35px;"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('disc_online_product<?php echo $count; ?>').focus();
                                                   return false;
                                               }"  
                                       ondblclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="11" maxlength="10" />
                            </td>
                            <td align="left" title="ONLINE MRP DISCOUNT" class="textLabel12CalibriBrown">
                                <input id="disc_online_product<?php echo $count; ?>" 
                                       name="disc_online_product<?php echo $count; ?>" 
                                       type="text" placeholder="ONLINE MRP DISCOUNT" 
                                       value="<?php echo $disc_online_product; ?>" 
                                       style="width: 100%;height:35px;"
                                       onblur=""
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('disc_product_discount<?php echo $count; ?>').focus();
                                                   return false;
                                               }"  
                                       ondblclick="this.value = '';"
                                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                                       size="11" maxlength="10" />
                            </td>

                            <td align="left" title="START DATE" class="textLabel12CalibriBrown">
                                <table align="left" border="0" cellspacing="1" cellpadding="0" width="100%">
                                    <tr>
                                        <td align="center" width="100%">
                                            <!-- Start Date Code for DAY @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $todayDay = $selDOBDay - 1;

                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <select id="discountDOBDay<?php echo $count; ?>" 
                                                    name="discountDOBDay<?php echo $count; ?>" 
                                                    title="DAY" style="width:30%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('disc_product_discount<?php echo $count; ?>').focus();
                                                                return false;
                                                            }"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">DAY</option>
                                                <?php
                                                for ($dd = 0; $dd <= 30; $dd++) {
                                                    $selected_day = ($arrDays[$dd] == $selDOBDay) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                                                }
                                                ?>
                                            </select> 
                                            <!-- Start Date Code for MONTH @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                            $optMonth[$todayMM] = "selected";
                                            ?> 
                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                                            <select id="discountDOBMonth<?php echo $count; ?>" 
                                                    name="discountDOBMonth<?php echo $count; ?>" 
                                                    title="MONTH" style="width:30%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                                                return false;
                                                            }
                                                            //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020
                                                            var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                            gbMonth = document.getElementById('gbMonthId').value;
                                                            if (gbMonth == 1) {
                                                                if (event.keyCode) {
                                                                    var sel = String.fromCharCode(event.keyCode);
                                                                    if (sel == 0)
                                                                    {
                                                                        this.value = arrMonths[9];
                                                                    } else if (sel == 1)
                                                                    {
                                                                        this.value = arrMonths[10];
                                                                    } else if (sel == 2)
                                                                    {
                                                                        this.value = arrMonths[11];
                                                                    }
                                                                    document.getElementById('gbMonthId').value = 0;
                                                                }
                                                            } else if (event.keyCode) {
                                                                var sel = String.fromCharCode(event.keyCode) - 1;
                                                                this.value = arrMonths[sel];
                                                                if (event.keyCode == 49) {
                                                                    document.getElementById('gbMonthId').value = 1;
                                                                }
                                                            } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">MON</option>
                                                <?php
                                                for ($mm = 0; $mm <= 11; $mm++) {
                                                    $selected_month = ($arrMonths[$mm] == $selDOBMnth) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                                                }
                                                ?>
                                            </select> 
                                            <!-- Start Date Code for YEAR @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $todayYear = date(Y) + 10;
                                            $optYear[$selDOBYear] = "selected";
                                            ?> 
                                            <select id="discountDOBYear<?php echo $count; ?>" 
                                                    name="discountDOBYear<?php echo $count; ?>" 
                                                    title="YEAR" style="width:33%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();

                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                                                return false;
                                                            }"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">YEAR</option>
                                                <?php
                                                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                    $selected_year = ($yy == $selDOBYear) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$yy\" $selected_year>$yy</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td align="left" title="END DATE" class="textLabel12CalibriBrown">
                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                    <tr>
                                        <td align="center" class="margin1pxAll" width="100%">
                                            <!-- End Date Code for DAY @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $todayDay = $selEDOBDay - 1;

                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <select id="discountEDOBDay<?php echo $count; ?>" 
                                                    name="discountEDOBDay<?php echo $count; ?>" 
                                                    title="DAY" style="width:30%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                                                return false;
                                                            }"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">DAY</option>
                                                <?php
                                                for ($dd = 0; $dd <= 30; $dd++) {
                                                    $selected_day = ($arrDays[$dd] == $selEDOBDay) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                                                }
                                                ?>
                                            </select> 
                                            <!-- End Date Code for MONTH @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                            $optMonth[$todayEMM] = "selected";
                                            ?> 
                                            <input  id="gbEMonthId" name="gbEMonthId" type="hidden" value="0" /> 
                                            <select id="discountEDOBMonth<?php echo $count; ?>" 
                                                    name="discountEDOBMonth<?php echo $count; ?>" 
                                                    title="MONTH" style="width:30%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();
                                                                return false;
                                                            }
                                                            //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020
                                                            var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                            gbMonth = document.getElementById('gbEMonthId').value;
                                                            if (gbMonth == 1) {
                                                                if (event.keyCode) {
                                                                    var sel = String.fromCharCode(event.keyCode);
                                                                    if (sel == 0)
                                                                    {
                                                                        this.value = arrMonths[9];
                                                                    } else if (sel == 1)
                                                                    {
                                                                        this.value = arrMonths[10];
                                                                    } else if (sel == 2)
                                                                    {
                                                                        this.value = arrMonths[11];
                                                                    }
                                                                    document.getElementById('gbEMonthId').value = 0;
                                                                }
                                                            } else if (event.keyCode) {
                                                                var sel = String.fromCharCode(event.keyCode) - 1;
                                                                this.value = arrMonths[sel];
                                                                if (event.keyCode == 49) {
                                                                    document.getElementById('gbEMonthId').value = 1;
                                                                }
                                                            } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">MON</option>
                                                <?php
                                                for ($mm = 0; $mm <= 11; $mm++) {
                                                    $selected_month = ($arrMonths[$mm] == $selEDOBMnth) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                                                }
                                                ?>
                                            </select> 
                                            <!-- End Date Code for YEAR @AUTHOR-PRIYANKA-17OCT2020-->
                                            <?php
                                            $todayYear = date(Y) + 10;
                                            $optYear[$selEDOBYear] = "selected";
                                            ?> 
                                            <select id="discountEDOBYear<?php echo $count; ?>" 
                                                    name="discountEDOBYear<?php echo $count; ?>" 
                                                    title="YEAR" style="width:33%;height:35px"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('disc_st_item_category<?php echo $count + 1; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                                                return false;
                                                            }"
                                                    class="select-control-req-height20">
                                                <option value="NotSelected">YEAR</option>
                                                <?php
                                                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                    $selected_year = ($yy == $selEDOBYear) ? 'selected="selected"' : '';
                                                    echo "<option value=\"$yy\" $selected_year>$yy</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td align="center" class="blackCalibri13Font spaceLeft5" title="ADD">
                                <div class="spaceLeft5" id="addNewDiscount">
                                    <a style="cursor: pointer;"
                                       onclick="addNewProdDiscountDiv('<?php echo $rowItemDetails[disc_id]; ?>', document.getElementById('noOfDiscount').value, '<?php echo $documentRoot; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>', '<?php echo $commonPanel; ?>', '<?php echo $st_id; ?>', '<?php echo $main_st_item_category; ?>');">
                                        <img src="<?php echo $documentRoot; ?>/images/img/add.png" alt="ADD" class="marginTop5" height="18px" />
                                    </a>
                                </div>
                            </td>

                            <td align="center" class="blackCalibri13Font spaceLeft5" title="DELETE">
                                <div class="spaceLeft5" id="deleteDiscount">
                                    <a style="cursor: pointer;"
                                       onclick="deleteDiscountFromTable('<?php echo $rowItemDetails[disc_id]; ?>', '<?php echo $count; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>');">
                                        <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" alt="DEL" class="marginTop5" height="18px"/>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                    ?>                
                    <tr>
                        <td colspan="16">
                            <div id="addNewDiscountDiv<?php echo $noOfDiscount + 1; ?>"></div>                       
                        </td>
                    </tr>    
                </table> 
            </div>                        
            <table align="left" border="0" cellspacing="2" cellpadding="2" width="100%">   
                <tr>
                    <td colspan="16" align="center">
                        <div>
                            <?php
                            //
                            $inputId = "discountSubmitBtn";
                            $inputType = 'submit';
                            $inputFieldValue = 'Submit';
                            $inputIdButton = "discountSubmitBtn";
                            $inputNameButton = 'discountSubmitBtn';
                            $inputTitle = '';
                            // This is the main class for input flied
                            $inputFieldClass = 'btn ' . $om_btn_style;
                            $inputStyle = "width:120px;height:30px;color:#006400;background: #D8F6D8;border: 1px solid #76c176;font-size: 15px;border-radius: 5px !important;font-weight: bold;";
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
                            //
                            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                            //
                            ?>    
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="16">
                        <div id="DiscountHelpDiv"></div>                       
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
