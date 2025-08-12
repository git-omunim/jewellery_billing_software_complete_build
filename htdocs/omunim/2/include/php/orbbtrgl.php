<?php
/*
 * **************************************************************************************
 * @tutorial: Transferred Girvi Ledger 
 * **************************************************************************************
 * 
 * Created on Jun 8, 2013 11:59:25 AM
 *
 * @FileName: orbbtrgl.php
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
//CHANGES IN FILE TO ADJUST COLUMN WIDTH @AUTHOR: SANDY12DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
////***********************************************************************************************************************
//*************************************START CODE TO ADD NEPALI DATE @RENUKA SHARMA NOV2022*****************************//
//***********************************************************************************************************************
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
/* * ******Start code to add panel indiacator @Author:PRIYA16MAY14************ */
if ($_SESSION['sessionOwnIndStr'][9] == 'Y') {
    ?>
    <div id="girviTransLedgerDetails">
        <?php
        $getYearN = $_GET['balanceSheetYear'];
        $getMonthN = $_GET['balanceSheetMonth'];
        $getYear = $_GET['balanceSheetYear'];
        $getMonth = $_GET['balanceSheetMonth'];
        //
//        if ($nepaliDateIndicator == 'YES') {
//            $getMonth = strtoupper($getMonth);
//            if ($getYear != '') {
//                // echo '$syear:=' . $syear . '$smonth:' . $smonth . '$sday:=' . $sday;
//                $nepali_fromdate = new nepali_date();
//                $getDay = 1;
//                $english_fromdate = $nepali_fromdate->get_eng_date($getYear, $getMonth, $getDay);
//                $todayDate = trim($english_fromdate['d']) . ' ' . trim(strtoupper($english_fromdate['M'])) . ' ' . trim($english_fromdate['y']);
//                $getMonth = strtoupper($english_fromdate['M']);
//                $getYear = $english_fromdate['y'];
//            }
//        }
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
        <div id="balanceSheetHeaderDiv">
            <table  border="0" cellspacing="0" cellpadding="0"  width="100%" align="center"><!----Class changed @Author:PRIYA25JUN14------------>
                <tr>
                    <td colspan="2" align="left">
                        <table border="0" cellspacing="0" cellpadding="1"  width="100%" align="center">      
                            <tr>
                                <td valign="middle" align="left" width="10px">
                                    <img src="<?php echo $documentRoot; ?>/images/img/money.png" height="20px" alt="" onLoad="setScrollIdFun('headerTable')"/><!----cHANGE IN ID @AUTHOR: SANDY10DEC13--->
                                </td>
                                <td>
                                    <div class="itemAddPnLabels12" style="font-size:16px;">TRANSFERRED LOAN LEDGER</div><!---CHANGES IN CLASS @AUTHOR: SANDY11DEC13--->
                                </td>
                                <td valign="middle" align="center"> 
                                    <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                                        <?php include 'omzaajld.php'; ?>
                                    </div>
                                </td>
                                <td align="left" valign="middle" >
                                    <form name="get_balance_sheet_form" id="get_balance_sheet_form" 
                                          action="javascript:getGirviLedger('TransGirvi');" method="post">        
                                        <!-- *************** Start Code for Year *************** -->
                                        <?php
                                        /* if ($getMonth != '' || $getMonth != NULL) {
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
                                          $finEndYear = $todayYear + 1;
                                          }
                                          } else {
                                          //                                    if ($todayMM <= 3) {
                                          //                                        $finStartYear = $todayYear - 1;
                                          //                                        $finEndYear = $todayYear;
                                          //                                    } else {
                                          //                                        $finStartYear = $todayYear;
                                          //                                        $finEndYear = $todayYear + 1;
                                          //                                    }
                                          if ($todayMM <= 3) {
                                          $finStartYear = $todayYear - 1;
                                          $finEndYear = $todayYear;
                                          } else {
                                          $finStartYear = $todayYear;
                                          $finEndYear = $todayYear + 1;
                                          }
                                          }
                                          $optYear[$todayYear] = "selected";comment by @AUTHOR: SANDY07JAN14 */
                                        /*                                         * *Start to add code @AUTHOR: SANDY07JAN14********** */
                                       
                                         if($nepaliDateIndicator == 'YES') {
                                                if ($getMonth != '' || $getMonth != NULL || $getYear != '' || $getYear != NULL) {
                                                    $todayDate = Date('d-M-Y');
                                                    $todaysDay = substr($todayDate, 0, 2);
                                                    $todayMonth = substr($todayDate, 3, -5);
                                                    if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $todayMonth)) {
                                                        // Convert the month abbreviation to its numeric representation (zero-padded)
                                                        $todayMonth = date('m', strtotime($todayMonth));
                                                    }
                                                    $todayYear = substr($todayDate, -4);
                                                    $date1 = $todaysDay . '-' . $todayMonth . '-' . $todayYear;
                                                    $startDD = strtotime($date1);

                                                    $date2 = '16' . '-' . 'JULY' . '-' . $todayYear;
                                                    $nepalifinyrstartDD = strtotime($date2);
                                                    $date_ne = $nepali_date->get_nepali_date($todayYear, $todayMonth, $todaysDay);
                                                    $todaysM = $date_ne[m];
                                                    if ($startDD < $nepalifinyrstartDD) {
                                                        $finStartYear = $getYear - 1;
                                                        $finEndYear = $getYear;
                                                    } else {
                                                        $finEndYear = $getYear + 1;
                                                        $finStartYear = $getYear;
                                                    }
                                                } else {
                                                    $todayDate = Date('d-M-Y');
                                                    $todaysDay = substr($todayDate, 0, 2);
                                                    $todayMonth = substr($todayDate, 3, -5);
                                                    if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $todayMonth)) {
                                                        // Convert the month abbreviation to its numeric representation (zero-padded)
                                                        $todayMonth = date('m', strtotime($todayMonth));
                                                    }
                                                    $todayYear = substr($todayDate, -4);
                                                    $date1 = $todaysDay . '-' . $todayMonth . '-' . $todayYear;
                                                    $startDD = strtotime($date1);

                                                    $date2 = '16' . '-' . 'JULY' . '-' . $todayYear;
                                                    $nepalifinyrstartDD = strtotime($date2);
                                                    $date_ne = $nepali_date->get_nepali_date($todayYear, $todayMonth, $todaysDay);
                                                    $todaysM = $date_ne[m];
                                                    if ($startDD < $nepalifinyrstartDD) {
                                                        $finStartYear = $date_ne[y] - 1;
                                                        $finEndYear = $date_ne[y];
                                                    } else {
                                                        $finEndYear = $date_ne[y] + 1;
                                                        $finStartYear = $date_ne[y];
                                                    }
                                                    $startyear = $todayYear;
                                                }
                                            } else {
                                        if ($getMonth != '' || $getMonth != NULL) {
                                            $todayMMSel = date("n", strtotime($getMonth)) - 1;
                                        } else {
                                            $todayMMSel = date(n) - 1;
                                        }

                                        if ($getYear != '' || $getYear != NULL) {
                                            $todayYear = $getYear;
                                        } else {
                                              if ($nepaliDateIndicator == 'YES') { 
                                                $today = date(d);
                                                $month = date(m);
                                                $todayYear = date(Y);
                                                $date_ne = $nepali_date->get_nepali_date($todayYear,$month,$today);
                                                $todayYear = $date_ne[y];
                                             }else{
                                            $todayYear = date(Y);
                                             }
                                        }

                                        $todayMainYear = date(Y);
                                        $todayMainMM = date(n);

                                        //$finStartYear = $todayYear; comment by @AUTHOR: SANDY05FEB14
                                        //$finEndYear = $todayYear + 1;comment by @AUTHOR: SANDY05FEB14
                                        /*                                         * Start to change code @AUTHOR: SANDY05FEB14** */
                                        if ($todayMainMM > 3 || $todayMMSel > 3 || ($getYear != '' || $getYear != NULL)) {
                                            $optYear[$todayYear] = "selected";
                                            $finStartYear = $todayYear;
                                        } else {
                                            $optYear[$todayYear - 1] = "selected";
                                            $finStartYear = $todayYear - 1;
                                        }
                                        $finEndYear = $finStartYear + 1;
                                         }
                                        /*                                         * End to change code @AUTHOR: SANDY05FEB14** */
                                        /*                                         * *End to add code @AUTHOR: SANDY07JAN14********** */
                                        ?> 
                                        <table valign="top">
                                            <tr>
                                                <td valign="middle">
                                                    <div class="main_link_brown9 paddingTop5" style="font-size:16px;">SELECT FINANCIAL YEAR:</div>
                                                </td>
                                                <?php if ($nepaliDateIndicator == 'YES') { ?>
                                                    <td valign="middle" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF" width="165px"><!--To change class @AUTHOR: SANDY29DEC13--->
                                                        <!--<div class="selectStyledBorderLess backFFFFFF floatLeft" style="width: 100px;">-->
                                                            <?php
                                                            $getdayN = 1;
                                                            $date_nepali = $getdayN . '-' . $getMonthN . '-' . $getYearN;
                                                            include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliFinancialYr.php';
                                                            ?>  
                                                        <!--</div>-->
                                                    </td>  <?php } else { ?>
                                                    <td valign="middle" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF" width="170px"><!--To change class @AUTHOR: SANDY29DEC13--->
                                                        <div class="selectStyledBorderLess backFFFFFF floatLeft" style="width:100px">
                                                            <select id="balanceSheetYear" name="balanceSheetYear" class="textLabel14CalibriGrey" style="width:100%">
                                                                <option value="NotSelected">YEAR</option>
                                                                <?php
                                                                /*  for ($yy = $finEndYear; $yy >= 1980; $yy--) {
                                                                  $ly = $yy - 1; //TO get previous year
                                                                  echo "<option value=\"$ly\" $optYear[$yy]>$ly - $yy</option>";
                                                                  }
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
                                                                  } comment by @AUTHOR: SANDY07JAN14 */
                                                                /*                                                                 * *Start to add code @AUTHOR: SANDY07JAN14********** */
                                                                for ($yy = $todayMainYear; $yy >= 1980; $yy--) {
                                                                    $ny = $yy + 1; //TO get previous year
                                                                    echo "<option value=\"$yy\" $optYear[$yy]>$yy - $ny</option>";
                                                                }//fin year changed @Author:PRIYA03MAR14
                                                                /*                                                                 * *End to add code @AUTHOR: SANDY07JAN14********** */
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <!-- *************** Start Code for Month *************** -->
                                                        <?php
                                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                        $optMonth[$todayMMSel] = "selected";
                                                        ?>
                                                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                        <div class="selectStyledBorderLess backFFFFFF floatLeft">
                                                            <select id="balanceSheetMonth" name="balanceSheetMonth" class="textLabel14CalibriGrey" style="width:100%"
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
                                                                <option value="NotSelected">MON</option>
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
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                                                for ($mm = 3; $mm <= 11; $mm++) {
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
                                                                }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                                                                ?>
                                                            </select> 
                                                        </div>
                                                    </td> <?php } ?>
                                                <td valign="middle">
                                                    <!---Start to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                    <div style="background: #bed8fd;border-radius: 0 5px 5px 0;margin-left:-7px;border: 1px solid #4788e4;border-left: 0;">
                                                        <?php
                                                        $inputId = " ";
                                                        $inputType = 'submit';
                                                        $inputFieldValue = 'GO';
                                                        $inputIdButton = " ";
                                                        $inputNameButton = '';
                                                        $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                                        // This is the main class for input flied
                                                        $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                                        $inputStyle = "border:0;background:transparent; ";
                                                        $inputLabel = 'GO'; // Display Label below the text box
