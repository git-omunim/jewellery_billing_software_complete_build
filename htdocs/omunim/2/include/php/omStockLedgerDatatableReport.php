<?php
/*
 * **************************************************************************************
 * @Description: STOCK LEDGER DATATABLE FILE @AUTHOR:PRIYANKA-25OCT2021
 * **************************************************************************************
 *
 * Created on OCT 25, 2021 04:26:01 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerDatatableReport.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.92
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * **************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:25OCT2021
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.92
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Stock Ledger</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon"  href="<?php echo $documentRoot;?>/images/favicon.ico" />

        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/plugins/bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/css/poppins.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/omglobal/css/components.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/frontend/onepage/css/style.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/frontend/onepage/css/style-responsive.css" rel="stylesheet"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/frontend/onepage/css/themes/red.css" rel="stylesheet" id="style-color"/>
        <link href="<?php echo $documentRootBSlash; ?>/assets/frontend/onepage/css/custom.css" rel="stylesheet"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/body.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/orcss.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/mainLayout.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/barCodeLabel.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/custom.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/OmJqueryDT.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/omButtonsDT.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/OmRowReorderDT.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/OmResponsiveDT.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/omNavigatationStockForm.css"/>

        <link href="<?php echo $documentRootBSlash; ?>/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $documentRootBSlash; ?>/assets/assets/demo/default/base/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $documentRootBSlash; ?>/assets/assets/demo/default/base/m-portlet.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $documentRootBSlash; ?>/assets/assets/demo/default/base/nav.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emAddOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogHeadNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/olHeadNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orHeadNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogNavFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/advanceMetal.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/accBalance.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orNavFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omMainNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omHeadNav.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogNavFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emNavigation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emUpdateOwner.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omCalculation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omLangDisplayMess.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_2_4_7.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/advanceMetal.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogCrFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogijAddFunction_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/accBalance.js"></script>

        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJquery-1.12.4.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJqueryDT.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmDTButtons.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmButtonsFlash.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJszip.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmPdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmVfsFonts.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmButtonsHtml5.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmButtonsColVis.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmDTSelect.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmDTResponsive.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omDataTablesMain.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmButtonsPrint.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"> 
    </head>
    <body class="light-yellow-back">
        <div id="StockLedgerReportMainDiv">
            <?php
//
//
// ****************************************************************************************
// START CODE FOR STOCK LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021
// ****************************************************************************************
//
            include 'omStockLedgerMainTransReport.php';
//
// ****************************************************************************************
// END CODE FOR STOCK LEDGER PANEL @AUTHOR:PRIYANKA-25OCT2021
// ****************************************************************************************
//
//
            ?>
        </div>
    </body>
</html>