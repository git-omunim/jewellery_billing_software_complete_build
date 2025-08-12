<?php /**
 * 
 * //for selecting date in money lender add new panel @AUTHOR: SANDY15NOV13
 * 
 * Created on NOV 13, 2013 7:33:17 PM
 *
 * @FileName: ormldate.php
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
//change in file @AUTHOR: SANDY11JAN14
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
<!--Start code to change code @Author:SHRI16MAY15-->
<table>
    <tr>
        <td class="textBoxCurve1px textLabel14Calibri backFFFFFF" >
            <div class="selectStyledBorderLess background_transparent floatLeft">
                <select id="mlAddLnDOBDay<?php echo $count; ?>" name="mlAddLnDOBDay<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('mlAddLnDOBMonth' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('mlFirm' +<?php echo $count; ?>).focus();
                                    return false;
                                }"
                        class ="textLabel14CalibriGrey" style="width: 40px;">
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
                <select id="mlAddLnDOBMonth<?php echo $count; ?>" name="mlAddLnDOBMonth<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('mlAddLnDOBYear' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('mlAddLnDOBDay' +<?php echo $count; ?>).focus();
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
                        class ="textLabel14CalibriGrey" style="width: 55px">
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
                <select id="mlAddLnDOBYear<?php echo $count; ?>" name="mlAddLnDOBYear<?php echo $count; ?>" 
                        onkeydown="javascript: if (event.keyCode == 13) {
                                    document.getElementById('moreLoanCloseDiv' +<?php echo $count; ?>).focus();
                                    return false;
                                } else if (event.keyCode == 8) {
                                    document.getElementById('mlAddLnDOBMonth' +<?php echo $count; ?>).focus();
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
<!--End code to change code @Author:SHRI16MAY15-->