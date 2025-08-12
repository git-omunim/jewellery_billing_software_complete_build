<?php
/*
 * **************************************************************************************
 * @tutorial: PRODUCT SELL PROFIT LOSS LIST @PRIYANKA-21SEP2018
 * **************************************************************************************
 * 
 * Created on SEP 21, 2018 14:40:00 PM
 *
 * @FileName: omsldgppll.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.90
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
include_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
//
$querystockValBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'stockValBy'";
$resstockValBy = mysqli_query($conn, $querystockValBy);
$rowstockValBy = mysqli_fetch_array($resstockValBy);
$stockValBy = $rowstockValBy['omly_value'];
//
if ($_SESSION['sessionOwnIndStr'][9] == 'Y') {
    //
    $date = $_GET['date'];
    $month = $_GET['month'];
    $year = $_GET['year'];
    $edate = $_GET['eday'];
    $emonth = $_GET['emonth'];
    $eyear = $_GET['eyear'];
    //
    $completeDate = $date . $month . $year;
    $endDate = $edate . $emonth . $eyear;
    //
     if($nepaliDateIndicator == 'YES'){
        if ($completeDate == '' || $completeDate == 'NULL') {
            $today = date("d-m-Y");
            $date_d = substr($today, 0, 2);
            $selMnth = substr($today, 3, -5);
            $date_y = substr($today, -4);
            if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
             // Convert the month abbreviation to its numeric representation (zero-padded)
             $selMnth = date('m', strtotime($selMnth));
             }
            $date_ne = $nepali_date->get_nepali_date($date_y, $selMnth, $date_d);
            if($nepaliDateMonthFormat == 'displayInNumber'){
            $completeDate = $date_ne[d] .' '. $date_ne[m] .' '. $date_ne[y];
            }else{
            
             $completeDate = $date_ne[d] .' '. $date_ne[M] .' '. $date_ne[y];
           }
        
    }else{
        $completeDate = $date  .' '. $month  .' '. $year;
      $endDate = $edate  .' '. $emonth  .' '. $eyear;
       }
    if ($endDate == '' || $endDate == null) {
            $today = date("d-m-Y");
            $date_d = substr($today, 0, 2);
            $selMnth = substr($today, 3, -5);
            $date_y = substr($today, -4);
            if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
             // Convert the month abbreviation to its numeric representation (zero-padded)
             $selMnth = date('m', strtotime($selMnth));
             }
            $date_ne = $nepali_date->get_nepali_date($date_y, $selMnth, $date_d);
            if($nepaliDateMonthFormat == 'displayInNumber'){
            $endDate = $date_ne[d] .' '. $date_ne[m] .' '. $date_ne[y];
            }else{
            
             $endDate = $date_ne[d] .' '. $date_ne[M] .' '. $date_ne[y];
           }
    }else{
        $completeDate = $date  .' '. $month  .' '. $year;
      $endDate = $edate  .' '. $emonth  .' '. $eyear;
       }
     
    }else{
    if ($completeDate == '' || $completeDate == 'NULL') {
        $completeDate = date('d') . date('M') . date('Y');
    }
    //
    if ($endDate == '' || $endDate == null) {
        $endDate = date('d') . date('M') . date('Y');
    }
    }
    //
    $todayDate = $completeDate;
        if ($nepaliDateIndicator == 'YES'){
        $date_components = explode(' ', $completeDate);
        
         $day_en = $date_components[0];
         $selMnth = $date_components[1];
         $year_en = $date_components[2];
        if($nepaliDateMonthFormat == 'displayInWord'){
        $selMnth = $nepali_date->get_nepali_month_number($selMnth);
        }
        $startdate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
        if ($startdate != '1' || $startdate != 'TRUE') {
        $date_ne = $nepali_date->get_eng_date($year_en, $selMnth, $day_en);
        $sdate = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
        $girviDOBPrint = $date_ne[d] . ' ' . $date_ne[m] . ' ' . $date_ne[y];
        }
        $completeDate = strtotime($sdate);
        $endDD = $endDate;
       $date_components = explode(' ', $endDate);
        
         $day_en = $date_components[0];
         $selMnth = $date_components[1];
         $year_en = $date_components[2];
        if($nepaliDateMonthFormat == 'displayInWord'){
        $selMnth = $nepali_date->get_nepali_month_number($selMnth);
        }
        $enddate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
        if ($enddate != '1' || $enddate != 'TRUE') {
        $date_ne = $nepali_date->get_eng_date($year_en, $selMnth, $day_en);
        $edate = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
        $girviDOBPrint = $date_ne[d] . ' ' . $date_ne[m] . ' ' . $date_ne[y];
        }
        $endDate = strtotime($edate); 
    }else{
    $completeDate = strtotime($completeDate);
    $endDate = strtotime($endDate);
    }
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    //
    //Start Code To Select FirmId
    $selFirmId = $_GET['firmId'];
    //
    if (!isset($selFirmId)) {
        $firmIdSelected = $_SESSION['setFirmSession'];
        $selFirmId = $firmIdSelected;
    } else {
        $firmIdSelected = $selFirmId;
    }
    //End Code To Select FirmId
    //
    if ($selFirmId == '' || $selFirmId == NULL) {
        $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='1'";
    } else {
        $qSelectFirm = "SELECT firm_long_name ,firm_address FROM firm where firm_id='$selFirmId'";
    }
    //To display data in this form
    $resultFirm = mysqli_query($conn, $qSelectFirm);
    $rowFirm = mysqli_fetch_array($resultFirm);
    //
    if ($selFirmId != NULL) {
        $strFrmId = $selFirmId;
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }
    //
    // Start To add Query to show whole month report if day of month is not selected 
//    $qSelSellPurchaseDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
//                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))>='$completeDate' "
//                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<='$endDate' "
//                             . "and sttr_firm_id IN ($strFrmId) and sttr_status = 'PaymentDone' "
//                             . "and sttr_indicator = 'stock' and sttr_transaction_type = 'sell' order by sttr_id desc"; //code to add condition of Imitation stock @Author:SHRI27FEB15
if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelSellPurchaseDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))>='$completeDate' "
                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<='$endDate' "
                             . "and sttr_firm_id IN ($strFrmId) and sttr_status='PaymentDone' "
                             //. "and (sttr_pre_invoice_no = 'IS' and sttr_invoice_no = '4841') "
                             . "and sttr_indicator = 'stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') "                             
                             . "order by UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) desc";
    }else{
    $qSelSellPurchaseDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' "
                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))>='$completeDate' "
                             . "and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y'))<='$endDate' "
                             . "and sttr_firm_id IN ($strFrmId) and sttr_status='PaymentDone' "
                             //. "and (sttr_pre_invoice_no = 'IS' and sttr_invoice_no = '4841') "
                             . "and sttr_indicator = 'stock' and sttr_transaction_type IN ('sell') "                             
                             . "order by UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) desc";
    }
    //echo $qSelSellPurchaseDetails;
    
    $resSellPurchaseDetails = mysqli_query($conn, $qSelSellPurchaseDetails);
    $totalSales = mysqli_num_rows($resSellPurchaseDetails);
    //
    $totalTotalVal = 0;
    $totalCashPaid = 0;
    $totalAmtBalance = 0;
    $finalTotAmtRec = 0;
    $finalDiscAmt = 0;
    ?>
    <div id="SellDetails">
        <div id="sellReportSubDiv">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td align="left">
                        <img src="<?php echo $documentRoot; ?>/images/sell_purchase24.png" alt=""  onLoad="setScrollIdFun('headerTable')"/>
                    </td>
                    <td class="padLeft5" valign="middle">
                        <div class="itemAddPnLabels12">PROD PROFIT/LOSS REPORT</div>
                    </td>
                    <td valign="middle" align="center"> 
                        <div id="ajaxLoadShowGirviListDiv" style="visibility: hidden" class="blackMess11">
                            <?php include 'omzaajld.php'; ?>
                        </div>
                    </td>
                    <td>
                        <table border="0" cellspacing="0" cellpadding="0" align="left" valign="top">
                            <tr>
                                <td valign="top" align="center" class="frm-lbl">
                                    FROM:
                                </td>
                                <td>

                                </td>
                                <td valign="top" align="center" class="frm-lbl">
                                    TO:   
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF"><!---Change in line @AUTHOR: SANDY7DEC13---->
                                    <div id="selectDateForSell">
                                        <?php
                                              if($nepaliDateIndicator == 'YES'){
                                        $nepalidatepanel = 'profitLoss';
                                        $panelName = 'productProfitLoss';
                                        
                                        $today = date("d-m-Y");
                                        $date_d = substr($today, 0, 2);
                                        $selMnth = substr($today, 3, -5);
                                         $date_y = substr($today, -4);
                                         if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
                                                 // Convert the month abbreviation to its numeric representation (zero-padded)
                                        $selMnth = date('m', strtotime($selMnth));
                                        }
                                        $date_ne = $nepali_date->get_nepali_date($date_y, $selMnth, $date_d);
                                           if($nepaliDateMonthFormat == 'displayInNumber'){
                                            $todayDay = $date_ne[d];
                                            $todayMM = $date_ne[m];
                                            $todayYear = $date_ne[y];
                                             }else{
                                            $todayDay = $date_ne[d];
                                            $todayMM = $date_ne[m];
                                            $todayYear = $date_ne[y];
                                            }
                                        include 'ogsrdate.php';
                                        }else{
                                        $panelName = 'productProfitLoss';
                                        include 'ogsrdate.php';
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td width="10px" align="center" class="itemAddPnLabels12">
                                    -
                                </td>
                                <td align="left" valign="middle" class="textBoxCurve1px margin1pxAll textLabel16CalibriNormal backFFFFFF"><!---Change in line @AUTHOR: SANDY7DEC13---->
                                    <div id="selectDateForSell" >
                                        <?php
                                                      if($nepaliDateIndicator == 'YES'){
                                        $nepalidatepanel = 'profitLoss';
                                        $panelName = 'productProfitLoss';
                                        
                                        $today = date("d-m-Y");
                                        $date_d = substr($today, 0, 2);
                                        $selMnth = substr($today, 3, -5);
                                         $date_y = substr($today, -4);
                                         if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
                                                 // Convert the month abbreviation to its numeric representation (zero-padded)
                                        $selMnth = date('m', strtotime($selMnth));
                                        }
                                        $date_ne = $nepali_date->get_nepali_date($date_y, $selMnth, $date_d);
                                           if($nepaliDateMonthFormat == 'displayInNumber'){
                                            $todayDay = $date_ne[d];
                                            $todayMM = $date_ne[m];
                                            $todayYear = $date_ne[y];
                                             }else{
                                            $todayDay = $date_ne[d];
                                            $todayMM = $date_ne[m];
                                            $todayYear = $date_ne[y];
                                            }
                                        include 'ogsrendt.php';
                                        }else{
                                        $panelName = 'productProfitLoss';
                                        include 'ogsrendt.php';
                                        }
                                        ?>
                                    </div>
                                </td>
                                <!--Start code to add go button-->
                                <td valign="middle" align="center" class="paddingLeft5">
                                    <input type="button" value="GO"
                                           class="frm-btn noPrint" 
                                           onclick="javascript:searchSellPurchaseByDate('<?php echo $panelName; ?>', document.getElementById('sellDayDD').value, document.getElementById('sellMonthM').value, document.getElementById('sellYearY').value, document.getElementById('sellEndDayDD').value, document.getElementById('sellEndMonthM').value, document.getElementById('sellEndYearY').value, document.getElementById('girviLedgerFirmName').value);"
                                           maxlength="30" size="1" />
                                </td>
                                <!--End code to add go button-->
                                <!-------Start code to add firm option------------>
                                <td align="right" width="100px" valign="bottom">
                                    <div id="selectFirmDiv">
                                        <?php
                                        $firmPanelName = 'purchaseReport';
                                        include 'ombbglfr.php';
                                        ?>
                                    </div>
                                </td>
                                <!-------End code to add firm option------------>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="7" class="paddingTop4 padBott4">
                        <div class="hrGrey"></div>
                    </td>
                </tr>
            </table>
            <div id="sellDetailsSubDiv">
                <table class="width_203mm paddingTop10" border="0" cellspacing="0" cellpadding="0" align="center">
                    <?php if ($totalSales <= 0) { ?>
                        <tr>
                            <td align="center" class="ff_tnr fs_12 brown spaceLeft40"><?php echo '~ LIST IS EMPTY ~'; ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td valign="middle" align="center" colspan="16">
                                <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%"   onclick="contentEditable = true">
                                    <tr>
                                        <td valign="middle" align="center">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td valign="middle" align="center" class="main_link_brown12">
                                                        PRODUCT PROFIT LOSS REPORT -
                                                    </td>
                                                    <td valign="middle" align="center" class="itemAddPnLabels12Arial brown">
                                                        <?php 
                                                          if ($nepaliDateIndicator == 'YES'){ 
                                                           echo $startDD; 
                                                         }else{
                                                        echo om_strtoupper(date('d M Y', $completeDate));
                                                         } ?>
                                                    </td>
                                                    <td valign="middle" align="center" class="main_link_brown12">
                                                        <div class="main_link_brown12">&nbsp;TO&nbsp;
                                                    </td>
                                                    <td valign="middle" align="center" class="itemAddPnLabels12Arial brown">
                                                        <?php
                                                         if ($nepaliDateIndicator == 'YES'){
                                                              echo $endDD;
                                                              
                                                          }else{
                                                        echo om_strtoupper(date('d M Y', $endDate));
                                                          }
                                                        ?></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" width="490px">
                                            <div class="itemAddPnLabels12Arial brown"><?php
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
                                            <div class="itemAddPnLabels12Arial brown"><?php echo ($rowFirm['firm_address']); ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr id="headerTable">
                            <td colspan="15">
                                <table cellspacing="0" cellpadding="0" border="0" class="balanceSheetPrintDiv width_203mm"> 
                                    <tr>
                                        <td align="center" class="border-color-grey-left border-color-grey-rbu  width_18mm" >
                                            <div class="main_link_brown12">DATE</div>
                                        </td>
                                        <td align="center" class="border-color-grey-rbu width_18mm">
                                            <div class="main_link_brown12">INV NO</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_18mm">
                                            <div class="main_link_brown12 spaceRight5">FIRM</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_18mm">
                                            <div class="main_link_brown12 spaceRight5">CUST NAME</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_18mm">
                                            <div class="main_link_brown12 spaceRight5">ITEM NAME</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_18mm">
                                            <div class="main_link_brown12 spaceRight5">METAL</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_25mm">
                                            <div class="main_link_brown12 lightYellow spaceRight5">PURCHASE AMT</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_25mm">
                                            <div class="main_link_brown12 spaceRight5">SELL AMT</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_25mm">
                                            <div class="main_link_brown12 spaceRight5">PROFIT/LOSS</div>
                                        </td>
                                        <td align="right" class="border-color-grey-rbu width_25mm">
                                            <div class="main_link_brown12 spaceRight5">PNL WT</div>
                                        </td>
                                        <td align="center" class="border-color-grey-rbu width_18mm noPrint">
                                            <div class="main_link_brown12 spaceRight5">INVOICE</div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <td colspan="15">
                            <table cellspacing="0" cellpadding="0" border="0" class="balanceSheetPrintDiv width_203mm">
                                <?php
                                $count = 0;
                                while ($rowSellPurchaseDetails = mysqli_fetch_array($resSellPurchaseDetails)) {
                                    //
                                    $count++;
                                    $slPrId = $rowSellPurchaseDetails['sttr_id'];
                                    $sttr_sttr_id = $rowSellPurchaseDetails['sttr_sttr_id'];
                                    $sellGsWeight = $rowSellPurchaseDetails['sttr_gs_weight'];
                                    $slPrCustId = $rowSellPurchaseDetails['sttr_user_id'];
                                    $slPrPreInvoiceNo = $rowSellPurchaseDetails['sttr_pre_invoice_no'];
                                    $slPrInvoiceNo = $rowSellPurchaseDetails['sttr_invoice_no'];
                                     if ($nepaliDateIndicator == 'YES'){ 
                                        $selldate = $rowSellPurchaseDetails['sttr_other_lang_add_date'];
                                        $date_comp = explode('-',$selldate);
                                           $day = $date_comp[0];
                                           $month = $date_comp[1];
                                           $year = $date_comp[2];
                                           $selldate = $year.'-'.$month.'-'.$day;
                                    }else{
                                    $selldate = $rowSellPurchaseDetails['sttr_add_date'];
                                    }
                                    $totalAmount = $rowSellPurchaseDetails['sttr_final_valuation'];
                                    //
                                     //
                                            $sttr_metal_type = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_metal_type]));
                                            $sttr_item_name = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_item_name]));
                                            $sttr_item_category = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_item_category]));
                                            $sttr_indicator = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_indicator]));
                                            $sttr_stock_type = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_stock_type]));
                                            $sttr_firm_id = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_firm_id]));
                                            $sttr_purity = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_purity]));
                                            //
                                    //
//                                    if($sttr_sttr_id != '') {
//                                        //
//                                        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
//                                                               . "and sttr_id = '$sttr_sttr_id' AND sttr_indicator != 'stockCrystal' and sttr_transaction_type != 'sell'"));
//                                        //
//                                        if($sttr_metal_type == 'Gold' || $sttr_metal_type == 'GOLD') {
//                                            //
//                                            if ($sttr_gs_weight_type == 'KG') {
//                                               $purAmountPerGm = ($sttr_final_valuation / ($sttr_gs_weight * 1000));
//                                               $purchaseAmount = ($sellGsWeight * $purAmountPerGm);
//                                            } else {
//                                               $purAmountPerGm = ($sttr_final_valuation / $sttr_gs_weight);
//                                               $purchaseAmount = ($sellGsWeight * $purAmountPerGm);
//                                            }
//                                            //
//                                        } else if ($sttr_metal_type == 'Silver' || $sttr_metal_type == 'SILVER') {
//                                            //
//                                            if ($sttr_gs_weight_type == 'KG') {
//                                               $purAmountPerGm = ($sttr_final_valuation / ($sttr_gs_weight * 1000));
//                                               $purchaseAmount = ($sellGsWeight * $purAmountPerGm);
//                                            } else {
//                                               $purAmountPerGm = ($sttr_final_valuation / $sttr_gs_weight);
//                                               $purchaseAmount = ($sellGsWeight * $purAmountPerGm);
//                                            }
//                                            //
//                                        }
//                                    }
                                    //
                                            if ($rowSellPurchaseDetails['sttr_final_val_by'] == 'byGrossWt') {
                                                $wt = $rowSellPurchaseDetails['sttr_gs_weight'];
                                            } else if ($rowSellPurchaseDetails['sttr_final_val_by'] == 'byNetWt') {
                                                $wt = $rowSellPurchaseDetails['sttr_nt_weight'];
                                            } else {
                                                $wt = $rowSellPurchaseDetails['sttr_nt_weight'];
                                            }
                                     // GET PURCHASE STPOCK DETAILS @SIMRAN:20DEC2023
                                            parse_str(getTableValues("SELECT sttr_wastage,sttr_stone_valuation,sttr_pur_lab_chrgs,sttr_pur_other_chrgs,sttr_final_valuation_by FROM stock_transaction WHERE sttr_id='$sttr_sttr_id'"));
                                            //
                                            //
                                            $fnWeight = $rowSellPurchaseDetails['sttr_fine_weight'];
                                            //
                                            //$ffnWeight = decimalVal(((($rowSellPurchaseDetails['sttr_final_purity'] + $rowSellPurchaseDetails['sttr_cust_wastage']) * $wt) / 100), 3);
                                            //
                                            $purFfnWeight = decimalVal(((($rowSellPurchaseDetails['sttr_purity'] + $sttr_wastage) * $wt) / 100), 3);
                                            //
                                            $ffnWeight = $rowSellPurchaseDetails['sttr_final_fine_weight'];
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            // START CODE FOR CALCULATE VALUATION BY WEIGHT @SIMRAN:20DEC2023 
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            if($stockValBy != $sttr_final_valuation_by){
                                                $stockValBy = $sttr_final_valuation_by;
                                            }
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            // END CODE FOR CALCULATE VALUATION BY WEIGHT @SIMRAN:20DEC2023 
                                            //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                                if ($stockValBy == 'byGrossWt') {
                                                    $purCalWt = $rowSellPurchaseDetails['sttr_gs_weight'];
                                                } else if ($stockValBy == 'byNetWt') {
                                                    $purCalWt = $rowSellPurchaseDetails['sttr_nt_weight'];
                                                } else if ($stockValBy == 'byFineWt') {
                                                    $purCalWt = $fnWeight;
                                                } else if ($stockValBy == 'byFFineWt') {
                                                    $purCalWt = $purFfnWeight;
                                                } else {
                                                    $purCalWt = $purFfnWeight;
                                                }
                                            //
                                            //
                                            $st_metal_rate = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_metal_rate]));
                                            $st_pur_avg_rate = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_metal_rate]));
                                            //
                                            //
                                            parse_str(getTableValues("SELECT st_metal_rate, st_pur_avg_rate, "
                                                                  . "st_pur_avg_lab_chrgs, st_pur_avg_other_chrgs "
                                                                  . "FROM stock WHERE st_owner_id = '$sessionOwnerId' "
                                                                  . "AND st_metal_type = '$sttr_metal_type' "
                                                                  . "AND st_item_name = '$sttr_item_name' "
                                                                  . "AND st_item_category = '$sttr_item_category' "
                                                                  . "AND st_stock_type = '$sttr_stock_type' "
                                                                  . "AND st_firm_id = '$sttr_firm_id' "
                                                                  . "AND st_purity = '$sttr_purity'"));
                                            //
                                             //
                                            if ($st_pur_avg_rate == '0.00' || $st_pur_avg_rate == '0' ||
                                                $st_pur_avg_rate == NULL || $st_pur_avg_rate == '') {
                                                $st_metal_rate = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_metal_rate]));
                                                $st_pur_avg_rate = mysqli_real_escape_string($conn, stripslashes($rowSellPurchaseDetails[sttr_metal_rate]));
                                            }
                                            //
                                    //
                                    if ($rowSellPurchaseDetails['sttr_metal_type'] == 'Gold' || 
                                        $rowSellPurchaseDetails['sttr_metal_type'] == 'GOLD' || 
                                        $rowSellPurchaseDetails['sttr_metal_type'] == 'gold') {
                                        //
                                                parse_str(getTableValues("SELECT met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                                                       . "WHERE met_rate_metal_name = 'Gold' "
                                                                       //. "and met_rate_value = '$rowSellPurchaseDetails[sttr_metal_rate]' "
                                                                       . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                                //
                                                //
                                                if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '') {
                                                    if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                                        $st_pur_avg_rate = $st_pur_avg_rate * 10;
                                                    } else {
                                                        $st_pur_avg_rate = $st_pur_avg_rate;
                                                    }
                                                }
                                                //
                                                //echo '$st_pur_avg_rate : ' . $st_pur_avg_rate  . '<br>';
                                                //
                                                $st_pur_avg_rate_Int_Val = intval($st_pur_avg_rate);
                                                $st_pur_avg_rate_Int_Val_Length = strlen((string) $st_pur_avg_rate_Int_Val);
                                                //
                                                if ($st_pur_avg_rate_Int_Val_Length == 4) {
                                                    if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                                                        $purGoldMetalRate = ($st_pur_avg_rate);
                                                    } else {
                                                        $purGoldMetalRate = ($st_metal_rate);
                                                    }
                                                } else {                                                    
                                                    if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                                                        $purGoldMetalRate = ($st_pur_avg_rate / 10);
                                                    } else {
                                                        $purGoldMetalRate = ($st_metal_rate / 10);
                                                    }                                                
                                                }
                                        //
                                        if ($rowSellPurchaseDetails['sttr_pur_avg_rate'] > 0) {
                                             $purchaseGdAmount = ($rowSellPurchaseDetails['sttr_pur_avg_rate'] / 10) * $purCalWt;
                                        }else{
                                            $purchaseGdAmount = $purGoldMetalRate * $purCalWt;
                                        }
                                        //
                                    } else if ($rowSellPurchaseDetails['sttr_metal_type'] == 'Silver' || 
                                               $rowSellPurchaseDetails['sttr_metal_type'] == 'SILVER' || 
                                               $rowSellPurchaseDetails['sttr_metal_type'] == 'silver') {
                                        //
                                                parse_str(getTableValues("SELECT met_rate_per_wt, met_rate_per_wt_tp FROM metal_rates "
                                                                       . "WHERE met_rate_metal_name = 'Silver' "
                                                                       //. "and met_rate_value = '$rowSellPurchaseDetails[sttr_metal_rate]' "
                                                                       . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                                //
                                                if ($met_rate_per_wt != '' && $met_rate_per_wt_tp != '') {
                                                    if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt == '1') {
                                                        $st_pur_avg_rate = $st_pur_avg_rate * 1000;
                                                    } else if ($met_rate_per_wt_tp == 'GM' && $met_rate_per_wt = '10') {
                                                        $st_pur_avg_rate = $st_pur_avg_rate / 1000;
                                                    } else {
                                                        $st_pur_avg_rate = $st_pur_avg_rate;
                                                    }
                                                }
                                                //
                                                //
                                                $st_pur_avg_rate_Int_Val = intval($st_pur_avg_rate);
                                                $st_pur_avg_rate_Int_Val_Length = strlen((string) $st_pur_avg_rate_Int_Val);
                                                //
                                                if ($st_pur_avg_rate_Int_Val_Length == 2) {
                                                    if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                                                        $purSilverMetalRate = ($st_pur_avg_rate);
                                                    } else {
                                                        $purSilverMetalRate = ($st_metal_rate);
                                                    }
                                                } else {                                                    
                                                    if ($st_pur_avg_rate != '' && $st_pur_avg_rate != NULL) {
                                                        $purSilverMetalRate = ($st_pur_avg_rate / 1000);
                                                    } else {
                                                        $purSilverMetalRate = ($st_metal_rate / 1000);
                                                    }                                                
                                                }
                                        //
                                        if ($rowSellPurchaseDetails['sttr_pur_avg_rate'] > 0) {
                                            $purchaseSlAmount = ($rowSellPurchaseDetails['sttr_pur_avg_rate'] / 1000) * $purCalWt;
                                        }else{
                                           $purchaseSlAmount = $purSilverMetalRate * $purCalWt;
                                        }
                                        //
                                    }
                                    //
                                    //
                                    $purchaseLabCharges = $rowSellPurchaseDetails['sttr_pur_lab_chrgs'];
                                    $purchaseOtherCharges = $rowSellPurchaseDetails['sttr_pur_other_chrgs'];
                                    $purchaseStoneCharges = $rowSellPurchaseDetails['sttr_stone_valuation'];
                                    //
                                    //
//                                    echo '$purchaseGdAmount == ' . $purchaseGdAmount . '<br />';
//                                    echo '$purchaseSlAmount == ' . $purchaseSlAmount . '<br />';
//                                    echo '$purchaseLabCharges == ' . $purchaseLabCharges . '<br />';
//                                    echo '$purchaseOtherCharges == ' . $purchaseOtherCharges . '<br />';
//                                    echo '$purchaseOtherCharges == ' . $purchaseOtherCharges . '<br />';
                                    //
                                    //
                                    $purchaseAmount = $purchaseGdAmount + $purchaseSlAmount + $purchaseLabCharges + $purchaseOtherCharges + $purchaseStoneCharges;
                                    //
                                     $purFinalValuation = 0;
                                           parse_str(getTableValues("SELECT sttr_metal_rate AS purMainEntryMetalRate, "
                                                                  . "sttr_metal_rate_id AS purMainEntryMetalRateId, "
                                                                  . "sttr_final_valuation AS purFinalValuation "
                                                                  . "FROM stock_transaction "
                                                                  . "WHERE sttr_owner_id = '$sessionOwnerId' "
                                                                  . "AND sttr_id = '$sttr_sttr_id' "
                                                                  . "AND sttr_indicator = '$sttr_indicator' "
                                                                  . "AND sttr_transaction_type IN ('EXISTING', 'TAG', 'PURONCASH', 'PURBYSUPP') "
                                                                  . "AND sttr_metal_type = '$sttr_metal_type' "
                                                                  . "AND sttr_item_name = '$sttr_item_name' "
                                                                  . "AND sttr_item_category = '$sttr_item_category' "
                                                                  . "AND sttr_stock_type = '$sttr_stock_type' "
                                                                  . "AND sttr_firm_id = '$sttr_firm_id' "
                                                                  . "AND sttr_purity = '$sttr_purity' ORDER BY sttr_id ASC LIMIT 0,1"));
                                           
                                     if ($rowSellPurchaseDetails['sttr_stock_type'] == 'retail') {
                                               //
                                               if ($rowSellPurchaseDetails['sttr_indicator'] == 'stock') {
                                                   //
                                                   if ($purFinalValuation > 0) {
                                                       $purchaseAmount = $purFinalValuation;
                                                   }
                                                   //
                                               }
                                               //
                                           }
                                    //
                                    if (($rowSellPurchaseDetails['sttr_final_valuation'] == '0.00' || 
                                         $rowSellPurchaseDetails['sttr_final_valuation'] == 0 ||
                                         $rowSellPurchaseDetails['sttr_final_valuation'] == '' ||
                                         $rowSellPurchaseDetails['sttr_final_valuation'] == NULL)) {
                                            //
                                            if (($rowSellPurchaseDetails['sttr_total_making_charges'] > 0) || 
                                                ($rowSellPurchaseDetails['sttr_total_other_charges'] > 0)) {
                                                 $totalAmount = $rowSellPurchaseDetails['sttr_total_making_charges'] + 
                                                                $rowSellPurchaseDetails['sttr_total_other_charges'];
                                            }
                                            //
                                    }
                                    //
                                    //
                                    $profitLossAmt = $totalAmount - $purchaseAmount;
                                    $itemName = $rowSellPurchaseDetails['sttr_item_name'];
                                    $metalType = $rowSellPurchaseDetails['sttr_metal_type'];
                                    $metalRate = $rowSellPurchaseDetails['sttr_metal_rate'];
                                    $metalPNLWeightTyp = 'GM';
                                    //
                                    include 'ogiamtrts.php';
                                    //
                                    if ($metalType == 'Gold') {
                                        if ($metalRate > 0) {
                                        $metalPNLWeight = decimalVal((($profitLossAmt) * $gmWtInGm) / $metalRate, 3);
                                        } else {
                                            $metalPNLWeight = decimalVal((($rowSellPurchaseDetails['sttr_nt_weight'] * $rowSellPurchaseDetails['sttr_cust_wastage'])/100), 3);
                                    }
                                    }
                                    //
                                    if ($metalType == 'Silver') {
                                        if ($metalRate > 0) {
                                        $metalPNLWeight = decimalVal((($profitLossAmt) * $srGmWtInGm) / $metalRate, 3);
                                        } else {
                                            $metalPNLWeight = decimalVal((($rowSellPurchaseDetails['sttr_nt_weight'] * $rowSellPurchaseDetails['sttr_cust_wastage'])/100), 3);
                                    }
                                    }
                                    //
                                    if ($metalPNLWeight >= 1000) {
                                        $metalPNLWeight = convertWeight($metalPNLWeight);
                                        $metalPNLWeightTyp = 'KG';
                                    }
                                    //
                                    $firmId = $rowSellPurchaseDetails['sttr_firm_id'];
                                    //
                                    if ($firmId != '' || $firmId != NULL) {
                                        $qSelFirm = "SELECT firm_name FROM firm where firm_id='$firmId'";
                                    }
                                    //
                                    $resFirm = mysqli_query($conn, $qSelFirm);
                                    $rowFrm = mysqli_fetch_array($resFirm);
                                    //
                                    $firmName = $rowFrm['firm_name'];
                                    //
                                    $selCustName = "SELECT user_fname FROM user WHERE user_id='$slPrCustId' and user_owner_id='$sessionOwnerId'";
                                    $resCustName = mysqli_query($conn, $selCustName);
                                    $rowCustName = mysqli_fetch_array($resCustName, MYSQLI_ASSOC);
                                    $custName = $rowCustName['user_fname'];
                                    //
                                    $totalTotalVal += $totalAmount;
                                    $totalCashPaid += $slPrCashAmount;
                                    $totalAmtBalance += $slPrFinalDueAmt;
                                    $finalTotAmtRec += $totOthAmtRec;
                                    $finalDiscAmt += $discountAmount;
                                    $totalCustPurchase += $purchaseAmount;
                                    //
                                    $totProfitOrLoss += abs($profitLossAmt);
                                    //
                                    //echo '<br>'.$profitLossAmt;
                                    //
                                    if ($profitLossAmt > 0) {
                                        $classPL = 'greenFont';
                                    } else if ($profitLossAmt < 0) {
                                        $classPL = 'redFont';
                                    } else {
                                        $classPL = '';
                                    }
                                    //
                                    if ($slPrFinalDueAmt > 0) {
                                        $class = 'redFont';
                                    } else if ($slPrFinalDueAmt < 0) {
                                        $class = 'greenFont';
                                    } else {
                                        $class = '';
                                    }
                                    //Sell Invoice Layout
                                    $omlyOption = 'sellInvLay';
                                    include 'omcminly.php';
                                    ?>
                                    <tr>
                                        <td align="center" class="border-color-grey-rb border-color-grey-left width_18mm" >
                                            <div class="blackMess11ArialNormal grey-back">
                                                <?php 
                                                  if ($nepaliDateIndicator == 'YES'){ 
                                                   echo $selldate;
                                                 }else{
                                                echo om_strtoupper(date('d M y', strtotime($selldate))); 
                                                 } ?>
                                            </div>
                                        </td>
                                        <td align="center" class="border-color-grey-rb lightBlue width_18mm">
                                            <div class="itemAddPnLabels11ArialLink spaceLeftRight2"><?php echo $slPrPreInvoiceNo . $slPrInvoiceNo; ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_18mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo $firmName; ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_18mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo $custName; ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_18mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo $itemName; ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_18mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo $metalType; ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightYellow width_25mm">
                                            <div class="blackMess11ArialNormal orange spaceRight5"><?php echo number_format(doubleval($purchaseAmount), 2); ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_25mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5"><?php echo number_format(doubleval($totalAmount), 2); ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_25mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5 <?php echo $classPL; ?>"><?php echo number_format(abs(doubleval($profitLossAmt)), 2); ?></div>
                                        </td>
                                        <td align="right" class="border-color-grey-rb lightBlue width_25mm">
                                            <div class="blackMess11ArialNormal blueFont spaceRight5 <?php echo $classPL; ?>"><?php echo abs($metalPNLWeight) . '' . $metalPNLWeightTyp; ?></div>
                                        </td>
                                        <!--Start code to pass date-->
                                        <td align="center" class="border-color-grey-rb lightOrange width_18mm noPrint">
                                            <table border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                    <!--Start code add invoice condition for crystal panel for sell-->
                                                    <?php if ($slprin_panel == 'CrystalStock') { ?>
                                                        <td align="left">
                                                            <a style="cursor: pointer;" 
                                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogcrsinv.php?slPrPreInvoiceNo=<?php echo "$slPrPreInvoiceNo"; ?>&slPrInvoiceNo=<?php echo "$slPrInvoiceNo"; ?>&invoiceDate=<?php echo "$selldate"; ?>&invoicePanel=<?php echo "$invLay"; ?>',
                                                                                       'popup', 'width=<?php echo $width; ?>,height=<?php echo $height; ?>,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                               return false" >
                                                                <img src="<?php echo $documentRoot; ?>/images/pdf16.png" alt='Item Invoice' title='Item Invoice'
                                                                     width="16px" height="16px" />
                                                            </a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td align="left">
                                                            <a style="cursor: pointer;" 
                                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/ogspinvo.php?slPrPreInvoiceNo=<?php echo "$slPrPreInvoiceNo"; ?>&slPrInvoiceNo=<?php echo "$slPrInvoiceNo"; ?>&userId=<?php echo "$slPrCustId"; ?>&invoiceDate=<?php echo "$selldate"; ?>&invoicePanel=<?php echo "$invLay"; ?>',
                                                                                       'popup', 'width=<?php echo $width; ?>,height=<?php echo $height; ?>,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                               return false" >
                                                                <img src="<?php echo $documentRoot; ?>/images/pdf16.png" alt='Item Invoice' title='Item Invoice'
                                                                     width="16px" height="16px" />
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                                    <!--end code add invoice condition for crystal panel for sell-->
                                                </tr>
                                            </table>
                                        </td>
                                        <!--End code to pass date-->
                                    </tr>
                                    <?php if ($count == $totalSales) { ?>
                                        <tr>
                                            <td align="center" class="border-color-grey-rb border-color-grey-left balanceSheetPrintDiv width_18mm" > 
                                                <div class="blackMess12Arial reddish spaceRight10">TOTAL- </div>
                                            </td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_18mm">&nbsp;</td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_18mm">&nbsp;</td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_18mm">&nbsp;</td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_18mm">&nbsp;</td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_18mm">&nbsp;</td>
                                            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_25mm ">
                                                <div class="blackMess10Arial paddingRight2"><?php echo number_format($totalCustPurchase, 2); ?></div>
                                            </td>
                                            <td align="right"  class="border-color-grey-rb balanceSheetPrintDiv width_25mm">
                                                <div class="blackMess10Arial paddingRight2"><?php echo number_format($totalTotalVal, 2); ?></div>
                                            </td>
                                            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_25mm ">
                                                <div class="blackMess10Arial paddingRight2"><?php echo number_format($totProfitOrLoss, 2); ?></div>
                                            </td>
                                            <td class="border-color-grey-rb balanceSheetPrintDiv width_25mm "></td>
                                            <td align="right" class="border-color-grey-rb balanceSheetPrintDiv width_18mm noPrint">
                                                &nbsp;
                                            </td>                                           
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </table>
                    </td>
                </table>
            </div>
        </div>
        <?php if ($totalSales > 0) { ?>
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
                        <a style="cursor: pointer;"  class="noPrint"
                           onclick="printBalanceSheetDiv('sellDetailsSubDiv', '', 'SellReport')">
                            <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" />
                        </a>  <!---Add noprint class---> 
                    </td>
                </tr>
            </table>
        <?php } ?>
    </div>
<?php } ?>
<!-------------End code to add panel indiacator--------------->