<?php
/*
 * Created on 06-Feb-2011 7:06:16 PM
 *
 * @FileName: omcdcddv.php
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
$currentFileName = 'omcccslt.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
if ($custId == NULL || $custId == '')
    $custId = $_GET['custId'];
//
if ($custPanelOption == NULL || $custPanelOption == '')
    $custPanelOption = $_GET['custPanelOption'];
//echo '$custPanelOption =='.$custPanelOption;
if ($panel == NULL || $panel == '')
    $panel = $_GET['panel'];
//echo '$panel =='.$panel;
//****************************Start code to change Nominee insertion in customer Author:@SANT12JUN16*****************
$custPanel = $_GET['custPanel'];
$qSelectCust = "SELECT * FROM user WHERE user_id='$custId'"; //To display data in this form
$resCust = mysqli_query($conn, $qSelectCust);
$rowCust = mysqli_fetch_array($resCust);
?>
<!-------------Start code to change file to add custInfo panel @Author:PRIYA08APR14----------->

<?php
/* * *********Start code to add code girviNoticeLay @Author:GANGADHAR04NOV2020************ */
$girviNoticeLay = callOmLayoutTable('girviNoticeLay', '', '');
if ($girviNoticeLay == 'girviNoticeLay4Inch' || $girviNoticeLay == 'girviNoticeLayA6') {
    $girviNoticeWidth = 420;
    $girviNoticeHeight = 660;
} else {
    $girviNoticeWidth = 550;
    $girviNoticeHeight = 630;
}
// echo '$girviNoticeLay = '.$girviNoticeLay;
/* * *********End code to add code @Author:PRIYA23APR14************ */
/* * *******Start Code To add condition @Author:PRIYA19MAY14**** */
/* * *********Start code to change width @Author:PRIYA26JUL14****************** */
$selFormsLayoutDet = "SELECT cuno_default_size FROM customized_notice WHERE cuno_own_id='$_SESSION[sessionOwnerId]' order by cuno_id asc";
$resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
$rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
$cuno_default_size = $rowFormsLayoutDet['cuno_default_size'];
if ($cuno_default_size == 'custmNoticeLay4Inch' || $cuno_default_size == 'custmNoticeLayA6') {
    $customNoticeWidth = 420;
    $customNoticeHeight = 660;
} else if ($cuno_default_size == 'custmNotA5size2') {
    $customNoticeWidth = 1100;
    $customNoticeHeight = 1430;
} else {
    $customNoticeWidth = 550;
    $customNoticeHeight = 680;
}
?>
<!--/*         * *********End code to add code girviNoticeLay @Author:GANGADHAR04NOV2020************ */-->
<div id="display_loan_notice_lang" class="display_loan_notice_lang"></div>
<div id="main_middle" class="main_middle">
    <div id="customer_info_main_middle">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
<!--            <tr>
                <td align="right" colspan="3">
                    <hr color="#B8860B" />
                </td>
            </tr>-->
            <tr>
                <td colspan="3" align="left">
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <tr class="noPrint">
                            <td valign="middle" align="left" width="34px">
                                <div class="analysis_div_rows"><img src="<?php echo $documentRoot; ?>/images/adduser32.png"
                                                                    alt="" onload="document.update_customer.customerType.focus();
                                                                        initFormName('update_customer', 'updateCustomer');"/></div>
                            </td>
                            <td valign="middle" align="left">
                                <div class="textLabelHeading" id="userType">
                                    <b> <?php if ($custPanel == 'comment') { ?>
                                            COMMENTS 
                                        <?php } else { ?>
                                            STAFF
                                        <?php } ?></b>
                                </div>
                            </td>
                            <td align="center">
                                <?php
                                $showUpdateDiv = $_GET['updateMess'];

                                if ($showUpdateDiv == "CustomerUpdated") {
                                    include 'omzaaumg.php';
                                }
                                ?>
                                <?php
                                include 'omzaajll.php';
                                ?>
                            </td>
                            <td align="right"> 
                                <div id="ajaxLoadSrchCustToAddGirviDiv" style="visibility: hidden">
                                    <?php include 'omzaajld.php'; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellspacing="0" cellpadding="1" width="100%">
