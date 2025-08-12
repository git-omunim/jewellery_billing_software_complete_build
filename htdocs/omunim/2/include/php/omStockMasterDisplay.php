<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 20 May, 2018 10:40:31 PM
 *
 * @FileName: omStockMasterDisplay.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
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
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
$userOwnerId = $_SESSION['sessionOwnerId'];
//
if ($panelName == ''){
    $panelName = $_REQUEST['panelName'];
}
//
//echo '$panelName =='.$panelName;
//
include 'omdatatablesUnset.php';
//Data Table Main Columns

$dataTableColumnsFields = array(
    array('dt' => 'PROD ID'),
    array('dt' => 'METAL'),
    array('dt' => 'PROD TYPE'),
    array('dt' => 'CATEGORY'),
    array('dt' => 'NAME')
);


$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
// Table Parameters
$_SESSION['tableName'] = 'item_name'; // Table Name
$_SESSION['tableNamePK'] = 'itm_nm_id'; // Primary Key
// DB Table Columns Parameters 

$dbColumnsArray = array(
    "itm_nm_code",
    "itm_nm_metal",
    "itm_nm_prod_type",
    "itm_nm_category",
    "itm_nm_name"
);


$_SESSION['dbColumnsArray'] = $dbColumnsArray;


$_SESSION['dtSumColumn'] = '';
$_SESSION['dtDeleteColumn'] = '';
$_SESSION['dtSortColumn'] = '';
$_SESSION['dtASCDESC'] = 'asc,asc';

// Extra direct columns we need pass in SQL Query

$_SESSION['sqlQueryColumns'] = "itm_nm_id,";

//start code to include all session@auth:ATHU29may17
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';

// On Click Function Parameters
$panelName = 'updateStockMaster';
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "itm_nm_code"; // On which column
$_SESSION['onclickColumnId'] = "itm_nm_id";
$_SESSION['onclickColumnValue'] = "itm_nm_id";
$_SESSION['onclickColumnFunction'] = "showStockMasterDetails";
$_SESSION['onclickColumnFunctionPara1'] = "itm_nm_id";
$_SESSION['onclickColumnFunctionPara2'] = "itm_nm_id";
$_SESSION['onclickColumnFunctionPara3'] = $panelName;
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";

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

// Extra direct columns we need pass in SQL Query
$_SESSION['tableWhere'] = "itm_nm_own_id = '$userOwnerId'";

// Table Joins
$_SESSION['tableJoin'] = " ";

// Data Table Main FiINNERle
include 'omdatatables.php';
?>

