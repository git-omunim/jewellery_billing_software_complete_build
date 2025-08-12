<?php
/*
 * Created on 04-SEP-2019 10:33 AM
 *
 * @FileName: omsuppscag.php 
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
//require_once '../../omGlobal.php';
?>
<?php
require_once 'system/omssopin.php';
//  if ($panelName == '' || $panelName == NULL){
$panelDivName = $_REQUEST['panelDivName'];
$chitSuppId = $_REQUEST['chitSuppId'];
$chitId = $_REQUEST['chitId'];
//  }
//echo '$chitCustId=='.$chitCustId;
?>
<?php if ($themeName == 'Universe') {
    ?>
    <div id="supplierListPrintDiv" style="margin-top: 10px; background: #fff; padding: 30px 30px 40px 30px;">
        <div class="row">
            <div class="col-md-6">
                <div class="portlet-title caption font-green">
                    <h4 class="caption-subject bold uppercase">Supplier List</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="actions" style="text-align:right;">
                    <a class="btn btn-circle btn-icon-only btn-default" href="#" style="border:none;">
                        <i class="icon-close"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive" style="margin-top: 15px;">
            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                <div class="btn-group pull-right" style="padding-bottom: 10px;">
                    <button class="btn" data-toggle="dropdown" style="color: #fff;background: #f14c26;">Tools
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-print"></i> Print </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                        </li>
                    </ul>
                </div>
                <div id="girviPanelTrId"></div>
                <thead>
                    <tr>
                        <th style="text-align: center;">Redirect to</th>
                        <th style="text-align: center;">Supplier name</th>
                        <th style="text-align: center;">Father/Spouse Name</th>
                        <th style="text-align: center;">Village / City / State</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Mobile No.</th>
                        <th style="text-align: center;">Firm Name</th>
                        <th style="text-align: center;">User</th>
                    </tr>
                </thead>
                <?php
                $totalSupplier = 0;
                $suppHomeImage = 1;
                $suppUdhaarImage = 1;
                $suppSellPurchaseImage = 1; //SellPurchase Image Var Added @AUTHOR:PRIYA13FEB13
                //Customer Name
                $suppFNameSrchStr = $_POST['suppFName'];
                $suppLNameSrchStr = $_POST['suppLName'];
                $suppFatherOrSpouseNameSrchStr = $_POST['suppFatherOrSpouseName'];
                $suppCitySrchStr = $_POST['suppCity'];
                $suppMobNoSrchStr = $_POST['suppMobNo'];
                $suppFirmIdSrchStr = $_POST['supptFirmId'];

                if ($suppFNameSrchStr == '' &&
                        $suppLNameSrchStr == '' &&
                        $suppFatherOrSpouseNameSrchStr == '' &&
                        $suppCitySrchStr == '' &&
                        $suppMobNoSrchStr == '' &&
                        $suppFirmIdSrchStr == '') {
                    $suppFNameSrchStr = $_GET['suppFName'];
                    $suppLNameSrchStr = $_GET['suppLName'];
                    $suppFatherOrSpouseNameSrchStr = $_GET['suppFatherOrSpouseName'];
                    $suppCitySrchStr = $_GET['suppCity'];
                    $suppMobNoSrchStr = $_GET['suppMobNo'];
                    $suppFirmIdSrchStr = $_GET['suppFirmId'];
                }
                if ($suppFNameSrchStr != NULL || $suppFNameSrchStr != '' ||
                        $suppLNameSrchStr != NULL || $suppLNameSrchStr != '' ||
                        $suppFatherOrSpouseNameSrchStr != NULL || $suppFatherOrSpouseNameSrchStr != '' ||
                        $suppCitySrchStr != NULL || $suppCitySrchStr != '' ||
                        $suppMobNoSrchStr != NULL || $suppMobNoSrchStr != '' ||
                        $suppFirmIdSrchStr != NULL || $suppFirmIdSrchStr != '') {

                    $suppFNameSrchStr = trim($suppFNameSrchStr);
                    $suppLNameSrchStr = trim($suppLNameSrchStr);
                    $suppFatherOrSpouseNameSrchStr = trim($suppFatherOrSpouseNameSrchStr);
                    if ($suppFatherOrSpouseNameSrchStr != NULL || $suppFatherOrSpouseNameSrchStr != '')
                        $suppFatherOrSpouseNameWithUnderscore = '_' . $suppFatherOrSpouseNameSrchStr;
                    $suppCitySrchStr = trim($suppCitySrchStr);
                    $suppMobNoSrchStr = trim($suppMobNoSrchStr);
                    $suppFirmIdSrchStr = trim($suppFirmIdSrchStr);

                    if (($suppFNameSrchStr != NULL || $suppFNameSrchStr != '')) {

                        $suppNameStr = explode(" ", $suppFNameSrchStr);

                        $suppFNameSrchStr = $suppNameStr[0];

                        if ($suppLNameSrchStr == '' || $suppLNameSrchStr == NULL) {
                            if ($suppNameStr[1] != '' or $suppNameStr[1] != null) {
                                $suppLNameSrchStr = $suppNameStr[1];
                            }
                        } else {
                            if ($suppNameStr[1] != '' or $suppNameStr[1] != null) {
                                $suppFNameSrchStr = $suppNameStr[0] . ' ' . $suppNameStr[1];
                            }
                        }

                        if ($suppNameStr[2] != '' or $suppNameStr[2] != null) {
                            $suppFNameSrchStr = $suppNameStr[0] . ' ' . $suppNameStr[1];
                            $suppLNameSrchStr = $suppNameStr[2];
                        }
                    }

                    // how many rows to show per page
                    $perRowsPerPage = 10;
                    $doubleLimit = $perRowsPerPage * 2;
                    // by default we show first page
                    $perPageNum = 1;

                    // if $_GET['page'] defined, use it as page number
                    if (isset($_GET['page'])) {
                        $perPageNum = $_GET['page'];
                    }

                    // counting the offset
                    $perOffset = ($perPageNum - 1) * $perRowsPerPage;

                    if (isset($_GET['selFirmId'])) {
                        $selFirmId = $_GET['selFirmId'];
                    } else {
                        //if not selected assign session firm @AUTHOR: SANDY10JUL13
                        $selFirmId = $_SESSION['setFirmSession'];
                    }
                    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                    }
                    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
                        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                        $strFrmId = '0';
                        //Set String for Public Firms
                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                            $strFrmId = $strFrmId . ",";
                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                        }
                    } else {
                        $strFrmId = $selFirmId;
                    }

                    if ($suppFirmIdSrchStr == 'NotSelected' || $suppFirmIdSrchStr == 'NULL' || $suppFirmIdSrchStr == '') {
                        $suppFirmIdSrchStr = '';
                    } else {
                        $strFrmId = $suppFirmIdSrchStr;
                    }
                    $ownOIPassStr = "and user_firm_id IN ($strFrmId)";
                    $arrSrchLbl = array('user_fname', 'user_lname', 'user_father_name', 'user_village', 'user_mobile', 'user_firm_id');
                    $arrSrchVal = array($suppFNameSrchStr, $suppLNameSrchStr, $suppFatherOrSpouseNameWithUnderscore, $suppCitySrchStr, $suppMobNoSrchStr, $suppFirmIdSrchStr);

                    $maxSrchCount = 420;

                    $i = 0;
                    while ($totalSupplier <= 10 && $i < 6) {
                        $j = 6;
                        while ($totalSupplier <= 10 && $j >= 0) {
                            $searchStr = '';
                            for ($k = $i; $k < $j; $k++) {
                                if ($arrSrchVal[$k] != NULL && $arrSrchVal[$k] != '' && $arrSrchVal[$k] != 'undefined') {
                                    if ($arrSrchLbl[$k] == 'user_village' && $totalSupplier <= 10 && $j < 6) {
                                        $arrSrchLbl[$k] = 'user_city';
                                    }
                                    if ($arrSrchLbl[$k] == 'user_city' && $totalSupplier <= 10 && $j < 5) {
                                        $arrSrchLbl[$k] = 'user_state';
                                    }
                                    if ($arrSrchLbl[$k] == 'user_firm_id') {
                                        $searchStr = $searchStr . " and $arrSrchLbl[$k] LIKE '$arrSrchVal[$k]'";
                                    } else {
                                        $searchStr = $searchStr . " and $arrSrchLbl[$k] LIKE '$arrSrchVal[$k]%'";
                                    }
                                }
                            }
                            //echo 'Cust1:' . $totalCustomer .' String:' .$searchStr . '<br/>';
                            if ($searchStr != '')
                                include 'omsuppscags.php';
                            $j--;
                        }
                        $i++;
                    }
                    //echo 'Cust11:' . $totalCustomer .' String:' .$searchStr . '<br/>';
                }
                ?>
            </table>
        </div>
    </div>
    <!--END UNIVERSE THEME-->
<?php } else { ?>
    <div id="supplierListPrintDiv"> <!--div to pass for printing @AUTHOR: SANDY28OCT13---->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <div id="girviPanelTrId"></div>
            <tr align="center">
                <td align="center">
                    <div class="spaceLeft20">
                        <h2><span class="textLabel16CalibriBoldGreen">Supplier List -</span></h2>
                    </div>
                </td>
                <td valign="middle" align="right">
                    <div id="ajaxLoadShowSearchGirviDiv" style="visibility: hidden" class="blackMess11">
                        <?php include 'omzaajld.php'; ?>
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td align="center" colspan="2">
                    <form id="getSuppAddGirviPanel" name="getSuppAddGirviPanel" method="post"
                          action="javascript:getSuppAddGirviPanel();">
                        <div class="spaceLeft20">
                            <table width="100%" border="0" cellspacing="2" cellpadding="1">
                                <tr>
                                    <td align="left"></td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Supplier Name</span>
                                    </td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Father / Spouse Name</span>
                                    </td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Village / City / State</span>
                                    </td>
                                    <!--Start code to add address @Author:PRIYA19FEB14--->
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Address</span>
                                    </td>
                                    <!--End code to add address @Author:PRIYA19FEB14--->
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Mobile No</span>
                                    </td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Firm Name</span>
                                    </td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">User</span><!---column added @Author:PRIYA17DEC14--->
                                    </td>
                                    <td>
                                        <span class="textLabel16CalibriBoldBlue">Status</span><!---column added @Author:BAJRANG6FEB18--->
                                    </td>
                                </tr>
                                <?php
                                $totalSupplier = 0;
                                $suppHomeImage = 1;
                                $suppUdhaarImage = 1;
                                $suppSellPurchaseImage = 1; //SellPurchase Image Var Added @AUTHOR:PRIYA13FEB13
                                //Customer Name
                                $suppFNameSrchStr = $_POST['suppFName'];
                                $suppLNameSrchStr = $_POST['suppLName'];
                                $suppFatherOrSpouseNameSrchStr = $_POST['suppFatherOrSpouseName'];
                                $suppCitySrchStr = $_POST['suppCity'];
                                $suppMobNoSrchStr = $_POST['suppMobNo'];
                                $suppFirmIdSrchStr = $_POST['suppFirmId'];

                                if ($suppFNameSrchStr == '' &&
                                        $suppLNameSrchStr == '' &&
                                        $suppFatherOrSpouseNameSrchStr == '' &&
                                        $suppCitySrchStr == '' &&
                                        $suppMobNoSrchStr == '' &&
                                        $suppFirmIdSrchStr == '') {
                                    $suppFNameSrchStr = $_GET['suppFName'];
                                    $suppLNameSrchStr = $_GET['suppLName'];
                                    $suppFatherOrSpouseNameSrchStr = $_GET['suppFatherOrSpouseName'];
                                    $suppCitySrchStr = $_GET['suppCity'];
                                    $suppMobNoSrchStr = $_GET['suppMobNo'];
                                    $suppFirmIdSrchStr = $_GET['suppFirmId'];
                                }
                                //echo $custFNameSrchStr . ' L: ' . $custLNameSrchStr . ' F: ' . $custFatherOrSpouseNameSrchStr . ' C: ' . $custCitySrchStr;
                                if ($suppFNameSrchStr != NULL || $suppFNameSrchStr != '' ||
                                        $suppLNameSrchStr != NULL || $suppLNameSrchStr != '' ||
                                        $suppFatherOrSpouseNameSrchStr != NULL || $suppFatherOrSpouseNameSrchStr != '' ||
                                        $suppCitySrchStr != NULL || $suppCitySrchStr != '' ||
                                        $suppMobNoSrchStr != NULL || $suppMobNoSrchStr != '' ||
                                        $suppFirmIdSrchStr != NULL || $suppFirmIdSrchStr != '') {

                                    $suppFNameSrchStr = trim($suppFNameSrchStr);
                                    $suppLNameSrchStr = trim($suppLNameSrchStr);
                                    $suppFatherOrSpouseNameSrchStr = trim($suppFatherOrSpouseNameSrchStr);
                                    if ($suppFatherOrSpouseNameSrchStr != NULL || $suppFatherOrSpouseNameSrchStr != '')
                                        $suppFatherOrSpouseNameWithUnderscore = '_' . $suppFatherOrSpouseNameSrchStr;
                                    $suppCitySrchStr = trim($suppCitySrchStr);
                                    $suppMobNoSrchStr = trim($suppMobNoSrchStr);
                                    $suppFirmIdSrchStr = trim($suppFirmIdSrchStr);

                                    if (($suppFNameSrchStr != NULL || $suppFNameSrchStr != '')) {

                                        $suppNameStr = explode(" ", $suppFNameSrchStr);

                                        $suppFNameSrchStr = $suppNameStr[0];

                                        if ($suppLNameSrchStr == '' || $suppLNameSrchStr == NULL) {
                                            if ($suppNameStr[1] != '' or $suppNameStr[1] != null) {
                                                $suppLNameSrchStr = $suppNameStr[1];
                                            }
                                        } else {
                                            if ($suppNameStr[1] != '' or $suppNameStr[1] != null) {
                                                $suppFNameSrchStr = $suppNameStr[0] . ' ' . $suppNameStr[1];
                                            }
                                        }

                                        if ($suppNameStr[2] != '' or $suppNameStr[2] != null) {
                                            $suppFNameSrchStr = $suppNameStr[0] . ' ' . $suppNameStr[1];
                                            $suppLNameSrchStr = $suppNameStr[2];
                                        }
                                    }
                                    // how many rows to show per page
                                    $perRowsPerPage = 10;
                                    $doubleLimit = $perRowsPerPage * 2;
                                    // by default we show first page
                                    $perPageNum = 1;

                                    // if $_GET['page'] defined, use it as page number
                                    if (isset($_GET['page'])) {
                                        $perPageNum = $_GET['page'];
                                    }

                                    // counting the offset
                                    $perOffset = ($perPageNum - 1) * $perRowsPerPage;


                                    //                                if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                    //                                    $qSelPubFirmCount = "SELECT firm_id,firm_name,firm_owner,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                    //                                    $resPubFirmCount = mysqli_query($conn,$qSelPubFirmCount);
                                    //
    //                                    $strFrmId = '0';
                                    //
    //                                    while ($rowPubFirm = mysqli_fetch_array($resPubFirmCount, MYSQLI_ASSOC)) {
                                    //                                        $strFrmId = $strFrmId . ",";
                                    //                                        $strFrmId = $strFrmId . "$rowPubFirm[firm_id]";
                                    //                                    }
                                    //                                }
                                    if (isset($_GET['selFirmId'])) {
                                        $selFirmId = $_GET['selFirmId'];
                                    } else {
                                        //if not selected assign session firm @AUTHOR: SANDY10JUL13
                                        $selFirmId = $_SESSION['setFirmSession'];
                                    }
                                    if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                        $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                                    } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                                        $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                                    }
                                    if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
                                        $resFirmCount = mysqli_query($conn, $qSelFirmCount);
                                        $strFrmId = '0';
                                        //Set String for Public Firms
                                        while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
                                            $strFrmId = $strFrmId . ",";
                                            $strFrmId = $strFrmId . "$rowFirm[firm_id]";
                                        }
                                    } else {
                                        $strFrmId = $selFirmId;
                                    }
                                    if ($suppFirmIdSrchStr == 'NotSelected' || $suppFirmIdSrchStr == 'NULL' || $suppFirmIdSrchStr == '') {
                                        $suppFirmIdSrchStr = '';
                                    } else {
                                        $strFrmId = $suppFirmIdSrchStr;
                                    }
                                    //if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                    $ownOIPassStr = "and user_firm_id IN ($strFrmId)";
                                    //} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                                    //    $ownOIPassStr = '';
                                    //}
                                    //<!--Start Code To Add Var custMobile and custFirmId @Author:SANT09JAN16 -->
                                    $arrSrchLbl = array('user_fname', 'user_lname', 'user_father_name', 'user_village', 'user_mobile', 'user_firm_id');
                                    $arrSrchVal = array($suppFNameSrchStr, $suppLNameSrchStr, $suppFatherOrSpouseNameWithUnderscore, $suppCitySrchStr, $suppMobNoSrchStr, $suppFirmIdSrchStr);

                                    $maxSrchCount = 420;

                                    //echo 'Cust0:' . $totalCustomer . ' String:' . $searchStr . '<br/>';
                                    $i = 0;
                                    while ($totalSupplier <= 0 && $i < 6) {
                                        $j = 6;
                                        while ($totalSupplier <= 0 && $j >= 0) {
                                            $searchStr = '';
                                            for ($k = $i; $k < $j; $k++) {
                                                if ($arrSrchVal[$k] != NULL && $arrSrchVal[$k] != '' && $arrSrchVal[$k] != 'undefined') {
                                                    if ($arrSrchLbl[$k] == 'user_village' && $totalSupplier <= 0 && $j < 6) {
                                                        $arrSrchLbl[$k] = 'user_city';
                                                    }
                                                    if ($arrSrchLbl[$k] == 'user_city' && $totalSupplier <= 0 && $j < 5) {
                                                        $arrSrchLbl[$k] = 'user_state';
                                                    }
                                                    if ($arrSrchLbl[$k] == 'user_firm_id') {
                                                        $searchStr = $searchStr . " and $arrSrchLbl[$k] LIKE '$arrSrchVal[$k]'";                                                     
                                                    } else {
                                                        if ($arrSrchLbl[$k] == 'user_village') {
                                                            $searchStr = $searchStr . " and ($arrSrchLbl[$k] LIKE '$arrSrchVal[$k]%' OR user_city LIKE '$arrSrchVal[$k]%')";
                                                        } else {
                                                            $searchStr = $searchStr . " and $arrSrchLbl[$k] LIKE '$arrSrchVal[$k]%'";
                                                        }
                                                    }
                                                    //echo 'Cust1:' . $totalCustomer . ' String:' . $searchStr . ' $arrSrchLbl[$k]:' . $arrSrchLbl[$k] . '<br/>';
                                                }
                                            }
                                            //echo 'Cust1:' . $totalCustomer .' String:' .$searchStr .' $arrSrchLbl[$k]:' .$arrSrchLbl[$k] . '<br/>';
                                            if ($searchStr != '')
                                                include 'omsuppscags.php';
                                            $j--;
                                        }
                                        $i++;
                                    }
                                    //echo 'Cust11:' . $totalCustomer . ' String:' . $searchStr . '<br/>';
                                    //<!--End Code To Add Var custMobile and custFirmId @Author:SANT09JAN16 -->
                                    // 
                                    //                            if ($totalCustomer <= 0) {
                                    //                                if (($custFNameSrchStr != NULL || $custFNameSrchStr != '') &&
                                    //                                        ($custLNameSrchStr != NULL || $custLNameSrchStr != '') &&
                                    //                                        ($custFatherOrSpouseNameSrchStr != NULL || $custFatherOrSpouseNameSrchStr != '') &&
                                    //                                        ($custCitySrchStr != NULL || $custCitySrchStr != '') &&
                                    //                                        ($custMobNoSrchStr != NULL || $custMobNoSrchStr != '') &&
                                    //                                        ($custFirmIdSrchStr != NULL || $custFirmIdSrchStr != '')) {
                                    //
    //                                    $searchStr = "and cust_fname LIKE '$custFNameSrchStr%' and cust_lname LIKE '$custLNameSrchStr%' 
                                    //                                        and cust_father_name LIKE '_$custFatherOrSpouseName%' and cust_city LIKE '$custCitySrchStr%'";
                                    //
    //                                    include 'omccscags.php';
                                    //                                }
                                    //                            }
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </td>
            </tr>
            <?php
            if ($totalNextSupplier > 0) {
                ?>
                <tr align="right" class="noPrint"><!---TO ADD NO PRINT CLASS @AUTHOR: SANDY11DEC13---->
                    <!--Start Code To Add Var custMobile and custFirmId @Author:PRIYA27AUG13 -->
                    <td align="right" colspan="2">
                        <div id="ajaxLoadNavSrchSuppToAddGirviButtDiv">
                            <table border="0" cellpadding="2" cellspacing="0" align="right">
                                <tr>
                                    <?php
                                    if ($perPageNum > 1) {
                                        ?>
                                        <td align="right">
                                            <form name="prev_supp" id="prev_supp"
                                                  action="javascript:navigationSrchSuppToAddGirvi(<?php echo $perPageNum - 1; ?>,'<?php echo $suppFNameSrchStr; ?>','<?php echo $suppLNameSrchStr; ?>','<?php echo $suppFatherOrSpouseNameSrchStr; ?>','<?php echo $suppCitySrchStr; ?>','<?php echo $suppMobNoSrchStr; ?>','<?php echo $suppFirmIdSrchStr; ?>');"
                                                  method="get"><input type="submit" value="Previous" class="frm-btn"
                                                                maxlength="30" size="15" /></form>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totalSupplier > $perRowsPerPage) {
                                        ?>
                                        <td align="right">
                                            <form name="next_supp" id="next_supp"
                                                  action="javascript:navigationSrchSuppToAddGirvi(<?php echo $perPageNum + 1; ?>,'<?php echo $suppFNameSrchStr; ?>','<?php echo $suppLNameSrchStr; ?>','<?php echo $suppFatherOrSpouseNameSrchStr; ?>','<?php echo $suppCitySrchStr; ?>','<?php echo $suppMobNoSrchStr; ?>','<?php echo $suppFirmIdSrchStr; ?>');"
                                                  method="get"><input type="submit" value="Next" class="frm-btn"
                                                                maxlength="30" size="15" /></form>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <!--End Code To Add Var custMobile and custFirmId @Author:PRIYA27AUG13 -->
                </tr>
                <?php
            }
            ?>
            <tr>
                <td align="center" colspan="2">
                    <div class="hrGold"></div>
                </td>
            </tr>
            </tr>
        </table>
    </div>
    <!-----------Start to add Print button to print cust list @AUTHOR: SANDY28OCT13 ----------------->
    <tr>
        <td align="center" colspan="2" class="noPrint">
            <?php if ($panelDivName != 'chitfundInfo') { ?>
                <div id="printButt">
                    <a style="cursor: pointer;" 
                       onclick="printGirviListPanel('supplierListPrintDiv')">
                        <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='Print' title='Print'
                             width="32px" height="32px" /> 
                    </a> 
                </div>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <div class="hrGold"></div>
        </td>
    </tr>
    <!-----------End to add Print button to print cust list @AUTHOR: SANDY28OCT13 ----------------->
<?php } ?>
<!--END ELSE-->