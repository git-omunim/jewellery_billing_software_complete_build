<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 11 Jan, 2020 6:20:14 PM
 *
 * @FileName: omSchemeClosedSchView.php
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
$createView = "CREATE TABLE IF NOT EXISTS temp_closed_kitty_list_view (
kitty_id                            INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
kitty_firm_id                       INTEGER,
kitty_pre_serial_num                VARCHAR(5),
kitty_serial_num                    INTEGER,
kitty_token_num                     INTEGER,
kitty_barcode                       VARCHAR(50),
kitty_scheme                        VARCHAR(100),
firm_name                           VARCHAR(10),
kitty_cust_id                       VARCHAR(50),
user_fname                          VARCHAR(50),
user_lname                          VARCHAR(50),
user_mobile                         VARCHAR(16),
kitty_DOB                           VARCHAR(50),
kitty_end_DOB                           VARCHAR(50),
kitty_close_date                    VARCHAR(50),
kitty_bonus_amt                     FLOAT,
kitty_paid_bonus_amt		    FLOAT,
kitty_tot_paid_amt                  VARCHAR(30),
kitty_settled_inv_no                VARCHAR(40),
kitty_staff_name                    VARCHAR(40))";

$sqlTable = 'DESC temp_closed_kitty_list_view';
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_closed_kitty_list_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}




$sqForClosedKittyDet = "SELECT kitty_id,kitty_firm_id,kitty_cust_id,firm_name,user_fname,user_lname,user_mobile,"
        . "kitty_pre_serial_num,kitty_serial_num,kitty_barcode,kitty_token_num,kitty_scheme,kitty_DOB,kitty_paid_bonus_amt,"
        . "kitty_Close_Date,kitty_bonus_amt FROM kitty as k "
        . "INNER JOIN firm AS f ON k.kitty_firm_id=f.firm_id "
        . "LEFT JOIN user AS u ON k.kitty_cust_id = u.user_id "
        . "WHERE k.kitty_firm_id IN ($strFrmId) and (k.kitty_final_sts IN ('PaymentDone') or kitty_upd_sts IN ('Released'))";


