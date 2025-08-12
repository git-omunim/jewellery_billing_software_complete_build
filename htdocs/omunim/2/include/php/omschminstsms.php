<?php
/*
 * **************************************************************************************
 * @tutorial: List all firms for Supplier
 * **************************************************************************************
 *
 * Created on 12 Dec, 2012 10:32:36 AM
 *
 * @FileName: omschminstsms.php
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
$sessionOwnerId = $_SESSION[sessionOwnerId];
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
//
//echo '$setSetSchemeInstT =='.$setSetSchemeInstT;
//
?>
<!--START CODE TO ADD ONKEYDOWN FIELDS @AUTHOR:SHUBHAM-->
<SELECT id="schemeSmsTemplate" name="schemeSmsTemplate"> 
    <OPTION  VALUE="NotSelected">SELECT SMS TEMPLATE</OPTION>
    <?php
    $qSelPerFirm = "SELECT smtp_sub FROM sms_templates where smtp_own_id='$_SESSION[sessionOwnerId]'";
    $resPerFirm = mysqli_query($conn, $qSelPerFirm);
    while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {
        if ($rowPerFirm['smtp_sub'] == $setSetSchemeInstT) {
            $setSchemeInstTempSel = "selected";
        }
        echo "<OPTION  VALUE=" . "\"{$rowPerFirm['smtp_sub']}\"" . " class=" . "\"content-mess-blue\"" . " $setSchemeInstTempSel>{$rowPerFirm['smtp_sub']}</OPTION>";
        $setSchemeInstTempSel = "";       
        }
    ?>
</SELECT>
<tr>
    <td>
        <div style="margin-left: 54px;">
            <?php
            $inputId = "submit";
            $inputType = 'submit';
            $inputFieldValue = 'Submit';
            $inputIdButton = "submit";
            $inputNameButton = '';
            $inputTitle = '';
            // This is the main class for input flied
            $inputFieldClass = 'btn ' . $om_btn_style;
            $inputStyle = " ";
            $inputLabel = 'Submit'; // Display Label below the text box
            //
            // This class is for Pencil Icon                                                            
            $inputIconClass = '';
            $inputPlaceHolder = '';
            $spanPlaceHolderClass = '';
            $spanPlaceHolder = '';
            $inputOnChange = "";
            $inputOnClickFun = 'setLayoutFieldInDb("schemeSmsTemplate", document.getElementById("schemeSmsTemplate").value);';
            $inputKeyUpFun = '';
            $inputDropDownCls = '';               // This is the main division class for drop down 
            $inputselDropDownCls = '';            // This is class for selection in drop down
            $inputMainClassButton = '';           // This is the main division for Button
            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
            ?>
        </div>
    </td>
</tr>
