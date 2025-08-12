<?php
/*
 * **************************************************************************************
 * @tutorial:
 * **************************************************************************************
 * 
 * Created on Jun 18, 2013 11:00:58 AM
 *
 * @FileName: ogbbprbs.php
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
include 'ommprspc.php';
require_once 'system/omssopin.php';
include 'conversions.php';
?><?php
//change in file @AUTHOR: SANDY27DEC13
$transId = $_GET['transId'];
$status = $_GET['status'];
$loanId = $_GET['loanId'];
$mlId = $_GET['mlId'];
$girviTransId = $transId;
$selPrinDet = "SELECT * FROM girvi_transfer WHERE gtrans_id='$transId' and gtrans_own_id='$_SESSION[sessionOwnerId]'";
$resPrinDet = mysqli_query($conn,$selPrinDet);
$rowPrinDet = mysqli_fetch_array($resPrinDet, MYSQLI_ASSOC);
$girviId = $rowPrinDet['gtrans_girvi_id'];
$custId = $rowPrinDet['gtrans_cust_id'];
$girviUpdSts = $rowPrinDet['gtrans_upd_sts'];
$girviIntCompoundedOpt = $rowPrinDet['gtrans_compounded_opt'];
$monthlyIntOpt = $rowPrinDet['gtrans_monthly_intopt'];
$ROIType = $rowPrinDet['gtrans_ROI_typ'];
$girviType = $girviUpdSts;
$girviIntOpt = $rowPrinDet['gtrans_int_opt'];
$princAmount = $rowPrinDet['gtrans_prin_amt'];
$prinType = $rowPrinDet['gtrans_prin_typ'];
$ROI = $rowPrinDet['gtrans_ROI'];
$girviDOB = $rowPrinDet['gtrans_DOB'];
$girviNewDOB = $girviDOB;
$girviFirmId = $rowPrinDet['gtrans_exist_firm_id'];
$qSelFirm = "SELECT firm_name FROM firm where firm_id='$girviFirmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resFirm = mysqli_query($conn,$qSelFirm);
$rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
$girviExFirmName = $rowFirm['firm_name'];
$loanId = $rowPrinDet['gtrans_trans_loan_id'];
$girviSerialNo = $rowPrinDet['gtrans_pre_serial_num'] . $rowPrinDet['gtrans_serial_num'];
$grvRelPayDetails = 'False';
$omPanelDiv = 'MlLoan';
//-------------------------------- Start code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
$getMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN (SELECT ml_lender_id FROM ml_loan WHERE ml_id='$loanId')";
$resMlCode = mysqli_query($conn,$getMlCode);
$rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
$mlCode = $rowMlCode['user_unique_code'];
//-------------------------------- End code for change data from Supplier table to user table Author@:SANT16JAN16---------------------------------------------------------------->                  
?>
<div id="relGvPanel" class="textBoxCurve1px trGirvi_Release_panel" style="z-index:1000;"> <!--Style added @Author:SHRI27JUN15-->
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td align="left" class="main_link_orange_normal16 paddingTop5">
                RELEASE PRINCIPAL
            </td>
            <td>
                <div id="statusMsgDiv"></div>
            </td>
            <td align="right" valign="top" class="paddingTop5">
                <a class="links" style="cursor: pointer;"
                   onclick="relGvPanelHide('<?php echo $transId; ?>')"><img src="<?php echo $documentRootBSlash; ?>/images/ajaxClose.png" /></a>
            </td>
        <input type="hidden" id="transId" name="transId" value="<?php echo $transId; ?>" />
        <input type="hidden" id="prinType" name="prinType" value="<?php echo $prinType; ?>" />
        <input type="hidden" id="loanId" name="loanId" value="<?php echo $loanId; ?>" />
        <input type="hidden" id="mlId" name="mlId" value="<?php echo $mlId; ?>" />
        </tr>
        <tr>
            <td colspan="3">
                <div class="hrGold"></div>
                <div id="ajaxLoadCustGirviTransferDiv" style="visibility: hidden">
                    <?php include 'omzaajld.php'; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="grey-back">
                    <table border="0" cellspacing="2" cellpadding="2" width="100%" align="center">
                        <tr>
                            <td width="200px" align="center" valign="top">
                                <table>
                                    <tr>  
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            PRINCIPAL AMOUNT
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="170px" class="textBoxCurve2px margin2pxAll textLabel24Calibri backFFFFFF">
                                            <?php echo $globalCurrency . ' '.$princAmount; ?>
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
                                                    <td align="center" valign="middle" width="130px" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                                        <div id="ROIOption">
                                                            <?php
                                                            $selInerestType = $rowPrinDet['gtrans_ROI_typ']; //get interest type @AUTHOR: SANDY13DEC13
                                                            $panelName = 'MlLoan';
                                                            include 'olggroaa.php'; //change in filename @AUTHOR: SANDY20NOV13
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="200px" align="center" valign="top"> 
                                <table width="100%">
                                    <tr>  
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            START DATE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="130px" class="textBoxCurve2px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php echo $girviDOB; ?>
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            RELEASE DATE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle" width="130px" class="textBoxCurve1px margin1pxAll textLabel16Calibri backFFFFFF">
                                            <form name="girviReleaseDateForm" id="girviReleaseDateForm" method="post">
                                                <?php
                                                $class = 'textLabel14CalibriGrey';
                                                $panelName = 'MlLoan';
                                                include 'olgrtgrd.php'; //change in filename @AUTHOR: SANDY20NOV13 
                                                ?>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="220px" align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr align="left">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            EXISTING FIRM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php echo $girviExFirmName; ?>
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            TRANS ML LOAN NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <input type="text" name="mlLoanId" id="mlLoanId" readonly="true" class="border-no textLabel16CalibriNormalred text_center" title="Click here to view loan details!"   style="cursor: pointer;" 
                                                   value="<?php echo $loanId; ?>" onclick="getMlLoanDet('<?php echo $loanId; ?>', '<?php echo $mlCode ?>', 'LoanDetailPanel');" />
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            ML CODE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php echo "$mlCode"; ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="220px" align="center" valign="top">
                                <table border="0" cellpadding="1" cellspacing="0">
                                    <tr>
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown"> 
                                            INTEREST TYPE
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($panelName == 'updateTransGirvi') { ?>
                                            <td align="left" valign="middle" width="120px" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF"><!-- START Select right value PHP code -->
                                                <?php
                                                $selInerestType = $rowTransGirvi['gtrans_ROI_typ']; //get interest type @AUTHOR: SANDY15DEC13

                                                switch ($selInerestType) {
                                                    case "Monthly":
                                                        $optIntType1 = "selected";
                                                        break;
                                                    case "Annually":
                                                        $optIntType2 = "selected";
                                                        break;
                                                }
                                                ?> 
                                                <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                                    <select id="gtransInterestType" name="gtransInterestType"
                                                            class="textLabel14CalibriGrey"
                                                            onchange="changeTROIOpt('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', document.getElementById('selTROI').value, '<?php echo $girviDOB; ?>', document.getElementById('ROIOption'), '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviUpdSts; ?>', 'MlLoan', 'updateTROI', '<?php echo $girviTransId; ?>');
                                                                        return false;">
                                                        <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                        <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                                    </select>
                                                </div>
                                            </td>
                                        <?php } else { ?>
                                            <td align="left" valign="middle" width="120px" class="textBoxCurve1px margin2pxAll textLabel14CalibriGrey backFFFFFF"><!-- START Select right value PHP code -->
                                                <?php
                                                $selInerestType = $rowPrinDet['gtrans_ROI_typ']; //get interest type @AUTHOR: SANDY15DEC13
                                                switch ($selInerestType) {
                                                    case "Monthly":
                                                        $optIntType1 = "selected";
                                                        break;
                                                    case "Annually":
                                                        $optIntType2 = "selected";
                                                        break;
                                                }
                                                ?> 
                                                <div id="interestTypeDiv" class="selectStyledBorderLess background_transparent">
                                                    <select id="gtransInterestType" name="gtransInterestType"
                                                            class="textLabel14CalibriGrey"
                                                            onchange="changeTROIOpt('<?php echo $documentRoot; ?>', '<?php echo $grvRelPayDetails; ?>', this, '<?php echo $princAmount; ?>', document.getElementById('selTROI').value, '<?php echo $girviDOB; ?>', document.getElementById('ROIOption'), '<?php echo $girviType; ?>', '<?php echo $girviId; ?>', '<?php echo $custId; ?>', '<?php echo $girviUpdSts; ?>', 'MlLoan', '', '<?php echo $girviTransId; ?>');
                                                                        return false;">
                                                        <option value="Monthly" <?php echo $optIntType1; ?>>Monthly</option>
                                                        <option value="Annually" <?php echo $optIntType2; ?>>Annually</option>
                                                    </select>
                                                </div>
                                            </td>
                                        <?php } ?>
                                        <!--Start code to add div for display arrow if Int change @Author:PRIYA13SEP13-->
                                        <td>
                                            <div id="troiIntTypeChangeDiv" style="visibility: hidden" class="girvi_head_blue_right"><img src="<?php echo $documentRoot; ?>/images/right16.png" width="16px" height="16px"></div>
                                        </td>
                                        <!--End code to add div for display arrow if Int change @Author:PRIYA13SEP13-->
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            SERIAL NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php echo $girviSerialNo; ?>
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                            PACKET NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                            <?php
                                            if ($girviPacketNo != '' || $girviPacketNo != null) {
                                                echo $girviPacketNo;
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php if ($girviTokenNo != '' || $girviTokenNo != NULL) { ?>
                                        <tr>
                                            <td align="center" valign="middle" class="textLabel12CalibriBrown">
                                                TOKEN NO
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="120px" align="center" class="textBoxCurve1px margin2pxAll textLabel16CalibriNormalBlue backFFFFFF">
                                                <?php echo $girviTokenNo; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"> 
                                <div id="transGirviTotalResultDiv">
                                    <?php
                                    $girviDOR = date('d M Y');
                                    include 'olgggtfr.php'; //change in filename @AUTHOR: SANDY20NOV13
                                    ?>
                                    <input type="hidden" id="totAmount" name="totAmount" value="<?php echo $totalAmount; ?>" /><!--Variable Added @Author:PRIYA27JUL13-->
                                    <input type="hidden" id="timePeriodVar" name="timePeriodVar" value="<?php echo $completeTime; ?>" /><!--Variable added by @AUTHOR: SANDY15DEC13---->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <?php if ($status != 'Released') { ?>
                                <td colspan="4" align="center">
                                    <div id="releaseTrGirviButton">
                                        <a style="cursor: pointer;" onclick="javascript:releaseTransferredGirviOrPrin('<?php echo $documentRoot; ?>');">
                                            <img src="<?php echo $documentRootBSlash; ?>/images/transferGirvi24.png" alt="Release Transferred Girvi" title="Release Transferred Girvi" />
                                        </a>
                                    </div>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>