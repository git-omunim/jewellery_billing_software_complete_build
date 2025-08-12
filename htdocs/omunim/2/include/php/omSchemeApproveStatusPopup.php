<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME APPROVE ATATUS CHANGING FILE @AUTHOR: HEMA-25FEB2020
 * **************************************************************************************
 * 
 * Created on feb 25, 2020 12:54:56 PM
 *
 * @FileName: omSchemeApproveStatusPopup.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
$kittyMondepId = $_GET['kittyMondepId'];
$kittyCustId = $_GET['kittyCustId'];
$delStatus = $_GET['delStatus'];
//echo '$delStatus = '.$delStatus.'</br>';
//echo '$kittymondepId : '.$kittyMondepId;
//echo '$kittyCustId : '.$kittyCustId;
?>
<div class="grey-back" style="">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" valign="top">
                <!--- //change in filename @AUTHOR: SANDY22NOV13 -->
                <iframe src="<?php echo $documentRoot; ?>/include/php/omSchemeApproveStatusPopupFrame.php?kittyMondepId=<?php echo $kittyMondepId; ?>&kittyCustId=<?php echo $kittyCustId; ?>&delStatus=<?php echo $delStatus; ?>" 
                        width="900" height="200" frameborder="0" class="grey-back"></iframe>
            </td>
            <td align="right" valign="top">
                <a class="links" style="cursor: pointer;"
                   onclick="navigatSchemeCollectionListApprovalPanel('<?php echo $delStatus; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a> 
            </td>
        </tr>
    </table>
</div>