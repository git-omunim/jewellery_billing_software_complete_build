<?php if ($mainPanelDiv == 'Customer') { ?> 
    <table align="left" border="0" cellspacing="0" cellpadding="2" width="99.6%" style="border:1px solid #c1c1c1;">
        <tr style="background-color:#CAEFFD">
            <td align="center" title="Select Date Here" class="textLabel12CalibriBold" width="200px">               
                BILL DATE
            </td>
            <td align="center" class="textLabel12CalibriBold" width="220px">
                NAME
            </td>
            <td colspan="2">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="right" class="textLabel12CalibriBold" width="172px">
                            <div class="padLeft25">INVOICE NO</div>
                        </td>
                        <td align="center" class="textLabel12CalibriBold" width="196px">   
                            <div class="padLeft100">FIRM</div>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" class="textLabel12CalibriBold" colspan="2" width="196px">
                ACCOUNT
            </td>
        </tr>
           <?php 
//         ***************************start code to add nepali date indicator AUTHOR:SHREYA************//
           $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
           $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
           $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
           $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
         ?>
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
                        if($rawPanelName == 'RawDetUpPanel'){
                        $date_nepali = $sttr_other_lang_add_date;
                        }else{
                            $date_nepali = '';
                        }
                        include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
              } else { ?>
                <table align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" title="SELECT DATE HERE!" class="margin1pxAll">
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
                                    class="form-control text-center" style="width:55px;height:26px;">
                                <option value="NotSelected">DAY</option>
                                <?php
                                for ($dd = 0; $dd <= 30; $dd++) {
                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                }
                                ?>
                            </select> 
                            <!-- *************** Bill Code for Month *************** -->
                            <?php
                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" />
                            <select id="addItemDOBMonth" name="addItemDOBMonth" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('addItemDOBYear').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBDay').focus();
                                                    return false;
                                                }
                                                //START CODE TO GET MONTH FROM KEYS
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
                                                } //END CODE TO GET MONTH FROM KEYS"
                                    class="form-control text-center" style="width:55px;height:26px;">
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
                                        $billMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
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
                            $todayYear = date(Y); //chnaged
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
                                    class="form-control text-center" style="width:55px;height:26px;">
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
                <input id="addRawStockUserId" name="addRawStockUserId" value="<?php echo $userId; ?>" type="hidden"/> <!--   Author:SANT12JAN16    -->
                <input id="sttr_brand_id" name="sttr_brand_id" type="text" placeholder="CUSTOMER NAME" value="<?php echo $user_fname; ?>"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       document.getElementById('sttr_pre_invoice_no').focus();
                                       return false;
                                   } else if (event.keyCode == 8) {
                                       document.getElementById('addItemDOBYear').focus();
                                       return false;
                                   }"
                       readonly="true" autocomplete="off" spellcheck="false" class="form-control text-center font-dark input-focus" size="28" maxlength="50" /><!--****description: START CODE TO Add customerStatement @Author: DISH08OCT16 i change size 23 to 28 in this line. END******-->
            </td>
            <td colspan="2">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="right" class="padLeft5 padRight5" width="150px" style="padding-right: 2px;">
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
                                       spellcheck="false" class="form-control text-center font-dark input-focus" size="9" maxlength="10" title="ITEM PRE INVOICE NUMBER"/>
                        </td>
                        <td align="left" width="150px" style="padding-right: 5px;">
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
                                   spellcheck="false" class="form-control text-center font-dark input-focus" size="13" maxlength="30" title="ITEM POST INVOICE NUMBER"/>
                            </div>
                        </td>
                        <td align="center" title="FIRM" width="100px">
                            <div id="addStockItemFirmDiv" >
                                <?php
                                $nextFieldId = 'sttr_account_id';
                                $prevFieldId = 'sttr_invoice_no';
                                $firmIdDivClass = 'form-control text-center';
                                $metalType = $sttr_metal_type;

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
            <?php
            if ($_GET['assignMetalType'] != '' && $_GET['assignMetalType'] != NULL) {
                if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') {
                    $sttr_metal_type = $_GET['assignMetalType'];
                }
            }
            ?>
            <td align="center" title="ACCOUNT" width="150px">
                <div id="selAccountDiv" >
                    <?php
                    $prevFieldId = 'firmId';
                    $nextFieldId = 'sttr_metal_type';
                    //
                    //
                        if ($sttr_metal_type == 'Gold') {
                        $accNameSelected = 'RAW Gold';
                        $selAccountName = "RAW METAL"; // for MYSQLI Query
                    } else if ($sttr_metal_type == 'Silver') {
                        $accNameSelected = 'RAW Silver';
                        $selAccountName = "RAW METAL"; // for MYSQLI Query
                    } else if ($sttr_metal_type == 'crystal') {
                        $accNameSelected = 'Stock Stone';
                        $selAccountName = "Stock Stone"; // for MYSQLI Query
                    } else if ($sttr_metal_type == 'Alloy') {
                        $accNameSelected = 'RAW Alloy';
                        $selAccountName = "RAW METAL"; // for MYSQLI Query
                    } else {
                        $accNameSelected = 'RAW Gold';
                        $selAccountName = "RAW METAL"; // for MYSQLI Query
                    }
                    //   
                    //
                    $allAccountDivId = 'sttr_account_id';
                    //
                    $accIdSelected = $selAccId;
                    //
                    $AccountStyle = 'height:26px;';
                    //
                    $allAccountDivClass = 'form-control text-center';
                    //
                    if ($staffId && $array['addStockAccessAcntType'] != 'true') { //To Give Access to staff 
                        $accAccess = 'NO';
                    }
                    //
                    //echo '$selAccountName == ' . $selAccountName;
                    //
                    include 'omacpalt.php';
                    ?>
                </div>
            </td>
        </tr>
