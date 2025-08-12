<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Date File
 * **************************************************************************************
 * 
 * Created on Jun 22, 2013 4:07:37 PM
 *
 * @FileName: omuuenddate.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:14/1/15
 *  AUTHOR:ATHULYA
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
?>
<!-- *************** Start Code for DOBDay *************** -->
<?php

$todayendDay = $selendDOBDay - 1;

$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
$optendDay[$todayendDay] = "selected";
?> 
<div class="selectStyledBorderLess background_transparent floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="endDOBDay" name="endDOBDay" class="select_border_red" style="width:100%;height:30px;"
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('endDOBMonth').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('udhaarMainAmount').focus();
                        return false;
                    }">
        <option value="NotSelected">DAY</option>
        <?php
        for ($dd = 0; $dd <= 30; $dd++) {
            echo "<option value=\"$arrDays[$dd]\" $optendDay[$dd]>$arrDays[$dd]</option>";
        }
        ?>
    </select> 
</div>
<!-- *************** Start Code for Month *************** -->
<?php
//$todayMM = date(n) - 1;
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
$optendMonth[$todayendMM] = "selected";
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
<div class="selectStyledBorderLess background_transparent floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="endDOBMonth" name="endDOBMonth" class="select_border_red" style="width:100%;height:30px;"

                  onkeydown="javascript: 
                    var key = event.keyCode || event.which;
                    if (key === 13) {
                        document.getElementById('DOBYear').focus();
                        return false;
                    } else if (key === 8) {
                        document.getElementById('DOBDay').focus();
                        return false;
                    } else if (key === 9) {
                        return true; // allow TAB key without interference
                    } else if (key >= 65 && key <= 90) {
                        return true; // allow letters like J, F, M to auto-jump in select
                    }
                
                    // Number key month shortcuts
                    var arrMonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                    var gbMonth = document.getElementById('gbMonthId').value;
                    if (gbMonth == 1) {
                        if (key >= 48 && key <= 57) {
                            var sel = String.fromCharCode(key);
                            if (sel == 0) this.value = arrMonths[9];
                            else if (sel == 1) this.value = arrMonths[10];
                            else if (sel == 2) this.value = arrMonths[11];
                            document.getElementById('gbMonthId').value = 0;
                        }
                    } else if (key >= 49 && key <= 57) {
                        this.value = arrMonths[key - 49];
                        if (key == 49) {
                            document.getElementById('gbMonthId').value = 1;
                        }
                    }
                    return false;"
    <?php /*
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('endDOBYear').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('endDOBDay').focus();
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
                            }
                            else if (sel == 1)
                            {
                                this.value = arrMonths[10];
                            }
                            else if (sel == 2)
                            {
                                this.value = arrMonths[11];
                            }
                            // this.value = arrMonths[10];
                            document.getElementById('gbMonthId').value = 0;
                        }
                    }
                    else if (event.keyCode) {
                        var sel = String.fromCharCode(event.keyCode) - 1;
                        this.value = arrMonths[sel];
                        if (event.keyCode == 49) {
                            document.getElementById('gbMonthId').value = 1;
                        }
                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13"  */?>>
        <option value="NotSelected" disabled hidden>MON</option>
        <?php
        for ($mm = 0; $mm <= 11; $mm++) {
            echo "<option value=\"$arrMonths[$mm]\" $optendMonth[$mm]>$arrMonths[$mm]</option>";
        }
        ?>
    </select> 
</div>
<!-- *************** Start Code for Year *************** -->
<?php
$todayendYear = date(Y);//chnaged @Author:PRIYA30APR14
$optendYear[$selendDOBYear] = "selected";
?> 
<div class="selectStyledBorderLess background_transparent floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="endDOBYear" name="endDOBYear" class="select_border_red" style="width:100%;height:30px;"
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('udhharFirmId').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('endDOBMonth').focus();
                        return false;
                    }">
        <option value="NotSelected">YEAR</option>
        <?php
        for ($yy = $todayendYear+10; $yy >= 1900; $yy--) {
            echo "<option value=\"$yy\" $optendYear[$yy]>$yy</option>";
        }
        ?>
    </select>
</div><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

