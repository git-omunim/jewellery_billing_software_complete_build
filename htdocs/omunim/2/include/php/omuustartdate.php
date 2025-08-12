<?php
/*
 * **************************************************************************************
 * @tutorial: Udhaar Date File
 * **************************************************************************************
 * 
 * Created on Jun 22, 2013 4:07:37 PM
 *
 * @FileName: omuustartdate.php
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
<!-- *************** Start Code for DOBDay *************** -->
<?php
$todayDay = $selDOBDay;
//
$arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
//$optDay[$todayDay] = "selected";
// 
// ADDED ONCLICK FUNCTION FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
//
?> 
<div class="selectStyledBorderLess floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="DOBDay<?php echo $udCounter ?>" name="DOBDay" class="select_border_red" style="width:100%;height:30px;"
    <?php if ($datePanelName == 'udhaarDepositPanel' && $udhaarIntChk == 'true') { ?>
                onchange="showUdhaarDepositMoneyInterestChangeDiv('<?php echo $custId; ?>', '<?php echo $udhaarId; ?>','<?php echo $udCounter ?>',
                                this.value,
                                document.getElementById('DOBMonth<?php echo $udCounter ?>').value,
                                document.getElementById('DOBYear<?php echo $udCounter ?>').value);"
            <?php } ?>          
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('DOBMonth').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('udhaarMainAmount').focus();
                        return false;
                    }"
            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                disabled
            <?php } ?>        
            >
        <option value="NotSelected">DAY</option>
        <?php
        for ($dd = 0; $dd <= 30; $dd++) {
            if ($changeCounter == $udCounter) {
              if($selDOBDay == $arrDays[$dd])
              {
               $daySelected="selected";   
              }else{
               $daySelected="";  
              }
            }else{
                if($todayDay == $arrDays[$dd])
              {
                 $daySelected="selected"; 
              }else{
                 $daySelected="";   
              }
            }
            echo "<option value=\"$arrDays[$dd]\" $daySelected $optDay[$dd]>$arrDays[$dd]</option>";
              }
        ?>
    </select> 
    <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
        <input id="DOBDay<?php echo $udCounter ?>" name="DOBDay" type="hidden" value="<?php echo $selDOBDay; ?>"/>
    <?php } ?>
</div>
<!-- *************** Start Code for Month *************** -->
<?php
//$todayMM = date(n) - 1;
$arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
$optMonth[$todayMM] = "selected";
// 
// ADDED ONCLICK FUNCTION FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
//
?> 
<input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
<div class="selectStyledBorderLess background_transparent floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="DOBMonth<?php echo $udCounter ?>" name="DOBMonth" class="select_border_red" style="width:100%;height:30px;"
    <?php if ($datePanelName == 'udhaarDepositPanel' && $udhaarIntChk == 'true') { ?>
                onchange="showUdhaarDepositMoneyInterestChangeDiv('<?php echo $custId; ?>', '<?php echo $udhaarId; ?>','<?php echo $udCounter ?>',
                                document.getElementById('DOBDay<?php echo $udCounter ?>').value,
                                this.value,
                                document.getElementById('DOBYear<?php echo $udCounter ?>').value);"
            <?php } ?>
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

            <?php  
            /*        
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('DOBYear').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('DOBDay').focus();
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
                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13 " */?>
            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                disabled
            <?php } ?>        
            >
        <option value="NotSelected" disabled hidden>MON</option>
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
            if ($changeCounter == $udCounter) {
              if($selDOBMnth == $arrMonths[$mm])
              {
               $monthSelected="selected";   
              }else{
               $monthSelected="";  
              }
            }else{
                if($todayMM == $arrMonths[$mm])
              {
                 $monthSelected="selected"; 
              }else{
                 $monthSelected="";   
              }
            }
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
            if ($englishMonthFormat == 'displayinnumber') {
                $engMonth = date('m', strtotime($arrMonths[$mm]));
                echo "<option value=\"$arrMonths[$mm]\" $monthSelected $optMonth[$mm]>$engMonth</option>";
            } else {
                echo "<option value=\"$arrMonths[$mm]\" $monthSelected $optMonth[$mm]>$arrMonths[$mm]</option>";
            }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
        }
        $monthSelected ='';
        unset($optMonth);
        ?>
    </select> 
    <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) {
        ?>
        <input id="DOBMonth<?php echo $udCounter ?>" name="DOBMonth" type="hidden" value="<?php echo $selDOBMnth; ?>"/>
    <?php } ?>
</div>
<!-- *************** Start Code for Year *************** -->
<?php
$todayYear = date(Y); //chnaged @Author:PRIYA30APR14
$optYear[$selDOBYear] = "selected";
// 
// ADDED ONCLICK FUNCTION FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
//
?> 
<div class="selectStyledBorderLess background_transparent floatLeft" style="background:#fff;width:33.33%;height:30px;">
    <select id="DOBYear<?php echo $udCounter ?>" name="DOBYear" class="select_border_red" style="width:100%;height:30px;"
    <?php if ($datePanelName == 'udhaarDepositPanel' && $udhaarIntChk == 'true') { ?>
                onchange="showUdhaarDepositMoneyInterestChangeDiv('<?php echo $custId; ?>', '<?php echo $udhaarId; ?>','<?php echo $udCounter ?>',
                                document.getElementById('DOBDay<?php echo $udCounter ?>').value,
                                document.getElementById('DOBMonth<?php echo $udCounter ?>').value,
                                this.value);"
            <?php } ?>
            onkeydown="javascript: if (event.keyCode == 13) {
                        document.getElementById('udhharFirmId').focus();
                        return false;
                    } else if (event.keyCode == 8) {
                        document.getElementById('DOBMonth').focus();
                        return false;
                    }"
            <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                disabled
            <?php } ?>        
            >
        <option value="NotSelected">YEAR</option>
        <?php
        for ($yy = $todayYear; $yy >= 1900; $yy--) {
            if ($changeCounter == $udCounter) {
              if($selDOBYear == $yy)
              {
               $yearSelected="selected";   
              }else{
               $yearSelected="";  
              }
            }else{
                if($selDOBYear == $yy)
              {
                 $yearSelected="selected"; 
              }else{
                 $yearSelected="";   
              }
            }
            echo "<option value=\"$yy\" $yearSelected>$yy</option>";
        }
        ?>
    </select>
    <?php if (($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
        <input id="DOBYear<?php echo $udCounter ?>" name="DOBYear" type="hidden" value="<?php echo $selDOBYear; ?>"/>
    <?php } ?>
</div>