<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 11 Jan, 2020 1:43:45 PM
 *
 * @FileName: omSchemeCurrentSchView.php
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
$createView = "CREATE TABLE IF NOT EXISTS temp_current_kitty_list_view (
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
kitty_end_date                      VARCHAR(50),
kitty_EMI_tot_amt                   INTEGER,
kitty_bonus_amt                     INTEGER,
kitty_EMI_amt                       INTEGER,
kitty_paid_emi_count                INTEGER,
kitty_tot_paid_amt                  VARCHAR(30),
kitty_status                        VARCHAR(10),
kitty_dep_metal_wt                  VARCHAR(16),
kitty_metal_type                    VARCHAR(16),
kitty_staff_name                    VARCHAR(10))";

$sqlTable = 'DESC temp_current_kitty_list_view';
mysqli_query($conn, $sqlTable);
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_current_kitty_list_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}

$sqForCurrentKittyDet = "SELECT kitty_id,kitty_firm_id,kitty_cust_id,firm_name,user_fname,user_lname,user_mobile,"
        . "kitty_pre_serial_num,kitty_serial_num,kitty_barcode,kitty_token_num,kitty_scheme,kitty_DOB,kitty_end_DOB,"
        . "kitty_EMI_tot_amt,kitty_EMI_amt,kitty_dep_metal_wt,kitty_metal_type "
        . "FROM kitty as k "
        . "INNER JOIN firm AS f ON k.kitty_firm_id=f.firm_id "
        . "LEFT JOIN user AS u ON k.kitty_cust_id = u.user_id "
        . "WHERE k.kitty_firm_id IN ($strFrmId) and k.kitty_final_sts IN ('pending') and k.kitty_upd_sts!='Released'";



$resForCurrentKittyDet = mysqli_query($conn, $sqForCurrentKittyDet, $totalInstallment) or die(mysqli_error($conn));

