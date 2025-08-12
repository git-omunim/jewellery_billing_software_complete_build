<?php
/*
 * **************************************************************************************
 * @tutorial: Firm Name List For Update Girvi
 * **************************************************************************************
 * 
 * Created on Apr 2, 2013 3:44:56 PM
 *
 * @FileName: orgugdfr.php
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
<SELECT class="lgn-txtfield12" id="girviFirmUpdate<?php echo $girviId; ?>" name="firmId" size="1"> 
    <OPTION  VALUE="NotSelected">Firm Name</OPTION>
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