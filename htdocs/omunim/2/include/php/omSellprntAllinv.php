<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice 
 * **************************************************************************************
 * 
 * Created on Feb 28, 2013 5:54:56 PM
 *
 * @FileName: ogspinvo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include_once 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
?>
<?php
$slPrPreInvoiceNo = $_REQUEST['slPrPreInvoiceNo'];
$slPrInvoiceNo = $_REQUEST['slPrInvoiceNo'];
// ************************************************************************************
// START CODE TO GET VALUE FOR METAL FORM B2 INVOICE @AUTHOR:DNYANESHWARI-24SEPT2024
// ************************************************************************************
//$qSellMetalForm = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellMetalFormB2'";
//$resSellMetalForm = mysqli_query($conn, $qSellMetalForm);
//$rowSellMetalForm = mysqli_fetch_array($resSellMetalForm);
//$sellMetalFormB2 = $rowSellMetalForm['sellMetalFormB2'];
// **********************************************************************************
// END CODE TO GET VALUE FOR METAL FORM B2 INVOICE @AUTHOR:DNYANESHWARI-24SEPT2024
// **********************************************************************************
// ************************************************************************************
// START CODE TO GET PANEL NAME @AUTHOR:DNYANESHWARI-24SEPT2024
// ************************************************************************************

// **********************************************************************************
// END CODE TO GET PANEL NAME @AUTHOR:DNYANESHWARI-24SEPT2024
// **********************************************************************************
//include 'omEstiSellInsUpd.php';
include_once 'omgetinvoicespeed.php';

//echo '<pre>';
//print_r($_REQUEST);
//echo '</pre>';
$labelType = $_REQUEST['labelType'];
if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT' || $_REQUEST['labelType'] != 'QuotationInv'){
$result_home = getAllData($_REQUEST,'','');
if ($result_home == 'invoiceNotFound') {
    if($_REQUEST['labelType']=='SellPurchase'){
     $_REQUEST['old_label_type']='SellPurchase';
     $_REQUEST['indicator']='YES';
    $_REQUEST['labelType']='SUPPLIER_INVOICE';
    }
    $result_home = getAllData($_REQUEST,'','');
}
}
//echo 'uppppppppppppppppppppppppp';
//echo '<pre>';
//print_r($result_home);
//echo '</pre>';
//if($labelType != 'QuotationInv'){
if ($result_home != 'invoiceNotFound') {
    $getUserDetails = $result_home['user_details'];
//    echo '<pre>';
//    print_r($getUserDetails);
//    echo '</pre>';
    if($labelType != "APPROVAL"){
    $getUserTransDetails = $result_home['invoice'];
    }
    $getKittyDetails = $result_home['kitty'];
    $getAccountDetails = $result_home['invoice']['accounts'];
    $getStockTransDetails = $result_home['item_details'];
    $getImgDetails = $result_home['image_details'];
    $getRatesDetails = $result_home['rates'];
    $getItemTunchDetails = $result_home['purity'];
    if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT'){
    $getLabelDetails = array_change_key_case_recursive($result_home['label'], CASE_LOWER);
    }
    $getLayoutDetails = $result_home['layout'];
    $getFirmDetails = $result_home['firm_details'];
} else {
    echo "<img style='display: block;
            margin: auto;' src='$documentRoot/images/img/loader.gif' alt=''/>";
}
//}else{
//    if($labelType == 'QuotationInv'){
//        $result_home = getAllData($_REQUEST,'','');
//         $getLayoutDetails = $result_home['layout'];
//    }
//}
//include 'omEstiSellInsUpd.php';
//if ($sellMetalFormB2 == 'YES' && $sttr_panel_name == 'FINE_JEWELLERY_SELL_B2'){
//        include 'omgetinvoicespeed.php'; 
//        if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT'){
//        $result_home = getAllData($_REQUEST);
//        if ($result_home == 'invoiceNotFound') {
//            if($_REQUEST['labelType']=='SellPurchase'){
//             $_REQUEST['old_label_type']='SellPurchase';
//             $_REQUEST['indicator']='YES';
//            $_REQUEST['labelType']='SUPPLIER_INVOICE';
//            }
//            $result_home = getAllData($_REQUEST);
//        }
//        }
//        //     
//        if ($result_home != 'invoiceNotFound') {
//            $getUserDetails = $result_home['user_details'];
//            if($labelType != "APPROVAL"){
//            $getUserTransDetails = $result_home['invoice'];
//            }
//            $getKittyDetails = $result_home['kitty'];
//            $getAccountDetails = $result_home['invoice']['accounts'];
//            $getStockTransDetails = $result_home['item_details'];
//            $getImgDetails = $result_home['image_details'];
//            $getRatesDetails = $result_home['rates'];
//            $getItemTunchDetails = $result_home['purity'];
//            if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT'){
//            $getLabelDetails = array_change_key_case_recursive($result_home['label'], CASE_LOWER);
//            }
//            $getLayoutDetails = $result_home['layout'];
//            $getFirmDetails = $result_home['firm_details'];
//        } else {
//            echo "<img style='display: block;
//                    margin: auto;' src='$documentRoot/images/img/loader.gif' alt=''/>";
//        }
//}
//echo 'innnnnnnnnnnnnnnnnnnn';
$nepali_date = new nepali_date();
//ob_start();
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//

