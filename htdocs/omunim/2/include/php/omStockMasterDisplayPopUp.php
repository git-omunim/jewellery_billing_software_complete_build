<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: omStockMasterDisplayPopUp.php
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
$itmNmCode = $_POST['itmNmCode'];
$itmNmMetal = $_POST['itmNmMetal'];
$itmNmMetalType = $_POST['itmNmMetalType'];
$itmNmProdType = $_POST['itmNmProdType'];
$itmNmCategory = $_POST['itmNmCategory'];
$itmNmName = $_POST['itmNmName'];
//
$itmNmCode = $_GET['itmNmCode'];
$itmNmMetal = $_GET['itmNmMetal'];
$itmNmMetalType = $_GET['itmNmMetalType'];
$itmNmProdType = $_GET['itmNmProdType'];
$itmNmCategory = $_GET['itmNmCategory'];
$itmNmName = $_GET['itmNmName'];
$panelName = $_GET['panelName'];
//echo '$panelName =='.$panelName;
?>
<div id="girviIframePopUp" class="grey-back" style="border: 1px #FF7703 solid; margin-left: -125px;">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="center" valign="top">
                <!--- //change in filename @AUTHOR: SANDY22NOV13 -->
                <iframe src="<?php echo $documentRoot; ?>/include/php/omStockMasterDisplayPopUpFrame.php?panelName=<?php echo $panelName; ?>" 
                        width="920" height="350" frameborder="0" class="grey-back"></iframe>
            </td>
            <!--START Code To Add Girvi Id In getGirviInfoPopUpHideInCustHome() @AUTHOR:PRIYA27FEB13 -->
            <td align="right" valign="top">
                <?php if ($custHome == 'Yes') { ?>
                    <a class="links" style="cursor: pointer;"
                       onclick="getGirviInfoPopUpHideInCustHome('<?php echo $girviId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a> 
                   <?php } else { ?>
                    <a class="links" style="cursor: pointer;"
                       onclick="getGirviInfoPopUpHide('<?php echo $girviId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a>
                   <?php } ?>
            </td>
            <!--END Code To Add Girvi Id In getGirviInfoPopUpHideInCustHome() @AUTHOR:PRIYA27FEB13 -->
        </tr>
    </table>
</div>