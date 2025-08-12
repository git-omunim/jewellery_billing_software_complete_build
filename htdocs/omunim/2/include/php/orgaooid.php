<?php /**
 * 
 * Created on Aug 28, 2011 2:17:31 PM
 *
 * @FileName: orgaooid.php
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
 */ ?>
<?php
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
if ($metalType != 'Gold' && $metalType != 'Silver') {
    $metalType = $_POST['metalType'];
}
?>
<table border="0" cellpadding="0" cellspacing="2" width="100%">
    <tr align="left">
        <td width="100%" align="left">
            <table border="0" cellpadding="0" cellspacing="2" width="100%">
                <tr>
                    <td align="left" valign="middle" class="brownMess11">&nbsp;<font color="red">*</font>No. of Pieces</td>
                    <td align="left" valign="middle">&nbsp;&nbsp;&nbsp;</td>
                    <td align="center" class="brownMess11" valign="middle">&nbsp;<font color="red">*</font>Gross Weight</td>
                    <td align="left" valign="middle">&nbsp;&nbsp;&nbsp;</td>
                    <td align="right" class="brownMess11" valign="middle">&nbsp;<font color="red">*</font>Net Weight</td>
                </tr>
                <tr>
                    <td align="left" valign="middle">
                        <h5><input id="itemPieces" name="itemPieces" 
                                   type="text" value="  ~ Pieces ~ "
                                   onfocus="if(this.value == '  ~ Pieces ~ '){this.value = '';}"
                                   onblur="if(this.value == ''){this.value = '  ~ Pieces ~ ';}"
                                   spellcheck="false" class="lgn-txtfield" 
                                   size="10" maxlength="10" /></h5>
                    </td>
                    <td align="left" valign="middle">
                        &nbsp;&nbsp;&nbsp;
                    </td>
                    <td align="center" class="frm-r1" valign="middle">
                        <div id="itemGrossWeightDiv">
                            <h5><input id="grossWeight" name="grossWeight" type="text" 
                                       onfocus="if(this.value == ' ~ Gross Weight ~'){this.value = '';}"
                                       onblur="if(this.value == ''){this.value = ' ~ Gross Weight ~';} if(this.value != ''){document.getElementById('itemWeight').value = this.value;}"
                                       value=" ~ Gross Weight ~"
                                       spellcheck="false" class="lgn-txtfield" size="15" maxlength="15" />
                                <select id="grossWeightType" name="grossWeightType" class="lgn-txtfield"
                                         onchange ="document.getElementById('weightType').value = this.value;">
                                    <option value="NotSelected">~ Weight ~</option>
                                    <option value="KG">Kilo Gram</option>
                                    <option value="GM" selected>Gram</option>
                                    <option value="MG">Milli Gram</option>
                                </select>
                            </h5>
                        </div>
                    </td>
                    <td align="left" valign="middle">
                        &nbsp;&nbsp;&nbsp;
                    </td>
                    <td align="right" class="frm-r1" valign="middle">
                        <div id="itemNetWeightDiv">
                            <h5><input id="itemWeight" name="itemWeight" type="text" 
                                       onfocus="if(this.value == ' ~ Net Weight ~'){this.value = '';}"
                                       onblur="if(this.value == ''){this.value = ' ~ Net Weight ~';}"
                                       value=" ~ Net Weight ~"
                                       spellcheck="false" class="lgn-txtfield" size="15" maxlength="15" />
                                <select id="weightType" name="weightType" class="lgn-txtfield">
                                    <option value="NotSelected">~ Weight ~</option>
                                    <option value="KG">Kilo Gram</option>
                                    <option value="GM" selected>Gram</option>
                                    <option value="MG">Milli Gram</option>
                                </select>
                            </h5>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" align="left">
            <table border="0" cellpadding="1" cellspacing="2" width="100%">
                <tr>
                    <td align="left">
                        <table border="0" cellpadding="0" cellspacing="1">
                            <tr>
                                <td align="right" valign="middle">
                                    <h4><font color="red">*</font>Item Name:</h4>
                                </td>
                                <td align="left" class="frm-r1" valign="middle">
                                    <div id="itemNameDiv">
                                        <?php
                                        if ($metalType != '') {
                                            include 'omigitnm.php';
                                        } else {
                                            ?>
                                            <select id="itemName" name="itemName" class="lgn-txtfield">
                                                <option value="NotSelected">~ First Select Item Type ~</option>
                                            </select>  
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <div id="itemWeightAndTunchDiv">
                            <table border="0" cellpadding="0" cellspacing="1">
                                <tr>
                                    <td align="right" valign="middle">
                                        <h4><font color="red">*</font>Item Tunch:</h4>
                                    </td>
                                    <td align="left" class="frm-r1" valign="middle">
                                        <div id="itemTunchDiv">  
                                            <?php
                                            if ($metalType != '') {
                                                include 'omigittn.php';
                                            } else {
                                                ?>
                                                <select id="itemTunch" name="itemTunch" class="lgn-txtfield">
                                                    <option value="NotSelected">~ First Select Item Type ~</option>
                                                </select>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>