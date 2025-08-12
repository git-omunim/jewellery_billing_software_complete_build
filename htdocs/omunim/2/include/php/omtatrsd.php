<?php /**
 * 
 * Created on Jul 26, 2011 11:57:06 AM
 *
 * @FileName: omtatrsd.php
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
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';

require_once 'system/omssopin.php';
$sessionOwnerId = $_SESSION[sessionOwnerId];

$selFirmId = NULL;
if (isset($_GET['firmId'])) {
    $selFirmId = $_GET['firmId'];
} else {
    //if not selected assign session firm @AUTHOR: SANDY10JUL13
    $selFirmId = $_SESSION['setFirmSession'];
}
?>
<table border="0" align="center" cellpadding="2" cellspacing="1" width="100%">
    <tr>
        <td align="right" class="itemAddPnLabels12 paddingLeft30">
            Amount:&nbsp;
        </td>
        <td align="left">
            <input id="transAmt"
                   name="transAmt" spellcheck="false" type="text"
                   onkeydown="javascript: if(event.keyCode == 13){document.getElementById('transFromAcc').focus(); return false;}
                       else if(event.keyCode == 8 && this.value ==''){document.getElementById('transFirmId').focus(); return false;}"
                   spellcheck="false" class="lgn-txtfield12-req-arial" size="18" maxlength="20" />
        </td>
        <td align="right" class="itemAddPnLabels12">
            Subject:&nbsp;
        </td>
        <td align="left" class="frm-r1" valign="middle">
            <input id="transSub"
                   name="transSub" spellcheck="false" type="text"
                   onkeydown="javascript: if(event.keyCode == 13){document.getElementById('transactionCategory').focus(); return false;}
                       else if(event.keyCode == 8 && this.value ==''){document.getElementById('transFirmId').focus(); return false;}"
                   spellcheck="false" class="lgn-txtfield12-req-arial" size="35" maxlength="50" />
        </td>
    </tr>
    <tr>
        <td align="right" class="itemAddPnLabels12 paddingLeft30">
            From (CR):&nbsp;
        </td>
        <td align="left">
            <?php
            $prevFieldId = 'transAmt';
            $nextFieldId = 'transToAcc';
            $allAccountDivId = 'transFromAcc';
            $accIdSelected = '';
            $accNameSelected = '';
            $allAccountDivClass = 'lgn-txtfield12-req';
            $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
            include 'omacpalt.php';
            ?>
        </td>
        <td align="right" class="itemAddPnLabels12">
            Category:&nbsp;
        </td>
        <td align="left" class="frm-r1" valign="middle">
            <SELECT class="lgn-txtfield12-req-arial" id="transactionCategory" name="transactionCategory"
                    onkeydown="javascript: if(event.keyCode == 13){document.getElementById('transactionDesc').focus(); return false;}
                        else if(event.keyCode == 8 && this.value ==''){document.getElementById('transSub').focus(); return false;}"
                    spellcheck="false">
                <OPTION value="NotSelected">~ Select Transaction Category ~</OPTION>
                <OPTION value="Business" >Business Transaction</OPTION>
                <OPTION value="Personal" >Personal Transaction</OPTION>
                <OPTION value="Other" >Other Transaction</OPTION>
            </SELECT>
        </td>
    </tr>
    <tr>
        <td align="right" valign="top" class="itemAddPnLabels12 paddingLeft30">
            To (DR):&nbsp;
        </td>
        <td align="left" valign="top">
            <?php
            $prevFieldId = 'transFromAcc';
            $nextFieldId = 'transSub';
            $allAccountDivId = 'transToAcc';
            $accIdSelected = '';
            $accNameSelected = '';
            $allAccountDivClass = 'lgn-txtfield12-req';
            $firmIdSelected = $selFirmId; //@ADD CLASS NAME @AUTHOR:PRIYA31
            include 'omacpalt.php';
            ?>
        </td>
        <td align="right" valign="top" class="itemAddPnLabels12">
            Details:&nbsp;
        </td>
        <td align="left" class="frm-r1" valign="top">
            <textarea id="transactionDesc"
                      name="transactionDesc" class="textarea-fixed-border-trans" 
                      onkeydown="javascript: if(event.keyCode == 8 && this.value ==''){document.getElementById('transactionCategory').focus(); return false;}"
                      spellcheck="false" /></textarea>
        </td>
    </tr>
</table>