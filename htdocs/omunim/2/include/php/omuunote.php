<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Notice by @Author: KHUSH18JAN13
 * **************************************************************************************
 * 
 * Created on Jan 18, 2013 4:46:41 PM
 *
 * @FileName: omuunote.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: Modified by @Author: KHUSH22JAN13
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
<?php
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Online Munim Loan/Udhaar Notice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/ogcss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $documentRootBSlash; ?>/css/print.css" />
    </head>
    <body>
        <!--<div class="bodyClass"> -->
        <?php
        ob_start();
        $whatsappStatus = $_GET['whatsappStatus'];
        $custId = $_GET['custId'];
        $udhaarId = $_GET['udhaarId'];
        $udhaarAmtLeft = om_round($_GET['udhaarAmtLeft']);
        $qUdhaar = "SELECT * FROM user_transaction_invoice where utin_user_id='$custId' and utin_id='$udhaarId' and utin_transaction_type IN ('UDHAAR')";
        $resUdhaar = mysqli_query($conn, $qUdhaar);
        $rowUdhaar = mysqli_fetch_array($resUdhaar, MYSQLI_ASSOC);
        $udhaarFirmId = $rowUdhaar['utin_firm_id'];

        $todayDate = om_strtoupper(date("d M Y"));
//**************************************Start code to change data for cutomer table yo user table @SANT12JAN16**************************************************
        $qSelCustDetails = "SELECT user_fname,user_lname,user_father_name,user_add,user_city,user_pincode,user_state,user_country,user_mobile FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'";
        $resCustDetails = mysqli_query($conn, $qSelCustDetails);
        $rowCustDetails = mysqli_fetch_array($resCustDetails, MYSQLI_ASSOC);

        $custName = $rowCustDetails['user_fname'] . ' ' . $rowCustDetails['user_lname']; //Customer Name for Form 7 & 8

        if ($rowCustDetails['user_add'] == '' && $rowCustDetails['user_mobile'] == '') {
            $custAddress = $rowCustDetails['user_city'] . ' ' . $rowCustDetails['user_pincode'] . '<br /> ' . $rowCustDetails['user_state'] . ', ' . $rowCustDetails['user_country'];
        } else if ($rowCustDetails['user_add'] != '' && $rowCustDetails['user_mobile'] == '') {
            $custAddress = $rowCustDetails['user_add'] . '<br />' . $rowCustDetails['user_city'] . ' ' . $rowCustDetails['user_pincode'] . '<br /> ' . $rowCustDetails['user_state'] . ', ' . $rowCustDetails['user_country'];
        } else if ($rowCustDetails['user_add'] == '' && $rowCustDetails['user_mobile'] != '') {
            $custAddress = $rowCustDetails['user_city'] . ' ' . $rowCustDetails['user_pincode'] . '<br /> ' . $rowCustDetails['user_state'] . ', ' . $rowCustDetails['user_country'] . '<br /> ' . 'Phone No: ' . $rowCustDetails['user_mobile'];
        } else {
            $custAddress = $rowCustDetails['user_add'] . '<br />' . $rowCustDetails['user_city'] . ' ' . $rowCustDetails['user_pincode'] . '<br /> ' . $rowCustDetails['user_state'] . ', ' . $rowCustDetails['user_country'] . '<br /> ' . 'Phone No: ' . $rowCustDetails['user_mobile'];
        }

        $fatherOrSpouseName = $rowCustDetails['user_father_name'];
        $checkFatherOrSpouse = substr($fatherOrSpouseName, 0, 1);
        $labelFatherOrSpouse = "Father Name:";
        $getFunctionFatherOrSpouse = "getSpouseNameLabel()";
        if ($checkFatherOrSpouse == 'S') {
            $labelFatherOrSpouse = "Spouse Name:";
            $getFunctionFatherOrSpouse = "getFatherNameLabel()";
        }
        //**************************************End code to change data for cutomer table yo user table @SANT12JAN16**************************************************
        $fatherOrSpouseName = substr($fatherOrSpouseName, 1);
        /*         * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_user_id='$custId' and utin_id='$udhaarId' and utin_transaction_type IN ('UDHAAR')";
        $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
        $rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC);
        //
        $udhaarDOB = $rowAllUdhaar['utin_date'];
        $udhaarFirmId = $rowAllUdhaar['utin_firm_id'];
        $udhaarOtherInfo = $rowAllUdhaar['utin_other_info'];
        /*         * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
        $firmForm8CastMess;
        $firmForm8WitnessMess;

        $qSelectFormLayout = "SELECT omly_value FROM omlayout where omly_option='udhaarNoticeLay'";
        $resFormLayout = mysqli_query($conn, $qSelectFormLayout);
        $count = mysqli_num_rows($resFormLayout);
        $rowFormLayout = mysqli_fetch_array($resFormLayout);
        $layout = $rowFormLayout['omly_value'];

        //  Start code for Udhaar Notice @Author:KHUSH18JAN13    
        $qSelectUdhaar = "SELECT uns_def_lang FROM udhaar_notice_setup WHERE uns_id='1'";
        $resUdhaarNotice = mysqli_query($conn, $qSelectUdhaar);
        $rowUdhaarNotice = mysqli_fetch_array($resUdhaarNotice);
        $defLang = $rowUdhaarNotice['uns_def_lang'];

        $unsSize = $layout;
        if ($layout == '') {
            $unsSize = 'udhaarNoticeLayA5';
        }
        $qSelUdhaar = "SELECT * FROM udhaar_notice_setup where uns_lang='$defLang' and uns_form_size = '$unsSize' order by uns_id desc";
        $resUdhaar = mysqli_query($conn, $qSelUdhaar);
        $sizePresent = mysqli_num_rows($resUdhaar);
        if ($sizePresent == 0) {
            $defSize = $unsSize;
            $panel = 'unsFilePanel';
            include 'omppunsl.php';
            $qSelUdhaar = "SELECT * FROM udhaar_notice_setup where uns_lang='$defLang' and uns_form_size = '$unsSize' order by uns_id desc";
            $resUdhaar = mysqli_query($conn, $qSelUdhaar);
        }
        //echo $qSelUdhaar;
        $rowUdhaar = mysqli_fetch_array($resUdhaar, MYSQLI_ASSOC);
        $defLang = $rowUdhaar['uns_def_lang'];
        $lang = $rowUdhaar['uns_lang'];
        $headerLabel = $rowUdhaar['uns_header'];
        $dateLabel = $rowUdhaar['uns_date_lbl'];
        $subjectHead = $rowUdhaar['uns_sub_head'];
        $topMargin = $rowUdhaar['uns_top_margin'];
        $leftMargin = $rowUdhaar['uns_left_margin'];
        $subjectLabel = $rowUdhaar['uns_sub_lbl'];
        $udhaarNoticeContent = $rowUdhaar['uns_notice_cont'];
        $details = $rowUdhaar['uns_details'];
        $principalAmountLabel = $rowUdhaar['uns_principal_lbl'];
        $udhaarDateLabel = $rowUdhaar['uns_udhaar_date_lbl'];
        $interestLabel = $rowUdhaar['uns_interest_lbl'];
        $totalAmountLabel = $rowUdhaar['uns_total_amt_lbl'];
        $otherInfoLabel = $rowUdhaar['uns_other_info'];
        $tNCLabel = $rowUdhaar['uns_tnc_lbl'];
        $tNC = $rowUdhaar['uns_tnc'];
        $custSign = $rowUdhaar['uns_cust_sign_lbl'];
        $ownerSign = $rowUdhaar['uns_owner_sign_lbl'];
        $footerLabel = $rowUdhaar['uns_footer'];
        $borderCheck = $rowUdhaar['uns_border_check'];
        $headerSecWidth = $rowUdhaar['uns_header_width'];

        //  End code for Udhaar Notice @Author:KHUSH18JAN13   
        if ($topMargin == NULL || $topMargin == '') {
            $topMargin = 0;
        }
        if ($leftMargin == NULL || $leftMargin == '') {
            $leftMargin = 0;
        }
        /** START CODE TO SELECT LAYOUT OF PRINT @AUTHOR: SANDY14JUL13* */
        $margin = 0;
        /** END CODE TO SELECT LAYOUT OF PRINT @AUTHOR: SANDY14JUL13* */
        if ($rowUdhaar['uns_form_width'] == '') {
            if ($formSize == 'udhaarNoticeLay4Inch') {
                $formWidthInMM = '93.6';
            } else if ($formSize == 'udhaarNoticeLayA6') {
                $formWidthInMM = '97';
            } else {
                $formWidthInMM = '135';
            }
        } else {
            $formWidthInMM = $rowUdhaar['uns_form_width'];
        }
        if ($borderCheck == 'on') {
            $border = '#000000 1px solid';
        } else {
            $border = '#000000 0px solid';
        }
        parse_str(getTableValues("SELECT firm_id,firm_name,firm_long_name,firm_reg_no,firm_form_header,firm_form_footer,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_id='$udhaarFirmId' $sessionFirmStr"));
        if ($layout == 'udhaarNoticeLay4Inch') {
            $divClass = 'form4InchDiv';
            $tableClass = 'sell_4InchInv_table';
            $imageClass = 'form7-logo-image';
            $printClass = $formWidthInMM . 'mm';
            $textAreaWidth = $printClass;
            $textAreaHeight = '20px';
        } else if ($layout == 'udhaarNoticeLayA6') {
            $divClass = 'a6widthdiv';
            $tableClass = 'A6-main-table';
            $imageClass = 'form7-logo-image';
            $printClass = $formWidthInMM . 'mm';
            $textAreaWidth = $printClass;
            $textAreaHeight = '20px';
        } else {
            $divClass = 'a5widthdiv';
            $tableClass = 'sellInvA5-main-table';
            $imageClass = 'a5-logo-image';
            $printClass = $formWidthInMM . 'mm';
            $textAreaWidth = $printClass;
            $textAreaHeight = '40px';
        }
        ?>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
            .quotInv{
                padding:0!important;
                font-family: 'Poppins', sans-serif;
            }
            .topbar{
                background: #FD9A00;
                width: 100%;
                height: 15px;
            }
            .logoInvImg{
                width:80px;
                height:80px;
            }
            logoInvImg img,
            .logoInvImg .form7-logo-image{
                object-fit: cover;
            }

        </style>
        <div style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
            <div id="<?php echo $divClass; ?>"> 
                <table border="0" cellpadding="0" cellspacing="0" align="center"  bgcolor="#FFFFFF" 
                       style="width:<?php echo $formWidthInMM . 'mm'; ?>;paddinng-left:1px;border: <?php echo $border; ?>" width="100%">
                           <?php if ($rowUdhaar['uns_header_display'] != 'notDisplay') { ?>
                        <tr>
                            <td>
                                <div class="topbar"></div>
                            </td>
                        </tr>
                        <tr> 
                            <td align="left" colspan="14">
                                <table border="0" cellpadding="0" width="100%" cellspacing="0" style="height:<?php echo $headerSecWidth . 'mm'; ?>">                   
                                    <?php if ($rowUdhaar['uns_firm_header_check'] == 'on') { ?>
                                        <tr> 
                                            <td valign="middle"  colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_header_color']; ?>" style="font-weight:600;padding:5px 0;font-size:<?php echo $rowUdhaar['uns_firm_header_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                <b><?php if ($rowUdhaar['uns_header_display'] != 'blank') echo $firm_form_header; ?></b>
                                            </td>
                                        </tr>
                                    <?php } if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_header_left_sec_check'] == 'on' || $rowUdhaar['uns_header_right_sec_check'] == 'on') { ?>
                                        <tr> 
                                            <td align="left" colspan="3" class="paddingLeft2">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                                    <tr>
                                                        <?php if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_header_left_sec_check'] == 'on' && $rowUdhaar['uns_header_left_section'] != '') { ?>
                                                            <td align="left"  class="paddingLeft2 paddingTop5 font_color_<?php echo $rowUdhaar['uns_header_left_section_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_header_left_section_font']; ?>px">
                                                                <?php echo $rowUdhaar['uns_header_left_section']; ?>
                                                            </td>
                                                        <?php } if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_header_right_sec_check'] == 'on' && $rowUdhaar['uns_header_right_section'] != '') { ?>
                                                            <td align="right" class="paddingTop5 ff_calibri font_color_<?php echo $rowUdhaar['uns_header_right_section_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_header_right_section_font']; ?>px">
                                                                <?php echo $rowUdhaar['uns_header_right_section']; ?>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php } if ($rowUdhaar['uns_header_check'] == 'on' && $headerLabel != '') { ?>
                                        <tr> 
                                            <td valign="middle"  colspan="3"  align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_header_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_header_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php if ($rowUdhaar['uns_header_display'] != 'blank') echo $headerLabel; ?>
                                            </td>
                                        </tr>
                                    <?php } if ($rowUdhaar['uns_firm_name_check'] == 'on' && $firm_long_name != NULL) { ?>
                                        <tr> 
                                            <td valign="middle"  colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_name_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_name_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php if ($rowUdhaar['uns_header_display'] != 'blank') $firm_long_name = stripcslashes($firm_long_name);
                                                echo $firm_long_name; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <tr>
                                        <?php if ($rowUdhaar['uns_header_display'] != 'blank' && ($rowUdhaar['uns_firm_left_logo_check'] == 'on') && ($firm_left_thumb_ftype != NULL || $firm_left_thumb_ftype != '')) { ?>
                                            <?php
                                            $firmId = $firm_id;
                                            $noEcho = 'Y';
                                            include('omffgfli.php');
                                            $noEcho = '';
                                            ?>
                                            <td align="left" valign="top" class="paddingLeft2">
                                                <div class="logoInvImg">
                                                    <img style="max-height:80px;max-width:80px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                         alt="" class="<?php echo $imageClass; ?>"/>
                                                </div>
                                            </td>
    <?php } ?>
                                        <td align="right">
                                            <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
    <?php if ($rowUdhaar['uns_firm_desc_check'] == 'on' && $firm_desc != NULL) { ?>
                                                    <tr> 
                                                        <td valign="middle" colspan="3" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_address_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_address_font']; ?>px" onClick="this.contentEditable = 'true';">
        <?php if ($rowUdhaar['uns_header_display'] != 'blank') echo $firm_desc; ?>
                                                        </td>
                                                    </tr>
    <?php } if ($rowUdhaar['uns_firm_address_check'] == 'on' && $firm_address != NULL) { ?>
                                                    <tr> 
                                                        <td valign="middle" align="center" colspan="3" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_address_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_address_font']; ?>px" onClick="this.contentEditable = 'true';">
        <?php if ($rowUdhaar['uns_header_display'] != 'blank') echo $firm_address; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if ($layout != 'udhaarNoticeLay4Inch' && $layout != 'udhaarNoticeLayA6') {
                                                    if (($rowUdhaar['uns_firm_phone_check'] == 'on' && $firm_phone_details != NULL) || ($rowUdhaar['uns_firm_email_check'] == 'on' && $firm_email != NULL)) {
                                                        ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
            <?php if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_firm_phone_check'] == 'on' && $firm_phone_details != NULL) { ?>
                                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_phone_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_phone_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                                <b> PHONE :</b><?php echo $firm_phone_details; ?>
                                                                            </td>
            <?php } if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_firm_email_check'] == 'on' && $firm_email != NULL) { ?>
                                                                            <td valign="middle" align="center" class="ff_calibri padLeft5 font_color_<?php echo $rowUdhaar['uns_firm_email_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_email_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                                <b> EMAIL : </b><?php echo $firm_email; ?>
                                                                            </td>
            <?php } ?>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                if ($layout == 'udhaarNoticeLay4Inch' && $layout == 'udhaarNoticeLayA6') {
                                                    ?>
        <?php if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_firm_phone_check'] == 'on' && $firm_phone_details != NULL) { ?>
                                                        <tr>                         
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_firm_phone_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_phone_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                <b> PHONE : </b><?php echo $firm_phone_details; ?>
                                                            </td>
                                                        </tr>
        <?php } if ($rowUdhaar['uns_header_display'] != 'blank' && $rowUdhaar['uns_firm_email_check'] == 'on' && $firm_email != NULL) { ?>
                                                        <tr>                               
                                                            <td valign="middle" align="center" class="ff_calibri padLeft5 font_color_<?php echo $rowUdhaar['uns_firm_email_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_firm_email_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                <b>EMAIL : </b><?php echo $firm_email; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php } if ($rowUdhaar['uns_reg_no_check'] == 'on') { ?>
                                                    <tr> 
        <?php if ($rowUdhaar['uns_header_display'] != 'blank') { ?>
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_reg_no_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_reg_no_font']; ?>px" onClick="this.contentEditable = 'true';">
                                                                <b> <?php
                                                                    if ($rowUdhaar['uns_reg_no_label'] != '')
                                                                        echo $rowUdhaar['uns_reg_no_label'] . ':';
                                                                    else
                                                                        echo 'Firm Registration/License No:';
                                                                    ?><?php echo $firm_reg_no; ?></b>
                                                            </td>
                                                    <?php } ?>
                                                    </tr>
    <?php } ?>
                                            </table>
                                        </td>
                                        <?php if ($rowUdhaar['uns_header_display'] != 'blank') { ?>
                                            <?php if (($rowUdhaar['uns_firm_right_logo_check'] == 'on') && ($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '')) { ?>
                                                <?php
                                                $firmId = $firm_id;
                                                $noEcho = 'Y';
                                                include('omffgfri.php');
                                                $noEcho = '';
                                                ?>
                                                <td align="left" valign="top" class="paddingRight2">
                                                    <div class="logoInvImg">
                                                        <img style="max-height:80px;max-width:80px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                             alt="" class="<?php echo $imageClass; ?>"/>
                                                    </div>
                                                </td>
                                            <?php } ?>
    <?php } ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
<?php } ?> 
                    <tr style="background: #d7ebff;">
                        <td colspan="2" style="padding:3px;">
                            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" >
                                <tr>
                                    <td align="right">
                                        <div class="ff_calibri font_color_<?php echo $rowUdhaar['uns_date_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_date_font']; ?>px" onClick="this.contentEditable = 'true';"><b><?php echo $dateLabel; ?>&nbsp;</b><?php echo om_strtoupper($todayDate); ?></div> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
<!--                    <tr>
                        <td align="left" class="paddingTop4 padBott4">
                            <div class="hrPaleGrey"></div>
                        </td>
                    </tr>-->
                    <tr>
                        <td colspan="2">
                            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" >
                                <tr>
                                    <td align="left" class="paddingTop5 paddingLeft2">
                                        <div class="ff_calibri font_color_<?php echo $rowUdhaar['uns_sub_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_sub_font']; ?>px" onClick="this.contentEditable = 'true';">
                                            <b><?php echo $subjectHead; ?>&nbsp;<?php echo $subjectLabel; ?></b>
                                        </div> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" colspan="2" valign="top" class="paddingTop2 paddingLeft2">
                            <div>
                                <div onClick="this.contentEditable = 'true';" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_notice_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_notice_font']; ?>px">
                                    <?php
                                    $udhaarNoticeContent = str_replace("LOAN_AMOUNT", "$udhaarAmtLeft", $udhaarNoticeContent);
                                    $udhaarFinalDaysPos = stripos($udhaarNoticeContent, 'FINAL_LOAN_DATE') - 2;
                                    $udhaarFinalDays = substr($udhaarNoticeContent, $udhaarFinalDaysPos, 2);
                                    $lastDate = strtotime($todayDate . " + $udhaarFinalDays days");
                                    $lastDate = date('d M Y', $lastDate);
                                    $udhaarNoticeContent = str_replace("$udhaarFinalDays" . "FINAL_LOAN_DATE", "$lastDate", $udhaarNoticeContent);
                                    $str = strlen($udhaarNoticeContent);
                                    if ($rowUdhaar['uns_notice_font'] == '')
                                        $rowUdhaar['uns_notice_font'] = '12';
                                    $noOfRows = ceil($str / (860 / $rowUdhaar['uns_notice_font']));
                                    $height = $noOfRows * ($rowUdhaar['uns_notice_font'] + ($rowUdhaar['uns_notice_font'] % 10) + 2);
                                    ?>
                                    <textarea id="loanNoticeContent"  name="loanNoticeContent" spellcheck="false" rows="<?php echo $noOfRows; ?>"
                                              class="textarea_a5_content ff_calibri font_color_<?php echo $rowUdhaar['uns_notice_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_notice_font']; ?>px;
                                              text-align:left;width:<?php echo $textAreaWidth; ?>;height:<?php echo $height; ?>;"><?php echo $udhaarNoticeContent; ?></textarea> 
                                </div>
                            </div> 
                        </td>
                        <?php
                        if (($rowUdhaar['uns_other_info_check'] == 'on' && $udhaarOtherInfo != '')) {
                            $str = strlen($otherInfoLabel . $udhaarOtherInfo);
                            if ($str1 = strlen($udhaarOtherInfo) != 15) {
                                $udhaarOtherInfo = substr($udhaarOtherInfo, 0, $str1 - 5);
                            }
                            if ($rowUdhaar['uns_other_info_font'] == '')
                                $rowUdhaar['uns_other_info_font'] = '12';
                            $noOfRows = ceil($str / (860 / $rowUdhaar['uns_other_info_font']));
                            $height = $noOfRows * ($rowUdhaar['uns_other_info_font'] + ($rowUdhaar['uns_other_info_font'] % 10) + 2);
                            ?>
                            <tr>
                                <td align="left" colspan="3" valign="top"  class="paddingLeft2 paddingTop4">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" width="100%">
                                        <tr>
                                            <td align="left">
                                                <textarea id="otherInfoLabel" spellcheck="false" name="otherInfoLabel" class="textarea_a5_content ff_calibri" rows="<?php echo $noOfRows; ?>"
                                                          style="font-weight:600;text-align:left;width:<?php echo $textAreaWidth; ?>;height:<?php echo $height; ?>;
                                                          font-size:<?php echo $rowUdhaar['uns_other_info_font']; ?>;color:<?php echo $rowUdhaar['uns_other_info_color']; ?>"><?php
                                                          if ($otherInfoLabel != '') {
                                                              echo $otherInfoLabel;
                                                          } else
                                                              echo 'OTHER INFORMATION :';
                                                          echo ' ' . $udhaarOtherInfo;
                                                          ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php
                        }
                        if (($rowUdhaar['uns_tnc_check'] == 'on') && ($tNC != '' || $tNC != NULL) && $tNC != 'NULL' && $tNC != 'Terms & Conditions:') {
                            $str = strlen($tNC);
                            $noOfRows = ceil($str / (860 / $rowUdhaar['uns_tnc_content_font']));
                            $height = $noOfRows * ($rowUdhaar['uns_tnc_content_font'] + ($rowUdhaar['uns_tnc_content_font'] % 10) + 2);
                            ?>
                            <tr>
                                <td align="left" colspan="2" class="paddingTop1 paddingBott1">
                                    <div class="hrPaleGrey"></div>
                                </td>
                            </tr>   
                            <tr>
                                <td align="left" colspan="3"  class="paddingLeft2">
                                    <div class="ff_calibri font_color_<?php echo $rowUdhaar['uns_tnc_color']; ?>"
                                         style="font-weight:600;font-size:<?php echo $rowUdhaar['uns_tnc_font']; ?>px" onClick="this.contentEditable = 'true';">  <?php echo 'TERMS & CONDITIONS: ' ?>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td align="left" colspan="3"  class="paddingLeft2">
                                    <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri" rows="<?php echo $noOfRows; ?>"
                                              style="text-align:left;width:<?php echo $textAreaWidth; ?>;height:<?php echo $height; ?>;
                                              font-size:<?php echo $rowUdhaar['uns_tnc_content_font']; ?>;color:<?php echo $rowUdhaar['lns_tnc_content_color']; ?>"><?php
                                        echo $tNC;
                                        ?></textarea>
                                </td>
                            </tr>
<?php } ?>
                        <tr>
                            <td align="center" colspan="2" class="paddingTop2" style="height:15mm;padding:3px" valign="middle">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" class="ff_calibri fw_b fs_14" width="179px">  
                                        </td>
                                        <td align="right" class="ff_calibri fw_b fs_14" width="178px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="ff_calibri paddingLeft2 font_color_<?php echo $rowUdhaar['uns_cust_sign_color']; ?>" style="font-weight:600;font-size:<?php echo $rowUdhaar['uns_cust_sign_font']; ?>px"><?php echo $custSign; ?>   
                                        </td>
                                        <td align="right" class="ff_calibri paddingRight2 font_color_<?php echo $rowUdhaar['uns_owner_sign_color']; ?>" style="font-weight:600;font-size:<?php echo $rowUdhaar['uns_owner_sign_font']; ?>px"><?php echo $ownerSign; ?>   
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
<?php if ($firmForm8WitnessMess == 'YES') { ?>
                            <tr>
                                <td align="center" colspan="2" class="textBoxCurve1px padding2pxAll backFFFFFF">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="left" class="ff_calibri fs_14">&nbsp;
                                            </td>
                                            <td align="right" class="ff_calibri fs_14">&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" class="ff_calibri fs_14">Witness..........................
                                            </td>
                                            <td align="right" class="ff_calibri fs_14">Witness..........................
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
<?php } if (($rowUdhaar['uns_footer_check'] == 'on') && ($firmFooterInfo != '' || $firmFooterInfo != NULL) && $firmFooterInfo != 'NULL') { ?>
                            <tr>
                                <td align="center" colspan="2" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_footer_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_footer_font']; ?>px">
    <?php echo $footerLabel; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2" class="ff_calibri font_color_<?php echo $rowUdhaar['uns_footer_color']; ?>" style="font-size:<?php echo $rowUdhaar['uns_footer_font']; ?>px">
    <?php echo $firm_form_footer; ?>
                                </td>
                            </tr>
<?php } ?>
                </table>
            </div>
            <?php
            //****************************************************************
            // START CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 22 DEC 2023
            // ****************************************************************
            $userId = $_GET['custId'];
            $slPrPreInvoiceNo = $rowUdhaar['utin_pre_invoice_no'];
            $slPrInvoiceNo = $rowUdhaar['utin_invoice_no'];
            $invoiceDate = $udhaarDOB;
            $invmessageText = 'Udhaar Notice Invoice Details :';

            $invoiceDateTime = date("d M Y", strtotime($invoiceDate));
            $invoiceDate = strtoupper($invoiceDateTime);
            //$_GET['invoiceDate'] = $invoiceDate;

            if ($whatsappStatus == 'Yes') {
                if ($systemOnOrOff == 'ON') {
                    $dirName = $documentRootIncludePhp . 'invoice/' . $sessionOwnerId;
                    if (!is_dir($dirName)) {
                        chmod($documentRootIncludePhp . 'invoice', 0777);
                        mkdir($dirName, 0777, true);
                    }
                } else {
                    $dirName = 'invoice';
                }
                //
                chmod($dirName, 0777);
                $readWritefile = fopen("$dirName/om_current_invoice.html", "w");
                fwrite($readWritefile, ob_get_contents());
                fclose($readWritefile);
                //
                if ($systemOnOrOff == 'ON') {
                    //
                    $cmd = "/usr/local/bin/wkhtmltopdf " . "$dirName/om_current_invoice.html " . "$dirName/om_current_invoice.pdf";
                    //  
                } else {
                    //
                    $folderPathForCommand = str_replace('/', '\\', $documentRootIncludePhp);
                    $cmd = $folderPathForCommand . "invoice\wkhtmltopdf\bin\wkhtmltopdf.exe " . $folderPathForCommand . "invoice\om_current_invoice.html " . $folderPathForCommand . "invoice\om_current_invoice.pdf";
                    //
                }

                shell_exec($cmd);
                //
                include 'ogspwhatsapp.php';
                //
            }
            ob_end_flush();

            //****************************************************************
            // END CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 22 DEC 2023
            // ****************************************************************
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="left" class="paddingTop5" width="100%" style="width:<?php echo $printClass; ?>">
                <tr>
                    <td align="center">
                        <a style="cursor: pointer;" 
                           onClick="window.print();">
                            <img src="<?php echo $documentRootBSlash; ?>/images/img/printer.png" alt='Print' title='Print'
                                 width="26px" height="26px" /> 
                        </a>
                        <a style="cursor: pointer;" 
                           onClick="var url = window.location.href;
                                   url += '&whatsappStatus=Yes';
                                   window.location.href = url;">
                            <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                                 width="32px" height="32px" /> 
                        </a>
                    </td>
                </tr>
            </table>
            <br/>
        </div>
    </body>
</html>