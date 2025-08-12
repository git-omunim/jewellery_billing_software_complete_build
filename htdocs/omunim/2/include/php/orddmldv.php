<?php
/*
 * **************************************************************************************
 * @tutorial: Money Lender Loan Add File
 * **************************************************************************************
 * 
 * Created on Dec 10, 2013 11:51:47 AM
 *
 * @FileName: orddmldv.php
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
?>
<?php
if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') {
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['panelName'];
//
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
//
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
//$custId = $_GET['custId'];
//echo '$custId =='.$custId;
    if ($todayDate == '' || $todayDate == NULL) {
        $todayDate = date("d M Y");
    }
    $panelDDDetClick = $_GET['panelDDDetClick'];
    include 'omfrpsck.php';
    $girviDepositDate = om_strtoupper(date("d M Y", strtotime($todayDate)));
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrMLLoan = "and ml_lender_id = '$custId'";
    } else {
        $accLedStrMLLoan = NULL;
    }
//
    if ($panelDDDetClick == 'ddDetClick') {
        $mLLoanDepId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelectMLLoanAdd = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_firm_id,ml_main_prin_amt,ml_pre_serial_num,ml_serial_num,ml_DOB"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr and ml_firm_id IN ($strFrmId) and ml_loan_type IS null and ml_upd_sts IN ('New') order by ml_DOB asc";
    } else {
        $qSelectMLLoanAdd = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_firm_id,ml_main_prin_amt,ml_pre_serial_num,ml_serial_num,ml_DOB"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoan and ml_loan_type IS null and ml_firm_id IN ($strFrmId)"
                . "order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) $ddOrderBy";
    }
    //echo '$qSelectMLLoanAdd ='.$qSelectMLLoanAdd.'</br>';
    $qResultMLLoanAdd = mysqli_query($conn, $qSelectMLLoanAdd);
    $mLLoanAddPresent = mysqli_num_rows($qResultMLLoanAdd);

    if ($mLLoanAddPresent > 0) {
        include 'orddmlad.php';
        $totalMoneyDeposit += $totalTodayMLLoanPrincipalCr;
        $totalMoneyLeft = $totalMoneyLeft + $totalTodayMLLoanPrincipalCr;

        $totalMoneyWithdrwal -= $totalTodayMLLoanPrincipal;
        $totalMoneyLeft = $totalMoneyLeft - $totalTodayMLLoanPrincipal;
    }
    if ($ddpanelName == 'todayDatePanel' || $ddDetPanel != '' || $panelDDDetClick == 'ddDetClick') {
        if ($mLLoanAddPresent > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            if ($panelDDDetClick != 'ddDetClick') {
                ?>
                <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5" width="100%">
                    <tr>
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                                <tr>
                                    <td align="left" class="width_627_dd brown_bold12_arial">
                                        <span style="color:#000;margin-left:10px">MONEYLENDER NEW LOAN</span>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_red_Arial_12_bold">
                                            <?php
                                            // echo formatInIndianStyle($totalDepositMLLoanMoneyCr);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_green_Arial_12_bold">
                                            <?php
                                            // echo formatInIndianStyle($totalDepositMLLoanMoney);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="ff_calibri fs_12 fw_b <?php echo $class; ?> margin_right_four">
                                            <?php
                                            //   echo formatInIndianStyle(abs($totalMoneyLeft));
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%" style="border-top: 1px dashed #bababa;border-bottom: 1px dashed #bababa;">
                                <tr style="background:#f4f4f4">
                                    <td align="left"  title="SERIAL NUMBER" class="brown_normal12_calibri" style="width:80px">S. NO
                                    </td>
                                    <td align="left" title="DATE" class="brown_normal12_calibri"style="width:120px" >
                                        DATE<?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?> /FIRM <?php } else { ?>
                                        <?php } ?>
                                    </td>
                                    <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri" style="width:180px;">
                                        <span style="margin-left:0px;"> USER</span>
                                        <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>  <span> ( CITY )</span>
                                        <?php } else { ?>
                                        <?php } ?>

                                    </td>
                                    <td align = "left" colspan="6"  class="width_300_dd brown_normal12_calibri" >
                                        <div>
                                            <table border="0" cellspacing="0" cellpadding="0" align="right">
                                                <?php if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') { ?>
                                                    <tr>
                                                        <td align="left" title="METAL TYPE" class="brown_normal11_calibri" style="width:40px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" title="GROSS WEIGHT" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" title="NET WEIGHT" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" title="FINE WEIGHT" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" title="METAL BALANCE" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" class="brown_normal11_calibri" style="width:65px; overflow:hidden;" title="FINAL VALUATION">

                                                        </td>
                                                        <td align="right" class="brown_normal11_calibri" title="FINAL VALUATION" style="width:50px; overflow:hidden;">

                                                        </td>
                                                        <td align="right" class="brown_normal11_calibri" title="FINAL VALUATION" style="width:65px; overflow:hidden;">
                                                            PRIN
                                                        </td>
                                                    </tr>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                        <td align="center" class="brown_normal12_calibri width_100_dd"></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 76px;">
                                            CASH
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:76px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 76px;">
                                            BANK
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:76px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 76px;">
                                            CARD
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:76px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 76px;">
                                            ONLINE
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:76px;"></td>
                                    <?php } ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri" style="width: 55px;">
                                        DISC.
                                    </td>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri " style="width: 80px;">
                                        <div class="margin_right_four bold">TOTAL</div>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($panelDDDetClick != 'ddDetClick') {
                                ?>
                                <?php
                            }
                            $gTotMLLoanAddPrinAmt = 0;
                            //echo "<br/>totMLLoanAdd:". $totMLLoanAdd;
                            while ($rowMLLoanAdd = mysqli_fetch_array($qResultMLLoanAdd, MYSQLI_ASSOC)) {
                                $mLId = $rowMLLoanAdd['ml_id'];
                                $mLenderId = $rowMLLoanAdd['ml_lender_id'];
                                $mLFName = $rowMLLoanAdd['ml_lender_fname'];
                                $mLLName = $rowMLLoanAdd['ml_lender_lname'];
                                $mLLCity = $rowMLLoanAdd['ml_lender_city'];
                                $firmId = $rowMLLoanAdd['ml_firm_id'];
                                $mLLoanPrinAmt = $rowMLLoanAdd['ml_main_prin_amt'];
                                $mLLoanPreSerialNo = $rowMLLoanAdd['ml_pre_serial_num'];
                                $mLLoanSerialNo = $rowMLLoanAdd['ml_serial_num'];
                                $mLLoanDOB = $rowMLLoanAdd['ml_DOB'];
                                $ml_cash_acc_id = $rowAllGirvi['ml_cash_acc_id'];

                                $gTotMLLoanAddPrinAmt += $mLLoanPrinAmt;
                                $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$firmId'";
                                $resGetFirmName = mysqli_query($conn, $getFirmName);
                                $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                $firm_name = $rowGetFirmName['firm_name'];
                                ?>
                                <tr>
                                    <td align="left" title="<?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?></h5>
                                    </td>

                                    <td align="left" title="<?php echo om_strtoupper($mLLoanDOB); ?>">
                                        <h5 class="blackArial11Font"><?php echo om_strtoupper($mLLoanDOB); ?></h5>
                                        <h5 class="blackArial11Font"><?php
                                            if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) {
                                                echo substr(om_strtoupper($firm_name), 0, 8);
                                            }
                                            ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($mLFName . ' ' . $mLLName) . ' $mLLCity :  ' . om_strtoupper($mLLCity); ?>">
                                        <table style="width:100%;table-layout:fixed;">
                                            <tr>
                                                <td style="width:125px;overflow:hidden;">
                                                    <div class="ff_tnr fw_n orange fs_11" align="left">
                                                        <a style="cursor: pointer;" onclick="navToMoneyLenderPanel('<?php echo $mLId; ?>', '<?php echo $mLenderId; ?>', 'LoanDetailPanel');">
                                                            <?php
                                                            if ($mLFName != '') {
                                                                echo substr(om_strtoupper($mLFName . ' ' . $mLLName), 0, 28);
                                                            }
                                                            ?>
                                                        </a>
                                                        <div>
                                                            <?php
                                                            if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) {
                                                                if ($mLLCity != '') {
                                                                    echo '(' . (substr(om_strtoupper($mLLCity), 0, 15)) . ')';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div> 
                                                </td>
                                            </tr>
                                        </table>    
                                    </td>
                <?php if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') { ?>
                                        <td align = "left" colspan="6"  class="width_300_dd brown_normal12_calibri">
                                            <div>
                                                <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%;table-layout:fixed;">
                                                    <tr>
                                                        <td align="left" title="" class="black_normal11_calibri" style="width:40px;overflow:hidden;">

                                                        </td>
                                                        <td align="right" title="" class="black_normal11_calibri" style="width:50px;overflow: hidden;">

                                                        </td>
                                                        <td align="right" title="" class="black_normal11_calibri" style="width:50px;overflow: hidden;">

                                                        </td>
                                                        <td align="right" title="" class="black_normal11_calibri" style="width:50px;overflow: hidden;">

                                                        </td>
                                                        <td align="right" title="" class="black_normal11_calibri" style="width:50px;overflow: hidden;">

                                                        </td>
                                                        <td align="right"  class="black_normal11_calibri"  style="width:65px;overflow: hidden;">
                    <?php //echo formatInIndianStyle(abs($mLLoanPrinAmt));  ?>
                                                        </td>
                                                        <td align="right" class=" black_normal11_calibri" style="width:50px;overflow: hidden;" title="TAX VALUATION">

                                                        </td>
                                                        <td align="right"  class="black_normal11_calibri"  style="width:65px;overflow: hidden;">
                    <?php echo formatInIndianStyle(abs($mLLoanPrinAmt)); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                <?php } else { ?>
                                        <td colspan="4">
                                            <div id="sellDetailsDiv<?php echo $sellInvId; ?>">
                                                <table border="0" cellspacing="0" cellpadding="0" align="right">
                                                    <tr>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                                                            <?php echo '&nbsp'; ?>
                                                        </td>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                                                            <?php echo '&nbsp'; ?>
                                                        </td>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                                                            <?php echo '&nbsp'; ?>
                                                        </td>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                                                            <?php echo '&nbsp'; ?>
                                                        </td>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                                                            <?php echo '&nbsp'; ?>
                                                        </td>
                                                        <td align="right" class="width_100_dd blackArial11Font">
                    <?php echo '&nbsp'; ?>
                                                        </td>

                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                            <?php } ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php
                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                echo formatInIndianStyle(abs($mLLoanPrinAmt));
                            }
                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 greenFont"><?php echo formatInIndianStyle(abs($mLLoanPrinAmt)); ?></h4>
                                    </td>
                                </tr>
            <?php } ?>
<!--                            <tr>
                                            <td align="center" colspan="4">
                                    &nbsp;
                                </td>
                                <td class="paddingTop2 padBott2" colspan="15">
                                    <hr class="hrPaleGrey">
                                    <div class="hrPaleGrey"></div>
                                </td>
                            </tr>-->
                            <tr style="background: #edf0f4;">
                                <td align="right" class="amount12 reddish" colspan="4">
            <?php echo 'TOTAL:'; ?>
                                </td>
                                <td align = "left" colspan="5"  class="width_300_dd brown_normal12_calibri">
                                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%;table-layout:fixed;">
            <?php if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') { ?>
                                            <tr>
                                                <td align="right" class=" blackArial11Font" style="width:40px;overflow:hidden;"> 
                                                </td>
                                                <td align="right"  class="brown_bold12_arial" style="width:50px;overflow:hidden; ">
                                                    <h4 class = "brown_bold12_arial" style=""><?php ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                    <h4 class = "brown_bold12_arial" style=""><?php ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                    <h4 class = "brown_bold12_arial" style=""><?php ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                    <h4 class = "brown_bold12_arial"><?php ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:65px;overflow:hidden;" >
                                                    <h4 class = "brown_bold12_arial"><?php // echo formatInIndianStyle(abs($gTotMLLoanAddPrinAmt));  ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;">
                                                    <h4 class = "brown_bold12_arial"><?php ?></h4>
                                                </td>
                                                <td align="right"  class="amount12 reddish" style="width:65px;overflow:hidden;">
                                                    <h4 class = "brown_bold12_arial"><?php echo formatInIndianStyle(abs($gTotMLLoanAddPrinAmt)); ?></h4>
                                                </td>
                                            </tr>
            <?php } else { ?>
                                            <td align="right" class="width_100_dd blackArial11Font"> 
                                            </td>
                                            <td align="right" class="width_100_dd blackArial11Font">
                                            </td>
                                            <td align="right" class="width_100_dd blackArial11Font">

                                            </td>
                                            <td align="right" class="width_100_dd blackArial11Font">

                                            </td>
                                            <td align="right" class="width_100_dd blackArial11Font">

                                            </td>
                                            <td align="right" class="width_100_dd blackArial11Font">

                                            </td>
                                        <?php } ?>
                                    </table>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 greenFont bold"><?php
                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                echo formatInIndianStyle($mLLoanPrinAmt);
                            }
                            ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 reddish"><?php echo '&nbsp'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="brown_bold12_arial"><?php echo '&nbsp'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="brown_bold12_arial"><?php echo '&nbsp'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="brown_bold12_arial"><?php ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 greenFont bold"><?php echo formatInIndianStyle($gTotMLLoanAddPrinAmt); ?></h4>
                                </td>
                            </tr>
            <?php
            if ($panelDDDetClick != 'ddDetClick') {
                ?>
                            </table>
                        </td>
                    </tr>
                </table>
                <?php
            }
        }
    }
} else {

    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['panelName'];
//
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
//
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
//$custId = $_GET['custId'];
//echo '$custId =='.$custId;
    if ($todayDate == '' || $todayDate == NULL) {
        $todayDate = date("d M Y");
    }
    $panelDDDetClick = $_GET['panelDDDetClick'];
    include 'omfrpsck.php';
    $girviDepositDate = om_strtoupper(date("d M Y", strtotime($todayDate)));
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrMLLoanDep = "and ml_lender_id = '$custId'";
    } else {
        $accLedStrMLLoanDep = NULL;
    }
//
    if ($panelDDDetClick == 'ddDetClick') {
        $mLLoanDepId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelectMLLoanAdd = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_firm_id,ml_main_prin_amt,ml_pre_serial_num,ml_serial_num,ml_DOB"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr and ml_firm_id IN ($strFrmId) and ml_loan_type IS null and ml_upd_sts IN ('New') order by ml_DOB asc";
    } else {
        $qSelectMLLoanAdd = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_firm_id,ml_main_prin_amt,ml_pre_serial_num,ml_serial_num,ml_DOB"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoan and ml_loan_type IS null and ml_firm_id IN ($strFrmId)"
                . "order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOB,'%d %b %Y')) $ddOrderBy";
    }
    $qResultMLLoanAdd = mysqli_query($conn, $qSelectMLLoanAdd);
    $mLLoanAddPresent = mysqli_num_rows($qResultMLLoanAdd);

    if ($mLLoanAddPresent > 0) {
        include 'orddmlad.php';
        $totalMoneyDeposit += $totalTodayMLLoanPrincipalCr;
        $totalMoneyLeft = $totalMoneyLeft + $totalTodayMLLoanPrincipalCr;

        $totalMoneyWithdrwal -= $totalTodayMLLoanPrincipal;
        $totalMoneyLeft = $totalMoneyLeft - $totalTodayMLLoanPrincipal;
    }
    if ($ddpanelName == 'todayDatePanel' || $ddDetPanel != '' || $panelDDDetClick == 'ddDetClick') {
        if ($mLLoanAddPresent > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            if ($panelDDDetClick != 'ddDetClick') {
                ?>
                <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5">
                    <tr>
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                                <tr>
                                    <td align="left" class="width_627_dd brown_bold12_arial">
                                        <span style="margin-left:10px">  MONEYLENDER NEW LOAN</span>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_red_Arial_12_bold">
                                            <?php
                                            //echo formatInIndianStyle($totalDepositMLLoanMoneyCr);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_green_Arial_12_bold">
                                            <?php
                                            //echo formatInIndianStyle($totalDepositMLLoanMoney);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
                <?php
                //   echo formatInIndianStyle(abs($totalMoneyLeft));
                ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" style="border-top: 1px dashed #bababa;border-bottom: 1px dashed #bababa;">
                                <tr style="background:#f4f4f4">
                                    <td align="left"  title="INVOICE NUMBER" class="brown_normal12_calibri bold" style="width: 150px">
                                        <div class="marginLeft2">INV NO</div>
                                    </td>
                                    <td align="left" title="DATE" class="brown_normal12_calibri bold"style="width: 200px" >
                                        <span style="margin-left:0px;">DATE</span>
                                    </td>
                <?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>
                                        <td align="left" title="FIRM" class="brown_normal12_calibri bold"style="width: 200px" >
                                            FIRM 
                                        </td>
                <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                                    <?php } ?>
                                    <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri bold" style="width: 250px;">
                                        <span> USER NAME</span>          
                                    </td>
                <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                        <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri bold" style="width: 200px;">
                                            <span>  CITY </span>
                                        </td>
                <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                                    <?php } ?>
                                    <td class="brown_normal12_calibri" style="width:50px;"></td>
                                    <td align = "left" colspan="6"  class="brown_normal12_calibri">
                                    </td>
                <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            CASH
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                                    <?php } ?>
                <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            BANK
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                                    <?php } ?>
                <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            CARD
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                <?php } ?>
                <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            ONLINE
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:20px;"></td>
                                    <?php } ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                        DISC.
                                    </td>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                        <div class="margin_right_four bold">TOTAL</div>
                                    </td>
                                <?php if ($showbalance == 'YES') { ?>                                    
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            BALANCE
                                        </td>
                                <?php } ?>
                                </tr>
                                <?php
                            }
                            if ($panelDDDetClick != 'ddDetClick') {
                                ?>
                                <?php
                            }
                            $gTotMLLoanAddPrinAmt = 0;
                            //echo "<br/>totMLLoanAdd:". $totMLLoanAdd;
                            while ($rowMLLoanAdd = mysqli_fetch_array($qResultMLLoanAdd, MYSQLI_ASSOC)) {
                                $mLId = $rowMLLoanAdd['ml_id'];
                                $mLenderId = $rowMLLoanAdd['ml_lender_id'];
                                $mLFName = $rowMLLoanAdd['ml_lender_fname'];
                                $mLLName = $rowMLLoanAdd['ml_lender_lname'];
                                $mLLCity = $rowMLLoanAdd['ml_lender_city'];
                                $firmId = $rowMLLoanAdd['ml_firm_id'];
                                $mLLoanPrinAmt = $rowMLLoanAdd['ml_main_prin_amt'];
                                $mLLoanPreSerialNo = $rowMLLoanAdd['ml_pre_serial_num'];
                                $mLLoanSerialNo = $rowMLLoanAdd['ml_serial_num'];
                                $mLLoanDOB = $rowMLLoanAdd['ml_DOB'];
                                $ml_cash_acc_id = $rowAllGirvi['ml_cash_acc_id'];

                                $gTotMLLoanAddPrinAmt += $mLLoanPrinAmt;
                                ?>
                                <tr>
                                <?php
                                $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$firmId'";
                                $resGetFirmName = mysqli_query($conn, $getFirmName);
                                $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                $firm_name = $rowGetFirmName['firm_name'];
                                //
                                $getUserDetail = "SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$mLenderId'";
                                $resGetUserDetail = mysqli_query($conn, $getUserDetail);
                                $rowGetUserDetail = mysqli_fetch_array($resGetUserDetail);
                                $user_fname = $rowGetUserDetail['user_fname'];
                                $user_lname = $rowGetUserDetail['user_lname'];
                                $user_city = $rowGetUserDetail['user_city'];
                                ?>
                                    <td align="left" title="<?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($mLLoanDOB); ?>">
                                        <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo om_strtoupper($mLLoanDOB); ?></h5>
                                    </td>
                                    <td align="left" >
                                        <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo substr(om_strtoupper($firm_name), 0, 8); ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY : ' . om_strtoupper($user_city); ?>">
                                        <a style="cursor: pointer;" onclick="searchGirviByGirviId(<?php echo $gId; ?>)">
                                            <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;"><?php echo substr(om_strtoupper($user_fname . ' ' . $user_lname), 0, 28); ?></div>
                                        </a>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY : ' . om_strtoupper($user_city); ?>">
                                        <a style="cursor: pointer;" onclick="searchGirviByGirviId(<?php echo $gId; ?>)">
                                            <div class="ff_tnr fw_n orange fs_11"style="margin-left:0px;"><?php echo (substr(om_strtoupper($user_city), 0, 15)); ?></div>
                                        </a>
                                    </td>
                                    <td class="brown_normal12_calibri" style="width:50px;"></td>
                                    <td align = "right" colspan="6"  class="brown_normal12_calibri">
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php echo formatInIndianStyle(abs($mLLoanPrinAmt)); ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 reddish" style="margin-right:0px;"><?php ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 reddish" style="margin-right:0px;"><?php ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($mLLoanPrinAmt)); ?></h4>
                                    </td>
                                    <!--------START CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------> 
                                        <?php if ($showbalance == 'YES') { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <?php
                                            if ($balance != '') {
                                                $open_balance = $balance;
                                            } else {
                                                $open_balance = $openingBalance;
                                            }
                                            $total = $mLLoanPrinAmt;
                                            $balance = $open_balance - $total;
                                            ?>
                                            <h4 class="amount12  " style="color:blue;"><?php echo formatInIndianStyle($balance); ?></h4></div>
                                        </td> 
                                        <!--------END CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------> 
                <?php }
            } ?>

                            </tr>
            <?php ?>
<!--                            <tr>
                                            <td align="center" colspan="4">
                                    &nbsp;
                                </td>
                                <td class="paddingTop2 padBott2" colspan="20">
                                    <hr class="hrPaleGrey">
                                    <div class="hrPaleGrey"></div>
                                </td>
                            </tr>-->
                            <tr style="background: #edf0f4;">
                                <td align="right" class="amount12 reddish bold" colspan="5">
                                    <span style="margin-left:-30px;"><?php echo 'TOTAL AMOUNT:'; ?></span>
                                </td>
                                <td colspan="7">
                                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                                        <td align="right" class="width_100_dd blackArial11Font"> 
                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">
                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                        <td align="right" class="width_100_dd blackArial11Font">

                                        </td>
                                    </table>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 greenFont bold"><?php echo formatInIndianStyle($mLLoanPrinAmt); ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 reddish"><?php echo '&nbsp'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 reddish"><?php echo '&nbsp'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 reddish" style="margin-right:0px;"><?php ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 reddish" style="margin-right:0px;"><?php ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 greenFont bold" style="margin-right:0px;"><?php echo formatInIndianStyle($gTotMLLoanAddPrinAmt); ?></h4>
                                </td>
                            <?php if ($showbalance == 'YES') { ?>
                                    <td align="right"  class="amount12 reddish bold">
                                        <h4 class="amount12 "style="color:blue;"> <?php echo formatInIndianStyle($balance); ?></h4>
                                    </td>
            <?php } ?>
                            </tr>
            <?php
            if ($panelDDDetClick != 'ddDetClick') {
                ?>
                            </table>
                        </td>
                    </tr>
                </table>
                <?php
            }
        }
    }
}
?>