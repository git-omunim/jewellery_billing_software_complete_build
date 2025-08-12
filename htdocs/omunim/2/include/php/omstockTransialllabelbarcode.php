<?php
/*
 * **************************************************************************************
 * @tutorial: SP Sub List
 * **************************************************************************************
 * 
 * Created on Feb 28, 2014 2:39:36 PM
 *
 * @FileName: omstockTransialllabelbarcode.php
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
$currentFileName = basename(__FILE__);
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<div id="allLabelbarcode">
    <?php
    //
    parse_str(getTableValues("SELECT omly_value as prnPrintOption FROM omlayout where omly_own_id='$sessionOwnerId' and omly_option='printOption'"));
    //
    /*     * *********** Start Code To GET Firm Details ********* */
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
    /*     * *********** End Code To GET Firm Details ********* */
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
    if ($nepaliDateIndicator == 'YES') {
        $stock_date_col = "STR_TO_DATE(sttr_other_lang_add_date,'%d-%m-%Y')";
    } else {
        $stock_date_col = "STR_TO_DATE(sttr_add_date,'%d %b %Y')";
    }
    //Data Table Main Columns
    include 'omdatatablesUnset.php';
    //
    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'PROD NO'),
            array('dt' => 'BARCODE NO'), // YUVRAJ ADD THIS BARCODE COLOM @YUVRAJ 05082022
            array('dt' => 'DATE'),
            array('dt' => 'PROD NAME'),
            // array('dt' => 'PROD WT'),
            array('dt' => 'QTY'),
            //array('dt' => 'PROD NT WT'),
            //array('dt' => 'PURITY'),
            array('dt' => 'MKG CHARG'),
            //array('dt' => 'CRYSTAL VAL'),
            array('dt' => 'FIRM'),
            //array('dt' => 'CRYSTAL WT'),
            array('dt' => 'PRICE'),
            array('dt' => 'OTHER INFO'),
            array('dt' => 'PRINT')
        );
    } else {
        $dataTableColumnsFields = array(
            array('dt' => 'PROD CODE'),
            array('dt' => 'BARCODE NO'),
            array('dt' => 'MODEL NO'),
            array('dt' => 'DATE'),
            array('dt' => 'PROD NAME'),
            array('dt' => 'PROD WT'),
            array('dt' => 'QTY'),
            array('dt' => 'PROD NT WT'),
            array('dt' => 'PURITY'),
            array('dt' => 'MKG CHARG'),
            array('dt' => 'CRYSTAL VAL'),
            array('dt' => 'FIRM'),
            array('dt' => 'CRYSTAL WT'),
            array('dt' => 'PUR. PRICE'),
            array('dt' => 'SELL PRICE'),
            array('dt' => 'OTHER INFO'),
            array('dt' => 'PRINT')
        );
    }
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    //
    // Table Parameters
    $_SESSION['tableName'] = 'stock_transaction'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key
    // DB Table Columns Parameters 
    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        $dbColumnsArray = array(
            "sttr_item_pre_id",
            "sttr_item_id",
            "sttr_barcode",  // YUVRAJ ADD THIS BARCODE COLOM @YUVRAJ 05082022
            "$stock_date_col",
            "sttr_item_name",
            //"CONCAT(sttr_gs_weight, ' ', sttr_gs_weight_type)",
            "sttr_quantity",
            //"CONCAT(sttr_nt_weight, ' ', sttr_nt_weight_type)",
            //"sttr_purity",
            "CONCAT(sttr_making_charges, ' ', sttr_making_charges_type)",
            // "sttr_stone_valuation",
            "f.firm_name",
            // "CONCAT(sttr_stone_wt, ' ', sttr_stone_wt_type)",
            "sttr_final_valuation",
            "sttr_item_other_info",
            "sttr_id"
        );
    } else {
        $dbColumnsArray = array(
            "CONCAT(sttr_item_pre_id, COALESCE(sttr_item_id, ''))",
            "if((sttr_barcode_prefix IS NULL),sttr_barcode,CONCAT(sttr_barcode_prefix,sttr_barcode))",
            "sttr_item_model_no",
            "$stock_date_col",
            "sttr_item_name",
            "CONCAT(sttr_gs_weight, ' ', sttr_gs_weight_type)",
            "sttr_quantity",
            "CONCAT(sttr_nt_weight, ' ', sttr_nt_weight_type)",
            "sttr_purity",
            "CONCAT(sttr_making_charges, ' ', sttr_making_charges_type)",
            "sttr_stone_valuation",
            "f.firm_name",
            "CONCAT(sttr_stone_wt, ' ', sttr_stone_wt_type)",
            "sttr_final_valuation",
            "sttr_cust_price",
            "sttr_item_other_info",
            "sttr_id"
        );
    }
    $_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = 'desc,desc';
    //
    // Extra direct columns we need pass in SQL Query
    $_SESSION['sqlQueryColumns'] = "sttr_id,sttr_indicator,";
    //
    //start code to include all session@auth:ATHU29may17
    //
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';
    //
    // On Click Function Parameters
    $_SESSION['onclickColumnImage'] = "printer16.png";
    $_SESSION['onclickColumn'] = "sttr_id"; // On which column
    $_SESSION['onclickColumnId'] = "sttr_id";
    $_SESSION['onclickColumnValue'] = "sttr_id";
    $_SESSION['onclickColumnFunction'] = "printOneAllLabelBarcodeBySttrId";
    $_SESSION['onclickColumnFunctionPara1'] = "sttr_id";
    $_SESSION['onclickColumnFunctionPara2'] = "sttr_indicator";
    $_SESSION['onclickColumnFunctionPara3'] = "$systemOnOrOff";
    $_SESSION['onclickColumnFunctionPara4'] = "$sysLocalDBRemote";
    $_SESSION['onclickColumnFunctionPara5'] = "$prnPrintOption";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    //
    // Delete Function Parameters
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

    //
    // **************************************************************************************
    // START CODE TO GET VALUE OF RAW/OLD METAL TAG PRINT OPTION @AUTHOR:MADHUREE-26JULY2021
    // **************************************************************************************
    //
    $queryRawOldMetalTagPrint = "SELECT omly_value FROM omlayout WHERE omly_option = 'rawOldMetalTagPrint'";
    $resRawOldMetalTagPrint = mysqli_query($conn, $queryRawOldMetalTagPrint);
    $rowRawOldMetalTagPrint = mysqli_fetch_array($resRawOldMetalTagPrint);
    $rawOldMetalTagPrint = $rowRawOldMetalTagPrint['omly_value'];
    //
    // **************************************************************************************
    // END CODE TO GET VALUE OF RAW/OLD METAL TAG PRINT OPTION @AUTHOR:MADHUREE-26JULY2021
    // **************************************************************************************
    //
    if ($rawOldMetalTagPrint == 'YES') {
        $rawOldMetalConditionStr = " AND ";
    } else {
        $rawOldMetalConditionStr = " AND sttr_indicator !='rawMetal' AND ";
    }
    // 
    // Where Clause Condition 
    $_SESSION['tableWhere'] = "sttr_quantity!='0' AND sttr_firm_id IN ($strFrmId) AND sttr_indicator !='stockCrystal' $rawOldMetalConditionStr sttr_transaction_type NOT IN('sell','APPROVAL','ESTIMATESELL','ItemReturn') AND sttr_status NOT IN ('SOLDOUT','DELETED','ApprovalDone')";
    // 
    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id=f.firm_id ";
    //
    // Data Table Main File
    include 'omdatatables.php';
    ?>

</div>
