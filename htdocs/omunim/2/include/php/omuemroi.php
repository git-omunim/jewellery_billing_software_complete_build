<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 1:43:05 PM
 *
 * @FileName: omuemroi.php
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
//change in file @AUTHOR: SANDY29JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<div id="ROIMonthly">
    <?php
    if ($ROIVal == '' || $ROIVal == NULL) {
        $ROIVal = $_POST['ROIValue'];
    }
    if ($ROIVal == '' || $ROIVal == NULL) {
        $ROIVal = $_GET['ROIValue'];
    }
    $roiOption = $_GET['roiOption'];
    if ($roiOption == '' || $roiOption == NULL) {
        $roiOption = 'Monthly';
    }
    if ($omPanelDiv == '')
        $omPanelDiv = trim($_GET['omPanelDiv']);

    if ($ROIVal != '' && $ROIVal != NULL && $ROIVal != 0) {
        $resultROI = mysqli_query($conn,"SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$roiOption' and roi_id = '$ROIVal'");
        $totalROI = mysqli_num_rows($resultROI);
    }
    if ($totalROI == 0) {
        $resultROI = mysqli_query($conn,"SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='$roiOption' and roi_default = 'checked'");
        $rowROI = mysqli_fetch_array($resultROI);
        $ROIId = $rowROI['roi_id'];
        if ($_SESSION['sessionIgenType'] == $globalOwnIPass)
            $ROIVal = $rowROI['iroi_value'];
        else
            $ROIVal = $rowROI['roi_value'];
    }if ($panelName == 'UpdateUdhaar') {
        $ROIId = $udhaar_ROI_Id;
        $ROIVal = $udhaar_ROI;
    }
    ?>
    <table border="0" cellpadding="2" cellspacing="2">
        <td align="left">
            <div id="roiSelDiv">
                <input type="hidden" id="roihiddn" name="roihiddn" value="">
                <input type="hidden" id="selROI" name="selROI" value="<?php echo $ROIId; ?>">
                <?php if ($omPanelDiv == 'AddUdhaarEMI') { ?> 
                    <INPUT id="selROIValue" type ="text" NAME="selROIValue"  value="<?php echo $ROIVal; ?>" placeholder="ROI"
                           <?php if ($access == 'No') { ?> onclick="event.cancelBubble = true;" <?php } ?>
                           onkeyup = "if (event.keyCode == 40 && document.getElementById('selROIValue').value == '') {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                           document.getElementById('roihiddn').value = 'visible';
                                           searchROI('', '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                                   '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                       }
                                       if (event.keyCode == 40 && document.getElementById('roihiddn').value == 'visible') {
                                           keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
                                           keyCodeForRoiValueOption = keyCodeForRoiValueOption + 1;
                                           if (keyCodeForRoiValueOption >= keyCodeForRoiValueOptionCount) {
                                               keyCodeForRoiValueOption = keyCodeForRoiValueOptionCount - 1;
                                           }
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionPrev].selected = false;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                           document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                           document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                       }
                                       if (event.keyCode == 38 && document.getElementById('roihiddn').value == 'visible') {
                                           keyCodeForRoiValueOptionNext = keyCodeForRoiValueOption;
                                           keyCodeForRoiValueOption = keyCodeForRoiValueOption - 1;
                                           if (keyCodeForRoiValueOption < 0)
                                               keyCodeForRoiValueOption = 0;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionNext].selected = false;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                           document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                           document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                       }
                                       if (event.keyCode != 8 && event.keyCode != 9 && event.keyCode != 13 && event.keyCode != 38 && event.keyCode != 40) {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                           document.getElementById('roihiddn').value = 'visible';
                                           searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                                   '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');
                                       }"
                           onclick = "this.value = '';
                                       searchRoiForPanelBlank();
                                       document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                       document.getElementById('roihiddn').value = 'visible';
                                       searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                               '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');"
                           onblur="if (document.getElementById('roihiddn').value != 'visible') {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'hidden';
                                       }
                                       if (document.getElementById('selROIValue').value != '' && document.getElementById('roihiddn').value != 'visible') {
                                           document.getElementById('selROIValue').value = <?php echo $ROIVal; ?>;
                                       }"
                           onkeydown="if (event.keyCode == 13) { //change in block @AUTHOR: SANDY04FEB14
                                           var keyCodeForExactMatchCount;//var added @Author:PRIYA22FEB14
                                           if (keyCodeForExactMatchCount >= 1) {
                                               keyCodeForExactMatchCount = 0;
                                               document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                               document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                               searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                                               document.getElementById('<?php echo $nextFieldId; ?>').focus();
                                               return false;
                                           } else {
                                               searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                                               document.getElementById('<?php echo $nextFieldId; ?>').focus();
                                               return false;
                                           }
                                       }
                                       if (event.keyCode == 8 && this.value == '') {
                                           searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                                           document.getElementById('<?php echo $prevFieldId; ?>').focus();
                                           return false;
                                       }"
                           onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                           autocomplete = "off" spellcheck = "false" class = "textLabel14CalibriBlackMiddle border-no background_transparent" size = "3" maxlength = "15" />
                       <?php } else { ?>
                    <INPUT id="selROIValue" type ="text" NAME="selROIValue"  value="<?php echo $ROIVal; ?>" placeholder="<?php echo $ROIVal; ?>"
                           <?php if ($access == 'No') { ?> onclick="event.cancelBubble = true;" <?php } ?>
                           onkeyup = "if (event.keyCode == 40 && document.getElementById('selROIValue').value == '') {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                           document.getElementById('roihiddn').value = 'visible';
                                           searchROI('', '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                                   '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                       }
                                       if (event.keyCode == 40 && document.getElementById('roihiddn').value == 'visible') {
                                           keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
                                           keyCodeForRoiValueOption = keyCodeForRoiValueOption + 1;
                                           if (keyCodeForRoiValueOption >= keyCodeForRoiValueOptionCount) {
                                               keyCodeForRoiValueOption = keyCodeForRoiValueOptionCount - 1;
                                           }
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionPrev].selected = false;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                           document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                           document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                       }
                                       if (event.keyCode == 38 && document.getElementById('roihiddn').value == 'visible') {
                                           keyCodeForRoiValueOptionNext = keyCodeForRoiValueOption;
                                           keyCodeForRoiValueOption = keyCodeForRoiValueOption - 1;
                                           if (keyCodeForRoiValueOption < 0)
                                               keyCodeForRoiValueOption = 0;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionNext].selected = false;
                                           document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
                                           document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                           document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                       }
                                       if (event.keyCode != 8 && event.keyCode != 9 && event.keyCode != 13 && event.keyCode != 38 && event.keyCode != 40) {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                           document.getElementById('roihiddn').value = 'visible';
                                           searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                                   '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');
                                       }"
                           onclick = "this.value = '';
                                       searchRoiForPanelBlank();
                                       document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                                       document.getElementById('roihiddn').value = 'visible';
                                       searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                               '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>');" 
                           onblur="if (document.getElementById('roihiddn').value != 'visible') {
                                           document.getElementById('roiListDivToAddROI').style.visibility = 'hidden';
                                       }
                                       if (document.getElementById('selROIValue').value != '' && document.getElementById('roihiddn').value != 'visible') {
                                           document.getElementById('selROIValue').value = <?php echo $ROIVal; ?>;
                                       }"
                           onkeydown="if (event.keyCode == 13) {//change in block @AUTHOR: SANDY17JAN14
                                           document.getElementById('selROIValue').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].text;
                                           document.getElementById('selROI').value = document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].value;
                                           updateRoi('<?php echo $documentRoot; ?>', document.getElementById('selROI').value, '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>',
                                                   '<?php echo $girviNewDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviPreSerialNum . $girviSerialNum; ?>', '<?php echo $roiOption; ?>');
                                           searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                                           document.getElementById('<?php echo $nextFieldId; ?>').focus();
                                           return false;
                                       }
                                       if (event.keyCode == 8 && this.value == '') {
                                           searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                                           document.getElementById('<?php echo $prevFieldId; ?>').focus();
                                           return false;
                                       }"
                           onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                           autocomplete = "off" spellcheck = "false" class = "textLabel16CalibriMiddle border-no background_transparent" size = "3" maxlength = "15" />
                       <?php } ?>
                <!-----End code to add var in function @Author:PRIYA02JUL14------------>
                <div id = "roiListDivToAddROI" class ="itemListDivToAddStock"></div>
            </div>
        </td>
        <td align="left" width="1px">%</td>
    </table>
</div>
