<?php
/*
 * Created on 06-Feb-2011 6:57:33 PM
 *
 * @FileName: omuupnal.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
$accFileName = $currentFileName;
include 'ommpemac.php';
?>
<div id="mainMiddle">
    <div id="udhaarDetPanel">
        <?php
        $panel = $_GET['panelName'];
        $upPanelName = $_GET['udhaarUpdateRows'];
        if ($upPanelName == 'UdhaarUpdateRows') {
            $rowsPerPage = $_GET['rowsPerPage'];
            $ominValue = $rowsPerPage;
            $ominOption = 'indiudpnrw';
            include 'ommpindc.php';
        }
        $qSelGNoOfRows = "SELECT omin_value FROM omindicators where omin_own_id='$_SESSION[sessionOwnerId]' and omin_option = 'indiudpnrw'";
        $resGNoOfRows = mysqli_query($conn, $qSelGNoOfRows);
        $rowGNoOfRows = mysqli_fetch_array($resGNoOfRows, MYSQLI_ASSOC);
        $rowsPerPage = $rowGNoOfRows['omin_value'];
        if ($rowsPerPage == '' || $rowsPerPage == NULL || $rowsPerPage == 0) {
            $rowsPerPage = 15;
        }
        $checkNextRows = $rowsPerPage * 2;
        // by default we show first page
        $pageNum = 1;
        $gCounter = 0;
        // if $_GET['page'] defined, use it as page number
        if (isset($_GET['page'])) {
            $pageNum = $_GET['page'];
            $gCounter = ($pageNum - 1) * $rowsPerPage;
        }
        // counting the offset
        $perOffset = ($pageNum - 1) * $rowsPerPage;
        ?>
        <?php
        if ($_SESSION['sessionOwnIndStr'][25] != 'N') {
            //
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            // START TO CODE FOR NEW MENU DESIGN WITH TAB FORMAT AT UDHAAR PANEL @AUTHOR:MADHUREE-15APRIL2020
            // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
            //
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td colspan="2" align="left">
                        <table border="0" cellspacing="0" cellpadding="1" width="100%">
                            <tr>
                                <td valign="top" align="left" colspan="9">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td valign="middle" align="left" width="20px">
                                                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/udhaar32.png" alt="" /></div>
                                            </td>
                                            <td valign="middle" align="left">
                                                <div class="textLabelHeading paddingRight5">UDHAAR PANEL</div>
                                            </td>
                                            <td align="center" valign="middle" class="orange">(
                                                <input id="udharListtrowsPerPage" name="udharListtrowsPerPage" type="text" value="<?php echo $rowsPerPage; ?>" title="Enter number of Items To See In List"
                                                       size="4" maxlength="4" class="inputFieldWithotBorder orange"
                                                       onkeyup="if (event.keyCode == 13 && document.getElementById('udharListtrowsPerPage').value != '') {
                                                                   showNoOfRows('<?php echo $documentRoot; ?>', document.getElementById('udharListtrowsPerPage').value, '1', 'UdhaarUpdateRows', '<?php echo $panel; ?>', '');
                                                               }"
                                                       onblur="if (document.getElementById('udharListtrowsPerPage').value != '') {
                                                                   showNoOfRows('<?php echo $documentRoot; ?>', document.getElementById('udharListtrowsPerPage').value, '1', 'UdhaarUpdateRows', '<?php echo $panel; ?>', '');
                                                               }
                                                       "
                                                       onclick="this.placeholder = 'ROWS';
                                                               this.value = '';"
                                                       onkeypress="javascript:return valKeyPressedForNumber(event);"/>
                                                )
                                            </td>
                                            <td valign="middle" align="center">
                                                <div id="ajaxLoadShowSearchUdhaarDiv" style="visibility: hidden" class="blackMess11">
                                                    <?php include 'omzaajld.php'; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                </tr>
    <!--                <tr>
                    <td align="center" colspan="2">
                        <hr color="#B8860B" />
                    </td>
                </tr>-->
    <!--                <tr align="left">
                    <td align="left" valign="middle" colspan="2">
                        <div id="searchUdhaarPanelDiv"></div>
                    </td>
                </tr>-->
            </table>
            <div class="m-portlet__body" style="margin-top: 2px;margin-bottom: 2px;">
                <?php $panelName1 = $_REQUEST['panelName']; ?>
                <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="    height: 30px;background:#f9f7a2;border:0px solid #f9f0b5;box-shadow: 1px 2px 10px rgba(214, 213, 213, 0.3);">
                    <?php if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'B') { ?>
                        <li class="nav-item crdr dropdown  <?php if ($panelName1 == 'activeUdhaarList' || $panelName1 == 'UdhaarPanel') {
                    echo 'active';
                } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr01" style="width:1%;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('activeUdhaarList');">
                                ACTIVE UDHAAR
                            </button>
                            <button type="button" class="nav-link-inline-block  schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="tab" onclick="showAllUdhaarDetailsDiv('activeUdhaarListInt');">ACTIVE UDHAAR WITH INTEREST AMT</a>
                            </div>
                        </li>
    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'allUdhaarList') {
            echo 'active';
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr02" style="width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('allUdhaarList');">
                                ALL UDHAAR
                            </button>
                        </li>
                         <li class="nav-item crdr dropdown <?php if($panelName1 == 'custCrDrList'){echo 'active';} ?>"  onclick="showact('crdr',this.getAttribute('id'))" id="crdr03" style="width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('custCrDrList');">
                                CUST CR/DR
                            </button>
                        </li>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'udhaarCustList') {
            echo 'active';
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr03" style="width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('udhaarCustList');">
                                UDHAAR CUST
                            </button>
                        </li>
                    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'S') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'UdhaarDepositList') {
                            echo 'active';
                        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr04" style="width:20px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"  
                                    onclick="showAllUdhaarDetailsDiv('UdhaarDepositList');" style="font-size: 16px;" >
                                UDHAAR DEPOSIT
                            </button>
                        </li>
    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'UdhaarList') {
            echo 'active';
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr05" style="width:20px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('UdhaarList');">
                                UDHAAR & DEPOSIT
                            </button>
                        </li>
    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'B') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'ActiveAdvanceMoney') {
            echo 'active';           
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr06" style="width:20px;">
                            <!-- Add new list to show all active advance @omkar24JAN 2024-->
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('ActiveAdvanceMoney');" >                          
                                ACT. ADV. MONEY
                            </button>
                        </li>
    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'AllAdvanceMoney') {
            echo 'active';
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr07" style="width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('AllAdvanceMoney');">
                                ALL ADV. MONEY
                            </button>
                        </li>
                    <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'AdvanceReturn') {
                    echo 'active';
                } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr08" style="width:0px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('AdvanceReturn');">
                                ADV. RETURN
                            </button>
                        </li>
            <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'A') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'Advance') {
                    echo 'active';
                } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr09" style="width:25px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"  
                                    onclick="showAllUdhaarDetailsDiv('Advance');" style="font-size: 16px;" >
                                ADV. MONEY-RETURN
                            </button>
                        </li>
    <?php } ?>
                          <?php } if ($_SESSION['sessionOwnIndStr'][25] == 'Y' || $_SESSION['sessionOwnIndStr'][25] == 'A' || $_SESSION['sessionOwnIndStr'][25] == 'B') { ?>
                        <li class="nav-item crdr dropdown <?php if ($panelName1 == 'advanceMoney') {
            echo 'active';
        } ?>"  onclick="showact('crdr', this.getAttribute('id'))" id="crdr06" style="width:20px;">
                            <button type="button" class="nav-link-inline-block schemClr" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 16px;" onclick="showAllUdhaarDetailsDiv('advanceMoney');" >                          
                                ADVANCE MONEY
                            </button>
                            <button type="button" class="nav-link-inline-block  schemClr dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="tab" onclick="showAllUdhaarDetailsDiv('settledList');">ADVANCE MONEY SETTLED REPORT</a>
                            </div>
                        </li>
                </ul>
            </div>
            <table width="100%">
    <!--                <tr>
                    <td align="center" colspan="2">
                        <hr color="#B8860B" />
                    </td>
                </tr>-->
            </table>
                    <?php
                }
                //
                // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                // END TO CODE FOR NEW MENU DESIGN WITH TAB FORMAT AT UDHAAR PANEL @AUTHOR:MADHUREE-15APRIL2020
                // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
                //
                ?>
        <div id="udhaarSubDetailsDiv">
            <div id="udhaarListPanelDiv">
                <?php
                if ($panel == 'udhaarCustList') {
                    include 'omuualdt.php';
                } else if ($panel == 'udhaarExpiredCustList') {
                    include 'omuuexll.php';
                } else if ($panel == 'udhaarCompleteList') {
                    include 'omuualdt.php';
                } else if ($panel == 'advanceMoney') {
                    //
                    $admnPanel = 'AdvanceMoney';
                    //
                    if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        include 'omrtadmnlt.php';
                    } else {
                        include 'omadmnlt.php';
                    }
                    //
                } else if ($panel == 'udhaarEmiList') {
                    include 'omuemilt.php';
                } else if ($panel == 'emiList') { //Start code to add condition for udhaar EMI List @Author:SHRI15MAY15
                    include 'omsemilt.php';
                } else if ($panel == 'UdhaarDepositList') { //Start code to add condition for udhaar EMI List @Author:SHRI15MAY15
                    include 'omuddelt.php';
                } else if ($panel == 'UdhaarList') { //Start code to add condition for udhaar EMI List @Author:SHRI15MAY15
                    include 'omuualud.php';
                } else if ($panel == 'Advance') { //Start code to add condition for udhaar EMI List @Author:SHRI15MAY15
                    include 'omalamdt.php';
                } else if ($panel == 'AdvanceReturn') { //Start code to add condition for advance return List @Author:RATNAKAR12MAY18
                    include 'omadrtlt.php';
                } else if ($panel == 'advanceCustList') { //Start code to add condition for advance return List @Author:RATNAKAR12MAY18
                    include 'omadaldt.php';
                } else if ($panel == 'activeUdhaarList') {
                    //
                    if ($_SESSION['sessionProdName'] == 'OMRETL') {
                        include 'omrtuuault.php';
                    } else {
                        include 'omuuault.php';
                    }
                    //
                } else if ($panel == 'allUdhaarList') {
                    include 'omuuallult.php';
                } else if ($panel == 'AllAdvanceMoney') {
                    include 'omalladvlt.php';
                } else if ($panel == 'ActiveAdvanceMoney') { // add to show the active advance list @omkar24JAN2024
                    include 'omuault.php';
                }else if ($panel == 'custCrDrList') {
                    include 'omcustcrdrlist.php';      // ADDED CUSTOMER CR/DR REPORRT@SIMRAN:03FEB2024
                } else if ($panel == 'settledList') {
                    include 'omsettledreport.php';   
                } else {
                    include 'omuuault.php';   
                    //include 'omuddelt.php';
                }
                ?>
            </div>
            <!-----------Start to add print button @AUTHOR: SANDY11DEC13---------------->
            <table width="100%" align="center">
                <tr>
                    <td align="center" class="noPrint">
                        <a style="cursor: pointer;" 
                           onclick="printGirviListPanel('udhaarSubDetailsDiv');">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='PRINT' title='PRINT'
                                 width="32px" height="32px" /> 
                        </a> 
                    </td>
                </tr>
            </table>
            <!-----------End to add print button @AUTHOR: SANDY11DEC13---------------->
        </div>
        <br />
    </div>