<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK RETURN MAIN FORM FILE @PRIYANKA-20FEB2021
 * **************************************************************************************
 * 
 * Created on FEB 20, 2021 05:50:00 PM
 *
 * @FileName: omStockReturnMainFormDiv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-20FEB2021
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
include $_SESSION['documentRootIncludePhp'] . 'system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . 'system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . 'ommpfndv.php';
//
// STAFF ACCESS FILE
$staffId = $_SESSION['sessionStaffId'];
//
?>
<?php  
//
//
if ($panelName == '' || $panelName == NULL)
    $panelName = $_REQUEST['panelName'];
//
if ($payPanelName == '' || $payPanelName == NULL)
    $payPanelName = $_REQUEST['panelName'];
//
if ($transPanelName == '' || $transPanelName == NULL)
    $transPanelName = $_REQUEST['panelName'];
//
if ($mainPanel == '' || $mainPanel == NULL)
    $mainPanel = $_REQUEST['mainPanel']; // GET MAIN PANEL @PRIYANKA-22FEB2021
//
if ($mainPanel == '' || $mainPanel == NULL)
    $mainPanel = $_REQUEST['panelName'];
//
if ($userId == '' || $userId == NULL)
    $userId = $_REQUEST['custId'];
//
if ($userId == '' || $userId == NULL)
    $userId = $_REQUEST['userId'];
//
if ($userId == '' || $userId == NULL)
    $userId = $_REQUEST['suppId'];
//
if ($suppId == '' || $suppId == NULL)
    $suppId = $_REQUEST['userId'];
//
if ($suppId == '' || $suppId == NULL)
    $suppId = $_REQUEST['suppId'];
//
if ($suppId == '' || $suppId == NULL)
    $suppId = $_REQUEST['custId'];
//
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
//
//
$showDiv = $_GET['divSubPanel'];
//
$utinId = $_GET['suppPayId'];
//
$sessionOwnerId = $_SESSION[sessionOwnerId];
//
$panel = $_GET['panel'];
//
$subPanel = $_GET['subPanel'];
//
$txtType = $_GET['txtType'];
//
//
if ($payId == '' || $payId == NULL)
    $payId = $_GET['payId'];
//
//
if ($utin_pre_invoice_no == '' || $utin_pre_invoice_no == NULL)
    $utin_pre_invoice_no = $_REQUEST['PreInvoiceNo'];
//
if ($utin_invoice_no == '' || $utin_invoice_no == NULL)
    $utin_invoice_no = $_REQUEST['invoiceNo'];
//
//
if ($itemMainPanel == '' || $itemMainPanel == NULL)
    $itemMainPanel = 'addByInv';
//
if ($itemSubPanel == '' || $itemSubPanel == NULL)
    $itemSubPanel = $_GET['itemSubPanel'];
//
//
if ($sttr_account_id != '' && $sttr_account_id != NULL)
    $selAccId = $sttr_account_id; // ACCOUNT ID @PRIYANKA-22FEB2021
//
//
parse_str(getTableValues("SELECT * FROM user where user_id = '$suppId'"));
//
//
$selDOBDay = date(j);
$todayMM = date(n) - 1;
$selDOBYear = date(Y);
//
//
if ($sttr_metal_type == '' || $sttr_metal_type == NULL)
    $sttr_metal_type = 'Gold';
//
//
if ($sttr_id == '' || $sttr_id == NULL)  
    $sttr_id = $_REQUEST['sttr_id'];
//
//
if ($utinId == '' || $utinId == NULL) {
    $utinId = $_REQUEST['utinId'];
}
//    
//    
if ($userPanelName == '' || $userPanelName == NULL)
    $userPanelName = $_REQUEST['userPanelName']; // GET USER PANEL NAME FOR NAVIGATION @PRIYANKA-22FEB2021
//    
if ($userPanelName == '' && $mainPanel == 'CustHome') {
    $userPanelName = 'Customer';
}
//
    //
