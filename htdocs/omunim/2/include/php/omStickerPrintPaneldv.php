<?php
/*
 * **************************************************************************************
 * @tutorial: STICKER PRINT PANEL DIV @PRIYANKA-29AUG2019
 * **************************************************************************************
 * 
 * Created on AUG 29, 2019 12:50:35 PM
 *
 * @FileName: omStickerPrintPaneldv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
include_once 'ommpfunc.php';
include_once 'omStickerFunc.php';
?>
<?php
if ($custId == '' || $custId == NULL) {
    //
    if ($_REQUEST['custId'] != '' && 
        $_REQUEST['custId'] != NULL && 
        $_REQUEST['custId'] != 'undefined') {
        $custId = $_GET['custId'];
    }
    //
} 
?>
<style>
     .table24L{
           width: 100%;
        }
    @media print{
        .table24L{
           width: 55mm;
           height: 20.7mm;
           margin: 0mm;
        }
    }
</style>

<table border="0" cellspacing="0" cellpadding="0" class="paddingLeft5 table24L">
    <?php
    //
    $qSelAllUser = "SELECT * FROM user WHERE user_id='$custId' and user_owner_id='$_SESSION[sessionOwnerId]' ORDER BY user_id DESC";
    $resAllUser = mysqli_query($conn, $qSelAllUser) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllUser);
    $rowAllUser = mysqli_fetch_array($resAllUser, MYSQLI_ASSOC);
    //
    //firm, custFname, custLname, custFather, custAdd, custMob, custPincode, custEmail
    //
    $custFname = om_strtoupper($rowAllUser['user_fname']);
    //
    $custLname = om_strtoupper($rowAllUser['user_lname']);
    //
    $fatherOrSpouseName = $rowAllUser['user_father_name'];
    //
    $checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
    //
    if($checkFatherOrSpouse == 'W'){
        $labelFatherOrSpouse = "W/o";
    }
    //
    if($checkFatherOrSpouse == 'S'){
        $labelFatherOrSpouse = "S/o";
    }
    //
    if($checkFatherOrSpouse == 'D'){
        $labelFatherOrSpouse = "D/o";
    }
    //
    if($checkFatherOrSpouse == 'C'){
        $labelFatherOrSpouse = "C/o";
    }
    //    
    $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
    $custFather = om_strtoupper($fatherOrSpouseName);
    //
    $custAdd = om_strtoupper($rowAllUser['user_add']);
    //
    if ($custAdd == '' || $custAdd == NULL) {
        $custAdd = om_strtoupper($rowAllUser['user_city'] . ' ' . $rowAllUser['user_state']);
    }
    //
    $custMob = $rowAllUser['user_mobile'];
    //
    $custPincode = $rowAllUser['user_pincode']; 
    //
    $custEmail = $rowAllUser['user_email']; 
    //
    $omLayoutBCSize = '24LBCSIZE';
    $barCodeSize = updateOptionValue($omLayoutBCSize, '', 'selValue', '');
    //
    if ($barCodeSize == 'large' || $barCodeSize == 'size') {
        //
        //$custFname = substr($custFname, 0, 26);
        //$custLname = substr($custLname, 0, 26);
        //$custFather = substr($custFather, 0, 26);
        //$custAdd = substr($custAdd, 0, 26);
        //
    } else if ($barCodeSize == 'medium') {
        //
        $custFname = substr($custFname, 0, 24);
        $custLname = substr($custLname, 0, 24);
        $custFather = substr($custFather, 0, 24);
        $custAdd = substr($custAdd, 0, 24);
        //
    } else if ($barCodeSize == 'small') {
        //
        $custFname = substr($custFname, 0, 22);
        $custLname = substr($custLname, 0, 22);
        $custFather = substr($custFather, 0, 22);
        $custAdd = substr($custAdd, 0, 22);
        //
    }
    //
    //
    $firmId = $rowAllUser['user_firm_id'];
    //
    parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_own_id='$_SESSION[sessionOwnerId]' "
                           . "AND firm_id='$firmId'"));
    //
    $firm = $firm_name;
    //
    //
    $valuePresentInTable = updateOptionValue('stickerOption1', 'firm', 'selValue', '');
    //
    if ($valuePresentInTable == '') {
        $valuePresentInTable = updateOptionValue('stickerOption1', 'firm', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption1', 'firm', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption2', 'custFname', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption3', 'custLname', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption4', 'custFather', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption5', 'custAdd', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption6', 'custMob', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption7', 'custPincode', 'selValue', 'StickerPrintPanel');
        updateOptionValue('stickerOption8', 'custEmail', 'selValue', 'StickerPrintPanel');
    }
    //
    $valueMobPresentInTable = updateOptionValue('stickerOption6', 'custMob', 'selValue', '');
    //
    if ($valueMobPresentInTable == '') {
        updateOptionValue('stickerOption6', 'custMob', 'selValue', 'StickerPrintPanel');
    }
    //
    ?>
    <tr>
        <td align="left" style="padding-top: <?php echo $padTop; ?>mm;">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" class="block24LText14"  title="<?php echo $firm; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption1'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr rowspan="2">
        <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" class="block24LText14"  title="<?php echo $custFname; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption2'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>
                    <td align="left" class="block24LText14"  title="<?php echo $custLname; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption3'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>
                    <td align="left" class="block24LText14" title="<?php echo $custFather; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption4'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr></tr>
    
    <tr rowspan="2">
        <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" class="block24LText12" title="<?php echo $custAdd; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption5'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr></tr>
    
    <tr>
        <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" class="block24LText12 paddingRight10" title="<?php echo $custMob; ?>">
                            <?php
                            parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption6'"));
                            callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                            ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
        <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="left" class="block24LText12"  title="<?php echo $custPincode; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption7'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>

                    <td align="right" class="block24LText12 paddingRight10"  title="<?php echo $custEmail; ?>">
                        <?php
                        parse_str(getTableValues("SELECT omin_value FROM omindicators where omin_option = 'stickerOption8'"));
                        callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail);
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>    
</table>