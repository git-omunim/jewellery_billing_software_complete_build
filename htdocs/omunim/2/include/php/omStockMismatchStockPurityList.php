<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER STOCK MISMATCH => STOCK PURITY PANEL MAIN FILE @AUTHOR:PRIYANKA:08FEB2022
 * **************************************************************************************************
 *
 * Created on FEB 08, 2022 02:00:50 PM 
 * **************************************************************************************
 * @FileName: omStockMismatchStockPurityList.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 
 * @version 2.7.122
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA:08FEB2022
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.122
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<div id="stockMismatchStockPurityPanelDiv">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>">
    <div id="myModal" class="modal"></div>
    <?php
    //
    // START CODE FOR STOCK PURITY LIST @AUTHOR:PRIYANKA:08FEB2022
    //
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //
        $selFirmId = $_SESSION['setFirmSession'];
    }
    //
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and "
                       . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where "
                       . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
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
    // Data Table Main Columns @AUTHOR:PRIYANKA:08FEB2022
    include 'omdatatablesUnset.php';
    //
    //
    $dataTableColumnsFields = array(
        array('dt' => 'FIRM'),
        array('dt' => 'METAL'),
        array('dt' => 'PID'),
        array('dt' => 'CATEGORY'),
        array('dt' => 'NAME'),
        array('dt' => 'TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GS WT'),
        array('dt' => 'NT WT'),
        array('dt' => 'PKT WT'),
        array('dt' => 'PURITY %'),
        array('dt' => 'FN WT'),
        array('dt' => 'TRANS'),
        array('dt' => 'INV'),
        array('dt' => 'STATUS')
    );
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['tableName'] = 'stock_transaction'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
    //
    //
    // DB Table Columns Parameters @AUTHOR:PRIYANKA:08FEB2022
    $dbColumnsArray = array(
        "f.firm_name",
        "sttr_metal_type",
        "sttr_item_code",
        "sttr_item_category",
        "sttr_item_name",
        "sttr_stock_type",
        "sttr_quantity",
        "CONCAT(sttr_gs_weight,' ',sttr_gs_weight_type)",
        "CONCAT(sttr_nt_weight,' ',sttr_nt_weight_type)",
        "CONCAT(sttr_pkt_weight,' ',sttr_gs_weight_type)",
        "sttr_purity",
        "CONCAT(sttr_fine_weight,' ',sttr_gs_weight_type)",        
        "sttr_transaction_type",
        "CONCAT(sttr_pre_invoice_no,sttr_invoice_no)",
        "sttr_status",
    );
    //
    //
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['dtSumColumn'] = '6,7,8,9,11';
    $_SESSION['dtDeleteColumn'] = '';
    //
    //
    // Extra direct columns we need pass in SQL Query @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['sqlQueryColumns'] = "sttr_id, sttr_firm_id, sttr_transaction_type, sttr_indicator, "
                                 . "sttr_stock_type, sttr_pre_invoice_no, sttr_invoice_no, "
                                 . "sttr_item_code, sttr_metal_type, sttr_product_type, sttr_purity,";
    //
    //
    //
    // On Click Function Parameters @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['onclickColumnImage'] = "";
    $_SESSION['onclickColumn'] = "sttr_item_category"; // On which column @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['onclickColumnId'] = "sttr_id";
    $_SESSION['onclickColumnValue'] = "sttr_id";
    $_SESSION['onclickColumnFunction'] = "stockMismatchStockPurityPopUp";
    $_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
    $_SESSION['onclickColumnFunctionPara2'] = "sttr_stock_type";
    $_SESSION['onclickColumnFunctionPara3'] = $strFrmId;
    $_SESSION['onclickColumnFunctionPara4'] = "StockMismatchStockPurityPanel"; // Panel Name @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['onclickColumnFunctionPara5'] = "sttr_item_category";
    $_SESSION['onclickColumnFunctionPara6'] = "sttr_item_name";
    $_SESSION['onclickColumnFunctionPara7'] = "sttr_purity";
    $_SESSION['onclickColumnFunctionPara8'] = "sttr_metal_type";
    $_SESSION['onclickColumnFunctionPara9'] = "sttr_indicator";
    $_SESSION['onclickColumnFunctionPara10'] = $startDate;
    $_SESSION['onclickColumnFunctionPara11'] = $endDate;
    $_SESSION['onclickColumnFunctionPara12'] = $documentRoot;
    $_SESSION['onclickColumnFunctionPara13'] = "stockLedger"; // Main Panel Name @AUTHOR:PRIYANKA:08FEB2022
    //
    //
    //
    // Extra direct columns we need pass in SQL Query @AUTHOR:PRIYANKA:08FEB2022 
    $_SESSION['tableWhere'] = " sttr_firm_id IN ($strFrmId) "
                            . " AND sttr_transaction_type NOT IN ('MELTING', 'PURCHASE', 'ItemReturn', 'PurchaseReturn', 'APPROVAL') "
                            . " AND (sttr_metal_type IN ('GOLD','gold','Gold') "
                            . " OR sttr_metal_type IN ('SILVER','silver','Silver') "
                            . " OR sttr_product_type IN ('GOLD','gold','Gold') "
                            . " OR sttr_product_type IN ('SILVER','silver','Silver')) "
                            . " AND (sttr_purity IS NULL "
                            . " OR sttr_purity = '' "
                            . " OR sttr_purity = '0' "
                            . " OR sttr_purity = '92.' "
                            . " OR sttr_purity = '92% Pure Gold (' "
                            . " OR sttr_purity = '92%' "
                            . " OR sttr_purity = '80.' "
                            . " OR sttr_purity = '080') ";
    //
    //echo $_SESSION['tableWhere'];
    // 
    // 
    // Table Joins @AUTHOR:PRIYANKA:08FEB2022
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id ";
    //
    //
    // Data Table Main File @AUTHOR:PRIYANKA:08FEB2022
    include 'omdatatables.php';
    //
    //
    // END CODE FOR STOCK PURITY LIST @AUTHOR:PRIYANKA:08FEB2022
    ?>
</div>