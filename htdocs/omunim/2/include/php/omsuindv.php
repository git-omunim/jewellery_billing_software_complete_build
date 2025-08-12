<?php
/*
 * Created on Aug 12, 2016
 *
 * @FileName: omsuindv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
$showItemNameAddedDiv = $_GET['getMessage'];
$qSelectItemName = "SELECT * FROM actionitem where acit_id='$_GET[schemeNameId]'";
//echo '$qSelectItemName='.$qSelectItemName;
$resultItemName = mysqli_query($conn,$qSelectItemName);
$rowItemName = mysqli_fetch_array($resultItemName);
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <?php
    if ($showItemNameAddedDiv == "SchemeNameAlreadyExist" || $showItemNameAddedDiv == "SchemeNameUpdated") {
        ?>
        <tr>
            <td align="right" colspan="2">
                <hr color="#B8860B" />
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td width="30%">
            <table border="0" cellspacing="0" cellpadding="0" class="spaceLeft20">
                <tr>
<!--                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/ring32.png" alt="new item" />
                        </div>
                    </td>-->
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">UPDATE NEW SCHEME</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="70%" align="right" valign="bottom">
            <div class="analysis_div_rows">
                <?php
                if ($showItemNameAddedDiv == "SchemeNameAdded") {
                    include 'omzaaamg.php';
                } else if ($showItemNameAddedDiv == "SchemeNameUpdated") {
                    include 'omzaaumg.php';
                } else if ($showItemNameAddedDiv == "SchemeNameAlreadyExist") {
                    ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;" class="updateMess"><div class="spaceRight20">~ Scheme Name Already Present, Please enter different Scheme Name ~</div></div>
                    <?php
                }
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div id="addUpdateSchemeNameDiv" class="spaceLeftRight20Border">
                <form name="update_schemeName" id="update_schemeName"
                      enctype="multipart/form-data" method="post"
                      action="include/php/omsuinup.php"
                      onsubmit="return updateDeleteSchemeName();">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr>
                            <td align="center" width="600px">
                                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                    <tr align="center" valign="middle">
                                        <td>
                                            <table>
                                                <tr>
                                                    <td align="left" class="frm-r1"><input id="addSchemeName"
                                                                                           value="<?php
                                                                                           if ($_GET[schemeName] != '') {
                                                                                               echo $_GET[schemeName];
                                                                                           } else {
                                                                                               echo $rowItemName['acit_desc'];
                                                                                           }
                                                                                           ?>"
                                                                                           name="addSchemeName" spellcheck="false" type="text"
                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                       document.getElementById('addSchemePrdTyp').focus();
                                                                                                       return false;
                                                                                                   }"
                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="30" maxlength="50" />
                                                        <input id="schemeNameId" name="schemeNameId" value="<?php echo $_GET[schemeNameId]; ?>" type="hidden" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <!--add item name in marathi Author:GAUR21JUL16-->
                                    <tr align="center" valign="middle">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td align="left" class="frm-r1">
                                                        <?php
                                                        $selSchemeType = $rowItemName['acit_scheme_prd_typ'];

                                                        switch ($selSchemeType) {
                                                            case "MONTH":
                                                                $selSchemeType1 = "selected";
                                                                break;
                                                            case "DAY":
                                                                $selSchemeType2 = "selected";
                                                                break;
                                                        }
                                                        ?> 

                                                        <SELECT class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="addSchemePrdTyp" name="addSchemePrdTyp"
                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('addSchemePrd').focus();
                                                                            return false;
                                                                        } else if (event.keyCode == 8) {
                                                                            document.getElementById('addSchemeName').focus();
                                                                            return false;
                                                                        }">
                                                            <OPTION value="MONTH" <?php echo $selSchemeType1; ?>>MONTH</OPTION>
                                                            <OPTION value="DAY" <?php echo $selSchemeType2; ?>>DAY</OPTION>
                                                        </SELECT> </td>


                                                    <td align="left" class="frm-r1"><input id="addSchemePrd"
                                                                                           value="<?php
                                                                                           if ($_GET[schemePrd] != '') {
                                                                                               echo $_GET[schemePrd];
                                                                                           } else {
                                                                                               echo $rowItemName['acit_scheme_prd'];
                                                                                           }
                                                                                           ?>"
                                                                                           name="addSchemePrd" spellcheck="false" type="text"
                                                                                           class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="18" maxlength="10" 
                                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                       document.getElementById('addSchemeAmtTyp').focus();
                                                                                                       return false;
                                                                                                   } else if (event.keyCode == 8) {
                                                                                                       document.getElementById('addSchemePrdTyp').focus();
                                                                                                       return false;
                                                                                                   }"/>
                                                        <input id="schemeNameId" name="schemeNameId" value="<?php echo $_GET[schemeNameId]; ?>" type="hidden" />

                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr align="center" valign="middle">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td align="left" class="frm-r1">
                                                        <?php
                                                        $selAmtType = $rowItemName['acit_scheme_amt_typ'];

                                                        switch ($selAmtType) {
                                                            case "AMOUNT":
                                                                $selAmtType1 = "selected";
                                                                break;
                                                            case "AMT %":
                                                                $selAmtType2 = "selected";
                                                                break;
                                                        }
                                                        ?> 
                                                        <SELECT class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="addSchemeAmtTyp" name="addSchemeAmtTyp"
                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('addSchemeAmt').focus();
                                                                            return false;
                                                                        } else if (event.keyCode == 8) {
                                                                            document.getElementById('addSchemePrd').focus();
                                                                            return false;
                                                                        }">
                                                            <OPTION value="AMOUNT" <?php echo $selAmtType1; ?>>AMOUNT</OPTION>
                                                            <OPTION value="AMT %" <?php echo $selAmtType2; ?>>AMT %</OPTION>
                                                        </SELECT> </td>


                                                    <td align="left" class="frm-r1"><input id="addSchemeAmt"
                                                                                           value="<?php
                                                                                           if ($_GET[schemeAmt] != '') {
                                                                                               echo $_GET[schemeAmt];
                                                                                           } else {
                                                                                               echo $rowItemName['acit_scheme_amt'];
                                                                                           }
                                                                                           ?>"
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
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="2" cellspacing="0" align="center"
                           width="100%">
                        <tr>
                            <td width="100%" align="center">
                                <table border="0" cellpadding="1" cellspacing="1" align="center">
                                    <tr>
                                        <td><input type="submit" value="Update" class="frm-btn" id="UpdateScheme" name="UpdateScheme"
                                                   onclick="setButtId(this);" maxlength="30" size="15" /></td>
                                        <td><input type="submit" value="Delete" class="frm-btn" id="UpdateScheme" name="UpdateScheme"
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
    <?php
//    ItemNameAlreadyExist
//    ItemNameUpdated
    if ($showItemNameAddedDiv == "SchemeNameAlreadyExist") {
        ?>
        <tr>
            <td colspan="2"><br />
            </td>
        </tr>
        <tr>
            <td colspan="2"><br />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="spaceLeft20">
                    <h2>~ Existing Scheme Names List ~</h2>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" width="100%" valign="top">
                <div class="spaceLeftRight20Border" id="itemNamesListDiv">
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
    <?php } ?>
</table>