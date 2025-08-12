<?php

/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 31 Jul, 2018 11:13:52 AM
 *
 * @FileName: omTransAccountPopUp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
$contactId = $_POST['contactId'];
//echo '$contactId:' . $contactId;
//print-r($_REQUEST);die; 
$custHome = $_POST['custHome'];
if ($contactId == '') {
    $contactId = $_GET['contactId'];
     $custHome = $_GET['custHome'];
} 
?>
<div id="contactIframePopUp" class="grey-back">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" valign="top">
          
                <iframe src="<?php echo $documentRoot; ?>/include/php/omleadscontctifrmpop.php?contactId=<?php echo $contactId; ?>" 
                        width="920" height="420" frameborder="0" class="grey-back"></iframe>
            </td> 
            <td align="right" valign="top">
                <?php if ($custHome == 'Yes') { ?>
                    <a class="links" style="cursor: pointer;"
                       onclick="getContactInfoPopUpHideInCustHome('<?php echo $contactId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a> 
                   <?php } else { ?>
                    <a class="links" style="cursor: pointer;"
                       onclick="getContactInfoPopUpHide('<?php echo $contactId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a>
                   <?php } ?>
            </td>
        </tr>
    </table>
</div>