<?php
/*
 * **************************************************************************************
 * @tutorial: sms templates
 * **************************************************************************************
 * 
 * Created on Feb 19, 2014 3:43:01 PM
 *
 * @FileName: omsmstmp.php
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
 *  AUTHOR:SONALI
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
$accFileName = $currentFileName;
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
include 'ommpfndv.php';
require_once 'system/omssopin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MOBILE NOTIFICATION</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />       
        <script type="text/javascript" src="<?php echo $documentRootBSlash; ?>/scripts/orAddFunction_1_6.js"></script>
        <style>
            .custom-scroll::-webkit-scrollbar {
                width: 20px;
            }
            .custom-scroll {
                scrollbar-width: thin;
            }
        </style>
    </head>
    <body>
    </body>
</html>
<?php
$staff_own_id = $_SESSION['sessionStaffId'];
if ($staff_own_id != '') {
    $selEmpAccessDet = "SELECT * FROM access where acc_emp_id = '$staff_own_id' and acc_aplcatn ='panelAccess' and acc_type='smsAccess'";
    $resEmpAccessDet = mysqli_query($conn, $selEmpAccessDet);
    $rowEmpAccessDet = mysqli_fetch_array($resEmpAccessDet);
    $panelVal = $rowEmpAccessDet['acc_access'];
    if ($panelVal != 'true') {
        include 'ommpemac.php';
    }
}
?>
<!--START THIS CODE ADDED FOR AUTO-SMS TEMPLATE BY SONALI 14-SEP-2023-->
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
// *************************************************************************************************************
// START CODE FOR SEND SELL SMS SONALI-04Oct23
// *************************************************************************************************************
$sellSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellSMS'";
$resSellSMS = mysqli_query($conn, $sellSMSQuery);
$rowSellSMS = mysqli_fetch_array($resSellSMS);
$sellSMS = $rowSellSMS['omly_value'];
// *************************************************************************************************************
// END CODE FOR SEND SELL SMS SONALI-04-Oct-23
// *************************************************************************************************************
$sellEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellEmail'";
$resSellEmail = mysqli_query($conn, $sellEmailQuery);
$rowSellEmail = mysqli_fetch_array($resSellEmail);
$sellEmail = $rowSellEmail['omly_value']; 
// 
// START CODE FOR SEND ORDER SMS SONALI-04-Oct-23
// *************************************************************************************************************
$sendOrderSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendOrderSMS'";
$resSendOrderSMSGender = mysqli_query($conn, $sendOrderSMSQuery);
$rowSendOrderSMSGender = mysqli_fetch_array($resSendOrderSMSGender);
$sendOrderSMS = $rowSendOrderSMSGender['omly_value'];
//
$sendOrderEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendOrderEmail'";
$resSendOrderEmailGender = mysqli_query($conn, $sendOrderEmailQuery);
$rowSendOrderEmailGender = mysqli_fetch_array($resSendOrderEmailGender);
$sendOrderEmail = $rowSendOrderEmailGender['omly_value'];
// *************************************************************************************************************
// END CODE FOR SEND ORDER SMS SONALI-04-Oct-23
// ************************************************************************************************************
//
$sqlreadyordertemplate = "SELECT omly_value FROM omlayout WHERE omly_option = 'readyordertemplate'";
$resreadyordertemplate = mysqli_query($conn, $sqlreadyordertemplate);
$rowreadyordertemplate = mysqli_fetch_array($resreadyordertemplate);
$valreadyordertemplate = $rowreadyordertemplate['omly_value'];
//
$sqlreadyorderEmailtemplate = "SELECT omly_value FROM omlayout WHERE omly_option = 'readyorderEmail'";
$resreadyorderEmailtemplate = mysqli_query($conn, $sqlreadyorderEmailtemplate);
$rowreadyorderEmailtemplate = mysqli_fetch_array($resreadyorderEmailtemplate);
$valreadyorderEmail = $rowreadyorderEmailtemplate['omly_value'];
//
$sqlnewloantemplate = "SELECT omly_value FROM omlayout WHERE omly_option = 'newloantemplate'";
$resnewloantemplate = mysqli_query($conn, $sqlnewloantemplate);
$rownewloantemplate = mysqli_fetch_array($resnewloantemplate);
$valnewloantemplate = $rownewloantemplate['omly_value'];
//
//
$sqludhaardrdeposit = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrdeposit'";
$resudhaardrdeposit = mysqli_query($conn, $sqludhaardrdeposit);
$rowudhaardrdeposit = mysqli_fetch_array($resudhaardrdeposit);
$valudhaardrdeposit = $rowudhaardrdeposit['omly_value'];
//
$sqludhaardrdepositEmail = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrdepositEmail'";
$resudhaardrdepositEmail = mysqli_query($conn, $sqludhaardrdepositEmail);
$rowudhaardrdepositEmail = mysqli_fetch_array($resudhaardrdepositEmail);
$valudhaardrdepositEmail = $rowudhaardrdepositEmail['omly_value'];
//
$sqludhaardrreminder = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrreminder'";
$resudhaardrreminder = mysqli_query($conn, $sqludhaardrreminder);
$rowudhaardrreminder = mysqli_fetch_array($resudhaardrreminder);
$valudhaardrreminder = $rowudhaardrreminder['omly_value'];
//
$sqludhaardrreminderEmail = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrreminderEmail'";
$resudhaardrreminderEmail = mysqli_query($conn, $sqludhaardrreminderEmail);
$rowudhaardrreminderEmail = mysqli_fetch_array($resudhaardrreminderEmail);
$valudhaardrreminderEmail = $rowudhaardrreminderEmail['omly_value'];
//
$sellWhatsappQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellWhatsApp'";
$resSellWhatsapp= mysqli_query($conn, $sellWhatsappQuery);
$rowSellWhatsapp = mysqli_fetch_array($resSellWhatsapp);
$sellWhatsapp = $rowSellWhatsapp['omly_value'];
//
$sendOrderWtsappQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendOrderWhatsapp'";
$resSendOrderWtsapp = mysqli_query($conn, $sendOrderWtsappQuery);
$rowSendOrderWtsapp = mysqli_fetch_array($resSendOrderWtsapp);
$OrderWhatsapp = $rowSendOrderWtsapp['omly_value'];
//
//
$sendReadyOrderWtsappq = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendReadyOrderWhatsapp'";
$resSendReadyOrderWtsapp = mysqli_query($conn, $sendReadyOrderWtsappq);
$rowsendReadyOrderWtsapp  = mysqli_fetch_array($resSendReadyOrderWtsapp);
$readyOrderWtsapp = $rowsendReadyOrderWtsapp['omly_value'];
//
$newloanWtsappq = "SELECT omly_value FROM omlayout WHERE omly_option = 'newLoanWhatsapptmp'";
$resnewloanWtsapptmp = mysqli_query($conn, $newloanWtsappq);
$rownewloanWtsapptmp = mysqli_fetch_array($resnewloanWtsapptmp);
$valnewloanWtsapp = $rownewloanWtsapptmp['omly_value'];
//
$newloanEmail = "SELECT omly_value FROM omlayout WHERE omly_option = 'newloanEmailtemplate'";
$resnewloanEmail = mysqli_query($conn, $newloanEmail);
$rownewloanEmail = mysqli_fetch_array($resnewloanEmail);
$valnewloanEmailtemplate = $rownewloanEmail['omly_value'];
//
$sqludhaardrdwtsapp = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrdepositWhatsapp'";
$resudhhardwtsapp = mysqli_query($conn, $sqludhaardrdwtsapp);
$rowudhaardrdepwtsapp = mysqli_fetch_array($resudhhardwtsapp);
$udhaardrdepwtsapp = $rowudhaardrdepwtsapp['omly_value'];
//
//
$qudhaarRmndrwtsapp = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaardrRemainderWtsapp'";
$resUdhaarRmndrwtsapp = mysqli_query($conn, $qudhaarRmndrwtsapp);
$rowUdhaarRmndrwtsapp = mysqli_fetch_array($resUdhaarRmndrwtsapp);
$udhaarRmndrwtsapp = $rowUdhaarRmndrwtsapp['omly_value'];
//
//
$sqlSchemeEmiDueWtsap = "SELECT omly_value FROM omlayout WHERE omly_option = 'schemeEmiPaidWhatsapp'";
$resSchemeEmiDueWtsap = mysqli_query($conn, $sqlSchemeEmiDueWtsap);
$rowSchemeEmiDueWtsap = mysqli_fetch_array($resSchemeEmiDueWtsap);
$schemeEmiDueWtsap = $rowSchemeEmiDueWtsap['omly_value'];
//
//
$sendSchemeEmiDueWtsappq = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendWtsappToSchemeDueInstallments'";
$resSchemeEmiDueWtsapp = mysqli_query($conn, $sendSchemeEmiDueWtsappq);
$rowSchemeEmiDueWtsapp  = mysqli_fetch_array($resSchemeEmiDueWtsapp);
$schemeEmiDueWtsappq = $rowSchemeEmiDueWtsapp['omly_value'];
//
$expiredLoanWtsappq = "SELECT omly_value FROM omlayout WHERE omly_option = 'expiredLoanWhatsapp'";
$resExpiredLoanWtsapp= mysqli_query($conn, $expiredLoanWtsappq);
$rowExpiredLoanWtsapp = mysqli_fetch_array($resExpiredLoanWtsapp);
$valExpiredLoanWtsapp= $rowExpiredLoanWtsapp['omly_value'];
// *************************************************************************************************************
// START CODE FOR SEND SMS TO SCHEME INSTALLMENTS DUE DATE (BEFORE 5 DAYS) @SONALI
// *************************************************************************************************************
$sendSMSToSchemeDueInstallmentsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendSMSToSchemeDueInstallments'";
$resSendSMSToSchemeDueInstallmentsQuery = mysqli_query($conn, $sendSMSToSchemeDueInstallmentsQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendSMSToSchemeDueInstallmentsQuery);
$rowSendSMSToSchemeDueInstallments = mysqli_fetch_array($resSendSMSToSchemeDueInstallmentsQuery);
$sendSMSToSchemeDueInstallments = $rowSendSMSToSchemeDueInstallments['omly_value'];
//
$sendEmailToSchemeDueInstallmentsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendEmailToSchemeDueInstallments'";
$resSendSMSToSchemeDueInstallmentsQuery = mysqli_query($conn, $sendEmailToSchemeDueInstallmentsQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendEmailToSchemeDueInstallmentsQuery);
$rowSendEmailToSchemeDueInstallments = mysqli_fetch_array($resSendSMSToSchemeDueInstallmentsQuery);
$sendEmailToSchemeDueInstallments = $rowSendEmailToSchemeDueInstallments['omly_value'];
// *************************************************************************************************************
// END CODE FOR SEND SMS TO SCHEME INSTALLMENTS DUE DATE (BEFORE 5 DAYS) 
// *************************************************************************************************************
// 
// 
// *************************************************************************************************************
// START CODE FOR OPTION ON LAYOUT FOR SCHEME PAID INSTALLMENT  AUTO SMS SONALI-14OCT23
// *************************************************************************************************************
$setSchemeInstQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'schemeInstOpt'";
$resSchemeInst = mysqli_query($conn, $setSchemeInstQuery);
$rowSetSchemeInst = mysqli_fetch_array($resSchemeInst);
$setSetSchemeInst = $rowSetSchemeInst['omly_value'];
//
$setSchemeInstEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'schemeInstOptEmail'";
$resSchemeInstEmail = mysqli_query($conn, $setSchemeInstEmailQuery);
$rowSetSchemeInstEmail = mysqli_fetch_array($resSchemeInstEmail);
$setSetSchemeInstEmail = $rowSetSchemeInstEmail['omly_value'];
// *************************************************************************************************************
// END CODE FOR OPTION ON LAYOUT FOR SCHEME INSTALLMENT AUTO SMS SONALI-14OCT23
// *************************************************************************************************************
// 
// 
// START CODE TO SEND SMS FOR EXPIRED LOAN SONALI
// *************************************************************************************************************
$sendExpiredLaonSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendExpiredLaonSMS'";
$resExpiredLaonSMSQuery = mysqli_query($conn, $sendExpiredLaonSMSQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendExpiredLaonSMSQuery);
$rowExpiredLaonSMS = mysqli_fetch_array($resExpiredLaonSMSQuery);
$sendExpiredLaonSMS = $rowExpiredLaonSMS['omly_value'];
//
$sendExpiredLaonEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendExpiredLaonEmail'";
$resExpiredLaonSMSQuery = mysqli_query($conn, $sendExpiredLaonEmailQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendExpiredLaonEmailQuery);
$rowExpiredLaonEmail = mysqli_fetch_array($resExpiredLaonSMSQuery);
$sendExpiredLaonEmail = $rowExpiredLaonEmail['omly_value'];
// *************************************************************************************************************
// END CODE TO SEND SMS FOR EXPIRED LOAN SONALI
// *************************************************************************************************************
//
// START CODE FOR SEND SMS TO PENDING LOAN INTEREST @SONALI-05OCT2023
// *************************************************************************************************************
$sendPendingLaonAndInterestSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendPendingLaonAndInterestSMS'";
$resSendPendingLaonAndInterestSMSQuery = mysqli_query($conn, $sendPendingLaonAndInterestSMSQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAndInterestSMSQuery);
$rowSendPendingLaonAndInterestSMS = mysqli_fetch_array($resSendPendingLaonAndInterestSMSQuery);
$sendPendingLaonAndInterestSMS = $rowSendPendingLaonAndInterestSMS['omly_value'];
//
$sendPendingLaonAndInterestEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendPendingLaonAndInterestEmail'";
$resSendPendingLaonAndInterestEmailQuery = mysqli_query($conn, $sendPendingLaonAndInterestEmailQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAndInterestEmailQuery);
$rowSendPendingLaonAndInterestEmail = mysqli_fetch_array($resSendPendingLaonAndInterestEmailQuery);
$sendPendingLaonAndInterestEmail = $rowSendPendingLaonAndInterestEmail['omly_value'];
// *************************************************************************************************************
// END CODE FOR SEND SMS TO PENDING LOAN INTEREST@SONALI-05OCT2023
// *************************************************************************************************************
//
$sendPendingLaonAuctionSMSQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'LOAN_AUCTION_PROCESS_S'";
$resSendPendingLaonAuctionSMSQuery = mysqli_query($conn, $sendPendingLaonAuctionSMSQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAuctionSMSQuery);
$rowSendPendingLaonAuctionSMS = mysqli_fetch_array($resSendPendingLaonAuctionSMSQuery);
$sendPendingLaonAuctionSMS = $rowSendPendingLaonAuctionSMS['omly_value'];
//
$sendPendingLaonAuctionEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'LOAN_AUCTION_PROCESS_E'";
$resSendPendingLaonAuctionSMSQuery = mysqli_query($conn, $sendPendingLaonAuctionEmailQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAuctionEmailQuery);
$rowSendPendingLaonAuctionEmail = mysqli_fetch_array($resSendPendingLaonAuctionSMSQuery);
$sendPendingLaonAuctionEmail = $rowSendPendingLaonAuctionEmail['omly_value'];
//
$sendPendingLaonAuctionWtsappQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'LOAN_AUCTION_PROCESS_W'";
$resSendPendingLaonAuctionWtsappQuery = mysqli_query($conn, $sendPendingLaonAuctionWtsappQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAuctionWtsappQuery);
$rowSendPendingLaonAuctionWtsapp = mysqli_fetch_array($resSendPendingLaonAuctionWtsappQuery);
$valLoanAuctionwtsapp = $rowSendPendingLaonAuctionWtsapp['omly_value'];
//
$sendPendingLaonAuctionEmailQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sendPendingLaonAuctionEmail'";
$resSendPendingLaonAndInterestEmailQuery = mysqli_query($conn, $sendPendingLaonAuctionEmailQuery) or die("Error: " . mysqli_error($conn) . " with query " . $sendPendingLaonAuctionEmailQuery);
$rowSendPendingLaonAndInterestEmail = mysqli_fetch_array($resSendPendingLaonAndInterestEmailQuery);
$sendPendingLaonAndInterestEmail = $rowSendPendingLaonAndInterestEmail['omly_value'];
//
$sqlLoanIntWtsapp= "SELECT omly_value FROM omlayout WHERE omly_option = 'LaonAndInterestWhatsapp'";
$resLoanIntWtsapp = mysqli_query($conn, $sqlLoanIntWtsapp);
$rowLoanIntWtsapp = mysqli_fetch_array($resLoanIntWtsapp);
$valLoanInterestwtsapp = $rowLoanIntWtsapp['omly_value'];
//
$omLayquery = "SELECT 
        MAX(CASE WHEN omly_option = 'ADD_LOAN_S' THEN omly_value END) AS ADD_LOAN_S,
        MAX(CASE WHEN omly_option = 'ADD_LOAN_W' THEN omly_value END) AS ADD_LOAN_W,
        MAX(CASE WHEN omly_option = 'ADD_LOAN_E' THEN omly_value END) AS ADD_LOAN_E,
        MAX(CASE WHEN omly_option = 'LOAN_GRACE_S' THEN omly_value END) AS LOAN_GRACE_S,
        MAX(CASE WHEN omly_option = 'ADD_PRINCIPAL_S' THEN omly_value END) AS ADD_PRINCIPAL_S,
        MAX(CASE WHEN omly_option = 'ADD_PRINCIPAL_W' THEN omly_value END) AS ADD_PRINCIPAL_W,
        MAX(CASE WHEN omly_option = 'ADD_PRINCIPAL_E' THEN omly_value END) AS ADD_PRINCIPAL_E,
        MAX(CASE WHEN omly_option = 'DELETE_LOAN_S' THEN omly_value END) AS DELETE_LOAN_S,
        MAX(CASE WHEN omly_option = 'DELETE_LOAN_W' THEN omly_value END) AS DELETE_LOAN_W,
        MAX(CASE WHEN omly_option = 'DELETE_LOAN_E' THEN omly_value END) AS DELETE_LOAN_E,
        MAX(CASE WHEN omly_option = 'UPDATE_LOAN_S' THEN omly_value END) AS UPDATE_LOAN_S,
        MAX(CASE WHEN omly_option = 'UPDATE_LOAN_W' THEN omly_value END) AS UPDATE_LOAN_W,
        MAX(CASE WHEN omly_option = 'UPDATE_LOAN_E' THEN omly_value END) AS UPDATE_LOAN_E,
        MAX(CASE WHEN omly_option = 'REALEASE_LOAN_S' THEN omly_value END) AS REALEASE_LOAN_S,
        MAX(CASE WHEN omly_option = 'REALEASE_LOAN_W' THEN omly_value END) AS REALEASE_LOAN_W,
        MAX(CASE WHEN omly_option = 'REALEASE_LOAN_E' THEN omly_value END) AS REALEASE_LOAN_E,

        MAX(CASE WHEN omly_option = 'INTEREST_REMINDER_S' THEN omly_value END) AS INTEREST_REMINDER_S,
        MAX(CASE WHEN omly_option = 'INTEREST_REMINDER_W' THEN omly_value END) AS INTEREST_REMINDER_W,
        MAX(CASE WHEN omly_option = 'INTEREST_REMINDER_E' THEN omly_value END) AS INTEREST_REMINDER_E,
               
        MAX(CASE WHEN omly_option = 'TRANSFER_LOAN_S' THEN omly_value END) AS TRANSFER_LOAN_S,
        MAX(CASE WHEN omly_option = 'TRANSFER_LOAN_W' THEN omly_value END) AS TRANSFER_LOAN_W,
        MAX(CASE WHEN omly_option = 'TRANSFER_LOAN_E' THEN omly_value END) AS TRANSFER_LOAN_E,
               
        MAX(CASE WHEN omly_option = 'RELEASE_TRANSFER_LOAN_S' THEN omly_value END) AS RELEASE_TRANSFER_LOAN_S,
        MAX(CASE WHEN omly_option = 'RELEASE_TRANSFER_LOAN_W' THEN omly_value END) AS RELEASE_TRANSFER_LOAN_W,
        MAX(CASE WHEN omly_option = 'RELEASE_TRANSFER_LOAN_E' THEN omly_value END) AS RELEASE_TRANSFER_LOAN_E,
               
        MAX(CASE WHEN omly_option = 'DEPOSIT_LOAN_S' THEN omly_value END) AS DEPOSIT_LOAN_S,
        MAX(CASE WHEN omly_option = 'DEPOSIT_LOAN_W' THEN omly_value END) AS DEPOSIT_LOAN_W,
        MAX(CASE WHEN omly_option = 'DEPOSIT_LOAN_E' THEN omly_value END) AS DEPOSIT_LOAN_E,
        
        MAX(CASE WHEN omly_option = 'RELEASE_PRINCIPAL_S' THEN omly_value END) AS RELEASE_PRINCIPAL_S,
        MAX(CASE WHEN omly_option = 'RELEASE_PRINCIPAL_W' THEN omly_value END) AS RELEASE_PRINCIPAL_W,
        MAX(CASE WHEN omly_option = 'RELEASE_PRINCIPAL_E' THEN omly_value END) AS RELEASE_PRINCIPAL_E,
        
        MAX(CASE WHEN omly_option = 'SEND_OTP_S' THEN omly_value END) AS SEND_OTP_S,
        MAX(CASE WHEN omly_option = 'SEND_OTP_W' THEN omly_value END) AS SEND_OTP_W,
        MAX(CASE WHEN omly_option = 'SEND_OTP_E' THEN omly_value END) AS SEND_OTP_E, 
        


        MAX(CASE WHEN omly_option = 'NEW_REGISTRATION_S' THEN omly_value END) AS NEW_REGISTRATION_S,
        MAX(CASE WHEN omly_option = 'NEW_REGISTRATION_W' THEN omly_value END) AS NEW_REGISTRATION_W,
        MAX(CASE WHEN omly_option = 'NEW_REGISTRATION_E' THEN omly_value END) AS NEW_REGISTRATION_E,
        
        MAX(CASE WHEN omly_option = 'ADD_NEW_SCHEME_S' THEN omly_value END) AS ADD_NEW_SCHEME_S,
        MAX(CASE WHEN omly_option = 'ADD_NEW_SCHEME_W' THEN omly_value END) AS ADD_NEW_SCHEME_W,
        MAX(CASE WHEN omly_option = 'ADD_NEW_SCHEME_E' THEN omly_value END) AS ADD_NEW_SCHEME_E,

        MAX(CASE WHEN omly_option = 'SCHEME_EMI_PAY_S' THEN omly_value END) AS SCHEME_EMI_PAY_S,
        MAX(CASE WHEN omly_option = 'SCHEME_EMI_PAY_W' THEN omly_value END) AS SCHEME_EMI_PAY_W,
        MAX(CASE WHEN omly_option = 'SCHEME_EMI_PAY_E' THEN omly_value END) AS SCHEME_EMI_PAY_E,
        
        MAX(CASE WHEN omly_option = 'SCHEME_EMI_REMINDER_S' THEN omly_value END) AS SCHEME_EMI_REMINDER_S,
        MAX(CASE WHEN omly_option = 'SCHEME_EMI_REMINDER_W' THEN omly_value END) AS SCHEME_EMI_REMINDER_W,
        MAX(CASE WHEN omly_option = 'SCHEME_EMI_REMINDER_E' THEN omly_value END) AS SCHEME_EMI_REMINDER_E,
        
        MAX(CASE WHEN omly_option = 'CLOSE_SCHEME_S' THEN omly_value END) AS CLOSE_SCHEME_S,
        MAX(CASE WHEN omly_option = 'CLOSE_SCHEME_W' THEN omly_value END) AS CLOSE_SCHEME_W,
        MAX(CASE WHEN omly_option = 'CLOSE_SCHEME_E' THEN omly_value END) AS CLOSE_SCHEME_E,
        
        MAX(CASE WHEN omly_option = 'LOAN_RELEASE_S' THEN omly_value END) AS LOAN_RELEASE_S,
        MAX(CASE WHEN omly_option = 'LOAN_RELEASE_W' THEN omly_value END) AS LOAN_RELEASE_W,
        MAX(CASE WHEN omly_option = 'NLOAN_RELEASE_E' THEN omly_value END) AS LOAN_RELEASE_E,
        
        MAX(CASE WHEN omly_option = 'LOAN_INTEREST_PAY_S' THEN omly_value END) AS LOAN_INTEREST_PAY_S,
        MAX(CASE WHEN omly_option = 'LOAN_INTEREST_PAY_W' THEN omly_value END) AS LOAN_INTEREST_PAY_W,
        MAX(CASE WHEN omly_option = 'LOAN_INTEREST_PAY_E' THEN omly_value END) AS LOAN_INTEREST_PAY_E,
        
        MAX(CASE WHEN omly_option = 'PASSWORD_CHANGE_S' THEN omly_value END) AS PASSWORD_CHANGE_S,
        MAX(CASE WHEN omly_option = 'PASSWORD_CHANGE_W' THEN omly_value END) AS PASSWORD_CHANGE_W,
        MAX(CASE WHEN omly_option = 'PASSWORD_CHANGE_E' THEN omly_value END) AS PASSWORD_CHANGE_E,
        
        MAX(CASE WHEN omly_option = 'UDHAR_PAY_S' THEN omly_value END) AS UDHAR_PAY_S,
        MAX(CASE WHEN omly_option = 'UDHAR_PAY_W' THEN omly_value END) AS UDHAR_PAY_W,
        MAX(CASE WHEN omly_option = 'UDHAR_PAY_E' THEN omly_value END) AS UDHAR_PAY_E,
        
        MAX(CASE WHEN omly_option = 'SELL_PRODUCT_S' THEN omly_value END) AS SELL_PRODUCT_S,
        MAX(CASE WHEN omly_option = 'SELL_PRODUCT_W' THEN omly_value END) AS SELL_PRODUCT_W,
        MAX(CASE WHEN omly_option = 'SELL_PRODUCT_E' THEN omly_value END) AS SELL_PRODUCT_E,
        
        MAX(CASE WHEN omly_option = 'ORDER_TODAY_DELIVERED_S' THEN omly_value END) AS ORDER_TODAY_DELIVERED_S,
        MAX(CASE WHEN omly_option = 'ORDER_TODAY_DELIVERED_W' THEN omly_value END) AS ORDER_TODAY_DELIVERED_W,
        MAX(CASE WHEN omly_option = 'ORDER_TODAY_DELIVERED_E' THEN omly_value END) AS ORDER_TODAY_DELIVERED_E,
        
        MAX(CASE WHEN omly_option = 'DELIVERED_PRODUCT_S' THEN omly_value END) AS DELIVERED_PRODUCT_S,
        MAX(CASE WHEN omly_option = 'DELIVERED_PRODUCT_W' THEN omly_value END) AS DELIVERED_PRODUCT_W,
        MAX(CASE WHEN omly_option = 'DELIVERED_PRODUCT_E' THEN omly_value END) AS DELIVERED_PRODUCT_E,
        
        MAX(CASE WHEN omly_option = 'GET_REERAL_POINT_S' THEN omly_value END) AS GET_REERAL_POINT_S,
        MAX(CASE WHEN omly_option = 'GET_REERAL_POINT_W' THEN omly_value END) AS GET_REERAL_POINT_W,
        MAX(CASE WHEN omly_option = 'GET_REERAL_POINT_E' THEN omly_value END) AS GET_REERAL_POINT_E,     
        


        MAX(CASE WHEN omly_option = 'PAID_EMI_COUNT_S' THEN omly_value END) AS PAID_EMI_COUNT_S,
        MAX(CASE WHEN omly_option = 'PAID_EMI_COUNT_W' THEN omly_value END) AS PAID_EMI_COUNT_W,
        MAX(CASE WHEN omly_option = 'PAID_EMI_COUNT_E' THEN omly_value END) AS PAID_EMI_COUNT_E,
        
        MAX(CASE WHEN omly_option = 'CURRENT_EMI_NO_S' THEN omly_value END) AS CURRENT_EMI_NO_S,
        MAX(CASE WHEN omly_option = 'CURRENT_EMI_NO_W' THEN omly_value END) AS CURRENT_EMI_NO_W,
        MAX(CASE WHEN omly_option = 'CURRENT_EMI_NO_E' THEN omly_value END) AS CURRENT_EMI_NO_E,
        
        MAX(CASE WHEN omly_option = 'EMI_SERIAL_NO_S' THEN omly_value END) AS EMI_SERIAL_NO_S,
        MAX(CASE WHEN omly_option = 'EMI_SERIAL_NO_W' THEN omly_value END) AS EMI_SERIAL_NO_W,
        MAX(CASE WHEN omly_option = 'EMI_SERIAL_NO_E' THEN omly_value END) AS EMI_SERIAL_NO_E
           

    FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option IN ('ADD_LOAN_S', 'ADD_LOAN_W','ADD_LOAN_E','LOAN_GRACE_S','ADD_PRINCIPAL_S',"
        . " 'ADD_PRINCIPAL_W','ADD_PRINCIPAL_E','DELETE_LOAN_S','DELETE_LOAN_W','DELETE_LOAN_E','UPDATE_LOAN_S',"
        . "'UPDATE_LOAN_W','UPDATE_LOAN_E','REALEASE_LOAN_S','REALEASE_LOAN_W','REALEASE_LOAN_E','INTEREST_REMINDER_S',"
        . "'INTEREST_REMINDER_W','INTEREST_REMINDER_E','TRANSFER_LOAN_S','TRANSFER_LOAN_W','TRANSFER_LOAN_E','RELEASE_TRANSFER_LOAN_S',"
        . "'RELEASE_TRANSFER_LOAN_W','RELEASE_TRANSFER_LOAN_E','DEPOSIT_LOAN_S','DEPOSIT_LOAN_W','DEPOSIT_LOAN_E',"
        . "'RELEASE_PRINCIPAL_S','RELEASE_PRINCIPAL_W','RELEASE_PRINCIPAL_E','SEND_OTP_S','SEND_OTP_W','SEND_OTP_E',"
        . "'NEW_REGISTRATION_S','NEW_REGISTRATION_W','NEW_REGISTRATION_E','ADD_NEW_SCHEME_S','ADD_NEW_SCHEME_W','ADD_NEW_SCHEME_E',"
         . "'SCHEME_EMI_PAY_S','SCHEME_EMI_PAY_W','SCHEME_EMI_PAY_E','SCHEME_EMI_REMINDER_S','SCHEME_EMI_REMINDER_W','SCHEME_EMI_REMINDER_E',"
         . "'CLOSE_SCHEME_S','CLOSE_SCHEME_W','CLOSE_SCHEME_E','LOAN_RELEASE_S','LOAN_RELEASE_W','LOAN_RELEASE_E',"
         . "'LOAN_INTEREST_PAY_S','LOAN_INTEREST_PAY_W','LOAN_INTEREST_PAY_E','PASSWORD_CHANGE_S','PASSWORD_CHANGE_W','PASSWORD_CHANGE_E',"
         . "'UDHAR_PAY_S','UDHAR_PAY_W','UDHAR_PAY_E','SELL_PRODUCT_S','SELL_PRODUCT_W','SELL_PRODUCT_E',"
         . "'ORDER_TODAY_DELIVERED_S','ORDER_TODAY_DELIVERED_W','ORDER_TODAY_DELIVERED_E','DELIVERD_PRODUCT_S','DELIVERD_PRODUCT_W','DELIVERD_PRODUCT_E',"
         . "'GET_REERAL_POINT_S','GET_REERAL_POINT_W','GET_REERAL_POINT_E',"
        . "'PAID_EMI_COUNT_S','PAID_EMI_COUNT_W','PAID_EMI_COUNT_E','CURRENT_EMI_NO_S','CURRENT_EMI_NO_W','CURRENT_EMI_NO_E','EMI_SERIAL_NO_S','EMI_SERIAL_NO_W','EMI_SERIAL_NO_E')";
//    echo '$omLayquery---'.$omLayquery.'<br>';
    $resLayquery = mysqli_query($conn, $omLayquery);
    $rowLayquery = mysqli_fetch_assoc($resLayquery);
    //
    $sendAddLoanSMS = $rowLayquery['ADD_LOAN_S'];
    $valAddLoanWhatsapp = $rowLayquery['ADD_LOAN_W'];
    $AddLoanEmail = $rowLayquery['ADD_LOAN_E'];
    //
    $sendLoanGraceSMS = $rowLayquery['LOAN_GRACE_S'];
    //
    $AddLoanPrincipalSMS = $rowLayquery['ADD_PRINCIPAL_S'];
    $AddLoanPrincipalWhatsapp = $rowLayquery['ADD_PRINCIPAL_W'];
    $AddLoanPrincipalEmailEmail = $rowLayquery['ADD_PRINCIPAL_E'];
    //
    $sendDeleteLoanSMS = $rowLayquery['DELETE_LOAN_S'];
    $sendDeleteLoanSMSWhatsapp = $rowLayquery['DELETE_LOAN_W'];
    $sendDeleteLoanEmail = $rowLayquery['DELETE_LOAN_E'];
    //
    $sendUpdateLoanSMS = $rowLayquery['UPDATE_LOAN_S'];
    $sendUpdateLoanWhatsapp = $rowLayquery['UPDATE_LOAN_W'];
    $sendUpdateLoanEmail = $rowLayquery['UPDATE_LOAN_E'];
    //
    $sendReleaseLoanSMS = $rowLayquery['REALEASE_LOAN_S'];
    $sendReleaseLoanWhatsapp = $rowLayquery['REALEASE_LOAN_W'];
    $sendReleaseLoanEmail = $rowLayquery['REALEASE_LOAN_E'];
//
    $sendInterestReminderSMS = $rowLayquery['INTEREST_REMINDER_S'];
    $sendInterestReminderWhatsapp = $rowLayquery['INTEREST_REMINDER_W'];
    $sendInterestReminderEmail = $rowLayquery['INTEREST_REMINDER_E'];
    //
    $sendTransferLoanSMS = $rowLayquery['TRANSFER_LOAN_S'];
    $sendTransferLoanWhatsapp = $rowLayquery['TRANSFER_LOAN_W'];
    $sendTransferLoanEmail = $rowLayquery['TRANSFER_LOAN_E'];
    //
        $sendReleasetransloanSMS = $rowLayquery['RELEASE_TRANSFER_LOAN_S'];
    $sendReleasetransloanWhatsapp = $rowLayquery['RELEASE_TRANSFER_LOAN_W'];
    $sendReleasetransloanEmail = $rowLayquery['RELEASE_TRANSFER_LOAN_E'];
    //
    $sendDepositLoanSMS = $rowLayquery['DEPOSIT_LOAN_S'];
    $sendDepositLoanWhatsapp = $rowLayquery['DEPOSIT_LOAN_W'];
    $sendDepositLoanEmail = $rowLayquery['DEPOSIT_LOAN_E'];
    //
    $sendRelesePrincipalSMS = $rowLayquery['RELEASE_PRINCIPAL_S'];
    $sendRelesePrincipalWhatsapp = $rowLayquery['RELEASE_PRINCIPAL_W'];
    $sendRelesePrincipalEmail = $rowLayquery['RELEASE_PRINCIPAL_E'];
    //
    $sendOtpSMS = $rowLayquery['SEND_OTP_S'];
    $sendOtpWhatsapp = $rowLayquery['SEND_OTP_W'];
    $sendOtpEmail = $rowLayquery['SEND_OTP_E'];
    
    $sendNewRegistrationSMS = $rowLayquery['NEW_REGISTRATION_S'];
    $sendNewRegistrationWhatsapp = $rowLayquery['NEW_REGISTRATION_W'];
    $sendNewRegistrationEmail = $rowLayquery['NEW_REGISTRATION_E'];
    
    $sendAddNewSchemeSMS = $rowLayquery['ADD_NEW_SCHEME_S'];
    $sendAddNewSchemeWhatsapp = $rowLayquery['ADD_NEW_SCHEME_W'];
    $sendAddNewSchemeEmail = $rowLayquery['ADD_NEW_SCHEME_E'];
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sendSchemeEmiPaySMS = $rowLayquery['SCHEME_EMI_PAY_S'];
    $sendSchemeEmiPayWhatsapp = $rowLayquery['SCHEME_EMI_PAY_W'];
    $sendSchemeEmiPayEmail = $rowLayquery['SCHEME_EMI_PAY_E'];
    
    $sendSchemeEmiReminderSMS = $rowLayquery['SCHEME_EMI_REMINDER_S'];
    $sendSchemeEmiReminderWhatsapp = $rowLayquery['SCHEME_EMI_REMINDER_W'];
    $sendSchemeEmiReminderEmail = $rowLayquery['SCHEME_EMI_REMINDER_E'];
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $sendCloseSchemeSMS = $rowLayquery['CLOSE_SCHEME_S'];
    $sendCloseSchemeWhatsapp = $rowLayquery['CLOSE_SCHEME_W'];
    $sendCloseSchemeEmail = $rowLayquery['CLOSE_SCHEME_E'];
    
    $sendLoanReleaseSMS = $rowLayquery['LOAN_RELEASE_S'];
    $sendLoanReleaseWhatsapp = $rowLayquery['LOAN_RELEASE_W'];
    $sendLoanReleaseEmail = $rowLayquery['LOAN_RELEASE_E'];
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $sendLoanInterestPaySMS = $rowLayquery['LOAN_INTEREST_PAY_S'];
    $sendLoanInterestPayWhatsapp = $rowLayquery['LOAN_INTEREST_PAY_W'];
    $sendLoanInterestPayEmail = $rowLayquery['LOAN_INTEREST_PAY_E'];
    
    $sendPasswordChangeSMS = $rowLayquery['PASSWORD_CHANGE_S'];
    $sendPasswordChangeWhatsapp = $rowLayquery['PASSWORD_CHANGE_W'];
    $sendPasswordChangeEmail = $rowLayquery['PASSWORD_CHANGE_E'];
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $sendUdharPaySMS = $rowLayquery['UDHAR_PAY_S'];
    $sendUdharPayWhatsapp = $rowLayquery['UDHAR_PAY_W'];
    $sendUdharPayEmail = $rowLayquery['UDHAR_PAY_E'];
    
    $sendSellProductSMS = $rowLayquery['SELL_PRODUCT_S'];
    $sendSellProductWhatsapp = $rowLayquery['SELL_PRODUCT_W'];
    $sendSellProductEmail = $rowLayquery['SELL_PRODUCT_E'];
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sendOrderTodayDeliveredSMS = $rowLayquery['ORDER_TODAY_DELIVERED_S'];
    $sendOrderTodayDeliveredWhatsapp = $rowLayquery['ORDER_TODAY_DELIVERED_W'];
    $sendOrderTodayDeliveredEmail = $rowLayquery['ORDER_TODAY_DELIVERED_E'];
    
    $sendDeliveredProductSMS = $rowLayquery['DELIVERD_PRODUCT_S'];
    $sendDeliveredProductWhatsapp = $rowLayquery['DELIVERD_PRODUCT_W'];
    $sendDeliveredProductEmail = $rowLayquery['DELIVERD_PRODUCT_E'];
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sendGetReferalPointSMS = $rowLayquery['GET_REERAL_POINT_S'];
    $sendGetReferalPointWhatsapp = $rowLayquery['GET_REERAL_POINT_W'];
    $sendGetReferalPointEmail = $rowLayquery['GET_REERAL_POINT_E'];
    
    
    $sendPaidEmiCountSMS = $rowLayquery['PAID_EMI_COUNT_S'];
    $sendPaidEmiCountWhatsapp = $rowLayquery['PAID_EMI_COUNT_W'];
    $sendPaidEmiCountEmail = $rowLayquery['PAID_EMI_COUNT_E'];
    //
    $sendCurrentEmiNoSMS = $rowLayquery['CURRENT_EMI_NO_S'];
    $sendCurrentEmiNoWhatsapp = $rowLayquery['CURRENT_EMI_NO_W'];
    $sendCurrentEmiNoEmail = $rowLayquery['CURRENT_EMI_NO_E'];
    //
    $sendeEmiSerialNoSMS = $rowLayquery['EMI_SERIAL_NO_S'];
    $sendEmiSerialNoWhatsapp = $rowLayquery['EMI_SERIAL_NO_W'];
    $sendeEmiSerialNoEmail = $rowLayquery['EMI_SERIAL_NO_E'];
?>
<!-- END THIS CODE ADDED FOR AUTO-SMS TEMPLATE BY SONALI 14-SEP-2023-->
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$panelName = $_GET['panelName'];
$smtpId = $_GET['smtpId'];
$smsTempId = $_GET['smsTempId'];
$smsTempText = $_GET['smsTempText'];
$smsStaffId = $_GET['smtp_staff_id'];
//$smsTempText = stripcslashes($smsTempText);
//$smsTempText = mysqli_real_escape_string($conn,$smsTempText);
$smsType = $_GET['smsType'];
if ($panelName == 'getSmsTemp') {
    $selSmsTempText = "SELECT smtp_sub,smtp_text,smtp_owner,smtp_type FROM sms_templates where smtp_own_id='$sessionOwnerId' and smtp_id = '$smtpId'";
    $resSmsTempText = mysqli_query($conn, $selSmsTempText);
    $rowSmsTempText = mysqli_fetch_array($resSmsTempText, MYSQLI_ASSOC);
    $smtp_sub = $rowSmsTempText['smtp_sub'];
    $smsTempText = $rowSmsTempText['smtp_text'];
    $smtp_owner = $rowSmsTempText['smtp_owner'];
    $smtp_type = $rowSmsTempText['smtp_type'];
} else if ($panelName == 'smsTempAdd') {
    $query = "INSERT INTO sms_templates(
		smtp_own_id,smtp_tp_id,smtp_sub,smtp_text,smtp_type,smtp_owner,smtp_since,smtp_staff_id) 
		VALUES (
		'$sessionOwnerId','','$smsTempId','$smsTempText','$smsType','user',$currentDateTime,'$smsStaffId')";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    $smsTempText = '';
} else if ($panelName == 'smsTempUpdate') {
    $query = "UPDATE sms_templates SET smtp_sub = '$smsTempId',smtp_text = '$smsTempText',smtp_type='$smsType' WHERE smtp_own_id='$sessionOwnerId' and smtp_id = '$smtpId'";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }

    $smsTempText = '';
} else if ($panelName == 'smsTempDelete') {
    $query = "DELETE FROM sms_templates WHERE smtp_own_id='$sessionOwnerId' and smtp_id = '$smtpId'";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
}
if ($smtpId != '' || $panelName == 'smsTempAdd')
    $class = '';
else
    $class = 'main_middle';
if ($smtp_type == 'TSMS')
    $optionTSMS = 'selected';
else
    $optionPSMS = 'selected';
?>
<div id ="smsTempDiv" class="<?php echo $class; ?>">
    <table width="95%" cellspacing="0" cellpadding="0" border="0" align="center" style="border: 1px dashed #c1c1c1;background: #f4f4f4;padding: 5px 10px;">
        <tr>
            <td width="35%">
                <table width="100%" align="center">
                    <tr>
                        <td align="left" width="150px" colspan="2">
                            <img src="<?php echo $documentRoot; ?>/images/spacer.gif" alt="space" style="display:none;" onload="document.getElementById('smsTempId').focus();" />
                            <div class="ff_calibri fs_14 orange"><b>SMS TEMPLATE PANEL</b></div>
                        </td>  
                    </tr>
                    <tr>
                        <td align="left" width="500px">
                            <input id="smsTempId" name="smsTempId" placeholder="TEMPLATE ID" value="<?php echo $smtp_sub; ?>" style="width:500px;border-radius:3px!important;border:1px solid #c1c1c1!important;height:30px;"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               document.getElementById('smsType').focus();
                                               return false;
                                           }"
                                   type="text" spellcheck="false"  class="input_border_grey" size="35" maxlength="100" style=""/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="left" valign="top" class="padBott4" width="500px">
                                        <select id="smsType" name="smsType" class="input_border_grey" style="width:500px;border-radius:3px!important;border:1px solid #c1c1c1!important;height:30px;"
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            document.getElementById('smsTempText').focus();
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('smsTempId').focus();
                                                            return false;
                                                        }">
                                            <option value="PSMS" <?php echo $optionPSMS; ?>>PROMOTIONAL SMS</option>
                                            <option value="TSMS" <?php echo $optionTSMS; ?>>TRANSACTIONAL SMS</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <textarea id="smsTempText"  name="smsTempText" placeholder="SMS TEMPLATE" 
                                                  onkeydown="javascript: if (event.keyCode == 8 && this.value == '') {
                                                              document.getElementById('smsType').focus();
                                                              return false;
                                                          }"
                                                  spellcheck="false" class="textarea" style="width: 500px;height: 240px;border-radius:3px!important;border:1px solid #c1c1c1!important;"><?php echo $smsTempText; ?></textarea>
                                        <input type="hidden" value="<?php echo $staff_own_id; ?>" id="smtp_staff_id" name="smtp_staff_id" >
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table cellspacing="0" cellpadding="2" border="0" width="40%" align="center">
                                            <tr>
                                                <td>
                                                    <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                                    <div style="text-align:center;">
                                                        <?php
                                                        $inputId = "smsTempAddButt";
                                                        $inputType = 'submit';
                                                        $inputFieldValue = 'SUBMIT';
                                                        $inputIdButton = "smsTempAddButt";
                                                        $inputNameButton = 'smsTempAddButt';
                                                        $inputTitle = '';
                                                        //                    $inputFieldNextId = $arrStockFormFieldSequence[array_search('sttr_final_valuation', $arrStockFormFieldSequence) + 1];
                                                        //                    $inputFieldPrevId = $arrStockFormFieldSequence[array_search('sttr_tax', $arrStockFormFieldSequence) - 1];
                                                        //
                                                        // This is the main class for input flied
                                                        $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
                                                        $inputStyle = "width:100%;height:auto;border-radius: 5px;background: #dceaff;color: #0f118a;font-size: 15px;padding: 5px 10px;border: 1px solid #7ab0fe;";
                                                        $inputLabel = 'SUBMIT'; // Display Label below the text box
                                                        //
                                                        // This class is for Pencil Icon                                                           
                                                        $inputIconClass = '';
                                                        $inputPlaceHolder = '';
                                                        $spanPlaceHolderClass = '';
                                                        $spanPlaceHolder = '';
                                                        $inputOnChange = "";
                                                        $inputOnClickFun = 'javascript:getSmsTemplate("", document.getElementById("smsTempId").value, document.getElementById("smsTempText").value, document.getElementById("smsType").value, "smsTempAdd", "", "ADDED");';
                                                        $inputKeyUpFun = '';
                                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                                        $inputMainClassButton = '';           // This is the main division for Button
                                                        include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                                        ?>

                                                    </div>
<!--                                                        <input type="submit" id="smsTempAddButt" name="smsTempAddButt" 
                                                               onclick="javascript:getSmsTemplate('', document.getElementById('smsTempId').value, document.getElementById('smsTempText').value, document.getElementById('smsType').value, 'smsTempAdd', '', 'ADDED');"
                                                               class="frm-btn" value="SUBMIT" size="40"/>-->
                                                    <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="left" width="30px">
                            &nbsp;
                        </td>

                    </tr>
                </table>
            </td>
            <td width="35%" align="center" valign="top">
                <table width="100%" align="center">
                    <tr>
                        <td align="left" width="100%" valign="top">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>

                                    <td align="center" width="100%" class="ff_calibri fs_14 brown">
                                        <b> KEYWORDS</b>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" width="100%" style="background:#fff;border:1px solid #c1c1c1;">
                            <div style="display: flex;justify-content: space-evenly;align-items:start;">
                                <div style="width:50%">
                                    <div style="padding: 5px 5px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        FIRM_SHOP_NAME,&nbsp;&nbsp;&nbsp;<br>
                                        CUST_NAME,&nbsp;&nbsp;&nbsp;<br>
                                        CUST_MOBNO,&nbsp;&nbsp;&nbsp;<br>
                                        CUST_CO_NAME,&nbsp;&nbsp;&nbsp;<br>
                                        INTEREST_RATE,&nbsp;&nbsp;&nbsp;<br>
                                        TIME_PERIOD,&nbsp;&nbsp;&nbsp;<br>
                                    </div>
                                    <div  style="padding: 5px 0px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        CUST_CITY,&nbsp;&nbsp;&nbsp;<br>
                                        S_NO,&nbsp;&nbsp;&nbsp;<br>
                                        LOAN_DATE,&nbsp;&nbsp;&nbsp;<br>
                                        PRINCIPAL_AMT,&nbsp;&nbsp;&nbsp;<br>
                                        TOTAL_PRINCIPAL,&nbsp;&nbsp;&nbsp;<br>
                                        TOTAL_INTEREST,&nbsp;&nbsp;&nbsp;<br>
                                        SCHEME WEIGHT,&nbsp;&nbsp;&nbsp;<br>
                                       PAID EMI COUNT,&nbsp;&nbsp;&nbsp;<br>
                                        CURRENT EMI NO,&nbsp;&nbsp;&nbsp;<br><!-- comment -->
                                        EMI SERIAL NO,&nbsp;&nbsp;&nbsp;<br>
                                    </div>
                                    <div  style="padding: 5px 0px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        <!--                                        FINAL_AMOUNT&nbsp;&nbsp;&nbsp;<br>
                                                                                NEXT_CALL_DATE&nbsp;&nbsp;&nbsp;<br>
                                                                                EMPLOYEE_NAME&nbsp;&nbsp;&nbsp;<br>
                                                                                  EMPLOYEE_EMAIL&nbsp;&nbsp;&nbsp;<br>
                                                                                EMPLOYEE_NUMBER&nbsp;&nbsp;&nbsp;<br>
                                                                                TOTAL_CALLS,&nbsp;&nbsp;&nbsp;<br>
                                                                                WRONG_NO_CALL,&nbsp;&nbsp;&nbsp;<br>-->
                                    </div>
                                </div>
                                <div style="width:50%">
                                    <div  style="padding: 5px 5px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        TOTAL_AMOUNT,&nbsp;&nbsp;&nbsp;<br>
                                        FIRM_PHONE_DETAILS,&nbsp;&nbsp;&nbsp;<br>
                                        NO_OF_EMI,&nbsp;&nbsp;&nbsp;<br>
                                        SCHEME_NAME,&nbsp;&nbsp;&nbsp;<br>
                                        ITEM_WEIGHT,&nbsp;&nbsp;&nbsp;<br>
                                        DUE_AMT,&nbsp;&nbsp;&nbsp;<br>
                                        GROSS_WEIGHT,&nbsp;&nbsp;&nbsp;<br>
                                    </div>
                                    <div  style="padding: 5px 0px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        EMI_AMOUNT,&nbsp;&nbsp;&nbsp;<br>
                                        RELEASE_DATE,&nbsp;&nbsp;&nbsp;<br>
                                        ITEM_NAME,&nbsp;&nbsp;&nbsp;<br>
                                        METAL_TYPE,&nbsp;&nbsp;&nbsp;<br>
                                        PAID_AMT,&nbsp;&nbsp;&nbsp;<br>
                                        ITEM_PURITY,&nbsp;&nbsp;&nbsp;<br>
                                        TODAY_DATE,&nbsp;&nbsp;&nbsp;<br>
                                    </div>
                                    <div  style="padding: 5px 0px;font-weight: 600;font-size: 14px;color: #6f6f6f;">
                                        <!--                                        CALL_NOT_REC,&nbsp;&nbsp;&nbsp;<br>
                                                                                INTERESTED_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                VERY_INTERESTED_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                NOT_INTERESTED_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                POSTPONED_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                DEMO_ARR_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                DEMO_DONE_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                DEMO_INSTALL_CALL,&nbsp;&nbsp;&nbsp;<br>
                                                                                CONVERTED_CALL-->
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- CODE ADDED FOR AUTO SMS TEMPLATE BY SONALI 14-SEP-2023-->
            <td width="35%" align="center" valign="top">
                
        <table width="100%" align="center">
                    <tr>
                        <td align="left" width="55%" valign="top">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="center" width="50%" class="ff_calibri fs_14 brown">
                                        <b>AUTO-SMS</b>
                                    </td>
                                    <td align="center" width="15%" class="ff_calibri fs_14 brown">
                                        <b>WHATSAPP</b>
                                    </td>
                                    <td align="center" width="12%" class="ff_calibri fs_14 brown">
                                        <b>SMS</b>
                                    </td>
                                    <td align="center" width="13%" class="ff_calibri fs_14 brown">
                                        <b>EMAIL</b>
                                    </td>
                                </tr>
                            </table>
                        </td>



                    </tr>
                    <tr>
                    <input type="hidden" id="layoutUpdatedMsgDiv" />
                    <td align="left" width="100%" valign="top">
                        <div style="height: 307px;overflow: auto;border-top:1px solid #c1c1c1; border-bottom:1px solid #c1c1c1;" class="custom-scroll">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#fff;border-left:1px solid #c1c1c1;padding:5px;">
                            <?php
                            $checked = "";
                            if ($sellSMS == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
//            
                            if ($sellSMS == 'YES') {
                                ?>
                                <input type="hidden" id="salestemplate" name="salestemplate" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="salestemplate" name="salestemplate" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="salestemplate1" name="salestemplate1">
                                    <input type="checkbox"  <?php
                                    if ($sellSMS == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sellSMS" name="sellSMS" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('sellSMS').value = 'NO';
                                                   } else {
                                                       document.getElementById('sellSMS').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sellSMS', document.getElementById('sellSMS').value, 'salestemplate1');"
                                           /> SALES_TEMPLATE
                                </td>
                                <td align="center" width="15%">
                                    <input type="checkbox" <?php
                                    if ($sellWhatsapp == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sellWhatsapp" name="sellWhatsapp" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('sellWhatsapp').value = 'NO';
                                                   } else {
                                                       document.getElementById('sellWhatsapp').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sellWhatsapp', document.getElementById('sellWhatsapp').value, 'sellWhatsapp1');"
                                           />
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" <?php
                                    if ($sellSMS == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sellSMS" name="sellSMS" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('sellSMS').value = 'NO';
                                                   } else {
                                                       document.getElementById('sellSMS').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sellSMS', document.getElementById('sellSMS').value, 'salestemplate1');"
                                           />
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" <?php
                                    if ($sellEmail == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sellEmail" name="sellEmail" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('sellEmail').value = 'NO';
                                                   } else {
                                                       document.getElementById('sellEmail').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sellEmail', document.getElementById('sellEmail').value, 'salesemail1');"
                                           />
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($sendOrderSMS == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
//                            
                            if ($sendOrderSMS == 'YES') {
                                ?>
                                <input type="hidden" id="sendOrderSMS" name="sendOrderSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendOrderSMS" name="sendOrderSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="sendOrderSMS1" class="checkbox">
                                    <input type="checkbox" <?php
                                    if ($sendOrderSMS == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sendOrderSMS" name="sendOrderSMS" onclick="if (!this.checked) {
                                                       document.getElementById('sendOrderSMS').value = 'NO';
                                                   } else {
                                                       document.getElementById('sendOrderSMS').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sendOrderSMS', document.getElementById('sendOrderSMS').value, 'sendOrderSMS1');"
                                           /> ORDER_TEMPLATE
                                </td>
                                <td align="center" width="15%"> 
                                    <input type="checkbox" <?php
                                    if ($OrderWhatsapp == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sendOrderWhatsapp" name="sendOrderWhatsapp" onclick="if (!this.checked) {
                                                       document.getElementById('sendOrderWhatsapp').value = 'NO';
                                                   } else {
                                                       document.getElementById('sendOrderWhatsapp').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sendOrderWhatsapp', document.getElementById('sendOrderWhatsapp').value, 'sendOrderSMS1');"
                                           />
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" <?php
                                    if ($sendOrderSMS == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sendOrderSMS" name="sendOrderSMS" onclick="if (!this.checked) {
                                                       document.getElementById('sendOrderSMS').value = 'NO';
                                                   } else {
                                                       document.getElementById('sendOrderSMS').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sendOrderSMS', document.getElementById('sendOrderSMS').value, 'sendOrderSMS1');"
                                           />
                                </td>
                                <td align="center" width="13%"> 
                                    <input type="checkbox" <?php
                                    if ($sendOrderEmail == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sendOrderEmail" name="sendOrderEmail" onclick="if (!this.checked) {
                                                       document.getElementById('sendOrderEmail').value = 'NO';
                                                   } else {
                                                       document.getElementById('sendOrderEmail').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('sendOrderEmail', document.getElementById('sendOrderEmail').value, 'sendOrderEmail');"
                                           />
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($valreadyordertemplate == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($valreadyordertemplate == 'YES') {
                                ?>
                                <input type="hidden" id="readyordertemplate" name="readyordertemplate" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="readyordertemplate" name="readyordertemplate" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="readyordertemplate1"   class="checkbox">
                                    <input type="checkbox"  <?php
                                    if ($valreadyordertemplate == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="readyordertemplate" name="readyordertemplate" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('readyordertemplate').value = 'NO';
                                                   } else {
                                                       document.getElementById('readyordertemplate').value = 'YES';
                                                   }"
                                           onchange="setLayoutFieldInDb('readyordertemplate', document.getElementById('readyordertemplate').value, 'readyordertemplate1');"
                                           /> READY_ORDER_TEMPLATE
                                </td>
                                <td align="center" width="15%">
                                    <input type="checkbox"  <?php
                                    if ($readyOrderWtsapp == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="sendReadyOrderWhatsapp" name="sendReadyOrderWhatsapp" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('sendReadyOrderWhatsapp').value = 'NO';
                                                   } else {
                                                       document.getElementById('sendReadyOrderWhatsapp').value = 'YES';
                                                   }"
                                           onchange="setLayoutFieldInDb('sendReadyOrderWhatsapp', document.getElementById('sendReadyOrderWhatsapp').value, 'readyordertemplate1');"
                                           />
                                </td>
                                 <td align="center" width="12%">
                                    <input type="checkbox"  <?php
                                    if ($valreadyordertemplate == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="readyordertemplate" name="readyordertemplate" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('readyordertemplate').value = 'NO';
                                                   } else {
                                                       document.getElementById('readyordertemplate').value = 'YES';
                                                   }"
                                           onchange="setLayoutFieldInDb('readyordertemplate', document.getElementById('readyordertemplate').value, 'readyordertemplate1');"
                                           />
                                </td>
                                 <td align="center" width="13%">
                                    <input type="checkbox"  <?php
                                    if ($valreadyorderEmail == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> id="readyorderEmail" name="readyorderEmail" 
                                           onclick="if (!this.checked) {
                                                       document.getElementById('readyorderEmail').value = 'NO';
                                                   } else {
                                                       document.getElementById('readyorderEmail').value = 'YES';
                                                   }"
                                           onchange="setLayoutFieldInDb('readyorderEmail', document.getElementById('readyorderEmail').value, 'readyordertemplate1');"
                                           />
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($valnewloantemplate == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($valnewloantemplate == 'YES') {
                                ?>
                                <input type="hidden" id="newloantemplate" name="newloantemplate" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="newloantemplate" name="newloantemplate" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="newloantemplate1" class="checkbox">
                                    <input type="checkbox" id="newloantemplate" name="newloantemplate" value="$valnewloantemplate" onclick="if (!this.checked) {
                                                document.getElementById('newloantemplate').value = 'NO';
                                            } else {
                                                document.getElementById('newloantemplate').value = 'YES';
                                            }"  onchange="setLayoutFieldInDb('newloantemplate', document.getElementById('newloantemplate').value, 'newloantemplate1');"
                                           <?php
                                           if ($valnewloantemplate == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/> NEW_LOAN_TEMPLATE

                                </td>
                                 <td align="center" width="15%">
                                    <input type="checkbox" <?php
                                    if ($valnewloanWtsapp == 'YES')
                                        echo 'checked';
                                    else {
                                        echo '';
                                    }
                                    ?> id="newLoanWhatsapptmp" name="newLoanWhatsapptmp"  onclick="if (!this.checked) {
                                                       document.getElementById('newLoanWhatsapptmp').value = 'NO';
                                                   } else {
                                                       document.getElementById('newLoanWhatsapptmp').value = 'YES';
                                                   }"  onchange="setLayoutFieldInDb('newLoanWhatsapptmp', document.getElementById('newLoanWhatsapptmp').value, 'newloantemplate1');"
                                           />
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="newloantemplate" name="newloantemplate"  onclick="if (!this.checked) {
                                                document.getElementById('newloantemplate').value = 'NO';
                                            } else {
                                                document.getElementById('newloantemplate').value = 'YES';
                                            }"  onchange="setLayoutFieldInDb('newloantemplate', document.getElementById('newloantemplate').value, 'newloantemplate1');"
                                           <?php
                                           if ($valnewloantemplate == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="13%">
                                    <input type="checkbox" id="newloanEmailtemplate" name="newloanEmailtemplate"  onclick="if (!this.checked) {
                                                document.getElementById('newloanEmailtemplate').value = 'NO';
                                            } else {
                                                document.getElementById('newloanEmailtemplate').value = 'YES';
                                            }"  onchange="setLayoutFieldInDb('newloanEmailtemplate', document.getElementById('newloanEmailtemplate').value, 'newloantemplate1');"
                                           <?php
                                           if ($valnewloanEmailtemplate == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($valudhaardrdeposit == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($valudhaardrdeposit == 'YES') {
                                ?>
                                <input type="hidden" id="udhaardrdeposit" name="udhaardrdeposit" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="udhaardrdeposit" name="udhaardrdeposit" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="udhaardrdeposit1" class="checkbox">
                                    <input type="checkbox" id="udhaardrdeposit" name="udhaardrdeposit"
                                           onclick="if (!this.checked) {
                                                       document.getElementById('udhaardrdeposit').value = 'NO';
                                                   } else {
                                                       document.getElementById('udhaardrdeposit').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('udhaardrdeposit', document.getElementById('udhaardrdeposit').value, 'udhaardrdeposit1');"
                                           <?php
                                           if ($valudhaardrdeposit == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/> UDHAAR_DR_DEPOSIT
                                </td>
                                <td align="center" width="15%"> 
                                    <input type="checkbox"  id="udhaardrdepositWhatsapp" name="udhaardrdepositWhatsapp"
                                           onclick="if (!this.checked) {
                                                       document.getElementById('udhaardrdepositWhatsapp').value = 'NO';
                                                   } else {
                                                       document.getElementById('udhaardrdepositWhatsapp').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('udhaardrdepositWhatsapp', document.getElementById('udhaardrdepositWhatsapp').value, 'udhaardrdeposit1');"
                                           <?php
                                           if ($udhaardrdepwtsapp == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="12%">
                                    <input type="checkbox" id="udhaardrdeposit" name="udhaardrdeposit"
                                           onclick="if (!this.checked) {
                                                       document.getElementById('udhaardrdeposit').value = 'NO';
                                                   } else {
                                                       document.getElementById('udhaardrdeposit').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('udhaardrdeposit', document.getElementById('udhaardrdeposit').value, 'udhaardrdeposit1');"
                                           <?php
                                           if ($valudhaardrdeposit == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="13%">
                                    <input type="checkbox" id="udhaardrdepositEmail" name="udhaardrdepositEmail"
                                           onclick="if (!this.checked) {
                                                       document.getElementById('udhaardrdepositEmail').value = 'NO';
                                                   } else {
                                                       document.getElementById('udhaardrdepositEmail').value = 'YES';
                                                   }" onchange="setLayoutFieldInDb('udhaardrdepositEmail', document.getElementById('udhaardrdepositEmail').value, 'udhaardrdeposit1');"
                                           <?php
                                           if ($valudhaardrdepositEmail == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                
                            </tr>
                            <?php
                            $checked = "";
                            if ($valudhaardrreminder == 'YES') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($valudhaardrreminder == 'YES') {
                                ?>
                                <input type="hidden" id="udhaardrreminder" name="udhaardrreminder" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="udhaardrreminder" name="udhaardrreminder" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="udhaardrreminder1" class="checkbox">
                                    <input type="checkbox" id="udhaardrreminder" name="udhaardrreminder"  onclick="if (!this.checked) {
                                                document.getElementById('udhaardrreminder').value = 'NO';
                                            } else {
                                                document.getElementById('udhaardrreminder').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('udhaardrreminder', document.getElementById('udhaardrreminder').value, 'udhaardrreminder1');"
                                           <?php
                                           if ($valudhaardrreminder == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/> UDHAAR_DR_REMINDER
                                </td>
                                <td align="center" width="15%">
                                    <input type="checkbox" id="udhaardrRemainderWtsapp" name="udhaardrRemainderWtsapp"  onclick="if (!this.checked) {
                                                document.getElementById('udhaardrRemainderWtsapp').value = 'NO';
                                            } else {
                                                document.getElementById('udhaardrRemainderWtsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('udhaardrRemainderWtsapp', document.getElementById('udhaardrRemainderWtsapp').value, 'udhaardrreminder1');"
                                           <?php
                                           if ($udhaarRmndrwtsapp == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="12%">
                                    <input type="checkbox" id="udhaardrreminder" name="udhaardrreminder"  onclick="if (!this.checked) {
                                                document.getElementById('udhaardrreminder').value = 'NO';
                                            } else {
                                                document.getElementById('udhaardrreminder').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('udhaardrreminder', document.getElementById('udhaardrreminder').value, 'udhaardrreminder1');"
                                           <?php
                                           if ($valudhaardrreminder == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="13%">
                                    <input type="checkbox" id="udhaardrreminderEmail" name="udhaardrreminderEmail"  onclick="if (!this.checked) {
                                                document.getElementById('udhaardrreminderEmail').value = 'NO';
                                            } else {
                                                document.getElementById('udhaardrreminderEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('udhaardrreminderEmail', document.getElementById('udhaardrreminderEmail').value, 'udhaardrreminder1');"
                                           <?php
                                           if ($valudhaardrreminderEmail == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($setSetSchemeInst == 'yes') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($setSetSchemeInst == 'yes') {
                                ?>
                                <input type="hidden" id="schemeInstOpt" name="schemeInstOpt" value="yes" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="schemeInstOpt" name="schemeInstOpt" value="no" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="schemeInstOpt1" />
                                    <input type="checkbox" id="schemeInstOpt" name="schemeInstOpt" value="yes"  onclick="if (!this.checked) {
                                                document.getElementById('schemeInstOpt').value = 'no';
                                            } else {
                                                document.getElementById('schemeInstOpt').value = 'yes';
                                            }" onchange="setLayoutFieldInDb('schemeInstOpt', document.getElementById('schemeInstOpt').value, 'schemeInstOpt1');"
                                           <?php
                                           if ($setSetSchemeInst == 'yes')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/> SCHEME_EMI_PAID
                                </td>
                                 <td align="center" width="15%">
                                    <input type="checkbox" id="schemeEmiPaidWhatsapp" name="schemeEmiPaidWhatsapp" value="yes"  onclick="if (!this.checked) {
                                                document.getElementById('schemeEmiPaidWhatsapp').value = 'no';
                                            } else {
                                                document.getElementById('schemeEmiPaidWhatsapp').value = 'yes';
                                            }" onchange="setLayoutFieldInDb('schemeEmiPaidWhatsapp', document.getElementById('schemeEmiPaidWhatsapp').value, 'schemeInstOpt1');"
                                           <?php
                                           if ($schemeEmiDueWtsap == 'yes')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="12%">
                                    <input type="checkbox" id="schemeInstOpt" name="schemeInstOpt" value="yes"  onclick="if (!this.checked) {
                                                document.getElementById('schemeInstOpt').value = 'no';
                                            } else {
                                                document.getElementById('schemeInstOpt').value = 'yes';
                                            }" onchange="setLayoutFieldInDb('schemeInstOpt', document.getElementById('schemeInstOpt').value, 'schemeInstOpt1');"
                                           <?php
                                           if ($setSetSchemeInst == 'yes')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                 <td align="center" width="13%">
                                    <input type="checkbox" id="schemeInstOptEmail" name="schemeInstOptEmail" value="yes"  onclick="if (!this.checked) {
                                                document.getElementById('schemeInstOptEmail').value = 'no';
                                            } else {
                                                document.getElementById('schemeInstOptEmail').value = 'yes';
                                            }" onchange="setLayoutFieldInDb('schemeInstOptEmail', document.getElementById('schemeInstOptEmail').value, 'schemeInstOpt1');"
                                           <?php
                                           if ($setSetSchemeInstEmail == 'yes')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <?php
                            $checked = "";
                            if ($sendSMSToSchemeDueInstallments == 'yes') {
                                $checked = "checked";
                            } else {
                                $checked = "unchecked";
                            }
                            ?>
                            <?php
                            if ($sendSMSToSchemeDueInstallments == 'yes') {
                                ?>
                                <input type="hidden" id="sendSMSToSchemeDueInstallments" name="sendSMSToSchemeDueInstallments" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendSMSToSchemeDueInstallments" name="sendSMSToSchemeDueInstallments" value="NO" class="checkbox">
                            <?php } ?>
                            <tr>
                                <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                    <input type="hidden" id="sendSMSToSchemeDueInstallments1" />
                                    <input type="checkbox" id="sendSMSToSchemeDueInstallments" name="sendSMSToSchemeDueInstallments" value="YES" onclick="if (!this.checked) {
                                                document.getElementById('sendSMSToSchemeDueInstallments').value = 'NO';
                                            } else {
                                                document.getElementById('sendSMSToSchemeDueInstallments').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendSMSToSchemeDueInstallments', document.getElementById('sendSMSToSchemeDueInstallments').value, 'sendSMSToSchemeDueInstallments1');"
                                           <?php
                                           if ($sendSMSToSchemeDueInstallments == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/> SCHEME_EMI_DUE
                                </td>
                                 <td align="center" width="15%">
                                    <input type="checkbox"  id="sendWtsappToSchemeDueInstallments" name="sendWtsappToSchemeDueInstallments" onclick="if (!this.checked) {
                                                document.getElementById('sendWtsappToSchemeDueInstallments').value = 'NO';
                                            } else {
                                                document.getElementById('sendWtsappToSchemeDueInstallments').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendWtsappToSchemeDueInstallments', document.getElementById('sendWtsappToSchemeDueInstallments').value, 'sendSMSToSchemeDueInstallments1');"
                                           <?php
                                           if ($schemeEmiDueWtsappq == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendSMSToSchemeDueInstallments" name="sendSMSToSchemeDueInstallments" value="YES" onclick="if (!this.checked) {
                                                document.getElementById('sendSMSToSchemeDueInstallments').value = 'NO';
                                            } else {
                                                document.getElementById('sendSMSToSchemeDueInstallments').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendSMSToSchemeDueInstallments', document.getElementById('sendSMSToSchemeDueInstallments').value, 'sendSMSToSchemeDueInstallments1');"
                                           <?php
                                           if ($sendSMSToSchemeDueInstallments == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendEmailToSchemeDueInstallments" name="sendEmailToSchemeDueInstallments" value="YES" onclick="if (!this.checked) {
                                                document.getElementById('sendEmailToSchemeDueInstallments').value = 'NO';
                                            } else {
                                                document.getElementById('sendEmailToSchemeDueInstallments').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendEmailToSchemeDueInstallments', document.getElementById('sendEmailToSchemeDueInstallments').value, 'sendSMSToSchemeDueInstallments1');"
                                           <?php
                                           if ($sendEmailToSchemeDueInstallments == 'YES')
                                               echo 'checked';
                                           else {
                                               echo '';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendExpiredLaonSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendExpiredLaonSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendExpiredLaonSMS" name="sendExpiredLaonSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendExpiredLaonSMS" name="sendExpiredLaonSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendExpiredLaonSMS1" class="checkbox">
                                <input type="checkbox" id="sendExpiredLaonSMS" name="sendExpiredLaonSMS"  onclick="if (!this.checked) {
                                            document.getElementById('sendExpiredLaonSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendExpiredLaonSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('sendExpiredLaonSMS', document.getElementById('sendExpiredLaonSMS').value, 'sendExpiredLaonSMS1');"
                                       <?php
                                       if ($sendExpiredLaonSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> EXPIRED_LOAN
                            </td>
                             <td align="center" width="15%">
                                    <input type="checkbox"  id="expiredLoanWhatsapp" name="expiredLoanWhatsapp"  onclick="if (!this.checked) {
                                                document.getElementById('expiredLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('expiredLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('expiredLoanWhatsapp', document.getElementById('expiredLoanWhatsapp').value, 'sendExpiredLaonSMS1');"
                                           <?php
                                           if ($valExpiredLoanWtsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendExpiredLaonSMS" name="sendExpiredLaonSMS"  onclick="if (!this.checked) {
                                                document.getElementById('sendExpiredLaonSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendExpiredLaonSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendExpiredLaonSMS', document.getElementById('sendExpiredLaonSMS').value, 'sendExpiredLaonSMS1');"
                                           <?php
                                           if ($sendExpiredLaonSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendExpiredLaonEmail" name="sendExpiredLaonEmail"  onclick="if (!this.checked) {
                                                document.getElementById('sendExpiredLaonEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendExpiredLaonEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendExpiredLaonEmail', document.getElementById('sendExpiredLaonEmail').value, 'sendExpiredLaonSMS1');"
                                           <?php
                                           if ($sendExpiredLaonEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendPendingLaonAndInterestSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendPendingLaonAndInterestSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendPendingLaonAndInterestSMS" name="sendPendingLaonAndInterestSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendPendingLaonAndInterestSMS" name="sendPendingLaonAndInterestSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendPendingLaonAndInterestSMS1" class="checkbox">
                                <input type="checkbox" id="sendPendingLaonAndInterestSMS" name="sendPendingLaonAndInterestSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendPendingLaonAndInterestSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendPendingLaonAndInterestSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('sendPendingLaonAndInterestSMS', document.getElementById('sendPendingLaonAndInterestSMS').value, 'sendPendingLaonAndInterestSMS1');"
                                       <?php
                                       if ($sendPendingLaonAndInterestSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> LOAN_INT_DUE
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="LaonAndInterestWhatsapp" name="LaonAndInterestWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('LaonAndInterestWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('LaonAndInterestWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LaonAndInterestWhatsapp', document.getElementById('LaonAndInterestWhatsapp').value, 'sendPendingLaonAndInterestSMS1');"
                                           <?php
                                           if ($valLoanInterestwtsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendPendingLaonAndInterestSMS" name="sendPendingLaonAndInterestSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendPendingLaonAndInterestSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendPendingLaonAndInterestSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendPendingLaonAndInterestSMS', document.getElementById('sendPendingLaonAndInterestSMS').value, 'sendPendingLaonAndInterestSMS1');"
                                           <?php
                                           if ($sendPendingLaonAndInterestSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendPendingLaonAndInterestEmail" name="sendPendingLaonAndInterestEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendPendingLaonAndInterestEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendPendingLaonAndInterestEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('sendPendingLaonAndInterestEmail', document.getElementById('sendPendingLaonAndInterestEmail').value, 'sendPendingLaonAndInterestSMS1');"
                                           <?php
                                           if ($sendPendingLaonAndInterestEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendPendingLaonAuctionSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendPendingLaonAuctionSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendPendingLaonAuctionSMS" name="sendPendingLaonAuctionSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendPendingLaonAuctionSMS" name="sendPendingLaonAuctionSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendPendingLaonAuctionSMS1" class="checkbox">
                                <input type="checkbox" id="sendPendingLaonAuctionSMS" name="sendPendingLaonAuctionSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendPendingLaonAuctionSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendPendingLaonAuctionSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('sendPendingLaonAuctionSMS', document.getElementById('sendPendingLaonAuctionSMS').value, 'sendPendingLaonAuctionSMS1');"
                                       <?php
                                       if ($sendPendingLaonAuctionSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> LOAN_AUCTION_PROCESS
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="LaonAuctionWhatsapp" name="LaonAuctionWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('LaonAuctionWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('LaonAuctionWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_AUCTION_PROCESS_W', document.getElementById('LaonAuctionWhatsapp').value, 'sendPendingLaonAuctionSMS1');"
                                           <?php
                                           if ($valLoanAuctionwtsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendPendingLaonAuctionSMS" name="sendPendingLaonAuctionSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendPendingLaonAuctionSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendPendingLaonAuctionSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_AUCTION_PROCESS_S', document.getElementById('sendPendingLaonAuctionSMS').value, 'sendPendingLaonAuctionSMS1');"
                                           <?php
                                           if ($sendPendingLaonAuctionSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendPendingLaonAuctionEmail" name="sendPendingLaonAuctionEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendPendingLaonAuctionEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendPendingLaonAuctionEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_AUCTION_PROCESS_E', document.getElementById('sendPendingLaonAuctionEmail').value, 'sendPendingLaonAuctionSMS1');"
                                           <?php
                                           if ($sendPendingLaonAuctionEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendAddLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendAddLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendAddLoanSMS" name="sendAddLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendAddLoanSMS" name="sendAddLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendAddLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendAddLoanSMS" name="sendAddLoanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendAddLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendAddLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('ADD_LOAN_S', document.getElementById('sendAddLoanSMS').value, 'sendAddLoanSMS1');"
                                       <?php
                                       if ($sendAddLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> ADD_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="AddLoanWhatsapp" name="AddLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_LOAN_W', document.getElementById('AddLoanWhatsapp').value, 'sendAddLoanSMS1');"
                                           <?php
                                           if ($valAddLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendAddLoanSMS" name="sendAddLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendAddLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendAddLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_LOAN_S', document.getElementById('sendAddLoanSMS').value, 'sendAddLoanSMS1');"
                                           <?php
                                           if ($sendAddLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="AddLoanEmail" name="AddLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_LOAN_E', document.getElementById('AddLoanEmail').value, 'sendAddLoanSMS1');"
                                           <?php
                                           if ($AddLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                             <tr>
                                <?php
                                $checked = "";
                                if ($sendLoanGraceSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendLoanGraceSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendLoanGraceSMS" name="sendLoanGraceSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendLoanGraceSMS" name="sendLoanGraceSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendLoanGraceSMS1" class="checkbox">
                                <input type="checkbox" id="sendLoanGraceSMS" name="sendLoanGraceSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendLoanGraceSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendLoanGraceSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('LOAN_GRACE_S', document.getElementById('sendLoanGraceSMS').value, 'sendLoanGraceSMS1');"
                                       <?php
                                       if ($sendLoanGraceSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> LOAN_GRACE
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="AddLoanWhatsapp" name="AddLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_GRACE_W', document.getElementById('AddLoanWhatsapp').value, 'sendLoanGraceSMS1');"
                                           <?php
                                           if ($valAddLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendLoanGraceSMS" name="sendLoanGraceSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanGraceSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanGraceSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_GRACE_S', document.getElementById('sendLoanGraceSMS').value, 'sendLoanGraceSMS1');"
                                           <?php
                                           if ($sendLoanGraceSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="AddLoanEmail" name="AddLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_GRACE_E', document.getElementById('AddLoanEmail').value, 'sendLoanGraceSMS1');"
                                           <?php
                                           if ($AddLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                                <tr>
                                <?php
                                $checked = "";
                                if ($AddLoanPrincipalSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($AddLoanPrincipalSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="AddLoanPrincipalSMS" name="AddLoanPrincipalSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="AddLoanPrincipalSMS" name="AddLoanPrincipalSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="AddLoanPrincipalSMS1" class="checkbox">
                                <input type="checkbox" id="AddLoanPrincipalSMS" name="AddLoanPrincipalSMS" onclick="if (!this.checked) {
                                            document.getElementById('AddLoanPrincipalSMS').value = 'NO';
                                        } else {
                                            document.getElementById('AddLoanPrincipalSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('ADD_PRINCIPAL_S', document.getElementById('AddLoanPrincipalSMS').value, 'AddLoanPrincipalSMS1');"
                                       <?php
                                       if ($AddLoanPrincipalSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> ADD_PRINCIPAL
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="AddLoanPrincipalWhatsapp" name="AddLoanPrincipalWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanPrincipalWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanPrincipalWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_PRINCIPAL_W', document.getElementById('AddLoanPrincipalWhatsapp').value, 'AddLoanPrincipalSMS1');"
                                           <?php
                                           if ($AddLoanPrincipalWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="AddLoanPrincipalSMS" name="AddLoanPrincipalSMS" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanPrincipalSMS').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanPrincipalSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_PRINCIPAL_S', document.getElementById('AddLoanPrincipalSMS').value, 'AddLoanPrincipalSMS1');"
                                           <?php
                                           if ($AddLoanPrincipalSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="AddLoanPrincipalEmail" name="AddLoanPrincipalEmail" onclick="if (!this.checked) {
                                                document.getElementById('AddLoanPrincipalEmail').value = 'NO';
                                            } else {
                                                document.getElementById('AddLoanPrincipalEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_PRINCIPAL_E', document.getElementById('AddLoanPrincipalEmail').value, 'AddLoanPrincipalSMS1');"
                                           <?php
                                           if ($AddLoanPrincipalEmailEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                              <tr>
                                <?php
                                $checked = "";
                                if ($sendDeleteLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendDeleteLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendDeleteLoanSMS" name="sendDeleteLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendDeleteLoanSMS" name="sendDeleteLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendDeleteLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendDeleteLoanSMS" name="sendDeleteLoanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendDeleteLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendDeleteLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('DELETE_LOAN_S', document.getElementById('sendDeleteLoanSMS').value, 'sendDeleteLoanSMS1');"
                                       <?php
                                       if ($sendDeleteLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> DELETE_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendDeleteLoanSMSWhatsapp" name="sendDeleteLoanSMSWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendDeleteLoanSMSWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeleteLoanSMSWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELETE_LOAN_W', document.getElementById('sendDeleteLoanSMSWhatsapp').value, 'sendDeleteLoanSMS1');"
                                           <?php
                                           if ($sendDeleteLoanSMSWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendDeleteLoanSMS" name="sendDeleteLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendDeleteLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeleteLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELETE_LOAN_S', document.getElementById('sendDeleteLoanSMS').value, 'sendDeleteLoanSMS1');"
                                           <?php
                                           if ($sendDeleteLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendDeleteLoanEmail" name="sendDeleteLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendDeleteLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeleteLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELETE_LOAN_E', document.getElementById('sendDeleteLoanEmail').value, 'sendDeleteLoanSMS1');"
                                           <?php
                                           if ($sendDeleteLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                                 <tr>
                                <?php
                                $checked = "";
                                if ($sendUpdateLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendUpdateLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendUpdateLoanSMS" name="sendUpdateLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendUpdateLoanSMS" name="sendUpdateLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendUpdateLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendUpdateLoanSMS" name="sendUpdateLoanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendUpdateLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendUpdateLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('UPDATE_LOAN_S', document.getElementById('sendUpdateLoanSMS').value, 'sendUpdateLoanSMS1');"
                                       <?php
                                       if ($sendUpdateLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> UPDATE_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendUpdateLoanWhatsapp" name="sendUpdateLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendUpdateLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendUpdateLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UPDATE_LOAN_W', document.getElementById('sendUpdateLoanWhatsapp').value, 'sendUpdateLoanSMS1');"
                                           <?php
                                           if ($sendUpdateLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendUpdateLoanSMS" name="sendUpdateLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendUpdateLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendUpdateLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UPDATE_LOAN_S', document.getElementById('sendUpdateLoanSMS').value, 'sendUpdateLoanSMS1');"
                                           <?php
                                           if ($sendUpdateLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendUpdateLoanEmail" name="sendUpdateLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendUpdateLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendUpdateLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UPDATE_LOAN_E', document.getElementById('sendUpdateLoanEmail').value, 'sendUpdateLoanSMS1');"
                                           <?php
                                           if ($sendUpdateLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                             <tr>
                                <?php
                                $checked = "";
                                if ($sendReleaseLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendReleaseLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendReleaseLoanSMS" name="sendReleaseLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendReleaseLoanSMS" name="sendReleaseLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendReleaseLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendReleaseLoanSMS" name="sendReleaseLoanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendReleaseLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendReleaseLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('REALEASE_LOAN_S', document.getElementById('sendReleaseLoanSMS').value, 'sendReleaseLoanSMS1');"
                                       <?php
                                       if ($sendReleaseLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> REALEASE_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendReleaseLoanWhatsapp" name="sendReleaseLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendReleaseLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendReleaseLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('REALEASE_LOAN_W', document.getElementById('sendReleaseLoanWhatsapp').value, 'sendReleaseLoanSMS1');"
                                           <?php
                                           if ($sendReleaseLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendReleaseLoanSMS" name="sendReleaseLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendReleaseLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendReleaseLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('REALEASE_LOAN_S', document.getElementById('sendReleaseLoanSMS').value, 'sendReleaseLoanSMS1');"
                                           <?php
                                           if ($sendReleaseLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendReleaseLoanEmail" name="sendReleaseLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendReleaseLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendReleaseLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('REALEASE_LOAN_E', document.getElementById('sendReleaseLoanEmail').value, 'sendReleaseLoanSMS1');"
                                           <?php
                                           if ($sendReleaseLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                             <tr>
                                <?php
                                $checked = "";
                                if ($sendInterestReminderSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendInterestReminderSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendInterestReminderSMS" name="sendInterestReminderSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendInterestReminderSMS" name="sendInterestReminderSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendInterestReminderSMS1" class="checkbox">
                                <input type="checkbox" id="sendInterestReminderSMS" name="sendInterestReminderSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendInterestReminderSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendPendingLaonAuctionSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('INTEREST_REMINDER_S', document.getElementById('sendInterestReminderSMS').value, 'sendInterestReminderSMS1');"
                                       <?php
                                       if ($sendInterestReminderSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> INTEREST_REMINDER
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendInterestReminderWhatsapp" name="sendInterestReminderWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendInterestReminderWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendInterestReminderWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('INTEREST_REMINDER_W', document.getElementById('sendInterestReminderWhatsapp').value, 'sendInterestReminderSMS1');"
                                           <?php
                                           if ($sendInterestReminderWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendInterestReminderSMS" name="sendPendingLaonAuctionSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendInterestReminderSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendInterestReminderSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('INTEREST_REMINDER_S', document.getElementById('sendInterestReminderSMS').value, 'sendInterestReminderSMS1');"
                                           <?php
                                           if ($sendInterestReminderSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendInterestReminderEmail" name="sendInterestReminderEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendInterestReminderEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendInterestReminderEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('INTEREST_REMINDER_E', document.getElementById('sendInterestReminderEmail').value, 'sendInterestReminderSMS1');"
                                           <?php
                                           if ($sendInterestReminderEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                             <tr>
                                <?php
                                $checked = "";
                                if ($sendTransferLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendTransferLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendTransferLoanSMS" name="sendTransferLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendTransferLoanSMS" name="sendTransferLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendTransferLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendTransferLoanSMS" name="sendPendingLaonAuctionSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendTransferLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendTransferLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('TRANSFER_LOAN_S', document.getElementById('sendTransferLoanSMS').value, 'sendTransferLoanSMS1');"
                                       <?php
                                       if ($sendTransferLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> TRANSFER_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendTransferLoanWhatsapp" name="sendTransferLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendTransferLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendTransferLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('TRANSFER_LOAN_W', document.getElementById('sendTransferLoanWhatsapp').value, 'sendTransferLoanSMS1');"
                                           <?php
                                           if ($sendTransferLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendTransferLoanSMS" name="sendTransferLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendTransferLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendTransferLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('TRANSFER_LOAN_S', document.getElementById('sendTransferLoanSMS').value, 'sendTransferLoanSMS1');"
                                           <?php
                                           if ($sendTransferLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendTransferLoanEmail" name="sendTransferLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendTransferLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendTransferLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('TRANSFER_LOAN_E', document.getElementById('sendTransferLoanEmail').value, 'sendTransferLoanSMS1');"
                                           <?php
                                           if ($sendTransferLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                               <tr>
                                <?php
                                $checked = "";
                                if ($sendReleasetransloanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendReleasetransloanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendReleasetransloanSMS" name="sendReleasetransloanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendReleasetransloanSMS" name="sendReleasetransloanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendReleasetransloanSMS1" class="checkbox">
                                <input type="checkbox" id="sendReleasetransloanSMS" name="sendReleasetransloanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendReleasetransloanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendReleasetransloanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('RELEASE_TRANSFER_LOAN_S', document.getElementById('sendReleasetransloanSMS').value, 'sendReleasetransloanSMS1');"
                                       <?php
                                       if ($sendReleasetransloanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> RELEASE_TRANSFER_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendReleasetransloanWhatsapp" name="sendReleasetransloanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendReleasetransloanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendReleasetransloanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_TRANSFER_LOAN_W', document.getElementById('sendReleasetransloanWhatsapp').value, 'sendReleasetransloanSMS1');"
                                           <?php
                                           if ($sendReleasetransloanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendPendingLaonAuctionSMS" name="sendPendingLaonAuctionSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendPendingLaonAuctionSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendPendingLaonAuctionSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_TRANSFER_LOAN_S', document.getElementById('sendPendingLaonAuctionSMS').value, 'sendReleasetransloanSMS1');"
                                           <?php
                                           if ($sendReleasetransloanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendReleasetransloanEmail" name="sendReleasetransloanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendReleasetransloanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendReleasetransloanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_TRANSFER_LOAN_E', document.getElementById('sendReleasetransloanEmail').value, 'sendReleasetransloanSMS1');"
                                           <?php
                                           if ($sendReleasetransloanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendDepositLoanSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendDepositLoanSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendDepositLoanSMS" name="sendDepositLoanSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendDepositLoanSMS" name="sendDepositLoanSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendDepositLoanSMS1" class="checkbox">
                                <input type="checkbox" id="sendDepositLoanSMS" name="sendDepositLoanSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendDepositLoanSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendDepositLoanSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('DEPOSIT_LOAN_S', document.getElementById('sendDepositLoanSMS').value, 'sendDepositLoanSMS1');"
                                       <?php
                                       if ($sendDepositLoanSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> DEPOSIT_LOAN
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendDepositLoanWhatsapp" name="sendDepositLoanWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendDepositLoanWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendDepositLoanWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DEPOSIT_LOAN_W', document.getElementById('sendDepositLoanWhatsapp').value, 'sendDepositLoanSMS1');"
                                           <?php
                                           if ($sendDepositLoanWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendDepositLoanSMS" name="sendDepositLoanSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendDepositLoanSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendDepositLoanSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DEPOSIT_LOAN_S', document.getElementById('sendDepositLoanSMS').value, 'sendDepositLoanSMS1');"
                                           <?php
                                           if ($sendDepositLoanSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendDepositLoanEmail" name="sendDepositLoanEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendDepositLoanEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendDepositLoanEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DEPOSIT_LOAN_E', document.getElementById('sendDepositLoanEmail').value, 'sendDepositLoanSMS1');"
                                           <?php
                                           if ($sendDepositLoanEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendRelesePrincipalSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendRelesePrincipalSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendRelesePrincipalSMS" name="sendRelesePrincipalSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendRelesePrincipalSMS" name="sendRelesePrincipalSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendRelesePrincipalSMS1" class="checkbox">
                                <input type="checkbox" id="sendRelesePrincipalSMS" name="sendRelesePrincipalSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendRelesePrincipalSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendRelesePrincipalSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('RELEASE_PRINCIPAL_S', document.getElementById('sendRelesePrincipalSMS').value, 'sendRelesePrincipalSMS1');"
                                       <?php
                                       if ($sendRelesePrincipalSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> RELEASE_PRINCIPAL
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendRelesePrincipalWhatsapp" name="sendRelesePrincipalWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendRelesePrincipalWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendRelesePrincipalWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_PRINCIPAL_W', document.getElementById('sendRelesePrincipalWhatsapp').value, 'sendRelesePrincipalSMS1');"
                                           <?php
                                           if ($sendRelesePrincipalWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendRelesePrincipalSMS" name="sendRelesePrincipalSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendRelesePrincipalSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendRelesePrincipalSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_PRINCIPAL_S', document.getElementById('sendRelesePrincipalSMS').value, 'sendRelesePrincipalSMS1');"
                                           <?php
                                           if ($sendRelesePrincipalSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendRelesePrincipalEmail" name="sendRelesePrincipalEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendRelesePrincipalEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendRelesePrincipalEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('RELEASE_PRINCIPAL_E', document.getElementById('sendRelesePrincipalEmail').value, 'sendRelesePrincipalSMS1');"
                                           <?php
                                           if ($sendRelesePrincipalEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $checked = "";
                                if ($sendOtpSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendOtpSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendOtpSMS" name="sendOtpSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendOtpSMS" name="sendOtpSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendOtpSMS1" class="checkbox">
                                <input type="checkbox" id="sendOtpSMS" name="sendOtpSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendOtpSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendOtpSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('SEND_OTP_S', document.getElementById('sendOtpSMS').value, 'sendOtpSMS1');"
                                       <?php
                                       if ($sendOtpSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> SEND_OTP
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendOtpWhatsapp" name="sendOtpWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendOtpWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendOtpWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SEND_OTP_W', document.getElementById('sendOtpWhatsapp').value, 'sendOtpSMS1');"
                                           <?php
                                           if ($sendOtpWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendOtpSMS" name="sendOtpSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendOtpSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendOtpSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SEND_OTP_S', document.getElementById('sendOtpSMS').value, 'sendOtpSMS1');"
                                           <?php
                                           if ($sendOtpSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendOtpEmail" name="sendOtpEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendOtpEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendOtpEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SEND_OTP_E', document.getElementById('sendOtpEmail').value, 'sendOtpSMS1');"
                                           <?php
                                           if ($sendOtpEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"> <div style=" font-size: 16px;font-weight: bold;color:#800000;"> Ecommerce sms : </div></td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendNewRegistrationSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendNewRegistrationSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendNewRegistrationSMS" name="sendNewRegistrationSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendNewRegistrationSMS" name="sendNewRegistrationSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendNewRegistrationSMS1" class="checkbox">
                                <input type="checkbox" id="sendNewRegistrationSMS" name="sendNewRegistrationSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendNewRegistrationSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendNewRegistrationSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('NEW_REGISTRATION_S', document.getElementById('sendNewRegistrationSMS').value, 'sendNewRegistrationSMS1');"
                                       <?php
                                       if ($sendNewRegistrationSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> NEW_REGISTRATION
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendNewRegistrationWhatsapp" name="sendNewRegistrationWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendNewRegistrationWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendNewRegistrationWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('NEW_REGISTRATION_W', document.getElementById('sendNewRegistrationWhatsapp').value, 'sendNewRegistrationSMS1');"
                                           <?php
                                           if ($sendNewRegistrationWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendNewRegistrationSMS" name="sendNewRegistrationSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendNewRegistrationSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendNewRegistrationSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('NEW_REGISTRATION_S', document.getElementById('sendNewRegistrationSMS').value, 'sendNewRegistrationSMS1');"
                                           <?php
                                           if ($sendNewRegistrationSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendNewRegistrationEmail" name="sendNewRegistrationEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendNewRegistrationEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendNewRegistrationEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('NEW_REGISTRATION_E', document.getElementById('sendNewRegistrationEmail').value, 'sendNewRegistrationSMS1');"
                                           <?php
                                           if ($sendNewRegistrationEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendAddNewSchemeSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendAddNewSchemeSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendAddNewSchemeSMS" name="sendAddNewSchemeSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendAddNewSchemeSMS" name="sendAddNewSchemeSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendAddNewSchemeSMS1" class="checkbox">
                                <input type="checkbox" id="sendAddNewSchemeSMS" name="sendAddNewSchemeSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendAddNewSchemeSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendAddNewSchemeSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('ADD_NEW_SCHEME_S', document.getElementById('sendAddNewSchemeSMS').value, 'sendAddNewSchemeSMS1');"
                                       <?php
                                       if ($sendAddNewSchemeSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> ADD_NEW_SCHEME
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendAddNewSchemeWhatsapp" name="sendAddNewSchemeWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendAddNewSchemeWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendAddNewSchemeWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_NEW_SCHEME_W', document.getElementById('sendAddNewSchemeWhatsapp').value, 'sendAddNewSchemeSMS1');"
                                           <?php
                                           if ($sendAddNewSchemeWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendAddNewSchemeSMS" name="sendAddNewSchemeSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendAddNewSchemeSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendAddNewSchemeSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_NEW_SCHEME_S', document.getElementById('sendAddNewSchemeSMS').value, 'sendAddNewSchemeSMS1');"
                                           <?php
                                           if ($sendAddNewSchemeSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendAddNewSchemeEmail" name="sendAddNewSchemeEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendAddNewSchemeEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendAddNewSchemeEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ADD_NEW_SCHEME_E', document.getElementById('sendAddNewSchemeEmail').value, 'sendAddNewSchemeSMS1');"
                                           <?php
                                           if ($sendAddNewSchemeEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendSchemeEmiPaySMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendSchemeEmiPaySMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendSchemeEmiPaySMS" name="sendSchemeEmiPaySMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendSchemeEmiPaySMS" name="sendSchemeEmiPaySMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendSchemeEmiPaySMS1" class="checkbox">
                                <input type="checkbox" id="sendSchemeEmiPaySMS" name="sendSchemeEmiPaySMS" onclick="if (!this.checked) {
                                            document.getElementById('sendSchemeEmiPaySMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendSchemeEmiPaySMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('SCHEME_EMI_PAY_S', document.getElementById('sendSchemeEmiPaySMS').value, 'sendSchemeEmiPaySMS1');"
                                       <?php
                                       if ($sendSchemeEmiPaySMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> SCHEME_EMI_PAY
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendSchemeEmiPayWhatsapp" name="sendSchemeEmiPayWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiPayWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiPayWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_PAY_W', document.getElementById('sendSchemeEmiPayWhatsapp').value, 'sendSchemeEmiPaySMS1');"
                                           <?php
                                           if ($sendSchemeEmiPayWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendSchemeEmiPaySMS" name="sendSchemeEmiPaySMS" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiPaySMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiPaySMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_PAY_S', document.getElementById('sendSchemeEmiPaySMS').value, 'sendSchemeEmiPaySMS1');"
                                           <?php
                                           if ($sendSchemeEmiPaySMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendSchemeEmiPayEmail" name="sendSchemeEmiPayEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiPayEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiPayEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_PAY_E', document.getElementById('sendSchemeEmiPayEmail').value, 'sendSchemeEmiPaySMS1');"
                                           <?php
                                           if ($sendSchemeEmiPayEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendSchemeEmiReminderSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendSchemeEmiReminderSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendSchemeEmiReminderSMS" name="sendSchemeEmiReminderSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendSchemeEmiReminderSMS" name="sendSchemeEmiReminderSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendSchemeEmiReminderSMS1" class="checkbox">
                                <input type="checkbox" id="sendSchemeEmiReminderSMS" name="sendSchemeEmiReminderSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendSchemeEmiReminderSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendSchemeEmiReminderSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('SCHEME_EMI_REMINDER_S', document.getElementById('sendSchemeEmiReminderSMS').value, 'sendSchemeEmiReminderSMS1');"
                                       <?php
                                       if ($sendSchemeEmiReminderSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> SCHEME_EMI_REMINDER
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendSchemeEmiReminderWhatsapp" name="sendSchemeEmiReminderWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiReminderWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiReminderWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_REMINDER_W', document.getElementById('sendSchemeEmiReminderWhatsapp').value, 'sendSchemeEmiReminderSMS1');"
                                           <?php
                                           if ($sendSchemeEmiReminderWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendSchemeEmiReminderSMS" name="sendSchemeEmiReminderSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiReminderSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiReminderSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_REMINDER_S', document.getElementById('sendSchemeEmiReminderSMS').value, 'sendSchemeEmiReminderSMS1');"
                                           <?php
                                           if ($sendSchemeEmiReminderSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendSchemeEmiReminderEmail" name="sendSchemeEmiReminderEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendSchemeEmiReminderEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendSchemeEmiReminderEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SCHEME_EMI_REMINDER_E', document.getElementById('sendSchemeEmiReminderEmail').value, 'sendSchemeEmiReminderSMS1');"
                                           <?php
                                           if ($sendSchemeEmiReminderEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendCloseSchemeSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendCloseSchemeSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendCloseSchemeSMS" name="sendCloseSchemeSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendCloseSchemeSMS" name="sendCloseSchemeSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendCloseSchemeSMS1" class="checkbox">
                                <input type="checkbox" id="sendCloseSchemeSMS" name="sendCloseSchemeSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendCloseSchemeSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendCloseSchemeSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('CLOSE_SCHEME_S', document.getElementById('sendCloseSchemeSMS').value, 'sendCloseSchemeSMS1');"
                                       <?php
                                       if ($sendCloseSchemeSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> CLOSE_SCHEME
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendCloseSchemeWhatsapp" name="sendCloseSchemeWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendCloseSchemeWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendCloseSchemeWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('CLOSE_SCHEME_W', document.getElementById('sendCloseSchemeWhatsapp').value, 'sendCloseSchemeSMS1');"
                                           <?php
                                           if ($sendCloseSchemeWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendCloseSchemeSMS" name="sendCloseSchemeSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendCloseSchemeSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendCloseSchemeSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('CLOSE_SCHEME_S', document.getElementById('sendCloseSchemeSMS').value, 'sendCloseSchemeSMS1');"
                                           <?php
                                           if ($sendCloseSchemeSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendCloseSchemeEmail" name="sendCloseSchemeEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendCloseSchemeEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendCloseSchemeEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('CLOSE_SCHEME_E', document.getElementById('sendCloseSchemeEmail').value, 'sendCloseSchemeSMS1');"
                                           <?php
                                           if ($sendCloseSchemeEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendLoanReleaseSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendLoanReleaseSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendLoanReleaseSMS" name="sendLoanReleaseSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendLoanReleaseSMS" name="sendLoanReleaseSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendLoanReleaseSMS1" class="checkbox">
                                <input type="checkbox" id="sendLoanReleaseSMS" name="sendLoanReleaseSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendLoanReleaseSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendLoanReleaseSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('LOAN_RELEASE_S', document.getElementById('sendLoanReleaseSMS').value, 'sendLoanReleaseSMS1');"
                                       <?php
                                       if ($sendLoanReleaseSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> LOAN_RELEASE
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendLoanReleaseWhatsapp" name="sendLoanReleaseWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanReleaseWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanReleaseWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_RELEASE_W', document.getElementById('sendLoanReleaseWhatsapp').value, 'sendLoanReleaseSMS1');"
                                           <?php
                                           if ($sendLoanReleaseWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendLoanReleaseSMS" name="sendLoanReleaseSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanReleaseSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanReleaseSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_RELEASE_S', document.getElementById('sendLoanReleaseSMS').value, 'sendLoanReleaseSMS1');"
                                           <?php
                                           if ($sendLoanReleaseSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendLoanReleaseEmail" name="sendLoanReleaseEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanReleaseEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanReleaseEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_RELEASE_E', document.getElementById('sendLoanReleaseEmail').value, 'sendLoanReleaseSMS1');"
                                           <?php
                                           if ($sendLoanReleaseEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendLoanInterestPaySMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendLoanInterestPaySMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendLoanInterestPaySMS" name="sendLoanInterestPaySMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendLoanInterestPaySMS" name="sendLoanInterestPaySMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendLoanInterestPaySMS1" class="checkbox">
                                <input type="checkbox" id="sendLoanInterestPaySMS" name="sendLoanInterestPaySMS" onclick="if (!this.checked) {
                                            document.getElementById('sendLoanInterestPaySMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendLoanInterestPaySMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('LOAN_INTEREST_PAY_S', document.getElementById('sendLoanInterestPaySMS').value, 'sendLoanInterestPaySMS1');"
                                       <?php
                                       if ($sendLoanInterestPaySMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> LOAN_INTEREST_PAY
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendLoanInterestPayWhatsapp" name="sendLoanInterestPayWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanInterestPayWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanInterestPayWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_INTEREST_PAY_W', document.getElementById('sendLoanInterestPayWhatsapp').value, 'sendLoanInterestPaySMS1');"
                                           <?php
                                           if ($sendLoanInterestPayWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendLoanInterestPaySMS" name="sendLoanInterestPaySMS" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanInterestPaySMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanInterestPaySMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_INTEREST_PAY_S', document.getElementById('sendLoanInterestPaySMS').value, 'sendLoanInterestPaySMS1');"
                                           <?php
                                           if ($sendLoanInterestPaySMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendLoanInterestPayEmail" name="sendLoanInterestPayEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendLoanInterestPayEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendLoanInterestPayEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('LOAN_INTEREST_PAY_E', document.getElementById('sendLoanInterestPayEmail').value, 'sendLoanInterestPaySMS1');"
                                           <?php
                                           if ($sendLoanInterestPayEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendPasswordChangeSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendPasswordChangeSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendPasswordChangeSMS" name="sendPasswordChangeSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendPasswordChangeSMS" name="sendPasswordChangeSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendPasswordChangeSMS1" class="checkbox">
                                <input type="checkbox" id="sendPasswordChangeSMS" name="sendPasswordChangeSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendPasswordChangeSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendPasswordChangeSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('PASSWORD_CHANGE_S', document.getElementById('sendPasswordChangeSMS').value, 'sendPasswordChangeSMS1');"
                                       <?php
                                       if ($sendPasswordChangeSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> PASSWORD_CHANGE
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendPasswordChangeWhatsapp" name="sendPasswordChangeWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendPasswordChangeWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendPasswordChangeWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('PASSWORD_CHANGE_W', document.getElementById('sendPasswordChangeWhatsapp').value, 'sendPasswordChangeSMS1');"
                                           <?php
                                           if ($sendPasswordChangeWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendPasswordChangeSMS" name="sendPasswordChangeSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendPasswordChangeSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendPasswordChangeSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('PASSWORD_CHANGE_S', document.getElementById('sendPasswordChangeSMS').value, 'sendPasswordChangeSMS1');"
                                           <?php
                                           if ($sendPasswordChangeSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendPasswordChangeEmail" name="sendPasswordChangeEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendPasswordChangeEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendPasswordChangeEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('PASSWORD_CHANGE_E', document.getElementById('sendPasswordChangeEmail').value, 'sendPasswordChangeSMS1');"
                                           <?php
                                           if ($sendPasswordChangeEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendUdharPaySMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendUdharPaySMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendUdharPaySMS" name="sendUdharPaySMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendUdharPaySMS" name="sendUdharPaySMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendUdharPaySMS1" class="checkbox">
                                <input type="checkbox" id="sendUdharPaySMS" name="sendUdharPaySMS" onclick="if (!this.checked) {
                                            document.getElementById('sendUdharPaySMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendUdharPaySMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('UDHAR_PAY_S', document.getElementById('sendUdharPaySMS').value, 'sendUdharPaySMS1');"
                                       <?php
                                       if ($sendUdharPaySMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> UDHAAR_PAY
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendUdharPayWhatsapp" name="sendUdharPayWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendUdharPayWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendUdharPayWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UDHAR_PAY_W', document.getElementById('sendUdharPayWhatsapp').value, 'sendUdharPaySMS1');"
                                           <?php
                                           if ($sendUdharPayWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendUdharPaySMS" name="sendUdharPaySMS" onclick="if (!this.checked) {
                                                document.getElementById('sendUdharPaySMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendUdharPaySMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UDHAR_PAY_S', document.getElementById('sendUdharPaySMS').value, 'sendUdharPaySMS1');"
                                           <?php
                                           if ($sendUdharPaySMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendUdharPayEmail" name="sendUdharPayEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendUdharPayEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendUdharPayEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('UDHAR_PAY_E', document.getElementById('sendUdharPayEmail').value, 'sendUdharPaySMS1');"
                                           <?php
                                           if ($sendUdharPayEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendSellProductSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendSellProductSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendSellProductSMS" name="sendSellProductSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendSellProductSMS" name="sendSellProductSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendSellProductSMS1" class="checkbox">
                                <input type="checkbox" id="sendSellProductSMS" name="sendSellProductSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendSellProductSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendSellProductSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('SELL_PRODUCT_S', document.getElementById('sendSellProductSMS').value, 'sendSellProductSMS1');"
                                       <?php
                                       if ($sendSellProductSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> SELL_PRODUCT
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendSellProductWhatsapp" name="sendSellProductWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendSellProductWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendSellProductWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SELL_PRODUCT_W', document.getElementById('sendSellProductWhatsapp').value, 'sendSellProductSMS1');"
                                           <?php
                                           if ($sendSellProductWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendSellProductSMS" name="sendSellProductSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendSellProductSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendSellProductSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SELL_PRODUCT_S', document.getElementById('sendSellProductSMS').value, 'sendSellProductSMS1');"
                                           <?php
                                           if ($sendSellProductSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendSellProductEmail" name="sendSellProductEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendSellProductEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendSellProductEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('SELL_PRODUCT_E', document.getElementById('sendSellProductEmail').value, 'sendSellProductSMS1');"
                                           <?php
                                           if ($sendSellProductEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendOrderTodayDeliveredSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendOrderTodayDeliveredSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendOrderTodayDeliveredSMS" name="sendOrderTodayDeliveredSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendOrderTodayDeliveredSMS" name="sendOrderTodayDeliveredSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendOrderTodayDeliveredSMS1" class="checkbox">
                                <input type="checkbox" id="sendOrderTodayDeliveredSMS" name="sendOrderTodayDeliveredSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendOrderTodayDeliveredSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendOrderTodayDeliveredSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('ORDER_TODAY_DELIVERED_S', document.getElementById('sendOrderTodayDeliveredSMS').value, 'sendOrderTodayDeliveredSMS1');"
                                       <?php
                                       if ($sendOrderTodayDeliveredSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> ORDER_TODAY_DELIVERED
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendOrderTodayDeliveredWhatsapp" name="sendOrderTodayDeliveredWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendOrderTodayDeliveredWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendOrderTodayDeliveredWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ORDER_TODAY_DELIVERED_W', document.getElementById('sendOrderTodayDeliveredWhatsapp').value, 'sendOrderTodayDeliveredSMS1');"
                                           <?php
                                           if ($sendOrderTodayDeliveredWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendOrderTodayDeliveredSMS" name="sendOrderTodayDeliveredSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendOrderTodayDeliveredSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendOrderTodayDeliveredSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ORDER_TODAY_DELIVERED_S', document.getElementById('sendOrderTodayDeliveredSMS').value, 'sendOrderTodayDeliveredSMS1');"
                                           <?php
                                           if ($sendOrderTodayDeliveredSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendOrderTodayDeliveredEmail" name="sendOrderTodayDeliveredEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendOrderTodayDeliveredEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendOrderTodayDeliveredEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('ORDER_TODAY_DELIVERED_E', document.getElementById('sendOrderTodayDeliveredEmail').value, 'sendOrderTodayDeliveredSMS1');"
                                           <?php
                                           if ($sendOrderTodayDeliveredEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendDeliveredProductSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendDeliveredProductSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendDeliveredProductSMS" name="sendDeliveredProductSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendDeliveredProductSMS" name="sendDeliveredProductSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendDeliveredProductSMS1" class="checkbox">
                                <input type="checkbox" id="sendDeliveredProductSMS" name="sendDeliveredProductSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendDeliveredProductSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendDeliveredProductSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('DELIVERD_PRODUCT_S', document.getElementById('sendDeliveredProductSMS').value, 'sendDeliveredProductSMS1');"
                                       <?php
                                       if ($sendDeliveredProductSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> DELIVERED_PRODUCT
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendDeliveredProductWhatsapp" name="sendDeliveredProductWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendDeliveredProductWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeliveredProductWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELIVERD_PRODUCT_W', document.getElementById('sendDeliveredProductWhatsapp').value, 'sendDeliveredProductSMS1');"
                                           <?php
                                           if ($sendDeliveredProductWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendDeliveredProductSMS" name="sendDeliveredProductSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendDeliveredProductSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeliveredProductSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELIVERD_PRODUCT_S', document.getElementById('sendDeliveredProductSMS').value, 'sendDeliveredProductSMS1');"
                                           <?php
                                           if ($sendDeliveredProductSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendDeliveredProductEmail" name="sendDeliveredProductEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendDeliveredProductEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendDeliveredProductEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('DELIVERD_PRODUCT_E', document.getElementById('sendDeliveredProductEmail').value, 'sendDeliveredProductSMS1');"
                                           <?php
                                           if ($sendDeliveredProductEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>
                            
                                <?php
                                $checked = "";
                                if ($sendGetReferalPointSMS == 'YES') {
                                    $checked = "checked";
                                } else {
                                    $checked = "unchecked";
                                }
                                ?>
                                <?php
                                if ($sendGetReferalPointSMS == 'YES') {
                                    ?>
                                <input type="hidden" id="sendGetReferalPointSMS" name="sendGetReferalPointSMS" value="YES" class="checkbox">
                            <?php } else {
                                ?>
                                <input type="hidden" id="sendGetReferalPointSMS" name="sendGetReferalPointSMS" value="NO" class="checkbox">
                            <?php } ?>
                            <td align="left" width="60%" class="ff_calibri fs_14 brown">
                                <input type="hidden" id="sendGetReferalPointSMS1" class="checkbox">
                                <input type="checkbox" id="sendGetReferalPointSMS" name="sendGetReferalPointSMS" onclick="if (!this.checked) {
                                            document.getElementById('sendGetReferalPointSMS').value = 'NO';
                                        } else {
                                            document.getElementById('sendGetReferalPointSMS').value = 'YES';
                                        }" onchange="setLayoutFieldInDb('GET_REERAL_POINT_S', document.getElementById('sendGetReferalPointSMS').value, 'sendGetReferalPointSMS1');"
                                       <?php
                                       if ($sendGetReferalPointSMS == 'YES') {
                                           echo 'checked';
                                       }
                                       ?>/> GET_REERAL_POINT
                            </td>
                            <td align="center" width="15%">
                                    <input type="checkbox" id="sendGetReferalPointWhatsapp" name="sendGetReferalPointWhatsapp" onclick="if (!this.checked) {
                                                document.getElementById('sendGetReferalPointWhatsapp').value = 'NO';
                                            } else {
                                                document.getElementById('sendGetReferalPointWhatsapp').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('GET_REERAL_POINT_W', document.getElementById('sendGetReferalPointWhatsapp').value, 'sendGetReferalPointSMS1');"
                                           <?php
                                           if ($sendGetReferalPointWhatsapp == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="12%">
                                    <input type="checkbox" id="sendGetReferalPointSMS" name="sendGetReferalPointSMS" onclick="if (!this.checked) {
                                                document.getElementById('sendGetReferalPointSMS').value = 'NO';
                                            } else {
                                                document.getElementById('sendGetReferalPointSMS').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('GET_REERAL_POINT_S', document.getElementById('sendGetReferalPointSMS').value, 'sendGetReferalPointSMS1');"
                                           <?php
                                           if ($sendGetReferalPointSMS == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                                <td align="center" width="13%">
                                    <input type="checkbox" id="sendGetReferalPointEmail" name="sendGetReferalPointEmail" onclick="if (!this.checked) {
                                                document.getElementById('sendGetReferalPointEmail').value = 'NO';
                                            } else {
                                                document.getElementById('sendGetReferalPointEmail').value = 'YES';
                                            }" onchange="setLayoutFieldInDb('GET_REERAL_POINT_E', document.getElementById('sendGetReferalPointEmail').value, 'sendGetReferalPointSMS1');"
                                           <?php
                                           if ($sendGetReferalPointEmail == 'YES') {
                                               echo 'checked';
                                           }
                                           ?>/>
                                </td>
                            </tr>
                            <tr>

                            </tr> 
                        </table>
                        </div>
                    </td>
                  


        </tr>
    </table>
                
</td>
<!-- CODE ADDED FOR AUTO SMS TEMPLATE BY SONALI 14-SEP-2023-->
</tr>
</table>
<br>
<?php
include 'omdatatablesUnset.php';
$dataTableColumnsFields = array(
    array('dt' => 'S.NO.'),
    array('dt' => 'TEMPLATE ID '),
    array('dt' => 'TEMPLATE TEXT')
);

$_SESSION['dataTableColumnsFields'] = $dataTableColumnsFields;
$_SESSION['tableName'] = 'sms_templates'; // Table Name
$_SESSION['tableNamePK'] = 'smtp_id'; // Primary Key
$dbColumnsArray = array(
    "smtp_id",
    "smtp_sub",
    "smtp_text"
);
$_SESSION['dbColumnsArray'] = $dbColumnsArray;  // No Change
$_SESSION['dtSumColumn'] = '';
$_SESSION['dtDeleteColumn'] = '';
//
//
// Extra direct columns we need pass in SQL Query
$_SESSION['sqlQueryColumns'] = "";
//
//
// start code to include all session@auth:ATHU29may17
$_SESSION['colorfulColumn'] = "";
$_SESSION['colorfulColumnCheck'] = '';
$_SESSION['colorfulColumnTitle'] = '';
//
//
// On Click Function Parameters
$_SESSION['onclickColumnImage'] = "";
$_SESSION['onclickColumn'] = "smtp_sub"; // On which column
$_SESSION['onclickColumnId'] = "";
$_SESSION['onclickColumnValue'] = "";
$_SESSION['onclickColumnFunction'] = "smsUpdatePopup";
$_SESSION['onclickColumnFunctionPara1'] = "smtp_id";
$_SESSION['onclickColumnFunctionPara2'] = "";
$_SESSION['onclickColumnFunctionPara3'] = "";
$_SESSION['onclickColumnFunctionPara4'] = "";
$_SESSION['onclickColumnFunctionPara5'] = "";
$_SESSION['onclickColumnFunctionPara6'] = "";
//
//
// Delete Function Parameters
$_SESSION['deleteColumn'] = ""; // On which columny
$_SESSION['deleteColumnId'] = "";
$_SESSION['deleteColumnValue'] = "";
$_SESSION['deleteColumnFunction'] = "";
$_SESSION['deleteColumnFunctionPara1'] = ""; // Panel Name
$_SESSION['deleteColumnFunctionPara2'] = "";
$_SESSION['deleteColumnFunctionPara3'] = "";
$_SESSION['deleteColumnFunctionPara4'] = "";
$_SESSION['deleteColumnFunctionPara5'] = "";
$_SESSION['deleteColumnFunctionPara6'] = "";
//
//
// Where Clause Condition 
$_SESSION['tableWhere'] = "";
//
//
// Table Joins
$_SESSION['tableJoin'] = "";
//
if ($staff_own_id != '') {

    $queryStaff = "SELECT omly_value FROM omlayout WHERE omly_option = 'smstemplatebystaff'";
    $resStaff = mysqli_query($conn, $queryStaff);
    $rowStaff = mysqli_fetch_array($resStaff);
    $staffShoworhide = $rowStaff['omly_value'];
    if ($staffShoworhide == 'show' || $staffShoworhide == '' || $staffShoworhide == null) {
        $_SESSION['tableWhere'] = "smtp_staff_id='$staff_own_id'";
    }
}
//
// Data Table Main File
include 'omdatatables.php';
?>
</div>
