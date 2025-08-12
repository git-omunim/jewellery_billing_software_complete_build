<?php
/**
 * **************************************************************************************
 * @tutorial: Girvi Panel Main File.
 * **************************************************************************************
 */
?>
<?php
/*
 * Created on 06-Feb-2011 6:57:33 PM
 *
 * @FileName: orgpgvpn.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
//change in file @AUTHOR: SANDY29DEC13
$currentFileName = basename(__FILE__);
//Start Staff Access API @AUTHOR: SANDY09JAN14
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @AUTHOR: SANDY09JAN14
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') {
    ?>
    <div id="mainMiddle" class="main_middle">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
    <!--                <td valign="top" align="left" width="32px">
                    <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/girviPanel32.png" alt="" /></div>
                </td>
                <td valign="middle" align="left">
                    <div id="GirviPanel" class="textLabelHeading">LOAN PANEL</div>
                </td>-->
                <td align="right" valign="bottom" style="position:relative">
                    <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden;position: absolute;left: 50%;top: 34px;" class="blackMess11">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="left">
                    <?php
                    //
                    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                    // START TO CODE FOR NEW MENU DESIGN WITH TAB FORMAT AT LOAN PANEL @AUTHOR:MADHUREE-15APRIL2020
                    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                    //
                    ?>
                    <div class="m-portlet__body">
                        <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="height:28px;margin-bottom: 5px;background:#f9f7a2;border: 0px solid #f9f0b5;
                            box-shadow: 1px 2px 10px rgba(214, 213, 213, 0.3);">
                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') { ?>
                                <li class="nav-item loan dropdown active"  onclick="showact('loan', this.getAttribute('id'))" id="loan01" style="width:0px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showLoansListPanel();">
                                        ACTIVE LOANS
                                    </button>
                                    <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                        <button type="button" class="nav-link-inline-block  schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="tab" onclick="showCustGirviITMListPanel()">LOANS ITEMS DETAIL</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showCustGirviITMPrinciListPanel();">LOANS ITEMS PRINCIPAL WISE</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showTPExpiredGirviListPanel();">TIME PERIOD EXPIRED LOANS</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showExpiredGirviListPanel();">ONE YEAR OLD LOANS</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showCustGirvirelSts('')">LOANS STATUS REPORT</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showActiveloanlistdetailspanel()">ACTIVE LOAN LIST REPORT</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showDepAndWith('')">DEPOSIT & WITHDRAW REPORT</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showAllActiveReleseLoansListPanel();">ALL LOAN REPORT</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showAllLoanWitemPanel();">ALL LOAN REPORT WITH ITEMS </a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showActiveloanlistWithMoreDetailsPanel();">ACTIVE LOAN LIST WITH MORE DETAILS </a>
                                            <!-- add new report for day and loan wise deposit report @omkae2-2-24 -->
                                            <a class="dropdown-item" data-toggle="tab" onclick="showActiveloandepositreportPanel();">ACTIVE LOAN DEPOSIT REPORT </a>
                                            <!-- ADDED CODE FOR LOCATION @AUTHOR:@Pratiksha-20-01-2025 -->
                                            <a class="dropdown-item" data-toggle="tab" onclick="showAllActiveReleseLoansDepositPanel();">ALL LOAN DEPOSIT REPORT</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showloandepositreportPanel();">LOAN DEPOSIT REPORT </a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showloandetailform8('<?php echo $documentRoot; ?>', 'printForm8');">PRINT MULTIPLE FORM 8</a>
                                            <a class="dropdown-item" data-toggle="tab" onclick="showLoanBoxReportPanel();">LOAN PACKET BOX REPORT </a>
                                        </div>
                                    <?php } ?>  
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') { ?>
                                <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan02" style="width:0px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showReleasedGirviListPanel();">
                                        RELEASED LOANS
                                    </button>
                                    <button type="button" class="nav-link-inline-block schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="tab" onclick="showReleasedGirviListPanelWithFincYear('currentYear');">RELEASE LOAN WITH FINANCIAL YEAR</a>
                                        <a class="dropdown-item" data-toggle="tab" onclick="showReleasedGirviListPanelWithMoreDetails();">RELEASE LOAN WITH MORE DETAILS</a>

                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan03" style="width:0px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showAuctionedListPanel();">
                                        AUCTIONED LOANS
                                    </button>
                                </li>
                            <?php } ?>
                            <?php
                            if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A' || $_SESSION['sessionOwnIndStr'][1] == 'B') {
                                if ($_SESSION['sessionOwnIndStr'][28] == 'Y' || $_SESSION['sessionOwnIndStr'][28] == 'A' || $_SESSION['sessionOwnIndStr'][28] == 'B' || $_SESSION['sessionOwnIndStr'][28] == 'S') {
                                    ?>
                                    <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan04" style="width:0px;">
                                        <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                                style="font-size: 16px;" onclick="showLossGirviListPanel();">
                                            LOANS IN LOSS
                                        </button>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan05" style="width:20px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showTransGirviListPanel('transLoanList');">
                                        TRANSFERED LOANS
                                    </button>
                                    <button type="button" class="nav-link-inline-block schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="tab" onclick="showGirviTransferredUnsettledTrans();">UNSETTELED TRANS. LOANS</a>
                                        <a class="dropdown-item" data-toggle="tab" onclick="showTransGirviListPanel('UnRelTransLoanList');">UN-RELEASED TRANS. LOANS</a>
                                        <a class="dropdown-item" data-toggle="tab" onclick="showMLLoan('');">MONEY LENDERS LOANS</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') { ?>
                                <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan06" style="border-radius: 4px !important;width:0px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showGirviTallyDiv();">
                                        TALLY LOANS
                                    </button>
                                </li>
                            <?php } ?>
                            <?php
                            if ($_SESSION['sessionOwnIndStr'][1] == 'Y' || $_SESSION['sessionOwnIndStr'][1] == 'A') {
                                if ($_SESSION['sessionOwnIndStr'][26] == 'Y' || $_SESSION['sessionOwnIndStr'][26] == 'A') {
                                    ?>
                                    <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan07" style="width:0px;">
                                        <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                                style="font-size: 16px;" onclick="showCustGirviEMIListPanel();">
                                            FINANCE EMI
                                        </button>
                                        <button type="button" class="nav-link-inline-block schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="tab" onclick="showCustGirviEMIListPanel('dueFinReport');">DUE DATE FINANCE REPORT</a>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <?php if ($_SESSION['sessionOwnIndStr'][28] == 'A' || $_SESSION['sessionOwnIndStr'][28] == 'S' || $_SESSION['sessionOwnIndStr'][28] == 'Y') { ?>
                                <li class="nav-item loan dropdown"  onclick="showact('loan', this.getAttribute('id'))" id="loan08" style="width:0px;">
                                    <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                            style="font-size: 16px;" onclick="showCustGirvifirmPanel('LoanPanel');">
                                        SETUP
                                    </button>
                                    <button type="button" class="nav-link-inline-block schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="tab" onclick="showCustGirvifirmPanel('LoanPanel');">FIRM CHANGE</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    //
                    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                    // END TO CODE FOR NEW MENU DESIGN WITH TAB FORMAT AT LOAN PANEL @AUTHOR:MADHUREE-15APRIL2020
                    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                    //
                    ?>
                </td>
            </tr>
            <tr align="left">
                <td align="left" valign="middle" colspan="3">
                    <div id="searchGirviPanelDiv"></div>
                </td>
            </tr>
        </table>
    <!--            <tr>
                <td align="center" colspan="3">
                    <hr color="#B8860B" />
                </td>
            </tr>-->
    <!--            <tr>
                <td colspan="3">-->
        <div id="girviListPanelDiv"> <!---to add class for division @AUTHOR: SANDY6NOV13---->
            <?php
            $panelName = $_REQUEST['panelName'];
            if ($panelName == 'ActiveGirviPanel') {
                include 'orgpllpn.php';
            } else if ($panelName == 'ReleasedGirviPanel') {
                include 'orgpregl.php';
            } else if ($panelName == 'AuctionedGirviPanel') {
                include 'orgpaucl.php';
            } else if ($panelName == 'LossedGirviPanel') {
                include 'orgplglp.php';
            } else if ($panelName == 'TransferedGirviPanel') {
                include 'orgptrgl.php';
            } else if ($panelName == 'TallyGirviPanel') {
                include 'orgpgtly.php';
            } else if ($panelName == 'FinanceGirviPanel') {
                include 'omfnllpn.php';
            } else if ($panelName == 'SetupGirviPanel') {
                include 'omchngfirmloan.php';
            } else {
                include 'orgpglpd.php';
            }
            ?>
        </div>
        <!--                </td>
                    </tr>-->
        <!--            <tr>
                        <td colspan="3"><br />
                        </td>
                    </tr>-->
        <table width="100%" align="center">
            <tr>
                <td align="center" colspan="3" class="noPrint">
                    <a style="cursor: pointer;" 
                       onclick="printGirviListPanel('girviListPanelDiv')">
                        <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print' class="printButtonPosition"
                             width="32px" height="32px" /> 
                    </a> 
                </td>
            </tr>

        </table>
        <br />
    </div>
<?php } ?>