$resForClosedKittyDet = mysqli_query($conn, $sqForClosedKittyDet) or die(mysqli_error($conn));
while ($rowForClosedKittyDet = mysqli_fetch_array($resForClosedKittyDet, MYSQLI_ASSOC)) {

    $kitty_id = $rowForClosedKittyDet['kitty_id'];
    $kitty_firm_id = $rowForClosedKittyDet['kitty_firm_id'];
    $kitty_cust_id = $rowForClosedKittyDet['kitty_cust_id'];
    $firm_name = $rowForClosedKittyDet['firm_name'];
    $user_fname = $rowForClosedKittyDet['user_fname'];
    $user_lname = $rowForClosedKittyDet['user_lname'];
    $user_mobile = $rowForClosedKittyDet['user_mobile'];
    $kitty_pre_serial_num = $rowForClosedKittyDet['kitty_pre_serial_num'];
    $kitty_serial_num = $rowForClosedKittyDet['kitty_serial_num'];
    $kitty_barcode = $rowForClosedKittyDet['kitty_barcode'];
    $kitty_scheme = $rowForClosedKittyDet['kitty_scheme'];
    $kitty_DOB = $rowForClosedKittyDet['kitty_DOB'];
    $kitty_token_num = $rowForClosedKittyDet['kitty_token_num'];
    $kitty_close_date = $rowForClosedKittyDet['kitty_Close_Date'];
    $kitty_paid_bonus_amt = $rowForClosedKittyDet['kitty_paid_bonus_amt'];
    $kitty_bonus_amt = $rowForClosedKittyDet['kitty_bonus_amt'];
    //
    $kitty_tot_paid_amt = 0; // TOTAL PAID EMI AMOUNT.
    //
    // GET DUE EMI COUNT 
    $sqSelDueEMICount = "SELECT kitty_mondep_id FROM kitty_money_deposit where kitty_mondep_EMI_status IN ('Due') AND kitty_mondep_kitty_id= '$kitty_id'";
    $resSelDueEMICount = mysqli_query($conn, $sqSelDueEMICount) or die(mysqli_error($conn));
    $noOfDueEMI = mysqli_num_rows($resSelDueEMICount);

    if ($noOfDueEMI > 2) {
        $kitty_status = "DUE";
    } else {
        $kitty_status = "PAID";
    }

    // GET TOTAL PAID EMI AMOUNT
    $sqSelPaidEMIAmount = "SELECT SUM(kitty_paid_amt) AS totalPaidAmount FROM kitty_money_deposit where kitty_mondep_EMI_status IN ('Paid') AND kitty_mondep_kitty_id='$kitty_id'";
    $resSelPaidEMIAmount = mysqli_query($conn, $sqSelPaidEMIAmount) or die(mysqli_error($conn));
    $rowPaidEMIAmount = mysqli_fetch_array($resSelPaidEMIAmount, MYSQLI_ASSOC);
    $kitty_tot_paid_amt = $rowPaidEMIAmount['totalPaidAmount'];

    if (($kitty_bonus_amt > 0 && $kitty_paid_bonus_amt <= 0) && ($noOfDueEMI == 0)) {
        $kitty_paid_bonus_amt = $kitty_bonus_amt;
    }

    // GET SELL BILL NUMBER
    $sqSelUTransId = "SELECT utin_amt_settled_inv_id FROM user_transaction_invoice where utin_utin_id='$kitty_id' and utin_type='scheme' and utin_owner_id='$_SESSION[sessionOwnerId]'";
    $resSelUTransId = mysqli_query($conn, $sqSelUTransId) or die(mysqli_error($conn));
    $rowSellUTransId = mysqli_fetch_array($resSelUTransId, MYSQLI_ASSOC);
    $utin_amt_settled_inv_id = $rowSellUTransId['utin_amt_settled_inv_id'];

    $sqSelSellInvNo = "SELECT utin_pre_invoice_no,utin_invoice_no FROM user_transaction_invoice where utin_id='$utin_amt_settled_inv_id' and utin_owner_id='$_SESSION[sessionOwnerId]'";
    $resSelSellInvNo = mysqli_query($conn, $sqSelSellInvNo) or die(mysqli_error($conn));
    $rowSellInvNo = mysqli_fetch_array($resSelSellInvNo, MYSQLI_ASSOC);
    $kitty_settled_inv_no = $rowSellInvNo['utin_pre_invoice_no'] . $rowSellInvNo['utin_invoice_no'];

    // START CODE FOR GET KITTY START STAFF NAME  @AUTHOR:GANGADHAR 09-MARCH-2020
    $sqstaff = "SELECT user_fname FROM kitty join user AS u ON u.user_id = kitty_staff_id where kitty_id ='$kitty_id'";
    $resstaff = mysqli_query($conn, $sqstaff) or die(mysqli_error($conn));
    $staffname = mysqli_fetch_array($resstaff, MYSQLI_ASSOC);
    $kitty_staff_name = $staffname['user_fname'];
    //    END CODE FOR GET KITTY START STAFF NAME @AUTHOR:GAGNADAHR09-MARCH-2020
    //    
    //START CODE FOR CASH RETURN  PAID AMOUNT  OR NOT PAID SHOW STATUS RETUNR, PENDING,BILL NO  @AUTHOR :GANGADHAR 21FEB2020
    $sqSelSellInvNo = "SELECT * FROM user_transaction_invoice where utin_utin_id='$kitty_id'";
    $resSelSellInvNo = mysqli_query($conn, $sqSelSellInvNo) or die(mysqli_error($conn));
    $rowSellInvNo = mysqli_fetch_array($resSelSellInvNo, MYSQLI_ASSOC);
    $utin_cash_amt_rec = $rowSellInvNo['utin_cash_amt_rec'] + $rowSellInvNo['utin_pay_cheque_amt'] + $rowSellInvNo['utin_pay_card_amt'] + $rowSellInvNo['utin_online_pay_amt'];
    //
    if ($utin_cash_amt_rec > 0) {
        $kitty_settled_inv_no = "RETURN";
    } else if ($kitty_settled_inv_no) {
        $kitty_settled_inv_no = $kitty_settled_inv_no;
    } else {
        $kitty_settled_inv_no = " ";
    }
    //    END  STATUS  CODE FOR CASH RETURN  PAID AMOUNT  OR NOT PAID SHOW STATUS RETUNR, PENDING,BILL NO  @AUTHOR :GANGADHAR 21FEB2020
    //
    $inserIntoClosedKittyListView = "insert into temp_closed_kitty_list_view("
            . "kitty_id,kitty_firm_id,kitty_cust_id,firm_name,user_fname,user_lname,user_mobile,"
            . "kitty_pre_serial_num,kitty_serial_num,kitty_barcode,kitty_scheme,kitty_token_num,"
            . "kitty_DOB,kitty_tot_paid_amt,kitty_bonus_amt,kitty_paid_bonus_amt,kitty_close_date,kitty_settled_inv_no,kitty_staff_name)values("
            . "'$kitty_id','$kitty_firm_id','$kitty_cust_id','$firm_name','$user_fname','$user_lname','$user_mobile',"
            . "'$kitty_pre_serial_num','$kitty_serial_num','$kitty_barcode','$kitty_scheme','$kitty_token_num',"
            . "'$kitty_DOB','$kitty_tot_paid_amt','$kitty_bonus_amt','$kitty_paid_bonus_amt','$kitty_close_date','$kitty_settled_inv_no','$kitty_staff_name')";
    //
    mysqli_query($conn, $inserIntoClosedKittyListView) or die('<br/> ERROR:' . mysqli_error($conn));
}
?>