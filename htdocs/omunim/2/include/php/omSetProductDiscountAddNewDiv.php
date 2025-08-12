<?php
/*
 * *************************************************************************************************
 * @Description: SET PRODUCT DISCOUNT FORM FILE @AUTHOR-PRIYANKA-15OCT2020
 * *************************************************************************************************
 *
 * Created on OCT 15, 2020 04:00:00 PM 
 * *************************************************************************************************
 * @FileName: omSetProductDiscountAddNewDiv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2.7.21
 * @version: OMUNIM 2.7.21
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen, Inc
 * *************************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @AUTHOR-PRIYANKA-15OCT2020
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
// PANEL NAME
$panelName = $_REQUEST['panelName'];
//
// DISCOUNT ID
$discId = $_REQUEST['discId'];
//
//
parse_str(getTableValues("SELECT * FROM discount WHERE disc_id = '$discId' and "
                       . "disc_owner_id = '$sessionOwnerId'"));
//
parse_str(getTableValues("SELECT * FROM stock WHERE st_id = '$disc_st_id' and "
                       . "st_owner_id = '$sessionOwnerId'"));
//
//echo '$disc_start_date == ' . $disc_start_date . '<br />';
//
    if ($disc_start_date != '' && $disc_start_date != NULL) {
    //
    // START DATE CODE @AUTHOR-PRIYANKA-21OCT2020
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
    // END DATE CODE @AUTHOR-PRIYANKA-21OCT2020
    $selEDOBDay = substr($disc_end_date, 0, 2);
    $selEDOBMnth = substr($disc_end_date, 3, -5);
    $todayEMM = date("m", strtotime($selEDOBMnth)) - 1;
    $selEDOBYear = substr($disc_end_date, -4);
}
//
//echo '$disc_discount_checked == ' . $disc_discount_checked . '<br />';
//                  
?>  
<table align="left" border="0" cellspacing="2" cellpadding="2" width="120%">                                
    <tr id="discountRow<?php echo $count; ?>">   
        <td>
            <input type="hidden" id="panelName" name="panelName" value="<?php echo $panelName; ?>"/>
            <input type="hidden" id="operation<?php echo $count; ?>" name="operation<?php echo $count; ?>" 
                   value="insert"/>
            <input type="hidden" id="main_st_id" name="main_st_id" value="<?php echo $disc_st_id; ?>"/>
            <input type="hidden" id="main_st_item_category" name="main_st_item_category" 
                   value="<?php echo $disc_st_item_category; ?>"/>
            <input type="hidden" id="disc_st_id<?php echo $count; ?>" name="disc_st_id<?php echo $count; ?>" 
                   value="<?php echo $disc_st_id; ?>"/>
            <input type="hidden" id="disc_firm_id<?php echo $count; ?>" name="disc_firm_id<?php echo $count; ?>" 
                   value="<?php echo $disc_firm_id; ?>"/>
            <input type="hidden" id="disc_panel_name<?php echo $count; ?>" name="disc_panel_name<?php echo $count; ?>" 
                   value="<?php echo "ProductDiscountPanel"; ?>"/>
            <input type="hidden" id="disc_status<?php echo $count; ?>" name="disc_status<?php echo $count; ?>"/>
        </td>

        <td align="left" title="CHECKBOX" class="textLabel12CalibriBrown">
            <input type="checkbox" class="checkbox" 
                   id="disc_discount_checked<?php echo $count; ?>" 
                   name="disc_discount_checked<?php echo $count; ?>" 
                   onclick="if (!this.checked) {
                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'unchecked';
                           } else {
                               document.getElementById('disc_discount_checked<?php echo $count; ?>').value = 'checked';
                           }"
                   onchange="" 
                   title="DISCOUNT CHECK" 
                   <?php
                   echo $disc_active;
                   echo " " . $disc_active . " ";
                   ?> >
        </td>

        <td align="left" title="CATEGORY" class="textLabel12CalibriBrown">
            <input id="disc_st_item_category<?php echo $count; ?>" 
                   name="disc_st_item_category<?php echo $count; ?>" 
                   type="text" placeholder="CATEGORY" 
                   value="<?php echo $st_item_category; ?>" style="width: 103%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $st_item_category; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_st_item_name<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('discountEDOBYear<?php echo $count - 1; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   onclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="5" maxlength="10" />
        </td>

        <td align="left" title="PRODUCT NAME" class="textLabel12CalibriBrown">
            <input id="disc_st_item_name<?php echo $count; ?>" 
                   name="disc_st_item_name<?php echo $count; ?>" 
                   type="text" placeholder="PRODUCT NAME" 
                   value="<?php echo $st_item_name; ?>" style="margin-left: 2px; width: 94%;"
                   onblur="if (this.value == '' || this.value == null) {
                               this.value = '<?php echo $st_item_name; ?>'
                           }"
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_product_amount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_st_item_category<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   onclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="10" maxlength="10" />
        </td>

        <td align="left" title="MIN PROD AMOUNT" class="textLabel12CalibriBrown">
            <input id="disc_product_amount<?php echo $count; ?>" 
                   name="disc_product_amount<?php echo $count; ?>" 
                   type="text" placeholder="MIN PROD AMOUNT" 
                   value="<?php echo $disc_product_amount; ?>" style="margin-left: -5px; width: 114%;"
                   onblur=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_st_item_name<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   onclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="11" maxlength="10" />
        </td>

        <td align="left" title="MAKING DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_making_discount<?php echo $count; ?>" 
                   name="disc_making_discount<?php echo $count; ?>" 
                   type="text" placeholder="MAKING DISCOUNT" 
                   value="<?php echo $disc_making_discount; ?>" style="margin-left: 12px; width: 92%;"
                   onblur=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_stone_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_product_amount<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   onclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="11" maxlength="10" />
        </td>

        <td align="left" title="STONE DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_stone_discount<?php echo $count; ?>" 
                   name="disc_stone_discount<?php echo $count; ?>" 
                   type="text" placeholder="STONE DISCOUNT" 
                   value="<?php echo $disc_stone_discount; ?>" style="margin-left: 1px; width: 109%;"
                   onblur=""
                   onkeydown="javascript: if (event.keyCode == 13) {
                               document.getElementById('disc_product_discount<?php echo $count; ?>').focus();
                               return false;
                           } else if (event.keyCode == 8) {
                               document.getElementById('disc_making_discount<?php echo $count; ?>').focus();
                               return false;
                           }"
                   onkeypress="javascript:return valKeyPressedForNumber(event);"  
                   onclick="this.value = '';"
                   spellcheck="false" class="form-control-req-height20 placeholderClass" 
                   size="9" maxlength="10" />
        </td>

        <td align="left" title="PRODUCT DISCOUNT" class="textLabel12CalibriBrown">
            <input id="disc_product_discount<?php echo $count; ?>" 
                   name="disc_product_discount<?php echo $count; ?>" 
                   type="text" placeholder="PRODUCT DISCOUNT" 
                   value="<?php echo $disc_product_discount; ?>" style="margin-left: 11px; width: 99%;"
                   onblur=""
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
                   size="11" maxlength="10" />
        </td>

        <td align="left" title="START DATE" class="textLabel12CalibriBrown">
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="108%">
                <tr>
                    <td align="center" class="margin1pxAll">
                        <!-- Start Date Code for DAY @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $todayDay = $selDOBDay - 1;

                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                        $optDay[$todayDay] = "selected";
                        ?> 
                        <select id="discountDOBDay<?php echo $count; ?>" 
                                name="discountDOBDay<?php echo $count; ?>" 
                                title="DAY" style="width: 23%;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('discountDOBMonth<?php echo $count; ?>').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('disc_product_discount<?php echo $count; ?>').focus();
                                            return false;
                                        }"
                                class="select-control-req-height20">
                            <option value="NotSelected">DAY</option>
                            <?php
                            for ($dd = 0; $dd <= 30; $dd++) {
                                $selected_day = ($arrDays[$dd] == $selDOBDay) ? 'selected="selected"' : '';
                                echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                            }
                            ?>
                        </select> 
                        <!-- Start Date Code for MONTH @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                        $optMonth[$todayMM] = "selected";
                        ?> 
                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                        <select id="discountDOBMonth<?php echo $count; ?>" 
                                name="discountDOBMonth<?php echo $count; ?>" 
                                title="MONTH" style="width: 23%;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('discountDOBYear<?php echo $count; ?>').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('discountDOBDay<?php echo $count; ?>').focus();
                                            return false;
                                        }
                                        //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020
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
                                        } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020"
                                class="select-control-req-height20">
                            <option value="NotSelected">MON</option>
                            <?php
                            for ($mm = 0; $mm <= 11; $mm++) {
                                $selected_month = ($arrMonths[$mm] == $selDOBMnth) ? 'selected="selected"' : '';
                                echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                            }
                            ?>
                        </select> 
                        <!-- Start Date Code for YEAR @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $todayYear = date(Y) + 10;
                        $optYear[$selDOBYear] = "selected";
                        ?> 
                        <select id="discountDOBYear<?php echo $count; ?>" 
                                name="discountDOBYear<?php echo $count; ?>" 
                                title="YEAR" style="width: 23%;"
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
                                $selected_year = ($yy == $selDOBYear) ? 'selected="selected"' : '';
                                echo "<option value=\"$yy\" $selected_year>$yy</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>

        <td align="left" title="END DATE" class="textLabel12CalibriBrown">
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="105%">
                <tr>
                    <td align="center" class="margin1pxAll">
                        <!-- End Date Code for DAY @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $todayDay = $selEDOBDay - 1;

                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');

                        $optDay[$todayDay] = "selected";
                        ?> 
                        <select id="discountEDOBDay<?php echo $count; ?>" 
                                name="discountEDOBDay<?php echo $count; ?>" 
                                title="DAY" style="width: 23%;"
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
                                $selected_day = ($arrDays[$dd] == $selEDOBDay) ? 'selected="selected"' : '';
                                echo "<option value=\"$arrDays[$dd]\" $selected_day>$arrDays[$dd]</option>";
                            }
                            ?>
                        </select> 
                        <!-- End Date Code for MONTH @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                        $optMonth[$todayEMM] = "selected";
                        ?> 
                        <input  id="gbEMonthId" name="gbEMonthId" type="hidden" value="0" /> 
                        <select id="discountEDOBMonth<?php echo $count; ?>" 
                                name="discountEDOBMonth<?php echo $count; ?>" 
                                title="MONTH" style="width: 23%;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('discountEDOBYear<?php echo $count; ?>').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('discountEDOBDay<?php echo $count; ?>').focus();
                                            return false;
                                        }
                                        //START CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020
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
                                        } //END CODE TO GET MONTH FROM KEYS @AUTHOR-PRIYANKA-17OCT2020"
                                class="select-control-req-height20">
                            <option value="NotSelected">MON</option>
                            <?php
                            for ($mm = 0; $mm <= 11; $mm++) {
                                $selected_month = ($arrMonths[$mm] == $selEDOBMnth) ? 'selected="selected"' : '';
                                echo "<option value=\"$arrMonths[$mm]\" $selected_month>$arrMonths[$mm]</option>";
                            }
                            ?>
                        </select> 
                        <!-- End Date Code for YEAR @AUTHOR-PRIYANKA-17OCT2020-->
                        <?php
                        $todayYear = date(Y) + 10;
                        $optYear[$selEDOBYear] = "selected";
                        ?> 
                        <select id="discountEDOBYear<?php echo $count; ?>" 
                                name="discountEDOBYear<?php echo $count; ?>" 
                                title="YEAR" style="width: 23%;"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('disc_st_item_category<?php echo $count + 1; ?>').focus();
                                            return false;
                                        } else if (event.keyCode == 8) {
                                            document.getElementById('discountEDOBMonth<?php echo $count; ?>').focus();
                                            return false;
                                        }"
                                class="select-control-req-height20">
                            <option value="NotSelected">YEAR</option>
                            <?php
                            for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                $selected_year = ($yy == $selEDOBYear) ? 'selected="selected"' : '';
                                echo "<option value=\"$yy\" $selected_year>$yy</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>

        <td align="center" class="blackCalibri13Font spaceLeft5" title="ADD">
            <div class="spaceLeft5" id="addNewDiscount">
                <a style="cursor: pointer;"
                   onclick="addNewDiscountDiv('<?php echo $disc_id; ?>', '<?php echo $count + 1; ?>', (document.getElementById('noOfDiscount').value), '<?php echo $documentRoot; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>');">
                    <img src="<?php echo $documentRoot; ?>/images/update16.png" alt="ADD" class="marginTop5" />
                </a>
            </div>
        </td>

        <td align="center" class="blackCalibri13Font spaceLeft5" title="DELETE">
            <div class="spaceLeft5" id="deleteDiscount">
                <a style="cursor: pointer;"
                   onclick="deleteDiscountFromTable('', '<?php echo $count; ?>', '<?php echo $panelName; ?>', '<?php echo $discountPanelName; ?>');">
                    <img src="<?php echo $documentRoot; ?>/images/delete16.png" alt="DEL" class="marginTop5" />
                </a>
            </div>
        </td>
    </tr>
</table> 
<div id="addNewDiscountDiv<?php echo $count + 1; ?>"></div>

