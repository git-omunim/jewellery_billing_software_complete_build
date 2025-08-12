<?php
/*
 * Created on Jun 04, 2016 10:15:10 AM
 *
 * @FileName: omuudet.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
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
require_once 'ommpincr.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'system/omssopin.php';
$sessionFirmId = $_SESSION['setFirmSession']; //Added firm id for session @AUTHOR VISHAL 17MAR2021
$strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
//
if ($custId == '') {
    $custId = $_POST['custId'];
    $firmId = $_POST['firmId'];
}
//
if ($custId == '') {
    $custId = $_GET['custId'];
    $firmId = $_GET['firmId'];
}
//
$panelDetails = $_GET['panelName'];
//
//
//print_r($_REQUEST);
//
//
// SUB PANEL NAME @AUTHOR-PRIYANKA-10AUG2022
if ($subPanelName == '' || $subPanelName == NULL) {
    $subPanelName = $_REQUEST['subPanelName'];
}
//
//echo '$subPanelName @==@ ' . $subPanelName . '<br />';
//
// FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
if ($subPanelName == 'udhaarDepositDateChangePanel') {
    //
    //
    // MAIN UDHAAR ENTRY ID @AUTHOR-PRIYANKA-10AUG2022
    if ($mainUdhaarId == '' || $mainUdhaarId == NULL) {
        $mainUdhaarId = $_REQUEST['mainUdhaarId'];
    }
    //
    // DATE - DAY @AUTHOR-PRIYANKA-10AUG2022
    if ($newDepositDOBDay == '' || $newDepositDOBDay == NULL) {
        $newDepositDOBDay = $_REQUEST['newDepositDOBDay'];
    }
    //
    // DATE - MONTH @AUTHOR-PRIYANKA-10AUG2022
    if ($newDepositDOBMonth == '' || $newDepositDOBMonth == NULL) {
        $newDepositDOBMonth = $_REQUEST['newDepositDOBMonth'];
    }
    //
    // DATE - YEAR @AUTHOR-PRIYANKA-10AUG2022
    if ($newDepositDOBYear == '' || $newDepositDOBYear == NULL) {
        $newDepositDOBYear = $_REQUEST['newDepositDOBYear'];
    }
    //
    //
    // //// COUNTER
    if ($changeCounter == '' || $changeCounter == NULL) {
        $changeCounter = $_REQUEST['changeCounter'];
    }
}
//
//
//echo '$subPanelName == ' . $subPanelName . '<br />';
//echo '$mainUdhaarId == ' . $mainUdhaarId . '<br />';
//echo '$newDepositDOBDay == ' . $newDepositDOBDay . '<br />';
//echo '$newDepositDOBMonth == ' . $newDepositDOBMonth . '<br />';
//echo '$newDepositDOBYear == ' . $newDepositDOBYear . '<br />';
//
//
?>
<div id="custUdhaarDetailsPrintDiv">
    <table border="0" cellspacing="2" cellpadding="2" width="100%" class="ShadowFrm">
        <?php if ($custPanelOption != 'UpdateAdvMoney') { ?>
            <tr>
                <td align="left" width="100%">
                    <div class="spaceLeft20 ff_calibri fs_14 fw_b">
                        <img src="<?php echo $documentRoot; ?>/images/img/release-icon.png" alt="add girvi" width="24px" height="24px"
                                                   />
                        <span style="font-size:16px"><b>UDHAAR DETAILS</b></span>
                    </div>
                </td>
                <td align="right" valign="bottom">
                    <input type="submit" value="PAID UDHAAR DETAILS"
                           id="buttPaidUdhaarDetails" name="buttPaidUdhaarDetails" 
                           onclick="showPaidUdhaarDetailsDiv('<?php echo $custId; ?>', '<?php echo $firmId; ?>');"
                           class="btn btn1 btn1Hover" style="border-radius: 5px !important;margin: unset;height: 30px;width: 100%;font-weight: bold;font-size: 15px;text-align: center;background:#dceaff;color: #000080;border: 1px solid #5299FF;"/>
                </td>
            </tr>
           
            <tr>
                <td colspan="4">
                    <!--////// START ADDED CONDITION TO CHECK FIRM SESSION @AUTHOR VISHAL 17MAR2021 //////-->
                    <!--////// START ADDED IF FOR ALL FIRM @AUTHOR VISHAL 17MAR2021 //////-->
                    <?php
                    if ($sessionFirmId == '' || $sessionFirmId == NULL) {
                        ?>
                        <!--////// END ADDED IF FOR ALL FIRM @AUTHOR VISHAL 17MAR2021 //////-->
                        <div id="custUdhaarDetailsDiv">
                            <?php
                            $udCounter = 1; 
                            //
                            //echo 'showDivNew : ' . $showDivNew . '<br />'; 
                            //
                            //if ($_REQUEST['displayTotalColumn'] == 'No') {
                            //    $displayTotalColumn = 'No';
                            //}
                            //
                            //echo '$displayTotalColumn : ' . $displayTotalColumn . '<br />'; 
                            //
                            if ($showDivNew == "Deleted" || $showDivNew == "Paid") {
                                include 'omuucpud.php';
                            } else {
                                /*                                 * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
                                //*********** Adding firm selection in query by CHETAN@20JUNE2022  *********//
                                $qSelTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice "
                                        . "where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . "and utin_firm_id IN ($strFrmId) and utin_type IN('OnPurchase','udhaar','payment') "
                                        . "AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . "and utin_user_id='$custId' and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') "
                                        . "AND utin_cash_balance <> 0) and utin_status IN ('New','Updated') ";
                                
                                $resTotalUdhaarCount = mysqli_query($conn, $qSelTotalUdhaarCount);
                                $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
                                //echo $totalUdhaar;
                                //
                                ////*********** Adding firm selection in query by CHETAN@20JUNE2022  *********//
                                   if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                       $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . " and utin_user_id='$custId' and utin_firm_id IN ($strFrmId) and utin_type IN ('OnPurchase','udhaar','payment') "
                                        . " AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . " and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') and"
                                               . " (utin_pay_cgst_chrg !=0 OR utin_pay_igst_chrg !=0 OR utin_pay_cgst_chrg IS NULL OR utin_pay_igst_chrg IS NULL OR utin_type IN ('udhaar')) AND utin_cash_balance <> 0) "
                                        . " and utin_status IN ('New','Updated')  order by utin_id desc";
                                   }else{
                                $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . " and utin_user_id='$custId' and utin_firm_id IN ($strFrmId) and utin_type IN ('OnPurchase','udhaar','payment') "
                                        . " AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . " and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') AND utin_cash_balance <> 0) "
                                        . " and utin_status IN ('New','Updated')  order by utin_id desc";
                                   }

                                $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
                                $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
                                //echo '$qSelAllUdhaar : '.$qSelAllUdhaar.'<br>'; 
                                if ($totalUdhaar <= 0) {
                                    echo "<div class=" . "spaceLeft40" . "><h4> ~ Udhaar Details not available ~ </h4></div>";
                                }
                                if ($totalNextUdhaar <= 0) {
                                    echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Udhaar Details are available. Go to previous Udhaar Details. ~ </h4></div>";
                                }
                                $udhaarDiv = 1;
                                $totalUdhaarAmt = 0;
                                $totalUdhaarTotalDepAmount = 0;
                                $totalDiscountAmt = 0;

                                while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

                                    $utin_utin_id = $rowAllUdhaar['utin_id'];

                                    parse_str(getTableValues("SELECT utin_total_amt,utin_utin_id FROM user_transaction_invoice "
                                                    . "WHERE utin_id='$utin_utin_id'"));

                                    $udhaarId = $rowAllUdhaar['utin_id'];
                                    $udhaarAmount = $rowAllUdhaar['utin_cash_balance'];
                                    $udhaarCustId = $rowAllUdhaar['utin_user_id'];
                                    $udhaarType = $rowAllUdhaar['utin_type'];
                                    $transType = $rowAllUdhaar['utin_transaction_type'];
                                    $udhaarDOB = $rowAllUdhaar['utin_date'];
                                    $udhaarOtherDOB = $rowAllUdhaar['utin_other_lang_date'];
                                    $udhaarHistory = $rowAllUdhaar['utin_history'];
                                    $udhaarComm = $rowAllUdhaar['utin_comm'];
                                    $udhaarUpdStatus = $rowAllUdhaar['utin_status'];
                                    $udhaarOtherInfo = $rowAllUdhaar['utin_other_info'];
                                    $udhaarJrnlId = $rowAllUdhaar['utin_jrnl_id']; //Udhaar Jrnl Id Added @Author:PRIYA18AUG13 
                                    $firmId = $rowAllUdhaar['utin_firm_id'];
                                    $udhaarPreSerialNum = $rowAllUdhaar['utin_pre_invoice_no'];
                                    $udhaarSerialNum = $rowAllUdhaar['utin_invoice_no'];
                                    $udhaarROI = $rowAllUdhaar['utin_ROI'];
                                    $udhaarEMIDays = $rowAllUdhaar['utin_EMI_days'];
                                    $udhaarEMIOccur = $rowAllUdhaar['utin_EMI_occurrences'];
                                    $udhaarEMIStatus = $rowAllUdhaar['utin_EMI_status'];
                                    $udhaarGdWt = $rowAllUdhaar['utin_gd_gs_weight'];
                                    $udhaarGdWtTyp = $rowAllUdhaar['utin_gd_gs_weight_type'];
                                    $udhaarSrWt = $rowAllUdhaar['utin_sl_sg_weight'];
                                    $udhaarSrWtTyp = $rowAllUdhaar['utin_sl_gs_weight_type'];
                                    
                                    $udhaarMainAmt = $rowAllUdhaar['utin_total_amt'];
