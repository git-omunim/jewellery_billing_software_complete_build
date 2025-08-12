<?php

/*
 * **************************************************************************************
 * @tutorial: Create Account For Each New Firm 
 * **************************************************************************************
 * 
 * Created on Mar 12, 2013 10:28:09 AM
 *
 * @FileName: omtipacc.php
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

//require_once 'system/omssopin.php';
$ownerId = $_SESSION['sessionOwnerId'];
//$firmId // Mendatory Var
/* * **Start code to change raw/old accounts to raw accounts for raw gold,silver and alloy @OMMODTAG SHRI_10JAN16****** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Branch/Divisions','Branch/Divisions','Branch/Divisions','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Capital Account','Capital Account','Capital Account','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Capital Account','Reserves & Surplus','Reserves & Surplus','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Current Assets','Current Assets','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Bank Account','Bank Account','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Cash in Hand','Cash in Hand','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Deposits (Asset)','Deposits (Asset)','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Loans & Advances (Asset)','Loans & Advances','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock in Hand','Stock in Hand','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Sundry Debtors','Sundry Debtors','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Current Liabilities','Current Liabilities','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','Duties & Taxes','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Provisions','Provisions','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Sundry Creditors','Sundry Creditors','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','GST Payable','GST Payable','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Direct Expenses','Direct Expenses','Direct Expenses','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Direct Incomes','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Fixed Assets','Fixed Assets','Fixed Assets','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Indirect Expenses','Indirect Expenses','Indirect Expenses','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Indirect Incomes','Indirect Incomes','Indirect Incomes','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Investments','Investments','Investments','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Loans','Loans','Loans','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Loans','Bank OD Acc','Bank OD Acc','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Loans','Secured Loans','Secured Loans','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Loans','Unsecured Loans','Unsecured Loans','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Misc Expenses','Misc Expenses','Misc Expenses','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase Accounts','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales Accounts','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Suspense Account','Suspense Account','Suspense Account','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','ProfitLoss','Profit & Loss Acc','Profit & Loss Acc','Profit & Loss Acc','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Employee','Employee & Staff','Employee & Staff','Employee & Staff','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','RAW Metal','RAW Gold','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }

    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','RAW Metal','RAW Silver','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******Start code to add accounts for Purchase Raw Metal @Author:SHRI30DEC16************** */
//
//
//******************************************************************************************************************
//START CODE FOR HIDE GOLD, SILVER, RAW MTAL , RAW ALLOY ACCOUNT ON RETAIL SOFTWARE : @AUTHOR @DARSHANA 7 AUG 2021
//************************************************************************************************************************
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase RAW Gold','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }

    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase RAW Silver','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for Purchase Raw Metal @Author:SHRI30DEC16************** */

/* * *******Start code to add accounts @Author:PRIYA17MAY14************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Interest Rec','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Direct Expenses','Direct Expenses','Discount Paid','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add accounts @Author:PRIYA17MAY14************** */
/* * *******Start code to add accounts @Author:PRIYA24MAY14************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Direct Expenses','Direct Expenses','Interest Paid','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Discount Rec','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add accounts @Author:PRIYA24MAY14************** */
/* * *******Start code to add accounts advance money @Author:PRIYA19JUNE14************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Loans','Advance Money','Advance Money','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add accounts advance money @Author:PRIYA19JUNE14************** */
/* * *******Start code to add accounts for raw alloy @Author:PRIYA19SEP14************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','RAW Metal','RAW Alloy','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for raw alloy @Author:PRIYA19SEP14************** */
/* * **End code to change raw/old accounts to raw accounts for raw gold,silver and alloy @OMMODTAG SHRI_10JAN16****** */
/* * *******Start code to add accounts for raw alloy @Author:PRIYA19SEP14************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','RAW Metal','RAW Metal','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for raw alloy @Author:PRIYA19SEP14************** */
/* * *******Start code to add accounts for Purchase Raw Metal @Author:SHRI30DEC16************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase RAW Metal','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for Purchase Raw Metal @Author:SHRI30DEC16************** */
/* * *******Start code to add accounts for Stock(Inv) @Author:SHRI17MAR16************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock (Inventory)','Metal','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * *******End code to add accounts for Stock(Inv) @Author:SHRI17MAR16************** */
/* * *******Start code to add accounts for Stock Gold @Author:SHRI17MAR16************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Gold','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for Stock Gold @Author:SHRI17MAR16************** */
/* * *******Start code to add accounts for Stock Silver @Author:SHRI17MAR16************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Silver','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//Start code to add accounts for Purchase Gold @Author: LOVE30NOV2016
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,"
            . "acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase Gold','Gold','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
//Start code to add accounts for Purchase Silver @Author: LOVE30NOV2016
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,"
            . "acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase Silver','Silver','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for Stock Silver @Author:SHRI17MAR16************** */
