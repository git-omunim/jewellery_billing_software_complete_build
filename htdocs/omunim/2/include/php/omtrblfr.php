<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Mar 14, 2013 5:41:28 PM
 *
 * @FileName: omtrblfr.php
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
?>
<?php
require_once 'system/omssopin.php';
?>
<table border="0" cellpadding="0" cellspacing="0">
    <tr align="center">
        <td align="center" class="frm-lbl">
            <SELECT class="lgn-txtfield-without-borderAndBackground13-Arial" id="trialBalanceFirmName" name="trialBalanceFirmName" 
                    onchange="getTrialBalanceByFirmName(this.value,document.getElementById('trialBalanceToYY'));">
                <OPTION  VALUE="" class="lgn-txtfield-without-borderAndBackground13-Arial">ALL FIRMS&nbsp;&nbsp;</OPTION>
                <?php
                if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
                    $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                    $resPerFirm = mysqli_query($conn,$qSelPerFirm);

                    while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {

                        if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                            $firmSelected = "selected";
                        }

                        if ($rowPerFirm['firm_type'] == "Public") {
                            echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                        } else {
                            echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                        }
                        $firmSelected = "";
                    }
                } else if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                    $qSelPerFirm = "SELECT firm_id,firm_name,firm_type FROM firm where firm_type='Public' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
                    $resPerFirm = mysqli_query($conn,$qSelPerFirm);

                    while ($rowPerFirm = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC)) {

                        if ($rowPerFirm['firm_id'] == $firmIdSelected) {
                            $firmSelected = "selected";
                        }

                        if ($rowPerFirm['firm_type'] == "Public") {
                            echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-blue\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                        } else {
                            echo "<OPTION  VALUE=" . "\"{$rowPerFirm['firm_id']}\"" . " class=" . "\"content-mess-maron\"" . " $firmSelected>{$rowPerFirm['firm_name']}</OPTION>";
                        }
                        $firmSelected = "";
                    }
                }
                ?>
            </SELECT>
        </td>
    </tr>
</table>