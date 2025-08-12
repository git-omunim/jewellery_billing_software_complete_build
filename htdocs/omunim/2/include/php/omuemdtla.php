<?php
/*
 * **************************************************************************************
 * @tutorial: udhaar emi details
 * **************************************************************************************
 * 
 * Created on Nov 13, 2014 5:38:25 PM
 *
 * @FileName: omuemdtla.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
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
<?php
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php'; //added @Author:SHRI13JUN15
?>
<div id="girviDetailsDiv">
    <div class="textBoxCurve1px backFFFFFF paddingTop2 paddingBott2 paddingLeft2 paddingRight2">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <td valign="top" class="ff_arial fs_14 fw_b paddingTop2">
                <?php echo $udCounter . '.'; ?>
            </td>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left" valign="top" colspan="10">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>    
                                                <td align="left" valign="bottom" class="ff_calibri fs_13 brown">UDHAAR AMOUNT:</td>
                                                <td align="right" valign="middle" class="paddingLeft5 ff_calibri fs_14" title="Click to update udhaar details ! ">
                                                    <a style="cursor:pointer;" onclick="getUdhaarUpdateDiv('<?php echo $udhaarId; ?>', 'UdhaarWithEMI');"><?php echo $udhaarAmount; ?>
                                                    </a>
                                                </td>
                                                <td align="right" valign="bottom"><div class="spaceLeft30 ff_calibri fs_13 brown">UDHAAR DATE:</div></td>
                                                <td align="left" valign="bottom"><div class="spaceLeft5"><?php echo $udhaarDOB; ?></div></td>
                                                <td align="right" valign="bottom" class="ff_calibri fs_13 brown"><div class="spaceLeft30">UDHAAR TYPE:</div></td>
                                                <td align="left" valign="bottom"><div class="spaceLeft5"><?php echo $udhaarType; ?></div></td>
<!--                                                <td align="right" valign="bottom" class="ff_calibri fs_13 brown"><div class="spaceLeft30">DEPOSIT OPTION:</div></td>-->
<!--                                                <td align="left" valign="bottom"><div class="ff_calibri fs_13 selectStyledNoBack bg_yellow">
                                                        <select id="udhaarDepOpt" name="udhaarDepOpt" 
                                                                class="">
                                                <?php
//                                                                        $optionTyp = array(Divide, Adjust);
//                                                                        for ($j = 0; $j <= 1; $j++)
//                                                                            if ($optionTyp[$j] == $udhaarDepOpt)
//                                                                                $optionDepTypSel[$j] = 'selected';
                                                ?>
                                                            <option value="NotSelected">OPTION</option>
                                                            <option value="Divide" >DIVIDE</option>
                                                            <option value="Adjust" selected>ADJUST</option>

                                                        </select> 
                                                <?php $optDay = ""; ?>
                                                    </div></td>-->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" class="paddingTop4">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>  
                                                <td align="left" valign="top" class="ff_calibri fs_13 brown fw_b" width="65px">EMI NO</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="130px">START DATE</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="150px">DUE DATE</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="150px">PRIN AMT</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="150px">INT AMT</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b paddingRight5" width="150px">EMI AMT</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="150px">PAID</td>
                                                <td align="right" valign="top" class="ff_calibri fs_13 brown fw_b" width="150px">LEFT</td>
                                                <td align="center" valign="top" class="ff_calibri fs_13 brown fw_b" width="50px"></td>
                                                <td align="center" valign="top" class="ff_calibri fs_13 brown fw_b" width="170px">PAID DATE</td>
                                                <td align="center" valign="top" class="ff_calibri fs_13 brown fw_b" width="80px">STATUS</td>
                                            </tr>
                                            <tr>  
                                                <?php
                                                $emiTotalAmt = 0;
                                                $emiTotAmt = 0;
                                                $emiIntAmt = 0;
                                                $qSelAllUdhaarDepMon = "SELECT * FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId' order by (udhadepo_EMI_no + udhadepo_id) asc";
                                                $resAllUdhaarDepMon = mysqli_query($conn,$qSelAllUdhaarDepMon);
                                                $emiEntryPresent = mysqli_num_rows($resAllUdhaarDepMon);
                                                $emiPaidTotal = 0;
                                                $udhaarDepHistory = '';
                                                $todayDate = date('d M Y');


                                                while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                                                    $udhaarDepId = $rowUdhaarDepMon['udhadepo_id'];
                                                    $udhaarEMISatus = $rowUdhaarDepMon['udhadepo_EMI_status'];
                                                    $totalEMIAmt = $rowUdhaarDepMon['udhadepo_EMI_total_amt'];
                                                    $udEMIAmt = $rowUdhaarDepMon['udhadepo_EMI_amt'];
                                                    $intAmt = $rowUdhaarDepMon['udhadepo_EMI_int_amt'];
                                                    $udhaarDepHistory = $udhaarDepHistory . $rowUdhaarDepMon['udhadepo_history'];
                                                    $emiStartDate = $rowUdhaarDepMon['udhadepo_EMI_start_DOB'];
                                                    $dueDate = $rowUdhaarDepMon['udhadepo_EMI_end_DOB'];
                                                    $emiNo = $rowUdhaarDepMon['udhadepo_EMI_no'];
                                                    $uDepJrnlId = $rowUdhaarDepMon['udhadepo_jrnl_id'];
                                                    $emiTotalAmt += $totalEMIAmt;
                                                    $emiPaidDate = $rowUdhaarDepMon['udhadepo_EMI_paid_date'];
                                                    $paidAmt = $rowUdhaarDepMon['udhadepo_paid_amt'];
                                                    $amtLeft = $rowUdhaarDepMon['udhadepo_amt_left'];

                                                    if ($emiPaidDate != '') {
                                                        $selDOBDay = substr($emiPaidDate, 0, 2);
                                                        $selDOBMnth = substr($emiPaidDate, 3, -5);
                                                        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                                                        $selDOBYear = substr($emiPaidDate, -4);
                                                    } else {
                                                        $selDOBDay = date(j);
                                                        $todayMM = date(n) - 1;
                                                        $selDOBYear = date(Y);
                                                    }
                                                    if ($udhaarEMISatus == 'Paid') {
                                                        $dropDownClass = "bg_green";
                                                        $emiPaidTotal += $totalEMIAmt;
                                                    } else if (strtotime($todayDate) > strtotime($dueDate)) {
                                                        $dropDownClass = "bg_red";
                                                    } else
                                                        $dropDownClass = "bg_yellow";
//                                                    echo $udhaarEMISatus;

                                                    if ($udhaarEMISatus != 'Paid') {
                                                        $emiTotAmt += $udEMIAmt;
                                                        $emiIntAmt += $intAmt;
//                                                        echo '$emiTotAmt=='.$emiTotAmt;
                                                    }
                                                    $tmpEMINo = $emiNo;
                                                    /**                                                     * ***************** Start code to add condition and query to get previous udhaar deposit EMI status @Author:SHRI13JUN15 ********************** */
