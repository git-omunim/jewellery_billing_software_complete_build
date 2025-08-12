<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Feb 29, 2020 10:09:46 PM
 *
 * @FileName:omsalarydate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.o
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
<!--<div id="salaryslip">-->
<?php
$current_date = date("d-m-yy");
$todayDate = $current_date;
//echo "**".$current_month.'</br>';
$current_monthW = $current_month;
//echo '$current_monthW'.$current_monthW;
$current_month = date("m",  strtotime($current_month));
if($current_month == 01){
$todayMM = date("n", strtotime($todayDate)) - 1;
}  else {
    $todayMM = ltrim($current_month,0) - 1;
}
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
$arrMM = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
$optMonth[$todayMM] = "selected";
//echo '$todayMM'.$todayMM;
//$current_monthW = date("M",  strtotime($todayMM));
//echo "##".$current_month.'</br>';
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
<select id="journalEntryMonth" name="journalEntryMonth" class="select_border_grey" style="width: 50px;" onchange="getdate(this.value,'','<?php echo $staffId; ?>');" 
        onkeydown="javascript: if(event.keyCode == 13){document.getElementById('journalEntryYYYY').focus(); return false;}else if(event.keyCode == 8){document.getElementById('journalEntryDayDD').focus(); return false;}
            //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
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
                    // this.value = arrMonths[10];
                    document.getElementById('gbMonthId').value = 0;
                } }
            else if(event.keyCode){
                var sel=String.fromCharCode(event.keyCode)-1;
                this.value = arrMonths[sel];
                if(event.keyCode==49){
                    document.getElementById('gbMonthId').value = 1;}
            } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13">>
    <option value="NotSelected" class="itemAddPnLabels12" style="width: 10px;">MONTH</option>
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

if($current_year == ''){
$todayYear = date("Y", strtotime($todayDate));
}  else {
    $todayYear = $current_year;
}
$optYear[$todayYear] = "selected";
?> 
<select id="journalEntryYYYY" name="journalEntryYYYY" class="select_border_grey" style="width: 70px;" onchange="getdate('',this.value,'<?php echo $staffId; ?>');">
    <option value="NotSelected" class="itemAddPnLabels12">YEAR</option>
    <?php
//CHANGES IN YEAR FORMAT @author: SANDY6AUG13
    for ($yy = $todayMaxYY; $yy >= 1900; $yy--) {
        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
    }
    ?>
</select>
<!--</div>-->