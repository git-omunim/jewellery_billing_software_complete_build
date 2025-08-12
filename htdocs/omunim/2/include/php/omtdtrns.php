<?php

/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omtdtrns.php
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

require_once 'ommpincr.php';
require_once 'system/omssopin.php';

$ownerId = $_SESSION['sessionOwnerId'];
$transId = $_POST['transId'];
$transactionCat = $_POST['transactionCat'];
$jrnlId = $_GET['transJrnlId'];
$transUId = $_GET['transUId'];
$transAmt = $_GET['transAmt'];
$transDOB = $_GET['transDOB'];
$transFirmId = $_GET['transFirmId'];
$transSub = $_GET['transSub'];
if ($transId == '') {
    $transId = $_GET['transId'];
    $transactionCat = $_GET['transactionCat'];
}

$transPanel = $_GET['transPanel'];

if ($transId == '' || $transId == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    /*     * *******Start code to add sys_log api @Author:PRIYA14APR14******************** */
    $sslg_trans_sub = 'DAILY TRANSACTION DELETED';
    $sysLogTransType = 'Trans';
    $sysLogTransId = $transUId;
    $sslg_firm_id = $transFirmId;
    $sslg_trans_comment = 'Transaction Id: ' . $sysLogTransId . ', Transaction Date: ' . $transDOB . ',Transaction Amount: ' . formatInIndianStyle($transAmt) . ',Sub: ' . substr($transSub, 0, 16);
//
//Start Code To Delete Transaction from transaction table @AUTHOR: SANDY20JUL13
    $query = "DELETE FROM transaction WHERE transaction_own_id = '$ownerId' and transaction_id = '$transId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    //End Code To Delete Transaction from transaction table @AUTHOR: SANDY20JUL13
    
    //DELETE ALL SUB TRANSACTION ENTRIES @AUTHOR:SHRI14AUG20
    if ($transPanel == 'NEW_TRANS_PANEL') {
        $queryDelSubTrans = "DELETE FROM transaction WHERE transaction_own_id = '$ownerId' and transaction_trans_id = '$transId'";

        if (!mysqli_query($conn, $queryDelSubTrans)) {
            die('Error: ' . mysqli_error($conn));
        }
    }

    /*     * ******************************************************************************************* */
    /*                        Start Code To Delete Transaction from journal table @AUTHOR: SANDY20JUL13               */
    /*     * ******************************************************************************************* */
    $jrnlId = $jrnlId;
    $apiType = 'delete';
    include 'ommpjrnl.php';

    $jrtrJrnlId = $jrnlId;
    $apiType = 'delete';
    include 'ommpjrtr.php';
    /*     * ******************************************************************************************* */
    /*                        End Code To Delete Transaction from journal table @AUTHOR: SANDY20JUL13            */
    /*     * ******************************************************************************************* */

//change in header @AUTHOR: SANDY06JAN14
    header("Location: " . $documentRoot . "/include/php/omtatrnd.php?divMainMiddlePanel=TransactionDeleted");
}