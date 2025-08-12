<?php
/*
 * **************************************************************************************
 * @tutorial: udhaar emi dv
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 11:10:42 AM
 *
 * @FileName: omuemidv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
include 'system/omsachsc.php';
include 'ommpemac.php';
include 'ommpdpmsg.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
require_once 'ommpincr.php';   // FILE ADDED  @AUTHOR:SHE18MAY16
include_once 'ommpfndv.php';
?>
<?php
$staffId = $_SESSION['sessionStaffId'];
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$custId = $_POST['custId'];
if ($custId == '') {
    $custId = $_GET['custId'];
}
$panelName = $_GET['panelName'];
if ($panelName == 'UpdateUdhaar') {
    $udhaarId = $_GET['udhaarId'];
    parse_str(getTableValues("SELECT * FROM udhaar where udhaar_own_id='$sessionOwnerId' and udhaar_id = '$udhaarId'"));
    $firmId = $udhaar_firm_id;
    $selDOBDay = substr($udhaar_DOB, 0, 2);
    $selDOBMnth = substr($udhaar_DOB, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($udhaar_DOB, -4);
    $custId = $udhaar_cust_id;

    $qSelAllUdhaarDep = "SELECT udhadepo_EMI_status FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId' and (udhadepo_EMI_status  IN ('Paid') or udhadepo_EMI_status IS NULL)";//EMI Status condition added @Author:SHRI29MAY15
    $resAllUdhaarDep = mysqli_query($conn,$qSelAllUdhaarDep);
    $paidCounter = 0;
    while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDep, MYSQLI_ASSOC)) {
        $emiStatus = $rowUdhaarDepMon['udhadepo_EMI_status'];
        if ($emiStatus == 'Paid') {
            $paidCounter++;
        }
    }
} else {
    //*************************************************Start code to change for send data from customer to user table Author@SANT12JAN16********************************************************************************
    parse_str(getTableValues("SELECT user_firm_id FROM user WHERE user_id='$custId' and user_owner_id='$sessionOwnerId'"));
    $firmId = $user_firm_id;
    parse_str(getTableValues("SELECT udhaar_pre_serial_num FROM udhaar where udhaar_own_id='$sessionOwnerId' and udhaar_firm_id='$user_firm_id' order by UNIX_TIMESTAMP(udhaar_ent_dat) desc LIMIT 0,1"));
    if ($udhaar_pre_serial_num == NULL || $udhaar_pre_serial_num == '') {
        $udhaar_pre_serial_num = 'IEM'; //add new value @Author:ANUJA13MAR16
        $qSelSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where (udhaar_pre_serial_num is NULL OR udhaar_pre_serial_num = '') and udhaar_own_id='$sessionOwnerId'";//query changed @Author:PRIYA17FEB15
        $resSerialNo = mysqli_query($conn,$qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    } else {
        $qSelSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where udhaar_own_id='$sessionOwnerId' and udhaar_firm_id='$user_firm_id'";
        $resSerialNo = mysqli_query($conn,$qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    }
    $udhaar_serial_num = $rowSerialNo['udhaarSerialNo'] + 1;
//*************************************************End code to change for send data from customer to user table Author@SANT12JAN16*****************************************************************************************
    $qSelSerialNo = "SELECT udhaar_serial_num FROM udhaar where udhaar_serial_num='$udhaar_serial_num' and udhaar_pre_serial_num='$udhaar_pre_serial_num' and udhaar_own_id='$sessionOwnerId'";
    $resSerialNo = mysqli_query($conn,$qSelSerialNo);
    $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    $uSerialNo = $rowSerialNo['udhaar_serial_num'];

    if ($uSerialNo != '' || $uSerialNo != NULL) {
        $qSelSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where udhaar_pre_serial_num='$udhaar_pre_serial_num' and udhaar_own_id='$sessionOwnerId'";
        $resSerialNo = mysqli_query($conn,$qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
        $udhaar_serial_num = $rowSerialNo['udhaarSerialNo'] + 1;
    }
    $selDOBDay = date(j);
    $todayMM = date(n) - 1;
    $selDOBYear = date(Y);
    $qSelQuery = "SELECT girv_sms_id FROM girvi where girv_own_id='$sessionOwnerId' and girv_upd_sts='New' order by girv_id desc LIMIT 0,1";
    $resQuery = mysqli_query($conn,$qSelQuery);
    $rowQuery = mysqli_fetch_array($resQuery, MYSQLI_ASSOC);
    $loanSMSId = $rowQuery['girv_sms_id'];
}
$omPanelDiv = 'AddUdhaarEMI';
?>
<div>
    <form name="add_udhaar_emi_frm" id="add_udhaar_emi_frm"
          enctype="multipart/form-data" method="post"
          action="include/php/omuemiad.php"  
          onsubmit="return addNewUdhaarEMI();">    
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
<!--***************************Start code to change moneypanel home page Author:SANT28APR16********************************-->
                  <tr>
                <td align="left" valign="top" class="ff_calibri fs_16 orange"> 

                </td>
                <td></td>
                <td align="right" valign="top" class="textLabel12CalibriBrown" title="Click to close panel ! ">

                    <a style="cursor: pointer;position:absolute;margin-left:-20px;margin-top: -14px"  onclick="closeAdvMetalDiv1();">
                        <?php include 'omzaajcl.php'; ?>
                    </a>

                </td>
            </tr>
<!--***************************End code to change moneypanel home page Author:SANT28APR16********************************-->            
            <tr>
                <td align="left" width="100%">
                    <table border="0" cellpadding="0" cellspacing="2" width="100%" class="spaceLeftRight2">
                        <tr align="left">
                            <td align="left">
                                <table border="0" cellpadding="1" cellspacing="1" width="100%">
                                    <tr>
                                        <td align="center" valign="top" width="240px"> 
                                            <table border="0" cellpadding="2" cellspacing="0">
                                                <tr>  
                                                    <td align="center" valign="top" class="textLabel12CalibriBrown">
                                                        UDHAAR AMOUNT
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle" width="235px" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF">
                                                        <input id="udhaarMainAmount" name="udhaarMainAmount" type="text"
                                                               placeholder="UDHAAR AMOUNT" value="<?php echo $udhaar_prin_amt; ?>" 
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('DOBDay').focus();
                                                                           return false;
                                                                       }
                                                                       else if (event.keyCode == 8 && this.value == '') {
                                                                           return false;
                                                                       }"
                                                               spellcheck="false" class="textFieldWOB20 height_30" size="16" maxlength="30" /><!-- value variable changed @Author:SHRI14JUL15-->
                                                        <input id="custId" name="custId" value="<?php echo $custId; ?>" type="hidden" /> 
                                                        <input id="mainPanel" name="mainPanel" value="udhaarWithEMI" type="hidden" /> 
                                                        <input id="noOfUdhaarItems" name="noOfUdhaarItems" type="hidden" /> 
                                                        <input id="panelName" name="panelName" value="<?php echo $panelName; ?>" type="hidden" /> 
                                                        <input id="udhaarId" name="udhaarId" value="<?php echo $udhaarId; ?>" type="hidden" /> 
                                                        <input id="paidCounter" name="paidCounter" value="<?php echo $paidCounter; ?>" type="hidden" /> 
                                                        <input id="udharOccCheck" name="udharOccCheck" value="<?php echo $udhaar_EMI_occurrences; ?>" type="hidden" /> <!----added @Author:PRIYA08DEC14----->
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <td align="center" valign="top" class="textLabel12CalibriBrown">
                                                        UDHAAR START DATE
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"> 
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr> 
                                                                <td align="center" valign="middle"  class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                                    <?php
                                                                    $class = 'textLabel14CalibriGrey';
                                                                    include 'omuemidt.php';
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="190px"> 
                                            <table border="0" cellpadding="2" cellspacing="0">
                                                <tr align="center">
                                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                        INTEREST OPTION
                                                    </td>
                                                </tr>
                                                <tr> 
                                                    <td align="center" valign="middle" width="150px" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                        <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                                            <select
                                                                id="interestType" name="interestType" class="textLabel14CalibriReq"
                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('selROIValue').focus();
                                                                            return false;
                                                                        }
                                                                        else if (event.keyCode == 8) {
                                                                            document.getElementById('DOBYear').focus();
                                                                            return false;
                                                                        }"
                                                                onchange="return changeUdhaarEMIROIOpt(this, document.getElementById('ROIOption'), '<?php echo $omPanelDiv; ?>');">
                                                                    <?php
                                                                    $intType = array(Monthly, Annually);
                                                                    for ($i = 0; $i <= 1; $i++)
                                                                        if ($intType[$i] == $udhaar_ROI_typ)
                                                                            $optUdhaarIntTypeSel[$i] = 'selected';
                                                                    ?>
                                                                <option value="Monthly" <?php echo $optUdhaarIntTypeSel[0]; ?>>MONTHLY</option>
                                                                <option value="Annually" <?php echo $optUdhaarIntTypeSel[1]; ?>>ANNUALLY</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr align="center">
                                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                        RATE OF INTEREST
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"> 
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr> 
                                                                <td align="center" valign="middle" width="150px" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                                                    <div id="ROIOption">
                                                                        <?php
                                                                        $prevFieldId = 'interestType';
                                                                        $nextFieldId = 'udhharFirmId';
                                                                        include 'omuemroi.php';
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="top" width="480px"> 
                                            <table border="0" cellpadding="2" cellspacing="0">
                                                <tr>
                                                    <td align="center" valign="top" width="80px"> 
                                                        <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td align="center" valign="middle">
                                                                    <div class="girvi_head_green">
                                                                        <img src="<?php echo $documentRootBSlash; ?>/images/grey48.png" 
                                                                             alt="Add Udhaar" title="Add Udhaar" />
                                                                    </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="middle">
                                                                    <div id="ajaxLoadGetItemListDiv" style="visibility: hidden">
                                                                        <?php include 'omzaajld.php'; ?>
                                                                    </div>
                                                                </td> 
                                                            </tr>

                                                        </table>
                                                    </td>
                                                    <td align="center" valign="top" width="200px"> 
                                                        <table border="0" cellpadding="2" cellspacing="0">
                                                            <tr align="center">
                                                                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                                    FIRM NAME
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right" valign="middle" width="140px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                                                    <div id="selectFirmDiv" class="selectStyledBorderLess background_transparent">
                                                                        <?php
                                                                        $prevFieldId = 'selROIValue';
                                                                        $nextFieldId = 'udhaarPreSerialNo';
                                                                        $firmIdName = 'udhharFirmId';
                                                                        $class = 'textLabel14CalibriReq';
                                                                        $panel = 'AddNewUdhaar';
                                                                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                            $firmIdSelected = $_SESSION['setFirmSession'];
                                                                        } else {
                                                                            $firmIdSelected = $firmId;
                                                                        }
                                                                        include 'omffrafs.php';
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                                    CASH / ON PURCHASE
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 
                                                                    <table border="0" cellpadding="2" cellspacing="0">
                                                                        <tr>
                                                                            <td align="center" valign="middle" width="140px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                                                                <div id="loanTypeDiv" class="selectStyledBorderLess background_transparent">

                                                                                    <?php if ($staffId && $array['addUdhaarAccessUdhTyp'] != 'true') { ?>
                                                                                        <select disabled="disabled" onchange="return showAddUdhaarItemDiv(this, document.getElementById('addUdhaarItemDiv'));" 
                                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                document.getElementById('udhaarEMINoOfDays').focus();
                                                                                                                return false;
                                                                                                            }
                                                                                                            else if (event.keyCode == 8) {
                                                                                                                document.getElementById('udhaarSerialNo').focus();
                                                                                                                return false;
                                                                                                            }"
                                                                                                id="udhaarType" name="udhaarType" class="textLabel14CalibriReq">
                                                                                            <option value="Cash" selected>CASH</option>
                                                                                            <option value="OnPurchase">ON PURCHASE</option>
                                                                                        </select><input  id="udhaarType" name="udhaarType" type="hidden" value="Cash"  />
                                                                                    <?php } else { ?>
                                                                                        <select onchange="return showAddUdhaarItemDiv(this, document.getElementById('addUdhaarItemDiv'));"
                                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                document.getElementById('udhaarPayAccId').focus();
                                                                                                                return false;
                                                                                                            }
                                                                                                            else if (event.keyCode == 8) {
                                                                                                                document.getElementById('udhaarSerialNo').focus();
                                                                                                                return false;
                                                                                                            }"
                                                                                                id="udhaarType" name="udhaarType" class="textLabel14CalibriReq">
                                                                                                    <?php
                                                                                                    if ($panelName == 'UpdateUdhaar') {
                                                                                                        $udhType = array(Cash, OnPurchase);
                                                                                                        for ($i = 0; $i <= 1; $i++)
                                                                                                            if ($udhType[$i] == $udhaar_type)
                                                                                                                $optUdhaarTypeSel[$i] = 'selected';
                                                                                                    }else {
                                                                                                        $optUdhaarTypeSel[0] = 'selected';
                                                                                                    }
                                                                                                    ?>
                                                                                            <option value="Cash" <?php echo $optUdhaarTypeSel[0]; ?>>CASH</option>
                                                                                            <option value="OnPurchase" <?php echo $optUdhaarTypeSel[1]; ?>>ON PURCHASE</option>
                                                                                        </select>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td align="center" valign="top" width="200px">
                                                        <table border="0" cellpadding="2" cellspacing="0" valign="top">
                                                            <tr align="center">
                                                                <td align="center" valign="middle" colspan="2" class="textLabel12CalibriBrown">
                                                                    UDHAAR SERIAL NO.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="middle" width="170px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF">
                                                                    <div id='udhaarSerialNoDiv'>
                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                            <tr>
                                                                                <td>
                                                                                    <input id="udhaarPreSerialNo" name="udhaarPreSerialNo" placeholder="SID"
                                                                                           type="text" 
                                                                                           value="<?php echo $udhaar_pre_serial_num; ?>" 
                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                       document.getElementById('udhaarSerialNo').focus();
                                                                                                       return false;
                                                                                                   }
                                                                                                   else if (event.keyCode == 8 && this.value == '') {
                                                                                                       document.getElementById('udhharFirmId').focus();
                                                                                                       return false;
                                                                                                   }"
                                                                                           spellcheck="false" class="border-no inputBox14CalibriReqCenter background_transparent" size="3" maxlength="3"  />
                                                                                    &nbsp;-&nbsp;
                                                                                    <input id="udhaarSerialNo" name="udhaarSerialNo" placeholder="SNO"
                                                                                           type="text" value="<?php echo $udhaar_serial_num; ?>"
                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                       document.getElementById('udhaarType').focus();
                                                                                                       return false;
                                                                                                   }
                                                                                                   else if (event.keyCode == 8 && this.value == '') {
                                                                                                       document.getElementById('udhaarPreSerialNo').focus();
                                                                                                       return false;
                                                                                                   }"
                                                                                           spellcheck="false" class="border-no textLabel14CalibriReq background_transparent" size="10" maxlength="10" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="middle" width="170px" colspan="2">
                                                                    <table border="0" cellpadding="0" cellspacing="1" width="100%">
                                                                        <tr>
                                                                            <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                                                NO OF DAYS
                                                                            </td>
                                                                            <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                                                OCCURRENCES
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="middle" width="170px" colspan="2">
                                                                    <table border="0" cellpadding="0" cellspacing="1">
                                                                        <tr>
                                                                            <td align="center" valign="middle" width="170px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF">
                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input type="text" id="udhaarEMINoOfDays" name="udhaarEMINoOfDays" placeholder="DAYS"
                                                                                                   value="<?php echo $udhaar_EMI_days; ?>"
                                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                               document.getElementById('udhaarEMIOccurrences').focus();
                                                                                                               return false;
                                                                                                           }
                                                                                                           else if (event.keyCode == 8 && this.value == '') {
                                                                                                               document.getElementById('udhaarType').focus();
                                                                                                               return false;
                                                                                                           }"
                                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"    
                                                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="6" maxlength="3"  />
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="center" valign="middle" width="170px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF">
                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input type="text"  id="udhaarEMIOccurrences" name="udhaarEMIOccurrences" placeholder="OCCURES"
                                                                                                   value="<?php echo $udhaar_EMI_occurrences; ?>"
                                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                               document.getElementById('udhaarPayAccId').focus();
                                                                                                               return false;
                                                                                                           }
                                                                                                           else if (event.keyCode == 8 && this.value == '') {
                                                                                                               document.getElementById('udhaarEMINoOfDays').focus();
                                                                                                               return false;
                                                                                                           }"
                                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"    
                                                                                                   spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="6" maxlength="10" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <tr align="left">
                            <td align="left" colspan="4">
                                <div id="addUdhaarItemDiv"></div>
                            </td>
                        </tr>
                        <?php if ($panelName == 'UpdateUdhaar' && $udhaar_type == 'OnPurchase') { ?>
                            <tr>
                                <td align="center" colspan="4" class="paddingTop3">
                                    <?php
                                    $qSelItemDet = "SELECT * FROM udhaar_items where udhaar_itm_own_id = '$_SESSION[sessionOwnerId]' and udhaar_itm_udhaar_id = '$udhaarId' order by udhaar_itm_since asc";
                                    $resItemDet = mysqli_query($conn,$qSelItemDet);
                                    $noOfItems = mysqli_num_rows($resItemDet);
                                    $counter = 1;
                                    while ($rowItemDet = mysqli_fetch_array($resItemDet)) {
                                        $udhaarItemId = $rowItemDet['udhaar_itm_id'];
                                        $metalType = $rowItemDet['udhaar_itm_metal_type'];
                                        $udhaarItmName = $rowItemDet['udhaar_itm_name'];
                                        $udhaarItmPieces = $rowItemDet['udhaar_itm_pieces'];
                                        $udhaarGrossWeight = $rowItemDet['udhaar_itm_gross_weight'];
                                        $udhaarGrossWeightType = $rowItemDet['udhaar_itm_gross_weight_type'];
                                        $udhaarVal = $rowItemDet['udhaar_itm_valuation'];
                                        $itemDivCount = $counter;
                                        include 'omuuiadv.php';
                                        $counter++;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr id="hrVisible" style="visibility: hidden;">
                            <td align="right" colspan="4" class="paddingTop3">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top" class="padLeft20">
                                    <tr>
                                        <td align="left" valign="top">
                                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                                <tr>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                        PAYMENT TYPE
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <div id="selAccountDiv">
                                                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                                            <tr>
                                                                                <td align="right" class="ff_calibri fs_14 brown">DR</td>
                                                                                <td align="left" class="padLeft5">
                                                                                    <div id="selAccountDiv">
                                                                                        <?php
                                                                                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                                            $selFirmId = $_SESSION['setFirmSession'];
                                                                                        } else {
                                                                                            $selFirmId = $firmId;
                                                                                        }
                                                                                        $prevFieldId = 'udhaarEMIOccurrences';
                                                                                        $nextFieldId = 'udhaarDrAccId';
                                                                                        $selAccountId = 'udhaarPayAccId';
                                                                                        if ($panelName == 'UpdateUdhaar') {
                                                                                            $selAccountName = "'Loans'";
                                                                                            $accIdSelected = $udhaar_pay_acc_id;
                                                                                        } else {
                                                                                            $selAccountName = "'Loans'";
                                                                                            $accNameSelected = 'Unsecured Loans';
                                                                                        }
                                                                                        $selAccountClass = 'input_border_grey textBoxCurve1px6rad';
                                                                                        include 'omacsalt.php';
                                                                                        ?>
                                                                                    </div>  
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                                            <tr>
                                                                                <td align="right" class="ff_calibri fs_14 brown">CR</td>
                                                                                <td align="left" class="padLeft5">
                                                                                    <div id="selAccountDiv">
                                                                                        <?php
                                                                                        if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                                                                            $selFirmId = $_SESSION['setFirmSession'];
                                                                                        } else {
                                                                                            $selFirmId = $firmId;
                                                                                        }
                                                                                        $nextFieldId = 'udhaarPayOtherInfo';
                                                                                        $prevFieldId = 'udhaarPayAccId';
                                                                                        $selAccountId = 'udhaarDrAccId';
                                                                                        if ($panelName == 'UpdateUdhaar') {
                                                                                            $selAccountName = "'Current Assets'";
                                                                                            $accIdSelected = $udhaar_dr_acc_id;
                                                                                        } else {
                                                                                            $selAccountName = "'Current Assets'";
                                                                                            $accNameSelected = 'Cash in Hand';
                                                                                        }
                                                                                        $selAccountClass = 'textLabel14CalibriGrey textBoxCurve1px6rad';
                                                                                        include 'omacsalt.php';
                                                                                        ?>
                                                                                    </div>  
                                                                                </td> 
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="left" valign="top" class="paddingLeft15">
                                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                                <tr>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                        PAYMENT OTHER INFORMATION &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="frm-r1"><textarea id="udhaarPayOtherInfo" 
                                                                                              onkeydown="javascript:if (event.keyCode == 13) {
                                                                                                          document.getElementById('udhaarOtherInfo').focus();
                                                                                                          return false;
                                                                                                      }
                                                                                                      else if (event.keyCode == 8 && this.value == '') {
                                                                                                          document.getElementById('udhaarDrAccId').focus();
                                                                                                          return false;
                                                                                                      }"
                                                                                              spellcheck="false" name="udhaarPayOtherInfo" placeholder="Payment Other Information" 
                                                                                              class="textarea" style="width:265px;height:50px;"><?php echo $udhaar_pay_other_info; ?></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="left" valign="top">
                                            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                                                <tr>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                        &nbsp;OTHER INFORMATION &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="frm-r1"><textarea id="udhaarOtherInfo" placeholder="Other Information" 
                                                                                              spellcheck="false" name="udhaarOtherInfo" 
                                                                                              onkeydown="javascript:if (event.keyCode == 13) {
                                                                                                          document.getElementById('smsTemplateId').focus();
                                                                                                          return false;
                                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                                          document.getElementById('udhaarPayOtherInfo').focus();
                                                                                                          return false;
                                                                                                      }"
                                                                                              class="textarea" style="width:265px;height:50px;"><?php echo $udhaar_other_info; ?></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="left" valign="top">
                                            <table border="0" cellpadding="2" cellspacing="1" align="left" valign="top">
                                                <tr>
                                                    <td align="left" valign="middle" class="textLabel12CalibriBrown">
                                                        &nbsp;TIME PERIOD &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="frm-r1">
                                                        <input id="smsTemplateId" name="smsTemplateId" title="Click Here To See sms Template Id!"
                                                               type="text" spellcheck="false"  class="input_border_red" placeholder="SMS TEMPLATE ID"
                                                               value="<?php echo $udhaar_sms_id; ?>"
                                                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                                           searchSMSTemplate(document.getElementById('smsTemplateId').value, event.keyCode);
                                                                       }" 
                                                               onclick="document.getElementById('smsTemplateId').value = '';
                                                                       searchSmsTempForPanelBlank();"
                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                           clearDivision('tempListDiv');
                                                                           document.getElementById('AddNewLoanSubButt').focus();
                                                                           return false;
                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                           clearDivision('tempListDiv');
                                                                           document.getElementById('udhaarOtherInfo').focus();
                                                                           return false;
                                                                       }"                        
                                                               autocomplete="off" size="16" maxlength="16" />
                                                        <div id="tempListDiv" class="cityListDivToAddGirvi"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <div class="hrGold"></div>
                </td>
            </tr>
            <tr>
                <td width="100%" align="center" class="paddingTop2">
                    <div id="addUdhaarSubButDiv">
                        <table border="0" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td>
                                    <input id="udhaarSubmit" type="submit" value="<?php
                                    if ($panelName == 'UpdateUdhaar') {
                                        echo 'UPDATE';
                                    } else {
                                        echo 'SUBMIT';
                                    }
                                    ?>" 
                                           class="frm-btn" 
                                           maxlength="30" size="15" />
                                </td>

                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right" class="paddingTop2">
                    <div class="hrGold"></div>
                </td>
            </tr>
        </table>
    </form>
     <!------Start code to Add div and also add some code @Author:ANUJA15MAR16--------------->  
    <div id="addNewUdhaarDiv">
<table border="0" cellspacing="2" cellpadding="2" width="100%">
        <?php if ($custPanelOption != 'UpdateAdvMoney') { ?>
            <tr>
                <td align="left" width="100%">
                    <div class="spaceLeft20 ff_calibri fs_14 fw_b">
                        UDHAAR DETAILS
                    </div>
                </td>
                <td align="right" valign="bottom">
                    <input type="submit" value="PAID UDHAAR DETAILS"
                           id="buttPaidUdhaarDetails" name="buttPaidUdhaarDetails" 
                           onclick="showPaidUdhaarDetailsDiv('<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                           class="frm-btn" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="custUdhaarDetailsDiv">
                        <?php
                        $udCounter = 1;
                        if ($showDiv == "Deleted" || $showDiv == "Paid") {
                            include 'omuucpud.php';
                        } else {
                            $qSelTotalUdhaarCount = "SELECT udhaar_id FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId' and udhaar_upd_sts IN ('New','Updated')";
                            $resTotalUdhaarCount = mysqli_query($conn,$qSelTotalUdhaarCount);
                            $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);

                            $qSelAllUdhaar = "SELECT * FROM udhaar where udhaar_own_id='$_SESSION[sessionOwnerId]' and udhaar_cust_id='$custId' and udhaar_upd_sts IN ('New','Updated') order by udhaar_ent_dat desc";
                            $resAllUdhaar = mysqli_query($conn,$qSelAllUdhaar);
                            $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);

                            if ($totalUdhaar <= 0) {
                                echo "<div class=" . "spaceLeft40" . "><h4> ~ Udhaar Details not available ~ </h4></div>";
                            }
                            if ($totalNextUdhaar <= 0) {
                                echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Udhaar Details are available. Go to previous Udhaar Details. ~ </h4></div>";
                            }
                            $udhaarDiv = 1;
                            $totalUdhaarAmt = 0;
                            $totalUdhaarTotalDepAmount = 0;

                            while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

                                $udhaarId = $rowAllUdhaar['udhaar_id'];
                                $udhaarAmount = $rowAllUdhaar['udhaar_amt'];
                                $udhaarCustId = $rowAllUdhaar['udhaar_cust_id'];
                                $udhaarType = $rowAllUdhaar['udhaar_type'];
                                $udhaarDOB = $rowAllUdhaar['udhaar_DOB'];
                                $udhaarHistory = $rowAllUdhaar['udhaar_history'];
                                $udhaarComm = $rowAllUdhaar['udhaar_comm'];
                                $udhaarUpdStatus = $rowAllUdhaar['udhaar_upd_sts'];
                                $udhaarOtherInfo = $rowAllUdhaar['udhaar_other_info'];
                                $udhaarJrnlId = $rowAllUdhaar['udhaar_jrnl_id']; //Udhaar Jrnl Id Added @Author:PRIYA18AUG13 
                                $firmId = $rowAllUdhaar['udhaar_firm_id'];
                                $udhaarPreSerialNum = $rowAllUdhaar['udhaar_pre_serial_num'];
                                $udhaarSerialNum = $rowAllUdhaar['udhaar_serial_num'];
                                $udhaarROI = $rowAllUdhaar['udhaar_ROI'];
                                $udhaarEMIDays = $rowAllUdhaar['udhaar_EMI_days'];
                                $udhaarEMIOccur = $rowAllUdhaar['udhaar_EMI_occurrences'];
                                $udhaarEMIStatus = $rowAllUdhaar['udhaar_EMI_status'];
                                $udhaarGdWt = $rowAllUdhaar['udhaar_gd_weight'];
                                $udhaarGdWtTyp = $rowAllUdhaar['udhaar_gd_weight_type'];
                                $udhaarSrWt = $rowAllUdhaar['udhaar_sr_weight'];
                                $udhaarSrWtTyp = $rowAllUdhaar['udhaar_sr_weight_type'];
                                $udhaarAmt = $rowAllUdhaar['udhaar_prin_amt'];
                                $udhaEMIOpt = $rowAllUdhaar['udhaar_EMI_opt'];
                                /*                                 * *******Start code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
                                if ($udhaEMIOpt == '' || $udhaEMIOpt == NULL) {
                                    $selUdhaEMIOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaEMIOpt'";
                                    $resUdhaEMIOpt = mysqli_query($conn,$selUdhaEMIOpt);
                                    $rowUdhaEMIOpt = mysqli_fetch_array($resUdhaEMIOpt);
                                    $udhaEMIOpt = $rowUdhaEMIOpt['omly_value'];
                                }
                                /*                                 * *******End code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */

                                if ($udhaarEMIDays != '' || $udhaarEMIDays != NULL) {
                                    if ($udhaEMIOpt == 'divideOrAdjustAmt') {
                                        include 'omuemdtla.php';
                                    } else {
                                        include 'omuemdtl.php';
                                    }
                                    $totalUdhaarAmt += $emiTotalAmt;
                                } else {
                                    $totalUdhaarAmt += $udhaarAmount;
                                    include 'omuudtdv.php';
                                }
                                $udCounter++;
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>

        <?php } if ($udhaarUpdStatus != 'Deleted' && $totalUdhaar > 0) { ?>
            <tr>
                <td align="left" valign="top" colspan="4" class="paddingLeft20"> 
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                                TOTAL UDHAAR : <span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarAmt); ?></span>
                            </td>
                            <!--START CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                                TOTAL DEPOSIT : TOTAL DEPOSIT AMT + TOTAL DISCOUNT : <span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarTotalDepAmount); ?></span>
                            </td>
                            <!--END CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 brown">
                                TOTAL REMAIN :<span class="ff_calibri fs_14 darkblueFont"><?php echo formatInIndianStyle($totalUdhaarAmt - $totalUdhaarTotalDepAmount); ?></span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
 <!------End code to Add div and also add some code @Author:ANUJA15MAR16--------------->  

</div>

