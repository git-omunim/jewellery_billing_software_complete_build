<?php
/*
 * **************************************************************************************
 * @Description: Girvi panel loan settled file
 * **************************************************************************************
 *
 * Created on Sep 8, 2015 3:28:55 PM
 *
 * @FileName: orgplnstl.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 1.0.0
 * Version: 1.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
//echo '$ltran_amt_left='.$ltran_amt_left;
?>
<td align="left" class="noPrint">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left">
                <form name="settle_all_loan" id="settle_all_loan"
                      enctype="multipart/form-data" method="post"
                      action="include/php/orgpslad.php"   
                      onsubmit="return settleLoans();">  
                    <table border="0" cellspacing="0" cellpadding="0">
                        <?php // echo '$totBal=='.$totBal;?>
                        <input type="hidden" id="allGTransIds" name="allGTransIds" value="<?php echo $allGTransId; ?>" />
                        <input type="hidden" id="upPanelName" name="upPanelName" value="<?php echo $upPanelName; ?>" />
                        <input type="hidden" id="lTransId" name="lTransId" value="<?php echo $ltranId; ?>" />
                        <input type="hidden" id="totalBal" name="totalBal" value="<?php echo $totBal; ?>" />
                        <tr>
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft80 tnr_nr_12_red">
                                    DATE: 
                                </div>
                            </td>
                            <td valign="middle" align="left" class="margin1pxAll">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td valign="middle" align="left" class="margin1pxAll">
                                            <!-- *************** Start Code for dayDD *************** -->
                                            <?php
                                            $todayDay = date('d') - 1;
                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <select id="stlTransDOBDay" name="stlTransDOBDay" title="DAY"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('addItemDOBMonth').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                return false;
                                                            }"
                                                    class="form-control-req-height20">
                                                <option value="NotSelected">DAY</option>
                                                <?php
                                                for ($dd = 0; $dd <= 30; $dd++) {
                                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                }
                                                ?>
                                            </select> 
                                        </td>
                                        <td valign="middle" align="left" class="margin1pxAll">
                                            <!-- *************** Bill Code for Month *************** -->
                                            <?php
                                            $todayMM = date('m') - 1;
                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                            $optMonth[$todayMM] = "selected";
                                            ?> 
                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                            <select id="stlTransDOBMonth" name="stlTransDOBMonth" title="MONTH"
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
                                                    class="form-control-req-height20">
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
                                        </td>
                                        <td valign="middle" align="left" class="margin1pxAll">
                                            <!-- *************** Start Code for Year *************** -->
                                            <?php
                                            $todayYear = date(Y); //chnaged @Author:PRIYA30APR14
                                            $optYear[$todayYear] = "selected";
                                            ?> 
                                            <select id="stlTransDOBYear" name="stlTransDOBYear" title="YEAR"
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('addItemSuppName').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('addItemDOBMonth').focus();
                                                                return false;
                                                            }"
                                                    class="form-control-req-height20">
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
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft20 tnr_nr_12_red">
                                    SETTLED AMOUNT: 
                                </div>
                            </td>
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft20">
                                    <input id="stlTransAmount" name="stlTransAmount" type="text" value="<?php
                                    if ($ltran_settle_amt != '') {
                                        echo $ltran_settle_amt;
                                    }
                                    ?>" placeholder="SETTLED AMOUNT" size="15" maxlength="20" class="form-control-req-height20 align_center"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                                           onkeyup="javascript:calcGirviBal();"  />
                                </div>
                            </td>
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft20 tnr_nr_12_red">
                                    BALANCE LEFT: 
                                </div>
                            </td>
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft20">
                                    <input id="stlTransAmountLeft" name="stlTransAmountLeft" type="text" value="<?php echo $ltran_amt_left; ?>" placeholder="BALANCE LEFT" size="15" maxlength="20" class="form-control-req-height20 align_center"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);" readonly="true" />
                                </div>
                            </td>
                            <td valign="middle" align="left" class="itemAddPnLabels14">
                                <div class="spaceLeft20">
                                    <input id="stlTransSubBtn" name="stlTransSubBtn" type="submit" value="<?php
                                    if ($upPanelName == 'updateSettledLoans') {
                                        echo 'UPDATE';
                                    } else {
                                        echo 'SETTLE';
                                    }
                                    ?>" size="15" maxlength="20" class="frm-btn" />

                                </div>
                            </td>
                        </tr>

                    </table>
                </form>
            </td>
        </tr>

    </table>
</td> 