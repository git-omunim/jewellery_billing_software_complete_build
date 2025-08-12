<?php
/*
 * **************************************************************************************
 * @tutorial: Money Lender Loan rel
 * **************************************************************************************
 * 
 * Created on Dec 10, 2013 3:25:36 PM
 *
 * @FileName: orddmlrl.php
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
require_once 'ommpincr.php';
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
    $checkForRelTransGirviCounter = 0;
    $mLLoanTotalFinalPrinAmt = 0;
    $mLLoanTotalFinalIntAmt = 0;
    $mLLoanTotalFinalDisAmt = 0;
    $mLLoanTotalFinalAmt = 0;
    include 'omfrpsck.php';
    $panelDDDetClick = $_GET['panelDDDetClick'];
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrMLLoanRel = "and ml_lender_id = '$custId'";
    } else {
        $accLedStrMLLoanRel = NULL;
    }
//
      if ($panelDDDetClick == 'ddDetClick') {
        $mLId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelMLLoanRel1 = "SELECT ml_id,ml_lender_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id = '$mLId'";
    } else {
        $qSelMLLoanRel1 = "SELECT ml_id,ml_lender_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')"
                . " order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) $ddOrderBy";
    }
    $resMLLoanRel1 = mysqli_query($conn, $qSelMLLoanRel1) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel1);
    $loanHideArray=array();
    while ($rowMLLoanRel1 = mysqli_fetch_array($resMLLoanRel1, MYSQLI_ASSOC)) {
        $mLId1 = $rowMLLoanRel1['ml_id'];
        $ml_lender_id1 = $rowMLLoanRel1['ml_lender_id'];
            $getTransCustId = "SELECT gtrans_cust_id from girvi_transfer where gtrans_trans_loan_id = '$mLId1'";
            $resTransCustId = mysqli_query($conn, $getTransCustId);
            $rowTransCustId = mysqli_fetch_array($resTransCustId);
            $gtrans_cust_id = $rowTransCustId['gtrans_cust_id'];
            
            $getUserFirmId = "SELECT user_firm_id from user where user_id = '$gtrans_cust_id'";  
            $resUserFirmId = mysqli_query($conn, $getUserFirmId);
            $rowUserFirmId = mysqli_fetch_array($resUserFirmId);
            $user_firm_id = $rowUserFirmId['user_firm_id'];
            
            $getLenderFirmId = "SELECT user_firm_id AS lender_firm_id from user where user_id = '$ml_lender_id1'";
            $resLenderFirmId = mysqli_query($conn, $getLenderFirmId);
            $rowLenderFirmId = mysqli_fetch_array($resLenderFirmId);
            $lender_firm_id = $rowLenderFirmId['lender_firm_id'];
            
            
            if($user_firm_id == $lender_firm_id)
            {
             array_push($loanHideArray,$mLId1);   
            }
    }
    $mlStr=implode("','",$loanHideArray);
    $mlCondition=" AND ml_id NOT IN ('$mlStr') ";
    if ($panelDDDetClick == 'ddDetClick') {
        $mLId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelMLLoanRel = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_DOR,ml_pre_serial_num,ml_serial_num,ml_prin_amt,ml_paid_amt,ml_paid_int,ml_discount_amt,ml_firm_id,ml_cash_acc_id"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id = '$mLId'";
    } else {
        $qSelMLLoanRel = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_DOR,ml_pre_serial_num,ml_serial_num,ml_prin_amt,ml_paid_amt,ml_paid_int,ml_discount_amt,ml_firm_id,ml_cash_acc_id"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') $mlCondition "
                . " order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) $ddOrderBy";
    }
    $resMLLoanRel = mysqli_query($conn, $qSelMLLoanRel) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel);
    $totMLLoanRel = mysqli_num_rows($resMLLoanRel);

    if ($totMLLoanRel > 0) {
        include 'orddmrdv.php';
        $totalMoneyDeposit -= $totTodayMLLoanRelPrincipal;
        $totalMoneyLeft = $totalMoneyLeft + $totTodayMLLoanRelPrincipal;

        $totalMoneyWithdrwal += $totalTodayMLLoanRelPrincipalCr;
        $totalMoneyLeft = $totalMoneyLeft - $totalTodayMLLoanRelPrincipalCr;
    }
    if ($ddpanelName == 'todayDatePanel' || $ddDetPanel != '' || $panelDDDetClick == 'ddDetClick') {
        if ($totMLLoanRel > 0) {
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
                            <table border="0" cellspacing="0" cellpadding="0" align="left"  width="100%">
                                <tr>
                                    <td align = "left" class="width_627_dd">
                                        <div class = "brown_bold12_arial"><span style="color:#000;margin-left:10px;">MONEYLENDER LOAN RELEASED</span></div>
                                    </td>
                                    <td align="right" class="width_120_dd"></td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_red_Arial_12_bold">
                                            <?php
                                            // echo formatInIndianStyle($totalTodayMLLoanRelPrincipalCr);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>margin_right_four">
                                            <?php
                                            // echo formatInIndianStyle($totTodayMLLoanRelPrincipal);
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
                                        DATE<?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>  /FIRM <?php } else { ?>
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
                                                        <td align="right" class="brown_normal11_calibri" title="FINAL VALUATION" style="width:60px; overflow:hidden;">
                                                            PRIN
                                                        </td>
                                                        <td align="right" class="brown_normal11_calibri" title="BALANCE LEFT" style="width:55px; overflow:hidden;">
                                                            INT
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
                            while ($rowMLLoanRel = mysqli_fetch_array($resMLLoanRel, MYSQLI_ASSOC)) {
                                $mLId = $rowMLLoanRel['ml_id'];
                                $mLenderId = $rowMLLoanRel['ml_lender_id'];
                                $mLFName = $rowMLLoanRel['ml_lender_fname'];
                                $mLLName = $rowMLLoanRel['ml_lender_lname'];
                                $mLLCity = $rowMLLoanRel['ml_lender_city'];
                                $mLLNameDOR = $rowMLLoanRel['ml_DOR'];
                                $mLLoanPreSerialNo = $rowMLLoanRel['ml_pre_serial_num'];
                                $mLLoanSerialNo = $rowMLLoanRel['ml_serial_num'];
                                $mLLoanPrinAmt = $rowMLLoanRel['ml_prin_amt'];
                                $mLLoanMainPaidAmt = $rowMLLoanRel['ml_paid_amt'];
                                $mLLoanPaidInt = $rowMLLoanRel['ml_paid_int'];
                                $mLLoanPaidDiscount = $rowMLLoanRel['ml_discount_amt'];

                                $mLLoanTotalFinalPrinAmt += $mLLoanPrinAmt;
                                $mLLoanTotalFinalIntAmt += $mLLoanPaidInt;
                                $mLLoanTotalFinalDisAmt += $mLLoanPaidDiscount;
                                $mLLoanTotalFinalAmt += $mLLoanMainPaidAmt;
                                ?>
                                <tr>
                                    <?php
                                    if ($panelDDDetClick != 'ddDetClick') {
                                        $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$rowMLLoanRel[ml_firm_id]'";
                                        $resGetFirmName = mysqli_query($conn, $getFirmName);
                                        $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                        $firm_name = $rowGetFirmName['firm_name'];
                                        ?>
                                        <td align="left" title="<?php echo $mLLoanPreSerialNo . $mLLoanSerialNo; ?>">
                                            <h5 class="blackArial11Font"><?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?></h5>
                                        </td>
                                        <td align="left" title="<?php echo om_strtoupper($mLLNameDOR); ?>">
                                            <h5 class="blackArial11Font"><?php echo om_strtoupper($mLLNameDOR); ?></h5>
                                            <h5 class="blackArial11Font"><?php
                                                if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) {
                                                    echo substr(om_strtoupper($firm_name), 0, 8);
                                                }
                                                ?></h5>
                                        </td>
                                        <td align="left" title="<?php echo om_strtoupper($mLFName . ' ' . $mLLName) . ' CITY :  ' . om_strtoupper($mLLCity); ?>">
                                            <table style="width:100%;table-layout:fixed;">
                                                <tr>
                                                    <td style="width:125px;overflow:hidden;">
                                                        <div class="ff_tnr fw_n orange fs_11" align="left">
                                                            <a style="cursor: pointer;" onclick="navToMoneyLenderPanel('<?php echo $mLId; ?>', '<?php echo $mLenderId; ?>', 'ReleaseLoanDetail')">
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
                                    <?php } ?>
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
                                                        <td align="right" class=" black_normal11_calibri" style="width:65px;overflow: hidden;" title="FINAL VALUATION">

                                                        </td>
                                                        <td align="right" class="amount12 reddish" style="width:60px;overflow: hidden;"> 
                                                            <h4 class="amount12 reddish"><?php echo formatInIndianStyle($mLLoanPrinAmt); ?></h4>
                                                        </td>
                                                        <td align="right" class="amount12 reddish" style="width:55px;overflow: hidden;">
                                                            <h4 class="amount12 reddish" ><?php echo formatInIndianStyle($mLLoanPaidInt + $mLLoanPaidDiscount); ?></h4>
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
                                        <h4 class="amount12 redFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($mLLoanMainPaidAmt));
                                            }/* CODE ADDED TO SHOW AMOUNT PAID BY CASH,@AUTHOR:HEMA-29MAY2020 */
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
                                        <h4 class="amount12 redFont"><?php echo formatInIndianStyle($mLLoanPaidDiscount); ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mLLoanMainPaidAmt)); ?></h4>
                                    </td>
                                </tr>
                                <?php
                            }
                            if (($ddDetPanel == 'expandAll') && $totMLLoanRel > 0) {
                                ?>
<!--                                <tr>
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
                                                    <td align="right"  class="amount12 reddish" style="width:60px;overflow:hidden;" >
                                                        <h4 class = "brown_bold12_arial"><?php ?></h4>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:65px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"><?php echo formatInIndianStyle($mLLoanTotalFinalPrinAmt); ?></h4>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:55px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"><?php echo formatInIndianStyle($mLLoanTotalFinalIntAmt); ?></h4>
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
                                        <h4 class = "amount12 redFont bold"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                echo formatInIndianStyle($mLLoanTotalFinalAmt);
                                            }/* CODE ADDED TO SHOW TOTAL CASH,@AUTHOR:HEMA-29MAY2020 */
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont bold"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont bold"> <?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont bold"><?php echo '&nbsp'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont bold"><?php echo formatInIndianStyle($mLLoanTotalFinalDisAmt); ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont bold"><?php echo formatInIndianStyle($mLLoanTotalFinalAmt); ?>
                                    </td>
                                </tr>
                                <?php
                            }
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
    $checkForRelGirviCounter = 0;
    $gTotalFinalPrinAmt = 0;
    $gTotalFinalIntAmt = 0;
    $gTotalFinalDisAmt = 0;
    $gTotalFinalAmt = 0;
    $gTotalMainPrinAmt = 0;
    $panelDDDetClick = $_GET['panelDDDetClick'];
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
    include 'omfrpsck.php';
    $panelDDDetClick = $_GET['panelDDDetClick'];
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrMLLoanRel = "and ml_lender_id = '$custId'";
    } else {
        $accLedStrMLLoanRel = NULL;
    }
