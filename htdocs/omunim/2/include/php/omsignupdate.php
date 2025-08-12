<?php
/*
 * **************************************************************************************
 * @tutorial: customer Signature Update Div
 * **************************************************************************************
 * 
 * Created on SEPT 21, 2024 12:00:00 PM
 *
 * @FileName: omsignupdate.php
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
require_once 'system/omssopin.php';
include 'ommpfunc.php';
$sessionOwnerId = $_SESSION[sessionOwnerId];
$custId = $_REQUEST['custId'];
$panelName = $_REQUEST['custPanelOption'];
parse_str(getTableValues("SELECT user_sign_snap_fname,user_prefix_name as custPrefixname, user_lname as custLName, user_fname as custFName  FROM user WHERE user_id = '$custId';"));
?>
<div style="background-color:white; margin : 10px">
<tr>
    <td colspan="2" valign="middle" align="left">
        <div class="analysis_div_rows" style="display: flex; align-items: center; justify-content: space-between; padding:10px">
            <div style="display: flex; align-items: center;">
                <img src="images/adduser32.png" alt="" style="margin-right: 10px;" />
                <div class="textLabelHeading" id="userType">
                    UPDATE CUSTOMER SIGNATURE
                </div>
            </div>
            <button type="button" data-action="close" class="btn" style="padding : 5px 10px; font-weight : 600; background-color : #0b57d0; color : white"
                    onclick="navigatationPanelByFileName('cust_middle_body', 'omcdcdfu', '', '', '', '', '', '', '<?php echo $custId;?>');" style="font-size: 16px;">
                Close
            </button>
        </div>
    </td>
</tr>
<?php
$sessionOwnerId = $_SESSION[sessionOwnerId];
$custId = $_REQUEST['custId'];
$panelName = 'UpdateSignature';
parse_str(getTableValues("SELECT user_sign_snap_fname,user_prefix_name as custPrefixname, user_lname as custLName, user_fname as custFName  FROM user WHERE user_id = '$custId';"));
$custSign = $user_sign_snap_fname;
include 'omcdsign.php';
?>
</div>