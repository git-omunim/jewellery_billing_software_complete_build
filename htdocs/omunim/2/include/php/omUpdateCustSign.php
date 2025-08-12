<?php
/*
 * **************************************************************************************
 * @tutorial:  SAMPLE 1 Customer Sign Update  CHETAN 26 APR 2022
 * **************************************************************************************
 * 
 * Created on 26 APR 2022
 *
 *
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
<div class="modal-content"  style="width:90%; height:95vh;text-align: center;padding-top:5px;border:5px solid #f39c12;">
    <div class="modal-header" style="padding-top:0px;padding-bottom: 0px;">
        <table width="100%">
            <tr>
                <td align="center" style="width:350px;">
                    <span>
                        <h4 class="modal-title" style="text-align: center;font-size:20px;">
                            <strong>
                                Update Customer Signatory
                            </strong>
                        </h4>
                    </span>  
                </td>
                <td align="right" style="width:100px;">
                    <button type="button" onclick="closeUpdateSignModal();" 
                            data-dismiss="modal" style="background-color: transparent;border: none;margin-top:-10px;margin-left:10px;cursor: pointer;">
                        <strong style="font-size:25px;font-weight: bold;color:#736f6e;border:black;">&times;</strong>
                    </button> 
                </td>                                    
            </tr>
        </table>
        </div>
        <div class="modal-body">
            <?php
            $custId = $_REQUEST['userId'];
                $qSelectCustSnap = "SELECT user_sign_snap_fname FROM user WHERE user_id='$custId'";
                $resCustSnap = mysqli_query($conn,"$qSelectCustSnap");
                $rowCustSnap = mysqli_fetch_array($resCustSnap);
                $custSign = $rowCustSnap['user_sign_snap_fname'];
            //include 'omcdsign.php';
            ?>
            <div id="mainCdSign">
                <div>
                    <img src="<?php echo $documentRoot; ?>/images/spacer.gif" onload="javascript:loadCanvas();" />
                </div>
                <div id="signature-pad" class="m-signature-pad" style="width:90%;height:85vh;margin:10px;">
                    <link rel="stylesheet" href="<?php echo $documentRoot; ?>/css/signature-pad.css">
                    <?php if ($custSign != NULL) { ?>
                        <div class="m-signature-pad--body">
                         <canvas></canvas><img src="<?php echo $documentRootBSlash; ?>/include/php/omccsnim.php?cust_id=<?php echo "$custId"; ?>" 
                                                                          id="sign" border="0" style="border-color: #B8860B; width : 100%; height : 100%; margin-top : 40px" alt=""/>
                        </div>
                    <?php } else { ?>
                        <div class="m-signature-pad--body">
                            <canvas></canvas>
                        </div>
                    <?php } ?>
                    <div class="m-signature-pad--footer">
                        <div class="description">Sign above</div>
                        <button type="button" data-action="clear" style="left:10px;" class=button clear onclick="<?php if ($custSign != NULL || $custSign != '') { ?> clearOldSignImage();<?php } ?>">Clear</button>
                        <button type="button" data-action="save"  class="button save">Save</button>
                        <input type="hidden" id="custId" name="custId" value='<?php echo $custId; ?>'>
                        <input type="hidden" id="custSign" name="custSign" value='<?php echo $custSign; ?>'>
                        <input type="hidden" id="doc" name="doc" value='<?php echo $documentRoot; ?>'>
                        <input type="hidden" id="getsign" name="getsign" value='custInvoicesign'>
                        <input type="hidden" id="savedate" name="savedate" value='<?php echo date('Y-m-d H:i:s');?>'>
                        <input type="hidden" id="lastplace" name="lastplace" value="invoices">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="padding:2px;"> </div>
    </div> 
</div>
</div>