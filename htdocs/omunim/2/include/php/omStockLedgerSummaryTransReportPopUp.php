<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY TRANSACTION REPORT POP UP @AUTHOR:PRIYANKA-13OCT2021
 * **************************************************************************************
 * 
 * Created on OCT 13, 2021 12:30:00 PM
 *
 * @FileName: omStockLedgerSummaryTransReportPopUp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.84
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR:PRIYANKA-13OCT2021
 *  REASON:
 *
 */
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
$size = '100%';
$font_size = '12px'; 
//
//echo '$documentRoot == ' . $documentRoot . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php if ($_GET['counterPanelName'] == 'StockCounterReportPanel') { ?>
        <title>STOCK COUNTER</title>
        <?php } else { ?>
        <title>Stock Summary</title>
        <?php } ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

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
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogAddFunctions_2_4_7.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/accBalance.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omCalculation.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogijAddFunction_1_6_1.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/ogCrFunctions.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/omLangDisplayMess.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6_1.js"></script>
        
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/emValidate.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJquery-1.12.4.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJqueryDT.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmDTButtons.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmButtonsFlash.min.js"></script>
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/OmJszip.min.js"></script>
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
        <div id="main_ajax_loading_div" style="visibility: hidden;">
            <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
        </div> 
        <?php
        //
        //echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
        //
        ?>       
        <div id="stockSummaryDetailsMainDiv" class="light-yellow-back">
            <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
            <?php
            //
            //echo 'documentRootIncludePhp == ' . $_SESSION['documentRootIncludePhp'] . '<br />';
            //
            include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerSummaryTransReport.php';
            //
            ?>
        </div>
    </body>
</html>