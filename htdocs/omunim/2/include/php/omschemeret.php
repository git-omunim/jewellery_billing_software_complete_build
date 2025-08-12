<?php
/*
 * **************************************************************************************
 * @tutorial: dd scheme return 
 * **************************************************************************************
 * 
 * Created on 24 Oct, 2017 4:49:47 PM
 *
 * @FileName: omschemeret.php
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
 *  AUTHOR:BAJRANG
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
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
//
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
//$custId = $_GET['custId'];
//echo '$custId =='.$custId;
    $todaysDeposit = 0;
    include 'omfrpsck.php';
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSchRet = "and utin_user_id = '$custId'";
    } else {
        $accLedStrSchRet = NULL;
    }
//
//    $qSelectAdMnAdd = "SELECT * FROM user_transaction_invoice as a where "
//            . "utin_type='OnPurchase' and utin_transaction_type='DEPOSIT' $dateStr $accLedStrSchRet "
//            . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
//            . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme')) and utin_firm_id IN ($strFrmId)"
//            . " order by UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy";
    //
    $qSelectAdMnAdd = "SELECT utin_id,utin_firm_id,utin_cash_amt_rec,utin_date,utin_user_id,utin_pre_invoice_no,utin_invoice_no,utin_pay_cheque_amt,utin_discount_amt,utin_discount_amt_discup,utin_cash_balance,utin_pay_trans_chrg,utin_online_pay_amt,utin_pay_comm_paid,utin_pay_trans_chrg,utin_cash_amt_rec,utin_pay_card_amt"
            . " FROM user_transaction_invoice as a where "
            . "utin_type='scheme' and ((utin_transaction_type IN('DEPOSIT') and utin_total_amt_deposit != 0 and utin_status != 'PAID') OR (utin_transaction_type IN('SCHEME RETURN') and utin_total_amt_deposit < 0)) $dateStr $accLedStrSchRet and utin_firm_id IN ($strFrmId)";
    //
    //echo '$qSelectAdMnAdd = '.$qSelectAdMnAdd.'</br>';
    $qResultAdMnAdd = mysqli_query($conn, $qSelectAdMnAdd);
    $ddMnAdd = mysqli_num_rows($qResultAdMnAdd);
    // echo '$ddMnAdd = '.$ddMnAdd.'</br>';
    if ($ddMnAdd > 0) {
        include 'omschemeretad.php'; // START CODE TO ADD FILE TO SHOW AMOUNT OUT,@AUTHOR:HEMA-3JUL2020
//        $qSelect = "SELECT SUM(utin_cash_amt_rec) as total,utin_date FROM user_transaction_invoice as a "
//                . "where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSchRet "
//                . "and utin_status IN ('New','Updated','Deleted') and utin_type='OnPurchase' "
//                . "and utin_transaction_type='DEPOSIT' and utin_firm_id IN ($strFrmId) "
//                . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
//                . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme'))";
        //
        $qSelect = "SELECT SUM(utin_cash_amt_rec) as total,utin_date FROM user_transaction_invoice as a "
                . "where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSchRet "
                . "and utin_status IN ('New','Updated','Deleted') and utin_type='scheme' "
                . "and utin_transaction_type='scheme' and utin_firm_id IN ($strFrmId) "
                . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
                . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme') and b.utin_transaction_type IN('scheme') and b.utin_utin_id != '' and utin_total_amt_deposit != 0)";
        //
//status deleted added @Author:PRIYA17OCT13
        $qResultdep = mysqli_query($conn, $qSelect);
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        $schemeDeposit = $rowdep['total'];

        $totalMoneyDeposit += $schemeDeposit;
        $totalMoneyLeft = $totalMoneyLeft - $schemeDeposit;
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
                                    <div class = "brown_bold12_arial"><span style="color:#000;margin-left:10px;">SCHEME MONEY RETURN</span></div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_red_Arial_12_bold">
                                        <?php
                                        // echo formatInIndianStyle($schemeDeposit);
                                        ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd"></td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
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
                        <table border="0" cellspacing="0" cellpadding="0" align="left" style="border-top: 1px dashed #bababa;border-bottom: 1px dashed #bababa;">
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
                                <td align = "right" title="CASH" class=" brown_normal12_calibri " style="width: 55px;">
                                    DISC.
                                </td>
                                <td align = "right" title="CASH" class=" brown_normal12_calibri  " style="width: 80px;">
                                    <div class="margin_right_four bold">TOTAL</div>
                                </td>
                                <?php
                                $serialNo = 1;
                                $totAdmnAmt = 0;
                                while ($rowAdMnAdd = mysqli_fetch_array($qResultAdMnAdd, MYSQLI_ASSOC)) {
                                    $admnId = $rowAdMnAdd['utin_id'];
                                    $admnFirmId = $rowAdMnAdd['utin_firm_id'];
                                    $admnAmt = $rowAdMnAdd['utin_cash_amt_rec'];
                                    $admnCustId = $rowAdMnAdd['utin_user_id'];
                                    $admnDOB = $rowAdMnAdd['utin_date'];
                                    $preSerialNo = $rowAdMnAdd['utin_pre_invoice_no'];
                                    $postSerialNo = $rowAdMnAdd['utin_invoice_no'];
                                    $schemeMonDepChequeTotalAmt = $rowAdMnAdd['utin_pay_cheque_amt'];
                                    $totAdmnAmt += $admnAmt;
                                    $addTotalDiscount = $rowAdMnAdd['utin_discount_amt'];
                                    $addRecAmtDiscount = $rowAdMnAdd['utin_discount_amt_discup'];
                                    $addFinalBalDue = $rowAdMnAdd['utin_cash_balance'];
                                    $utin_pay_trans_chrg = $rowAdMnAdd['utin_pay_trans_chrg'];
                                    $utin_online_pay_amt = $rowAdMnAdd['utin_online_pay_amt'];
                                    $utin_comm_amt = $rowAdMnAdd['utin_pay_comm_paid'];  // COMM PAID -(minus)
                                    $utin_tran_charge = $rowAdMnAdd['utin_pay_trans_chrg']; // TRANS CHARGE +
                                    $schemeMonDepTotalCash = $rowAdMnAdd['utin_cash_amt_rec']; //CODE ADDED TO GET AMOUNT RETURN BY CASH,@AUTHOR:HEMA-22JUN2020
                                    $schemeMonDepCardTotalAmt = $rowAdMnAdd['utin_pay_card_amt']; //CODE ADDED TO GET AMOUNT RETURN BY CARD,@AUTHOR:HEMA-22JUN2020

                                    $TotalschemeCash += $schemeMonDepTotalCash;
                                    $TotalschemeBank += $schemeMonDepChequeTotalAmt;
                                    $TotalSchemeCard += $schemeMonDepCardTotalAmt;
                                    $TotalSchemeOnline += $utin_online_pay_amt;
                                    $TotalDiscount += $addTotalDiscount;
                                    $TotalschemeAmt += $schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid) + $addTotalDiscount;
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
                                    ?>
                                <tr>
                                    <td align="left" title="<?php echo $serialNo; ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($serialNo, 0, 15); ?></h5>
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
                                                        <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('SchemeReturn', '<?php echo $admnCustId; ?>', '<?php echo $preSerialNo; ?>', '<?php echo $postSerialNo; ?>', 'SchemeReturn');">
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
                                        <h4 class="amount12 redFont"><?php
                                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                                echo formatInIndianStyle(abs($schemeMonDepTotalCash));
                                                            }
                                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($schemeMonDepChequeTotalAmt));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($schemeMonDepCardTotalAmt + $utin_tran_charge));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php
                                            if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                                echo formatInIndianStyle(abs($utin_online_pay_amt - $utin_comm_amt));
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($addTotalDiscount)); ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont"><?php echo formatInIndianStyle(abs($schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid) + $addTotalDiscount)); //echo formatInIndianStyle(abs($admnAmt)); /* LINE ADDED TI SHOW TOTAL SCHEME AMOUNT RETURN,@AUTHOR:HEMA-22JUN2020 */   ?></h4>
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
                                        </table>
                                    </div>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                            echo formatInIndianStyle($TotalschemeCash);
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                            echo formatInIndianStyle($TotalschemeBank);
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php
                                        if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                            echo formatInIndianStyle($TotalSchemeCard);
                                        }
                                        ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php
            if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                echo formatInIndianStyle($TotalSchemeOnline);
            }
            ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class="amount12 redFont bold"><?php echo formatInIndianStyle(abs($TotalDiscount)); ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont bold"><?php echo formatInIndianStyle($TotalschemeAmt); ?></h4>
                                </td>
                            </tr>     
                        </table>
                    </td>
                </tr>
            </table>
            <?php
        }
    }
    $totalMoneyWithdrwal+=$TotalschemeAmt;
} else {
    if ($todayDate == '' || $todayDate == NULL) {
        $todayDate = date("d M Y");
    }
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
    $todaysDeposit = 0;
    include 'omfrpsck.php';
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrSchRet = "and utin_user_id = '$custId'";
    } else {
        $accLedStrSchRet = NULL;
    }
