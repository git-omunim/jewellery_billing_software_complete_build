<?php
/*
 * Created on Mar 12, 2011 2:02:10 PM
 *
 * @FileName: ormllndt.php
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
//changes in file @AUTHOR: SANDY31JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?> 
<div id="loanDetailsMainDiv">
    <div id="girviPanelTrId" style="visibility:hidden"></div>   
    <table border="0" cellspacing="2" cellpadding="2" width="100%" align="center">
        <tr>
            <td>
                <table border="0" cellpadding="1" cellspacing="1" width="100%" style="background:#f0fff0;border: 1px dashed #86ba86;padding: 5px;">
                    <tr>
                        <td align="left" valign="top" width="20%"> 
                            <table border="0" cellpadding="1" cellspacing="1" width="100%" >
                                <tr>  
                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                        <b>PRINCIPAL AMOUNT</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2" valign="middle" width="100%" style="height:40px;width:100%;border-radius:4px;" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF">
                                        <?php echo $globalCurrency. ' ' .$mainPrincAmount ?>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>RATE OF INTEREST</b>
                                    </td>
                                    <td align="left">
                                        <div id="selTROIChangeDiv" style="visibility: hidden" class="girvi_head_blue_right">
                                            <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="2" valign="top" width="100%"> 
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr> 
                                                <td align="left" valign="middle" width="100%" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF" style="padding:0">
                                                    <div id="ROIOption">
                                                        <?php
                                                        /** if ($selInerestType == 'Annually') {
                                                          include 'olggroia.php';
                                                          } else if ($selInerestType == 'Monthly') {
                                                          include 'olggroim.php';
                                                          } comment to take roi value from tr table @AUTHOR: SANDY02JAN14 */
                                                        include 'olggroaa.php'; //@AUTHOR: SANDY02JAN14
                                                        ?>
                                                    </div>
                                                </td>
