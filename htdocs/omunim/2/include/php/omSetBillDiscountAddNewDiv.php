<?php
/*
 * *************************************************************************************************
 * @Description: SET PRODUCT DISCOUNT FORM FILE @AUTHOR-PRIYANKA-28OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 28, 2020 04:11:00 PM 
 * *************************************************************************************************
 * @FileName: omSetBillDiscountAddNewDiv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.25
 * @version: OMUNIM 2.7.25
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-28OCT2020
 *  REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
?>
<?php
//
//
//print_r($_REQUEST);
//
//
if ($count == '' || $count == NULL)
    $count = $_REQUEST['billDiscCounter'];
//
//
if ($count == '' || $count == NULL)
    $count = 1;
//
//
if ($commonPanel == '' || $commonPanel == NULL)
    $commonPanel = $_REQUEST['commonPanel'];
//
//
// PANEL NAME
$panelName = $_REQUEST['panelName'];
//
//
// DISCOUNT ID
$discId = $_REQUEST['discId'];
//
//
if ($discId != '' && $discId != NULL) {
    //
    parse_str(getTableValues("SELECT * FROM discount WHERE disc_id = '$discId' AND "
                           . "disc_owner_id = '$sessionOwnerId' AND disc_panel_name = 'BillDiscountPanel'"));
    //
} 
//
//
//echo '$disc_id == ' . $disc_id . '<br />';
//
//
if ($disc_total_bill_amount_min == '' && $disc_total_bill_amount_max == '') {
    //
    //
    if ($disc_discount_checked == '' || $disc_discount_checked == NULL)
        $disc_discount_checked = $_REQUEST['disc_discount_checked'];
    //
    if ($disc_discount_checked == 'checked' || $disc_discount_checked == 'on')
        $disc_active = 'checked';
    //
    //
    //
    if ($disc_firm_id == '' || $disc_firm_id == NULL)
        $disc_firm_id = $_REQUEST['disc_firm_id'];
    //
    //
    //
    if ($disc_total_bill_amount_min == '' || $disc_total_bill_amount_min == NULL)
        $disc_total_bill_amount_min = $_REQUEST['disc_total_bill_amount_min'];
    //
    if ($disc_total_bill_amount_max == '' || $disc_total_bill_amount_max == NULL)
        $disc_total_bill_amount_max = $_REQUEST['disc_total_bill_amount_max'];
    //
    //
    //
    if ($disc_making_discount == '' || $disc_making_discount == NULL)
        $disc_making_discount = $_REQUEST['disc_making_discount'];
    //
    if ($disc_stone_discount == '' || $disc_stone_discount == NULL)
        $disc_stone_discount = $_REQUEST['disc_stone_discount'];
    //
    if ($disc_total_bill_amount_discount == '' || $disc_total_bill_amount_discount == NULL)
        $disc_total_bill_amount_discount = $_REQUEST['disc_total_bill_amount_discount'];
    //
    //
    //
    if ($discountDOBDay == '' || $discountDOBDay == NULL)
        $discountDOBDay = $_REQUEST['discountDOBDay'];
    //
    if ($discountDOBMonth == '' || $discountDOBMonth == NULL)
        $discountDOBMonth = $_REQUEST['discountDOBMonth'];
    //
    if ($discountDOBYear == '' || $discountDOBYear == NULL)
        $discountDOBYear = $_REQUEST['discountDOBYear'];
    //
    //
    $disc_start_date = $discountDOBDay . " " . $discountDOBMonth . " " . $discountDOBYear;
    //
    //
    //
    if ($discountEDOBDay == '' || $discountEDOBDay == NULL)
        $discountEDOBDay = $_REQUEST['discountEDOBDay'];
    //
    if ($discountEDOBMonth == '' || $discountEDOBMonth == NULL)
        $discountEDOBMonth = $_REQUEST['discountEDOBMonth'];
    //
    if ($discountEDOBYear == '' || $discountEDOBYear == NULL)
        $discountEDOBYear = $_REQUEST['discountEDOBYear'];
    //
    //
    $disc_end_date = $discountEDOBDay . " " . $discountEDOBMonth . " " . $discountEDOBYear;
    //
    //
    //
    if ($disc_product_check == '' || $disc_product_check == NULL)
        $disc_product_check = $_REQUEST['disc_product_check'];
    //
    if ($disc_discount_check == '' || $disc_discount_check == NULL)
        $disc_discount_check = $_REQUEST['disc_discount_check'];
    //
    if ($disc_discount_adjust == '' || $disc_discount_adjust == NULL)
        $disc_discount_adjust = $_REQUEST['disc_discount_adjust'];
    //
    //
}
//
//
if ($disc_start_date != '' && $disc_start_date != NULL) {
    //
    // START DATE CODE @AUTHOR-PRIYANKA-28OCT2020
    $selDOBDay = substr($disc_start_date, 0, 2);
    $selDOBMnth = substr($disc_start_date, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($disc_start_date, -4);
}
//
//echo '$disc_end_date == ' . $disc_end_date . '<br />';
//
if ($disc_end_date != '' && $disc_end_date != NULL) {
    //
    // END DATE CODE @AUTHOR-PRIYANKA-28OCT2020
    $selEDOBDay = substr($disc_end_date, 0, 2);
    $selEDOBMnth = substr($disc_end_date, 3, -5);
    $todayEMM = date("m", strtotime($selEDOBMnth)) - 1;
    $selEDOBYear = substr($disc_end_date, -4);
}
//
//echo '$disc_discount_checked == ' . $disc_discount_checked . '<br />';
//                  
?> 
<div id="billDiscount<?php echo $count; ?>" name="billDiscount<?php echo $count; ?>">
    <table border="0" cellspacing="1" cellpadding="2" width="101%" align="left">
        <tr id="billDiscountRow<?php echo $count; ?>"> 
            
        <input type="hidden" id="operation<?php echo $count; ?>" name="operation<?php echo $count; ?>" 
               value="insert"/>
        <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
        <input type="hidden" id="disc_id<?php echo $count; ?>" name="disc_id<?php echo $count; ?>" 
               value="<?php echo $disc_id; ?>"/>
        <input type="hidden" id="disc_status<?php echo $count; ?>" name="disc_status<?php echo $count; ?>"/>
        
        <input type="hidden" id="disc_panel_name<?php echo $count; ?>" name="disc_panel_name<?php echo $count; ?>" 
               value="<?php echo "BillDiscountPanel"; ?>"/>
        
        <input type="hidden" id="noOfBillDiscount" name="noOfBillDiscount" value="<?php echo $noOfBillDiscount; ?>"/>
        <input type="hidden" id="billDiscountCount" name="billDiscountCount" value="<?php echo $billDiscountCount; ?>"/>                            
        
        <input type="hidden" id="count" name="count" value="<?php echo $count; ?>"/>
        
        <input id="billDiscountDiv<?php echo $count; ?>" name="billDiscountDiv<?php echo $count; ?>" type="hidden"/>
        
        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="CHECK">
            <div class="spaceLeft5">
                <input type="checkbox" class="checkbox" style="margin-left: -5px;"
                       id="disc_discount_checked<?php echo $count; ?>" 
                       name="disc_discount_checked<?php echo $count; ?>" 
                       onclick="if (!this.checked) {
                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'unchecked';
                           } else {
                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'checked';
                           }"
                       onchange="" 
                       title="CHECK" 
                       <?php
                       echo $disc_active;
                       echo " " . $disc_active . " ";
                       ?> >
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="FIRM">                               
            <div id="addStockItemFirmDiv">
                <?php
                //
                $nextFieldId = 'disc_total_bill_amount_max' . $count;
                $prevFieldId = '';
                //
                $firmIdDivClass = 'form-control-req-height20';
                $FirmStyle = 'height: 25px;';
                //
                $firmIdSelected = $disc_firm_id;
                //
                $firmInputId = "disc_firm_id" . $count;
                //
                if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                    $firmIdSelected = $_SESSION['setFirmSession'];
                }
                //
                if (!$firmIdSelected) {
                    $firmIdSelected = $_SESSION['setFirmSession'];
                }
                //
                if ($staffId && $array['addStockAccessFirm'] != 'true') {
                    $accAccess = 'NO';
                }
                //
                include 'omDiscountFirm.php';
                //
                ?>
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="MIN BILL AMOUNT">
            <div class="spaceLeft5">
                <input id="disc_total_bill_amount_min<?php echo $count; ?>" 
                       name="disc_total_bill_amount_min<?php echo $count; ?>" 
                       type="text" placeholder="MIN AMOUNT" 
                       value="<?php echo $disc_total_bill_amount_min; ?>"
                       onblur=""
                       onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_total_bill_amount_max<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('firmId<?php echo $count; ?>').focus();
                               return false;
                           }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       onclick="this.value = '';"
                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                       size="2" maxlength="10" style="width: 208% ! important; height: 25px; margin-left: 0px;" />
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="MAX BILL AMOUNT">
            <div class="spaceLeft5">
                <input id="disc_total_bill_amount_max<?php echo $count; ?>" 
                       name="disc_total_bill_amount_max<?php echo $count; ?>" 
                       type="text" placeholder="MAX AMOUNT" 
                       value="<?php echo $disc_total_bill_amount_max; ?>"
                       onblur=""
                       onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_total_bill_amount_min<?php echo $count; ?>').focus();
                               return false;
                           }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       onclick="this.value = '';"
                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                       size="2" maxlength="10" style="width: 122% ! important; height: 25px; margin-left: 27px;" />
            </div>
        </td>    

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="MAKING DISCOUNT">
            <div class="spaceLeft5">
                <input id="disc_making_discount<?php echo $count; ?>" 
                       name="disc_making_discount<?php echo $count; ?>" 
                       type="text" placeholder="M. DISC" 
                       value="<?php echo $disc_making_discount; ?>"
                       onblur=""
                       onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_total_bill_amount_max<?php echo $count; ?>').focus();
                               return false;
                           }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       onclick="this.value = '';"
                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                       size="2" maxlength="10" style="width: 63% ! important; height: 25px; margin-left: 31px;" />
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="STONE DISCOUNT">
            <div class="spaceLeft5">
                <input id="disc_stone_discount<?php echo $count; ?>" 
                       name="disc_stone_discount<?php echo $count; ?>" 
                       type="text" placeholder="S. DISC" 
                       value="<?php echo $disc_stone_discount; ?>"
                       onblur=""
                       onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_total_bill_amount_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       onclick="this.value = '';"
                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                       size="2" maxlength="10" style="width: 136% ! important; height: 25px; margin-left: 0px;" />
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="TOTAL BILL AMOUNT DISCOUNT">
            <div class="spaceLeft5">
                <input id="disc_total_bill_amount_discount<?php echo $count; ?>" 
                       name="disc_total_bill_amount_discount<?php echo $count; ?>" 
                       type="text" placeholder="BILL.DISC" 
                       value="<?php echo $disc_total_bill_amount_discount; ?>"
                       onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                               return false;
                           }"
                       onkeypress="javascript:return valKeyPressedForNumber(event);"  
                       onclick="this.value = '';"
                       spellcheck="false" class="form-control-req-height20 placeholderClass" 
                       size="2" maxlength="10" style="width: 114% ! important; height: 25px; margin-left: 6px;" />
            </div>
        </td>    

        <td align="center" class="blackCalibri13Font spaceLeft5" 
            title="START DATE">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="115%">
                <tr>
                    <td align="center" class="margin1pxAll">
                        <!-- Start Date Code for DAY @AUTHOR-PRIYANKA-28OCT2020 -->
                        <?php
                        $todayDay = $selDOBDay - 1;

                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                        $optDay[$todayDay] = "selected";
                        ?> 
                        <select id="discountDOBDay<?php echo $count; ?>" 
                                name="discountDOBDay<?php echo $count; ?>" 
                                title="DAY" style="width: 25%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('disc_total_bill_amount_discount<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                class="select-control-req-height20">
                            <option value="NotSelected">DAY</option>
                            <?php
                            for ($dd = 0; $dd <= 30; $dd++) {
                                echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                            }
                            ?>
                        </select> 
                        <!-- Start Date Code for MONTH @AUTHOR-PRIYANKA-28OCT2020 -->
                        <?php
                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                        $optMonth[$todayMM] = "selected";
                        ?> 
                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                        <select id="discountDOBMonth<?php echo $count; ?>" 
                                name="discountDOBMonth<?php echo $count; ?>" 
                                title="MONTH" style="width: 30%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                        return false;
                                    }
                                    //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020
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
                                            document.getElementById('gbMonthId').value = 0;
                                        }
                                    } else if (event.keyCode) {
                                        var sel = String.fromCharCode(event.keyCode) - 1;
                                        this.value = arrMonths[sel];
                                        if (event.keyCode == 49) {
                                            document.getElementById('gbMonthId').value = 1;
                                        }
                                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020"
                                class="select-control-req-height20">
                            <option value="NotSelected">MON</option>
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
                        <!-- Start Date Code for YEAR @AUTHOR-PRIYANKA-28OCT2020-->
                        <?php
                        $todayYear = date(Y) + 10;
                        $optYear[$selDOBYear] = "selected";
                        ?> 
                        <select id="discountDOBYear<?php echo $count; ?>" 
                                name="discountDOBYear<?php echo $count; ?>" 
                                title="YEAR" style="width: 35%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();

                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                class="select-control-req-height20">
                            <option value="NotSelected">YEAR</option>
                            <?php
                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>    

        <td align="center" class="blackCalibri13Font spaceLeft5" 
            title="END DATE">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="115%">
                <tr>
                    <td align="center" class="margin1pxAll">
                        <!-- End Date Code for DAY @AUTHOR-PRIYANKA-28OCT2020 -->
                        <?php
                        $todayDay = $selEDOBDay - 1;

                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                        $optDay[$todayDay] = "selected";
                        ?> 
                        <select id="discountEDOBDay<?php echo $count; ?>" name="discountEDOBDay<?php echo $count; ?>" 
                                title="DAY" style="width: 25%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                class="select-control-req-height20">
                            <option value="NotSelected">DAY</option>
                            <?php
                            for ($dd = 0; $dd <= 30; $dd++) {
                                echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                            }
                            ?>
                        </select> 
                        <!-- End Date Code for MONTH @AUTHOR-PRIYANKA-28OCT2020 -->
                        <?php
                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                        $optMonth[$todayEMM] = "selected";
                        ?> 
                        <input  id="gbEMonthId" name="gbEMonthId" type="hidden" value="0" /> 
                        <select id="discountEDOBMonth<?php echo $count; ?>" 
                                name="discountEDOBMonth<?php echo $count; ?>" 
                                title="MONTH" style="width: 30%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();
                                        return false;
                                    }
                                    //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020
                                    var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                    gbMonth = document.getElementById('gbEMonthId').value;
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
                                            document.getElementById('gbEMonthId').value = 0;
                                        }
                                    } else if (event.keyCode) {
                                        var sel = String.fromCharCode(event.keyCode) - 1;
                                        this.value = arrMonths[sel];
                                        if (event.keyCode == 49) {
                                            document.getElementById('gbEMonthId').value = 1;
                                        }
                                    } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-28OCT2020"
                                class="select-control-req-height20">
                            <option value="NotSelected">MON</option>
                            <?php 
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
                        <!-- End Date Code for YEAR @AUTHOR-PRIYANKA-28OCT2020-->
                        <?php
                        $todayYear = date(Y) + 10;
                        $optYear[$selEDOBYear] = "selected";
                        ?> 
                        <select id="discountEDOBYear<?php echo $count; ?>" 
                                name="discountEDOBYear<?php echo $count; ?>" 
                                title="YEAR" style="width: 35%; height: 25px;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                        document.getElementById('disc_product_check<?php echo $count; ?>').focus();
                                        return false;
                                    } else if (event.keyCode == 8) {
                                        document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                        return false;
                                    }"
                                class="select-control-req-height20">
                            <option value="NotSelected">YEAR</option>
                            <?php
                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>  

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="PRODUCT CHECK">
            <div class="spaceLeft5">
                <select id="disc_product_check<?php echo $count; ?>" 
                        name="disc_product_check<?php echo $count; ?>" 
                        style="text-align: left; width: 98% ! important;height: 25px;"
                        onkeydown="javascript:if (event.keyCode == 13) {
                                document.getElementById('disc_discount_check<?php echo $count; ?>').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                return false;
                            }"
                        class="form-control-height20 placeholderClass">
                            <?php
                            if ($disc_product_check != '' && $disc_product_check != NULL) {
                                $discProdCheck = array('AllProducts', 'SameProdType');
                                for ($i = 0; $i <= 1; $i++)
                                    if ($discProdCheck[$i] == $disc_product_check)
                                        $discProdCheckSel[$i] = 'selected';
                            } else {
                                $discProdCheckSel[0] = 'selected';
                            }
                            ?>
                    <option value="AllProducts"<?php echo $discProdCheckSel[0]; ?>>All Products</option>
                    <option value="SameProdType"<?php echo $discProdCheckSel[1]; ?>>Same Prod Type</option>                   
                    <?php $discProdCheckSel = ""; ?>
                </select>
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="DISCOUNT CHECK">
            <div class="spaceLeft5">
                <select id="disc_discount_check<?php echo $count; ?>" 
                        name="disc_discount_check<?php echo $count; ?>" 
                        style="text-align: left; width: 104% ! important;height: 25px;"
                        onkeydown="javascript:if (event.keyCode == 13) {
                                document.getElementById('disc_discount_adjust<?php echo $count; ?>').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('disc_product_check<?php echo $count; ?>').focus();
                                return false;
                            }"
                        class="form-control-height20 placeholderClass">
                            <?php
                            if ($disc_discount_check != '' && $disc_discount_check != NULL) {
                                $discCheck = array('AllProducts', 'DiscOnAllProd', 'DiscOnWoDisc', 'WithoutDiscount');
                                for ($i = 0; $i <= 3; $i++)
                                    if ($discCheck[$i] == $disc_discount_check)
                                        $discCheckSel[$i] = 'selected';
                            } else {
                                $discCheckSel[0] = 'selected';
                            }
                            ?>
                    <option value="AllProducts"<?php echo $discCheckSel[0]; ?>>All Products</option>
                    <option value="DiscOnAllProd"<?php echo $discCheckSel[1]; ?>>Disc On+All Prod</option>
                    <option value="DiscOnWoDisc"<?php echo $discCheckSel[2]; ?>>Disc On+W/o Disc</option>
                    <option value="WithoutDiscount"<?php echo $discCheckSel[3]; ?>>Without Discount</option>
                    <?php $discCheckSel = ""; ?>
                </select>
            </div>
        </td>

        <td align="left" class="blackCalibri13Font spaceLeft5" 
            title="DISCOUNT ADJUST">
            <div class="spaceLeft5">
                <select id="disc_discount_adjust<?php echo $count; ?>" 
                        name="disc_discount_adjust<?php echo $count; ?>" 
                        style="text-align: left; width: 98% ! important;height: 25px;"
                        onkeydown="javascript:if (event.keyCode == 13) {
                                document.getElementById('disc_discount_adjust<?php echo $count; ?>').focus();
                                return false;
                            } else if (event.keyCode == 8) {
                                document.getElementById('disc_discount_check<?php echo $count; ?>').focus();
                                return false;
                            }"
                        class="form-control-height20 placeholderClass">
                            <?php
                            if ($disc_discount_adjust != '' && $disc_discount_adjust != NULL) {
                                $discAdjustType = array('InBill', 'LoyalityPoints');
                                for ($i = 0; $i <= 1; $i++)
                                    if ($discAdjustType[$i] == $disc_discount_adjust)
                                        $discAdjustTypeSel[$i] = 'selected';
                            } else {
                                $discAdjustTypeSel[0] = 'selected';
                            }
                            ?>
                    <option value="InBill"<?php echo $discAdjustTypeSel[0]; ?>>In Bill</option>
                    <option value="LoyalityPoints"<?php echo $discAdjustTypeSel[1]; ?>>Loyality Points</option>
                    <?php $discAdjustTypeSel = ""; ?>
                </select>
            </div>
        </td>


        <td align="center" class="blackCalibri13Font spaceLeft5" title="ADD">
            <div class="spaceLeft5">
                <a style="cursor: pointer;" 
                   onclick="addNewBillDiscountDiv('<?php echo $discId; ?>', document.getElementById('noOfBillDiscount').value, '<?php echo $documentRoot; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>', '<?php echo $commonPanel; ?>');">
                    <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="ADD" 
                         class="marginTop5" />
                </a>
            </div>
        </td>

        <td align="center" class="blackCalibri13Font spaceLeft5" title="DELETE">
            <div class="spaceLeft5">
                <a style="cursor: pointer;" 
                   onclick="deleteBillDiscount('', '<?php echo $count; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>');">
                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="DEL" 
                         class="marginTop5" />
                </a>
            </div>
        </td>
        </tr>
    </table>
</div>
<div id="addNewBillDiscountDiv<?php echo $count + 1; ?>"></div>