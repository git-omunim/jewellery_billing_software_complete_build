<?php
/*
 * **************************************************************************************************
 * @Description: RFID TALLY REPORT PANEL - FROM DATE FILE @Author-YUVRAJ-17112022
 * **************************************************************************************************
 *
 * Created on JULY 18, 2020 02:00:58 PM 
 * **************************************************************************************
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omstocrptfromdateTally.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.9
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:17112022
 *  AUTHOR: YUVRAJ
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.9
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<?php
//
// Start Code for Day @Author-YUVRAJ-17112022
$todayDay = date("j", strtotime($date)) - 1;
//
$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                 '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                 '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
//
$optDay[$todayDay] = "selected";
//
?> 
<div class="floatLeft" style="width:30%;">
<div class="floatLeft" style="width:100%;">
    <input tyep="hidden=" id="ToDateDay" name="ToDateDay" style="width:30%;float:left;display:none;">
</div>
    <select id="<?php echo $Day; ?>" name="<?php echo $Day; ?>" 
            class="form-control-select-borderless" title="Select Day!"
            onkeydown="javascript: 
            if (event.keyCode == 13) { 
                document.getElementById('<?php echo $Month; ?>').focus();  
                return false; 
            } else if (event.keyCode == 8) { 
                document.getElementById('FirmName').focus();  
                return false; 
            }" 
            onchange="javascript: document.getElementById('ToDateDay').value = this.value;">
        <option value="NotSelected" class="textLabel14CalibriGrey">DAY</option>
        <?php
        for ($dd = 0; $dd <= 30; $dd++) {
            echo "<option value=\"$arrDays[$dd]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optDay[$dd]>$arrDays[$dd]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Day @Author-YUVRAJ-17112022 ?>
<?php
//
// Start Code for Month @Author-YUVRAJ-17112022
if ($panelName == 'FromPanel') {
    $todayMM = date("n", strtotime($fromDate)) - 1;
} else {
    $todayMM = date("n", strtotime($toDate)) - 1;
}
//
$todayMM = date("n", strtotime($date)) - 1;
//
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); 
//
$arrMM = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
//
$optMonth[$todayMM] = "selected";
//
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
<div class="floatLeft" style="width:30%;">
<div class="floatLeft" style="width:100%;">
    <input tyep="hidden=" id="ToDateMonth" name="ToDateMonth" style="width:30%;float:left;display:none;">
</div>
    <select id="<?php echo $Month; ?>" name="<?php echo $Month; ?>" 
            class="form-control-select-borderless" title="Select Month!"
            onkeydown="javascript: 
            if (event.keyCode == 13) { 
                document.getElementById('<?php echo $Year; ?>').focus();  
                return false; 
            } else if (event.keyCode == 8) {  
                document.getElementById('<?php echo $Day; ?>').focus(); 
                return false; 
            }
                var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                gbMonth = document.getElementById('gbMonthId').value;
                if(gbMonth==1){
                    if(event.keyCode){
                        var sel=String.fromCharCode(event.keyCode);
                        if(sel==0)
                        {
                            this.value = arrMonths[9];
                        }
                        else if(sel==1)
                        {
                            this.value = arrMonths[10];
                        }
                        else if(sel==2)
                        {
                            this.value = arrMonths[11]; 
                        }
                        document.getElementById('gbMonthId').value = 0;
                    } 
                }
                else if(event.keyCode){
                    var sel=String.fromCharCode(event.keyCode)-1;
                    this.value = arrMonths[sel];
                    if(event.keyCode==49){
                       document.getElementById('gbMonthId').value = 1;
                   }
                }" 
                 onchange="javascript: document.getElementById('ToDateMonth').value = this.value;">
        <option value="NotSelected" class="textLabel14CalibriGrey">MON</option>
        <?php
        for ($mm = 0; $mm <= 11; $mm++) {
            echo "<option value=\"$arrMM[$mm]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optMonth[$mm]>$arrMonths[$mm]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Month @Author-YUVRAJ-17112022 ?>
<?php
//
// Start Code for Year @Author-YUVRAJ-17112022
$todayMaxYY = date("Y", strtotime(date("Y-m-d")));
//
$todayYear = date("Y", strtotime($date));
//
$optYear[$todayYear] = "selected";
//
?> 
<div class="floatLeft" style="width:30%;">
<div class="floatLeft" style="width:100%;">
    <input tyep="hidden=" id="ToDateYear" name="ToDateYear" style="width:30%;float:left;display:none;">
</div>
    <select id="<?php echo $Year; ?>" name="<?php echo $Year; ?>" 
            class="form-control-select-borderless" title="Select Year!"
            onkeydown="javascript: 
            if (event.keyCode == 13) { 
                document.getElementById('ToDateDay').focus();  
                return false; 
            } else if (event.keyCode == 8) {  
                document.getElementById('FromMonth').focus(); 
                return false; 
            }" 
            onchange="javascript: document.getElementById('ToDateYear').value = this.value;">
        <option value="NotSelected" class="textLabel14CalibriGrey">YEAR</option>
        <?php
        for ($yy = $todayMaxYY; $yy >= 1900; $yy--) {
            echo "<option value=\"$yy\" " . " class=" . "\"ff_calibri fs_14\"" . " $optYear[$yy]>$yy</option>";
        }
        ?>
    </select>
</div>
<?php // End Code for Year @Author-YUVRAJ-17112022 ?>