<?php
/*
 * **************************************************************************************
 * @tutorial:Money lender LOan Summary Details Division
 * **************************************************************************************
 * 
 * Created on Oct 9, 2012 8:48:44 PM
 *
 * @FileName: ormldtln.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMREVO
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//changes in file @AUTHOR: SANDY28JAN14
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommpdpmsg.php'; //add msg file @AUTHOR: SANDY31JAN14
require_once 'system/omssopin.php';

$mlId = $_POST['mlId'];
$loanId = $_POST['loanId'];
$panel = $_POST['panel'];

if ($mlId == '') {
    $mlId = $_GET['mlId'];
    $loanId = $_GET['loanId'];
    $panel = $_GET['panel'];
}
//echo '$pane33333=='.$panel;
$qSelAllGirvi = "SELECT * FROM ml_loan where ml_id='$loanId' and ml_own_id='$_SESSION[sessionOwnerId]'";
$resAllGirvi = mysqli_query($conn, $qSelAllGirvi) or die("Error: " . mysqli_error($conn) . " with query " . $qSelAllGirvi);
$rowAllGirvi = mysqli_fetch_array($resAllGirvi, MYSQLI_ASSOC);
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
$mainPrincAmount = $rowAllGirvi['ml_main_prin_amt'];
$princAmount = $rowAllGirvi['ml_prin_amt'];
if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $ROI = $rowAllGirvi['ml_IROI'];
} else {
    $ROI = $rowAllGirvi['ml_ROI'];
}
$ROIType = $rowAllGirvi['ml_ROI_typ'];
$girviDOB = $rowAllGirvi['ml_DOB'];
$girviNewDOB = $rowAllGirvi['ml_new_DOB'];
if($nepaliDateIndicator != 'YES'){
    $girviNewDOB = date("d M Y", strtotime($girviNewDOB));
}
$girviDOR = $rowAllGirvi['ml_DOR'];
$girviId = $rowAllGirvi['ml_id'];
$girviType = $rowAllGirvi['ml_type'];
$girviUpdSts = $rowAllGirvi['ml_upd_sts'];
$girviIntOpt = $rowAllGirvi['ml_int_opt'];
$gPreSerialNo = $rowAllGirvi['ml_pre_serial_num']; //pre serial number added @Author:PRIYA06DEC14
$gSerialNo = $rowAllGirvi['ml_serial_num']; //pre serial number added @Author:PRIYA06DEC14
$girviIntCompoundedOpt = $rowAllGirvi['ml_compounded_opt'];

$mlNameFF = $rowAllGirvi['ml_lender_fname'] . ' ' . $rowAllGirvi['ml_lender_lname'];
$mlAddFF = $rowAllGirvi['ml_lender_Address'];

if ($girviNewDOB == '' || $girviNewDOB == NULL) {
    $qUpdateGirvi = "UPDATE ml_loan SET ml_new_DOB='$girviDOB'
                                         WHERE ml_id='$girviId' and ml_lender_id='$mlId' and ml_own_id='$_SESSION[sessionOwnerId]'";

    if (!mysqli_query($conn, $qUpdateGirvi)) {
        die('Error: ' . mysqli_error($conn));
    }
    $girviNewDOB = $girviDOB;
}


$girviValuation = 0;

$gMonthIntOption = $rowAllGirvi['ml_monthly_intopt'];
$girviValuation = 0;
$totalPrincipalAmount = 0;
$totalFinalInterest = 0;
$totalAmount = 0;

include 'ommpgvip.php';

$firmId = $rowAllGirvi['ml_firm_id'];
$mlFirmLnNo = $rowAllGirvi['ml_firm_mli_no'];

$qSelFirm = "SELECT firm_name FROM firm where firm_id='$firmId' and firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
$resFirm = mysqli_query($conn, $qSelFirm);
$rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
?>

<!----------------Start code to change file @Author:SHRI19MAY15--------------->

<div>
    <div id="girviPanelTrId" style="visibility:hidden"></div><!-----Add div required in print function @AUTHOR: SANDY28JAN14----------->    
    <?php // if ($panel == 'MainReceipt') {  ?>
    <table width="100%">
        <tr>
            <td align="left" width="30px">
                <div class="spaceLeft10">
                    <img src="<?php echo $documentRootBSlash; ?>/images/orange16.png" width="16px" height="16px"/>
                </div>
            </td>
            <td align="left">
                <div>
                    <div class="main_link_orange_normal16"><b>LOAN RECEIPT</b></div>
                    <?php // echo $loanReceipt;  ?>
                </div>
                <div id="display_girvi_barcode_slip" class="display-girvi-barcode-slip"></div>
            </td>
            <td align="right">
                <input type="submit" id="sameLoanDet" name="sameLoanDet" class="frm-btn" 
                       value="LOAN DETAILS" onclick="getMlLoanDetails('<?php echo $mlId; ?>', '<?php echo $loanId; ?>', '<?php echo $panel; ?>');"
                       style="font-size:16px;"/>
            </td>
        </tr>
    </table>
    <?php // }  ?>
</div>
<div id="girviDetailsGlobalDiv">
    <table border="0" cellspacing="3" cellpadding="0" align="center" width="99%">
        <tr>
            <td align="center" valign="top"  width="35%" >
                <div id="girviReceiptMainDiv" style="width:360px;background:#eef5ff;border: 1px dashed #0f128a;padding: 3px;">
                    <div id="girviPanelTrId" style="visibility:hidden"></div><!-----Add div required in print function @AUTHOR: SANDY7DEC13----------->
                    <table border="0" cellspacing="4" cellpadding="2" width="100%">
                        <tr align="left" valign="middle">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalGrey" width="50%" style="color:#000">
                                            <span class="fontRprt" style="text-transform:uppercase;">Principal Amount:</span>
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10  textLabel24Calibri bold" width="50%">
                                            <?php echo $globalCurrency . ' ' . $mainPrincAmount; ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr align="left" valign="middle" class="height35">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalGrey" width="50%" style="color:#000">
                                            <span class="fontRprt" style="text-transform:uppercase;">Loan Start Date:</span> 
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10 textLabel18CalibriNormalBlack" width="50%">
                                            <b><?php
                                                if ($nepaliDateIndicator == 'YES') {
                                                    $day_en = substr($girviNewDOB, 0, 2);
                                                    $selMnth = substr($girviNewDOB, 3, -5);
                                                    $year_en = substr($girviNewDOB, -4);
                                                    //
                                                    if (preg_match("/^(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|JUN|MAY|JUL|AUG|SEP|OCT|NOV|DEC)$/", $selMnth)) {
                                                        $selMnth = date('m', strtotime($selMnth));
                                                    }
                                                    $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                                                    if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                                                        $girviDOBArray = explode(' ', $girviNewDOB);
                                                        if (is_numeric($girviDOBArray[1])) {
                                                            $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                        }
                                                        if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                            echo $girviNewDOB = $day_en . '-' . $girviDOBArray[1] . '-' . $year_en;
                                                        } else {
                                                            echo $girviNewDOB = $day_en . '-' . $girviDOBMnth . '-' . $year_en;
                                                        }
                                                    } else {
                                                        $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                                                        if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                            echo $girviNewDOB = $date_ne[d] . '-' . $date_ne[m] . '-' . $date_ne[y];
                                                        } else {
                                                            echo $girviNewDOB = $date_ne[d] . '-' . $date_ne[M] . '-' . $date_ne[y];
                                                        }
                                                    }
                                                } else {
                                                    echo om_strtoupper(date('d M Y', strtotime($girviNewDOB)));
                                                }
                                                ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr align="left" valign="middle" class="height35">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;" >
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalGrey" width="50%" style="color:#000">
                                            <span class="fontRprt" style="text-transform:uppercase;">Rate of Interest:</span> 
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10 textLabel18CalibriNormalBlack" width="50%">
                                            <b> <?php echo $ROI; ?> %&nbsp;<?php echo $ROIType; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr align="left" valign="middle" class="height35">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalBlue" width="50%">
                                            <span class="fontRprt" style="text-transform:uppercase;"> Total Principal:</span>
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10 textLabel18CalibriNormalBlack" width="50%">
                                            <b> <?php echo $totalPrincipalAmount; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr align="left" valign="middle" class="height35">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalBlue" width="50%" >
                                            <span class="fontRprt" style="text-transform:uppercase;"> Total Interest:</span>
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10 textLabel18CalibriNormalBlack" width="50%">
                                            <b><?php echo $totalFinalInterest; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr align="left" valign="middle" class="height35">
                            <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr align="left" valign="middle">
                                        <td align="right" valign="middle" class="textLabel16CalibriNormalBlue" width="50%">
                                            <span class="fontRprt" style="text-transform:uppercase;"> Total Amount:</span>
                                        </td>
                                        <td align="right" valign="middle" class="paddingRight10 textLabel18CalibriNormalBlack" width="50%">
                                            <b> <?php echo $globalCurrency . ' ' . $totalAmount; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" class="girvi_head_blue_16" colspan="2">
                                <br/>
                            </td>
                        </tr>
                        <tr class="height35">
                            <td align="center" valign="middle" class="backFFFFFF girvi_head_blue_24" colspan="2" style="border:1px solid #ddd;font-size:30px;">
                                <div class="spaceLeft5" style="display: flex;align-items: center;justify-content: center;">
                                    <img src="<?php echo $documentRootBSlash; ?>/images/img/rupee.png" alt="indian rupee symbol" height="25px"/>&nbsp;<?php echo $totalAmount; ?> /-
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" class="girvi_head_blue_16" colspan="2">
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2" class="noPrint">
                                <a style="cursor: pointer;" 
                                   onclick="printGirviListPanel('girviReceiptMainDiv')">
                                    <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                                         width="32px" height="32px" /> 
                                </a> 
                            </td>
                        </tr>
                    </table>
                </div>

            </td>
            <td align="center" colspan="1" valign="top" width="65%" style="background: #fff3f5;border: 1px dashed #ff6d6d;margin-top: 5px;padding: 3px;">
                <div>
                    <table border="0" cellspacing="2" cellpadding="1" valign="top" width="100%">
                        <tr>
                            <td align="left" width="100%" colspan="2">
                                <table border="0" cellpadding="1" cellspacing="2" align="left" width="40%">
                                    <tr align="left" valign="middle" class="height35">
                                        <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr align="left" valign="middle">
                                                    <td align="right" valign="middle" class="textLabel14Calibri" width="50%">
                                                        <span class="fontRprt" style="text-transform:uppercase;">Loan S.No.:</span>
                                                    </td>
                                                    <td align="left" valign="middle" class="padLeft5 textLabel16CalibriNormal" width="50%">
                                                        <?php echo 'S' . $gPreSerialNo . $gSerialNo; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr align="left" valign="middle" class="height35">
                                        <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr align="left" valign="middle">
                                                    <td align="right" valign="middle" class="textLabel14Calibri" width="50%">
                                                        <span class="fontRprt" style="text-transform:uppercase;">Firm Name:</span>
                                                    </td>
                                                    <td align="left" valign="middle" class="padLeft5 textLabel16CalibriNormal" width="50%">
                                                        <?php echo $rowFirm['firm_name']; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr align="left" valign="middle" class="height35">
                                        <td align="left" valign="middle" class="backFFFFFF" colspan="2" style="border:1px solid #ddd;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr align="left" valign="middle">
                                                    <td align="right" valign="middle" class="textLabel14Calibri" width="50%">
                                                        <span class="fontRprt" style="text-transform:uppercase;">Firm Loan No.:</span>
                                                    </td>
                                                    <td align="left" valign="middle" class="padLeft5 textLabel16CalibriNormal" width="50%">
                                                        <?php echo $mlFirmLnNo; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" align="right" width="60%">
                                    <tr>
                                        <td align="right" valign="middle" class="girvi_head_maron14">
                                            <img src="<?php echo $documentRootBSlash; ?>/images/ring128.png" alt="" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td align="left" width="100%" colspan="2">
                                <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">

                                    <?php
                                    if ($girviType == 'secured') {
                                        $cnt = 1;
                                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Transferred' and gtrans_trans_loan_id='$loanId'";

                                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                                        $totActLoans = mysqli_num_rows($resSelGirviDet);
                                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                                            $gId = $rowSelGirviDet['gtrans_girvi_id'];

                                            $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $otherInfo = $rowSelGirviDet['gtrans_pay_oth_info'];

                                            if ($rowSelGirviDet['gtrans_prin_typ'] == 'MainPrin') {
                                                $prinType = 'PRN';
                                            } else {
                                                $prinType = 'APRN';
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
                                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY28JAN14
                                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                                            if ($transType == 'Linked') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn, $selMlCode);
                                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                            }
                                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY28JAN14
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
                                                    <tr>
                                                        <td colspan="10">
                                                            <table width="100%" align="center" cellpadding="1" cellspacing="0" class="brdrgry-dashed">    

                                                                <tr align="left"  class="goldBack height28">
                                                                    <td align="center" title="Loan No" width="50px">
                                                                        <div class="tnr_nr_11_red"><b>LOAN NO</b></div>
                                                                    </td>
                                                                    <td align="right" title="principle"  width="100px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>PRINCIPLE</b></div>
                                                                    </td>
                                                                    <td align="right" title="ROI"  width="50px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>ROI</b></div>
                                                                    </td>
                                                                    <td align="right" title="Customer name"  width="90px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>CUSTOMER</b></div>
                                                                    </td>
                                                                    <?php if ($transType == 'Linked') { ?>
                                                                        <td align="right" title="Ml Code"  width="90px">
                                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b>ML CODE</b></div>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                        <td align="right" title="Firm"  width="90px">
                                                                            <div class="spaceLeftRight10 tnr_nr_11_red"><b>FIRM</b></div>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <td align="center" title="Packet No."  width="70px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>PKT NO.</b></div>
                                                                    </td>
                                                                    <td align="center" title="Other Info"  width="90px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>OTHER INFO</b></div>
                                                                    </td>
                                                                    <td align="center" title="principle"  width="100px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>PRIN TYPE</b></div>
                                                                    </td>
                                                                    <td align="right" title="Trasfer Date"  width="100px">
                                                                        <div class="spaceLeftRight10 tnr_nr_11_red"><b>TR DATE</b></div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $cnt++;
                                                            }
                                                            ?>

                                                            <tr class="bgWhite brdrgry">
                                                                <td align="left" title="Loan No" width="50px" >
                                                                    <div class="spaceLeftRight10">
                                                                        <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;" 
                                                                               onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                                               value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"
                                                                               />
                                                                    </div>
                                                                </td>
                                                                <td align="right" title="principle">
                                                                    <div style="font-size:13px"><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?> </div>
                                                                </td>
                                                                <td align="right" title="ROI" >
                                                                    <div style="font-size:13px"><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </div>
                                                                </td>
                                                                <td align="right" title="Customer name">
                                                                    <div style="font-size:13px"><?php echo $custFname; ?> </div>
                                                                </td>
                                                                <?php if ($transType == 'Linked') { ?>
                                                                    <td align="right" title="Ml Code"  width="90px">
                                                                        <div style="font-size:13px"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                                                        <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                                   
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td align="right" title="Firm"  width="90px">
                                                                        <div style="font-size:13px"><?php echo $trFirmName; ?></div>
                                                                    </td>
                                                                <?php } ?>
                                                                <td align="center" title="Packet No.">
                                                                    <div style="font-size:13px"><?php echo $packetNo; ?> </div>
                                                                </td>
                                                                <td align="center" title="Other Info">
                                                                    <div style="font-size:13px"><?php echo $otherInfo; ?> </div>
                                                                </td>
                                                                <td align="center" title="principleType">
                                                                    <div style="font-size:13px"><?php echo $prinType; ?> </div>
                                                                </td>
                                                                <td align="right" title="Date">
                                                                    <div style="font-size:13px"><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </table> 
                                            </td>
                                        </tr>
                                        <?php
                                        $selGirviDet = "SELECT * FROM girvi_transfer WHERE gtrans_own_id='$_SESSION[sessionOwnerId]' and gtrans_upd_sts='Released' and gtrans_trans_loan_id='$loanId'";
                                        $resSelGirviDet = mysqli_query($conn, $selGirviDet);
                                        $totRelLoans = mysqli_num_rows($resSelGirviDet);
                                        $rlCnt = 1;
                                        while ($rowSelGirviDet = mysqli_fetch_array($resSelGirviDet, MYSQLI_ASSOC)) {
                                            $trFirmId = $rowSelGirviDet['gtrans_exist_firm_id'];
                                            $custId = $rowSelGirviDet['gtrans_cust_id'];
                                            $gId = $rowSelGirviDet['gtrans_girvi_id'];

                                            $packetNo = $rowSelGirviDet['gtrans_packet_num'];
                                            $otherInfo = $rowSelGirviDet['gtrans_pay_oth_info'];
                                            if ($rowSelGirviDet['gtrans_prin_typ'] == 'mainPrincipal') {
                                                $prinType = 'PRN';
                                            } else {
                                                $prinType = 'APRN';
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
                                            //START CODE  if loan transferred to ml get ml code @AUTHOR: SANDY28JAN14
                                            $girviTransferLoanId = $rowSelGirviDet['gtrans_trans_loan_id'];
                                            $transType = $rowSelGirviDet['gtrans_trans_type'];
                                            if ($transType == 'Linked') {
                                                $selMlCode = "SELECT user_unique_code FROM user WHERE user_owner_id='$_SESSION[sessionOwnerId]' and user_id IN(SELECT ml_lender_id FROM ml_loan WHERE ml_id='$girviTransferLoanId' and ml_own_id='$_SESSION[sessionOwnerId]')";
                                                $resMlCode = mysqli_query($conn, $selMlCode);
                                                $rowMlCode = mysqli_fetch_array($resMlCode, MYSQLI_ASSOC);
                                            }
                                            //END CODE  if loan transferred to ml get ml code @AUTHOR: SANDY28JAN14
                                            ?>
                                            <?php
                                            if ($totRelLoans > 0) {
                                                if ($rlCnt == 1) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="main_link_red_14"><b>RELEASED LOANS</b></div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $rlCnt++;
                                                }
                                                if ($cnt == 1) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="10">
                                                            <table width="100%" align="center" cellpadding="1" cellspacing="0" class="brdrgry-dashed margtp10">  
                                                                <tr align="left" class="height28 goldBack">
                                                                    <td align="center" title="Loan No" width="80px">
                                                                        <div class="tnr_nr_11_red"><b>LOAN NO</b></div>
                                                                    </td>
                                                                    <td align="right" title="principle"  width="100px">
                                                                        <div class="tnr_nr_11_red"><b>PRINCIPLE</b></div>
                                                                    </td>
                                                                    <td align="right" title="ROI"  width="50px">
                                                                        <div class="tnr_nr_11_red"><b>ROI</b></div>
                                                                    </td>
                                                                    <td align="right" title="Customer name"  width="100px">
                                                                        <div class="tnr_nr_11_red"><b>CUSTOMER</b></div>
                                                                    </td>
                                                                    <?php if ($transType == 'Linked') { ?>
                                                                        <td align="right" title="Ml Code"  width="100px">
                                                                            <div class="tnr_nr_11_red"><b>ML CODE</b></div>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                        <td align="right" title="Firm"  width="100px">
                                                                            <div class="tnr_nr_11_red"><b>FIRM</b></div>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <td align="center" title="Packet No."  width="100px">
                                                                        <div class="tnr_nr_11_red"><b>PACKET NO.</b></div>
                                                                    </td>
                                                                    <td align="center" title="Other Info"  width="100px">
                                                                        <div class=" tnr_nr_11_red"><b>OTHER INFO</b></div>
                                                                    </td>
                                                                    <td align="center" title="principle"  width="100px">
                                                                        <div class=" tnr_nr_11_red"><b>TR TR</b></div>
                                                                    </td>
                                                                    <td align="right" title="Trasfer Date"  width="100px">
                                                                        <div class=" tnr_nr_11_red"><b>TR DATE</b></div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $cnt++;
                                                            }
                                                            ?>
                                                            <tr class="bgWhite height28">
                                                                <td align="left" title="Loan No" >
                                                                    <div style="font-size:13px">
                                                                        <input type="submit" name="sNo" id="sNo" title="Single Click To View Girvi"  style="cursor: pointer;" 
                                                                               onclick="searchGirviByGirviId('<?php echo $gId; ?>')"
                                                                               value="<?php echo $rowSelGirviDet['gtrans_pre_serial_num'] . $rowSelGirviDet['gtrans_serial_num']; ?>" class="frm-btn-lnk-arial-Normal" readonly="true"/>
                                                                    </div>
                                                                </td>
                                                                <td align="right" title="principle">
                                                                    <div style="font-size:13px"><?php echo number_format($rowSelGirviDet['gtrans_prin_amt'], 2, '.', ''); ?> </div>
                                                                </td>
                                                                <td align="right" title="ROI" >
                                                                    <div style="font-size:13px"><?php echo $rowSelGirviDet['gtrans_ROI']; ?> </div>
                                                                </td>
                                                                <td align="right" title="Customer name">
                                                                    <div style="font-size:13px"><?php echo $custFname; ?> </div>
                                                                </td>
                                                                <?php if ($transType == 'Linked') { ?>
                                                                    <td align="right" title="Ml Code"  width="100px">
                                                                        <div style="font-size:13px"><?php echo $rowMlCode['user_unique_code']; ?></div>
                                                                        <!---------------------------------- End code for change data from customer table to user table Author@:SANT15JAN16---------------------------------------------------------------->                                                                  
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td align="right" title="Firm"  width="100px">
                                                                        <div style="font-size:13px"><?php echo $trFirmName; ?></div>
                                                                    </td>
                                                                <?php } ?>
                                                                <td align="center" title="Packet No.">
                                                                    <div style="font-size:13px"><?php echo $packetNo; ?> </div>
                                                                </td>
                                                                <td align="center" title="Other Info">
                                                                    <div style="font-size:13px"><?php echo $otherInfo; ?> </div>
                                                                </td>
                                                                <td align="center" title="principleType">
                                                                    <div style="font-size:13px"><?php echo $prinType; ?> </div>
                                                                </td>
                                                                <td align="right" title="Date">
                                                                    <div style="font-size:13px"><?php echo $rowSelGirviDet['gtrans_DOB']; ?> </div>
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
                                                     </table> 
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" width="100%" colspan="2">
                                            <div id="girviTotAmtDiv">
                                                <?php
                                                include 'ormlttam.php'; //change in filename @AUTHOR: SANDY08FEB14
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!---Start to add table @AUTHOR: SANDY22JAN14------------------->
                    <table border="0" cellpadding="2" cellspacing="0" align="left" width="100%" style="background: #f5f5f5;position: relative;border: 1px solid #d5d4d4;padding: 2px 0;margin-top: 5px;">
                        <tr>
                            <td align="left" width="50%">
                            </td>
                            <td align="right" width="50%">
                                <table border="0" cellpadding="2" cellspacing="0" align="right">
                                    <tr>
                                        <td align="center" class="noPrint">
                                            <a style="cursor: pointer;" class="frm-btn popbtn" 
                                               onclick="printGirviListPanel('girviDetailsGlobalDiv')">
                                                <img src="<?php echo $documentRootBSlash; ?>/images/img/printer.png" alt='PRINT' title='PRINT'
                                                     width="20px" height="20px" /> <span>&nbsp;PRINT</span>
                                            </a> 
                                        </td>
                                        <td align="center" width="35px">
                                            <div id="loanDeleteButDiv">
                                                <a class="frm-btn popbtn" style="cursor: pointer;" onclick="javascript:deleteLoanDetails(<?php echo "$loanId"; ?>,<?php echo "$mlId"; ?>);"><!--Change in function @AUTHOR: SANDY27DEC13--->
                                                    <img src="<?php echo $documentRootBSlash; ?>/images/img/cancel.png" alt='DELETE LOAN' title='DELETE LOAN'
                                                         width="20px" height="20px" /><span>&nbsp;DELETE</span>
                                                </a> 
                                            </div>
                                        </td>
                                        <td align="center" width="35px">
                                            <div id="loanUpdateButDiv">
                                                <a style="cursor: pointer;" class="frm-btn popbtn" onclick="javascript:updateLoanDetails(<?php echo "$mlId"; ?>,<?php echo "$loanId"; ?>);">
                                                    <img src="<?php echo $documentRootBSlash; ?>/images/img/update-loan.png" alt='UPDATE LOAN' title='UPDATE LOAN'
                                                         width="20px" height="20px" /> <span>&nbsp;UPDATE</span>
                                                </a> 
                                            </div>
                                        </td>
                                        <td align="center" width="35px">
                                            <div id="loanReleaseDetailsButDiv">
                                                <a style="cursor: pointer;" class="frm-btn popbtn" onclick="javascript:releaseLoanDetails(<?php echo "$mlId"; ?>,<?php echo "$loanId"; ?>, '<?php echo $perPageNum; ?>');">
                                                    <img src="<?php echo $documentRootBSlash; ?>/images/img/release.png" alt='RELEASE LOAN' title='RELEASE LOAN'
                                                         width="20px" height="20px" /><span> &nbsp;RELEASE</span> 
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                            <td align="right" valign="middle" width="60px">
                                <div id="ajaxLdGirviInfoBelowButtPanelDiv" style="visibility: hidden">
                                    <?php include 'omzaajld.php'; ?>
                                </div>
                            </td> 
                        </tr>

                    </table>
                    <!---End to add table @AUTHOR: SANDY22JAN14------------------->
                </div>
                <!----------------End code to change file @Author:SHRI19MAY15--------------->