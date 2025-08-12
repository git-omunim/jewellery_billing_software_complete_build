<?php
/*
 * **************************************************************************************
 * @tutorial: STICKER FUNCTION @PRIYANKA-29AUG2019
 * **************************************************************************************
 * 
 * Created on AUG 29, 2019 01:15:42 PM
 *
 * @FileName: omStickerFunc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
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
error_reporting(E_ERROR);
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//echo 'docRoot == '.$documentRootBSlash;
//
function callStickerFunc($id, $value) {
    ?>
    <td>
        <div id="itemTypeDiv" class="selectStyled">
            <select id="<?php echo $id; ?>" name="<?php echo $id; ?>" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('addStockItemPreId').focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('accountId').focus();
                                    return false;
                                }"
                    class="textLabel14CalibriReq"
                    onchange="getUserStickerField('<?php echo $id; ?>', this.value);">
                        <?php
                        $bcSeriesSel = array(none, firm, custFname, custLname, custFather, custAdd, custMob, custPincode, custEmail);
                        for ($i = 0; $i <= 10; $i++)
                            if ($bcSeriesSel[$i] == $value)
                                $optionSeriesSel[$i] = 'selected';
                        ?>
                <option value="none" <?php echo $optionSeriesSel[0]; ?>>none</option>
                <option value="firm" <?php echo $optionSeriesSel[1]; ?>>firm</option>
                <option value="custFname" <?php echo $optionSeriesSel[2]; ?>>custFname</option>
                <option value="custLname" <?php echo $optionSeriesSel[3]; ?>>custLname</option>
                <option value="custFather" <?php echo $optionSeriesSel[4]; ?>>custFather</option>
                <option value="custAdd" <?php echo $optionSeriesSel[5]; ?>>custAdd</option>
                <option value="custMob" <?php echo $optionSeriesSel[6]; ?>>custMob</option>
                <option value="custPincode" <?php echo $optionSeriesSel[7]; ?>>custPincode</option>         
                <option value="custEmail" <?php echo $optionSeriesSel[8]; ?>>custEmail</option>  
            </select>
        </div>
    </td>
    <?php
}
//
function callStickerSwitchCase($omin_value, $firm, $custFname, $custLname, $custFather, $custAdd, $custMob, $custPincode, $custEmail) {
    switch ($omin_value) {
        case 'none';
            echo '';
            break;
        case 'firm';
            echo om_strtoupper($firm);
            break;
        case 'custFname';
            echo om_strtoupper($custFname);
            break;
        case 'custLname';
            echo om_strtoupper($custLname);
            break;
        case 'custFather';
            echo om_strtoupper($custFather);
            break;
        case 'custAdd';
            echo om_strtoupper($custAdd);
            break;
        case 'custMob';
            echo $custMob;
            break;
        case 'custPincode';
            echo $custPincode;
            break;
        case 'custEmail';
            echo $custEmail;
            break;
    }
}
?>