<?php
/*
 * **************************************************************************************
 * @tutorial: Sell URD Invoice
 * **************************************************************************************
 * 
 * Created on June 11, 2019 5:54:56 PM
 *
 * @FileName: URDinvoice.php
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
$invoiceDate = $_GET['invoiceDate'];
$invoicePanel = $_GET['invoicePanel'];
$roughEstimate = $_GET['roughEstimate'];
$slprinSubPanel = $_GET['slprinSubPanel'];
$invName = $_GET['invName'];
$labelType = $_GET['labelType'];
$panelName = $_GET['panelName'];
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
/*
 if($utin_transaction_type == 'TransPayment') {
    $panelName = 'TRANS_PAYMENT';
    $invName = 'TRANS_PAYMENT';
    $firmId = $utin_firm_id;
}
//
if ($panelName == 'XRF_PAYMENT' || $slprinSubPanel == 'XRF') {
    $invName = 'XRF_PAYMENT';
    $slprinSubPanel = 'XRF_PAYMENT';
}
//echo 'labelType:' . $labelType;
 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
    <head>
        <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/invoice.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $documentRootBSlash; ?>/images/favicon.ico" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    </head>
    <body>
        <!--Start code to add condition for wholesalePanel @Author:ANUJA18APR15-->
        <?php
        include 'omgooglelan.php'; //add change lang file Author:GAUR02JUL16

        $selCustInvLay = "SELECT omly_value FROM omlayout WHERE omly_option = 'InvLayType'";
        $resCustInvLay = mysqli_query($conn, $selCustInvLay);
        $rowCustInvLay = mysqli_fetch_array($resCustInvLay);
        $custInvLay = $rowCustInvLay['omly_value'];

        include 'ogspina51Right.php';
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