//
//    $qSelectAdMnAdd = "SELECT * FROM user_transaction_invoice as a where "
//            . "utin_type='OnPurchase' and utin_transaction_type='DEPOSIT' $dateStr $accLedStrSchRet "
//            . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
//            . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme')) and utin_firm_id IN ($strFrmId)"
//            . " order by UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy";
    //
    $qSelectAdMnAdd = "SELECT utin_id,utin_firm_id,utin_cash_amt_rec,utin_date,utin_user_id,utin_pre_invoice_no,utin_invoice_no,utin_pay_cheque_amt,utin_discount_amt,utin_discount_amt_discup,utin_cash_balance,utin_pay_trans_chrg,utin_online_pay_amt,utin_pay_comm_paid,utin_pay_trans_chrg,utin_cash_amt_rec,utin_pay_card_amt"
            . " FROM user_transaction_invoice as a where "
            . "utin_type='scheme' and ((utin_transaction_type IN('DEPOSIT') and utin_total_amt_deposit != 0 and utin_status != 'PAID') OR (utin_transaction_type IN('SCHEME RETURN') and utin_total_amt_deposit < 0)) $dateStr $accLedStrSchRet and utin_firm_id IN ($strFrmId)";

    $qResultAdMnAdd = mysqli_query($conn, $qSelectAdMnAdd);
    $ddMnAdd = mysqli_num_rows($qResultAdMnAdd);

    if ($ddMnAdd > 0) {
        include 'omschemeretad.php'; // START CODE TO ADD FILE TO SHOW AMOUNT OUT,@AUTHOR:HEMA-3JUL2020
//        $qSelect = "SELECT SUM(utin_cash_amt_rec) as total,utin_date FROM user_transaction_invoice as a "
//                . "where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSchRet "
//                . "and utin_status IN ('New','Updated','Deleted') and utin_type='OnPurchase' "
//                . "and utin_transaction_type='DEPOSIT' and utin_firm_id IN ($strFrmId) "
//                . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
//                . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme'))";
//status deleted added @Author:PRIYA17OCT13
        //
        $qSelect = "SELECT SUM(utin_cash_amt_rec) as total,utin_date FROM user_transaction_invoice as a "
                . "where utin_owner_id='$_SESSION[sessionOwnerId]' $dateStr $accLedStrSchRet "
                . "and utin_status IN ('New','Updated','Deleted') and utin_type='scheme' "
                . "and utin_transaction_type='scheme' and utin_firm_id IN ($strFrmId) "
                . "and utin_utin_id IN (SELECT utin_id from user_transaction_invoice as b "
                . "where a.utin_utin_id=b.utin_id and b.utin_type IN ('scheme') and b.utin_transaction_type IN('scheme') and b.utin_utin_id != '' and utin_total_amt_deposit != 0)";

        $qResultdep = mysqli_query($conn, $qSelect);
        $rowdep = mysqli_fetch_array($qResultdep, MYSQLI_ASSOC);
        $schemeDeposit = $rowdep['total'];

        $totalMoneyDeposit += $schemeDeposit;
        $totalMoneyLeft = $totalMoneyLeft - $schemeDeposit;
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
                                    <div class = "brown_bold12_arial" style="margin-left:10px;">SCHEME MONEY RETURN</div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_red_Arial_12_bold">
            <?php
            // echo formatInIndianStyle($schemeDeposit);
            ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd"></td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
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
                            <?php if ($showbalance == 'YES') { ?>                                    
                                    <td align = "right" title="CASH" class=" brown_normal12_calibri  bold" style="width: 100px;">
                                        BALANCE
                                    </td>
                            <?php } ?>
                            </tr>
                            <?php
                            $serialNo = 1;
                            $totAdmnAmt = 0;
                            while ($rowAdMnAdd = mysqli_fetch_array($qResultAdMnAdd, MYSQLI_ASSOC)) {
                                $admnId = $rowAdMnAdd['utin_id'];
                                $admnFirmId = $rowAdMnAdd['utin_firm_id'];
                                $admnAmt = $rowAdMnAdd['utin_cash_amt_rec'];
                                $admnCustId = $rowAdMnAdd['utin_user_id'];
                                $admnDOB = $rowAdMnAdd['utin_date'];
                                $preSerialNo = $rowAdMnAdd['utin_pre_invoice_no'];
                                $postSerialNo = $rowAdMnAdd['utin_invoice_no'];
                                $schemeMonDepChequeTotalAmt = $rowAdMnAdd['utin_pay_cheque_amt'];
                                $totAdmnAmt += $admnAmt;
                                $addTotalDiscount = $rowAdMnAdd['utin_discount_amt'];
                                $addRecAmtDiscount = $rowAdMnAdd['utin_discount_amt_discup'];
                                $addFinalBalDue = $rowAdMnAdd['utin_cash_balance'];
                                $utin_pay_trans_chrg = $rowAdMnAdd['utin_pay_trans_chrg'];
                                $utin_online_pay_amt = $rowAdMnAdd['utin_online_pay_amt'];
                                $utin_comm_amt = $rowAdMnAdd['utin_pay_comm_paid'];  // COMM PAID -(minus)
                                $utin_tran_charge = $rowAdMnAdd['utin_pay_trans_chrg']; // TRANS CHARGE +
                                $schemeMonDepTotalCash = $rowAdMnAdd['utin_cash_amt_rec']; //CODE ADDED TO GET AMOUNT RETURN BY CASH,@AUTHOR:HEMA-22JUN2020
                                $schemeMonDepCardTotalAmt = $rowAdMnAdd['utin_pay_card_amt']; //CODE ADDED TO GET AMOUNT RETURN BY CARD,@AUTHOR:HEMA-22JUN2020


                                $TotschemeCash += $schemeMonDepTotalCash;
                                $TotschemeBank += $schemeMonDepChequeTotalAmt;
                                $TotSchemeCard += $schemeMonDepCardTotalAmt;
                                $TotSchemeOnline += $utin_online_pay_amt;
                                $TotDiscount += $addTotalDiscount;
                                $TotschemeAmt += $schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid) + $addTotalDiscount;

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
                                ?>
                                <tr>
                                    <td align="left" title="<?php echo $serialNo; ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($serialNo, 0, 15); ?></h5>
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
                <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepTotalCash)); ?></h4>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                <?php } ?>
                <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepChequeTotalAmt)); ?></h4>
                                        </td>
                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepCardTotalAmt + $utin_tran_charge)); ?></h4>
                                        </td>
                                        <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                        <?php } ?>
                                        <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($utin_online_pay_amt - $utin_comm_amt)); ?></h4>
                                        </td>
                                        <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                <?php } ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($addTotalDiscount)); ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12 redFont"style="margin-right:0px;"><?php echo formatInIndianStyle(abs($schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid) + $addTotalDiscount)); //echo formatInIndianStyle(abs($admnAmt));/* CODE ADDED TO CSHOW TOTAL SCHEME AMOUNT RETURN,@AUTHOR:HEMA-22JUN2020 */ ?></h4>
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
                    $total = ($schemeMonDepTotalCash + $schemeMonDepChequeTotalAmt + ($schemeMonDepCardTotalAmt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid) + $addTotalDiscount);
                    $balance = $open_balance - $total;
                    ?>
                                            <h4 class="amount12 " style="color:blue;"><?php echo formatInIndianStyle($balance); ?></h4></div>
                                        </td> 
                <?php } ?>
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
            <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($TotschemeCash); ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
            <?php } ?>
            <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($TotschemeBank); ?></h4>
                                    </td>
            <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($TotSchemeCard); ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
            <?php } ?>
            <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont bold" style="margin-right:0px;"><?php echo formatInIndianStyle($TotSchemeOnline); ?></h4>
                                    </td>
            <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
            <?php } ?>
                                <td align="right"  class="amount12 reddish" >
                                    <h4 class="amount12 redFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($TotDiscount); ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish" >
                                    <h4 class="amount12 redFont bold"style="margin-right:0px;"><?php echo formatInIndianStyle($TotschemeAmt); ?></h4>
                                </td>
                                <!--------START CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------> 
            <?php if ($showbalance == 'YES') { ?>
                                    <td align="right"  class="amount12 reddish bold">
                                        <h4 class="amount12 "style="color:blue;"> <?php echo formatInIndianStyle($balance); ?></h4>
                                    </td>
            <?php } ?>
                                <!--------END CODE TO DISPLAY BALANCE @RENUKA_AUG_2022------------------------------>
                            </tr>    
                        </table>
                    </td>
                </tr>
            </table>
            <?php
        }
    }
    $totalMoneyWithdrwal+=$TotschemeAmt;
}
?>

