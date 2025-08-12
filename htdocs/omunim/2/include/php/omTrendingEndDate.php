<?php
/*
 * **************************************************************************************
 * @tutorial: TRENDING PRODUCT END DATE
 * **************************************************************************************
 * 
 * Created on May 5, 2019 15:28:47 PM
 *
 * @FileName: omBoxPresentDate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: 04012023
 *  AUTHOR: YUVRAJ 
 *  REASON:
 *
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
/** Start code to set DAY in day field of date to show whole mnth jrnl entries @AUTHOR: SANDY20AUG13* */

if (strlen($todayDateEnd) < 10) {
    $todayDay = 32;
} else {
    $todayDay = date("j", strtotime($todayDateEnd)) - 1;
}
/* * End code to set DAY in day field of date to show whole mnth jrnl entries @AUTHOR: SANDY20AUG13 * */
$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
$optDay[$todayDay] = "selected";
?> 
<select id="TrendEndDayDD" name="TrendEndDayDD" class="lgn-txtfield12-arial"
        onkeydown="javascript: if (event.keyCode == 13) {
                    document.getElementById('TrendEndMonth').focus();
                    return false;
                }">>
    <option value="NotSelected" class="itemAddPnLabels12">DAY</option>
    <?php
    for ($dd = 0; $dd <= 30; $dd++) {
        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
    }
    ?>
</select> 
<!-- *************** Start Code for Month*************** -->
<?php
$todayMM = date("n", strtotime($todayDateEnd)) - 1;
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
$arrMM = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
$optMonth[$todayMM] = "selected";
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
<select id="TrendEndMonth" name="TrendEndMonth" class="lgn-txtfield12-arial"
        onkeydown="javascript: if (event.keyCode == 13) {
                    document.getElementById('TrendEndYYYY').focus();
                    return false;
                } else if (event.keyCode == 8) {
                    document.getElementById('TrendEndDayDD').focus();
                    return false;
                }
                //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
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
                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13">>
    <option value="NotSelected" class="itemAddPnLabels12">MONTH</option>
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
<!-- *************** Start Code for Year *************** -->
<?php
$todayMaxYY = date("Y", strtotime(date("Y-m-d")));
$todayYear = date("Y", strtotime($todayDateEnd));
$optYear[$todayYear] = "selected";
?> 
<select id="TrendEndYYYY" name="TrendEndYYYY" class="lgn-txtfield12-arial">
    <option value="NotSelected" class="itemAddPnLabels12">YEAR</option>
    <?php
//CHANGES IN YEAR FORMAT @author: SANDY6AUG13
    for ($yy = $todayMaxYY; $yy >= 1900; $yy--) {
        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
    }
    ?>
</select>


