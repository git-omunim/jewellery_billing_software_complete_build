<?php /**
 * 
 * //for selecting date to transfer principal in  add new panel @AUTHOR: SANDY12DEC13
 * 
 * Created on NOV 13, 2013 7:33:17 PM
 *
 * @FileName: ormlprdt.php
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
//changes in class @AUTHOR: SANDY19DEC13
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
require_once 'system/omssopin.php';
?>
<!-- *************** Start Code for dayDD *************** -->
<?php
$todayDay = date(j) - 1;
$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
$optDay[$todayDay] = "selected";
?> 
<table>
    <tr>
        <td class="textBoxCurve1px  textLabel14Calibri backFFFFFF">
            <div class="selectStyledBorderLess background_transparent floatLeft" >
                <select id="prinTransDOBDay<?php echo $count; ?>" name="prinTransDOBDay<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('prinTransDOBMonth' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('selROI' +<?php echo $count; ?>).focus();
                                    return false;
                                }"
                        class ="textLabel14CalibriGrey">
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
            $todayMM = date("n") - 1;
            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
            $optMonth[$todayMM] = "selected";
            ?> 
            <input  id="gbMonthId<?php echo $count; ?>" name="gbMonthId<?php echo $count; ?>" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
            <div class="selectStyledBorderLess background_transparent floatLeft">
                <select id="prinTransDOBMonth<?php echo $count; ?>" name="prinTransDOBMonth<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('prinTransDOBYear' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('prinTransDOBDay' +<?php echo $count; ?>).focus();
                                    return false;
                                }
                                //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                gbMonth = document.getElementById('gbMonthId' +<?php echo $count; ?>).value;
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
                                        document.getElementById('gbMonthId' +<?php echo $count; ?>).value = 0;
                                    }
                                } else if (event.keyCode) {
                                    var sel = String.fromCharCode(event.keyCode) - 1;
                                    this.value = arrMonths[sel];
                                    if (event.keyCode == 49) {
                                        document.getElementById('gbMonthId' +<?php echo $count; ?>).value = 1;
                                    }
                                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13"
                        class ="textLabel14CalibriGrey">
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
                </select> </div>

            <!-- *************** Start Code for Year *************** -->
            <?php
            $todayYear = date("Y");
            $optYear[$todayYear] = "selected";
            ?> 
            <div class="selectStyledBorderLess background_transparent floatLeft">
                <select id="prinTransDOBYear<?php echo $count; ?>" name="prinTransDOBYear<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('prinTransFirm' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('prinTransDOBMonth' +<?php echo $count; ?>).focus();
                                    return false;
                                }"
                        class ="textLabel14CalibriGrey">
                    <option value="NotSelected">YEAR</option>
                    <?php
                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                    }
                    ?>
                </select>
            </div>
        </td>
    </tr>
</table>

