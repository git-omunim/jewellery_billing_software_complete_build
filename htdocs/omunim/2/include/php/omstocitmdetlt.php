<?php
/*
 * **************************************************************************************
 * @Description: FINE STOCK ITEMS DETAILS @Author:PRIYANKA-05-07-17
 * **************************************************************************************
 *
 * Created on JULY 05, 2017 06:42:36 PM
 *
 * @FileName: omstocitmdetlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMERP
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommprspc.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//
$panelName = $_GET['panelName'];
$metalType = $_GET['metalType'];
$itemCategory = $_GET['itemCategory'];
$itemName = $_GET['itemName'];
$stockType = $_GET['stockType'];
$stockPurity = $_GET['stockPurity'];
//
//echo '$panelName : '.$panelName. '<br />';
//echo '$metalType : '.$metalType. '<br />';
//echo '$stockType : '.$stockType. '<br />';
//echo '$stockPurity :'.$stockPurity. '<br />';
//
//
if ($_SESSION['sessionOwnIndStr'][19] == 'Y') {
    $stockDelete = 'Y';
} else {
    $stockDelete = 'N';
}
//
?>
<input type="hidden" id="stockDelete" name="stockDelete" value="<?php echo $stockDelete; ?>" />
<div id="jewelleryPanel">
    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRoot; ?>" />
    <!-- START CODE TO ADD HIDDEN INPUT TYPE FOR SESSION PRODUCT VERSION @AUTHOR:MADHUREE-02APRIL2020 -->
    <input type="hidden" id="sessionProVersion" name="sessionProVersion" value="<?php echo $_SESSION['sessionProdVer']; ?>" />
    <!-- END CODE TO ADD HIDDEN INPUT TYPE FOR SESSION PRODUCT VERSION @AUTHOR:MADHUREE-02APRIL2020 -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" colspan="16">
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="26px">
                            <img src="<?php echo $documentRoot; ?>/images/addGold24.png" alt="Stock Purchase List" onload="setScrollIdFun('stockListHeader');"/>
                        </td>
                        <td width="200px">
                            <?php
                            if ($panelName == 'FineStockDetails' && ($metalType == 'Gold' || $metalType == 'gold' ||
                                $metalType == 'GOLD')) {
                                $_SESSION['dtPrintTitle'] = "GOLD STOCK LIST";
                                ?>
                                <div class="textLabelHeading">GOLD STOCK LIST </div>
                                <?php
                            } else if ($panelName == 'FineStockDetails' && ($metalType == 'Silver' || $metalType == 'silver' ||
                                       $metalType == 'SILVER')) {
                                $_SESSION['dtPrintTitle'] = "SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">SILVER STOCK LIST </div>
                                <?php
                            } else {
                                $_SESSION['dtPrintTitle'] = "GOLD SILVER STOCK LIST";
                                ?>
                                <div class="textLabelHeading">ALL STOCK LIST </div>
                            <?php } ?>
                        </td>
                        <td align="right" valign="middle">
                            <div id="messDisplayDiv"></div>
                        </td>
                        <td align="right" valign="middle" colspan="15">
                            <a style="cursor: pointer;" class="btn btn-xs default" 
                               onclick="navigateBackToStockItmPanel('<?php echo $documentRoot; ?>', 'FineStock', '<?php echo $itemCategory; ?>', '<?php echo $itemName; ?>', '<?php echo $metalType; ?>', '<?php echo $stockPurity; ?>');">
                                <i class="fa fa-angle-double-left"></i> BACK
                            </a>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
    //
    // START CODE FOR LIST OF FINE STOCK ITEMS DETAILS @Author:PRIYANKA-05-07-17
    //
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //
        $selFirmId = $_SESSION['setFirmSession'];
    }
    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' "
                . "$sessionFirmStr";
    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' "
                . "$sessionFirmStr order by firm_since desc";
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
    //$stockPurityNew = decimalVal($stockPurity,2);
    //
    //$stockPurityNew = rtrim($stockPurity, ".");
    //
    //echo '$stockPurityNew == ' . rtrim($stockPurityNew, ".");
    //echo "<br>";
    //
    //$test = '92.00';
    //
    //echo '$test == ' . rtrim($test, ".");
    //echo "<br>";
    //
    //
    //if ($stockType == 'retail') {
    /* START CODE TO CHECK ONLY RETAIL STOCK TYPE AT THIRD LAYER LIST OF STOCK @AUTHOR:MADHUREE-12MARCH2020 */
    if ($metalType == 'Gold' || $metalType == 'gold' || $metalType == 'GOLD') {

        $viewWhere = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('GOLD','gold','Gold') "
                . "and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') "
                . "and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') "
                . "and st.sttr_indicator IN ('stock', 'AddInvoice') "
                . "and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                . "and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' "
                . "and st.sttr_item_name = '$itemName' "
                . "and st.sttr_purity = '$stockPurity' "
                //. "and (st.sttr_purity = '$stockPurity' OR st.sttr_purity = '$stockPurityNew') "
                . "group by st.sttr_id";
        
    } else if ($metalType == 'Silver' || $metalType == 'silver' || $metalType == 'SILVER') {

        $viewWhere = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('SILVER','silver','Silver') "
                . "and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') "
                . "and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') "
                . "and st.sttr_indicator IN ('stock', 'AddInvoice') "
                . "and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                . "and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' "
                . "and st.sttr_item_name = '$itemName' "
                . "and st.sttr_purity = '$stockPurity' "
                //. "and (st.sttr_purity = '$stockPurity' OR st.sttr_purity = '$stockPurityNew') "
                . "group by st.sttr_id";
        
    }else if ($metalType == 'Platinum' || $metalType == 'platinum' || $metalType == 'PLATINUM') {

        $viewWhere = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('PLATINUM','platinum','Platinum') "
                . "and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') "
                . "and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') "
                . "and st.sttr_indicator IN ('stock', 'AddInvoice') "
                . "and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                . "and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' "
                . "and st.sttr_item_name = '$itemName' "
                . "and st.sttr_purity = '$stockPurity' "
                //. "and (st.sttr_purity = '$stockPurity' OR st.sttr_purity = '$stockPurityNew') "
                . "group by st.sttr_id";
        
    }  else {

        $viewWhere = "st.sttr_firm_id IN ($strFrmId) "
                . "and st.sttr_status NOT IN ('SOLDOUT','DELETED','ItemReturn','ApprovalDone') "
                . "and (st.sttr_melting_status IS NULL OR st.sttr_melting_status = '') "
                . "and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP','TAG') "
                . "and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' "
                . "and st.sttr_item_name = '$itemName' "
                . "and st.sttr_purity = '$stockPurity' "
                //. "and (st.sttr_purity = '$stockPurity' OR st.sttr_purity = '$stockPurityNew') "
                . "group by st.sttr_id";
        
    }
    /* END CODE TO CHECK ONLY RETAIL STOCK TYPE AT THIRD LAYER LIST OF STOCK @AUTHOR:MADHUREE-12MARCH2020 */
    //} 
    //
    //
    //echo '$viewWhere :'.$viewWhere. '<br />';
    //
    //
    // Table Joins
    $viewJoin = " INNER JOIN firm AS f ON st.sttr_firm_id = f.firm_id "
             . "LEFT JOIN stock_transaction as stnst ON st.sttr_id = stnst.sttr_sttr_id "; // CHANGE sttr_transaction_type sell TO ItemReturn FOR RETURNED ITEM STOCK ISSUE@AUTHOR:MADHUREE-03MAR2020
    //
    //
    $createView = "CREATE table temp_view AS "
            . "SELECT st.sttr_id as 'sttr_id',"
            . "st.sttr_transaction_type as 'sttr_transaction_type',"
            . "st.sttr_sttr_id as 'sttr_sttr_id',"
            . "st.sttr_sttrin_id as 'sttr_sttrin_id',"
            . "st.sttr_item_pre_id as 'sttr_item_pre_id',"
            . "st.sttr_item_id as 'sttr_item_id',"
            . "f.firm_name as 'firm_name',"
            . "st.sttr_metal_type as 'sttr_metal_type',"
            . "st.sttr_purity as 'sttr_purity',"
            . "st.sttr_product_purchase_rate as 'sttr_product_purchase_rate',"
            . "st.sttr_item_model_no as 'sttr_item_model_no',"
            . "st.sttr_barcode_prefix as 'sttr_barcode_prefix',"
            . "st.sttr_barcode as 'sttr_barcode',"
            . "st.sttr_item_category as 'sttr_item_category',"
            . "st.sttr_item_name as 'sttr_item_name',"
            . "st.sttr_stock_type as 'sttr_stock_type',"
            //
            /* START CODE TO ADD CONDITIONS FOR FINAL QTY, WEIGHT FOR RETAIL REMAINING STOCK @AUTHOR:MADHUREE-10AUGUST2020 */
            //
            . "(IFNULL(SUM(distinct(if((st.sttr_final_quantity IS NULL),st.sttr_quantity,st.sttr_final_quantity))), 0)) as 'sttr_quantity',"
            //
            /* START CODE TO ADD CONDITIONS FOR WEIGHTS IN KG, GM, MG @AUTHOR:PRIYANKA-28JAN2022 */
            //
            . "(IFNULL(ROUND(SUM(distinct(if((st.sttr_final_gs_weight IS NULL OR st.sttr_final_gs_weight = 0),"
            . "IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_gs_weight,3),0)*1000),"
            . "IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_gs_weight,3),0)*0.001),"
            . "(ifnull(round(st.sttr_gs_weight,3),0)*1))),"
            . "IF(st.sttr_gs_weight_type='KG',(ifnull(round(st.sttr_final_gs_weight,3),0)*1000),"
            . "IF(st.sttr_gs_weight_type='MG',(ifnull(round(st.sttr_final_gs_weight,3),0)*0.001),"
            . "(ifnull(round(st.sttr_final_gs_weight,3),0)*1)))))),3), 0)) as 'sttr_gs_weight',"
            ."st.sttr_pkt_weight as 'sttr_pkt_weight',"
             ."st.sttr_less_weight as 'sttr_less_weight',"
            //
            /* END CODE TO ADD CONDITIONS FOR WEIGHTS IN KG, GM, MG @AUTHOR:PRIYANKA-28JAN2022 */
            //
            . "(IFNULL(ROUND(SUM(distinct(if((st.sttr_final_nt_weight IS NULL OR st.sttr_final_nt_weight = 0),"
            . "IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_nt_weight,3),0)*1000),"
            . "IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_nt_weight,3),0)*0.001),"
            . "(ifnull(round(st.sttr_nt_weight,3),0)*1))),"
            . "IF(st.sttr_nt_weight_type='KG',(ifnull(round(st.sttr_final_nt_weight,3),0)*1000),"
            . "IF(st.sttr_nt_weight_type='MG',(ifnull(round(st.sttr_final_nt_weight,3),0)*0.001),"
            . "(ifnull(round(st.sttr_final_nt_weight,3),0)*1)))))),3), 0)) as 'sttr_nt_weight',"
            . "(IFNULL(SUM(distinct(if((st.sttr_final_tag_weight IS NULL),st.sttr_tag_weight,st.sttr_final_tag_weight))), 0)) as 'sttr_tag_weight', "
            
            // Summing stone and diamond quantities separately
             . "(IFNULL(SUM(CASE WHEN stnst.sttr_item_category != 'diamond' THEN stnst.sttr_quantity ELSE 0 END), 0)) as 'stone_quantity', "
             . "(IFNULL(SUM(CASE WHEN stnst.sttr_item_category  = 'diamond' THEN stnst.sttr_quantity ELSE 0 END), 0)) as 'diamond_quantity', "

        // Gross weight logic for non-diamonds (stones)
        . "(IFNULL(SUM(CASE WHEN LOWER(stnst.sttr_item_category) != 'diamond' THEN "
        . "IF(stnst.sttr_final_gs_weight IS NULL OR stnst.sttr_final_gs_weight = 0, "
        . "CASE LOWER(stnst.sttr_gs_weight_type) "
        . "WHEN 'kg' THEN (stnst.sttr_gs_weight * 1000) "
        . "WHEN 'mg' THEN (stnst.sttr_gs_weight * 0.001) "
        . "WHEN 'ct' THEN (stnst.sttr_gs_weight * 0.2) "
        . "ELSE stnst.sttr_gs_weight END, "
        . "CASE LOWER(stnst.sttr_gs_weight_type) "
        . "WHEN 'kg' THEN (stnst.sttr_final_gs_weight * 1000) "
        . "WHEN 'mg' THEN (stnst.sttr_final_gs_weight * 0.001) "
        . "WHEN 'ct' THEN (stnst.sttr_final_gs_weight * 0.2) "
        . "ELSE stnst.sttr_final_gs_weight END "
        . ") END), 0)) as 'stone_gs_weight', "

        // Gross weight logic for diamonds
        . "(IFNULL(SUM(CASE WHEN LOWER(stnst.sttr_item_category) = 'diamond' THEN "
        . "IF(stnst.sttr_final_gs_weight IS NULL OR stnst.sttr_final_gs_weight = 0, "
        . "CASE LOWER(stnst.sttr_gs_weight_type) "
        . "WHEN 'kg' THEN (stnst.sttr_gs_weight * 1000) "
        . "WHEN 'mg' THEN (stnst.sttr_gs_weight * 0.001) "
        . "WHEN 'ct' THEN (stnst.sttr_gs_weight * 0.2) "
        . "ELSE stnst.sttr_gs_weight END, "
        . "CASE LOWER(stnst.sttr_gs_weight_type) "
        . "WHEN 'kg' THEN (stnst.sttr_final_gs_weight * 1000) "
        . "WHEN 'mg' THEN (stnst.sttr_final_gs_weight * 0.001) "
        . "WHEN 'ct' THEN (stnst.sttr_final_gs_weight * 0.2) "
        . "ELSE stnst.sttr_final_gs_weight END "
        . ") END), 0)) as 'diamond_gs_weight', "
        //
        /* END CODE TO ADD CONDITIONS FOR FINAL QTY, WEIGHT FOR RETAIL REMAINING STOCK @AUTHOR:MADHUREE-10AUGUST2020 */
        // 
        . "st.sttr_stone_wt as 'sttr_stone_wt',"
            . "st.sttr_status as 'sttr_status',"
            . "st.sttr_st_id as 'sttr_st_id', "
            . "st.sttr_hallmark_uid as 'sttr_hallmark_uid', "
            . "st.sttr_hallmark_status as 'sttr_hallmark_status' "
            . "FROM stock_transaction as st "
            . " $viewJoin "
            . " WHERE $viewWhere ";
    //
    //
    //echo '$viewWhere == ' . $viewWhere . '<br />';
    //
    //
    $sqlTable = 'DESC temp_view;';
    //
    mysqli_query($conn, $sqlTable);
    if (mysqli_errno($conn) == 1146) {
        mysqli_query($conn, $createView) or die('Query:' . $createView . '<br/> ERROR:' . mysqli_error($conn));
    } else {
        $dropView = "TRUNCATE table temp_view";
        mysqli_query($conn, $dropView) or die('Query:' . $dropView . '<br/> ERROR:' . mysqli_error($conn));
        $dropView = "DROP table temp_view";
        mysqli_query($conn, $dropView) or die('Query:' . $dropView . '<br/> ERROR:' . mysqli_error($conn));
        mysqli_query($conn, $createView) or die('Query:' . $createView . '<br/> ERROR:' . mysqli_error($conn));
    }
    //
    /***** End Code To GET Firm Details ********* */
    //
    //Data Table Main Columns
    //
    include 'omdatatablesUnset.php';
    //
    $dataTableColumnsFields = array(
        array('dt' => 'PRID'),
        array('dt' => 'PRNO'),
        array('dt' => 'FIRM NAME'),
        array('dt' => 'METAL TYPE'),
        array('dt' => 'MODEL NO'),
        array('dt' => 'ITEM CATEGORY'),
        array('dt' => 'PRODUCT NAME'),
        array('dt' => 'STOCK TYPE'),
        array('dt' => 'QTY'),
        array('dt' => 'GROSS WEIGHT'),
        array('dt' => 'LESS WEIGHT'),
        array('dt' => 'PACKET WEIGHT'),
        array('dt' => 'NET WEIGHT'),
        array('dt' => 'W.TAGWT'),
        array('dt' => 'PURITY'),
        array('dt' => 'PUR RATE'),
//        array('dt' => 'STONE WEIGHT'),
        array('dt' => 'TOTAL ST QTY'),
        array('dt' => 'TOTAL ST WT(GM)'),
        array('dt' => 'STONE QTY'),
        array('dt' => 'STONE WT(GM)'),
        array('dt' => 'DIA QTY'),
        array('dt' => 'DIA WT(GM)'),
        array('dt' => 'STATUS'),
        array('dt' => 'HUID'), //HUID ON PURCHASE RETAIL STOCK @AUTHOR SIMRAN26JULY2021
        array('dt' => 'HM STATUS'),
        array('dt' => 'TAG NO'),
        array('dt' => 'BARCODE'),
        array('dt' => 'DEL')
    );
    //
    //
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    //
    // Table Parameters
    $_SESSION['tableName'] = 'temp_view as st'; // Table Name
    $_SESSION['tableNamePK'] = 'st.sttr_id'; // Primary Key
    //
    //
    // DB Table Columns Parameters 
    //
    $dbColumnsArray = array(
        "st.sttr_item_pre_id",
        "CAST(st.sttr_item_id AS UNSIGNED)",
        "st.firm_name",
        "st.sttr_metal_type",
        "st.sttr_item_model_no",
        "st.sttr_item_category",
        "st.sttr_item_name",
        "st.sttr_stock_type",
        "st.sttr_quantity",
        "st.sttr_gs_weight",
        "st.sttr_pkt_weight",
        "st.sttr_less_weight",
        "st.sttr_nt_weight",
        "IF(st.sttr_tag_weight NOT IN ('NULL',0), st.sttr_tag_weight+st.sttr_gs_weight,0)",
        "CONCAT(st.sttr_purity,' ','%')",
        "st.sttr_product_purchase_rate",
//        "st.sttr_stone_wt",
        "st.diamond_quantity + st.stone_quantity",
        "st.diamond_gs_weight + st.stone_gs_weight", 
         "st.stone_quantity",
         "st.stone_gs_weight",
         "st.diamond_quantity",
         "st.diamond_gs_weight",      
        "st.sttr_status",
        "st.sttr_hallmark_uid",
         "IF(st.sttr_hallmark_status = 'SendStockForHallmarking', 'SENT', 
        IF(st.sttr_hallmark_status = 'RETURNED', 'Return', ''))",//HALLMARKING STATUS @RENUKA16OCT2024
        "IF(st.sttr_barcode_prefix IS NOT NULL AND st.sttr_barcode_prefix != '', CONCAT(st.sttr_barcode_prefix, '', st.sttr_barcode), st.sttr_barcode)",
        "st.sttr_st_id",
        "st.sttr_id"
    );
    //
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '7,8,9,10,11,12';
    $_SESSION['dtDeleteColumn'] = '12';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "st.sttr_id,st.sttr_sttr_id,st.sttr_sttrin_id,st.sttr_transaction_type,";
    //
    // On Click Function Parameters
    //
    if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') {
        
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = "st.sttr_item_pre_id";
        $_SESSION['onclickColumnId'] = "st.sttr_id";
        $_SESSION['onclickColumnValue'] = "st.sttr_id";
        $_SESSION['onclickColumnFunction'] = "stock_transaction_update_operation";
        $_SESSION['onclickColumnFunctionPara1'] = "st.sttr_id";
        $_SESSION['onclickColumnFunctionPara2'] = "st.sttr_transaction_type";
        $_SESSION['onclickColumnFunctionPara3'] = "update";
        //
        if ($divName == '') {
            $divName = 'stockPanelSubDiv';
        }
        if (strpos($divName, '|') !== false) {
            if ($sttr_panel_name != '' || $sttr_panel_name != NULL) {
                $_SESSION['onclickColumnFunctionPara4'] = $sttr_panel_name . $divName;
            } else {
                $_SESSION['onclickColumnFunctionPara4'] = $panelName . $divName;
            }
        } else {
            $_SESSION['onclickColumnFunctionPara4'] = $panelName . '|' . $divName;
        }
        //
        $_SESSION['onclickColumnFunctionPara5'] = "st.sttr_sttr_id";
        $_SESSION['onclickColumnFunctionPara6'] = "st.sttr_sttrin_id";
        
    } else {
        
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = "st.sttr_item_pre_id"; // On which column
        $_SESSION['onclickColumnId'] = "st.sttr_id";
        $_SESSION['onclickColumnValue'] = "st.sttr_id";
        if (($staffId != '' && $array['updateTransactionForAllPanel'] == 'false')) {
            $_SESSION['onclickColumnFunction'] = "";
        } else {
            $_SESSION['onclickColumnFunction'] = "showStockItemDetailsGeneralDiv";
        }
        $_SESSION['onclickColumnFunctionPara1'] = "st.sttr_id";
        $_SESSION['onclickColumnFunctionPara2'] = "st.sttr_stock_type";
        $_SESSION['onclickColumnFunctionPara3'] = "FineStockDetails";
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "";
        $_SESSION['onclickColumnFunctionPara6'] = "";
        
    }
    //
    // On Print Function Parameters
    //
    $_SESSION['onprintColumnImage'] = "tag16.png";
    $_SESSION['onprintColumn'] = "st.sttr_st_id"; // On which column
    $_SESSION['onprintColumnId'] = "st.sttr_id";
    $_SESSION['onprintColumnValue'] = "st.sttr_id";
    $_SESSION['onprintColumnFunction'] = "addImitationItemTag";
    $_SESSION['onprintColumnFunctionPara1'] = "";
    $_SESSION['onprintColumnFunctionPara2'] = "st.sttr_id";
    $_SESSION['onprintColumnFunctionPara3'] = "";
    $_SESSION['onprintColumnFunctionPara4'] = "";
    $_SESSION['onprintColumnFunctionPara5'] = "";
    $_SESSION['onprintColumnFunctionPara6'] = "";
    //
    /* START CODE TO ADD CODE FOR CALLING DIFFERENT FUNCTION FOR DELETING PRODUCT BY API CALL @AUTHOR:MADHUREE-28MARCH2020 */
    // Delete Function Parameters
    if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') {
        
        $_SESSION['deleteColumn'] = "st.sttr_id"; // On which column
        $_SESSION['deleteColumnId'] = "st.sttr_id";
        $_SESSION['deleteColumnValue'] = "st.sttr_id";
        $_SESSION['deleteColumnFunction'] = "stock_transaction_delete_operation";
        $_SESSION['deleteColumnFunctionPara1'] = "delete_with_all_values"; // Panel Name
        $_SESSION['deleteColumnFunctionPara2'] = "st.sttr_id";
        $_SESSION['deleteColumnFunctionPara3'] = "st.sttr_transaction_type";
        $_SESSION['deleteColumnFunctionPara4'] = "st.sttr_sttr_id";
        $_SESSION['deleteColumnFunctionPara5'] = "FineStockDetails"; // Panel Name";
        
    } else {
        
        $_SESSION['deleteColumn'] = "st.sttr_id"; // On which column
        $_SESSION['deleteColumnId'] = "st.sttr_id";
        $_SESSION['deleteColumnValue'] = "st.sttr_id";
        if (($staffId != '' && $array['deleteTransactionForAllPanel'] == 'false')) {
            $_SESSION['deleteColumnFunction'] = "";
        } else {
            $_SESSION['deleteColumnFunction'] = "deleteStockList";
        }
        $_SESSION['deleteColumnFunctionPara1'] = "FineStockDetails"; // Panel Name
        $_SESSION['deleteColumnFunctionPara2'] = "st.sttr_id";
        $_SESSION['deleteColumnFunctionPara3'] = "st.sttr_stock_type";
        $_SESSION['deleteColumnFunctionPara4'] = "st.sttr_item_category";
        $_SESSION['deleteColumnFunctionPara5'] = "st.sttr_metal_type";
        $_SESSION['deleteColumnFunctionPara6'] = "st.sttr_item_name";
        
    }
    //
    // Extra direct columns we need pass in SQL Query
    /* END CODE TO ADD CODE FOR CALLING DIFFERENT FUNCTION FOR DELETING PRODUCT BY API CALL @AUTHOR:MADHUREE-28MARCH2020 */
    // 
    //
    //$_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_current_status NOT IN ('Deleted') and sttr_indicator IN ('stock', 'AddInvoice') and sttr_transaction_type != 'sell' and sttr_quantity != 0 and sttr_item_category = '$itemCategory' and sttr_stock_type = 'retail' and sttr_item_name = '$itemName'";
    //
