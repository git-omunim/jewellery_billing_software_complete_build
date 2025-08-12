<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: oritemtg.php
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
require_once 'system/omssopin.php';
?>
<?php
$itemId = $_GET['itemId'];
if ($itemId == '')
    $itemId = $_POST['itemId'];
//echo '$itemId' . $itemId;
?>
<div class="border-color-golden" >
    <table border="1" cellspacing="0" cellpadding="0" width="100%" valign="top"> 
        <tr>
        <select id="tagType" name="tagType" onchange="javascript:showSelectedItemTag(this.value,'<?php echo $itemId; ?>');">
            <option value="55X13" >55X13</option>
            <option value="64L" >64L</option>
            <option value="84L">84L</option>
        </select>
        </tr>
        <tr>
            <td align="center">
                <div id="itemTagSel">
                    <?php $id = $itemId;
                    include 'oritmtgd.php';
                    ?>
                </div>
            </td>
            <td align="right" valign="top" class="noPrint">
                <a class="links" style="cursor: pointer;"
                   onclick="getItemTagHide()"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a>
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="center" colspan="2" class="noPrint" width="50%">
                <a style="cursor: pointer;" onclick="printBarCodeDiv('itemTagSel')" id="print_link">
                    <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print' width="32px" height="32px" /> 
                </a> 
            </td>
        </tr>
    </table>
</div>