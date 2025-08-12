<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omStockMasterDisplayPopUpFrame.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
?>
<?php
require_once 'system/omssopin.php';
?>
<?php
$itmNmCode = $_POST['itmNmCode'];
$itmNmMetal = $_POST['itmNmMetal'];
$itmNmMetalType = $_POST['itmNmMetalType'];
$itmNmProdType = $_POST['itmNmProdType'];
$itmNmCategory = $_POST['itmNmCategory'];
$itmNmName = $_POST['itmNmName'];;
//
//if ($contactId == '') {
//    $contactId = $_GET['contactId'];
//    $contactName = $_GET['contactName'];
//    $contactLead = $_GET['contactLead'];
//    $leadPanelPopup = $_GET['panelName'];
//}
$itmNmCode = $_GET['itmNmCode'];
$itmNmMetal = $_GET['itmNmMetal'];
$itmNmMetalType = $_GET['itmNmMetalType'];
$itmNmProdType = $_GET['itmNmProdType'];
$itmNmCategory = $_GET['itmNmCategory'];
$itmNmName = $_GET['itmNmName'];
$panelName = $_GET['panelName'];
//echo '$panelName =='.$panelName;
//
///* * *******Start code to get om layout value of loan date @Author:PRIYA25APR15**************** */
$selLoanDateOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'loanDateOpt'";
$resLoanDateOpt = mysqli_query($conn, $selLoanDateOpt);
$rowLoanDateOpt = mysqli_fetch_array($resLoanDateOpt);
$loanDateOpt = $rowLoanDateOpt['omly_value'];
/* * *******End code to get om layout value of loan date @Author:PRIYA25APR15**************** */
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Stock Master Update</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emAddOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emOwnerLogin.js"></script>
    </head>
    <body>
        <div class="grey-back">
            <!-- Code Start inside Box -->
            <table border="0" cellspacing="2" cellpadding="2" width="100%">
                <?php
//                $qSelAllLeads = "SELECT * FROM contact WHERE contact_id = '$contactId'";
//                $resAllLeads = mysqli_query($conn, $qSelAllLeads) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllLeads);
//                $rowAllLeads = mysqli_fetch_array($resAllLeads, MYSQLI_ASSOC);
//
//                $contactId = $rowAllLeads['contact_id'];
//                $contactName = $rowAllLeads['contact_name'];
//                $contactPhnNo = $rowAllLeads['contact_phn_no'];
//                $contactEmail = $rowAllLeads['contact_email'];
//                $contactSub = $rowAllLeads['contact_sub'];
//                $contactServ = $rowAllLeads['contact_serv'];
//                $contactMesg = $rowAllLeads['contact_mesg'];
//                $contactWebsite = $rowAllLeads['contact_website'];
//                $contactDate = $rowAllLeads['contact_date'];
//                $contactLead = $rowAllLeads['contact_lead'];
//                $contactProdId = $rowAllLeads['contact_prod_id'];
//                $contactLoginId = $rowAllLeads['contact_login_id'];
//                $contactRating = $rowAllLeads['contact_rating'];
//                $contactFeature = $rowAllLeads['contact_feature'];
//                $contactIndi = $rowAllLeads['contact_indi'];
//                $contatCity = $rowAllLeads['contact_city'];
//                $contactReqType = $rowAllLeads['contact_reqType'];
//                $contactDownProduct = $rowAllLeads['contact_down_product'];
//                $contactIpAddress = $rowAllLeads['contact_ip_address'];
//                $contactRef = $rowAllLeads['contact_ref'];
//                $contactEntryDate = $rowAllLeads['contact_entry_date'];
//                $contactEntryDate = $rowAllLeads['contact_entry_date'];
//                $contactDelStatus = $rowAllLeads['contact_del_status'];
                ?>
            </table>
            <?php include 'omStockMasterSetup.php'; ?>
            <!-- Code End inside Box -->
        </div>
    </body>
</html>