if ($payPanelName == 'PurchaseReturnPayUp' || $transPanelName == 'PurchaseReturnPayUp' || $payPanelName == 'PurchaseReturnPanel') {
    //
    if ($sttr_id != '' && $sttr_id != NULL) {
        parse_str(getTableValues("SELECT sttr_sttr_id FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                               . "AND sttr_id = '$sttr_id' order by sttr_since asc"));
        
        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                               . "AND sttr_user_id = '$suppId' "
                               . "AND sttr_status NOT IN ('DELETED') "
                               . "AND sttr_id = '$sttr_sttr_id' order by sttr_since asc"));
        // 
    } else {
        //
        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                               . "AND sttr_user_id = '$suppId' AND sttr_status NOT IN ('DELETED') "
                               . "AND sttr_utin_id = '$utinId' order by sttr_since asc"));
        //
    }
    //
    //
    $selAccId = $sttr_account_id; // ACCOUNT ID @PRIYANKA-22FEB2021
    //
    //echo '$selAccId == '.$selAccId;
    //
    if ($payPanelName != 'PurchaseReturnPanel'){
    $selDOBDay = substr($sttr_add_date, 0, 2);
    $selDOBMnth = substr($sttr_add_date, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($sttr_add_date, -4);
    }
    //
    $sttrTransType = 'stockCrystal';
    //
    $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                . "AND sttr_sttr_id = '$sttr_id' and sttr_indicator = 'stockCrystal' "
                . "AND sttr_status NOT IN ('DELETED','PaymentDone') order by sttr_id asc"; //stock_crystal
    //
    $resCryDet = mysqli_query($conn, $qSelCryDet);
    $noOfCry = mysqli_num_rows($resCryDet);
    //
    //
} else {
    //
    //
    $selStockStatusStr = " AND sttr_status IN ('PaymentDone', 'TAG', 'EXISTING', 'PURCHASE') "
                       . " AND sttr_transaction_type IN ('PURBYSUPP', 'TAG', 'PURONCASH') "
                       . " AND sttr_indicator IN ('stock', 'AddInvoice') ";
    //
//    
    parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                           . " AND sttr_id = '$sttr_id' "
                           . " $selStockStatusStr "));
    //
    //$qSelInvNo = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
    //           . "AND sttr_user_id = '$suppId' "
    //           . "AND sttr_status = 'PaymentPending' "
    //           . "AND sttr_indicator = 'PurchaseReturn'";
    //
    //$resInvNo = mysqli_query($conn, $qSelInvNo);
    //$rowInvNo = mysqli_fetch_array($resInvNo, MYSQLI_ASSOC);
    //
    //$sttr_pre_invoice_no = $rowInvNo['sttr_pre_invoice_no'];
    //$sttr_invoice_no = $rowInvNo['sttr_invoice_no'];
    //$sttr_status = $rowInvNo['sttr_status'];
    //
    //
    //$selAccId = $rowInvNo['sttr_account_id']; // ACCOUNT ID @PRIYANKA-22FEB2021
    //
    //echo '$sttr_id : ' . $sttr_id . '<br>';
    //echo '$sttr_item_category : ' . $sttr_item_category . '<br>';
    //echo '$sttr_item_name : ' . $sttr_item_name . '<br>';
    //
}
//
//
if ($payPanelName == 'PurchaseReturnPanel' || $transPanelName == 'PurchaseReturnPanel') {
    /************* START CODE TO SET CRYSTALCOUNT TO DEFAULT @PRIYANKA-22FEB2021 ********** */
    if ($crystalCount == '' || $crystalCount == NULL)
        $crystalCount = 1;
    /************* END CODE TO SET CRYSTALCOUNT TO DEFAULT @PRIYANKA-22FEB2021 ************ */
}
//
//
if ($sttr_metal_type != '' && $sttr_metal_type != NULL)
    $metalTyp = $sttr_metal_type;
//
if ($sttr_pre_invoice_no != '' && $sttr_pre_invoice_no != NULL)
    $payPreInvoiceNo = $sttr_pre_invoice_no;
//
if ($sttr_invoice_no != '' && $sttr_invoice_no != NULL)
    $payInvoiceNo = $sttr_invoice_no;
//
//
$suppItemCount = $_POST['itemCount'];
$suppSimilarItem[$suppItemCount] = $_GET['suppSimItemPanel'];
//
//
if ($suppItemCount == '' || $suppItemCount == NULL)
    $suppItemCount = 1;
