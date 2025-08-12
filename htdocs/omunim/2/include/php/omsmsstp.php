<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Oct 9, 2014 6:58:41 PM
 *
 * @FileName: omsmsstp.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

require_once 'system/omssopin.php';

$tempSub = trim($_POST['tempSub']);
$qSelTemp = "SELECT smtp_id,smtp_sub FROM sms_templates where smtp_own_id='$_SESSION[sessionOwnerId]' and smtp_sub LIKE '$tempSub%' order by smtp_since asc";
$resTemp = mysqli_query($conn, $qSelTemp);
$totalTemp = mysqli_num_rows($resTemp);
if ($totalTemp > 0) {
    ?>
    <SELECT class="cityListDivToAddNewCustSelect" id="tempListSelectDiv" name="tempListSelectDiv" 
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('smsTemplateId').value = this.value;
                        searchSmsTempForPanelBlank();
                    }"
            onclick="document.getElementById('smsTemplateId').value = this.value;
                    searchSmsTempForPanelBlank();"
            multiple="multiple" size="4">
                <?php
                while ($row = mysqli_fetch_array($resTemp, MYSQLI_ASSOC)) {
                    echo "<OPTION  VALUE=" . "\"{$row['smtp_sub']}\"" . " class=" . "\"content-mess-maron\"" . " >{$row['smtp_sub']}</OPTION>";
                }
                ?>
    </select>
<?php } ?>