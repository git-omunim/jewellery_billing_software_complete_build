<?php
/*
 * **************************************************************************************
 * @tutorial: Transfer Girvi ROI Anually Options
 * **************************************************************************************
 *
 * Created on Mar 17, 2013 4:43:35 PM
 *
 * @FileName: orggtroa.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
<div id="ROIAnually">
    <!-- START Select right value PHP code --> 
    <?php
    if ($ROIValue == NULL || $ROIValue == '') {
        $ROIValue = trim($_POST['ROIValue']);
    }
    $optChecked = '';

    //Start Code to get ROI Value
    $qSelROI = "SELECT troi_value,tiroi_value FROM troi where troi_id='$ROIValue'";
    $resROI = mysqli_query($conn,$qSelROI);
    $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
    if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
        $ROIValue = $rowROI['tiroi_value'];
    } else {
        $ROIValue = $rowROI['troi_value'];
    }
    //End Code to get ROI Value 
//    if ($ROIValue) { line commented @Author:PRIYA16MAR15
    if ($ROIValue != '' || $ROIValue != 0) { // line added @Author:PRIYA16MAR15
        //$selAnuallyROI = $ROIValue;
        $princAmount = trim($_POST['princAmount']);
        $girviNewDOB = trim($_POST['girviDate']);
        $girviType = trim($_POST['girviType']);
        $girviId = trim($_POST['girviId']);
        $custId = trim($_POST['custId']);
        $girviUpdSts = trim($_POST['girviStatus']);
    }
    //Start Code to check Girvi Release Details Option
    if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
        $grvRelPayDetails = trim($_POST['grvRelPayDetails']);
    }
    if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
        $grvRelPayDetails = trim($_GET['grvRelPayDetails']);
    }
    //End Code to check Girvi Release Details Option
    ?>
    <table border="0" cellpadding="2" cellspacing="2">
        <tr align="left">
            <td align="left">
                <h5>
                    <?php
                    $qSelectROI = "SELECT troi_id,troi_value,tiroi_value,troi_default FROM troi where troi_type='Annually'"; //To display data in this form
                    $resultROI = mysqli_query($conn,$qSelectROI);
                    while ($rowROI = mysqli_fetch_array($resultROI, MYSQLI_ASSOC)) {

                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            if ($ROIValue == $rowROI['tiroi_value'] || $ROI == $rowROI['tiroi_value']) {
                                $optChecked = 'checked';
                            }
                        } else {
                            if ($ROIValue == $rowROI['troi_value'] || $ROI == $rowROI['troi_value']) {
                                $optChecked = 'checked';
                            }
                        }
                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            ?>
                            <INPUT id="selROI" TYPE="RADIO" NAME="selROI" class="lgn-field-without-order" 
                                   onclick="changeROIValue('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this.value, '<?php echo $princAmount ?>', document.getElementById('gtransInterestType'), '<?php echo $girviNewDOB; ?>', document.getElementById('girviTotAmtDiv'), '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>', '<?php echo $omPanelDiv; ?>');"
                                   VALUE="<?php echo "{$rowROI['troi_id']}"; ?>" <?php echo $optChecked; ?> /><?php echo "{$rowROI['tiroi_value']}"; ?> %&nbsp; 
                                   <?php
                                   $optChecked = '';
                               } else {
                                   ?>
                            <INPUT id="selROI" TYPE="RADIO" NAME="selROI" class="lgn-field-without-order" 
                                   onclick="changeROIValue('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this.value, '<?php echo $princAmount ?>', document.getElementById('gtransInterestType'), '<?php echo $girviNewDOB; ?>', document.getElementById('girviTotAmtDiv'), '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>', '<?php echo $omPanelDiv; ?>');"
                                   VALUE="<?php echo "{$rowROI['troi_id']}"; ?>" <?php echo $optChecked; ?> /><?php echo "{$rowROI['troi_value']}"; ?> %&nbsp; 
                                   <?php
                                   $optChecked = '';
                               }
                           }
                           ?>
                </h5>
            </td>
            <?php if ($omPanelDiv == 'GirviUpdate') { ?>
                <td align="center" title="ब्याज दर बदल ने के लिए यहाँ क्लिक करे! &#10;Click here to change rate of interest!" valign="bottom">
                    <a style="cursor: pointer;" onclick="updateTROIValue('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $girviId; ?>', document.getElementById('girviROIForm'))">
                        <div id="ajaxUpdateROIValueButt">
                            <img src="<?php echo $documentRoot; ?>/images/update16.png" />
                        </div>
                    </a>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>