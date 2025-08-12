<?php
/*
 * **************************************************************************************
 * @tutorial: online option
 * **************************************************************************************
 * 
 * Created on NOV 19, 2019 1:28:56 PM
 *
 * @FileName: ogiosldv.php
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<div id="updateSimilarProductDiv">
    <div style="margin-top:15px;padding-top:15px;border-top:1px solid #ccc;">
        <?php
        //
        if ($sttr_similar_prod_id == '') {
            $sttr_similar_prod_id = urldecode($_REQUEST['sttr_similar_prod_id']);
        }
        //
        if ($sttrId == '') {
            $sttrId = $_REQUEST['sttrId'];
        }
        //
        //echo '$sttr_similar_prod_id : ' . $sttr_similar_prod_id . '<br>';
        //
        $sttr_similar_prod_id_arr = explode('#', $sttr_similar_prod_id);
        $sttr_similar_prod_id_str = "'0'";
        $count = 0;
        //
        while ($count < sizeof($sttr_similar_prod_id_arr)) {
            if ($sttr_similar_prod_id_arr[$count] != '') {
                $sttr_similar_prod_id_str = $sttr_similar_prod_id_str . ",";
                $sttr_similar_prod_id_str = $sttr_similar_prod_id_str . "'$sttr_similar_prod_id_arr[$count]'";
            }
            $count++;
        }
        //
        if (isset($_GET['selFirmId'])) {
            $selFirmId = $_GET['selFirmId'];
        } else {
            $selFirmId = $_SESSION['setFirmSession'];
        }
        //
        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
            $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
        }
        //
        if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
            $resFirmCount = mysqli_query($conn, $qSelFirmCount);
            $strFrmId = '0';
            while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                $strFrmId = $strFrmId . ",";
                $strFrmId = $strFrmId . "$rowFirm[firm_id]";
            }
        } else {
            $strFrmId = $selFirmId;
        }
        //
        include 'omdatatablesUnset.php';
        //
        $dataTableColumnsFields = array(
            array('dt' => 'PROD ID'),
            array('dt' => 'DATE'),
            array('dt' => 'FIRM'),
            array('dt' => 'METAL'),
            array('dt' => 'CATEGORY'),
            array('dt' => 'NAME'),
            array('dt' => 'QTY'),
            array('dt' => 'GS WT'),
            array('dt' => 'NT WT'),
            array('dt' => 'PUR'),
            array('dt' => 'FN WT'),
            array('dt' => 'RATE'),
            array('dt' => 'MKG'),
            array('dt' => 'TODAYS PRICE'),
            array('dt' => 'DEL')
        );
        //
        $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields;
        //
        $_SESSION['tableName'] = 'stock_transaction';
        $_SESSION['tableNamePK'] = 'sttr_id';
        //
        $dbColumnsArray = array(
            "sttr_item_code",
            "sttr_add_date",
            "f.firm_name",
            "sttr_metal_type",
            "sttr_item_category",
            "sttr_item_name",
            "sttr_quantity",
            "sttr_gs_weight",
            "sttr_nt_weight",
            "sttr_purity",
            "sttr_fine_weight",
            "sttr_metal_rate",
            "sttr_making_charges",
            "sttr_today_valuation",
            "sttr_id"
        );
        //
        $_SESSION['dbColumnsArray'] = $dbColumnsArray;
        //
        $_SESSION['sqlQueryColumns'] = "sttr_id,";
        //
        $_SESSION['dtSumColumn'] = '';
        $_SESSION['dtDeleteColumn'] = '';
        $_SESSION['dtSortColumn'] = '';
        $_SESSION['dtASCDESC'] = '';
        //
        $_SESSION['colorfulColumn'] = "";
        $_SESSION['colorfulColumnCheck'] = '';
        $_SESSION['colorfulColumnTitle'] = '';
        //
        $_SESSION['onclickColumnImage'] = "";
        $_SESSION['onclickColumn'] = "";
        $_SESSION['onclickColumnId'] = "";
        $_SESSION['onclickColumnValue'] = "";
        $_SESSION['onclickColumnFunction'] = "";
        $_SESSION['onclickColumnFunctionPara1'] = "";
        $_SESSION['onclickColumnFunctionPara2'] = "";
        $_SESSION['onclickColumnFunctionPara3'] = "";
        $_SESSION['onclickColumnFunctionPara4'] = "";
        $_SESSION['onclickColumnFunctionPara5'] = "";
        $_SESSION['onclickColumnFunctionPara6'] = "";
        //
        $_SESSION['deleteColumn'] = "sttr_id";
        $_SESSION['deleteColumnId'] = "";
        $_SESSION['deleteColumnValue'] = "";
        $_SESSION['deleteColumnFunction'] = "removesimilarproduct";
        $_SESSION['deleteColumnFunctionPara1'] = "$sttrId";
        $_SESSION['deleteColumnFunctionPara2'] = "sttr_id";
        $_SESSION['deleteColumnFunctionPara3'] = "";
        $_SESSION['deleteColumnFunctionPara4'] = "";
        $_SESSION['deleteColumnFunctionPara5'] = "";
        $_SESSION['deleteColumnFunctionPara6'] = "";
        //
        $_SESSION['tableWhere'] = "sttr_firm_id IN ($strFrmId) AND sttr_id IN ($sttr_similar_prod_id_str) ";
        $_SESSION['tableJoin'] = " INNER JOIN firm AS f ON sttr_firm_id = f.firm_id";
        //
        include 'omdatatables.php';
        //
        ?>
    </div>
</div>