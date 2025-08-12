<?php
/*
 * **************************************************************************************
 * @tutorial: USER INFO FILE 
 * **************************************************************************************
 * @FileName: omstockdeletelist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.82
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
//
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
?>
<!--START DIV FOR CONFIRMATION @SHRIKANT 06 JAN 2023-->
<div id="myModalcustomize">
    
</div>
<!--END DIV FOR CONFIRMATION @SHRIKANT 06 JAN 2023-->
<div id="userListDiv">
    <table width="100%" border="0">
        <tr></tr>
        <tr></tr>
        <tr>          
            <td valign="top" align="left" >
                <a class="links" onclick=""
                   style="cursor: pointer;" title="Click to refresh current page !">
                    <div class="textLabelHeading">
                        DELETED STOCK LIST
                    </div>
                </a>                        
            </td>
        </tr>
         <!-- START CODE TO ADD DELETE ALL STOCK @SIMRAN:01DEC2023-->
         <td valign="top" align="right" >
                <button class="frm-btn" onclick="deleteAllDeletedStock('deleteDeletedAllStockList');"
                 style="font-size:14px;background: #fdd;color: #cf0808;border: 1px solid #ffadad;height:auto;border-radius:3px;">
                       DELETE ALL STOCK
                </button>                       
        </td>
        <!-- END CODE TO ADD DELETE ALL STOCK @SIMRAN:01DEC2023-->
    </table>
    <?php
    /*     * **** Start Code To GET Firm Details ********* */
    if (isset($_GET['selFirmId'])) {
        $selFirmId = $_GET['selFirmId'];
    } else {
        //if not selected assign session firm
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
   $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
    if ($nepaliDateIndicator == 'YES') {
        $stock_date_col = "sttr_other_lang_add_date";
    } else {
        $stock_date_col = "sttr_add_date";
    }
    /*     * ****** End Code To GET Firm Details ********* */
    include 'omdatatablesUnset.php';

    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        //Data Table Main Columns
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'NO'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'PROD TYPE'),
            array('dt' => 'SIZE'),
            array('dt' => 'COUNTER'),
            array('dt' => 'PROD DET'),
            array('dt' => 'QTY'),
            array('dt' => 'STOCK TYPE'),
            array('dt' => 'STATUS'),
            array('dt' => 'TAG'),
            array('dt' => 'DEL'),
            array('dt' => 'OTHER INFO'));
        //
    } else {
        //Data Table Main Columns
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'DATE'),
            array('dt' => 'DEL DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'METAL'),
            array('dt' => 'SIZE'),
//      array('dt' => 'COUNTER'),
            array('dt' => 'WASTAGE'),
            array('dt' => 'ITEM DET'),
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'NT WT'),
            array('dt' => 'FN WT'),
            array('dt' => 'TYPE'),
            array('dt' => 'STATUS'),
            array('dt' => 'TAG NO'),
            array('dt' => 'MODEL NO'),
            array('dt' => 'HUID'),
            array('dt' => 'OTHER INFO'),
            array('dt' => 'BRAND NAME'),   //ADDED BRAND NAME @AUTHOR SIMRAN-28JUNE2022
            array('dt' => 'DEL REASON'),
            array('dt' => 'DEL'),
            array('dt' => 'REACTIVE'),
        );
        //
    }

    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    // Table Parameters
    $_SESSION['tableName'] = 'stock_transaction_del'; // Table Name
    $_SESSION['tableNamePK'] = 'sttr_id'; // Primary Key

    if ($_SESSION['sessionProdName'] == 'OMRETL') {
        // DB Table Columns Parameters 
        $dbColumnsArray = array(
            "CONCAT(sttr_id)",
            "sttr_st_id",
            "$stock_date_col",
            "sttr_firm_id",
            "sttr_metal_type",
            "sttr_size",
            "sttr_quantity",
            "sttr_item_name",
            "sttr_status",
            "sttr_tax",
            "sttr_price",
            "sttr_stock_type",
            "sttr_id",
            "sttr_item_other_info"
        );
    } else {
        // DB Table Columns Parameters 
        $dbColumnsArray = array(
            "sttr_item_code",
            "$stock_date_col",
            "sttr_del_date",
            "f.firm_name",
            "sttr_metal_type",
            "sttr_size",
//      "sttr_counter_name",
            "sttr_wastage",
            "sttr_item_name",
            "sttr_quantity",
            "ROUND(sttr_gs_weight,3)", //CHANGE TO 3 DECIMAL POINT @DARSHANA 18 JUNE 2021
            "ROUND(sttr_nt_weight,3)", //CHANGE TO 3 DECIMAL POINT @DARSHANA 18 JUNE 2021
            "ROUND(sttr_fine_weight,3)", //CHANGE TO 3 DECIMAL POINT @DARSHANA 18 JUNE 2021
            "sttr_stock_type",
            "sttr_status",
            "CONCAT(sttr_barcode_prefix,'',sttr_barcode)",
            "sttr_item_model_no",
            "sttr_hallmark_uid",
            "sttr_item_other_info",
            "sttr_brand_id",
            "sttr_del_reason",
            "sttr_id", //ADD OPTION FOR DELETE OPTION @SIMRAN 03 NOV 2021
            "sttr_sttr_id", //ADD OPTION FOR REACTIVE OPTION @SIMRAN 03 NOV 2021
        );
    }

    $_SESSION['dbColumnsArray'] = $dbColumnsArray;

    $_SESSION['sqlQueryColumns'] = "sttr_id,sttr_indicator,sttr_stock_type,sttr_firm_id,";

    $_SESSION['dtSumColumn'] = '6,8,9,10,11';  //ADD TOTAL COLUMN @SIMRAN:02MAR2023
    $_SESSION['dtDeleteColumn'] = '';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';

    //start code to include all session
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';

    // On Click Function Parameters
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

    //FOR ADD REACTIVE  DELETED STOCK LIST ITEM AUTHOR@SIMRAN25OCT2021

    $_SESSION['onprintColumnImage'] = "active.png";
    $_SESSION['onprintColumn'] = "sttr_sttr_id"; // On which column
    $_SESSION['onprintColumnId'] = "sttr_sttr_id";
    $_SESSION['onprintColumnValue'] = "sttr_sttr_id";
    $_SESSION['onprintColumnFunction'] = "addDeletedDeleteStockToStock";
    $_SESSION['onprintColumnFunctionPara1'] = "sttr_id";
    $_SESSION['onprintColumnFunctionPara2'] = "";
    $_SESSION['onprintColumnFunctionPara3'] = "deletedStockList";
    $_SESSION['onprintColumnFunctionPara4'] = "reactive";
    $_SESSION['onprintColumnFunctionPara5'] = "sttr_indicator";
    $_SESSION['onprintColumnFunctionPara6'] = "sttr_firm_id";

    //FOR DELETE DELETED STOCK @SIMRAN21OCT2021
    $_SESSION['deleteColumn'] = "sttr_id"; // On which column
    $_SESSION['deleteColumnId'] = "sttr_id";
    $_SESSION['deleteColumnValue'] = "sttr_id";
    if (($staffId != '' && $array['deleteTransactionForAllPanel'] == 'false')){
        $_SESSION['deleteColumnFunction'] = "";
    } else{
        //$_SESSION['deleteColumnFunction'] = "deleteDeletedStockList";
        //START CODE TO DELET THE PURCHASE LIST ITEM  @ SHRIKANT 05JAN2023
        $selQry = "SELECT own_trans_check FROM owner";
        $result = mysqli_query($conn, $selQry);
        $res = mysqli_fetch_array($result);
        $check = $res['own_trans_check'];
        if($check == "YES"){
            $_SESSION['deleteColumnFunction'] = "OpenFirmOTPVerificationPopup";
        } else {
           $_SESSION['deleteColumnFunction'] = "deleteDeletedStockList"; 
        }
        
        //START CODE TO DELET THE PURCHASE LIST ITEM  @ SHRIKANT 05JAN2023
    }
    $_SESSION['deleteColumnFunctionPara1'] = "deletedStockList "; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
    $_SESSION['deleteColumnFunctionPara3'] = "sttr_metal_type";
    $_SESSION['deleteColumnFunctionPara4'] = "sttr_item_name";
    $_SESSION['deleteColumnFunctionPara5'] = "delete";
    $_SESSION['deleteColumnFunctionPara6'] = "";

    // Extra direct columns we need pass in SQL Query
    $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) and sttr_transaction_type IN ('PURONCASH','PURBYSUPP','EXISTING','TAG') and sttr_status IN ('DELETED','NotDelFromStock') AND sttr_indicator NOT IN('stockCrystal')";

    // Table Joins
    $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";

    // Data Table Main File
    include 'omdatatables.php';
    ?>
</div>