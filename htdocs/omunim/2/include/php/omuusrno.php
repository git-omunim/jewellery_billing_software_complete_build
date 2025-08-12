<?php
/*
 * **************************************************************************************
 * @tutorial: udhaar serial number
 * **************************************************************************************
 * 
 * Created on Mar 19, 2014 12:26:58 PM
 *
 * @FileName: omuusrno.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
$sessionOwnerId = $_SESSION[sessionOwnerId];
$firmId = $_POST['firmNo'];
$panel = $_GET['panel'];
if ($firmId == '') {
    $firmId = $_GET['firmNo'];
}
if ($panel == 'AddNewAdvMoney') {
//    parse_str(getTableValues("SELECT admn_pre_serial_num FROM advance_money where admn_own_id='$sessionOwnerId' and admn_firm_id='$firmId' order by admn_id desc LIMIT 0,1"));
//    if ($admn_pre_serial_num == NULL || $admn_pre_serial_num == '') {
//        $admn_pre_serial_num = NULL;
//        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where (admn_pre_serial_num is NULL OR admn_pre_serial_num = '') and admn_own_id='$sessionOwnerId'"; //query changed @Author:PRIYA17FEB15
//        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//    } else {
//        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where admn_own_id='$sessionOwnerId' and admn_firm_id='$firmId'";
//        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//    }
//    $admn_serial_num = $rowSerialNo['serialNo'] + 1;
//
//    $qSelSerialNo = "SELECT admn_serial_num FROM advance_money where admn_serial_num='$admn_serial_num' and admn_pre_serial_num='$admn_pre_serial_num' and admn_own_id='$sessionOwnerId'";
//    $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//    $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//    $adMnSerialNo = $rowSerialNo['admn_serial_num'];
//
//    if ($adMnSerialNo != '' || $adMnSerialNo != NULL) {
//        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where admn_pre_serial_num='$admn_pre_serial_num' and admn_own_id='$sessionOwnerId'";
//        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
//        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//        $admn_serial_num = $rowSerialNo['serialNo'] + 1;
//    }

    $payInvoiceNo = getInvoiceNum('', 'MONEY', 'ADV MONEY', '', $firmId);
    $invArr = explode('*', $payInvoiceNo);
    $admn_pre_serial_num = $invArr[0];
    $admn_serial_num = $invArr[1];
    ?>
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <input id="advMoneyPreSerialNo" name="advMoneyPreSerialNo" placeholder="SID"
                       type="text" 
                       value="<?php echo $admn_pre_serial_num; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('advMoneySerialNo').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('advMoneyFirmId').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="border-no inputBox14CalibriReqCenter background_transparent" size="3" maxlength="3"  />
                &nbsp;-&nbsp;
                <input id="advMoneySerialNo" name="advMoneySerialNo" placeholder="SNO"
                       type="text" value="<?php echo $admn_serial_num; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('udhaarType').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('advMoneyPreSerialNo').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="border-no textLabel14CalibriReq background_transparent" size="10" maxlength="10" />
            </td>
        </tr>
    </table>
    <?php
} // Start Code to get serial number in advance metal panel @Author:SHRI16JAN15 
else if ($panel == 'AddNewAdvMetal') {
    parse_str(getTableValues("SELECT admn_pre_serial_num FROM advance_money where admn_own_id='$sessionOwnerId' and admn_firm_id='$firmId' order by admn_id desc LIMIT 0,1"));
    if ($admn_pre_serial_num == NULL || $admn_pre_serial_num == '') {
        $admn_pre_serial_num = NULL;
        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where (admn_pre_serial_num is NULL or admn_pre_serial_num = '') and admn_own_id='$sessionOwnerId'";
        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    } else {
        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where admn_own_id='$sessionOwnerId' and admn_firm_id='$firmId'";
        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    }
    $admn_serial_num = $rowSerialNo['serialNo'] + 1;

    $qSelSerialNo = "SELECT admn_serial_num FROM advance_money where admn_serial_num='$admn_serial_num' and admn_pre_serial_num='$admn_pre_serial_num' and admn_own_id='$sessionOwnerId'";
    $resSerialNo = mysqli_query($conn, $qSelSerialNo);
    $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
    $adMnSerialNo = $rowSerialNo['admn_serial_num'];

    if ($adMnSerialNo != '' || $adMnSerialNo != NULL) {
        $qSelSerialNo = "SELECT max(admn_serial_num) as serialNo FROM advance_money where admn_pre_serial_num='$admn_pre_serial_num' and admn_own_id='$sessionOwnerId'";
        $resSerialNo = mysqli_query($conn, $qSelSerialNo);
        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
        $admn_serial_num = $rowSerialNo['serialNo'] + 1;
    }
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center">
                <input id="advMetalPreSerialNo" name="advMetalPreSerialNo" placeholder="SID"
                       type="text" 
                       value="<?php echo $admn_pre_serial_num; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('advMetalSerialNo').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('advMetalFirmId').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="form-control-req-height20" size="7" maxlength="3"  />

                <input id="advMetalSerialNo" name="advMetalSerialNo" placeholder="SNO"
                       type="text" value="<?php echo $admn_serial_num; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('accountId').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('advMetalPreSerialNo').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="form-control-req-height20" size="10" maxlength="10" />
            </td>
        </tr>
    </table>
    <?php
    // End Code to get serial number in advance metal panel @Author:SHRI16JAN15
} else if ($panel == 'AddNewKitty'){
    $qSelKittyPreSerialNo = "SELECT kitty_pre_serial_num FROM kitty where kitty_own_id='$sessionOwnerId' and kitty_firm_id='$firmId' and kitty_upd_sts!='Planned Scheme' order by kitty_id desc LIMIT 0,1";
    $resKittyPreSerialNo = mysqli_query($conn, $qSelKittyPreSerialNo) or die(mysqli_error($conn));
    $rowKittyPreSerialNo = mysqli_fetch_array($resKittyPreSerialNo);
    $newKittyPreSerialNo = $rowKittyPreSerialNo['kitty_pre_serial_num'];
    if ($newKittyPreSerialNo == NULL || $newKittyPreSerialNo == '') {
        $newKittyPreSerialNo = NULL;
        $qSelKittySerialNo = "SELECT max(kitty_serial_num) as kittySerialNo FROM kitty where (kitty_pre_serial_num is NULL OR kitty_pre_serial_num = '') and kitty_own_id='$sessionOwnerId'"; 
        $resKittySerialNo = mysqli_query($conn, $qSelKittySerialNo);
        $rowKittySerialNo = mysqli_fetch_array($resKittySerialNo, MYSQLI_ASSOC);
        $newKittySerialNo = $rowKittySerialNo['girviSerialNo'] + 1;
    } else {
        $qSelKittySerialNo = "SELECT max(kitty_serial_num) as kittySerialNo FROM kitty where kitty_own_id='$sessionOwnerId' and kitty_firm_id='$firmId' and "
                . " kitty_pre_serial_num = '$newKittyPreSerialNo'"; 
        $resKittySerialNo = mysqli_query($conn, $qSelKittySerialNo);
        $rowKittySerialNo = mysqli_fetch_array($resKittySerialNo, MYSQLI_ASSOC);
    }
    $newKittySerialNo = $rowKittySerialNo['kittySerialNo'] + 1;
?>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <input id="kittyPreSerialNo" name="kittyPreSerialNo" placeholder="SID"
                   type="text" 
                   value="<?php echo $newKittyPreSerialNo; ?>" 
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('kittySerialNo').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('kittyFirmId').focus();
                               return false;
                           }"

                   spellcheck="false" class="border-no inputBox14CalibriReqCenter background_transparent" size="3" maxlength="3"  
                   <?php if ($panelName == 'UpdateKitty' || $staffId != '') { ?>readonly="true"<?php } ?> />
            &nbsp;-&nbsp;
            <input id="kittySerialNo" name="kittySerialNo" placeholder="SNO"
                   type="text" value="<?php echo $newKittySerialNo; ?>"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('kittyGiftItem').focus();
                               return false;
                           } else if (event.keyCode == 8 && this.value == '') {
                               document.getElementById('kittyPreSerialNo').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                   spellcheck="false" class="border-no textLabel14CalibriReq background_transparent" size="10" maxlength="10" 
                   <?php if ($panelName == 'UpdateKitty' || $staffId != '') { ?>readonly="true"<?php } ?> />
        </td>
    </tr>
</table>
<?php
}else {
//    parse_str(getTableValues("SELECT udhaar_pre_serial_num FROM udhaar where udhaar_own_id='$sessionOwnerId' and udhaar_firm_id='$firmId' order by UNIX_TIMESTAMP(udhaar_ent_dat) desc LIMIT 0,1"));
//    if ($udhaar_pre_serial_num == NULL || $udhaar_pre_serial_num == '') {
//        $udhaar_pre_serial_num = NULL;
//        $qSelGirviSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where (udhaar_pre_serial_num is NULL OR udhaar_pre_serial_num = '') and udhaar_own_id='$sessionOwnerId'";//query changed @Author:PRIYA17FEB15
//        $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
//        $rowGirviSerialNo = mysqli_fetch_array($resGirviSerialNo, MYSQLI_ASSOC);
//    } else {
//        $qSelGirviSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where udhaar_own_id='$sessionOwnerId' and udhaar_firm_id='$firmId'";
//        $resGirviSerialNo = mysqli_query($conn,$qSelGirviSerialNo);
//        $rowGirviSerialNo = mysqli_fetch_array($resGirviSerialNo, MYSQLI_ASSOC);
//    }
//    $udhaarSerialNo = $rowGirviSerialNo['udhaarSerialNo'] + 1;
//    $qSelSerialNo = "SELECT udhaar_serial_num FROM udhaar where udhaar_serial_num='$udhaarSerialNo' and udhaar_pre_serial_num='$udhaar_pre_serial_num' and udhaar_own_id='$sessionOwnerId'";
//    $resSerialNo = mysqli_query($conn,$qSelSerialNo);
//    $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//    $uSerialNo = $rowSerialNo['udhaar_serial_num'];
//
//    if ($uSerialNo != '' || $uSerialNo != NULL) {
//        $qSelSerialNo = "SELECT max(udhaar_serial_num) as udhaarSerialNo FROM udhaar where udhaar_pre_serial_num='$udhaar_pre_serial_num' and udhaar_own_id='$sessionOwnerId'";
//        $resSerialNo = mysqli_query($conn,$qSelSerialNo);
//        $rowSerialNo = mysqli_fetch_array($resSerialNo, MYSQLI_ASSOC);
//        $udhaarSerialNo = $rowSerialNo['udhaarSerialNo'] + 1;
//    }
    $payInvoiceNo = getInvoiceNum('', 'udhaar', 'UDHAAR', '', $firmId);
    $invArr = explode('*', $payInvoiceNo);
    $udhaar_pre_serial_num = $invArr[0];
    $udhaarSerialNo = $invArr[1];
    ?>
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <input id="udhaarPreSerialNo" name="udhaarPreSerialNo" placeholder="SID"
                       type="text" value="<?php echo $udhaar_pre_serial_num; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('udhaarSerialNo').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('udhharFirmId').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="border-no textLabel14CalibriGreyMiddle background_transparent" size="3" maxlength="3"  />
                &nbsp;-&nbsp;
                <input id="udhaarSerialNo" name="udhaarSerialNo" placeholder="SNO"
                       type="text" value="<?php echo $udhaarSerialNo; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                                       document.getElementById('udhaarType').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       document.getElementById('udhaarPreSerialNo').focus();
                                       return false;
                                   }"
                       spellcheck="false" class="border-no textLabel14CalibriGrey background_transparent" size="10" maxlength="10" />
            </td>
        </tr>
    </table>
<?php } ?>