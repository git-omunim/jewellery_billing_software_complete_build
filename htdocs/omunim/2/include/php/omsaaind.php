<?php
/*
 * Created on Aug 12, 2016
 *
 * @FileName: omsaaind.php
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

$query = mysqli_query($conn,"SHOW COLUMNS FROM actionitem LIKE 'acit_scheme_prd_typ'");
$columnExists = (mysqli_num_rows($query)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE actionitem ADD (acit_scheme_prd_typ VARCHAR(20))") or die(mysqli_error($conn));
}

$query = mysqli_query($conn,"SHOW COLUMNS FROM actionitem LIKE 'acit_scheme_prd'");
$columnExists = (mysqli_num_rows($query)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE actionitem ADD (acit_scheme_prd VARCHAR(20))") or die(mysqli_error($conn));
}
$query = mysqli_query($conn,"SHOW COLUMNS FROM actionitem LIKE 'acit_scheme_amt_typ'");
$columnExists = (mysqli_num_rows($query)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE actionitem ADD (acit_scheme_amt_typ VARCHAR(20))") or die(mysqli_error($conn));
}

$query = mysqli_query($conn,"SHOW COLUMNS FROM actionitem LIKE 'acit_scheme_amt'");
$columnExists = (mysqli_num_rows($query)) ? TRUE : FALSE;

if (!$columnExists) {
    mysqli_query($conn,"ALTER TABLE actionitem ADD (acit_scheme_amt VARCHAR(40))") or die(mysqli_error($conn));
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
    <tr>
        <td align="right" colspan="2">
            <hr color="#B8860B" />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div id="addUpdateSchemeNameDiv">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left">
                            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                                <tr>
<!--                                    <td>
                                        <div class="spaceLeft10 paddingTop2">
                                            <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt="new item" />
                                        </div>
                                    </td>-->
                                    <td align="left">
                                        <div class="spaceLeft4">
                                            <div class="textLabel16CalibriNormalBrown">ADD NEW SCHEME</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="65%" align="right" valign="bottom">
                            <!--Start Code To Add onload Func @Author:PRIYA24AUG13-->
                            <!--Start Code To Add focus @Author:PRIYA29AUG13-->
<!--                            <img src="<?php echo $documentRoot; ?>/images/abx-t.png" alt="" height="2px" style="visibility:hidden;" onload="document.getElementById('addItemName').focus();
                                    initFormName('add_itemName', 'addSettItemName');"/>-->
                            <!--End Code To Add focus @Author:PRIYA29AUG13-->
                            <!--End Code To Add onload Func @Author:PRIYA24AUG13-->
                            <div class="analysis_div_rows">
                                <?php
                                $showMess = $_GET['getMessage'];
                                $showItemNameAddedDiv = $_GET['getMessage'];
                                if ($showItemNameAddedDiv == "SchemeNameAdded") {
                                    include 'omzaaamg.php';
                                } else if ($showItemNameAddedDiv == "SchemeNameUpdated") {
                                    include 'omzaaumg.php';
                                } else if ($showItemNameAddedDiv == "SchemeNameDeleted") {
                                    include 'omzaadmg.php';
                                } else if ($showMess == "SchemeNameAlreadyExist") {
                                    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ Scheme Name Already Present, Please enter
                                            different Scheme Name ~</div>
                                    </div>
                                    <?php
                                } else if ($showItemNameAddedDiv == "SchemeNameNotDeleted") {
                                    ?>
                                    <div id="ajax_upated_div"
                                         style="visibility: visible; background: none;" class="updateMess">
                                        <div class="spaceRight20">~ Scheme Name Added by oMunim, User can not delete this Scheme Name. ~</div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">
                            <div class="spaceLeftRight20Border">
                                <!---Start of changes in form to remove input field heading and change in classes @AUTHOR: SANDY18NOV13---->
                                <form name="add_schemeName" id="add_schemeName"
                                      enctype="multipart/form-data" method="post"
                                      action="include/php/omsaadin.php"
                                      onsubmit="return addSettSchemeName();">
                                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                                        <tr>
                                            <td align="center" width="600px">
                                                <table border="0" cellpadding="2" cellspacing="0" class="paddingTop10">
                                                    <tr align="left" valign="middle">
                                                        <td colspan="2">
                                                            <table>
                                                                <tr>
                                                                    <td align="left" class="frm-r1"><input id="addSchemeName" placeholder="SCHEME NAME"
                                                                                                           name="addSchemeName" spellcheck="false" type="text"
                                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                       document.getElementById('addSchemePrdTyp').focus();
                                                                                                                       return false;
                                                                                                                   }"
                                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="30" maxlength="50" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!--Start Code To Add Item Category @AUTHOR:PRIYA11APR13-->
                                                    <!--add item name in marathi Author:GAUR21JUL16-->
                                                    <tr align="left" valign="middle">
                                                        <td colspan="2">
                                                            <table>
                                                                <tr>
                                                                    <td align="left" class="frm-r1">
                                                                        <SELECT class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="addSchemePrdTyp" name="addSchemePrdTyp" placeholder="SCHEME TYPE"
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('addSchemePrd').focus();
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8) {
                                                                                            document.getElementById('addSchemeName').focus();
                                                                                            return false;
                                                                                        }">
                                                                            <OPTION value="MONTH" >MONTH</OPTION>
                                                                            <OPTION value="DAY" >DAY</OPTION>
                                                                        </SELECT> </td>


                                                                    <td align="left" class="frm-r1"><input id="addSchemePrd" placeholder="MONTH / DAY"
                                                                                                           name="addSchemePrd" spellcheck="false" type="text"
                                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="18" maxlength="10" 
                                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                       document.getElementById('addSchemeAmtTyp').focus();
                                                                                                                       return false;
                                                                                                                   } else if (event.keyCode == 8) {
                                                                                                                       document.getElementById('addSchemePrdTyp').focus();
                                                                                                                       return false;
                                                                                                                   }"/>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr align="left" valign="middle">
                                                        <td colspan="2">
                                                            <table>
                                                                <tr>
                                                                    <td align="left" class="frm-r1">
                                                                        <SELECT class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="addSchemeAmtTyp" name="addSchemeAmtTyp" placeholder="AMOUNT TYPE"
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('addSchemeAmt').focus();
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8) {
                                                                                            document.getElementById('addSchemePrd').focus();
                                                                                            return false;
                                                                                        }">
                                                                            <OPTION value="AMOUNT" >AMOUNT</OPTION>
                                                                            <OPTION value="AMT %" >AMT %</OPTION>
                                                                        </SELECT> </td>


                                                                    <td align="left" class="frm-r1"><input id="addSchemeAmt" placeholder="AMOUNT"
                                                                                                           name="addSchemeAmt" spellcheck="false" type="text"
                                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="17" maxlength="50" 
                                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                       document.getElementById('submitItemNameButt').focus();
                                                                                                                       return false;
                                                                                                                   } else if (event.keyCode == 8) {
                                                                                                                       document.getElementById('addSchemeAmtTyp').focus();
                                                                                                                       return false;
                                                                                                                   }"/>
                                                                    </td>
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
                                                                                    $inputId = "submitItemNameButt";
                                                                                    $inputType = 'submit';
                                                                                    $inputFieldValue = 'Submit';
                                                                                    $inputIdButton = "submitItemNameButt";
                                                                                    $inputNameButton = 'submitItemNameButt';
                                                                                    $inputTitle = '';
                                                                                    // This is the main class for input flied
                                                                                    $inputFieldClass = 'btn ' . $om_btn_style;
                                                                                    $inputStyle = " ";
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
<!--                                                                        <input type="submit" value="Submit" class="frm-btn" id="submitItemNameButt" name ="submitItemNameButt"
                                                                               maxlength="30" size="15" />-->
                                                                        <!---End to Changes button @AUTHOR: DIKSHA24SEPT2018----->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
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
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2"><br />
        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <table>
                <tr>
<!--                    <td>
                        <div class="spaceLeft20 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt="new item" />
                        </div>
                    </td>-->
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">EXISTING SCHEME LIST</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" width="100%" valign="top">
            <div class="spaceLeftRight20Border" id="schemeNamesListDiv">
                <table border="0" cellspacing="0" cellpadding="2" width="100%">
                    <tr valign="top">
                        <td align="center" valign="top">
                            <div id="itemNamesGoldListDiv"><?php include 'omslingl.php'; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

