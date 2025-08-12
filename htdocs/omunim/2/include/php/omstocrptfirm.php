<?php
/*
 * **************************************************************************************************
 * @Description: STOCK REPORT LEDGER PANEL - FIRM FILE @Author-PRIYANKA-18JULY2020
 * **************************************************************************************************
 *
 * Created on JULY 18, 2020 02:00:58 PM 
 * **************************************************************************************
 * @FileName: ommnstocrptfirm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.9
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:18JULY2020
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.9
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
?>
<?php // Start Code for Firm  @Author-PRIYANKA-18JULY2020 ?>
<SELECT class="form-control-select-borderless" 
        id="FirmName" name="FirmName" 
        onkeydown="javascript: if (event.keyCode == 13) {
                                   document.getElementById('FromDay').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('FirmName').focus();
                                   return false;
                               }"
        onchange="searchStockReportDetails(document.getElementById('FirmName').value, '<?php echo $panelName; ?>',
                                           document.getElementById('FromDay'), document.getElementById('FromMonth'), document.getElementById('FromYear'),
                                           document.getElementById('ToDateDay'), document.getElementById('ToDateMonth'), document.getElementById('ToDateYear'));">
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
<?php // End Code for Firm  @Author-PRIYANKA-18JULY2020 ?>