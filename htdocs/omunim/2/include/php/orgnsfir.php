<?php
/*
 * **************************************************************************************
 * @tutorial: Select Firm In Analysis Panel 
 * **************************************************************************************
 * 
 * Created on Mar 12, 2013 4:06:27 PM
 *
 * @FileName: orgnsfir.php
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
//changes in file @AUTHOR:SANDY29DEC13
require_once 'system/omssopin.php';
?>
<table border="0" cellpadding="0" cellspacing="0">
    <tr align="center">
        <td align="center">
            <div class="selectStyledBorderLess backFFFFFF floatLeft"><!--change in classes @AUTHOR: SANDY29DEC13-----> 
                <SELECT class ="textLabel14CalibriGrey" id="ReportBookFirmName" name="reportBookFirmName" 
                         onchange="searchReportByDate(document.getElementById('ReportBookFirmName').value,document.getElementById('reportEntryDayDD'),document.getElementById('reportEntryMonth'),document.getElementById('reportEntryYYYY'));"
                        ><!---to call function on onchange @AUTHOR: SANDY07JAN14---->
                    <OPTION  VALUE="" class ="textLabel14CalibriGrey">ALL FIRMS&nbsp;&nbsp;</OPTION>
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
            </div>
        </td>
    </tr>
</table>
