<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar main div
 * **************************************************************************************
 * 
 * Created on Nov 12, 2014 10:26:53 AM
 *
 * @FileName: omudmndv.php
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
require_once 'ommpincr.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
}
$mainPanel = $_GET['mainPanel'];
?>
<div id="udhaarMainPanelDiv">
    <table width="100%"  border="0" cellspacing="2" cellpadding="0" align="right" valign="top" class="paddingTop7">
        <tr>
            <td align="right" valign="bottom" class="noPrint">
                <input type="button" value="UDHAAR" 
                       id="buttUdhaarPanel" name="buttUdhaarPanel" 
                       onclick="showUdhaarMainPanel('udhaar','<?php echo $custId;?>');"
                       class="frm-btn" />
            </td>
            <td align="right" valign="bottom" width="120px" class="noPrint">
                <input type="submit" value="UDHAAR WITH EMI" 
                       id="buttSearchUdhaarPanel" name="buttSearchUdhaarPanel" 
                       onclick="showUdhaarMainPanel('udhaarWithEMI','<?php echo $custId;?>');"
                       class="frm-btn" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="hrGold"></div>
            </td>
        </tr>
    </table>
</div>
<div id="udhaarMainPanelSubDiv" class="main_middle_common">
</div>