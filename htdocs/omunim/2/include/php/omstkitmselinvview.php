<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<?php 
//
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php 
$createTempView = "CREATE TABLE IF NOT EXISTS user_transaction_invoice_temp("
        . "utin_id                  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
        . "utin_pre_invoice_no      VARCHAR(50),"
        . "utin_invoice_no          INT,"
        . "utin_date                VARCHAR(12),"
        . "firm_name                VARCHAR(50),"
        . "user_fname               VARCHAR(100),"
        . "user_lname               VARCHAR(100),"
        . "utin_total_amt           VARCHAR(50),"
        . "utin_discount_amt_discup   VARCHAR(50),"
        . "utin_pay_tax_amt         VARCHAR(50),"
        . "utin_tot_payable_amt     VARCHAR(50),"
        . "utin_discount_amt        VARCHAR(50),"
        . "utin_cash_amt_rec        VARCHAR(50),"
        . "utin_pay_cheque_amt      VARCHAR(50),"
        . "utin_cash_balance        VARCHAR(50),"
        . "user_shop_name           VARCHAR(200),"
        . "user_cst_no              VARCHAR(50),"
        . "user_add                 VARCHAR(300),"
        . "user_mobile              VARCHAR(50),"
        . "user_city                VARCHAR(100),"
        . "user_state               VARCHAR(100),"
        . "user_pincode             VARCHAR(100),"
        . "sttr_id                  VARCHAR(50),"
        . "utin_pay_cgst_amt        VARCHAR(20),"
        . "utin_pay_sgst_amt        VARCHAR(20),"
        . "utin_pay_igst_amt        VARCHAR(20),"
        . "utin_pay_card_amt        VARCHAR(20),"
        . "user_id                  VARCHAR(20),"
        . "utin_type                VARCHAR(100))";

$sqlTable = "DESC user_transaction_invoice_temp";
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table user_transaction_invoice_temp";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createTempView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createTempView) or die('<br/> ERROR:' . mysqli_error($conn));
}
//
//
if ($staffId != '' && $array['CurrenetmonthAccess'] == 'true') {
    $StartDate = date("Y-m-01");
    $EndDate = date("Y-m-t");
    $sttrDateCondition = "and (STR_TO_DATE(sttr_add_date ,'%d %b %Y') BETWEEN '$StartDate' and '$EndDate')";
    $utinDateCondition = "and (STR_TO_DATE(utin_date ,'%d %b %Y') BETWEEN '$StartDate' and '$EndDate')";
} else {
    $sttrDateCondition = "";
    $utinDateCondition = "";
}
//
//
$selectUser_transaction = "SELECT * FROM user_transaction_invoice WHERE utin_firm_id IN($strFrmId) AND utin_type IN ('imitation','RetailStock') AND "
        . " utin_transaction_type IN('sell','ESTIMATESELL') $staffStr $utinDateCondition";
//echo '$selectUser_transaction=='.$selectUser_transaction.'<br>';
$queryUser_transaction = mysqli_query($conn, $selectUser_transaction);

