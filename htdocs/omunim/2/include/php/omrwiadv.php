<?php
/*
 * **************************************************************************************
 * @Description: REPAIR ORDER ASSIGNMENT MAIN FILE @PRIYANKA-02APR2021
 * **************************************************************************************
 *
 * Created on APR 02, 2021 11:55 AM
 *
 * @FileName: omrwiadv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.45
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-02APR2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.45
 * Version: 2.7.45
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<div id="rawMetalAddDiv">
    <?php
    //
    //print_r($_REQUEST);
    //
    if ($firmId == '' || $firmId == NULL) {
        $firmId = $_REQUEST['firmId'];
    }
    //
    if ($_SESSION['setFirmSession'] != '') {
        $strFrmId = $_SESSION['setFirmSession'];
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }
    //
    $selStockPurOption = callOmLayoutTable('StockPurOption', '', 'select');
    //
    if ($selStockPurOption == '')
        callOmLayoutTable('StockPurOption', 'RawStock', 'insert');
    else
        callOmLayoutTable('StockPurOption', 'RawStock', 'update');
    //
    if ($metType == '' || $metType == NULL) {
        $metType = $_POST['metType'];
    }
    //
    if ($metType == '' || $metType == NULL) {
        $metType = $_GET['metType'];
    }
    //
    $msg = $_GET['msg'];
    $rwprId = $_GET['rwprId'];
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    //
    if ($simButton == '' || $simButton == NULL) {
        $simButton = $_GET['simButton'];
    }
    //
    if ($simButton == '' || $simButton == NULL) {
        $simButton = $_POST['simButton'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['custId'];
    }
    //
    if ($suppId == '' || $suppId == NULL) {
        $suppId = $_REQUEST['custId'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['userId'];
    }
    //
    if ($suppId == '' || $suppId == NULL) {
        $suppId = $_REQUEST['userId'];
    }
    //
    if ($mainPanelDiv == '' || $mainPanelDiv == NULL) {
        $mainPanelDiv = $_GET['mainPanel'];
    }
    //
    if ($transactionPanel == '' || $transactionPanel == NULL) {
        $transactionPanel = $_GET['transactionPanel'];
    }
    //
    if ($rawPanelName == '' || $rawPanelName == NULL)
        $rawPanelName = $_GET['rawPanelName'];
    //
    if ($NewPanelName == '' || $NewPanelName == NULL)
        $NewPanelName = $_GET['NewPanelName'];
    //
    if ($NavPanelName == '' || $NavPanelName == NULL)
        $NavPanelName = $_REQUEST['NavPanelName'];
    //
    if ($assignReceivedOrderPanelName == '' || $assignReceivedOrderPanelName == NULL)
        $assignReceivedOrderPanelName = $_REQUEST['assignReceivedOrderPanelName'];
    //
    if ($assignMainOrderPanelName == '' || $assignMainOrderPanelName == NULL)
        $assignMainOrderPanelName = $_REQUEST['assignMainOrderPanelName'];
    //
    if ($unassignMainOrderPanelName == '' || $unassignMainOrderPanelName == NULL)
        $unassignMainOrderPanelName = $_REQUEST['unassignMainOrderPanelName'];
    //
    //
    //echo '$NewPanelName == '.$NewPanelName.'<br />';
    //echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
    //echo '$rwprId == '.$rwprId.'<br />';
    //echo '$userId == '.$userId.'<br />';
    //echo '$suppId == '.$suppId.'<br />';
    //echo '$rawPanelName == '.$rawPanelName.'<br />';
    //echo '$metType == '.$metType.'<br />';
    //echo '$transactionPanel == '.$transactionPanel.'<br />';
    //
    //
    if ($transactionPanel == '' && $metType == 'BUY') {
        $transactionPanel = 'RawPurchase';
    }
    //
    if ($transactionPanel == '' && $metType == 'SELL') {
        $transactionPanel = 'RawSell';
    }
    //
    //echo '$userId1 == '.$userId.'<br />';
    //echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
    //
    if ($mainPanelDiv == 'Customer' || $mainPanelDiv == 'Supplier') {
        //
        include 'omadcsrmdt.php';
        //
        parse_str(getTableValues("SELECT user_fname FROM user WHERE user_owner_id='$sessionOwnerId' "
                               . "AND user_id ='$userId'"));
        //
    } else {
        //
        include 'ogadrwmtdt.php';
        //
    }
    //
    //echo '$userId2 == '.$userId.'<br />';
    //
    if ($user_fname == '')
        $user_fname = $sttr_brand_id;
    //
    if ($sttr_brand_id == '')
        $sttr_brand_id = $user_fname;
    //
    include 'ogiartdv.php';
    //
    if ($metType == 'BUY') {
        $hindiLabel = ' / RECIEVED / जमा';
        $transactionType = 'PURBYSUPP';
    } else if ($metType == 'SELL') {
        $hindiLabel = ' / ISSUE / UDHAAR / लेना';
        $transactionType = 'sell';
        //
        if ($NavPanelName == '' || $NavPanelName == NULL)
            $NavPanelName = "AssignRepairOrderPanel";
    }
    //
    // Add Code for Update Crystal Functionality @Author:PRIYANKA-14MAR19
    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
        //
        $sttrId = $_GET['rwprId'];
        //
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "and sttr_sttr_id = '$sttrId' and sttr_status NOT IN ('DELETED') "
                    . "and sttr_indicator = 'stockCrystal' order by sttr_id asc";
        //
        $resCryDet = mysqli_query($conn, $qSelCryDet);
        $noOfCry = mysqli_num_rows($resCryDet);
        //
        //echo '$qSelCryDet == '.$qSelCryDet.'<br />';
        //echo '$noOfCry == '.$noOfCry.'<br />';
        //
    }
    //                
    //    
    if ($NewPanelName == 'DeleteAssignRepairOrder') {
        //
        if ($sttrId == '' || $sttrId == NULL)
            $sttrId = $_REQUEST['sttrId'];
        //
        if ($transMainId == '' || $transMainId == NULL)
            $transMainId = $_REQUEST['transMainId'];
        //
        if ($sttrId != '' && $sttrId != NULL) {
            //
            $updateQuery = "UPDATE stock_transaction SET sttr_assign_status = NULL, sttr_assign_user_id = NULL  "
                         . "WHERE sttr_owner_id = '$sessionOwnerId' "
                         . "AND sttr_firm_id IN ($strFrmId) AND sttr_assign_user_id = '$userId' "
                         . "AND sttr_indicator IN ('stock','stockCrystal', 'rawMetal', 'crystal') "
                         . "AND sttr_transaction_type IN ('RepairItem', 'newOrder', 'RECEIVED') "
                         . "AND sttr_status IN ('PaymentDone') "
                         . "AND (sttr_id = '$sttrId' OR sttr_trans_id = '$transMainId') ORDER BY sttr_id ASC";
            //
            //echo '</br>$updateQuery == ' . $updateQuery . '</br>';
            //
            mysqli_query($conn, $updateQuery);
            //
        }
    }
    //
    //
    //
    //
    // *************************************************************************************************************
    // START CODE FOR TAX AND GST SETTING ON FORMS @PRIYANKA-02APR2021
    // *************************************************************************************************************
    //
    $selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
    $resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
    $rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
    $TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
    //
    // *************************************************************************************************************
    // END CODE FOR TAX AND GST SETTING ON FORMS @PRIYANKA-02APR2021
    // *************************************************************************************************************
    //
    //
    // ***********************************************************************************************************************
    // START CODE FOR HSN OPTION IN FORMS SETTING YES / NO @PRIYANKA-02APR2021
    // ***********************************************************************************************************************
    $selHSNOptionInFormsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'HSNOptionInForms'";
    $resHSNOptionInForms = mysqli_query($conn, $selHSNOptionInFormsQuery);
    $rowHSNOptionInForms = mysqli_fetch_array($resHSNOptionInForms);
    $HSNOptionInForms = $rowHSNOptionInForms['omly_value'];
    
    $queryratenortecutoption = "SELECT omly_value FROM omlayout WHERE omly_option = 'ratenortecutoption'";
   $resratenortecutoption = mysqli_query($conn, $queryratenortecutoption);
   $rowUratenortecutoption = mysqli_fetch_array($resratenortecutoption);
   $sttr_ratecut_norate_option = $rowUratenortecutoption['omly_value'];
    // ***********************************************************************************************************************
    // END CODE FOR HSN OPTION IN FORMS SETTING YES / NO @PRIYANKA-02APR2021
    // ***********************************************************************************************************************
    //
    //
    ?>
    <?php
    //
    //
    // *********************************************************************************************************
    // Start Code to Unassign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    if ($unassignMainOrderPanelName == 'unassignMainOrderFromAssignMetal') {
        //
        //
        if ($sttrMainOrderId == '' || $sttrMainOrderId == NULL)
            $sttrMainOrderId = $_REQUEST['sttrMainOrderId'];
        //
        //
        if ($transMainId == '' || $transMainId == NULL)
            $transMainId = $_REQUEST['transMainId'];
        //
        //
        if ($sttrMainOrderId != '') {
            //
            //   
            $updateQuery = "UPDATE stock_transaction SET sttr_assign_status = 'READY TO ASSIGN' "
                         . "WHERE sttr_owner_id = '$sessionOwnerId' "
                         . "AND sttr_firm_id IN ($strFrmId) AND sttr_assign_user_id = '$userId' "
                         . "AND (sttr_id = '$sttrMainOrderId' OR sttr_trans_id = '$transMainId') "
                         . "AND sttr_assign_status = 'ASSIGNED' AND sttr_indicator IN ('stock', 'stockCrystal') "
                         . "AND sttr_transaction_type IN ('newOrder') "
                         . "AND sttr_status IN ('PaymentDone') ORDER BY sttr_id ASC";
            //
            //echo '</br>$updateQuery == ' . $updateQuery . '</br>';
            //
            mysqli_query($conn, $updateQuery);
            //
            //
        }
    }
    // *********************************************************************************************************
    // End Code to Unassign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    //
    //
    // *********************************************************************************************************
    // Start Code to Assign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    if ($assignMainOrderPanelName == 'assignMainOrderFromAssignMetal') {
        //
        //
        if ($sttrMainOrderId == '' || $sttrMainOrderId == NULL)
            $sttrMainOrderId = $_REQUEST['sttrMainOrderId'];
        //
        //
        if ($transMainId == '' || $transMainId == NULL)
            $transMainId = $_REQUEST['transMainId'];
        //
        //
        if ($sttrMainOrderId != '') {
            //
            //   
            $updateQuery = "UPDATE stock_transaction SET sttr_assign_status = 'ASSIGNED' "
                         . "WHERE sttr_owner_id = '$sessionOwnerId' "
                         . "AND sttr_firm_id IN ($strFrmId) AND sttr_assign_user_id = '$userId' "
                         . "AND (sttr_id = '$sttrMainOrderId' OR sttr_trans_id = '$transMainId') "
                         . "AND sttr_assign_status = 'READY TO ASSIGN' AND sttr_indicator IN ('stock', 'stockCrystal') "
                         . "AND sttr_transaction_type IN ('newOrder') "
                         . "AND sttr_status IN ('PaymentDone') ORDER BY sttr_id ASC";
            //
            //echo '</br>$updateQuery == ' . $updateQuery . '</br>';
            //
            mysqli_query($conn, $updateQuery);
            //
            //
        }
    }
    // *********************************************************************************************************
    // End Code to Assign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    //
    //
    ?>
    <div id="repairMetalMainDiv">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center" width="100%">
                    <div id="repairMetalSubDiv">
                        <?php
                        //
                        //
                        include 'omItemsAssignDv.php';
                        //
                        //
                        include 'omReceivedItemsAssignDv.php';
                        //
                        //
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php
    //
    //
    // *********************************************************************************************************
    // Start Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    if ($assignReceivedOrderPanelName == 'assignReceivedOrderFromAssignMetal') {
        //
        if ($sttrReceivedOrderId == '' || $sttrReceivedOrderId == NULL)
            $sttrReceivedOrderId = $_REQUEST['sttrReceivedOrderId'];
        //
        //echo '$sttrReceivedOrderId == ' . $sttrReceivedOrderId . '<br />';
        //
        if ($sttrReceivedOrderId != '') {
            //
            parse_str(getTableValues("SELECT sttr_id as sttr_assign_entry_id, 
                                      sttr_metal_type, sttr_metal_rate,
                                      sttr_item_category, sttr_item_name,  
                                      sttr_quantity, sttr_gs_weight, sttr_gs_weight_type, 
                                      sttr_nt_weight, sttr_nt_weight_type,
                                      sttr_purity FROM stock_transaction 
                                      WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_id = '$sttrReceivedOrderId'"));
            //
            //echo 'sttr_gs_weight_type == ' . $sttr_gs_weight_type . '</br>';
            //
            if ($sttr_metal_type != 'crystal') {
                //
                $sttr_assign_entry_indicator = 'rawMetal';    
                //     
                $sttr_final_purity = $sttr_purity;
                //
                if ($sttr_metal_rate == '' || $sttr_metal_rate == NULL || $sttr_metal_rate == 0) {
                    //
                    // Select Metal Rate
                    parse_str(getTableValues("SELECT met_rate_metal_id, met_rate_value, met_rate_tax_check, met_rate_tax_percentage, "
                                           . "met_rate_with_tax, met_rate_tax_amt "
                                           . "FROM metal_rates WHERE met_rate_own_id = '$sessionOwnerId' "
                                           . "AND met_rate_metal_name = '$sttr_metal_type' order by met_rate_ent_dat desc LIMIT 0, 1"));
                    //
                    $sttr_metal_rate_id = $met_rate_metal_id;
                    $sttr_metal_rate = trim($met_rate_value);
                    //
                }
            } else {
               $sttr_assign_entry_indicator = 'crystal'; 
            }
        }
    }
    // *********************************************************************************************************
    // End Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
    // *********************************************************************************************************
    //
    //
    ?>
    <div id="assignOrderMainFormDiv" style="float: left;">
    <?php
    //
    // ORDER ASSIGN MAIN FORM FILE 
    include 'omrwformdv.php';
    //
    //
    ?>                
    </div>    
</div>




