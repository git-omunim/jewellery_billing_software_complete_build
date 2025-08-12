<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
?>
<?php
//
//print_r($_REQUEST);
//
$sslg_trans_sub = 'MAIN STOCK UPDATED';
$sysLogTransType = 'sellStock';
$sysLogTransId = $slPrPreInvoice . $slPrInvoiceNo;
$sslg_firm_id = $slPrFirmId;
$custId = $sttr_user_id;
$sslg_trans_comment = 'Pur Inv No: ' . $sysLogTransId . ', ' . $slPrItemMetal . ' Item Id: ' . $slPrStockPreId . $slPrStockPostId . ', Date: ' . $slPrSellDate . ', Updated Fn Wt: ' . $resFFNW . $slPrItemNTWT .
                      ', Valuation: ' . formatInIndianStyle($custFinalValuation);
include 'omslgapi.php';
//
/************************************************************************************ */
//
//echo '$slPrId:' . $slPrId . '<br>';
//echo '$sellPanelName:' . $sellPanelName . '<br>';
//
//
$_REQUEST['sttr_sttr_id'] = NULL;
$_REQUEST['sttr_st_id'] = NULL;
//
//
stock_transaction('update', $_REQUEST, $slPrId);
//
//die;
//
//
$_REQUEST['sttr_sttr_id'] = $slPrId;
//
//
// ITEM CRYSTAL COUNT
$crystalEntered = mysqli_real_escape_string($conn, stripslashes(trim($_POST['addItemCryCount'])));
//
//***********************************************************************************************
//********************* START CODE TO ADD/UPDATE CRYSTAL **********************
//************************************************************************************************
//
//echo '$crystalEntered == '.$crystalEntered.'<br />';   
//
if ($crystalEntered != '') {

    // IT WILL RETURN THE COUNT OF CRYSTAL 
    $itemCodeCount = noOfRowsCheck('sttr_id', 'stock_transaction', " sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                 . "and sttr_sttr_id = '$slPrId' and sttr_indicator = 'stockCrystal'");
    $cryCount = 0;
    $cryTotWt = 0;

    //echo '$itemCodeCount == '.$itemCodeCount.'<br />';

    for ($j = 1; $j <= $crystalEntered; $j++) {

        $cryAvail = trim($_POST['del' . $j]);

        if ($cryAvail != 'Deleted') {

            include 'ogadcyid.php';

            //echo '$j == '.$j.'<br />';
            //echo '$itemCodeCount == '.$itemCodeCount.'<br />';
            
            // Start Code To Update Stone Values Into stock_transaction Table @PRIYANKA-13-11-17
            IF ($j > $itemCodeCount) {

                $qSelCryDet = "SELECT cry_id from crystal "
                            . "where cry_own_id = '$ownerId' "
                            . "and cry_crystal_id = '$addItemCryId'";
                
                $resCryDet = mysqli_query($conn, $qSelCryDet);
                $cryAvailCount = mysqli_num_rows($resCryDet);

                if ($cryAvailCount <= 0) {

                    $query = "INSERT INTO crystal (
                              cry_own_id,cry_crystal_id,cry_name,cry_dob,cry_rate,cry_rate_type,cry_clarity,cry_color,
                              cry_other_info,cry_upd_sts,cry_since,cry_comm) 
                              VALUES ('$ownerId','$addItemCryId','$addItemCryName','$itemDOBDay','$addItemCryRate',"
                            . "'$addItemCryRateTyp','$addItemCryClarity',"
                            . "'$addItemCryColor', '$addItemCryOtherInfo','User',$currentDateTime,'Created By User')";

                    if (!mysqli_query($conn, $query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
                
                //echo '$mainEntryId =1='. $mainEntryId.'<br />';
                
                $_REQUEST['sttr_transaction_type' . $j] = 'MetalValuation';
                
                //$_REQUEST['sttr_sttr_id' . $j] = $slPrId;

                $sttr_id = stock_transaction('insert', $_REQUEST, $slPrId, $j);

                // IT WILL STORE MAIN STOCK ID AS STTR STTR ID 
                parse_str(setTableValues("stock_transaction", "sttr_sttr_id", "$slPrId", "sttr_id = $sttr_id"));
                
            } else {

                // START CODE FOR UPDATE STONE VAL IN MAIN ENTRY @Priyanka:02FEB18 
                $mainEntryId = $_REQUEST['slPrId'];
                
                //$_REQUEST['sttr_sttr_id' . $j] = $slPrId;
                
                //echo '$slPrId =2='. $slPrId.'<br />';
                //echo '$mainEntryId =2='. $mainEntryId.'<br />';
                //echo '$tableCryId =2='. $tableCryId.'<br />';

                // Start Code To Update Stone Values Into stock_transaction Table @PRIYANKA-13-11-17 
                stock_transaction('update', $_REQUEST, $tableCryId, $j);
                // End Code To Update Stone Values Into stock_transaction Table @PRIYANKA-13-11-17

                $selectStoneEntry = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stockCrystal' "
                                  . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$mainEntryId'";

                //echo '$selectStoneEntry == '.$selectStoneEntry.'<br />';

                $resultEntry = mysqli_query($conn, $selectStoneEntry);
                $stoneFinalVal = 0;
                $stoneWt = 0;

                while ($stoneRow = mysqli_fetch_array($resultEntry)) {

                    $stoneFinalVal += $stoneRow['sttr_valuation'];
                    $stoneWt += $stoneRow['sttr_gs_weight'];
                    $stoneWtType = $stoneRow['sttr_gs_weight_type'];
                }

                $updateStoneQuery = "UPDATE stock_transaction SET sttr_stone_valuation = '$stoneFinalVal',"
                                  . "sttr_stone_wt = '$stoneWt',"
                                  . "sttr_stone_wt_type = '$stoneWtType'  "
                                  . "WHERE sttr_id = '$mainEntryId' AND sttr_status NOT IN ('DELETED') "
                                  . "AND sttr_indicator IN ('MetalValuation') AND sttr_transaction_type IN ('MetalValuation')";

                //echo '$updateStoneQuery == '.$updateStoneQuery.'<br />';

                if (!mysqli_query($conn, $updateStoneQuery)) {
                    die('Error: ' . mysqli_error($conn));
                }

                // END CODE FOR UPDATE STONE VAL IN MAIN ENTRY @Priyanka:02FEB18 
            }
        }
    }
}

// IT WILL FETCH DATA OF MAIN ENTRY @RATNAKAR10JAN2018
parse_str(getTableValues("SELECT sttr_firm_id, sttr_utin_id, sttr_user_id, "
                       . "sttr_pre_invoice_no, sttr_invoice_no, sttr_transaction_type "
                       . "FROM stock_transaction "
                       . "WHERE sttr_id = '$slPrId' AND sttr_transaction_type IN ('MetalValuation') "
                       . "AND sttr_indicator IN ('MetalValuation')"));
//
// UPDATING SOME DETAILS OF CRYSTAL OF PARTICULAR ENTRY @RATNAKAR10JAN2018
$updateCrystal = "UPDATE stock_transaction SET sttr_firm_id = '$sttr_firm_id',"
               . "sttr_utin_id = '$sttr_utin_id', sttr_pre_invoice_no = '$sttr_pre_invoice_no',"
               . "sttr_invoice_no = '$sttr_invoice_no',"
               . "sttr_user_id = '$sttr_user_id', sttr_transaction_type = '$sttr_transaction_type',"
               . "sttr_status = 'PaymentDone' WHERE sttr_sttr_id = '$slPrId' "
               . "AND sttr_indicator = 'stockCrystal'";

if (!mysqli_query($conn, $updateCrystal)) {
    die('Error: ' . mysqli_error($conn));
}

$qUpdPurchasePrice = "UPDATE stock_transaction SET sttr_barcode_prefix = '', sttr_barcode = '' WHERE sttr_id = '$slPrId'";

if (!mysqli_query($conn, $qUpdPurchasePrice)) {
    die('Error: ' . mysqli_error($conn));
}

//************************************************************************************************
//********************* END CODE TO ADD/UPDATE CRYSTAL ************************
//************************************************************************************************

$cryNtWtInGm = $cryNtWtInGm / 0.2;
$cryTotWt = $cryNtWtInGm + $cryNtWtInCt;
$itstCryGSWT = 'CT';
//
$sslg_trans_sub = 'BARCODE ITEM UPDATED';
$sysLogTransType = 'sellStock';
$sysLogTransId = $slPrPreInvoice . $slPrInvoiceNo;
$sslg_firm_id = $slPrFirmId;
$custId = $sttr_user_id;
$sslg_trans_comment = 'Pur Inv No: ' . $sysLogTransId . ', ' . $slPrItemMetal . ' Item Id: ' . $slPrStockPreId . $slPrStockPostId . ', Updated Gs Wt: ' . $resGSW . $itemGSWType .
                      ', Nt Wt: ' . $resNTW . $itst_nt_weight_type . ', Valuation: ' . formatInIndianStyle($custFinalValuation);
include 'omslgapi.php';
?>