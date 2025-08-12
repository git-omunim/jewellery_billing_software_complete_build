<?php
/*
 *
 * @FileName: omledsmodeldisp.php
 * @Author: SoftwareGen Developement Team
 * 
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
include_once 'ommpcmfcc.php';
?>
<!--ADD model For LED RATES-->
<div class = "modal-content" style = "overflow:hidden;width:50%;height:550px;padding-top:12px;">
    <span class = "closeFinePopUp" onclick ="closedsellpanel();" style="right:8px;background: #c80202;font-size:28px;height: 20px;border-radius: 50px;color: #fff;line-height:18px;margin-top: -4px;background: #c80202;width: 20px;">&times;</span>
    <br>
    <iframe id="videoIframe" height = "500px" width = "100%"  src = "<?php echo $documentRoot . "/include/php/omsellpanelpopup.php"; ?>" 
            style="border: 0px solid black;overflow:hidden;"> 
    </iframe>
</div>