/* * *******Start code to add accounts for Sales Raw Metal @Author:SHRI30DEC16************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales RAW Gold','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }

    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales RAW Silver','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }

    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales RAW Metal','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
    
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales RAW Stone','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * *******End code to add accounts for Sales Raw Metal @Author:SHRI30DEC16************** */
/* * **************Start to add making and labour charges accounts @Author:SHRI04JAN16************* */
//
//
//$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Making Chrg','Making Chrg','OMUNIM','$firmId')";
//if (!mysqli_query($conn, $qInsertAccount)) {
//    die('Error: ' . mysqli_error($conn));
//}
//$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Direct Expenses','Labour Chrg','Labour Chrg','OMUNIM','$firmId')";
//if (!mysqli_query($conn, $qInsertAccount)) {
//    die('Error: ' . mysqli_error($conn));
//}
//
//
/* * **************End to add making and labour charges accounts @Author:SHRI04JAN16************* */
/* * ******************Start to add accounts for raw metal stock @Author:SHRI08JAN17***************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Raw Gold','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }

    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Raw Silver','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
    
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Raw Stone','Metal','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
/* * ******************End to add accounts for raw metal stock @Author:SHRI08JAN17***************** */
/* * ******************Start to add accounts for raw metal stock @Author:SHRI09JAN17***************** */
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Metal Rate Cut Pnl','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
/* * ******************End to add accounts for raw metal stock @Author:SHRI09JAN17***************** */
/* * ******************Start to add accounts for courier charge @Author:SHRI29MAR17***************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Indirect Incomes','Indirect Incomes','Courier Charges','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * ******************End to add accounts for courier charge @Author:SHRI29MAR17***************** */
/* * ******************Start to add accounts for other charge @Author:vinod29-May-2023***************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Indirect Incomes','Indirect Incomes','Other Charges','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
/* * ******************End to add accounts for other charge @Author:vinod29-May-2023***************** */
/* * *******Start code to add accounts for Stock Gold @Author:SHRI23JUN17************** */
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','CGST','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','SGST','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','IGST','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Making Charges','Making Charges','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Expenses','Direct Expenses','Labour Charges','Labour Charges','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
//
/********End code to add accounts for Stock Gold @Author:SHRI23JUN17************** */
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD Card Payment,Online Payment & TDS Account IN ACCOUNT TABLE - Tax @AUTHOR:MADHUREE-29APRIL2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //

