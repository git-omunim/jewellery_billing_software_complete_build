<?php
/*
 * *************************************************************************************************
 * @tutorial: STOCK MANAGEMENT BY FIRM FIELD FILE @AUTHOR:PRIYANKA-26NOV2021
 * *************************************************************************************************
 * 
 * Created on 26 NOV, 2021 04:30:00 PM
 *
 * @FileName: omStockManagementByCounterFirm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: @AUTHOR:PRIYANKA-26NOV2021
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
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'conversions.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//
//**************************************************************************************
// Start code to get selected firm details @AUTHOR:PRIYANKA-26NOV2021
//**************************************************************************************
//
//
if ($inputStyleFirm === '' || $inputStyleFirm === NULL) {
    //
    $inputStyleFirm = 'width:100%; height:30px; color:#AA6600;font-weight:600; text-align:center; font-size: 16px !important; '
                    . 'border-color:#FFDBA4;background-color: #FFDBA4; border-radius: 3px !important;padding-left:3px;';
    //
}
//
//
?>
<SELECT class="form-control-select" style="<?php echo $inputStyleFirm; ?>"
        id="FirmName" name="FirmName" 
        onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('FromDay').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('FirmName').focus();
                                   return false;
                               }"
        onchange="getStockTransferSelectedOptionsFunc(document.getElementById('productCounter').value, document.getElementById('selectedStaff').value, 
                                                      document.getElementById('FirmName').value, '<?php echo $stockTransferNavPanelName; ?>','');">
    <OPTION  VALUE="" class="textLabel14CalibriGrey">ALL FIRMS</OPTION>
<?php
    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        //
        $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where "
                     . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
        //
        $resPerFirm = mysqli_query($conn,$qSelPerFirm);
        //
        while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
            //
            if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                $firmSelected = "selected";
            }
            //
            if ($rowPerFirm['firm_type'] == "Public") {
                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
            } else {
                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
            }
            //
            $firmSelected = "";
            //
        }
        //
    } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
        //
        $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type = 'Public' and "
                     . "firm_own_id = '$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
        //
        $resPerFirm = mysqli_query($conn,$qSelPerFirm);
        //
        while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
            //
            if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                $firmSelected = "selected";
            }
            //
            if ($rowPerFirm['firm_type'] == "Public") {
                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
            } else {
                echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"selectWithoutArrow_calibri_14\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
            }
            //
            $firmSelected = "";
            //
        }
    }
?>
</SELECT>
<?php 
// 
// 
//**************************************************************************************
//* End code to get selected firm details @AUTHOR:PRIYANKA-26NOV2021
//**************************************************************************************
//
//
?>