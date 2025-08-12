<?php
/*
 * **************************************************************************************
 * @tutorial: dd scheme add 
 * **************************************************************************************
 * 
 * Created on Oct 24, 2017 4:49:47 PM
 *
 * @FileName: omscheme.php
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
 *  AUTHOR:Bajrang
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
    if ($todayDate == '' || $todayDate == NULL) {
        $todayDate = date("d M Y");
    }
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['panelName'];
    //
    //echo '$panelName =='.$panelName;
    //
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
    //
    //echo '$panelName =='.$panelName;
    //
    //echo '$ddMainPanel =='.$ddMainPanel;
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
    //
    //
    include 'omfrpsck.php';
    //
    //
    /*     * *******************************START CODE TO GET DETAILS FROM UTIN TRANSECTION TABLE TO SHOW OPENING,CLOSING BALANCE AND TODAYS TOTAL,@AUTHOR:HEMA-27MAY2020**************** */
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    //
    //
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSch = "and kitty_mondep_cust_id = '$custId'";
    } else {
        $accLedStrSch = NULL;
    }
    //
    //
//    $qSelectSchemeDepositeAdd = " SELECT * FROM kitty_money_deposit where kitty_mondep_own_id='$_SESSION[sessionOwnerId]' "
//            . " $dateStr and kitty_mondep_EMI_status IN('Paid','Payment') "
//            //. " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode = 'Cash') "
//            . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
//            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
//
////    echo '$qSelectSchemeDepositeAdd=='.$qSelectSchemeDepositeAdd.'<br>';
//    //
//    $qResultSchemeDepositeAdd = mysqli_query($conn, $qSelectSchemeDepositeAdd);
//    //
//    $schemeDepositeAdd = mysqli_num_rows($qResultSchemeDepositeAdd);
    //
    //
    
     $qSelectSchemeDepositeAdd = "SELECT COUNT(*) AS record_count FROM kitty_money_deposit where kitty_mondep_own_id='$_SESSION[sessionOwnerId]' "
            . " $dateStr and kitty_mondep_EMI_status IN('Paid','Payment') "
            //. " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode = 'Cash') "
            . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
    
//    echo '$qSelectSchemeDepositeAdd=='.$qSelectSchemeDepositeAdd.'<br>';
    //
    $qResultSchemeDepositeAdd = mysqli_query($conn, $qSelectSchemeDepositeAdd);
    $rowSchemeDepositeAdd = mysqli_fetch_array($qResultSchemeDepositeAdd, MYSQLI_ASSOC);
        //
       $schemeDepositeAdd = $rowSchemeDepositeAdd['record_count'];
    //
    //
    if ($schemeDepositeAdd > 0) {
        //
        // FOR SCHEME - CASH PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelect = " SELECT SUM(kitty_mondep_EMI_total_amt) as total FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode = 'Cash') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $qResultdep = mysqli_query($conn, $qSelect);
        //
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        //
        $todaysDeposit = $rowdep['total'];
        //
        //$totalMoneyDeposit += $todaysDeposit;
        //$totalMoneyLeft = $totalMoneyLeft + $todaysDeposit;
        //
        //
        //
        //
        // FOR SCHEME - ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectOnline = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalOnline FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Online') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepOnline = mysqli_query($conn, $qSelectOnline);
        //
        $rowOnlineDep = mysqli_fetch_array($resultDepOnline, MYSQLI_ASSOC);
        //
        $todaysOnlineDeposit = $rowOnlineDep['totalOnline'];
        //
        //
        //
        //
        // FOR SCHEME - CHEQUE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectCheque = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalCheque FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Cheque') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepCheque = mysqli_query($conn, $qSelectCheque);
        //
        $rowChequeDep = mysqli_fetch_array($resultDepCheque, MYSQLI_ASSOC);
        //
        $todaysChequeDeposit = $rowChequeDep['totalCheque'];
        //
        //
        //
        //
        // FOR SCHEME - CARD PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectCard = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalCard FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Card') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepCard = mysqli_query($conn, $qSelectCard);
        //
        $rowCardDep = mysqli_fetch_array($resultDepCard, MYSQLI_ASSOC);
        //
        $todaysCardDeposit = $rowCardDep['totalCard'];
        //
        //
    }
    // 
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    //
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrNewOrder = "and utin_user_id = '$custId'";
    } else {
        $accLedStrNewOrder = NULL;
    }
    //
    if ($panelDDDetClick == 'ddDetClick') {
        //
        $invId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        //
        if ($ddpanelName == 'dayBeforePanel') {
            //
            //$dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
            //
            $oneDayMinusStrToTime = $todayFromStrDate - 60 * 60 * 24;
            //
            if ($acc_cash_opening_strtodate != '')
                if ($acc_cash_opening_strtodate == $todayFromStrDate)
                    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))>$acc_cash_opening_strtodate and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
                else
                    $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $acc_cash_opening_strtodate AND $oneDayMinusStrToTime";
            else
                $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
        } else {
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
        }
        $qSelSchemeDet = "SELECT COUNT(*) AS record_count FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_type = 'scheme' and utin_transaction_type IN ('scheme') and utin_id = '$invId'";
    } else {
        $qSelSchemeDet = "SELECT COUNT(*) AS record_count FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrNewOrder and utin_type = 'scheme' and utin_transaction_type IN ('scheme') and utin_firm_id IN ($strFrmId) order by "
                . "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy";
    }
    //
