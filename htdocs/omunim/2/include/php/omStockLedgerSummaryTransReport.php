<?php
/*
 * **************************************************************************************
 * @tutorial: STOCK LEDGER SUMMARY TRANSACTION REPORT @AUTHOR:PRIYANKA-12OCT2021
 * **************************************************************************************
 * 
 * Created on OCT 12, 2021 05:30:00 PM
 *
 * @FileName: omStockLedgerSummaryTransReport.php
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
 *  AUTHOR: @AUTHOR:PRIYANKA-12OCT2021
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
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
if ($_SESSION['sessionOwnIndStr'][9] == 'Y') { ?>
    <div id="goldLedgerDetails">
        <?php
        // STOCK TALLY RFID @AUTHOR:YUVRAJ-25112022
        if ($panelNameStockTally == '' || $panelNameStockTally == NULL)
             $panelNameStockTally = $_GET['panelNameStockTally'];
        //
        //print_r($_REQUEST);
        //
        //echo '$documentRoot == ' . $documentRoot . '<br />';
        //
        $getYear = $_GET['balanceSheetYear'];
        $getMonth = $_GET['balanceSheetMonth'];
        //
        if ($getYear == '' && $getMonth == '') {
            $getYear = $_POST['balanceSheetYear'];
            $getMonth = $_POST['balanceSheetMonth'];
        }
        //
        $selFirmId = $_GET['firmId'];
        //
        if (!isset($selFirmId)) {
            $firmIdSelected = $_SESSION['setFirmSession'];
            $selFirmId = $firmIdSelected;
        } else {
            $firmIdSelected = $selFirmId;
        }
        //
        if ($selFirmId == '' || $selFirmId == NULL) {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
        } else {
            $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
        }
        //
        //
        // To display data in this form @AUTHOR:PRIYANKA-12OCT2021
        $resultFirm = mysqli_query($conn, $qSelectFirm);
        $rowFirm = mysqli_fetch_array($resultFirm);
        //
        //
        if ($transPanelDetailsDisplay == '' || $transPanelDetailsDisplay == NULL)
            $transPanelDetailsDisplay = $_GET['transPanelDetailsDisplay'];
        //
        //
        ?>
        <div id="balanceSheetHeaderDiv">
            <table width="100%" border="0" cellspacing="0" cellpadding="0"  align="center">
                <tr>
                    <td colspan="2" align="left">
                        <table  border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tr>
                                <td valign="middle" align="right" width="10px">
                                    <img src="<?php echo $documentRoot; ?>/images/stock24.png" height="20px" alt="" />
                                </td>
                                <td valign="middle" align="left" class="padLeft5">
                                    <div class="itemAddPnLabels12" style="font-size:16px;">
                                        <?php if ($_GET['counterPanelName'] == 'StockCounterReportPanel') { ?>
                                        STOCK COUNTER TRANSACTIONS
                                        <?php } else if ($transPanelDetailsDisplay == 'StockMismatchStockPurityPanel') { ?>
                                        UPDATE WRONG STOCK PURITY
                                        <?php } else { ?>
                                        STOCK SUMMARY TRANSACTIONS
                                        <?php } ?>
                                    </div>
                                </td>  
                                <td valign="middle" align="center">
                                    <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                                        <?php include $_SESSION['documentRootIncludePhp'] . 'omzaajld.php'; ?>
                                    </div>
                                </td>
                                <?php if ($transPanelDetailsDisplay != 'StockMismatchStockPurityPanel') { ?>
                                <td align="center" width="150px">
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td align="right">
                                                <div id="selectFirmDiv" class="spaceRight20">
                                                    <?php
                                                    $firmPanelName = 'RawMetalGoldTrans';
                                                    include $_SESSION['documentRootIncludePhp'] . 'ombbglfr.php';
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <?php } ?>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="5" class="paddingTop4 padBott4">
                        <div class="hrGrey"></div>
                    </td>
                </tr>
            </table>            
            <div id="balanceSheetDiv">
                <table width="100%" border="0" cellspacing="0" cellpadding="0"  align="center"   
                       onclick="contentEditable = true">
                    <tr>
                        <td colspan="2">
                            <?php if ($transPanelDetailsDisplay != 'StockMismatchStockPurityPanel') { ?>
                            <table border="0" cellspacing="2" cellpadding="0" width="100%">
                                <tr>
                                    <td valign="middle" align="center" colspan="3">
                                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                                            <tr>
                                                <td valign="middle" align="center">
                                                    <div class="main_link_brown12">DATE : <span class="itemAddPnLabels12Arial" style="font-size:15px;"><?php echo $_REQUEST['startDate']; ?></span></div>  
                                                </td>
                                                <td valign="middle" align="center">
                                                    <div class="main_link_brown12">&nbsp;TO&nbsp;<span class="itemAddPnLabels12Arial" style="font-size:15px;"><?php echo $_REQUEST['endDate']; ?></span></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="center">
                                        <table border="0" cellspacing="2" cellpadding="0">
                                            <tr>
                                                <td valign="middle" align="center" width="490px">
                                                    <div class="itemAddPnLabels12Arial brown" style="font-size:18px;"><?php
                                                        if ($rowFirm['firm_long_name'] != '' || $rowFirm['firm_long_name'] != NULL) {
                                                            echo $rowFirm['firm_long_name'];
                                                            if ($rowFirm['firm_address'] != '') {
                                                                echo ',';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="middle" align="center">
                                                    <div class="itemAddPnLabels12Arial brown" style="font-size:15px;"><?php echo ($rowFirm['firm_address']); ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                             <!-- START CODE FOR LAYOUT CHANGES @AUTHOR:PRIYANKA-12OCT2021-->
                            <div>
                                <table border="1" cellspacing="0" cellpadding="2" width="100%" class="marginTop5" 
                                       style="border-color: black;">
                                    <tr>
                                        <td align="left">
                                            <div id="balanceSheetSubDiv">
                                                <?php 
                                                //
                                                //echo 'documentRootIncludePhp #==# ' . $_SESSION['documentRootIncludePhp'] . '<br />';
                                                //
                                                //
                                                //  START ADD THIS omStockRfidTallySummaryMainTransReport.php CONDITION FOR STOCK TAKKY RFID @YUVRAJ 01122022
                                                if ($panelNameStockTally != '' || $panelNameStockTally != NULL ){ 
                                                include $_SESSION['documentRootIncludePhp'] . 'omStockRfidTallySummaryMainTransReport.php'; 
                                                } else {
                                                include $_SESSION['documentRootIncludePhp'] . 'omStockLedgerSummaryMainTransReport.php'; 
                                                }
                                                // END ADD THIS CONDITION FOR STOCK TAKKY RFID @YUVRAJ 01122022
                                                ?>                                 
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- END CODE FOR LAYOUT CHANGES @AUTHOR:PRIYANKA-12OCT2021-->
                        </td>
                    </tr>
                </table>
            </div>           
        </div>
        <!--<table border="0" cellspacing="0" cellpadding="1" width="100%">
            <br/>
            <tr>
                <td align="center" class="noPrint">
                    <div id="ajaxLoadPrintBalanceSheetDiv" style="visibility: hidden">
                        <?php //include $_SESSION['documentRootIncludePhp'] . 'omzaajld.php'; ?>
                    </div>
                    <a style="cursor: pointer;"  class="noPrint"
                       onclick="printBalanceSheetDiv('balanceSheetDiv', document.getElementById('get_balance_sheet_form'), 'RawMetalGoldTrans')">
                        <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                             width="32px" height="32px"/>
                    </a>
                </td>
            </tr>
        </table>-->
    </div>
<?php } ?>