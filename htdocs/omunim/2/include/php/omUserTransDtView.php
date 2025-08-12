<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 12 Dec, 2019 1:18:08 PM
 *
 * @FileName: omUserTransDtView.php
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

//
$createView = "CREATE TABLE IF NOT EXISTS temp_user_trans_view (
utin_id                            INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
firm_name                          VARCHAR(10),
utin_user_id                       VARCHAR(50),
user_name                          VARCHAR(50),
user_scw_name                      VARCHAR(50),
user_city                          VARCHAR(50),
user_mobile                        VARCHAR(16),
amount_bal                         VARCHAR(50),
utin_gd_due_wt                     VARCHAR(20),
utin_sl_due_wt                     VARCHAR(20),
utin_st_due_wt                     VARCHAR(20))";

$sqlTable = 'DESC temp_user_trans_view';
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_user_trans_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}

$sqForUserTransInvDet = "SELECT utin.utin_id,utin.utin_user_id as 'utin_user_id',f.firm_name as 'firm_name',utin.utin_gd_due_wt as utin_gd_due_wt, "
        . "utin.utin_sl_due_wt as utin_sl_due_wt, utin.utin_st_due_wt as utin_st_due_wt, "
        . "CONCAT(UCASE(u.user_fname),' ',UCASE(u.user_lname)) as 'user_name',UCASE(SUBSTRING(u.user_father_name, 2)) as 'user_scw_name',"
        . "u.user_city as 'user_city',u.user_mobile as 'user_mobile' "
        . "FROM user_transaction_invoice as utin "
        . "INNER JOIN firm AS f ON utin.utin_firm_id=f.firm_id "
        . "LEFT JOIN user AS u ON utin.utin_user_id = u.user_id and (u.user_type='$userType')"
        . "WHERE utin.utin_user_id = u.user_id and u.user_type IN('CUSTOMER','SUPPLIER') and utin.utin_firm_id IN ($strFrmId) "
        . "and (utin.utin_status NOT IN ('Deleted') OR utin.utin_status IS NULL) and utin.utin_transaction_type IN ('ADV MONEY','DEPOSIT','RECEIPT','UDHAAR','OnPurchase','RECEIPT','PAYMENT') GROUP BY utin.utin_user_id";
        
//echo '$sqForUserTransInvDet=='.$sqForUserTransInvDet.'<br>';
$resForUserTransInvDet = mysqli_query($conn, $sqForUserTransInvDet) or die(mysqli_error($conn));
while ($rowForUserTransInvDet = mysqli_fetch_array($resForUserTransInvDet, MYSQLI_ASSOC)) {
    
    $utin_id = $rowForUserTransInvDet['utin_id'];
    $utin_user_id = $rowForUserTransInvDet['utin_user_id'];
    $firm_name = $rowForUserTransInvDet['firm_name'];
    $user_name = $rowForUserTransInvDet['user_name'];
    $user_scw_name = $rowForUserTransInvDet['user_scw_name'];
    $user_city = $rowForUserTransInvDet['user_city'];
    $user_mobile = $rowForUserTransInvDet['user_mobile'];
    $utin_st_due_wt = $rowForUserTransInvDet['utin_st_due_wt'];
    $utin_gd_due_wt = $rowForUserTransInvDet['utin_gd_due_wt'];
    $utin_sl_due_wt = $rowForUserTransInvDet['utin_sl_due_wt'];
    
    $amount_bal = 0;
    $gold_left = 0;
    $gold_bal = 0;
    $gold_dep = 0;
    $silver_left = 0;
    $silver_bal = 0;
    $silver_dep = 0;
    
    $sqSelTotUdhaarAmount = "SELECT SUM(abs(utin_cash_balance)) as udhaarAmt FROM user_transaction_invoice WHERE utin_user_id = '$utin_user_id'  and utin_type IN ('OnPurchase','UDHAAR','payment','udhaar') and utin_transaction_type IN ('UDHAAR','PAYMENT') and (utin_amt_pay_chk='' OR utin_amt_pay_chk IS NULL)";
    $resSelTotUdhaarAmount = mysqli_query($conn, $sqSelTotUdhaarAmount) or die(mysqli_error($conn));
    $rowTotUdhaarAmount = mysqli_fetch_array($resSelTotUdhaarAmount, MYSQLI_ASSOC);
    
    $sqSelTotAdvAmount = "SELECT SUM(abs(utin_cash_balance)) as advanceAmt FROM user_transaction_invoice WHERE utin_user_id = '$utin_user_id'  and utin_type IN('OnPurchase','Money','MONEY','udhaar') and utin_transaction_type IN ('DEPOSIT','ADV MONEY','RECEIPT') and (utin_amt_pay_chk='' OR utin_amt_pay_chk IS NULL)";
    $resSelTotAdvAmount = mysqli_query($conn, $sqSelTotAdvAmount) or die(mysqli_error($conn));
    $rowTotAdvAmount = mysqli_fetch_array($resSelTotAdvAmount, MYSQLI_ASSOC);
    
    $amount_bal = $rowTotUdhaarAmount['udhaarAmt'] - $rowTotAdvAmount['advanceAmt'];
    
    
    $inserIntoUserTransInvView = "insert into temp_user_trans_view(utin_id,utin_user_id,firm_name,user_name,user_scw_name,user_city,user_mobile,amount_bal, utin_gd_due_wt, utin_sl_due_wt, utin_st_due_wt)"
            . "values"
            . "('$utin_id','$utin_user_id',"
            . "'$firm_name','$user_name','$user_scw_name','$user_city','$user_mobile','$amount_bal','$utin_gd_due_wt','$utin_sl_due_wt','$utin_st_due_wt')";
    mysqli_query($conn, $inserIntoUserTransInvView) or die('<br/> ERROR:' . mysqli_error($conn));
}
?>