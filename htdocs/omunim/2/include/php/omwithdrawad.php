<?php
/*
 * Created on Apr 3, 2011 1:18:20 PM
 *
 * @FileName: omwithdrawad.php
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
    include 'omfrpsck.php';
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrDepAdd = "and utin_user_id = '$custId'";
    } else {
        $accLedStrDepAdd = NULL;
    }
//
    /*     * ***************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17*********************** */
    $qSelectDepUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]'$dateStr $accLedStrDepAdd and "
            . "utin_status IN ('New') and utin_firm_id IN ($strFrmId) "
            . "and utin_type='udhaar' and  utin_transaction_type = 'UDHAAR' and utin_history = 'WITHDRAW'"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy"; //status deleted added @Author:PRIYA17OCT13 //EMI status added @Author:SHRI29MAY15
    $qResultDepUdhaar = mysqli_query($conn, $qSelectDepUdhaar);
    $udhaarDepPresent = mysqli_num_rows($qResultDepUdhaar);
    if ($udhaarDepPresent > 0) {
        $panelName = 'TodaysUdhaarDeposit';
        include 'omwithdrawadd.php';
        $totalMoneyDeposit += $todaysudhaarDeposit;
        //echo '$totalMoneyLeft =='.$totalMoneyLeft;
        $totalMoneyLeft = $totalMoneyLeft + $todaysudhaarDeposit;
//    echo '$totalMoneyLeft='.$totalMoneyLeft;
    }
    if ($ddpanelName == 'todayDatePanel') {
        if ($udhaarDepPresent > 0) {
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
                                    <div class = "brown_bold12_arial"><span style="color:#000;margin-left:10px;">WITHDRAW ADDED</span></div>
                                </td>
                                <td align="right" class="width_120_dd">
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_green_Arial_12_bold">
                                        <?php
                                        //echo formatInIndianStyle($totalMoneyLeft);
                                        ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
                                        <?php
                                        //   echo formatInIndianStyle(abs($totalMoneyDeposit));
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
                                <td align="left"  title="SERIAL NUMBER" class="brown_normal12_calibri " style="width:80px">S. NO
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
                                <td align = "left" colspan="6"  class="width_300_dd brown_normal12_calibri " >
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
                                                        WITH
                                                    </td>
                                                    <td align="right" class="brown_normal11_calibri" title="BALANCE LEFT" style="width:65px; overflow:hidden;">
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
                            </tr>
                            <?php
                            $serialNo = 1;
                            $totUDepAmt = 0;
                            while ($rowAllUdhaar = mysqli_fetch_array($qResultDepUdhaar, MYSQLI_ASSOC)) {
                                $uId = $rowAllUdhaar['utin_id'];
                                $uFirmId = $rowAllUdhaar['utin_firm_id'];
                                $depAmt = $rowAllUdhaar['utin_total_amt'];
                                $depFinalAmt = $rowAllUdhaar['utin_tot_payable_amt'];
                                $depIntAmt = $rowAllUdhaar['utin_int_amt'];
                                $uCustId = $rowAllUdhaar['utin_user_id'];
                                //START CODE TO ADD NEPALI DATE @RENUKA SHARMA NOV2022
                                if ($nepaliDateIndicator == 'YES') {
                                    $uDepDOB = $rowAllUdhaar['utin_other_lang_date'];
                                } else {
                                    $uDepDOB = $rowAllUdhaar['utin_date'];
                                }
                                $totUDepAmt += $depFinalAmt;
                                $totIntAmt += $depIntAmt;
                                $totDepAmt += $depAmt;
                                /*                                 * ***************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17*********************** */
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                    
                                parse_str(getTableValues("SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$uCustId'"));
                                parse_str(getTableValues("SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$uFirmId'"));
                                ?>
                                <?php if ($serialNo % 2 == 0) { ?>
                                    <tr class="">
                                    <?php } else { ?>
                                    <tr>
                                    <?php } ?>
                                    <td align="left" title="<?php echo $serialNo; ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($serialNo, 0, 15); ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($uDepDOB); ?>" >
                                        <h5 class="blackArial11Font"><?php echo om_strtoupper($uDepDOB); ?></h5>
                                        <h5 class="blackArial11Font"><?php
                                            if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) {
                                                echo substr(om_strtoupper($firm_name), 0, 15);
                                            }
                                            ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                        <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $uCustId; ?>', '<?php echo $uFirmId; ?>');">
                                            <div class="ff_tnr fw_n orange fs_11"><?php
                                                if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) {
                                                    echo substr(om_strtoupper($user_fname . ' ' . $user_lname), 0, 28) . ' ' . '(' . (substr(om_strtoupper($user_city), 0, 15)) . ')';
                                                }
                                                ?></div>
                                        </a>
                                        <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                    </td>
                                    <?php if ($ddDetPanel == 'expandAll' || $panelDDDetClick == 'ddDetClick') { ?>
                                        <td align = "left" colspan="6"  class="width_300_dd brown_normal12_calibri ">
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
                                                        <td align="right" class="amount12 reddish" style="width:50px;overflow: hidden;"> 
                                                            <h4 class="amount12 reddish"><?php echo formatInIndianStyle($depAmt); ?></h4>
                                                        </td>
                                                        <td align="right" class="amount12 reddish" style="width:65px;overflow: hidden;">
                                                            <h4 class="amount12 reddish" ><?php echo formatInIndianStyle($depIntAmt); ?></h4>
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
                                    <td align="right" class="amount12 reddish">
                                        <h4 class="amount12 reddish"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right" class="amount12 reddish">
                                        <h4 class="amount12 reddish"><?php
                                            if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right" class="amount12 reddish">
                                        <h4 class="amount12 reddish"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right" class="amount12 reddish">
                                        <h4 class="amount12 reddish"><?php
                                            if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right" class="amount12 reddish">
                                        <h4 class="amount12 reddish"><?php echo '0.00'; ?></h4>
                                    </td>
                                    <td align="right">
                                        <h4 class="amount12  reddish"><?php echo formatInIndianStyle($depFinalAmt); ?></h4>
                                    </td>
                                </tr>
                                <?php
                                $serialNo++;
                            }
                            if (($ddDetPanel == 'expandAll') && $udhaarDepPresent > 0) {
                                ?>
<!--                                <tr>
                                    <td align="center" colspan="4">
                                        &nbsp;
                                    </td>
                                    <td class="paddingTop2 padBott2" colspan="10">
                                        <div class="hrPaleGrey"></div>
                                    </td>
                                </tr>-->
                                <tr style="background: #edf0f4;">
                                    <td align="right" class="amount12 reddish" colspan="4">
                                        <?php echo 'TOTAL:'; ?>
                                    </td>
                                    <td align = "left" colspan="5"  class="width_300_dd brown_normal12_calibri ">
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
                                                        <h4 class = "brown_bold12_arial"><?php ?></h4>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:50px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"><?php echo formatInIndianStyle($totDepAmt); ?></h4>
                                                    </td>
                                                    <td align="right"  class="amount12 reddish" style="width:65px;overflow:hidden;">
                                                        <h4 class = "brown_bold12_arial"><?php echo formatInIndianStyle($totIntAmt); ?></h4>
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
                                        <h4 class = "brown_bold12_arial"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "brown_bold12_arial"><?php
                                            if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "brown_bold12_arial"><?php
                                            if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "brown_bold12_arial"><?php
                                            if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) {
                                                echo '0.00';
                                            }
                                            ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="brown_bold12_arial"><?php echo '0.00'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="brown_bold12_arial"><?php echo formatInIndianStyle($totUDepAmt); ?></h4>
                                    </td>
                                </tr>
                            <?php } ?>
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
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_REQUEST['ddMainPanel'];
//
    if ($custId == '' || $custId == NULL)
        $custId = $_REQUEST['custId'];
