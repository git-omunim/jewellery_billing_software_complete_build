<?php /**
 * 
 * Created on Aug 31, 2011 9:51:59 AM
 *
 * @FileName: organpdv.php
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
require_once 'system/omssopin.php';
?>
<?php
if ($_GET['custId'] != '') {
    $custId = $_GET['custId'];
}

$qSelGirviPackNo = "SELECT max(girv_packet_num) as girviPacketNo FROM girvi where girv_own_id='$_SESSION[sessionOwnerId]'";
$resGirviPackNo = mysqli_query($conn,$qSelGirviPackNo);
$rowGirviPackNo = mysqli_fetch_array($resGirviPackNo, MYSQLI_ASSOC);

$newGirviPacketNo = $rowGirviPackNo['girviPacketNo'] + 1;
?>    
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr align="left">
        <td align="left" colspan="2">

            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="right" colspan="2">
                        <hr color="#FD9A00" size="0.1px" />
                    </td>
                </tr>
                <tr align="left">
                    <td align="right" valign="top" colspan="2">
                        <div id="addGirviPacketDiv">
                            <table border="0" cellpadding="0" cellspacing="2" width="100%">
                                <tr align="left">
                                    <td width="100%" align="center">
                                        <table border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="right" valign="middle" class="girvi_head_maron" ><font color="red">*</font>Packet No. :</td>
                                                <td align="left" class="frm-r1" valign="middle">
                                                    <input id="packetNumber" name="packetNumber" type="text" value="<?php echo $newGirviPacketNo; ?>"
                                                           spellcheck="false" class="lgn-txtfield" size="20" maxlength="30" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td align="right" colspan="2">
            <hr color="#FD9A00" size="0.1px" />
        </td>
    </tr>
    <tr>
        <td align="left" colspan="2" valign="top">
            <table border="0" cellpadding="2" cellspacing="0" align="left" valign="top">
                <tr>
                    <td align="right" valign="middle">
                        <h4>Other Information:&nbsp;</h4>
                    </td>
                    <td align="left" class="brownMess12Arial"><textarea id="girviOtherInfo" 
                                                                        spellcheck="false" name="girviOtherInfo" 
                                                                        class="lgn-txtfield" rows="2" cols="75" ></textarea></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr align="left">
        <td align="right" valign="top" colspan="2">
            <table border="0" cellpadding="2" cellspacing="2" width="100%">
                <tr>
                    <td align="right" colspan="4">
                        <hr color="#FD9A00" size="0.1px" />
                    </td>
                </tr>
                <tr>
                    <td width="100%" align="center">
                        <div id="addGirviSubButDiv">
                            <table border="0" cellpadding="1" cellspacing="1" align="center">
                                <tr>
                                    <td><input type="submit" value="Submit" class="frm-btn" onclick="return setMoreItems(this);"
                                               maxlength="30" size="15" /></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>