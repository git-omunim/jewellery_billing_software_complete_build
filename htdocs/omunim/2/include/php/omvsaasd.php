<?php
/*
 * Created on May 25, 2011 10:56:01 AM
 *
 * @FileName: omvsaasd.php
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
//Changes in file to hide labels and add new class for input fields @AUTHOR: SANDY16DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
//Start Staff Access API @Author:PRIYA22JUL13
$accFileName = $currentFileName;
include 'ommpemac.php';
//End Staff Access API @Author:PRIYA22JUL13
require_once 'system/omsgeagb.php';
?>

<table border="0" cellspacing="0" cellpadding="1" width="100%">
<!--    <tr>
        <td align="right" colspan="2">
            <hr color="#B8860B" />
        </td>
    </tr>-->
    <tr>
        <td colspan="2">
            <div id="addUpdateStateDiv">
                <!--Start Code To Add onload Func @Author:PRIYA24AUG13-->
                <!--Start Code To Add focus @Author:PRIYA29AUG13-->
                <img src="<?php echo $documentRoot; ?>/images/abx-t.png" alt="" height="2px" style="visibility:hidden;" onload="document.getElementById('stateName').focus();
                        initFormName('add_state', 'addState');"/>
                <!--End Code To Add focus @Author:PRIYA29AUG13-->
                <!--End Code To Add onload Func @Author:PRIYA24AUG13-->
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
                                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;">ADD NEW STATE</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="60%" align="right" valign="bottom">
                            <div class="analysis_div_rows">
                                <?php
                                $showStateAddedDiv = $_GET['divMainMiddlePanel'];
                                if ($showStateAddedDiv == "StateAdded") {
                                    include 'omzaaamg.php';
                                } else if ($showStateAddedDiv == "StateUpdated") {
                                    include 'omzaaumg.php';
                                } else if ($showStateAddedDiv == "StateSet") {
                                    include 'omzaaumg.php';
                                } else if ($showStateAddedDiv == "StateDeleted") {
                                    include 'omzaadmg.php';
                                } else if ($showStateAddedDiv == "StateAlreadyExist") {
                                    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ State Already Present, Please enter
                                            different State Name ~</div>
                                    </div>
                                    <?php
                                } else if ($showStateAddedDiv == "StateNotDeleted") {
                                    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ State Added by oMunim, User can not delete this State. ~</div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <div class="spaceLeftRight20Border">
                                <!---Start of changes in form to remove input field heading and change in classes @AUTHOR: SANDY18NOV13---->
                                <form name="add_state" id="add_state"
                                      action="javascript:addState(document.getElementById('add_state'));"
                                      method="post">
                                    <table border="0" cellspacing="0" cellpadding="1" width="60%" style="border: 1px dashed #c1c1c1;background: #f4f4f4;padding: 5px 10px;">
                                        <tr>
                                            <td align="center" width="100%">
                                                <table border="0" cellpadding="2" cellspacing="0" class="paddingTop10" width="100%">

                                                    <tr align="left" valign="middle" width="100%">
                                                        <td align="left" class="frm-r1" width="100%"><input id="stateName" placeholder="State Name"
                                                                                               name="stateName" spellcheck="false" type="text"
                                                                                               class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" style="width:100%;height:30px;" size="35" maxlength="50" />
                                                            <div class="testfieldMess" style="color:#000;">(State Name should be unique)</div>
                                                        </td>
                                                    </tr>

                                                    <tr align="left" valign="middle" width="100%">
                                                        <td align="left" class="frm-r1" width="100%">
                                                            <textarea id="stateComments" placeholder="Comments"
                                                                                                  name="stateComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" style="width:100%;height:60px;" rows="2" cols="40" /></textarea></td>
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
                                                        <td>
                                                            <!---Start to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                            <div style="text-align: center;">
                                                                <?php
                                                                $inputId = " ";
                                                                $inputType = 'submit';
                                                                $inputFieldValue = 'Submit';
                                                                $inputIdButton = " ";
                                                                $inputNameButton = '';
                                                                $inputTitle = '';
                                                                // This is the main class for input flied
                                                                $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                                $inputStyle = " background: #BED8FD;color: #000080;width:90px;height:30px;border-radius:3px!important;font-size:14px;";
                                                                $inputLabel = 'Submit'; // Display Label below the text box
                                                                // This class is for Pencil Icon                                                           
                                                                $inputIconClass = '';
                                                                $inputPlaceHolder = '';
                                                                $spanPlaceHolderClass = '';
                                                                $spanPlaceHolder = '';
                                                                $inputOnChange = "";
                                                                $inputOnClickFun = '';
                                                                $inputKeyUpFun = '';
                                                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                                                $inputMainClassButton = '';           // This is the main division for Button
                                                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                                ?>
                                                            </div>
<!--                                                            <input type="submit" value="Submit" class="frm-btn"
                                                                   maxlength="30" size="15" />-->
                                                            <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                        </td>
                                                           <!--  <td><input type="submit" value="Reset" class="frm-btn"
                                                   onclick="navigation('')" maxlength="30"
                                                   size="15" /></td>-->
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <!---End of changes in form to remove input field heading and change in classes @AUTHOR: SANDY18NOV13---->
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div id="setDefaultCountryDiv">
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
                                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;">SET DEFAULT STATE</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="60%" align="right" valign="bottom">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">
                            <div class="spaceLeftRight20Border">
                                <form name="set_default_state" id="set_default_state"
                                      action="javascript:setDefaultState(document.getElementById('set_default_state'));"
                                      method="post">
                                    <table border="0" cellspacing="3" cellpadding="3" align="center">
                                        <tr>
                                            <td align="left" class="frm-lbl">State Name:</td>
                                            <td align="left" class="frm-r1" width="150px">
                                                <SELECT  class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="state" name="state" style="width:100%;height:36px;border:1px solid #c1c1c1;">>
                                                    <OPTION  VALUE="NotSelected" style="font-weight:600;">Select State</OPTION>
<?php include 'omvsgtsn.php'; ?>
                                                </SELECT>
                                            </td>
                                            <td>
                                                <!---Start to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                <div style="text-align: center;">
                                                    <?php
                                                    $inputId = " ";
                                                    $inputType = 'submit';
                                                    $inputFieldValue = 'Submit';
                                                    $inputIdButton = " ";
                                                    $inputNameButton = '';
                                                    $inputTitle = '';
                                                    // This is the main class for input flied
                                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                    $inputStyle = "background: #BED8FD;color: #000080;width:90px;height:30px;border-radius:3px!important;font-size:14px;";
                                                    $inputLabel = 'Submit'; // Display Label below the text box
                                                    // This class is for Pencil Icon                                                           
                                                    $inputIconClass = '';
                                                    $inputPlaceHolder = '';
                                                    $spanPlaceHolderClass = '';
                                                    $spanPlaceHolder = '';
                                                    $inputOnChange = "";
                                                    $inputOnClickFun = '';
                                                    $inputKeyUpFun = '';
                                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                                    $inputMainClassButton = '';           // This is the main division for Button
                                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                    ?>
                                                </div>
<!--                                                            <input type="submit" value="Submit" class="frm-btn"
                                                       maxlength="30" size="15" />-->
                                                <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/orange16.png" alt="New State" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown" style="font-weight:600;">EXISTING STATE LIST</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" width="100%" valign="top">
            <div class="spaceLeftRight20Border">
                <table border="0" cellspacing="0" cellpadding="2" width="100%">
                    <tr valign="top">
                        <td align="center" valign="top" width="50%">
                            <div id="statesListDiv"><?php include 'omvsstlt.php'; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

