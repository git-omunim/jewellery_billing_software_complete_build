<?php
/*
 * **************************************************************************************
 * @Description: REPAIR PANEL FORM FILE @Author-PRIYANKA-19OCT2020
 * **************************************************************************************
 *
 * Created on 19 OCT 2020 02:43:32 PM
 *
 * @FileName: omrpsdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim 2.7.21
 * @version 2.7.21
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @Author-PRIYANKA-19OCT2020
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
$staffId = $_SESSION['sessionStaffId'];
include_once 'ommpfndv.php';
?>
<?php
//
$subPanel = $_GET['subPanel'];
//
$payPanelName = 'AddRepairItem';
//
$mainPanel = 'ItemRepair';
//
$repairItemPanelName = $_GET['panelName'];
//
$panelSimilarDiv = $repairItemPanelName;
//
$custId = $_REQUEST['custId'];
//
if ($sttr_user_id == '' || $sttr_user_id == NULL) {
    $sttr_user_id = $custId;
}
//
if ($repairItemPanelName == 'UpdateRepairItem' || $repairItemPanelName == 'RepairItemPayUp') {
    if ($staffId && $array['updateStockAccess'] != 'true') {
        echo "<div class=" . "erMessage" . ">~ You do not have Access for this Panel ~" . " </br> " . " Please Contact To Your Administrator !</div>";
        exit(0);
    }
}
//
// START DATE CODE @AUTHOR-PRIYANKA-19OCT2020
$selDOBDay = date(j);
$todayMM = date(n) - 1;
$selDOBYear = date(Y);
//
if ($sttr_user_id != '') {
    parse_str(getTableValues("SELECT user_fname,user_lname FROM user where user_owner_id='$sessionOwnerId' and "
                    . "user_id ='$sttr_user_id'"));
}
//
?>
<form name="add_itemDetails" id="add_itemDetails"
      enctype="multipart/form-data" method="post"
      action="include/php/omrpdtad.php"
      onsubmit="return valAddItemDetails(document.getElementById('add_itemDetails'));">
    <div id="repairPanelFormDiv">
        <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%" style="margin-top: 20px;">
            <tr class="portlet yellow box">
                <td align="center"  class="textLabel12CalibriBrown" title="Select Date Here" style="width: 13%;">
                    DATE
                </td>
                <td align="center" class="textLabel12CalibriBrown" title="FIRM" style="width: 18%;">
                    FIRM
                </td> 
                <td align="center" class="textLabel12CalibriBrown" title="INVOICE NUMBER" style="width: 0%;">
                    INVOICE NUMBER
                </td> 
                <td align="center" title="CUSTOMER NAME" class="textLabel12CalibriBrown" style="width: 30%;">
                    CUSTOMER NAME
                </td>
                <td align="center" title="" class="textLabel12CalibriBrown" style="width: 9%;">
                </td>
                <td align="center" title="" class="textLabel12CalibriBrown" style="width: 7%;">
                </td>
                <td align="center" title="" class="textLabel12CalibriBrown">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center" class="margin1pxAll">
                                <!-- Start Code to Define Hidden inputs -->
                                <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                                <input type="hidden" id="globalAltCId" name="globalAltCId"/>
                                <!-- End Code to Define Hidden inputs -->
                                <!-- Date Code for DAY -->
                                <?php
                                $todayDay = $selDOBDay - 1;

                                $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                $optDay[$todayDay] = "selected";
                                ?> 
                                <select id="addItemDOBDay" name="addItemDOBDay" title="DAY"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('addItemDOBMonth').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    return false;
                                                }"
                                        class="select-control-req-height20">
                                    <option value="NotSelected">DAY</option>
                                    <?php
                                    for ($dd = 0; $dd <= 30; $dd++) {
                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                    }
                                    ?>
                                </select> 
                                <!-- Date Code for MONTH -->
                                <?php
                                $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                $optMonth[$todayMM] = "selected";
                                ?> 
                                <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                                <select id="addItemDOBMonth" name="addItemDOBMonth" title="MONTH"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('addItemDOBYear').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBDay').focus();
                                                    return false;
                                                }
                                                //START CODE TO GET MONTH FROM KEYS
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
                                                } //END CODE TO GET MONTH FROM KEYS"
                                        class="select-control-req-height20">
                                    <option value="NotSelected">MON</option>
                                    <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
$queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
$engmonformat = mysqli_query($conn, $queryengmonformat);
$rowengmonformat = mysqli_fetch_array($engmonformat);
$englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                    if ($englishMonthFormat == 'displayinnumber') {
                                        $engMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                                    } else {
                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
    }                   
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                }
                                    ?>
                                </select> 
                                <!-- Date Code for YEAR -->
                                <?php
                                $todayYear = date(Y);
                                $optYear[$selDOBYear] = "selected";
                                ?> 
                                <select id="addItemDOBYear" name="addItemDOBYear" title="YEAR"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('sttr_user_name').focus();

                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBMonth').focus();
                                                    return false;
                                                }"
                                        class="select-control-req-height20">
                                    <option value="NotSelected">YEAR</option>
                                    <?php
                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>

                <td align="center" title="FIRM">
                    <div id="addStockItemFirmDiv">
                        <?php
                        $nextFieldId = 'sttr_metal_type';
                        $prevFieldId = 'sttr_user_name';
                        $firmIdDivClass = 'form-control-req-height20';
                        $FirmStyle = 'text-align: center; height: 20px; width: 74%; margin-left: -11px;';
                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                            $firmIdSelected = $_SESSION['setFirmSession'];
                        }
                        if (!$firmIdSelected) {
                            $firmIdSelected = $_SESSION['setFirmSession'];
                        }

                        if ($staffId && $array['addStockAccessFirm'] != 'true') {
                            $accAccess = 'NO';
                        }
                        if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp' ||
                                $stockPanelName == 'updateCatalogueStock') {
                            $accAccess = 'NO';
                        }
                        include 'omffrasp.php';
                        ?>
                    </div>
                </td>

                <td align="left" title="INVOICE NUMBER">
                    <div id="slPrInvoiceNoDiv">
                        <table border="0" cellspacing="0" cellpadding="0" style="width: 225px;">
                            <tr>
                                <?php
                                if ($sellPanelName == 'orderPickStock') {
                                    $preOrdInvNo = $_REQUEST['preOrdInvNo'];
                                    $postOrdInvNo = $_REQUEST['postOrdInvNo'];
                                }
                                ?>
                                <td>
                                    <input <?php echo $staffAccessStr; ?> id="slPrPreInvoiceNo" name="sttr_pre_invoice_no" 
                                                                          type="text" placeholder="Pre Invoice Id" 
                                                                          value="<?php echo $slPrPreInvoiceNo; ?>" 
                                                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                                                      document.getElementById('slPrInvoiceNo').focus();
                                                                                      return false;
                                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                                      document.getElementById('slPrCustomerName').focus();
                                                                                      return false;
                                                                                  }"
                                                                          onchange="getInvoice(document.getElementById('slPrPreInvoiceNo').value, document.getElementById('slPrItemPreId').value, document.getElementById('slPrItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', '<?php echo $txtType ?>');"                                                                                               
                                                                          spellcheck="false" class="form-control-req-height20" size="5" maxlength="30" title="ITEM PRE INVOICE NUMBER"/>
                                </td>
                                <td>
                                    <input <?php echo $staffAccessStr; ?> id="slPrInvoiceNo" name="sttr_invoice_no" 
                                                                          type="text" placeholder="Post Invoice No" 
                                                                          value="<?php echo $slPrInvoiceNo; ?>" 
                                                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                                                      document.getElementById('firmId').focus();
                                                                                      return false;
                                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                                      document.getElementById('slPrPreInvoiceNo').focus();
                                                                                      return false;
                                                                                  }"
                                                                          onblur="if (this.value == '')
                                                                                      this.value = '<?php echo $slPrInvoiceNo; ?>';"
                                                                          onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                          spellcheck="false" class="form-control-req-height20" size="5" maxlength="30" title="ITEM POST INVOICE NUMBER"/>
                                </td>
                            </tr>
                        </table>
                    </div>                    
                </td>  

                <td align="center" title="CUSTOMER" class="textLabel12CalibriBrown">
                    <input type="hidden" id="custId" name="custId" value="<?php echo $custId; ?>"/>
                    <input type="hidden" id="sttr_user_id" name="sttr_user_id" value="<?php echo $sttr_user_id; ?>"/>
                    <input id="sttr_user_name" name="sttr_user_name" type="text" 
                           placeholder="CUSTOMER" 
                           value="<?php
                           if ($user_fname != '') {
                               echo $user_fname;
                           }
                           ?>"
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       clearDivision('suppListDivToAddItemStock');
                                       document.getElementById('firmId').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       clearDivision('suppListDivToAddItemStock');
                                       document.getElementById('addItemDOBYear').focus();
                                       return false;
                                   }"
                           onclick="this.value = '';
                                   clearDivision('suppListDivToAddItemStock');"
                           onblur="if (this.value == '')
                                       this.value = '<?php echo $user_fname; ?>';"
                           <?php if ($staffId && $array['addStockAccessSupp'] != 'true') { ?>readonly="true"<?php } ?>
                           autocomplete="off" spellcheck="false" 
                           class="form-control-req-height20 align_center" size="20" maxlength="30" 
                           style="width: 59%; margin-left: 0px;"/>                   
                    <div id="suppListDivToAddItemStock" class="suppListDivToAddStock"></div>
                </td>

                <td align="center" title="" class="textLabel12CalibriBrown">
                </td>
                <td align="center" title="" class="textLabel12CalibriBrown">
                </td>
                <td align="center" title="" class="textLabel12CalibriBrown">
                </td>
            </tr>
        </table>
        <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%" style="margin-top: 10px;">
            <tr style="background-color: #F5DEB3">
                <td align="center" title="METAL" class="textLabel12CalibriBrown" style="width: 13%;">
                    METAL
                </td>
                <td align="center" title="CATEGORY" class="textLabel12CalibriBrown" style="width: 18%;">
                    CATEGORY
                </td>
                <td align="center" title="NAME" class="textLabel12CalibriBrown" style="width: 36%;">
                    NAME
                </td>
                <td align="center" title="QTY" class="textLabel12CalibriBrown" style="width: 9%;">
                    QTY
                </td>
                <td align="center" title="WT" class="textLabel12CalibriBrown" style="width: 9%;">
                    WT
                </td>
                <td align="center" class="textLabel12CalibriBrown" style="width: 7%;">
                    TYPE
                </td>
                <td align="center" class="textLabel12CalibriBrown">

                </td>
            </tr>
            <tr>
            <input type="hidden" id="UpdateItemPanel" name="UpdateItemPanel" value="<?php echo $UpdateItemPanel; ?>"/>
            <input type="hidden" id="metalType" name="metalType" value="<?php echo $sttr_metal_type; ?>"/>
            <input type="hidden" id="commonPanel" name="commonPanel" value="<?php echo $commonPanel; ?>" />
            <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
            <input type="hidden" id="addItemCryCount" name="addItemCryCount"/>
            <input type="hidden" id="itemDivCnt" name="itemDivCnt" value="" />
            <input type="hidden" id="sttr_stone_wt" name="sttr_stone_wt"/>
            <input type="hidden" id="sttr_stone_wt_type" name="sttr_stone_wt_type"/>
            <input type="hidden" id="openLotItemDetDiv" name="openLotItemDetDiv"/>
            <input type="hidden" id="globSuppItemCount" name="globSuppItemCount"/>
            <td align="center" title="METAL" class="textLabel12CalibriBrown">
                <div id="itemTypeDiv">
                    <input id="sttr_metal_type" name="sttr_metal_type" type="text" 
                           placeholder="METAL TYPE" style="text-align: center;width: 96%;"
                           value="<?php
                           if ($sttr_metal_type != '')
                               echo $sttr_metal_type;
                           else
                               echo 'Gold';
                           ?>"
                           onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       clearDivision('metalSelectDiv');
                                       document.getElementById('sttr_item_category').value = '';
                                       document.getElementById('sttr_item_category').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       clearDivision('metalSelectDiv');
                                       document.getElementById('firmId').focus();
                                       return false;
                                   }"
                           onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                       getMetalType('metalSelectDiv', 'sttr_metal_type', event.keyCode, 'RepairPanel', '<?php echo $custId; ?>', 'RepairPanel');
                                   }"
                           onclick="this.value = '';"
                           onblur="if (this.value == '') {
                                       this.value = '<?php echo $sttr_metal_type; ?>';
                                   }"
                           autocomplete="off" spellcheck="false" class="form-control-height20 placeholderClass" 
                           size="5" maxlength="80" />
                    <div id="metalSelectDiv" class="itemListDivToAddStock placeholderClass"></div>
                </div>
            </td>
            <td align="center" title="CATEGORY" class="textLabel12CalibriBrown">
                <input id="sttr_item_category" name="sttr_item_category"  
                       value="<?php echo $sttr_item_category; ?>"
                       type="text" placeholder="CATEGORY" 
                       onkeyup="javascript: if (event.keyCode != 9 && event.keyCode != 13) {
                                   searchCategoryForPanel(document.getElementById('sttr_item_category').value, event.keyCode, 'addItemInvCryName ');
                               }" 
                       onkeydown="javascript:if (event.keyCode == 13) {
                                   searchCatForPanelBlank('cryNameInvSelectDiv');
                                   document.getElementById('sttr_item_name').focus();
                                   document.getElementById('sttr_item_name').value = '';
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   searchCatForPanelBlank('cryNameInvSelectDiv');
                                   document.getElementById('sttr_metal_type').focus();
                                   return false;
                               }"
                       onclick="this.value = '';
                               searchCatForPanelBlank('cryNameInvSelectDiv');"
                       onblur="if (this.value == '') {
                                   this.value = '<?php echo $sttr_item_category; ?>';
                               }"                      
                       onkeypress="return AvoidSpace(event);" 
                       style="text-align: center;width: 97%; margin-left: -18px;"
                       autocomplete="off" spellcheck="false" 
                       class="form-control-height20 placeholderClass" size="8" maxlength="15"  />
                <div id="cryNameInvSelectDiv"></div>
            </td>
            <td align="center" title="NAME" class="textLabel12CalibriBrown">
                <div>
                    <?php
                    //
                    $userId = $suppId;
                    $prodMergedCount = '';
                    $inputId = 'sttr_item_name';
                    $inputName = 'sttr_item_name';
                    $inputFieldColumnName = 'sttr_item_name';
                    $inputFieldValue = $sttr_item_name;
                    $inputFieldPrevId = 'sttr_item_category';
                    $inputFieldNextId = 'sttr_quantity';
                    $inputPlaceHolder = "NAME";
                    $inputLabelDivText = 'N';
                    $requiredField = 'N';
                    $inputFieldClass = 'form-control-height20 placeholderClass';
                    //
                    $inputStyle = 'text-align: center;height: 20px;margin-left: -19px; width: 103%;';
                    //
                    $inputOnBlurFun = 'googleSuggestionDropdownBlank("sttr_item_name_google_div"); ';
                    //
                    $inputOnChange = "googleSuggestionDropdownBlank('sttr_item_name_google_div'); ";
                    //
                    //
                        include $_SESSION['documentRootIncludePhp'] . '/stock/stock_transaction/om_sttr_item_item_name.php';
                    //
                    //
                        ?>
                </div>
            </td>
            <td align="center" title="QTY" class="textLabel12CalibriBrown">
                <input id="sttr_quantity" name="sttr_quantity" type="text" 
                       value="<?php echo $sttr_quantity; ?>" 
                       placeholder="QTY"
                       onblur="if (this.value == '') {
                                   this.value = '1';
                               }
                               return false;"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_gs_weight').value = '';
                                   document.getElementById('sttr_gs_weight').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_item_name').focus();
                                   return false;
                               }"    
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       ondblclick="this.value = '';"
                       spellcheck="false" class="form-control-height20 align_center placeholderClass" 
                       size="3" maxlength="10" 
                       style="text-align: center;width: 104%; margin-left: -11px;"/>
            </td>
            <td align="center" title="WT" class="textLabel12CalibriBrown">
                <input id="sttr_gs_weight" name="sttr_gs_weight" type="text" 
                       value="<?php echo $sttr_gs_weight; ?>" 
                       placeholder="WT"
                       onblur="if (this.value == '') {
                                   this.value = '<?php echo $sttr_gs_weight; ?>';
                               }
                               return false;"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('sttr_gs_weight').value = '';
                                   document.getElementById('sttr_gs_weight').focus();
                                   return false;
                               } else if (event.keyCode == 8 && this.value == '') {
                                   document.getElementById('sttr_quantity').focus();
                                   return false;
                               }"    
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       ondblclick="this.value = '';"
                       spellcheck="false" class="form-control-height20 align_center placeholderClass" 
                       size="3" maxlength="10" 
                       style="text-align: center; margin-left: -10px; width: 105%;"/>
            </td>
            <td>
                <select id="sttr_gs_weight_type" 
                        name="sttr_gs_weight_type" style="text-align: center;margin-left: -6px "
                        onkeydown="javascript:if (event.keyCode == 13) {
                                    document.getElementById('sttr_gs_weight_type').focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('sttr_gs_weight').focus();
                                    return false;
                                }"
                        class="form-control-height20 placeholderClass">
                            <?php
                            if ($payPanelName == 'AddRepairItem' || $payPanelName == 'RepairItemPayUp' ||
                                    $payPanelName == 'UpdateRepairItem') {
                                $cryGsWtType = array('GM', 'KG', 'MG', 'CT');
                                for ($i = 0; $i <= 3; $i++)
                                    if ($cryGsWtType[$i] == $cryGSWT)
                                        $cryGsWtTypeSel[$i] = 'selected';
                            } else {
                                $cryGsWtTypeSel[0] = 'selected';
                            }
                            ?>
                    <option value="GM"<?php echo $cryGsWtTypeSel[0]; ?>>GM</option>
                    <option value="KG"<?php echo $cryGsWtTypeSel[1]; ?>>KG</option>
                    <option value="MG"<?php echo $cryGsWtTypeSel[2]; ?>>MG</option>
                    <option value="CT"<?php echo $cryGsWtTypeSel[3]; ?>>CT</option>
                    <?php $cryGsWtTypeSel = ""; ?>
                </select>
            </td>
            <td>
                <a style="cursor: pointer;" 
                   onclick ="getRepairFormDivFunc('', 'crystalAddDiv', '<?php echo $commonPanel; ?>', '<?php echo $documentRootBSlash; ?>');">
                    <table border="0" cellspacing="2" cellpadding="0" width="100%">
                        <tr>
                            <td valign="middle" align="right">
                                <img src="<?php echo $documentRootBSlash; ?>/images/update16.png"
                                     alt="" style="padding-top: 5px;" />
                            </td>
                            <td>
                                MORE
                            </td>
                        </tr>
                    </table>
                </a>
            </td>
            </tr>
            <tr>
                <td colspan="18">
                    <div id="crystalAddDiv">
                        <?php
                        if ($payPanelName == 'AddRepairItem' || $payPanelName == 'RepairItemPayUp' ||
                                $payPanelName == 'UpdateRepairItem') {

                            if ($noOfCry > 0) {
                                include 'omrpnfdv.php';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="left" class="paddingTopBott10" colspan="18">
                    <!--<div class="hrGrey"></div>-->
                </td>
            </tr>
            <tr>
                <td colspan="18" align="center">
                    <div>
                        <?php
                        $inputId = "repairSubmitBtn";
                        $inputType = 'submit';
                        $inputFieldValue = 'Submit';
                        $inputIdButton = "repairSubmitBtn";
                        $inputNameButton = 'repairSubmitBtn';
                        $inputTitle = '';
                        // This is the main class for input flied
                        $inputFieldClass = 'btn ' . $om_btn_style;
                        $inputStyle = "margin-left: -40px;";
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
        </table>
    </div>
</form>