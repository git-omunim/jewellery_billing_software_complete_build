<?php
/*
 * **************************************************************************************************
 * @Description: RFID TALLY REPORT PANEL - TO DATE FILE @Author-YUVRAJ-17112022
 * **************************************************************************************************
 *
 * Created on JULY 18, 2020 02:15:58 PM 
 * **************************************************************************************
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omstocrpttodateTally.php
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
$todayToDay = date("j", strtotime($toDate)) - 1;
//
$arrToDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                   '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                   '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
//
$optToDay[$todayToDay] = "selected";
//
?> 
<div class="floatLeft" style="width:30%;">
    <select id="ToDateDay" name="ToDateDay" 
            class="form-control-select-borderless" title="Select Day!"
            onkeydown="javascript: 
                       if (event.keyCode == 13) { 
                           document.getElementById('ToDateMonth').focus();  
                           return false; 
                       } else if (event.keyCode == 8) { 
                           document.getElementById('<?php echo $Day; ?>').focus(); 
                           return false; 
                       }">
        <option value="NotSelected" class="textLabel14CalibriGrey">DAY</option>
        <?php
        for ($d = 0; $d <= 30; $d++) {
            echo "<option value=\"$arrToDays[$d]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToDay[$d]>$arrToDays[$d]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Day @Author-YUVRAJ-17112022 ?>
<?php
//
// Start Code for Month @Author-YUVRAJ-17112022
$todayToMM = date("n", strtotime($toDate)) - 1;
//
$arrToMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); 
//
$arrMM = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
//
$optToMonth[$todayToMM] = "selected";
//
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />
<div class="floatLeft" style="width:30%;">
    <select id="ToDateMonth" name="ToDateMonth" 
            class="form-control-select-borderless" title="Select Month!"
            onkeydown="javascript:  
            if (event.keyCode == 13) { 
                document.getElementById('ToDateYear').focus();  
                return false; 
            } else if (event.keyCode == 8) {  
                document.getElementById('ToDateDay').focus(); 
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
                }" >
        <option value="NotSelected" class="textLabel14CalibriGrey">MON</option>
        <?php
        for ($m = 0; $m <= 11; $m++) {
            echo "<option value=\"$arrMM[$m]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToMonth[$m]>$arrToMonths[$m]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Month @Author-YUVRAJ-17112022 ?>
<?php
//
// Start Code for Year @Author-YUVRAJ-17112022
$todayToMaxYY = date("Y", strtotime(date("Y-m-d")));
//
$todayToYear = date("Y", strtotime($toDate));
//
$optToYear[$todayToYear] = "selected";
//
?> 
<div class="floatLeft" style="width:30%;">
    <select id="ToDateYear" name="ToDateYear" 
            class="form-control-select-borderless" title="Select Year!"
            onkeydown="javascript: 
            if (event.keyCode == 13) { 
                document.getElementById('goButton').focus();  
                return false; 
            } else if (event.keyCode == 8) {  
                document.getElementById('ToDateMonth').focus(); 
                return false; 
            }" >
        <option value="NotSelected" class="textLabel14CalibriGrey">YEAR</option>
        <?php
        for ($y = $todayToMaxYY; $y >= 1900; $y--) {
            echo "<option value=\"$y\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToYear[$y]>$y</option>";
        }
        ?>
    </select>
</div>
<?php // End Code for Year @Author-YUVRAJ-17112022 ?>