//
                                                        // This class is for Pencil Icon                                                           
                                                        $inputIconClass = '';
                                                        $inputPlaceHolder = '';
                                                        $spanPlaceHolderClass = '';
                                                        $spanPlaceHolder = '';
                                                        $inputOnChange = "";
                                                        $inputOnClickFun = '';
                                                        $inputKeyUpFun = '';
                                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                                        $inputMainClassButton = '';           // This is the main division for Button
                                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                        ?>
                                                    </div>
        <!--                                                <input type="submit" value="GO"
                                                           class="frm-btn" 
                                                           maxlength="30" size="15" />-->
                                                    <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                                <td align="center" width="265px">
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <tr>
                                            <td align="right">
                                                <div id="selectFirmDiv" class="spaceRight20" >
                                                    <?php
                                                    $firmPanelName = 'TransGirvi';
                                                    include 'ombbglfr.php';
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
<!--                            <tr>
                                <td align="center" colspan="6" class="paddingTop4 padBott4">
                                    <div class="hrGrey"></div>--Change in line @AUTHOR: SANDY12DEC13---
                                </td>
                            </tr>-->
                        </table>
                    </td>
                </tr>
            </table>
            <div id="balanceSheetDiv">
                <table width="99%" border="0" cellspacing="0" cellpadding="0" align="center"  onclick="contentEditable = true"  style="border: 1px dashed #c1c1c1;margin-top: 5px;padding: 5px;background: #fcfdda;">
                    <tr>
                        <td colspan="2">
                            <table border="0" cellspacing="2" cellpadding="0" width="100%" >
                                <tr>
                                    <td valign="middle" align="center">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td valign="middle" align="center">
                                                    <div class="main_link_brown12">TRANSFERRED LOAN LEDGER - <span class="itemAddPnLabels12Arial">01/04/</span></div>  
                                                </td>
                                                <td valign="middle" align="center">
                                                    <span class="itemAddPnLabels12Arial"><div id="finStartYearDiv"><?php echo $finStartYear; ?></div></span> 
                                                </td>
                                                <td valign="middle" align="center">
                                                    <div class="main_link_brown12">&nbsp;TO&nbsp;<span class="itemAddPnLabels12Arial">31/03/</span></div>
                                                </td>
                                                <!--Start code to change align @Author:PRIYA10FEB14-->
                                                <td valign="middle" align="center">
                                                    <span class="itemAddPnLabels12Arial"><div id="finEndYearDiv"><?php echo $finEndYear; ?></div></span> 
                                                </td>
                                                <!--End code to change align @Author:PRIYA10FEB14-->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="center">
                                        <table border="0" cellspacing="2" cellpadding="0">
                                            <tr>
                                                <td valign="middle" align="center" width="490px"><!----change in alignment @AUTHOR: SANDY12DEC13------>
                                                    <div class="itemAddPnLabels12Arial brown" style="font-size:16px;"><?php
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
                                                    <div class="itemAddPnLabels12Arial brown"><?php echo $rowFirm['firm_address']; ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%" class="marginTop5">
                                <tr>
                                    <td  align="center">
                                        <div id="balanceSheetSubDiv">
                                            <?php
                                            include 'orbbtrgd.php';
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <br/>
                <tr>
                    <td align="right" class="noPrint">
                        <div id="ajaxLoadPrintBalanceSheetDiv" style="visibility: hidden">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                        <a style="cursor: pointer;"  class="noPrint"
                           onclick="printBalanceSheetDiv('balanceSheetDiv', document.getElementById('get_balance_sheet_form'), 'TransGirvi')">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" />
                        </a>   <!---Add noprint class @AUTHOR: SANDY10DEC13--->
                    </td>
                        <td align="left" class="noPrint">
                        <div id="ajaxLoadPrintBalanceSheetDiv" style="visibility: hidden">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                        <a style="cursor: pointer;" class="noPrint"
                           onclick="exportTableToExcel('exportexldiv', 'tableData')">
                            <svg height="35" width="35" version="1.1" style="margin-left : 7px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                     viewBox="0 0 504 504" xml:space="preserve">
                                <circle style="fill:#84DBFF;" cx="252" cy="252" r="252"/>
                                <polygon style="fill:#324A5E;" points="94.5,389.8 409.5,389.8 409.5,284 371.4,284 371.4,351.7 132.6,351.7 132.6,284 94.5,284 "/>
                                <polygon style="fill:#F1543F;" points="203.8,208.4 203.8,74.8 300.2,74.8 300.2,208.4 343.8,208.4 252,315.9 160.2,208.4 "/>
                                </svg>
                            </a>   <!---Add noprint class @AUTHOR: SANDY10DEC13--->
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <!-------------End code to add panel indiacator @Author:PRIYA17MAY14--------------->