//                                    echo '$udhaarAmount : '.$udhaarMainAmt.'<br>'; 
//                                    echo '$udhaarAmt : '.$udhaarAmt.'<br>'; 
//                                    echo '$utin_total_amt : '.$utin_total_amt.'<br>'; 
                                    
                                    if ($rowAllUdhaar['utin_left_amount'] == '' || $rowAllUdhaar['utin_left_amount'] == NULL) {
                                        $udhaarAmt = $utin_total_amt;
                                    } else {
                                        $udhaarAmt = $rowAllUdhaar['utin_left_amount'];
                                    }
//                                    echo '$udhaarAmt : '.$udhaarAmt.'<br>'; 
                                    $udhaEMIOpt = $rowAllUdhaar['utin_EMI_opt'];
                                    $delOption = $utin_utin_id;
                                    $udhaarPaymInfo = $rowAllUdhaar['utin_paym_oth_info'];
                                    $udhaarIntROI = $rowAllUdhaar['utin_udhaar_roi'];
                                    $udhaarIntType = $rowAllUdhaar['utin_udhaar_int_type'];
                                    $udhaarIntChk = $rowAllUdhaar['utin_udhaar_int_chk'];
                                    //
                                    $utin_dr_acc_id = $rowAllUdhaar['utin_dr_acc_id'];
                                    $utin_cr_acc_id = $rowAllUdhaar['utin_cr_acc_id'];
                                    //
                                    if ($utin_dr_acc_id != '') {
                                        $acc_user_acc = '';
                                        parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$utin_dr_acc_id'"));
                                        $mainUdharDrAccountName = $acc_user_acc;
                                    }
                                    //
                                    if ($utin_cr_acc_id != '') {
                                        $acc_user_acc = '';
                                        parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$utin_cr_acc_id'"));
                                        $mainUdharCrAccountName = $acc_user_acc;
                                    }
                                    //
                                    //echo '$udhaarIntChk:'.$udhaarIntChk;
                                    //
                                    /*                                     * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
                                    /*                                     * *******Start code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
                                    if ($udhaEMIOpt == '' || $udhaEMIOpt == NULL) {
                                        $selUdhaEMIOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaEMIOpt'";
                                        $resUdhaEMIOpt = mysqli_query($conn, $selUdhaEMIOpt);
                                        $rowUdhaEMIOpt = mysqli_fetch_array($resUdhaEMIOpt);
                                        $udhaEMIOpt = $rowUdhaEMIOpt['omly_value'];
                                    }
                                    /*                                     * *******End code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */

                                    if ($udhaarEMIDays != '' || $udhaarEMIDays != NULL) {
//                                        if ($udhaEMIOpt == 'divideOrAdjustAmt') {
//                                            include 'omuemdtla.php';
//                                        } else {
//                                            include 'omuemdtl.php';
//                                        }
//                                        $totalUdhaarAmt += $emiTotalAmt;
                                    } else {  
                                        
                                        //$totalUdhaarAmt += $utin_total_amt;
                                        
                                        include 'omuudtdv.php';
                                        
                                        //$totalUdhaarAmt += ($utin_total_amt + abs($totalInterestAmt));
                                        
                                        //echo '<br/><br/>$totalInterestAmt !@@!: ' . $totalInterestAmt;
                                        //echo '<br/><br/>$utin_total_amt !@@!: ' . $utin_total_amt;
                                        
                                        if ($totalInterestAmt > 0) {
                                            $totalUdhaarAmt += $utin_total_amt;
                                        } else {
                                            $totalUdhaarAmt += $utin_total_amt;
                                        }
                                        $totalIntAmt += $totalInterestAmt;
                                        //$totalUdhaarAmt += ($utin_total_amt + $totalInterestAmt);
                                        
                                    }
                                    $udCounter++;
                                    $totalInterestAmt = 0;
                                }
                            }
                            ?>
                        </div>
                        <!--////// START ADDED ELSE FOR FIRM SESSION @AUTHOR VISHAL 17MAR2021 //////-->
                    <?php } else { ?>
                        <div id="custUdhaarDetailsDiv">
                            <?php
                            $udCounter = 1; 
                            //
                            //echo '$showDivNew : ' . $showDivNew . '<br />'; 
                            //
                            //if ($_REQUEST['displayTotalColumn'] == 'No') {
                            //    $displayTotalColumn = 'No';
                            //}
                            //
                            //echo '$displayTotalColumn : ' . $displayTotalColumn . '<br />'; 
                            //
                            if ($showDivNew == "Deleted" || $showDivNew == "Paid") {
                                include 'omuucpud.php';
                            } else {
                                /*                                 * ***************START code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
                                $qSelTotalUdhaarCount = "SELECT utin_id FROM user_transaction_invoice "
                                        . "where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . "and utin_type IN('OnPurchase','udhaar','payment') "
                                        . "AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . "and utin_user_id='$custId' and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') "
                                        . "AND utin_cash_balance <> 0) and utin_status IN ('New','Updated') "
                                        . "AND utin_firm_id IN ($sessionFirmId)"; // Added clause to fetch detail as per firm session @AUTHOR VISHAL 17MAR2021
                                //echo '<br />qSelTotalUdhaarCount : ' . $qSelTotalUdhaarCount . '<br />'; 
                                $resTotalUdhaarCount = mysqli_query($conn, $qSelTotalUdhaarCount);
                                $totalUdhaar = mysqli_num_rows($resTotalUdhaarCount);
                                //echo $totalUdhaar;
                                 if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
                                       $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . " and utin_user_id='$custId' and utin_firm_id IN ($strFrmId) and utin_type IN ('OnPurchase','udhaar','payment') "
                                        . " AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . " and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') and"
                                               . " (utin_pay_cgst_chrg !=0 OR utin_pay_igst_chrg !=0 OR utin_pay_cgst_chrg IS NULL OR utin_pay_igst_chrg IS NULL OR utin_type IN ('udhaar')) AND utin_cash_balance <> 0) "
                                        . " and utin_status IN ('New','Updated')  order by utin_id desc";
                                 }else{
                                 $qSelAllUdhaar = "SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . " and utin_user_id='$custId' and utin_firm_id IN ($strFrmId) and utin_type IN ('OnPurchase','udhaar','payment') "
                                        . " AND (utin_amt_pay_chk IS NULL OR utin_amt_pay_chk NOT IN ('checked')) "
                                        . " and (utin_transaction_type IN ('UDHAAR','OnPurchase','PAYMENT') AND utin_cash_balance <> 0) "
                                        . " and utin_status IN ('New','Updated')  order by utin_id desc";
                                 }
                                //echo '<br />qSelAllUdhaar : ' . $qSelAllUdhaar . '<br />'; 
                                $resAllUdhaar = mysqli_query($conn, $qSelAllUdhaar);
                                if($resAllUdhaar){
                                $totalNextUdhaar = mysqli_num_rows($resAllUdhaar);
                            
                                //echo $totalNextUdhaar; die;
                                if ($totalUdhaar <= 0) {
                                    echo "<div class=" . "spaceLeft40" . "><h4> ~ Udhaar Details not available ~ </h4></div>";
                                }
                                if ($totalNextUdhaar <= 0) {
                                    echo "<div class=" . "spaceLeft40" . "><h4> ~ No More Udhaar Details are available. Go to previous Udhaar Details. ~ </h4></div>";
                                }
                                $udhaarDiv = 1;
                                $totalUdhaarAmt = 0;
                                $totalUdhaarTotalDepAmount = 0;
                                $totalDiscountAmt = 0;

                                while ($rowAllUdhaar = mysqli_fetch_array($resAllUdhaar, MYSQLI_ASSOC)) {

                                    $utin_utin_id = $rowAllUdhaar['utin_id'];

                                    parse_str(getTableValues("SELECT utin_total_amt,utin_utin_id FROM user_transaction_invoice "
                                                    . "WHERE utin_id='$utin_utin_id'"));

                                    $udhaarId = $rowAllUdhaar['utin_id'];
                                    $udhaarAmount = $rowAllUdhaar['utin_cash_balance'];
                                    $udhaarCustId = $rowAllUdhaar['utin_user_id'];
                                    $udhaarType = $rowAllUdhaar['utin_type'];
                                    $transType = $rowAllUdhaar['utin_transaction_type'];
                                    $udhaarDOB = $rowAllUdhaar['utin_date'];
                                    $udhaarHistory = $rowAllUdhaar['utin_history'];
                                    $udhaarComm = $rowAllUdhaar['utin_comm'];
                                    $udhaarUpdStatus = $rowAllUdhaar['utin_status'];
                                    $udhaarOtherInfo = $rowAllUdhaar['utin_other_info'];
                                    $udhaarJrnlId = $rowAllUdhaar['utin_jrnl_id']; //Udhaar Jrnl Id Added @Author:PRIYA18AUG13 
                                    $firmId = $rowAllUdhaar['utin_firm_id'];
                                    $udhaarPreSerialNum = $rowAllUdhaar['utin_pre_invoice_no'];
                                    $udhaarSerialNum = $rowAllUdhaar['utin_invoice_no'];
                                    $udhaarROI = $rowAllUdhaar['utin_ROI'];
                                    $udhaarEMIDays = $rowAllUdhaar['utin_EMI_days'];
                                    $udhaarEMIOccur = $rowAllUdhaar['utin_EMI_occurrences'];
                                    $udhaarEMIStatus = $rowAllUdhaar['utin_EMI_status'];
                                    $udhaarGdWt = $rowAllUdhaar['utin_gd_gs_weight'];
                                    $udhaarGdWtTyp = $rowAllUdhaar['utin_gd_gs_weight_type'];
                                    $udhaarSrWt = $rowAllUdhaar['utin_sl_sg_weight'];
                                    $udhaarSrWtTyp = $rowAllUdhaar['utin_sl_gs_weight_type'];
                                    $udhaarMainAmt = $rowAllUdhaar['utin_total_amt'];
                                    //$udhaarAmt = $utin_total_amt;
                                    //echo '<br />utin_left_amount :' . $rowAllUdhaar['utin_left_amount'] . '.<br />';
                                    //echo '<br />$utin_total_amt :' . $utin_total_amt . '<br />';
                                    //
                                    if ($rowAllUdhaar['utin_left_amount'] == '' || $rowAllUdhaar['utin_left_amount'] == NULL) {
                                        $udhaarAmt = $utin_total_amt;
                                    } else {
                                        $udhaarAmt = $rowAllUdhaar['utin_left_amount'];
                                    }
                                    
                                    //$udhaarAmt = $rowAllUdhaar['utin_left_amount'];
                                    
                                    $udhaEMIOpt = $rowAllUdhaar['utin_EMI_opt'];
                                    $delOption = $utin_utin_id;
                                    $udhaarPaymInfo = $rowAllUdhaar['utin_paym_oth_info'];
                                    $udhaarIntROI = $rowAllUdhaar['utin_udhaar_roi'];
                                    $udhaarIntType = $rowAllUdhaar['utin_udhaar_int_type'];
                                    $udhaarIntChk = $rowAllUdhaar['utin_udhaar_int_chk'];
                                    //
                                    $utin_dr_acc_id = $rowAllUdhaar['utin_dr_acc_id'];
                                    $utin_cr_acc_id = $rowAllUdhaar['utin_cr_acc_id'];
                                    //
                                    if ($utin_dr_acc_id != '') {
                                        $acc_user_acc = '';
                                        parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$utin_dr_acc_id'"));
                                        $mainUdharDrAccountName = $acc_user_acc;
                                    }
                                    //
                                    if ($utin_cr_acc_id != '') {
                                        $acc_user_acc = '';
                                        parse_str(getTableValues("SELECT acc_user_acc FROM accounts WHERE acc_id='$utin_cr_acc_id'"));
                                        $mainUdharCrAccountName = $acc_user_acc;
                                    }
                                    //
                                    /*                                     * ***************END code to change udhaar table to user_transaction_invoice table @Author:PRIYANKA-JUN17********************* */
                                    /*                                     * *******Start code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
                                    if ($udhaEMIOpt == '' || $udhaEMIOpt == NULL) {
                                        $selUdhaEMIOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'udhaEMIOpt'";
                                        $resUdhaEMIOpt = mysqli_query($conn, $selUdhaEMIOpt);
                                        $rowUdhaEMIOpt = mysqli_fetch_array($resUdhaEMIOpt);
                                        $udhaEMIOpt = $rowUdhaEMIOpt['omly_value'];
                                    }
                                    /*                                     * *******End code to get om layout value of Udhaar option @OMMODTAG SHRI_02SEP15**************** */
                                    
                                    if ($udhaarEMIDays != '' || $udhaarEMIDays != NULL) {
//                                        if ($udhaEMIOpt == 'divideOrAdjustAmt') {
//                                            include 'omuemdtla.php';
//                                        } else {
//                                            include 'omuemdtl.php';
//                                        }
//                                        $totalUdhaarAmt += $emiTotalAmt;
                                    } else {
                                        
                                        //$totalUdhaarAmt += $utin_total_amt;
                                        
                                        include 'omuudtdv.php';
                                        
                                        if ($totalInterestAmt > 0) {
                                            $totalUdhaarAmt += $utin_total_amt;
                                        } else {
                                            $totalUdhaarAmt += $utin_total_amt;
                                        }
                                        
                                        $totalIntAmt += $totalInterestAmt;
                                    }
                                    $udCounter++;
                                    $totalInterestAmt = 0;
                                }
                            }
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <!--////// END ADDED ELSE FOR FIRM SESSION @AUTHOR VISHAL 17MAR2021 //////-->
                    <!--////// END ADDED CONDITION TO CHECK FIRM SESSION @AUTHOR VISHAL 17MAR2021 //////-->	
                </td>
            </tr>

        <?php } 
        //
        //echo '$udhaarUpdStatus == ' . $udhaarUpdStatus . '<br />';
        //echo '$displayTotalColumn == ' . $displayTotalColumn . '<br />';
        //
        if ($udhaarUpdStatus != 'Deleted' && $totalUdhaar > 0 && $displayTotalColumn != 'No') { ?>
            <tr>
                <td align="left" valign="top" colspan="4" > 
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" class="brdrgry-dashed">
                        <tr class="height28 totlBg"> 
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 redFont">
                                <h4 class="fw_b"> TOTAL UDHAAR :  <span class="ff_calibri fs_14 redFont" style="color: red"><?php echo formatInIndianStyle($totalUdhaarAmt + $totalUdaarIntAmt); ?></span></h4>
                            </td>
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 redFont">
                                <h4 class="fw_b"> TOTAL INTEREST :  <span class="ff_calibri fs_14 redFont" style="color: red"><?php echo formatInIndianStyle($totalIntAmt); ?></span></h4>
                            </td>
                            <!--START ADD TITLE @Author:GAUR02JULY16-->
                            <!--START CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 green" title="TOTAL PAID AMT">
                                <h4 class="fw_b"> DEPOSIT AMOUNT : <span class="ff_calibri fs_14 greenFont" style="color: green"><?php echo formatInIndianStyle($totalUdhaarTotalDepAmount); ?></span></h4>
                            </td>
                            
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 green" title="TOTAL PAID DISCOUNT">
                                <h4 class="fw_b"> DISCOUNT : <span class="ff_calibri fs_14 greenFont" style="color: green"><?php echo formatInIndianStyle($totalDiscountAmt); ?></span></h4>
                            </td>
                            
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 green" title="TOTAL DEPOSIT">
                                <h4 class="fw_b"> TOTAL DEPOSIT : <span class="ff_calibri fs_14 greenFont" style="color: green"><?php echo formatInIndianStyle($totalUdhaarTotalDepAmount + $totalDiscountAmt); ?></span></h4>
                            </td>
                            
                            <?php
                            /* START CODE TO SHOW TOTAL DEPOSITED INTEREST AMOUNT,@AUTHOR:HEMA-23OCT2020 */
                            //
                            //echo '$udhaarIntChk == ' . $udhaarIntChk . '<br />';
                            //echo '$totalUdaarIntAmt == ' . $totalUdaarIntAmt . '<br />';
                            //
                            if ($udhaarIntChk == 'true') {
                                ?>
                                <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 green" title="TOTAL INTEREST AMT">
                                    <h4 class="fw_b"> INTEREST DEPOSIT : <span class="ff_calibri fs_14 greenFont" style="color: green"><?php echo formatInIndianStyle($totalUdaarIntAmt); ?></span></h4>
                                </td>
                                <?php
                            }
                            /* END CODE TO SHOW TOTAL DEPOSITED INTEREST AMOUNT,@AUTHOR:HEMA-23OCT2020 */
                            ?>
                            <!--END CODE TO ELABORATE TOTAL DEPOSIT @Author:SHE20OCT15-->
                            <!--END ADD TITLE @Author:GAUR02JULY16-->
                            <td align="left" class="paddingTop4 padBott4 ff_calibri fs_14 redFont">
                                <h4 class="fw_b"> REMAIN : <span class="girvi_head_blue_15"><?php echo formatInIndianStyle($totalUdhaarAmt - $totalUdhaarTotalDepAmount - $totalDiscountAmt); ?></span></h4>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>
    </table>
    <!--<hr color="#B8860B" />-->
</div>
<table border="0" cellpadding="2" cellspacing="0" align="center" style="margin-top:10px;">
    <tr id="girviPanelTrId">
        <td align="center" class="noPrint">
            <a style="cursor: pointer;" 
               onclick="printGirviListPanel('custUdhaarDetailsPrintDiv')">
                <img src="<?php echo $documentRoot; ?>/images/printer32.png" alt='PRINT' title='PRINT'
                     width="32px" height="32px" /> 
            </a> 
        </td>
    </tr>
</table>
