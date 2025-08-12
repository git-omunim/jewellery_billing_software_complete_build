<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omuupand.php
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
$currentFileName = basename(__FILE__);include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            <div class="spaceLeft20">
                <h1>Udhaar Analysis</h1>
            </div>
        </td>
        <td align="center">
            <h2>Date: <?php echo date("d M Y"); ?></h2>
        </td>
        <td align="right" valign="bottom" class="frm-lbl">
            <div class="spaceRight20"></div>
        </td>
    </tr>
    <tr>
        <td colspan="3"><br />
        </td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td valign="middle" align="center" width="24px"><img
                            src="<?php echo $documentRoot; ?>/images/girvi1.png" alt="" /></td>
                    <td align="left" valign="middle">
                        <h2>Total Udhaar Money:</h2>
                        <h3><?php echo $globalCurrency.' '; ?> <?php include 'omunttud.php'; ?></h3>
                    </td>
                    <td align="left">&nbsp;</td>
                    <td valign="middle" align="center" width="24px"></td>
                    <td align="left" valign="middle">
                        <h2></h2>
                        <h3></h3>
                    </td>
                    <td align="left">&nbsp;</td>
                </tr>
                <tr>
                    <td valign="middle" align="center" width="24px"><img
                            src="<?php echo $documentRoot; ?>/images/girvi1.png" alt="" /></td>
                    <td align="left" valign="middle">
                        <h2>New Udhaar Money:</h2>
                        <h3><?php echo $globalCurrency.' '; ?> <?php include 'omuntdnu.php'; ?></h3>
                    </td>
                    <td align="left">&nbsp;</td>

                    <td valign="middle" align="center" width="24px"><img
                            src="<?php echo $documentRoot; ?>/images/girvi1.png" alt="" /></td>
                    <td align="left" valign="middle">
                        <h2>Deposit Udhaar Money:</h2>
                        <h3><?php echo $globalCurrency.' '; ?> <?php include 'omuntddp.php'; ?></h3>
                    </td>
                    <td align="left">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
