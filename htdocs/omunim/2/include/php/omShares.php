<?php
/*
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on Oct 6, 2014 4:45:05 PM
 *
 * @FileName: omShares.php
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$staffId = $_SESSION['sessionStaffId'];
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
$conn = $GLOBALS['conn'];
//
if ($custId == NULL || $custId == '')
    $custId = $_REQUEST['custId'];

//echo '$custId =='.$custId;
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

$selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
$rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
$nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
//
if ($ownerId == NULL || $ownerId == '') {
    $ownerId = $_SESSION[sessionOwnerId];
    $sessionOwnerId = $_SESSION[sessionOwnerId];
}
parse_str(getTableValues("SELECT * FROM user_transaction_invoice WHERE utin_type IN ('Shares') AND utin_user_id = '$custId' order by utin_id desc LIMIT 0,1"));
?>
<div id="addShares">
    <form name="add_shares" id="add_shares"
          enctype="multipart/form-data" method="post"
          action="<?php echo $documentRootBSlash; ?>/include/php/omSharesAd.php"   
          onsubmit="return addSharesCust();">
        <div>
            <?php if ($selFirmId == NULL) { ?> 
                <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="" 
                     onload="document.getElementById('DOBDay').focus();" />
                 <?php } ?>
        </div>
        <input type="hidden" id="utin_transaction_type" name="utin_transaction_type" />
        <input type="hidden" id="custId" name="custId" value = "<?php echo $custId; ?>" />
        <table align="center" border="0" cellspacing="0" cellpadding="0" width="99%" style="border: 1px dashed #0079c2;background: #e9f7f5;padding-bottom:5px;" >
            <tr>
                <td colspan="12">
                    <?php include 'omSharesHeadings.php'; ?>
                    <table  border="0" width="100%">
                        <tr>
                              <?php if($nepaliDateIndicator == 'YES'){ 
                                $today = date("d-m-Y");
                                $date_components = explode('-', $today);

                                    $date_d = $date_components[0];
                                    $selMnth = $date_components[1];
                                    $date_y = $date_components[2];
                                    $date_ne = $nepali_date->get_nepali_date($date_y,$selMnth,$date_d);
                                    
                                    $day = $date_ne[d];
                                     $month = $date_ne[m];
                                      $year = $date_ne[y];
                                ?> 
                             <td class="textBoxCurve1px backFFFFFF margin2pxAll" width="20%">
                                <table  border="0" cellspacing="0" cellpadding="0" >
                                    <tr>
                                        <td>
                                            <?php
                                            if ($todayDay == '') {
                                                $todayDay = $day - 1;
                                            }
                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32');
                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <select style="margin-left: 18%;" id="DOBDay" name="DOBDay" 
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('DOBMonth').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    return false;
                                                                }"
                                                        class="textLabel14CalibriGrey">
                                                    <option value="NotSelected">DAY</option>
                                                    <?php
                                                    for ($dd = 0; $dd <= 30; $dd++) {
                                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- *************** Start Code for Month *************** -->
                                            <?php
                                            if ($todayMM == '') {
                                                $todayMM = $month - 1;
                                            }
                                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                $arrMonths = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
                                            } else {
                                                $arrMonths = array('ब‌ैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मङ्सिर', 'पुस', 'माघ', 'फाल्गुण', 'चैत');
                                            }//change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                            $optMonth[$todayMM] = "selected";
                                            ?>
                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="text-align: center">
                                                <select style="margin-left: 17%;" id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('DOBYear').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('DOBDay').focus();
                                                                    return false;
                                                                }
                                                                //START CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13
                                                                var arrMonths = new Array('ब‌ैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मङ्सिर', 'पुस', 'माघ', 'फाल्गुण', 'चैत');
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
                                                                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13"                                                
                                                        class="lgn-txtfield12-req-arial">
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
                                            </div>
                                        </td>
                                        <td>
                                            <!-- *************** Start Code for Year *************** -->
                                            <?php
                                            if ($todayYear == '') {
                                                $todayYear = $year;
                                            }
                                            $optYear[$todayYear] = "selected";
                                            ?> 
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <select id="DOBYear" name="DOBYear" style="margin-left: -8%;"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('sharesDesc').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('DOBMonth').focus();
                                                                    return false;
                                                                }"
                                                        class="textLabel14CalibriGrey">
                                                    <option value="NotSelected">YEAR</option>
                                                    <?php
                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                                <?php }else{ ?>
                            <td class="textBoxCurve1px backFFFFFF margin2pxAll" width="20%">
                                <table  border="0" cellspacing="0" cellpadding="0" >
                                    <tr>
                                        <td>
                                            <?php
                                            if ($todayDay == '') {
                                                $todayDay = date(j) - 1;
                                            }
                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <select style="margin-left: 18%;" id="DOBDay" name="DOBDay" 
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('DOBMonth').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    return false;
                                                                }"
                                                        class="textLabel14CalibriGrey">
                                                    <option value="NotSelected">DAY</option>
                                                    <?php
                                                    for ($dd = 0; $dd <= 30; $dd++) {
                                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- *************** Start Code for Month *************** -->
                                            <?php
                                            if ($todayMM == '') {
                                                $todayMM = date(n) - 1;
                                            }
                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                            $optMonth[$todayMM] = "selected";
                                            ?>
                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft" style="text-align: center">
                                                <select style="margin-left: 17%;" id="DOBMonth" name="DOBMonth" class="textLabel14CalibriGrey"
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
                                                                } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13"                                                
                                                        class="lgn-txtfield12-req-arial">
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
                                            </div>
                                        </td>
                                        <td>
                                            <!-- *************** Start Code for Year *************** -->
                                            <?php
                                            if ($todayYear == '') {
                                                $todayYear = date(Y);
                                            }
                                            $optYear[$todayYear] = "selected";
                                            ?> 
                                            <div  class="selectStyledBorderLess backFFFFFF floatLeft">
                                                <select id="DOBYear" name="DOBYear" style="margin-left: -8%;"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                    document.getElementById('sharesDesc').focus();
                                                                    return false;
                                                                } else if (event.keyCode == 8) {
                                                                    document.getElementById('DOBMonth').focus();
                                                                    return false;
                                                                }"
                                                        class="textLabel14CalibriGrey">
                                                    <option value="NotSelected">YEAR</option>
                                                    <?php
                                                    for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                        echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                                <?php } ?>
                            <td class="textBoxCurve1px backFFFFFF" width="30%" style="color:#800000; font-weight: 400;">
                                <input id="sharesDesc"
                                       name="sharesDesc" spellcheck="false" type="text" placeholder="Description" style="width:100%; text-align: center;" value="<?php echo $utin_prod_details; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sharesQTY').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('DOBYear').focus();
                                                   return false;
                                               }"

                                       spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" />
                            </td>
                            <td class="textBoxCurve1px backFFFFFF"  width="10%" style="color:#800000; font-weight: 400;">
                                <input type="text" id="sharesQTY" name="sharesQTY"  placeholder="QTY" style="width: 120px; text-align: center;" value="<?php echo $utin_prod_qty; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sharesPrice').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sharesDesc').focus();
                                                   return false;
                                               }"
                                       onblur="AddSharesCal();
                                               return false;"
                                       spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" />
                            </td>
                            <td class="textBoxCurve1px backFFFFFF" width="583px" style="color:#800000; font-weight: 400;">
                                <input id="sharesPrice"
                                       name="sharesPrice" spellcheck="false" type="text" placeholder="Shares Price" style="width: 120px; text-align: center;" value="<?php echo $utin_prod_unit_price; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sharesTotalPrice').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sharesQTY').focus();
                                                   return false;
                                               }"
                                       onblur="AddSharesCal();
                                               return false;"
                                       spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" />
                            </td>
                            <td class="textBoxCurve1px backFFFFFF" width="583px" style="color:#800000; font-weight: 400;">
                                <input id="sharesTotalPrice"
                                       name="sharesTotalPrice" spellcheck="false" type="text" placeholder="Total Amount" style="width: 120px; text-align: center;" value="<?php echo $utin_total_amt; ?>"
                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sharesAdd').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sharesPrice').focus();
                                                   return false;
                                               }"
                                       onblur="AddSharesCal();
                                               return false;
                                               }"          
                                       spellcheck="false" class="border-no inputBox14CalibriReqCenter" size="20" maxlength="50" />
                            </td>
                            <td align="center">
                                <input id="sharesAdd" onclick="document.getElementById('utin_transaction_type').value = 'Purchased';" 
                                       type="submit" value="ADD" class="frm-btn" style="margin: 5px; width: 80px; font-size: 16px;background:#BED8FD;color:#0F118A;border: 1px solid #0b65e5;height: auto;;" />
                            </td>
                            <td align="center">
                                <input id="sharesPay" onclick="document.getElementById('utin_transaction_type').value = 'Sold';" 
                                       type="submit" value="PAY" class="frm-btn" style="margin: 5px; width: 80px; font-size: 16px;background:#BED8FD;color:#0F118A;border: 1px solid #0b65e5;height: auto;" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <?php include 'omSharesTable.php'; ?>
</div>
