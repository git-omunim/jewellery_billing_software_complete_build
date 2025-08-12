<?php

/*
 * **************************************************************************************
 * @tutorial: roi select
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 6:04:54 PM
 *
 * @FileName: omroisid.php
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
include_once 'ommpfndv.php';
?>
<?php
$custId = $_GET['custId'];
$girviId = $_GET['girviId'];
$ROIId = $_GET['roiId'];
$roiOption = $_GET['intType'];
$panelName = $_GET['panelName'];
$girviDOB = $_GET['girviDOB'];
$girviFirmId = $_GET['girviFirmId'];
$girviSerialNum = $_GET['girviSerialNum'];
$omPanelDiv = $panelName;
parse_str(getTableValues("SELECT roi_id,roi_value,iroi_value FROM roi where roi_id='$ROIId'"));
if ($_SESSION['sessionIgenType'] == $globalOwnIPass)
    $ROIVal = $iroi_value;
else
    $ROIVal = $roi_value;
?>
<input type="hidden" id="roihiddn" name="roihiddn" value="">
<input type="hidden" id="selROI" name="selROI" value="<?php echo $ROIId; ?>">
<!-----Start code to add var in function @Author:PRIYA02JUL14------------>
<?php if ($omPanelDiv == 'AddUdhaarEMI') { ?>
    <INPUT id="selROIValue" type ="text" NAME="selROIValue"  value="<?php echo $ROIVal; ?>" placeholder="<?php echo $ROIVal; ?>"
           <?php if ($access == 'No') { ?> onclick="event.cancelBubble = true;" <?php } ?>
           onkeyup = " if (event.keyCode == 8 && this.value == '') {
                           searchRoiForPanelBlank();
                           return false;
                       }
                       if (event.keyCode != 9 && event.keyCode != 13) {
                           document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                           document.getElementById('roihiddn').value = 'visible';
                           searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                   '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');
                       }"
           onclick = "this.value = '';
                       searchRoiForPanelBlank();
                       document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                       document.getElementById('roihiddn').value = 'visible';
                       searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                               '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');"
           onblur="if (document.getElementById('roihiddn').value != 'visible')
                           document.getElementById('roiListDivToAddROI').style.visibility = 'hidden';
                       if (document.getElementById('selROIValue').value != '') {
                           document.getElementById('selROIValue').value = this.value;
                       } else
                           document.getElementById('selROIValue').value = '<?php echo $ROIVal; ?>';"
           onkeydown="javascript: if (event.keyCode == 13) {
                           searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                           document.getElementById('<?php echo $nextFieldId; ?>').focus();
                           return false;
                       } else if (event.keyCode == 8 && this.value == '') {
                           searchRoiForFocusPanelBlank('<?php echo $omPanelDiv; ?>', event.keyCode);
                           document.getElementById('<?php echo $nextFieldId; ?>').focus();
                           return false;
                       }"
           onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
           autocomplete = "off" spellcheck = "false" class = "textLabel14CalibriBlackMiddle border-no" size = "3" maxlength = "15" style="width:100%;height:30px;"/>
       <?php } else { ?>
    <INPUT id="selROIValue" type ="text" NAME="selROIValue"  value="<?php echo $ROIVal; ?>" placeholder="<?php echo $ROIVal; ?>"
           <?php if ($access == 'No') { ?> onclick="event.cancelBubble = true;" <?php } ?>
           onkeyup = "if (event.keyCode == 8 && this.value == '') {
                           searchRoiForPanelBlank();
                           return false;
                       }
                       if (event.keyCode != 9 && event.keyCode != 13) {
                           searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                                   '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');
                       }
                       if (event.keyCode == 13) {
                           if (document.getElementById('roihiddn').value == '') {
                               document.getElementById('roihiddn').value = 'YES';
                           }
                           if (document.getElementById('roihiddn').value == 'YES') {
                               addNewRoi('<?php echo $documentRoot; ?>', document.getElementById('selROIValue').value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>');// return false;
                               document.getElementById('roihiddn').value = 'NO';
                           }
                       }"
           onclick = "this.value = '';
                       searchRoiForPanelBlank();
                       document.getElementById('roiListDivToAddROI').style.visibility = 'visible';
                       document.getElementById('roihiddn').value = 'visible';
                       searchROI(this.value, '<?php echo $roiOption; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $omPanelDiv; ?>', event.keyCode,
                               '<?php echo $girviDOB; ?>', '<?php echo $girviFirmId; ?>', '<?php echo $girviSerialNum; ?>');"
           onblur="if (document.getElementById('selROIValue').value != '') {
                           document.getElementById('selROIValue').value = this.value;
                       } else
                           document.getElementById('selROIValue').value = '<?php echo $ROIVal; ?>';
                       document.getElementById('roihiddn').value = 'NO';"
           onkeydown="javascript: if (event.keyCode == 13) {
                           searchRoiForPanelBlank();
                       } else if (event.keyCode == 8 && this.value == '') {
                           searchRoiForPanelBlank();
                       }"
           onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
           autocomplete = "off" spellcheck = "false" class = "lgn-txtfield16black-without-borderAndBackground" size = "3" maxlength = "15" style="width:100%;height:30px;"/>
       <?php } ?>
<!-----End code to add var in function @Author:PRIYA02JUL14------------>
<div id = "roiListDivToAddROI" class ="itemListDivToAddStock"></div>