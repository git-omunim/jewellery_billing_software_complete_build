<?php
/*
 * **************************************************************************************
 * @tutorial: Unvisit Customer SMS Templste
 * **************************************************************************************
 *
 * Created on 08 Feb, 2021 10:32:36 AM
 *
 * @FileName: omunvisitcustSMStemplate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
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
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
include 'ommpdpmsg.php';
require_once 'system/omssopin.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//
//echo '$setBirthdaySmsTemplate =='.$setBirthdaySmsTemplate;
//
$queryStaff = "SELECT omly_value FROM omlayout WHERE omly_option = 'smstemplatebystaff'";
$resStaff  = mysqli_query($conn, $queryStaff);
$rowStaff = mysqli_fetch_array($resStaff);
$staffShoworhide= $rowStaff['omly_value'];
?>
<!--START CODE TO ADD ONKEYDOWN FIELDS @AUTHOR:SHUBHAM-->
<SELECT id="unvisitCustSmsTemplate" name="unvisitCustSmsTemplate" style="width:100%;height:30px;border:1px solid #c1c1c1;-webkit-appearance: none;-moz-appearance: none;appearance: none;"
        onchange="changeSMSTemplateDiv('<?php echo $documentRoot; ?>', this.value);"
        class="input_border_red" > 
    <OPTION  VALUE="NotSelected">SELECT SMS TEMPLATE</OPTION>
    <?php
    if($staffShoworhide =='hide' || $staffShoworhide =='' || $staffShoworhide ==null){
    $qSelPerFirm = "SELECT smtp_sub,smtp_text FROM sms_templates where smtp_own_id='$_SESSION[sessionOwnerId]'";
    }else{
    $qSelPerFirm = "SELECT smtp_sub,smtp_text FROM sms_templates where smtp_own_id='$_SESSION[sessionOwnerId]' and smtp_staff_id='$staffId'";
    }
    $resPerFirm = mysqli_query($conn, $qSelPerFirm);
    while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
        if ($rowPerFirm['smtp_sub'] == $setUnvisitCustSmsTemplate) {
            $setUnvisitCustTempSel = "selected";
            $waMessageContent = $rowPerFirm['smtp_text'];
        }
        echo "<OPTION  VALUE=" . "\"{$rowPerFirm['smtp_sub']}\"" . " class=" . "\"content-mess-blue\"" . " $setUnvisitCustTempSel>{$rowPerFirm['smtp_sub']}</OPTION>";
        $setUnvisitCustTempSel = "";
    }
    ?>
</SELECT>
<?php if ($needListOnly != 'YES') { ?>
    <tr>
        <td align="center">
            <div style="margin-top:10px;">
                <?php
                $inputId = "submit";
                $inputType = 'submit';
                $inputFieldValue = 'Submit';
                $inputIdButton = "submit";
                $inputNameButton = '';
                $inputTitle = '';
                // This is the main class for input flied
                $inputFieldClass = 'btn ' . $om_btn_style;
                $inputStyle = "width: 100%;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;font-size:14px;font-weight:600;   ";
                $inputLabel = 'Submit'; // Display Label below the text box
                //
                // This class is for Pencil Icon                                                            
                $inputIconClass = '';
                $inputPlaceHolder = '';
                $spanPlaceHolderClass = '';
                $spanPlaceHolder = '';
                $inputOnChange = "";
                $inputOnClickFun = 'setLayoutFieldInDb("unvisitCustSmsTemplate", document.getElementById("unvisitCustSmsTemplate").value);';
                $inputKeyUpFun = '';
                $inputDropDownCls = '';               // This is the main division class for drop down 
                $inputselDropDownCls = '';            // This is class for selection in drop down
                $inputMainClassButton = '';           // This is the main division for Button
                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                ?>
            </div>
        </td>
    </tr>
<?php } ?>