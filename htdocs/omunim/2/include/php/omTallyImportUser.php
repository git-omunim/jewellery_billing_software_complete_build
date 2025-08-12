<?php

/*
 * **************************************************************************************
 * @tutorial: IMPORT OPTIONS : AUTHOR @ RENUKA 19 OCT 2022
 * **************************************************************************************
 * 
 * Created on 19 OCT 2022
 *
 * @FileName:  omTallyImportUser.php
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
    $fid = $resFirmData['firm_id'];
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

                for ($row = 1; $row <= 3; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    if ($row == 1)
                        $firm_name = $userDataAll[0][0];
                    if ($row == 2)
                        $firm_address = $userDataAll[0][0];
                    if ($row == 3)
                        $firm_phone_details = $userDataAll[0][0];
                }
                $firm_id = 0;
                parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$sessionOwnerId' and firm_name = '$firm_name' "));
                $f_id = $firm_id;
                for ($row = 5; $row <= $total_products; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('B' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    $user_name = $userDataAll[0][0];
                    $user_type = $userDataAll[0][1];
                    $state = $userDataAll[0][2];
//
                    if ($user_type == 'Sundry Debtors' || $user_type == 'Loans & Advances (Asset)') {
                        $user_type = 'CUSTOMER';
                        $user_pid = 'C';
                    }
                    if ($user_type == 'Sundry Creditors') {
                        $user_type = 'SUPPLIER';
                        $user_pid = 'W';
                    }
                    $result = "SELECT * FROM user WHERE user_fname = '$user_name' and user_owner_id = '$sessionOwnerId' ";
                    //echo $qSelCustomerDetails;
                    $resCustomerDetails = mysqli_query($conn, $result) or die(mysqli_error($conn));
                    $rowcount = mysqli_num_rows($resCustomerDetails);
//
                    if ($rowcount == 0) {

                        if ($user_type == 'CUSTOMER' || $user_type == 'SUPPLIER') {

                            $sql = " INSERT INTO user (user_owner_id, user_firm_id, user_type, user_fname,user_pid,user_state,user_status) VALUES ( '" . $sessionOwnerId . "', '" . $f_id . "','" . $user_type . "','" . $user_name . "','" . $user_pid . "','" . $state . "' ,'Active') ";
                            $result = mysqli_query($conn, $sql);
                        }
                    } else {
                        echo "User Already Exist!";
                        exit();
                    }
                }
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