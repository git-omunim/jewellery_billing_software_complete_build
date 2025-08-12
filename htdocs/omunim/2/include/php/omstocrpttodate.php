<?php
/*
 * **************************************************************************************************
 * @Description: STOCK REPORT LEDGER PANEL - TO DATE FILE @Author-PRIYANKA-18JULY2020
 * **************************************************************************************************
 *
 * Created on JULY 18, 2020 02:15:58 PM 
 * **************************************************************************************
 * @FileName: ommnstocrpttodate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMRETAIL 
 * @version 2.7.9
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:18JULY2020
 *  AUTHOR: PRIYANKA
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
if($nepaliDate == 'YES'){
    if ($date_nepali == '') {
    $year_en = date("Y", time());
    $month_en = date("m", time());
    $day_en = date("d", time());
    $date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);
    $selDOBDay = $date_ne['d'];
    $todayMM = $date_ne['m'] - 1;
    $selDOBYear = $date_ne['y'];
} else {
    $date_ne = explode('-', $FromDate);
    $selDOBDay = $date_ne[0];
     $todayMM = $date_ne[1];
     if(!is_numeric($todayMM)){
          $todayMM = $nepali_date->get_nepali_month_number($todayMM);
     }
    $todayMM = $todayMM - 1;
    $selDOBYear = $date_ne[2];
}
    ?>
<table align="<?php
if ($tableAlignStyle != '') {
    echo $tableAlignStyle;
} else {
    echo 'center';
}
?>" border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td class="padLeft3">
            <?php
            $todayDay = $selDOBDay - 1;
            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32');
            $optDay[$todayDay] = "selected";
            ?> 
          <select id="ToDateDay" name="ToDateDay" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                document.getElementById('addItemDOBFromMonth').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                return false;
                            }"
                    class="form-control text-center form-control-font13" 
                    <?php if ($selDayStyle != '') { ?>
                        style="<?php echo $selDayStyle; ?>"
                    <?php } ?>>
                <option value="NotSelected">DAY</option>
                <?php
                for ($dd = 0; $dd <= 31; $dd++) {
                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                }
                ?>
                <?php unset($optDay); ?>
            </select> 
        </td>
        <td class="padLeft3">
            <?php
            if ($nepaliDateMonthFormat == 'displayInNumber') {
                $arrMonths = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
            } else {
                $arrMonths = array('ब‌ैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मङ्सिर', 'पुस', 'माघ', 'फाल्गुण', 'चैत');
            }
            $optMonth[$todayMM] = "selected";
            ?> 
            <input  id="gbMonth" name="gbMonth" type="hidden" value="0" /> 
           <select id="ToDateMonth" name="ToDateMonth" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                document.getElementById('addItemDOBFromYear').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('addItemDOBFromDay').focus();
                                return false;
                            }
                    <?php if ($nepaliDateMonthFormat == 'displayInNumber') { ?>
                                var arrMonths = new Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
                    <?php } else { ?>
                                var arrMonths = new Array('ब‌ैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मङ्सिर', 'पुस', 'माघ', 'फाल्गुण', 'चैत');
                    <?php } ?>
                            gbMonth = document.getElementById('addItemDOBFromMonth').value;
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
                                    document.getElementById('addItemDOBFromMonth').value = 0;
                                }
                            } else if (event.keyCode) {
                                if (event.keyCode != 9) {
                                    var sel = String.fromCharCode(event.keyCode) - 1;
                                    this.value = arrMonths[sel];
                                    if (event.keyCode == 49) {
                                        document.getElementById('addItemDOBFromMonth').value = 1;
                                    }
                                }
                            }"
                    class="form-control text-center form-control-font13" 
                    <?php if ($selMonthStyle != '') { ?>
                        style="<?php echo $selMonthStyle; ?>"
                    <?php } ?>>
                <option value="NotSelected">MON</option>
                <?php
                for ($mm = 0; $mm <= 11; $mm++) {
                    $monthValue = $mm + 1;
                    echo "<option value=\"$monthValue\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                }
                ?>
                <?php unset($optMonth); ?>
            </select> 
        </td>
        <td class="padLeft3">
            <?php
            $year_en = date("Y", time());
            $month_en = date("m", time());
            $day_en = date("d", time());
            $date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);
            $selDOBYe = $date_ne['y'];
            $todayYear = $selDOBYe;
            $optYear[$selDOBYear] = "selected";
            ?> 
           <select id="ToDateYear" name="ToDateYear" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                document.getElementById('firmId').focus();

                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('addItemDOBFromMonth').focus();
                                return false;
                            }"
                    class="form-control text-center form-control-font13" 
                    <?php if ($selYearStyle != '') { ?>
                        style="<?php echo $selYearStyle; ?>"
                    <?php } ?>>
                <option value="NotSelected">YEAR</option>
                <?php
                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                    echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                }
                ?>
                <?php unset($optYear); ?>
            </select>
            <div id="GetInvoiceDate"></div>
        </td>
    </tr>
</table>
<?php }else{ 


// Start Code for Day @Author-PRIYANKA-18JULY2020
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
                       }" style="width:100%;height:30px;">
        <option value="NotSelected" class="textLabel14CalibriGrey">DAY</option>
        <?php
        for ($d = 0; $d <= 30; $d++) {
            echo "<option value=\"$arrToDays[$d]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToDay[$d]>$arrToDays[$d]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Day @Author-PRIYANKA-18JULY2020 ?>
<?php
//
// Start Code for Month @Author-PRIYANKA-18JULY2020
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
                }" style="width:100%;height:30px;">
        <option value="NotSelected" class="textLabel14CalibriGrey">MON</option>
        <?php
        for ($m = 0; $m <= 11; $m++) {
            echo "<option value=\"$arrMM[$m]\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToMonth[$m]>$arrToMonths[$m]</option>";
        }
        ?>
    </select> 
</div>
<?php // End Code for Month @Author-PRIYANKA-18JULY2020 ?>
<?php
//
// Start Code for Year @Author-PRIYANKA-18JULY2020
$todayToMaxYY = date("Y", strtotime(date("Y-m-d")));
//
$todayToYear = date("Y", strtotime($toDate));
//
$optToYear[$todayToYear] = "selected";
//
?> 
<div class="floatLeft" style="width:40%;">
    <select id="ToDateYear" name="ToDateYear" 
            class="form-control-select-borderless" title="Select Year!"
            onkeydown="javascript: 
            if (event.keyCode == 13) { 
                document.getElementById('goButton').focus();  
                return false; 
            } else if (event.keyCode == 8) {  
                document.getElementById('ToDateMonth').focus(); 
                return false; 
            }" style="width:100%;height:30px;">
        <option value="NotSelected" class="textLabel14CalibriGrey">YEAR</option>
        <?php
        for ($y = $todayToMaxYY; $y >= 1900; $y--) {
            echo "<option value=\"$y\" " . " class=" . "\"ff_calibri fs_14\"" . " $optToYear[$y]>$y</option>";
        }
        ?>
    </select>
</div>
<?php }// End Code for Year @Author-PRIYANKA-18JULY2020 ?>
