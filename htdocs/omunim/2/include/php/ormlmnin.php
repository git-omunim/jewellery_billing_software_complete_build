<?php
/*
 * Created on Mar 19, 2011 11:53:24 PM
 *
 * @FileName: orggmnin.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//changes in classes of input field @AUTHOR: SANDY21DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';


//Start Code To Alter ROI Item Table
$queryResult = mysqli_query($conn,"SHOW COLUMNS FROM roi LIKE 'roi_monthly_opt'");

$columnExists = (mysqli_num_rows($queryResult)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE roi ADD (roi_monthly_opt VARCHAR(3))");
}
//End Code To Alter ROI Item Table
//Start Code to check Girvi Release Details Option
if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
    $grvRelPayDetails = trim($_POST['grvRelPayDetails']);
}
if ($grvRelPayDetails == NULL || $grvRelPayDetails == '') {
    $grvRelPayDetails = trim($_GET['grvRelPayDetails']);
}
//End Code to check Girvi Release Details Option

$addPrinROIOpt = NULL;
if ($_POST['ROIValue']) {

    $ROIValue = trim($_POST['ROIValue']);
    $ROIType = trim($_POST['interestType']); // To change ROIID for monthly and annually
    $girviId = trim($_POST['girviId']);
    $custId = trim($_POST['custId']);
//Start Code to get ROI Value
    $qSelROI = "SELECT roi_value,iroi_value FROM roi where roi_id='$ROIValue' and roi_type='$ROIType'";
    $resROI = mysqli_query($conn,$qSelROI);
    $totalNoOfROI = mysqli_num_rows($resROI);

    if ($totalNoOfROI == 0 || $totalNoOfROI == NULL) {
        $qSelROI = "SELECT roi_id,roi_value,iroi_value FROM roi where roi_default='checked' and roi_type='$ROIType'";
        $resROI = mysqli_query($conn,$qSelROI);
        $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);

//        $qGirviROIUpdate = "UPDATE girvi SET
//		girv_IROI='$rowROI[iroi_value]',girv_ROI='$rowROI[roi_value]',girv_ROI_Id='$rowROI[roi_id]'
//                WHERE girv_id='$girviId' and girv_cust_id='$custId' and girv_own_id='$_SESSION[sessionOwnerId]'";
//        if (!mysqli_query($conn,$qGirviROIUpdate)) {
//            die('Error: ' . mysqli_error($conn));
//        }
        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $ROIValue = $rowROI['iroi_value'];
        } else {
            $ROIValue = $rowROI['roi_value'];
        }
    } else {
        $rowROI = mysqli_fetch_array($resROI, MYSQLI_ASSOC);
        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
            $ROIValue = $rowROI['iroi_value'];
        } else {
            $ROIValue = $rowROI['roi_value'];
        }
    }
}
//End Code to get ROI Value                            
$changeRelDateOpt = trim($_POST['relDateDDValue']);

if ($ROIValue || $changeRelDateOpt) {
    $ROI = $ROIValue;
    if ($_POST['girviAddROINotChange'] == 'No') {
        $addPrinROIOpt = '';
    } else if ($_POST['girviAddROINotChange'] == 'Yes') {
        $addPrinROIOpt = $ROI;
    }

    $releaseDateDD = trim($_POST['relDateDDValue']);
    $releaseDateMM = trim($_POST['relDateMMValue']);
    $releaseDateYY = trim($_POST['relDateYYValue']);
    $princAmount = trim($_POST['princAmount']);
    $ROIType = trim($_POST['interestType']);
    $girviNewDOB = trim($_POST['girviDate']);
    $girviId = trim($_POST['girviId']);
    $mlId = trim($_POST['custId']);
    $girviType = trim($_POST['girviType']);
    $girviUpdSts = trim($_POST['girviStatus']);
    $omPanelDiv = trim($_POST['omPanelDiv']);
    $girviIntOpt = trim($_POST['simpleOrCompIntOption']);
    $girviIntCompoundedOpt = trim($_POST['girviCompoundedOption']);
}

//$gMonthIntOption = $rowAllGirvi['ml_monthly_intopt'];

if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {
    $gMonthIntOption = $rowGirvi['girv_monthly_intopt'];
    if ($gMonthIntOption == '' || $gMonthIntOption == NULL) {
        $qSelectROI = "SELECT roi_monthly_opt FROM roi where roi_id='1' and roi_own_id='$_SESSION[sessionOwnerId]'"; //To display data in this form
        $resultROI = mysqli_query($conn,$qSelectROI) or die("Error: " . mysqli_error($conn) . " with query " . $qSelectROI);
        $rowMonthlyIntOpt = mysqli_fetch_array($resultROI, MYSQLI_ASSOC);

        $gMonthIntOption = $rowMonthlyIntOpt['roi_monthly_opt'];
    }
}
switch ($gMonthIntOption) {
    case "FM":
        $monthlyIntOpt1 = "selected";
        break;
    case "HM":
        $monthlyIntOpt2 = "selected";
        break;
    case "7D":
        $monthlyIntOpt3 = "selected";
        break;
    case "DD":
        $monthlyIntOpt4 = "selected";
        break;
}

//Code for selection Interest Type Simple or Compound
switch ($girviIntOpt) {
    case "Simple":
        $intTypeOpt1 = "selected";
        $visibility = "hidden";
        break;
    case "Compound":
        $intTypeOpt2 = "selected";
        $visibility = "visible";
        break;
    default:
        $intTypeOpt1 = "selected";
        $visibility = "hidden";
        break;
}
//Code for selection Interest Type Compounded
switch ($girviIntCompoundedOpt) {
    case "After3Y":
        $compoundedOpt6 = "selected";
        break;
    case "BiYearly":
        $compoundedOpt1 = "selected";
        break;
    case "Yearly":
        $compoundedOpt2 = "selected";
        break;
    case "HalfYearly":
        $compoundedOpt3 = "selected";
        break;
    case "Quarterly":
        $compoundedOpt4 = "selected";
        break;
    case "Monthly":
        $compoundedOpt5 = "selected";
        break;
    default:
        $compoundedOpt2 = "selected";
        break;
}
?>
<table border="0" cellpadding="0" cellspacing="0" height="100%">
    <tr align="center">
        <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
            <b> MONTHLY INTEREST OPTION</b>
        </td>
        <td align="right" valign="middle">
            <div id="ajaxLoadGirviMonthlyIntOptChangeDiv" style="visibility:hidden">
                <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
            </div>
        </td>
    </tr>
    <tr>
<!--        <td align="right" valign="middle">
            <div id="ajaxLoadGirviMonthlyIntOptChangeDiv" style="visibility:visible">
                <img src="<?php // echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
            </div>
        </td>-->
        <td align="right" colspan="3" valign="middle" width="100%"  style="height:40px;" class="textBoxCurve1px margin2pxAll backFFFFFF">
            <div id="monthlyIntOptionDiv" class=" selectStyledBorderLess background_transparent">
                <?php if ($staffId && $array['updateGirviAccessMnthInt'] != 'true') { //give access depending on staff @AUTHOR: SANDY15AUG13       ?>
                    <select id="monthlyInterestType" name="monthlyInterestType" style="width:100%;height:35px;" 
                            class="textLabel14CalibriGrey" disabled="disabled"
                            onchange="changeMlLoanMonthlyIntOpt('<?php echo $documentRoot; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value, '<?php echo $omPanelDiv; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', '<?php echo $ROI; ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviUpdSts; ?>');">
                        <option value="FM" <?php echo $monthlyIntOpt1; ?>>Full Month</option>
                        <option value="HM" <?php echo $monthlyIntOpt2; ?>>Half Month</option>
                        <option value="7D" <?php echo $monthlyIntOpt3; ?>>Weekly</option>
                        <option value="DD" <?php echo $monthlyIntOpt4; ?>>Default</option>
                    </select><input  id="monthlyInterestType" name="monthlyInterestType" type="hidden" value="<?php echo $gMonthIntOption; ?>"  /> <!-- //if disabled pass default value @AUTHOR: SANDY15AUG13  -->
                <?php } else { ?> 
                    <select id="monthlyInterestType" name="monthlyInterestType" 
                            class="textLabel14CalibriGrey" style="width:100%;height:35px;"
                            onchange="changeMlLoanMonthlyIntOpt('<?php echo $documentRoot; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value, '<?php echo $omPanelDiv; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', '<?php echo $ROI; ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviUpdSts; ?>');">
                        <option value="FM" <?php echo $monthlyIntOpt1; ?>>Full Month</option>
                        <option value="HM" <?php echo $monthlyIntOpt2; ?>>Half Month</option>
                        <option value="7D" <?php echo $monthlyIntOpt3; ?>>Weekly</option>
                        <option value="DD" <?php echo $monthlyIntOpt4; ?>>Default</option>
                    </select>
                <?php } ?>
            </div>
        </td>
    </tr>
    <tr align="center">
        <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
            <b> SIMPLE / COMPOUND INTEREST</b>
        </td>
         <td align="right" valign="middle">
            <div id="ajaxLoadGirviIntOptChangeDiv" style="visibility: hidden">
                <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
            </div>
        </td>
    </tr>
    <tr>
       
        <td align="right" colspan="3" valign="middle" width="100%" style="height:40px" class="textBoxCurve1px margin2pxAll backFFFFFF">
            <div class="selectStyledBorderLess background_transparent">
                <?php if ($staffId && $array['updateGirviAccessIntTyp'] != 'true') { //give access depending on staff @AUTHOR: SANDY15AUG13       ?>
                    <select id="simpleOrCompIntOption" name="simpleOrCompIntOption" style="width:100%;height:35px;"
                            class="textLabel14CalibriGrey" disabled="disabled"
                            onchange="changeMlIntTypeOpt('<?php echo $documentRoot; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value, '<?php echo $omPanelDiv; ?>', '<?php echo $grvRelPayDetails; ?>', document.getElementById('monthlyInterestType'), '<?php echo $princAmount; ?>', '<?php echo $ROI; ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviUpdSts; ?>');" >
                        <option value="Simple" <?php echo $intTypeOpt1; ?>>Simple Interest</option>
                        <option value="Compound" <?php echo $intTypeOpt2; ?>>Compound Interest</option>
                    </select><input  id="simpleOrCompIntOption" name="simpleOrCompIntOption" type="hidden" value="<?php echo $girviIntOpt; ?>"  /> <!-- //if disabled pass default value @AUTHOR: SANDY15AUG13  -->
                <?php } else { ?> 
                    <select id="simpleOrCompIntOption" name="simpleOrCompIntOption" style="width:100%;height:35px;"
                            class="textLabel14CalibriGrey"
                            onchange="changeMlIntTypeOpt('<?php echo $documentRoot; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value, '<?php echo $omPanelDiv; ?>', '<?php echo $grvRelPayDetails; ?>', document.getElementById('monthlyInterestType'), '<?php echo $princAmount; ?>', '<?php echo $ROI; ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviUpdSts; ?>');" >
                        <option value="Simple" <?php echo $intTypeOpt1; ?>>Simple Int</option>
                        <option value="Compound" <?php echo $intTypeOpt2; ?>>Compound Int</option>
                    </select>
                <?php } ?>
            </div>
        </td>
    </tr>
    <tr align="center">
        <td align="left" valign="middle" width="100%" colspan="2" style="visibility: <?php echo $visibility; ?>">
            <div id="girviCompoundedOptionDiv" 
                 style="visibility: <?php echo $visibility; ?>" >
                <table border="0" cellpadding="0" cellspacing="0" height="100%">
                    <tr align="center">
                        <td align="left" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                            <b>COMPOUND INTEREST OPTION</b>
                        </td>
                        <td align="right" valign="middle">
                            <div id="ajaxLoadGirviCompoundedOptChangeDiv" style="visibility:hidden">
                                <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
                            </div>
                        </td>
                    </tr>
                    <tr>
<!--                        <td align="right" valign="middle">
                            <div id="ajaxLoadGirviCompoundedOptChangeDiv" style="visibility:visible">
                                <img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
                            </div>
                        </td>-->
                        <td align="right" valign="middle" width="100%"  class="textBoxCurve1px margin2pxAll backFFFFFF">
                            <div class="selectStyledBorderLess background_transparent">
                                <select id="girviCompoundedOption" name="girviCompoundedOption" 
                                        class="textLabel14CalibriGrey" style="width:100%;height:40px;"
                                        onchange="changeMlIntCompoundedOpt('<?php echo $documentRoot; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value, '<?php echo $omPanelDiv; ?>', '<?php echo $grvRelPayDetails; ?>', document.getElementById('monthlyInterestType'), '<?php echo $princAmount; ?>', '<?php echo $ROI; ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviUpdSts; ?>');" >
                                    <option value="After3Y" <?php echo $compoundedOpt6; ?>>After 3 Years</option>
                                    <option value="BiYearly" <?php echo $compoundedOpt1; ?>>After 2 Years</option>
                                    <option value="Yearly" <?php echo $compoundedOpt2; ?>>Yearly</option>
                                    <option value="HalfYearly" <?php echo $compoundedOpt3; ?>>Half-Yearly</option>
                                    <option value="Quarterly" <?php echo $compoundedOpt4; ?>>Quarterly</option>
                                    <option value="Monthly" <?php echo $compoundedOpt5; ?>>Monthly</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>