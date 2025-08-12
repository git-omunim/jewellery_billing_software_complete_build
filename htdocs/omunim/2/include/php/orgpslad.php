<?php

/*
 * **************************************************************************************
 * @Description: Transferred girvi settle loan add.
 * **************************************************************************************
 *
 * Created on Aug 21, 2015 3:55:56 PM
 *
 * @FileName: orgpslad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
require_once 'ommpincr.php';
include_once 'ommpfndv.php';


$loanAmtBal = 0;
$ownerId = $_SESSION['sessionOwnerId'];
//$custId = trim($_POST['custId']);
$stlTransDOBDay = trim($_POST['stlTransDOBDay']);
$stlTransDOBMonth = trim($_POST['stlTransDOBMonth']);
$stlTransDOBYear = trim($_POST['stlTransDOBYear']);
$stlTransAmount = trim($_POST['stlTransAmount']);
$stlTransAmountLeft = trim($_POST['stlTransAmountLeft']);
$allGTransIds = $_POST['allGTransIds'];
$upPanelName = trim($_POST['upPanelName']);
$ltransId = trim($_POST['lTransId']);
$totalBal = trim($_POST['totalBal']);
//echo '$totalBal='.$totalBal;
$custId = stripslashes($custId);
$stlTransDOBDay = stripslashes($stlTransDOBDay);
$stlTransDOBMonth = stripslashes($stlTransDOBMonth);
$stlTransDOBYear = stripslashes($stlTransDOBYear);
$stlTransAmount = stripslashes($stlTransAmount);
$stlTransAmountLeft = stripslashes($stlTransAmountLeft);
$upPanelName = stripslashes($upPanelName);
$ltransId = stripslashes($ltransId);
$totalBal = stripslashes($totalBal);
//$allGTransIds = stripslashes($allGTransIds);

$custId = mysqli_real_escape_string($conn,$custId);
$stlTransDOBDay = mysqli_real_escape_string($conn,$stlTransDOBDay);
$stlTransDOBMonth = mysqli_real_escape_string($conn,$stlTransDOBMonth);
$stlTransDOBYear = mysqli_real_escape_string($conn,$stlTransDOBYear);
$stlTransAmount = mysqli_real_escape_string($conn,$stlTransAmount);
$stlTransAmountLeft = mysqli_real_escape_string($conn,$stlTransAmountLeft);
$upPanelName = mysqli_real_escape_string($conn,$upPanelName);
$ltransId = mysqli_real_escape_string($conn,$ltransId);
$totalBal = mysqli_real_escape_string($conn,$totalBal);

$loanSettleDate = $stlTransDOBDay . ' ' . $stlTransDOBMonth . ' ' . $stlTransDOBYear;
if ($loanSettleDate == NULL or $loanSettleDate == '' or $stlTransAmount == NULL or $stlTransAmount == '') {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    if ($upPanelName == 'updateSettledLoans') {
        $loanAmtBal = $stlTransAmount - $stlTransAmountLeft;
//        echo '$totalBal='.$totalBal;
        
        $query = "UPDATE trans_loan_settle_trans SET lstran_dat='$loanSettleDate',lstran_settle_amt='$stlTransAmount',lstran_amt_left='$stlTransAmountLeft',lstran_amt_bal='$loanAmtBal' WHERE lstran_own_id='$ownerId' AND lstran_id='$ltransId'";
//        echo $query;
        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }

        $gTransIdArr = explode(',', $allGTransIds);
        foreach ($gTransIdArr as $gTransId) {
            if ($gTransId != '' || $gTransId != NULL) {
                parse_str(getTableValues("SELECT gtrans_upd_sts FROM girvi_transfer WHERE gtrans_own_id = '$ownerId' AND gtrans_id = '$gTransId'"));
                if ($gtrans_upd_sts == 'Transferred')
                    $statusStr = "gtrans_act_sts = 'SETTLED' , gtrans_lstran_id = '$ltransId'";
                else
                    $statusStr = "gtrans_rel_sts = 'SETTLED' , gtrans_lstran_id = '$ltransId'";

                $query = "UPDATE girvi_transfer SET $statusStr WHERE gtrans_own_id='$ownerId' and gtrans_id='$gTransId'";

                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
    } else {
        $loanAmtBal = $stlTransAmount - $stlTransAmountLeft;
         if($totalBal > 0){
            $stlTransAmountLeft = abs($stlTransAmountLeft);
        }
        $query = "INSERT INTO trans_loan_settle_trans(lstran_own_id,lstran_ent_dat,lstran_dat,lstran_settle_amt,lstran_amt_left,lstran_amt_bal) "
                . "VALUES('$ownerId',$currentDateTime,'$loanSettleDate','$stlTransAmount','$stlTransAmountLeft','$loanAmtBal')";

        if (!mysqli_query($conn,$query)) {
            die('Error: ' . mysqli_error($conn));
        }

        $gTransIdArr = explode(',', $allGTransIds);
        foreach ($gTransIdArr as $gTransId) {
            if ($gTransId != '' || $gTransId != NULL) {
                parse_str(getTableValues("SELECT lstran_id FROM trans_loan_settle_trans WHERE lstran_own_id = '$ownerId' ORDER BY lstran_id DESC LIMIT 0,1"));
                parse_str(getTableValues("SELECT gtrans_upd_sts FROM girvi_transfer WHERE gtrans_own_id = '$ownerId' and gtrans_id = '$gTransId'"));
                if ($gtrans_upd_sts == 'Transferred')
                    $statusStr = "gtrans_act_sts = 'SETTLED' , gtrans_lstran_id = '$lstran_id'";
                else
                    $statusStr = "gtrans_rel_sts = 'SETTLED' , gtrans_lstran_id = '$lstran_id'";

                $query = "UPDATE girvi_transfer SET $statusStr WHERE gtrans_own_id='$ownerId' and gtrans_id='$gTransId'";

                if (!mysqli_query($conn,$query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        }
        parse_str(getTableValues("SELECT lstran_id FROM trans_loan_settle_trans WHERE lstran_own_id=$ownerId ORDER BY lstran_id DESC LIMIT 0 ,1"));
        $totLoans = count($gTransIdArr) - 1;
        $sslg_trans_sub = 'LOANS SETTLED';
        $sysLogTransType = 'loanSettle';
        $sysLogTransId = $lstran_id;
        $custId = $custId;
        $sslg_trans_comment = 'Loan Trans Settle Id:' . $sysLogTransId . ' , Total  ' . $totLoans . '  loans are settled on Date: ' . $loanSettleDate . ', Amt. Dep: ' . formatInIndianStyle($stlTransAmount) . ', Amt. Left:' . formatInIndianStyle($stlTransAmountLeft);
        include 'omslgapi.php';
    }
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location:" . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=GirviPanel");
    } else if (($_SESSION['sessionProdOMREVO'] == $globalKeyOMREVO || $_SESSION['sessionProdOMREVO'] == $gbKeyOMREVODEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location:" . $documentRoot . "/orHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=GirviPanel");
    } else if (($_SESSION['sessionProdOMLOAN'] == $globalKeyOMLOAN || $_SESSION['sessionProdOMLOAN'] == $gbKeyOMLOANDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        header("Location:" . $documentRoot . "/olHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=GirviPanel");
    }
}

?>