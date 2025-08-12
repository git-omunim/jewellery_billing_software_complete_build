<?php
/*
 * **************************************************************************************
 * @tutorial: WEBCAM IMAGE DIVISION NEW FILE @AUTHOR:MADHUREE-21AUGUST2021
 * **************************************************************************************
 *
 * Created on 20 AUGUST, 2021 5:28:54 PM
 *
 * @FileName: omwebcamdiv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.70
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
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
<script type="text/javascript" src="scripts/webcam.min.js"></script>
<div style="width:340px;height:260px;position: absolute;border: #AF7817 1px solid;background-color: #FFF8C6;z-index: 1;margin-left: -169px;border-radius:5px;">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <?php
        $count = $_REQUEST['count'];
        $div = $_REQUEST['div'];
        ?>
        <tr>
            <td colspan="2" align="right" valign="middle" class="paddingTop2">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" valign="top">
                            <div id="webcam_image_div<?php echo $count; ?>" style="width:300px;height:220px;">

                            </div>
                        </td>
                        <td align="right" valign="top">
                            <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="" onload="show_snapshot('<?php echo $count; ?>');return false;" />
                            <a style="cursor: pointer;" onClick="closeWebcamImageDiv('<?php echo $count; ?>', '<?php echo $div; ?>');" >
                                <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" style="z-index: 1;height:16px;margin-right:3px;margin-top:3px;" />
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="paddingTop2 padBott2" align="left">
                <div style="border-top:1px solid #AF7817;"></div>
            </td>
        </tr>
        <tr>
            <td align="center" valign="middle" width="50%"> 
                <button type="submit" id="TakeWebcamImage" onclick="take_snapshot('<?php echo $count; ?>');
                        return false;" class="btn btn-primary" 
                        style="height:25px;width:120px;font-weight:bold;font-size:14px;margin-top:2px;margin-bottom:3px;border-radius: 5px !important;text-align:center;color:#000080;background-color: #89B2ED;">
                    <span>CLICK IMAGE</span>
                </button>
            </td>
            <td align="center" valign="middle" width="50%">
                <button type="submit" id="TakeWebcamImage" onclick="closeWebcamImageDiv('<?php echo $count; ?>', '<?php echo $div; ?>');" class="btn btn-primary" 
                        style="height:25px;width:120px;font-weight:bold;font-size:14px;margin-top:2px;margin-bottom:3px;border-radius: 5px !important;text-align:center;color:#0C3C03;background-color: #6EE36E;">
                    <span>SAVE IMAGE</span>
                </button>
            </td>
        </tr>
    </table>
</div>