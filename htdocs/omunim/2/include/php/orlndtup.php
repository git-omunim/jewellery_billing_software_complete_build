<?php /**
 * 
 * Created on Jul 10, 2011 7:33:17 PM
 *
 * @FileName: olggsddm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */ ?>
<?php
//change in file @AUTHOR: SANDY20JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';

if ($releaseDateDD != '' || $releaseDateDD != NULL) {
    $releaseDateDD = trim($_POST['relDateDDValue']);

    $releaseDateMM = trim($_POST['relDateMMValue']);
    $releaseDateYY = trim($_POST['relDateYYValue']);

    $releaseDateMM = date("n", strtotime("$releaseDateYY-$releaseDateMM-$releaseDateDD"));
    $releaseDateDD = date("j", strtotime("$releaseDateYY-$releaseDateMM-$releaseDateDD"));
}
//echo 'releaseDateDD:' . $releaseDateDD . ' releaseDateMM:' . $releaseDateMM . ' releaseDateYY:' . $releaseDateYY;
//$girviNewDOBStr = date("d M Y", strtotime($girviNewDOB));
?>
<td align="left" valign="top" title="Select New Girvi Date" class="textBoxCurve1px margin1pxAll textLabel14CalibriNormal backFFFFFF">
    <?php
    $todayDay = date(j) - 1;
    $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

    if ($releaseDateDD >= 0 && $releaseDateDD != NULL) {
        $releaseDateDD = $releaseDateDD - 1;
        $optDay[$releaseDateDD] = "selected";
    } else {
        $optDay[$todayDay] = "selected";
    }
    ?> 
    <div class="selectStyledBorderLess background_transparent floatLeft">
        <select id="DMDOBDay" name="DMDOBDay" class ="textLabel14CalibriGrey"
                onchange="changeLoanUpdateDate('<?php echo $documentRoot; ?>', this.value, document.getElementById('DMDOBMonth').value, document.getElementById('DMDOBYear').value, document.getElementById('loanDepositPrinAmount').value, document.getElementById('loanDepositIntAmount').value, document.getElementById('selTROI'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviNewDOBStr; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value);"
                onkeydown="javascript: if (event.keyCode == 13) {
                            document.getElementById('DMDOBMonth').focus();
                            return false;
                        }"> <!----Change in class @AUTHOR: SANDY18DEC13---->
            <option value="NotSelected">DAY</option>
            <?php
            for ($dd = 0; $dd <= 30; $dd++) {
                echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
            }
            ?>
        </select> 
    </div>

    <!-- *************** Start Code for Month *************** -->
    <?php
    $todayMM = date(n) - 1;
    $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13

    if ($releaseDateMM >= 0 && $releaseDateMM != NULL) {
        $releaseDateMM = $releaseDateMM - 1;
        $optMonth[$releaseDateMM] = "selected";
    } else {
        $optMonth[$todayMM] = "selected";
    }
    ?> 
    <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
    <div class="selectStyledBorderLess background_transparent floatLeft">
        <select id="DMDOBMonth" name="DMDOBMonth" 
                onchange="changeLoanUpdateDate('<?php echo $documentRoot; ?>', document.getElementById('DMDOBDay').value, this.value, document.getElementById('DMDOBYear').value, document.getElementById('loanDepositPrinAmount').value, document.getElementById('loanDepositIntAmount').value, document.getElementById('selTROI'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviNewDOBStr; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value);"
                onkeydown="javascript: if (event.keyCode == 13) {
                            document.getElementById('DMDOBYear').focus();
                            return false;
                        }
                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                        gbMonth = document.getElementById('gbMonthId').value;
                        if (gbMonth == 1) {
                            if (event.keyCode) {
                                var sel = String.fromCharCode(event.keyCode);
                                if (sel == 0)
                                {
                                    this.value = arrMonths[9];
                                } else if (sel == 1)
                                {
                                    this.value = arrMonths[10];
                                } else if (sel == 2)
                                {
                                    this.value = arrMonths[11];
                                }
                                // this.value = arrMonths[10];
                                document.getElementById('gbMonthId').value = 0;
                            }
                        } else if (event.keyCode) {
                            var sel = String.fromCharCode(event.keyCode) - 1;
                            this.value = arrMonths[sel];
                            if (event.keyCode == 49) {
                                document.getElementById('gbMonthId').value = 1;
                            }
                        }" 
                class ="textLabel14CalibriGrey"
                ><!----Change in class @AUTHOR: SANDY18DEC13---->
            <option value="NotSelected">MONTH</option>
            <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
            $queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
            $engmonformat = mysqli_query($conn, $queryengmonformat);
            $rowengmonformat = mysqli_fetch_array($engmonformat);
            $englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
            for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                if ($englishMonthFormat == 'displayinnumber') {
                    $engMonth = date('m', strtotime($arrMonths[$mm]));
                    echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                } else {
                    echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
            }
            ?>
        </select> 
    </div>

    <!-- *************** Start Code for Year *************** -->
    <?php
    $todayYear = date(Y);

    if ($releaseDateYY >= 0 && $releaseDateYY != NULL) {
        $optYear[$releaseDateYY] = "selected";
    } else {
        $optYear[$todayYear] = "selected";
    }
    ?> 
    <div class="selectStyledBorderLess background_transparent floatLeft">
        <select id="DMDOBYear" name="DMDOBYear"
                onchange="changeLoanUpdateDate('<?php echo $documentRoot; ?>', document.getElementById('DMDOBDay').value, document.getElementById('DMDOBMonth').value, this.value, document.getElementById('loanDepositPrinAmount').value, document.getElementById('loanDepositIntAmount').value, document.getElementById('selTROI'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $girviNewDOBStr; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>', document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value);"
                onkeydown="javascript: if (event.keyCode == 13) {
                            document.getElementById('girviFirmId').focus();
                            return false;
                        }" class ="textLabel14CalibriGrey"><!----Change in class @AUTHOR: SANDY18DEC13---->
            <option value="NotSelected">YEAR</option>
            <?php
            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
            }
            ?>
        </select>
    </div>
</td>
