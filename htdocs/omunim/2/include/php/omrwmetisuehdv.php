<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */   
?>
<?php 
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="99.6%" class="brdrgry-dashed">
    <tr class="height28 trbggry">
        <td align="center" title="Select Date Here" class="textLabel12CalibriBold" width="200px"><!--****description: START CODE TO Add customerStatement @Author: DISH08OCT16 i change size 196px to 200px in this line. END******-->
            BILL DATE
        </td>
        <td align="center" class="textLabel12CalibriBold" width="220px">
            CUST NAME
        </td>
        <td colspan="2">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="center" class="textLabel12CalibriBold" width="172px">
                        <div class="5">INVOICE NO</div>
                    </td>
                    <td align="center" class="textLabel12CalibriBold" width="196px">
                        <div class="00">FIRM</div>
                    </td>
                </tr>
            </table>
        </td>
        <td align="center" class="textLabel12CalibriBold" colspan="2" width="196px">
            ACCOUNT
        </td>
    </tr>
    <tr>
        <td align="center">
                            <?php     if ($nepaliDateIndicator == 'YES') { 
                   ?>
                   <input type="hidden" id="nepaliDateIndicator" name="nepaliDateIndicator" value="<?php echo $nepaliDateIndicator; ?>"/>
                     <?php
                        $tableAlignStyle = 'center';
                        $nepaliDatePanel = 'sellPanel';
                        $selDayId = 'slPrDOBDay';
                        $selDayName = 'addItemDOBDay';
                        $selDayStyle = '-webkit-appearance:width:30px;';
                        $selMonthId = 'slPrDOBMonth';
                        $selMonthName = 'addItemDOBMonth';
                        $selMonthStyle = '-webkit-appearance: width:50px;';
                        $selYearId = 'slPrDOBYear';
                        $selYearName = 'addItemDOBYear';
                        $selYearStyle = '-webkit-appearance: width:40px;';
                         if($rawPanelName == 'RawDetUpPanel'|| $rawPanelName == 'RawPayUp'){
                          $date_nepali = $sttr_other_lang_add_date;
                          }else{
                         $date_nepali = '';
                        }
                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
              }else{?>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="center" title="SELECT DATE HERE!" width="100%">
                        <!-- Start Code to Define Hidden inputs -->
                        <input type="hidden" id="panelName" name="panelName" value="<?php echo $custSellPanel; ?>"/>
                        <input type="hidden" id="itslId" name="itslId" value="<?php echo $itslId; ?>" />
                        <input type="hidden" id="sellTotCrystal" name="sellTotCrystal"/>
                        <!-- End Code to Define Hidden inputs -->
                        <!-- *************** Start Code for dayDD *************** -->
                        <?php
                        $todayDay = $selDOBDay - 1;
                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                        $optDay[$todayDay] = "selected";
                        ?> 
                        <select id="addItemDOBDay" name="addItemDOBDay" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('addItemDOBMonth').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                return false;
                                            }"
                                class="form-control text-center form-control-font13" style="width:30%;height:35px;">
                            <option value="NotSelected">DAY</option>
                            <?php
                            for ($dd = 0; $dd <= 30; $dd++) {
                                echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                            }
                            ?>
                        </select> 
                        <!-- *************** Bill Code for Month *************** -->
                        <?php
                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                        $optMonth[$todayMM] = "selected";
                        ?> 
                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                        <select id="addItemDOBMonth" name="addItemDOBMonth" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('addItemDOBYear').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('addItemDOBDay').focus();
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
                                class="form-control text-center form-control-font13" style="width:30%;height:35px;">
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
                        <!-- *************** Start Code for Year *************** -->
                        <?php
                        $todayYear = date(Y); //chnaged @Author:PRIYA30APR14
                        $optYear[$selDOBYear] = "selected";
                        ?> 
                        <select id="addItemDOBYear" name="addItemDOBYear"
                                onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_brand_id').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('addItemDOBMonth').focus();
                                                return false;
                                            }"
                                class="form-control text-center form-control-font13" style="width:37%;height:35px;">
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
              <?php } ?>
        </td>
        <td align="right" title="CUSTOMER">
            <input id="sttr_user_id" name="sttr_user_id" value="<?php echo $userId; ?>" type="hidden"/> <!--   Author:SANT12JAN16    -->
            <input id="sttr_user_billing_name" name="sttr_user_billing_name" type="text" placeholder="CUSTOMER NAME" value="<?php echo $user_fname; ?>"
                   onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                   document.getElementById('sttr_pre_invoice_no').focus();
                                   return false;
                               } else if (event.keyCode == 8) {
                                   document.getElementById('addItemDOBYear').focus();
                                   return false;
                               }"
                   readonly="true" autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="28" maxlength="50" /><!--****description: START CODE TO Add customerStatement @Author: DISH08OCT16 i change size 23 to 28 in this line. END******-->
        </td>
        <td colspan="2">
            <table border="0" cellspacing="0" cellpadding="1" width="100%">
                <tr>
                    <td align="center" class="">
                        <div id="addRawStockItemInvDiv" >

                            <input id="sttr_pre_invoice_no" name="sttr_pre_invoice_no" type="text" placeholder="INV" value="<?php
                            echo $sttr_pre_invoice_no;
                            ?>" <?php if ($staffId && $array['addStockAccessInvNo'] != 'true') { ?>readonly="true"<?php } ?>
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('sttr_invoice_no').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_brand_id').focus();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForChar(event);"
                                   spellcheck="false" class="form-control text-center form-control-font13" size="9" maxlength="10" title="ITEM PRE INVOICE NUMBER"/>
                        </div>
                    </td>
                    <td class="">
                        <div>
                            <input id="sttr_invoice_no" name="sttr_invoice_no" type="text" placeholder="Invoice No" value="<?php
                            echo $sttr_invoice_no;
                            ?>" <?php if ($staffId && $array['addStockAccessInvNo'] != 'true') { ?>readonly="true"<?php } ?>
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                   document.getElementById('firmId').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('sttr_pre_invoice_no').focus();
                                                   return false;
                                               }"
                                   onkeypress="javascript:return valKeyPressedForNumber(event);"
                                   spellcheck="false" class="form-control text-center form-control-font13" size="13" maxlength="30" title="ITEM POST INVOICE NUMBER"/>
                        </div>
                    </td>
                    <td align="right" title="FIRM">
                        <div id="addStockItemFirmDiv" class="">
                            <?php
                            $nextFieldId = 'sttr_account_id';
                            $prevFieldId = 'sttr_invoice_no';
                            $firmIdDivClass = 'form-control text-center form-control-font13';
                            $metalType = $sttr_metal_type;
                            $FirmStyle = 'height:30px; border:solid 1px #c1c1c1;';
                            if ($metType == 'SELL')
                                $panelName = 'CustSell';
                            else
                                $panelName = 'CustPurchase';

                            if ($staffId && $array['addSellTransAccessfirm'] != 'true') {
                                $accAccess = 'NO';
                            }
                            if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                $firmIdSelected = $_SESSION['setFirmSession'];
                            } else {
                                $firmIdSelected = $firmId;
                            }
                            include 'omffrasp.php';
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td align="center" title="ACCOUNT" style="height:35px;">
            <div id="selAccountDiv"  class="">
                <?php
                $prevFieldId = 'firmId';
                $nextFieldId = 'sttr_metal_type';
                if ($metType == 'SELL') {
                    $accNameSelected = 'Sales Accounts';
                    $selAccountName = 'Sales Accounts';
                } else {
                    if ($sttr_metal_type == 'Gold') {
                        $accNameSelected = 'Purchase RAW Gold';
                        $selAccountName = 'Purchase Accounts';
                    } else if ($sttr_metal_type == 'Silver') {
                        $accNameSelected = 'Purchase RAW Silver';
                        $selAccountName = 'Purchase Accounts';
                    }
                }
                $allAccountDivId = 'sttr_account_id';

                $accIdSelected = $selAccId;
                $allAccountDivClass = 'form-control text-center form-control-font13';
                $AccountStyle = 'height:35px; border:solid 1px #c1c1c1;';
                if ($staffId && $array['addStockAccessAcntType'] != 'true') { //To Give Access to staff @AUTHOR: SANDY16AUG13
                    $accAccess = 'NO';
                }
                include 'omacpalt.php';
                ?>
            </div>
        </td>
    </tr>
<!--    <tr>
        <td  class="paddingTop4 padBott4" colspan="14">
            <div class="hrGold"></div>
        </td>
    </tr>-->
</table>
