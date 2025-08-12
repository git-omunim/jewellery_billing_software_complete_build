<?php
/*
 * *****************************************************************************************
 * @tutorial: VISITOR TO CUSTOMER CONVERSION APPROVAL PANEL FILE @AUTHOR:MADHUREE-14MAY2020
 * *****************************************************************************************
 * 
 * Created on 14 MAY, 2020 10:40:31 AM
 *
 * @FileName: omvisiToCustApproval.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
$accFileName = $currentFileName;
include 'ommpemac.php';

include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';

$staffId = $_SESSION['sessionStaffId'];
?>
<?php
$contactId = $_GET['contactId'];
//echo 'contactId'.$contactId;
parse_str(getTableValues("SELECT * FROM visitor WHERE visitor_interest='CUSTOMER'"));
?>
<input type="hidden" id="girviIframePopUp" name="girviIframePopUp">
<!--<div id="iframeContainer" style="position:fixed; width :1000px; height:800px ; visibility : hidden; z-index: 1;overflow-x: hidden; "></div>-->
<div id="visitorToCustomer">
    <table border="0" width="100%" align="center">
        <tr>
            <td valign="middle" align="center" width="90%">
                <div class="textLabelHeading" style="margin-top:2%;margin-bottom: 2%;margin-left: 7%">
                    VISITOR TO CUSTOMER APPROVAL PANEL
                </div>
            </td>
            <td valign="middle" align="center" width="10%">
                <div id="main_ajax_loading_div" style="visibility: hidden; background:none;">
                    <img src="<?php echo $documentRootBSlash; ?>/images/ajaxMainLoading.gif" />
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2" colspan="2">
                <hr color="#B8860B" />
            </td>
        </tr>  
    </table>
</div>
<div id="customerStatusChangeDiv">
    <table style="width:100%" align="center" border="0">
        <tr>
            <td align="center" class="fs_13 bold brown" title="CUSTOMER NAME">
                <div class="fs_14 bold brown">CUSTOMER NAME</div>
            </td>
            <td align="center" class="fs_13 bold brown" title="CUSTOMER MOBILE">
                <div class="fs_14 bold brown">CUSTOMER MOBILE</div>
            </td>
            <td align="center" class="ff_calibri fs_14 brown" title="CUSTOMER CITY">
                <div class="fs_14 bold brown">CUSTOMER CITY</div>
            </td>
            <td align="center" class="ff_calibri fs_14 brown" title="CUSTOMER STATE">
                <div class="fs_14 bold brown">CUSTOMER STATE</div>
            </td>
            <td align="center" class="ff_calibri fs_14 brown" title="CUSTOMER EMAIL">
                <div class="fs_14 bold brown">SELECT FIRM</div>
            </td>
            <td align="center" class="ff_calibri fs_14 brown" title="CUSTOMER STATUS">
                <div class="fs_14 bold brown">SELECT CUST. STATUS</div>
            </td>
        </tr>
        <tr>
            <td colspan="6"><div class="hrGrey" style="margin-top:1%;margin-bottom: 1%;"></div></td>
        </tr>
        <tr>
            <td align="center" title="CUSTOMER NAME" style="cursor: pointer;">
                <div class="textLabel14CalibriBlue" onclick="updateCustomerTicketPopupDetails(<?php echo $contactId ?>)"><?php echo strtoupper($contactName); ?></div>
            </td>
            <td align="center" title="CUSTOMER MOBILE">
                <div class="textLabel14CalibriBlue" ><?php echo strtoupper($contactPhnNo); ?></div>
            </td>
            <td align="center" title="CUSTOMER CITY">
                <div class="textLabel14CalibriBlue" ><?php echo strtoupper($contatCity); ?></div>
            </td>
            <td align="center" title="CUSTOMER STATE">
                <div class="textLabel14CalibriBlue" ><?php echo strtoupper($contatState); ?></div>
            </td>
            <td align="center" title="CUSTOMER STATUS">
                <div class="selectStyledBorderLess background_transparent">
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>">
                    <select id="user_firm" name="user_firm" class="textLabel14CalibriBlackMiddle" value="" >
                        <option class="textLabel14CalibriBlue" value="NotSelected">SELECT FIRM NAME</option>
                        <?php
                        if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type IN ('Public','Personal') and firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                                if ($gbLanguage == 'English') {
                                    $firmName = om_strtoupper($rowPerFirm['firm_name']);
                                } else {
                                    $firmName = $rowPerFirm['firm_name'];
                                }
                                if ($rowPerFirm['firm_type'] == "Public") {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . ">$firmName</OPTION>";
                                } else {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . ">$firmName</OPTION>";
                                }
                            }
                        } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                            $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' order by firm_since desc";
                            $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                            while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
                                if ($gbLanguage == 'English') {
                                    $firmName = om_strtoupper($rowPerFirm['firm_name']);
                                } else {
                                    $firmName = $rowPerFirm['firm_name'];
                                }
                                if ($rowPerFirm['firm_type'] == "Public") {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . ">$firmName</OPTION>";
                                } else {
                                    echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . ">$firmName</OPTION>";
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
            </td>
            <td align="center" title="CUSTOMER STATUS">
                <div class="selectStyledBorderLess background_transparent">
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>">
                    <?php if ($staffId != '' && $staffId != NULL) { ?>
                        <select id="customer_status" name="customer_status" class="textLabel14CalibriBlackMiddle" disabled>
                            <option class="textLabel14CalibriBlue" value="PENDING">CUSTOMER PENDING</option>
                            <option class="textLabel14CalibriBlue" value="APPROVE">CUSTOMER APPROVED</option>
                        </select>
                    <?php } else { ?>
                        <select id="customer_status" name="customer_status" class="textLabel14CalibriBlackMiddle" value="">
                            <option class="textLabel14CalibriBlue" value="PENDING">CUSTOMER PENDING</option>
                            <option class="textLabel14CalibriBlue" value="APPROVE">CUSTOMER APPROVED</option>
                        </select>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr><td colspan="3"><div style="margin-top: 6%;"></div></td></tr>
        <tr>
            <td colspan="6" align="center">
                <input id="custUpdate" type="submit" value="APPROVE" style="width: 100px;background-color: #059BD8;height: 26px;border:solid 0px #000000;
                       font-family:Calibri;font-size:15px;font-weight:bold;cursor:pointer;color: white" 
                       onclick="javasricpt:if (document.getElementById('user_firm').value === 'NotSelected' || document.getElementById('user_firm').value === '') {
                                   alert('Please Select Firm !');document.getElementById('user_firm').focus();
                                   return false;
                               }if (document.getElementById('customer_status').value !== 'APPROVE') {
                                   alert('Please Change Customer Status To Approve !');document.getElementById('customer_status').focus();
                                   return false;
                               }
                               changeCustomerApprovalStatusStatus(document.getElementById('user_firm').value, document.getElementById('customer_status').value, '<?php echo $contactId; ?>', 'CustomerApprovalPanel');"/>
            </td>
        </tr>
    </table>
</div>