<?php

/*
 * **************************************************************************************
 * @tutorial: IMPORT OPTIONS : AUTHOR @ RENUKA 19 OCT 2022
 * **************************************************************************************
 * 
 * Created on 19 OCT 2022
 *
 * @FileName:  omTallyImportStock.php
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
                    if ($row == 2)
                        $firm_address = $userDataAll[0][0];
                    if ($row == 3)
                        $firm_phone_details = $userDataAll[0][0];
                }
                $firm_id = 0;
                parse_str(getTableValues("SELECT firm_id FROM firm WHERE firm_own_id = '$sessionOwnerId' and firm_name = '$firm_name' "));
                $f_id = $firm_id;
//                echo '<table class=" table responsive" cellpadding="5" cellspacing="0" border="1">';

                for ($row = 5; $row <= $total_products; $row++) {
                    $userDataAll = $phpspreadsheet->rangeToArray('B' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
                    $user_fname = $userDataAll[0][0];

                    $st_item_name = $userDataAll[0][0];
                    $st_quantity = $userDataAll[0][3];
                    $st_gs_weight_type = $userDataAll[0][2];
                    if ($st_gs_weight_type == ' Not Applicable') {
                        $st_gs_weight_type = '';
                    }

                    $st_metal_rate = $userDataAll[0][4];
                    $st_final_valuation = -($userDataAll[0][5]);
                    $resultrow = "SELECT * FROM stock WHERE st_item_name = '$st_item_name' and st_owner_id = '$sessionOwnerId' ";
                    //echo $qSelCustomerDetails;
                    $resCustomerDetails = mysqli_query($conn, $resultrow) or die(mysqli_error($conn));
                    $rowcount = mysqli_num_rows($resCustomerDetails);

                    if ($rowcount == 0) {

                        if ($user_fname != '' && $user_fname != NULL && $st_quantity != '' && $st_metal_rate != '' && $st_gs_weight_type != '') {
                            $sql = " INSERT INTO stock (st_owner_id, st_firm_id, st_item_name,st_metal_type, st_quantity,st_metal_rate,st_gs_weight_type,st_fine_weight_type,st_final_valuation,st_stock_type,st_item_category ,st_purity,st_final_purity,st_wastage, st_avg_wastage,st_pur_avg_rate ,st_gs_weight,st_pkt_weight_type ,st_nt_weight,st_nt_weight_type,st_fine_weight,st_purchase_rate,st_final_fine_weight)"
                                    . " VALUES ( '" . $sessionOwnerId . "', '" . $f_id . "','" . $st_item_name . "','xyz','" . $st_quantity . "','" . $st_metal_rate . "','" . $st_gs_weight_type . "','" . $st_gs_weight_type . "','" . $st_final_valuation . "','retail','stock','100','100','0','0','" . $st_final_valuation . "','" . $st_quantity . "','" . $st_gs_weight_type . "','" . $st_quantity . "','" . $st_gs_weight_type . "','" . $st_quantity . "','" . $st_final_valuation . "','" . $st_quantity . "') ";

                            $result = mysqli_query($conn, $sql);
                        }
                    } else {
                        echo "Stock Already Exist!";
                        exit();
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