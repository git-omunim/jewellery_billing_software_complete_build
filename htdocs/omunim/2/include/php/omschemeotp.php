<?php
/*
 * **************************************************************************************
 * @tutorial: SCHEME OTP SENDING FILE FOR SCHEME CLOSE @AUTHOR:MADHUREE-20DEC2019
 * **************************************************************************************
 * 
 * Created on Dec 20, 2019 5:33:19 PM
 *
 * @FileName: omschemeotp.php
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
include_once 'ommpcmfc.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
?>
<?php
if ($kittyId == '') {
    $kittyId = $_GET['kittyId'];
}
if ($kittyCustId == '') {
    $kittyCustId = $_GET['kittyCustId'];
}
if ($kittyFirmId == '') {
    $kittyFirmId = $_GET['kittyFirmId'];
}
if ($kittyMetalType == '') {
    $kittyMetalType = $_GET['kittyMetalType'];
}
if ($finalAmt == '') {
    $finalAmt = $_GET['finalAmt'];
}
if ($totalPaidAmt == '') {
    $totalPaidAmt = $_GET['totalPaidAmt'];
}
if ($totalFinalRt == '') {
    $totalFinalRt = $_GET['totalFinalRt'];
}
if ($totalFinalWT == '') {
    $totalFinalWT = $_GET['totalFinalWT'];
}
if ($kitty_rate_tot == '') {
    $kitty_rate_tot = $_GET['kitty_rate_tot'];
}
if ($kittyCloseDay == '') {
    $kittyCloseDay = $_GET['kittyCloseDay'];
}
if ($kittyCloseMonth == '') {
    $kittyCloseMonth = $_GET['kittyCloseMonth'];
}
if ($kittyCloseYear == '') {
    $kittyCloseYear = $_GET['kittyCloseYear'];
}
$kittyBonusAmt = $_GET['kittyPaidBonusAmt'];
//echo $kittyCloseDay.'/'.$kittyCloseMonth.'/'.$kittyCloseYear;

//*************************************************************************************************************
// START CODE FOR OTP OPTION ON SCHEME CLOSING PANEL AFTER PAYMENT @MADHUREE-14JAN2020
//*************************************************************************************************************
$qSelSchemeOtpOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'schemeOtp'";
$resSchemeOtpOption = mysqli_query($conn, $qSelSchemeOtpOption);
$rowSchemeOtpOption = mysqli_fetch_array($resSchemeOtpOption);
$SchemeOtpOption = $rowSchemeOtpOption['omly_value'];
// *************************************************************************************************************
// END CODE FOR OTP OPTION ON SCHEME CLOSING PANEL AFTER PAYMENT @MADHUREE-14JAN2020
// *************************************************************************************************************
//*************************************************************************************************************
// START CODE FOR OTP OPTION ON SCHEME CLOSING PANEL AFTER PAYMENT 
//*************************************************************************************************************
$qSelSchemePayInAdvOtpOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'schemePaymentInAdvByOtp'";
$resSchemePayInAdvOtpOption = mysqli_query($conn, $qSelSchemePayInAdvOtpOption);
$rowSchemePayInAdvOtpOption = mysqli_fetch_array($resSchemePayInAdvOtpOption);
$SchemePayInAdvOtpOption = $rowSchemePayInAdvOtpOption['omly_value'];
// *************************************************************************************************************
// END CODE FOR OTP OPTION ON SCHEME CLOSING PANEL AFTER PAYMENT 
// *************************************************************************************************************

/* START CODE TO GET USER ID FROM DATABASE @AUTHOR-MADHUREE-27DEC2019 */
$qSelUserMobileNo = "SELECT user_mobile FROM user WHERE user_id='$kittyCustId' and user_owner_id='$_SESSION[sessionOwnerId]'";
$resSelUserMobileNo = mysqli_query($conn, $qSelUserMobileNo) or die("Error: " . mysqli_error($conn) . " with query " . $qSelUserMobileNo);
$rowSelUserMobileNo = mysqli_fetch_array($resSelUserMobileNo, MYSQLI_ASSOC);
$UserMobileNo = $rowSelUserMobileNo['user_mobile'];
/* END CODE TO GET USER ID FROM DATABASE @AUTHOR-MADHUREE-27DEC2019 */
/* START CODE TO SEND OTP ON MOBILE NUMBER WHEN CLICKING ON PAYMENT AT SCHEME PANEL @AUTHOR-MADHUREE-20DEC2019 */
$secCode = mt_rand(10000000, 99999999);
$secCodeMD5 = md5($secCode);
$query = "UPDATE user SET user_otp='$secCodeMD5' WHERE user_id='$kittyCustId'";
//echo '$query:'.$query.'<br>';
$resQuery = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn) . " with query " . $query);
$hardwareId = $_SESSION[sessionOwnerId];
parse_str(getTableValues("SELECT own_userid FROM owner WHERE own_id='$hardwareId'"));
$mobileNo = stripslashes($UserMobileNo);
$mobileNo = mysqli_real_escape_string($conn, $mobileNo);
$messType = 'TSMS';
$msgText = "Dear Customer, Your Scheme OTP is $secCode, please do not share the OTP. Thank you!%0AOnline Munim";
$msgText = stripslashes($msgText);
$msgText = mysqli_real_escape_string($conn, $msgText);
//
$msgText = urlencode($msgText);  //EN-CODE URL
//
//echo '$hardwareId:'.$hardwareId.'<br>';
//echo '$own_userid:'.$own_userid.'<br>';
//echo '$mobileNo:'.$mobileNo.'<br>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.omunim.in/include/php/onsmsapi.php");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "productKey=$hardwareId&ownUserId=$own_userid&mobileNo=$mobileNo&messType=$messType&msgText=$msgText");
$omSMSResult = curl_exec($ch);
//
curl_close($ch);
/* END CODE TO SEND OTP ON MOBILE NUMBER WHEN CLICKING ON PAYMENT AT SCHEME PANEL @AUTHOR-MADHUREE-20DEC2019 */
?>
<!-- START CODE FOR LAYOUT OF OTP VERIFICATION AT SCHEME PANEL @AUTHOR-MADHUREE-20DEC2019 -->
<!--<form action="<?php echo $documentRootBSlash; ?>/include/php/omschotpval.php" method="POST">-->
<table width="100%">
    <tr class="portlet green-crusta box">
        <td colspan="" class="blueCalibri14Font" style="margin-left: 35px;">
            <div class="spaceLeft5">SCHEME OTP PANEL</div>
        </td>
    </tr>
    <tr>
        <td>
            <table class="textBoxCurve1px" border="0" cellpadding="0" cellspacing="2" width="350px" align="center" >
                <tbody align="center">
                    <tr>
                        <td>
                            <table align="center" border="0" style="width:165%">
                                <tr>
                                    <td class="paddingTop4 textLabel14CalibriBrownBold" align="" >
                                        <table valign="top" border="0" cellpadding="2" cellspacing="0" align="" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" align="center">
                                                        PLEASE ENTER THE OTP
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="paddingTop4 textLabel14CalibriBrownBold" align="center">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" align="center">
                                                        <input type="hidden" id="finalBonusAmountToPay" name="finalBonusAmountToPay" value="<?php echo $kittyBonusAmt; ?>" />
                                                        <input type="hidden" id="SchemeOtpOption" name="SchemeOtpOption" value="<?php echo $SchemeOtpOption; ?>">
                                                        <div id="user_otp_validate" name="user_otp_validate" style="color: red;font-size: 12px;"></div>
                                                        <input id="user_otp" name="user_otp" placeholder="OTP(ONE TIME PASSWORD)" value="" spellcheck="false" class="textBoxCurve1px textLabel14CalibriGrey backFFFFFF" size="26" maxlength="20" type="text" style="margin-bottom: 25px;margin-top: 25px;text-align: center;">
                                                        <input id="dbOtp" name="dbOtp" type="hidden" value="<?php echo $secCode; ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table valign="top" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <?php
                                        if ($SchemePayInAdvOtpOption == 'YES') {
                                            $payInvoiceNo = getInvoiceNum($userId, 'MONEY', 'ADV MONEY');
                                            $invArr = explode('*', $payInvoiceNo);
                                            $utin_pre_invoice_no = $invArr[0];
                                            $utin_invoice_no = $invArr[1];
                                            ?>
                                            <td class="textLabel14CalibriBrownBold" align="center">
                                                <input value="SUBMIT" class="btn blue btn-block" maxlength="30" size="10" 
                                                       style="width:80px;margin-bottom: 20px;margin-left: 30px;" type="button" 
                                                       onclick="javascript:paymentInAdvanceMoney('<?php echo $kittyId; ?>',
                                                                       '<?php echo $kittyCustId; ?>',
                                                                       '<?php echo $kittyFirmId; ?>',
                                                                       '<?php echo $kittyMetalType; ?>',
                                                                       '<?php echo $finalAmt; ?>',
                                                       <?php if ($kittyMetalType == 'CASH') { ?>'', '', '',
                                                       <?php } else { ?>
                                                                   '<?php echo $totalPaidAmt; ?>',
                                                                           '<?php echo $totalFinalRt; ?>',
                                                                           '<?php echo $totalFinalWT; ?>',<?php } ?>
                                                               'schemeMetalPayment', '<?php echo $kitty_rate_tot; ?>',
                                                                       '<?php echo $kittyCloseDay; ?>',
                                                                       '<?php echo $kittyCloseMonth; ?>',
                                                                       '<?php echo $kittyCloseYear; ?>', 
                                                                       '<?php echo $utin_pre_invoice_no;?>',
                                                                       '<?php echo $utin_invoice_no;?>'
                                                                       );">
                                            </td>