//                                                    echo $emiNo.'<br>';
                                                    if ($emiNo == 1) {
                                                        $prevUdhaDepEMIStatus = '';
                                                    } else {
                                                        $uDepId = $udhaarDepId - 1;
                                                        parse_str(getTableValues("SELECT udhadepo_EMI_status FROM udhaar_deposit WHERE udhadepo_id='$uDepId' and udhadepo_own_id='$_SESSION[sessionOwnerId]'"));
                                                        $prevUdhaDepEMIStatus = $udhadepo_EMI_status;
                                                    }
                                                    /**                                                     * ***************** End code to add condition and query to get previous udhaar deposit EMI status @Author:SHRI13JUN15 ********************** */
//                                                     echo '$emiTotAmt=='.$emiTotAmt;
                                                    ?>
                                                <input type="hidden" value="<?php echo $prevUdhaDepEMIStatus; ?>" id="prevEMIStatus<?php echo $udhaarDepId; ?>" name="prevEMIStatus<?php echo $udhaarDepId; ?>" />
                                                <td align="left" valign="top" class="ff_calibri fs_13 paddingLeft20"><?php echo $emiNo; ?></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13"><?php echo om_strtoupper($emiStartDate); ?></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13"><?php echo om_strtoupper($dueDate); ?></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13"><?php echo formatInIndianStyle($udEMIAmt); ?></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13"><?php echo formatInIndianStyle($intAmt); ?></td>

                                                <!---------------Start to change code to add code for update udhaar EMI amount @Author:SHRI11JUN15--------------->
                                                <td align="right" valign="top" class="ff_calibri fs_13" title='<?php echo ' Amount: ' . $udEMIAmt . ' Interest: ' . $intAmt; ?>'>
                                                    <?php echo formatInIndianStyle($totalEMIAmt); ?></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13">
                                                    <?php
                                                    //echo '0!='.(0==NULL);
                                                    if ($paidAmt != '' || $paidAmt != NULL) {
                                                        echo formatInIndianStyle($paidAmt);
                                                    } else {
                                                        ?>
                                                        <input type="button" value="PAYMENT" <?php if ($udhaarEMISatus != 'Paid') { ?>  style="cursor: pointer;" onclick="document.getElementById('udhaDepAmtUpadateDiv<?php echo $udhaarDepId; ?>').style.visibility = 'visible';
                                                                            document.getElementById('updateUdhaDepAmt<?php echo $udhaarDepId; ?>').focus();
                                                                            document.getElementById('updateUdhaDepAmtROIButton<?php echo $udhaarDepId; ?>').style.visibility = 'visible';
                                                                            document.getElementById('updateUdhaDepAmtCloseButton<?php echo $udhaarDepId; ?>').style.visibility = 'visible';" <?php } ?> 
                                                               class="frm-btn-without-border spaceleft20" />
                                                           <?php } ?>
                                                    <div id="udhaDepAmtUpadateDiv<?php echo $udhaarDepId; ?>" class="udhdepamt-Upadate-Div" style="visibility: hidden">
                                                        <table border="0" cellpadding="2" cellspacing="0" >
                                                            <tr> 
                                                                <td align="center" valign="top" title="Enter EMI Deposit Amount" width="100px">
                                                                    <input id="updateUdhaDepAmt<?php echo $udhaarDepId; ?>" name="updateUdhaDepAmt<?php echo $udhaarDepId; ?>" type="text"
                                                                           spellcheck="false" class="lgn-txtfield" size="8" maxlength="8" placeholder="PRIN AMT"/>
                                                                </td>
                                                                <td align="left" valign="top" title="Enter EMI Interest Amount" width="50px">
                                                                    <input id="updateUdhaDepIntAmt<?php echo $udhaarDepId; ?>" name="updateUdhaDepIntAmt<?php echo $udhaarDepId; ?>" type="text"
                                                                           spellcheck="false" class="lgn-txtfield" size="6" maxlength="8" placeholder="INT AMT"/>
                                                                </td>
                                                                <td align="right" valign="top" >
                                                                    <div id="updateUdhaDepAmtCloseButton<?php echo $udhaarDepId; ?>" >
                                                                        <a style="cursor: pointer;" onclick="document.getElementById('udhaDepAmtUpadateDiv<?php echo $udhaarDepId; ?>').style.visibility = 'hidden';
                                                                                    document.getElementById('updateUdhaDepAmtROIButton<?php echo $udhaarDepId; ?>').style.visibility = 'hidden';
                                                                                    document.getElementById('updateUdhaDepAmtCloseButton<?php echo $udhaarDepId; ?>').style.visibility = 'hidden';">
                                                                            <img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" class="margin-5" alt="Update Udhaar EMI Amount" title="Click Here to Close Udhaar EMI Amount Box" style="margin-top: -12px;margin-left: 20px;" />
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <!---------Start code to add var for sys log @Author:PRIYA02JUL14-------------->
                                                                <td align="center" valign="middle">
                                                                    <div id="updateUdhaDepAmtROIButton<?php echo $udhaarDepId; ?>">
                                                                        <input type="button" class="frm-btn-without-border spaceleft20" style="cursor: pointer;" onclick="javascript:updateUdhaDepAmt(document.getElementById('DOBDay<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').value, '<?php echo $documentRoot; ?>', '<?php echo $custId; ?>',
                                                                                            '<?php echo $udhaarId; ?>', '<?php echo $udhaarDepId; ?>', document.getElementById('updateUdhaDepIntAmt<?php echo $udhaarDepId; ?>').value, document.getElementById('updateUdhaDepAmt<?php echo $udhaarDepId; ?>').value,
                                                                                            '<?php echo $firmId; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', this.value);" value="PAYMENT"/>

                                                                    </div>

                                                                </td>
    <!--                                                                <td> OR </td>-->
                                                                <td align="right" valign="middle">

                                                                    <div id="updateUdhaDepAmtROIButton<?php echo $udhaarDepId; ?>">
                                                                        <input type="button" class="frm-btn-without-border spaceleft20" style="cursor: pointer;" onclick="javascript:updateUdhaDepAmt(document.getElementById('DOBDay<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').value, '<?php echo $documentRoot; ?>', '<?php echo $custId; ?>',
                                                                                            '<?php echo $udhaarId; ?>', '<?php echo $udhaarDepId; ?>', document.getElementById('updateUdhaDepIntAmt<?php echo $udhaarDepId; ?>').value, document.getElementById('updateUdhaDepAmt<?php echo $udhaarDepId; ?>').value,
                                                                                            '<?php echo $firmId; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', this.value);" value="DIVIDE"/>


                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!---------End code to add var for sys log @Author:PRIYA02JUL14-------------->

                                                        </table>
                                                    </div></td>
                                                <td align="right" valign="top" class="ff_calibri fs_13"><?php echo formatInIndianStyle($amtLeft); ?></td>
                                                <!---------------End to change code to add code for update udhaar EMI amount @Author:SHRI11JUN15--------------->
                                                <td align="center" valign="top" class="ff_calibri fs_13 brown fw_b" width="50px"></td>
                                                <td align="center" valign="top">
                                                    <div class="textBoxCurve1px margin2pxAll backFFFFFF" style="height:23px;width: 170px;">
                                                        <?php
                                                        $class = 'textLabel14CalibriGrey';
                                                        $todayDay = $selDOBDay - 1;
                                                        $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                            '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                        $optDay[$todayDay] = "selected";
                                                        ?>
                                                        <div class="selectStyledBorderLess background_transparent floatLeft">
                                                            <select id="DOBDay<?php echo $udhaarDepId . $emiNo; ?>" name="DOBDay<?php echo $udhaarDepId . $emiNo; ?>" onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').focus();
                                                                            return false;
                                                                        }
                                                                        else if (event.keyCode == 8) {
                                                                            document.getElementById('udhaarMainAmount').focus();
                                                                            return false;
                                                                        }" class="<?php echo $class; ?>">
                                                                <option value="NotSelected">DD</option>
                                                                <?php
                                                                for ($dd = 0; $dd <= 30; $dd++) {
                                                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                }
                                                                ?>
                                                            </select> 
                                                            <?php $optDay = ""; ?>
                                                        </div>
                                                        <?php
                                                        $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                                        $optMonth[$todayMM] = "selected";
                                                        ?> 
                                                        <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                                        <div class="selectStyledBorderLess background_transparent floatLeft">
                                                            <select  id="DOBMonth<?php echo $udhaarDepId . $emiNo; ?>" name="DOBMonth<?php echo $udhaarDepId . $emiNo; ?>" 
                                                                     onkeydown="javascript: if (event.keyCode == 13) {
                                                                                     document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').focus();
                                                                                     return false;
                                                                                 }
                                                                                 else if (event.keyCode == 8) {
                                                                                     document.getElementById('DOBDay<?php echo $udhaarDepId . $emiNo; ?>').focus();
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
                                                                                 } //END CODE TO GET MONTH FROM KEYS @AUTHOR: SANDY21AUG13" 
                                                                     class="<?php echo $class; ?>">
                                                                <option value="NotSelected">MMM</option>
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
                                                            <?php $optMonth = ""; ?>
                                                        </div>
                                                        <?php
                                                        $todayYear = date(Y);
                                                        $optYear[$selDOBYear] = "selected";
                                                        ?> 
                                                        <div class="selectStyledBorderLess background_transparent floatLeft">
                                                            <select id="DOBYear<?php echo $udhaarDepId . $emiNo; ?>" name="DOBYear<?php echo $udhaarDepId . $emiNo; ?>" onkeydown="javascript: if (event.keyCode == 13) {
                                                                            document.getElementById('interestType').focus();
                                                                            return false;
                                                                        }
                                                                        else if (event.keyCode == 8) {
                                                                            document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').focus();
                                                                            return false;
                                                                        }" class="<?php echo $class; ?>">
                                                                <option value="NotSelected">YYYY</option>
                                                                <?php
                                                                for ($yy = $todayYear + 1; $yy >= 1900; $yy--) {
                                                                    echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <?php $optYear = ""; ?>
                                                    </div>
                                                </td>
                                                <td align="center" valign="top">
                                                    <div class="ff_calibri fs_13 textBoxCurve1px selectStyledNoBack <?php echo $dropDownClass; ?>" style="height:20px;width: 60px;">
                                                        <?php if ($paidDiv == 'PaidDiv') { ?>
                                                            <select disabled="disabled" id="udDepEMIStatus" name="udDepEMIStatus" class=""
                                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                                        document.getElementById('selROIValue').focus();
                                                                                        return false;
                                                                                    }
                                                                                    else if (event.keyCode == 8) {
                                                                                        document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').focus();
                                                                                        return false;
                                                                                    }"
                                                                    onchange="return passEMIValues('<?php echo $emiNo; ?>', document.getElementById('DOBDay<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').value,
                                                                                            '<?php echo $totalEMIAmt; ?>', this.value, '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', '<?php echo $udhaarCustId; ?>', '<?php echo $firmId; ?>',
                                                                                            '<?php echo $udhaarId; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarDepId; ?>', '<?php echo $uDepJrnlId; ?>', '<?php echo $udhaarEMIOccur; ?>', '<?php echo $intAmt; ?>', '<?php echo $udEMIAmt; ?>');">
                                                                        <?php
                                                                        $statusTyp = array(Due, Paid);
                                                                        for ($j = 0; $j <= 1; $j++)
                                                                            if ($statusTyp[$j] == $udhaarEMISatus)
                                                                                $optionStatusTypSel[$j] = 'selected';
                                                                        ?>
                                                                <option value="Due" <?php echo $optionStatusTypSel[0]; ?>>DUE</option>
                                                                <option value="Paid" <?php echo $optionStatusTypSel[1]; ?>>PAID</option>
                                                                <?php $optionStatusTypSel = ""; ?>
                                                            </select>
                                                            <input  id="udDepEMIStatus" name="udDepEMIStatus" type="hidden" value="<?php echo $udhaarEMISatus; ?>"   />
                                                        <?php } ?>
                                                        <select id="udDepEMIStatus" name="udDepEMIStatus" class=""
                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                document.getElementById('selROIValue').focus();
                                                                                return false;
                                                                            }
                                                                            else if (event.keyCode == 8) {
                                                                                document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').focus();
                                                                                return false;
                                                                            }"
                                                                onchange="return passEMIValues('<?php echo $emiNo; ?>', document.getElementById('DOBDay<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBMonth<?php echo $udhaarDepId . $emiNo; ?>').value, document.getElementById('DOBYear<?php echo $udhaarDepId . $emiNo; ?>').value,
                                                                                    '<?php echo $totalEMIAmt; ?>', this.value, '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', '<?php echo $udhaarCustId; ?>', '<?php echo $firmId; ?>',
                                                                                    '<?php echo $udhaarId; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarDepId; ?>', '<?php echo $uDepJrnlId; ?>', '<?php echo $udhaarEMIOccur; ?>', '<?php echo $intAmt; ?>', '<?php echo $udEMIAmt; ?>', document.getElementById('prevEMIStatus<?php echo $udhaarDepId; ?>').value, '<?php echo $udhaarEMISatus; ?>');">
                                                                    <?php
                                                                    $statusTyp = array(Due, Paid);
                                                                    for ($j = 0; $j <= 1; $j++)
                                                                        if ($statusTyp[$j] == $udhaarEMISatus)
                                                                            $optionStatusTypSel[$j] = 'selected';
                                                                    ?>
                                                            <option value="Due" <?php echo $optionStatusTypSel[0]; ?>>DUE</option>
                                                            <option value="Paid" <?php echo $optionStatusTypSel[1]; ?>>PAID</option>
                                                            <?php $optionStatusTypSel = ""; ?>
                                                        </select>
                                                    </div>
                                                </td>   
                                    </tr>
                                    <?php
                                }