//
     if ($panelDDDetClick == 'ddDetClick') {
        $mLId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelMLLoanRel1 = "SELECT ml_id,ml_lender_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id = '$mLId'";
    } else {
        $qSelMLLoanRel1 = "SELECT ml_id,ml_lender_id FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released')"
                . " order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) $ddOrderBy";
    }
    $resMLLoanRel1 = mysqli_query($conn, $qSelMLLoanRel1) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel1);
    $loanHideArray=array();
    while ($rowMLLoanRel1 = mysqli_fetch_array($resMLLoanRel1, MYSQLI_ASSOC)) {
        $mLId1 = $rowMLLoanRel1['ml_id'];
        $ml_lender_id1 = $rowMLLoanRel1['ml_lender_id'];
            $getTransCustId = "SELECT gtrans_cust_id from girvi_transfer where gtrans_trans_loan_id = '$mLId1'";
            $resTransCustId = mysqli_query($conn, $getTransCustId);
            $rowTransCustId = mysqli_fetch_array($resTransCustId);
            $gtrans_cust_id = $rowTransCustId['gtrans_cust_id'];
            
            $getUserFirmId = "SELECT user_firm_id from user where user_id = '$gtrans_cust_id'";  
            $resUserFirmId = mysqli_query($conn, $getUserFirmId);
            $rowUserFirmId = mysqli_fetch_array($resUserFirmId);
            $user_firm_id = $rowUserFirmId['user_firm_id'];
            
            $getLenderFirmId = "SELECT user_firm_id AS lender_firm_id from user where user_id = '$ml_lender_id1'";
            $resLenderFirmId = mysqli_query($conn, $getLenderFirmId);
            $rowLenderFirmId = mysqli_fetch_array($resLenderFirmId);
            $lender_firm_id = $rowLenderFirmId['lender_firm_id'];
            if($user_firm_id == $lender_firm_id)
            {
             array_push($loanHideArray,$mLId1);   
            }
    }
    $mlStr=implode("','",$loanHideArray);
    $mlCondition=" AND ml_id NOT IN ('$mlStr') ";
    if ($panelDDDetClick == 'ddDetClick') {
        $mLId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        $qSelMLLoanRel = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_DOR,ml_pre_serial_num,ml_serial_num,ml_prin_amt,ml_paid_amt,ml_paid_int,ml_discount_amt,ml_firm_id,ml_cash_acc_id"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' and ml_id = '$mLId'";
    } else {
        $qSelMLLoanRel = "SELECT ml_id,ml_lender_id,ml_lender_fname,ml_lender_lname,ml_lender_city,ml_DOR,ml_pre_serial_num,ml_serial_num,ml_prin_amt,ml_paid_amt,ml_paid_int,ml_discount_amt,ml_firm_id,ml_cash_acc_id"
                . " FROM ml_loan where ml_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrMLLoanRel and ml_firm_id IN ($strFrmId) and ml_upd_sts IN ('Released') $mlCondition"
                . " order by UNIX_TIMESTAMP(STR_TO_DATE(ml_DOR,'%d %b %Y')) $ddOrderBy";
    }
    $resMLLoanRel = mysqli_query($conn, $qSelMLLoanRel) or die("Error: " . mysqli_error($conn) . " with query " . $qSelMLLoanRel);
    $totMLLoanRel = mysqli_num_rows($resMLLoanRel);
   
    if ($totMLLoanRel > 0) {
        include 'orddmrdv.php';
        $totalMoneyDeposit -= $totTodayMLLoanRelPrincipal;
        $totalMoneyLeft = $totalMoneyLeft + $totTodayMLLoanRelPrincipal;

        $totalMoneyWithdrwal += $totalTodayMLLoanRelPrincipalCr;
        $totalMoneyLeft = $totalMoneyLeft - $totalTodayMLLoanRelPrincipalCr;
    }
    if ($ddpanelName == 'todayDatePanel' || $ddDetPanel != '' || $panelDDDetClick == 'ddDetClick') {
        if ($totMLLoanRel > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            if ($panelDDDetClick != 'ddDetClick') {
                ?>
                <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5" style="border-top: 1px dashed #bababa;border-bottom: 1px dashed #bababa;">
                    <tr style="background:#f4f4f4">
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                                <tr>
                                    <td align = "left" class="width_627_dd">
                                        <div class = "brown_bold12_arial">MONEYLENDER LOAN RELEASED</div>
                                    </td>
                                    <td align="right" class="width_120_dd"></td>
                                    <td align="right" class="width_120_dd">
                                        <div class="text_red_Arial_12_bold">
                                            <?php
                                            //echo formatInIndianStyle($totalTodayMLLoanRelPrincipalCr);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>margin_right_four">
                                            <?php
                                            //echo formatInIndianStyle($totTodayMLLoanRelPrincipal);
                                            ?>
                                        </div>
                                    </td>
                                    <td align="right" class="width_120_dd">
                                        <div class="ff_calibri fs_12 fw_b <?php echo $class; ?> margin_right_four">
                                            <?php
                                            //  echo formatInIndianStyle(abs($totalMoneyLeft));
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align = "left">
                            <table border="0" cellspacing="0" cellpadding="0" align="left">
                                <tr>
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
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                    <?php } ?>
                                    <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri bold" style="width: 250px;">
                                        <span> USER NAME</span>          
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                        <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri bold" style="width: 200px;">
                                            <span>  CITY </span>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                    <?php } ?>
                                    <td class="brown_normal12_calibri" style="width:50px;"></td>
                                    <td align = "left" colspan="6"  class="brown_normal12_calibri">
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            CASH
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            BANK
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            CARD
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                        <td align = "right" title="CASH" class=" brown_normal12_calibri bold" style="width: 100px;">
                                            ONLINE
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
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
                            while ($rowMLLoanRel = mysqli_fetch_array($resMLLoanRel, MYSQLI_ASSOC)) {
                                $mLId = $rowMLLoanRel['ml_id'];
                                $mLenderId = $rowMLLoanRel['ml_lender_id'];
                                $mLFName = $rowMLLoanRel['ml_lender_fname'];
                                $mLLName = $rowMLLoanRel['ml_lender_lname'];
                                $mLLCity = $rowMLLoanRel['ml_lender_city'];
                                $mLLNameDOR = $rowMLLoanRel['ml_DOR'];
                                $mLLoanPreSerialNo = $rowMLLoanRel['ml_pre_serial_num'];
                                $mLLoanSerialNo = $rowMLLoanRel['ml_serial_num'];
                                $mLLoanPrinAmt = $rowMLLoanRel['ml_prin_amt'];
                                $mLLoanMainPaidAmt = $rowMLLoanRel['ml_paid_amt'];
                                $mLLoanPaidInt = $rowMLLoanRel['ml_paid_int'];
                                $mLLoanPaidDiscount = $rowMLLoanRel['ml_discount_amt'];
                                $mLCashAccId = $rowMLLoanRel['ml_cash_acc_id'];
                                $mLLoanTotalFinalPrinAmt += $mLLoanPrinAmt;
                                $mLLoanTotalFinalIntAmt += $mLLoanPaidInt;
                                $mLLoanTotalFinalDisAmt += $mLLoanPaidDiscount;
                                $mLLoanTotalFinalAmt += $mLLoanMainPaidAmt;
                                
                                $getAccName = "SELECT acc_main_acc from accounts where acc_id = '$mLCashAccId'";
                                $resAccName = mysqli_query($conn, $getAccName);
                                $rowAccName = mysqli_fetch_array($resAccName);
                                $acc_main_acc = $rowAccName['acc_main_acc'];
            
                                if($acc_main_acc == 'Cash in Hand'){
                                    $mlTotalCashAmt += $mLLoanMainPaidAmt;
                                }else if($acc_main_acc == 'Bank Account'){
                                    $mlTotalBankAmt += $mLLoanMainPaidAmt;
                                }else if($acc_main_acc == 'Card Payment'){
                                    $mlTotalCardAmt += $mLLoanMainPaidAmt;
                                }else if($acc_main_acc == 'Online Payment'){
                                    $mlTotalOnlineAmt += $mLLoanMainPaidAmt;
                                }
                                ?>
                                <tr>
                                    <?php
                                    if ($panelDDDetClick != 'ddDetClick') {
                                        $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$gFirmId'";
                                        $resGetFirmName = mysqli_query($conn, $getFirmName);
                                        $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                        $firm_name = $rowGetFirmName['firm_name'];
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->         
                                        //parse_str(getTableValues("SELECT user_fname,user_lname,user_city, FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$custId'"));
                                        ?>
                                        <td align="left" title="<?php echo $mLLoanPreSerialNo . $mLLoanSerialNo; ?>">
                                            <h5 class="blackArial11Font"><?php echo substr($mLLoanPreSerialNo . $mLLoanSerialNo, 0, 15); ?></h5>
                                        </td>
                                        <td align="left" title="<?php echo om_strtoupper($mLLNameDOR); ?>">
                                            <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo om_strtoupper($mLLNameDOR); ?></h5>

                                        </td>
                                        <?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>
                                            <td align="left">
                                                <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo substr(om_strtoupper($firm_name), 0, 8); ?></h5>
                                            </td>
                                        <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                        <?php } ?>
                                        <td align="left" title="<?php echo om_strtoupper($mLFName . ' ' . $mLLName) . ' CITY : ' . om_strtoupper($mLLCity); ?>">
                                            <a style="cursor: pointer;" onclick="navToMoneyLenderPanel('<?php echo $mLId; ?>', '<?php echo $mLenderId; ?>', 'ReleaseLoanDetail')">
                                                <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;">
                                                    <?php
                                                    /* START ADDED TO SHOW MONEYLENDER NAME,@AUTHOR:HEMA-29MAY2020 */
                                                    if ($mLFName != '') {
                                                        echo substr(om_strtoupper($mLFName . ' ' . $mLLName), 0, 28);
                                                    }
                                                    /* END CODE TO SHOW MONEYLENDER NAME,@AUTHOR:HEMA-29MAY2020 */
                                                    ?>
                                                </div>
                                            </a>
                                        </td>
                                        <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                            <td align="left" >
                                                <a style="cursor: pointer;" onclick="navToMoneyLenderPanel('<?php echo $mLId; ?>', '<?php echo $mLenderId; ?>', 'ReleaseLoanDetail')">
                                                    <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;">
                                                        <?php
                                                        /* START ADDED TO SHOW MONEYLENDER CITY,@AUTHOR:HEMA-29MAY2020 */
                                                        if ($mLLCity != '') {
                                                            echo '(' . (substr(om_strtoupper($mLLCity), 0, 15)) . ')';
                                                        }
                                                        /* END CODE TO SHOW MONEYLENDER NAME AND CITY,@AUTHOR:HEMA-29MAY2020 */
                                                        ?>
                                                    </div>
                                                </a>
                                            </td>
                                        <?php } else { ?><td class="brown_normal12_calibri" style="width:200px;"></td>
                                        <?php } ?>
                                        <td class="brown_normal12_calibri" style="width:50px;"></td>
                                    <?php } ?>
                                    <td align = "right" colspan="6"  class="brown_normal12_calibri">
                                    </td>

                                    <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <?php if ($acc_main_acc == 'Cash in Hand') { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mLLoanMainPaidAmt)); ?></h4>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                            </td>
                                        <?php }
                                    } else {
                                        ?><td class="amount12 redFont"style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                    <?php if ($acc_main_acc == 'Bank Account') { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo $mLLoanMainPaidAmt; ?></h4>
                                            </td>
                    <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                            </td>
                                        <?php }
                                    } else {
                                        ?><td class="amount12 redFont"style="width:200px;"></td>
                <?php } ?>
                 <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                    <?php if ($acc_main_acc == 'Card Payment') { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo $mLLoanMainPaidAmt; ?></h4>
                                            </td>
                    <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                            </td>
                                        <?php }
                                    } else {
                                        ?><td class="amount12 redFont"style="width:200px;"></td>
                <?php } ?>
                 <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                    <?php if ($acc_main_acc == 'Online Payment') { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo $mLLoanMainPaidAmt; ?></h4>
                                            </td>
                    <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                            </td>
                                        <?php }
                                    } else {
                                        ?><td class="amount12 redFont"style="width:200px;"></td>
                <?php } ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont"><?php echo formatInIndianStyle(abs($mLLoanPaidDiscount)); ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mLLoanMainPaidAmt)); ?></h4>
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
                                            $total = $mLLoanMainPaidAmt;
                                            $balance = $open_balance - $total;
                                            ?>
                                            <h4 class="amount12  " style="color:blue;"><?php echo formatInIndianStyle($balance); ?></h4></div>
                                        </td> 
                                <?php } ?>
                                    <!--------END CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------> 
                                </tr>
                                <?php
                            }
                            ?>
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
                                        <tr>
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
                                        </tr>
                                    </table>                                 
            <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {?>
                <?php if ($mlTotalCashAmt != '') { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mlTotalCashAmt)); ?></h4>
                                        </td>
                <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php }
                                } else {
                                    ?><td class="amount12 redFont"style="width:200px;"></td>
            <?php } ?>
            <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                    <?php if ($mlTotalBankAmt != '') { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mlTotalBankAmt)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php }
                                } else {
                                    ?><td class="amount12 redFont"style="width:200px;"></td>
                                <?php } ?>
                               <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {?>
                                    <?php if ($mlTotalCardAmt != '') {?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mlTotalCardAmt)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php }
                                } else {
                                    ?><td class="amount12 redFont"style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                  ?>
                                    <?php if ($mlTotalOnlineAmt != '') { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($mlTotalOnlineAmt)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php }
                                } else {
                                    ?><td class="amount12 redFont"style="width:200px;"></td>
                                <?php } ?>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php echo formatInIndianStyle(abs($mLLoanTotalFinalDisAmt)); ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php echo formatInIndianStyle(abs($mLLoanTotalFinalAmt)); ?></h4>
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