//
//
if ($sttr_metal_rate == '' || $sttr_metal_rate == NULL) {
    //
    parse_str(getTableValues("SELECT met_rate_value FROM metal_rates where met_rate_own_id='$sessionOwnerId' "
                          . "and met_rate_metal_name='$metalTyp' order by met_rate_ent_dat desc LIMIT 0, 1"));
    //
    $sttr_metal_rate = trim($met_rate_value);
    //
}
//
//
if ($payPanelName != 'PurchaseReturnPayUp' && $transPanelName != 'PurchaseReturnPayUp') {
    //
    //echo '$sttr_item_category : ' . $sttr_item_category . '<br>';
    //echo '$sttr_item_name : ' . $sttr_item_name . '<br>';
    //echo '$mainSearchString == ' . $mainSearchString . '<br />';
    //
    if (($sttr_item_category == '' || $sttr_item_category == NULL || 
         $sttr_item_name == '' || $sttr_item_name == NULL) && 
        ($sttr_quantity == '' || $sttr_quantity == NULL || 
         $sttr_gs_weight == '' || $sttr_gs_weight == NULL)) {
        //
        $sttr_item_category = $mainSearchString;
        $sttr_item_name = $mainSearchString;       
        $sttr_item_pre_id = $mainSearchString;     
        //
    }
    //
}
//
//
// include file for conversion according to type @PRIYANKA-22FEB2021
include 'ogiartdv.php';
//
//
?>
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>                                      
        <td valign="top">
            <div class="main_link_brown16" style="margin-top: 10px; margin-left: 10px; font-weight:bold;">
                                 
            </div>
        </td>
    </tr>
