<?php
/*
 * **************************************************************************************
 * @tutorial: ORDER INVOICE @PRIYANKA-15JUNE2021
 * **************************************************************************************
 * 
 * Created on JUNE 15, 2021 03:22:56 PM
 *
 * @FileName: omspinvo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-15JUNE2021
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
ob_start();
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
$invoiceDate = $_GET['invoiceDate'];
$invoicePanel = $_GET['invoicePanel'];
$roughEstimate = $_GET['roughEstimate'];
$slprinSubPanel = $_GET['slprinSubPanel'];
$invName = $_GET['invName'];
$labelType = $_GET['labelType'];
//
//echo '$labelType'.$labelType;
//
$panelName = $_GET['panelName'];
//
//echo '$panelName'.$panelName;
//
$panel = $_GET['panel'];
//
//echo'$panel'.$panel;
//
//print_r($_REQUEST);
//
$sellInvOption = $_GET['customizationOption'];
//
//echo '$sellInvOption'.$sellInvOption;
//
if($sellInvOption == 'byMetalValue'){
    //
    parse_str(getTableValues("SELECT sttr_metal_type FROM stock_transaction "
                           . "WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));
    //
    $sttr_gold_count = noOfRowsCheck('sttr_metal_type','stock_transaction' , "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Gold'");
    $sttr_silver_count = noOfRowsCheck('sttr_metal_type','stock_transaction' , "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Silver'");
    //
    //echo '$sttr_gold_count : '.$sttr_gold_count.'<br>';
    //echo '$sttr_silver_count : '.$sttr_silver_count.'<br>';
    //
    if ($sttr_gold_count > 0  && $sttr_silver_count > 0){
        $labelType = $_GET['labelType']; 
    } 
    else if ($sttr_metal_type == 'Gold'){
       $labelType = 'GoldSellPurchase';
    } 
    else if ($sttr_metal_type == 'Silver'){
        $labelType = 'SilverSellPurchase';
    }
    //
    //echo '$labelType'.$labelType;
    //
}
if ($slprinSubPanel == '') {
    parse_str(getTableValues("SELECT utin_transaction_type FROM user_transaction_invoice "
                           . "WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'"));
    if ($utin_transaction_type != '') {
        $slprinSubPanel = $utin_transaction_type;
    }
}
if ($slprinSubPanel == 'RECEIPT' || $slprinSubPanel == 'PAYMENT') {
    include 'ogspinvo_1.0.1.php';
} else {
    //  
    //
    //echo '$slprinSubPanel:' . $slprinSubPanel.'<br />';
    //echo '$panelName:' . $panelName.'<br />';
    //
    //$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
    //$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
    //
    parse_str(getTableValues("SELECT utin_transaction_type,utin_firm_id FROM user_transaction_invoice "
                           . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' "
                           . "and utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'"));
    //
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
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="imagetoolbar" content="no" />
            <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo $documentRootBSlash; ?>/images/favicon.ico" />
            <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
            <style>
                .border-color-grey-bottom{
                    border-bottom : 1px solid #000000;
                }
                .border-color-grey-top{
                    border-top : 1px solid #000000;
                }
                @page {
                    size: auto;
                }
            </style>
        </head>
        <body>
            <?php
            //
            include 'omgooglelan.php'; //add change lang file 
            //
            $selCustInvLay = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvLayType'";
            $resCustInvLay = mysqli_query($conn, $selCustInvLay);
            $rowCustInvLay = mysqli_fetch_array($resCustInvLay);
            $custInvLay = $rowCustInvLay['omly_value'];
            //
            //echo '$utin_transaction_type : ' . $utin_transaction_type . '<br />';
            //
            include 'omspina51Right.php';
            //
            ?>  
        </body>
    </html>
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
ob_end_flush();
?>