//    if ($metalType == 'Gold' || $metalType == 'gold' || $metalType == 'GOLD') {
//        $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('GOLD','gold','Gold') and st.sttr_status NOT IN ('DELETED','TAG') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    } else if ($metalType == 'Silver' || $metalType == 'silver' || $metalType == 'SILVER') {
//        $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('SILVER','silver','Silver') and st.sttr_status NOT IN ('DELETED','TAG') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    } else {
//        $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_status NOT IN ('DELETED','TAG') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    }
    $_SESSION['tableWhere'] = "";

//    if ($metalType == 'Gold' || $metalType == 'gold' || $metalType == 'GOLD') {
//           $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('GOLD','gold','Gold') and st.sttr_status NOT IN ('DELETED','TAG','SOLDOUT') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    } else if ($metalType == 'Silver' || $metalType == 'silver' || $metalType == 'SILVER') {
//          $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_metal_type IN ('SILVER','silver','Silver') and st.sttr_status NOT IN ('DELETED','TAG','SOLDOUT') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    } else {
//          $_SESSION['tableWhere'] = "st.sttr_firm_id IN ($strFrmId) and st.sttr_status NOT IN ('DELETED','TAG','SOLDOUT') and st.sttr_indicator IN ('stock', 'AddInvoice') and st.sttr_transaction_type IN ('EXISTING','PURONCASH','PURBYSUPP') and st.sttr_item_category = '$itemCategory' and st.sttr_stock_type = 'retail' and st.sttr_item_name = '$itemName' group by st.sttr_id,s.sttr_sttr_id";
//    }
    //echo $_SESSION['tableWhere'];
    //
    // 
    // 
    // Table Joins
    $_SESSION['tableJoin'] = "";
    //
    //
    // Data Table Main File
    include 'omdatatables.php';
    // END CODE FOR LIST OF FINE STOCK ITEMS DETAILS @Author:PRIYANKA-05-07-17
    //
    ?>
</div>