</table>-->
<form name="add_item" id="add_item"
      enctype="multipart/form-data" method="post"
      action="include/php/omPurStockReturnAd.php"
      onsubmit="return addSuppInvoiceItem();">  
    <div id="addInvoicestockPanelFormDiv" style="margin-top:-20px;">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left" class="portlet grey-crusta box" style="background:#fff;">
                    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td width="26px" style="text-align:center;vertical-align: middle;padding-top: 2px;">
                                <img src="<?php echo $documentRoot; ?>/images/addGold20.png" alt="Add Stock" 
                                     onload="initFormName('add_item', 'addAItem');
                                             document.getElementById('sttr_gs_weight').focus(); 
                                             purReturnCalFunc();" />
                            </td>
                            <td class="portlet-title caption">
                                <div class="main_link_brown16">
                                    <b> <?php if ($payPanelName == 'PurchaseReturnPanel' || $transPanelName == 'PurchaseReturnPanel') { ?>
                                        FINE PURCHASE RETURN PANEL
                                    <?php } else { ?>
                                        UPDATE FINE PURCHASE RETURN PANEL
                                    <?php } ?></b>
                                </div>
                            </td>
                            <td align="right" valign="middle">
                                <div id="messDisplayDiv"></div>
                                <div class="analysis_div_rows main_link_red_12">
                                    <?php if ($showDiv == 'StockAlreadyExists') { ?>
                                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Product Code Already Present, Please Enter Different ~ </div>
                                    <?php } else if ($showDiv == 'InvAlreadyExists') { ?>
                                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ Invoice Already Present, Please Enter Different Invoice Number ~ </div>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- HIDDEN VARIABLES @PRIYANKA-20FEB2021 -->
                    <input type="hidden" id="mainPanel" name="mainPanel" value="<?php echo $mainPanel; ?>"/>                            
                    <input type="hidden" id="payPanelName" name="payPanelName" value="<?php echo $payPanelName; ?>"/>
                    <input type="hidden" id="transPanelName" name="transPanelName" value="<?php echo $transPanelName; ?>"/>
                    <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
                    <input type="hidden" id="UpdateItemPanel" name="UpdateItemPanel" />
                    <input type="hidden" id="addPanel" name="addPanel" value="<?php echo $payPanelName; ?>"/>

                    <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                    <input type="hidden" id="globalAltCId" name="globalAltCId"/>
                    
                    <input type="hidden" id="itstId" name="itstId" />
                    <input type="hidden" id="totCrystal" name="totCrystal"/>
                    
                    <input type="hidden" id="suppId" name="suppId" value="<?php echo $suppId; ?>"/>
                    <input type="hidden" id="sttr_user_id" name="sttr_user_id" value="<?php echo $suppId; ?>"/>
                    
                    <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="PurchaseReturn" />
                    <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="PurchaseReturn" />
                   
                    <?php if ($payPanelName == 'PurchaseReturnPayUp' || $transPanelName == 'PurchaseReturnPayUp') { ?>
                    <input type="hidden" id="sttr_id" name="sttr_id" value="<?php echo $sttr_id; ?>" />
                    <?php } else { ?>
                    
                    <!-- FOR PURCHASE RETURN BY INVOICE REDIRECTION @AUTHOR:PRIYANKA:04FEB2022 -->
                    <input type="hidden" id="srchPreInvNo" name="srchPreInvNo" value="<?php echo $_REQUEST['srchPreInvNo']; ?>"/> 
                    <input type="hidden" id="srchInvNo" name="srchInvNo" value="<?php echo $_REQUEST['srchInvNo']; ?>"/>

                    <input type="hidden" id="sttr_sttr_id" name="sttr_sttr_id" value="<?php echo $sttr_id; ?>"/>    
                    <?php } ?>             
                    
                    <input type="hidden" id="sttr_type" name="sttr_type" value="stock" />
                    <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" 
                           value="<?php echo $sttr_stock_type; ?>"/>
                    
                    <?php
                    //
                    //
                    //echo '$sttr_id : ' . $sttr_id . '<br>';
                    //echo '$sttr_item_category : ' . $sttr_item_category . '<br>';
                    //echo '$sttr_item_name : ' . $sttr_item_name . '<br>';
                    //
                    //
                    if ($payPanelName != 'PurchaseReturnPayUp' && $transPanelName != 'PurchaseReturnPayUp') {
                        //
                        $invoiceNumber = getInvoiceNum($userId, 'PurchaseReturn', 'PurchaseReturn');
                        $invArr = explode('*', $invoiceNumber);
                        $sttr_pre_invoice_no = $invArr[0];
                        $sttr_invoice_no = $invArr[1];
                        $payPreInvoiceNo = $sttr_pre_invoice_no;
                        $payInvoiceNo = $sttr_invoice_no;
                        //
                        //echo '$sttr_stock_type == ' . $sttr_stock_type . '<br>';
                        //
                        if ($sttr_stock_type == 'wholesale') {
                            //$sttr_quantity = 1;
                            //$sttr_gs_weight = 1;
                        }
                        // 
                        //
                    }
                    //
                    //
                    //echo '$sttr_pre_invoice_no : ' . $sttr_pre_invoice_no . '<br>';
                    //echo '$sttr_invoice_no : ' . $sttr_invoice_no . '<br>';
                    //echo '$payPreInvoiceNo == ' . $payPreInvoiceNo . '<br />';
                    //echo '$payInvoiceNo == ' . $payInvoiceNo . '<br />';
                    //
                    // START CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-20FEB2021
                    if ($sttr_pre_invoice_no != '' && $sttr_pre_invoice_no != NULL) {
                        //
                        $dateQuery = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                                   . "AND sttr_pre_invoice_no = '$sttr_pre_invoice_no' "
                                   . "AND sttr_invoice_no = '$sttr_invoice_no' "
                                   . "AND sttr_status IN ('PaymentPending') "
                                   . "AND sttr_transaction_type IN ('PurchaseReturn') "
                                   . "AND sttr_indicator IN ('PurchaseReturn')";
                        //
                        $dateResult = mysqli_query($conn, $dateQuery) or die(mysqli_error($conn));
                        $numRowsInv = mysqli_num_rows($dateResult);
                        //
                        if ($numRowsInv > 0) {
                            //
                            $row = mysqli_fetch_array($dateResult, MYSQLI_ASSOC);
                            $sttr_add_date = $row['sttr_add_date'];
                            //
                            if ($sttr_add_date == '') {
                                $selDOBDay = substr($sttr_add_date, 0, 2);
                                $selDOBMnth = substr($sttr_add_date, 3, -5);
                                $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                                $selDOBYear = substr($sttr_add_date, -4);
                            }
                        }
                    }
                    // END CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-20FEB2021
                    //
                    //
                    ?>
                    <?php
                    //
                    include 'omPurReturnHeaderDiv.php';
                    //
                    include 'omPurReturnSubDiv.php';
                    //
                    ?>
                </td>
            </tr>
        </table>
    </div>
</form>
<div id="suppDeposite">
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td colspan="2" align="left">
                <div id="addStockCurrentInvoice">
                    <?php
                    //
                    include 'omPurReturnFormPaymentDetails.php';
                    //
                    ?>
                </div>
            </td>
        </tr>
    </table>
</div>