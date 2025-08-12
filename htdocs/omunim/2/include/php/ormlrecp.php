<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormlrecp.php
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
require_once 'system/omssopin.php';
?>
<?php
$girviValuation;
$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];
$panel = $_POST['panel'];

if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $panel = $_GET['panel'];
}
//echo '$panel111111=='.$panel;
?>
<div id="girviIframePopUp" class="ShadowFrm">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" valign="top">
                <iframe src="<?php echo $documentRoot; ?>/include/php/ormlmnrc.php?mlId=<?php echo $mlId; ?>&loanId=<?php echo $loanId; ?>&panel=<?php echo $panel; ?>" 
                        width="100%" height="450" frameborder="0" class="bgWhite"></iframe>
                           <a class="links" style="cursor: pointer;position: absolute;right:35px;top:15px;"
                   onclick="getLoanInfoPopUpHide('<?php echo $loanId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" style="height:16px;"/></a>
            </td>
           
        </tr>
    </table>
</div>
