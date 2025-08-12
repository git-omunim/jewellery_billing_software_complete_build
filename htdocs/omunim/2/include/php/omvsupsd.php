<?php
/*
 * Created on May 26, 2011 9:30:40 PM
 *
 * @FileName: omvsupsd.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
//Changes in file to hide labels and add new class for input fields @AUTHOR: SANDY16DEC13
require_once 'system/omssopin.php';

$qSelectState = "SELECT * FROM state where state_id='$_GET[stateId]'"; //To display data in this form
$resultState = mysqli_query($conn,$qSelectState);
$rowState = mysqli_fetch_array($resultState);
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td width="40%">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New State" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">UPDATE STATE</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="60%" align="right" valign="bottom">
            <div class="analysis_div_rows"><?php
$showStateAddedDiv = $_GET['divMainMiddlePanel'];
if ($showStateAddedDiv == "StateAdded") {
    include 'omzaaamg.php';
} else if ($showStateAddedDiv == "StateUpdated") {
    include 'omzaaumg.php';
} else if ($showStateAddedDiv == "StateAlreadyExist") {
    ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;" class="updateMess"><div class="spaceRight20">~ State Already Present, Please enter different State Name ~</div></div>
                    <?php
                }
                ?></div>

        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div id="addUpdateStateDiv" class="spaceLeftRight20Border">
                <form name="update_state" id="update_state"
                      action="javascript:updateDeleteState(document.getElementById('update_state'));"
                      method="post">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="2" cellspacing="0">
                                        <!---<tr align="left" valign="middle">
                                                <td align="left" class="frm-lbl">State Name:</td>
                                        </tr>-->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><input id="stateName" name="stateName" value="<?php echo $rowState['state_name']; ?>"
                                                                               spellcheck="false" type="text" class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9"
                                                                               size="35" maxlength="50" /><input id="stateId" name="stateId"
                                                                               value="<?php echo $_GET[stateId]; ?>" type="hidden" /><div class="testfieldMess">(State Name should be unique)</div>
                                        </td>
                                    </tr>
                                    <!---<tr align="left" valign="middle">
                                            <td align="left" class="frm-lbl">Comments:</td>
                                    </tr>---->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><textarea id="stateComments"
                                                                                  name="stateComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" rows="2" cols="40"/><?php echo $rowState['state_comm']; ?></textarea></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="2" cellspacing="0" align="center"
                           width="100%">
                        <tr>
                            <td width="100%" align="center">
                                <table border="0" cellpadding="1" cellspacing="1" align="center">
                                    <tr>
                                        <td><input type="submit" value="Update" class="frm-btn" id="Update" name="Update"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                        <td><input type="submit" value="Delete" class="frm-btn" id="Delete" name="Delete"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>
    </tr>
</table>