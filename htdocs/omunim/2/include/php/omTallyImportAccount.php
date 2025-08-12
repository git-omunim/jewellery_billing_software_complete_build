<?php

/*
 * **************************************************************************************
 * @tutorial: IMPORT OPTIONS : AUTHOR @ RENUKA 19 OCT 2022
 * **************************************************************************************
 * 
 * Created on 19 OCT 2022
 *
 * @FileName:  omTallyImportAccount.php
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
        . "firm where firm_own_id = '$sessionOwnerId' and firm_id = '$theFirmId' ";
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

//                echo '<table class=" table responsive" cellpadding="5" cellspacing="0" border="1">';

                for ($row = 0; $row <= 5; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);

                    $account = $userDataAll[0][0];
                    if ($row == 1) {
                        $firm_name = $userDataAll[0][0];
                    }
                    if (($row == 2) && ($userDataAll[0][0] != 'List of Groups (Used)')) {
                        $firm_address = $userDataAll[0][0];
                    }
                    if ($account == 'List of Groups (Used)') {
                        $acc = $row + 2;
                    }
                }
                $qSelFirmDetails = "SELECT * from firm ";
                $resFirmDetails = mysqli_query($conn, $qSelFirmDetails) or die(mysqli_error($conn));
                while ($resFirmData = mysqli_fetch_array($resFirmDetails, MYSQLI_ASSOC)) {
                    $firmname = $resFirmData['firm_name'];
                    $firm_phone = $resFirmData['firm_phone_details'];
                }
               
                if($firmname==$firm_name && $firm_phone==$firm_phone_details)
                {
                    echo "firm already exist";
                }else {
                $sql = " INSERT INTO firm ( firm_own_id,firm_name,firm_address,firm_phone_details ) VALUES ( '" . $sessionOwnerId . "', '" . $firm_name . "','" . $firm_address . "','" . $firm_phone_details . "' ) ";
                $result = mysqli_query($conn, $sql);
                }
                for ($row = 4; $row < $total_products; $row++) {

                    $userDataAll = $phpspreadsheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    if ($userDataAll[0][0] == 'List of Groups (Used)') {
                        $row = $row + 2;
                    } else {
                        $account = $userDataAll[0][0];
                        $acc_main_acc = $userDataAll[0][0];
                        $acc_pri_grp = 'Primary';

                        if ($acc_main_acc == 'Employee & Staff') {
                            $acc_pri_grp = 'Employee & Staff';
                            $acc_pri_acc = 'Employee';
                        } else if ($acc_main_acc == 'Capital Account' || $acc_main_acc == 'Bank Accounts' || $acc_main_acc == 'Cash-in-Hand' || $acc_main_acc == 'Deposits (Asset)' || $acc_main_acc == 'Loans & Advances (Asset)' || $acc_main_acc == 'Stock-in-Hand' || $acc_main_acc == 'Sundry Debtors') {
                            $acc_pri_grp = 'Current Assets';
                            $acc_pri_acc = 'Assets';
                        } else if ($acc_main_acc == 'Duties & Taxes' || $acc_main_acc == 'Provisions' || $acc_main_acc == 'Sundry Creditors') {
                            $acc_pri_grp = 'Current Liabilities';
                            $acc_pri_acc = 'Liabilities';
                        } else if ($acc_main_acc == 'Bank OD A/c' || $acc_main_acc == 'Secured Loans' || $acc_main_acc == 'Unsecured Loans') {
                            $acc_pri_grp = 'Loans (Liability)';
                            $acc_pri_acc = 'Assets';
                        } else if ($acc_main_acc == 'Branch / Divisions' || $acc_main_acc == 'Current Assets' || $acc_main_acc == 'Current Liabilities' || $acc_main_acc == 'Direct Incomes' || $acc_main_acc == 'Fixed Assets' ||
                                $acc_main_acc == 'Indirect Expenses' || $acc_main_acc == 'Indirect Incomes' || $acc_main_acc == 'Investments' || $acc_main_acc == 'Loans (Liability)' || $acc_main_acc == 'Misc. Expenses (ASSET)' || $acc_main_acc == 'Purchase Accounts' || $acc_main_acc == 'Sales Accounts' || $acc_main_acc == 'Suspense A/c') {
                            $acc_pri_grp = 'Primary';
                            $acc_pri_acc = 'Liabilities';
                        } else if ($acc_main_acc == 'Direct Incomes' || $acc_main_acc == 'Indirect Incomes' || $acc_main_acc == 'Sales Accounts') {
                            $acc_pri_acc = 'Income';
                        } else if ($acc_main_acc == 'Indirect Expenses' || $acc_main_acc == 'Direct Expenses' || $acc_main_acc == 'Purchase Accounts') {
                            $acc_pri_acc = 'Expenses';
                        } else if ($acc_main_acc == 'Reserves & Surplus') {
                            $acc_pri_grp = 'Capital Account';
                            $acc_pri_acc = 'Liabilities';
                        } else if ($acc_main_acc == 'Suspense A/c') {
                            $acc_pri_grp = 'Suspense Account';
                            $acc_pri_acc = 'Liabilities';
                        }
                        parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$sessionOwnerId' and firm_name = '$firm_name' "));
                        $firm_id = $firm_id;
                         $queaccount= "SELECT * from accounts ";
                $resaccount = mysqli_query($conn, $queaccount) or die(mysqli_error($conn));
                while ($resaccountdata = mysqli_fetch_array($resaccount, MYSQLI_ASSOC)) {
                    $main_acc = $resaccountdata['acc_main_acc'];
                }if($main_acc!=$acc_main_acc){
                        if ($account != '' || $account == NULL)
                            $sql = " INSERT INTO accounts ( acc_own_id,acc_pri_acc,acc_pri_grp,acc_main_acc, acc_user_acc ,acc_created_by ,acc_firm_id ) VALUES ( '" . $sessionOwnerId . "', '" . $acc_pri_acc . "','" . $acc_pri_grp . "','" . $acc_main_acc . "', '" . $acc_main_acc . "','TallyImport' ,'" . $firm_id . "' ) ";
                        $result = mysqli_query($conn, $sql);
                    }else {
                        echo "ACCOUNT ALREADY EXIST!";
                        exit();
                    }
                }}

                if ($result) {
                    echo "<script type=\"text/javascript\"> 
                        alert(\" Your File is uploaded Successfully.\"); 
                        </script>";
//                  
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