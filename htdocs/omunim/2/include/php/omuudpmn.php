<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'nepal/nepali-date.php';
?>
<?php

require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';

//Get all the data
$ownerId = $_SESSION['sessionOwnerId'];
$userId = trim($_POST['custId']);
$firmId = trim($_POST['firmId']);
$udhaarId = trim($_POST['udhaarId']);
$udhaarDepositAmount = trim($_POST['udhaarDepositAmount']);
$udhaarDiscountAmount = trim($_POST['udhaarDiscountAmount']); //-----Add td for Discount function @AUTHOR: SHE19OCT15
$DOBDay = trim($_POST['DOBDay']);
$DOBMonth = trim($_POST['DOBMonth']);
$DOBYear = trim($_POST['DOBYear']);
$showDivPanel = $_REQUEST['showDivPanel']; //CODE ADDED TO GET DIV PANEL NAME,@AUTHOR:HEMA-19JAN2021
//$udhaarDepPanel = trim($_POST['udhaarDepPanel']);
//$udhaarSerialNum = trim($_POST['udhaarSerialNum']);
$udhaarOtherInfo = trim($_POST['udhaarOtherInfo']);
//START CODE TO GET ACCOUNT ID OF DEPOSITE, INTEREST AND DISCOUNT AMOUNT,@AUTHOR:HEMA-22OCT2020
$udhaarDepLoanAccId = trim($_POST['udhaarDepLoanAccId']);
$udhaarDepLoanDrAccId = trim($_POST['udhaarDepLoanDrAccId']);
$udhaarDepIntRecAccId = trim($_POST['udhaarDepIntRecAccId']);
$udhaarDepDiscPaidAccId = trim($_POST['udhaarDepDiscPaidAccId']);
$depositIntAmt = trim($_POST['depositIntAmt']);
if ($depositIntAmt == '' || $depositIntAmt == 0) {
    $depositIntAmt = 0;
}
//END CODE TO GET ACCOUNT ID OF DEPOSITE, INTEREST AND DISCOUNT AMOUNT,@AUTHOR:HEMA-22OCT2020
// Start To protect MySQL injection
$udhaarDepositAmount = stripslashes($udhaarDepositAmount);
$udhaarDiscountAmount = stripslashes($udhaarDiscountAmount); //-----Add  for Discount function @AUTHOR: SHE19OCT15
$DOBDay = stripslashes($DOBDay);
$DOBMonth = stripslashes($DOBMonth);
$DOBYear = stripslashes($DOBYear);
$udhaarOtherInfo = stripslashes($udhaarOtherInfo);
//
//START CODE TO GET ACCOUNT ID OF DEPOSITE, INTEREST AND DISCOUNT AMOUNT,@AUTHOR:HEMA-22OCT2020
$udhaarDepLoanAccId = stripslashes($udhaarDepLoanAccId);
$udhaarDepLoanDrAccId = stripslashes($udhaarDepLoanDrAccId);
$udhaarDepIntRecAccId = stripslashes($udhaarDepIntRecAccId);
$payInterestPaidAccId = stripslashes($udhaarDepIntRecAccId); //CODE ADDED FOR INTEREST JOURNAL ENTRY,@AUTHOR:HEMA-27OCT2020
$udhaarDepDiscPaidAccId = stripslashes($udhaarDepDiscPaidAccId);
$depositIntAmt = stripslashes($depositIntAmt);
//END CODE TO GET ACCOUNT ID OF DEPOSITE, INTEREST AND DISCOUNT AMOUNT,@AUTHOR:HEMA-22OCT2020
$payCashAmt = mysqli_real_escape_string($conn, $udhaarDepositAmount);
$payDiscountAmt = mysqli_real_escape_string($conn, $udhaarDiscountAmount); //-----Add  for Discount function @AUTHOR: SHE19OCT15
$DOBDay = mysqli_real_escape_string($conn, $DOBDay);
$DOBMonth = mysqli_real_escape_string($conn, $DOBMonth);
$DOBYear = mysqli_real_escape_string($conn, $DOBYear);
$udhaarOtherInfo = mysqli_real_escape_string($conn, $udhaarOtherInfo);
// End To protect MySQL injection
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
if ($nepaliDateIndicator == 'YES') {
    if ($DOBDay != '' && $DOBMonth != '' && $DOBYear != '') {
        $payOtherLangAddDate = trim($DOBDay) . '-' . trim($DOBMonth) . '-' . trim($DOBYear);
        $nepali_date = new nepali_date();
        $english_date = $nepali_date->get_eng_date($DOBYear, $DOBMonth, $DOBDay);
        $payAddDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
    } else {
        $payAddDate = '';
    }
} else {
    $payAddDate = $DOBDay . ' ' . $DOBMonth . ' ' . $DOBYear;
    $payOtherLangAddDate = '';
}
//print_r($_REQUEST);
//die;
//****** Add Discount Amount @AUTHOR: SHE19OCT15 ******
if ($udhaarDiscountAmount == '' || $udhaarDiscountAmount == NULL || $udhaarDiscountAmount == 0) {
//$udhaarDepositHistory = "$globalCurrency " . $udhaarDepositAmount . " has been deposited with discount amount of  0  on date " . $udhaarDepositDate . ".<br/>";
    $udhaarDepositHistory = " Total $globalCurrency " . $udhaarDepositAmount . " has been deposited on date " . $udhaarDepositDate . ".<br/>";
} else {
    $totDeposit = $udhaarDepositAmount + $udhaarDiscountAmount;
//   $udhaarDepositHistory = "$globalCurrency " . $udhaarDepositAmount . " has been deposited with discount amount of " . $udhaarDiscountAmount .  " on date " . $udhaarDepositDate . ".<br/>";
    $udhaarDepositHistory = " Total $globalCurrency " . $totDeposit . " has been deposited on date " . $udhaarDepositDate . ".<br/>";
}
// ******Add Discount Amount @AUTHOR: SHE19OCT15 ******
// 
// 
//echo '<br/>custId:' . $userId;
//echo '<br/>$udhaarId:' . $udhaarId;
//echo '<br/>$udhaarDepositAmount:' . $udhaarDepositAmount;
//echo '<br/>$payAddDate :' . $payAddDate.'<br/>';die;
if ($userId == '' or $userId == NULL or $udhaarId == '' or $udhaarId == NULL or
        $udhaarDepositAmount == '' or $udhaarDepositAmount == NULL or
        $payAddDate == '' or $payAddDate == NULL) {
    header("Location: " . $documentRoot . "/include/php/ommperrp.php");
} else {
    $sysLogTransId = $udhaarSerialNum;
    if ($udhaarDepPanel == 'UpdateUdhaar') {
        $udhadepo_id = trim($_POST['udhaarDepId']);
        $queryItem = "UPDATE udhaar_deposit SET
		udhadepo_amt='$udhaarDepositAmount',udhadepo_DOB='$udhaarDepositDate',
                udhadepo_history='$udhaarDepositHistory',udhadepo_ent_dat='$currentDateTime',udhadepo_comm='$udhaarOtherInfo',udhadepo_disc_amt='$udhaarDiscountAmount'"
                . "WHERE udhadepo_id='$udhadepo_id'"; //-----for updation of discount Discount function @AUTHOR: SHE19OCT15

        if (!mysqli_query($conn, $queryItem)) {
            die('Error: ' . mysqli_error($conn));
        }
//******Start code for update user_transaction entry:Author:SANT24MAR17
        $utransTotAmtRec = $udhaarDepositAmount;
        $utransDate = $udhaarDepositDate;
        $utransDiscountAmt = $udhaarDiscountAmount;
        $queryUTrans = "UPDATE user_transaction SET 
               utrans_tot_amt_rec='$utransTotAmtRec' ,utrans_date='$utransDate' ,utrans_discount_amt='$utransDiscountAmt' ,utrans_since='$currentDateTime' ,"
                . "WHERE utrans_utin_id = '$udhadepo_id'";
        if (!mysqli_query($conn, $queryUTrans)) {
            die('Error: ' . mysqli_error($conn));
        }
        //******End code for update user_transaction entry:Author:SANT24MAR17
        /*         * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
        $sslg_trans_sub = 'UDHAAR DEPOSIT UPDATED';
        $sysLogTransType = 'Udhaar';
        $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Deposit Date: ' . $udhaarDepositDate . ',Udhaar Deposit Amount: ' . formatInIndianStyle($udhaarDepositAmount);
        /*         * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
        $apiType = 'update';
        include 'omudpjrn.php';
    } else {

        // IT WILL RETURN  DETAILS OF MAIN UDHAAR ENTRY
        parse_str(getTableValues("SELECT utin_cr_acc_id,utin_dr_acc_id,"
                        . "utin_cash_balance,utin_type,utin_transaction_type,utin_utin_id as kittyId  FROM  "
                        . "user_transaction_invoice "
                        . "WHERE utin_id='$udhaarId'"));
        
        if ($utin_type == 'MONEY' || ($utin_type == 'OnPurchase' && $utin_transaction_type == 'DEPOSIT')) {
            $discStr = 'Discount Rec';
            $LeftAmt = $utin_cash_balance + $totalDepositAmt; // IT WILL CALCULATE FINAL LEFT AMOUNT
            $payInvoiceNo = getInvoiceNum($userId, 'MONEY', 'ADV RETURN');
            $utinType = 'MONEY';
            $transactionType = 'ADV RETURN';
            $userAccId = $udhaarDepLoanAccId;
            $accId = $udhaarDepLoanDrAccId;
        } else if ($utin_type == 'scheme' && $utin_transaction_type == 'DEPOSIT') {
            $discStr = 'Discount Rec';
            $LeftAmt = $utin_cash_balance + $totalDepositAmt; 
            $payInvoiceNo = getInvoiceNum($userId, 'MONEY', 'ADV RETURN');
            $utinType = 'scheme';
            $transactionType = 'SCHEME RETURN';
            $userAccId = $udhaarDepLoanAccId;
            $accId = $udhaarDepLoanDrAccId;
        } else {
            $discStr = 'Discount Paid';
            $LeftAmt = $utin_cash_balance - $totalDepositAmt; // IT WILL CALCULATE FINAL LEFT AMOUNT
            $payInvoiceNo = getInvoiceNum($userId, 'UDHAAR', 'UDHAAR DEPOSIT');
            $utinType = 'UDHAAR';
            $transactionType = 'UDHAAR DEPOSIT';
            $userAccId = $udhaarDepLoanDrAccId;
            $accId = $udhaarDepLoanAccId;
        }
        
        $invArr = explode('*', $payInvoiceNo);
        $payPreInvoiceNo = $invArr[0];
        $payInvoiceNo = $invArr[1];


        parse_str(getTableValues("SELECT acc_id FROM accounts "
                        . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                        . " AND acc_firm_id='$firmId'"
                        . "and acc_user_acc='Cash in Hand'"));
        $payCashAccId = $acc_id;
        /* START CODE TO ADD ACCOUNT ID FOR UDHAAR DEPOSITED AMOUNT ,@AUTHOR:HEMA-23OCT2020 */
//        if($udhaarDepLoanAccId != '' || $udhaarDepLoanAccId != null){
//            $payCashAccId = $udhaarDepLoanAccId;
//        }else{
        //  $payCashAccId = $acc_id; 
        // }
        /* END CODE TO ADD ACCOUNT ID FOR UDHAAR DEPOSITED AMOUNT ,@AUTHOR:HEMA-23OCT2020 */

        if ($payDiscountAmt != 'NAN' && $payDiscountAmt > 0 && $payDiscountAmt != '') {
            parse_str(getTableValues("SELECT acc_id FROM accounts "
                            . "WHERE acc_own_id='$_SESSION[sessionOwnerId]' "
                            . " AND acc_firm_id='$firmId'"
                            . "and acc_user_acc='$discStr'"));
            //$payDiscountAccId = $acc_id;
            /* START CODE TO ADD ACCOUNT ID FOR DISCOUNT DEPOSITED,@AUTHOR:HEMA-23OCT2020 */
            if ($udhaarDepDiscPaidAccId != null || $udhaarDepDiscPaidAccId != '') {
                $payDiscountAccId = $udhaarDepDiscPaidAccId;
            } else {
                $payDiscountAccId = $acc_id;
            }
            /* END CODE TO ADD ACCOUNT ID FOR DISCOUNT DEPOSITED,@AUTHOR:HEMA-23OCT2020 */
        } else {
            $udhaarDiscountAmount = 0;
        }
        if ($depositIntAmt != null && $depositIntAmt != '') {//CODE ADDED FOR INTEREST ON UDHAAR,@AUTHOR:HEMA-23OCT2020
            $udhaarCashRecAmount = $udhaarDepositAmount + $depositIntAmt;
            $payFinalPayableAmt = $udhaarDepositAmount + $udhaarDiscountAmount;
        } else {
            $udhaarCashRecAmount = $payFinalPayableAmt = $udhaarDepositAmount + $udhaarDiscountAmount;  // IT WILL CALCULATE TOTAL DEPOSIT AMOUNT
        }
       //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
       //*************************** START CODE TO INSERT MAIN INV NO IN UDHAAR DEPOSITE @SIMRAN:06JUN2023***************************************//
       //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
            $udhaarId = $_REQUEST['udhaarId'];
                //
                $query = "SELECT utin_main_inv_no FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId' AND utin_id = '$udhaarId' AND utin_user_id='$userId'";
                $resMainInvNo = mysqli_query($conn, $query) or die("QUERY :" . $query . mysqli_error($conn));
                $rowMainInvNo = mysqli_fetch_array($resMainInvNo, MYSQLI_ASSOC);
                //
             $mainInvNo = $rowMainInvNo['utin_main_inv_no'];
       //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
       //*************************** END CODE TO INSERT MAIN INV NO IN UDHAAR DEPOSITE @SIMRAN:06JUN2023***************************************//
       //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//        print_r($_REQUEST);
        $payTotalAmtBal = 0; // FOR JOURNAL ENTRIES
        $payDiscountAmt = $udhaarDiscountAmount;
        $payCashAmt = $udhaarDepositAmount;
        $payIntAmt = $depositIntAmt;   //CODE ADDED TO ADD INTEREST FOR INTEREST ON UDHAAR,@AUTHOR:HEMA-27OCT2020
        // INSERT QUERY FOR UDHAAR DEPOSIT
        $UdhaarDepositQry = "INSERT INTO user_transaction_invoice "
                . "(utin_utin_id,utin_user_id,utin_firm_id,utin_owner_id,"
                . "utin_type,utin_transaction_type,utin_pre_invoice_no,"
                . "utin_invoice_no,utin_cr_acc_id,utin_dr_acc_id,"
                . "utin_pay_cash_acc_id,utin_pay_disc_acc_id,utin_cash_amt_rec,"
                . "utin_discount_amt,utin_total_amt,utin_tot_payable_amt,"
                . "utin_total_amt_deposit,utin_cash_balance,utin_left_amount,utin_paym_oth_info,"
                . "utin_date,utin_other_lang_date,utin_since,utin_CRDR,utin_cash_CRDR,utin_status,"
                . "utin_history,utin_udhaar_int_amt,utin_udhaar_main_int_amt,utin_pay_int_acc_id,utin_main_inv_no) "
                . "VALUES ('$udhaarId','$userId','$firmId','$ownerId',"
                . "'$utinType','$transactionType','$payPreInvoiceNo',"
                . "'$payInvoiceNo','$userAccId','$accId',"
                . "'$payCashAccId','$payDiscountAccId','$payCashAmt',"
                . "'$payDiscountAmt','$utin_cash_balance','$payFinalPayableAmt',"
                . "'$payFinalPayableAmt','$LeftAmt','$LeftAmt','$udhaarOtherInfo',"
                . "'$payAddDate','$payOtherLangAddDate',$currentDateTime,'CR','CR','New',"
                . "'$udhaarDepositHistory','$payIntAmt','$_REQUEST[depositIntAmtMainEntry]','$udhaarDepIntRecAccId','$mainInvNo')";

       //echo '$UdhaarDepositQry == '.$UdhaarDepositQry.'</br>';

        if (!mysqli_query($conn, $UdhaarDepositQry)) {
            die("QUERY :" . $UdhaarDepositQry . "<br>" . 'Error: ' . mysqli_error($conn));
        }

        update_deposit_money($udhaarId, $udhaarId,$utinType);

        //Deposit Money into girvi_money_deposit Table
//        $qSelInvId = "SELECT SUM(udhadepo_amt) as total_prin_amt FROM udhaar_deposit where udhadepo_udhaar_id='$udhaarId'";
//        $resInvId = mysqli_query($conn, $qSelInvId);
//        $rowInvId = mysqli_fetch_array($resInvId, MYSQLI_ASSOC);
//        $udhadepo_id = $rowInvId['udhadepo_id'];
//        $udhadepoAMt = $rowInvId['total_prin_amt'];
//        $queryItem = "INSERT INTO udhaar_deposit (
//		udhadepo_udhaar_id, udhadepo_cust_id, udhadepo_own_id, udhadepo_firm_id,
//		udhadepo_amt, udhadepo_DOB,
//		udhadepo_upd_sts, udhadepo_comm, udhadepo_history,
//		udhadepo_ent_dat ,udhadepo_disc_amt) 
//		VALUES (
//		'$udhaarId','$custId', '$ownerId', '$firmId',
//		'$udhaarDepositAmount','$udhaarDepositDate',
//                'New', '$udhaarOtherInfo', '$udhaarDepositHistory',
//		$currentDateTime , '$udhaarDiscountAmount')";  //-----for Inserting Discount amount @AUTHOR: SHE19OCT15
//
//        if (!mysqli_query($conn, $queryItem)) {
//            die('Error: ' . mysqli_error($conn));
//        }
//        $qSelUdhaarId = "SELECT udhaar_amt FROM udhaar where udhaar_id='$udhaarId'";
//        $resUdhaarId = mysqli_query($conn, $qSelUdhaarId);
//        $rowUdhaarId = mysqli_fetch_array($resUdhaarId, MYSQLI_ASSOC);
//        $udhaarAmt = $rowUdhaarId['udhaar_amt'];
//
////******Start code for insert user_transaction entry:Author:SANT24MAR17
//        $qSelInvId = "SELECT udhadepo_id FROM udhaar_deposit where udhadepo_own_id='$ownerId' order by udhadepo_id desc LIMIT 0,1";
//        $resInvId = mysqli_query($conn, $qSelInvId);
//        $rowInvId = mysqli_fetch_array($resInvId, MYSQLI_ASSOC);
//        $udhadepo_id = $rowInvId['udhadepo_id'];
//        $utransOwnerId = $ownerId;
//        $utransFirmId = $firmId;
//        $utransUserId = $custId;
//        $utransType = 'UDHAAR DEPOSIT';
//        $utransTotAmtRec = $totalDepositAmt;
//        $utransDate = $udhaarDepositDate;
//        $utransDiscountAmt = $udhaarDiscountAmount;
//        $utransUtinId = $udhadepo_id;
//        $utransCashBalCrDr = 'CR';
//        $utransUniqueId = $udhaarId;
//        $utransBal = $udhaarAmt - $udhadepoAMt;
//        $utransPreInvoiceNo = 'UDP';
//        $transactionPanel = 'insert';
//        include 'omutranapi.php';
//******End code for insert user_transaction entry:Author:SANT24MAR17
//
        //Start Code to get Last Inserted Udhaar Dep Id
//        $qSelUdhaarDepId = "SELECT utin_id FROM  order by udhadepo_id desc";
//        $resUdhaarDepId = mysqli_query($conn, $qSelUdhaarDepId);
//        $rowUdhaarDepId = mysqli_fetch_array($resUdhaarDepId, MYSQLI_ASSOC);
//        $udhaarDepId = $rowUdhaarDepId['udhadepo_id'];
//        
        // IT WILL RETURN  DETAILS OF MAIN UDHAAR ENTRY
        parse_str(getTableValues("SELECT utin_id,utin_utin_id  FROM user_transaction_invoice"
                        . " ORDER BY utin_id DESC"));
        $udhaarDepId = $utin_id;
        //End Code to get Last Inserted Udhaar Id
        /*         * ****************Start code to add sys log var @Author:PRIYA14APR14*********************** */
        if ($utinType == 'MONEY') {
            $sslg_trans_sub = 'ADVANCE MONEY RETURN ADDED';
            $sysLogTransType = 'ADVANCE MONEY RETURN';
            $sslg_trans_comment = 'Advance Serial No: ' . $sysLogTransId . ', Advance Return Date: ' . $payAddDate . ',Advance Return Amount: ' . formatInIndianStyle($udhaarCashRecAmount);
        } else if ($utinType == 'scheme') {
            $sslg_trans_sub = 'SCHEME MONEY RETURN ADDED';
            $sysLogTransType = 'SCHEME MONEY RETURN';
            $sslg_trans_comment = 'Scheme Serial No: ' . $sysLogTransId . ', Scheme Return Date: ' . $payAddDate . ',Scheme Return Amount: ' . formatInIndianStyle($udhaarCashRecAmount);
        } else {
            $sslg_trans_sub = 'UDHAAR DEPOSIT ADDED';
            $sysLogTransType = 'Udhaar';
            $sslg_trans_comment = 'Udhaar Serial No: ' . $sysLogTransId . ', Udhaar Deposit Date: ' . $payAddDate . ',Udhaar Deposit Amount: ' . formatInIndianStyle($udhaarCashRecAmount);
        }

        /*         * ****************End code to add sys log var @Author:PRIYA14APR14*********************** */
//        $apiType = 'insert';
//        include 'omudpjrn.php';
        if ($utinType == 'MONEY' && ($utin_type == 'OnPurchase' || $utin_type == 'MONEY')) {
            $payCashAccId = $userAccId;
        } else if ($utinType == 'scheme') {
            $payCashAccId = $userAccId;
        } else {
            $payCashAccId = $accId;
        }
        $transApiType = "insert";
        include 'omusrtranjrnl.php';

        // Start Code Store Journal Id into User Transaction Table
         $query = "UPDATE user_transaction_invoice SET utin_jrnl_id='$jrnlId' "
                . "WHERE utin_id='$udhaarDepId' AND utin_owner_id='$_SESSION[sessionOwnerId]'";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
// End Code Store Journal Id into User Transaction Table
//    }
        /*         * ******************************************************************************************* */
        /*                START CODE To Insert Udhaar Deposit Money Journal Entry  @AUTHOR:PRIYA18AUG13           */
        /*         * ******************************************************************************************* */

        /*         * ******************************************************************************************* */
        /*                END CODE To Insert Udhaar Deposit Money Journal Entry  @AUTHOR:PRIYA18AUG13           */
        /*         * ******************************************************************************************* */

//    //Start Code to Check for Final Payment
//    $qSelAllUdhaarDepMon = "SELECT sum(udhadepo_amt) as total_deposit FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_cust_id='$custId' and udhadepo_udhaar_id='$udhaarId'";
//    $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon);
//    $rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC);
//
//    $udhaarTotalDepAmount = $rowUdhaarDepMon['total_deposit'];
//
//    $qSelAllUdhaar = "SELECT udhaar_amt FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId' and udhaar_id='$udhaarId' and udhaar_upd_sts IN ('New','Updated')";
//    $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
//    $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);
//    $udhaarAmount = $rowAllUdhaar['udhaar_amt'];
//
//    $udhaarComm = '<b>Total Udhaar Amount Paid. Udhaar Clear on ' . $udhaarDepositDate . '</b>.<br/>';
//
//    if ($udhaarAmount == $udhaarTotalDepAmount) {
//        $query = "UPDATE udhaar SET
//		udhaar_upd_sts='Deleted',
//		udhaar_comm='$udhaarComm'
//		WHERE udhaar_own_id = '$ownerId' and udhaar_id = '$udhaarId'";
//
//        if (!mysqli_query($conn, $query)) {
//            die('Error: ' . mysqli_error($conn));
//        }
//        //Start Code To Update udhaar_deposit status @Author:PRIYA30AUG13
//        $query = "UPDATE udhaar_deposit SET
//		udhadepo_upd_sts='Deleted'
//                WHERE udhadepo_own_id = '$ownerId' and udhadepo_udhaar_id = '$udhaarId'";
//
//        if (!mysqli_query($conn, $query)) {
//            die('Error: ' . mysqli_error($conn));
//        }
        //End Code To Update udhaar_deposit status @Author:PRIYA30AUG13
//        header("Location: $documentRoot/include/php/omuudetl.php?custId=$userId&firmId=$firmId&divMainMiddlePanel=Paid");
//    } else {
//        //End Code to Check for Final Payment
        if ($utinType == 'MONEY' || $utinType == 'scheme') {
            header("Location: $documentRoot/include/php/omamndtdv.php?custId=$userId&firmId=$firmId&divMainMiddlePanel=Added&showDivPanel=$showDivPanel"); //CODE ADDED TO SEND SHOW DIV PANEL NAME,@AUTHOR:HEMA-19JAN2021
        } else if ($utin_cash_balance == $payFinalPayableAmt) {//CODE ADDED TO REDIREACT TO PAID UDHAAR DETAIL LIST PANEL,@AUTHOR:HEMA-6AUG2020
            header("Location: $documentRoot/include/php/omuucpud.php?custId=$userId&firmId=$firmId&divMainMiddlePanel=Added&showDivPanel=$showDivPanel"); //CODE ADDED TO SEND SHOW DIV PANEL NAME,@AUTHOR:HEMA-19JAN2021
        } else {
            header("Location: $documentRoot/include/php/omuudetl.php?custId=$userId&firmId=$firmId&divMainMiddlePanel=Added&showDivPanel=$showDivPanel"); //CODE ADDED TO SEND SHOW DIV PANEL NAME,@AUTHOR:HEMA-19JAN2021
        }
//    }
    }
}

//require_once 'omssclin.php';
?>
