<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<!DOCTYPE html>
<html>
    <body>
        <table width="100%" align="center" valign="top">
            <tr>
                <td>
                    <h3 style="font-size: 19px; font-weight:600; color: #D76B00; margin-bottom: 5px;">WhatsApp API Panel</h3>
                </td>
            </tr>
            <tr>
                <td width="50%" align="middle">
                    <div class="product-item" style="width:99%; height:180px;padding: 0px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tr>
                                <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                    WhatsApp API Panel
                                </td>
                            </tr>
                            <tr>
                                <td title="Click here to Select Send SMS to Pending Laon and Interest Customers Option!" align="center">
                                    <table valign="top" cellspacing="0" cellpadding="0" border="0" align="center" style="padding-top:20px;">
                                        <tr>
                                            <td valign="top" align="right">
                                                <button id="cr_btn" onclick="instancecreate('<?php echo $sessionOwnerId; ?>');" style="width:120px;height:30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Start Instance</button>
                                            </td>                                      
                                        </tr>                               
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:20px" align="middle"> 
                                    <button id="res_btn" style="width:120px;height:30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Restart</button>
                                    <button id="tr_btn"  onclick="instanceterminate();" style="width:120px;height:30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Terminate</button>
                                </td> 
                            </tr>
                        </table>
                    </div>                 
                </td>
                <td width="50%" align="middle">
                    <div class="product-item" style="width:99%; height:180px;padding: 0px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tr>
                                <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                    WhatsApp API Panel
                                </td>
                            </tr>
                            <tr>
                                <td title="Click here to Select Send SMS to Pending Laon and Interest Customers Option!" align="center">
                                    <table valign="top" cellspacing="0" cellpadding="0" border="0" align="center" style="padding-top:20px">
                                        <tr>
                                            <td valign="top" align="right">
                                                <div id="qrcode_display" style="margin-bottom:10px;">
                                                    <img style='display:block;' id='base64image' src="<?php echo $result_transaction_arr['base64']; ?> " />
                                                </div>
                                            </td>                                      
                                        </tr>                               
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="middle"> 
                                    <button id="ref_btn" onclick="qrcodegenerate();" style="width:120px;height:30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Refresh</button>
                                </td> 
                            </tr>
                        </table>
                    </div>
                </td> 
            </tr>
        </table>
    </body>
</html>