//    $resSchemeDet = mysqli_query($conn, $qSelSchemeDet);
//    $noOfSchemeDet = mysqli_num_rows($resSchemeDet);
    //
    $qResultSelSchemeDet = mysqli_query($conn, $qSelSchemeDet);
    $rowSelSchemeDet = mysqli_fetch_array($qResultSelSchemeDet, MYSQLI_ASSOC);
    $noOfSchemeDet = $rowSelSchemeDet['record_count'];
    //
    if ($noOfSchemeDet > 0) {
        //
        $newSchemeDetAddedPresent = mysqli_num_rows($resSchemeDet);
        //
        if ($newSchemeDetAddedPresent > 0) {
            //
            //Get Total Cash Amount Received From new_order_invoice Table
            $qSelectTotalSchemeDeposite = "SELECT SUM(utin_cash_amt_rec + utin_pay_cheque_amt + (utin_pay_card_amt + utin_pay_trans_chrg)+(utin_online_pay_amt - utin_pay_comm_paid)) as total_cash_amt_rec, "
                    . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
                    . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
                    . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
                    . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
                    . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
                    . "SUM(utin_discount_amt) as utin_discount_amt "
                    . "FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                    . "$dateStr $accLedStrNewOrder and utin_type = 'scheme' and utin_utin_id = '' "
                    . "and utin_transaction_type IN ('scheme') and utin_firm_id IN ($strFrmId)"; //CODE ADDED TO SHOW AMOUNT IN AMOUNT PROPERLY,@AUTHOR:HEMA-29DEC2020
            //
//            echo '$qSelectTotalSchemeDeposite=='.$qSelectTotalSchemeDeposite.'<br>';
            $qResultTotalSchemeDeposite = mysqli_query($conn, $qSelectTotalSchemeDeposite) or die(mysqli_error($conn));
            //
            $rowTotalSchemeDeposite = mysqli_fetch_array($qResultTotalSchemeDeposite, MYSQLI_ASSOC);
            //
            $totalTodaySchemeDeposite = $rowTotalSchemeDeposite['total_cash_amt_rec'];
            //
            $totalDiscount = $rowTotalSchemeDeposite['utin_discount_amt'];
            //
            if ($ddpanelName == 'dayBeforePanel') {
                $open_in_utin_cash_amt_rec += $rowTotalSchemeDeposite['utin_cash_amt_rec'] + $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
                $open_in_utin_pay_cheque_amt += $rowTotalSchemeDeposite['utin_pay_cheque_amt'] + $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
                $open_in_utin_pay_card_amt += $rowTotalSchemeDeposite['utin_pay_card_amt'] + $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
                $open_in_utin_online_pay_amt += $rowTotalSchemeDeposite['utin_online_pay_amt'] + $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
                $open_in_utin_pay_comm_paid += $rowTotalSchemeDeposite['utin_pay_comm_paid'];
                $open_in_utin_pay_disc_amt += $rowTotalSchemeDeposite['utin_discount_amt'];
            } else {
                //Hiding $todaysChequeDeposit,$todaysCardDeposit,$todaysOnlineDeposit option scheme issue @Author:Vinod03APR2023
                $today_in_utin_cash_amt_rec += $rowTotalSchemeDeposite['utin_cash_amt_rec'] + $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
                $today_in_utin_pay_cheque_amt += $rowTotalSchemeDeposite['utin_pay_cheque_amt'];// + $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_pay_card_amt += $rowTotalSchemeDeposite['utin_pay_card_amt'];// + $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_online_pay_amt += $rowTotalSchemeDeposite['utin_online_pay_amt'];// + $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_pay_comm_paid += $rowTotalSchemeDeposite['utin_pay_comm_paid'];
                $today_in_utin_pay_disc_amt += $rowTotalSchemeDeposite['utin_discount_amt'];
            }
        }
    } else if ($todaysDeposit > 0) {
        if ($ddpanelName == 'dayBeforePanel') {
            $open_in_utin_cash_amt_rec += $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
            $open_in_utin_pay_cheque_amt += $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
            $open_in_utin_pay_card_amt += $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
            $open_in_utin_online_pay_amt += $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
        } else {
            $today_in_utin_cash_amt_rec += $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
            $today_in_utin_pay_cheque_amt += $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
            $today_in_utin_pay_card_amt += $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
            $today_in_utin_online_pay_amt += $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
        }
    }
    //
    /*     * *******************************END CODE TO GET DETAILS FROM UTIN TRANSACTION TABLE TO SHOW OPENING,CLOSING BALANCE AND TODAYS TOTAL,@AUTHOR:HEMA-27MAY2020 **************** */
    //
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSch = "and kitty_mondep_cust_id = '$custId'";
    } else {
        $accLedStrSch = NULL;
    }
    //
    //
    //echo '$accLedStrSch =='.$accLedStrSch;
    //
    //
    $qSelectAdMnAdd = " SELECT kitty_mondep_kitty_id,kitty_mondepd_recipit_no,kitty_mondep_EMI_total_amt,kitty_mondep_firm_id,kitty_mondep_cust_id,kitty_mondep_EMI_paid_date,kitty_pay_mode,kitty_mondep_id,kitty_mondep_utin_id,kitty_paid_amt"
            . " FROM kitty_money_deposit where kitty_mondep_own_id='$_SESSION[sessionOwnerId]' "
            . " $dateStr and kitty_mondep_EMI_status IN('Paid','Payment') "
            . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
    //
    $qResultAdMnAdd = mysqli_query($conn, $qSelectAdMnAdd);
    $ddMnAdd = mysqli_num_rows($qResultAdMnAdd);
    //
    if ($ddMnAdd > 0) {
        $qSelect = " SELECT SUM(kitty_mondep_EMI_total_amt) as total FROM kitty_money_deposit "
                . " where kitty_mondep_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        $qResultdep = mysqli_query($conn, $qSelect);
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        $todaysDeposit = $rowdep['total'] - $totalDiscount;
        $totalMoneyDeposit += $todaysDeposit;  /* CODE ADDED TO MINUS TOTAL DISCOUNT ,@AUTHOR:HEMA-31MAY2020 */
        $totalMoneyLeft = $totalMoneyLeft + $todaysDeposit;
    }
    if ($ddpanelName == 'todayDatePanel') {
        if ($ddMnAdd > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            ?>
            <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5" width="100%">
                <tr>
                    <td align = "left">
                        <table border="0" cellspacing="0" cellpadding="0" align="left"  width="100%">
                            <tr>
                                <td align = "left" class="width_627_dd">
                                    <div class = "brown_bold12_arial"><span style="color:#000;margin-left:10px;">SCHEME ADD</span></div>
                                </td>
                                <td align="right" class="width_120_dd">
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_green_Arial_12_bold">
                                        <?php
                                        //echo formatInIndianStyle(abs($todaysDeposit));
                                        ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?> margin_right_four">
                                        <?php
                                        //echo formatInIndianStyle(abs($totalMoneyLeft));
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
                                <td align="left"  title="SERIAL NUMBER" class="brown_normal12_calibri " style="width:80px">
                                    <div class="marginLeft2">S. NO</div>
                                </td>
                                <td align="left" title="DATE" class="brown_normal12_calibri "style="width:120px" >
                                    DATE<?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>  /FIRM <?php } else { ?>
                                    <?php } ?>
                                </td>
                                <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri " style="width:180px;">
                                    <span style="margin-left:0px;"> USER</span>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>  <span> ( CITY )</span>
                                    <?php } else { ?>
                                    <?php } ?>

                                </td>
                                <td align = "left" colspan="6"  class=" brown_normal12_calibri ">
                                    <div>
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%;table-layout:fixed;">
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
                                                <td align="right" class=" brown_normal11_calibri" title="FINAL VALUATION" style="width:65px; overflow:hidden;">

                                                </td>
                                                <td align="right" class=" brown_normal11_calibri" title="TAX VALUATION" style="width:50px; overflow:hidden;">

                                                </td>
                                                <td align="right" class=" brown_normal11_calibri" title="BALANCE LEFT" style="width:65px; overflow:hidden;">

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 76px;">
                                        CASH
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:76px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 76px;">
                                        BANK
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:76px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 76px;">
                                        CARD
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:76px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 76px;">
                                        ONLINE
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:76px;"></td>
                                <?php } ?>
                                <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 55px;">
                                    DISC.
                                </td>
                                <td align = "right" title="CASH" class=" brown_normal12_calibri  " style="width: 80px;">
                                    <div class="margin_right_four bold">TOTAL</div>
                                </td>
                            </tr>
                            <?php
                            $serialNo = 1;
                            $totAdmnAmt = 0;
                            while ($rowAdMnAdd = mysqli_fetch_array($qResultAdMnAdd, MYSQLI_ASSOC)) {
                                //
                                $kitty_mondep_kitty_id = $rowAdMnAdd['kitty_mondep_kitty_id']; //CODE ADDED TO SHOW KITTY SERIAL NUMBER,@AUTHOR:HEMA-16FEB2021
                                //
                                $getkittyDetail = "SELECT kitty_pre_serial_num,kitty_serial_num FROM kitty WHERE kitty_id='$kitty_mondep_kitty_id'";
                                $reskittyDetail = mysqli_query($conn, $getkittyDetail);
                                $rowkittyDetail = mysqli_fetch_array($reskittyDetail);
                                $kittyPreSerialNum = $rowkittyDetail['kitty_pre_serial_num'];
                                $kittySerialNum = $rowkittyDetail['kitty_serial_num'];
                                //
                                $kitty_mondep_receipt_id = $rowAdMnAdd['kitty_mondepd_recipit_no']; // TO GET RECEIPT NO @AUTHOR:MADHUREE-31MAY2021
                                //
                                $admnAmt = $rowAdMnAdd['kitty_paid_amt'];
                                $admnFirmId = $rowAdMnAdd['kitty_mondep_firm_id'];
                                $admnCustId = $rowAdMnAdd['kitty_mondep_cust_id'];
                                $admnDOB = $rowAdMnAdd['kitty_mondep_EMI_paid_date'];
                                //
                                //
                                $totAdmnAmt += $admnAmt;
                                //
                                //
                                //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                //
                                $getUserDetail = "SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$admnCustId'";
                                $resGetUserDetail = mysqli_query($conn, $getUserDetail);
                                $rowGetUserDetail = mysqli_fetch_array($resGetUserDetail);
                                $user_fname = $rowGetUserDetail['user_fname'];
                                $user_lname = $rowGetUserDetail['user_lname'];
                                $user_city = $rowGetUserDetail['user_city'];
                                //
                                $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$admnFirmId'";
                                $resGetFirmName = mysqli_query($conn, $getFirmName);
                                $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                $firm_name = $rowGetFirmName['firm_name'];
                                //
                                $kitty_pay_mode = $rowAdMnAdd['kitty_pay_mode'];
                                //
                                $kittyMonDepId = $rowAdMnAdd['kitty_mondep_id'];
                                $kittyMonDepUtinId = $rowAdMnAdd['kitty_mondep_utin_id'];
                                //
                                //
                                $qSelectMonDepPayDet = "SELECT utin_cash_amt_rec,utin_pay_cheque_amt,utin_pay_card_amt,utin_discount_amt,utin_cash_balance,utin_discount_amt_discup,utin_pay_trans_chrg,utin_online_pay_amt,utin_pay_comm_paid,utin_pay_trans_chrg"
                                        . " FROM user_transaction_invoice "
                                        . "where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . "AND utin_type='scheme' "
                                        . "and utin_id='$kittyMonDepUtinId'";
                                //
//                                echo '<br/>'.$qSelectMonDepPayDet .'<br>';
                                //
                                $qResultMonDepPayDet = mysqli_query($conn, $qSelectMonDepPayDet);
                                //
                                $ddMnSchemeMonDepDet = mysqli_num_rows($qResultMonDepPayDet);
                                //
                                if ($ddMnSchemeMonDepDet > 0) {
                                    //
                                    $rowSchemeMonDepDet = mysqli_fetch_array($qResultMonDepPayDet, MYSQLI_ASSOC);
                                    //
                                    $schemeMonDepTotalCash = $rowSchemeMonDepDet['utin_cash_amt_rec'];
                                    $schemeMonDepChequeTotalAmt = $rowSchemeMonDepDet['utin_pay_cheque_amt'];
                                    $schemeMonDepCardTotalAmt = $rowSchemeMonDepDet['utin_pay_card_amt'];
                                    //
                                    $addTotalDiscount = $rowSchemeMonDepDet['utin_discount_amt'];
                                    $addRecAmtDiscount = $rowSchemeMonDepDet['utin_discount_amt_discup'];
                                    $addFinalBalDue = $rowSchemeMonDepDet['utin_cash_balance'];
                                    $utin_pay_trans_chrg = $rowSchemeMonDepDet['utin_pay_trans_chrg'];
                                    $utin_online_pay_amt = $rowSchemeMonDepDet['utin_online_pay_amt'];
                                    $utin_comm_amt = $rowSchemeMonDepDet['utin_pay_comm_paid'];  // COMM PAID -(minus)
                                    $utin_tran_charge = $rowSchemeMonDepDet['utin_pay_trans_chrg']; // TRANS CHARGE +
                                    //
//                                    echo '$schemeMonDepChequeTotalAmt=='.$schemeMonDepChequeTotalAmt.'<br>';
//                                    echo '$schemeMonDepCardTotalAmt=='.$schemeMonDepCardTotalAmt.'<br>';
                                    //
                                    //$totalschemeCash += $schemeMonDepTotalCash;
                                    //
//                                    echo '$schemeMonDepChequeTotalAmt=='.$schemeMonDepChequeTotalAmt.'<br>';
                                    $totalschemeBank += $schemeMonDepChequeTotalAmt;
                                    $totalSchemeCard += $schemeMonDepCardTotalAmt;
//                                    echo '$totalschemeBank=='.$totalschemeBank.'<br>';
//                                    echo '$totalSchemeCard=='.$totalSchemeCard.'<br>';
                                    $totalSchemeOnline += $utin_online_pay_amt;
                                    $totalDiscount += $addTotalDiscount;
                                    $totalschemeAmt += $schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid);
                                }
                                /* START CODE TO SHOW SCHEME AMOUNT IN CASH WHEN PAYMENT IS DONE BY BUTTON ON SCHEME PAYMENT,@AUTHOR:HEMA-19MAY2020 */ else {
                                    //
                                    //
                                    //
                                    //
                                    //$schemeMonDepTotalCash = $admnAmt;
                                    /* START CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                    //$schemeMonDepChequeTotalAmt = 0;
                                    //$schemeMonDepCardTotalAmt = 0;
                                    //$utin_online_pay_amt = 0;
                                    //$addTotalDiscount = 0;
                                    /* END CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                    //$totalschemeAmt += $admnAmt;
                                    //
                                    //
                                    //
                                    //
                                    // ADDED CODE FOR SCHEME - ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                    if ($kitty_pay_mode == 'Online') {
                                        //
                                        $utin_online_pay_amt = $admnAmt;
                                        //
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepCardTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        //
                                    } else if ($kitty_pay_mode == 'Card') { // ADDED CODE FOR SCHEME - CARD PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepCardTotalAmt = $admnAmt;
                                        //
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        $utin_online_pay_amt = 0;
                                        //
                                    } else if ($kitty_pay_mode == 'Cheque') { // ADDED CODE FOR SCHEME - CHEQUE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepChequeTotalAmt = $admnAmt;
                                        //
                                        $schemeMonDepCardTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        $utin_online_pay_amt = 0;
                                        //
                                    } else { // ADDED CODE FOR SCHEME - CASH PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepTotalCash = $admnAmt;
                                        //
                                        /* START CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepCardTotalAmt = 0;
                                        $utin_online_pay_amt = 0;
                                        $addTotalDiscount = 0;
                                        /* END CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                        //
                                        //
                                    }
                                    //
                                    //
                                    //$totalschemeCash = $admnAmt;
                                    //
                                    //
                                    $totalschemeAmt += $admnAmt;
                                    //
                                    //
                                }
                                //
                                //

                                $totalschemeCash += $schemeMonDepTotalCash; /* LINE ADDED TO CALCULATE TOTAL CASH,@AUTHOR:HEMA-31MAY2020 */
//                                //
//                                $totalSchemeOnline += $utin_online_pay_amt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
//                                $totalSchemeCard += $schemeMonDepCardTotalAmt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
//                                $totalschemeBank += $schemeMonDepChequeTotalAmt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                //
                                //
                                //echo '<br/>$schemeMonDepTotalCash:' . $schemeMonDepTotalCash . '   $schemeMonDepChequeTotalAmt:' . $schemeMonDepChequeTotalAmt . '   $schemeMonDepCardTotalAmt:' . $schemeMonDepCardTotalAmt . '   $utin_online_pay_amt:' . $utin_online_pay_amt;
                                //
                                //
                                /* END CODE TO SHOW SCHEME AMOUNT IN CASH WHEN PAYMENT IS DONE BY BUTTON ON SCHEME PAYMENT,@AUTHOR:HEMA-19MAY2020 */
                                ?>
                                <tr>
                                    <td align="left">
                                        <h5 class="blackArial11Font brown marginLeft2" title="<?php echo om_strtoupper($kittyPreSerialNum) . $kittySerialNum; ?>"><?php echo substr(om_strtoupper($kittyPreSerialNum) . $kittySerialNum, 0, 15); ?></h5>
                                        <h5 class="blackArial11Font brown marginLeft2" title="<?php echo 'Receipt No : ' . $kitty_mondep_receipt_id; ?>"><?php echo '(' . $kitty_mondep_receipt_id . ')'; ?></h5>
                                    </td>

                                    <td align="left" title="<?php echo om_strtoupper($admnDOB); ?>" >
                                        <h5 class="blackArial11Font"><?php echo om_strtoupper($admnDOB); ?></h5>
                                        <h5 class="blackArial11Font"><?php
                                            if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) {
                                                echo substr(om_strtoupper($firm_name), 0, 15);
                                            }
                                            ?></h5>
                                    </td>

                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                        <table style="width:100%;table-layout:fixed;">
                                            <tr>
                                                <td style="width:125px;overflow:hidden;">
                                                    <div class="ff_tnr fw_n orange fs_11" align="left">
                                                        <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('SchemeAdded', '<?php echo $admnCustId; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', 'SchemeAdded');">
                                                            <?php
                                                            if ($user_fname != '') {
                                                                echo substr(om_strtoupper($user_fname . ' ' . $user_lname), 0, 28);
                                                            }
                                                            ?>
                                                        </a>
                                                        <div>
                                                            <?php
                                                            if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) {
                                                                if ($user_city != '') {
                                                                    echo '(' . (substr(om_strtoupper($user_city), 0, 15)) . ')';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div> 
                                                </td>
                                            </tr>
                                        </table>   
                                    </td>
                                    <td align = "left" colspan="6"  class="width_300_dd brown_normal12_calibri ">
                                        <div>
                                            <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%;table-layout:fixed;">
                                                <tr>
                                                    <td align="left" title="METAL TYPE" class="brown_normal11_calibri" style="width:40px; overflow:hidden;">

                                                    </td>
                                                    <td align="right" title="GROSS WEIGHT" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                    </td>
                                                    <td align="right" title="NET WEIGHT" class="brown_normal11_calibri"style="width:50px; overflow:hidden;">

                                                    </td>
                                                    <td align="right" title="FINE WEIGHT" class="brown_normal11_calibri"style="width:50px; overflow:hidden;">

                                                    </td>
                                                    <td align="right" title="METAL BALANCE" class="brown_normal11_calibri" style="width:50px; overflow:hidden;">

                                                    </td>
                                                    <td align="right" class=" black_normal11_calibri" style="width:65px;overflow: hidden;" title="FINAL VALUATION">

                                                    </td>   
                                                    <td align="right" class=" black_normal11_calibri" style="width:50px;overflow: hidden;" title="TAX VALUATION">

                                                    </td> 
                                                    <td align="right" class=" black_normal11_calibri" style="width:65px;overflow: hidden;" title="BALANCE LEFT">

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($schemeMonDepTotalCash));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($schemeMonDepChequeTotalAmt));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($schemeMonDepCardTotalAmt + $utin_tran_charge));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($utin_online_pay_amt - $utin_comm_amt));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont"><?php echo formatInIndianStyle(abs($addTotalDiscount)); ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont margin_right_four"><?php echo formatInIndianStyle($admnAmt - $addTotalDiscount); /* CODE ADDED TO MINUS DISCOUNT AMOUNT FROM TOTAL AMOUNT,@AUTHOR:HEMA-31MAY2020 */ ?></h4>
                                    </td>
                                </tr>
                                <?php
                                $serialNo++;
                            }
                            ?>
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
                                <td align = "left" colspan="5"  class="width_300_dd brown_normal12_calibri ">
                                    <div>
                                        <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%;table-layout:fixed;">
                                            <?php if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') { ?>
                                                <tr>
                                                    <td align="right" class=" blackArial11Font"style="width:40px;overflow:hidden;"> 
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden; ">
                                                        <h4 class = "brown_bold12_arial" style=""></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                        <h4 class = "brown_bold12_arial" style=""></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                        <h4 class = "brown_bold12_arial"style=""></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;" >
                                                        <h4 class = "brown_bold12_arial"></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:65px;overflow:hidden;" >
                                                        <h4 class = "brown_bold12_arial"></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"></h4></div>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish"style="width:65px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"></h4></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 greenFont bold"><?php
                                    
                                        if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                            if($totalschemeCash!=''){
                                            echo formatInIndianStyle($totalschemeCash);
                                            }else{
                                                 echo '0.00'; 
                                            }
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 greenFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                              if($totalschemeBank!=''){
                                            echo formatInIndianStyle($totalschemeBank);
                                             }else{
                                                 echo '0.00'; 
                                            }
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 greenFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                             if($totalSchemeCard!=''){
                                            echo formatInIndianStyle($totalSchemeCard);
                                          }else{
                                                 echo '0.00'; 
                                            }
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 greenFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                            if($totalSchemeOnline!=''){
                                            echo formatInIndianStyle($totalSchemeOnline);
                                       }else{
                                                 echo '0.00'; 
                                            }
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 greenFont bold"><?php echo formatInIndianStyle(abs($totalDiscount)); ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 greenFont bold"><?php echo formatInIndianStyle($totalschemeAmt); ?></h4>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php
        }
    }
} else {
    if ($todayDate == '' || $todayDate == NULL) {
        $todayDate = date("d M Y");
    }
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['panelName'];
    //
    //echo '$panelName =='.$panelName;
    //
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
    //
    //echo '$panelName =='.$panelName;
    //
    //echo '$ddMainPanel =='.$ddMainPanel;
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
    //
    //
    include 'omfrpsck.php';
    //
    //
    /*     * *******************************START CODE TO GET DETAILS FROM UTIN TRANSECTION TABLE TO SHOW OPENING,CLOSING BALANCE AND TODAYS TOTAL,@AUTHOR:HEMA-27MAY2020**************** */
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    //
    //
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSch = "and kitty_mondep_cust_id = '$custId'";
    } else {
        $accLedStrSch = NULL;
    }
    //
    //