<?php } else { ?>
                                            <td class="textLabel14CalibriBrownBold" align="center">
                                                <input value="SUBMIT" class="btn blue btn-block" maxlength="30" size="10" style="width:80px;margin-bottom: 20px;margin-left: 30px;" type="button" onclick="javascript:paymentPanelDisplay('<?php echo $kittyId; ?>',
                                                                '<?php echo $kittyCustId; ?>',
                                                                '<?php echo $kittyFirmId; ?>',
                                                                '<?php echo $kittyMetalType; ?>',
                                                                '<?php echo $finalAmt; ?>',
                                                <?php if ($kittyMetalType == 'CASH') { ?>'', '', '',
                                                <?php } else { ?>
                                                            '<?php echo $totalPaidAmt; ?>',
                                                                    '<?php echo $totalFinalRt; ?>',
                                                                    '<?php echo $totalFinalWT; ?>',<?php } ?>
                                                        '',
                                                                'schemeMetalPayment', '<?php echo $kitty_rate_tot; ?>',
                                                                '<?php echo $kittyCloseDay; ?>',
                                                                '<?php echo $kittyCloseMonth; ?>',
                                                                '<?php echo $kittyCloseYear; ?>', '<?php echo $SchemeOtpOption; ?>'
                                                                );">
                                            </td>
