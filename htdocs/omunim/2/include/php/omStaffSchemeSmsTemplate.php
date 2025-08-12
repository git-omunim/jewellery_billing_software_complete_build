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
<SELECT id="schemeStaffSmsTemplate" name="schemeStaffSmsTemplate" 
        onchange="setLayoutFieldInDb('schemeStaffSmsTemplate', document.getElementById('schemeStaffSmsTemplate').value);"> 
    <OPTION  VALUE="NotSelected">SELECT SMS TEMPLATE FOR STAFF</OPTION>
    <?php
    //
    $qSelStaffSchemeTemplate = "SELECT smtp_sub FROM sms_templates "
                        . "WHERE smtp_own_id = '$_SESSION[sessionOwnerId]'";
    //
    $resStaffSchemeTemplate = mysqli_query($conn, $qSelStaffSchemeTemplate);
    //
    while ($rowStaffScemeTemplate = mysqli_fetch_array($resStaffSchemeTemplate, MYSQLI_ASSOC)) {
            if ($rowStaffScemeTemplate['smtp_sub'] == $schemeStaffSmsTemplate) {
                $schemeStaffSmsTemplateSel = "selected";
            }
            echo "<OPTION  VALUE=" . "\"{$rowStaffScemeTemplate['smtp_sub']}\"" . " class=" . "\"content-mess-blue\"" . " $schemeStaffSmsTemplateSel>{$rowStaffScemeTemplate['smtp_sub']}</OPTION>";
            $schemeStaffSmsTemplateSel = "";       
        }
    ?>
</SELECT>