<!--                        <tr>
                            <td colspan="11">
                                <div class="hrGrey"></div>
                            </td>
                        </tr>-->
                        <?php
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO CHANGE THE MENU HEADER MENU DESIGN INSIDE CUSTOMER HOME @AUTHOR:MADHUREE-06MAY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
                        ?>
                        <tr>
                            <td colspan="11">
                                <div class="m-portlet__body">
                                    <ul class="nav nav-pills nav-pills--warning nav-fill" role="tablist" style="height: 26px;background:#ebedf2;">
                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:20px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"
                                                    style="font-size: 16px;" onclick="masterStock('<?php echo $custId; ?>', 'masterStock');">
                                                MASTER
                                            </button>
                                        </li>

                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:35px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"
                                                    style="font-size: 16px;" onclick="addShares('addShares');">
                                                ADD SHARES
                                            </button>
                                        </li>
                                        <?php if ($_SESSION['sessionProdName'] != 'OMRETL') { ?>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:65px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"rawStockPanel
                                                        style="font-size: 16px;" onclick="getLoyaltyCardNo('loyaltyCardNo');">
                                                    ADD LOYALTY POINTS
                                                </button>
                                            </li>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:35px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"
                                                        style="font-size: 16px;" onclick="getLoyaltyPoints('loyaltyPoints');">
                                                    LOYALTY POINTS
                                                </button>
                                            </li>
                                        <?php } ?>
                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:0px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                    onclick="getAddNominee('AddNominee');"
                                                    style="font-size: 16px;" >
                                                NOMINEE
                                            </button>
                                        </li>
                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:0px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                    onclick="getCustomerDetails('CustInfo');"
                                                    style="font-size: 16px;" >
                                                INFO
                                            </button>
                                        </li>
                                        <?php
                                        $qSelectCust = "SELECT * FROM user WHERE user_type='CUSTOMER' and user_id='$custId' and user_nominee_cust_id !=''"; //To display data in this form
                                        $resPubCustomer = mysqli_query($conn, $qSelectCust) or die(mysqli_error($conn));
                                        $totalNextCustomer = mysqli_num_rows($resPubCustomer);
                                        if ($totalNextCustomer > 0) {
                                            ?>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:0px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                        onclick="getNomineeDetails('CustNomineeInfo');"
                                                        style="font-size: 16px;" >
                                                    NOMINEES
                                                </button>
                                            </li>
                                        <?php } ?>
                                        <?php if ($custPanel == 'comment') { ?>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:20px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                        onclick="getCustCommentDiv('<?php echo $custId; ?>', 'CustInfo');"
                                                        style="font-size: 16px;" >
                                                    COMMENT
                                                </button>

                                                <button type="button" class="nav-link-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item" data-toggle="tab" onclick="getLoanNoticeSelect('<?php echo $custId; ?>', '<?php echo $girviId; ?>', '<?php echo "$totalPrincipalAmount"; ?>', '<?php echo "$totalFinalInterest"; ?>',
                                                                '<?php echo "$totalAmount"; ?>', '<?php echo "$customNoticeWidth"; ?>', '<?php echo "$customNoticeHeight"; ?>');">CUTOMIZED NOTICE</a>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:20px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                        onclick="getCustCommentDiv('<?php echo $custId; ?>', 'comment');"
                                                        style="font-size: 16px;" >
                                                    COMMENT
                                                </button>

                                                <button type="button" class="nav-link-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item" data-toggle="tab" onclick="getLoanNoticeSelect('<?php echo $custId; ?>', '<?php echo $girviId; ?>', '<?php echo "$totalPrincipalAmount"; ?>', '<?php echo "$totalFinalInterest"; ?>',
                                                                '<?php echo "$totalAmount"; ?>', '<?php echo "$customNoticeWidth"; ?>', '<?php echo "$customNoticeHeight"; ?>');">CUTOMIZED NOTICE</a>
                                                </div>
                                            </li>


                                        <?php } ?>
                                        <?php //if ($prodBuildVersion == 'Development') {  ?>
                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #ebedf2; width:20px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"  
                                                    onclick="navigatationPanelByFileName('supportTicketPanelDiv', 'omcsuppticket', 'supportTicketList', '', '', '', '', '', '<?php echo $custId; ?>');"
                                                    style="font-size: 16px;" >
                                                SUPPORT
                                            </button>
                                            <button type="button" class="nav-link-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-toggle="tab" onclick="navigatationPanelByFileName('supportTicketPanelDiv', 'omcsuppticket', 'AddSupportTicket', '', '', '', '', '', '<?php echo $custId; ?>');">ADD TICKET</a>
                                                <a class="dropdown-item" data-toggle="tab" onclick="navigatationPanelByFileName('supportTicketPanelDiv', 'omcsuppticket', 'supportTicketList', '', '', '', '', '', '<?php echo $custId; ?>');">SUPPORT TICKET LIST</a>
                                            </div>
                                        </li>
                                        <?php //}  ?>
                                        <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #7FFF00; width:20px;">
                                            <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false" 
                                            <?php if ($staffId == '' || ($staffId != '' && $array['updateTransactionForAllPanel'] == 'true')) { ?>
                                                        onclick="navigatationPanelByFileName('cust_middle_body', 'omcdcdfu', '', '', '', '', '', '', '<?php echo $custId; ?>');"
                                                    <?php } ?>
                                                    style="font-size: 16px;" >
                                                UPDATE
                                            </button>
                                        </li>
                                        <?php
                                        parse_str(getTableValues("SELECT acc_panel FROM access WHERE acc_own_id='$sessionOwnerId' and acc_emp_id='$staffId' and acc_check_id='staffTransAccess'"));
                                        if ($staffLoginId != '' && $acc_panel == 'staffAllTransReadOnly' && $staffId != $staffLoginId) {
                                            echo '';
                                        } else {
                                            ?>
                                            <li class="nav-item dropdown" style="border-radius: 4px !important; background-color: #FA8072; width:20px;">
                                                <button type="button" class="nav-link-inline-block" aria-haspopup="true" aria-expanded="false"
                                                <?php if ($staffId == '' || ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true')) { ?>
                                                            onclick="userDelete('', 'customerDelete', '<?php echo $custId; ?>', '');"
                                                        <?php } ?>
                                                        style="font-size: 16px;" >
                                                    DELETE
                                                </button>
                                                <button type="button" class="nav-link-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> 
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-toggle="tab" onclick="userDelete('', 'customerDelete', '<?php echo $custId; ?>', '');">DELETE CUSTOMER</a>
                                                    <a class="dropdown-item" data-toggle="tab" onclick="userDelete('', 'custAllTransDelete', '<?php echo $custId; ?>', '');">DELETE ALL TRANS</a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO CHANGE THE MENU HEADER MENU DESIGN INSIDE CUSTOMER HOME @AUTHOR:MADHUREE-06MAY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
                        ?>
                    </table>
                </td>
            </tr>
        </table>
        <div id="supportTicketPanelDiv">
            <?php
            if ($preId == 'L' || $preId == 'l' || $custPanelOption == 'loyaltyCardNo' || $panel == 'AddLoyaltyCards') {
                include 'omloyaltycardno.php';
            } else if ($custPanelOption == 'addShares' || $panel == 'AddShares') {
                include 'omShares.php';
            } else if ($custPanelOption == 'masterStock') {   // for master redirection Author:DIKSHA 26APRIL2019
                //
                // Added new file for New User Master Panel @Author:PRIYANKA-11MAY2021
                include 'stock/master/omMasterSetupMainUserPriceDetails.php';
                //
                //include 'stock/master/omMasterItemSetup.php';
                //
                //
            } else {
                ?>
                <?php if ($custPanel == 'comment') { ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                        <tr>
                            <td colspan="3" align="left">
                                <?php include 'omcaadcc.php'; ?>
                            </td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <form name="update_customer" id="update_customer"
                          enctype="multipart/form-data" method="post"
                          action="include/php/omccupcs.php"
                          onsubmit="return updateCustomer(document.getElementById('update_customer'));">
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td colspan="3" align="left">
                                    <?php include 'omcdcfrminf.php'; ?>
                                </td>

                            </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <!----Start code to remove no print class Author:SANT19JUL16-->
            <!--                        <tr>
                                <td align="right" colspan="3">
                                    <hr color="#B8860B" />
                                </td>
                            </tr>-->
                            <!----End code to remove no print class Author:SANT19JUL16-->
                            <tr>
                                <td valign="middle" align="left">
                                    <div class="textLabelHeading" id="userType">
                                        <b> <?php if ($custPanel == 'comment') { ?>
                                                CUSTOMER COMMENT 
                                            <?php } else { ?>
                                                STAFF INFO 
                                            <?php } ?></b>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" align="left">
                                    <div class="spaceLeftRight5Border" style="border:none">
                                        <table border="0" cellspacing="0" cellpadding="1" width="100%" valign="top" align="center">   
                                            <tr>
                                                <td align="left" valign="top" width="40%" style="border: 1px dashed #b1dbff;background: #e7f4ff;padding:5px 5px;">
                                                    <table border="0" cellspacing="0" cellpadding="2" width="100%" valign="top">
                                                        <tr>
                                                            <td width="100%" align="left" class="ff_calibri fs_14">
                                                                <div class="spaceLeft20">
                                                                    <b> PERSONAL INFORMATION</b>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="width:100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="60%">
                                                                            <!-- START Customer ID -->
                                                                            <input id="custId" name="custId" value="<?php echo $custId; ?>" type="hidden"/>
                                                                            <!-- END Customer ID  -->
                                                                            <input id="customerType" name="customerType" value="<?php echo $rowCust['user_category']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('pCustId').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8) {
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder=" CUSTOMER TYPE"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   readonly="true" type="text" spellcheck="false" class="input_border_red" size="13"
                                                                                   maxlength="16" style="width:98%;height:30px"/> 
                                                                        </td>
                                                                        <td align="left" width="15%">
                                                                            <!--Start Code To Add Validation Funcs @Author:PRIYA18AUG13-->
                                                                            <!--Start Code To Change ID @Author:PRIYA17AUG13-->
                                                                            <input id="pCustId" name="pCustId" value="<?php echo $rowCust['user_pid']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('uCustId').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('customerType').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder=" C"
                                                                                   onfocus="this.font = 'Arial';"
                                                                                   onblur="if (this.value == '') {
                                                                                       this.font = 'Georgia';
                                                                                       }"
                                                                                   onkeypress="javascript:return valKeyPressedForChar(event);"    
                                                                                   type="text" spellcheck="false" class="input_border_red" size="5"
                                                                                   maxlength="10" readonly="true" style="width:80%;height:30px"/> &minus;
                                                                            <!--End Code To Change ID @Author:PRIYA17AUG13-->

                                                                            <!--End Code To Add Validation Funcs @Author:PRIYA18AUG13-->
                                                                        </td>
                                                                        <td align="left" width="25%">
                                                                            <input id="uCustId" name="uCustId" value="<?php echo $rowCust['user_uid']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('firmId').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('pCustId').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder=" CUSTOMER ID"
                                                                                   onfocus="this.font = 'Arial';"
                                                                                   onblur="if (this.value == '') {
                                                                                       this.font = 'Georgia';
                                                                                       }"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_red" size="10"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <?php
                                                                            $qSelPerFirm = "SELECT firm_name FROM firm where firm_id='$rowCust[user_firm_id]'";
                                                                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                                                            $rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                                                            ?>
                                                                            <input id="firmId" name="firmId" value="<?php echo $rowPerFirm['firm_name']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('accountId').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('uCustId').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="FIRM NAME"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_red" size="13"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>
                                                                        <?php
                                                                        $qSelAccount = "SELECT acc_user_acc FROM accounts where acc_id = '$rowCust[user_acc_id]'";
                                                                        $resAccounts = mysqli_query($conn, $qSelAccount);
                                                                        $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
                                                                        ?>
                                                                        <td align="left"  width="50%">
                                                                            <input id="accountId" name="accountId" value="<?php echo $rowAccounts['acc_user_acc']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('firstName').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('firmId').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="ACCOUNT NAME"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_red" size="20"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td> 
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <input id="firstName" name="firstName" placeholder=" FIRST NAME" value="<?php echo $rowCust['user_fname']; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('lastName').focus();
                                                                           return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('accountId').focus();
                                                                           return false;
                                                                           }"
                                                                       type="text" spellcheck="false" class="input_border_red" size="40"
                                                                       maxlength="50" readonly="true" style="width:100%;height:30px;"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <input id="lastName" name="lastName" placeholder=" LAST NAME" value="<?php echo $rowCust['user_lname']; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('fatherOrSpouseNameLabel').focus();
                                                                           return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('firstName').focus();
                                                                           return false;
                                                                           }"
                                                                       spellcheck="false" type="text"
                                                                       class="input_border_grey" size="40" maxlength="50" readonly="true" style="width:100%;height:30px;"/>
                                                            </td>
                                                        </tr>
                                                        <!--START CODE PRIYA27-->
                                                        <?php
                                                        $fatherOrSpouseName = $rowCust['user_father_name'];
                                                        $checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
                                                        $labelFatherOrSpouse = "Father Name:";
                                                        $getFunctionFatherOrSpouse = "getSpouseNameLabel()";
                                                        if ($checkFatherOrSpouse == 'S') {
                                                            $labelFatherOrSpouse = "Spouse Name:";
                                                            $getFunctionFatherOrSpouse = "getFatherNameLabel()";
                                                        }
                                                        $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
                                                        ?>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <div id="fatherOrSpouseNameDiv">
                                                                    <input id="fatherOrSpouseNameLabel" name="fatherOrSpouseNameLabel" 
                                                                           spellcheck="false" type="submit" 
                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                               getSpouseNameLabel(this.value);
                                                                               return false;
                                                                               } else if (event.keyCode == 8) {
                                                                               document.getElementById('lastName').focus();
                                                                               return false;
                                                                               }"
                                                                           onclick="javascript: getSpouseNameLabel(this.value);
                                                                               return false;"
                                                                           value="S/O:" class="frm-lbl-lnk-orange" readonly="true" /> <!---CHANGE IN CLASS TO DISPLAY IT PROPERLY @AUTHOR: SANDY4DEC13---->
                                                                    <input id="fatherOrSpouseNameIndicator" name="fatherOrSpouseNameIndicator" 
                                                                           type="hidden" value="F" readonly="true" style="width:100%;height:30px;"/>
                                                                </div>
                                                            </td>
                                                        </tr>      
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <input id="fatherOrSpouseName" name="fatherOrSpouseName"  value="<?php echo $fatherOrSpouseName; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('motherName').focus();
                                                                           return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('lastName').focus();
                                                                           return false;
                                                                           }"
                                                                       spellcheck="false" type="text" placeholder=" FATHER NAME"
                                                                       class="input_border_red" size="40" maxlength="50" readonly="true" style="width:100%;height:30px;"/>
                                                            </td>
                                                        </tr>    <!--END CODE PRIYA27-->
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <input id="motherName" name="motherName" placeholder=" MOTHER NAME" value="<?php echo $rowCust['user_mother_name']; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('DOBDay').focus();
                                                                           return false;
                                                                           } else if (event.keyCode == 8) {
                                                                           document.getElementById('fatherOrSpouseName').focus();
                                                                           return false;
                                                                           }"
                                                                       spellcheck="false" type="text"
                                                                       class="input_border_grey" size="40" maxlength="50" readonly="true" style="width:100%;height:30px;"/>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $custSexStr = $rowCust['user_sex'];
                                                        switch ($custSexStr) {
                                                            case "M":
                                                                $optionSexM = "CHECKED";
                                                                break;
                                                            case "F":
                                                                $optionSexF = "CHECKED";
                                                                break;
                                                        }
                                                        ?> 
                                                        <!-- END Radio Button PHP code -->
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <div id="sexToAddGirviDiv"  class="ff_calibri fs_14 fw_b brown">
                                                                    <INPUT id="sex" TYPE="RADIO" NAME="sex"
                                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                               document.getElementById('DOBDay').focus();
                                                                               return false;
                                                                               } else if (event.keyCode == 8) {
                                                                               document.getElementById('motherName').focus();
                                                                               return false;
                                                                               }"
                                                                           class="border_none" VALUE="M" <?php echo $optionSexM; ?> /> MALE 
                                                                    &nbsp; 
                                                                    <INPUT id="sex" TYPE="RADIO"
                                                                           class="border_none" NAME="sex" VALUE="F" <?php echo $optionSexF; ?> readonly="true" /> FEMALE</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <!---CHANGE IN CLASS TO DISPLAY IT PROPERLY @AUTHOR: SANDY4DEC13---->
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <div class="ff_calibri fs_13 grey_dark fw_b" style="color:#000"><b>DATE OF BIRTH:</b></div>
                                                                        </td>
                                                                        <td align="left" width="50%">
                                                                            <div class="ff_calibri fs_13 grey_dark fw_b" style="color:#000"><b>QUALIFICATION:</b></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <?php
                                                                        $selDOBMnth = substr($rowCust['user_DOB'], 0, -8);
                                                                        $selDOBDay = substr($rowCust['user_DOB'], -8, -5);
                                                                        $selDOBYear = substr($rowCust['user_DOB'], -4);
                                                                        ?>
                                                                        <td align = "left" width="50%">
                                                                            <input id="DOBDay" name="DOBDay" value="<?php echo $selDOBDay . ' ' . $selDOBMnth . ' ' . $selDOBYear; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('qualification').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('motherName').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="DOB"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_grey_center" size="18"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>

                                                                        <td align="left"width="50%">
                                                                            <input id="qualification" name="qualification" value="<?php echo $rowCust['user_qualification']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custPANNO').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('DOBYear').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="QUALIFICATION"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_grey" size="15"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <!---CHANGE IN CLASS TO DISPLAY IT PROPERLY @AUTHOR: SANDY4DEC13---->
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <div class="ff_calibri fs_13 grey_dark fw_b" style="color:#000"><b>ANNIVERSARY DATE:</b></div>
                                                                        </td>
                                                                        <td align="left" width="50%">
                                                                            <div class="ff_calibri fs_13 grey_dark fw_b" style="color:#000"><b>SPOUSE DOB:</b></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>

                                                                        <?php
                                                                        $spouseDOBMnth = substr($rowCust['user_spouse_dob'], 0, -8);
                                                                        $spouseDOBDay = substr($rowCust['user_spouse_dob'], -8, -5);
                                                                        $spouseDOBYear = substr($rowCust['user_spouse_dob'], -4);
                                                                        $AnniMnth = substr($rowCust['user_marriage_any'], 0, -8);
                                                                        $AnniDay = substr($rowCust['user_marriage_any'], -8, -5);
                                                                        $AnniYear = substr($rowCust['user_marriage_any'], -4);
                                                                        ?>
                                                                        <td align = "left" width="50%">
                                                                            <input id="AnniDay" name="AnniDay" value="<?php echo $AnniDay . ' ' . $AnniMnth . ' ' . $AnniYear; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('qualification').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('motherName').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="ANNIVERSARY DATE"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_grey_center" size="18"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>
                                                                        <td align = "left" width="50%">
                                                                            <input id="spouseDOBDay" name="spouseDOBDay" value="<?php echo $spouseDOBDay . ' ' . $spouseDOBMnth . ' ' . $spouseDOBYear; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('qualification').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('motherName').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder=" SPOUSE DOB"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_grey_center" size="18"
                                                                                   maxlength="16" readonly="true" style="width:98%;height:30px;"/> 
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" >
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" >
                                                                            <div class="ff_calibri fs_13 grey_dark fw_b" style="color:#000"><b>TAX INFORMATION:</b></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" valign="top" width="100%">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="custPANNO" name="custPANNO" placeholder=" PAN NO" value="<?php echo $rowCust['user_pan_it_no']; ?>"
                                                                                   type="text"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custSalesTaxNo').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('qualification').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" class="input_border_grey" size="18"
                                                                                   maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                        <td align="left" width="0%">
                                                                            <input id="custSalesTaxNo" name="custSalesTaxNo" placeholder=" TAX NO" value="<?php echo $rowCust['user_sale_tax_no']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custCSTNo').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('custPANNO').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   type="text" spellcheck="false" class="input_border_grey" size="18"
                                                                                   maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <input id="custCSTNo" name="custCSTNo" placeholder=" GST NO" value="<?php echo $rowCust['user_cst_no']; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                           document.getElementById('loyaltyCardNo').focus();
                                                                           return false;
                                                                           } else if (event.keyCode == 8 && this.value == '') {
                                                                           document.getElementById('custSalesTaxNo').focus();
                                                                           return false;
                                                                           }"
                                                                       type="text" spellcheck="false" class="input_border_grey" size="40"
                                                                       maxlength="50" style="width:100%;height:30px;"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" valign="top" width="100%">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="loyaltyCardNo" name="loyaltyCardNo" placeholder="LOYALTY CARD NUMBER" value="<?php echo $rowCust['user_lty_no']; ?>"
                                                                                   type="text"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custMonthlyIncome').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('custCSTNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" class="input_border_grey" size="18" maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                        <!--Start to Show column for Monthly Income Author : DIKSHA 11FEB2019-->
                                                                        <td align="left" width="50%">
                                                                            <input id="custMonthlyIncome" name="custMonthlyIncome" placeholder="MONTHLY INCOME" value="<?php echo $rowCust['user_monthly_income']; ?>"
                                                                                   type="text"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('address1').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('loyaltyCardNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" class="input_border_grey" size="18" maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                        <!--End to Show column for Monthly Income Author : DIKSHA 11FEB2019-->
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" width="100%">
                                                                <table border="0" cellspacing="0" cellpadding="0" valign="top" width="100%">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="loyaltyCardNo" name="wardNumber" placeholder="WARD NUMBER" value="<?php echo $rowCust['user_ward_no']; ?>"
                                                                                   type="text"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('caste').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('loyaltyCardNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" class="input_border_grey" size="18"
                                                                                   maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                        <td align="left" width="50%">
                                                                            <input id="loyaltyCardNo" name="caste" placeholder="CASTE" value="<?php echo $rowCust['user_caste']; ?>"
                                                                                   type="text"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('address1').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('loyaltyCardNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" class="input_border_grey" size="18"
                                                                                   maxlength="50" style="width:98%;height:30px;"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX                                                       
                                                            START CODE TO ADD WASTAGE CHARGE ON PAYMENT DUE(CONSIGNMENT WORK) @RENUKA SHARMA:30JAN2023
                                                       XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                                                        
                                                        <?php
                                                        $querywstcharge = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'wastagedueCharge'";
                                                        $reswstcharge = mysqli_query($conn, $querywstcharge);
                                                        $rowwstgcharge = mysqli_fetch_array($reswstcharge);
                                                        $applyWstgcharge = $rowwstgcharge['omly_value'];
                                                        ?>
                                                        <tr>

                                                        <table>
                                                            <tr>  
                                                                <td align="center">
                                                                    <table border="0" cellspacing="0" cellpadding="0" valign="top" style="width:200px;">
                                                                        <tr>
                                                                            <td align="left" style="width:300px;" >
                                                                                <?php if ($applyWstgcharge == 'YES') { ?>
                                                                                    <div class="ff_calibri fs_13 grey_dark fw_b">LATE PAYMENT FINE(WASTAGE):</div>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($applyWstgcharge == 'YES') { ?>
                                                                    <td align="left">
                                                                        <input id="wstg_charge" name="wstg_charge" placeholder=" WASTAGE %" value="<?php echo $rowCust['wstg_charge']; ?>"  onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('wstg_no_days').focus();
                                                                            return false;
                                                                            } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                                                            document.getElementById('loyaltyCardNo').focus();
                                                                            return false;
                                                                            }" spellcheck="false" type="text" class="input_border_grey" size="10" maxlength="100" readonly="true">

                                                                        <input id="wstg_no_days" name="wstg_no_days" placeholder="NO OF DAYS" value="<?php echo $rowCust['wstg_no_days']; ?>" onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('wstg_occ').focus();
                                                                            return false;
                                                                            } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                                                            document.getElementById('wstg_no_days').focus();
                                                                            return false;
                                                                            }" spellcheck="false" type="text" class="input_border_grey" size="10" maxlength="100" readonly="true" style="margin-left: 20px;" readonly="true">

                                                                        <input id="wstg_occ" name="wstg_occ" placeholder="OCCURENCE" value="<?php echo $rowCust['wstg_no_days']; ?>" onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('village').focus();
                                                                            return false;
                                                                            } else if (event.keyCode == 8 & amp; & amp; this.value == '') {
                                                                            document.getElementById('wstg_no_days').focus();
                                                                            return false;
                                                                            }" spellcheck="false" type="text" class="input_border_grey" size="10" maxlength="100" readonly="true" style="margin-left: 20px;" readonly="true">
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td align="left"></td>
                                                                <?php } ?>
                                                            </tr>
                                                            <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX                                                       
                                                                   END CODE TO ADD WASTAGE CHARGE ON PAYMENT DUE(CONSIGNMENT WORK) @RENUKA SHARMA:30JAN2023
                                                            <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX--> 
                                                        </table>
                                                </td>

                                                <td align="left" valign="top"  class="paddingRight10" style="border:1px dashed #ffd28b;background: #ffebcc;padding: 5px 5px;border-left:0;" width="40%">
                                                    <table border="0" cellspacing="0" cellpadding="2" width="100%" valign="top">
                                                        <tr>

                                                            <td width="100%" align="left" class="ff_calibri fs_14">
                                                                <div class="spaceLeft20">
                                                                    <b> ADDRESS INFORMATION</b>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <textarea id="address1" spellcheck="false" placeholder=" CUSTOMER ADDRESS"
                                                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                                              document.getElementById('village').focus();
                                                                              return false;
                                                                              } else if (event.keyCode == 8 && this.value == '') {
                                                                              document.getElementById('custMonthlyIncome').focus();
                                                                              return false;
                                                                              }"
                                                                          name="address1" class="textarea width330" style="height: 100px;width:100%" readonly="true" ><?php echo $rowCust['user_add']; ?></textarea><!--add code for change sixe of address textbox Author: SANT28OCT16-->
                                                            </td>
                                                        </tr>
                                                        <!--Start code for add the two textbox Author: GAUR09JUNE16-->
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="village" name="village" title="यहाँ कस्टमर के ग्राम या शहर का नाम एंटर करे!"
                                                                                   type="text" spellcheck="false" placeholder=" VILLAGE" value="<?php echo $rowCust['user_village']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                                                       document.getElementById('tehsil').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('address1').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   autocomplete="off" class="input_border_grey" size="19" maxlength="30" readonly="true" style="width:99%;height:30px"/> 
                                                                            <!--<div id="cityListDivToAddNewCust" class="cityListDivToAddGirvi"></div>-->
                                                                        </td>
                                                                        <td align="right" width="50%">
                                                                            <input id="tehsil" name="tehsil" title="यहाँ कस्टमर के ग्राम या शहर का नाम एंटर करे!"
                                                                                   type="text" spellcheck="false"  placeholder="TEHSIL" value="<?php echo $rowCust['user_tehsil']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                                                       document.getElementById('city').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('village').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   autocomplete="off" class="input_border_grey" size="19" maxlength="30" readonly="true" style="width:99%;height:30px"/> 
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--END code for add the two textbox Author: GAUR09JUNE16-->
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <!--Start Code To Add City List @Author:PRIYA02JUL13-->
                                                                        <!--Start code To Add Clear func @Author:PRIYA24AUG13-->
                                                                        <!--Start Code To Add keyCode 9 @Author:PRIYA29AUG13-->
                                                                        <td align="left" width="50%">
                                                                            <input id="city" name="city" title="यहाँ कस्टमर के ग्राम या शहर का नाम एंटर करे!"
                                                                                   type="text" spellcheck="false" class="input_border_red" placeholder=" CITY" value="<?php echo $rowCust['user_city']; ?>"
                                                                                   onclick="searchCityForPanelBlank('addNewCustomer');"
                                                                                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                                                                       searchCityForPanelBlank('addNewCustomer');
                                                                                       document.getElementById('pinCode').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       searchCityForPanelBlank('addNewCustomer');
                                                                                       document.getElementById('tehsil').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   autocomplete="off" size="19" maxlength="30" readonly="true" style="width:99%;height:30px"/> 
                                                                            <div id="cityListDivToAddNewCust" class="cityListDivToAddGirvi" readonly="true" ></div>
                                                                        </td>
                                                                        <!--End Code To Add keyCode 9 @Author:PRIYA29AUG13-->
                                                                        <!--End code To Add Clear func @Author:PRIYA24AUG13-->
                                                                        <!--End Code To Add City List @Author:PRIYA02JUL13-->
                                                                        <td align="right" width="50%">
                                                                            <input id="pinCode" name="pinCode" placeholder=" PIN CODE" value="<?php echo $rowCust['user_pincode']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('state').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('city').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" type="text" class="input_border_grey" size="19"
                                                                                   maxlength="6" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="state" name="state" value="<?php echo $rowCust['user_state']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('country').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8) {
                                                                                       document.getElementById('pinCode').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="STATE"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_red" size="19"
                                                                                   maxlength="16" readonly="true" style="width:99%;height:30px"/> 
                                                                        </td>
                                                                        <td align="right" width="50%">
                                                                            <input id="country" name="country" value="<?php echo $rowCust['user_country']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('phoneNo').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8) {
                                                                                       document.getElementById('state').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="STATE"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_red" size="19"
                                                                                   maxlength="16" readonly="true" style="width:99%;height:30px" /> 
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="phoneNo" name="phoneNo" placeholder=" PHONE NUMBER" value="<?php echo $rowCust['user_phone']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('mobileNo').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('country').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   type="text" spellcheck="false" class="input_border_grey" size="19"
                                                                                   maxlength="12" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                        <td align="right" width="50%">
                                                                            <input id="mobileNo" name="mobileNo" placeholder=" MOBILE NUMBER" value="<?php echo $rowCust['user_mobile']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('emailId').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('phoneNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   type="text" spellcheck="false" class="input_border_grey" size="19"
                                                                                   maxlength="12" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellpadding="0" cellspacing="0" valign="top" width="100%">
                                                                    <tr align="left">
                                                                        <td align="left" width="50%">
                                                                            <input id="emailId" name="emailId" placeholder=" EMAIL ID" value="<?php echo $rowCust['user_email']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('reference').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('mobileNo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" type="text"
                                                                                   class="input_border_grey" size="19" maxlength="100" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                        <td align="right" width="50%">
                                                                            <input id="reference" name="reference" placeholder=" REFERENCE" value="<?php echo $rowCust['user_reference']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custOtherInfo').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('emailId').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" type="text" class="input_border_grey" size="19"
                                                                                   maxlength="100" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td align="center">
                                                                <textarea id="custOtherInfo" name="custOtherInfo" spellcheck="false" placeholder=" OTHER INFORMATION" 
                                                                          onkeydown="javascript: if (event.keyCode == 13) {
                                                                              document.getElementById('custStaffLoginId').focus();
                                                                              return false;
                                                                              } else if (event.keyCode == 8 && this.value == '') {
                                                                              document.getElementById('reference').focus();
                                                                              return false;
                                                                              }"
                                                                          class="textarea width330" style="height:70px;width:100%" readonly="true" ><?php echo $rowCust['user_other_info']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" valign="top">
                                                                    <tr>
                                                                        <td align="left" width="50%">
                                                                            <input id="custStaffLoginId" name="custStaffLoginId" value="<?php echo $rowCust['user_login_id']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('custInterest').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8) {
                                                                                       document.getElementById('custOtherInfo').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   placeholder="STAFF LOGIN ID"
                                                                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                   type="text" spellcheck="false" class="input_border_grey" size="19"
                                                                                   maxlength="16" readonly="true" style="width:99%;height:30px"/> 
                                                                        </td>
                                                                        <td align="right" width="50%">
                                                                            <input id="custInterest" name="custInterest" placeholder=" CUSTOMER INTEREST" value="<?php echo $rowCust['user_interest']; ?>"
                                                                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                                                       document.getElementById('subButton').focus();
                                                                                       return false;
                                                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                                                       document.getElementById('custStaffLoginId').focus();
                                                                                       return false;
                                                                                       }"
                                                                                   spellcheck="false" type="text" class="input_border_grey" size="19"
                                                                                   maxlength="50" readonly="true" style="width:99%;height:30px"/>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <?php
                                                $qSelPerFirm = "SELECT * FROM image where image_user_id='$custId' and image_user_type!='NOMINEE'"; // IMAGE COUNT 0 CONDITION ADDED @AUTHOR:SHRI11DEC19
                                                $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                                $rowPerFirm1 = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                                $imageIdOfCustomer = $rowPerFirm1['image_id'];
                                                ?>
                                                <td  valign="top" align="center" width="20%" style="border:1px dashed #888686;border-left:0">
                                                    <table border="0" cellpadding="1" cellspacing="0" valign="top" align="center">
                                                        <tr>

                                                            <td width="100%" align="right" class="ff_calibri fs_14">
                                                                <div align="center">
                                                                    <b> CUSTOMER IMAGE</b>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <!----------------------------------------------------start code for change customer info image display Author@:SANT21JAN16********************************************* ---->
                                                            <td align="center" colspan="3">
                                                                <div id="file_input_div" >
                                                                    <?php
                                                                    //echo 'image=='.$rowPerFirm1['image_snap_fname'];
                                                                    if ($rowPerFirm1['image_snap_fname'] != '') {
                                                                        ?>
                                                                        <div class="" align="center">
                                                                            <!----------------------------------------------------start code for change customer info image display Author@:RUTUJA26MAY20********************************************* ---->
                                                                            <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$imageIdOfCustomer"; ?>',
                                                                                        'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                                return false" >
                                                                                   <?php // echo 'image';     ?>
                                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$imageIdOfCustomer"; ?>" 
                                                                                     border="0" style="border-color: #B8860B;width: 180px;height: 170px;border: solid 1px #ccc;"/>
                                                                            </a>
                                                                            <!----------------------------------------------------End code for change customer info image display Author@:RUTUJA26MAY20*********************************************-->
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="" style="height:240px;" align="center">
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div id="webcam_input_div" align="center" ></div>
                                                            </td>
                                                            <!----------------------------------------------------End code for change customer info image display Author@:SANT21JAN16*********************************************-->
                                                        </tr>
                                                        <?php
                                                        $customerImgQuery = "SELECT * FROM image where image_user_id='$custId' and image_user_type!='NOMINEE' and image_count IS NOT NULL"; // IMAGE COUNT 0 CONDITION ADDED @AUTHOR:SHRI11DEC19
                                                        /// End change for (image type) to display customer image on customer update and customer info view (@Sujata - 13 MAR 2019) 
                                                        $customerImgReq = mysqli_query($conn, $customerImgQuery);
                                                        while ($customerImgRes = mysqli_fetch_array($customerImgReq, MYSQLI_ASSOC)) {
                                                            $customerImgId = $customerImgRes['image_id'];
                                                            ?>
                                                            <!----------------------------------------------------start code for change customer info image display Author@:SANT21JAN16********************************************* ---->
                                                            <td>
                                                                <?php
                                                                if ($customerImgRes['image_snap_fname'] != '') {
                                                                    ?>
                                                                    <!----------------------------------------------------start code for change customer info image display Author@:RUTUJA26MAY20********************************************* ---->
                                                                    <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$customerImgId"; ?>',
                                                                                'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                        return false" >
                                                                           <?php // echo 'image';     ?>
                                                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$customerImgId"; ?>" 
                                                                             width="75px" height="75px" border="0" style="border-color: #B8860B;margin:10px;border: solid 1px #ccc;"/>
                                                                    </a>
                                                                    <!----------------------------------------------------End code for change customer info image display Author@:RUTUJA26MAY20*********************************************-->
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="" style="height:240px;" align="center">
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            </div>
                                                            <div id="webcam_input_div" align="center" ></div>
                                                        </td>
                                                        <!----------------------------------------------------End code for change customer info image display Author@:SANT21JAN16*********************************************-->

                                                    </table>
                                                </td>
                                                <!-- End Code To Display Customer Image In Update Customer @AUTHOR:SANT07JAN16-->
                                            </tr>
                                        </table>
                                        <!--START CODE TO DISPLAY IMAGES IN USER INFO WITH IDENTITY CARDS AUTHOR:SARVESH @25JAN2021-->
                                </td>
                                <!-- Start Code To Display Customer Image In Update Customer @AUTHOR:SANT07JAN16-->

                            </tr>
                            <!--END CODE TO DISPLAY IMAGES IN USER INFO WITH IDENTITY CARDS AUTHOR:SARVESH @25JAN2021-->
                        </table>
                </div>
                </td>
                </tr>

                </table>

                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                    <tr>
                        <td colspan="3" align="left">
                            <?php include 'omcdnominf.php'; ?>
                        </td>
                    </tr>
                </table>

                </form>
                <br/>
            <?php }
            ?>
            <table align="center" width="100%">
                <tr>
                    <td align="center" class="noPrint" >
                        <a style="cursor: pointer;" 
                           onclick="printOmgoldPageDiv('supportTicketPanelDiv', '')">
                            <img src="<?php echo $documentRoot; ?>/images/img/printer.png" alt='PRINT' title='PRINT'
                                 width="26px" height="26px" /> 
                        </a> 
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
<?php } ?>
<!--</div>-->
<!-------------End code to change file to add custInfo panel @Author:PRIYA08APR14----------->
<!--//****************************End code to change Nominee insertion in customer Author:@SANT12JUN16*****************-->