//$custId = $_GET['custId'];
//echo '$custId =='.$custId;
    include 'omfrpsck.php';
    if ($ddpanelName == 'dayBeforePanel') {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y'))<$todayStrDate";
    } else {
        $dateStr = "and UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) BETWEEN $todayFromStrDate AND $todayToStrDate";
    }
    if ($ddMainPanel == 'custAccLedger') {
        $accLedStrDepAdd = "and utin_user_id = '$custId'";
    } else {
        $accLedStrDepAdd = NULL;
    }
//
    /*     * ***************START code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17*********************** */
    $qSelectDepUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]'$dateStr $accLedStrDepAdd and "
            . "utin_status IN ('New') and utin_firm_id IN ($strFrmId) "
            . "and utin_type='udhaar' and  utin_transaction_type = 'UDHAAR' and utin_history = 'WITHDRAW'"
            . " order by UNIX_TIMESTAMP(STR_TO_DATE(utin_date,'%d %b %Y')) $ddOrderBy"; //status deleted added @Author:PRIYA17OCT13 //EMI status added @Author:SHRI29MAY15
    $qResultDepUdhaar = mysqli_query($conn, $qSelectDepUdhaar);
    $udhaarDepPresent = mysqli_num_rows($qResultDepUdhaar);
    if ($udhaarDepPresent > 0) {
        $panelName = 'TodaysUdhaarDeposit';
        include 'omwithdrawadd.php';
        $totalMoneyDeposit += $todaysudhaarDeposit;
        //echo '$totalMoneyLeft =='.$totalMoneyLeft;
        $totalMoneyLeft = $totalMoneyLeft + $todaysudhaarDeposit;
//    echo '$totalMoneyLeft='.$totalMoneyLeft;
    }
    if ($ddpanelName == 'todayDatePanel') {
        if ($udhaarDepPresent > 0) {
            if ($totalMoneyLeft < 0) {
                $class = 'redFont';
            } else {
                $class = 'blueFont';
            }
            ?>
            <table border="0" cellspacing="0" cellpadding="0" align="left" class="padBott5">
                <tr>
                    <td align = "left">
                        <table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
                            <tr>
                                <td align = "left" class="width_627_dd">
                                    <div class = "brown_bold12_arial" style="margin-left:10px;">WITHDRAW ADDED</div>
                                </td>
                                <td align="right" class="width_120_dd">
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="text_green_Arial_12_bold">
                                        <?php
                                        //echo formatInIndianStyle($$todaysudhaarDeposit);
                                        ?>
                                    </div>
                                </td>
                                <td align="right" class="width_120_dd">
                                    <div class="ff_calibri fs_12 fw_b <?php echo $class; ?>">
                                        <?php
                                        //  echo formatInIndianStyle(abs($totalMoneyDeposit));
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
                                <td align="left"  title="SR NUMBER" class="brown_normal12_calibri  bold" style="width: 150px">
                                    <div class="marginLeft2">S. NO</div>
                                </td>
                                <td align="left" title="DATE" class="brown_normal12_calibri  bold"style="width: 200px" >
                                    <span style="margin-left:0px;">DATE</span>
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
                            $totUDepAmt = 0;
                            while ($rowAllUdhaar = mysqli_fetch_array($qResultDepUdhaar, MYSQLI_ASSOC)) {
                                $uId = $rowAllUdhaar['utin_id'];
                                $uFirmId = $rowAllUdhaar['utin_firm_id'];
                                $depAmt = $rowAllUdhaar['utin_total_amt'];
                                $depFinalAmt = $rowAllUdhaar['utin_tot_payable_amt'];
                                $depIntAmt = $rowAllUdhaar['utin_int_amt'];
                                $uCustId = $rowAllUdhaar['utin_user_id'];
                                //START CODE TO ADD NEPALI DATE @RENUKA SHARMA NOV2022
                               if ($nepaliDateIndicator == 'YES') {
                                    $uDepDOB = $rowAllUdhaar['utin_other_lang_date'];
                                } else {
                                    $uDepDOB = $rowAllUdhaar['utin_date'];
                                }
                                $totUDepAmt += $depFinalAmt;
                                $totIntAmt += $depIntAmt;
                                $totDepAmt += $depAmt;
                                /*                                 * ***************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-01JULY17*********************** */
//---------------------------------- Start code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                    
                                parse_str(getTableValues("SELECT user_fname,user_lname,user_city FROM user where user_owner_id='$_SESSION[sessionOwnerId]' and user_id='$uCustId'"));
                                parse_str(getTableValues("SELECT firm_name FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr and firm_id='$uFirmId'"));
                                ?>
                                <?php if ($serialNo % 2 == 0) { ?>
                                    <tr class="bc_grey">
                                    <?php } else { ?>
                                    <tr>
                                    <?php } ?>
                                    <td align="left" title="<?php echo $serialNo; ?>">
                                        <h5 class="blackArial11Font"><?php echo substr($serialNo, 0, 15); ?></h5>
                                    </td>
                                    <td align="left" title="<?php echo om_strtoupper($uDepDOB); ?>" >
                                        <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo om_strtoupper($uDepDOB); ?></h5>

                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($firmAccess == 'true'))) { ?>
                                        <td align="left" title="<?php echo om_strtoupper($uDepDOB); ?>" >

                                            <h5 class="blackArial11Font" style="margin-left:0px;"><?php echo substr(om_strtoupper($firm_name), 0, 15); ?></h5>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                        <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $uCustId; ?>', '<?php echo $uFirmId; ?>');">
                                            <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;"><?php echo substr(om_strtoupper($user_fname . ' ' . $user_lname), 0, 28); ?></div>
                                        </a>
                                        <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cityAccess == 'true'))) { ?>
                                        <td align="left" title="<?php echo om_strtoupper($user_fname . ' ' . $user_lname) . ' CITY :  ' . om_strtoupper($user_city); ?>">
                                            <a style="cursor: pointer;" onclick="getCustomerDetailsWithCustId('CustUdhaar', '<?php echo $uCustId; ?>', '<?php echo $uFirmId; ?>');">
                                                <div class="ff_tnr fw_n orange fs_11" style="margin-left:0px;"><?php echo (substr(om_strtoupper($user_city), 0, 15)); ?></div>
                                            </a>
                                            <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->        
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td class="brown_normal12_calibri " style="width:50px;"></td>
                                    <td align = "right" colspan="6"  class="brown_normal12_calibri ">
                                    </td>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont"style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                        <td align="right"  class="amount12 reddish">
                                            <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                        </td>
                                    <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                    <?php } ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                    </td>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class="amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($depFinalAmt)); ?></h4>
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
                                            $total = $depFinalAmt;
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

                                    <?php if (($staffId == '') || (($staffId != '') && ($cashAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($bankAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($cardAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont" style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <?php if (($staffId == '') || (($staffId != '') && ($onlineAccess == 'true'))) { ?>
                                    <td align="right"  class="amount12 reddish">
                                        <h4 class = "amount12 redFont"  style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                    </td>
                                <?php } else { ?><td class="brown_normal12_calibri " style="width:200px;"></td>
                                <?php } ?>
                                <td align="right"  class="amount12 reddish">
                                    <h4 class = "amount12 redFont"  style="margin-right:0px;"><?php echo '0.00'; ?></h4>
                                </td>
                                <td align="right"  class="amount12 reddish" >
                                    <h4 class = "amount12 redFont" style="margin-right:0px;"><?php echo formatInIndianStyle(abs($totUDepAmt)); ?></h4>
                                </td>
                                <?php if ($showbalance == 'YES') { ?>
                                    <td align="right"  class="amount12 reddish bold">
                                        <h4 class="amount12 "style="color:blue;"> <?php echo formatInIndianStyle($balance); ?></h4>
                                    </td>
                                <?php } ?>
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

