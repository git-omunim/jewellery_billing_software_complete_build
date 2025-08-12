<?php

/*
 * **************************************************************************************
 * @tutorial: IMPORT OPTIONS : AUTHOR @ RENUKA 19 OCT 2022
 * **************************************************************************************
 * 
 * Created on 19 OCT 2022
 *
 * @FileName:  omTallyImportInvoices.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:.com
 * @All rights reserved  info@softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php

// *************************************************************************************************************
// START CODE FOR IMPORT DATA @RENUKA OCT_2022
// *************************************************************************************************************
$firmid = $_SESSION['setFirmSession'];
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$qSelFirmDetails = "SELECT firm_id, firm_own_id, firm_name, firm_address, firm_city, firm_long_name, firm_phone_details, firm_email, firm_tin_no from "
        . "firm where firm_own_id = '$sessionOwnerId' and firm_id = '$firmid' ";
$resFirmDetails = mysqli_query($conn, $qSelFirmDetails) or die(mysqli_error($conn));
while ($resFirmData = mysqli_fetch_array($resFirmDetails, MYSQLI_ASSOC)) {
//print_r($resFirmData);
    $sellerGST = $resFirmData['firm_tin_no'];
    $firmname = $resFirmData['firm_name'];
    $sellerName = $resFirmData['firm_long_name'];
    $sellerAddress = $resFirmData['firm_address'];
    $sellerCity = $resFirmData['firm_city'];
    $sellerMobNo = $resFirmData['firm_phone_details'];
    $sellerEmail = $resFirmData['firm_email'];
    $firm_id = $resFirmData['firm_id'];
}
?>
<?php

if (isset($_POST['submit'])) {
    if (isset($_FILES['userUploadedFile']['name']) && $_FILES['userUploadedFile']['name'] != "") {
        $allowedExtensions = array("xls", "xlsx");
// Return the extension of the file
        $ext = pathinfo($_FILES['userUploadedFile']['name'], PATHINFO_EXTENSION);
        if (in_array($ext, $allowedExtensions)) {
            $isUploaded = $_FILES['userUploadedFile']['tmp_name'];
            if ($isUploaded) {
                include "PHPExcel/Classes/PHPExcel/IOFactory.php";

                try {
                    $objPHPExcel = PHPExcel_IOFactory::load($isUploaded);
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($isUploaded, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                }

                $phpspreadsheet = $objPHPExcel->getSheet(0);
                $total_products = $phpspreadsheet->getHighestRow();

                $highest_column = $phpspreadsheet->getHighestColumn();
                for ($row = 1; $row <= 3; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    if ($row == 1)
                        $firm_name = $userDataAll[0][0];
                }
                $firm_id = 0;
                parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$sessionOwnerId' and firm_name = '$firm_name' "));
                $f_id = $firm_id;
               //
                $count = 0;
                $i = 0;
                for ($row = 6; $row <= $total_products; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                     $excel_date = $userDataAll[0][0]; //here is that value 41621 or 41631
                    $unix_date = ($excel_date - 25569) * 86400;
                    $excel_date = 25569 + ($unix_date / 86400);
                    $unix_date = ($excel_date - 25569) * 86400;
                    if ($excel_date == '') {
                        $date = "";
                        $count = $count + 1;
                    } else {
                        $date = gmdate("d M Y", $unix_date);
                        $date = strtoupper($date);
                        $count = 0;
                    }
                    if ($count == 0) {
                        $user_name = $userDataAll[0][1];
                        $vouchertype = $userDataAll[0][6];
                        $voucherno = $userDataAll[0][7];
                        if ($vouchertype == 'Sales') {
                            $Pinvoiceno = 'ISS';
                            $utin_transaction_type = "sell";
                            $totinvamt = $userDataAll[0][8];
                        } else if ($vouchertype == 'Purchase') {
                            $Pinvoiceno = 'IPS';
                            $utin_transaction_type = "PURBYSUPP";
                            $totinvamt = $userDataAll[0][9];
                        } else if ($vouchertype == 'Debit Note') {
                            $Pinvoiceno = 'IPR';
                            $utin_transaction_type = "PurchaseReturn";
                            $totinvamt = $userDataAll[0][8];
                        } else if ($vouchertype == 'Credit Note') {
                            $Pinvoiceno = 'IPR';
                            $utin_transaction_type = "ItemReturn";
                            $totinvamt = $userDataAll[0][9];
                        } else if ($vouchertype == 'Receipt') {
                            $Pinvoiceno = 'LR';
                            $depositamt = $userDataAll[0][9];
                        } else if ($vouchertype == 'Payment') {
                            $Pinvoiceno = 'LP';
                            $loanamt = $userDataAll[0][8];
                        }
                        $invoiceno = $userDataAll[0][7];
                        $qSelCustomerDetails = "SELECT * FROM user WHERE user_owner_id = '$sessionOwnerId' and user_firm_id = '$f_id' and user_fname='$user_name' ";
                        $resCustomerDetails = mysqli_query($conn, $qSelCustomerDetails) or die(mysqli_error($conn));
                        while ($resCustomerData = mysqli_fetch_array($resCustomerDetails, MYSQLI_ASSOC)) {
                            $userid = $resCustomerData['user_id'];
                            $custAddress = $resCustomerData['user_add'];
                            $custCity = $resCustomerData['user_city'];
                            $custPinCode = $resCustomerData['user_pincode'];
                            $custState = $resCustomerData['user_state'];
                        }
                        //********************************************************************************************************************************************//
                        $girvi = "SELECT * FROM girvi WHERE girv_voucher_no = '$voucherno' ";
                        //echo $qSelCustomerDetails;
                        $resgirvi = mysqli_query($conn, $girvi) or die(mysqli_error($conn));
                        $rowgirvi = mysqli_num_rows($resgirvi);
                        //*********************************************************************************************************************************************//
                        $girvi_money = "SELECT * FROM girvi_money_deposit WHERE girv_mondep_voucher_no = '$voucherno' ";
                        //echo $qSelCustomerDetails;
                        $recgirvi_money = mysqli_query($conn, $girvi_money) or die(mysqli_error($conn));
                        $rowgirvi_money = mysqli_num_rows($recgirvi_money);
                        //*********************************************************************************************************************************************//
                        $invoice = "SELECT * FROM user_transaction_invoice WHERE utin_transaction_type = '$utin_transaction_type' and utin_tally_voucher_no = '$voucherno' ";
                        //echo $qSelCustomerDetails;
                        $resinvoice = mysqli_query($conn, $invoice) or die(mysqli_error($conn));
                        $rowinvoice = mysqli_num_rows($resinvoice);
                        //*********************************************************************************************************************************************//
                         $stockdetails = "SELECT * FROM stock_transaction WHERE sttr_transaction_type = '$utin_transaction_type' and sttr_voucher_no = '$voucherno' ";
                        //echo $qSelCustomerDetails;
                        $resstocks= mysqli_query($conn, $stockdetails) or die(mysqli_error($conn));
                        $stockdata = mysqli_num_rows($resstocks);
                        
                        //*********************************************************************************************************************************************//

                        if ($vouchertype == 'Payment') {
                            if ($rowgirvi == 0) {
                                $sql = "INSERT INTO girvi (girv_own_id,girv_serial_num,girv_cust_id, girv_firm_id, girv_type,girv_cust_fname,girv_cust_Address,girv_cust_city,girv_main_prin_amt,"
                                        . "girv_prin_amt,girv_DOB,girv_voucher_no) "
                                        . "VALUES ( '" . $sessionOwnerId . "','" . $voucherno . "' , '" . $userid . "','" . $f_id . "','UnSec.Loan','" . $user_name . "'"
                                        . ",'" . $custAddress . "','" . $custCity . "','" . $loanamt . "','" . $loanamt . "','" . $date . "','" . $voucherno . "') ";

                                $result = mysqli_query($conn, $sql);
                            } else {
                                
                            }
                        } else if ($vouchertype == 'Receipt') {
                            if ($rowgirvi_money == 0) {
                                $sql = "INSERT INTO girvi_money_deposit (girv_mondep_own_id,girv_mondep_cust_id, girv_mondep_firm_id, girv_mondep_upd_sts,girv_mondep_prin_amt,girv_mondep_date,girv_mondep_oamt,girv_mondep_cash_paid_amt,girv_mondep_voucher_no) "
                                        . "VALUES ( '" . $sessionOwnerId . "','" . $userid . "','" . $f_id . "','Deposit','" . $depositamt . "','" . $date . "','" . $depositamt . "','" . $depositamt . "','" . $voucherno . "') ";

                                $result = mysqli_query($conn, $sql);
                            } else {
                               
                            }
                        } else {
                            if ($rowinvoice == 0) {
                                $sql = "INSERT INTO user_transaction_invoice (utin_owner_id,utin_user_id, utin_firm_id, utin_billing_name,utin_pre_invoice_no,utin_invoice_no,utin_transaction_type,utin_total_amt,utin_tot_payable_amt,utin_total_taxable_amt,utin_pay_sgst_amt,utin_pay_cgst_amt,utin_pay_igst_amt ,utin_date,utin_tally_voucher_no)"
                                        . " VALUES ( '" . $sessionOwnerId . "', '" . $userid . "','" . $f_id . "','" . $user_name . "','" . $Pinvoiceno . "','" . $invoiceno . "','" . $utin_transaction_type . "','" . $totinvamt . "','" . $totinvamt . "','','','','','" . $date . "','" . $voucherno . "') ";
                                $result = mysqli_query($conn, $sql);
                            } else {
                                
                            }
                        }
                        parse_str(getTableValues("SELECT utin_id,utin_user_id FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId' and utin_firm_id = '$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' "));
                        $utinid = $utin_id;
                        $userid = $utin_user_id;
                    } else if ($count == 2) {
                        $transactiontype = $userDataAll[0][1];
                        if ($transactiontype == 'Sales Accounts') {
                            if ($userDataAll[0][9] == '') {
                                $taxableamtcr = $userDataAll[0][8];
                            }
                            $taxableamt = $userDataAll[0][9];
                        }if ($transactiontype == 'Purchase Accounts') {
                            if ($userDataAll[0][8] == '') {
                                $taxableamtdr = $userDataAll[0][9];
                            }
                            $taxableamt = $userDataAll[0][8];
                        }
                        $sql = "update user_transaction_invoice SET utin_total_taxable_amt='$taxableamt' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' ";
                        $result = mysqli_query($conn, $sql);
                        $sql = "update user_transaction_invoice SET utin_total_taxable_amt='$taxableamtcr' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' and utin_transaction_type='ItemReturn'";
                        $result = mysqli_query($conn, $sql);
                        $sql = "update user_transaction_invoice SET utin_total_taxable_amt='$taxableamtdr' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' and utin_transaction_type='PurchaseReturn'";
                        $result = mysqli_query($conn, $sql);
                        //
                    }
                    if ($count > 2 && $userDataAll[0][4] != "") {
                        $itemname = $userDataAll[0][1];
                        $itemqty = $userDataAll[0][2];
                        $itemval = $userDataAll[0][4];
                        if ($itemqty != 0) {
                            $itemrate = $itemval / $itemqty;
                            $itemrate = round($itemrate, 2);
                        }
                       if ($stockdata == 0) {
                        $sql = "INSERT INTO stock_transaction (sttr_utin_id,sttr_user_id,sttr_owner_id, sttr_firm_id,sttr_user_billing_name,sttr_pre_invoice_no,sttr_invoice_no,sttr_transaction_type,sttr_item_name,sttr_gs_weight,sttr_metal_rate,sttr_valuation,sttr_final_valuation,sttr_voucher_no)"
                                . " VALUES ( '" . $utinid . "','" . $userid . "','" . $sessionOwnerId . "', '" . $f_id . "','" . $user_name . "','" . $Pinvoiceno . "','" . $invoiceno . "','" . $utin_transaction_type . "','" . $itemname . "','" . $itemqty . "','" . $itemrate . "','" . $itemval . "','" . $itemval . "','" . $voucherno . "')";
                        $result = mysqli_query($conn, $sql);
                         }
                    } else if ($count > 2 && $userDataAll[0][4] == "") {
                        if ($vouchertype == 'Sales') {

                            $gst = $userDataAll[0][1];
                            $gstcharges = $userDataAll[0][9];
                        } else if ($vouchertype == 'Credit Note') {
                            $gstchargescr = $userDataAll[0][8];
                        } else if ($vouchertype == 'Purchase') {

                            $gst = $userDataAll[0][1];
                            $gstcharges = $userDataAll[0][8];
                        } else if ($vouchertype == 'Debit Note') {
                            $gstchargesdr = $userDataAll[0][9];
                        }
                       //
                        if ($i == 1) {
                            $sql = "update user_transaction_invoice SET utin_pay_sgst_amt='$gstcharges', utin_pay_cgst_amt='$gstcharges',utin_pay_igst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' ";
                            $result = mysqli_query($conn, $sql);
                            $sql = "update user_transaction_invoice SET utin_pay_sgst_amt='$gstchargescr', utin_pay_cgst_amt='$gstchargescr',utin_pay_igst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno'  and utin_transaction_type='ItemReturn'";
                            $result = mysqli_query($conn, $sql);
                            $sql = "update user_transaction_invoice SET utin_pay_sgst_amt='$gstchargesdr', utin_pay_cgst_amt='$gstchargesdr',utin_pay_igst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' and utin_transaction_type='PurchaseReturn'";
                            $result = mysqli_query($conn, $sql);
                            $result = mysqli_query($conn, $sql);
                        } else {

                            $sql = "update user_transaction_invoice SET utin_pay_igst_amt='$gstcharges' ,utin_pay_sgst_amt='', utin_pay_cgst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' ";
                            $result = mysqli_query($conn, $sql);
                            $sql = "update user_transaction_invoice SET utin_pay_igst_amt='$gstchargescr',utin_pay_sgst_amt='', utin_pay_cgst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno'  and utin_transaction_type='ItemReturn'";
                            $result = mysqli_query($conn, $sql);
                            $sql = "update user_transaction_invoice SET utin_pay_igst_amt='$gstchargesdr',utin_pay_sgst_amt='', utin_pay_cgst_amt='' where utin_firm_id='$f_id' and utin_pre_invoice_no='$Pinvoiceno' and utin_invoice_no='$invoiceno' and utin_transaction_type='PurchaseReturn'";
                            $result = mysqli_query($conn, $sql);
                            $result = mysqli_query($conn, $sql);
                        } $i++;
                    }
                }
                if ($result) {
                    echo "<script type=\"text/javascript\"> 
                        alert(\" Your File is uploaded Successfully.\"); 
                        </script>";
                } else {
                    echo "ERROR: " . mysqli_error($conn);
                }
                echo '</table>';
            } else {
                echo '<span class="msg">Sorry, File not uploaded!</span>';
            }
        } else {
            echo '<span class="msg">This File type of file not allowed!</span>';
        }
    } else {
        echo '<span class="msg">Please Select an excel file first!</span>';
    }
}
//header("Location: $documentRoot/include/php/ompplypd.php");
?>