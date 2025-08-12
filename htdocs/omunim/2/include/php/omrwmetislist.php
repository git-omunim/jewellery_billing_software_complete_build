<?php
/*
 * **************************************************************************************
 * @Description: RAW METAL ISSUE LIST
 * **************************************************************************************
 *
 * Created on 22 SEPT 2021, 5:38PM
 *
 * @FileName: omrwmetislist.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<div class="supp_middle_body" id="SuppMetalItemListDiv"> 
    <?php
    $userId = $_POST['userId'];

    if ($userId == '' || $userId == NULL) {
        $userId = $_GET['userId'];
    }

    if ($userId == '' || $userId == NULL) {
        $userId = $_GET['custId'];
    }

    $transType = $_POST['transType'];

    if ($transType == '') {
        $transType = $_GET['transType'];
    }

    if ($transType == '') {
        $transType = $_GET['transactionType'];
    }

    if ($transType == '') {
        $transType = $_GET['type'];
    }

    if ($_GET['metType'] != '')
        $transType = $_GET['metType'];

    if ($mainPanel == '') {
        $mainPanel = $_GET['mainPanel'];
    }

    if ($divName == '') {
        $divName = $_GET['divName'];
    }

    if ($mainPanel == 'Supplier') {
        $divName = 'supp_middle_body';
    }

    //echo '$mainPanel == '.$mainPanel.'<br />';

    $sessionOwnerId = $_SESSION[sessionOwnerId];
      $toDate = $_GET['ToDate'];
    $fromDate = $_GET['FromDate'];
// ******************************************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:RENUKA SHARMA_NOV2022
// ******************************************************************************************************
//
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
// ********************************************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:RENUKA SHARMA_NOV2022
// ********************************************************************************************************
    if ($nepaliDateIndicator == 'YES') {
        $toDate = $_GET['ToDate'];
        $fromDate = $_GET['FromDate'];

        if ($fromDate != '') {
            $jrtrDOBArr = explode('-', $fromDate);
            if (is_numeric($jrtrDOBArr[1]) || (preg_match('~[0-9]+~', $jrtrDOBArr[1]))) {
                $jrnlOtherLangFDOB = trim($jrtrDOBArr[0]) . '-' . trim($jrtrDOBArr[1]) . '-' . trim($jrtrDOBArr[2]);
                $nepali_date = new nepali_date();
                $english_date = $nepali_date->get_eng_date($jrtrDOBArr[2], $jrtrDOBArr[1], $jrtrDOBArr[0]);
                $fromDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
            }
        }
        if ($toDate != '') {
            $jrtrDOBArr = explode('-', $toDate);
            if (is_numeric($jrtrDOBArr[1]) || (preg_match('~[0-9]+~', $jrtrDOBArr[1]))) {
                $jrnlOtherLangTDOB = trim($jrtrDOBArr[0]) . '-' . trim($jrtrDOBArr[1]) . '-' . trim($jrtrDOBArr[2]);
                $nepali_date = new nepali_date();
                $english_date = $nepali_date->get_eng_date($jrtrDOBArr[2], $jrtrDOBArr[1], $jrtrDOBArr[0]);
                $toDate = trim($english_date['d']) . ' ' . trim(strtoupper($english_date['M'])) . ' ' . trim($english_date['y']);
            }
        }
        if ($fromDate == '' || $fromDate == NULL) {
            $fromDate = date("d-m-Y");
            $fromDate = date("d M Y", strtotime($fromDate));
        } else {
            $fromDate = date("d M Y", strtotime($fromDate));
        }
        if ($toDate == '' || $toDate == NULL) {
            $toDate = date("d-m-Y");
            $toDate = date("d M Y", strtotime($toDate));
        } else {
            $toDate = date("d M Y", strtotime($toDate));
        }
    } else {
    $toDate = $_GET['ToDate'];
$fromDate = $_GET['FromDate'];
if ($fromDate != '') {
    $fromDate = date("d M Y", strtotime($fromDate));
}
if ($fromDate == '' || $fromDate == NULL) {
    $fromDate = date("d-m-Y");
    $fromDate = date("d M Y", strtotime($fromDate));
}

if ($toDate != '') {
    $toDate = date("d M Y", strtotime($toDate));
}

if ($toDate == '' || $toDate == NULL) {
    $toDate = date("d-m-Y");
    $toDate = date("d M Y", strtotime($toDate));
}
    }
?>
    <div class="main_middle_cust_list">
         <div class="ShadowFrm">
        <table border="0" cellspacing="0" cellpadding="2" class="spaceLeft5" width="100%">
            <tr>
                <td align="left" colspan="17">
                    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="border-bottom:1px solid #c1c1c1;">
                        <tr>
                            <td width="26px">
                                <img src="<?php echo $documentRoot; ?>/images/img/stock.png" alt="Purchase List" height="20px"/>
                            </td>
                            <td width="250px">
                                <b style="font-size:16px;color:#0A0C87;"> RAW METAL ISSUE LIST</b>
                            </td>
                            <td align="right" valign="middle">
                                <div id="messDisplayDiv"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table border="0" cellspacing="1" cellpadding="1" width="80%" align="center" style="padding-top:10px;">
            <tr>
                <td align="left" colspan="2">
                    <div id="admnDepositMoneyDiv" class="spaceLeft10">
                    </div>
                </td>
            </tr>
            
             <?php if ($nepaliDateIndicator == 'YES') {  
          ?>     <tr>
                                    <td align="right" width="40%" class="padLeft25">
                                        <table border="0" cellspacing="0" cellpadding="0" align="" width="100%">
                                            <tr>
                                                 <td align="right">
                                                <div class="brown brownMess13Arial">START DATE &nbsp;</div> 
                                            </td>
                                                <td valign="middle" align="" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10 posRelat" style="box-shadow: 1px 1px 10px rgba(206, 206, 206, 0.5);border: 1px solid #e0e0e0;">
                                                   <?php 
                                                    $date_nepali = $jrnlOtherLangFDOB;
                                                   include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliFromDate.php'; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td align="left" width="40%">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="" width="100%">
                                            <tr>
                                                 <td align="right">
                                                <div class="brown brownMess13Arial">END DATE &nbsp;</div> 
                                            </td>
                                                <td valign="middle" align="" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10 posRelat" style="box-shadow: 1px 1px 10px rgba(206, 206, 206, 0.5);border: 1px solid #e0e0e0;">
                                                   <?php 
                                                    $date_nepali = $jrnlOtherLangTDOB;
                                                   include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliToDate.php'; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="left" width="25%">
                                        <!-- Start Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                                        <input id="goButton" name="goButton" type="button"
                                               onclick="javascript:
                                                               searchStockLedgerDetailsNepali('<?php echo $sellPrCustId; ?>', '<?php echo $panelName; ?>', '<?php echo 'fineJewSellList'; ?>',
                                                                       document.getElementById('addItemDOBFromDay'), document.getElementById('addItemDOBFromMonth'), document.getElementById('addItemDOBFromYear'),
                                                                       document.getElementById('addItemDOBToDay'), document.getElementById('addItemDOBToMonth'), document.getElementById('addItemDOBToYear'), '<?php echo $documentRoot; ?>');
                                                       return false;"
                                               value="GO" class="frm-btn" style="width:50px;height:33px;border-radius: 3px !important;font-size: 16px;"/>
                                        <!-- End Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                                    </td>
                                </tr>
                <?php }else {?>
            <tr>
                <!--<td width="25%"></td>-->
                <td align="" width="40%" class="padLeft25">
                    <table border="0" cellspacing="0" cellpadding="0" align="" width="100%">
                        <tr>
                            <td align="right">
                               <div class="brown brownMess13Arial">START DATE &nbsp;</div> 
                             </td>
                            <td valign="middle" align="" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10 posRelat" style="box-shadow: 1px 1px 10px rgba(206, 206, 206, 0.5);border: 1px solid #e0e0e0;">
                                <?php
                                // Start Code for START DATE @AUTHOR:PRIYANKA-04OCT2022
                                //
                                $Day = 'FromDay';
                                $Month = 'FromMonth';
                                $Year = 'FromYear';
                                $date = $fromDate;
                                //
                                include 'omstocrptfromdate.php';
                                //
                                // End Code for START DATE @AUTHOR:PRIYANKA-04OCT2022
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left" width="40%">
                    <table border="0" cellspacing="0" cellpadding="0" align="" width="100%">
                        <tr>
                            <td align="right">
                                                <div class="brown brownMess13Arial">END DATE &nbsp;</div> 
                                            </td>
                            <td valign="middle" align="" class="textBoxCurve1px backFFFFFF margin2pxAll padLeft10 posRelat" style="box-shadow: 1px 1px 10px rgba(206, 206, 206, 0.5);border: 1px solid #e0e0e0;">
                                <?php
                                // Start Code for END DATE @AUTHOR:PRIYANKA-04OCT2022
                                //
                                include 'omstocrpttodate.php';
                                //
                                // End Code for END DATE @AUTHOR:PRIYANKA-04OCT2022
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left" width="25%">
                    <!-- Start Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                    <input id="goButton" name="goButton" type="button"
                           onclick="javascript:
                                                       searchStockLedgerDetails('<?php echo $sellPrCustId; ?>', '<?php echo $panelName; ?>', '<?php echo 'rawMetalIssueSellList'; ?>',
                                                               document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                                               document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'), '<?php echo $documentRoot; ?>');
                                               return false;"
                           value="GO" class="frm-btn" style="width:50px;height:33px;border-radius: 3px !important;font-size: 16px;"/>
                    <!-- End Code for GO Button @AUTHOR:PRIYANKA-11OCT2021-->
                </td>
            </tr>
                <?php }?>
        </table>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-top: 10px;">
            <tr>
                <td align="left">
                    <div id="supplierCrystalPurchasePanel">
                        <?php
                        include 'omrwmetisuellt.php';
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>