//
//$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
//$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
//$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $getLayoutDetails['nepaliDateIndicator'];
//
//$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
//$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
//$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $getLayoutDetails['nepaliDateMonthFormat'];
//
//$qGetSellPanel = "SELECT sttr_panel_name FROM stock_transaction WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_transaction_type NOT IN('RECEIVED')";
//$resGetSellPanel = mysqli_query($conn, $qGetSellPanel);
//$rowGetSellPanel = mysqli_fetch_array($resGetSellPanel);
//$sttr_panel_name = $rowGetSellPanel['sttr_panel_name'];
if($sellMetalFormB2 == 'YES'){
foreach($getStockTransDetails as $getPanelName){
    if($getPanelName['sttr_transaction_type'] == 'RECEIVED' && $getPanelName['sttr_pre_invoice_no'] == $slPrPreInvoiceNo && $getPanelName['sttr_invoice_no'] == $slPrInvoiceNo){
        $sttr_panel_name = $getPanelName['sttr_panel_name'];
    }
}
}
//
$invoiceDate = $_REQUEST['invoiceDate'];
//
if ($nepaliDateIndicator == 'YES') {
    $invoiceDate = $_REQUEST['invoiceDate'];
} else {
    $invoiceDate = $_REQUEST['invoiceDate'];
    $invoiceDateTime = date("d M Y", strtotime($invoiceDate));
    $invoiceDate = strtoupper($invoiceDateTime);
    $_REQUEST['invoiceDate'] = $invoiceDate;
}
//
//
$invoicePanel = $_REQUEST['invoicePanel'];
//
$roughEstimate = $_REQUEST['roughEstimate'];
$slprinSubPanel = $_GET['slprinSubPanel'];
$invName = $_REQUEST['invName'];
//
// ADDED CODE FOR DELIVERY DATE @PRIYANKA-19NOV2022
$orderDeliveryDate = $_REQUEST['orderDeliveryDate'];
//
$labelType = $_REQUEST['labelType'];
//
if ($labelType == '') {
    $labelType = 'SellPurchase';
}
if ($_REQUEST['invName'] == 'ItemReturn' && $labelType!='PurchaseReturn') {
    $labelType = 'sellReturn';
}
//
$panelName = $_GET['panelName'];
$panel = $_GET['panel'];
//
$emailStatus = $_GET['emailStatus'];
$whatsappStatus = $_GET['whatsappStatus'];
$directPrintInvoice = $_GET['directPrintInvoice'];
//echo '<pre>';
//print_r($getLabelDetails);
//echo '</pre>';
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
//$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
//$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
//$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $getLayoutDetails['nepaliDateIndicator'];;
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
// **************************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE MONTH FORNMAT OPTION @AUTHOR:MADHUREE-01DEC2021
// **************************************************************************************
//
//$selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
//$resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
//$rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
$nepaliDateMonthFormat = $getLayoutDetails['nepaliDateMonthFormat'];;
//
// ************************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE MONTH FORNMAT OPTION @AUTHOR:MADHUREE-01DEC2021
// ************************************************************************************
//
// *********************************************************************************************
// START CODE TO GET VALUE OF SELL INVOICE OPTION : AUTHOR @DARSHANA 24 SEPT 2021
// *********************************************************************************************
//
//$selSellInvSample = "SELECT omly_value FROM omlayout WHERE omly_option = 'SellInvSample'";
//$resSellInvSample = mysqli_query($conn, $selSellInvSample);
//$rowSellInvSample = mysqli_fetch_array($resSellInvSample);
$sellInvSample = $getLayoutDetails['SellInvSample'];
//
// *******************************************************************************************
// END CODE TO GET VALUE OF SELL INVOICE OPTION : AUTHOR @DARSHANA 24 SEPT 2021
// *******************************************************************************************
$sellInvOption = $_GET['customizationOption'];
if($invoicePanel == 'MeltingTransList'){
    $labelType = 'MeltingInv';
}
//echo '$sellInvOption'.$sellInvOption;
//echo '$sellInvOption-->'.$sellInvOption.'<br>';
if ($sellInvOption == 'byMetalValue') {
    $rowstocktypecount = 0;
$sttr_gold_count = 0;
$sttr_silver_count = 0;
if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT'){
if ($result_home != 'invoiceNotFound') {
    foreach ($getStockTransDetails as $item) {
        if (isset($item['sttr_stock_type']) && $item['sttr_stock_type'] === 'wholesale') {
            $rowstocktypecount++;
        }
        if (isset($item['sttr_metal_type']) && $item['sttr_metal_type'] === 'Gold') {
            $sttr_gold_count++;
        }
        if (isset($item['sttr_metal_type']) && $item['sttr_metal_type'] === 'Silver') {
            $sttr_silver_count++;
        }
    }
}
}

