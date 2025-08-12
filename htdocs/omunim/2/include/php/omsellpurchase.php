<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Sep 25, 2014 1:09:52 PM
 *
 * @FileName:omsellpurchase.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:06-March-2023
 *  AUTHOR:Vinod Tambe
 *  REASON:Display Sold Out List Item List
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
//
$staffId = $_SESSION['sessionStaffId'];
//
include 'ommpsbac.php';
if ($_SESSION['sessionProdName'] == 'OMRETL') {
    $stockIndicatorType = 'RetailStock';
    $stockLabel = 'STOCK PURCHASE';
    $stockPanelPurCustChrg = 'OTHER';
} else {
    $stockIndicatorType = 'imitation';
    $stockLabel = 'IMITATION STOCK';
    $stockPanelPurCustChrg = 'MKG';
}
//
//
$messDiv = $_GET['messDiv'];
$panelName = $_GET['panelName'];
//
//
if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
    $stockDelete = 'Y';
} else {
    $stockDelete = 'N';
}
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $stock_add_date_col = "STR_TO_DATE(sttr_other_lang_add_date ,'%d-%m-%Y')";
} else {
    $stock_add_date_col = "STR_TO_DATE(sttr_add_date ,'%d %b %Y')";
}
?>
<div id="myModalcustomize"></div>
<input type="hidden" id="stockDelete" name="stockDelete" value="<?php echo $stockDelete; ?>" />
<div id="stockPanelPurchaseList">

    <table align="center" width="100%" valign="top" border="0">
        <tr>
            <td align="left">
                <table width="100%" border="0">
                    <tr>
                        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                            <td valign="top" align="left" width="32px">
                                <div class="analysis_div_rows">
                                    <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt=""/>
                                </div>
                            </td>
                        <?php } ?>
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                    <td valign="top" align="left" >
                        <?php if ($panelName == 'Sell') { ?>
                            <a class="links" onclick="
                            navigationMainBigMiddleImageJewelleryList('Stock', 'retail', 'stock26.png', 'Click here to see stock list')"
                               style="cursor: pointer;" title="Click to refresh current page !">

                            </a>
                            <div class="textLabelHeading">
                                &nbsp; Sold Out Stock List
                            </div>

                        <?php } ?>
                    </td> 
        </tr>
    </table>
</td>
<td align="right">
    <?php
    //
    //
    if ($panelName == '') {
        $panelName = $_POST['panelName'];
    }
    ?>
    <table align="right" border="0" cellspacing="0" cellpadding="0" width="10%">
        <tr>
            <?php
            if ($_SESSION['sessionOwnIndStr'][21] == 'Y' ||
                    $_SESSION['sessionOwnIndStr'][21] == 'B' ||
                    $_SESSION['sessionOwnIndStr'][21] == 'A') {
                if ($_SESSION['sessionOwnIndStr'][20] == 'N')
                    $panelName = 'imitationPurchaseList';
                ?>
                <td style="margin-right: 10px;">  
                    <?php
                    if ($panelName == 'imitationPurchaseList' ||
                            $panelName == 'ImitationList') {
                        ?>
                        <?php
                        $inputId = "layoutButton";
                        $inputType = 'submit';
                        $inputFieldValue = $stockLabel . ' LIST';
                        $inputIdButton = "layoutButton";
                        $inputNameButton = 'layoutButton';
                        $inputTitle = '';
                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                        $inputStyle = " ";
                        $inputLabel = $stockLabel . ' LIST';
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'showImitationStockPanel("ImitationList", "Sell");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';
                        $inputselDropDownCls = '';
                        $inputMainClassButton = '';
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        ?>
                    <?php } else { ?>
                        <?php
                        $inputId = "layoutButton";
                        $inputType = 'submit';
                        $inputFieldValue = $stockLabel . ' LIST';
                        $inputIdButton = "layoutButton";
                        $inputNameButton = 'layoutButton';
                        $inputTitle = '';
                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                        $inputStyle = " ";
                        $inputLabel = $stockLabel . ' LIST';
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'showImitationStockPanel("ImitationList", "Sell");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';
                        $inputselDropDownCls = '';
                        $inputMainClassButton = '';
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        //}
                        ?>
                    </td>    <?php } ?>
                <?php
            } if ($_SESSION['sessionOwnIndStr'][23] == 'Y') {
                if ($_SESSION['sessionOwnIndStr'][20] == 'N')
                    $panelName = 'CrystalList';
                ?>
                <td>
                    <div style="margin-left: 6px;margin-right: 6px;">
                        <?php
                        $inputId = "layoutButton";
                        $inputType = 'submit';
                        $inputFieldValue = 'CRYSTAL STOCK LIST';
                        $inputIdButton = "layoutButton";
                        $inputNameButton = 'layoutButton';
                        $inputTitle = '';
                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                        $inputStyle = " ";
                        $inputLabel = 'CRYSTAL STOCK LIST';
                        //
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'showCystalPurchaseListPanel("CrystalList");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';
                        $inputselDropDownCls = '';
                        $inputMainClassButton = '';
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        ?>
                    </div>
                    <?php
                } if ($_SESSION['sessionOwnIndStr'][21] == 'S' || $_SESSION['sessionOwnIndStr'][21] == 'A') {
                    if ($_SESSION['sessionOwnIndStr'][20] == 'N')
                        $panelName = 'StrelleringSilverList';
                    ?>
                <td>
                    <div style="margin-right: 6px;">
                        <?php
                        $inputId = "layoutButton";
                        $inputType = 'submit';
                        $inputFieldValue = 'Sterling jewellery LIST';
                        $inputIdButton = "layoutButton";
                        $inputNameButton = 'layoutButton';
                        $inputTitle = '';
                        // This is the main class for input flied
                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style_nav;
                        $inputStyle = " ";
                        $inputLabel = 'Sterling jewellery LIST';
                        // This class is for Pencil Icon                                                           
                        $inputIconClass = '';
                        $inputPlaceHolder = '';
                        $spanPlaceHolderClass = '';
                        $spanPlaceHolder = '';
                        $inputOnChange = "";
                        $inputOnClickFun = 'showStrelleringSilverListPanel("StrelleringSilverList");';
                        $inputKeyUpFun = '';
                        $inputDropDownCls = '';
                        $inputselDropDownCls = '';
                        $inputMainClassButton = '';
                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                        ?>
                    </div>
                </td>
<?php } ?>
        </tr>
    </table>
    <?php ?>
