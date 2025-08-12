<?php

/*
 * ********************************************************************************************
 * @tutorial: GOLD, SILVER AND STOCK & INVENTIRY ACC JOURNAL ENTRIES @PRIYANKA-14SEP2018
 * ********************************************************************************************
 * 
 * Created on 14 SEP, 2018 13:09:08 PM
 *
 * @FileName: omusrtranjrnlstockinvacc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.88
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
?>
<?php

//
if ($sttr_item_ent_type == 'AddInStock') {
    //
    if ($metalType == 'Gold' || $metalType == 'GOLD') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
        $accId = $acc_id;
    }
    //
    if ($metalType == 'Silver' || $metalType == 'SILVER') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
        $accId = $acc_id;
    }
    //
    if (($metalType != 'Gold' && $metalType != 'GOLD') && ($metalType != 'Silver' && $metalType != 'SILVER') && ($metalType != 'stockCrystal')) {
         include 'ominsertotheracc.php';
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock $metalType'"));
        $accId = $acc_id;
    }
    //
    // ============================================================================================= //
    // START CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // ============================================================================================= //
    //
    if ($metalType == 'stockCrystal' || $metalType == 'crystal') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
        $accId = $acc_id;
    }
    //
    // =========================================================================================== //
    // END CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // =========================================================================================== //
    //
    $transApiType = $operation;
    $transactionType = $transType;
    include 'omusrtranjrnl.php';
    //
    if ($operation == 'insert' && $metalType != 'stockCrystal') {
        // Start Code Store Journal Id into Stock Transaction Table @PRIYANKA-14SEP2018
        $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                . "WHERE sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        // End Code Store Journal Id into Stock Transaction Table @PRIYANKA-14SEP2018
    } else if ($operation == 'insert' && $metalType == 'stockCrystal') {
        //
        // =============================================================================================== //
        // START CODE TO UPDATE JORNAL ID IN ALL STOCK ENTRIES JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
        // =============================================================================================== //
        //
        $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                . "WHERE sttr_id IN($stoneStockIds) AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        // ============================================================================================= //
        // END CODE TO UPDATE JORNAL ID IN ALL STOCK ENTRIES JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
        // ============================================================================================= //
        //
    }
    //
} else if ($sttr_item_ent_type == 'purchaseOnCash') {
    if ($metalType == 'Gold' || $metalType == 'GOLD' || $metalType == 'Silver' || $metalType == 'SILVER') {
        $jrtrStoneStockInvDesc = NULL;
        $jrtrStonePurchaseDesc = NULL;
    } else if ($metalType == 'stockCrystal') {
        $jrtrGoldSilverStockInvDesc = NULL;
        $jrtrGoldSilverPurchaseDesc = NULL;
    }
    //
    if ($metalType == 'Gold' || $metalType == 'GOLD') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Gold'"));
        $puchaseGoldAccId = $acc_id;
        $puchaseSilverAccId = '';
        $payStockInvAccId = '';
        $puchaseStoneAccId = '';
        $payGoldCashAmt = $payFinalPayableAmt;
    }
    //
    if ($metalType == 'Silver' || $metalType == 'SILVER') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Silver'"));
        $puchaseSilverAccId = $acc_id;
        $puchaseGoldAccId = '';
        $payStockInvAccId = '';
        $puchaseStoneAccId = '';
        $paySilverCashAmt = $payFinalPayableAmt;
    }
    //
    if (($metalType != 'Gold' && $metalType != 'GOLD') && ($metalType != 'Silver' && $metalType != 'SILVER') && ($metalType != 'stockCrystal')) {
        include 'ominsertotheracc.php';
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock $metalType'"));
        $payStockInvAccId = $acc_id;
        $puchaseSilverAccId = '';
        $puchaseGoldAccId = '';
        $puchaseStoneAccId = '';
    }
    //
    // ============================================================================================= //
    // START CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // ============================================================================================= //
    //
    if ($metalType == 'stockCrystal') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Purchase Stone'"));
        $puchaseStoneAccId = $acc_id;
        $payStockInvAccId = '';
        $puchaseSilverAccId = '';
        $puchaseGoldAccId = '';
        $payStoneCashAmt = $payFinalPayableAmt;
    }
    //
    // =========================================================================================== //
    // END CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // =========================================================================================== //
    //
    parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id = '$sessionOwnerId' and acc_firm_id = '$firmId' and acc_user_acc = 'Cash in Hand'"));
    $payCashAccId = $acc_id;
    //
    $payCashAmt = $payFinalPayableAmt;
    //
    if ($metalType == 'Gold' || $metalType == 'GOLD') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
        $payGoldAccId = $acc_id;
        $paySilverAccId = '';
        $payStockInvAccId = '';
        $payStoneAccId = '';
    }
    //
    if ($metalType == 'Silver' || $metalType == 'SILVER') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
        $paySilverAccId = $acc_id;
        $payGoldAccId = '';
        $payStockInvAccId = '';
        $payStoneAccId = '';
    }
    //
    if (($metalType != 'Gold' && $metalType != 'GOLD') && ($metalType != 'Silver' && $metalType != 'SILVER') && ($metalType != 'stockCrystal')) {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock (Inventory)'"));
        $payStockInvAccId = $acc_id;
        $payGoldAccId = '';
        $paySilverAccId = '';
        $payStoneAccId = '';
    }
    //
    // ============================================================================================= //
    // START CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // ============================================================================================= //
    //
    if ($metalType == 'stockCrystal') {
        parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
        $payStoneAccId = $acc_id;
        $payGoldAccId = '';
        $paySilverAccId = '';
        $payStockInvAccId = '';
    }
    //
    // =========================================================================================== //
    // END CODE TO GET STONE ACCOUNT DETAILS FOR STONE JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
    // =========================================================================================== //
    //
//    echo '$puchaseGoldAccId : ' . $puchaseGoldAccId . '<br>';
//    echo '$puchaseSilverAccId : ' . $puchaseSilverAccId . '<br>';
//    echo '$puchaseStoneAccId : ' . $puchaseStoneAccId . '<br>';
//    echo '$payStockInvAccId : ' . $payStockInvAccId . '<br>';
//    echo '$payGoldAccId : ' . $payGoldAccId . '<br>';
//    echo '$paySilverAccId : ' . $paySilverAccId . '<br>';
//    echo '$payStoneAccId : ' . $payStoneAccId . '<br>';
//    echo '$payStockInvAccId : ' . $payStockInvAccId . '<br>';
    //
    $transApiType = $operation;
    $transactionType = $transType;
    //
    include 'omusrtranjrnl.php';
    //
    if ($operation == 'insert' && $metalType != 'stockCrystal') {
        // Start Code Store Journal Id into Stock Transaction Table @PRIYANKA-14SEP2018
        $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                . "WHERE sttr_id = '$stockId' AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        // End Code Store Journal Id into Stock Transaction Table @PRIYANKA-14SEP2018
    } else if ($operation == 'insert' && $metalType == 'stockCrystal') {
        //
        // =============================================================================================== //
        // START CODE TO UPDATE JORNAL ID IN ALL STOCK ENTRIES JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
        // =============================================================================================== //
        //
        $query = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' "
                . "WHERE sttr_id IN($stoneStockIds) AND sttr_owner_id = '$_SESSION[sessionOwnerId]'";
        //
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        // ============================================================================================= //
        // END CODE TO UPDATE JORNAL ID IN ALL STOCK ENTRIES JOURNAL ENTRY @AUTHOR:MADHUREE-07AUGUST2021 //
        // ============================================================================================= //
        //
    }
}
//
?>