//    $qSelectSchemeDepositeAdd = " SELECT * FROM kitty_money_deposit "
//            . " where kitty_mondep_own_id='$_SESSION[sessionOwnerId]'$dateStr "
//            . " and kitty_mondep_EMI_status IN('Paid','Payment') "
//            //. " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode='Cash') "
//            . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
//            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
//    //
//    $qResultSchemeDepositeAdd = mysqli_query($conn, $qSelectSchemeDepositeAdd);
    
//    $schemeDepositeAdd = mysqli_num_rows($qResultSchemeDepositeAdd);
    //
    
    $qSelectSchemeDepositeAdd = " SELECT COUNT(*) AS record_count FROM kitty_money_deposit "
            . " where kitty_mondep_own_id='$_SESSION[sessionOwnerId]'$dateStr "
            . " and kitty_mondep_EMI_status IN('Paid','Payment') "
            //. " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode='Cash') "
            . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
    
    $qResultSchemeDepositeAdd = mysqli_query($conn, $qSelectSchemeDepositeAdd);
    $rowSchemeDepositeAdd = mysqli_fetch_array($qResultSchemeDepositeAdd, MYSQLI_ASSOC);
        //
     $schemeDepositeAdd = $rowSchemeDepositeAdd['record_count'];
    //
    if ($schemeDepositeAdd > 0) {
        //
        // FOR SCHEME - CASH PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelect = " SELECT SUM(kitty_mondep_EMI_total_amt) as total FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = '' OR kitty_pay_mode IS NULL OR kitty_pay_mode = 'Cash') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $qResultdep = mysqli_query($conn, $qSelect);
        //
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        //
        $todaysDeposit = $rowdep['total'];
        //
        //
        //$totalMoneyDeposit += $todaysDeposit;
        //$totalMoneyLeft = $totalMoneyLeft + $todaysDeposit;
        //
        //
        //
        //
        // FOR SCHEME - ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectOnline = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalOnline FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Online') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepOnline = mysqli_query($conn, $qSelectOnline);
        //
        $rowOnlineDep = mysqli_fetch_array($resultDepOnline, MYSQLI_ASSOC);
        //
        $todaysOnlineDeposit = $rowOnlineDep['totalOnline'];
        //
        //
        //
        //
        // FOR SCHEME - CHEQUE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectCheque = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalCheque FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Cheque') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepCheque = mysqli_query($conn, $qSelectCheque);
        //
        $rowChequeDep = mysqli_fetch_array($resultDepCheque, MYSQLI_ASSOC);
        //
        $todaysChequeDeposit = $rowChequeDep['totalCheque'];
        //
        //
        //
        //
        // FOR SCHEME - CARD PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
        $qSelectCard = " SELECT SUM(kitty_mondep_EMI_total_amt) as totalCard FROM kitty_money_deposit "
                . " where kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . " and kitty_mondep_EMI_status IN('Paid','Payment') "
                . " and (kitty_pay_mode = 'Card') "
                . " and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        //
        $resultDepCard = mysqli_query($conn, $qSelectCard);
        //
        $rowCardDep = mysqli_fetch_array($resultDepCard, MYSQLI_ASSOC);
        //
        $todaysCardDeposit = $rowCardDep['totalCard'];
        //
        //
    }
    // 
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
//
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrNewOrder = "and utin_user_id = '$custId'";
    } else {
        $accLedStrNewOrder = NULL;
    }
