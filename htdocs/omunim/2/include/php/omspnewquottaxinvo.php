<?php
/*
 * **************************************************************************************
 * @tutorial:  SAMPLE 4 QUOTATION TAX INVOICE : AUTHOR @DARSHANA 15 APRIL 2022
 * **************************************************************************************
 * 
 * Created on Aug 17 , 2024 2:01:44 PM
 *
 * @FileName: omspnewquottaxinvo.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
//
ob_start();
//print_r($_REQUEST);
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
$invoiceDate = $_GET['invoiceDate'];
$invoicePanel = $_GET['invoicePanel'];
$roughEstimate = $_GET['roughEstimate'];
$slprinSubPanel = $_GET['slprinSubPanel'];
$invName = $_GET['invName'];
$labelType = $_GET['labelType'];
//echo '$labelType'.$labelType;
$panelName = $_GET['panelName'];
$panel = $_GET['panel'];
$sellSampleInv = $_GET['sellSampleInv'];

$sellInvOption = $_GET['customizationOption'];
//echo '$sellInvOption'.$sellInvOption;
if ($sellInvOption == 'byMetalValue') {
    parse_str(getTableValues("SELECT sttr_metal_type FROM stock_transaction "
                    . "WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));

    $sttr_gold_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Gold'");
    $sttr_silver_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Silver'");

//    echo '$sttr_gold_count : '.$sttr_gold_count.'<br>';
//    echo '$sttr_silver_count : '.$sttr_silver_count.'<br>';

    if ($sttr_gold_count > 0 && $sttr_silver_count > 0) {
        $labelType = $_GET['labelType'];
    } else if ($sttr_metal_type == 'Gold') {
        $labelType = 'GoldSellPurchase';
//       echo '$labelType'.$labelType;
    } else if ($sttr_metal_type == 'Silver') {
        $labelType = 'SilverSellPurchase';
//        echo '$labelType'.$labelType;
    }
//    echo '$labelType'.$labelType;
}
//echo '$labelType=='.$labelType;
if ($labelType == '' || $labelType == NULL) {
    if ($labelType == 'estimateSell') {
        $labelType = 'estimateSell';
    } else {
        $labelType = 'SellPurchase';
    }
}
$invoiceQuery = "SELECT * FROM labels WHERE label_own_id = '$sessionOwnerId' and label_type = '$labelType'";
$invoicereq = mysqli_query($conn, $invoiceQuery);
while ($invoiceres = mysqli_fetch_array($invoicereq, MYSQLI_ASSOC)) {
    $nameVar = $invoiceres['label_field_name'].'_name';
    $$nameVar = $invoiceres['label_field_name'];
    $contentVar = $invoiceres['label_field_name'].'_content';
    $$contentVar = $invoiceres['label_field_content'];
    $sizeVar = $invoiceres['label_field_name'] . '_size';
    $$sizeVar = $invoiceres['label_field_font_size'];
    $colorVar = $invoiceres['label_field_name'] . '_color';
    $$colorVar = $invoiceres['label_field_font_color'];
    $checkVar = $invoiceres['label_field_name'] . '_check';
    $$checkVar = $invoiceres['label_field_check'];
}
?>
<html>
    <head>
        <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/signature-pad.css">      
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>            
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/app.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/signature_pad.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
            .border-color-grey-bottom{
                border-bottom : 1px solid #000000;
            }
            .border-color-grey-top{
                border-top : 1px solid #000000;
            }

            /*            body {
                            display: block;
                            page: main;
                            counter-reset: page 1
                        }
                        @page main {
                            @top { content: string(chapter-title) }
                            @bottom {
                                content: counter(page)
                            }
                        }*/
            @page {
                size: auto !important;
            }

        </style>
    </head>
    <body style="margin:0; padding:0; box-sizing: border-box;">
        <?php
        include 'omspnewquottaxRight.php';
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
