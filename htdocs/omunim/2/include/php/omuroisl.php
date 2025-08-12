<?php

/*
 * **************************************************************************************
 * @tutorial: roi select
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 6:00:47 PM
 *
 * @FileName: omuroisl.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$ROIValue = trim($_POST['ROIValue']);
$intType = trim($_POST['interestType']);
$girviId = trim($_POST['girviId']);
$custId = trim($_POST['custId']);
$panelName = trim($_POST['panelName']);
$girviDOB = trim($_POST['girviDOB']);
$girviFirmId = trim($_POST['girviFirmId']);
$girviSerialNum = trim($_POST['girviSerialNum']);
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
    //to check exact roi value is present or not @AUTHOR: SANDY04FEB14
    $checkForExactMatch = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$intType' and roi_value LIKE '$ROIValue'";
    $resForExactMatch = mysqli_query($conn,$checkForExactMatch);
    $noOfRows = mysqli_num_rows($resForExactMatch);
    //to check exact roi value is present or not @AUTHOR: SANDY04FEB14
    ?>
    <?php if ($totalROI > 0) { ?>
        <!-----Start code to add var in function @Author:PRIYA02JUL14------------>
        <SELECT class="roiListDivToAddroiSelect" id="roiListToAddRoiSelect" name="roiListToAddRoiSelect" 
                <?php if ($panelName == 'GirviInfoPanel' || $panelName == 'GirviUpdate' || $panelName == 'mlLoanInfo' || $panelName == 'mlLoanUpdate') { ?>
                    onkeypress="if (event.keyCode == 13) {
                                        getROIValById('<?php echo $documentRoot; ?>', this.value, '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $panelName; ?>',
                                                '<?php echo $intType; ?>', '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');
                                    }"
                    onclick="getROIValById('<?php echo $documentRoot; ?>', this.value, '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $panelName; ?>',
                                            '<?php echo $intType; ?>', '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');"


                <?php } else { ?>
                    onclick="getROIValById('<?php echo $documentRoot; ?>', this.value, '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $panelName; ?>',
                                            '<?php echo $intType; ?>', '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');
                                    document.getElementById('roihiddn').value = 'visible';
                                    document.getElementById('girviFirmId').focus();"
                <?php } ?>
                onblur="keyCodeForExactMatchCount = parseInt('<?php echo $noOfRows; ?>');
                            keyCodeForRoiValueOptionCount = parseInt('<?php echo $totalROI; ?>');//searchRoiForPanelBlank();"
                multiple="multiple" size="8">
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
        <!-----End code to add var in function @Author:PRIYA02JUL14------------>
    <?php } ?>
</h5>