//                                            echo '$emiTotAmt==' . $emiTotAmt . '<br />';
                                $totalUdhaarTotalDepAmount += $emiPaidTotal;
                                ?>
                                <input type="hidden" value="<?php echo $emiTotAmt; ?>" id="totEMIAmt<?php echo $udhaarId; ?>" name="totEMIAmt<?php echo $udhaarId; ?>" />
                                <input type="hidden" value="<?php echo $emiIntAmt; ?>" id="totEMIIntAmt<?php echo $udhaarId; ?>" name="totEMIIntAmt<?php echo $udhaarId; ?>" />
                                <tr>  
                                    <td align="left" valign="top" class="ff_calibri fs_13 paddingLeft20"></td>
                                    <td align="right" valign="top" class="ff_calibri fs_13"></td>
                                    <td align="right" valign="top" class="ff_calibri fs_13"></td>
                                    <td align="right" valign="top" class="ff_calibri fs_13"></td>
                                    <td align="right" valign="top" class="ff_calibri fs_13"></td>
                                    <td align="right" valign="top" class="ff_calibri fs_13 border_top_palegrey_1px"><?php echo formatInIndianStyle($emiTotalAmt); ?></td>
                                    <td align="center" valign="top" class="ff_calibri fs_13 brown fw_b" width="50px"></td>
                                    <td align="center" valign="top"></td>
                                    <td align="center" valign="top" class="ff_calibri fs_13"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                    if ($udhaarEMIStatus == 'Paid')
                        $udhaarAmtLeft = 0;
                    else
                        $udhaarAmtLeft = $emiTotalAmt - $emiPaidTotal;
                    ?>
                    <tr>
                        <td align="left" colspan="2" class="paddingTop4 padBott4">
                            <div class="hrGrey"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="paddingTop4">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>  
                                    <td align="right" valign="bottom" class="ff_calibri fs_13 greenFont">UDHAAR AMOUNT LEFT:</td>
                                    <td align="right" valign="top" class="ff_calibri fs_14 greenFont">
                                        <div class="spaceLeft5"><?php echo $udhaarAmtLeft; ?></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
            <tr>
                <td align="left" valign="top" colspan="4" class="paddingTop4"> 
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>  
                            <td align="left" width="60px"  valign="top">
                                <h4 class="fw_b">HISTORY -</h4>
                            </td>
                            <td align="left">
                                <div id="ajaxLoadUdhaarDepositMon<?php echo "$udhaarId"; ?>" style="visibility: hidden" align="left">
                                    <?php include 'omzaajld.php'; ?>
                                </div>
                            </td>
                            <td align="right" width="70px">
                                <input type="submit" value="DELETE" 
                                       onclick="javascript:deleteCustUdhaarDetails('<?php echo $custId; ?>', '<?php echo "$firmId"; ?>', '<?php echo $udhaarId; ?>', '<?php echo $udhaarJrnlId; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarAmount; ?>');"
                                       class="frm-btn-without-border spaceleft20" />
                            </td>
                            <?php
                            $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$_SESSION[sessionOwnerId]' and omly_option = 'udhaarNoticeLay'";
                            $resFormsLayoutDet = mysqli_query($conn,$selFormsLayoutDet);
                            $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                            $udhaarNoticeLay = $rowFormsLayoutDet['omly_value'];
                            if ($udhaarNoticeLay == 'udhaarNoticeLay4Inch' || $udhaarNoticeLay == 'udhaarNoticeLayA6') {
                                $width = 420;
                                $height = 660;
                            } else {
                                $width = 550;
                                $height = 630;
                            }
                            ?>
                            <td align="center" width="30px" valign="bottom">
                                <a style="cursor: pointer;" 
                                   onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omuunote.php?custId=<?php echo "$custId"; ?>&udhaarId=<?php echo "$udhaarId"; ?>&udhaarAmtLeft=<?php echo "$udhaarAmtLeft"; ?>',
                                                   'popup', 'width=<?php echo $width; ?>, height =<?php echo $height; ?>, scrollbars = yes, resizable = yes, toolbar = no, directories = no, location = no, menubar = no, status = no, left = 0, top = 0');
                                           return false" >
                                    <img src="<?php echo $documentRoot; ?>/images/udhaarNotice32.png" alt='Udhaar Notice' title='Udhaar Notice' valign="bottom"
                                         width="20px" height="20px"   class="paddingTop3"/> 
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <div class="spaceLeft10 ff_calibri fs_13"><?php echo $udhaarHistory; ?></div>
                </td>
            </tr>
            <?php
            $qSelAllUdhaarDepMon = "SELECT udhadepo_history FROM udhaar_deposit where udhadepo_own_id='$_SESSION[sessionOwnerId]' and udhadepo_udhaar_id='$udhaarId' order by udhadepo_ent_dat asc";
            $resAllUdhaarDepMon = mysqli_query($conn,$qSelAllUdhaarDepMon);
            $udhaarDepHistory = '';
            while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                $udhaarDepHistory = $udhaarDepHistory . $rowUdhaarDepMon['udhadepo_history'];
            }
            ?>
            <tr>
                <td align="left" colspan="2">
                    <div class="spaceLeft10"><h5><?php echo $udhaarDepHistory; ?></h5></div>
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <div class="spaceLeft10 ff_calibri fs_14 blueFont"><?php echo $udhaarComm; ?></div>
                </td>
            </tr>
            <?php if ($udhaarOtherInfo != '') { ?>
                <tr>
                    <td align="left" colspan="2">
                        <h4>Other Info -</h4><div class="main_link_blue_Arial"><?php echo $udhaarOtherInfo; ?></div>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td align="left" colspan="2">
                    <div id="udhaarDepositMoneyDiv<?php echo "$udhaarId"; ?>" class="spaceLeft10">
                    </div>
                </td>
            </tr>
        </table>
        </td>
        </table>
    </div>
</div>
<br/>
