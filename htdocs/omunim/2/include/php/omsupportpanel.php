<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 19 May, 2018 8:29:24 PM
 *
 * @FileName: omsupportpanel.php
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
//
require_once 'system/omssopin.php';
?>
<style>
    .center {
        display: block;
        margin: 0 auto;
        margin-top: 5px;
    }
</style>

<div id="mainMiddleCustHome" class="main_middle">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td valign="bottom" align="left" width="36px">
                <img src="<?php echo $documentRoot; ?>/images/support-32.png" alt="Online Munim Customer Support Panel" />
            </td>
            <td align="left" class="marginTop7"
                title="ऑनलाइन मुनीम ग्राहक सहायता पॅनल &#10;Online Munim Customer Support Panel!">
                <div class="textLabelHeading">Online Munim Customer Support Panel</div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <div class="hrGold"></div>
            </td>
        </tr>
        <tr>
            <td align="left" colspan="2">
                <div id="iframe_loader_child">
                    <img  src="<?php echo $documentRoot; ?>/images/ajaxLoad.gif" alt="loading..." class="center" onload="loadingDivClose();" />
                </div>
                <div id="onlineMunimSupportDiv">
                    <iframe id="onlineMunimSupportIframe" 
                            height="620px" width="100%" src="<?php echo $gbHTTP; ?>omunim.com/support.php" 
                            style="border: 0px solid black;overflow:hidden;"> 
                    </iframe>
                </div> 
            </td>
        </tr>
    </table>
</div>