</td>
</tr>
</table>
<?php
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
//
include 'omdatatablesUnset.php';
$dataTableColumnsFields = array(
    array('dt' => 'PID'),
    array('dt' => 'DATE'),
    array('dt' => 'FIRM'),
    array('dt' => 'METAL'),
    array('dt' => 'CATEGORY'),
    array('dt' => 'ITEM DET'),
    array('dt' => 'IMAGE'),
    array('dt' => 'QTY'),
    array('dt' => 'GS WT'),
    array('dt' => 'NT WT'),
    array('dt' => 'P.R.'),
    array('dt' => 'RATE'),
    array('dt' => 'WTG'),
    array('dt' => 'FN WT'),
    array('dt' => 'STONE WT'),
    array('dt' => 'STONE'),
    array('dt' => 'MKG'),
    array('dt' => 'VAL'),
    array('dt' => 'TAX'),
    array('dt' => 'TOTAL'),
    array('dt' => 'LOCATION'),
    array('dt' => 'HUID'),
    array('dt' => 'COUNTER'),
    array('dt' => 'BRAND NAME'),
    array('dt' => 'SIZE'),
    array('dt' => 'TYPE'),
    array('dt' => 'STATUS'),
    array('dt' => 'TAG NO'),
    array('dt' => 'DEL'),
    array('dt' => 'OTHER INFO')
);
$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields;
$_SESSION['tableName'] = 'stock_transaction';
$_SESSION['tableNamePK'] = 'sttr_id';
$dbColumnsArray = array(
    "CONCAT(sttr_item_pre_id,COALESCE(sttr_item_id, ''))",
    "$stock_add_date_col",
    "f.firm_name",
    "sttr_metal_type",
    "sttr_item_category",
    "sttr_item_name",
    "sttr_image_id",
    "sttr_quantity",
    "ROUND(sttr_gs_weight,3)",
    "sttr_nt_weight",
    "CONCAT(sttr_purity,' ','%')",
    "sttr_product_purchase_rate",
    "sttr_wastage",
    "sttr_fine_weight",
    "CONCAT(sttr_stone_wt,sttr_stone_wt_type)",
    "sttr_stone_valuation",
    "CONCAT(sttr_making_charges,sttr_making_charges_type)",
    "sttr_valuation",
    "sttr_tax",
    "sttr_final_valuation",
    "sttr_location",
    "sttr_hallmark_uid",
    "sttr_counter_name",
    "sttr_brand_id",
    "sttr_size",
    "sttr_stock_type",
    "sttr_status",
    "CONCAT(sttr_barcode_prefix,sttr_barcode)",
    "sttr_id",
    "sttr_item_other_info"
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;
//
//
if ($panelName == 'Sell' || $panelName == 'AllStock' ||
        $panelName == 'AllWholesaleStock' || $panelName == 'AllTagStock') {
    //
    //
    $_SESSION['dtSumColumn'] = '7,8,9,13,14,17,18';
    $_SESSION['dtDeleteColumn'] = '24';
    $_SESSION['dtASCDESC'] = 'asc,asc';
    //
    $_SESSION['colorfulColumn3'] = "CONCAT(sttr_making_charges,sttr_making_charges_type)";
    $_SESSION['colorfulColumnCheck3'] = 'sttr_mkg_charges_by';
    $_SESSION['colorfulColumnTitle3'] = '';
    $_SESSION['colorfulColumnCheck3Value'] = 'mkgByGrossWt';
    $_SESSION['colorfulColumnCheck3Value1'] = 'mkgByNetWt';
    $_SESSION['colorfulColumnCheck3Value2'] = 'mkgByFineWt';
    //
    $_SESSION['colorfulColumn4'] = "CONCAT(sttr_purity,' ','%')";
    $_SESSION['colorfulColumn41'] = "CONCAT(sttr_purity,' ','%')";
    $_SESSION['colorfulColumn42'] = "CONCAT(sttr_purity,' ','%')";
    $_SESSION['colorfulColumn43'] = "CONCAT(sttr_purity,' ','%')";
    $_SESSION['colorfulColumnCheck4'] = 'sttr_final_valuation_by';
    $_SESSION['colorfulColumnTitle4'] = '';
    $_SESSION['colorfulColumnCheck4Value'] = 'byGrossWt';
    $_SESSION['colorfulColumnCheck4Value1'] = 'byNetWt';
    $_SESSION['colorfulColumnCheck4Value2'] = 'byFFineWt';
    //
    //
}

//start Added Invoice and Update invoice Panel @PRATHAMESH12OCT2023
if ($panelName == 'Sell') {
    //start for invoice
    if ($panelName == 'combineInvList') {
        $_SESSION['popupFunctionLink'] = "ogspcombinvo.php";
    } else {
        $_SESSION['popupFunctionLink'] = "ogspinvo.php";
    }
    //
    $_SESSION['popupColumn'] = "$stock_add_date_col";
    $_SESSION['popupFunctionWidth'] = "850";
    $_SESSION['popupFunctionHeight'] = "850";
    $_SESSION['popupFunctionPara1'] = "sttr_user_id"; // Panel Name
    $_SESSION['popupFunctionPara2'] = "sttr_pre_invoice_no";
    $_SESSION['popupFunctionPara3'] = "sttr_invoice_no";
    $_SESSION['popupFunctionPara4'] = "";
    $_SESSION['popupFunctionPara5'] = "$stock_add_date_col";
    //
    //
    if ($invLay != '' && $invLay != NULL) {
        //
        if ($panelName == 'combineInvList') {
            $_SESSION['popupFunctionPara6'] = "$invLay&labelType=SellPurchase&panelName=$panelName";
        } else {
            $_SESSION['popupFunctionPara6'] = "$invLay&labelType=SellPurchase&customizationOption=$metalValOp";
        }
        //
    } else {
        //
        if ($panelName == 'combineInvList') {
            $_SESSION['popupFunctionPara6'] = "InvLayDefault&panelName=$panelName";
        } else {
            $_SESSION['popupFunctionPara6'] = "InvLayDefault&customizationOption=$metalValOp";
        }
        //
    }
    //End for Invoice
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "f.firm_name"; // On which column
    $_SESSION['onclickColumnId'] = "sttr_user_id";
    $_SESSION['onclickColumnValue'] = "sttr_user_id";
    $_SESSION['onclickColumnFunction'] = "showSellPurchaseItmDet";
    $_SESSION['onclickColumnFunctionPara1'] = "sttr_user_id";
    $_SESSION['onclickColumnFunctionPara2'] = "sttr_pre_invoice_no";
    $_SESSION['onclickColumnFunctionPara3'] = "abc";
    $_SESSION['onclickColumnFunctionPara4'] = "def";
    $_SESSION['onclickColumnFunctionPara5'] = "sttr_invoice_no";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    $_SESSION['onclickColumnFunctionPara7'] = "sttr_utin_id";
}
//end Added Invoice and Update invoice Panel @PRATHAMESH12OCT2023
$_SESSION['sqlQueryColumns'] = "sttr_id,sttr_sttr_id,sttr_stock_type,sttr_mkg_charges_by,sttr_utin_id,sttr_item_code,sttr_final_valuation_by,sttr_image_id,sttr_invoice_no,sttr_pre_invoice_no,sttr_user_id,";
if ($panelName == 'Sell' && ($_SESSION['sessionOwnIndStr'][20] == 'Y' ||
    $_SESSION['sessionOwnIndStr'][20] == 'A')) {
    //
     if ($globalOwnPass == 'PUB3' && $_SESSION['sessionIgenType'] == 'PUB3') {
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_transaction_type='sell' and sttr_indicator!='stockCrystal'  "; //Added sttr_indicator condition Prathamesh11OCT2023
     }else{
          $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_transaction_type IN('sell','ESTIMATESELL') and sttr_indicator!='stockCrystal'  "; //Added sttr_indicator condition Prathamesh11OCT2023
     }
}
$_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id=f.firm_id";
include 'omdatatables.php';
//
//
?>

</div>


