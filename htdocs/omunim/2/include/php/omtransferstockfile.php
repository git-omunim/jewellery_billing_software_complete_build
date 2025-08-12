<?php

/*
 * **********************************************************************************************************************************
 * @tutorial: Stock Transfer through csv file @DNYANESHWARI21AUG2024
 * **********************************************************************************************************************************
 *
 * Created on AUG 21, 2021 12.30.00 PM
 * 
 * @FileName: omtransferstockfile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.90
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-16OCT21
 *  REASON:
 *
 */
?>
<?php

//
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$currentFileName = basename(__FILE__);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
?>
<?php
//
$selectedFirm = $_REQUEST['selectedFirm'];
$productCode = $_REQUEST['productCode'];
$preVoucherNo = $_REQUEST['preVoucherNo'];
$postVoucherNo = $_REQUEST['postVoucherNo'];
$checkPanelName = $_REQUEST['checkPanelName'];
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
if ($checkPanelName != 'sendData') {
                if ($checkPanelName == 'singleStockTransfer') {
                            //START AFTER CLICK ON GO BUTTON SINGLE STOCK TRANSFER
                            //
                            $qGetStocktTransDet = "SELECT sttr_id,sttr_item_pre_id,sttr_item_id,sttr_panel_name,sttr_firm_id,sttr_item_code,sttr_gs_weight,sttr_quantity,sttr_item_name,sttr_item_category"
                            . " FROM stock_transaction where sttr_indicator IN ('stock','imitation') AND sttr_stock_type = 'retail' AND sttr_item_code='$productCode' AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL') AND (sttr_stock_transfer_approval_status != 'StockTransferApprovalPendingStock' OR sttr_stock_transfer_approval_status IS NULL) AND sttr_status NOT IN('SOLDOUT') AND sttr_firm_id IN ($strFrmId)";
                            $resGetStocktTransDet = mysqli_query($conn, $qGetStocktTransDet);
                            $rowGetStocktTransDet = mysqli_fetch_array($resGetStocktTransDet);
                    //              $sttr_id = $rowGetStocktTransDet['sttr_id'];
                            $sttr_item_pre_id = $rowGetStocktTransDet['sttr_item_pre_id'];
                            $sttr_item_id = $rowGetStocktTransDet['sttr_item_id'];
                            $sttr_panel_name = $rowGetStocktTransDet['sttr_panel_name'];
                            $sttr_firm_id = $rowGetStocktTransDet['sttr_firm_id'];
                            $sttr_item_code = $rowGetStocktTransDet['sttr_item_code'];
                            $sttr_gs_weight = $rowGetStocktTransDet['sttr_gs_weight'];
                            $sttr_quantity = $rowGetStocktTransDet['sttr_quantity'];
                            $sttr_item_name = $rowGetStocktTransDet['sttr_item_name'];
                            $sttr_item_category = $rowGetStocktTransDet['sttr_item_category'];
                            //
                            $sttrId = $rowGetStocktTransDet['sttr_id'];
                            //
                            $qTransItemDetails = "SELECT sttrans_sttr_id FROM stock_transfer where sttrans_own_id='$sessionOwnerId' and sttrans_status='readyToTransfer' and sttrans_item_code='$sttr_item_code'";
                            //
                            $resTransItemDetails = mysqli_query($conn, $qTransItemDetails);
                            $stockAvail = mysqli_num_rows($resTransItemDetails);
                            //
                            if ($selectedFirm != $sttr_firm_id) {
                                if ($stockAvail > 0) {
                                     $updateVoucherQuery = "UPDATE stock_transfer SET sttrans_pre_voucher_no = '$preVoucherNo', sttrans_voucher_no = '$postVoucherNo', sttrans_new_firm = '$selectedFirm' where sttrans_status = 'readyToTransfer' and sttrans_item_code = '$sttr_item_code'";
                                    if (!mysqli_query($conn, $updateVoucherQuery)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                } else if ($sttr_item_code != '' && $selectedFirm != $sttr_firm_id) {
                                    //IF SELECTED FIRM AND FIRM ID OF STOCK THAT WE WANT TO TRANSFER ARE SAME THEN STOCK TRANSFER WILL NOT PROCCED
                                     $qInsrtStTrans = "INSERT INTO stock_transfer(    
                                                          sttrans_sttr_id, sttrans_own_id, sttrans_pre_voucher_no, sttrans_voucher_no,sttrans_prev_firm,sttrans_new_firm,sttrans_status,sttrans_gs_wt,sttrans_qty,sttrans_item_name,sttrans_item_category,sttrans_item_code)
                                                  VALUES('$sttrId','$sessionOwnerId','$preVoucherNo','$postVoucherNo','$sttr_firm_id','$selectedFirm','readyToTransfer','$sttr_gs_weight','$sttr_quantity','$sttr_item_name','$sttr_item_category','$sttr_item_code')";
                                    if (!mysqli_query($conn, $qInsrtStTrans)) {
                                        die('Error: ' . mysqli_error($conn));
                                    }
                                }
                            }
                            //END AFTER CLICK ON GO BUTTON SINGLE STOCK TRANSFER
                } else {
                                //START WHEN WE TRANSFER STOCK FORM FILE(MULTIPLE STOCK)
                                $fileName = $_FILES['CVSFile']['name'];
                        //
                        // Input Field Name 
                                $importFile = $_FILES['CVSFile']['tmp_name'];
                        // 
                                $readImportFile = fopen($importFile, "r");
                        //
                                $rowsCounter = 0;
                        //
                                while (($prodDetails = fgetcsv($readImportFile, 10000, ",")) !== false) {
                                    //
                                    $prodCode = $prodDetails[0];
                                    //
                                     $qGetStocktTransDet = "SELECT sttr_id,sttr_item_pre_id,sttr_item_id,sttr_panel_name,sttr_firm_id,sttr_item_code,sttr_gs_weight,sttr_quantity,sttr_item_name,sttr_item_category"
                                    . " FROM stock_transaction where sttr_indicator IN ('stock','imitation') AND sttr_stock_type = 'retail' AND sttr_item_code='$prodCode' AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL') AND (sttr_stock_transfer_approval_status != 'StockTransferApprovalPendingStock' OR sttr_stock_transfer_approval_status IS NULL) AND sttr_status NOT IN('SOLDOUT') AND sttr_firm_id IN ($strFrmId)";
                                    $resGetStocktTransDet = mysqli_query($conn, $qGetStocktTransDet);
                                    $rowGetStocktTransDet = mysqli_fetch_array($resGetStocktTransDet);
                        //        $sttr_id = $rowGetStocktTransDet['sttr_id'];
                                    $sttr_item_pre_id = $rowGetStocktTransDet['sttr_item_pre_id'];
                                    $sttr_item_id = $rowGetStocktTransDet['sttr_item_id'];
                                    $sttr_panel_name = $rowGetStocktTransDet['sttr_panel_name'];
                                    $sttr_firm_id = $rowGetStocktTransDet['sttr_firm_id'];
                                    $sttr_item_code = $rowGetStocktTransDet['sttr_item_code'];
                                    $sttr_gs_weight = $rowGetStocktTransDet['sttr_gs_weight'];
                                    $sttr_quantity = $rowGetStocktTransDet['sttr_quantity'];
                                    $sttr_item_name = $rowGetStocktTransDet['sttr_item_name'];
                                    $sttr_item_category = $rowGetStocktTransDet['sttr_item_category'];
                                    //
                        //         $_REQUEST['searchProductPreId'] = $sttr_item_pre_id;
                        //         $_REQUEST['searchProductPostId'] = $sttr_item_id;
                                    $sttrId = $rowGetStocktTransDet['sttr_id'];
                                    //
                        //        $_GET['selectedFirm'] = $selectedFirm;
                        //        $_GET['preVoucherNo'] = $preVoucherNo;
                        //        $_GET['postVoucherNo'] = $postVoucherNo;
                                    //
                                     $qTransItemDetails = "SELECT sttrans_sttr_id FROM stock_transfer where sttrans_own_id='$sessionOwnerId' and sttrans_status='readyToTransfer' and sttrans_item_code='$sttr_item_code'";
                                    //
                                    $resTransItemDetails = mysqli_query($conn, $qTransItemDetails);
                                    $stockAvail = mysqli_num_rows($resTransItemDetails);
                                    //
                                    if ($selectedFirm != $sttr_firm_id) {
                                        if ($stockAvail > 0) {
                                            $updateVoucherQuery = "UPDATE stock_transfer SET sttrans_pre_voucher_no = '$preVoucherNo', sttrans_voucher_no = '$postVoucherNo', sttrans_new_firm = '$selectedFirm' where sttrans_status = 'readyToTransfer' and sttrans_item_code = '$sttr_item_code'";
                                            if (!mysqli_query($conn, $updateVoucherQuery)) {
                                                die('Error: ' . mysqli_error($conn));
                                            }
                                        } else if ($sttr_item_code != '' && $selectedFirm != $sttr_firm_id) {
                                            //IF SELECTED FIRM AND FIRM ID OF STOCK THAT WE WANT TO TRANSFER ARE SAME THEN STOCK TRANSFER WILL NOT PROCCED
                                            $qInsrtStTrans = "INSERT INTO stock_transfer(    
                                                        sttrans_sttr_id, sttrans_own_id, sttrans_pre_voucher_no, sttrans_voucher_no,sttrans_prev_firm,sttrans_new_firm,sttrans_status,sttrans_gs_wt,sttrans_qty,sttrans_item_name,sttrans_item_category,sttrans_item_code)
                                                VALUES('$sttrId','$sessionOwnerId','$preVoucherNo','$postVoucherNo','$sttr_firm_id','$selectedFirm','readyToTransfer','$sttr_gs_weight','$sttr_quantity','$sttr_item_name','$sttr_item_category','$sttr_item_code')";
                                            if (!mysqli_query($conn, $qInsrtStTrans)) {
                                                die('Error: ' . mysqli_error($conn));
                                            }
                                        }
                                    }
                                    //
                        //        include 'omstockmanagementtrans.php';
                                }
                            }
                            //END WHEN WE TRANSFER STOCK FORM FILE(MULTIPLE STOCK)
} else {
                    //START AFTER CLICK ON SEND BUTTON
                    $sttranspPreVoucherNo = $_REQUEST['sttranspPreVoucherNo'];
                    $sttransPostVoucherNo = $_REQUEST['sttransPostVoucherNo'];
                //    echo '$sttranspPreVoucherNo=>'.$sttranspPreVoucherNo."<br>";
                //    echo '$sttransPostVoucherNo=>'.$sttransPostVoucherNo."<br>";
                    //

                    $qGetReadyToTransDt = "SELECT * FROM stock_transfer WHERE sttrans_own_id='$sessionOwnerId' and sttrans_pre_voucher_no='$sttranspPreVoucherNo' and sttrans_voucher_no='$sttransPostVoucherNo' and sttrans_status='readyToTransfer'";

                // 
                    $resGetReadyToTransDt = mysqli_query($conn, $qGetReadyToTransDt);
                //    $noOfRows = mysqli_num_rows($resGetReadyToTransDt);

                    while ($rowGetReadyToTransDt = mysqli_fetch_array($resGetReadyToTransDt)) {
                        $sttrans_sttr_id = $rowGetReadyToTransDt['sttrans_sttr_id'];

                //         $sttrans_item_code =$rowGetReadyToTransDt['sttrans_item_code'];
                        $sttrans_new_firm = $rowGetReadyToTransDt['sttrans_new_firm'];
                //         echo '$sttrans_item_code=>'.$sttrans_item_code."<br>";
                        //
                        parse_str(getTableValues("SELECT sttr_item_pre_id,sttr_item_id,sttr_panel_name,sttr_item_code FROM stock_transaction where sttr_id='$sttrans_sttr_id';"));
                        //
                        $_GET['selectedFirm'] = $sttrans_new_firm;
                        $_GET['preVoucherNo'] = $sttranspPreVoucherNo;
                        $_GET['postVoucherNo'] = $sttransPostVoucherNo;
                        $_REQUEST['searchProductPreId'] = $sttr_item_pre_id;
                        $_REQUEST['searchProductPostId'] = $sttr_item_id;
                        $_REQUEST['sttrPanelName'] = $sttr_panel_name;
                        $_REQUEST['sttrItemCode'] = $sttr_item_code;
                //        $sttrId = $rowGetStocktTransDet['sttr_id'];
                        //
                        include 'omstockmanagementtrans.php';
                        //
                        $updateTrasferPending = "UPDATE stock_transaction SET sttr_stock_transfer_success_status = 'transferDone' WHERE sttr_owner_id='$sessionOwnerId' and sttr_pre_voucher_no='$sttranspPreVoucherNo' and sttr_voucher_no='$sttransPostVoucherNo' and sttr_stock_transfer_success_status='transferPending'";
                        if (!mysqli_query($conn, $updateTrasferPending)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                    }

                    $stTransDate = date("d/m/Y");

                    $updateTrasferStatus = "UPDATE stock_transfer SET sttrans_status = 'transfered', sttrans_trans_date='$stTransDate' WHERE sttrans_own_id='$sessionOwnerId' and sttrans_pre_voucher_no='$sttranspPreVoucherNo' and sttrans_voucher_no='$sttransPostVoucherNo' and sttrans_status='readyToTransfer'";
                    if (!mysqli_query($conn, $updateTrasferStatus)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                //END AFTER CLICK ON SEND BUTTON
}
?>