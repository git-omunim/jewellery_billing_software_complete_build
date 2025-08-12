<?php
/* * *********Update Raw Metal*** */
/* Created on Jun 15, 2011 11:29:49 AM
 *
 * @FileName: omuprwmt.php
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
?>
<?php
require_once 'system/omssopin.php';

$showItemNameAddedDiv = $_GET['divMainMiddlePanel'];
$metalId = $_GET['metalId'];
$qSelectItemName = "SELECT * FROM raw_metals where raw_metal_id='$metalId'"; //To display data in this form
$resultItemName = mysqli_query($conn,$qSelectItemName);
$rowItemName = mysqli_fetch_array($resultItemName);
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <?php
    if ($showItemNameAddedDiv == "rawMetalAlreadyExist") {
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
                    <td>
                        <div class="spaceLeft10 paddingTop2">
                            <img src="<?php echo $documentRoot; ?>/images/goldRate.png" alt="new item" />
                        </div>
                    </td>
                    <td align="left">
                        <div class="spaceLeft4">
                            <div class="textLabel16CalibriNormalBrown">UPDATE RAW METAL</div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="70%" align="right" valign="bottom">
            <div class="analysis_div_rows">
                <?php
                if ($showRawMetalAddedDiv == "rawMetalAdded") {
                    include 'omzaaamg.php';
                } else if ($showRawMetalAddedDiv == "rawMetalUpdated") {
                    include 'omzaaumg.php';
                } else if ($showItemNameAddedDiv == "rawMetalAlreadyExist") {
                    ?>
                    <div id="ajax_upated_div" style="visibility: visible; background:none;" class="updateMess"><div class="spaceRight20">~ Metal Name Already Present, Please enter different Metal Name ~</div></div>
                    <?php
                }
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div id="addUpdateItemNameDiv" class="spaceLeftRight20Border">
                <!----Change in form attribute @AUTHOR: SANDY13DEC13--->
                <form name="update_rawMetal" id="update_rawMetal" enctype="multipart/form-data"
                      onsubmit="return updateDeleteRawItem(document.getElementById('update_rawMetal'));"
                      action="include/php/omupdtmt.php"  
                      method="post">
                    <table border="0" cellspacing="0" cellpadding="1" width="70%" align="center">
                        <tr>
                            <td align="center">
                                <table border="0" cellpadding="2" cellspacing="0">
                                    <!--<tr align="left" valign="middle">
                                        <td align="left" class="frm-lbl"><font color="red">*</font>Raw Metal Name:</td>
                                    </tr>--->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1">
                                            <!--- Change in max length of metal name @AUTHOR: SANDY4OCT13 ---------------->
                                            <input id="addRawMetalName" 
                                                   value="<?php
                if ($_GET[itemName] != '') {
                    echo $_GET[itemName];
                } else {
                    echo $rowItemName['raw_metal_name'];
                }
                ?>"
                                                   name="addRawMetalName" spellcheck="false" type="text"
                                                   class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="35" maxlength="12" />
                                            <input id="rawMetalId" name="rawMetalId" value="<?php echo $metalId; ?>" type="hidden" />
                                            <div class="testfieldMess"></div>
                                        </td>
                                    </tr>
                                    <!--Start Code To Add Item Category @AUTHOR:PRIYA11APR13-->
                                    <!--<tr align="left" valign="middle">
                                        <td align="left" class="frm-lbl"><font color="red">*</font>Raw Metal Category:</td>
                                    </tr>--->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1">
                                            <input id="addRawMetalCategory" 
                                                   value="<?php
                                                   if ($_GET[itemName] != '') {
                                                       //echo $_GET[itemName];
                                                   } else {
                                                       echo $rowItemName['raw_metal_cat'];
                                                   }
                ?>"
                                                   name="addRawMetalCategory" spellcheck="false" type="text"
                                                   class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" size="35" maxlength="12" />
                                            <input id="rawMetalId" name="rawMetalId" value="<?php echo $_GET[metalId]; ?>" type="hidden" />
                                        </td>
                                    </tr>
                                    <!--End Code To Add Item Category @AUTHOR:PRIYA11APR13-->
                                    <!--<tr align="left" valign="middle">
                                        <td align="left" class="frm-lbl"><font color="red">*</font>Metal Type:</td>
                                    </tr>--->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1">
                                            <!-- START Select right value PHP code --> 
                                            <?php
                                            $selMetalType = $rowItemName['raw_metal_type'];

                                            switch ($selMetalType) {
                                                case "Gold":
                                                    $optionMetalType1 = "selected";
                                                    break;
                                                case "Silver":
                                                    $optionMetalType2 = "selected";
                                                    break;
                                                case "Other":
                                                    $optionMetalType3 = "selected";
                                                    break;
                                            }
                                            ?> 
                                            <SELECT class="textBoxCurve1px margin2pxAll textLabel12Calibri backF9F9F9" id="metalType" name="metalType">
                                                <OPTION value="NotSelected">~ Select Metal Type ~</OPTION>
                                                <OPTION value="Gold" <?php echo $optionMetalType1; ?>>Gold</OPTION>
                                                <OPTION value="Silver" <?php echo $optionMetalType2; ?>>Silver</OPTION>
                                                <OPTION value="Other" <?php echo $optionMetalType3; ?>>Other</OPTION>
                                            </SELECT> <!-- END Select right value PHP code -->
                                        </td>
                                    </tr>
                                   <!--- <tr align="left" valign="middle">
                                        <td align="left" class="frm-lbl">Comments:</td>
                                    </tr>-->
                                    <tr align="left" valign="middle">
                                        <td align="left" class="frm-r1"><textarea id="itemNameComments" placeholder="Comments"
                                                                                  name="itemNameComments" class="textBoxCurve1px margin2pxAll textLabel12Calibri_non backF9F9F9" rows="2" cols="40" /></textarea></td>
                                    </tr>
                                </table>
                            </td>
                            <!-------------Start to change code to display added image @AUTHOR: SANDY13DEC13----------------> 

                            <td align="center" valign="top" class="padBott3">
                                <div id="Image">
                                    <table border="0" cellpadding="1" cellspacing="0" align="center" valign="top" class="spaceLeft20">
                                        <tr>
                                            <td align="center" colspan="2">
                                                <input type="text" id="fileName" name="fileName" size="10"  value="<?php echo $rowItemName['raw_metal_snap_fname']; ?>"
                                                       class="lgn-txtfield-without-borderAndBackgroundCenter" readonly="readonly"/>
                                                <input type="hidden" id="rMImageLoadOption" name="rMImageLoadOption" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top" class="padBott2" colspan="2">
                                                <div id="add_raw_metal_image_div" name="add_raw_metal_image_div" class="add_stock_item_image_div" align="center">
                                                    <?php if ($rowItemName['raw_metal_snap_fname'] != '') { ?>
                                                        <a style="cursor: pointer;" 
                                                           onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omrwmtim.php?itstId=<?php echo "$metalId"; ?>&panel=snap&imageOf=MainRawMetalAddPanel',
                                                                   'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                   return false" ><!----Change in file name @AUTHOR: SANDY15DEC13-->
                                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omrwmtim.php?itstId=<?php echo "$metalId"; ?>&imageOf=MainRawMetalAddPanel" 
                                                                 width="50px" height="50px" border="0" style="border-color: #B8860B"/><!----Change in file name @AUTHOR: SANDY15DEC13-->
                                                        </a>
                                                    <?php } else { ?>
                                                        <input type="button" id="add_raw_metal_image_button" name="add_raw_metal_image_button" 
                                                               onclick="javascript: document.getElementById('rMImageLoadOption').value = 'IMG';"
                                                               class="add_stock_item_image_button" onclick="return false;" onsubmit="return false;" /> 
                                                           <?php } ?>
                                                    <input type="file" id="rMSelectPhotoIMG"
                                                           style="cursor: pointer;" name="rMSelectPhotoIMG"
                                                           class="add_stock_item_image_hidden"
                                                           onclick="javascript: document.getElementById('rMImageLoadOption').value = 'IMG';"
                                                           onchange="javascript: document.getElementById('fileName').value = this.value" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">
                                                <div id="file_input_div">
                                                    <div class="file_item_input_div" align="center">
                                                        <input type="button" value="COM" id="ComputerButt" class="frm-btn" 
                                                               onclick="javascript: document.getElementById('rMImageLoadOption').value = 'COM';" onsubmit="return false;" />
                                                        <input type="file" id="rMSelectPhoto"
                                                               style="cursor: pointer;" name="rMSelectPhoto"
                                                               class="file_input_hidden_gItem"
                                                               onclick="javascript: document.getElementById('rMImageLoadOption').value = 'COM';"
                                                               onchange="javascript: document.getElementById('fileName').value = this.value;" onsubmit="return false;" />
                                                    </div>
                                                </div>
                                                <div id="webcam_input_div" align="center" ></div>
                                            </td>
                                            <td align="right">
                                                <input type="submit" value="WEB" class="frm-btn" id="WebcamButt" name="WebcamButt" 
                                                       onclick="chngRawMetalImgLoadOpt(this.value, 'RawMetal');
                                                           return false;" onsubmit="return false;"
                                                       size="15" maxlength="30"/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                            <!-------------End to change code to display added image @AUTHOR: SANDY13DEC13----------------> 
                        </tr>
                    </table>
                    <table border="0" cellpadding="2" cellspacing="0" align="center"
                           width="100%">
                        <tr>
                            <td width="100%" align="center">
                                <table border="0" cellpadding="1" cellspacing="1" align="center">
                                    <tr>
                                        <td><input type="submit" value="Update" class="frm-btn" id="updateAction" name="updateAction"
                                                   onclick="setbuttonId(this);" maxlength="30" size="15" /></td>
                                        <td><input type="submit" value="Delete" class="frm-btn" id="updateAction" name="updateAction"
                                                   onclick="setbuttonId(this);" maxlength="30" size="15" /></td>
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
    if ($showItemNameAddedDiv == "ItemNameAlreadyExist") {
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
                    <h2>~ Existing Raw Metal List ~</h2>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" width="100%" valign="top">
                <div class="spaceLeftRight20Border" id="rawMetalListDiv">
                    <table border="0" cellspacing="0" cellpadding="2" width="100%">
                        <tr valign="top">
                            <td align="center" valign="top">
                                <div id="goldRawMetalListDiv"><?php include 'omlirwgl.php'; ?></div>
                            </td>
                            <td align="center" valign="top">
                                <div id="silverRawMetalListDiv"><?php include 'omlirwsl.php'; ?></div>
                            </td>
                            <td align="center" valign="top">
                                <div id="otherRawMetalListDiv"><?php include 'omlirwoi.php'; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>