//    parse_str(getTableValues("SELECT sttr_metal_type FROM stock_transaction "
//                    . "WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));
    $sttr_metal_type = $getStockTransDetails[0]['sttr_metal_type'];
//
//    $sttr_gold_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Gold' and sttr_transaction_type NOT IN('RECEIVED')");
//    $sttr_silver_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Silver' and sttr_transaction_type NOT IN('RECEIVED')");
    //
    //echo '$sttr_gold_count : '.$sttr_gold_count.'<br>';
    //echo '$sttr_silver_count : '.$sttr_silver_count.'<br>';
//    echo '$sttr_metal_type-->'.$sttr_metal_type.'<br>';
   if ($sttr_gold_count > 0 && $sttr_silver_count > 0) {
        $labelType = $_REQUEST['labelType'];
    } else if ($sttr_metal_type == 'Gold') {
        $labelType = 'GoldSellPurchase';
    } else if ($sttr_metal_type == 'Silver') {
        $labelType = 'SilverSellPurchase';
    }
    $result_homeLb = getAllData($_REQUEST,$labelType,'Y');

    $getLayoutDetails = $result_homeLb['layout'];
    if($_REQUEST['slprinSubPanel'] != 'PAYMENT' && $_REQUEST['slprinSubPanel'] != 'RECEIPT'){
    $getLabelDetails = array_change_key_case_recursive($result_homeLb['label'], CASE_LOWER);
    }
}
if ($slprinSubPanel == '') {
//    parse_str(getTableValues("SELECT utin_transaction_type FROM user_transaction_invoice "
//                    . "WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' ORDER BY utin_id DESC"));
    //
    $orderByCnt = count($getUserTransDetails);
    $utin_transaction_type = $getUserTransDetails['utin_transaction_type'];
    if ($utin_transaction_type != '') {
        $slprinSubPanel = $utin_transaction_type;
    }
}
if ($slprinSubPanel == 'RECEIPT' || $slprinSubPanel == 'PAYMENT') {
    include 'ogspinvo_1.0.1.php';
} else {
    //  
    //echo '$slprinSubPanel:' . $slprinSubPanel.'<br />';
    //echo '$panelName:' . $panelName.'<br />';
    //
    //$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
    //$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
    //
    //[invoicePanel] => sellInvLayA4 [labelType] => SellPurchase
    //print_r($_REQUEST);
    //
    //
    //echo '$invoiceDate : ' . $invoiceDate.'<br />';
    //echo '$invoicePanel : ' . $invoicePanel.'<br />';
    //echo '$labelType : ' . $labelType.'<br />';
    //
    //
//    parse_str(getTableValues("SELECT utin_transaction_type,utin_firm_id,utin_user_id FROM user_transaction_invoice "
//                           . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' "
//                           . "and utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo' and utin_date='$invoiceDate'"));
        
      if($labelType == "APPROVAL"){
        $utin_firm_id = $request['firmId'];
        $utin_user_id = $request['userId'];
    }else{
        $utin_transaction_type = $getUserTransDetails[0]['utin_transaction_type'];
    $utin_firm_id = $getUserTransDetails[0]['utin_firm_id'];
    $utin_user_id = $getUserTransDetails[0]['utin_user_id'];
    }
    if ($utin_transaction_type == 'TransPayment') {
        $panelName = 'TRANS_PAYMENT';
        $invName = 'TRANS_PAYMENT';
        $firmId = $utin_firm_id;
    }
    //
    if ($panelName == 'XRF_PAYMENT' || $slprinSubPanel == 'XRF') {
        $invName = 'XRF_PAYMENT';
        $slprinSubPanel = 'XRF_PAYMENT';
    }
    //
     if ($utin_user_id != '') {
//        parse_str(getTableValues("SELECT user_fname,user_lname FROM user WHERE user_id='$utin_user_id'"));
        $user_fname = $getUserDetails['user_fname'];
        $user_lname = $getUserDetails['user_lname'];
    }
    //
    if ($nepaliDateIndicator != 'YES') {
    $invDate = date_create($invoiceDate);
    $invoiceDateForTitle = strtoupper(date_format($invDate, "d M Y"));
    }
    ?>
          <!--Start code to add condition for wholesalePanel @Author:ANUJA18APR15-->
            <?php
            include 'omgooglelan.php'; //add change lang file Author:GAUR02JUL16
//            $selCustInvLay = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvLayType'";
//            $resCustInvLay = mysqli_query($conn, $selCustInvLay);
//            $rowCustInvLay = mysqli_fetch_array($resCustInvLay);
            $custInvLay = $getLayoutDetails['InvLayType'];
            //
            //echo '$sellInvSample : '.$sellInvSample.'<br>';
//            echo '$labelType : '.$labelType.'<br>';
//            $qItemQuotLay = "SELECT omly_value FROM omlayout WHERE omly_option = 'itemQuotLay'";
//            $resItemQuotLay = mysqli_query($conn, $qItemQuotLay);
//            $rowItemQuotLay = mysqli_fetch_array($resItemQuotLay);
            $itemQuotLay = $getLayoutDetails['itemQuotLay'];
            //
//            $wholeSellinvQ = "SELECT omly_value FROM omlayout WHERE omly_option = 'wholeSellInvSample'";
//            $reswholeSellinvQ = mysqli_query($conn, $wholeSellinvQ);
//            $rowreswholeSellinvQ = mysqli_fetch_array($reswholeSellinvQ);
            $wholeSaleInv = $getLayoutDetails['wholeSellInvSample'];
            $sellMetalFormB2 = $getLayoutDetails['sellMetalFormB2'];
//            $stockQueryType = "select * from stock_transaction where sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_stock_type='wholesale'";
//            $resstockType = mysqli_query($conn, $stockQueryType);
//            $rowstocktypecount = mysqli_num_rows($resstockType);
            //
            //
//             echo '$sellInvSample : '.$sellInvSample.'<br>';
//             echo '$invName : '.$invName.'<br>';
            //
            //
            if($sellMetalFormB2 == 'YES' && $sttr_panel_name == 'FINE_JEWELLERY_SELL_B2'){
              include 'ogspnewsellinv.php';
         }else{
            if($panelName=='Estimate80MM' && $itemQuotLay == 'itemQuotLay3Inch'){
               include 'ogSellquotInv.php';    //Adding Code To Quotation Invoice @Author:Vinod29-06-2023;
            } else if ($panelName=='PurchaseEstimate80MM' && $itemQuotLay == 'itemQuotLay3Inch') {
               include 'ogPurchasequotInv.php';    //Adding Code To Quotation Invoice @Author:Vinod29-06-2023;
            } else if (($sellInvSample == 'SellInvSampleTax' || $sellInvSample == 'SellInvSampleTaxWithPack') && ($labelType != 'RawMetalPurchase')) {
                include 'ogspcombinvo.php';
            } else if($invoicePanel == 'MeltingTransList'){
                include 'ogmpina51Right.php';//added for melting inv
            } else if ($sellInvSample == 'SellInvSampleDefault' && $labelType != 'sellReturn') {
//                echo 'innnnnnnnnnnnnnnnnnnnnnnnnn45654';
                include 'ogspina51Right.php';
//                echo? 'immmmmmmmmmm78595663563';
            }else if ($sellInvSample == 'SellInvSampleTaxNewRetailWholesale') {
                include 'omNewTaxSampleRetailWholesale.php';
            } else if ($wholeSaleInv == 'wholeSellInvSample1' && $rowstocktypecount > 0) {
                include 'omwholesellInvoicePannel.php';
            } else if ($sellInvSample == 'SellInvSampleGoldSilverInv'){    //ADDED SAMPLE 6 INVOICE FORMAT @SIMRAN:07OCT2023
                include 'ogspinvGoldSilverInv.php';
            }else if($sellInvSample == 'SellInvSampleDefault' && $invName == 'ItemReturn' ){
                include 'ogspinvItemReturnInv.php';                                                          //@DNYANESHWARI 05DEC2023  SAMPLE 1 INVOICE FORMAT
            } else if(($sellInvSample == 'SellInvSampleTaxNewFormat' && $invName == 'ItemReturn') || ($sellInvSample == '' && $labelType == 'sellReturn')){
                include 'omspnewItemReturninvo.php';                                                                //@DNYANESHWARI 22DEC2023  SAMPLE 4 INVOICE FORMAT
            }else if($labelType == 'QuotationInv'){
                include 'omspnewquottaxinvo.php';                                                                //@DNYANESHWARI 22DEC2023  SAMPLE 4 INVOICE FORMAT
            }else
            {
                include 'omspnewtaxinvo.php';                                //CHANGE IN BY DEFAULT SELL SAMPLE FORMAT @SIMRAN:05MAY2023
            }
         }
            ?>  
            <!--        <div id="background-wm">
                        <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>" alt=" " />
                    </div>-->
        
        <script>
            $(document).ready(function () {
                $('#tableHeadColorChng').click(function () {
                    var color = 'rgb(' + Math.floor(Math.random() * 255) + ','
                            + Math.floor(Math.random() * 255) + ','
                            + Math.floor(Math.random() * 255) + ')';
                    $('.tableHeadColorChng').css('background-color', color);
                });
            });
        </script>
    <?php
}
?>
<?php
//
/* END CODE TO ADD DIVISION FOR SEND INVOICE MAIL OPTION @AUTHOR:MADHUREE-20MARCH2020 */
//
// ****************************************************************
// START CODE FOR WHATSAPP SEND PDF : AUTHOR @SARVESH 14 JUL 2022
// ****************************************************************

//
//ob_end_flush();
//
// *************************************************************
// END CODE FOR WHATSAPP SEND PDF : AUTHOR @SARVESH 14 JUL 2022
// *************************************************************
//
?>