<!--                                                <td align="left">
                                                    <div id="selTROIChangeDiv" style="visibility: visible" class="girvi_head_blue_right">
                                                        <img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px">
                                                    </div>
                                                </td>-->
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                                 <tr align="center">
                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>FIRM NAME</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2" valign="middle" width="100%" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $firmName; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td align="center" valign="top" width="20%"> 
                            <table border="0" cellpadding="1" cellspacing="1" width="100%" align="center">
                                <tr align="center">
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3">
                                        <b>LOAN DATE</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" width="100%" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                        <?php echo $girviNewDOB; ?>
                                    </td>
                                </tr>
                                <?php if ($girviUpdSts == 'Released') { ?>
                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                            <b>LOAN RELEASED DATE</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalred backFFFFFF" style="height:40px;">
                                            <?php echo $girviDOR; ?>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                            <b>&nbsp;</b>
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td align="left" valign="middle">
                                            <div style="visibility: hidden"  class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalred backFFFFFF">
                                                <?php include 'olgrstrd.php'; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                        <td align="center" valign="top" width="5%"> 
                            <table border="0" cellpadding="2" cellspacing="1" width="100%">
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
                        <td align="center" valign="top" width="20%"> 
                            <table border="0" cellpadding="1" cellspacing="1" width="100%">
<!--                                <tr align="center">
                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>FIRM NAME</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2" valign="middle" width="100%" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php // echo $firmName; ?>
                                    </td>
                                </tr>-->
                                <tr align="center">
                                    <td align="left" colspan="2" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>FIRM LOAN NO.</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left" valign="middle" width="100%" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $firmLoanNo; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>ML LOAN NO.</b>
                                    </td>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>CR/DR</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $mlLnNo; ?>
                                    </td>
                                     <td align="center" valign="middle" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $mlTrType; ?>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="left" colspan="2" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b> LOAN SERIAL NO.</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="2" valign="middle" width="100%" style="height:40px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php echo $preSerialNum . $serialNum; ?>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b>CR/DR</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle" style="height:40px;" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php // echo $mlTrType; ?>
                                    </td>
                                </tr>-->
                            </table>
                        </td>
                        <td align="center" valign="top" width="20%"> 
                            <table border="0" cellpadding="1" cellspacing="1" width="100%" align="center">
<!--                                <tr align="center">
                                    <td align="left" colspan="2" valign="middle" colspan="2" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b> LOAN SERIAL NO.</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="2" valign="middle" width="100%" style="height:40px" colspan="2" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormal backFFFFFF">
                                        <?php // echo $preSerialNum . $serialNum; ?>
                                    </td>
                                </tr>-->
                                <tr align="center">
                                    <td align="left" valign="middle"  class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                        <b> INTEREST OPTION</b>
                                    </td>
                                    <td align="right" valign="middle">
                                        <div id="troiIntTypeChangeDiv" style="visibility:hidden">
                                            <img src="<?php echo $documentRoot; ?>/images/img/release.png" width="16px" height="16px">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td align="center" colspan="2" valign="middle" width="100%"  style="height:40px" class="textBoxCurve1px margin2pxAll backFFFFFF">
                                        <?php
                                        switch ($selInerestType) {
                                            case "Monthly":$optIntType1 = "selected";
                                                break;
                                            case "Annually":$optIntType2 = "selected";
                                                break;
                                        }
                                        ?>
                                        <div id="interestTypeDiv" class="selectStyledBorderLess backFFFFFF">
                                            <select id="interestType" name="interestType" style="width:100%"
                                                    class="textLabel14CalibriGrey"
                                                    onchange="changeTROIOpt('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', document.getElementById('selTROI').value, '<?php echo $girviNewDOB; ?>', document.getElementById('ROIOption'), '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviUpdSts; ?>', '<?php echo $omPanelDiv; ?>', 'UpdateTroiVal', '');
                                                            return false;"
                                                    >
                                                <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="2" valign="top" colspan="2" >
                                        <?php
                                        include 'ormlmnin.php';
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
            <td align="center" valign="middle" height="100%" colspan="5">
                <?php if ($loanOtherInfo != '' || $loanOtherInfo != NULL) { ?>
                    <table border="0" cellpadding="1" cellspacing="0" width="100%" align="left" valign="middle" class="backFFFFFF" style="border-radius:3px;border:1px solid #c1c1c1;height:40px;">
                        <tr>
                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                <b> &nbsp;OTHER INFORMATION:&nbsp;</b>
                            </td>
                            <td align="left" class="frm-r1"><h5><?php echo $loanOtherInfo; ?></h5></td>
                        </tr>
                    </table>
                <?php } ?>
            </td>
        </tr>
                </table>
            </td>
        </tr>
<!--        <tr>
            <td align="center" valign="middle" height="100%" colspan="5">
                <?php if ($loanOtherInfo != '' || $loanOtherInfo != NULL) { ?>
                    <table border="0" cellpadding="1" cellspacing="0" width="100%" align="left" valign="middle" class="backFFFFFF" style="border-radius:3px;border:1px solid #c1c1c1;height:40px;">
                        <tr>
                            <td align="left" valign="middle" class="textLabel12CalibriBrown pdnbtm3 pdntp3">
                                <b> &nbsp;OTHER INFORMATION:&nbsp;</b>
                            </td>
                            <td align="left" class="frm-r1"><h5><?php echo $loanOtherInfo; ?></h5></td>
                        </tr>
                    </table>
                <?php } ?>
            </td>
        </tr>-->
        <tr>
            <td align="left" width="100%">
                <table border="0" cellpadding="1" cellspacing="0" align="left" width="100%" >
                    <?php
                    if ($girviType == 'secured') {
                        $cnt = 1;
                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Transferred' and gtrans_trans_loan_id='$girviId'";
                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                        $totActLoans = mysqli_num_rows($resSelGirviDet);

                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
                            $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                            $loanNo = $rowSelGirviDet['gtrans_trans_loan_no'];
                            $girviTranseId = $rowSelGirviDet['gtrans_id']; //add transfer ID @Author:ANUJA31JUL15
                            $otherInfo = $rowSelGirviDet['gtrans_pay_oth_info'];
//                            echo '$loanNo='.$loanNo;           
                            $prinTypeVal = $rowSelGirviDet['gtrans_prin_typ'];
                            if ($prinTypeVal == 'MainPrin' || $prinTypeVal == '') {
                                $prinType = 'PRN';
                                $displayPrinType = "Main Principle";
                            } else {
                                $prinType = 'APRN';
                                $displayPrinType = "Additional Principle";
                            }
                            $selFirmName = "SELECT firm_name FROM firm WHERE firm_id='$trFirmId' AND firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";

                            $resSelFirmName = mysqli_query($conn, $selFirmName);
                            $rowSelFirmName = mysqli_fetch_array($resSelFirmName, MYSQLI_ASSOC);
                            $trFirmName = $rowSelFirmName['firm_name'];
                            //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16-------------------------------------------------------------                                  
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
                                        <td colspan="7">
                                            <div class="main_link_green14"><b>ACTIVE LOANS</b></div>
                                        </td>
                                    </tr>
                                    <tr align="left" class="height28" style="background: #F2f2f2;">
                                        <td align="left" title="Loan No" width="100px" class="brdrgry-dashed" style="border-right:0;">
                                            <div class="textLabel14CalibriBrownBold spaceLeftRight10 "><b>LOAN NO</b></div>
                                        </td>
                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> PRINCIPLE </b></div>
                                        </td>
                                        <td align="center" title="ROI"  width="50px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> ROI </b></div>
                                        </td>
                                        <td align="center" title="Customer name"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> CUSTOMER </b></div>
                                        </td>
                                        <?php if ($transType == 'Linked') { ?>
                                            <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                                <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> ML CODE </b></div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                                <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> FIRM</b> </div>
                                            </td>
                                        <?php } ?>
                                        <td align="left" title="packet no"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> PACKET NO</b> </div>
                                        </td>
                                        <td align="center" title="other info"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> OTHER INFO</b> </div>
                                        </td>
                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> PRIN TYPE</b> </div>
                                        </td>
                                        <td align="right" title="Trasfer Date"  width="100px" class="brdrgry-dashed" style="border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold"><b> TR DATE</b> </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                                <tr class="height28">
                                    <td align="left" title="Loan No" class="brdrgry-dashed" style="border-right:0;border-top:0">
                                        <div class="spaceLeftRight10">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;font-weight:600;" 
                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/> <!-- Change value of input field to packet no. @Author:SHRI18MAY15-->
                                        </div>
                                    </td>
                                    <td align="center" title="principle" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?> </b></div>
                                    </td>
                                    <td align="center" title="ROI" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_ROI']; ?></b> </div>
                                    </td>
                                    <td align="center" title="Customer name" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $custFname; ?> </b></div>
                                    </td>
                                    <?php if ($transType == 'Linked') { ?>
                                        <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                            <div class="spaceLeftRight10"><b><?php echo $rowMlCode['user_unique_code']; ?></b></div>
                                            <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                        </td>
                                    <?php } else { ?>
                                        <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                            <div class="spaceLeftRight10"><b><?php echo $trFirmName; ?></b></div>
                                        </td>
                                    <?php } ?>
                                    <!-------Start code to add Packet NO  @Author:ANUJA30JUL15---------------------->
                                    <td align="center" title="Packet No." class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $packetNo; ?></b> </div>
                                    </td>
                                    <td align="left" title="Other Info" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $otherInfo; ?></b> </div>
                                    </td>
                                    <td align="center" title="principleType" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $displayPrinType; ?></b> </div>
                                    </td>
                                    <td align="right" title="Date" class="brdrgry-dashed" style="border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_DOB']; ?></b> </div>
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
                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                            $custId = $rowSelGirviDet['gtrans_cust_id'];

                            $gId = $rowSelGirviDet['gtrans_girvi_id'];
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
                            //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16-------------------------------------------------------------                                 
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
                            if ($totRelLoans > 0) {
                                if ($rlCnt == 1) {
                                    ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="main_link_red_12"  style="font-size:14px;font-weight: 600;"><b>RELEASED LOANS</b></div>
                                        </td>
                                    </tr>
                                    <?php
                                    $rlCnt++;
                                }
                                if ($cnt == 1) {
                                    ?>

                                    <tr align="left" class="height28" style="background: #f2f2f2;">
                                        <td align="left" title="Loan No" width="100px" class="brdrgry-dashed" style="border-right:0;">
                                            <div class="textLabel14CalibriBrownBold spaceLeftRight10" style="font-weight:600">LOAN NO</div>
                                        </td>
                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">PRINCIPLE</div>
                                        </td>
                                        <td align="center" title="ROI"  width="50px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">ROI</div>
                                        </td>
                                        <td align="center" title="Customer name"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">CUSTOMER</div>
                                        </td>
                                        <?php if ($transType == 'Linked') { ?>
                                            <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                                <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">ML CODE</div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                                <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">FIRM</div>
                                            </td>
                                        <?php } ?>
                                        <td align="left" title="Packet no"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">PACKET NO</div>
                                        </td>
                                        <td align="left" title="Other Info"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">OTHER INFO</div>
                                        </td>
                                        <td align="center" title="principle"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">PRIN TYPE</div>
                                        </td>
                                        <td align="right" title="Trasfer Date"  width="100px" class="brdrgry-dashed" style="border-left:0">
                                            <div class="spaceLeftRight10 textLabel14CalibriBrownBold" style="font-weight:600">TR DATE</div>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                                <tr class="height28">
                                    <td align="left" title="Loan No" class="brdrgry-dashed" style="border-right:0;border-top:0">
                                        <div class="spaceLeftRight10">
                                            <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;font-weight:600" 
                                                   onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                   value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/>
                                        </div>
                                    </td>
                                    <td align="center" title="principle" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?></b> </div>
                                    </td>
                                    <td align="center" title="ROI" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_ROI']; ?></b> </div>
                                    </td>
                                    <td align="center" title="Customer name" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0"> 
                                        <div class="spaceLeftRight10"><b><?php echo $custFname; ?></b> </div>
                                    </td>
                                    <?php if ($transType == 'Linked') { ?>
                                        <td align="center" title="Ml Code"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                            <div class="spaceLeftRight10"><b><?php echo $rowMlCode['user_unique_code']; ?></b></div>
                                        </td>
                                    <?php } else { ?>
                                        <td align="center" title="Firm"  width="100px" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                            <div class="spaceLeftRight10"><b><?php echo $trFirmName; ?></b></div>
                                        </td>
                                    <?php } ?>
                                    <!-------Start code to add Packet NO  @Author:ANUJA30JUL15---------------------->
                                    <td align="center" title="Packet No." class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $packetNo; ?></b> </div>
                                    </td>
                                    <td align="center" title="Other Info" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $otherInfo; ?></b> </div>
                                    </td>
                                    <td align="center" title="principleType" class="brdrgry-dashed" style="border-right:0;border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $displayPrinType; ?></b> </div>
                                    </td>
                                    <td align="right" title="Date" class="brdrgry-dashed" style="border-left:0;border-top:0">
                                        <div class="spaceLeftRight10"><b><?php echo $rowSelGirviDet['gtrans_DOB']; ?></b> </div>
                                    </td>
                                </tr>


                                <!-------End code to add Packet NO  @Author:ANUJA30JUL15---------------------->

                                <?php
                            }
                            ?>
                        </table> 
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr align="center">
                <td align="center" colspan="7" class="textLabel18CalibriNormal">
                   <span style='color: red;font-weight:600'>UNSECURED LOAN</span>
                    </td>
            </tr>
        <?php } ?>
    </table>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
        <tr>
            <td align="left" width="100%">
                <div id="loanTotAmtDiv">
                    <?php
                    include 'ormlttam.php';
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td align="left" width="100%" >
                <?php include 'ormlncmt.php'; ?>
            </td>
        </tr>
    </table>
</div>
<!--End code to change code @Author:SHRI16MAY15-->