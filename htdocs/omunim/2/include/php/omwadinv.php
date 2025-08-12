<?php
/*
 * **************************************************************************************
 * @tutorial: SUPPLIER STOCK PURCHASE MAIN FORM FILE @PRIYANKA-02MAR2021
 * **************************************************************************************
 * 
 * Created on MARCH 02, 2021 11:53:00 AM
 *
 * @FileName: omwadinv.php
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
 *  AUTHOR: @PRIYANKA-02MAR2021
 *  REASON:
 *
 */
?>
<?php
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
<div id="NewInvoiceDiv">
    <?php
    //
    if ($_SESSION['setFirmSession'] != '') {
        $strFrmId = $_SESSION['setFirmSession'];
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }
    //
    $showDiv = $_GET['divSubPanel'];
    $utinId = $_GET['suppPayId'];
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    $payPanelName = $_GET['payPanelName'];
    $paymentPanelName = $_REQUEST['paymentPanelName'];
    $panel = $_GET['panel'];
    $subPanel = $_GET['subPanel'];
    //
    $txtType = $_GET['txtType'];
    //
    if ($payId == '')
        $payId = $_GET['payId'];
    if ($suppId == '')
        $suppId = $_GET['suppId'];
    if ($suppId == '')
        $suppId = $_GET['custId'];
    if ($utin_pre_invoice_no == '')
        $utin_pre_invoice_no = $_GET['PreInvoiceNo'];
    if ($utin_invoice_no == '')
        $utin_invoice_no = $_GET['invoiceNo'];
    if ($itemMainPanel == '')
        $itemMainPanel = 'addByInv';
    if ($itemSubPanel == '')
        $itemSubPanel = $_GET['itemSubPanel'];
    //
    parse_str(getTableValues("SELECT * FROM user where user_id = '$suppId'"));
    //
    //$selAccId = $itpr_account_id;
    //
    $selDOBDay = date(j);
    $todayMM = date(n) - 1;
    $selDOBYear = date(Y);
    $selDOBMnth = strtoupper(date(M));
    //
    if ($sttr_metal_type == '')
        $sttr_metal_type = 'Gold';
    //
    parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_indicator IN ('AddInvoice','PURCHASE') and sttr_status NOT IN ('DELETED') AND sttr_metal_type NOT IN ('imitation','crystal','') order by sttr_id desc LIMIT 0, 1"));
    //
    if ($payPanelName == '')
        $payPanelName = $_GET['panelName'];
    //
    //echo '$payPanelName == '.$payPanelName.'<br />';
    //
    $sttrId = $_GET['sttrId'];
    //
    if ($sttrId == '') {
        $sttrId = $_REQUEST['utrId'];
    }
    //
    if ($utinId == '') {
        $utinId = $_REQUEST['utinId'];
    }
    //
    if ($mainPanel == '')
        $mainPanel = $_REQUEST['mainPanel']; // GET MAIN PANEL @PRIYANKA-28MAY18
        //
    if ($userPanelName == '')
        $userPanelName = $_REQUEST['userPanelName']; // GET USER PANEL NAME FOR NAVIGATION @PRIYANKA-28MAY18
        //
    if ($userPanelName == '' && $mainPanel == 'CustHome') {
        $userPanelName = 'Customer';
    }
    //
    //echo '$userPanelName ' . " :==: " . $userPanelName;
    //
    $selAccId = $sttr_account_id; // ACCOUNT ID @PRIYANKA-21MAR18
    //
    //check panelName For update purchase invoice
    if ($payPanelName == 'UpdateItem' || $payPanelName == 'InvoicePayUp') {
        //
        if ($sttrId != '') {
            parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_user_id='$suppId' and sttr_status NOT IN ('DELETED') and sttr_id = '$sttrId' order by sttr_since asc"));
        } else {
            parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_user_id='$suppId' and sttr_status NOT IN ('DELETED') and sttr_utin_id = '$utinId' order by sttr_since asc"));
        }
        //
        $selAccId = $sttr_account_id; // ACCOUNT ID @PRIYANKA-21MAR18
        //
        //echo '$selAccId == '.$selAccId;
        //
        $selDOBDay = substr($sttr_add_date, 0, 2);
        $selDOBMnth = substr($sttr_add_date, 3, -5);
        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
        $selDOBYear = substr($sttr_add_date, -4);
        //
        $sttrTransType = 'stockCrystal';
        //
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_sttr_id = '$sttr_id' and sttr_indicator = 'stockCrystal' and sttr_status NOT IN ('DELETED','PaymentDone') order by sttr_id asc"; //stock_crystal
        $resCryDet = mysqli_query($conn, $qSelCryDet);
        $noOfCry = mysqli_num_rows($resCryDet);
    } else {
        parse_str(getTableValues("SELECT sttr_wastage FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_status NOT IN ('DELETED') and sttr_user_id='$suppId' and sttr_indicator IN ('AddInvoice','PURCHASE') and sttr_metal_type='$sttr_metal_type' order by sttr_since desc"));
        $qSelInvNo = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_user_id='$suppId' and sttr_status='PaymentPending' AND sttr_indicator='AddInvoice'";
        $resInvNo = mysqli_query($conn, $qSelInvNo);
        $rowInvNo = mysqli_fetch_array($resInvNo, MYSQLI_ASSOC);
        $sttr_pre_invoice_no = $rowInvNo['sttr_pre_invoice_no'];
        $sttr_invoice_no = $rowInvNo['sttr_invoice_no'];
        $sttr_status = $rowInvNo['sttr_status'];
        $selAccId = $rowInvNo['sttr_account_id']; // ACCOUNT ID @PRIYANKA-21MAR18
        //echo 'sttr_wastage ##== '.$sttr_wastage;
    }
    //
    if ($payPanelName == 'InvoicePayment') {
        /*         * ************* START CODE TO SET CRYSTALCOUNT TO DEFAULT ********** */
        if ($crystalCount == '')
            $crystalCount = 1;
        /*         * ************* END CODE TO SET CRYSTALCOUNT TO DEFAULT ************ */
    }
    //
    $metalTyp = $sttr_metal_type;
    $payPreInvoiceNo = $sttr_pre_invoice_no;
    $payInvoiceNo = $sttr_invoice_no;
    //
    $suppItemCount = $_POST['itemCount'];
    $suppSimilarItem[$suppItemCount] = $_GET['suppSimItemPanel'];
    //
    if ($suppItemCount == '')
        $suppItemCount = 1;
    //
    parse_str(getTableValues("SELECT met_rate_value FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_metal_name='$metalTyp' order by met_rate_ent_dat desc LIMIT 0, 1"));
    //
    $itpr_metal_rate = trim($met_rate_value);
    //
    //include file for conversion according to type
    include 'ogiartdv.php';
    //
    $userId = $suppId;
    //
    //echo '$userId == '.$userId;
    //
    //print_r($_REQUEST);
    //
    $messDiv = $_REQUEST['messDiv'];
    //
    //echo '$payPanelName == ' . $payPanelName . '<br />';
    //echo '$messDiv == ' . $messDiv . '<br />';
    //
    //
    // ***********************************************************************************************************************
    // START CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
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
    // END CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
    // ***********************************************************************************************************************
    //
    //
    ?>
    <div id="AddInvoiceMainDiv" class="ShadowFrm" style="padding:5px;width:99.6%">       
        <form name="add_item" id="add_item"
              enctype="multipart/form-data" method="post"
              action="include/php/ogwsinad.php"
              onsubmit="return addSuppInvoiceItem();">  
            <div id="addInvoicestockPanelFormDiv" >
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left" class="portlet grey-crusta box" style="background:#fff;">
                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td width="26px" style="text-align:center;vertical-align: middle;padding-top: 2px;">
                                        <img src="<?php echo $documentRoot; ?>/images/img/stock.png" alt="Add Stock" height="18px"
                                             onload="<?php if ($utinId != '') { ?> 
                                                               addSuppPurDetails('<?php echo $suppItemCount; ?>', '<?php echo $payPanelName; ?>', '<?php echo $suppId; ?>', '<?php echo $utinId; ?>'), document.getElementById('addPanelInfo').value = 'InvoiceAddStock';
                                                     <?php } ?>
                                                     initFormName('add_item', 'addAItem');
                                             <?php if ($simItem == 'SimilarItem' || $panelSimilarDiv == 'SimilarItem') { ?>
                                                       document.getElementById('sttr_quantity').focus();
                                             <?php } else { ?>
                                                       document.getElementById('sttr_metal_type').focus();
                                             <?php } ?>
                                             " />
                                    </td>
                                    <td class="portlet-title caption">
                                        <div class="main_link_brown16">
                                            <b> <?php if ($payPanelName == 'InvoicePayment') { ?>
                                                ADD METAL PUR FORM B2
                                            <?php } else { ?>
                                                UPDATE METAL PUR FORM B2
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
                            <!-- HIDDEN MAIN PANEL @PRIYANKA-28MAY18 -->
                            <input type="hidden" id="sttr_ratecut_norate_option" name="sttr_ratecut_norate_option" value="<?php echo $sttr_ratecut_norate_option; ?>"/>       
                            <input type="hidden" id="mainPanel" name="mainPanel" value="<?php echo $mainPanel; ?>"/>                            
                            <input type="hidden" id="sttrPanelName" name="payPanelName" value="<?php echo $payPanelName; ?>"/>
                            <input type="hidden" id="UpdateItemPanel" name="UpdateItemPanel" value=""/>
                            <input type="hidden" id="addPanel" name="addPanel" value="<?php echo $payPanelName; ?>"/>
                            <?php if ($payPanelName != 'InvoicePayment') { // check panelName for add stock Popup  ?>
                                <input type="hidden" id="utransId" name="utransId" value="<?php echo $sttr_id; ?>" />
                            <?php } ?>
                            <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                            <input type="hidden" id="globalAltCId" name="globalAltCId"/>
                            <input type="hidden" id="panelName" name="panelName" value="<?php echo $stockPanelName; ?>"/>
                            <input type="hidden" id="itstId" name="itstId" value="<?php echo $utrId; ?>" />
                            <input type="hidden" id="totCrystal" name="totCrystal"/>
                            <input type="hidden" id="suppId" name="suppId" value="<?php echo $suppId; ?>"/>
                            <input type="hidden" id="sttrId" name="sttrId" value="<?php echo $sttr_id; ?>" />
                            <input type="hidden" id="sttr_panel_name" name="sttr_panel_name" value="FINE_JEWELLERY_PUR_B2"/>
                            <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value="wholesale"/>
                            <input type="hidden" id="sttr_type" name="sttr_type" value="stock"/>
                            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="PURBYSUPP" />
                            <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                                <input type="hidden" id="msItmType" name="msItmType" value="PRODUCT">
                            <?php } ?>
                            <?php
                            //
                            $suppWastage = $sttr_wastage;
                            //
                            if ($payPanelName == 'InvoicePayment') {
                                parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_indicator IN ('AddInvoice','PURCHASE') and sttr_status NOT IN ('DELETED') AND sttr_metal_type NOT IN ('imitation','crystal','') order by sttr_id desc LIMIT 0,1"));
                            }
                            //
                            if ($payPanelName != 'UpdateItem') {
                                $invoiceNumber = getInvoiceNum($userId, 'AddInvoice', 'PURBYSUPP');
                                $invArr = explode('*', $invoiceNumber);
                                $sttr_pre_invoice_no = $invArr[0];
                                $sttr_invoice_no = $invArr[1];
                            }
                            //
                            //echo '$sttr_pre_invoice_no : ' . $sttr_pre_invoice_no . '<br>';
                            //echo '$sttr_invoice_no : ' . $sttr_invoice_no . '<br>';
                            //
                            // START CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-24JAN18
                            if ($sttr_pre_invoice_no != '' && $sttr_pre_invoice_no != NULL) {
                                //
                                $dateQuery = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' AND sttr_pre_invoice_no = '$sttr_pre_invoice_no' AND sttr_invoice_no = '$sttr_invoice_no' AND sttr_status IN ('PaymentPending') AND sttr_transaction_type IN ('PURCHASE','PURBYSUPP') AND sttr_indicator IN ('AddInvoice','PURCHASE')";
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
                            // END CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-24JAN18
                            //
                            //$sttr_wastage = $suppWastage;
                            //
                            //echo 'sttr_wastage == '.$sttr_wastage;
                            //
                            ?>
                            <?php
                            include 'omadinhdv.php';
                            include 'omwsinadv.php';
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
                            include 'omainpydv.php';
                            //
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>