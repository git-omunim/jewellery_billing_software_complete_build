<?php
/*
 * **************************************************************************************
 * @tutorial: ITEM SOLDOUT LIST : AUTHOR @DARSHANA 11 MARCH 2022
 * **************************************************************************************
 * 
 * Created on 11 MAR 2022
 *
 * @FileName: omstkinvsellst.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
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
$staffId = $_SESSION['sessionStaffId'];
$documentRoot = $_SESSION['documentRoot'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'ommpnmwd.php';
require_once 'ommpincr.php';
include_once 'ommpfunc.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//
if ($panelName == '')
    $panelName = $_GET['panel'];
//echo '$panelName'.$panelName;
if ($_SESSION['sessionProdName'] == 'OMRETL') {
    $stockIndicatorType = 'RetailStock';
    $stockMetalType = 'stock';
    $stockLabel = 'STOCK';
} else {
    $stockIndicatorType = 'imitation';
    $stockMetalType = 'imitation';
    $stockLabel = 'IMITATION';
}
//
//print_r( $_SESSION);
if ($panelName == '' && $_SESSION['sessionOwnIndStr'][20] == 'N' && $_SESSION['sessionOwnIndStr'][32] == 'N')
    $panelName = 'soldOutImtInv';
//
//echo 'panelName ===>'.$_SESSION['sessionOwnIndStr'][32].'<br />';
//
if ($staffId != '' && $array['CurrenetmonthAccess'] == 'true') {
    $StartDate = date("Y-m-01");
    $EndDate = date("Y-m-t");
    $sttrDateCondition = "and (STR_TO_DATE(sttr_add_date ,'%d %b %Y') BETWEEN '$StartDate' and '$EndDate')";
    $utinDateCondition = "and (STR_TO_DATE(utin_date ,'%d %b %Y') BETWEEN '$StartDate' and '$EndDate')";
} else {
    $sttrDateCondition = "";
    $utinDateCondition = "";
}
//
// *************************************************************************************************************
// START CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-20MAR2021
// *************************************************************************************************************
//
$selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
$resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
$rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
$TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
//
// *************************************************************************************************************
// END CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-20MAR2021
// *************************************************************************************************************
// 
//START CODE FOR SELL INVOICE CUSTOMIZATION @AUTHOR DARSHANA - 07 APTIL 2021
$selSellInvCustomization = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellInvoiceCustomization'";
$resSellInvCustomization = mysqli_query($conn, $selSellInvCustomization);
$rowSellInvCustomization = mysqli_fetch_array($resSellInvCustomization);
$sellInvCustomization = $rowSellInvCustomization['omly_value'];
if ($sellInvCustomization == 'byMetalValue') {
    $metalValOp = 'byMetalValue';
} else {
    $metalValOp = '';
}
//
// *************************************************************************************************************
// START CODE FOR INVOICE SETTING : AUTHOR @ DARSHANA 15 SEPT 2021
// *************************************************************************************************************
//
$selInvoiceQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellInvLay'";
$resInvoice = mysqli_query($conn, $selInvoiceQuery);
$rowInvoice = mysqli_fetch_array($resInvoice);
$invLay = $rowInvoice['omly_value'];
//
// *************************************************************************************************************
// END CODE FOR INVOICE SETTING : AUTHOR @ DARSHANA 15 SEPT 2021
// *************************************************************************************************************
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
if ($nepaliDateIndicator == 'YES') {
    $utin_date_col = "STR_TO_DATE(utin_other_lang_date,'%d-%m-%Y')";
} else {
    $utin_date_col = "STR_TO_DATE(utin_date,'%d %b %Y')";
}
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
//print_r($_SESSION);
$documentRootPath = $_SESSION['documentRoot'];
//echo '$documentRootPath=='.$documentRootPath.'<br>';
?>
<div id="itemSoldInvoiceDiv">
    <table border="0" cellspacing="0" cellpadding="1" width="100%">
        <tr>
            <td align="left" colspan="14">
                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                    <tr>
                        <td valign="middle" align="left">
                            <div class="main_link_orange">ITEM SOLD INVOICE LIST
                                <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />  
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
    //
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
    //
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
    //
//    include 'omstkitmselinvview.php';
    include 'omdatatablesUnset.php';

    if ($TaxAndGstSettingValue == 'TAX') {
        //
        $dataTableColumnsFields = array(
            array('dt' => 'INV'),
            array('dt' => 'NO'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'CUST NAME.'),
            array('dt' => 'TOT AMT'),
            array('dt' => 'DISC'),
            array('dt' => 'TAX (VAT)'),
            array('dt' => 'PAYABLE AMT'),
            array('dt' => 'DISC'),
            array('dt' => 'CASH PAID'),
            array('dt' => 'AMT BALANCE'),
            array('dt' => 'SHOP NAME'),
            array('dt' => 'GSTIN NO'),
            array('dt' => 'DELETE'),
            array('dt' => 'ADDRESS'),
            array('dt' => 'MOBILE NO'),
            array('dt' => 'CITY'),
            array('dt' => 'STATE'),
            array('dt' => 'PIN'),
            array('dt' => 'user_id'),
            array('dt' => 'utin_type'),
        );
        //
    } else {
        //
        $dataTableColumnsFields = array(
            array('dt' => 'INV'),
            array('dt' => 'NO'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'CUST NAME.'),
            array('dt' => 'TOT AMT'),
            array('dt' => 'DISC'),
            array('dt' => 'CGST'),
            array('dt' => 'SGST'),
            array('dt' => 'IGST'),
            array('dt' => 'PAYABLE AMT'),
            array('dt' => 'DISC'),
            array('dt' => 'CASH PAID'),
            array('dt' => 'AMT BALANCE'),
            array('dt' => 'SHOP NAME'),
            array('dt' => 'GSTIN NO'),
            array('dt' => 'DELETE'),
            array('dt' => 'ADDRESS'),
            array('dt' => 'MOBILE NO'),
            array('dt' => 'CITY'),
            array('dt' => 'STATE'),
            array('dt' => 'PIN'),
            array('dt' => 'user_id'),
            array('dt' => 'utin_type'),
        );
        //   
    }
    //   
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    // Table Parameters
    $_SESSION['tableName'] = 'user_transaction_invoice'; // Table Name
    $_SESSION['tableNamePK'] = 'utin_id'; // Primary Key

    if ($TaxAndGstSettingValue == 'TAX') {
        //
        $dbColumnsArray = array(
            "utin_pre_invoice_no",
            "CAST(utin_invoice_no AS UNSIGNED)",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "f.firm_name",
            "CONCAT(COALESCE(t.user_fname, ''), ' ', COALESCE(t.user_lname, ''))",
            "utin_total_amt",
            "utin_discount_amt_discup",
            "utin_pay_tax_amt",
            "utin_tot_payable_amt",
            "utin_discount_amt",
            "ROUND((ifnull(utin_cash_amt_rec,0) + ifnull(utin_pay_card_amt,0) + ifnull(utin_pay_cheque_amt,0)), 2)",
            "ROUND((ifnull(abs(utin_cash_balance),0)),2)",
            "t.user_shop_name",
            "t.user_cst_no",
            "utin_id",
            "t.user_add",
            "t.user_mobile",
            "t.user_city",
            "t.user_state",
            "t.user_pincode",
            "t.user_id",
            "utin_type",
        );
        //
    } else {
        //
        $dbColumnsArray = array(
            "utin_pre_invoice_no",
            "CAST(utin_invoice_no AS UNSIGNED)",
            "STR_TO_DATE(utin_date,'%d %b %Y')",
            "f.firm_name",
            "CONCAT(COALESCE(t.user_fname, ''), ' ', COALESCE(t.user_lname, ''))",
            "utin_total_amt",
            "utin_discount_amt_discup",
            "utin_pay_cgst_amt",
            "utin_pay_sgst_amt",
            "utin_pay_igst_amt",
            "utin_tot_payable_amt",
            "utin_discount_amt",
            "ROUND((ifnull(utin_cash_amt_rec,0) + ifnull(utin_pay_card_amt,0) + ifnull(utin_pay_cheque_amt,0)), 2)",
            "ROUND((ifnull(abs(utin_cash_balance),0)),2)",
            "t.user_shop_name",
            "t.user_cst_no",
            "utin_id",
            "t.user_add",
            "t.user_mobile",
            "t.user_city",
            "t.user_state",
            "t.user_pincode",
            "t.user_id",
            "utin_type",
        );
        //    
    }

    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '5,6,7,8,9,10,12,13';
    $_SESSION['dtSortColumn'] = '0,1';
    $_SESSION['dtDeleteColumn'] = '16';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "utin_id, utin_pre_invoice_no, utin_invoice_no,utin_date, utin_type,";
    //
    // Start code to include all session@auth:ATHU29may17
    //
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    // On Click Function Parameters
    //
    if (($staffId == '') || ($staffId != '' && $array['updateInvoiceAccess'] == 'true')) {
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = "CAST(utin_invoice_no AS UNSIGNED)"; // On which column
        $_SESSION['onclickColumnId'] = "utin_user_id";
        $_SESSION['onclickColumnValue'] = "utin_user_id";
        $_SESSION['onclickColumnFunction'] = "showSellUpdatePanelDiv";
        $_SESSION['onclickColumnFunctionPara1'] = "t.user_id";
        $_SESSION['onclickColumnFunctionPara2'] = "utin_pre_invoice_no";
        $_SESSION['onclickColumnFunctionPara3'] = "";
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "utin_invoice_no";
        $_SESSION['onclickColumnFunctionPara6'] = "";
    } else {
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = ""; // On which column
        $_SESSION['onclickColumnId'] = "";
        $_SESSION['onclickColumnValue'] = "";
        $_SESSION['onclickColumnFunction'] = "";
        $_SESSION['onclickColumnFunctionPara1'] = "";
        $_SESSION['onclickColumnFunctionPara2'] = "";
        $_SESSION['onclickColumnFunctionPara3'] = "";
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "";
        $_SESSION['onclickColumnFunctionPara6'] = "";
    }
    //
    // Delete Function Parameters
    if (($staffId == '') || ($staffId != '' && $array['deleteInvoiceAccess'] == 'true')) {
        $_SESSION['deleteColumn'] = "utin_id"; // On which column
        $_SESSION['deleteColumnId'] = "utin_id";
        $_SESSION['deleteColumnValue'] = "utin_id";
        $_SESSION['deleteColumnFunction'] = "deleteInvoice";
        $_SESSION['deleteColumnFunctionPara1'] = "soldOutStrInv"; // Panel Name
        $_SESSION['deleteColumnFunctionPara2'] = "utin_id";
        $_SESSION['deleteColumnFunctionPara3'] = "utin_pre_invoice_no";
        $_SESSION['deleteColumnFunctionPara4'] = "utin_invoice_no";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";
    } else {
        $_SESSION['deleteColumn'] = ""; // On which column
        $_SESSION['deleteColumnId'] = "";
        $_SESSION['deleteColumnValue'] = "";
        $_SESSION['deleteColumnFunction'] = "";
        $_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
        $_SESSION['deleteColumnFunctionPara2'] = "";
        $_SESSION['deleteColumnFunctionPara3'] = "";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";
    }
    //
    $_SESSION['popupFunctionLink'] = "ogijspinv.php";
    $_SESSION['popupColumn'] = "STR_TO_DATE(utin_date,'%d %b %Y')";
    if ($_SESSION['sessionProdName'] == 'OMRETL' && ($invLay == 'sellInvLayA6' || $invLay == 'sellInvLay3Inch')) {
        if ($invLay == 'sellInvLayA6') {
            $_SESSION['popupFunctionWidth'] = "400";
            $_SESSION['popupFunctionHeight'] = "800";
        } else {
            $_SESSION['popupFunctionWidth'] = "340";
            $_SESSION['popupFunctionHeight'] = "800";
        }
    } else {
        $_SESSION['popupFunctionWidth'] = "850";
        $_SESSION['popupFunctionHeight'] = "850";
    }
    $_SESSION['popupFunctionPara1'] = "t.user_id"; // Panel Name
    $_SESSION['popupFunctionPara2'] = "utin_pre_invoice_no";
    $_SESSION['popupFunctionPara3'] = "utin_invoice_no";
    $_SESSION['popupFunctionPara4'] = "utin_type";
    $_SESSION['popupFunctionPara5'] = "STR_TO_DATE(utin_date,'%d %b %Y')";
    $_SESSION['popupFunctionPara6'] = "$invLay";
    //
    //
    // Data Table Main File
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON utin_firm_id=f.firm_id "
            . "LEFT JOIN user AS t ON utin_user_id=t.user_id "
            . "LEFT JOIN user AS s ON utin_staff_id=s.user_id";
    //
    //
    $_SESSION['tableWhere'] = "utin_type IN ('imitation','RetailStock') and utin_transaction_type='sell' and utin_firm_id IN ($strFrmId) $staffStr $utinDateCondition";
    //
    //
    include 'omdatatables.php';
    ?>
</div>