<!--        <tr>
            <td align="center" colspan="10" class="paddingTopBott5">
                <div class="hrGold"></div>
            </td>
        </tr>-->
    </table>

<?php } else if ($mainPanelDiv == 'Supplier') { ?> 
    <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%" style="border:1px solid #c1c1c1;">
        <tr style="background-color:#CAEFFD">
            <td align="center" title="Select Date Here" class="textLabel12CalibriBold" >
                BILL DATE
            </td>
            <td align="center" class="textLabel12CalibriBold" width="220px">
                SUPPLIER NAME
            </td>

            <td colspan="2">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="center" class="textLabel12CalibriBrown" width="172px">
                            <div class="padLeft25">INVOICE NO</div>
                        </td>
                        <td align="center" class="textLabel12CalibriBrown" width="196px">
                            <div class="padLeft100">FIRM</div>
                        </td>
                    </tr>
                </table>
            </td>

            <td align="center" class="textLabel12CalibriBrown" width="196px">
                ACCOUNT
            </td>

            <td align="center" class="textLabel12CalibriBrown" title="IMAGE">
                IMAGES / PHOTOS
            </td>

        </tr>
        <tr>
            <td align="center">
                <table align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" title="SELECT DATE HERE!" class="margin1pxAll">
                            <!-- Start Code to Define Hidden inputs -->
                            <input type="hidden" id="rwprId" name="rwprId" value="<?php echo $sttr_id; ?>" />
                            <input type="hidden" id="rwmtdrId" name="rwmtdrId" value="<?php echo $rwmtdr_id; ?>"/>
                            <input type="hidden" id="metalRateCalculation" name="metalRateCalculation" value="<?php echo $metalRateCal; ?>"/>
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
                                    class="select-control-req-height20">
                                <option value="NotSelected">DAY</option>
                                <?php
                                for ($dd = 0; $dd <= 30; $dd++) {
                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                }
                                ?>
                            </select> 
                            </div>
                            <!-- *************** Bill Code for Month *************** -->
                            <?php
                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD -->
                            <select id="addItemDOBMonth" name="addItemDOBMonth" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('addItemDOBYear').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBDay').focus();
                                                    return false;
                                                }
                                                //START CODE TO GET MONTH FROM KEYS 
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
                                                } //END CODE TO GET MONTH FROM KEYS"
                                    class="select-control-req-height20">
                                <option value="NotSelected">MON</option>
                                <?php          
                                for ($mm = 0; $mm <= 11; $mm++) {                                   
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                    if ($englishMonthFormat == 'displayinnumber') {
                                        $billMonth = date('m', strtotime($arrMonths[$mm]));
                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
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
                            $todayYear = date(Y); //chnaged
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
            <td align="right" title="SUPPLIER">
                <input id="addRawStockUserId" name="addRawStockUserId" value="<?php echo $userId; ?>" type="hidden"/> 
                <input id="sttr_brand_id" name="sttr_brand_id" type="text" placeholder="SUPPLIER NAME" value="<?php echo $sttr_brand_id ?>"
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       document.getElementById('sttr_pre_invoice_no').focus();
                                       return false;
                                   } else if (event.keyCode == 8) {
                                       document.getElementById('addItemDOBYear').focus();
                                       return false;
                                   }"
                       readonly="true" autocomplete="off" spellcheck="false" class="input_border_without_shadow" size="28" maxlength="50" />
            </td>
            <td colspan="2">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="center" class="padLeft5">
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
                                   spellcheck="false" class="input_border_without_shadow" size="9" maxlength="10" title="ITEM PRE INVOICE NUMBER"/>
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
                                   spellcheck="false" class="input_border_without_shadow" size="13" maxlength="30" title="ITEM POST INVOICE NUMBER"/>
                        </td>
                        <td align="right" title="FIRM">
                            <div id="addStockItemFirmDiv" class="selectStyledWdShdw">
                                <?php
                                $nextFieldId = 'sttr_account_id';
                                $prevFieldId = 'sttr_invoice_no';
                                $firmIdDivClass = 'textLabel14CalibriReq';
                                $metalType = $sttr_metal_type;
                                if ($metType == 'SELL') {
                                    $panelName = 'CustSell';
                                } else {
                                    $panelName = 'CustPurchase';
                                }
                                if ($staffId && $array['addSellTransAccessfirm'] != 'true') {
                                    $accAccess = 'NO';
                                }
                                if (!$firmIdSelected) {
                                    $firmIdSelected = $_SESSION['setFirmSession'];
                                }
                                include 'omffrasp.php';
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" title="ACCOUNT">
                <div id="selAccountDiv"  class="selectStyledWdShdw">
                    <?php
                    $prevFieldId = 'firmId';
                    $nextFieldId = 'sttr_metal_type';
                    $allAccountDivId = 'sttr_account_id';
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
                    $accIdSelected = $selAccId;
                    $allAccountDivClass = 'textLabel14CalibriReq';
                    if ($staffId && $array['addStockAccessAcntType'] != 'true') { //To Give Access to staff
                        $accAccess = 'NO';
                    }
                    include 'omacpalt.php';
                    ?>
                </div>
            </td>

            <td align="center">
                <table border="0" cellspacing="0" cellpadding="0" width="" align="">
                    <tr>
                        <td align="right">
                            <input type="text" id="fileName" name="fileName" value="<?php echo $image_snap_fname; ?>"
                                   class="lgn-txtfield-without-borderAndBackground" readonly="readonly" size="9"/>
                            <input type="hidden" id="imageLoadOption" name="imageLoadOption" />
                            <input type="hidden" id="compressedImage" name="compressedImage" />
                            <input type="hidden" id="compressedImageThumb" name="compressedImageThumb" />
                            <input type="hidden" id="compressedImageSize" name="compressedImageSize" />
                        </td>
                        <td align="right">
                            <div id="file_input_div">
                                <div class="file_item_input_div" align="center">
                                    <?php if ($staffId && $array['addStockAccessIcom'] == 'true' || (!$staffId)) { ?>
                                        <input type="button" value="" alt="COM" id="ComputerButt" class="frm-btn-computer24" 
                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';" 
                                               onsubmit="return false;" />
                                           <?php } ?>
                                    <input type="file" id="addItemSelectPhoto"
                                           style="cursor: pointer;" name="addItemSelectPhoto"
                                           class="file_input_hidden_gItem"
                                           onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';"
                                           onchange="loadImageFileCompress();" 
                                           onsubmit="return false;" />
                                </div>
                            </div>
                            <div id="webcam_input_div" align="center" ></div>
                        </td>
                        <td align="right">
                            <input type="submit" value="" alt="WEB" class="frm-btn-webcam24" 
                                   id="WebcamButt" name="WebcamButt" size="1" 
                                   onclick="chngStockImgLoadOpt(this.alt, '<?php echo $commonPanel; ?>', '', '<?php echo $documentRootBSlash; ?>');
                                               return false;" 
                                   onsubmit="return false;"/>
                        </td>
                </table>
            </td>

        </tr>

    </table>

    <?php
} else {
//    
    if ($selFirmId == '' || $selFirmId == NULL || $selFirmId == 'undefined') {
        $selFirmId = $_REQUEST['selFirmId'];
    }
//    
    $listPanel = $_REQUEST['listPanel'];
    ?>
    <table align="center" border="0" cellspacing="0" cellpadding="2" width="100%">
        <tr class="portlet yellow box">
            <td align="center" title="Select Date Here" class="textLabel12CalibriBrown" width="200px">
                BILL DATE
            </td>
            <td align="center" class="textLabel12CalibriBrown" width="196px">
                FIRM
            </td>

            <td align="center" class="textLabel12CalibriBrown" width="200px">
                BRAND/SELLER NAME
            </td>
        </tr>
        <tr>
            <td align="center">
                <table align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" title="SELECT DATE HERE!" class="margin1pxAll">
                            <!-- Start Code to Define Hidden inputs -->
                            <input type="hidden" id="rwprId" name="rwprId" value="<?php echo $sttr_id; ?>" />
                            <input type="hidden" id="rwmtdrId" name="rwmtdrId" value="<?php echo $rwmtdr_id; ?>"/>
                            <input type="hidden" id="metalRateCalculation" name="metalRateCalculation" value="<?php echo $metalRateCal; ?>"/>
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
                                    class="select-control-req-height20">
                                <option value="NotSelected">DAY</option>
                                <?php
                                for ($dd = 0; $dd <= 30; $dd++) {
                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                }
                                ?>
                            </select> 
                            </div>
                            <!-- *************** Bill Code for Month *************** -->
                            <?php
                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter
                            $optMonth[$todayMM] = "selected";
                            ?> 
                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD  -->
                            <select id="addItemDOBMonth" name="addItemDOBMonth" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('addItemDOBYear').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBDay').focus();
                                                    return false;
                                                }
                                                //START CODE TO GET MONTH FROM KEYS
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
                                                } //END CODE TO GET MONTH FROM KEYS"
                                    class="select-control-req-height20">
                                <option value="NotSelected">MON</option>
                                <?php
                                for ($mm = 0; $mm <= 11; $mm++) {
                                    echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                }
                                ?>
                            </select> 
                            <!-- *************** Start Code for Year *************** -->
                            <?php
                            $todayYear = date(Y); //chnaged
                            $optYear[$selDOBYear] = "selected";
                            ?> 
                            <select id="addItemDOBYear" name="addItemDOBYear"
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('firmId').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                                    document.getElementById('addItemDOBMonth').focus();
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
            <td align="center" title="FIRM">
                <div id="addStockItemFirmDiv">
                    <?php
                    $nextFieldId = 'sttr_brand_id';
                    $prevFieldId = 'addItemDOBYear';
                    $firmIdDivClass = 'form-control-req-height20';
                    $panelName = 'addRawStock';
                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                        $firmIdSelected = $_SESSION['setFirmSession'];
                    }
                    if (!$firmIdSelected) {
                        $firmIdSelected = $_SESSION['setFirmSession'];
                    }
                    include 'omffrasp.php';
                    ?>
                </div>
            </td>
            <td align="center" title="BRAND/SELLER" >
                <?php // echo '$userId:'.$userId;     ?>
                <input id="addItemSuppId" name="addItemSuppId" value="<?php echo $userId; ?>" type="hidden"/>
                <input id="sttr_brand_id" name="sttr_brand_id" type="text" placeholder="BRAND/SELLER" 
                       value="<?php echo $sttr_brand_id; ?>" 
                       onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 9) {
                                       clearSearchSuppPanel();
                                       document.getElementById('sttr_metal_type').focus();
                                       return false;
                                   } else if (event.keyCode == 8 && this.value == '') {
                                       clearSearchSuppPanel();
                                       document.getElementById('firmId').focus();
                                       return false;
                                   }"
                       onclick="this.value = '';
                                   clearSearchSuppPanel();"
                       onblur="if (this.value == '')
                                       this.value = '<?php echo $sttr_brand_id; ?>';"
                       onkeyup="javascript:if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                       searchSuppIdForTextField(document.getElementById('sttr_brand_id').value, event.keyCode);
                                   }"
                       autocomplete="off" spellcheck="false" class="form-control-height20 align_center" size="15" maxlength="50" />
                <div id="suppListDivToAddItemStock" class="suppRawListDivToAddStock"></div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="7" class="paddingTopBott5">
                <div class="hrGold"></div>
            </td>
        </tr>
    </table>
<?php } ?>