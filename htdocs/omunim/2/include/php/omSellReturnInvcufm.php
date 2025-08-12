<?php
/*
 * **************************************************************************************
 * @tutorial: sell return customised form
 * **************************************************************************************
 * 
 * Created on Nov 24, 2023 2:25 PM
 *
 * @FileName: omSellReturnInvcufm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
?>

<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
///start code to add customizedRoughInvoice @auth:athu29may17
//echo "panelName======".$panelName;
if ($panelName == '') {
    $panelName = $_GET['panel'];
//    echo "panelName======".$panelName;
}
//End Code To Select FirmId
//$qSelCustId = "SELECT slpr_cust_id,slpr_firm_id FROM salepurchase where slpr_owner_id='$sessionOwnerId' and slpr_cust_pre_invoice_no='$slPrPreInvoiceNo' and "
//        . "slpr_cust_invoice_no='$slPrInvoiceNo' and slpr_firm_id IN ($strFrmId) order by slpr_since asc LIMIT 0, 1";
//$resCustId = mysqli_query($conn, $qSelCustId);
//
//$rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
//$custId = $rowCustId['slpr_cust_id'];
//$firmId = $rowCustId['slpr_firm_id'];

parse_str(getTableValues("SELECT firm_id,firm_name,firm_long_name,firm_reg_no,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='1'"));
//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************

parse_str(getTableValues("SELECT user_fname,user_lname,user_add,user_city,user_pincode,user_state,user_country,user_phone,user_mobile FROM user where user_owner_id='$sessionOwnerId' and user_id='$custId'"));

//************************Start code for change data from customer to user Author@:SANT12JAN16***************************************
$counter = 1;

$totalItemsQTY;
$totalValuation;
$goldTotalWeight = 0;
$silverTotalWeight = 0;
$goldTotalWeightType = 'GM';
$silverTotalWeightType = 'GM';
$visibility = 'hidden';
$labelType = $_GET['labelType'];
//echo '$labelType : '.$labelType.'<br>';
$panelYN = $_GET['panelYN'];
//echo '$panelYN'.$panelYN;
if ($panelYN == 'Y') {
    if ($labelType == 'APPROVAL') {
        $panelName = 'customizedApprovalInvoice';
    } else if ($labelType == 'ROUGH_ESTIMATE') {
        $panelName = 'customizedRoughEstimateInvoice';
    } else if ($labelType == 'PAYMENTINVOICE') {
        $panelName = 'customizedPaymentInvoice';
    } else if ($labelType == 'RECEIPTINVOICE') {
        $panelName = 'customizedReceiveInvoice';
    } else if ($labelType == 'RawMetalPurchase') {
        $panelName = 'customizedRawMetalInvoice';
    } else if ($labelType == 'GoldSellPurchase') {
        $panelName = 'customizedGoldInvoice';
//        echo '$labelType'.$labelType;
    } else if ($labelType == 'SilverSellPurchase') {
        $panelName = 'customizedSilverInvoice';
    } else if ($labelType == 'estimateSell') {
        $panelName = 'customizedEstiInvInvoice';
    } else if ($labelType == 'ReadyOrderInvoice') {
        $panelName = 'customizedReadyOrderInv';
    } else if ($labelType == 'AssignOrderInvoice') {
        $panelName = 'customizedAssignedOrderInv';
    } else if ($labelType == 'PendingOrderInvoice') {
        $panelName = 'customizedPendingOrderInv';
    } else if ($labelType == 'PurchaseReturn') { //CONDITION ADDED FOR PURCHASE RETURN INVOICE : AUTHOR @DARSHANA 3 FEB 2022
        $panelName = 'customizedPurchaseReturnInv';
    }
}
///start code to add customizedRoughInvoice @auth:athu29may17
if ($panelName == 'customizedApprovalInvoice') {
    $labelType = 'APPROVAL';
    $headingName = 'CUSTOMIZED APPROVAL PANEL';
} else if ($panelName == 'customizedRoughEstimateInvoice') {
    $labelType = 'ROUGH_ESTIMATE';
    $headingName = 'CUSTOMIZED ROUGH ESTIMATE INVOICE PANEL';
} else if ($panelName == 'customizedPaymentInvoice') {
    $labelType = 'PAYMENTINVOICE';
    $headingName = 'CUSTOMIZED PAYMENT INVOICE PANEL';
} else if ($panelName == 'customizedReceiveInvoice') {
    $labelType = 'RECEIPTINVOICE';
    $headingName = 'CUSTOMIZED RECEIVE INVOICE PANEL';
} else if ($panelName == 'customizedRawMetalInvoice') {
    $labelType = 'RawMetalPurchase';
    $headingName = 'CUSTOMIZED RAW METAL PANEL';
} else if ($panelName == 'customizedSupplierInvoice') { // CONDITION ADDED FOR SUPPLIER PURCHASE INVOICE @AUTHOR:SHRI25OCT19
//     include 'omtbplab_106.php';
    //$labelType = 'SUPPLIER_PURCHASE';
    $labelType = 'SUPPILER_INVOICE'; //CONDITION ADDED FOR SUPPLIER PURCHASE INVOICE @AUTHOR:RUTUJA09APR20
    $headingName = 'CUSTOMIZED PURCHASE INVOICE PANEL';
} else if ($panelName == 'customizedGoldInvoice') {
//    echo '$panelName'.$panelName;
    $labelType = 'GoldSellPurchase';
    $headingName = 'CUSTOMIZED GOLD INVOICE PANEL';
} else if ($panelName == 'customizedSilverInvoice') {
    $labelType = 'SilverSellPurchase';
    $headingName = 'CUSTOMIZED SILVER INVOICE PANEL';
} else if ($panelName == 'customizedEstiInvInvoice') {
    $labelType = 'estimateSell';
    $headingName = 'CUSTOMIZE ESTIMATESELL INVOICE';
} else if ($panelName == 'customizedReadyOrderInv') {
    $labelType = 'ReadyOrderInvoice';
    $headingName = 'CUSTOMIZE READY ORDER INVOICE';
} else if ($panelName == 'customizedAssignedOrderInv') {
    $labelType = 'AssignOrderInvoice';
    $headingName = 'CUSTOMIZE ASSIGNED ORDER INVOICE';
} else if ($panelName == 'customizedPendingOrderInv') {
    $labelType = 'PendingOrderInvoice';
    $headingName = 'CUSTOMIZE PENDING ORDER INVOICE';
} else if ($panelName == 'customizedPurchaseReturnInv') { //CONDITION ADDED FOR PURCHASE RETURN INVOICE : AUTHOR @DARSHANA 3 FEB 2022
    $labelType = 'PurchaseReturn';
    $headingName = 'CUSTOMIZE PURCHASE RETURN INVOICE';
} else if ($panelName == 'customizedSellReturnInvoice') { //CONDITION ADDED FOR SELL RETURN INVOICE : AUTHOR @DNYANESHWARI 09DEC2023
    $labelType = 'sellReturn';
    $headingName = 'CUSTOMIZED SELL RETURN INVOICE PANEL';
}else {
    $labelType = 'SellPurchase';
    $headingName = 'CUSTOMIZED INVOICE PANEL';
}

//echo '$labelType : '.$labelType.'<br>';
?>
<!---- layout chnage customize form @AUTHOR RANI21june2023--->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="left" class="main_link_orange">
                <?php echo $headingName; ?>
            </div>
            <div align="right" valign="bottom" class="printVisibilityHidden">
                <div id="cuMessDisplayDiv"></div>
            </div>
        </div>   
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table border="0" cellspacing="1" cellpadding="1" valign="top" align="center" width="100%">
                <tr>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> TOP MARGIN (MM):</div>

                        <?php
                        $count = 64;
                        $fieldName = 'topMargin';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Top Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> BOTTOM MAR(MM):</div>

                        <?php
                        $count = 64;
                        $fieldName = 'bottomMargin';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        ?>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="BOTTOM Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 65;
                    $fieldName = 'leftMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
// echo "SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft20" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> LEFT MARGIN:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="Left Margin" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <td align="left" title="Click to select form border !" width="14%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" >
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> FORM BORDER:</div>
                                </td>
                                <?php
                                $count = 66;
                                $fieldName = 'formBorderCheck';
                                parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" valign="middle" title="CLICK TO SELECT FORM BORDER !">
                                    <input type="checkbox" id="fontCheckId<?php echo $count; ?>" name="fontCheckId<?php echo $count; ?>" class="checkbox" <?php
                                    if ($label_field_check == 'true')
                                        echo 'checked';
                                    else
                                        echo '';
                                    ?>
                                           onclick="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');"/>                   
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- START CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <td align="right" title="Click to select form border size!" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="right" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark" title="Click to select form border size!" width="10%">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;">BORDER SIZE:</div>

                                    <?php
                                    $count = 66;
                                    $fieldName = 'formBorderSize';
                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>

                                    <input id="formBorderSize<?php echo $count; ?>" name="formBorderSize<?php echo $count; ?>" placeholder="Size#Colorcode" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           class="input_border_grey_center" size="10" maxlength="9" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <!-- END CODE TO ADD OPTION FOR BORDER SIZE @AUTHOR:MADHUREE-05AUGUST2021 -->
                    <?php
                    $count = 67;
                    $fieldName = 'formWidth';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" width="10%">
                        <table border="0" cellspacing="0" cellpadding="0" valign="top" align="left" width="100%">
                            <tr>
                                <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10">
                                    <div style="font-size:14px;font-weight:600;color:#9b370b;margin-right:5px;"> FORM WIDTH:</div>

                                    <input id="formWidth<?php echo $count; ?>" name="formWidth<?php echo $count; ?>" placeholder="Form Width(MM)" 
                                           value="<?php echo $label_field_content; ?>"
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                   }"
                                           onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                           spellcheck="false" type="text"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                           class="input_border_grey_center" size="7" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                                </td> 
                            </tr>
                        </table>
                    </td>
                    <?php
                    $count = 68;
                    $fieldName = 'headerTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">HEADER (MM):</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="HEADER TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 69;
                    $fieldName = 'custDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">CUST DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="CUST DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 70;
                    $fieldName = 'itemDetTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%" title="Select Here customer dtails margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">ITEM DET TOP:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ITEM DET TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                </tr>
            </table>
        </div>  
        <div class="col-md-12">
            <table border="0" cellspacing="0" cellpadding="0" valign="top" align="center" width="100%" >
                <tr>
                    <?php
                    $count = 71;
                    $fieldName = 'termsTop';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark" width="20%" title="Select Here terms and conditions margin from top !">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> TERMS & CONDITIONS:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="TERMS TOP" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                               class="input_border_grey_center" size="8" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 72;
                    $fieldName = 'roughEstTitle';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="20%" title="CHANGE HERE ROUGH ESTIMATED INVOICE TITLE!">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;"> ROUGH ESTIMATE TITLE:</div>

                        <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="ROUGH ESTIMATE" value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text" class="input_border_grey" size="15" maxlength="30" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td>
                    <?php
                    $count = 73;
                    $fieldName = 'slPrValueAddedOp';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $slPrValueAddedOp = $label_field_content;
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%">
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">VAL ADDED BY</div>                   
                        <div class="selectStyled"  title="CHANGE HERE VALUE ADDED BY OPTION!">
                            <select id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" class="textLabel14CalibriReq" style="width:100%;height:30px;border-radius:3px!important;"
                                    onchange="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');">
                                        <?php
                                        if ($slPrValueAddedOp != '') {
                                            $valueAddBy = array(byAmount, byWeight);
                                            for ($i = 0; $i <= 1; $i++)
                                                if ($valueAddBy[$i] == $slPrValueAddedOp)
                                                    $optionValueAddSel[$i] = 'selected';
                                        }
                                        ?>
                                <option value="byAmount" <?php echo $optionValueAddSel[0]; ?>>By Amount</option>
                                <option value="byWeight" <?php echo $optionValueAddSel[1]; ?>>By weight</option>
                            </select>
                        </div>
                    </td>
                    <?php
                    $count = 75;
                    $fieldName = 'nameFormat';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $nameFormat = $label_field_content;
                    //echo "SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                    ?>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10" width="10%"> 
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">CUSTOMER NAME </div>
                        <div class="selectStyled" title="CHANGE HERE NAMING FORMAT OPTION!">
                            <select id="fieldCustNameValue<?php echo $count; ?>" name="fieldCustNameValue<?php echo $count; ?>" class="textLabel14CalibriReq" style="width:100%;height:30px;border-radius:3px!important;"
                                    onchange="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');">
                                        <?php
                                        if ($nameFormat != '') {
                                            $valueNameFormat = array(byDefaultName, allCapitals, firstCapitals);
                                            for ($i = 0; $i <= 2; $i++)
                                                if ($valueNameFormat[$i] == $nameFormat)
                                                    $optionValueNameFormat[$i] = 'selected';
                                        }
                                        ?>
                                <option value="byDefaultName" <?php echo $optionValueNameFormat[0]; ?>>By Default</option>
                                <option value="allCapitals" <?php echo $optionValueNameFormat[1]; ?>>All Capital Letters</option>
                                <option value="firstCapitals" <?php echo $optionValueNameFormat[2]; ?>>First Capital Letter</option>
                            </select>
                        </div>
                    </td>
                    <td align="left" class="ff_calibri fs_12 fw_b grey_dark padLeft10"  width="10%"> 
                        <div style="font-size:14px;font-weight:600;color:#9b370b;">TABLE HEADING COLOR </div>
                        <?php
                        $count = 66;
                        $fieldName = 'tableHeadingColor';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $bcColor = $label_field_content;
                        ?>

                        <input id="tableHeadingColor<?php echo $count; ?>" name="tableHeadingColor<?php echo $count; ?>" placeholder="1B5FA8" title="Enter Color Code to change Table Heading backgroud color !"
                               value="<?php echo $label_field_content; ?>"
                               onkeydown="javascript: if (event.keyCode == 13) {
                                           labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                       }"
                               onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                               spellcheck="false" type="text"
                               class="input_border_grey_center" size="7" maxlength="7" style="width:100%;height:30px;border-radius:3px!important;"/>
                    </td> 
                </tr>
            </table>
        </div>

        <div class="col-md-12">
            <table border="0" cellpadding="0" align="center" width="100%" cellspacing="0"  style="border:1px solid #c1c1c1;margin-top:5px;">

                <tr> 
                    <?php
                    $fieldName = 'topMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $topMargin = $label_field_content;
                    
                    $fieldName = 'bottomMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $bottomMargin = $label_field_content;

                    $fieldName = 'leftMargin';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $leftMargin = $label_field_content;
//margin-left:<?php echo $leftMargin . 'mm'; Remove this from div style
                    ?>
                    <td align="center" colspan="14" class="ff_calibri fs_14 paddingTop5">
                        <div style="margin-top:" >
                            <?php
                            $fieldName = 'headerTop';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $headerTopVal = $label_field_content;

                            $fieldName = 'formWidth';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $formWidthInMM = $label_field_content;

                            $fieldName = 'formBorderCheck';
                            $label_field_content = '';
                            parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($label_field_check == 'true') {
                                $border = '#000000 1px solid';
                            } else {
                                $border = '#000000 0px solid';
                            }
                            if ($formWidthInMM == '') {
                                $class = 'A4-Inv-Table';
                            } else {
                                $class = '';
                            }
                            ?>
                            <table border="0" cellpadding="0" align="center" width="100%" cellspacing="0" class="<?php echo $class; ?>" 
                                   style="border: <?php echo $border; ?>;padding-top:<?php echo $headerTopVal; ?>mm;">
                                <!--START CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023-->
                                <tr>
                                    <?php
                                    $count = 75;
                                    $fieldName = 'header_info_img';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                            <tr>
                                                <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?> bold font_color_blue" 
                                                    style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>" width="50%">
                                                    <br/>
                                                    <div onClick="openFormDiv('headerInfoImgDiv', '<?php echo $count; ?>', 'YES', 'Header Info Img!', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '45', '<?php echo $labelType; ?>', '-60', '36');"><?php echo 'Click Here to show this ad image (1280X500)'; ?></div>
                                                    <div id="headerInfoImgDiv"></div>
                                                </td>
                                                <td align="center" style="height:100px;vertical-align: middle;">
                                                    <form name="add_new_inv_image2" id="add_new_inv_image2"
                                                          enctype="multipart/form-data" method="post"
                                                          action="<?php echo $documentRootBSlash; ?>/include/php/omheaderinfoimgupload.php">
                                                        <input type="hidden" id="imageLoadOptionInv2" name="imageLoadOptionInv2" />
                                                        <input type="hidden" id="compressedImageInv2" name="compressedImageInv2" />
                                                        <input type="hidden" id="compressedImageThumbInv2" name="compressedImageThumbInv2" />
                                                        <input type="hidden" id="compressedImageSizeInv2" name="compressedImageSizeInv2" /> 
                                                        <input type="hidden" id="labeltype" name="labeltype" value="<?php echo $labelType;?>" />
                                                        <div class="file_button_add_image_div" align="right" style="cursor: pointer;">
                                                            <input type="file" id="addImageAutoSub2" name="addImageAutoSub2" class="file_button_add_image"
                                                                   onclick="javascript: document.getElementById('imageLoadOptionInv').value = 'COM';"
                                                                   onchange="loadImageFileCompressAutoSub2();">
                                                            <img id="addCustomerImage" style="height: 64px;width:64px;cursor: pointer;" src="<?php echo $documentRoot; ?>/images/add-image-64.png" alt="COM">
                                                        </div>
                                                        <input type="hidden" id="fileNameInv2" name="fileNameInv2" class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <?php parse_str(getTableValues("SELECT image_id,image_user_id,image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseHeaderInfoImg'")); ?>
                                        <?php if ($image_id != '') { ?>
                                            <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id; ?>" alt=" " class="img-responsive"/>
                                        <?php } else { ?>
                                            <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " class="img-responsive"/>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!--END CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023-->
                                <tr style="background: #fff9e8;"> 
                                    <td align="left" colspan="14" style="padding:3px;">
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                            <tr>
                                                <td align="right" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 7;
                                                            $fieldName = 'firmLeftLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSellReturnFormDiv('firmLeftLogoDiv', '<?php echo $count; ?>', 'NO', 'LEFT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                       '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', 'sellReturn', '6', '36');">
                                                                    <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                </a>
                                                                <div id="firmLeftLogoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="right">
                                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 1;
                                                                        $fieldName = 'firmFormHeader';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmHeaderDiv', '<?php echo $count; ?>', 'NO', 'FORM HEADER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '7', '-30');"><b>SHUBH LABH</b></div>
                                                                            <div id="firmHeaderDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 1;
                                                                        $fieldName = 'firmLongName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmLongNameDiv', '<?php echo $count; ?>', 'NO', 'FIRM NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '7', '-30');">OMUNIM JEWELLERS</div>
                                                                            <input id="commonId" name="commonId" type="hidden" />
                                                                            <input id="panelName" name="panelName" type="hidden" value="" />
                                                                            <div id="firmLongNameDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center" colspan="14">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 2;
                                                                        $fieldName = 'firmDesc';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmDescDiv', '<?php echo $count; ?>', 'NO', 'SHOP NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');">GOLD AND SILVER MONEY LENDER SHOP</div>
                                                                            <div id="firmDescDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align = "center" colspan = "14">
                                                                <table border = "0" cellpadding = "0" cellspacing = "0" align = "center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 3;
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        $fieldName = 'firmRegNoLabel';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmRegNoLbDiv', '<?php echo $count; ?>', 'YES', 'FIRM REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');"><b><?php echo $label_field_content; ?>:</b></div>
                                                                            <div id="firmRegNoLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 4;
                                                                        $fieldName = 'firmRegNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign = "middle" align = "center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmRegNoDiv', '<?php echo $count; ?>', 'NO', 'REGISTRATION NUMBER', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');">C/3512/2009</div>
                                                                            <div id="firmRegNoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr> 
                                                            <td align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 5;
                                                                        $fieldName = 'firmAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');"><b>ADDRESS:</b> P.NO.8, LAXMI ROAD,PUNE,MAHARASHTRA,INDIA,411028</div>
                                                                            <div id="firmAddressDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 6;
                                                                        $fieldName = 'firmPhone';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmPhoneDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');"><b>PHONE :</b> 8551958585</div>
                                                                            <div id="firmPhoneDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 7;
                                                                        $fieldName = 'firmEmail';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="center" class="padLeft5 ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('firmEmailDiv', '<?php echo $count; ?>', 'NO', 'EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');">  <b>EMAIL :</b>  info@omunim.com</div>
                                                                            <div id="firmEmailDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 8;
                                                            $fieldName = 'firmRightLogoCheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <a style="cursor: pointer;"
                                                                   onClick="openSellReturnFormDiv('firmRightLogoDiv', '<?php echo $count; ?>', 'NO', 'RIGHT LOGO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                   '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '30', '<?php echo $labelType; ?>', '6', '36');">
                                                                    <img src="<?php echo $documentRoot; ?>/images/ring128.png"  alt="" class="form8-logo-image" />
                                                                </a>
                                                                <div id="firmRightLogoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- end of form header @AuthorRani21June2023--->
                                <tr> 
                                    <td valign="middle" align="center" colspan="14" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <table width="100%" border="0" align="center">
                                            <tr>
                                                <?php
//                                    START CODE FOR TAX INVOICE TITLE CUSTOMIZATION : AUTHOR @DARSHANA 16 OCT 2021
                                                $count = 24;
                                                $fieldName = 'taxInvTitle';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="center" class="ff_calibri cursor font_color_<?php
                                                if ($label_field_font_color != '' && $label_field_font_color != NULL) {
                                                    echo $label_field_font_color;
                                                } else {
                                                    echo 'blue';
                                                }
                                                ?>" style="font-size:<?php
                                                    if ($label_field_font_size != '' && $label_field_font_size != NULL) {
                                                        echo $label_field_font_size;
                                                    } else {
                                                        echo '18';
                                                    }
                                                    ?>px">
                                                    <div onClick="openSellReturnFormDiv('taxInvTitleDiv', '<?php echo $count; ?>', 'YES', 'TAX INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '288');">
                                                        <b> <?php
                                                            if ($label_field_content != '' && $label_field_content != NULL) {
                                                                echo $label_field_content;
                                                            } else {
                                                                echo 'TAX INVOICE';
                                                            }
                                                            ?></b></div>
                                                    <div id="taxInvTitleDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END CODE FOR TAX INVOICE TITLE CUSTOMIZATION : AUTHOR @DARSHANA 16 OCT 2021-->
                                        </table>
                                    </td>
                                </tr>
                                <tr style="background: #d2f6f1;">
                                    <td align="left" valign="top" colspan="2">
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                            <tr valign="top">
                                                <td align="left" valign="top" class="padLeft5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 10;
                                                            $fieldName = 'firmTinTopLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <?php if ($label_field_content == NULL) { ?>
                                                                <td align="left" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('firmTinTopLabelDiv', '<?php echo $count; ?>', 'YES', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '36');"><?php echo 'GSTIN'; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                    <div id="firmTinTopLabelDiv"></div>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td align="left" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('firmTinTopLabelDiv', '<?php echo $count; ?>', 'YES', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                    <div id="firmTinTopLabelDiv"></div>
                                                                </td>
                                                            <?php } ?>
                                                            <?php
                                                            $count = 11;
                                                            $fieldName = 'firmTinTop';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmTinTopDiv', '<?php echo $count; ?>', 'NO', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">1234567890</div>
                                                                <div id="firmTinTopDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="left" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 12;
                                                            $fieldName = 'firmPanTopLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <?php if ($label_field_content == NULL) { ?>
                                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('firmPanTopLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '36');"><?php echo 'PAN'; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                    <div id="firmPanTopLbDiv"></div>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('firmPanTopLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                    <div id="firmPanTopLbDiv"></div>
                                                                </td>
                                                            <?php } ?>
                                                            <?php
                                                            $count = 13;
                                                            $fieldName = 'firmPanTop';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>

                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmPanTopDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">AAECM5678D</div>
                                                                <div id="firmPanTopDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="14">
                                        <div class="hrPaleGrey"></div>
                                    </td>
                                </tr>
                                <tr> 

                                <tr> 
                                    <td align="left" colspan="14" class="padLeft5">
                                        <?php
                                        $fieldName = 'custDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $custDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $custDetTopVal; ?>mm">
                                            <tr>
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"> 
                                                        <!--START CODE FOR CUSTOMIZED DETAILS OF REC. : AUTHOR @DARSHANA 14 OCT 2021-->
                                                        <tr>
                                                            <td align="left" valign="top" colspan='2'>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr>
                                                                        <?php
                                                                        $count = 15;
                                                                        $fieldName = 'detailsOfRec';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        if ($label_field_font_size == '' || $label_field_font_size == NULL) {
                                                                            $label_field_font_size = 12;
                                                                        }
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('detailsOfRecDiv', '<?php echo $count; ?>', 'NO', 'Details Of Receiver(Bill To)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                    <span style="font-size:14px">Details Of Receiver(Bill To)</span>   
                                                                            </div>
                                                                            <div id="detailsOfRecDiv"></div>
                                                                        </td>
                                                                    </tr>  
                                                                </table>
                                                            </td>
                                                            <!--end CODE FOR CUSTOMIZED DETAILS OF REC. : AUTHOR @DARSHANA 14 OCT 2021-->
                                                        </tr>
                                                        <tr> 
                                                            <td align="left" valign="top" colspan='2'>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        //-----------Start code for prefix name by Ashwini Patil--------------------
                                                                        $count = 14;
                                                                        $fieldName = 'userprefixNameLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
//                                                            echo '$fieldName= '.$fieldName;
//                                                            die;
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        if ($label_field_font_size == '' || $label_field_font_size == NULL) {
                                                                            $label_field_font_size = 12;
                                                                        }
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userprefixNameLbDiv', '<?php echo $count; ?>', 'YES', 'PREFIX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php
                                                                                     if ($label_field_content == '') {
                                                                                         echo "PREFIX";
                                                                                     } else {
                                                                                         echo "$label_field_content";
                                                                                     }
                                                                                     ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userprefixNameLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 15;
                                                                        $fieldName = 'userprefixName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        if ($label_field_font_size == '' || $label_field_font_size == NULL) {
                                                                            $label_field_font_size = 12;
                                                                        }
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userprefixNameDiv', '<?php echo $count; ?>', 'NO', 'PREFIX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                Mr/Ms/Mrs    
                                                                            </div>
                                                                            <div id="userprefixNameDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--START CODE FOR ADDED CUSTOMER ID OPTION @AUTHOR SIMRAN:15DEC2022-->    
                                                        <tr> 
                                                            <td align="left" valign="top" colspan='2'>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userIdLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td  align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userIdLbDiv', '<?php echo $count; ?>', 'YES', 'CUSTOMER ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userIdLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userId';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td  align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userIdDiv', '<?php echo $count; ?>', 'NO', 'CUSTOMER ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                C43125
                                                                            </div>
                                                                            <div id="userIdDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <!--END CODE FOR ADDED CUSTOMER ID OPTION @AUTHOR SIMRAN:15DEC2022-->
                                                        <tr> 
                                                            <td align="left" valign="top" colspan='2'>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 14;
                                                                        $fieldName = 'userNameLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        //-----------End code for prefix name by Ashwini Patil--------------------
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userNameLbDiv', '<?php echo $count; ?>', 'YES', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userNameLbDiv"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 15;
                                                                        $fieldName = 'userName';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                                            style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userNameDiv', '<?php echo $count; ?>', 'NO', 'NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                SACHIN TENDULKAR    
                                                                            </div>
                                                                            <div id="userNameDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--start S/o-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 333;
                                                                        $fieldName = 'userSoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userSoLbDiv', '<?php echo $count; ?>', 'YES', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userSoLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 334;
                                                                        $fieldName = 'userSo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userSoDiv', '<?php echo $count; ?>', 'NO', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                ARJUN TENDULKAR
                                                                            </div>
                                                                            <div id="userSoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--End S/o-->
                                                        <!--start D/o-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 345;
                                                                        $fieldName = 'userDoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userDoLbDiv', '<?php echo $count; ?>', 'YES', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userDoLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 346;
                                                                        $fieldName = 'userDo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userDoDiv', '<?php echo $count; ?>', 'NO', 'FATHER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                SARA TENDULKAR
                                                                            </div>
                                                                            <div id="userDoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--End D/o-->
                                                        <!--start W/o-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 347;
                                                                        $fieldName = 'userWoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userWoLbDiv', '<?php echo $count; ?>', 'YES', 'SPOUSE NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userWoLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 348;
                                                                        $fieldName = 'userWo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userWoDiv', '<?php echo $count; ?>', 'NO', 'SPOUSE NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                ANJALI TENDULKAR
                                                                            </div>
                                                                            <div id="userWoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--End D/o-->
                                                        <!--start C/o-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 349;
                                                                        $fieldName = 'userCoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userCoLbDiv', '<?php echo $count; ?>', 'YES', 'GUARDIAN NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userCoLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 350;
                                                                        $fieldName = 'userCo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userCoDiv', '<?php echo $count; ?>', 'NO', 'GUARDIAN NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                RAMAKANT ACHREKAR
                                                                            </div>
                                                                            <div id="userCoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--End D/o-->
                                                        <tr> 
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 16;
                                                                        $fieldName = 'userAddressLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userAddressLb', '<?php echo $count; ?>', 'YES', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userAddressLb"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 17;
                                                                        $fieldName = 'userAddress';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userAddressDiv', '<?php echo $count; ?>', 'NO', 'ADDRESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">3-5-125/42 KRISHANA NAGAR</div>
                                                                            <div id="userAddressDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 18;
                                                                        $fieldName = 'userContactLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userContactLb', '<?php echo $count; ?>', 'YES', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userContactLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 19;
                                                                        $fieldName = 'userContact';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userContactDiv', '<?php echo $count; ?>', 'NO', 'PHONE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                8551958585
                                                                            </div>
                                                                            <div id="userContactDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 288;
                                                                        $fieldName = 'userPanLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userPanLb', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userPanLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 289;
                                                                        $fieldName = 'userPan';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userPanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                ABCD1234F
                                                                            </div>
                                                                            <div id="userPanDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 290;
                                                                        $fieldName = 'userGstInLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userGstInLbDiv', '<?php echo $count; ?>', 'YES', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userGstInLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 291;
                                                                        $fieldName = 'userGstIn';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>

                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userGstInDiv', '<?php echo $count; ?>', 'NO', 'GSTIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                22AAAAA0000A1Z5
                                                                            </div>
                                                                            <div id="userGstInDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userAdhaarLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userAdhaarLb', '<?php echo $count; ?>', 'YES', 'ADHAAR NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="userAdhaarLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userAdhaar';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userAdhaarDiv', '<?php echo $count; ?>', 'NO', 'ADHAAR NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                4991 1866 524678
                                                                            </div>
                                                                            <div id="userAdhaarDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--START CODE FOR ADD USER EMAIL AND TEHSIL @SIMRAN:22DEC2022-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userEmailLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userEmailLb', '<?php echo $count; ?>', 'YES', 'USER EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userEmailLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userEmail';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userEmailDiv', '<?php echo $count; ?>', 'NO', 'USER EMAIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                omunim@gmail.com
                                                                            </div>
                                                                            <div id="userEmailDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userTehsilLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userTehsilLb', '<?php echo $count; ?>', 'YES', 'USER TEHSIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userTehsilLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userTehsil';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userTehsilDiv', '<?php echo $count; ?>', 'NO', 'USER TEHSIL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                Pune
                                                                            </div>
                                                                            <div id="userTehsilDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--END CODE FOR ADD USER EMAIL AND TEHSIL @SIMRAN:22DEC2022-->
                                                        <!--ADDED CODE FOR USER ACC NO & REFERENCE @AUTHOR SIMRAN:27DEC2022--> 
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userAccNoLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userAccNoLb', '<?php echo $count; ?>', 'YES', 'USER ACC NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userAccNoLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userAccNo';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userAccNoDiv', '<?php echo $count; ?>', 'NO', 'USER ACC NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                0753489256789
                                                                            </div>
                                                                            <div id="userAccNoDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userReferenceLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userReferenceLb', '<?php echo $count; ?>', 'YES', 'USER REFERENCE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userReferenceLb"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userReference';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userReferenceDiv', '<?php echo $count; ?>', 'NO', 'USER REFERENCE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                SARA
                                                                            </div>
                                                                            <div id="userReferenceDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <!--END CODE FOR USER ACC NO & REFERENCE @AUTHOR SIMRAN:27DEC2022--> 
                                                        <!-- START CODE FOR ADDED USER VILLAGE, TEHSIL, CITY @SIMRAN:05AUG2023-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userVillageLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userVillageLbDiv', '<?php echo $count; ?>', 'YES', 'USER VILLAGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userVillageLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userVillage';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userVillageDiv', '<?php echo $count; ?>', 'NO', 'USER VILLAGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                Village Name
                                                                            </div>
                                                                            <div id="userVillageDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userTalukaLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userTalukaLbDiv', '<?php echo $count; ?>', 'YES', 'USER TALUKA', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userTalukaLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userTaluka';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userReferenceDiv', '<?php echo $count; ?>', 'NO', 'USER TALUKA', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                Taluka/Tehsil Name
                                                                            </div>
                                                                            <div id="userReferenceDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'usercityLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('usercityLbDiv', '<?php echo $count; ?>', 'YES', 'USER CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="usercityLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'usercity';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('usercityDiv', '<?php echo $count; ?>', 'NO', 'USER CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                City Name
                                                                            </div>
                                                                            <div id="usercityDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 95;
                                                                        $fieldName = 'userStateLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('userStateLbDiv', '<?php echo $count; ?>', 'YES', 'USER STATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>

                                                                            </div>
                                                                            <div id="userStateLbDiv"></div>
                                                                        </td>

                                                                        <?php
                                                                        $count = 96;
                                                                        $fieldName = 'userState';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            <div onClick="openSellReturnFormDiv('userStateDiv', '<?php echo $count; ?>', 'NO', 'USER STATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                MAHARASHTRA
                                                                            </div>
                                                                            <div id="userStateDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <!-- END CODE FOR ADDED USER VILLAGE, TEHSIL, CITY @SIMRAN:05AUG2023-->
                                                        <!--START TABLE HEIGHT-->
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                    <tr> 
                                                                        <?php
                                                                        $count = 196;
                                                                        $fieldName = 'tableHeightLb';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                            <div onClick="openSellReturnFormDiv('tableHeightLb', '<?php echo $count; ?>', 'YES', 'TABLE HEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                            <div id="tableHeightLb"></div>
                                                                        </td>
                                                                        <?php
                                                                        $count = 197;
                                                                        $fieldName = 'tableHeight';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        ?>
                                                                        <td valign="middle" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" >
                                                                            <div onClick="openSellReturnFormDiv('tableHeightDiv', '<?php echo $count; ?>', 'NO', 'TABLE HEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                50PX
                                                                            </div>
                                                                            <div id="tableHeightDiv"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--END TABLE HEIGHT-->
                                                    </table>
                                                </td>
                                                <!-- START CODE TO ADD SHIPPING DETAILS @SIMRAN:28OCT2023-->
                                                <td align="center" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipUserNameLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipUserNameLbDiv', '<?php echo $count; ?>', 'YES', 'SHIPPING USER NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipUserNameLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipUserName';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipUserNameDiv', '<?php echo $count; ?>', 'NO', 'SHIPPING USER FNAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'USER NAME'; ?>
                                                                </div>
                                                                <div id="shipUserNameDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipDetTop';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipTitleLbDiv', '<?php echo $count; ?>', 'YES', 'Shipping Address', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipTitleLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipAddress';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipTitleDiv', '<?php echo $count; ?>', 'NO', 'Shippng Address', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'Hadapsar,Pune'; ?>
                                                                </div>
                                                                <div id="shipTitleDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipCityLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipCityLbDiv', '<?php echo $count; ?>', 'YES', 'SHIPPING CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipCityLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipCity';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipCityDiv', '<?php echo $count; ?>', 'NO', 'SHIPPING CITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'PUNE'; ?>
                                                                </div>
                                                                <div id="shipCityDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipStateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipStateLbDiv', '<?php echo $count; ?>', 'YES', 'SHIPPING STATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipStateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipState';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipStateDiv', '<?php echo $count; ?>', 'NO', 'SHIPPING STATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'MAHARASHTRA'; ?>
                                                                </div>
                                                                <div id="shipStateDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipMobNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipMobNoLbDiv', '<?php echo $count; ?>', 'YES', 'MOB NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipMobNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipMobNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipMobNoDiv', '<?php echo $count; ?>', 'NO', 'Shippng Address', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo '9867904578'; ?>
                                                                </div>
                                                                <div id="shipMobNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipGstNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipGstNoLbDiv', '<?php echo $count; ?>', 'YES', 'GST NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipGstNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipGstNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipGstNoDiv', '<?php echo $count; ?>', 'NO', 'GST NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo '26GBH6VVJJI45'; ?>
                                                                </div>
                                                                <div id="shipGstNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'shipPanNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipPanNoLbDiv', '<?php echo $count; ?>', 'YES', 'PAN NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?>&nbsp; &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="shipPanNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'shipPanNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('shipPanNoDiv', '<?php echo $count; ?>', 'NO', 'PAN NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'A3H7JFKMV8'; ?>
                                                                </div>
                                                                <div id="shipPanNoDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!-- END CODE TO ADD SHIPPING DETAILS @SIMRAN:28OCT2023-->
                                                <td align="right" valign="top" class="paddingRight5">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                        <tr>
                                                            <?php
                                                            $count = 20;
                                                            $fieldName = 'invNoTitleLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('invNoTitleLbDiv', '<?php echo $count; ?>', 'YES', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="invNoTitleLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 21;
                                                            $fieldName = 'invNoTitle';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('invNoTitleDiv', '<?php echo $count; ?>', 'NO', 'INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'ICP 1'; ?>
                                                                </div>
                                                                <div id="invNoTitleDiv"></div>
                                                            </td>
                                                        </tr>



                                                        <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'dateTitleLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('dateTitleLb', '<?php echo $count; ?>', 'YES', 'DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="dateTitleLb"></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'dateTitle';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('dateDiv', '<?php echo $count; ?>', 'NO', 'DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="dateDiv"></div>                                                 
                                                            </td>
                                                        </tr>
                                        <!--*********************************************************************************************************-->
                                        <!-- *******************START CODE TO ADD INV RETURN INV NO & DATE @SIMRAN:14SEPT2023************************-->
                                        <!--*********************************************************************************************************-->
                                                        <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'returnInvNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('returnInvNoLbDiv', '<?php echo $count; ?>', 'YES', 'RETURN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="returnInvNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'returnInvNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('returnInvNoDiv', '<?php echo $count; ?>', 'NO', 'RETURN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'IK1' ?>
                                                                </div>
                                                                <div id="returnInvNoDiv"></div>                                                 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'sellMainInvNoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('sellMainInvNoLbDiv', '<?php echo $count; ?>', 'YES', 'SELL MAIN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="sellMainInvNoLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'sellMainInvNo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('sellMainInvNoDiv', '<?php echo $count; ?>', 'NO', 'SELL MAIN INV NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo 'IS1' ?>
                                                                </div>
                                                                <div id="sellMainInvNoDiv"></div>                                                 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'returnInvNoDateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('returnInvNoDateLbDiv', '<?php echo $count; ?>', 'YES', 'RETURN INV DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="returnInvNoDateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'returnInvNoDate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('returnInvNoDateDiv', '<?php echo $count; ?>', 'NO', 'RETURN INV DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="returnInvNoDateDiv"></div>                                                 
                                                            </td>
                                                        </tr>
                                     <!--*********************************************************************************************************-->
                                     <!-- *******************END CODE TO ADD INV RETURN INV NO & DATE @SIMRAN:14SEPT2023************************-->
                                     <!--*********************************************************************************************************-->
                                                        <!--START CODE FOR DUE DATE CUSTOMIZATION : AUTHOR @DARSHANA 27 MAY 2021-->
                                                        <tr>
                                                            <?php
                                                            $count = 22;
                                                            $fieldName = 'dueDateTitleLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('dueDateTitleLbDiv', '<?php echo $count; ?>', 'YES', 'DUE DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="dueDateTitleLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 23;
                                                            $fieldName = 'dueDateTitle';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('dueDateDiv', '<?php echo $count; ?>', 'NO', 'DUE DATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                         <?php echo om_strtoupper(date('d M Y')); ?>
                                                                </div>
                                                                <div id="dueDateDiv"></div>                                                 
                                                            </td>
                                                        </tr>

                                                        <!--START CODE FOR ADD STAFF NAME ON FINE INVOICE : AUTHOR @GANGADHAR 11 NOVEMBER 2022-->
                                                        <tr> 
                                                            <?php
                                                            $count = 95;
                                                            $fieldName = 'staffNameLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td  align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openSellReturnFormDiv('staffNameLbDiv', '<?php echo $count; ?>', 'YES', 'STAFF NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="staffNameLbDiv"></div>
                                                            </td>

                                                            <?php
                                                            $count = 96;
                                                            $fieldName = 'staffname';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td  align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('staffnameDiv', '<?php echo $count; ?>', 'NO', 'STAFF NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                    AJIT TENDULKAR
                                                                </div>
                                                                <div id="staffnameDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END CODE TO  ADD STAFF  NAME ON FINE INVOICE : AUTHOR @GANGADHAR 11 NOVEMBER 2022-->
                                                        <!--START CODE FOR ADD SALES PERSON NAME ON FINE INVOICE : AUTHOR@SIMRAN:18AUG2023-->
                                                        <tr> 
                                                            <?php
                                                            $count = 95;
                                                            $fieldName = 'salesPersonNameLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td  align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                <div onClick="openSellReturnFormDiv('salesPersonNameLbDiv', '<?php echo $count; ?>', 'YES', 'SALES PERSON NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="salesPersonNameLbDiv"></div>
                                                            </td>

                                                            <?php
                                                            $count = 96;
                                                            $fieldName = 'salesPersonName';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td  align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('salesPersonNameDiv', '<?php echo $count; ?>', 'NO', 'SALES PERSON NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">
                                                                   SALES PERSON NAME
                                                                </div>
                                                                <div id="salesPersonNameDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END CODE FOR ADD SALES PERSON NAME ON FINE INVOICE : AUTHOR@SIMRAN:18AUG2023-->
                                                        <!-- START CODE TO ADD GST AND PAN AT CUSTOMIZATION AT INVOICE @AUTHOR:RUTUJA-15FEB2021 -->
                                                        <tr valign="top">
                                                            <?php
                                                            $count = 10;
                                                            $fieldName = 'firmTinLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri cursor fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmTinLabelDiv', '<?php echo $count; ?>', 'YES', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmTinLabelDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 11;
                                                            $fieldName = 'firmTin';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmTinDiv', '<?php echo $count; ?>', 'NO', 'TIN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">1234567890</div>
                                                                <div id="firmTinDiv"></div>
                                                            </td>
                                                        </tr>

                                                        <tr valign="top">
                                                            <?php
                                                            $count = 12;
                                                            $fieldName = 'firmPanLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmPanLbDiv', '<?php echo $count; ?>', 'YES', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '6', '-23');"><?php echo $label_field_content; ?> &nbsp;:&nbsp;&nbsp;</div>
                                                                <div id="firmPanLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 13;
                                                            $fieldName = 'firmPan';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('firmPanDiv', '<?php echo $count; ?>', 'NO', 'PAN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-23');">AAECM5678D</div>
                                                                <div id="firmPanDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!-- END CODE TO ADD GST AND PAN AT CUSTOMIZATION AT INVOICE @AUTHOR:RUTUJA-15FEB2021 -->
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <!--SET WIDTH FOR CUSTOMIZE INVOICE : AUTHOR @DARSHANA 19 JUNE 2021-->
                                    <td colspan="25" style="max-width: 1080px;">
                                        <?php
                                        $fieldName = 'itemDetTop';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $itemDetTopVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="0" width="100%" cellspacing="1" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                            <!-- START CODE TO ADD ROW FOR PURITY WAISE METAL RATE DESCRIPTION AT CUSTOMIZATION AT INVOICE @AUTHOR:MADHUREE-03OCT2020 -->
            <!--                                <tr>
                                                <td colspan="25" align="center">
                                                    <div class="hrPaleGrey"></div>
                                                </td>
                                            </tr>-->
                                            <tr  style="background:#FFE34F;"> 
                                                <td valign="middle" align="center" colspan="25" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <table width="75%" border="0" align="center">
                                                        <tr>
                                                            <?php
                                                            // ADD CUSTOMIZATION OPTION FOR 18K : AUTHOR @DARSHANA 29 JAN 2021
                                                            $count = 57;
                                                            $fieldName = '18kRateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                <div onClick="openSellReturnFormDiv('18kRateLbDiv', '<?php echo $count; ?>', 'YES', '18K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                                                         <?php
                                                                         if ($label_field_content != '') {
                                                                             echo $label_field_content;
                                                                         } else {
                                                                             echo '18K GOLD RATE';
                                                                         }
                                                                         ?> : 
                                                                </div>
                                                                <div id="18kRateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 58;
                                                            $fieldName = '18kRate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('18kRateDiv', '<?php echo $count; ?>', 'NO', '18K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">18000.00/GM</div>
                                                                <div id="18kRateDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 57;
                                                            $fieldName = '22kRateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                <div onClick="openSellReturnFormDiv('22kRateLbDiv', '<?php echo $count; ?>', 'YES', '22K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                                                         <?php
                                                                         if ($label_field_content != '') {
                                                                             echo $label_field_content;
                                                                         } else {
                                                                             echo '22K GOLD RATE';
                                                                         }
                                                                         ?> : 
                                                                </div>
                                                                <div id="22kRateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 58;
                                                            $fieldName = '22kRate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('22kRateDiv', '<?php echo $count; ?>', 'NO', '22K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">31000.00/GM</div>
                                                                <div id="22kRateDiv"></div>
                                                            </td>
                                                            <!-- -->
                                                            <?php
                                                            $count = 57;
                                                            $fieldName = '24kRateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                <div onClick="openSellReturnFormDiv('24kRateLbDiv', '<?php echo $count; ?>', 'YES', '24K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                                                         <?php
                                                                         if ($label_field_content != '') {
                                                                             echo $label_field_content;
                                                                         } else {
                                                                             echo '24K GOLD RATE';
                                                                         }
                                                                         ?> : 
                                                                </div>
                                                                <div id="24kRateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 58;
                                                            $fieldName = '24kRate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('24kRateDiv', '<?php echo $count; ?>', 'NO', '24K GOLD RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">30000.00/GM</div>
                                                                <div id="24kRateDiv"></div>
                                                            </td>
                                                            <!-- -->
                                                            <?php
                                                            $count = 57;
                                                            $fieldName = 'silverRateLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                <div onClick="openSellReturnFormDiv('silverRateLbDiv', '<?php echo $count; ?>', 'YES', 'SILVER RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                                                         <?php
                                                                         if ($label_field_content != '') {
                                                                             echo $label_field_content;
                                                                         } else {
                                                                             echo 'SILVER RATE';
                                                                         }
                                                                         ?> : 
                                                                </div>
                                                                <div id="silverRateLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 58;
                                                            $fieldName = 'silverRate';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == '')
                                                                $label_field_font_size = 14;
                                                            if ($label_field_font_color == '')
                                                                $label_field_font_color = 'black';
                                                            ?>
                                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('silverRateDiv', '<?php echo $count; ?>', 'NO', 'SILEVR RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">51000.00/KG</div>
                                                                <div id="silverRateDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
            <!--                                <tr>
                                                <td colspan="25" align="center">
                                                    <div class="hrPaleGrey"></div>
                                                </td>
                                            </tr>-->
                                            <!-- END CODE TO ADD ROW FOR PURITY WAISE METAL RATE DESCRIPTION AT CUSTOMIZATION AT INVOICE @AUTHOR:MADHUREE-03OCT2020 -->
                                            <tr> 
                                                <td valign="middle" align="center" colspan="24" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <table width="100%" border="0">
                                                        <tr>
                                                            <!-- START CODE TO ADD OPTION FOR INVOICE TITLE PREFIX @AUTHOR:MADHUREE-05JULY2020 -->
                                                            <?php
                                                            $count = 336;
                                                            $fieldName = 'invTitlePrefix';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" width="50%" class="ff_calibri cursor font_color_<?php
                                                            if ($label_field_font_color != '') {
                                                                echo $label_field_font_color;
                                                            } else {
                                                                echo 'blue';
                                                            }
                                                            ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                                <div onClick="openSellReturnFormDiv('invTitlePrefixDiv', '<?php echo $count; ?>', 'NO', 'GOLD/SILVER SELL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php
                                                                if ($label_field_font_color != '') {
                                                                    echo $label_field_font_color;
                                                                } else {
                                                                    echo 'blue';
                                                                }
                                                                ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php
                                                                         if ($label_field_content != '') {
                                                                             echo $label_field_content;
                                                                         } else {
                                                                             echo 'GOLD/SILVER SELL';
                                                                         }
                                                                         ?></div>
                                                                <div id="invTitlePrefixDiv"></div>
                                                            </td>
                                                            <!-- END CODE TO ADD OPTION FOR INVOICE TITLE PREFIX @AUTHOR:MADHUREE-05JULY2020 -->
                                                            <?php
                                                            $count = 24;
                                                            $fieldName = 'invTitle';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                               echo '$label_field_check='.$label_field_check;
                                                            ?>
                                                            <td align="center"  width="50%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                                <div onClick="openSellReturnFormDiv('invTitleDiv', '<?php echo $count; ?>', 'YES', 'CASH INVOICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                <div id="invTitleDiv"></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>    
            <!--                                <tr>
                                                <td align="center" colspan="14">
                                                    &nbsp;
                                                </td>
                                            </tr>-->
                                <?php
                                include 'omPaymentReceiptTable.php';
                                if ($panelName == 'customizedAssignedOrderInv' && $labelType == 'AssignOrderInvoice') {
                                    //ADD CODITION FOR ASSIGN ORDER MIDDEL TABLE CUSTOMIZATION : AUTHOR @DARSHANA 26 AUG 2021
                                    ?>
                                    <tr style="margin-bottom:10px;">
                                        <td align="center" colspan="24">
                                            <table align="center" width="100%">
                                                <?php include 'omAsignOrdrTbCustomize.php'; ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="14">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <?php
                                    //END CODITION FOR ASSIGN ORDER MIDDEL TABLE CUSTOMIZATION : AUTHOR @DARSHANA 26 AUG 2021
                                }
                                ?>
                                <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                    <tr>
                                        <td colspan="25">
                                            <div class="tableCusto" style="max-width:100%;overflow-x:auto;margin-bottom:5px;">
                                                <table width="100%" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #c1c1c1;">
                                                    <tr class="bc_color_darkblue" height="20px" 
                                                        style="font-weight:600;background-color: #<?php echo $bcColor; ?>">
                                                            <?php
                                                            $label_field_content = '';
                                                            $count = 75;
                                                            $fieldName = 'itemSNoLb';
                                                            $label_field_font_size = 14;
                                                            $label_field_font_color = 'black';
                                                            $label_field_content = 'S NO';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> border-color-grey-b border-color-grey-top " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;">
                                                            <div onClick="openSellReturnFormDiv('itemSNoLbDiv', '<?php echo $count; ?>', 'YES', 'S NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'S NO';
                                                                     ?></div>
                                                            <div id="itemSNoLbDiv"></div> 
                                                        </td>

                                                        <?php
                                                        $count = 25;
                                                        $fieldName = 'itemIdLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px" width="50px">
                                                            <div onClick="openSellReturnFormDiv('itemIdLbDiv', '<?php echo $count; ?>', 'YES', 'IT ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemIdLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 26;
                                                        $fieldName = 'designLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('designLbDiv', '<?php echo $count; ?>', 'YES', 'DESIGN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="designLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemDescLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemDescLbDiv', '<?php echo $count; ?>', 'YES', 'DESC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemDescLbDiv"></div>
                                                        </td>
                                                        <!--ADD CODE FOR ITEM CATEGORY : AUTHOR SIMRAN:18NOV2022-->
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemcategoryLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemcategoryLbDiv', '<?php echo $count; ?>', 'YES', 'PROD CATEGORY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemcategoryLbDiv"></div>
                                                        </td>
                                                        <!--END CODE FOR ITEM CATEGORY : AUTHOR SIMRAN:18NOV2022-->
                                                        <!--ADD CODE FOR BRAND NAME: AUTHOR @DARSHANA 26 MAY 2021-->
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemBrandNameLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemBrandNameLbDiv', '<?php echo $count; ?>', 'YES', 'BRAND NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemBrandNameLbDiv"></div>
                                                        </td>
                                                        <!--ADD CODE FOR HALL MARK UID : AUTHOR DARSHANA 7 JULY 2021-->
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemHallMarkLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemHallMarkLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK UID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemHallMarkLbDiv"></div>
                                                        </td>
                                                        <!--END CODE FOR HALL MARK UID : AUTHOR DARSHANA 7 JULY 2021-->
                                                        <!--// ADD FOR SHOW UNIT PRICE ON INVOICE AUTHOR : DIKSHA10DEC2018-->
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'unitPriceLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('unitPriceLbDiv', '<?php echo $count; ?>', 'YES', 'UNIT PRICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="unitPriceLbDiv"></div>
                                                        </td>
                                                        <!--// END FOR SHOW UNIT PRICE ON INVOICE AUTHOR : DIKSHA10DEC2018-->
                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemHSNLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemHSNLbDiv', '<?php echo $count; ?>', 'YES', 'HSN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemHSNLbDiv"></div>
                                                        </td>

                                                        <!--// ADD CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021-->

                                                        <?php
                                                        $count = 27;
                                                        $fieldName = 'itemotherinfoLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top padLeft5" 
                                                            style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemotherinfoLbDiv', '<?php echo $count; ?>', 'YES', 'OTHERINFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemotherinfoLbDiv"></div>
                                                        </td>

                                                        <!--// END CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021-->


                                                        <?php
                                                        $count = 28;
                                                        $fieldName = 'itemGsWtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemGsWtLbDiv', '<?php echo $count; ?>', 'YES', 'GS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemGsWtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        //Start add code for pkt wt Author:SANT08APR17
                                                        $count = 66;
                                                        $fieldName = 'itemPktWtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemPktWtLbDiv', '<?php echo $count; ?>', 'YES', 'PKT WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemPktWtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        // End add code for pkt wt Author:SANT08APR17
                                                        $count = 29;
                                                        $fieldName = 'itemNtWtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemNtWtLbDiv', '<?php echo $count; ?>', 'YES', 'NT WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemNtWtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 80;
                                                        $fieldName = 'itemProcessWtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemProcessWtLbDiv', '<?php echo $count; ?>', 'YES', 'PROCESS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemProcessWtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 75;
                                                        $fieldName = 'itemPurityLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        $label_field_content = 'PURITY';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemPurityLbDiv', '<?php echo $count; ?>', 'YES', 'PURITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'PURITY';
                                                                     ?></div>
                                                            <div id="itemPurityLbDiv"></div> 
                                                        </td>
                                                        <!-- final purity lbl -->
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 75;
                                                        $fieldName = 'itemFinalPurityLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        $label_field_content = 'FINAL PURITY';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemFinalPurityLbDiv', '<?php echo $count; ?>', 'YES', 'FINAL PURITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'FINAL PURITY';
                                                                     ?></div>
                                                            <div id="itemFinalPurityLbDiv"></div> 
                                                        </td>
                                                        <!-- end final purity lbl -->
                                                        <?php
                                                        $count = 77;
                                                        $fieldName = 'itemFfnWtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_content == '' || $label_field_font_size == 0) {
                                                            $label_field_content = 'FN WT';
                                                            $label_field_font_size = 14;
                                                            $label_field_font_color = 'black';
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemFfnWtLbDiv', '<?php echo $count; ?>', 'YES', 'FN WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="itemFfnWtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 75;
                                                        $fieldName = 'itemWsWtLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        $label_field_content = 'WES WT';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemWsWtLbDiv', '<?php echo $count; ?>', 'YES', 'WES WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'WES WT';
                                                                     ?></div>
                                                            <div id="itemWsWtLbDiv"></div> 
                                                        </td>
                                                        <!-- START CODE TO ADD OPTION FOR FINAL PURITY WITH CUSTOMER WASTAGE @AUTHOR:MADHUREE-20JUNE2020 -->
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 335;
                                                        $fieldName = 'itemFinalPurityWtCsWsLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                            <div onClick="openSellReturnFormDiv('itemFinalPurityWtCsWsLbDiv', '<?php echo $count; ?>', 'YES', 'WS + CS WS%', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-2');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'WS + CS WS%';
                                                                     ?>
                                                            </div>
                                                            <div id="itemFinalPurityWtCsWsLbDiv"></div> 
                                                        </td>
                                                        <!-- START CODE FOR ADDED CUST WS WT @SIMRAN:03APR2023-->     
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 75;
                                                        $fieldName = 'itemCustWsWtLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        $label_field_content = 'WES WT';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemCustWsWtLbDiv', '<?php echo $count; ?>', 'YES', 'CUST WS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'CUST WS WT';
                                                                     ?></div>
                                                            <div id="itemCustWsWtLbDiv"></div> 
                                                        </td>
                                                        <!-- END CODE FOR ADDED CUST WS WT @SIMRAN:03APR2023-->  

                                                        <?php
                                                        $count = 31;
                                                        $fieldName = 'metalRateLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('metalRateLbDiv', '<?php echo $count; ?>', 'YES', 'RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="metalRateLbDiv"></div>
                                                        </td>
                                                        <!-- START CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->
                                                        <?php
                                                        $count = 32;
                                                        $fieldName = 'rateByPurityLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('rateByPurityLbDiv', '<?php echo $count; ?>', 'YES', 'RATE(BY PURITY)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="rateByPurityLbDiv"></div>
                                                        </td>
                                                        <!-- END CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->

                                                        <?php
                                                        $count = 33;
                                                        $fieldName = 'valLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('valLbDiv', '<?php echo $count; ?>', 'YES', 'VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="valLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $label_field_content = '';
                                                        $count = 335;
                                                        $fieldName = 'TotalVaLb';
                                                        $label_field_font_size = 14;
                                                        $label_field_font_color = 'black';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                            <div onClick="openSellReturnFormDiv('TotalVALbDiv', '<?php echo $count; ?>', 'YES', 'EXTRA AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'EXTRA AMT';
                                                                     ?>
                                                            </div>
                                                            <div id="TotalVALbDiv"></div> 
                                                        </td>
                                                        <!-- Making charges -->
                                                        <?php
                                                        $count = 32;
                                                        $fieldName = 'labourLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('labourLbDiv', '<?php echo $count; ?>', 'YES', 'LABOUR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                            <div id="labourLbDiv"></div>
                                                        </td>
                                                        <!-- end Making charges -->
                                                        <?php
                                                        $count = 67;
                                                        $fieldName = 'labourLbVal';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('labourLbValDiv', '<?php echo $count; ?>', 'YES', 'LABOUR VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '5');"><?php echo $label_field_content; ?></div>
                                                            <div id="labourLbValDiv"></div>
                                                        </td>

                                                        <?php
                                                        $count = 67;
                                                        $fieldName = 'metal_vallb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('metal_vallbDiv', '<?php echo $count; ?>', 'YES', 'METAL VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-45');"><?php echo $label_field_content; ?></div>
                                                            <div id="metal_vallbDiv"></div>
                                                        </td>

                                                        <?php /* End Code by suraj for making chaatge Option */ ?>

                                                        <?php /*
                                                          $count = 34;
                                                          $fieldName = 'wstgwtlb';
                                                          $label_field_font_size = '';
                                                          $label_field_font_color = '';
                                                          parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                          if ($label_field_font_size == 0) {
                                                          $label_field_font_size = 14;
                                                          }
                                                          ?>
                                                          <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                          <div onClick="openSellReturnFormDiv('wstgeLbDiv', '<?php echo $count; ?>', 'YES', 'WASTAGE WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                          <div id="wstgeLbDiv"></div>
                                                          </td>
                                                         */ ?>
                                                        <!--START IGST-->
                                                        <?php
                                                        //                                    $count = 101;
                                                        //                                    $fieldName = 'igstLb';
                                                        //                                    $label_field_font_size = '';
                                                        //                                    $label_field_font_color = '';
                                                        //                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        //                                    if ($label_field_font_size == 0) {
                                                        //                                        $label_field_font_size = 14;
                                                        //                                    }
                                                        ?>
                    <!--                                    <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                <tr> 
                                                                    <td colspan="2" class="cursor">
                                                                        <div class="suppHomeMargin" onClick="openSellReturnFormDiv('igstLb', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');"><?php echo $label_field_content; ?></div>
                                                                        <div id="igstLb"></div>
                
                                                                    </td>
                                                                </tr>   
                                                                <tr> 
                                                                    <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        RATE
                                                                    </td>
                                                                    <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        AMT
                                                                    </td>
                                                                </tr>
                                                            </table>  
                                                        </td>-->
                                                        <!--END IGST-->
                                                        <?php
                                                        //                                    $count = 36;
                                                        //                                    $fieldName = 'amtLb';
                                                        //                                    $label_field_font_size = '';
                                                        //                                    $label_field_font_color = '';
                                                        //                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        //                                    if ($label_field_font_size == 0) {
                                                        //                                        $label_field_font_size = 14;
                                                        //                                    }
                                                        ?>
                                                      <!--                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                                              <div onClick="openSellReturnFormDiv('amtLbDiv', '<?php echo $count; ?>', 'YES', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                              '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-270');"><?php echo $label_field_content; ?></div>
                                                                                              <div id="amtLbDiv"></div>
                                                                                          </td>-->
                                                    </tr>
                                                    <tr class="marginTop10">
                                                        <?php
                                                        $count = 37;
                                                        $fieldName = 'sNo';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                                                            <div onClick="openSellReturnFormDiv('sNoDiv', '<?php echo $count; ?>', 'NO', 'S NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                1
                                                            </div>
                                                            <div id="sNoDiv"></div>   
                                                        </td>
                                                        <?php
                                                        $count = 37;
                                                        $fieldName = 'itemId';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" valign="top">
                                                            <div onClick="openSellReturnFormDiv('itemIdDiv', '<?php echo $count; ?>', 'NO', 'ITEM ID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                PG1
                                                            </div>
                                                            <div id="itemIdDiv"></div>   
                                                        </td>
                                                        <?php
                                                        $count = 38;
                                                        $fieldName = 'design';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div 
                                                                <a style="cursor: pointer;" onClick="openSellReturnFormDiv('designDiv', '<?php echo $count; ?>', 'NO', 'DESIGN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                <img src="<?php echo $documentRoot; ?>/images/wel_om32.png"  width="15px" height="15px" border="0" style="border-color: #B8860B"/>
                                                                </a>
                                                            </div>
                                                            <div id="designDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'itemDesc';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  rowspan="2">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:80px;">   
                                                                <tr> 
                                                                    <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('itemDescDiv', '<?php echo $count; ?>', 'NO', 'DESCRIPTION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            RING(1)
                                                                        </div>
                                                                        <div id="itemDescDiv"></div> 
                                                                    </td>
                                                                </tr>


                                                                <!----Start code added  for Barcode option on sell invoice Author:MADHUREE-17Dec2019------->
                                                                <tr> 
                                                                    <?php
                                                                    $count = 367;
                                                                    $fieldName = 'itemBarcode';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    if ($label_field_font_size == '') {
                                                                        $label_field_font_size = 11;
                                                                    }
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                    <td align="left" class="ff_calibri fs_11 cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('itemBcDiv', '<?php echo $count; ?>', 'NO', 'BARCODE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            [Barcode : 10001]
                                                                        </div>
                                                                        <div id="itemBcDiv"></div>
                                                                    </td>
                                                                </tr>
                                                                <!----End code added  for Barcode option on sell invoice Author:MADHUREE-17Dec2019------->
                                                                <!-- START CODE TO ADD OPTION FOR HALLMARK UID TO DISPLAY BELOW ITEM NAME @AUTHOR:MADHUREE-12JULY2021 -->
                                                                <tr> 
                                                                    <?php
                                                                    $count = 367;
                                                                    $fieldName = 'itemHidLb';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    if ($label_field_font_size == '') {
                                                                        $label_field_font_size = 11;
                                                                    }
                                                                    ?>
                                                                    <td align="left" class="ff_calibri fs_11 cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('itemHidLbDiv', '<?php echo $count; ?>', 'YES', 'HID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            [HID 
                                                                        </div>
                                                                        <div id="itemHidLbDiv"></div>
                                                                        <!--</td>-->
                                                                        <?php
                                                                        $count = 367;
                                                                        $fieldName = 'itemHid';
                                                                        $label_field_font_size = '';
                                                                        $label_field_font_color = '';
                                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                        if ($label_field_font_size == '') {
                                                                            $label_field_font_size = 11;
                                                                        }
                                                                        ?>
                                                                        <!--<td align="left" class="ff_calibri fs_11 cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">-->
                                                                        <div onClick="openSellReturnFormDiv('itemHidDiv', '<?php echo $count; ?>', 'NO', 'HID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            : H-12345]
                                                                        </div>
                                                                        <div id="itemHidDiv"></div>
                                                                    </td>
                                                                </tr>
                                                                <!-- END CODE TO ADD OPTION FOR HALLMARK UID TO DISPLAY BELOW ITEM NAME @AUTHOR:MADHUREE-12JULY2021 -->
                                                            </table>
                                                        </td>
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'itemCategory';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemCategoryDiv', '<?php echo $count; ?>', 'NO', 'ITEM CATEGORY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                LADIES RING
                                                            </div>
                                                            <div id="itemCategoryDiv"></div> 
                                                        </td>
                                                        <!--ADD CODE FOR BRAND NAME : AUTHOR @DARSHANA 26 MAY 2021-->
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'brandName';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('brandNameDiv', '<?php echo $count; ?>', 'NO', 'BRAND NAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                PNG
                                                            </div>
                                                            <div id="brandNameDiv"></div> 
                                                        </td>
                                                        <!--ADD CODE FOR HALL MARK UID : AUTHOR @DARSHANA 7 JULY 2021-->
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'hallMarkUid';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('hallMarkUidDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK UID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                H-12345
                                                            </div>
                                                            <div id="hallMarkUidDiv"></div> 
                                                        </td>
                                                        <!--END CODE FOR HALL MARK UID : AUTHOR @DARSHANA 7 JULY 2021-->
                                                        <!--// ADD FOR SHOW UNIT PRICE ON INVOICE AUTHOR : DIKSHA10DEC2018-->
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'unitPrice';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('unitPriceDiv', '<?php echo $count; ?>', 'NO', 'UNIT PRICE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                55.00
                                                            </div>
                                                            <div id="unitPriceDiv"></div> 
                                                        </td>
                                                        <!--// ADD FOR SHOW UNIT PRICE ON INVOICE AUTHOR : DIKSHA10DEC2018-->
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'itemHSN';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemHSNDiv', '<?php echo $count; ?>', 'NO', 'HSN', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                1.2.4.5
                                                            </div>
                                                            <div id="itemHSNDiv"></div> 
                                                        </td>


                                                        <!--// ADD CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021-->
                                                        <?php
                                                        $count = 39;
                                                        $fieldName = 'OtherInfo';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="left"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('OtherInfoDiv', '<?php echo $count; ?>', 'NO', 'OTHERINFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                Other Info
                                                            </div>
                                                            <div id="OtherInfoDiv"></div> 
                                                        </td>
                                                        <!--// END CODE  FOR SHOW OTHER INFO ON INVOICE AUTHOR : GANGADHAR18FEB2021-->
                                                        <?php
                                                        $count = 40;
                                                        $fieldName = 'itemGsWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemGsWtDiv', '<?php echo $count; ?>', 'NO', 'GS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                10
                                                            </div>
                                                            <div id="itemGsWtDiv"></div>
                                                            <?php
                                                            $count = 40;
                                                            $fieldName = 'itemWtType';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <div onClick="openSellReturnFormDiv('itemWtTypeDiv', '<?php echo $count; ?>', 'NO', 'WT TYPE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                GM
                                                            </div>
                                                            <div id="itemWtTypeDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 284;
                                                        $fieldName = 'itemPktWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemPktWtDiv', '<?php echo $count; ?>', 'NO', 'PKT WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                10GM
                                                            </div>
                                                            <div id="itemPktWtDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 41;
                                                        $fieldName = 'itemNtWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemNtWtDiv', '<?php echo $count; ?>', 'NO', 'NT WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                20GM
                                                            </div>
                                                            <div id="itemNtWtDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 81;
                                                        $fieldName = 'itemProcessWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemProcessWtDiv', '<?php echo $count; ?>', 'NO', 'PROCESS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                10GM
                                                            </div>
                                                            <div id="itemProcessWtDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 76;
                                                        $fieldName = 'itemPurity';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemPurityDiv', '<?php echo $count; ?>', 'NO', 'PURITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                100%
                                                            </div>
                                                            <div id="itemPurityDiv"></div> 
                                                        </td>
                                                        <!-- final purity -->
                                                        <?php
                                                        $count = 76;
                                                        $fieldName = 'itemFinalPurity';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemFinalPurityDiv', '<?php echo $count; ?>', 'NO', 'FINAL PURITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                90%
                                                            </div>
                                                            <div id="itemFinalPurityDiv"></div> 
                                                        </td>
                                                        <!-- end final purity -->
                                                        <?php
                                                        $count = 78;
                                                        $fieldName = 'itemFfnWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_content == '') {
                                                            $label_field_font_size = 14;
                                                            $label_field_font_color = 'black';
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemFfnWtDiv', '<?php echo $count; ?>', 'NO', 'FN WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                10GM
                                                            </div>
                                                            <div id="itemFfnWtDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 40;
                                                        $fieldName = 'itemWSWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemWSWtDiv', '<?php echo $count; ?>', 'NO', 'WS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                5%
                                                            </div>
                                                            <div id="itemWSWtDiv"></div> 
                                                        </td>                                                                    
                                                        <!-- START CODE TO ADD OPTION FOR WASTAGE WITH CUSTOMER WASTAGE @AUTHOR:MADHUREE-20JUNE2020 -->
                                                        <?php
                                                        $count = 336;
                                                        $fieldName = 'itemFinalPurityWtCsWs';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 6px;">
                                                            <div onClick="openSellReturnFormDiv('itemFinalPurityWtCsWsDiv', '<?php echo $count; ?>', 'NO', 'WS + CS WS%', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '0');">
                                                                7%
                                                            </div>
                                                            <div id="itemFinalPurityWtCsWsDiv"></div> 
                                                        </td>
                                                        <!--END CODE FOR ADDED CUST WASTAGE @SIMRAN:03APR2023-->
                                                        <!--START CODE FOR ADDED CUST WASTAGE @SIMRAN:03APR2023-->
                                                        <?php
                                                        $count = 40;
                                                        $fieldName = 'itemCustWsWt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('itemCustWsWtDiv', '<?php echo $count; ?>', 'NO', 'CUST WS WT ', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                8%
                                                            </div>
                                                            <div id="itemCustWsWtDiv"></div> 
                                                        </td>
                                                        <td align="right">
                                                            <table border="0"  cellspacing="0" cellpadding="0" width="100%" height="100%">
                                                                <?php
                                                                $count = 43;
                                                                $fieldName = 'metalRate';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_content = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('metalRateDiv', '<?php echo $count; ?>', 'NO', 'RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            30000
                                                                        </div>
                                                                        <div id="metalRateDiv"></div>
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $count = 431;
                                                                $fieldName = 'metalRateByPurity';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_content = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <tr>
                                                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('metalRateByPurityDiv', '<?php echo $count; ?>', 'NO', 'RATEBYPURITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            28000
                                                                        </div>
                                                                        <div id="metalRateByPurityDiv"></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <!-- START CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->
                                                        <?php
                                                        $count = 44;
                                                        $fieldName = 'rateByPurity';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('rateByPurityDiv', '<?php echo $count; ?>', 'NO', 'RATE(BY PURITY)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                53000
                                                            </div>
                                                            <div id="rateByPurityDiv"></div> 
                                                        </td>
                                                        <!-- END CODE FOR ADDED RATE BY PURITY @SIMRAN:07JULY2023-->

                                                        <?php
                                                        $count = 45;
                                                        $fieldName = 'val';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('valDiv', '<?php echo $count; ?>', 'NO', 'VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                (V)30000
                                                                (M)  100
                                                            </div>
                                                            <div id="valDiv"></div> 
                                                        </td>
                                                        <!-- extra amt-->
                                                        <?php
                                                        $count = 336;
                                                        $fieldName = 'TotalVa';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 6px;">
                                                            <div onClick="openSellReturnFormDiv('TotalVADiv', '<?php echo $count; ?>', 'NO', 'TOTAL VA', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                5200
                                                            </div>
                                                            <div id="TotalVADiv"></div> 
                                                        </td>
                                                        <!-- END -->
                                                        <!-- making charges -->
                                                        <?php
                                                        $count = 44;
                                                        $fieldName = 'labour';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('labourDiv', '<?php echo $count; ?>', 'NO', 'LABOUR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                100PP
                                                            </div>
                                                            <div id="labourDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 286;
                                                        $fieldName = 'labourVal';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('labourValDiv', '<?php echo $count; ?>', 'NO', 'LABOURVAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '10');">
                                                                1000
                                                            </div>
                                                            <div id="labourValDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 286;
                                                        $fieldName = 'metal_val';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('metal_valDiv', '<?php echo $count; ?>', 'NO', 'METAL VALUE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-8');">
                                                                30000
                                                            </div>
                                                            <div id="metal_valDiv"></div> 
                                                        </td>
                                                        <?php /*
                                                          $count = 46;
                                                          $fieldName = 'wstgwtval';
                                                          $label_field_font_size = '';
                                                          $label_field_font_color = '';
                                                          parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                          ?>
                                                          <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                          <div onClick="openSellReturnFormDiv('wastagewtDiv', '<?php echo $count; ?>', 'NO', 'WASATAGE WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                          100
                                                          </div>
                                                          <div id="wastagewtDiv"></div>
                                                          </td>
                                                         */ ?>

                                                        <!--START IGST VALUES-->
                                                        <?php
                                                        //                                    $count = 102;
                                                        //                                    $fieldName = 'igstAmt';
                                                        //                                    $label_field_font_size = '';
                                                        //                                    $label_field_font_color = '';
                                                        //                                    $label_field_content = '';
                                                        //                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                    <!--                                    <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                            <table border="0" cellspacing="0" cellpadding="0">   
                                                                <tr> 
                                                                    <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                        <div onClick="openSellReturnFormDiv('igstDiv', '<?php echo $count; ?>', 'NO', 'I %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');">
                                                                            1.5 %
                                                                        </div>
                                                                        <div id="igstDiv"></div> 
                                                                    </td>
                                                                    <td align="right" class="cursor" >
                                                                        <div onClick="openSellReturnFormDiv('igstDiv', '<?php echo $count; ?>', 'NO', 'IGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');">
                                                                            1000
                                                                        </div>
                                                                        <div id="igstDiv"></div> 
                                                                    </td>
                                                                </tr>
                                                            </table>  
                                                        </td>-->
                                                        <!--END IGST VALUES-->
                                                    </tr>
                                                </table>
                                            </div>      
                                        </td>
                                    </tr>
                                    <?php /* code start for new line for labels by suraj  one <tr> Added   */ ?>
                                    <tr class="marginTop10">
                                        <?php /* second row started for label */ ?>
    <!--                                                <tr class="bc_color_darkblue" height="20px" style="font-weight:600;border-left:1px solid #c1c1c1;border-right:1px solid #c1c1c1;background-color: #<?php echo $bcColor; ?>">
                                        START CODE FOR OTHER CHARGES : AUTHOR @DARSHANA 22 JULY 2021
                                        <td colspan="25">-->
                                    <tr>
                                        <td colspan="25">
                                            <div class="tableCusto" style="max-width:100%;overflow-x:auto;margin-bottom:5px;">
                                                <table width="100%" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #c1c1c1;">
                                                    <tr class="bc_color_darkblue" height="20px" 
                                                        style="font-weight:600;background-color: #<?php echo $bcColor; ?>">
                                                            <?php
                                                            $label_field_content = '';
                                                            $count = 335;
                                                            $fieldName = 'othChrgLb';
                                                            $label_field_font_size = 14;
                                                            $label_field_font_color = 'black';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                            <div onClick="openSellReturnFormDiv('othChrgLbDiv', '<?php echo $count; ?>', 'YES', 'OTHER CH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                     <?php
                                                                     if ($label_field_content != '')
                                                                         echo $label_field_content;
                                                                     else
                                                                         echo 'OTH CHRG';
                                                                     ?>
                                                            </div>
                                                            <div id="othChrgLbDiv"></div> 
                                                        </td>
                                                        <!--END CODE FOR OTHER CHARGES : AUTHOR @DARSHANA 22 JULY 2021-->
                                                        <?php
                                                        $count = 67;
                                                        $fieldName = 'total_valwith_mkglb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('total_valwith_mkglbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="total_valwith_mkglbDiv"></div>
                                                        </td>
                                                        <!--START CGST-->
                                                        <?php
                                                        $count = 67;
                                                        $fieldName = 'totalCrystallb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_////<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('totalCrystallbDiv', '////<?php echo $count; ?>', 'YES', 'CRYSTAL VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="totalCrystallbDiv"></div>
                                                        </td>
                                                        <!--START CODE FOR ADDED TAX PERCENTAGE OPTION @AUTHOR SIMRAN:24APR2023-->
                                                        <?php
                                                        $count = 35;
                                                        $fieldName = 'taxPercentageLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('taxPercentageLbDiv', '<?php echo $count; ?>', 'YES', 'TAX %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="taxPercentageLbDiv"></div>
                                                        </td>
                                                        <!--END CODE FOR ADDED TAX PERCENTAGE OPTION @AUTHOR SIMRAN:24APR2023-->         
                                                        <?php
                                                        $count = 34;
                                                        $fieldName = 'taxLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('taxLbDiv', '<?php echo $count; ?>', 'YES', 'TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="taxLbDiv"></div>
                                                        </td>
                                                        <!--START CODE FOR ADDED VAT AND VAT AMT OPTION @AUTHOR SIMRAN:15DEC2022-->
                                                        <?php
                                                        $count = 35;
                                                        $fieldName = 'vatLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('vatLbDiv', '<?php echo $count; ?>', 'YES', 'VAT(%)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="vatLbDiv"></div>
                                                        </td>

                                                        <?php
                                                        $count = 35;
                                                        $fieldName = 'vatAmtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('vatAmtLbDiv', '<?php echo $count; ?>', 'YES', 'VAT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-100');"><?php echo $label_field_content; ?></div>
                                                            <div id="vatAmtLbDiv"></div>
                                                        </td>
                                                        <!--END CODE FOR ADDED VAT AND VAT AMT OPTION @AUTHOR SIMRAN:15DEC2022-->
                                                        <?php
                                                        $count = 73;
                                                        $fieldName = 'slPrValueAddedOp';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                                        $s = "SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
//                                        echo '$s'.$s;
                                                        $valAddedOption = $label_field_content;
                                                        if ($valAddedOption == 'byAmount') {
                                                            ?>
                                                            <?php
                                                            $count = 30;
                                                            $fieldName = 'valAddedLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('valAddedLbDiv', '<?php echo $count; ?>', 'YES', 'VA WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                <div id="valAddedLbDiv"></div>
                                                            </td>
                                                        <?php } ?>
                                                        <?php
                                                        $count = 73;
                                                        $fieldName = 'slPrValueAddedOp';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $valAddedOption = $label_field_content;
                                                        if ($valAddedOption == 'byAmount') {
                                                            ?>
                                                            <?php
                                                            $count = 35;
                                                            $fieldName = 'valAddedAmtLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('valAddedAmtLbDiv', '<?php echo $count; ?>', 'YES', 'VAL ADD', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-110');"><?php echo $label_field_content; ?></div>
                                                                <div id="valAddedAmtLbDiv"></div>
                                                            </td>
                                                        <?php } ?>
                                                        <?php
                                                        if ($panelName != 'customizedEstiInvInvoice') {
                                                            $count = 97;
                                                            $fieldName = 'cgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor">
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('cgstLb', '<?php echo $count; ?>', 'YES', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-130');"><?php echo $label_field_content; ?></div>
                                                                            <div id="cgstLb"></div>
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END CGST-->
                                                            <!--START SGST-->
                                                            <?php
                                                            $count = 99;
                                                            $fieldName = 'sgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor" >
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('sgstLb', '<?php echo $count; ?>', 'YES', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-180');"><?php echo $label_field_content; ?></div>
                                                                            <div id="sgstLb"></div>

                                                                        </td>
                                                                    </tr>   
                                                                    <tr> 
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END SGST-->
                                                            <!--START IGST-->
                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'igstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor">
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('igstLb', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');"><?php echo $label_field_content; ?></div>
                                                                            <div id="igstLb"></div>

                                                                        </td>
                                                                    </tr>   
                                                                    <tr> 
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END IGST-->
                                                            <?php
                                                        }
                                                        $count = 36;
                                                        $fieldName = 'amtLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('amtLbDiv', '<?php echo $count; ?>', 'YES', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-270');"><?php echo $label_field_content; ?></div>
                                                            <div id="amtLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        if ($panelName != 'customizedEstiInvInvoice') {
                                                            $count = 97;
                                                            $fieldName = 'totcgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor">
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('totcgstLb', '<?php echo $count; ?>', 'YES', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                            <div id="totcgstLb"></div>
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>

                                                            <?php
                                                            $count = 99;
                                                            $fieldName = 'totsgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >

                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor" >
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('totsgstLb', '<?php echo $count; ?>', 'YES', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                            <div id="totsgstLb"></div>

                                                                        </td>
                                                                    </tr>   
                                                                    <tr> 
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri cursor fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>


                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'totigstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >

                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor">
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('totigstLb', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                            <div id="totigstLb"></div>

                                                                        </td>
                                                                    </tr>   
                                                                    <tr> 
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>


                                                            <?php
                                                            $count = 101;
                                                            $fieldName = 'totgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_font_size == 0) {
                                                                $label_field_font_size = 14;
                                                            }
                                                            ?>
                                                            <td align="center" class="ff_calibri fs_11 border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" colspan="2" >

                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">   
                                                                    <tr> 
                                                                        <td colspan="2" class="cursor">
                                                                            <div class="suppHomeMargin" onClick="openSellReturnFormDiv('totgstLb', '<?php echo $count; ?>', 'YES', 'GST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_content; ?></div>
                                                                            <div id="totgstLb"></div>

                                                                        </td>
                                                                    </tr>   
                                                                    <tr> 
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            RATE
                                                                        </td>
                                                                        <td align="center" width = "50%" class="ff_calibri fs_11 cursor border-color-grey-rbu font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                            AMT
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>

                                                            <?php
                                                        }
                                                        $count = 36;
                                                        $fieldName = 'totalmkgbfdiscLB';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('totalmkgbfdiscLBDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-270');"><?php echo $label_field_content; ?></div>
                                                            <div id="totalmkgbfdiscLBDiv"></div>
                                                        </td>


                                                        <?php
                                                        $count = 36;
                                                        $fieldName = 'discountchargeLB';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('discountchargeLBDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-270');"><?php echo $label_field_content; ?></div>
                                                            <div id="discountchargeLBDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 36;
                                                        $fieldName = 'QTYLB';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//                            $s = "SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
//                            echo '$s'.$s;
                                                        if ($label_field_font_size == 0) {
                                                            $label_field_font_size = 14;
                                                        }
                                                        ?>
                                                        <?php // echo '$label_field_content'.$label_field_content; ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px;padding:5px;width:5%;">
                                                            <div onClick="openSellReturnFormDiv('QTYLBDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-270');"><?php echo $label_field_content; ?></div>
                                                            <div id="QTYLBDiv"></div>
                                                        </td>
                                                    </tr>
                                                    <!---END---->
                                                    <?php /* second row ended for label */ ?>
                                                    <tr>
                                                        <!--START CODE FOR OTHER CHARGES:AUTHOR @DARSHANA 22 JULY 2021-->
                                                        <?php
                                                        $count = 336;
                                                        $fieldName = 'othChrg';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_font_size = '14';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 6px;">
                                                            <div onClick="openSellReturnFormDiv('othChrgDiv', '<?php echo $count; ?>', 'NO', 'OTHER CH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                500
                                                            </div>
                                                            <div id="othChrgDiv"></div> 
                                                        </td>
                                                        <!--END CODE FOR OTHER CHARGES:AUTHOR @DARSHANA 22 JULY 2021-->                                                     
                                                        <?php
                                                        $count = 286;
                                                        $fieldName = 'total_valwithmkg';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('total_valwithmkgDiv', '<?php echo $count; ?>', 'NO', 'TOTAL VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-88');">
                                                                32000
                                                            </div>
                                                            <div id="total_valwithmkgDiv"></div> 
                                                        </td>
                                                        <!--Start code to add Crystal Value on invoice Author:DIKSHA 04APRIL2019-->
                                                        <?php
                                                        $count = 286;
                                                        $fieldName = 'totalCrystal';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('totalCrystalDiv', '<?php echo $count; ?>', 'NO', 'CRYSTAL VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                30000
                                                            </div>
                                                            <div id="totalCrystalDiv"></div> 
                                                        </td>
                                                        <!--End code to add Crystal Value on invoice Author:DIKSHA 04APRIL2019-->
                                                        <?php
                                                        $count = 46;
                                                        $fieldName = 'taxPercentage';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('taxPercentage', '<?php echo $count; ?>', 'NO', 'TAX %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                3%
                                                            </div>
                                                            <div id="taxPercentage"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 46;
                                                        $fieldName = 'tax';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('taxDiv', '<?php echo $count; ?>', 'NO', 'TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                1405
                                                            </div>
                                                            <div id="taxDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 46;
                                                        $fieldName = 'vat';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('vatDiv', '<?php echo $count; ?>', 'NO', 'VAT(%)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                10
                                                            </div>
                                                            <div id="vatDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 46;
                                                        $fieldName = 'vatAmt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('vatAmtDiv', '<?php echo $count; ?>', 'NO', 'VAT AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                100
                                                            </div>
                                                            <div id="vatAmtDiv"></div> 
                                                        </td>
                                                        <?php
                                                        $count = 73;
                                                        $fieldName = 'slPrValueAddedOp';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));

                                                        $valAddedOption = $label_field_content;

                                                        $count = 42;
                                                        $fieldName = 'valAdded';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($valAddedOption == 'byAmount') {
                                                            ?>
                                                            <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('valAddedDiv', '<?php echo $count; ?>', 'NO', 'VA WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                    12%
                                                                </div>
                                                                <div id="valAddedDiv"></div> 
                                                            </td>
                                                        <?php } ?>
                                                        <?php
                                                        $count = 73;
                                                        $fieldName = 'slPrValueAddedOp';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        $valAddedOption = $label_field_content;

                                                        $count = 47;
                                                        $fieldName = 'valAddedAmt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($valAddedOption == 'byAmount') {
                                                            ?>
                                                            <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;" >
                                                                <div onClick="openSellReturnFormDiv('valAddedAmtDiv', '<?php echo $count; ?>', 'NO', 'VAL ADD', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                    2800
                                                                </div>
                                                                <div id="valAddedAmtDiv"></div> 
                                                            </td>
                                                        <?php } ?>
                                                        <!--START CGST VALUES-->
                                                        <?php
                                                        if ($panelName != 'customizedEstiInvInvoice') {
                                                            $count = 98;
                                                            $fieldName = 'cgstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('cgstDiv', '<?php echo $count; ?>', 'NO', 'C %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-120');">
                                                                                1.5 %
                                                                            </div>
                                                                            <div id="cgstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor">
                                                                            <div onClick="openSellReturnFormDiv('cgstDiv', '<?php echo $count; ?>', 'NO', 'CGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-120');">
                                                                                1000
                                                                            </div>
                                                                            <div id="cgstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END CGST VALUES-->
                                                            <!--START SGST VALUES-->
                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'sgstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('sgstDiv', '<?php echo $count; ?>', 'NO', 'S %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-160');">
                                                                                1.5 %
                                                                            </div>
                                                                            <div id="sgstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor">
                                                                            <div onClick="openSellReturnFormDiv('sgstDiv', '<?php echo $count; ?>', 'NO', 'SGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-160');">
                                                                                1000
                                                                            </div>
                                                                            <div id="sgstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END SGST VALUES-->
                                                            <!--START IGST VALUES-->
                                                            <?php
                                                            $count = 102;
                                                            $fieldName = 'igstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('igstDiv', '<?php echo $count; ?>', 'NO', 'I %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');">
                                                                                1.5 %
                                                                            </div>
                                                                            <div id="igstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor" >
                                                                            <div onClick="openSellReturnFormDiv('igstDiv', '<?php echo $count; ?>', 'NO', 'IGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-220');">
                                                                                1000
                                                                            </div>
                                                                            <div id="igstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>
                                                            <!--END IGST VALUES-->
                                                            <?php
                                                        }
                                                        $count = 48;
                                                        $fieldName = 'amt';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        $label_field_content = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" style="font-size:<?php echo $label_field_font_size; ?>px"  valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('amtDiv', '<?php echo $count; ?>', 'NO', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-240');">
                                                                32445.00
                                                            </div>
                                                            <div id="amtDiv"></div> 
                                                        </td>

                                                        <?php
                                                        if ($panelName != 'customizedEstiInvInvoice') {
                                                            $count = 98;
                                                            $fieldName = 'totcgstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            $checktotgstcnt = "select label_field_name from labels where label_field_name ='totcgstAmt'";
                                                            $totgstcnt = mysqli_query($conn, $checktotgstcnt);
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('totcgstDiv', '<?php echo $count; ?>', 'NO', 'C %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                3 %
                                                                            </div>
                                                                            <div id="totcgstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor">
                                                                            <div onClick="openSellReturnFormDiv('totcgstDiv', '<?php echo $count; ?>', 'NO', ' TOTAL CGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                1000
                                                                            </div>
                                                                            <div id="totcgstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>

                                                            <?php
                                                            $count = 100;
                                                            $fieldName = 'totsgstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('totsgstDiv', '<?php echo $count; ?>', 'NO', 'S %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                3 %
                                                                            </div>
                                                                            <div id="totsgstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor">
                                                                            <div onClick="openSellReturnFormDiv('totsgstDiv', '<?php echo $count; ?>', 'NO', 'TOTAL SGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                1000
                                                                            </div>
                                                                            <div id="totsgstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>


                                                            <?php
                                                            $count = 102;
                                                            $fieldName = 'totigstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('totigstDiv', '<?php echo $count; ?>', 'NO', 'I %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                3 %
                                                                            </div>
                                                                            <div id="totigstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor" >
                                                                            <div onClick="openSellReturnFormDiv('totigstDiv', '<?php echo $count; ?>', 'NO', 'IGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                1000
                                                                            </div>
                                                                            <div id="totigstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>


                                                            <?php
                                                            $count = 102;
                                                            $fieldName = 'totgstAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            $label_field_content = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb" colspan="2">
                                                                <table border="0" cellspacing="0" cellpadding="0">   
                                                                    <tr> 
                                                                        <td align="right" class="fs_12 fw_n ff_calibri cursor border-color-grey-r" >
                                                                            <div onClick="openSellReturnFormDiv('totgstDiv', '<?php echo $count; ?>', 'NO', 'I %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                6 %
                                                                            </div>
                                                                            <div id="totgstDiv"></div> 
                                                                        </td>
                                                                        <td align="right" class="cursor" >
                                                                            <div onClick="openSellReturnFormDiv('totgstDiv', '<?php echo $count; ?>', 'NO', 'IGST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                                1000
                                                                            </div>
                                                                            <div id="totgstDiv"></div> 
                                                                        </td>
                                                                    </tr>
                                                                </table>  
                                                            </td>

                                                            <?php
                                                        }
                                                        $count = 45;
                                                        $fieldName = 'totalmkgbfdisc';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('totalmkgbfdiscDiv', '<?php echo $count; ?>', 'NO', 'Discount', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                (V) 3200.00
                                                                (M) 2000.00
                                                            </div>
                                                            <div id="totalmkgbfdiscDiv"></div> 
                                                        </td>
                                                        <td align="center" class="fs_12 fw_n ff_calibri  border-color-grey-rb">
                                                            <table border="0" cellspacing="0" cellpadding="0">   
                                                                <tr> 
                                                                    <?php
                                                                    $count = 45;
                                                                    $fieldName = 'discountchargePer';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('discountchargePerDiv', '<?php echo $count; ?>', 'NO', 'DiscountPer', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            (V)3% 
                                                                            (M)2% 
                                                                        </div>
                                                                        <div id="discountchargePerDiv"></div> 
                                                                    </td>
                                                                    <?php
                                                                    $count = 45;
                                                                    $fieldName = 'discountchargeAmt';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                    <td align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div onClick="openSellReturnFormDiv('discountchargeAmtDiv', '<?php echo $count; ?>', 'NO', 'DiscountAmt', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                            200.00
                                                                            100.00
                                                                        </div>
                                                                        <div id="discountchargeAmtDiv"></div> 
                                                                    </td>

                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <?php
                                                        $count = 45;
                                                        $fieldName = 'QTY';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  paddingRight5" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px; width:5%;">
                                                            <div onClick="openSellReturnFormDiv('QTYDiv', '<?php echo $count; ?>', 'NO', 'QTY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                                                1
                                                            </div>
                                                            <div id="QTYDiv"></div> 
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="25">
                                        <div class="tableCusto" style="max-width:100%;overflow-x:auto;margin-bottom:5px;">
                                            <table width="100%" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #c1c1c1;">
                                                <tr class="bc_color_darkblue" height="20px" 
                                                    style="font-weight:600;background-color: #<?php echo $bcColor; ?>">
                                                    <!--START code for Total V/A   @AUTHOR:SIMRAN-29APR2021 -->
                                                    <?php
                                                    /* Added Code by suraj for making chaatge Option */
                                                    $count = 67;
                                                    $fieldName = 'mkg_lb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" width="5%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>  border-color-grey-b border-color-grey-top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('mkg_lbDiv', '<?php echo $count; ?>', 'YES', 'Making Charges', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-20');"><?php echo $label_field_content; ?></div>
                                                        <div id="mkg_lbDiv"></div>
                                                    </td>
                                                    <!--START CODE FOR MKG AFTER DISCOUNT IN % AND GM : AUTHOR @DARSHANA 30 JULY 2021-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'mkgAfterDisPerLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('mkgAfterDisPerLbDiv', '<?php echo $count; ?>', 'YES', 'MKG(%) AFTER DIS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'MKG(%) AFTER DIS';
                                                                 ?>
                                                        </div>
                                                        <div id="mkgAfterDisPerLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'mkgAfterDisGmLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('mkgAfterDisGmLbDiv', '<?php echo $count; ?>', 'YES', 'MKG(GM) AFTER DIS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'MKG(GM) AFTER DIS';
                                                                 ?>
                                                        </div>
                                                        <div id="mkgAfterDisGmLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR MKG AFTER DISCOUNT IN % AND GM : AUTHOR @DARSHANA 30 JULY 2021-->   

                                                    <!--  // 
                                                    // 
                                                    // 
                                                    // ************************************************************************************************
                                                    // START TO ADD CODE FOR MKG CHRGS BEFORE DISCOUNT @AUTHOR:SIMRAN-17OCT2022
                                                    // ************************************************************************************************
                                                    //-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'mkgBeforeDisPerLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('mkgBeforeDisPerLbDiv', '<?php echo $count; ?>', 'YES', 'MKG(%) BEFORE DIS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '') {
                                                                     echo $label_field_content;
                                                                 } else {
                                                                     echo 'MKG(%) BEFORE DIS';
                                                                 }
                                                                 ?>
                                                        </div>
                                                        <div id="mkgBeforeDisPerLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'mkgBeforeDisAmtLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('mkgBeforeDisAmtLbDiv', '<?php echo $count; ?>', 'YES', 'MKG AMT BEFORE DIS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'MKG AMT BEFORE DIS';
                                                                 ?>
                                                        </div>
                                                        <div id="mkgBeforeDisAmtLbDiv"></div> 
                                                    </td>
                                                    <!--  // 
                                                  // 
                                                  // 
                                                  // ************************************************************************************************
                                                  // END TO ADD CODE FOR MKG CHRGS BEFORE DISCOUNT @AUTHOR:SIMRAN-17OCT2022
                                                  // ************************************************************************************************
                                                  //-->

                                                    <!--  // 
                                                  // 
                                                  // 
                                                    -->

                                                    <!--  // 
                                                  // 
                                                  // 
                                                  // ************************************************************************************************
                                                  // END TO ADD CODE FOR ST BEFORE DISCOUNT @AUTHOR:SIMRAN-17OCT2022
                                                  // ************************************************************************************************
                                                  //-->
                                                    <?php
// ************************************************************************************************
// START TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************
//
                                                    $label_field_content = '';
                                                    $count = 335;
//
                                                    $fieldName = 'hallmarkingChargesLb';
//
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
//
                                                    parse_str(getTableValues("SELECT label_field_content, label_field_font_size, label_field_font_color, label_field_check "
                                                                    . "FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                                                    . "AND label_field_name = '$fieldName' AND label_type = '$labelType'"));
//
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
//
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " 
                                                        valign="top" 
                                                        style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('hallmarkingChargesLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK CHARGES',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10',
                                                                    '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'HALLMARK CHARGES';
                                                                 ?>
                                                        </div>
                                                        <div id="hallmarkingChargesLbDiv"></div> 
                                                    </td>
                                                    <?php
// 
// ************************************************************************************************
// END TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************
//
                                                    //
                                                    //
                                                    ?>                                        
                                                    <!--START CODE FOR DIAMOND WEIGHT AND VALUATION : AUTHOR @ DARSHANA 24 SEPT 2021-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'diamondWtLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('diamondWtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL DIA. WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'TOTAL DIA. WT';
                                                                 ?>
                                                        </div>
                                                        <div id="diamondWtLbDiv"></div> 
                                                    </td>


                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'diamondValuetionLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:10px;">
                                                        <div onClick="openSellReturnFormDiv('diamondValuetionLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL DIA VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'TOTAL DIA VAL';
                                                                 ?>
                                                        </div>
                                                        <div id="diamondValuetionLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR DIAMOND WEIGHT AND VALUATION : AUTHOR @ DARSHANA 24 SEPT 2021-->

                                                    <!--START CODE FOR SIZE CUSTOMIZATION : AUTHOR @DARSHANA 26 OCT 2021-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'itemSizeLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:10px;">
                                                        <div onClick="openSellReturnFormDiv('itemSizeLbDiv', '<?php echo $count; ?>', 'YES', 'SIZE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'SIZE';
                                                                 ?>
                                                        </div>
                                                        <div id="itemSizeLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR SIZE CUSTOMIZATION : AUTHOR @DARSHANA 26 OCT 2021-->
                                                    <!--START CODE FOR FIXED MRP : AUTHOR @DARSHANA 18 APRIL 2022-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'itemFixedMrpPriceLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:10px;">
                                                        <div onClick="openSellReturnFormDiv('itemFixedMrpPriceLbDiv', '<?php echo $count; ?>', 'YES', 'MRP', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'MRP';
                                                                 ?>
                                                        </div>
                                                        <div id="itemFixedMrpPriceLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR FIXED MRP : AUTHOR @DARSHANA 18 APRIL 2022-->
                                                    <!--START CODE FOR COMBINE GST % AND AMOUNT : AUTHOR @DARSHANA 27 APRIL 2022-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'itemCombineGstPerLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:10px;">
                                                        <div onClick="openSellReturnFormDiv('itemCombineGstPerLbDiv', '<?php echo $count; ?>', 'YES', 'GST %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'GST %';
                                                                 ?>
                                                        </div>
                                                        <div id="itemCombineGstPerLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'itemCombineGstAmountLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:10px;">
                                                        <div onClick="openSellReturnFormDiv('itemCombineGstAmountLbDiv', '<?php echo $count; ?>', 'YES', 'GST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'GST AMT';
                                                                 ?>
                                                        </div>
                                                        <div id="itemCombineGstAmountLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR COMBINE GST % AND AMOUNT : AUTHOR @DARSHANA 27 APRIL 2022-->                                                
                                                    <!--
                                                    // ************************************************************************************************
                                                  // START TO ADD CODE FOR ST DISCOUNT @AUTHOR:SIMRAN-17OCT2022
                                                  // ************************************************************************************************
                                                  //-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stDisPerLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('stDisPerLbDiv', '<?php echo $count; ?>', 'YES', 'ST DIS(%)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '') {
                                                                     echo $label_field_content;
                                                                 } else {
                                                                     echo 'ST DIS(%)';
                                                                 }
                                                                 ?>
                                                        </div>
                                                        <div id="stDisPerLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stDisAmtLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                        <div onClick="openSellReturnFormDiv('stDisAmtLbDiv', '<?php echo $count; ?>', 'YES', 'ST DIS(AMT)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST DIS(AMT)';
                                                                 ?>
                                                        </div>
                                                        <div id="stDisAmtLbDiv"></div> 
                                                    </td>
                                                    <!--START CODE FOR ST COLOR AND CLARITY : AUTHOR @SIMRAN-19SEPT2022-->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stcolorLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stcolorLbDiv', '<?php echo $count; ?>', 'YES', 'ST COLOR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST COLOR';
                                                                 ?>
                                                        </div>
                                                        <div id="stcolorLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stClarityLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stClarityLbDiv', '<?php echo $count; ?>', 'YES', 'ST CLARITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST CLARITY';
                                                                 ?>
                                                        </div>
                                                        <div id="stClarityLbDiv"></div> 
                                                    </td>
                                                    <!--END CODE FOR ST COLOR AND CLARITY : AUTHOR @SIMRAN-19SEPT2022--> 
                                                    <!-----------------CHANGE MADE FOR ADDING STONE QUANTITY AND RATE @RENUKA------------------------->
                                                    <!----------------------Start code for stone quantity---------------------------------------->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stQuantity';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stQuantityLbDiv', '<?php echo $count; ?>', 'YES', 'ST QUANTITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST QUANTITY';
                                                                 ?>
                                                        </div>
                                                        <div id="stQuantityLbDiv"></div> 
                                                    </td>
                                                    <!----------------------end code for stone quantity---------------------------------------->
                                                    <!----------------------Start code for Stone Rate---------------------------------------->
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stRate';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stRateLbDiv', '<?php echo $count; ?>', 'YES', 'ST RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST RATE';
                                                                 ?>
                                                        </div>
                                                        <div id="stRateLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'diaWtLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('diaWtLbDiv', '<?php echo $count; ?>', 'YES', 'DIA WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'DIA WT';
                                                                 ?>
                                                        </div>
                                                        <div id="diaWtLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'diaRateLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('diaRateLbDiv', '<?php echo $count; ?>', 'YES', 'DIA RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'DIA RATE';
                                                                 ?>
                                                        </div>
                                                        <div id="diaRateLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stoneWtLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stoneWtLbDiv', '<?php echo $count; ?>', 'YES', 'ST WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'DIA WT';
                                                                 ?>
                                                        </div>
                                                        <div id="stoneWtLbDiv"></div> 
                                                    </td>
                                                    <?php
                                                    $label_field_content = '';
                                                    $count = 335;
                                                    $fieldName = 'stoneRateLb';
                                                    $label_field_font_size = 14;
                                                    $label_field_font_color = 'black';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == 0) {
                                                        $label_field_font_size = 14;
                                                    }
                                                    ?>
                                                    <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding:15px;">
                                                        <div onClick="openSellReturnFormDiv('stoneRateLbDiv', '<?php echo $count; ?>', 'YES', 'ST RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '27', '-80');">
                                                                 <?php
                                                                 if ($label_field_content != '')
                                                                     echo $label_field_content;
                                                                 else
                                                                     echo 'ST RATE';
                                                                 ?>
                                                        </div>
                                                        <div id="stoneRateLbDiv"></div> 
                                                    </td>
                                                    <!----------------------end code for Stone Rate---------------------------------------->
                                                </tr>


                                                <tr><!-------Start code to customize options @Author:ASHWINI 08/07/2020---------->
                                                    <td valign="middle"colspan="25" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <table width="100%" border="0" align="center" style="border:1px solid #c1c1c1;border-top:0;">
                                                            <tr>                                               
                                                                <!-- START CODE TO ADD OPTION FOR TOTAL V/A @AUTHOR:SIMRAN-29APR2021 -->
                                                                <?php
                                                                $count = 286;
                                                                $fieldName = 'mkg_chrg_val';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" width="5%"  class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" valign="top" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('mkg_chrg_valDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-2');">
                                                                        200
                                                                    </div>
                                                                    <div id="mkg_chrg_valDiv"></div> 
                                                                </td>
                                                                <!--START CODE FOR MAKING AFTER DISCOUNT IN % AND GM OPTION: AUTHOR @DARSHANA 30 JULY 2021-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'mkgAfterDisPer';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;">
                                                                    <div onClick="openSellReturnFormDiv('mkgAfterDisPerDiv', '<?php echo $count; ?>', 'NO', 'MKG(%) AFTER DISC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        10%
                                                                    </div>
                                                                    <div id="mkgAfterDisPerDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'mkgAfterDisGm';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('mkgAfterDisGmDiv', '<?php echo $count; ?>', 'NO', 'MKG(GM) AFTER DISC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        50 GM
                                                                    </div>
                                                                    <div id="mkgAfterDisGmDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR MAKING AFTER DISCOUNT IN % AND GM OPTION: AUTHOR @DARSHANA 30 JULY 2021-->         

                                                                <!--START CODE FOR MAKING BEFORE DISCOUNT IN % AND AMT OPTION: AUTHOR @SIMRAN-20OCT2022-->  
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'mkgBeforeDisPer';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('mkgBeforeDisPerDiv', '<?php echo $count; ?>', 'NO', 'MKG(%) BEFORE DISC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        20%
                                                                    </div>
                                                                    <div id="mkgBeforeDisPerDiv"></div> 
                                                                </td> 

                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'mkgBeforeDisAmt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 18px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('mkgBeforeDisAmtDiv', '<?php echo $count; ?>', 'NO', 'MKG(AMT) BEFORE DISC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        300
                                                                    </div>
                                                                    <div id="mkgBeforeDisAmtDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR MAKING BEFORE DISCOUNT IN % AND AMT OPTION: AUTHOR @SIMRAN-20OCT2022-->                                                  
                                                                <?php
//
//
                                                                //
                                                                // ************************************************************************************************
// START TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************
//
                                                                $count = 336;
//
                                                                $fieldName = 'hallmarkingCharges';
//
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
//
                                                                parse_str(getTableValues("SELECT label_field_content, label_field_font_size, label_field_font_color, label_field_check "
                                                                                . "FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                                                                . "AND label_field_name = '$fieldName' AND label_type = '$labelType'"));
//
                                                                ?>
                                                                <td align="center" 
                                                                    class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " 
                                                                    valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding: 29px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('hallmarkingChargesDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK CHARGES',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10',
                                                                    '<?php echo $labelType; ?>', '6', '-68');">
                                                                        50
                                                                    </div>
                                                                    <div id="hallmarkingChargesDiv"></div> 
                                                                </td>
                                                                <?php// 
// ************************************************************************************************
// END TO ADD CODE FOR HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************//
                                                                //
                                                                //
                                                                ?>                                        
                                                                <!--START CODE FOR DIAMOND WEIGHT AND VALUETION : AUTHOR @ DARSHANA 24 SEPT 2021-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'diamondWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%; padding: 20px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('diamondWtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL DIA WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        50 CT
                                                                    </div>
                                                                    <div id="diamondWtDiv"></div> 
                                                                </td> 


                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'diamondValuetion';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('diamondValuetionDiv', '<?php echo $count; ?>', 'NO', 'TOTAL DIA VAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        5000
                                                                    </div>
                                                                    <div id="diamondValuetionDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR DIAMOND WEIGHT AND VALUETION : AUTHOR @ DARSHANA 24 SEPT 2021-->
                                                                <!--START CODE FOR SIZE CUSTOMIZATION : AUTHOR @DARSHANA 26 OCT 2021-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'itemSize';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('itemSizeDiv', '<?php echo $count; ?>', 'NO', 'SIZE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        10
                                                                    </div>
                                                                    <div id="itemSizeDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR SIZE CUSTOMIZATION : AUTHOR @DARSHANA 26 OCT 2021-->
                                                                <!--START CODE FOR FIXED MRP : AUTHOR @DARSHANA 18 APRIL 2022-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'itemFixedMrpPrice';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('itemFixedMrpPriceDiv', '<?php echo $count; ?>', 'NO', 'MRP', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        10000
                                                                    </div>
                                                                    <div id="itemFixedMrpPriceDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR FIXED MRP : AUTHOR @DARSHANA 18 APRIL 2022-->
                                                                <!--START CODE FOR COMBINE GST % AND AMOUNT : AUTHOR @DARSHANA 27 APRIL 2022-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'itemCombineGstPer';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('itemCombineGstPerDiv', '<?php echo $count; ?>', 'NO', 'GST %', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        3%
                                                                    </div>
                                                                    <div id="itemCombineGstPerDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'itemCombineGstAmt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('itemCombineGstAmtDiv', '<?php echo $count; ?>', 'NO', 'GST AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        3000
                                                                    </div>
                                                                    <div id="itemCombineGstAmtDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR COMBINE GST % AND AMOUNT : AUTHOR @DARSHANA 27 APRIL 2022-->
                                                                <!--START CODE FOR ST % AND AMT OPTION: AUTHOR @SIMRAN-20OCT2022-->  
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stDisPer';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 18px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stDisPerDiv', '<?php echo $count; ?>', 'NO', 'ST DISC(%)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        9%
                                                                    </div>
                                                                    <div id="stDisPerDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stDisAmt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 18px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stDisAmtDiv', '<?php echo $count; ?>', 'NO', 'ST DISC (AMT)', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        280
                                                                    </div>
                                                                    <div id="stDisAmtDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR ST % AND AMT OPTION: AUTHOR @SIMRAN-20OCT2022--> 
                                                                <!--START CODE FOR ST COLOR AND CLARITY : AUTHOR @SIMRAN-19SEPT2022-->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stColor';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stColorDiv', '<?php echo $count; ?>', 'NO', 'ST COLOR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        GH
                                                                    </div>
                                                                    <div id="stColorDiv"></div> 
                                                                </td> 

                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stClarity';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stClarityDiv', '<?php echo $count; ?>', 'NO', 'ST CLARITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        SI
                                                                    </div>
                                                                    <div id="stClarityDiv"></div> 
                                                                </td> 
                                                                <!--END CODE FOR ST COLOR AND CLARITY : AUTHOR @SIMRAN-19SEPT2022-->
                                                                <!--------------START CODE FOR ADDING STONE QUANTITY AND RATE @RENUKA 18OCT2022---------------------->
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stQuantity';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stQuantityDiv', '<?php echo $count; ?>', 'NO', 'ST QUANTITY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        5
                                                                    </div>
                                                                    <div id="stQuantityDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stRate';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stRateDiv', '<?php echo $count; ?>', 'NO', 'ST RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        5000
                                                                    </div>
                                                                    <div id="stRateDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'diaWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('diaWtDiv', '<?php echo $count; ?>', 'NO', 'DIA WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        0.30 CT
                                                                    </div>
                                                                    <div id="diaWtDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'diaRate';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('diaRateDiv', '<?php echo $count; ?>', 'NO', 'DIA RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        3000
                                                                    </div>
                                                                    <div id="diaRateDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stoneWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stoneWtDiv', '<?php echo $count; ?>', 'NO', 'ST WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        0.45 CT
                                                                    </div>
                                                                    <div id="stoneWtDiv"></div> 
                                                                </td> 
                                                                <?php
                                                                $count = 336;
                                                                $fieldName = 'stoneRate';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                $label_field_font_size = '14';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="center" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?> " valign="top" style="font-size:<?php echo $label_field_font_size; ?>px;width:5%;padding: 10px; padding-top: 7px;">
                                                                    <div onClick="openSellReturnFormDiv('stoneRateDiv', '<?php echo $count; ?>', 'NO', 'ST RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10000', '<?php echo $labelType; ?>', '6', '-68');">
                                                                        7000
                                                                    </div>
                                                                    <div id="stoneRateDiv"></div> 
                                                                </td> 
                                                                <!--------------END CODE FOR ADDING STONE QUANTITY AND RATE @RENUKA 18OCT2022---------------------->
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>
                            <!--                    <tr>
                                    <td align="center" colspan="14">
                                        &nbsp;
                                    </td>
                                </tr>-->
                                <!-- start add middle gap Author:GAUR05AUG16-->
                                <tr>
                                <tr>
                                    <?php
//START CODE FOR CUSTOMIZE SETTLED IN : AUTHOR @DARSHANA 8 JAN 2021
                                    $count = 79;
                                    $fieldName = 'settledInv';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center " width="50%" class="frm-lbl-lnk-grey" style="font-size: 14px; cursor: pointer;">
                                        <div onClick="openSellReturnFormDiv('settledInvDiv', '<?php echo $count; ?>', 'NO', 'SETTLED INV', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '');">
                                            SETTLED INV
                                        </div>
                                        <div id="settledInvDiv"></div>   
                                    </td>
                                    <?php
                                    $count = 79;
                                    $fieldName = 'rawMetalRecPaid';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="center" width="50%" class="frm-lbl-lnk-grey" style="font-size: 14px; cursor: pointer;">
                                        <div onClick="openSellReturnFormDiv('rawMetalRecPaidDiv', '<?php echo $count; ?>', 'NO', 'RAW METAL REC/PAID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '727');">
                                            RAW METAL REC/PAID
                                        </div>
                                        <div id="rawMetalRecPaidDiv"></div>   
                                    </td>
                                </tr>
                                <tr><!-------Start code to customize options @Author:ASHWINI 08/07/2020---------->
                                    <td colspan="14" >
                                        <table border="0" cellpadding="0" width="50%" cellspacing="0" align="right" style="margin-top:5px;">
                                            <tr>
                                                <!-----------------------START CODE TO ADD TOTAL METAL LABEL,@AUTHOR:HEMA-10SEP2020---------------->
                                                <?php
                                                $count = 50;
                                                $fieldName = 'totalMetalLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="5%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('totalMetalLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '45', '<?php echo $labelType; ?>', '-60', '36');"><?php
                                                             if ($label_field_content != null || $label_field_content != '') {
                                                                 echo $label_field_content;
                                                             } else {
                                                                 echo 'TOTAL :';
                                                             }
                                                             ?></div>
                                                    <div id="totalMetalLbDiv"></div>
                                                </td>
                                                <!------------------------END CODE TO ADD TOTAL METAL LABEL,@AUTHOR:HEMA-10SEP2020----------------->
                                                <?php
                                                $count = 54;
                                                $fieldName = 'totalQtyLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = 'TOT QTY';
//                                                echo "SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td width="7%" align="right" style="font-weight:600;padding-left: 40px;font-size:<?php echo $label_field_font_size; ?>px;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                    <div onClick="//openSellReturnFormDiv('totalQtyLbDiv', '<?php echo $count; ?>', 'YES', 'TOT QTY', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            //'<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-30', '-160');
                                                         "><?php echo $label_field_content; ?> :
                                                    </div> 
                                                    <div id="totalQtyLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'totalQty';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
//                                                echo "SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'";
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="3%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('totalQtyDiv', '<?php echo $count; ?>', 'NO', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '9', '-250');">&nbsp;2</div>
                                                    <div id="totalQtyDiv"></div>
                                                </td>
                                                <?php
                                                $count = 54;
                                                $fieldName = 'totalGsWtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = 'TOT GS WT';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td width="10%" align="right" style="font-weight:600;padding-left: 2px;font-size:<?php echo $label_field_font_size; ?>px;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                    <div onClick="//openSellReturnFormDiv('totalGsWtLbDiv', '<?php echo $count; ?>', 'YES', 'TOT GS WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            //'<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-30', '60');
                                                         "><?php echo $label_field_content; ?> :
                                                    </div> 
                                                    <div id="totalGsWtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'totalGsWt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="5%" class="font-weight:600;ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('totalGsWtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '4', '-70');">&nbsp;20.0 GM</div>
                                                    <div id="totalGsWtDiv"></div>
                                                </td>
                                                <?php
                                                $count = 54;
                                                $fieldName = 'totalNtwtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = 'TOT FN WT';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td width="10%" align="right" style="font-weight:600;padding-left: 2px; font-size:<?php echo $label_field_font_size; ?>px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                    <div onClick="//openSellReturnFormDiv('totalNtwtLbDiv', '<?php echo $count; ?>', 'YES', 'TOT FN WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                            //'<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-30', '60');
                                                         "><?php echo $label_field_content; ?> :
                                                    </div> 
                                                    <div id="totalNtwtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'totalNtwt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left" width="5%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px; margin-left: 300px">
                                                    <div onClick="openSellReturnFormDiv('totalNtwtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '4', '-90');">&nbsp;18.2 GM</div>
                                                    <div id="totalNtwtDiv"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <?php // <!------End code to customize options @Author:ASHWINI 08/07/2020---------->     ?>
                                    <?php
                                    $count = 79;
                                    $fieldName = 'middleGap';
                                    $label_field_content = '';
                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') {
                                        ?>
                                    <table width="100%" align="center">
                                       <tr>
                                            <td align="right"  class="frm-lbl-lnk-grey" title="Select Here middle gap top !" style="width:100%">
                                                <input id="fieldValue<?php echo $count; ?>" name="fieldValue<?php echo $count; ?>" placeholder="MIDDLE GAP HEIGHT" value="<?php echo $label_field_content; ?>"
                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                       labelsFormCrystal('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');
                                                                   }"
                                                       onblur="labelsFormSellReturn('<?php echo $count; ?>', '<?php echo $labelType; ?>', '<?php echo $fieldName; ?>', this.value, '', '', '', '');" 
                                                       spellcheck="false" type="text"
                                                       onkeypress="javascript:return valKeyPressedForNumNDotNDash(event);"
                                                       class="input_border_grey_center" size="15" maxlength="30" style="width:170px;height:32px;border-radius:3px;border:1px solid #313131;"/>
                                            </td>
                                        </tr>
                                    </table>
                                <?php } ?>
                                </tr>
                                <!--end add middle gap Author:GAUR05AUG16-->
                                <tr>
                                    <td colspan="14" class="paddingRight5" align="right">
                                        <!-- start add middle gap and the padding top  Author:GAUR03AUG16-->
                                        <?php
                                        $fieldName = 'middleGap';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $middleGapVal = $label_field_content;
                                        ?>
                                        <table border="0" cellpadding="2" cellspacing="0" align="right" style="border:1px solid #c1c1c1;width:100%;background: #fff5e3;padding-top:<?php echo $middleGapVal; ?>mm">
                                            <!-- end add middle gap and the padding top  Author:GAUR03AUG16-->
                                            <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                                <tr>
                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'totalLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('totalLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="totalLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'total';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('totalDiv', '<?php echo $count; ?>', 'NO', 'TOTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">32445.00</div>
                                                        <div id="totalDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--Author:AMOL13SEPT2017-->

                                                <tr><!-------Start to change code to add update code for raw metal details @Author:SHRI07AUG15---------->
                                                    <td colspan="6" >
                                                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                                            <tr>
                                                                <?php
                                                                $count = 51;
                                                                $fieldName = 'rawMetalWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left: 14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div  onClick="openSellReturnFormDiv('metalRwGldDiv', '<?php echo $count; ?>', 'YES', 'RAW METAL WEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '14', '-22');">
                                                                              <?php
                                                                              if ($label_field_content != '' && $label_field_content != NULL) {
                                                                                  echo $label_field_content;
                                                                              } else {
                                                                                  echo 'OLD GOLD';
                                                                              }
                                                                              ?> </div>
                                                                    <div id="metalRwGldDiv"></div>
                                                                </td>
                                                                <!--START CODE FOR RAW METAL GS WT : AUTHOR @DARSHANA 21 OCT 2021-->
                                                                <?php
                                                                $count = 51;
                                                                $fieldName = 'rawMetalGsWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left:14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div  onClick="openSellReturnFormDiv('rawMetalGsWtDiv', '<?php echo $count; ?>', 'YES', 'RAW METAL WEIGHT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '12', '-136');"> <?php
                                                                              if ($label_field_content != '' && $label_field_content != NULL) {
                                                                                  echo $label_field_content;
                                                                              } else {
                                                                                  echo 'GS WT';
                                                                              }
                                                                              ?> :&nbsp;5GM</div>
                                                                    <div id="rawMetalGsWtDiv"></div>
                                                                </td>
                                                                <!--START CODE FOR RAW METAL NET WT : AUTHOR @DARSHANA 21 OCT 2021-->
                                                                <?php
                                                                $count = 51;
                                                                $fieldName = 'rawMetalNetWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left: 14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div onClick="openSellReturnFormDiv('rawMetalNetWtDiv', '<?php echo $count; ?>', 'YES', 'RAW NET WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-0', '-20');">NET WT :&nbsp;5GM</div>
                                                                    <div id="rawMetalNetWtDiv"></div>
                                                                </td>
                                                                <!--END CODE FOR RAW METAL NET WT : AUTHOR @DARSHANA 21 OCT 2021-->
                                                                <!--START CODE FOR RAW METAL LESS WT : AUTHOR @DARSHANA 21 OCT 2021-->
                                                                <?php
                                                                $count = 51;
                                                                $fieldName = 'rawMetalLessWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left:14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div onClick="openSellReturnFormDiv('rawMetalLessWtDiv', '<?php echo $count; ?>', 'YES', 'RAW NET WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-0', '-20');">LESS WT :&nbsp;5GM</div>
                                                                    <div id="rawMetalLessWtDiv"></div>
                                                                </td>
                                                                <!--START CODE FOR RAW METAL LESS WT : AUTHOR @DARSHANA 21 OCT 2021-->
                                                                <?php
                                                                $count = 52;
                                                                $fieldName = 'rawMetalTnch';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left: 5px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div onClick="openSellReturnFormDiv('metalRwTnchDiv', '<?php echo $count; ?>', 'YES', 'RAW METAL TUNCH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');"><?php echo $label_field_content; ?> :&nbsp;80%
                                                                    </div> 
                                                                    <div id="metalRwTnchDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 53;
                                                                $fieldName = 'rawMetalFnWt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left:14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div  onClick="openSellReturnFormDiv('metalRwFnDiv', '<?php echo $count; ?>', 'YES', 'RAW METAL FN WT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');"><?php echo $label_field_content; ?> :&nbsp;4GM
                                                                    </div> 
                                                                    <div id="metalRwFnDiv"></div>
                                                                </td>                   
                                                                <?php
                                                                $count = 54;
                                                                $fieldName = 'rawMetalRt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left: 14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div onClick="openSellReturnFormDiv('metalRtDiv', '<?php echo $count; ?>', 'YES', 'METAL RATE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');"><?php echo $label_field_content; ?> :&nbsp;28000
                                                                    </div> 
                                                                    <div id="metalRtDiv"></div>
                                                                </td>
                                                                <!-- Start change for valuation show on invoice(@sujata- 22 mar 2019) -->
                                                                <?php
                                                                $count = 51;
                                                                $fieldName = 'Valuation';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="left" style="padding-left:14px;font-weight:600;" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>">
                                                                    <div  onClick="openSellReturnFormDiv('valuationDiv', '<?php echo $count; ?>', 'YES', 'Valuation', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-300');"><?php echo $label_field_content; ?> :&nbsp;1000</div>
                                                                    <div id="valuationDiv"></div>
                                                                </td>
                                                                <!-- end change for valuation show on invoice(@sujata- 22 mar 2019)-->
                                                                <?php
                                                                $count = 55;
                                                                $fieldName = 'metalRecLb';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="padding-left: 20px;font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                    <div onClick="openSellReturnFormDiv('metalRecLbDiv', '<?php echo $count; ?>', 'YES', 'METAL RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-2');"><?php echo $label_field_content; ?> : </div>
                                                                    <div id="metalRecLbDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 56;
                                                                $fieldName = 'metalRec';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td width="84px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                    <div onClick="openSellReturnFormDiv('metalRecDiv', '<?php echo $count; ?>', 'NO', 'VALUATION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');">11100.00</div>
                                                                    <div id="metalRecDiv"></div>
                                                                </td>
                                                            </tr><!-------End to add update code for raw metal details @Author:SHRI07AUG15---------->
                                                            <tr align="right">
                                                                <?php
                                                                $count = 317;
                                                                $fieldName = 'settleAmtLb';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="padding-left: 20px;font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                    <div onClick="openSellReturnFormDiv('settleAmtLbDiv', '<?php echo $count; ?>', 'YES', 'URD AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '0', '-2');"><?php echo $label_field_content; ?> : </div>
                                                                    <div id="settleAmtLbDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 318;
                                                                $fieldName = 'settleAmt';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td width="84px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                    <div onClick="openSellReturnFormDiv('settleAmtDiv', '<?php echo $count; ?>', 'NO', 'URD AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');">11100.00</div>
                                                                    <div id="settleAmtDiv"></div>
                                                                </td>
                                                            </tr>
                                                            <tr align="right">
                                                                <?php
                                                                $count = 317;
                                                                $fieldName = 'URDInvNoTitleLb';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="padding-left: 20px;font-size:<?php echo $label_field_font_size; ?>px"> 
                                                                    <div onClick="openSellReturnFormDiv('URDInvNoTitleLbDiv', '<?php echo $count; ?>', 'YES', 'URD INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '0', '-2');"><?php echo $label_field_content; ?> : </div>
                                                                    <div id="URDInvNoTitleLbDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 318;
                                                                $fieldName = 'URDInvNoTitle';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td width="84px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                                                    <div onClick="openSellReturnFormDiv('URDInvNoTitleDiv', '<?php echo $count; ?>', 'NO', 'URD INVOICE NO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-310');">11100.00</div>
                                                                    <div id="URDInvNoTitleDiv"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!--START AMOUNT -->
                                                <tr>
                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'amtsLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtsLbDiv', '<?php echo $count; ?>', 'YES', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="amtsLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'amts';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtDiv', '<?php echo $count; ?>', 'NO', 'AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '05', '-250');">4528.00</div>
                                                        <div id="amtDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--END AMOUNT-->

                                                <!--START RECIEVED COURIER CHARGES-->

                                                <tr>
                                                    <?php
                                                    $count = 57;
                                                    $fieldName = 'urdLessLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == '')
                                                        $label_field_font_size = 12;
                                                    if ($label_field_font_color == '')
                                                        $label_field_font_color = 'black';
                                                    ?>
                                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:14px"> 
                                                        <div onClick="openSellReturnFormDiv('urdLessLb', '<?php echo $count; ?>', 'YES', 'URD LESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="urdLessLb"></div>
                                                    </td>
                                                    <?php
                                                    $count = 58;
                                                    $fieldName = 'urdLessAmt';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($label_field_font_size == '')
                                                        $label_field_font_size = 14;
                                                    if ($label_field_font_color == '')
                                                        $label_field_font_color = 'black';
                                                    ?>
                                                    <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('urdLessAmtDiv', '<?php echo $count; ?>', 'NO', 'URD LESS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-25', '-275');">5671.00</div>
                                                        <div id="urdLessAmtDiv"></div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'mkgChrgLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('mkgChrgLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="mkgChrgLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'mkgChrg';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('mkgChrgDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">500.00</div>
                                                        <div id="mkgChrgDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--START CODE FOR OTHER CHARGES : AUTHOR @DARSHANA 22 JULY 2021--> 
                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'othChPayLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('othChPayLbDiv', '<?php echo $count; ?>', 'YES', 'OTHER CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="othChPayLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'othChPay';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('othChPayDiv', '<?php echo $count; ?>', 'NO', 'OTHER CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                        <div id="othChPayDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--END CODE FOR OTHER CHARGES : AUTHOR @DARSHANA 22 JULY 2021--> 

                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'cry_lb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('cry_lbDiv', '<?php echo $count; ?>', 'YES', 'CRYSTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="cry_lbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'cry_val';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('cry_valDiv', '<?php echo $count; ?>', 'NO', 'CRYSTAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">1000.00</div>
                                                        <div id="cry_valDiv"></div>
                                                    </td>
                                                </tr>


                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'discwithouttaxLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('discwithouttaxLbDiv', '<?php echo $count; ?>', 'YES', 'DISC WITHOUT TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="discwithouttaxLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'discwithouttax';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('discwithouttaxDiv', '<?php echo $count; ?>', 'NO', 'DISC WITHOUT TAX', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">1000.00</div>
                                                        <div id="discwithouttaxDiv"></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <tr>
                                                <?php
                                                $count = 49;
                                                $label_field_content = NULL;
                                                $fieldName = 'additionalChrgsLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
//
                                                if ($label_field_content == '' || $label_field_content == NULL) {
                                                    $label_field_content = 'ADDITIONAL CHARGES';
                                                }
//
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:14px">
                                                    <div onClick="openSellReturnFormDiv('additionalChrgsLbDiv', '<?php echo $count; ?>', 'YES', 'ADDITIONAL CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="additionalChrgsLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'additionalChrgs';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:14px">
                                                    <div onClick="openSellReturnFormDiv('additionalChrgsDiv', '<?php echo $count; ?>', 'NO', 'ADDITIONAL CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">1000.00</div>
                                                    <div id="additionalChrgsDiv"></div>
                                                </td>
                                            </tr>                                              
                                            <tr>
                                                <?php
// 
// 
// 
// ************************************************************************************************
// START TO ADD CODE FOR TOTAL HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************
//
                                                $count = 49;
//
                                                $label_field_content = NULL;
                                                $fieldName = 'hallmarkChrgsLb';
//
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
//
                                                parse_str(getTableValues("SELECT label_field_content, label_field_font_size, label_field_font_color, "
                                                                . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' "
                                                                . "AND label_field_name = '$fieldName' AND label_type = '$labelType'"));
//
                                                if ($label_field_content == '' || $label_field_content == NULL) {
                                                    $label_field_content = 'HALLMARK CHARGES';
                                                }
//
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgsLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK CHARGES',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10',
                                                                    '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="hallmarkChrgsLbDiv"></div>
                                                </td>
                                                <?php
//
                                                $count = 50;
//
                                                $fieldName = 'hallmarkChrgs';
//
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
//
                                                parse_str(getTableValues("SELECT label_field_content, label_field_font_size, label_field_font_color, "
                                                                . "label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId'  "
                                                                . "AND label_field_name = '$fieldName' AND label_type = '$labelType'"));
//
                                                ?>
                                                <td  style="border:0px solid;" align="right" width="80px" 
                                                     class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" 
                                                     style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgsDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK CHARGES',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15',
                                                                    '<?php echo $labelType; ?>', '-60', '-250');">50.00</div>
                                                    <div id="hallmarkChrgsDiv"></div>
                                                </td>
                                            </tr>
                                            <?php
// ************************************************************************************************
// END TO ADD CODE FOR TOTAL HALLMARKING CHARGES @AUTHOR:PRIYANKA-10JUNE2022
// ************************************************************************************************
//
                                            $label_field_content = NULL;
//
//
                                            //
                                            ?>
                                            <tr>
                                                <?php
                                                $count = 49;
                                                $fieldName = 'taxableamtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('taxableamtLbDiv', '<?php echo $count; ?>', 'YES', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="taxableamtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 50;
                                                $fieldName = 'taxableamt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('taxableamtDiv', '<?php echo $count; ?>', 'NO', 'TAXABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">1000.00</div>
                                                    <div id="taxableamtDiv"></div>
                                                </td>
                                            </tr>

                                            <?php /* code added by suraj forextra features */ ?>
                                            <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'amtwithmkglb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtwithmkgDivlb', '<?php echo $count; ?>', 'YES', 'Amount With MKG', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="amtwithmkgDivlb"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'amtwithmkg';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtwithmkgDiv', '<?php echo $count; ?>', 'NO', 'Amount With MKG', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">9056.00</div>
                                                        <div id="amtwithmkgDiv"></div>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <?php
                                                    $count = 49;
                                                    $fieldName = 'amtwithmkg_crylb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtwithmkg_cryDivlb', '<?php echo $count; ?>', 'YES', 'Amount With MKG & Cry', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="amtwithmkg_cryDivlb"></div>
                                                    </td>
                                                    <?php
                                                    $count = 50;
                                                    $fieldName = 'amtwithmkg_cry';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td  style="border:0px solid;" align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('amtwithmkg_crydiv', '<?php echo $count; ?>', 'NO', 'Amount With MKG and cry', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">19056.00</div>
                                                        <div id="amtwithmkg_crydiv"></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!--END MKG CHARGES-->
                                            <tr><!-------Start to change code to add update code for raw metal details @Author:SHRI07AUG15---------->
                                                <td colspan="4" >
                                                    <table border="0" cellpadding="0" width="50%" cellspacing="0" align="left">
                                                        <tr>
                                                            <?php
                                                            $count = 319;
                                                            $fieldName = 'jRecCourierChgsAmtLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="50%" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCourierChgsAmtLbDiv', '<?php echo $count; ?>', 'YES', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jRecCourierChgsAmtLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 320;
                                                            $fieldName = 'jRecCourierChgsAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="25%" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCourierChgsAmtDiv', '<?php echo $count; ?>', 'NO', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                <div id="jRecCourierChgsAmtDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--START CODE SHOWING BANK DETAILS IN INVOICE @AUTHOR SWAPNIL21MAR2020-->
                                                        <tr>
                                                            <?php
                                                            $count = 730;
                                                            $fieldName = 'jBankdetcash';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="25%" colspan="0" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jBankdetDiv', '<?php echo $count; ?>', 'NO', 'CASH IN HAND', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '20', '10');">CASH IN HAND</div>
                                                                <div id="jBankdetDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 321;
                                                            $fieldName = 'jRecCashLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="25%" colspan="0"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCashLbDiv', '<?php echo $count; ?>', 'YES', 'CASH RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '20', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jRecCashLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 322;
                                                            $fieldName = 'jRecCash';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCashDiv', '<?php echo $count; ?>', 'NO', 'CASH RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '20', '10');">4528.00</div>
                                                                <div id="jRecCashDiv"></div>
                                                            </td>
                                                            <?php
//
//START CODE FOR CUSTOMIZE CASH NARRATION : AUTHOR @DARSHANA 22 DEC 2021
                                                            $count = 322;
                                                            $fieldName = 'jRecCashNarration';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCashNarrationDiv', '<?php echo $count; ?>', 'NO', 'CASH NARRATION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">CASH NARRATION</div>
                                                                <div id="jRecCashNarrationDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <?php
                                                            $count = 731;
                                                            $fieldName = 'jBankdetcheck';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="100px" colspan="0" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;font-weight:600;">
                                                                <div onClick="openSellReturnFormDiv('jBankdetDiv', '<?php echo $count; ?>', 'NO', 'BANK DETAILS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '10', '10');">BANK NAME</div>
                                                                <div id="jBankdetDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 323;
                                                            $fieldName = 'jRecCheqLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="0"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCheqLbDiv', '<?php echo $count; ?>', 'YES', 'CHEQUE RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jRecCheqLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 324;
                                                            $fieldName = 'jRecCheq';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="0px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCheqDiv', '<?php echo $count; ?>', 'NO', 'CHEQUE RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                <div id="jRecCheqDiv"></div>
                                                            </td>
                                                            <?php
//
//START CODE FOR CUSTOMIZE CHECK NARRATION : AUTHOR @DARSHANA 22 DEC 2021
                                                            $count = 322;
                                                            $fieldName = 'jRecCheckNarration';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCheckNarrationDiv', '<?php echo $count; ?>', 'NO', 'CHECK NARRATION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">CHECK NARRATION</div>
                                                                <div id="jRecCheckNarrationDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 732;
                                                            $fieldName = 'jBankdetcard';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="100px" colspan="0" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jBankdetDiv', '<?php echo $count; ?>', 'NO', 'BANK DETAILS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '10', '10');">BANK NAME</div>
                                                                <div id="jBankdetDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 325;
                                                            $fieldName = 'jRecCardLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="0"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCardLbDiv', '<?php echo $count; ?>', 'YES', 'CARD RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jRecCardLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 326;
                                                            $fieldName = 'jRecCard';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCardDiv', '<?php echo $count; ?>', 'NO', 'CARD RECEIVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                <div id="jRecCardDiv"></div>
                                                            </td>
                                                            <?php
//
//START CODE FOR CUSTOMIZE CARD NARRATION : AUTHOR @DARSHANA 22 DEC 2021
                                                            $count = 322;
                                                            $fieldName = 'jRecCardNarration';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecCardNarrationDiv', '<?php echo $count; ?>', 'NO', 'CARD NARRATION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">CARD NARRATION</div>
                                                                <div id="jRecCardNarrationDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $count = 733;
                                                            $fieldName = 'jBankdetonline';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="100px" colspan="0" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jBankdetDiv', '<?php echo $count; ?>', 'NO', 'BANK DETAILS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '10', '10');">BANK NAME</div>
                                                                <div id="jBankdetDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 327;
                                                            $fieldName = 'jRecOnlinePayLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="0"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecOnlinePayLbDiv', '<?php echo $count; ?>', 'YES', 'ONLINE PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jRecOnlinePayLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 328;
                                                            $fieldName = 'jRecOnlinePay';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecOnlinePayDiv', '<?php echo $count; ?>', 'NO', 'ONLINE PAYMENT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                <div id="jRecOnlinePayDiv"></div>
                                                            </td>
                                                            <?php
//
//START CODE FOR CUSTOMIZE ONLINE NARRATION : AUTHOR @DARSHANA 22 DEC 2021
                                                            $count = 322;
                                                            $fieldName = 'jRecOnlineNarration';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jRecOnlineNarrationDiv', '<?php echo $count; ?>', 'NO', 'ONLINE NARRATION', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">ONLINE NARRATION</div>
                                                                <div id="jRecOnlineNarrationDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--END CODE SHOWING BANK DETAILS IN INVOICE @AUTHOR SWAPNIL21MAR2020-->
                                                        <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                                            <tr>
                                                                <?php
                                                                $count = 330;
                                                                $fieldName = 'jRecDiscLb';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('jRecDiscLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                    <div id="jRecDiscLbDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 331;
                                                                $fieldName = 'jRecDisc';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('jRecDiscDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                    <div id="jRecDiscDiv"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                $count = 330;
                                                                $fieldName = 'jLtPtsLb';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('jLtPtsLbDiv', '<?php echo $count; ?>', 'YES', 'LT POINTS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                    <div id="jLtPtsLbDiv"></div>
                                                                </td>
                                                                <?php
                                                                $count = 331;
                                                                $fieldName = 'jLtPts';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div onClick="openSellReturnFormDiv('jLtPtsDiv', '<?php echo $count; ?>', 'NO', 'LT POINTS', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4528.00</div>
                                                                    <div id="jLtPtsDiv"></div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        <!--///-->

                                                        <!--////-->
                                                        <tr>
                                                            <?php
                                                            $count = 330;
                                                            $fieldName = 'payInfoLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('payInfoDiv', '<?php echo $count; ?>', 'YES', 'PAYMENT OTH INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="payInfoDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 331;
                                                            $fieldName = 'payInfo';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="100px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('payInfoDiv', '<?php echo $count; ?>', 'NO', 'PATMENT OTH INFO', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">PAY OTHER INFO</div>
                                                                <div id="payInfoDiv"></div>
                                                            </td>
                                                        </tr>
                                                        <!--START CODE FOR URD PURCHASE TOTAL AMOUNT : AUTHOR @DARSHANA 1 MARCH 2022-->
                                                        <tr>
                                                            <?php
                                                            $count = 330;
                                                            $fieldName = 'urdCashtotAmtLB';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            if ($label_field_content == '') {
                                                                $label_field_content = 'URD TOTAL AMOUNT';
                                                            }
                                                            ?>
                                                            <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('urdCashtotAmtLBDiv', '<?php echo $count; ?>', 'YES', 'URD TOTAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="urdCashtotAmtLBDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 331;
                                                            $fieldName = 'urdCashtotAmt';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="100px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('urdCashtotAmtDiv', '<?php echo $count; ?>', 'NO', 'URD TOTAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">1000</div>
                                                                <div id="urdCashtotAmtDiv"></div>
                                                            </td> 
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" width="50%" cellspacing="0" align="right">
                                                        <!-- START CGST -->
                                                        <tr>
                                                            <?php
                                                            if ($panelName == 'customizedEstiInvInvoice') {
                                                                //START CODE FOR MAKE GST LABLE READONLY : AUTHOR @DARSHANA 14 JULY 2021 
                                                                ?>
                                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>CGST : </div>
                                                                    <!--<div id="jCgstLbDiv"></div>-->
                                                                </td>
                                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>4000.00</div>
                                                                    <!--<div id="jCgstDiv"></div>-->
                                                                </td>
                                                            </tr>
                                                            <!--END CGST -->
                                                            <!-- START SGST -->
                                                            <tr>
                                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>SGST : </div>
                                                                    <!--<div id="jSgstLbDiv"></div>-->
                                                                </td>
                                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>4000.00</div>
                                                                    <!--<div id="jSgstDiv"></div>-->
                                                                </td>
                                                            </tr>
                                                            <!--END SGST -->
                                                            <!-- START IGST -->
                                                            <tr> 
                                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>IGST : </div>
                                                                    <!--<div id="jIgstLbDiv"></div>-->
                                                                </td>
                                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                    <div>4000.00</div>
                                                                    <!--<div id="jIgstDiv"></div>-->
                                                                </td>
                                                            </tr>
                                                            <!--END IGST -->
                                                            <!-- START MKG CHRG CGST -->
                                                            <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>MAKING CHRG CGST : </div>
                                                                        <!--<div id="jMkgChrgCgstLbDiv"></div>-->
                                                                    </td>
                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>300.00</div>
                                                                        <!--<div id="jMkgChrgCgstDiv"></div>-->
                                                                    </td>
                                                                </tr>
                                                                <!--END MKG CHRG CGST -->
                                                                <!-- START MKG CHRG CGST -->
                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>MAKING CHRG SGST : </div>
                                                                        <!--<div id="jMkgChrgSgstLbDiv"></div>-->
                                                                    </td>

                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>300.00</div>
                                                                        <!--<div id="jMkgChrgSgstDiv"></div>-->
                                                                    </td>
                                                                </tr>
                                                                <!--END MKG CHRG CGST -->
                                                                <!-- START MKG CHRG IGST -->
                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>MAKING CHRG IGST : </div>
                                                                        <!--<div id="jMkgChrgIgstLbDiv"></div>-->
                                                                    </td>
                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>300.00</div>
                                                                        <div id="jMkgChrgIgstDiv"></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>TOT MKG+CGST : </div>
                                                                        <!--<div id="jtotmkgCgstLbDiv"></div>-->
                                                                    </td>
                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>4000.00</div>
                                                                        <!--<div id="jtotmkgCgst"></div>-->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>TOT MKG+SGST : </div>
                                                                        <!--<div id="jtotmkgSgstLbDiv"></div>-->
                                                                    </td>
                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>4000.00</div>
                                                                        <!--<div id="jtotmkgSgstDiv"></div>-->
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>TOT MKG+IGST : </div>
                                                                        <div id="jtotmkgIgstLbDiv"></div>
                                                                    </td>
                                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                        <div>4000.00</div>
                                                                        <div id="jtotmkgIgstDiv"></div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            $count = 292;
                                                            $fieldName = 'jCgstLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jCgstLbDiv', '<?php echo $count; ?>', 'YES', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                                <div id="jCgstLbDiv"></div>
                                                            </td>
                                                            <?php
                                                            $count = 293;
                                                            $fieldName = 'jCgst';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                                <div onClick="openSellReturnFormDiv('jCgstDiv', '<?php echo $count; ?>', 'NO', 'CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                                <div id="jCgstDiv"></div>
                                                            </td>
                                                </tr>
                                                <!--END CGST -->
                                                <!-- START SGST -->
                                                <tr>
                                                    <?php
                                                    $count = 294;
                                                    $fieldName = 'jSgstLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jSgstLbDiv', '<?php echo $count; ?>', 'YES', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="jSgstLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 295;
                                                    $fieldName = 'jSgst';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jSgstDiv', '<?php echo $count; ?>', 'NO', 'SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                        <div id="jSgstDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--END SGST -->
                                                <!-- START IGST -->
                                                <tr>
                                                    <?php
                                                    $count = 296;
                                                    $fieldName = 'jIgstLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jIgstLbDiv', '<?php echo $count; ?>', 'YES', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="jIgstLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 297;
                                                    $fieldName = 'jIgst';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jIgstDiv', '<?php echo $count; ?>', 'NO', 'IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                        <div id="jIgstDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--END IGST -->
                                                <!--ADDED CODE FOR VAT TOTAL AMT @SIMRAN:22DEC2022-->             
                                                <tr>
                                                    <?php
                                                    $count = 296;
                                                    $fieldName = 'jVatLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jVatLbDiv', '<?php echo $count; ?>', 'YES', 'VAT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                        <div id="jVatLbDiv"></div>
                                                    </td>
                                                    <?php
                                                    $count = 297;
                                                    $fieldName = 'jVat';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                        <div onClick="openSellReturnFormDiv('jVatDiv', '<?php echo $count; ?>', 'NO', 'VAT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                            '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">400.00</div>
                                                        <div id="jVatDiv"></div>
                                                    </td>
                                                </tr>
                                                <!--END CODE FOR VAT TOTAL AMT @SIMRAN:22DEC2022-->  
                                                <!-- START MKG CHRG CGST -->
                                                <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                                    <tr>
                                                        <?php
                                                        $count = 298;
                                                        $fieldName = 'jMkgChrgCgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgCgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jMkgChrgCgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 299;
                                                        $fieldName = 'jMkgChrgCgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgCgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">300.00</div>
                                                            <div id="jMkgChrgCgstDiv"></div>
                                                        </td>
                                                    </tr>
                                                    <!--END MKG CHRG CGST -->
                                                    <!-- START MKG CHRG CGST -->
                                                    <tr>
                                                        <?php
                                                        $count = 300;
                                                        $fieldName = 'jMkgChrgSgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgSgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jMkgChrgSgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 301;
                                                        $fieldName = 'jMkgChrgSgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgSgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">300.00</div>
                                                            <div id="jMkgChrgSgstDiv"></div>
                                                        </td>
                                                    </tr>
                                                    <!--END MKG CHRG CGST -->
                                                    <!-- START MKG CHRG IGST -->
                                                    <tr>
                                                        <?php
                                                        $count = 302;
                                                        $fieldName = 'jMkgChrgIgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgIgstLbDiv', '<?php echo $count; ?>', 'YES', 'MAKING CHRG IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jMkgChrgIgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 303;
                                                        $fieldName = 'jMkgChrgIgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jMkgChrgIgstDiv', '<?php echo $count; ?>', 'NO', 'MAKING CHRG IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">300.00</div>
                                                            <div id="jMkgChrgIgstDiv"></div>
                                                        </td>
                                                    </tr>
                                                    <!--END MKG CHRG IGST -->
                                                    <!-- start Code to Add total GST and MAKING Charge--->

                                                    <tr>
                                                        <?php
                                                        $count = 292;
                                                        $fieldName = 'jtotmkgCgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgCgstLbDiv', '<?php echo $count; ?>', 'YES', 'TOT MKG+CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jtotmkgCgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 293;
                                                        $fieldName = 'jtotmkgCgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgCgst', '<?php echo $count; ?>', 'NO', 'TOT MKG+CGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                            <div id="jtotmkgCgst"></div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <?php
                                                        $count = 292;
                                                        $fieldName = 'jtotmkgSgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgSgstLbDiv', '<?php echo $count; ?>', 'YES', 'TOT MKG+SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jtotmkgSgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 293;
                                                        $fieldName = 'jtotmkgSgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgSgstDiv', '<?php echo $count; ?>', 'NO', 'TOT MKG+SGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                            <div id="jtotmkgSgstDiv"></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <?php
                                                        $count = 292;
                                                        $fieldName = 'jtotmkgIgstLb';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgIgstLbDiv', '<?php echo $count; ?>', 'YES', 'TOT MKG+IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                            <div id="jtotmkgIgstLbDiv"></div>
                                                        </td>
                                                        <?php
                                                        $count = 293;
                                                        $fieldName = 'jtotmkgIgst';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                            <div onClick="openSellReturnFormDiv('jtotmkgIgstDiv', '<?php echo $count; ?>', 'NO', 'TOT MKG+IGST', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">4000.00</div>
                                                            <div id="jtotmkgIgstDiv"></div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
//END CODE FOR MAKE GST LABLE READONLY : AUTHOR @DARSHANA 14 JULY 2021 
                                            ?>

                                            <!-- end code to Add Total GST AND Making Charge-->

                                            <!-- START OTHER CHRG AMT -->
                                            <tr>
                                                <?php
                                                $count = 304;
                                                $fieldName = 'jOtherTaxAmtLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('jOtherTaxAmtLbDiv', '<?php echo $count; ?>', 'YES', 'OTHER TAX AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                                    <div id="jOtherTaxAmtLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 305;
                                                $fieldName = 'jOtherTaxAmt';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('jOtherTaxAmtDiv', '<?php echo $count; ?>', 'NO', 'OTHER TAX AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">98600.00</div>
                                                    <div id="jOtherTaxAmtDiv"></div>
                                                </td>
                                            </tr>
                                            <!--END OTHER CHRG AMT -->

                                            <!------------------------------------------------------------------>
                                            <!-- START CODE FOR HALLMARKING CHARGES CGST @PRIYANKA-14JUNE2022 -->
                                            <!------------------------------------------------------------------>
                                            <!-- START HALLMARK CHRG CGST @PRIYANKA-14JUNE2022 -->
                                            <tr>
                                                <?php
                                                $count = 298;
                                                $fieldName = 'hallmarkChrgCgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgCgstLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK CHRG CGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');">
                                                             <?php
                                                             if ($label_field_content != '')
                                                                 echo $label_field_content;
                                                             else
                                                                 echo 'HALLMARK CHRG CGST';
                                                             ?> : 
                                                    </div>
                                                    <div id="hallmarkChrgCgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 299;
                                                $fieldName = 'hallmarkChrgCgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgCgstDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK CHRG CGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">50.00</div>
                                                    <div id="hallmarkChrgCgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!-- END HALLMARK CHRG CGST @PRIYANKA-14JUNE2022 -->

                                            <!-- START HALLMARK CHRG SGST @PRIYANKA-14JUNE2022 -->
                                            <tr>
                                                <?php
                                                $count = 300;
                                                $fieldName = 'hallmarkChrgSgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgSgstLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK CHRG SGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');">
                                                             <?php
                                                             if ($label_field_content != '')
                                                                 echo $label_field_content;
                                                             else
                                                                 echo 'HALLMARK CHRG SGST';
                                                             ?> :
                                                    </div>
                                                    <div id="hallmarkChrgSgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 301;
                                                $fieldName = 'hallmarkChrgSgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgSgstDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK CHRG SGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">50.00</div>
                                                    <div id="hallmarkChrgSgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!-- END HALLMARK CHRG SGST @PRIYANKA-14JUNE2022 -->

                                            <!-- START HALLMARK CHRG IGST @PRIYANKA-14JUNE2022 -->
                                            <tr>
                                                <?php
                                                $count = 302;
                                                $fieldName = 'hallmarkChrgIgstLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgIgstLbDiv', '<?php echo $count; ?>', 'YES', 'HALLMARK CHRG IGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');">
                                                             <?php
                                                             if ($label_field_content != '')
                                                                 echo $label_field_content;
                                                             else
                                                                 echo 'HALLMARK CHRG IGST';
                                                             ?> :
                                                    </div>
                                                    <div id="hallmarkChrgIgstLbDiv"></div>
                                                </td>
                                                <?php
                                                $count = 303;
                                                $fieldName = 'hallmarkChrgIgst';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                $label_field_content = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                    <div onClick="openSellReturnFormDiv('hallmarkChrgIgstDiv', '<?php echo $count; ?>', 'NO', 'HALLMARK CHRG IGST',
                                                                    '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">50.00</div>
                                                    <div id="hallmarkChrgIgstDiv"></div>
                                                </td>
                                            </tr>
                                            <!-- END HALLMARK CHRG IGST @PRIYANKA-14JUNE2022 -->
                                            <!------------------------------------------------------------------>
                                            <!-- END CODE FOR HALLMARKING CHARGES CGST @PRIYANKA-14JUNE2022   -->
                                            <!------------------------------------------------------------------>
                                        </table>
                                    </td>
                                </tr>
                                <!-- START COURIER CHARGES -->
                                <tr>
                                    <?php
                                    $count = 306;
                                    $fieldName = 'jCourierChgsAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jCourierChgsAmtLbDiv', '<?php echo $count; ?>', 'YES', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="jCourierChgsAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 307;
                                    $fieldName = 'jCourierChgsAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jCourierChgsAmtDiv', '<?php echo $count; ?>', 'NO', 'COURIER CHARGES', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">100.00</div>
                                        <div id="jCourierChgsAmtDiv"></div>
                                    </td>
                                </tr>
                                <!--END COURIER CHARGES -->
                                <!--<--- START CODE TO TOTAL AMT --->
                                <tr>
                                    <?php
                                    $count = 834;
                                    $fieldName = 'jTotalAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jTotalamtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php
                                                 if ($label_field_content == '' || $label_field_content == null) {
                                                     echo 'TOTAL AMT';
                                                 } ELSE {
                                                     echo $label_field_content;
                                                 }
                                                 ?> : </div>
                                        <div id="jTotalamtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 835;
                                    $fieldName = 'jTotalAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jTotalAmtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">10000.00</div>
                                        <div id="jTotalAmtDiv"></div>
                                    </td>
                                </tr>
                                <!--<---- END CODE TO TOTAL AMT --->

                                <!-- START ADVANCED CASH -->
                                <!----START CODE TO ADD OPTION TO SELECT ADVANCED CASH,@SIMRAN:05MAY2023---------->
                                <?php
                                $count = 734;
                                $fieldName = 'jAdvanCashLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('jAdvanCashLbDiv', '<?php echo $count; ?>', 'YES', 'ADVANCED CASH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php
                                             if ($label_field_content == '' || $label_field_content == null) {
                                                 echo 'ADVANCE CASH';
                                             } ELSE {
                                                 echo $label_field_content;
                                             }
                                             ?> : </div>
                                    <div id="jAdvanCashLbDiv"></div>
                                </td>
                                <?php
                                $count = 835;
                                $fieldName = 'jAdvanCash';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('jAdvanCashDiv', '<?php echo $count; ?>', 'NO', 'ADVANCE CASH', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">10000.00</div>
                                    <div id="jAdvanCashDiv"></div>
                                </td>
                                </tr>
                                <!----END CODE TO ADD OPTION TO SELECT ADVANCED CASH,@SIMRAN:05MAY2023---------->
                                <!-- END ADVANCED CASH -->

                                <!-- START TOTAL AMT -->
                                <tr>
                                    <?php
                                    $count = 308;
                                    $fieldName = 'jTotAmtLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jTotAmtLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '210');"><?php echo $label_field_content; ?> : </div>
                                        <div id="jTotAmtLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 309;
                                    $fieldName = 'jTotAmt';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" width="80px" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('jTotAmtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-250');">10000.00</div>
                                        <div id="jTotAmtDiv"></div>
                                    </td>
                                </tr>
                                <!--END TOTAL AMT -->


                                <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                    <tr>
                                        <?php
                                        $count = 57;
                                        $fieldName = 'metalRecAmtLb';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_font_size == '')
                                            $label_field_font_size = 12;
                                        if ($label_field_font_color == '')
                                            $label_field_font_color = 'black';
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                            <div onClick="openSellReturnFormDiv('metalRecAmtLb', '<?php echo $count; ?>', 'YES', 'METAL REC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                            <div id="metalRecAmtLb"></div>
                                        </td>
                                        <?php
                                        $count = 58;
                                        $fieldName = 'metalRecAmt';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_font_size == '')
                                            $label_field_font_size = 14;
                                        if ($label_field_font_color == '')
                                            $label_field_font_color = 'black';
                                        ?>
                                        <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('metalRecAmtDiv', '<?php echo $count; ?>', 'NO', 'METAL REC', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">5671.00</div>
                                            <div id="metalRecAmtDiv"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        $count = 57;
                                        $fieldName = 'netReceivableAmtLb';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_font_size == '')
                                            $label_field_font_size = 14;
                                        if ($label_field_font_color == '')
                                            $label_field_font_color = 'black';
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                            <div onClick="openSellReturnFormDiv('netReceivableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'NET RECEIVABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                                     <?php
                                                     if ($label_field_content != '') {
                                                         echo $label_field_content;
                                                     } else {
                                                         echo 'NET RECEIVABLE AMT';
                                                     }
                                                     ?> : 
                                            </div>
                                            <div id="netReceivableAmtLbDiv"></div>
                                        </td>
                                        <?php
                                        $count = 58;
                                        $fieldName = 'netReceivableAmt';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        $label_field_check = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($label_field_font_size == '')
                                            $label_field_font_size = 14;
                                        if ($label_field_font_color == '')
                                            $label_field_font_color = 'black';
                                        ?>
                                        <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('netReceivableAmtDiv', '<?php echo $count; ?>', 'NO', 'NET RECEIVABLE AMT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">10000.00</div>
                                            <div id="netReceivableAmtDiv"></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <?php
                                    $count = 57;
                                    $fieldName = 'cashPaidLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == '')
                                        $label_field_font_size = 14;
                                    if ($label_field_font_color == '')
                                        $label_field_font_color = 'black';
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"> 
                                        <div onClick="openSellReturnFormDiv('cashPaidLbDiv', '<?php echo $count; ?>', 'YES', 'CASH RECIEVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                        <div id="cashPaidLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 58;
                                    $fieldName = 'cashPaid';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($label_field_font_size == '')
                                        $label_field_font_size = 14;
                                    if ($label_field_font_color == '')
                                        $label_field_font_color = 'black';
                                    ?>
                                    <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('cashPaidDiv', '<?php echo $count; ?>', 'NO', 'CASH RECIEVED', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">5000.00</div>
                                        <div id="cashPaidDiv"></div>
                                    </td>
                                </tr>
                                <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                    <tr>
                                        <?php
                                        $count = 59;
                                        $fieldName = 'discLb';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                            <div onClick="openSellReturnFormDiv('discLbDiv', '<?php echo $count; ?>', 'YES', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                            <div id="discLbDiv"></div>
                                        </td>
                                        <?php
                                        $count = 60;
                                        $fieldName = 'disc';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td width="80px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('discDiv', '<?php echo $count; ?>', 'NO', 'DISCOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">10.00</div>
                                            <div id="discDiv"></div>
                                        </td>
                                    </tr>
                                    <!--START ROUND OFF-->
                                    <tr>
                                        <?php
                                        $count = 310;
                                        $fieldName = 'jRoundOffLb';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                            <div onClick="openSellReturnFormDiv('jRoundOffLbDiv', '<?php echo $count; ?>', 'YES', 'ROUNF OFF', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                            <div id="jRoundOffLbDiv"></div>
                                        </td>
                                        <?php
                                        $count = 311;
                                        $fieldName = 'jRoundOff';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td width="80px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('jRoundOffDiv', '<?php echo $count; ?>', 'NO', 'ROUND OFF', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">0.44</div>
                                            <div id="jRoundOffDiv"></div>
                                        </td>
                                    </tr>
                                    <?php //} ?>
                                    <!--END ROUND OFF-->
                                    <!--START OTHER CHARGE PAYMENT PANEL @Authod : Vinod - 25-may-2023 -->
                                    <tr>
                                        <?php
                                        $count = 310;
                                        $fieldName = 'jotherChargeLb';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        echo parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                            <div onClick="openSellReturnFormDiv('jotherChargeLbDiv', '<?php echo $count; ?>', 'YES', 'OTHER CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                            <div id="jotherChargeLbDiv"></div>
                                        </td>
                                        <?php
                                        $count = 311;
                                        $fieldName = 'jotherCharge';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td width="80px"  align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('jotherChargeDiv', '<?php echo $count; ?>', 'NO', 'OTHER CHARGE', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '-275');">200</div>
                                            <div id="jotherChargeDiv"></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <!--End OTHER CHARGE PAYMENT PANEL @Authod : Vinod - 25-may-2023 -->
                                <tr>
                                    <?php
                                    $count = 61;
                                    $fieldName = 'totalBalLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('totalBalLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalBalLbDiv"></div>
                                    </td>
                                    <?php
                                    $count = 62;
                                    $fieldName = 'totalBal';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openSellReturnFormDiv('totalBalDiv', '<?php echo $count; ?>', 'NO', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">15845.00</div>
                                        <div id="totalBalDiv"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $count = 61;
                                    $fieldName = 'totalFinalAmtRecLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                        <div onClick="openSellReturnFormDiv('totalFinalAmtRecLb', '<?php echo $count; ?>', 'YES', 'Final Total Amt Rec', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                        <div id="totalFinalAmtRecLb"></div>
                                    </td>
                                    <?php
                                    $count = 62;
                                    $fieldName = 'totalFinalAmtRec';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                        <div onClick="openSellReturnFormDiv('totalFinalAmtRecDiv', '<?php echo $count; ?>', 'NO', 'Final Total Amt Rec', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">15845.00</div>
                                        <div id="totalFinalAmtRecDiv"></div>
                                    </td>
                                </tr>
                                <?php if ($labelType != 'RECEIPTINVOICE' && $labelType != 'PAYMENTINVOICE') { ?>
                                    <tr>
                                        <?php
                                        $count = 61;
                                        $fieldName = 'LtPtsLB';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td align="right" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                            <div onClick="openSellReturnFormDiv('LtPtsLBDiv', '<?php echo $count; ?>', 'YES', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                            <div id="LtPtsLBDiv"></div>
                                        </td>
                                        <?php
                                        $count = 62;
                                        $fieldName = 'LtPts';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <td width="80px" align="right" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                            <div onClick="openSellReturnFormDiv('LtPtsDiv', '<?php echo $count; ?>', 'NO', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">15845.00</div>
                                            <div id="LtPtsDiv"></div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                    </td>
                </tr>
                <!--<tr>
                    <td align="center" colspan="14">
                        &nbsp;
                    </td>
                </tr>-->
                <tr>
                    <td colspan="14">
                        <table border="0" cellpadding="0" width="100%" cellspacing="0" class="border-color-grey-top border-color-grey-b margin2pxAll" style="background:#ddf1ff;margin-top:5px;border:1px solid #c1c1c1;">
                            <tr>
                                <?php
                                $count = 313;
                                $fieldName = 'payableAmtLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" colspan="2" width="15%" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('payableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'PAYABLE AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                    <div id="payableAmtLbDiv"></div>
                                </td>
                                <?php
                                $count = 314;
                                $fieldName = 'payableAmt';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="400px" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    <div onClick="openSellReturnFormDiv('payableAmtDiv', '<?php echo $count; ?>', 'NO', 'TOTAL BAL', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">
                                             <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(om_round(15845))) . ' Only/-'; ?>
                                    </div>
                                    <div id="payableAmtDiv"></div>
                                </td>
                                <?php
                                $count = 63;
                                $fieldName = 'finBalLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="400px" align="right"  class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('finBalLbDiv', '<?php echo $count; ?>', 'YES', 'BALANCE LEFT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '2', '60');"><?php echo $label_field_content; ?> : </div>
                                    <div id="finBalLbDiv"></div>
                                </td>
                                <?php
                                $count = 64;
                                $fieldName = 'finBal';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="80px" align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    <div onClick="openSellReturnFormDiv('finBalDiv', '<?php echo $count; ?>', 'NO', 'BALANCE LEFT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-240');">32445.00</div>
                                    <div id="finBalDiv"></div>
                                </td>
                                <!-- START CODE TO ADD CR DR LABEL FOR FINAL AMOUNT ACCORDING TO AMT BALANCE OR AMT DEPOSIT @AUTHOR:MADHUREE-22DEC2020 -->
                                <?php
                                $count = 351;
                                $fieldName = 'finBalCRDR';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="30px" align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    <div onClick="openSellReturnFormDiv('finBalCRDRDiv', '<?php echo $count; ?>', 'NO', 'FINAL AMT CR/DR', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '12', '<?php echo $labelType; ?>', '-60', '-240');">CR</div>
                                    <div id="finBalCRDRDiv"></div>
                                </td>
                                <!-- END CODE TO ADD CR DR LABEL FOR FINAL AMOUNT ACCORDING TO AMT BALANCE OR AMT DEPOSIT @AUTHOR:MADHUREE-22DEC2020 -->
                            </tr>
                            <tr>
                                <?php
                                $count = 313;
                                $fieldName = 'cashPaidInWordsLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('cashPaidInWordsLbDiv', '<?php echo $count; ?>', 'YES', 'TOTAL CASH PAID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');">
                                             <?php
                                             if ($label_field_content != '') {
                                                 echo $label_field_content;
                                             } else {
                                                 echo 'PAID AMOUNT';
                                             }
                                             ?> : 
                                    </div>
                                    <div id="cashPaidInWordsLbDiv"></div>
                                </td>
                                <?php
                                $count = 314;
                                $fieldName = 'cashPaidInWords';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                $label_field_check = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="400px" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    <div onClick="openSellReturnFormDiv('cashPaidInWordsDiv', '<?php echo $count; ?>', 'NO', 'TOTAL CASH PAID', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">
                                             <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(om_round(15845))) . ' Only/-'; ?>
                                    </div>
                                    <div id="cashPaidInWordsDiv"></div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <?php
                                $count = 315;
                                $fieldName = 'finalPayableAmtLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" colspan="2" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('finalPayableAmtLbDiv', '<?php echo $count; ?>', 'YES', 'FIANL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '15', '<?php echo $labelType; ?>', '-60', '180');"><?php echo $label_field_content; ?> : </div>
                                    <div id="finalPayableAmtLbDiv"></div>
                                </td>
                                <?php
                                $count = 316;
                                $fieldName = 'finalPayableAmt';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td width="400px" align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" >
                                    <div onClick="openSellReturnFormDiv('finalPayableAmtDiv', '<?php echo $count; ?>', 'NO', 'FINAL AMOUNT', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-60', '-275');">
                                             <?php echo "$globalCurrency" . ' ' . ucwords(numToWords(om_round(32445))) . ' Only/-'; ?>
                                    </div>
                                    <div id="finalPayableAmtDiv"></div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="14">
                        <?php
                        $fieldName = 'termsTop';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $termsDetTopVal = $label_field_content;
                        ?>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #c1c1c1;border-top:0;margin-top:5px;padding-top:<?php echo $termsDetTopVal; ?>mm">
                            <?php
                            $count = 65;
                            $fieldName = 'tncLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                            $label_field_tncLabelTemp = $label_field_content;
                            $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                            $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
                            ?>
                            <tr>
                                <td colspan="6" align="left" width="150px" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" > 
                                    <div onClick="openSellReturnFormDiv('tncLbDiv', '<?php echo $count; ?>', 'YES', 'Terms and Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '6', '36');"><?php echo $label_field_tncLabelTemp; ?></div>
                                    <div id="tncLbDiv"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                        <?php
                                        $count = 66;
                                        $fieldName = 'tnc';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        $label_field_content = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        $label_field_contentTemp = $label_field_content;

                                        $label_field_content = stripslashes(str_replace('\"', '', $label_field_content));
                                        $label_field_content = stripslashes(str_replace('\'', '', $label_field_content));
                                        $label_field_content = trim(preg_replace('/\s\s+/', '\n', $label_field_content));
// $str = strlen($label_field_content);
// $noOfRows = ceil($str / (860 / $label_field_font_size));
// $height = $noOfRows * ($label_field_font_size + ($label_field_font_size % 10) + 2);
                                        $noOfRows = substr_count($label_field_content, "\n") + 2;
                                        $height = $noOfRows * ($label_field_font_size * 3);
                                        ?>
                                        <tr>
                                            <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                                <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="cursor textarea_1 ff_calibri font_color_<?php echo $label_field_font_color; ?>" rows="<?php echo $noOfRows; ?>"
                                                          onClick="openSellReturnFormDiv('tncDiv', '<?php echo $count; ?>', 'YES', 'Terms & Conditions', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                                          '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '-270', '10');"
                                                          style="text-align:left;width:750px;height:<?php $height ?>px"><?php
                                                              if (($label_field_contentTemp) != '')
                                                                  echo $label_field_contentTemp;
                                                              else
                                                                  echo 'content';
                                                              ?></textarea>                                     
                                                <div id="tncDiv"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="right" class="paddingRight5" valign="middle" width="100%">
                        <table border="0" cellpadding="0" cellspacing="0" align="right" valign="bottom">
                            <tr>
                                <?php
                                $count = 369;
                                $fieldName = 'forNameLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('forNameLbDiv', '<?php echo $count; ?>', 'YES', 'FORNAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '10', '10');">
                                             <?php
                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                 echo 'FOR';
                                             } else {
                                                 echo $label_field_content;
                                             }
                                             ?>
                                        &nbsp;:&nbsp;&nbsp;
                                    </div>
                                    <div id="forNameLbDiv"></div>
                                </td>
                                <?php
                                $count = 370;
                                $fieldName = 'forName';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                if ($label_field_font_size == '' && $label_field_font_size == NULL) {
                                    $label_field_font_size = 14;
                                }
                                ?>
                                <td align="left" class="ff_calibri cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">
                                    <div onClick="openSellReturnFormDiv('forNameDiv', '<?php echo $count; ?>', 'NO', 'FORNAME', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '6', '36');">
                                        GOLD AND SILVER MONEY LENDER SHOP
                                    </div>
                                    <div id="forNameDiv"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="paddingRight5" width="200px" valign="middle">
                        <table border="0" cellpadding="0" cellspacing="0" align="right" width="100%" valign="bottom">
                            <tr>
                                <?php
                                $count = 103;
                                $fieldName = 'authCustSignLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="left" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="125px">
                                    <div onClick="openSellReturnFormDiv('authCustSignLbDiv', '<?php echo $count; ?>', 'NO', 'Customer Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '10', '<?php echo $labelType; ?>', '10', '24');">
                                             <?php
                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                 echo 'Customer Signatory';
                                             } else {
                                                 echo $label_field_content;
                                             }
                                             ?></div>
                                    <div id="authCustSignLbDiv"></div>
                                </td>

                                <?php
                                $count = 67;
                                $fieldName = 'authSignLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="right" class="ff_calibri fw_b cursor font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" width="125px">
                                    <div onClick="openSellReturnFormDiv('authSignLbDiv', '<?php echo $count; ?>', 'YES', 'Authorized Signatory', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '20', '<?php echo $labelType; ?>', '-60', '263');">
                                             <?php
                                             if ($label_field_content == '' || $label_field_content == NULL) {
                                                 echo 'Authorized Signatory';
                                             } else {
                                                 echo $label_field_content;
                                             }
                                             ?></div>
                                    <div id="authSignLbDiv"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <?php
                    $count = 74;
                    $fieldName = 'footer';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-weight:600;font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>">
                        <div onClick="openSellReturnFormDiv('footerLbDiv', '<?php echo $count; ?>', 'YES', 'Thank You For Your Business !', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                        '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '45', '<?php echo $labelType; ?>', '-60', '36');"><?php echo $label_field_content; ?></div>
                        <div id="footerLbDiv"></div>

                    </td>
                </tr>
                <tr style="border-top:1px solid #c1c1c1;">
                    <?php
                    $count = 75;
                    $fieldName = 'footer_ad_img';
                    $label_field_content = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    ?>
                    <td valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" colspan="2">

                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="cursor ff_calibri font_color_<?php echo $label_field_font_color; ?> bold font_color_blue" 
                                    style="font-size:<?php echo $label_field_font_size; ?>px" colspan="<?php echo $colspan; ?>" width="50%">
                                    <br/>
                                    <div onClick="openSellReturnFormDiv('footerAdImgDiv', '<?php echo $count; ?>', 'YES', 'Live Offers!', '<?php echo $fieldName; ?>', '<?php echo $label_field_content; ?>', '<?php echo $label_field_font_size; ?>',
                                                    '<?php echo $label_field_font_color; ?>', '<?php echo $label_field_check; ?>', '45', '<?php echo $labelType; ?>', '-60', '36');"><?php echo 'Click Here to show this ad image (1280X500)'; ?></div>
                                    <div id="footerAdImgDiv"></div>
                                </td>
                                <td align="center" style="height:100px;vertical-align: middle;">
                                    <form name="add_new_inv_image" id="add_new_inv_image"
                                          enctype="multipart/form-data" method="post"
                                          action="<?php echo $documentRootBSlash; ?>/include/php/omimgupload.php">
                                        <input type="hidden" id="imageLoadOptionInv" name="imageLoadOptionInv" />
                                        <input type="hidden" id="compressedImageInv" name="compressedImageInv" />
                                        <input type="hidden" id="compressedImageThumbInv" name="compressedImageThumbInv" />
                                        <input type="hidden" id="compressedImageSizeInv" name="compressedImageSizeInv" />  
                                        <input type="hidden" id="labeltype" name="labeltype" value="<?php echo $labelType;?>" />
                                        <div class="file_button_add_image_div" align="right" style="cursor: pointer;">
                                            <input type="file" id="addImageAutoSub" name="addImageAutoSub" class="file_button_add_image"
                                                   onclick="javascript: document.getElementById('imageLoadOptionInv').value = 'COM';"
                                                   onchange="loadImageFileCompressAutoSub();">
                                            <img id="addCustomerImage" style="height: 64px;width:64px;cursor: pointer;" src="<?php echo $documentRoot; ?>/images/add-image-64.png" alt="COM">
                                        </div>
                                        <input type="hidden" id="fileNameInv" name="fileNameInv" class="lgn-txtfield-without-borderAndBackground" readonly="readonly" />
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <?php parse_str(getTableValues("SELECT image_id AS image_id2, image_user_id, image_user_type FROM image WHERE image_snap_desc = 'SellPurchaseInvAds'")); ?>
                        <?php if ($image_id2 != '') { ?>
                            <img width="100%" src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo $image_id2; ?>" alt=" "  style="width:100%"/>
                        <?php } else { ?>
                            <img width="100%" src="<?php echo $documentRoot; ?>/images/invoice/1280x500xh.png" alt=" " style="width:100%"/>
                        <?php } ?>
                    </td>
                </tr>
            </table>   <!-- End Table from Logo -->
        </div>
        </td>
        </tr>
        </table>
    </div>
</div>

<?php

if($panelName != 'customizedPaymentInvoice' && $panelName != 'customizedReceiveInvoice')
{?>
</div>
 <?php }?>



