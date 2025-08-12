<?php

/*
 * **************************************************************************************
 * @tutorial: UDHAAR ROI SELECT LIST FILE
 * **************************************************************************************
 * 
 * Created on 21 Dec, 2019 7:15:31 PM
 *
 * @FileName: omuroisl_2_6_106.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen Technologies
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
?>
<?php
$ROIValue = trim($_POST['ROIValue']);
$intType = trim($_POST['interestType']);
$panelName = trim($_POST['panelName']);
$udhaarFirmId = trim($_POST['udhaarFirmId']);
if ($intType == 'Annually') {
    $intType = 'Annually';
} else {
    $intType = 'Monthly';
}
?>
<h5>
    <?php
    if ($ROIValue == NULL || $ROIValue == '' || $ROIValue == 0) {
        $qSelectROI = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$intType'";
    } else {
        if ($_SESSION['sessionIgenType'] == $globalOwnIPass)
            $qSelectROI = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$intType' and iroi_value LIKE '$ROIValue%'"; //To display data in this form
        else
            $qSelectROI = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$intType' and roi_value LIKE '$ROIValue%'"; //To display data in this form
    }
    $resultROI = mysqli_query($conn,$qSelectROI);
    $totalROI = mysqli_num_rows($resultROI);
    ?>
    <?php if ($totalROI > 0) { ?>
        <SELECT class="roiListDivToAddroiSelect" id="roiListToAddRoiSelect" name="roiListToAddRoiSelect" 
                    onclick="getROIValById('<?php echo $documentRoot; ?>', this.value, '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $panelName; ?>',
                                            '<?php echo $intType; ?>', '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');
                                searchRoiForPanelBlank();" multiple="multiple" size="8">
                    <?php
                    while ($rowROI = mysqli_fetch_array($resultROI, MYSQLI_ASSOC)) {
                        if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                            echo "<OPTION  VALUE=" . "\"{$rowROI['roi_id']}\"" . " class=" . "\"textLabel14Calibri\"" . " >{$rowROI['roi_value']}</OPTION>";
                        } else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            echo "<OPTION  VALUE=" . "\"{$rowROI['roi_id']}\"" . " class=" . "\"textLabel14Calibri\"" . " >{$rowROI['iroi_value']}</OPTION>";
                        }
                    }
                    ?>
        </select>
    <?php } ?>
</h5>