while ($rowForCurrentKittyDet = mysqli_fetch_array($resForCurrentKittyDet, MYSQLI_ASSOC)) {

    $kitty_id = $rowForCurrentKittyDet['kitty_id'];
    $kitty_firm_id = $rowForCurrentKittyDet['kitty_firm_id'];
    $kitty_cust_id = $rowForCurrentKittyDet['kitty_cust_id'];
    $firm_name = $rowForCurrentKittyDet['firm_name'];
    $user_fname = $rowForCurrentKittyDet['user_fname'];
    $user_lname = $rowForCurrentKittyDet['user_lname'];
    $user_mobile = $rowForCurrentKittyDet['user_mobile'];
    $kitty_pre_serial_num = $rowForCurrentKittyDet['kitty_pre_serial_num'];
    $kitty_serial_num = $rowForCurrentKittyDet['kitty_serial_num'];
    $kitty_barcode = $rowForCurrentKittyDet['kitty_barcode'];
    $kitty_scheme = $rowForCurrentKittyDet['kitty_scheme'];
    $kitty_DOB = $rowForCurrentKittyDet['kitty_DOB'];
    $kitty_end_date = $rowForCurrentKittyDet['kitty_end_DOB'];
    $kitty_EMI_tot_amt = $rowForCurrentKittyDet['kitty_EMI_tot_amt'];
    $kitty_EMI_amt = $rowForCurrentKittyDet['kitty_EMI_amt'];
    $kitty_token_num = $rowForCurrentKittyDet['kitty_token_num'];
    $kitty_dep_metal_wt = $rowForCurrentKittyDet['kitty_dep_metal_wt'];
    $kitty_metal_type = $rowForCurrentKittyDet['kitty_metal_type'];


    $kitty_bonus_amt = 0;
    $kitty_tot_paid_amt = 0; // TOTAL PAID EMI AMOUNT.
    //
    //
    // GET DUE EMI COUNT 
    $sqSelDueEMICount = "SELECT kitty_mondep_id FROM kitty_money_deposit where kitty_mondep_EMI_status IN ('Due') AND kitty_mondep_kitty_id= '$kitty_id'";
    $resSelDueEMICount = mysqli_query($conn, $sqSelDueEMICount) or die(mysqli_error($conn));
    $noOfDueEMI = mysqli_num_rows($resSelDueEMICount);
    if ($noOfDueEMI > 2)
        $kitty_status = "DUE";
    else
        $kitty_status = "PAID";

    //  GET SCHEME TOTAL INSTALLMENTS @AUTHOR:GANGADHAR 07-MARCH-2020
    $sqSelPaidEMICount = "SELECT kitty_mondep_id FROM kitty_money_deposit where kitty_mondep_EMI_status IN ('Paid') AND kitty_mondep_kitty_id= '$kitty_id'";
    $resSelPaidEMICount = mysqli_query($conn, $sqSelPaidEMICount) or die(mysqli_error($conn));
    $noOfPaidEMI = mysqli_num_rows($resSelPaidEMICount);
    $kitty_paid_emi_count = $noOfPaidEMI;
    //    END CODE SCHEME TOTAL INSTALLMENTS @AUTHOR:GAGNADAHR07-MARCH-2020
    //   
    //      
    //          
    // GET TOTAL PAID EMI AMOUNT
    $sqSelPaidEMIAmount = "SELECT SUM(kitty_paid_amt) AS totalPaidAmount FROM kitty_money_deposit where kitty_mondep_EMI_status IN ('Paid') AND kitty_mondep_kitty_id='$kitty_id'";
//    echo $sqSelPaidEMIAmount.'<br/>';
    $resSelPaidEMIAmount = mysqli_query($conn, $sqSelPaidEMIAmount) or die(mysqli_error($conn));
    $rowPaidEMIAmount = mysqli_fetch_array($resSelPaidEMIAmount, MYSQLI_ASSOC);
    $kitty_tot_paid_amt = $rowPaidEMIAmount['totalPaidAmount'];

    if ($kitty_bonus_amt > 0) {
        $kitty_tot_paid_amt += $kitty_bonus_amt;
    }
    // START CODE FOR GET KITTY START STAFF NAME  @AUTHOR:GANGADHAR 09-MARCH-2020
    $sqstaff = "SELECT * FROM kitty  join user AS u ON u.user_id = kitty_staff_id where kitty_id ='$kitty_id'";
    $resstaff = mysqli_query($conn, $sqstaff) or die(mysqli_error($conn));
    $staffname = mysqli_fetch_array($resstaff, MYSQLI_ASSOC);
    $kitty_staff_name = $staffname['user_fname'];
    //    END CODE FOR GET KITTY START STAFF NAME @AUTHOR:GAGNADAHR09-MARCH-2020

    $inserIntoCurrentKittyListView = "insert into temp_current_kitty_list_view("
            . "kitty_id,kitty_firm_id,kitty_cust_id,firm_name,user_fname,user_lname,user_mobile,"
            . "kitty_pre_serial_num,kitty_serial_num,kitty_barcode,kitty_scheme,kitty_token_num,"
            . "kitty_DOB,kitty_end_date,kitty_EMI_tot_amt,kitty_EMI_amt,kitty_status,"
            . "kitty_paid_emi_count,kitty_tot_paid_amt,kitty_bonus_amt,kitty_staff_name,kitty_dep_metal_wt,kitty_metal_type)values("
            . "'$kitty_id','$kitty_firm_id','$kitty_cust_id','$firm_name','$user_fname','$user_lname','$user_mobile',"
            . "'$kitty_pre_serial_num','$kitty_serial_num','$kitty_barcode','$kitty_scheme','$kitty_token_num',"
            . "'$kitty_DOB','$kitty_end_date','$kitty_EMI_tot_amt','$kitty_EMI_amt',"
            . "'$kitty_status','$kitty_paid_emi_count','$kitty_tot_paid_amt','$kitty_bonus_amt','$kitty_staff_name','$kitty_dep_metal_wt','$kitty_metal_type')";
//    echo $inserIntoCurrentKittyListView.'<br/>';
    mysqli_query($conn, $inserIntoCurrentKittyListView) or die('<br/> ERROR:' . mysqli_error($conn));
}
?>