<?php
/*
 * **************************************************************************************
 * @tutorial: SET SCHEME DUE INSTALLMENT TEMPLATE FILE @PRIYANKA-10SEP2019
 * **************************************************************************************
 *
 * Created on 10 SEP, 2019 15:47:36 PM
 *
 * @FileName: omSchemeDueInstallmentTemplateFile.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.104
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2019 SoftwareGen, Inc
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
?>
<input type="hidden" id="layoutUpdatedMsgDiv" name="layoutUpdatedMsgDiv"/>
<SELECT id="schemeDueInstallmentTemplate" name="schemeDueInstallmentTemplate" style="width:100%;height:30px;border:1px solid #c1c1c1;"> 
    <OPTION  VALUE="NotSelected">SELECT DUE EMI SMS TEMPLATE</OPTION>
    <?php
    //
    $qSelDueInsTemplate = "SELECT smtp_sub FROM sms_templates "
                        . "WHERE smtp_own_id = '$_SESSION[sessionOwnerId]'";
    //
    $resDueInsTemplate = mysqli_query($conn, $qSelDueInsTemplate);
    //
    while ($rowDueInsTemplate = mysqli_fetch_array($resDueInsTemplate, MYSQLI_ASSOC)) {
            //
            if ($rowDueInsTemplate['smtp_sub'] == $setSchemeDueInstallmentTemplate) {
                $setSchemeDueInstallmentTemplateSel = "selected";
            }
            //
            echo "<OPTION  VALUE=" . "\"{$rowDueInsTemplate['smtp_sub']}\"" . " class=" . "\"content-mess-blue\"" . " $setSchemeDueInstallmentTemplateSel>{$rowDueInsTemplate['smtp_sub']}</OPTION>";
            //
            $setSchemeDueInstallmentTemplateSel = "";       
        }
    ?>
</SELECT>
<?php //if ($setSchemeDueInstallmentTemplate == '' || $setSchemeDueInstallmentTemplate == NULL) { ?>
        <div>
            <?php
            $inputId = "submit";
            $inputType = 'submit';
            $inputFieldValue = 'Submit';
            $inputIdButton = "submit";
            $inputNameButton = '';
            $inputTitle = '';
            // This is the main class for input flied
            $inputFieldClass = 'btn btn1 btn1Hover ' . $om_btn_style;
            $inputStyle = "width:100%;height: 30px;font-size: 14px;color: #0F118A;border: 1px solid #7ab0fe;background-color: #DCEAFF;border-radius: 5px !important;";
            $inputLabel = 'Submit'; // Display Label below the text box
            //
            // This class is for Pencil Icon                                                            
            $inputIconClass = '';
            $inputPlaceHolder = '';
            $spanPlaceHolderClass = '';
            $spanPlaceHolder = '';
            $inputOnChange = "";
            $inputOnClickFun = 'setLayoutFieldInDb("schemeDueInstallmentTemplate", document.getElementById("schemeDueInstallmentTemplate").value);';
            $inputKeyUpFun = '';
            $inputDropDownCls = '';               // This is the main division class for drop down 
            $inputselDropDownCls = '';            // This is class for selection in drop down
            $inputMainClassButton = '';           // This is the main division for Button
            include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
            ?>
        </div>
<?php //} ?>