<?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table valign="top" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td class="textLabel14CalibriBrownBold" align="center">
                                            <input value="RESEND" class="btn blue btn-block" id="otpSubButt" maxlength="30" size="10" style="width:80px;margin-bottom: 20px;margin-right: 70px;margin-left: -20px;" type="button" 
                                                   onclick="javascript:otpPanelDisplay('<?php echo $kittyId; ?>',
                                                                   '<?php echo $kittyCustId; ?>',
                                                                   '<?php echo $kittyFirmId; ?>',
                                                                   '<?php echo $kittyMetalType; ?>',
                                                                   '<?php echo $finalAmt; ?>',
                                                   <?php if ($kittyMetalType == 'CASH') { ?>'', '', '',
                                                   <?php } else { ?>
                                                               '<?php echo $totalPaidAmt; ?>',
                                                                       '<?php echo $totalFinalRt; ?>',
                                                                       '<?php echo $totalFinalWT; ?>',<?php } ?>
                                                               '<?php echo $kitty_rate_tot; ?>',
                                                                   '<?php echo $kittyCloseDay; ?>',
                                                                   '<?php echo $kittyCloseMonth; ?>',
                                                                   '<?php echo $kittyCloseYear; ?>'
                                                                   );">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
<!--</form>-->
<!-- END CODE FOR LAYOUT OF OTP VERIFICATION AT SCHEME PANEL @AUTHOR-MADHUREE-20DEC2019 -->