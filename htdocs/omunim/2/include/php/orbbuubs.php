<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Ledger Book
 * **************************************************************************************
 * 
 * Created on Jun 21, 2013 5:28:57 PM
 *
 * @FileName: orbbuubs.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: Expression project.name is undefined on line 12, column 20 in Templates/Scripting/EmptyPHP.php.
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
include 'ommprspc.php';

require_once 'system/omssopin.php';
?>
<div id="udhaarLedgerDetails">
    <?php
    $getYear = $_GET['balanceSheetYear'];
    $getMonth = $_GET['balanceSheetMonth'];

    if ($getYear == '' && $getMonth == '') {
        $getYear = $_POST['balanceSheetYear'];
        $getMonth = $_POST['balanceSheetMonth'];
    }
    $selFirmId = $_GET['firmId'];
    if (!isset($selFirmId)) {
        $firmIdSelected = $_SESSION['setFirmSession'];
        $selFirmId = $firmIdSelected;
    } else {
        $firmIdSelected = $selFirmId;
    }
    if ($selFirmId == '' || $selFirmId == NULL) {
        $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
    } else {
        $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
    }
    $resultFirm = mysqli_query($conn, $qSelectFirm);
    $rowFirm = mysqli_fetch_array($resultFirm);
    ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" colspan="5">
                <hr color="#B8860B" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="0" cellspacing="0" cellpadding="1" width="100%" align="center">      
                    <tr>
                        <td valign="middle" align="center" width="200px">
                            <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>
                        <td valign="middle" align="right" class="frm-lbl" width="200px">
                            Select Financial Year:
                        </td>
                        <td align="left" valign="middle">
                            <form name="get_balance_sheet_form" id="get_balance_sheet_form" 
                                  action="javascript:getGirviLedger('UdhaarLedger');" method="post">        
                                <!-- *************** Start Code for Year *************** -->
                                <?php
                                if ($getMonth != '' || $getMonth != NULL) {
                                    $todayMMSel = date("n", strtotime($getMonth)) - 1;
                                } else {
                                    $todayMMSel = date(n) - 1;
                                }
                                if ($getYear != '' || $getYear != NULL) {
                                    $todayYear = $getYear;
                                } else {
                                    $todayYear = date(Y);
                                }
                                $todayMainYear = date(Y);
                                $todayMainMM = date(n);
                                $todayMM = $todayMMSel + 1;
                                if ($todayMainMM <= 3) {
                                    if ($todayMM <= 3) {
                                        $finStartYear = $todayYear - 1;
                                        $finEndYear = $todayYear;
                                    } else {
                                        $finStartYear = $todayYear;
                                        $finEndYear = $todayYear - 1;
                                    }
                                } else {
                                    if ($todayMM <= 3) {
                                        $finStartYear = $todayYear - 1;
                                        $finEndYear = $todayYear;
                                    } else {
                                        $finStartYear = $todayYear;
                                        $finEndYear = $todayYear + 1;
                                    }
                                }
                                $optYear[$todayYear] = "selected";
                                ?> 
                                <select id="balanceSheetYear" name="balanceSheetYear" class="lgn-txtfield">
                                    <option value="NotSelected">YEAR</option>
                                    <?php
                                    if ($todayMainMM <= 3) {
                                        for ($yy = $todayMainYear; $yy >= 1980; $yy--) {
                                            $ly = $yy - 1; //TO get previous year

                                            echo "<option value=\"$yy\" $optYear[$yy]>$ly - $yy</option>";
                                        }
                                    } else {
                                        for ($yy = $todayMainYear; $yy >= 1980; $yy--) {
                                            $ny = $yy + 1; //TO get previous year
                                            echo "<option value=\"$yy\" $optYear[$yy]>$yy - $ny</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <!-- *************** Start Code for Month *************** -->
                                <?php
                                // $todayMMSel = date(n) - 1;
                                $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                $optMonth[$todayMMSel] = "selected";
                                ?> 
                                <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                <select id="balanceSheetMonth" name="balanceSheetMonth" class="lgn-txtfield"
                                        onkeydown="javascript:  //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                gbMonth = document.getElementById('gbMonthId').value;
                                                if (gbMonth == 1) {
                                                    if (event.keyCode) {
                                                        var sel = String.fromCharCode(event.keyCode);
                                                        if (sel == 0)
                                                        {
                                                            this.value = arrMonths[9];
                                                        } else if (sel == 1)
                                                        {
                                                            this.value = arrMonths[10];
                                                        } else if (sel == 2)
                                                        {
                                                            this.value = arrMonths[11];
                                                        }
                                                        // this.value = arrMonths[10];
                                                        document.getElementById('gbMonthId').value = 0;
                                                    }
                                                } else if (event.keyCode) {
                                                    var sel = String.fromCharCode(event.keyCode) - 1;
                                                    this.value = arrMonths[sel];
                                                    if (event.keyCode == 49) {
                                                        document.getElementById('gbMonthId').value = 1;
                                                    }
                                                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13">
                                    <option value="NotSelected">MONTH</option>
                                    <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                    $queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
                                    $engmonformat = mysqli_query($conn, $queryengmonformat);
                                    $rowengmonformat = mysqli_fetch_array($engmonformat);
                                    $englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************

                                    for ($mm = 3; $mm <= 11; $mm++) {

//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                        if ($englishMonthFormat == 'displayinnumber') {
                                            $billMonth = date('m', strtotime($arrMonths[$mm]));
                                            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
                                        } else {
                                            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                        }
                                    }
                                    for ($mm = 0; $mm <= 2; $mm++) {

                                        if ($englishMonthFormat == 'displayinnumber') {
                                            $billMonth = date('m', strtotime($arrMonths[$mm]));
                                            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
                                        } else {
                                            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                        }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                                    }
                                    ?>
                                </select> 
                                <input type="submit" value="GO"
                                       class="frm-btn" 
                                       maxlength="30" size="15" />
                            </form>
                        </td>
                        <td align="center" width="150px">
                            <table border="0" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right">
                                        <div id="selectFirmDiv" class="spaceRight20" >
                                            <?php
                                            $firmPanelName = 'UdhaarLedger';
                                            include 'ombbglfr.php';
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="5">
                <hr color="#A4A4A4" size="0.1px" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="balanceSheetDiv">
                    <div id="balanceSheetHeaderDiv">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valign="middle" align="center" colspan="3">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tr><td width="50%"><table align="right"><tr>
                                                        <td valign="middle" align="right">
                                                            <img src="<?php echo $documentRoot; ?>/images/udhaar24.png" alt="" onLoad="setScrollIdFun('headerOfUdharTable')"/> <!-- to add image and changes to adjust it @AUTHOR: SANDY30JUL13 -->
                                                        </td>
                                                        <td valign="middle" align="right">
                                                            <div class="main_link_brown18">UDHAAR LEDGER</div>
                                                        </td> 
                                                    </tr></table></td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td class="spaceLeft200" align="left">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <div class="main_link_brown">Daily Maintenances - <span class="blackMess14Arial-BalanceSheet">01/04/</span></div>  
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <span class="blackMess14Arial-BalanceSheet"><div id="finStartYearDiv"><?php echo $finStartYear; ?></div></span> 
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <div class="main_link_brown">&nbsp;To&nbsp;<span class="blackMess14Arial-BalanceSheet">31/03/</span></div>
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <span class="blackMess14Arial-BalanceSheet"><div id="finEndYearDiv"><?php echo $finEndYear; ?></div></span> 
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td valign="middle" align="left">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td valign="middle" align="right" width="520px">
                                                <div class="main_link_blue"><?php
                                            if ($rowFirm['firm_long_name'] != '' || $rowFirm['firm_long_name'] != NULL) {
                                                echo $rowFirm['firm_long_name'] . ' ' . ',';
                                            }
                                            ?>
                                                </div>
                                            </td>
                                            <td valign="middle" align="center">
                                                <div class="main_link_blue"><?php echo $rowFirm['firm_address']; ?></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="center">
                                    <br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td align="left">
                                <div id="balanceSheetUdhaarSubDiv">
                                    <?php
                                    include 'orbbuubd.php';
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                    <tr>
                        <td valign="middle" align="center">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="noPrint">
                            <div id="ajaxLoadPrintBalanceSheetDiv" style="visibility: hidden">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                            <a style="cursor: pointer;"   class="noPrint"
                               onclick="printBalanceSheetDiv('balanceSheetHeaderDiv', document.getElementById('get_balance_sheet_form'), 'OMREVO')">
                                <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                     width="32px" height="32px" />
                            </a>   <!---Add noprint class @AUTHOR: SANDY10DEC13--->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br/>
</div>

