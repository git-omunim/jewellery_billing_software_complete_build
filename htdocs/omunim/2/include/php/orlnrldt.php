<?php
/* Release Loan Sub Panel @AUTHOR: SANDY27NOV13
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: orlnrldt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: eMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//CHNAGE IN FILE @AUTHOR: SANDY31JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<div id="loanDetailsToReleaseDiv" class="spaceLeftRight10">
    <table border="0" cellpadding="2" cellspacing="2" width="100%">
        <tr align="left">
            <td width="100%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" valign="top" width="200px"> 
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>  
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        PRINCIPAL AMOUNT
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" width="235px" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF">
                                        <?php echo $globalCurrency . ' ' . $mainPrincAmount ?>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        RATE OF INTEREST
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top"> 
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr> 
                                                <td align="center" valign="middle" width="150px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                                    <div id="ROIOption">
                                                        <?php
                                                        /* if ($selInerestType == 'Annually') {
                                                          include 'olggroia.php'; //change in filename @AUTHOR: SANDY20NOV13
                                                          } else if ($selInerestType == 'Monthly') {
                                                          include 'olggroim.php'; //change in filename @AUTHOR: SANDY20NOV13
                                                          } */
                                                        include 'olggroaa.php'; //@AUTHOR: SANDY02JAN14
                                                        ?>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div id="selTROIChangeDiv" style="visibility: hidden" class="girvi_head_blue_right">
                                                        <img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                                                    
                            </table>
                        </td>
                        <td align="center" valign="top" width="240px"> 
                            <table border="0" cellpadding="1" cellspacing="0">
                                <tr align="center">
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        LOAN DATE
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" width="120px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                        <?php echo $girviNewDOB ?>
                                    </td>
                                </tr>
                                <?php if ($girviUpdSts == 'Released') { ?> 
                                    <tr align="center">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            RELEASED DATE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="120px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php echo $girviDOR; ?>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            SELECT RELEASED DATE
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF" width="190px"><!--change in width @AUTHOR: SANDY21JAN14--->
                                            <!-- *************** Start Code for dayDD *************** -->
                                            <?php
                                            $todayDay = date(j) - 1;
                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                            $optDay[$todayDay] = "selected";
                                            ?> 
                                            <div class="selectStyledBorderLess background_transparent floatLeft">
                                                <select id="mlRelLnDOBDay" name="mlRelLnDOBDay" 
                                                        onchange="changeLoanReleaseDate('<?php echo $documentRoot; ?>', this.value, document.getElementById('mlRelLnDOBMonth').value, document.getElementById('mlRelLnDOBYear').value, document.getElementById('selTROI'), document.getElementById('monthlyInterestType'), document.getElementById('simpleOrCompIntOption'), document.getElementById('girviCompoundedOption'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>');"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('mlRelLnDOBMonth').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8) {
                                                                        document.getElementById('selROI').focus();
                                                                        return false;
                                                                    }"
                                                        class ="textLabel14CalibriGrey">
                                                    <option value="NotSelected">DAY</option>
                                                    <?php
                                                    for ($dd = 0; $dd <= 30; $dd++) {
                                                        echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                    }
                                                    ?>
                                                </select> 
                                            </div>
                                            <!-- *************** Start Code for Month *************** -->
                                            <?php
                                            $todayMM = date("n") - 1;
                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC); //change in month names upto 3 letter @AUTHOR: SANDY21AUG13
                                            $optMonth[$todayMM] = "selected";
                                            ?> 
                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> <!-- Rel INPUT FIELD @AUTHOR: SANDY21AUG13 -->
                                            <div class="selectStyledBorderLess background_transparent floatLeft">
                                                <select id="mlRelLnDOBMonth" name="mlRelLnDOBMonth" 
                                                        onchange="changeLoanReleaseDate('<?php echo $documentRoot; ?>', document.getElementById('mlRelLnDOBDay').value, this.value, document.getElementById('mlRelLnDOBYear').value, document.getElementById('selTROI'), document.getElementById('monthlyInterestType'), document.getElementById('simpleOrCompIntOption'), document.getElementById('girviCompoundedOption'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>');"
                                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                                        document.getElementById('mlRelLnDOBYear').focus();
                                                                        return false;
                                                                    } else if (event.keyCode == 8) {
                                                                        document.getElementById('mlRelLnDOBDay').focus();
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
                                                        class = "textLabel14CalibriGrey" >
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

                                            <!-- *************** Start Code for Year *************** -->
                                            <?php
                                            $todayYear = date("Y");
                                            $optYear[$todayYear] = "selected";
                                            ?> 
                                            <div class="selectStyledBorderLess background_transparent floatLeft">
                                                <select id="mlRelLnDOBYear" name="mlRelLnDOBYear"
                                                        onkeydown="if (event.keyCode == 8) {
                                                                        document.getElementById('mlRelLnDOBMonth').focus();
                                                                        return false;
                                                                    }"
                                                        onchange="changeLoanReleaseDate('<?php echo $documentRoot; ?>', document.getElementById('mlRelLnDOBDay').value, document.getElementById('mlRelLnDOBMonth').value, this.value, document.getElementById('selTROI'), document.getElementById('monthlyInterestType'), document.getElementById('simpleOrCompIntOption'), document.getElementById('girviCompoundedOption'), '<?php echo $princAmount ?>', document.getElementById('interestType'), '<?php echo $girviNewDOB; ?>', '<?php echo $loanId; ?>', '<?php echo $mlId; ?>', '<?php echo $girviType; ?>', '<?php echo $girviUpdSts; ?>');"
                                                        class = "textLabel14CalibriGrey" >
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
                                <?php } ?>
                            </table>
                        </td>
                        <td align="center" valign="top" width="80px"> 
                            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="middle">
                                        <?php if ($girviUpdSts == 'Released') { ?> 
                                            <div class="girvi_head_red">
                                                <img src="<?php echo $documentRootBSlash; ?>/images/red48.png" 
                                                     alt="Released Girvi" title="Released Girvi" />
                                            </div>
                                        <?php } else { ?>
                                            <div class="girvi_head_green">
                                                <img src="<?php echo $documentRootBSlash; ?>/images/orange48.png" 
                                                     alt="Present Girvi" title="Present Girvi" />
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle">
                                        <div id="ajaxLoadCustGirviDetailsDiv" style="visibility: hidden">
                                            <?php include 'omzaajld.php'; ?>
                                        </div>
                                    </td> 
                                </tr>
                            </table>
                        </td>
                        <td align="center" valign="top" width="200px" rowspan="2"> 
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr align="center">
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        FIRM NAME
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" width="100px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $firmName; ?>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        FIRM LOAN NO.
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" width="100px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $firmLoanNo; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        MONEY LENDER LOAN NO.
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $mlLnNo; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                        CR/DR
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $mlTrType; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="center" valign="top" width="200px" height="100%" rowspan="2"> 
                            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="80%">
                                <tr align="center">
                                    <td align="center" valign="middle" colspan="2" class="textLabel12CalibriBrown">
                                        LOAN SERIAL NO.
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" width="100px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $preSerialNum . $serialNum; ?>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center" valign="middle" colspan="2" class="textLabel12CalibriBrown">
                                        INTEREST OPTION
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="middle">
                                        <div id="troiIntTypeChangeDiv" style="visibility: hidden">
                                            <img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
                                        </div>
                                    </td>
                                    <td align="right" valign="middle" width="105px" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                        <?php
                                        switch ($selInerestType) {
                                            case "Monthly":$optIntType1 = "selected";
                                                break;
                                            case "Annually":$optIntType2 = "selected";
                                                break;
                                        }
                                        ?>
                                        <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                            <select id="interestType" name="interestType"  class="textLabel14CalibriGrey"
                                                    onchange="changeTROIOpt('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', document.getElementById('selTROI').value, '<?php echo $girviNewDOB; ?>', document.getElementById('ROIOption'), '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviUpdSts; ?>', '<?php echo $omPanelDiv; ?>', 'UpdateTroiVal', '');
                                                            return false;">
                                                <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top" colspan="2" height="100%">
                                        <?php include 'ormlmnin.php'; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="middle" height="100%" colspan="3">
                <?php if ($loanOtherInfo != '' || $loanOtherInfo != NULL) { ?>
                    <table border="0" cellpadding="1" cellspacing="0" align="left" valign="middle" class="textBoxCurve1px margin2pxAll">
                        <tr>
                            <td align="right" valign="middle" class="textLabel12CalibriBrown">
                                OTHER INFORMATION:&nbsp;
                            </td>
                            <td align="left" class="frm-r1"><h5><?php echo $loanOtherInfo; ?></h5></td>
                        </tr>
                    </table>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="left" width="100%"  class="textBoxCurve1px margin2pxAll backFFFFFF">
                <table border="0" cellpadding="1" cellspacing="1" align="left" width="100%" >
                    <?php
                    $cnt = 1;
                    if ($girviType == 'secured') {
                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Transferred' and gtrans_trans_loan_id='$girviId'";
                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                        $totActLoans = mysqli_num_rows($resSelGirviDet);
                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                            $trFirmId = $rowSelGirviDet['gtrans_firm_id'];
                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
                            $pId = $rowSelGirviDet['gtrans_prin_id'];
                            $gtransId = $rowSelGirviDet['gtrans_id'];
                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                            if ($prinTypeVal == 'MainPrin' || $prinTypeVal == '') {
                                $prinType = 'PRN';
                                $displayPrinType = "Main Principle";
                            } else {
                                $prinType = 'APRN';
                                $displayPrinType = "Additional Principle";
                            }
                            $preSerialNo = $rowSelGirviDet['gtrans_pre_serial_num'];
                            $postSerialNo = $rowSelGirviDet['gtrans_serial_num'];
                            $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$trFirmId' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                            $trFirmName = $rowSelFirmName['firm_name'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                    
                            $selFirmName = "SELECT user_fname FROM user WHERE user_id='$custId' AND user_owner_id='$_SESSION[sessionOwnerId]'";
                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                            $custFname = $rowSelFirmName['user_fname'];
                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                            if ($transType == 'Linked') {
                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                $resMlCode = mysqli_query($conn, $selMlCode);
                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                            }
                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                            ?>
                            <?php
                            if ($totActLoans > 0) {
                                if ($cnt == 1) {
                                    ?>
                                    <tr>
                                        <td colspan="9">
                                            <div class="main_link_green12 spaceLeft10">ACTIVE LOANS</div>
                                        </td>
                                    </tr>
                                    <tr align="left" >
                                        <td align="left" title="Loan No" width="100px">
                                            <div class="tnr_nr_11_red spaceLeftRight10">LOAN NO</div>
                                        </td>
                                        <td align="right" title="principle"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">PRINCIPLE</div>
                                        </td>
                                        <td align="right" title="ROI"  width="50px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">ROI</div>
                                        </td>
                                        <td align="left" title="Customer name"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">CUSTOMER</div>
                                        </td>
                                        <?php if ($transType == 'Linked') { ?>
                                            <td align="right" title="Ml Code"  width="100px">
                                                <div class="spaceLeftRight10 tnr_nr_11_red">ML CODE</div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right" title="Firm"  width="100px">
                                                <div class="spaceLeftRight10 tnr_nr_11_red">FIRM</div>
                                            </td>
                                        <?php } ?>
                                        <td align="left" title="principle"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">PRIN TYPE</div>
                                        </td>
                                        <td align="right" title="Trasfer Date"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">TR DATE</div>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                                <tr>
                                    <td align="left" title="Loan No" >
                                        <div class="spaceLeftRight10">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;" 
                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"
                                                   />
                                        </div>
                                        <div id="release_trGirvi_panel<?php echo $gtransId; ?>"></div>
                                    </td>
                                    <td align="right" title="principle">
                                        <div class="spaceLeftRight10"><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?> </div>
                                    </td>
                                    <td align="right" title="ROI" >
                                        <div class="spaceLeftRight10"><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </div>
                                    </td>
                                    <td align="left" title="Customer name">
                                        <div class="spaceLeftRight10"><?php echo $custFname; ?> </div>
                                    </td>
                                    <?php if ($transType == 'Linked') { ?>
                                        <td align="right" title="Ml Code"  width="100px">
                                            <div class="spaceLeftRight10"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                            <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                   
                                        </td>
                                    <?php } else { ?>
                                        <td align="right" title="Firm"  width="100px">
                                            <div class="spaceLeftRight10"><?php echo $trFirmName; ?></div>
                                        </td>
                                    <?php } ?>
                                    <td align="left" title="principleType">
                                        <div class="spaceLeftRight10"><?php echo $displayPrinType; ?> </div>
                                    </td>
                                    <td align="right" title="Date">
                                        <div class="spaceLeftRight10"><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Released' and gtrans_trans_loan_id='$girviId'";
                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                        $totRelLoans = mysqli_num_rows($resSelGirviDet);
                        $rlCnt = 1;
                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                            $trFirmId = $rowSelGirviDet['gtrans_firm_id'];
                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                            $gtransId = $rowSelGirviDet['gtrans_id'];
                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
                            $preSerialNo = $rowSelGirviDet['gtrans_pre_serial_num'];
                            $postSerialNo = $rowSelGirviDet['gtrans_serial_num'];
                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                            if ($prinTypeVal == 'MainPrin' || $prinTypeVal == '') {
                                $prinType = 'PRN';
                                $displayPrinType = "Main Principle";
                            } else {
                                $prinType = 'APRN';
                                $displayPrinType = "Additionl Principle";
                            }
                            $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$trFirmId' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                            $trFirmName = $rowSelFirmName['firm_name'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                    
                            $selFirmName = "SELECT user_fname FROM user WHERE user_id='$custId' AND user_owner_id='$_SESSION[sessionOwnerId]'";
                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                            $custFname = $rowSelFirmName['user_fname'];
                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                            if ($transType == 'Linked') {
                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                $resMlCode = mysqli_query($conn, $selMlCode);
                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                            }
                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY15JAN14
                            ?>
                            <?php if ($totRelLoans > 0) { ?>
                                <?php if ($rlCnt == 1) {
                                    ?>
                                    <tr>
                                        <td colspan="9">
                                            <div class="main_link_red_12 spaceLeft10">RELEASED LOANS</div>
                                        </td>
                                    </tr>
                                    <?php
                                    $rlCnt++;
                                } if ($cnt == 1) {
                                    ?>
                                    <tr align="left" >
                                        <td align="left" title="Loan No" width="100px">
                                            <div class="tnr_nr_11_red spaceLeftRight10">LOAN NO</div>
                                        </td>
                                        <td align="right" title="principle"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">PRINCIPLE</div>
                                        </td>
                                        <td align="right" title="ROI"  width="50px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">ROI</div>
                                        </td>
                                        <td align="left" title="Customer name"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">CUSTOMER</div>
                                        </td>
                                        <?php if ($transType == 'Linked') { ?>
                                            <td align="right" title="Ml Code"  width="100px">
                                                <div class="spaceLeftRight10 tnr_nr_11_red">ML CODE</div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right" title="Firm"  width="100px">
                                                <div class="spaceLeftRight10 tnr_nr_11_red">FIRM</div>
                                            </td>
                                        <?php } ?>

                                        <td align="left" title="principle"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">PRIN TYPE</div>
                                        </td>
                                        <td align="right" title="Trasfer Date"  width="100px">
                                            <div class="spaceLeftRight10 tnr_nr_11_red">TR DATE</div>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                                <tr>
                                    <td align="left" title="Loan No" >
                                        <div class="spaceLeftRight10">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;" 
                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/>
                                        </div>
                                    </td>
                                    <td align="right" title="principle">
                                        <div class="spaceLeftRight10"><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?> </div>
                                    </td>
                                    <td align="right" title="ROI" >
                                        <div class="spaceLeftRight10"><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </div>
                                    </td>
                                    <td align="left" title="Customer name">
                                        <div class="spaceLeftRight10"><?php echo $custFname; ?> </div>
                                    </td>
                                    <?php if ($transType == 'Linked') { ?>
                                        <td align="right" title="Ml Code"  width="100px">
                                            <div class="spaceLeftRight10"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                            <!--------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                   
                                        </td>
                                    <?php } else { ?>
                                        <td align="right" title="Firm"  width="100px">
                                            <div class="spaceLeftRight10"><?php echo $trFirmName; ?></div>
                                        </td>
                                    <?php } ?>
                                    <td align="left" title="principleType">
                                        <div class="spaceLeftRight10"><?php echo $displayPrinType; ?> </div>
                                    </td>
                                    <td align="right" title="Date">
                                        <div class="spaceLeftRight10"><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    } else {
                        ?>
                        <tr align="center">
                            <td align="center" colspan="7" class="textLabel18CalibriNormal">UNSECURED LOAN</td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td align="left" width="100%" class="textBoxCurve1px margin2pxAll backgroundFFF8DC">
                <div id="loanTotAmtDiv">
                    <?php
                    include 'ormlttam.php';
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <?php include 'ormlncmt.php'; ?>
        </tr>
    </table>
    <?php if ($girviUpdSts != 'Released') { ?>
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <!------Start code to add var @Author:PRIYA01APR14------->
                    <div id="loanReleaseButDiv"><!---Change in release loan function @AUTHOR: SANDY08JAN14---->
                        <a style="cursor: pointer;" onclick="javascript:releaseLoan(<?php echo "$mlId"; ?>,<?php echo "$loanId"; ?>, '<?php echo $pageNo; ?>',
                                            document.getElementById('totalPrincipalAmount').value, document.getElementById('amountPaid'), document.getElementById('interestPaid'),
                                            document.getElementById('discountPaid'), document.getElementById('mlRelLnDOBDay'), document.getElementById('mlRelLnDOBMonth'),
                                            document.getElementById('mlRelLnDOBYear'), document.getElementById('simpleOrCompIntOption').value, document.getElementById('girviCompoundedOption').value,
                                            document.getElementById('monthlyInterestType').value, document.getElementById('interestType').value, '<?php echo "$firm"; ?>',
                                            '<?php echo "$girviJrnlId"; ?>', '<?php echo $rowAllGirvi['ml_acc_id']; ?>', document.getElementById('timePeriodVar').value,
                                            '<?php echo $mainPrincAmount; ?>', document.getElementById('girviLoanAccId').value, document.getElementById('girviCashRecAccId').value,
                                            document.getElementById('girviIntRecAccId').value, document.getElementById('girviDiscAccId').value);">
                            <img src="<?php echo $documentRootBSlash; ?>/images/submit32.png" alt="Release Girvi" title="Release Girvi" />
                        </a>
                    </div>
                    <!------End code to add var @Author:PRIYA01APR14------->
                </td>
            </tr>
        </table>
    <?php } ?>
</div>

