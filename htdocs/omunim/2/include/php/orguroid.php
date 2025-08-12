<?php
/*
 * Created on May 25, 2011 11:46:59 PM
 *
 * @FileName: orguroid.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH25JAN13
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';

$roiMonthlyOwnerId = $_SESSION['sessionOwnerId'];

//Start Code To Alter ROI Item Table
$queryResult = mysqli_query($conn,"SHOW COLUMNS FROM roi LIKE 'roi_monthly_opt'");

$columnExists = (mysqli_num_rows($queryResult)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE roi ADD (roi_monthly_opt VARCHAR(3))");
}
//End Code To Alter ROI Item Table
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="center" colspan="3">
            <br />
        </td>
    </tr>
    <tr>
        <td width="40%">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="Add Roi" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">UPDATE ROI PANEL</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>      
        <td width="30%" align="right" valign="bottom">
            <div id="omAjaxUpdMonthlyIntMessDiv" class="analysis_div_rows">
                <?php
                $showROIAddedDiv = $_GET['divMainMiddlePanel'];
                if ($showROIAddedDiv == "ROIUpdated") {
                    include 'omzaaumg.php';
                }
                ?>
            </div>
        </td>  
        <td align="right" valign="bottom">
            <form id="getTROIPanel" name="getROIPanel" method="post" action="javascript:navigateTROIPanel();">
                <input type="submit" value="Transfer Girvi / Loan ROI" class="frm-btn-without-border" 
                       maxlength="30" size="15"  />
            </form>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="3">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <?php
    $qSelectROI = "SELECT roi_monthly_opt FROM roi where roi_id='1' and roi_own_id='$roiMonthlyOwnerId'"; //To display data in this form
    $resultROI = mysqli_query($conn,$qSelectROI);
    $rowMonthlyIntOpt = mysqli_fetch_array($resultROI, MYSQLI_ASSOC);

    $roiMonthlyIntOpt = $rowMonthlyIntOpt['roi_monthly_opt'];

    switch ($roiMonthlyIntOpt) {
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
    ?>
    <tr>
        <td colspan="3" align="left">
            <form name="update_monthly_int_opt" id="update_monthly_int_opt"
                  action="javascript:updateMonthlyIntOpt('ROI');"
                  method="post">
                <table border="0" cellspacing="2" cellpadding="1" align="center">
                    <tr>
                        <td align="center" valign="top">
                            <div class="spaceLeft20 girvi_head_maron_right">Monthly Interest Options:</div>
                        </td>
                        <td align="center" valign="top">
                            <select id="interestType" name="interestType" class="lgn-txtfield">
                                <option value="FM" <?php echo $monthlyIntOpt1; ?>>Full Month</option>
                                <option value="HM" <?php echo $monthlyIntOpt2; ?>>Half Month</option>
                                <option value="7D" <?php echo $monthlyIntOpt3; ?>>Weekly</option>
                                <option value="DD" <?php echo $monthlyIntOpt4; ?>>Default</option>
                            </select>
                        </td>
                        <td align="center" >
                            <div id="updateMonthlyIntOptButtDiv">
                                <input type="submit" value="Update" class="frm-btn" id="UpdateMonthlyIntOpt" name="UpdateMonthlyIntOpt" size="15" />
                            </div>
                        </td>
                        <td align="center" >
                            <div id="ajaxLoadUpdateMonthlyIntOpt" style="visibility: hidden">
                                <?php include 'omzaajld.php'; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="3">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <div id="addUpdateROIDiv" class="spaceLeftRight20Border">
                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                    <tr>
                        <td align="center" width="50%" valign="top">
                            <form name="update_roi_monthly" id="update_roi_monthly"
                                  action="javascript:updateROIMonthly(document.getElementById('update_roi_monthly'));"
                                  method="post">
                                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                    <tr align="center" valign="top">
                                        <td align="center"><div class="spaceLeft20"><h2>~ Monthly ROI Options ~</h2></div></td>
                                    </tr>

                                    <!-- Start code to add ROI head by @Author: KHUSH23JAN13 -->                                            
                                    <tr align="left" valign="middle">
                                        <td align="left">
                                            <table border="0" cellpadding="2" cellspacing="2" align="center">     
                                                <td align="left"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></td>   
                                                <?php if ($_SESSION['sessionIgenType'] == $globalOwnPass) { ?>
                                                    <td align="left" ><h3>&nbsp;&nbsp;&nbsp;ROI</h3></td>
                                                <?php } ?>
                                                <!------Start to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                <td align="left"><h3>&nbsp;&nbsp;&nbsp;</h3></td> 
                                                <?php if ($_SESSION['sessionIgenType'] == $globalOwnIPass) { ?>
                                                    <td align="right"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iROI</h3></td>
                                                <?php } ?>
                                                <!------End to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->

                                            </table>
                                        </td>
                                    </tr>
                                    <!-- End code to add ROI head by @Author: KHUSH23JAN13 -->


                                    <tr align="left" valign="middle">
                                        <td align="left">
                                            <table border="0" cellpadding="2" cellspacing="1" align="center">
                                                <?php
                                                $qSelectROI = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='Monthly'"; //To display data in this form
                                                $resultROI = mysqli_query($conn,$qSelectROI);
                                                $roiCounter = 1;
                                                while ($rowROI = mysqli_fetch_array($resultROI, MYSQLI_ASSOC)) {
                                                    ?>                                                                                                                            
                                                    <tr>
                                                        <!--------Start code to echo checked roi @Author:PRIYA19NOV13---->
                                                        <td align="right" valign="top" class="padding6">
                                                            <INPUT id="defaultROI" TYPE="RADIO" NAME="defaultROI" class="lgn-field-without-order" VALUE="<?php echo "{$rowROI['roi_id']}"; ?>" 
                                                                   <?php if ($rowROI['roi_default'] == 'checked') echo 'checked'; ?>  />
                                                        </td>
                                                        <!--------End code to echo checked roi @Author:PRIYA19NOV13---->
                                                        <td align="right" class="girvi_head_maron16">
                                                            ROI Option <?php echo $roiCounter; ?>: 
                                                        </td>
                                                        <!------Start to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                        <td align="left">
                                                            <div <?php if ($_SESSION['sessionIgenType'] == $globalOwnPass) { ?>style="visibility:visible;"<?php } else { ?>style="visibility:hidden;"<?php } ?>>
                                                                <input type="text" id="roiMonOpt<?php echo $roiCounter; ?>" name="roiMonOpt<?php echo $roiCounter; ?>" value="<?php echo "{$rowROI['roi_value']}"; ?>" class="lgn-txtfield16" 
                                                                       maxlength="5" size="5" />
                                                            </div>
                                                        </td> 
                                                        <!-- Start code to add IROI monthly fields by @Author: KHUSH23JAN13 -->
                                                        <td align="left">
                                                            <div <?php if ($_SESSION['sessionIgenType'] == $globalOwnIPass) { ?>style="visibility:visible;"<?php } else { ?>style="visibility:hidden;"<?php } ?>>
                                                                <input type="text" id="iroiMonOpt<?php echo $roiCounter; ?>" name="iroiMonOpt<?php echo $roiCounter; ?>" value="<?php echo "{$rowROI['iroi_value']}"; ?>" class="lgn-txtfield16" 
                                                                       maxlength="5" size="5" />
                                                            </div>
                                                        </td>
                                                        <!------End to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                        <!-- End code to add IROI monthly fields by @Author: KHUSH23JAN13 -->
                                                    </tr>
                                                    <?php
                                                    $roiCounter++;
                                                }
                                                ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <br />
                                        </td>
                                    </tr>
                                    <tr align="center" valign="middle">
                                        <td align="center" >
                                            <div id="updateROIMontlyButtDiv">
                                                <input type="submit" value="Update" class="frm-btn" id="UpdateROIMonthly" name="UpdateROIMonthly" size="15" />
                                            </div>
                                            <div id="ajaxLoadUpdateROIMontly" style="visibility: hidden">
                                                <?php include 'omzaajld.php'; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <br />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                        <td align="center" width="50%" valign="top">
                            <form name="update_roi_annually" id="update_roi_annually"
                                  action="javascript:updateROIAnnually(document.getElementById('update_roi_annually'));"
                                  method="post">
                                <table border="0" cellpadding="2" cellspacing="0">
                                    <tr align="center" valign="top">
                                        <td align="center"><div class="spaceLeft20"><h2>~ Annually ROI Options ~</h2></div></td>
                                    </tr>

                                    <!-- Start code to add ROI head by @Author: KHUSH23JAN13 -->                                            
                                    <tr align="left" valign="middle">
                                        <td align="left">
                                            <table border="0" cellpadding="2" cellspacing="2" align="center">     
                                                <td align="left"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></td>   
                                                <!------Start to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                <?php if ($_SESSION['sessionIgenType'] == $globalOwnPass) { ?>
                                                    <td align="left" ><h3>&nbsp;&nbsp;&nbsp;ROI</h3></td>   
                                                <?php } ?>
                                                <td align="left"><h3>&nbsp;&nbsp;&nbsp;</h3></td>   
                                                <?php if ($_SESSION['sessionIgenType'] == $globalOwnIPass) { ?>
                                                    <td align="right"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iROI</h3></td>   
                                                <?php } ?>
                                                <!------End to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                            </table>
                                        </td>
                                    </tr>
                                    <!-- End code to add ROI head by @Author: KHUSH23JAN13 -->


                                    <tr align="left" valign="middle">
                                        <td align="left">
                                            <table border="0" cellpadding="2" cellspacing="1" align="center" width="100%">
                                                <?php
                                                $qSelectROI = "SELECT roi_id,roi_value,iroi_value,roi_default FROM roi where roi_type='Annually'"; //To display data in this form
                                                $resultROI = mysqli_query($conn,$qSelectROI);
                                                $roiCounter = 1;
                                                while ($rowROI = mysqli_fetch_array($resultROI, MYSQLI_ASSOC)) {
                                                    ?>
                                                    <tr>
                                                        <!--------Start code to echo checked roi @Author:PRIYA19NOV13---->
                                                        <td align="right" valign="top" class="padding6">
                                                            <INPUT id="defaultROI" TYPE="RADIO" NAME="defaultROI" class="lgn-field-without-order" VALUE="<?php echo "{$rowROI['roi_id']}"; ?>" 
                                                                   <?php if ($rowROI['roi_default'] == 'checked') echo 'checked'; ?> />
                                                        </td>
                                                        <!--------End code to echo checked roi @Author:PRIYA19NOV13---->
                                                        <td align="right" class="girvi_head_maron16">
                                                            ROI Option <?php echo $roiCounter; ?>: 
                                                        </td>
                                                        <!------Start to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                        <td align="left">
                                                            <div <?php if ($_SESSION['sessionIgenType'] == $globalOwnPass) { ?>style="visibility:visible;"<?php } else { ?>style="visibility:hidden;"<?php } ?>>
                                                                <input type="text" id="roiAnnOpt<?php echo $roiCounter; ?>" name="roiAnnOpt<?php echo $roiCounter; ?>" value="<?php echo "{$rowROI['roi_value']}"; ?>" class="lgn-txtfield16" 
                                                                       maxlength="5" size="5" />
                                                            </div>
                                                        </td>
                                                        <!-- Start code to add IROI annually fields by @Author: KHUSH23JAN13 -->
                                                        <td align="left">
                                                            <div <?php if ($_SESSION['sessionIgenType'] == $globalOwnIPass) { ?>style="visibility:visible;"<?php } else { ?>style="visibility:hidden;"<?php } ?>>
                                                                <input type="text" id="iroiAnnOpt<?php echo $roiCounter; ?>" name="iroiAnnOpt<?php echo $roiCounter; ?>" value="<?php echo "{$rowROI['iroi_value']}"; ?>" class="lgn-txtfield16" 
                                                                       maxlength="5" size="5" />
                                                            </div>
                                                        </td>
                                                        <!------End to add condition to show roi option as per ipass or opass @AUTHOR: SANDY7DEC13---->
                                                        <!-- End code to add IROI annually fields by @Author: KHUSH23JAN13 -->
                                                    </tr>
                                                    <?php
                                                    $roiCounter++;
                                                }
                                                ?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <br />
                                        </td>
                                    </tr>
                                    <tr align="center" valign="middle">
                                        <td align="center" >
                                            <div id="updateROIAnnuallyButtDiv">
                                                <input type="submit" value="Update" class="frm-btn" id="UpdateROIAnnually" name="UpdateROIAnnually" size="15" />
                                            </div>
                                            <div id="ajaxLoadUpdateROIAnnually" style="visibility: hidden">
                                                <?php include 'omzaajld.php'; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <br />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
