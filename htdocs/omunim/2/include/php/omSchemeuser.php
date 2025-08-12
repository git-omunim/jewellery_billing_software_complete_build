<?php
/*
 * Created on 24-DEC-2019 04:33 PM
 *
 * @FileName: omSchmeuser.php 
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
include 'ommpfndv.php';
require_once 'system/omssopin.php';
//require_once '../../omGlobal.php';
?>
<?php
//  if ($panelName == '' || $panelName == NULL){
$panelDivName = $_REQUEST['panelDivName'];
$chitSuppId = $_REQUEST['chitSuppId'];
$chitId = $_REQUEST['chitId'];
//  }

    $custFNameSrchStr = $_POST['custFName'];
    $custMobNoSrchStr = $_POST['custMobNo'];
    
    if ($custFNameSrchStr == '') {
        $custFNameSrchStr = $_REQUEST['custFName'];
    }
    if ($custMobNoSrchStr == '') {
        $custMobNoSrchStr = $_REQUEST['custMobNo'];
    }

    if ($custFNameSrchStr != NULL || $custFNameSrchStr != '' ||
            $custMobNoSrchStr != NULL || $custMobNoSrchStr != ''
    ) {

        $custFNameSrchStr = trim($custFNameSrchStr);
        $custMobNoSrchStr = trim($custMobNoSrchStr);
        if (($custFNameSrchStr != NULL || $custFNameSrchStr != '')) {
            $custNameStr = explode(" ", $custFNameSrchStr);
            $custFNameSrchStr = $custNameStr[0];
            if ($custNameStr[1] != '' or $custNameStr[1] != null) {
                $custFNameSrchStr = $custNameStr[0] . ' ' . $custNameStr[1];
            }
        }

        $arrSrchLbl = array('user_fname', 'user_mobile');
        $arrSrchVal = array($custFNameSrchStr, $custMobNoSrchStr);

        // SEARCH STRING
        $searchStr = '';
        for ($k = 0; $k < 2; $k++) {
            $searchStr = $searchStr . " and $arrSrchLbl[$k] LIKE '$arrSrchVal[$k]%'";
        }
//        echo '$searchStr:'.$searchStr;

        /*         * *********Start to add condition for supplier @MADHURI 04SEP2019*************** */
        $staffId = $_SESSION['sessionStaffId'];
        if ($staffId != '') {
            parse_str(getTableValues("SELECT acc_panel FROM access WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_emp_id='$staffId' and acc_check_id='staffTransAccess'"));
            if ($acc_panel == 'staffAllTrans' || $acc_panel == 'staffAllTransReadOnly') {
                $userLoginString = '';
            } else {
                $userLoginString = " and user_login_id= '$staffId'";
            }
        } else {
            $userLoginString = '';
        }
//
        $qSelPubCustomerCount = "SELECT user_id FROM user 
                            where user_owner_id='$_SESSION[sessionOwnerId]' and user_status!='Released' and user_type='CUSTOMER' $searchStr $ownOIPassStr $userLoginString";
        $resPubCustomerCount = mysqli_query($conn, $qSelPubCustomerCount) or die(mysqli_error($conn));
        $totalSearchedUsers = mysqli_num_rows($resPubCustomerCount);
        if ($totalSearchedUsers > 0) {
            ?>
            <div id="supplierListPrintDiv"> <!--div to pass for printing @AUTHOR: SANDY28OCT13---->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <div id="girviPanelTrId"></div>
                    <tr align="center">
                        <td align="center">
                            <div class="spaceLeft20">
                                <!--<h2><span class="textLabel16CalibriBoldGreen">Scheme Customer List -</span></h2>-->
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
                            <form id="schemecustomerPanel" name="schemecustomerPanel" method="post"
                                  action="javascript:schemecustomerPanel();">
                                <div class="spaceLeft20">
                                    <table width="100%" border="0" cellspacing="2" cellpadding="1">
                                        <tr>
                                            <td align="left"></td>
                                            <td>
                                                <span class="textLabel16CalibriBoldBlue">Scheme Customer Name</span>
                                            </td>
                                            <td>
                                                <span class="textLabel16CalibriBoldBlue">Father / Spouse Name</span>
                                            </td>
                                            <td>
                                                <span class="textLabel16CalibriBoldBlue">Village / City / State</span>
                                            </td>
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
                                        $totalCustomer = 0;

                                        //echo $custFNameSrchStr . ' L: ' . $custLNameSrchStr . ' F: ' . $custFatherOrSpouseNameSrchStr . ' C: ' . $custCitySrchStr;
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
                                        if ($custFirmIdSrchStr == 'NotSelected' || $custFirmIdSrchStr == 'NULL' || $custFirmIdSrchStr == '') {
                                            $custFirmIdSrchStr = '';
                                        } else {
                                            $strFrmId = $custFirmIdSrchStr;
                                        }
                                        //if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                        $ownOIPassStr = "and user_firm_id IN ($strFrmId)";
                                        //} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                                        //    $ownOIPassStr = '';
                                        //}
                                        //<!--Start Code To Add Var custMobile and custFirmId @Author:SANT09JAN16 -->


                                        $maxSrchCount = 420;

                                        //echo 'Cust0:' . $totalCustomer . ' String:' . $searchStr . '<br/>';
                                        $i = 0;
                                        while ($totalCustomer <= 0 && $i < 6) {
                                            $j = 6;
                                            while ($totalCustomer <= 0 && $j >= 0) {

                                                if ($searchStr != '')
                                                    include 'omSchemeuserque.php';
                                                $j--;
                                            }
                                            $i++;
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
                        <tr align="right" class="noPrint">
                            <td align="right" colspan="2">
                                <div id="ajaxLoadNavSrchSuppToAddGirviButtDiv">
                                    <table border="0" cellpadding="2" cellspacing="0" align="right">
                                        <tr>
                                            <?php
                                            if ($perPageNum > 1) {
                                                ?>
                                                <td align="right">
                                                    <form name="prev_supp" id="prev_supp"
                                                          action="javascript:navigationSrchSuppToAddGirvi(<?php echo $perPageNum - 1; ?>,'<?php echo $custFNameSrchStr; ?>','<?php echo $custMobNoSrchStr; ?>');"
                                                          method="get"><input type="submit" value="Previous" class="frm-btn"
                                                                        maxlength="30" size="15" /></form>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($totalCustomer > $perRowsPerPage) {
                                                ?>
                                                <td align="right">
                                                    <form name="next_supp" id="next_supp"
                                                          action="javascript:navigationSrchSuppToAddGirvi(<?php echo $perPageNum + 1; ?>,'<?php echo $custFNameSrchStr; ?>','<?php echo $custMobNoSrchStr; ?>');"
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
            <tr>
                <td align="center" colspan="2">
                    <div class="hrGold"></div>
                </td>
            </tr>
            <?php
        }
    }
?>