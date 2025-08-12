<?php
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php if ($submitButtDisplay == 'YES') { ?>
    <tr>
        <td align="center">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr>
        <td width="100%">
            <h2>~ Add More Item ~</h2>
        </td>
    </tr>
<?php } ?>
<tr align="left">
    <td align="left" valign="middle">
        <!-- START Customer ID --> 
        <input id="custId" name="custId" value="<?php echo $custId; ?>" type="hidden" /> 
        <!-- END Customer ID  -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr align="left">
                <td align="left" width="60%">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr align="left">
                            <td align="left" valign="middle">
                                <h4>Item Add Option:</h4>
                            </td>
                            <td>
                                <h5><select id="itemAddOption" name="itemAddOption" class="lgn-txtfield" 
                                            onchange="addGirviItemDiv(this);">
                                        <option value="OneByOne" selected>One by One</option>
                                        <option value="MultipleItems">Multiple Items</option>
                                    </select>
                                </h5>
                            </td>
                            <td align="right">
                                <div id="ajaxLoadGetItemListDiv" style="visibility: hidden" class="blackMess11">
                                    <?php include 'omzaajld.php'; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left" class="frm-r1" valign="middle">
                    <div id="itemTypeDiv">
                        <h5>
                            <font color="red">*</font>
                            <select id="itemType" name="itemType" class="lgn-txtfield" 
                                    onchange="changeItemNameOption(this);">
                                <option value="NotSelected">~ Item Type ~</option>
                                <option value="Gold">Gold</option>
                                <option value="Silver">Silver</option>
                                <option value="Other">Other</option>
                            </select>
                        </h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <hr color="#FD9A00" size="0.1px" />
                </td>
            </tr>
            <tr align="left">
                <td align="right" valign="top" colspan="2">
                    <div id="addGirviItemDiv">
                        <?php include 'olgaooid.php'; //Change in filename @AUTHOR: SANDY22NOV13 ?>
                    </div>
                </td>
            </tr>
        </table>
        <?php if ($submitButtDisplay == 'YES') { ?>
            <table border="0" cellpadding="2" cellspacing="2" width="100%">
                <tr>
                    <td align="right" colspan="4">
                        <hr color="#FD9A00" size="0.1px" />
                    </td>
                </tr>
                <tr>
                    <td width="100%" align="center">
                        <table border="0" cellpadding="1" cellspacing="1" align="center">
                            <tr>
                                <td><input type="submit" value="Submit" class="frm-btn" onclick="return setMoreItems(this);"
                                           maxlength="30" size="15" /></td>
                                <td><input type="submit" value="Add More Items" class="frm-btn" onclick="return setMoreItems(this);"
                                           maxlength="30" size="15" /></td>
                                <!--  <td><input type="submit" value="Reset" class="frm-btn"
                                                            onclick="navigation('')" maxlength="30"
                                                            size="15" /></td>-->
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        <?php } ?>
    </td>
</tr>