//
    if ($panelDDDetClick == 'ddDetClick') {
        $invId = $_GET['tableId'];
        $strFrmId = $_GET['firmId'];
        $todayFromStrDate = $_GET['fromDate'];
        $todayToStrDate = $_GET['toDate'];
        if ($ddpanelName == 'dayBeforePanel') {
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
        } else {
            $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
        }
        $qSelSchemeDet = "SELECT COUNT(*) AS record_count FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_type = 'scheme' and utin_transaction_type IN ('scheme') and utin_id = '$invId'";
    } else {
        $qSelSchemeDet = "SELECT COUNT(*) AS record_count FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrNewOrder and utin_type = 'scheme' and utin_transaction_type IN ('scheme') and utin_firm_id IN ($strFrmId) order by "
                . "UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy";
    }
    //
    //
//    $resSchemeDet = mysqli_query($conn, $qSelSchemeDet);
//    $noOfSchemeDet = mysqli_num_rows($resSchemeDet);
    //
    //
    //echo '$noOfSchemeDet : ' . $noOfSchemeDet . '<br>';
    //
    $qResultSelSchemeDet = mysqli_query($conn, $qSelSchemeDet);
    $rowSelSchemeDet = mysqli_fetch_array($qResultSelSchemeDet, MYSQLI_ASSOC);
    $noOfSchemeDet = $rowSelSchemeDet['record_count'];
    //
    if ($noOfSchemeDet > 0) {
        $newSchemeDetAddedPresent = mysqli_num_rows($qResultSelSchemeDet);
        if ($newSchemeDetAddedPresent > 0) {
            //Get Total Cash Amount Received From new_order_invoice Table
            $qSelectTotalSchemeDeposite = "SELECT SUM(utin_cash_amt_rec + utin_pay_cheque_amt + (utin_pay_card_amt + utin_pay_trans_chrg)+(utin_online_pay_amt - utin_pay_comm_paid)) as total_cash_amt_rec, "
                    . "SUM(utin_cash_amt_rec) as utin_cash_amt_rec, "
                    . "SUM(utin_pay_cheque_amt) as utin_pay_cheque_amt, "
                    . "SUM(utin_pay_card_amt) as utin_pay_card_amt, "
                    . "SUM(utin_online_pay_amt) as utin_online_pay_amt, "
                    . "SUM(utin_pay_comm_paid) as utin_pay_comm_paid, "
                    . "SUM(utin_discount_amt) as utin_discount_amt "
                    . "FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrNewOrder and utin_type = 'scheme' and utin_utin_id = '' and utin_transaction_type IN ('scheme') and utin_firm_id IN ($strFrmId)"; //CODE ADDED TO SHOW SCHEME ADDED AMOUNT PROPERLY,@AUTHOR:HEMA-29DEC2020
            $qResultTotalSchemeDeposite = mysqli_query($conn, $qSelectTotalSchemeDeposite) or die(mysqli_error($conn));
            $rowTotalSchemeDeposite = mysqli_fetch_array($qResultTotalSchemeDeposite, MYSQLI_ASSOC);
            $totalTodaySchemeDeposite = $rowTotalSchemeDeposite['total_cash_amt_rec'];
            $totalDiscount = $rowTotalSchemeDeposite['utin_discount_amt'];
            //
            if ($ddpanelName == 'dayBeforePanel') {
                $open_in_utin_cash_amt_rec += $rowTotalSchemeDeposite['utin_cash_amt_rec'] + $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
                $open_in_utin_pay_cheque_amt += $rowTotalSchemeDeposite['utin_pay_cheque_amt']+ $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022;
                $open_in_utin_pay_card_amt += $rowTotalSchemeDeposite['utin_pay_card_amt']+ $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
                $open_in_utin_online_pay_amt += $rowTotalSchemeDeposite['utin_online_pay_amt']+ $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
                $open_in_utin_pay_comm_paid += $rowTotalSchemeDeposite['utin_pay_comm_paid'];
                $open_in_utin_pay_disc_amt += $rowTotalSchemeDeposite['utin_discount_amt'];
            } else {
                //Hiding $todaysChequeDeposit,$todaysCardDeposit,$todaysChequeDeposit,$todaysOnlineDeposit @Author:Vinod29MARCH2023
                $today_in_utin_cash_amt_rec += $rowTotalSchemeDeposite['utin_cash_amt_rec']+ $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
                $today_in_utin_pay_cheque_amt += $rowTotalSchemeDeposite['utin_pay_cheque_amt'];//+ $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_pay_card_amt += $rowTotalSchemeDeposite['utin_pay_card_amt']; //+$todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_online_pay_amt += $rowTotalSchemeDeposite['utin_online_pay_amt'];//+ $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
                $today_in_utin_pay_comm_paid += $rowTotalSchemeDeposite['utin_pay_comm_paid'];
                $today_in_utin_pay_disc_amt += $rowTotalSchemeDeposite['utin_discount_amt'];
                
                //echo '$today_in_utin_online_pay_amt==11=='.$today_in_utin_online_pay_amt.'<br>';
               // echo '$today_in_utin_cash_amt_rec==11=='.$todaysDeposit.'<br>';
            }
        }
    } else if ($todaysDeposit > 0) {
        if ($ddpanelName == 'dayBeforePanel') {
            $open_in_utin_cash_amt_rec += $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
            $open_in_utin_pay_cheque_amt += $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
            $open_in_utin_pay_card_amt += $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
            $open_in_utin_online_pay_amt += $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
        } else {
            $today_in_utin_cash_amt_rec += $todaysDeposit; /* CODE ADDED TO ADD CASH AMOUNT DEPOSITE DIREACTLY USING BY CASH OPTION,@AUTHOR:HEMA-31MAY2020 */
            $today_in_utin_pay_cheque_amt += $todaysChequeDeposit; // ADDED CODE FOR PAYMENT MODE - CHEQUE @AUTHOR:PRIYANKA-22MAR2022
            $today_in_utin_pay_card_amt += $todaysCardDeposit; // ADDED CODE FOR PAYMENT MODE - CARD @AUTHOR:PRIYANKA-22MAR2022
            $today_in_utin_online_pay_amt += $todaysOnlineDeposit; // ADDED CODE FOR PAYMENT MODE - ONLINE @AUTHOR:PRIYANKA-22MAR2022
        }
    }
    /*     * *******************************END CODE TO GET DETAILS FROM UTIN TRANSACTION TABLE TO SHOW OPENING,CLOSING BALANCE AND TODAYS TOTAL,@AUTHOR:HEMA-27MAY2020 **************** */
    //
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSch = "and kitty_mondep_cust_id = '$custId'";
    } else {
        $accLedStrSch = NULL;
    }
    //
    //
    //echo '$accLedStrSch =='.$accLedStrSch;
    //
    //
    $qSelectAdMnAdd = " SELECT kitty_mondep_kitty_id,kitty_mondepd_recipit_no,kitty_mondep_EMI_total_amt,kitty_mondep_firm_id,kitty_mondep_cust_id,kitty_mondep_EMI_paid_date,kitty_pay_mode,kitty_mondep_id,kitty_mondep_utin_id,kitty_paid_amt "
            . "FROM kitty_money_deposit where kitty_mondep_own_id='$_SESSION[sessionOwnerId]'$dateStr "
            . " and kitty_mondep_EMI_status IN('Paid','Payment') and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(kitty_mondep_EMI_paid_date,'%d %b %Y')) $ddOrderBy";
    //
    $qResultAdMnAdd = mysqli_query($conn, $qSelectAdMnAdd);
    //
    $ddMnAdd = mysqli_num_rows($qResultAdMnAdd);
    //
    if ($ddMnAdd > 0) {
        $qSelect = "SELECT SUM(kitty_mondep_EMI_total_amt) as total FROM kitty_money_deposit "
                . "where kitty_mondep_own_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSch "
                . "and kitty_mondep_EMI_status IN('Paid','Payment') and kitty_mondep_firm_id IN ($strFrmId) $accLedStrSch";
        $qResultdep = mysqli_query($conn, $qSelect);
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        $todaysDeposit = $rowdep['total'] - $totalDiscount;
        $totalMoneyDeposit += $todaysDeposit;
        $totalMoneyLeft = $totalMoneyLeft + $todaysDeposit;
    }
    if ($ddpanelName == 'todayDatePanel') {
        if ($ddMnAdd > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            ?>
            <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5">
                <tr>
                    <td align = "left">
                        <table border="0" cellspacing="0" cellpadding="0" align="left"  width="100%">
                            <tr>
                                <td align = "left" class="width_627_dd">
                                    <div class = "brown_bold12_arial" style="margin-left:10px;">SCHEME ADD</div>
                                </td>
                                <td align="right" class="width_120_dd">
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_green_Arial_12_bold">
                                        <?php
                                        //echo formatInIndianStyle(abs($todaysDeposit));
                                        ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
                                        <?php
                                        //echo formatInIndianStyle(abs($totalMoneyLeft));
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
                                <td align="left"  title="SERIAL NUMBER" class="brown_normal12_calibri  bold" style="width: 150px">S. NO
                                </td>
                                <td align="left" title="DATE" class="brown_normal12_calibri  bold"style="width: 200px" >
                                    <span style="margin-left:0px;">DATE </span>
                                </td>
                                <?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>
                                    <td align="left" title="FIRM" class="brown_normal12_calibri  bold"style="width: 200px" >
                                        FIRM 
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri  bold" style="width: 250px;">
                                    <span> USER NAME</span>          
                                </td>
                                <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                    <td align="left" title="USER NAME(CITY)" class="brown_normal12_calibri  bold" style="width: 200px;">
                                        <span>  CITY </span>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <td class="brown_normal12_calibri " style="width:50px;"></td>
                                <td align = "left" colspan="6"  class="brown_normal12_calibri ">
                                </td>
                                <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        CASH
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        BANK
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        CARD
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        ONLINE
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                    DISC.
                                </td>
                                <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                    <div class="margin_right_four bold">TOTAL</div>
                                </td>
                                <?php    if($showbalance=='YES'){ ?>                                    
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        BALANCE
                                    </td>
                                <?php }?>
                            </tr>
                            <?php
                            //
                            //
                            $serialNo = 1;
                            $totAdmnAmt = 0;
                            //
                            //
                            while ($rowAdMnAdd = mysqli_fetch_array($qResultAdMnAdd, MYSQLI_ASSOC)) {
                                //
                                $kitty_mondep_kitty_id = $rowAdMnAdd['kitty_mondep_kitty_id']; //CODE ADDED TO SHOW KITTY SERIAL NUMBER,@AUTHOR:HEMA-16FEB2021
                                //
                                $getkittyDetail = "SELECT kitty_pre_serial_num,kitty_serial_num FROM kitty WHERE kitty_id='$kitty_mondep_kitty_id'";
                                $reskittyDetail = mysqli_query($conn, $getkittyDetail);
                                $rowkittyDetail = mysqli_fetch_array($reskittyDetail);
                                $kittyPreSerialNum = $rowkittyDetail['kitty_pre_serial_num'];
                                $kittySerialNum = $rowkittyDetail['kitty_serial_num'];
                                //
                                $kitty_mondep_receipt_id = $rowAdMnAdd['kitty_mondepd_recipit_no']; // TO GET RECEIPT NO @AUTHOR:MADHUREE-31MAY2021
                                //
                                $kitty_pay_mode = $rowAdMnAdd['kitty_pay_mode'];
                                $admnAmt = $rowAdMnAdd['kitty_paid_amt'];
                                $admnFirmId = $rowAdMnAdd['kitty_mondep_firm_id'];
                                $admnCustId = $rowAdMnAdd['kitty_mondep_cust_id'];
                                $admnDOB = $rowAdMnAdd['kitty_mondep_EMI_paid_date'];
                                $totAdmnAmt += $admnAmt;
                                //
                                //---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                $getUserDetail = "SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$admnCustId'";
                                $resGetUserDetail = mysqli_query($conn, $getUserDetail);
                                $rowGetUserDetail = mysqli_fetch_array($resGetUserDetail);
                                $user_fname = $rowGetUserDetail['user_fname'];
                                $user_lname = $rowGetUserDetail['user_lname'];
                                $user_city = $rowGetUserDetail['user_city'];
                                //
                                $getFirmName = "SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$admnFirmId'";
                                $resGetFirmName = mysqli_query($conn, $getFirmName);
                                $rowGetFirmName = mysqli_fetch_array($resGetFirmName);
                                $firm_name = $rowGetFirmName['firm_name'];
                                //
                                //
                                $kittyMonDepId = $rowAdMnAdd['kitty_mondep_id'];
                                $kittyMonDepUtinId = $rowAdMnAdd['kitty_mondep_utin_id'];
                                //
                                //
                                $qSelectMonDepPayDet = "SELECT utin_cash_amt_rec,utin_pay_cheque_amt,utin_pay_card_amt,utin_discount_amt,utin_cash_balance,utin_discount_amt_discup,utin_pay_trans_chrg,utin_online_pay_amt,utin_pay_comm_paid,utin_pay_trans_chrg"
                                        . " FROM user_transaction_invoice "
                                        . "where utin_owner_id='$_SESSION[sessionOwnerId]' AND utin_type='scheme' "
                                        . "and utin_id='$kittyMonDepUtinId'";
                                //
                                //
                                //echo '$qSelectMonDepPayDet == ' . $qSelectMonDepPayDet . '<br />';
                                //
                                //
                                $qResultMonDepPayDet = mysqli_query($conn, $qSelectMonDepPayDet);
                                $ddMnSchemeMonDepDet = mysqli_num_rows($qResultMonDepPayDet);
                                //
                                if ($ddMnSchemeMonDepDet > 0) {
                                    //
                                    $rowSchemeMonDepDet = mysqli_fetch_array($qResultMonDepPayDet, MYSQLI_ASSOC);
                                    //
                                    $schemeMonDepTotalCash = $rowSchemeMonDepDet['utin_cash_amt_rec'];
                                    $schemeMonDepChequeTotalAmt = $rowSchemeMonDepDet['utin_pay_cheque_amt'];
                                    $schemeMonDepCardTotalAmt = $rowSchemeMonDepDet['utin_pay_card_amt'];
                                    //
                                    $addTotalDiscount = $rowSchemeMonDepDet['utin_discount_amt'];
                                    $addRecAmtDiscount = $rowSchemeMonDepDet['utin_discount_amt_discup'];
                                    //
                                    $addFinalBalDue = $rowSchemeMonDepDet['utin_cash_balance'];
                                    $utin_pay_trans_chrg = $rowSchemeMonDepDet['utin_pay_trans_chrg'];
                                    $utin_online_pay_amt = $rowSchemeMonDepDet['utin_online_pay_amt'];
                                    //
                                    $utin_comm_amt = $rowSchemeMonDepDet['utin_pay_comm_paid'];  // COMM PAID -(minus)
                                    $utin_tran_charge = $rowSchemeMonDepDet['utin_pay_trans_chrg']; // TRANS CHARGE +
                                    //
                                    //
                                    //$totalschemeCash += $schemeMonDepTotalCash;
                                    //
                                    //
                                    $totalschemeBank += $schemeMonDepChequeTotalAmt;
                                    $totalSchemeCard += $schemeMonDepCardTotalAmt;
                                    $totalSchemeOnline += $utin_online_pay_amt;
                                    $totalDiscountAmt += $addTotalDiscount;
                                    $totalschemeAmt += $schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid);
                                }
                                //
                                //
                                /* START CODE TO SHOW SCHEME AMOUNT IN CASH WHEN PAYMENT IS DONE BY BUTTON ON SCHEME PAYMENT,@AUTHOR:HEMA-19MAY2020 */ else {
                                    //
                                    //
                                    // ADDED CODE FOR SCHEME - ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                    if ($kitty_pay_mode == 'Online') {
                                        //
                                        $utin_online_pay_amt = $admnAmt;
                                        //
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepCardTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        //
                                    } else if ($kitty_pay_mode == 'Card') { // ADDED CODE FOR SCHEME - CARD PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepCardTotalAmt = $admnAmt;
                                        //
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        $utin_online_pay_amt = 0;
                                        //
                                    } else if ($kitty_pay_mode == 'Cheque') { // ADDED CODE FOR SCHEME - CHEQUE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepChequeTotalAmt = $admnAmt;
                                        //
                                        $schemeMonDepCardTotalAmt = 0;
                                        $schemeMonDepTotalCash = 0;
                                        $addTotalDiscount = 0;
                                        $utin_online_pay_amt = 0;
                                        //
                                    } else { // ADDED CODE FOR SCHEME - CASH PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                        //
                                        $schemeMonDepTotalCash = $admnAmt;
                                        //
                                        /* START CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                        $schemeMonDepChequeTotalAmt = 0;
                                        $schemeMonDepCardTotalAmt = 0;
                                        $utin_online_pay_amt = 0;
                                        $addTotalDiscount = 0;
                                        /* END CODE TO SHOW CHECK, CARD , ONLINE PAY AMOUNT AND DISCOUNT AMOUNT 0 IF TRANSACTION IS DONE BY CASH,@AUTHOR:HEMA-27MAY2020 */
                                        //
                                        //
                                    }
                                    //
                                    //
                                    //$totalschemeCash = $admnAmt;
                                    //
                                    //
                                    $totalschemeAmt += $admnAmt;
                                    //
                                    //
                                }
                                //
                                //
                                $totalschemeCash += $schemeMonDepTotalCash; /* LINE ADDED TO CALCULATE TOTAL CASH,@AUTHOR:HEMA-31MAY2020 */
                                //
                                //
//                                $totalSchemeOnline += $utin_online_pay_amt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
//                                $totalSchemeCard += $schemeMonDepCardTotalAmt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
//                                $totalschemeBank += $schemeMonDepChequeTotalAmt; // ADDED CODE FOR ONLINE PAYMENT MODE @AUTHOR:PRIYANKA-22MAR2022
                                //
                                //
                                /* END CODE TO SHOW SCHEME AMOUNT IN CASH WHEN PAYMENT IS DONE BY BUTTON ON SCHEME PAYMENT,@AUTHOR:HEMA-19MAY2020 */
                                //    
                                //      
                                //          
                                //
                                ?>
                                <tr>
                                    <td align="left">
                                        <h5 class="blackArial11Font brown">
                                            <span title="<?php echo om_strtoupper($kittyPreSerialNum) . $kittySerialNum; ?>"><?php echo substr(om_strtoupper($kittyPreSerialNum) . $kittySerialNum, 0, 15); ?></span>
                                            <span title="<?php echo 'Receipt No : ' . $kitty_mondep_receipt_id; ?>"><?php echo '(' . $kitty_mondep_receipt_id . ')'; ?></span>
                                        </h5>
                                    </td>

                                    <td align="left" title="<?php echo om_strtoupper($admnDOB); ?>" >
                                        <h5 class="blackArial11Font"style="margin-left:0px;"><?php echo om_strtoupper($admnDOB); ?></h5>

                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>
                                        <td align="left" title="<?php echo om_strtoupper($admnDOB); ?>" >
                                            <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo substr(om_strtoupper($firm_name), 0, 15); ?></h5>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                        <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('SchemeAdded', '<?php echo $admnCustId; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', 'SchemeAdded');">
                                            <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;"><?php echo substr(om_strtoupper($user_fname . ' ' . $user_lname), 0, 28); ?></div>
                                        </a>
                                        <!--------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                        <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                            <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('SchemeAdded', '<?php echo $admnCustId; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', 'SchemeAdded');">
                                                <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;"><?php echo (substr(om_strtoupper($user_city), 0, 15)); ?></div>
                                            </a>
                                            <!--------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td class="brown_normal12_calibri " style="width:50px;"></td>
                                    <td align = "left" colspan="6"  class="brown_normal12_calibri ">
                                    </td>
                                    <?php
                                    if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                        if ($schemeMonDepTotalCash != '') {
                                            ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepTotalCash)); ?></h4>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                            </td>
                                            <?php
                                        }
                                    } else {
                                        ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php
                                    if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                        if ($schemeMonDepChequeTotalAmt != '') {
                                            ?>

                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepChequeTotalAmt)); ?></h4>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                            </td>
                                            <?php
                                        }
                                    } else {
                                        ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php
                                    if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                        if (($schemeMonDepCardTotalAmt + $utin_tran_charge) != '') {
                                            ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepCardTotalAmt + $utin_tran_charge)); ?></h4>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                            </td>
                                            <?php
                                        }
                                    } else {
                                        ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>

                                    <?php
                                    if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                        if (($utin_online_pay_amt - $utin_comm_amt) != '') {
                                            ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($utin_online_pay_amt - $utin_comm_amt)); ?></h4>
                                            </td>
                                        <?php } else { ?>
                                            <td align="right"  class="amount12 reddish">
                                                <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                            </td>
                                            <?php
                                        }
                                    } else {
                                        ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($addTotalDiscount)); ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 greenFont"style="margin-right:0px;"><?php echo formatInIndianStyle(abs($admnAmt - $addTotalDiscount)); /* CODE ADDED TO MINUS DISCOUNT AMOUNT FROM TOTAL DEPOSITE AMOUNT,@AUTHOR:HEAM-31MAY2020 */ ?></h4>
                                    </td>
                                    <!--------START CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------> 
                                    <?php if ($showbalance == 'YES') {?>
                                    <td align="right"  class="amount12 reddish">
                                        <?php
                                        if ($balance != '') {
                                            $open_balance = $balance;
                                        } else {
                                            $open_balance = $openingBalance;
                                        }
                                        $total = $admnAmt - $addTotalDiscount;
                                        $balance = $open_balance + $total;
                                        ?>
                                        <h4 class="amount12 " style="color:blue;"><?php echo formatInIndianStyle($balance); ?></h4></div>
                                    </td> 
                                     <?php }?>
                                    <!--------END CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------>
                                </tr>
                                <?php
                                $serialNo++;
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
                                <?php
                                if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                    if ($totalschemeCash != '') {
                                        ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($totalschemeCash)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                        </td>
                                        <?php
                                    }
                                } else {
                                    ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php
                                if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                    if ($totalschemeBank != '') {
                                        ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($totalschemeBank)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                        </td>
                                        <?php
                                    }
                                } else {
                                    ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php
                                if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                    if ($totalSchemeCard != '') {
                                        ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($totalSchemeCard)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                        </td>
                                        <?php
                                    }
                                } else {
                                    ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php
                                if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                    if ($totalSchemeOnline != '') {
                                        ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($totalSchemeOnline)); ?></h4>
                                        </td>
                                    <?php } else { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 greenFont" style="margin-right:0px;"><?php echo'0.00'; ?></h4>
                                        </td>
                                        <?php
                                    }
                                } else {
                                    ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>

                                <td align = "right" class = "amount12 reddish" >
                                    <?php if ($totalDiscountAmt != '') { ?>
                                        <h4 class = "amount12 greenFont bold"style = "margin-right:0px;"><?php echo formatInIndianStyle($totalDiscountAmt);
                                        ?></h4></div>
                                    <?php } else { ?>
                                        <h4 class = "amount12 greenFont bold"style = "margin-right:0px;"><?php echo'0.00';
                                        ?></h4></div>
                                    <?php } ?>                                </td>
                                <td align="right"  class="amount12 reddish" >
                                    <h4 class="amount12 greenFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($totalschemeAmt); ?></h4></div>
                                </td>
                                 <?php    if($showbalance=='YES'){ ?>
                                <td align="right"  class="amount12 reddish bold">
                                    <h4 class="amount12 "style="color:blue;"> <?php echo formatInIndianStyle($balance); ?></h4>
                                </td>
                                 <?php }?>
                            </tr>      
                        </table>
                    </td>
                </tr>
            </table>
            <?php
        }
    }
}
?>

