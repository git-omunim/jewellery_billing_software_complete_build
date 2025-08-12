<?php
/*
 * **************************************************************************************
 * @tutorial: Sell report Date File
 * **************************************************************************************
 * 
 * Created on Mar 1, 2013 12:37:47 PM
 *
 * @FileName: orsrdate.php
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
$todayDay = date("j", strtotime($todayDate)) - 1;
$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
$optDay[$todayDay] = "selected";
?> 
<select id="sellDayDD" name="sellDayDD" class="lgn-txtfield12-arial"
        onkeydown="javascript: if (event.keyCode == 13) {
                    document.getElementById('sellMonthM').focus();
                    return false;
                }" 
        onchange="javascript:searchSellPurchaseByDate('<?php echo $panelName; ?>', document.getElementById('sellDayDD').value, document.getElementById('sellMonthM').value, document.getElementById('sellYearY').value);">>
    <option value="NotSelected">DAY</option>
    <?php
    for ($dd = 0; $dd <= 30; $dd++) {
        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
    }
    ?>
</select>
<?php
$todayMM = date("n", strtotime($todayDate)) - 1;
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
$optMonth[$todayMM] = "selected";
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
<select id="sellMonthM" name="sellMonthM" class="lgn-txtfield12-arial"
        onkeydown="javascript: if (event.keyCode == 13) {
                    document.getElementById('sellYearY').focus();
                    return false;
                } else if (event.keyCode == 8) {
                    document.getElementById('sellDayDD').focus();
                    return false;
                }" onchange="javascript:searchSellPurchaseByDate('<?php echo $panelName; ?>', document.getElementById('sellDayDD').value, document.getElementById('sellMonthM').value, document.getElementById('sellYearY').value)";>
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
////*********************************************************************************************************************************                             
    for ($mm = 3; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
        if ($englishMonthFormat == 'displayinnumber') {
            $billMonth = date('m', strtotime($arrMonths[$mm]));
            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
        } else {
            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
        }
    }
    for ($mm = 0; $mm <= 2; $mm++) {

        if ($englishMonthFormat == 'displayinnumber') {
            $billMonth = date('m', strtotime($arrMonths[$mm]));
            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
        } else {
            echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
        }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
    }
    ?>
</select> 
<?php
$todayYear = date("Y", strtotime($todayDate));
$todayMainYear = date(Y);
$todayMainMM = date(n);
$todayMM = $todayMM + 1;
if ($todayMainMM <= 3) {
    if ($todayMM <= 3) {
        $finStartYear = $todayYear - 1;
        $finEndYear = $todayYear;
    } else {
        $finStartYear = $todayYear;
        $finEndYear = $todayYear - 1;
    }
} else {
    if ($todayMM <= 3) {
        $finStartYear = $todayYear;
        $finEndYear = $todayYear + 1;
    } else {
        $finStartYear = $todayYear;
        $finEndYear = $todayYear;
    }
}
//echo '$finYear:' . $finYear;
$optYear[$todayYear] = "selected";
?> 
<select id="sellYearY" name="sellYearY" class="lgn-txtfield12-arial" 
        onkeydown="javascript:  //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
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
                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                }"
        onchange="javascript:searchSellPurchaseByDate('<?php echo $panelName; ?>', document.getElementById('sellDayDD').value, document.getElementById('sellMonthM').value, document.getElementById('sellYearY').value);">
    <option value="NotSelected">YEAR</option>
    <?php
    if ($todayMainMM <= 3) {
        for ($yy = $todayMainYear; $yy >= 1980; $yy--) {
            $ly = $yy - 1; //TO get previous year
            echo "<option value=\"$yy\" $optYear[$yy]>$ly - $yy</option>";
        }
    } else {
        for ($yy = $todayMainYear; $yy >= 1980; $yy--) {
            $ny = $yy + 1; //TO get previous year
            echo "<option value=\"$yy\" $optYear[$yy]>$yy - $ny</option>";
        }
    }
    ?>
</select>
<?php
$todayDate = $todayDay + 1 . '-' . $todayMM . '-' . $finEndYear;
$todayDate = date("d M Y", strtotime($todayDate));
?>
