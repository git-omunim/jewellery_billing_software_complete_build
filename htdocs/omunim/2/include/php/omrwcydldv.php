<?php
/*
 * **************************************************************************************
 * @tutorial: CRYSTAL DELETE FILE @Author:PRIYANKA-14MAR19
 * **************************************************************************************
 * 
 * Created on MAR 14, 2019 17:04:33 PM
 *
 * @FileName: omrwcydldv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$stprCryId = $_GET['stprCryId'];
$itstCryId = $_GET['itstCryId'];
$sttrId = $_GET['sttrId'];
$mainPanel = $_GET['mainPanel'];
$rawPanelName = $_GET['rawPanelName'];
$rwprId = $itstCryId;
//
//echo '$sttrId:'.$sttrId;
//exit();
//
$panelName = $_GET['panelName'];
//
//echo '$panelName:'.$panelName;
//exit();
//
// Start Code To Delete Crystal Entry from stock_transaction Table @Author:PRIYANKA-14MAR19
//
    parse_str(getTableValues("SELECT sttr_transaction_type,sttr_user_id FROM stock_transaction WHERE sttr_id = '$sttrId'"));
    if ($sttr_transaction_type == 'PURBYSUPP') {
        $metType = 'BUY';
        $transactionPanel = 'RawPurchase';
    } else {
        $metType = 'SELL';
        $transactionPanel = 'RawSell';
    }
    $custId = $sttr_user_id;
    
    stock_transaction('delete', array(), $sttrId);
//
// End Code To Delete Crystal Entry from stock_transaction Table @Author:PRIYANKA-14MAR19
// 
//
header("Location: $documentRoot/include/php/ogrwiadv.php?metType=$metType&subPanel=addByItemsUp&rwprId=$rwprId&mainPanel=$mainPanel&transactionPanel=$transactionPanel&rawPanelName=$rawPanelName");
//
?>