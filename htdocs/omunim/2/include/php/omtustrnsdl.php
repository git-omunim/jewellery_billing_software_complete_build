<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 15 AUG, 2020 7:03:25 PM
 *
 * @FileName: omtustrnsdl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';

$sessionOwnerId = $_SESSION['sessionOwnerId'];
$transId = $_GET['transId'];
$mainTransId = $_GET['mainTransId'];
$panelName = $_GET['panelName'];
//echo '$transId:'.$transId.'<br/>';
//echo '$panelName:'.$panelName.'<br/>';
//echo '$mainTransId:'.$mainTransId.'<br/>';


if ($panelName == 'updateTransactions') {

    // DELETE TRANSACTION
    $query = "DELETE FROM transaction WHERE transaction_id = '$transId' and transaction_own_id='$sessionOwnerId'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    
    // GET JOURNAL ID FROM MAIN TRANSACTION ENTRY
    $qSelJrnlId = "SELECT transaction_jrnl_id FROM transaction where transaction_id='$mainTransId' and transaction_own_id='$sessionOwnerId'";
    $resJrnlId = mysqli_query($conn, $qSelJrnlId) or die(mysqli_error($conn));
    $rowJrnlId = mysqli_fetch_array($resJrnlId, MYSQLI_ASSOC);
    $jrnlId = $rowJrnlId['transaction_jrnl_id'];
    
    // DELETE JOURNAL TRANS ENTRY - CODE ADDED HERE BECAUSE WHERE CONDITION NOT FULFIL IN ommpjrtr.php FILE
    $queryJTrans = "DELETE FROM journal_trans where jrtr_own_id='$sessionOwnerId' and jrtr_trans_id='$transId' and jrtr_jrnl_id='$jrnlId'";
    if (!mysqli_query($conn, $queryJTrans)) {
        die('Error: ' . mysqli_error($conn));
    }

    header("Location: $documentRoot/include/php/omtutrnd_new.php?transId=$mainTransId&panelName=$panelName");
}
?>