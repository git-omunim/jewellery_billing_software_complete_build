<?php
/*
 * ***************************************************************
 * @tutorial: Whatsapp API
 * ***************************************************************
 * 
 * Created on 29 APRIL 2022 12:03:12 PM
 *
 * @FileName: omwhatsapppanel.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omecom_mvc
 * @version 1.0.0
 * @Copyright (c) 2022 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2022 SoftwareGen Technologies
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
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$staffId = $_SESSION['sessionStaffId'];
//
if ($staffId != '')
    $instanceId = $sessionOwnerId . '_' . $staffId;
else
    $instanceId = $sessionOwnerId;
//
if ($_SESSION['sessionStaffMobNo'] == '')
    $mobileNum = $_SESSION['sessionOwnerMobNo'];
else
    $mobileNum = $_SESSION['sessionStaffMobNo'];
//echo "<pre>";
//print_r($_SESSION['sessionOwnerMobNo']);
//echo "</pre>";
//
if ($_REQUEST['apiCall'] == 'yes') {
    include 'omwpapi.php';
}
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
            <?php if ($_SESSION['sessionOwnIndStr'][33] != 'A') { ?>
                <tr>
                    <td style="color: #cb4335;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;font-size: 14px;">
                        &nbsp;&nbsp;Whatsapp API feature is chargeable and its add-on feature. To activate please contact with Support Team!
                    </td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td width="50%" align="middle">
                        <div class="product-item" style="width:99%; height:425px;padding: 0px;">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                    <td class="paddingTop4 textLabel14CalibriBrownBold" 
                                        style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" 
                                        align="center">
                                        Create WhatsApp Instance Here!
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table valign="middle" cellspacing="0" cellpadding="0" border="0" align="center" style="padding-top:20px;">
                                            <tr>
                                                <td valign="middle" align="right" style="font-size: 16px; font-weight: bold; color: #239b56;">
                                                    <?php
                                                    $querySecretKey = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$instanceId' and omly_option='whatsapp_secret_id_$instanceId'";
                                                    //
                                                    $resSecretKey = mysqli_query($conn, $querySecretKey);
                                                    $noOfRowsSecretKey = mysqli_num_rows($resSecretKey);
                                                    //echo $querySecretKey;
                                                    //
                                                    if ($noOfRowsSecretKey > 0) {
                                                        //
                                                        $rowSecretKey = mysqli_fetch_assoc($resSecretKey);
                                                        $secretKey = $rowSecretKey['omly_value'];
                                                        //
                                                        $_SESSION['wa_instance_id'] = $secretKey;
                                                        //
                                                        echo "Instance '$secretKey' is already created!";
                                                        //
                                                    } else {
                                                        ?>
                                                        <button id="wa_instance_create_btn" onclick="wa_instance_create('<?php echo $sessionOwnerId; ?>');" style="width:120px;height:30px;font-size: 14px;cursor: pointer;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Start Instance</button>
                                                    <?php } ?>
                                                </td>                                      
                                            </tr>                               
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:20px" align="middle">
                                        <?php
                                        if ($noOfRowsSecretKey > 0) {
                                            ?>
                                            <button id="wa_instance_restart_btn" onclick="wa_instance_restart();" style="width:120px;height:30px;font-size: 14px;cursor: pointer;color: #b7950b;border: 1px solid #d68910;background-color: #f7dc6f;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Re-start</button>
                                            <button id="wa_instance_terminate_btn"  onclick="wa_instance_terminate();" style="width:120px;height:30px;font-size: 14px;cursor: pointer;color: #a93226;border: 1px solid #922b21;background-color: #f5b7b1;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Terminate</button>
                                        <?php } ?>
                                    </td> 
                                </tr>
                                <tr>
                                    <td style="padding:20px" align="middle">
                                        <?php
                                        $testMess = urlencode('Hello\nWelcome to Online Munim.\nTo get latest updates, please subscribe our YouTube Channel \nhttps://www.youtube.com/onlinemunim ');
                                        ?>
                                        <?php
                                        if ($noOfRowsSecretKey > 0) {
                                            if ($mobileNum != '') {
                                                ?>
                                                <button id="wa_api_send_message_btn" name="wa_api_send_message_btn"  onclick="wa_api_send_message('<?php echo $mobileNum; ?>', '<?php echo $testMess; ?>', '', '');" style="width:230px;height:30px;font-size: 14px;cursor: pointer;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Send Test Message To <?php echo $mobileNum; ?></button>
                                            <?php } else { ?>
                                                Please update your mobile number, Mobile Number not found to send test message!
                                                <?php
                                            }
                                        }
                                        ?>
                                    </td> 
                                </tr>
                            </table>
                        </div>                 
                    </td>
                    <td width="50%" align="middle">
                        <div class="product-item" style="width:99%; height:425px;padding: 0px;">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                    <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                        <table valign="middle" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tr>
                                                <td>
                                                    <?php
                                                    if ($noOfRowsSecretKey > 0) {
                                                        ?>
                                                        <img id="whatsappImage" onload="wa_qrcode_generate();"
                                                             src="<?php echo $documentRoot; ?>/images/whatsapp24.png" />
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    &nbsp;Scan Image with WhatsApp Application (Link Device Option)
                                                </td>
                                            </tr>                               
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table valign="middle" cellspacing="0" cellpadding="0" border="0" align="center" style="padding-top:20px">
                                            <tr>
                                                <td valign="top" align="right">
                                                    <div id="qrcode_display" style="margin-bottom:10px;">
                                                        <img id="qrcode_image" style='display:block;' src="" alt="First Create Instance!"/>
                                                    </div>
                                                </td>                                      
                                            </tr>                               
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="middle">
                                        <?php
                                        if ($noOfRowsSecretKey > 0) {
                                            ?>
                                            <button id="ref_btn" onclick="wa_qrcode_generate();" style="width:120px;height:30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-weight:600;text-transform:uppercase;">Refresh</button>
                                        <?php } ?>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </td> 
                </tr>
            <?php } ?>
        </table>
        
       <!--- select payment gateway options for E-commerce @RANI15JAN2024---> 
        
       <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" style="border-bottom:1px solid #c1c1c1;padding-bottom:10px;">
           <tr>
               <td width="50%">
                   <h3 style="font-size: 19px; font-weight:600; color: #D76B00; margin-bottom: 5px;">Payment Gateway Setting Panel</h3>
               </td>
              <?php if($_SESSION['sessionOwnIndStr'][2] ==  'S' ||  $_SESSION['sessionOwnIndStr'][2] ==  'A'){ ?>
                 <td width="50%">
                    <table width="100%" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td width="50%">
                                <h3 style="font-size: 19px; font-weight:600; color: #D76B00; margin-bottom: 5px;">Paytm POS Setting Panel</h3>
                            </td>
                            <td align="right" width="50%">
                                <button type="button" class="frm-btn" onclick="openDocpop();"/>REQUIRED DOCUMENT</button>                         
                            </td>
                        </tr> 
                    </table>
               </td>
              <?php  } ?>
           </tr>
           <tr>
               <td width="50%" valign="top" align="center"> 
                   <div class="product-item" style="width:99%; height:auto;padding: 0px;margin-top:1%;">
                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                   <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                     PAYMENT GATEWAY
                                   </td>
                               </tr>
                               <tr>
                                   <td title="Click here to Select Patment Gateway Options!" align="center">
                                       <table valign="top" cellspacing="2" cellpadding="2" border="0" align="center" width="80%">
                                           <tr>
                                               <td align="left" >
                                                   <label class="textLabel14CalibriBlue">SELECT PAYMENT GATEWAY</label>
                                               </td>
                                                   <td valign="top" align="right" colspan="">
                                                        <select style="height:30px;width:100%;border:1px solid #c1c1c1;" onchange="setLayoutFieldInDb('paymentGateway', this.value);">
                                                           <option class="content-mess-blue">SELECT PAYMENT GATEWAY</option>
                                                           <option class="content-mess-blue">PHONE PAY</option>
                                                           <option class="content-mess-blue">RAZORPAY</option>
                                                           <option class="content-mess-blue">PAYTM</option>
                                                       </select>
                                                   </td>
                                               </tr>
                                               <tr>
                                                   
                                                   <td width="30%" valign="bottom" align="left">
                                                       <label class="textLabel14CalibriBlue">&nbsp;M ID</label>
                                                   </td>
                                                   <td valign="bottom" align="left" width="60%">
                                                       <input type="text"  class="lgn-txtfield-middle" placeholder="M ID" name="appMId" style="width:100%;height:30px;border:1px solid #c1c1c1;">
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <td width="30%" valign="bottom" align="left">
                                                       <label class="textLabel14CalibriBlue">&nbsp;KEY</label>
                                                   </td>
                                                   <td valign="bottom" align="left" width="60%">
                                                       <input type="text"  class="lgn-txtfield-middle" placeholder="Key" name="appMId" style="width:100%;height:30px;border:1px solid #c1c1c1;">
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <td></td>
                                                   <td align="center" colspan="2">
                                                       <div style="margin:5px 0;">
                                                           <button type="submit" id="submit" name="" value="Submit" onclick="setLayoutFieldInDb(&quot;anniverserySmsTemplate&quot;, document.getElementById(&quot;anniverserySmsTemplate&quot;).value);" class="btn btn1 btn1Hover om_btn_style" style="width:100%;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important; ">
                                                               <span>Submit </span>
                                                           </button>
                                                       </div>
                                                   </td>
                                               </tr>
                                       </table>
                                   </td>
                               </tr>
                               <tr>
                                   <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                       DEFAULT GATEWAY FOR SOFTWARE
                                   </td>
                               </tr>
                               <tr>
                                   <td title="Click here to Select Patment Gateway Options!" align="center">
                                       <table valign="top" cellspacing="2" cellpadding="5" border="0" align="center" width="80%">
                                           <tr>
                                               <td valign="top" align="right" colspan="">
                                                   <select style="height:30px;width:68%;border:1px solid #c1c1c1;" onchange="setLayoutFieldInDb('paymentGatewayForSw', this.value);">
                                                       <option class="content-mess-blue">SELECT PAYMENT GATEWAY</option>
                                                       <option class="content-mess-blue">PHONE PAY</option>
                                                       <option class="content-mess-blue">RAZORPAY</option>
                                                       <option class="content-mess-blue">PAYTM</option>
                                                   </select>
                                               </td>
                                           </tr> 
                                       </table>
                                   </td>
                               </tr>
                                <tr>
                                   <td class="paddingTop4 textLabel14CalibriBrownBold" style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;" align="center">
                                       DEFAULT GATEWAY FOR E-COMMERCE
                                   </td>
                               </tr>
                               <tr>
                                   <td title="Click here to Select Patment Gateway Options!" align="center">
                                       <table valign="top" cellspacing="2" cellpadding="5" border="0" align="center" width="80%">
                                           <tr>
                                               <td valign="top" align="right" colspan="">
                                                   <select style="height:30px;width:68%;border:1px solid #c1c1c1;" onchange="setLayoutFieldInDb('paymentGatewayForEcom', this.value);">
                                                       <option class="content-mess-blue">SELECT PAYMENT GATEWAY</option>
                                                       <option class="content-mess-blue">PHONE PAY</option>
                                                       <option class="content-mess-blue">RAZORPAY</option>
                                                       <option class="content-mess-blue">PAYTM</option>
                                                   </select>
                                               </td>
                                           </tr> 
                                       </table>
                                   </td>
                               </tr>
                     </table>
                   </div>
               </td>
               <td width="50%" valign="top" align="center">
        <!-- ************************************************************************************************ -->
        <!-- START CODE TO ADD PAYTM PAYMENT GATEWAY @SIMRAN:01DEC2023 -->
        <!-- ************************************************************************************************ -->
        <?php 
        //
         $queryPaytmMId = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'appMId'";
        $resPaytmMId = mysqli_query($conn, $queryPaytmMId );
        $rowPaytmMId = mysqli_fetch_array($resPaytmMId);
        $appMId = $rowPaytmMId['omly_value'];
        //
         $queryPaytmTId = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'appTId'";
        $resPaytmTId = mysqli_query($conn, $queryPaytmTId);
        $rowPaytmTId = mysqli_fetch_array($resPaytmTId);
        $appTId = $rowPaytmTId['omly_value'];

         $queryPaytmAppKey = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'appKey'";
        $resPaytmAppKey = mysqli_query($conn, $queryPaytmAppKey);
        $rowPaytmAppKey = mysqli_fetch_array($resPaytmAppKey);
        $appKey = $rowPaytmAppKey['omly_value'];
        //  
        if($_SESSION['sessionOwnIndStr'][2] ==  'S' ||  $_SESSION['sessionOwnIndStr'][2] ==  'A'){
        ?>
        <table width="100%" align="left" valign="top">
            <tr>
                <td align="left" width="50%">
                    <div class="product-item" style="width:99%; height:auto;padding: 0px;margin-top:1%;">
                    <table width="100%" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="center" class="paddingTop4 textLabel14CalibriBrownBold" 
                                style="background-color:#edf2ff;color: #025cbc;border-bottom:thin solid;border-color: #F9F9F9;padding-top:10px;padding-bottom: 10px;">
                                OPTION FOR PAYTM API CALL
                            </td>
                        </tr>
                          <tr>
                <td  title="PAYTM PAYMENT!"  >
                    <table  border="0" cellspacing="0" cellpadding="2" align="center" valign="top" style="padding-top: 5px; ">
                        <tr>
                            <td  width="35%" align="center" valign="bottom">
                                <label class="textLabel14CalibriBlue">&nbsp;M ID</label>
                            </td>   <td align="left" valign="bottom">
                                <input type="text" id="appMId" value="<?php echo $appMId; ?>" class="lgn-txtfield-middle" placeholder="M ID" name="appMId" style="width:100%;height:30px;border:1px solid #c1c1c1;"/>
                            </td></tr><!-- comment -->
                        <tr> 
                            <td  width="35%" align="center" valign="bottom">
                                <label class="textLabel14CalibriBlue">&nbsp;T ID</label>
                            </td>
                            <td width="35%" align="left" valign="bottom">
                                <input type="text" id="appTId" value="<?php echo $appTId; ?>" class="lgn-txtfield-middle"   placeholder="T ID" name="appTId" style="width:100%;height:30px;border:1px solid #c1c1c1;"/>
                            </td>
                        </tr>
                        <tr > 
                            <td width="35%" align="center" valign="bottom">
                                <label class="textLabel14CalibriBlue">&nbsp;KEY</label>
                            </td>
                            <td width="15%" align="left" valign="bottom">
                                <input type="text" id="appKey" value="<?php echo $appKey; ?>" class="lgn-txtfield-middle"  placeholder="KEY" name="appKey" style="width:100%;height:30px;border:1px solid #c1c1c1;"/>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding-top: 2px;padding-bottom: 5px;" align="right" colspan="2">
                                <!---Start to Changes button @AUTHOR: RENUKA13JULY2022----->
                                <div>
                                    <?php
                                    $inputId = "submit";
                                    $inputType = 'submit';
                                    $inputFieldValue = 'Submit';
                                    $inputIdButton = "submit";
                                    $inputNameButton = '';
                                    $inputTitle = '';
//                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
//                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
//
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                    $inputStyle = "width: 50%;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;";
                                    $inputLabel = 'Submit'; // Display Label below the text box
//
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'setLayoutFieldInDb("paytmPayment",document.getElementById("appMId").value+"/"+document.getElementById("appTId").value+"/"+document.getElementById("appKey").value);';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';  // This is the main division class for drop down 
                                    $inputselDropDownCls = '';  // This is class for selection in drop down
                                    $inputMainClassButton = ''; // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> 
                    </table>
                    </div>  
                </td> 
                <!--<td align="center" width="50%"></td>-->
            </tr>
          
        </table>
        <?php } ?>
        </td>
           </tr>
       </table>
         <div id = "myModalDocpop" class="modal" style="display: none;"></div>
        <!-- ************************************************************************************************ -->
        <!-- END CODE TO ADD PAYTM PAYMENT GATEWAY @SIMRAN:01DEC2023 -->
        <!-- ************************************************************************************************ -->
    </body>
</html>