$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Card Payment','Card Payment','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Assets','Current Assets','Online Payment','Online Payment','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','TDS','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD Card Payment,Online Payment & TDS Account IN ACCOUNT TABLE - Tax @AUTHOR:MADHUREE-29APRIL2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD GOLD & SILVER SALES ACCOUNT IN ACCOUNT TABLE @AUTHOR:MADHUREE-14OCTOBER2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales Gold','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
//
    $qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales Silver','OMUNIM','$firmId')";
    if (!mysqli_query($conn, $qInsertAccount)) {
        die('Error: ' . mysqli_error($conn));
    }
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD GOLD & SILVER SALES ACCOUNT IN ACCOUNT TABLE @AUTHOR:MADHUREE-14OCTOBER2020  //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD ROUND OFF ACCOUNT WHEN FIRM IS CREATED ACCOUNT IN ACCOUNT TABLE @AUTHOR:MADHUREE-14OCTOBER2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$qInsertAccount = "insert into accounts (acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Round Off','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD ROUND OFF ACCOUNT WHEN FIRM IS CREATED ACCOUNT IN ACCOUNT TABLE @AUTHOR:MADHUREE-14OCTOBER2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD SAVING SCHEME ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED ACCOUNT @AUTHOR:MADHUREE-14OCTOBER2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$qInsertAccount = "insert into accounts (acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Loans','Advance Money','Saving Scheme','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD SAVING SCHEME ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED ACCOUNT @AUTHOR:MADHUREE-14OCTOBER2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD PROCESSING AMOUNT ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED ACCOUNT @AUTHOR:MADHUREE-05APRIL2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$qInsertAccount = "insert into accounts (acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Indirect Incomes','Indirect Incomes','Processing Amount','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD PROCESSING AMOUNT ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED ACCOUNT @AUTHOR:MADHUREE-05APRIL2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD STONE STOCK ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED NEW ACCOUNTS @AUTHOR:PRIYANKA-25MAY2021    //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "INSERT INTO accounts (acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) "
        . "VALUES ('$ownerId','Assets','Current Assets','Stock (Inventory)','Stock Stone','Metal','OMUNIM','$firmId')";
//
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD STONE STOCK ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED NEW ACCOUNTS @AUTHOR:PRIYANKA-25MAY2021      //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD STONE PURCHASE ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "INSERT INTO accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) VALUES ('$ownerId','Expenses','Purchase Accounts','Purchase Accounts','Purchase Stone','OMUNIM','$firmId')";
//
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD STONE PURCHASE ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-07AUG2021  //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD STONE SALES ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "INSERT INTO accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) VALUES ('$ownerId','Income','Sales Accounts','Sales Accounts','Sales Stone','OMUNIM','$firmId')";
//
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD STONE SALES ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-07AUG2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD TCS ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-24DEC2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
$qInsertAccount = "INSERT INTO accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Liabilities','Current Liabilities','Duties & Taxes','TCS','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD TCS ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED @AUTHOR:MADHUREE-24DEC2021 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD HALLMARKING CHARGES ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED NEW ACCOUNTS @AUTHOR:PRIYANKA-28MAY2022    //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
if ($_SESSION['sessionProdName'] != 'OMRETL') {  // YUVRAJ ADD THIS RETAILS CONDITION FOR NOT SHOW ON RETAIL @YUVRAJ 04082022
$qInsertAccount = "INSERT INTO accounts (acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_metal,acc_created_by,acc_firm_id) "
                . "VALUES ('$ownerId','Liabilities','Current Liabilities','Hallmarking Chrg','Hallmarking Chrg','Metal','OMUNIM','$firmId')";
//
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
}
//
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD HALLMARKING CHARGES ACCOUNT IN ACCOUNT TABLE WHEN FIRM IS CREATED NEW ACCOUNTS @AUTHOR:PRIYANKA-28MAY2022      //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD PAYTM POS ACCOUNT WHEN WE ADD NEW FIRM @SIMRAN:29NOV2023                                                     //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) "
        . "values ('$ownerId','Assets','Current Assets','Paytm POS','Paytm POS','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD PAYTM POS ACCOUNT WHEN WE ADD NEW FIRM @SIMRAN:29NOV2023                                                     //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD RAZOR PAY ACCOUNT WHEN WE ADD NEW FIRM @SIMRAN:31JAN2024                                             //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) "
        . "values ('$ownerId','Assets','Current Assets','Razor Pay','Razor Pay','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) "
        . "values ('$ownerId','Assets','Current Assets','Phone Pe','Phone Pe','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Fine Amount','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//Start code new create account - Custody Amount
$qInsertAccount = "insert into accounts(acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc,acc_user_acc,acc_created_by,acc_firm_id) values ('$ownerId','Income','Direct Incomes','Direct Incomes','Custody Amount','OMUNIM','$firmId')";
if (!mysqli_query($conn, $qInsertAccount)) {
    die('Error: ' . mysqli_error($conn));
}
//End code new create account - Custody Amount
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD RAZOR PAY ACCOUNT WHEN WE ADD NEW FIRM @SIMRAN:31JAN2024                                                      //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
$panelName="IncludeFile";
include 'ommptbupd27166_5omm.php';
?>