while($resUserTransaction = mysqli_fetch_array($queryUser_transaction, MYSQLI_ASSOC)){
    $utin_id = $resUserTransaction['utin_id'];
    $utin_pre_invoice_no = $resUserTransaction['utin_pre_invoice_no'];
    $utin_invoice_no = $resUserTransaction['utin_invoice_no'];
    $utin_date = $resUserTransaction['utin_date'];
    $utin_total_amt = $resUserTransaction['utin_total_amt'];
    $utin_discount_amt_discup = $resUserTransaction['utin_discount_amt_discup'];
    $utin_pay_tax_amt = $resUserTransaction['utin_pay_tax_amt'];
    $utin_tot_payable_amt = $resUserTransaction['utin_tot_payable_amt'];
    $utin_discount_amt = $resUserTransaction['utin_discount_amt'];
    $utin_cash_amt_rec = $resUserTransaction['utin_cash_amt_rec'];
    $utin_pay_cheque_amt = $resUserTransaction['utin_pay_cheque_amt'];
    $utin_cash_balance = $resUserTransaction['utin_cash_balance'];
    $utin_firm_id = $resUserTransaction['utin_firm_id'];
    $utin_user_id = $resUserTransaction['utin_user_id'];
    $utin_pay_cgst_amt = $resUserTransaction['utin_pay_cgst_amt'];
    $utin_pay_sgst_amt = $resUserTransaction['utin_pay_sgst_amt'];
    $utin_pay_igst_amt = $resUserTransaction['utin_pay_igst_amt'];
    $utin_pay_card_amt = $resUserTransaction['utin_pay_card_amt'];
    $utin_type = $resUserTransaction['utin_type'];
    
    $selectUser = "SELECT * FROM user WHERE user_id='$utin_user_id'";
    $queryUser = mysqli_query($conn, $selectUser);
    
    while($resUser = mysqli_fetch_array($queryUser, MYSQLI_ASSOC)){
        $user_fname = $resUser['user_fname'];
        $user_lname = $resUser['user_lname'];
        $user_add = $resUser['user_add'];
        $user_mobile = $resUser['user_mobile'];
        $user_city = $resUser['user_city'];
        $user_state = $resUser['user_state'];
        $user_pincode = $resUser['user_pincode'];
        $user_cst_no = $resUser['user_cst_no'];
    }
    //
    $selectFirmDetails = "SELECT * FROM firm WHERE firm_id='$utin_firm_id'";
    $queryFirm = mysqli_query($conn, $selectFirmDetails);
    
    while($resFirmDetails = mysqli_fetch_array($queryFirm, MYSQLI_ASSOC)){
        $firm_name = $resFirmDetails['firm_name'];
        $firm_long_name = $resFirmDetails['firm_long_name'];
    }
    //
    //
    $selectSttrDetails = "SELECT sttr_id from stock_transaction WHERE sttr_utin_id='$utin_id' AND sttr_user_id='$utin_user_id'";
    $querySelectSttr = mysqli_query($conn, $selectSttrDetails);
    
    while($resSelectSttr = mysqli_fetch_array($querySelectSttr, MYSQLI_ASSOC)){
        $sttr_id = $resSelectSttr['sttr_id'];
        
    }
    //
    //
    $insertUserTransaction = "INSERT INTO user_transaction_invoice_temp(utin_id, utin_pre_invoice_no, utin_invoice_no, utin_date, firm_name, user_fname, user_lname,"
            . "utin_total_amt, utin_discount_amt_discup, utin_pay_tax_amt, utin_tot_payable_amt, utin_discount_amt, utin_cash_amt_rec, utin_pay_cheque_amt,utin_cash_balance,"
            . " user_shop_name, user_cst_no, user_add, user_mobile, user_city, user_state, user_pincode, sttr_id, utin_pay_cgst_amt,utin_pay_sgst_amt,utin_pay_igst_amt,"
            . "utin_pay_card_amt,user_id,utin_type)"
            . "VALUES"
            . "('$utin_id','$utin_pre_invoice_no','$utin_invoice_no','$utin_date','$firm_name','$user_fname','$user_lname','$utin_total_amt','$utin_discount_amt_discup',"
            . "'$utin_pay_tax_amt','$utin_tot_payable_amt','$utin_discount_amt','$utin_cash_amt_rec','$utin_pay_cheque_amt','$utin_cash_balance','$firm_long_name',"
            . "'$user_cst_no','$user_add','$user_mobile','$user_city','$user_state','$user_pincode','$sttr_id','$utin_pay_cgst_amt','$utin_pay_sgst_amt','$utin_pay_igst_amt',"
            . "'$utin_pay_card_amt','$utin_user_id','$utin_type')";
    
    mysqli_query($conn, $insertUserTransaction) or die('<br/> ERROR:' . mysqli_error($conn));
}
?>

