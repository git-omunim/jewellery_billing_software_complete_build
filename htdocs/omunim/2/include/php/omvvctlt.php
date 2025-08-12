<?php
/*
 * Created on Apr 16, 2011 11:23:52 PM
 *
 * @FileName: omvvctlt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
?>
<?php
require_once 'system/omssopin.php';
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
?>
<div id="dailyRatesListDiv">
<?php 
    //
    include 'omdatatablesUnset.php';
    //
    // Data Table Main Columns @PRIYANKA-01AUG2019
        $dataTableColumnsFields = array(
            array('dt' => 'CITY'),
            array('dt' => 'VILLAGE'),
            array('dt' => 'DATE'),
            array('dt' => 'PINCODE'),
            array('dt' => 'DELIVERY TIME'),
            array('dt' => 'ORDER DELIVERY TIME'),
            array('dt' => 'ECOM DELIVERY')
            );
        
    $_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields; // No Change
    
    // Table Parameters @PRIYANKA-01AUG2019
    $_SESSION['tableName'] = 'city'; // Table Name
    $_SESSION['tableNamePK'] = 'city_id'; // Primary Key
    
    // DB Table Columns Parameters @PRIYANKA-01AUG2019
    $dbColumnsArray = array(
            "city_name",
            "village_name",
            "city_ent_dat",
            "city_pincode",
            "city_delivery_time",
            "city_order_delivery_time",
            "city_ecom_delivery"
    );

    $_SESSION['dbColumnsArray'] = $dbColumnsArray;
    
    $_SESSION['sqlQueryColumns'] = "city_id,";

    $_SESSION['dtSumColumn'] = '';
    $_SESSION['dtDeleteColumn'] = '6';
    $_SESSION['dtSortColumn'] = '';
    $_SESSION['dtASCDESC'] = '';
 
    //start code to include all session @PRIYANKA-01AUG2019
    $_SESSION['colorfulColumn'] = "";
    $_SESSION['colorfulColumnCheck'] = '';
    $_SESSION['colorfulColumnTitle'] = '';

    // On Click Function Parameters @PRIYANKA-01AUG2019
    $_SESSION['onclickColumnImage'] = "";
    
    $_SESSION['onclickColumn'] = "city_name"; // On which column @PRIYANKA-01AUG2019
    
    $_SESSION['onclickColumnId'] = "city_id";
    $_SESSION['onclickColumnValue'] = "city_id";
    $_SESSION['onclickColumnFunction'] = "getCity";
    $_SESSION['onclickColumnFunctionPara1'] = "city_id";
    $_SESSION['onclickColumnFunctionPara2'] = "city_id";
    $_SESSION['onclickColumnFunctionPara3'] = "";
    $_SESSION['onclickColumnFunctionPara4'] = "";
    $_SESSION['onclickColumnFunctionPara5'] = "";
    $_SESSION['onclickColumnFunctionPara6'] = "";
    
    $_SESSION['deleteColumn'] = "city_id"; // On which column
    $_SESSION['deleteColumnId'] = "city_id";
    $_SESSION['deleteColumnValue'] = "city_id";
    $_SESSION['deleteColumnFunction'] = "getCity";
    $_SESSION['deleteColumnFunctionPara1'] = "getCity"; // Panel Name
    $_SESSION['deleteColumnFunctionPara2'] = "city_id";
    $_SESSION['deleteColumnFunctionPara3'] = "";
    $_SESSION['deleteColumnFunctionPara4'] = "";
    $_SESSION['deleteColumnFunctionPara5'] = "";
    $_SESSION['deleteColumnFunctionPara6'] = "";

    // Extra direct columns we need pass in SQL Query @PRIYANKA-01AUG2019
    $_SESSION['tableWhere'] = ""; 

    // Table Joins @PRIYANKA-01AUG2019
    $_SESSION['tableJoin'] = "";

    // Data Table Main File @PRIYANKA-01AUG2019
    include 'omdatatables.php';
?>
</div>